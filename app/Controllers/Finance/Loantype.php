<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\LoanTypeModel;

class Loantype extends FinanceBaseController
{
	public function index()
	{   
        $this->View->setPageHeader('Manage Loan Types');
        $this->View->setModalTitle('Edit loan type');
        return $this->View->render('Finance/LoanType/index.tpl');
    }
}
