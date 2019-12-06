<?php namespace App\Models\Finance;

use App\Models\BaseModel;

class UserModel extends BaseModel
{
        protected $table      = 'users';
        protected $primaryKey = 'id';

        protected $returnType = 'array';
        protected $useSoftDeletes = true;

        protected $allowedFields = ['name', 'email'];

        protected $useTimestamps = false;

        protected $validationRules    = [];
        protected $validationMessages = [];
}