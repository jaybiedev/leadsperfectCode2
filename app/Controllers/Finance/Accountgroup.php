<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\AccountGroupModel;

class AccountGroup extends FinanceBaseController
{
	public function index()
	{   
        $this->View->setPageHeader('Manage Account Groups');
        $this->View->setModalTitle('Edit AccountGroup');
        return $this->View->render('Finance/AccountGroup/index.tpl');
    }
    
    public function get()
    {
        $meta = $this->request->getGet();

        $AccountGroupModel = new AccountGroupModel();   
        $data = [];

        if (!empty($meta['account_group_id']))
        {
            $data = $AccountGroupModel->find((int)$meta['account_group_id'])->populate();
        }

       return  $this->View->renderJsonSuccess(null, $data);
    }

    public function getDataTable()
    {
        $meta = $this->request->getGet();

        $AccountGroupModel = new AccountGroupModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $AccountGroupModel, 'account_group');
    
        $data = [];

        if (!empty($DataTable->searchValue))
        {
            $data = $AccountGroupModel->like($DataTable->getSearchableLike())
                                ->join("account_class", "account_class.account_class_id=account_group.account_class_id")
                                ->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $data = $AccountGroupModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->join("account_class", "account_class.account_class_id=account_group.account_class_id")
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $AccountGroupModel->countAllResults();
        
        return $this->View->renderJsonDataTable($data, $recordsTotal);
    }

    public function post()
    {
        $AccountClass_id = $this->request->getPost('accountclass_id');
        $AccountGroupModel = new AccountGroupModel();
        
        $AccountGroup = $AccountGroupModel->first($accountclass_id);
        if (!empty($id) && empty($AccountGroup->accountclass_id))
        {
            return $this->View->renderJsonFail();
        }

        $AccountGroup = new \App\Entities\Finance\AccountGroup();

        $meta = $this->request->getPost();
        $AccountGroup->fill($meta);
        $AccountGroupModel->save($AccountGroup);

        return $this->View->renderJsonSuccess();
    }

    public function delete()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $AccountGroupModel = new AccountGroupModel();
            $AccountGroup = $AccountGroupModel->delete($id);
        });
        return $this->View->renderJsonSuccess();
    }

    public function restore()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $AccountGroup = new \App\Entities\Finance\AccountGroup();
            $AccountGroup->date_deleted = null;
            $AccountGroupModel = new AccountGroupModel();
            $AccountGroup = $AccountGroupModel->save($AccountGroup);
        });
        return $this->View->renderJsonSuccess();
    }
	//--------------------------------------------------------------------

}
