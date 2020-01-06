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
    
    public function get()
    {
        $meta = $this->request->getGet();

        $CollectionFeeModel = new CollectionFeeModel();   
        $data = [];

        if (!empty($meta['feetable_id']))
        {
            $data = $CollectionFeeModel->find((int)$meta['feetable_id'])->populate();
        }

       return  $this->View->renderJsonSuccess(null, $data);
    }

    public function getDataTable()
    {
        $meta = $this->request->getGet();

        $CollectionFeeModel = new CollectionFeeModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $CollectionFeeModel, 'afrom', 'numeric');
    
        $data = [];

        if (!empty($DataTable->searchValue))
        {
            $data = $CollectionFeeModel->like($DataTable->getSearchableLike())
                                ->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $data = $CollectionFeeModel->where("type", "C")->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $CollectionFeeModel->countAllResults();
        
        return $this->View->renderJsonDataTable($data, $recordsTotal);
    }

    public function post()
    {
        $feetable_id = $this->request->getPost('feetable_id');
        $CollectionFeeModel = new CollectionFeeModel();
        
        $CollectionFee = $CollectionFeeModel->first($feetable_id);
        if (!empty($id) && empty($CollectionFee->feetable_id))
        {
            return $this->View->renderJsonFail();
        }

        $CollectionFee = new \App\Entities\Finance\CollectionFee();

        $meta = $this->request->getPost();
        $CollectionFee->fill($meta);
        $CollectionFeeModel->save($CollectionFee);

        return $this->View->renderJsonSuccess();
    }

    public function delete()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $CollectionFeeModel = new CollectionFeeModel();
            $CollectionFee = $CollectionFeeModel->delete($id);
        });
        return $this->View->renderJsonSuccess();
    }

    public function restore()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $CollectionFee = new \App\Entities\Finance\CollectionFee();
            $CollectionFee->date_deleted = null;
            $CollectionFeeModel = new CollectionFeeModel();
            $CollectionFee = $CollectionFeeModel->save($CollectionFee);
        });
        return $this->View->renderJsonSuccess();
    }
	//--------------------------------------------------------------------

}
