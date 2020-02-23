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
    
    public function aging()
    {
        $Report = FactoryReport::factory('Aging');
        $data = [];

        if ($this->isPost()) {
            $filters = $this->request->getPostGet('filter');           
            $Report->setFilter($filters)->generatetReport();
        }

        $data['Report'] = $Report;
        $this->View->setPageHeader('Aging of Accounts Report');
        return $this->View->render('Finance/Report/aging.tpl', $data);
    }

    public function example()
    {
        $Report = FactoryReport::factory('Example');
        $data = [];

        if ($this->isPost()) {
            $filters = $this->request->getPostGet('filter');           
            $Report->setFilter($filters)->generatetReport();
        }

        $data['Report'] = $Report;
        $this->View->setPageHeader('Example Report');
        return $this->View->render('Finance/Report/example.tpl', $data);
    }

    public function activeaccount()
    {
        $Report = FactoryReport::factory('ActiveAccount');
        $data = [];

        if ($this->isPost()) {
            $filters = $this->request->getPostGet('filter');           
            $Report->setFilter($filters)->generatetReport();
        }

        $data['Report'] = $Report;
        $this->View->setPageHeader('Active Account Report');
        return $this->View->render('Finance/Report/activeaccount.tpl', $data);
    }

    public function accountledger_oldledger()
    {
        $Report = FactoryReport::factory('AccountLedger');
        $data = [];

        if ($this->isPost()) {
            $filters = $this->request->getPostGet('filter');           
            $Report->setFilter($filters)->generatetReport();
        }

        $data['Report'] = $Report;
        $this->View->setPageHeader('Account Ledger Report');
        return $this->View->render('Finance/Report/accountledger_oldledger.tpl', $data);
    }

    public function nonmoving()
    {
        $Report = FactoryReport::factory('NonMoving');
        $data = [];

        if ($this->isPost()) {
            $filters = $this->request->getPostGet('filter');           
            $Report->setFilter($filters)->generatetReport();
        }

        $data['Report'] = $Report;
        $this->View->setPageHeader('Non-Moving Report');
        return $this->View->render('Finance/Report/nonmoving.tpl', $data);
    }

    public function customers2()
    {
        $Report = FactoryReport::factory('CustomerListing');
        $data = [];

        if ($this->isPost()) {
            $filters = $this->request->getPostGet('filter');           
            $Report->setFilter($filters)->generatetReport();
        }

        $data['Report'] = $Report;
        $this->View->setPageHeader('Customer Listing Report');
        return $this->View->render('Finance/Report/customers2.tpl', $data);
    }

    public function delinquent()
    {
        $Report = FactoryReport::factory('Delinquent');
        $data = [];

        if ($this->isPost()) {
            $filters = $this->request->getPostGet('filter');           
            $Report->setFilter($filters)->generatetReport();
        }

        $data['Report'] = $Report;
        $this->View->setPageHeader('Delinquent Accounts Report');
        return $this->View->render('Finance/Report/delinquent.tpl', $data);
    }

    public function fundtransfer()
    {
        $Report = FactoryReport::factory('FundTransfer');
        $data = [];

        if ($this->isPost()) {
            $filters = $this->request->getPostGet('filter');           
            $Report->setFilter($filters)->generatetReport();
        }

        $data['Report'] = $Report;
        $this->View->setPageHeader('Fund Transfer Report');
        return $this->View->render('Finance/Report/fundtransfer.tpl', $data);
    }

    public function atmmonitor()
    {
        $Report = FactoryReport::factory('ATMMonitor');
        $data = [];

        if ($this->isPost()) {
            $filters = $this->request->getPostGet('filter');           
            $Report->setFilter($filters)->generatetReport();
        }

        $data['Report'] = $Report;
        $this->View->setPageHeader('ATM Monitor Report');
        return $this->View->render('Finance/Report/atmmonitor.tpl', $data);
    }
}