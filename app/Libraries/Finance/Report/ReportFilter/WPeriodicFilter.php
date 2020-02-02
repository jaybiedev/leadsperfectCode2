<?php 
namespace App\Libraries\Finance\Report\ReportFilter;

class WPeriodicFilter extends BaseReportFilter
{
    public $criteriaBy;
    public $date_from;
    public $date_to;
    public $control_number_from;
    public $control_number_to;
    public $account_class_id;
    public $branch_id;
    public $show_posted;
}