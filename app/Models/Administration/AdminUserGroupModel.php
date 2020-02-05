<?php namespace App\Models\Administration;
use App\Models\BaseModel;

class AdminUserGroupModel extends BaseModel 
{
    protected $table = 'adminusergroup';
    protected $primaryKey = 'adminusergroup_id';
    protected $allowedFields = ['adminusergroup_id', 'usergroup', 'adminusergroup'];
    protected $returnType = 'App\Entities\Administration\AdminUserGroup';
}