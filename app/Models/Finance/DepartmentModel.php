<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class DepartmentModel extends BaseModel 
{
    protected $table = 'department';
    protected $allowedFields = ['department'];
    protected $returnType = 'App\Entities\Finance\Department';
}