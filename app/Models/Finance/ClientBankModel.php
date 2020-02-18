<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class ClientBankModel extends BaseModel 
{
    protected $table = 'clientbank';
    protected $primaryKey = 'clientbank_id';
    protected $allowedFields = ['clientbank', 'clientbank_code', 'clientbank_address', 'telno','withdraw_day'];
    protected $returnType = 'App\Entities\Finance\ClientBank';

    protected $validationRules    = [
        'clientbank'     => 'required|min_length[3]'
    ];

    protected $validationMessages = [
        'clientbank'        => [
                'required' => 'Client bank name is required.'
        ]
    ];    
}