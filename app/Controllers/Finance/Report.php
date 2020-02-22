<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Libraries\Finance\Report\FactoryReport;
use SebastianBergmann\CodeCoverage\Util;

class Report extends FinanceBaseController
{
	public function index()
	{   
        $this->redirectTo("/finance");
    }

    public function loanreleases()
    {
        $Report = FactoryReport::factory('LoanReleases');
        $data = [];

        if ($this->isPost()) {
            $filters = $this->request->getPostGet('filter');
            $this->View->disablePageHeader();
            $Report->setFilter($filters)->generatetReport();
        }

        $data['Report'] = $Report;
        $this->View->setPageHeader('Loan Releases Report');
        return $this->View->render('Finance/Report/loan_release.tpl', $data);
    }

    public function withdrawperiodic()
    {
        $Report = FactoryReport::factory('WithdrawPeriodic');
        $data = [];

        if ($this->isPost()) {
            $filters = $this->request->getPostGet('filter');            
            $Report->setFilter($filters)->generatetReport();
        }

        $data['Report'] = $Report;
        $this->View->setPageHeader('ATM Periodic Withdrawal');
        return $this->View->render('Finance/Report/withdrawperiodic.tpl', $data);
    }

    public function withdrawindividual()
    {
        $Report = FactoryReport::factory('WithdrawIndividual');
        $data = [];

        if ($this->isPost()) {
            $filters = $this->request->getPostGet('filter');           
            $Report->setFilter($filters)->generatetReport();
        }

        $data['Report'] = $Report;
        $this->View->setPageHeader('Individual Withdrawal Report');
        return $this->View->render('Finance/Report/withdrawindividual.tpl', $data);
    }
    
}