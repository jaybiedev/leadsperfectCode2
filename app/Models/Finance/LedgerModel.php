<?php namespace App\Models\Finance;

use App\Models\BaseModel;

class LedgerModel extends BaseModel
{
    protected $table      = 'ledger';
    protected $primaryKey = 'ledger_id';

    protected $returnType = 'App\Entities\Finance\Ledger';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'ledger_id',
		'account_id',
		'reference',
		'date',
		'type',
		'remarks',
		'debit',
		'credit',
		'releasing_id',
		'status',
		'admin_id',
		'date_created',
		'date_modified',
		'date_deleted',
		'user_id_created',
		'user_id_modified',
		'user_id_deleted'
        ];   
        
    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];                 
}