<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\AccountClassModel;

class AccountClass extends FinanceBaseController
{
	public function index()
	{   
        $this->View->setPageHeader('Manage Account Classifications');
        $this->View->setModalTitle('Edit AccountClass');
        return $this->View->render('Finance/AccountClass/index.tpl');
    }
}
