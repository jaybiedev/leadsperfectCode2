<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class PartnerModel extends BaseModel 
{
    protected $table = 'partner';
    protected $primaryKey = 'partner_id';
    protected $allowedFields = ['partner_id', 'partner', 'date_deleted', 'user_id_deleted'];
    protected $returnType = 'App\Entities\Finance\Partner';

    protected $validationRules    = [
        'partner'     => 'required|min_length[3]'
    ];

    protected $validationMessages = [
        'partner'        => [
                'required' => 'Partner name is required.'
        ]
    ];     
}