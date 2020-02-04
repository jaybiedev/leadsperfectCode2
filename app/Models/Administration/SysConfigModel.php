<?php namespace App\Models\Administration;
use App\Models\BaseModel;

class SysConfigModel extends BaseModel 
{
    protected $table = 'sysconfig';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'sysconfig', 'value', 'enable'];
}