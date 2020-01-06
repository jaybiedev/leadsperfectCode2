<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class PartnerModel extends BaseModel 
{
    protected $table = 'partner';
    protected $primaryKey = 'partner_id';
    protected $allowedFields = ['partner_id', 'partner'];
    protected $returnType = 'App\Entities\Finance\Partner';
}