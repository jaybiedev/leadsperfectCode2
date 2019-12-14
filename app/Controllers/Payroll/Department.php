<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;

use App\Models\Finance\DepartmentModel;

class Department extends BaseController
{
	public function index()
	{
            /*
            $DepartmentModel = new DepartmentModel();          
            $data = $DepartmentModel->find(null);
            */
          
            $this->View->setPageHeader('Manage Departments');
            $this->View->setPageDescription('Add, edit, delete departments here.');
            return $this->View->render('Finance/Department/index.tpl');
            // return view('Department/index.php');
	}

    public function get()
    {
        
        // print_r($this->request->getGet());
        // die;
        
        $meta = $this->request->getGet();
        $DepartmentModel = new DepartmentModel();    
        
        if (!empty($meta['id']))
            $data = $DepartmentModel->find($meta['id']);
        else
            $data = $DepartmentModel->findAllArray();
        
        return $this->View->renderJsonDataTable($data, 1);
        /*
        $json = '{
            "draw": 1,
            "recordsTotal": 57,
            "recordsFiltered": 57,
            "data": [
              {
                "id":12,
                "department":"Airi",
                "code":"Satou"
              },
              {
                "id":23,
                "department":"Angelica",
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
        $DepartmentModel = new DepartmentModel();
        
        $Department = $DepartmentModel->first($id);
        if (!empty($id) && empty($Department->id))
        {
            return $this->View->renderJsonFail();
        }

        $Department = new \App\Entities\Finance\Department();

        $meta = $this->request->getPost();
        $Department->fill($meta);
        $DepartmentModel->save($Department);

        return $this->View->renderJsonSuccess();
    }

    public function delete()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $DepartmentModel = new DepartmentModel();
            $Department = $DepartmentModel->delete($id);
        });
        return $this->View->renderJsonSuccess();
    }

    public function restore()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $Department = new \App\Entities\Finance\Department();
            $Department->date_deleted = null;
            $DepartmentModel = new DepartmentModel();
            $Department = $DepartmentModel->save($Department);
        });
        return $this->View->renderJsonSuccess();
    }
	//--------------------------------------------------------------------

}
