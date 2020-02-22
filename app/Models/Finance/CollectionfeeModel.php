<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class CollectionfeeModel extends BaseModel 
{
    protected $table = 'feetable';
    protected $primaryKey = 'feetable_id';
    protected $allowedFields = ['afrom', 'ato', 'fee', 'date_deleted'];
    protected $returnType = 'App\Entities\Finance\CollectionFee';


    public function findAll($limit=null, $offset=null) {
        $this->where('type', 'C');
        return parent::findAll($limit, $offset);
    }

    public function findAllArray($limit=null, $offset=null)
    {
        $this->where('type', 'C');
        return parent::findAll($limit, $offset);
    }
    
}