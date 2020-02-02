<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Libraries\Finance\Report\FactoryReport;
use SebastianBergmann\CodeCoverage\Util;

class Report extends FinanceBaseController
{
	public function index()
	{   
        die('Report Index');
    }

    public function loanreleases()
    {
        $Report = FactoryReport::factory('LoanReleases');
        $data = [];

        if ($this->isPost()) {
            $filters = $this->request->getPostGet('filter');
            $Report->setFilter($filters)->generatetReport();
        }

        $data['Report'] = $Report;
        $this->View->setPageHeader('Loan Releases Report');
        return $this->View->render('Finance/Report/loan_release.tpl', $data);
    }

    public function wperiodic()
    {
        $Report = FactoryReport::factory('WPeriodic');
        $data = [];

        if ($this->isPost()) {
            $filters = $this->request->getPostGet('filter');            
            $Report->setFilter($filters)->generatetReport();
        }

        $data['Report'] = $Report;
        $this->View->setPageHeader('ATM Periodic Withdrawal');
        return $this->View->render('Finance/Report/wperiodic.tpl', $data);
    }
}