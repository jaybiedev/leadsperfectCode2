<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\AccountModel;

class Account extends FinanceBaseController
{
	public function index()
	{
        $this->View->setPageHeader('Search Accounts');
        return $this->View->render('Finance/Account/index.tpl');
    }
    
    public function edit()
	{
        $page_header = 'Edit Account';
        if (true) // add
            $page_header = 'New Account';

        $this->View->setPageHeader($page_header);
        return $this->View->render('Finance/Account/edit.tpl');
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

        $AccountModel = new AccountModel();   
        $data = [];

        if (!empty($meta['account_id']))
        {
            $data = $AccountModel->find((int)$meta['account_id'])->populate();
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
            $data = $AccountModel->like($DataTable->getSearchableLike())
                                ->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $data = $AccountModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
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
