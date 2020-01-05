<?php namespace App\Models\Finance;

use App\Models\BaseModel;

class UserModel extends BaseModel
{
        protected $table      = 'admin';
        protected $primaryKey = 'admin_id';

        protected $returnType = 'App\Entities\Finance\User';
        protected $useSoftDeletes = true;

        protected $allowedFields = ['name', 'username', 'mpassword', 'usergroup', 'sessionid', 'enable'];

        protected $useTimestamps = false;

        protected $validationRules    = [];
        protected $validationMessages = [];
}