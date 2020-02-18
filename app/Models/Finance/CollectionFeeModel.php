<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class CollectionFeeModel extends BaseModel 
{
    protected $table = 'feetable';
    protected $primaryKey = 'feetable_id';
    protected $allowedFields = ['afrom', 'ato', 'fee'];
    protected $returnType = 'App\Entities\Finance\CollectionFee';
    
}