<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;

use App\Models\Finance\BranchModel;

class Branch extends BaseController
{
	public function index()
	{
            /*
            $BranchModel = new BranchModel();          
            $data = $BranchModel->find(null);
            */
          
            $this->View->setPageHeader('Manage Branches');
            return $this->View->render('Finance/Branch/index.tpl');
            // return view('Branch/index.php');
	}

    public function get()
    {
        $meta = $this->request->getGet();

        $BranchModel = new BranchModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $BranchModel, 'branch');
    
        $data = [];

        if (!empty($meta['id']))
        {
            $data = $BranchModel->find($meta['id']);
        }
        elseif (!empty($DataTable->searchValue))
        {
            $data = $BranchModel->like($DataTable->getSearchableLike())
                                ->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $data = $BranchModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $BranchModel->countAllResults();

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
                "Branch":"Airi",
                "code":"Satou"
              },
              {
                "id":23,
                "Branch":"Angelica",
                "code":"Ramos"
              }
            ]
          }';
          
          return $json;
          */
    }

    public function post()
    {
        $id = $this->request->getPost('id');
        $BranchModel = new BranchModel();
        
        $Branch = $BranchModel->first($id);
        if (!empty($id) && empty($Branch->id))
        {
            return $this->View->renderJsonFail();
        }

        $Branch = new \App\Entities\Finance\Branch();

        $meta = $this->request->getPost();
        $Branch->fill($meta);
        $BranchModel->save($Branch);

        return $this->View->renderJsonSuccess();
    }

    public function delete()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $BranchModel = new BranchModel();
            $Branch = $BranchModel->delete($id);
        });
        return $this->View->renderJsonSuccess();
    }

    public function restore()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $Branch = new \App\Entities\Finance\Branch();
            $Branch->date_deleted = null;
            $BranchModel = new BranchModel();
            $Branch = $BranchModel->save($Branch);
        });
        return $this->View->renderJsonSuccess();
    }
	//--------------------------------------------------------------------

}
