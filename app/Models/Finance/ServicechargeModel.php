<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class ServicechargeModel extends BaseModel 
{
    protected $table = 'feetable';
    protected $primaryKey = 'feetable_id';
    protected $allowedFields = ['afrom', 'ato', 'fee', 'date_deleted'];
    protected $returnType = 'App\Entities\Finance\ServiceCharge';


    public function findAll($limit=null, $offset=null) {
        $this->where('type', 'S');
        return parent::findAll($limit, $offset);
    }

    public function findAllArray($limit=null, $offset=null)
    {
        $this->where('type', 'S');
        return parent::findAll($limit, $offset);
    }
    
}