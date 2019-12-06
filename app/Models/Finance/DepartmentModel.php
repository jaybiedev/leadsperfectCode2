<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class DepartmentModel extends BaseModel 
{
    protected $table = 'department';
    protected $allowedFields = ['name'];
}