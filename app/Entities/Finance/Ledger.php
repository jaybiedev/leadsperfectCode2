<?php namespace App\Entities\Finance;

use App\Entities\BaseEntity;

class Ledger extends BaseEntity
{
    public $ledger_id;
	public $account_id;
	public $reference;
	public $date;
	public $type;
	public $remarks;
	public $debit;
	public $credit;
	public $releasing_id;
	public $status;
	public $admin_id;
	public $date_created;
	public $date_modified;
	public $date_deleted;
	public $user_id_created;
	public $user_id_modified;
	public $user_id_deleted;

}