<?php namespace App\Entities\Finance;

use App\Entities\BaseEntity;

class ClientBank extends BaseEntity
{
    public $clientbank_id;
    public $clientbank;
    public $clientbank_code;
    public $clientbank_address;
    public $telno;
    public $withdraw_day;
}