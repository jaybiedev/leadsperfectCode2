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

        ///
        /* $User = \App\Libraries\Finance\SysConfig::get('BUSINESS_ADDR');
        var_dump($User);
        die;
        */
        ///

        $data = [];

        if ($this->isPost()) {

            $data = ["content"=>''];
            $details = "";
            $filters = $this->request->getPostGet('filter');
            $Report->setFilter($filters);
            
            $header = $Report->getHeader();
            $details = $Report->getReport();

            $data['content'] = $header . $details;
        }

        $data['Filter'] = $Report->getFilter();

        $this->View->setPageHeader('Loan Releases Report');
        $this->View->setModalTitle('Loan Releases Report');
        return $this->View->render('Finance/Report/loan_release.tpl', $data);
    }
}