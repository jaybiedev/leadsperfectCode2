<?php namespace App\Entities\Finance;

use App\Entities\BaseEntity;

class Branch extends BaseEntity
{
    public $branch_id;
    public $branch;
    public $branch_code;
    public $branch_address;
    public $local;
    public $init_balance;
    public $printer_type;
    public $province;
    public $partners;
    public $court;
    public $location;
    public $long;
    public $lati;
    public $swipe;
}