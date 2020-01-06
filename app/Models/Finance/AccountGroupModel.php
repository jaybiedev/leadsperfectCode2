<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class AccountGroupModel extends BaseModel 
{
    protected $table = 'account_group';
    protected $primaryKey = 'account_group_id';
    protected $allowedFields = ['account_group_id', 'account_group'];
    protected $returnType = 'App\Entities\Finance\AccountGroup';
}