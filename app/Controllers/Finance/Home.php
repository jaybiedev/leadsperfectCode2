<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;

class Home extends BaseController
{

    public function index()
    {
        return $this->View->render("Finance/Home/index.tpl");
    }
}
