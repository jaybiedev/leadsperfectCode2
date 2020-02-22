<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\CollectionfeeModel;

class CollectionFee extends FinanceBaseController
{
	public function index()
	{   
        $this->View->setPageHeader('Manage Collection Fees');
        $this->View->setModalTitle('Edit Collection Fee');
        return $this->View->render('Finance/CollectionFee/index.tpl');
    }
    

    public function getDataTable()
    {
        $meta = $this->request->getGet();
		$includeDeleted = false;
		
		if (isset($meta['includeDeleted'])) {
			$includeDeleted = Utils::getBoolean($meta['includeDeleted']);
		}        

        $CollectionFeeModel = new CollectionfeeModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $CollectionFeeModel, 'afrom', 'numeric');
    
        $data = [];

        if (!empty($DataTable->searchValue))
        {
            $CollectionFeeModel->like($DataTable->getSearchableLike(['ato', 'afrom', 'fee']));

            if ($includeDeleted)
                $CollectionFeeModel->withDeleted();

            $data = $CollectionFeeModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->asArray()
                                ->findAll($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $CollectionFeeModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection);

            if ($includeDeleted)
                $CollectionFeeModel->withDeleted();
                
            $data = $CollectionFeeModel->asArray()->findAll($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $CollectionFeeModel->countResults();

        return $this->View->renderJsonDataTable($data, $recordsTotal);
    }

}
