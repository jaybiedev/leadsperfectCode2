<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class BankModel extends BaseModel 
{
    protected $table = 'bank';
    protected $primaryKey = 'bank_id';
    protected $allowedFields = ['bank_id', 'bank', 'bank_account', 'branch_id', 'init_balance', 'date_init', 'braccess'];
    protected $returnType = 'App\Entities\Finance\Bank';

    protected $validationRules    = [
        'bank'     => 'required|min_length[3]'
    ];

    protected $validationMessages = [
            'bank'        => [
                    'required' => 'Bank is required.'
            ]
    ];
}