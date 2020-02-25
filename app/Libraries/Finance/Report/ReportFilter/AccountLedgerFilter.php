<?php 
namespace App\Libraries\Finance\Report\ReportFilter;

class AccountLedgerFilter extends BaseReportFilter
{
    public $account_id;
    public $releasing_id;
    public $date_from;
    public $date_to;
    public $show_withdrawn = 1;
    public $show_loan_status = 'A'; // A-All B-Balance  F-First P-Paid

    protected $requiredFields = ['account_id'];

}