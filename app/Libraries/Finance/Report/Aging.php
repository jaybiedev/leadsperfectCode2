<?php namespace App\Libraries\Finance\Report;
use App\Helpers\Utils;
use App\Helpers\Finance\FinanceUtils;
use App\Libraries\Finance\Security;
use \App\Libraries\Finance\SysConfig;
use App\Models\Finance\LedgerModel;
use App\Models\Finance\ReleasingModel;

class Aging extends BaseReport 
{
    public function __construct() {

        $this->previewFontSize = 13;
        parent::__construct();
    }

    public function generateReport($is_draft_printer=false) 
    {
        if ($is_draft_printer) {
            Utils::doPrint("<small3>");
        }

        $q = "SELECT releasing.*,
                account_group.account_group,
                account.account
            FROM
                releasing
            LEFT JOIN 
                account ON account.account_id=releasing.account_id 
            LEFT JOIN
                account_group ON account.account_group_id = account_group.account_group_id
            WHERE
                releasing.balance > 0   
                AND releasing.status!='C' ";
            
        if (!empty($this->Filter->account_group_id)){
            $q .= " AND account_group.account_group_id='{$this->Filter->account_group_id}' ";
        }
        $q .= " ORDER BY LOWER(account_group.account_group), LOWER(account.account) ";
//        $q .= " LIMIT 10";

        $query = $this->db->query($q);
        
        $reportWidth = 150;
        $header = "\n\n";
        $header .= Utils::center($this->getHeader(), $reportWidth)."\n";
        $header .= Utils::center('AGING OF ACCOUNTS AS OF '. $this->Filter->date_to, $reportWidth)."\n";
        $header .= Utils::center('Printed '.date('m/d/Y g:ia'), $reportWidth)."\n\n";
        $header .= "---- ------------------------------ ------------ ------------ ---------- ------------ ------------ ------------ ------------ ------------ ------------\n";
        $header .= "     Name of Account                 Balance       Ammort.    Last Pay      1 Month      2 Months     3 Months     4 Months   Long Overdue   Total  \n";
        $header .= "---- ------------------------------ ------------ ------------ ---------- ------------ ------------ ------------ ------------ ------------ ------------\n";
        $details = '';
        $maccount_group_id = '';

        $lc = 10;
        $total_amount = $total_month1 = $total_month2 = $total_month3= $total_month4= $total_month5 = $total_due=0;
        $ctr=0;

        while ($row = $query->getUnbufferedRow()) {
            $ReleasingModel = new ReleasingModel();
            $LedgerModel = new LedgerModel();

            $Releasing = new \App\Entities\Finance\Releasing();
            $Releasing->fill((array)$row)->populate();

            if (Utils::getBoolean($this->Filter->recalculate)) {
                $recalculation = $ReleasingModel->Recalculate($Releasing);
                if ($recalculation['balance'] <= 0)
                    continue;
            }
            
            if ($row->balance <= 0) 
                continue;
       
            if ($maccount_group_id != $row->account_group_id) {
                if ($lc > ($this->pageLength - 10)) {
                    if ($is_draft_printer) {
                        Utils::doPrint($header.$details."<eject>");
                    }
                    $this->content .= $header.$details;

                    $lc = 10;
                    $details = '';
                }

                if ($maccount_group_id != '') {
                    $details .= "\n";
                    $lc++;
                }

                $details .= Utils::adjustSize($row->account_group, 30) . "\n";
                $details .= str_repeat('-', 30) . "\n";
                $maccount_group_id = $row->account_group_id;
                $lc++;
                $lc++;
            }
            
            $months = $days = $month1 = $month2 = $month3 = $month4 = $month5 = $amount_due = 0;
            $maccount_id = $row->account_id;
            $lastpay = '';
           
            $Ledger = $LedgerModel->asObject()
                                ->where('releasing_id', $row->releasing_id)
                                ->where('credit >', 0)
                                ->orderby('date', 'desc')
                                ->first();
                              //  ->get($limit=1, $offset=0);

            if (is_object($Ledger) && !empty($Ledger->ledger_id)) {
                $lastpay = Utils::getDate($Ledger->date, 'm/d/Y');
            }	
            
            $arr = null;
            $arr = array();
            $arr['releasing_id'] = $row->releasing_id;
            $arr['account_id'] = $row->account_id;
            $arr['balance'] = $row->balance;
            $arr['releasing_date']  = $row->date;
            $arr['ammort'] = $row->ammort;
            $arr['term'] = $row->term;            

            $aAd = $ReleasingModel->getAmountDue($Releasing, $this->Filter->date_to);
            $months = $aAd['months_due'];

            if ($aAd['amount_due'] <= 0) 
                continue;

            $ctr++;	
            $details .= Utils::adjustRight($ctr,3). '. ' . Utils::adjustSize($row->account,30).' '.
                        Utils::adjustRight(number_format($row->balance,2),12).' '.
                        Utils::adjustRight(number_format($row->ammort,2),12).' '.
                        Utils::adjustSize($lastpay,10).' ';
                        
            if ($months > 4) {
                $month5 = $aAd['amount_due'] - 4*$row->ammort;
                $months = 4;
            }
            elseif ($aAd['amount_due'] > 0) {
                $month5 = $aAd['amount_due'] - $months*$row->ammort;
            }

            while ($months > 0) {
                $fld='month'.$months;
                $$fld = $row->ammort;
                $months--;
            }

            // totals
            $amount_due += $month1 + $month2 + $month3 + $month4 + $month5;
            $total_amount+= $month1 + $month2 + $month3 + $month4 + $month5;
            $total_month1 += $month1;
            $total_month2 += $month2;
            $total_month3 += $month3;
            $total_month4 += $month4;
            $total_month5 += $month5;
            
            $details .= Utils::adjustRight(Utils::number_format2($month1,2),12).' '.
                        Utils::adjustRight(Utils::number_format2($month2,2),12).' '.
                        Utils::adjustRight(Utils::number_format2($month3,2),12).' '.
                        Utils::adjustRight(Utils::number_format2($month4,2),12).' '.
                        Utils::adjustRight(Utils::number_format2($month5,2),12).' '.
                        Utils::adjustRight(Utils::number_format2($amount_due,2),12)."\n";
            $lc++;
            if ($lc > $this->pageLength) {
                if ($is_draft_printer) {
                    Utils::doPrint($header.$details."<eject>");
                }
                $this->content .= $header.$details;

                $lc = 10;
                $details = '';
            }		
        }
        $details .= "---- ------------------------------ ------------ ------------ ---------- ------------ ------------ ------------ ------------ ------------ ------------\n";
        $details .= Utils::space(8).Utils::adjustSize('***** TOTALS *****',35) . Utils::space(30).
                    Utils::adjustRight(Utils::number_format2($total_month1,2),12).' '.
                    Utils::adjustRight(Utils::number_format2($total_month2,2),12).' '.
                    Utils::adjustRight(Utils::number_format2($total_month3,2),12).' '.
                    Utils::adjustRight(Utils::number_format2($total_month4,2),12).' '.
                    Utils::adjustRight(Utils::number_format2($total_month5,2),12).' '.
                    Utils::adjustRight(Utils::number_format2($total_amount,2),12)."\n";
        $details .= "---- ------------------------------ ------------ ------------ ---------- ------------ ------------ ------------ ------------ ------------ ------------\n";

        $details .= "\n\n";
        $this->content .= $header.$details;
        if ($is_draft_printer) {
            $details .= "<eject><reset>";
            Utils::doPrint($header.$details);
        }	

        return  $this->content;
    }
}