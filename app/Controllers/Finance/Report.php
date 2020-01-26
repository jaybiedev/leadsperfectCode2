<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Helpers\Finance\Report\FactoryReport;

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
            $Report->setFilters($filters);
            var_dump($Report);

            die;
        }

        $this->View->setPageHeader('Loan Releases Report');
        $this->View->setModalTitle('Loan Releases Report');
        return $this->View->render('Finance/Report/loan_release.tpl', $data);
    }
}