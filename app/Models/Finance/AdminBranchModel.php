<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class AdminBranchModel extends BaseModel 
{
    protected $table = 'admin_branch_xref';
    protected $primaryKey = 'id';
    protected $allowedFields = ['branch_id', 'admin_id'];
    protected $returnType = 'array';
}