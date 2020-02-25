<?php namespace App\Models\Finance;

use App\Models\BaseModel;
use App\Helpers\Utils;
use App\Libraries\Common\DateLib;

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

        protected $validationRules    = [
                'date'     => 'required',
                'account_id' => 'required',
                'loan_type_id' => 'required',
                'principal' => 'required'
        ];

        protected $validationMessages = [
                'date'        => [
                        'required' => 'Loan date is required.'
                ],
                'account_id'        => [
                        'required' => 'Loan account is required.'
                ],
                'loan_type_id'        => [
                        'required' => 'Loan type is required.'
                ],
                'principal'        => [
                        'required' => 'Loan principal is required.'
                ],                
        ];

        public function Recalculate($Releasing) {

                $releasing_id = $Releasing->releasing_id;
                if (empty($releasing_id))
                        return;

                $sql = "SELECT sum(debit) as debit, sum(credit) as credit
                        FROM
                                ledger
                        WHERE
                                releasing_id ='{$releasing_id}' 
                                AND status!='C'";
                $Query = $this->db->query($sql);
                $result = $Query->getRow();

                $meta = ['releasing_id'=>$releasing_id, 'balance'=>($result->debit - $result->credit)];
                $this->save($meta);
                
                return $meta;
        }

        // @todo: cleanup, make sql efficient
        public function getAmountDue($Releasing, $mdate=null)
        {
                if (!$Releasing)
                        return null;

                $DateAsOf = new DateLib($mdate);
                $ReleasingDate = new DateLib($Releasing->date);
                $this->content = '';

                // hack
                $aAd = is_object($Releasing) ? (array) $Releasing : [];
                $aAd['credit'] = 0;
                $aAd['debit'] = 0;
                $aAd['lastpay'] = null;
                $aAd['paid_due'] = 0;
                $aAd['remaining_due'] = 0;
                $aAd['amount_due'] = 0;
                $aAd['months_due'] = 0;
                $aAd['actual_due'] = 0;
                $aAd['credit'] = 0;
                $aAd['penalty'] = 0;
                $aAd['today'] = null;
                
                // @todo: need to make these block of three ledger calls efficient
                // $LedgerModel = new LedgerModel();
                // $Ledger = $LedgerModel->where($ledgerWhere)
                $sql = "SElECT 
                                (CASE 
                                        WHEN type = 'P' THEN SUM(debit)
                                END) as penalty,
                                (CASE 
                                        WHEN type != 'P' THEN SUM(debit)
                                END) as debit,
                                (CASE 
                                        WHEN type != 'P' THEN SUM(credit)
                                END) as credit
                        FROM 
                                ledger 
                        WHERE 
                                status!='C' 
                                AND releasing_id='{$Releasing->releasing_id}'";
        
                if (!empty($mdate)) {
                        // standardize date format
                        $sql .= " AND date <= '{$DateAsOf->format('Y-m-d')}'";
                }
                $sql .= "GROUP BY type";

                $LedgerQuery = $this->db->query($sql);
                foreach ($LedgerQuery->getResult() as $Ledger) {
                        $aAd['penalty'] += $Ledger->penalty;
                        $aAd['credit'] += $Ledger->credit;
                        $aAd['debit'] += $Ledger->debit;
                }

                // @todo: optimize
                $sql = "SELECT date 
                                FROM 
                                        ledger 
                                WHERE
                                        status!='C' and credit > 0 
                                        AND releasing_id='{$Releasing->releasing_id}'";
                if (!empty($mdate)) {
                        $sql .= " AND date <= '{$DateAsOf->format('Y-m-d')}'";
                }
                $sql .= " ORDER BY date DESC";
                $Ledger = $this->db->query($sql)->getRow();
                $aAd['lastpay'] = is_object($Ledger) ? $Ledger->date : null;
                // end of ledger calls
                
                $withdraw_day = $Releasing->withdraw_day;
        
                if (empty($withdraw_day)) {
                        $withdraw_day = $ReleasingDate->format('j'); //$ald[2];
                }
        
                $term = $aAd['term'];
                $mode = $aAd['mode'];	
        
                $dueMonth = $ReleasingDate->getMonth();
                $dueYear = $ReleasingDate->getYear();
                if ($ReleasingDate->isYear('2013', '>=') && $DateAsOf->isMonth('12') && $DateAsOf->isYear((int)$ReleasingDate->format('Y') + 1)) {
                        $dueMonth = 1;
                        $dueYear++;
                }
                
                $months_due = ($DateAsOf->getYear() - $dueYear)*12;	//--year to months
                $months_due += $DateAsOf->getMonth() - $dueMonth ; //--months
        
                if ($DateAsOf->getDay() < $withdraw_day) {
                         $months_due--;
                }
                
                if ($withdraw_day > $ReleasingDate->getDay() && $dueMonth != 12) {
                        //-- if loan date is after withdrawal date
                        $months_due++;
                }
                
                if ($months_due < $Releasing->term)  {
        
                        $termDue = $months_due*$aAd['ammort']; //-- due as of today
                        $aAd['paid_due'] = intval($aAd['credit']/$aAd['ammort']);
                        
                        if ($months_due >= 1) {
                                $aAd['amount_due'] = $termDue - $aAd['credit'] + $aAd['penalty'];
        
                                $md = $months_due - $aAd['credit']/$aAd['ammort'];
        
                                if ($md > intval($months_due - $aAd['credit']/$aAd['ammort'])) {
                                        $md = intval($months_due - $aAd['credit']/$aAd['ammort'])+1;
                                }
                                else  {
                                        $md = intval($months_due - $aAd['credit']/$aAd['ammort']);
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
                        $aAd['paid_due'] = intval($aAd['credit']/$aAd['ammort']);
                        $aAd['remaining_due'] = 0;
                        $aAd['amount_due'] = $Releasing->balance;
                        $aAd['months_due'] = intval($aAd['term'] - $aAd['credit']/$aAd['ammort']);
                        $aAd['actual_due'] = $months_due;
                }
        
                $aAd['today'] = $DateAsOf->format('Y-m-d');
        
                if ($aAd['amount_due'] < 0) 
                        $aAd['amount_due'] = 0;

                return $aAd;
        }
}