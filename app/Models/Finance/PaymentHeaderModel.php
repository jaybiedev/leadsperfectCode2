<?php namespace App\Models\Finance;

use App\Models\BaseModel;

class PaymentHeaderModel extends BaseModel
{
    protected $table      = 'payment_header';
    protected $primaryKey = 'payment_header_id';

    protected $returnType = 'App\Entities\Finance\PaymentHeader';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'payment_header_id',
		'reference',
		'date',
		'total_amount',
		'name',
		'remarks',
		'admin_id',
		'ip',
		'audit',
		'mcheck',
		'account_group_id',
		'clientbank_id',
		'date_withdrawn',
		'withdraw_day',
		'entry_type',
		'status',
		'branch_id',
		'intearned',
		'discrem',
		'whatclaim',
		'date_created',
		'date_modified',
		'date_deleted',
		'user_id_created',
		'user_id_modified',
		'user_id_deleted'
        ];   
        
    protected $useTimestamps = false;

    protected $PaymentDetails = [];

	protected $validationRules    = [
		'date'     => 'required',
		'account_group_id'  => 'required',
	];

	protected $validationMessages = [
			'date'        => [
					'required' => 'Payment Date is requried.'
			],
			'account_group_id'        => [
				'required' => 'Payment account group is required.'
			]			
	];

    public function addPaymentDetails() {
        //
    }

    public function getPaymentDetails() {
        //
    }
}