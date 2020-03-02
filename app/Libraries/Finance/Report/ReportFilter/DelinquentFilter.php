<?php 
namespace App\Libraries\Finance\Report\ReportFilter;

use App\Helpers\Utils;

class DelinquentFilter extends BaseReportFilter
{
    public $account_group_id;
    public $date_asof;
    public $branch_id;
    public $months_delinquent;

    public function __construct() {
        $this->date_asof = Utils::getDate();
        $this->months_delinquent = 2;
        parent::__construct();        
    }
}