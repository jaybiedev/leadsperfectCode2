<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\PartnerModel;

class Report extends FinanceBaseController
{
	public function index()
	{   
        die('Report Index');
    }

    public function loanreleases()
    {
        $this->View->setPageHeader('Loan Releases Report');
        $this->View->setModalTitle('Loan Releases Report');
        return $this->View->render('Finance/Report/loan_release.tpl');
    }
}