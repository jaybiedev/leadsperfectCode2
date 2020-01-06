<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\LoanTypeModel;

class Loantype extends FinanceBaseController
{
	public function index()
	{   
        $this->View->setPageHeader('Manage Loan Types');
        $this->View->setModalTitle('Edit loan type');
        return $this->View->render('Finance/LoanType/index.tpl');
    }
    
    public function get()
    {
        $meta = $this->request->getGet();

        $LoanTypeModel = new LoanTypeModel();   
        $data = [];

        if (!empty($meta['loan_type_id']))
        {
            $data = $LoanTypeModel->find((int)$meta['loan_type_id'])->populate();
        }

       return  $this->View->renderJsonSuccess(null, $data);
    }

    public function getDataTable()
    {
        $meta = $this->request->getGet();

        $LoanTypeModel = new LoanTypeModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $LoanTypeModel, 'loan_type');
    
        $data = [];

        if (!empty($DataTable->searchValue))
        {
            $data = $LoanTypeModel->like($DataTable->getSearchableLike())
                                ->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $data = $LoanTypeModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $LoanTypeModel->countAllResults();
        
        return $this->View->renderJsonDataTable($data, $recordsTotal);
    }

    public function post()
    {
        $loan_type_id = $this->request->getPost('loan_type_id');
        $LoanTypeModel = new LoanTypeModel();
        
        $LoanType = $LoanTypeModel->first($loan_type_id);
        if (!empty($id) && empty($LoanType->loan_type_id))
        {
            return $this->View->renderJsonFail();
        }

        $LoanType = new \App\Entities\Finance\LoanType();

        $meta = $this->request->getPost();
        $LoanType->fill($meta);
        $LoanTypeModel->save($LoanType);

        return $this->View->renderJsonSuccess();
    }

    public function delete()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $LoanTypeModel = new LoanTypeModel();
            $LoanType = $LoanTypeModel->delete($id);
        });
        return $this->View->renderJsonSuccess();
    }

    public function restore()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $LoanType = new \App\Entities\Finance\LoanType();
            $LoanType->date_deleted = null;
            $LoanTypeModel = new LoanTypeModel();
            $LoanType = $LoanTypeModel->save($LoanType);
        });
        return $this->View->renderJsonSuccess();
    }
	//--------------------------------------------------------------------

}
