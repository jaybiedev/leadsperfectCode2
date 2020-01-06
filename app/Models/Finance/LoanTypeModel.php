<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class LoanTypeModel extends BaseModel 
{
    protected $table = 'loan_type';
    protected $primaryKey = 'loan_type_id';
    protected $allowedFields = ['loan_type_id', 'loan_type', 'eir', 'basis', 'loan_rate', 'loan_interest'];
    protected $returnType = 'App\Entities\Finance\LoanType';
}