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
        $start = $meta['start'] ?: 0;
        $length = $meta['length'] ?: 10;
        $BranchModel = new BranchModel();   
        $data = [];

        $order = $meta['order'][0];
        $order_field = $order['column'] > 0 ? $meta['columns'][$order['column']]['data'] : 'branch';
        $order_direction = $order['dir'];

        if (!empty($meta['id']))
        {
            $data = $BranchModel->find($meta['id']);
        }
        elseif (!empty($meta['search']['value']))
        {
            $search = $meta['search']['value'];
            $data = $BranchModel->like(['lower(branch)' => '%' . strtolower($search) . '%'])
                                ->orderBy("LOWER({$order_field})", $order_direction)
                                ->findAllArray($length, $start);
        }
        else
        {
            $data = $BranchModel->orderBy("LOWER({$order_field})", $order_direction)->findAllArray($length, $start);
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
        Array
        (
            [draw] => 1
            [columns] => Array
                (
                    [0] => Array
                        (
                            [data] => branch_id
                            [name] => 
                            [searchable] => true
                            [orderable] => true
                            [search] => Array
                                (
                                    [value] => 
                                    [regex] => false
                                )

                        )

                    [1] => Array
                        (
                            [data] => branch
                            [name] => 
                            [searchable] => true
                            [orderable] => true
                            [search] => Array
                                (
                                    [value] => 
                                    [regex] => false
                                )

                        )

                    [2] => Array
                        (
                            [data] => branch_code
                            [name] => 
                            [searchable] => true
                            [orderable] => true
                            [search] => Array
                                (
                                    [value] => 
                                    [regex] => false
                                )

                        )

                    [3] => Array
                        (
                            [data] => branch_address
                            [name] => 
                            [searchable] => true
                            [orderable] => true
                            [search] => Array
                                (
                                    [value] => 
                                    [regex] => false
                                )

                        )

                )

            [order] => Array
                (
                    [0] => Array
                        (
                            [column] => 0
                            [dir] => asc
                        )

                )

            [start] => 0
            [length] => 10
            [search] => Array
                (
                    [value] => 
                    [regex] => false
                )

            [_] => 1576300710725
        )


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
