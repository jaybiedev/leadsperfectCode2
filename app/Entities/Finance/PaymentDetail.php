<?php namespace App\Entities\Finance;

use App\Entities\BaseEntity;

class PaymentDetail extends BaseEntity
{
    public $payment_detail_id;
	public $payment_header_id;
	public $account_id;
	public $amount;
	public $delete;
	public $releasing_id;
	public $ddate;
	public $mconfirm;
	public $withdrawn;
	public $excess;
	public $remark;
	public $discount;
	public $mischarge;
	public $gawad;
	public $otherincome;
	public $date_created;
	public $date_modified;
	public $date_deleted;
	public $user_id_created;
	public $user_id_modified;
	public $user_id_deleted;

}