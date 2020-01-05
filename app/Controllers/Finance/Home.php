<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Libraries\Finance\Authenticate;

class Home extends FinanceBaseController
{

    public function index()
    {
        var_dump(Authenticate::isLogged($this->Session));
        return $this->View->render("Finance/Home/index.tpl");
    }
}
