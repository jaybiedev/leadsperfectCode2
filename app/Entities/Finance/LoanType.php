<?php namespace App\Entities\Finance;

use App\Entities\BaseEntity;

class LoanType extends BaseEntity
{
    public $loan_type_id;
    public $loan_type;
    public $loan_rate;
    public $eir;
    public $basis;
    public $loan_interest;
}