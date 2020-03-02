<?php 
namespace App\Libraries\Finance\Report\ReportFilter;

use App\Helpers\Utils;

class ActiveAccountFilter extends BaseReportFilter
{
    public $account_group_id;
    public $date_asof;
    public $branch_id;

    public function __construct() {
        $this->date_asof = Utils::getDate();
        parent::__construct();        
    }
}