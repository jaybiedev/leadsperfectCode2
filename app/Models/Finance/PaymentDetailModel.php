<?php namespace App\Models\Finance;

use App\Models\BaseModel;

class PaymentDetailModel extends BaseModel
{
    protected $table      = 'payment_detail';
    protected $primaryKey = 'payment_detail_id';

    protected $returnType = 'App\Entities\Finance\PaymentDetail';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'payment_detail_id',
		'payment_header_id',
		'account_id',
		'amount',
		'delete',
		'releasing_id',
		'ddate',
		'mconfirm',
		'withdrawn',
		'excess',
		'remark',
		'discount',
		'mischarge',
		'gawad',
		'otherincome',
		'date_created',
		'date_modified',
		'date_deleted',
		'user_id_created',
		'user_id_modified',
		'user_id_deleted'
        ];   
        
	protected $useTimestamps = false;
	
	protected $validationRules    = [
		'date'     => 'required',
		'account_id'     => 'required',
		'payment_header_id'  => 'required',
		'releasing_id'  => 'required',
	];

	protected $validationMessages = [
		'account_id' => [
			'required' => 'Payment account is required.'
		],	
		'payment_header_id' => [
			'required' => 'Payment needs to belong in a payment group.'
		],
		'releasing_id' => [
			'required' => 'Payment requires to be associated with loan releasing.'
		],
	];
}