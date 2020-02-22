<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\ServicechargeModel;

class Servicecharge extends FinanceBaseController
{
	public function index()
	{   
        $this->View->setPageHeader('Manage Service Charges');
        $this->View->setModalTitle('Edit Service Charge');
        return $this->View->render('Finance/ServiceCharge/index.tpl');
    }
    

    public function getDataTable()
    {
        $meta = $this->request->getGet();
		$includeDeleted = false;
		
		if (isset($meta['includeDeleted'])) {
			$includeDeleted = Utils::getBoolean($meta['includeDeleted']);
		}        

        $ServicechargeModel = new ServicechargeModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $ServicechargeModel, 'afrom', 'numeric');
    
        $data = [];

        if (!empty($DataTable->searchValue))
        {
            $ServicechargeModel->like($DataTable->getSearchableLike(['ato', 'afrom', 'fee']));

            if ($includeDeleted)
                $ServicechargeModel->withDeleted();

            $data = $ServicechargeModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->asArray()
                                ->findAll($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $ServicechargeModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection);

            if ($includeDeleted)
                $ServicechargeModel->withDeleted();
                
            $data = $ServicechargeModel->asArray()->findAll($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $ServicechargeModel->countResults();

        return $this->View->renderJsonDataTable($data, $recordsTotal);
    }

}
