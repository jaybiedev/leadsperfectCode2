<?php namespace App\Entities\Finance;

use App\Entities\BaseEntity;

class Department extends BaseEntity
{
    public $id;
    public $department;
    public $code;
    public $enabled;
}