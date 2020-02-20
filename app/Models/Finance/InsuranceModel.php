<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class InsuranceModel extends BaseModel 
{
    protected $table = 'insurance';
    protected $primaryKey = 'insurance_id';
    protected $allowedFields = ['date', 'releasing_id', 'insurance_id', 'account_id', 
        'debit', 'credit', 'status', 'remark', 'audit', 'admin_id',
        'reference', 'apmonth', 'apterm', 'termbal', 'datefrom', 'dateto', 'date_deleted'];
}