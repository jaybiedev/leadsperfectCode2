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

        protected $validationRules    = [
                'username'     => 'required|min_length[5]',
                'password'     => 'required|min_length[8]',
        ];

        protected $validationMessages = [
                'username'        => [
                        'required' => 'Username is required. Please use at least 5 letters or numbers .'
                ],
                'password'        => [
                        'required' => 'Password is required. Please use at least 8 letters or numbers .'
                ]
        ];
}        