<?php namespace App\Entities\Finance;

use App\Entities\BaseEntity;

class PaymentHeader extends BaseEntity
{
    public $payment_header_id;
	public $reference;
	public $date;
	public $total_amount;
	public $name;
	public $remarks;
	public $admin_id;
	public $ip;
	public $audit;
	public $mcheck;
	public $account_group_id;
	public $clientbank_id;
	public $date_withdrawn;
	public $withdraw_day;
	public $entry_type;
	public $status;
	public $branch_id;
	public $intearned;
	public $discrem;
	public $whatclaim;
	public $date_created;
	public $date_modified;
	public $date_deleted;
	public $user_id_created;
	public $user_id_modified;
	public $user_id_deleted;

}