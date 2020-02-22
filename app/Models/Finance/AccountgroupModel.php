<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class AccountgroupModel extends BaseModel 
{
    protected $table = 'account_group';
    protected $primaryKey = 'account_group_id';
    protected $allowedFields = ['account_group_id', 'account_group', 'date_deleted'];
    protected $returnType = 'App\Entities\Finance\AccountGroup';
}