<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\AccountClassModel;

class AccountClass extends FinanceBaseController
{
	public function index()
	{   
        $this->View->setPageHeader('Manage Account Classifications');
        $this->View->setModalTitle('Edit AccountClass');
        return $this->View->render('Finance/AccountClass/index.tpl');
    }
    
    public function get()
    {
        $meta = $this->request->getGet();

        $AccountClassModel = new AccountClassModel();   
        $data = [];

        if (!empty($meta['account_class_id']))
        {
            $data = $AccountClassModel->find((int)$meta['account_class_id'])->populate();
        }

       return  $this->View->renderJsonSuccess(null, $data);
    }

    public function getDataTable()
    {
        $meta = $this->request->getGet();

        $AccountClassModel = new AccountClassModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $AccountClassModel, 'account_class');
    
        $data = [];

        if (!empty($DataTable->searchValue))
        {
            $data = $AccountClassModel->like($DataTable->getSearchableLike())
                                ->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $data = $AccountClassModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $AccountClassModel->countAllResults();
        
        return $this->View->renderJsonDataTable($data, $recordsTotal);
    }

    public function post()
    {
        $AccountClass_id = $this->request->getPost('AccountClass_id');
        $AccountClassModel = new AccountClassModel();
        
        $AccountClass = $AccountClassModel->first($AccountClass_id);
        if (!empty($id) && empty($AccountClass->AccountClass_id))
        {
            return $this->View->renderJsonFail();
        }

        $AccountClass = new \App\Entities\Finance\AccountClass();

        $meta = $this->request->getPost();
        $AccountClass->fill($meta);
        $AccountClassModel->save($AccountClass);

        return $this->View->renderJsonSuccess();
    }

    public function delete()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $AccountClassModel = new AccountClassModel();
            $AccountClass = $AccountClassModel->delete($id);
        });
        return $this->View->renderJsonSuccess();
    }

    public function restore()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $AccountClass = new \App\Entities\Finance\AccountClass();
            $AccountClass->date_deleted = null;
            $AccountClassModel = new AccountClassModel();
            $AccountClass = $AccountClassModel->save($AccountClass);
        });
        return $this->View->renderJsonSuccess();
    }
	//--------------------------------------------------------------------

}
