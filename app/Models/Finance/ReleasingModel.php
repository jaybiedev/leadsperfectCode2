<?php namespace App\Models\Finance;

use App\Models\BaseModel;

class ReleasingModel extends BaseModel
{
        protected $table      = 'releasing';
        protected $primaryKey = 'releasing_id';

        protected $returnType = 'App\Entities\Finance\Releasing';
        protected $useSoftDeletes = true;

        protected $allowedFields = [
                'releasing_id',
                'edate',
                'date',
                'account_id',
                'status',
                'term',
                'loan_type_id',
                'rate',
                'mode',
                'principal',
                'service_charge',
                'collection_fee',
                'insurance',
                'interest',
                'vat',
                'gross',
                'released',
                'ammort',
                'remarks',
                'admin_id',
                'postedby',
                'audit',
                'previous_balance',
                'enable',
                'advance_payment',
                'total_paid',
                'balance numeric',
                'renew_releasing_id',
                'advance_applied',
                'printout',
                'photo',
                'atm_charge',
                'advance_change',
                'other_charges',
                'other_remarks',
                'mclass',
                'date_child21',
                'npension',
                'nchangebank',
                'override_admin_id',
                'max_term',
                'age',
                'ca_balance',
                'comaker1',
                'comaker2',
                'comaker1_address',
                'comaker2_address',
                'referral_fee',
                'arid',
                'redeem',
                'comaker1_relation',
                'comaker2_relation',
                'admin_id_override',
                'irrate',
                'tbranch_id',
                'deposit',
                'printx',
                'withdraw_day',
                'comake1_id',
                'comake2_id',
                'tpenalty',
                'cashier_id',
                'account_group_id',
                'insure',
                'insureterm',
                'reb_relid',
                'reb_insure',
                'reb_relid2',
                'reb_insure2',              
        ];

        protected $useTimestamps = false;

        protected $validationRules    = [];
        protected $validationMessages = [];

        // @todo: cleanup, make sql efficient
        public function getAmountDue($Releasing, $mdate=null)
        {
                $credit = 0;
                $penalty = 0;
                // hack
                $aAd = (array) $Releasing;
                $aAd['credit'] = 0;
                $aAd['debit'] = 0;
                $aAd['lastpay'] = null;

                // $LedgerModel = new LedgerModel();
                // $Ledger = $LedgerModel->where($ledgerWhere)
                $sql = "SElECT sum(credit) as credit, sum(debit) as debit 
                        FROM 
                                ledger 
                        WHERE 
                                status!='C' 
                                AND type='P' 
                                AND releasing_id='{$Releasing->releasing_id}'";
        
                if ($mdate !='') {
                        $sql .= " AND date <= '{$mdate}'";
                }

                $Ledgers = $this->db->query($sql)->getResult();
                foreach ((array)$Ledgers  as $Ledger) {
                        $penalty = $Ledger->debit;
                }

                $aAd['penalty'] = $penalty;
        
                $sql = "SELECT sum(credit) AS credit, sum(debit) AS debit 
                                FROM 
                                        ledger 
                                WHERE
                                        status!='C' 
                                        AND releasing_id='{$Releasing->releasing_id}'";
                if ($mdate !='') {
                        $sql .= " AND date <= '{$mdate}'";
                }
        
                $Ledger = $this->db->query($sql)->getResult();
                foreach ((array)$Ledgers AS $Ledger) {
                        $credit += $Ledger->credit;	
                        $aAd['credit'] = $Ledger->credit;
                        $aAd['debit']= $Ledger->debit;
                }
        
                $sql = "SELECT date 
                                FROM 
                                        ledger 
                                WHERE
                                        status!='C' and credit > 0 
                                        AND releasing_id='{$Releasing->releasing_id}'";
                if ($mdate !='') {
                        $sql .= " AND date <= '{$mdate}'";
                }
                $sql .= "order by date DESC";
                $Ledgers = $this->db->query($sql)->getResult();
                foreach ((array)$Ledgers as $Ledger) {
                        $aAd['lastpay'] = $Ledger->date;
                }
                
                $releasing_date= $Releasing->date;
                $ald = explode('-',$releasing_date);
                $withdraw_day = $Releasing->withdraw_day;
        
                if ($withdraw_day < '1') {
                        $withdraw_day = $ald[2];
                }
        
                $term = $aAd['term'];
                $mode = $aAd['mode'];	
        
                if ($mdate == '') {
                        $today = date('Y-m-d');
                }
                else {
                        $today = $mdate;
                }
                $a2d =explode('-',$today);
        
                if ($ald[1] == 12 and $a2d[0] == $ald[0]+1 and $a2d[1] == 12 and $ald[0] >= 2013 )
                {
                        $ald[1] = 1;
                        $ald[0] ++;
                }
                
                $months_due = ($a2d[0] - $ald[0])*12;	//--year to months
                $months_due += $a2d[1] - $ald[1] ; //--months
        
                if ($a2d[2]< $withdraw_day) {
                         $months_due--;
                }
                
                if ($withdraw_day > $ald[2] and $ald[1] != 12) {
                        //-- if loan date is after withdrawal date
                        $months_due++;
                }
                
                if ($months_due < $Releasing->term)  {
        
                        $termDue = $months_due*$aAd['ammort']; //-- due as of today
                        $aAd['paid_due'] = intval($credit/$aAd['ammort']);
                        
                        if ($months_due >= 1)
                        {
                                $aAd['amount_due'] = $termDue - $credit + $penalty;
        
                                $md = $months_due - $credit/$aAd['ammort'];
        
                                if ($md > intval($months_due - $credit/$aAd['ammort']))
                                {
                                        $md = intval($months_due - $credit/$aAd['ammort'])+1;
                                }
                                else 
                                {
                                        $md = intval($months_due - $credit/$aAd['ammort']);
                                }
                        }
                        else {
                                $aAd['amount_due'] = $termDue;
                                $md = $months_due;
                        }
                        
                        $aAd['months_due'] = intval($md);
                        $aAd['actual_due'] = intval($md);
                        $aAd['remaining_due'] = $aAd['term'] - $aAd['paid_due'];
        
                }
                else {
                        $aAd['paid_due'] = intval($credit/$aAd['ammort']);
                        $aAd['remaining_due'] = 0;
                        $aAd['amount_due'] = $Releasing->balance;
                        $aAd['months_due'] = intval($aAd['term'] - $credit/$aAd['ammort']);
                        $aAd['actual_due'] = $months_due;
                }
        
                $aAd['credit'] = $credit;
                $aAd['penalty'] = $penalty;
                $aAd['today'] = $today;
        
                if ($aAd['amount_due'] < 0) 
                        $aAd['amount_due'] = 0;

                return $aAd;
        }
}