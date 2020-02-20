<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class AdminRightsModel extends BaseModel 
{
    protected $table = 'adminrights';
    protected $primaryKey = 'adminrights_id';
    protected $allowedFields = ['adminrights_id', 'admin_id', 'module', 'madd', 'medit', 'mdelete', 'date_deleted'];
    protected $returnType = 'App\Entities\Finance\AdminRights';
}