<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class BankcardModel extends BaseModel 
{
    protected $table = 'bankcard';
    protected $primaryKey = 'bankcard_id';
    protected $allowedFields = ['bankcard_id', 'bankcard'];
    protected $returnType = 'App\Entities\Finance\Bankcard';
}