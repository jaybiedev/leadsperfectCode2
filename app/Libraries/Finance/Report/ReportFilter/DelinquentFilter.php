<?php 
namespace App\Libraries\Finance\Report\ReportFilter;

class DelinquentFilter extends BaseReportFilter
{
    public $account_id;
    public $date_from;
    public $date_to;
}