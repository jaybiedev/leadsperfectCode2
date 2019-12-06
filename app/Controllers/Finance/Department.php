<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;

use App\Models\Finance\DepartmentModel;

class Department extends BaseController
{
	public function index()
	{
            $DepartmentModel = new DepartmentModel();
          
            $data = $DepartmentModel->find(1);
            print_r($data);

            $this->View->setPageTitle('Department');
            return $this->View->render('Finance/Department/index.tpl', $data);
            // return view('Department/index.php');
	}

	//--------------------------------------------------------------------

}
