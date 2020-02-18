<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class AccountModel extends BaseModel 
{
    protected $table = 'account';
    protected $primaryKey = 'account_id';
    protected $returnType = 'App\Entities\Finance\Account';

    protected $allowedFields = [
        'account_id',
        'account',
        'account_status',
        'address',
        'telno',
        'ofc_telno',
        'office',
        'ofc_address',
        'remarks',
        'audit',
        'account_code',
        'account_group_id',
        'comaker1',
        'comaker1_address',
        'comaker2',
        'comaker2_address',
        'income',
        'civil_status',
        'collection_type_id',
        'bank_account',
        'salary',
        'sss',
        'pix',
        'clientbank_id',
        'bank_pin',
        'branch_id',
        'withdraw_day',
        'date_atm_in',
        'date_atm_out',
        'bank_cardno',
        'date_birth',
        'gender',
        'age',
        'mclass',
        'date_child21',
        'npension',
        'nchangebank',
        'spouse',
        'spouse_sss',
        'comaker1_relation',
        'comaker2_relation',
        'smartno',
        'current_day',
        'pensionpin',
        'regdate',
        'mactivate',
        'date_child21b',
        'date_child21c',
        'date_child21d',
        'ecamount',
        'member',
        'disability',
        'child1',
        'child2',
        'child3',
        'child4',
        'wday',
        'firstname',
        'lastname',
        'middlename',
        'date_created',
        'date_modified',
        'date_deleted',
        'user_id_created',
        'user_id_modified',
        'user_id_deleted',
    ];

    protected $validationRules    = [
        'account'     => 'required|alpha_numeric_space|min_length[3]',
    ];

    protected $validationMessages = [
            'account'        => [
                    'required' => 'Account name is required.'
            ]
    ];
}