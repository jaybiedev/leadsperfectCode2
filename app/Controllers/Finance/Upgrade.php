<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;

class Upgrade extends BaseController
{

    public function index()
    {
        $Upgrade = new \App\Libraries\Common\Upgrade('Finance');
        $Upgrade->addAuditFields();
        $Upgrade->Run();
    }
}
