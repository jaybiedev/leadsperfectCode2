<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\ClientBankModel;

class ClientBank extends FinanceBaseController
{
	public function index()
	{   
        $this->View->setPageHeader('Manage Client Banks');
        $this->View->setModalTitle('Edit Client Bank');
        return $this->View->render('Finance/ClientBank/index.tpl');
    }
}
