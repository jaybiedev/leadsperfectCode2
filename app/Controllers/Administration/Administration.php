<?php namespace App\Controllers\Administration;
use App\Controllers\BaseController;
use App\Libraries\Finance\Authenticate;
use App\Models\Common\SysConfigModel;

class Administration extends BaseController
{
    public function index() 
    {
        $data = [];
        $this->View->setPageTitle("Administration");
        
        return $this->View->render("Administration/index.tpl", $data);
    }
}
