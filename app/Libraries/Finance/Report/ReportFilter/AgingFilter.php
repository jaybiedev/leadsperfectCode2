<?php 
namespace App\Libraries\Finance\Report\ReportFilter;

class AgingFilter extends BaseReportFilter
{
    public $account_group_id;
    public $date_from;
    public $date_to;
    public $recalculate = 0;
}