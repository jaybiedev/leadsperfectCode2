<?php namespace App\Controllers\Common;

// use App\Models\StandardsModel;
use App\Controllers\BaseController;

class Standards extends BaseController
{
    public function index()
    {
        $this->View->setPageTitle('Standards');
        return $this->View->render('Common/Standards/index.tpl');
    }

	public function forms()
	{
        $data = [];
        // $StandardsModel = new StandardsModel();
        
        // $data = $StandardsModel->find(1);
    
        //$this->View->addJavaScript("standards.js");
        /*
        echo "<pre>";
        print_r(get_defined_constants());
        print_r($_SERVER);die;
        die;
        */
        $this->View->setPageTitle('Standards - Forms');
        return $this->View->render('Common/Standards/forms.tpl', $data);
	}

	//--------------------------------------------------------------------

}
