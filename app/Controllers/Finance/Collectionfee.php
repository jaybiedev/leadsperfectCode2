<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\CollectionFeeModel;

class CollectionFee extends FinanceBaseController
{
	public function index()
	{   
        $this->View->setPageHeader('Manage Fees');
        $this->View->setModalTitle('Edit Fees');
        return $this->View->render('Finance/CollectionFee/index.tpl');
    }
    

    public function getDataTable()
    {
        $meta = $this->request->getGet();
		$includeDeleted = false;
		
		if (isset($meta['includeDeleted'])) {
			$includeDeleted = Utils::getBoolean($meta['includeDeleted']);
		}        

        $CollectionFeeModel = new CollectionFeeModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $CollectionFeeModel, 'afrom', 'numeric');
    
        $data = [];

        if (!empty($DataTable->searchValue))
        {
            $CollectionFeeModel->like($DataTable->getSearchableLike());

            if ($includeDeleted)
                $CollectionFeeModel->withDeleted();

            $data = $CollectionFeeModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $CollectionFeeModel->where("type", "C")->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection);

            if ($includeDeleted)
                $CollectionFeeModel->withDeleted();
                
            $data = $CollectionFeeModel->findAllArray($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $CollectionFeeModel->countAllResults();
        
        return $this->View->renderJsonDataTable($data, $recordsTotal);
    }

}
