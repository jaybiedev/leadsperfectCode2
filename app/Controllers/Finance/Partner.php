<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\PartnerModel;

class Partner extends FinanceBaseController
{
	public function index()
	{   
        $this->View->setPageHeader('Manage Partners');
        $this->View->setModalTitle('Edit Partner');
        return $this->View->render('Finance/Partner/index.tpl');
    }
}
