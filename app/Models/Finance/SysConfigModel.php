<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class SysConfigModel extends BaseModel 
{
    protected $table = 'sysconfig';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'sysconfig', 'value', 'enable'];
}