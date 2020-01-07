<?php namespace App\Entities\Finance;

use App\Entities\BaseEntity;

class Bank extends BaseEntity
{
    public $bank_id;
    public $loan_type;
    public $bank;
    public $branch_id;
    public $bank_account;
    public $date_init;
    public $init_balance;
    public $braccess;
}