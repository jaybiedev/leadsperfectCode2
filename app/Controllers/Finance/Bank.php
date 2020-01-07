<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\BankModel;

class Bank extends FinanceBaseController
{
	public function index()
	{
        $this->View->setPageHeader('Manage Banks');
        $this->View->setModalTitle('Edit Bank');
        return $this->View->render('Finance/Bank/index.tpl');
    }
    
    public function get()
    {
        $meta = $this->request->getGet();

        $BankModel = new BankModel();   
        $data = [];

        if (!empty($meta['bank_id']))
        {
            $data = $BankModel->find((int)$meta['bank_id'])->populate();
        }

       return  $this->View->renderJsonSuccess(null, $data);
    }

    public function getDataTable()
    {
        $meta = $this->request->getGet();

        $BankModel = new BankModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $BankModel, 'bank');
    
        $data = [];

        if (!empty($DataTable->searchValue))
        {
            $data = $BankModel->like($DataTable->getSearchableLike())
                                ->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $data = $BankModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $BankModel->countAllResults();

        /*
        foreach($models as $model)
        {
            $model->populate();

            \App\Helpers\Utils::pprint_r($model->);
            die;
            $data[] = $model->attributes;
        }*/

        //\App\Helpers\Utils::pprint_r($models);
        //die;
        
        return $this->View->renderJsonDataTable($data, $recordsTotal);
/*

        $json = '{
            "draw": 1,
            "recordsTotal": 57,
            "recordsFiltered": 57,
            "data": [
              {
                "id":12,
                "Bank":"Airi",
                "code":"Satou"
              },
              {
                "id":23,
                "Bank":"Angelica",
                "code":"Ramos"
              }
            ]
          }';
          
          return $json;
          */
    }

    public function post()
    {
        $bank_id = $this->request->getPost('bank_id');
        $BankModel = new BankModel();
        
        $Bank = $BankModel->first($bank_id);
        if (!empty($id) && empty($Bank->bank_id))
        {
            return $this->View->renderJsonFail();
        }

        $Bank = new \App\Entities\Finance\Bank();

        $meta = $this->request->getPost();
        $Bank->fill($meta);
        $BankModel->save($Bank);

        return $this->View->renderJsonSuccess();
    }

    public function delete()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $BankModel = new BankModel();
            $Bank = $BankModel->delete($id);
        });
        return $this->View->renderJsonSuccess();
    }

    public function restore()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $Bank = new \App\Entities\Finance\Bank();
            $Bank->date_deleted = null;
            $BankModel = new BankModel();
            $Bank = $BankModel->save($Bank);
        });
        return $this->View->renderJsonSuccess();
    }
	//--------------------------------------------------------------------

}
