<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class AccountClassModel extends BaseModel 
{
    protected $table = 'account_class';
    protected $primaryKey = 'account_class_id';
    protected $allowedFields = ['account_class_id', 'account_class', 'date_deleted'];
    protected $returnType = 'App\Entities\Finance\AccountClass';

    protected $validationRules    = [
        'account_class'     => 'required|min_length[3]'
    ];

    protected $validationMessages = [
            'account_class'        => [
                    'required' => 'Account Classification is required.'
            ]
    ];
}