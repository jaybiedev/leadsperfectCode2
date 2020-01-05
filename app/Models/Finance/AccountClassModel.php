<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class AccountClassModel extends BaseModel 
{
    protected $table = 'account_class';
    protected $primaryKey = 'account_class_id';
    protected $allowedFields = ['account_class_id', 'account_class'];
    protected $returnType = 'App\Entities\Finance\AccountClass';
}