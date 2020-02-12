<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\AccountModel;
use App\Entities\Finance\Account as AccountEntity;
use App\Models\Finance\ReleasingModel;

class Account extends FinanceBaseController
{
	public function index()
	{
        $this->View->setPageHeader('Search Accounts');
        return $this->View->render('Finance/Account/index.tpl');
    }

    public function save($meta, $account_id) {
        $AccountModel = new AccountModel();

        if (!empty($account_id)) {      
            $result = $AccountModel->update($account_id, $meta);
        }
        else {
            // check for duplicates.. until indexed unique
            $found = $AccountModel->where(['LOWER(account)'=>strtolower($meta['account']),
                        'branch_id'=>$meta['branch_id'],
                        'sss'=>$meta['sss']])
                  ->first();

            if (!empty($found) && is_object($found)) {
                $found->populate();
                throw new \Exception("Account already exists <a href='/finance/account/edit/" . $found->account_id ."'/>Here</a>");
            }

            $result = $AccountModel->insert($meta);
            $account_id = $AccountModel->getInsertID();
        }
        
        if (!$result) {
            throw new \Exception("Failed to save account information.");
        }

        return $account_id;
    }
    
    public function edit()
	{
        $account_id = $this->request->uri->getSegment(4);
        if ($this->isPost()) {
            $_account_id =$this->save($this->request->getPost('account'), $account_id);
            if (empty($account_id)) {
                $this->redirectTo("/finance/account/edit/" . $_account_id);
            }
        }

        $AccountModel = new AccountModel();   
        $Account = new AccountEntity();
        $page_header = 'Edit Account';
        if (empty($account_id)) // add
        {
            $page_header = 'New Account';
        }
        else
        {
            $Account = $AccountModel->find((int)$account_id)->populate();
        }

        $this->View->setPageHeader($page_header);
        /*
        $Account = new AccountEntity();
        $Account->gender = 'F';
        $Account->age = 34;
        $Account->branch_id = 32;
        $Account->civil_status = 'M';
        */
        $data['aAccount'] = $Account;
        return $this->View->render('Finance/Account/edit.tpl', $data);
    }

    public function browse()
	{
        $this->View->setPageHeader('Accounts');
        $this->View->setModalTitle('Edit Account');
        return $this->View->render('Finance/Account/browse.tpl');
    }

    public function get()
    {
        $meta = $this->request->getGet();
        $data = [];

        if (empty($meta['searchKey']))
            return  $this->View->renderJsonSuccess(null, $data);

        $offset = 0;
        $limit = 20;
        $AccountModel = new AccountModel();
        //$data = $AccountModel->find((int)$meta['account_id'])->populate();
        $searchKey = $meta['searchKey'];
        $fieldValuePair = array('account'=>$searchKey,
                'member'=>$searchKey,
                'lastname'=>$searchKey,
                'firstname'=>$searchKey
            );

        if (!empty($meta['offset']))
            $offset = (int)$meta['offset'];

        if (!empty($meta['searchField']))
            $fieldValuePair = array($meta['searchField']=>$searchKey);

        $data = $AccountModel->ilike($fieldValuePair)
                ->join("account_group", "account.account_group_id=account_group.account_group_id", "left")
                ->join("branch", "account.branch_id=branch.branch_id", "left")
                ->orderBy('account')
                ->findAllArray($limit, $offset);
       
        // this will slowdown and load high
        if (!empty($meta['asOfDate'])) {

            $asOfDate = $meta['asOfDate'] == 'NOW' ? '' : $meta['asOfDate'];
            $asOfDate = Utils::getDate($asOfDate, 'Y-m-d');
            $ReleasingModel = new ReleasingModel();
            $LoanTypeModel = new \App\Models\Finance\LoanTypeModel();

            foreach ($data as $dat) {
                $Releasings = $ReleasingModel->where('account_id', $dat['account_id'])->findAll();
                
                if (!$Releasings)
                    continue;

                $amountDue = 0;
                $mdata = [];
                foreach ($Releasings as $Releasing) {
                    if ($Releasing->status == 'C')
                        continue;

                    $Releasing->populate();
                    if ($Releasing->balance <= 0)
                        continue;

                    $LoanType =  $LoanTypeModel->find($Releasing->loan_type_id)->populate();
                    $amountDue = $ReleasingModel->getAmountDue($Releasing, $asOfDate);
                    $dat['amount_due'] = round($amountDue['amount_due'], 2);
                    $dat['Releasing'] = $Releasing;
                    $dat['LoanType'] = $LoanType;
                    $mdata[] = $dat;
                }

                $data = $mdata;
                unset($mdata);
            }
        }

       return  $this->View->renderJsonSuccess(null, $data);
    }

    public function getDataTable()
    {
        $meta = $this->request->getGet();

        $AccountModel = new AccountModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $AccountModel, 'account');
    
        $data = [];

        if (!empty($DataTable->searchValue))
        {
            $data = $AccountModel->ilike($DataTable->getSearchableLike())
                                ->join("account_group", "account.account_group_id=account_group.account_group_id")
                                ->join("branch", "account.branch_id=branch.branch_id")
                                ->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $data = $AccountModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->join("account_group", "account.account_group_id=account_group.account_group_id")
                                ->join("branch", "account.branch_id=branch.branch_id")
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $AccountModel->countAllResults();

        return $this->View->renderJsonDataTable($data, $recordsTotal);

    }

    public function post()
    {
        $account_id = $this->request->getPost('account_id');
        $AccountModel = new AccountModel();
        
        $Account = $AccountModel->first($account_id);
        if (!empty($id) && empty($Account->account_id))
        {
            return $this->View->renderJsonFail();
        }

        $Account = new \App\Entities\Finance\Account();

        $meta = $this->request->getPost();
        $Account->fill($meta);
        $AccountModel->save($Account);

        return $this->View->renderJsonSuccess();
    }

    public function delete()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $AccountModel = new AccountModel();
            $Account = $AccountModel->delete($id);
        });
        return $this->View->renderJsonSuccess();
    }

    public function restore()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $Account = new \App\Entities\Finance\Account();
            $Account->date_deleted = null;
            $AccountModel = new AccountModel();
            $Account = $AccountModel->save($Account);
        });
        return $this->View->renderJsonSuccess();
    }
	//--------------------------------------------------------------------

}
