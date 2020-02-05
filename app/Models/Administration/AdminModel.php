<?php namespace App\Models\Administration;

use App\Models\BaseModel;

class AdminModel extends BaseModel
{
        protected $table      = 'admin';
        protected $primaryKey = 'admin_id';

        protected $returnType = 'App\Entities\Administration\Admin';
        protected $useSoftDeletes = true;

        protected $allowedFields = ['name', 'username', 'mpassword', 'usergroup', 'sessionid', 'enable'];

        protected $useTimestamps = false;

        protected $validationRules    = [];
        protected $validationMessages = [];
}