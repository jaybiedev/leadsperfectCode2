<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class BranchModel extends BaseModel 
{
    protected $table = 'branch';
    protected $primaryKey = 'branch_id';
    protected $allowedFields = ['branch', 'branch_code', 'branch_address', '
        local', 'init_balance', 'printer_type', 'province', 'partners', 'court', 'location',
        'long', 'lati', 'swipe'];
    protected $returnType = 'App\Entities\Finance\Branch';
}