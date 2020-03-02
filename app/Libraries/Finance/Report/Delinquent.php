<?php 
namespace App\Libraries\Finance\Report;
use App\Helpers\Utils;
use App\Helpers\Finance\FinanceUtils;
use App\Libraries\Finance\Security;
use \App\Libraries\Finance\SysConfig;
use App\Models\Finance\ReleasingModel;

class Delinquent extends BaseReport 
{
    public function __construct() {

        $this->previewFontSize = 13;
        parent::__construct();
    }

    public function generateReport($is_draft_printer=false) {

        if (empty($this->Filter->months_delinquent)) 
            $this->Filter->months_delinquent = 2;

        $date_asof = Utils::getDate($this->Filter->date_asof, 'Y-m-d');
        
        $q = "SELECT * 
                    FROM 
                        releasing
                    LEFT JOIN
                        account ON releasing.account_id=account.account_id
                    LEFT JOIN
                        account_group ON account_group.account_group_id=account.account_group_id
                    WHERE
                        releasing.balance > 0";

        if (!empty($this->Filter->account_group_id)) {
            $q .= " and releasing.account_group_id=" . $this->Filter->account_group_id;
        }

        if (!empty($this->Filter->branch_id)) {
            $q .= " AND branch_id= " . $this->Filter->branch_id;
        }
        $q .= " ORDER BY account";
                    
        $header = "\n";
        if ($is_draft_printer) {
            $header = "<small3>";
        }

        $reportWidth = 80;

        $header .= Utils::center($this->getHeader(), $reportWidth)."\n";
        $header .= Utils::center('DELIQENT LIST AS OF '.$this->Filter->date_asof, $reportWidth) . "\n\n";

        $header .= "  #   Name of Account           Released   Last Pay    No.     Amount Due    \n";
        $header .= "---- ------------------------- ---------- ---------- -------- ------------- ---------------\n";

        $maccount_group_id='';
        $details = '';
        $total_amount =0;
        $subtotal  = 0;
        $lc=6;
        $ctr=0;

        $ReleasingModel = new ReleasingModel();

        $query = $this->db->query($q);
        while ($r = $query->getUnbufferedRow()) 
        {
            $r->releasing_date = $r->date;

            $Releasing = new \App\Entities\Finance\Releasing();
            $Releasing->fill((array)$r)->populate();

            $aAd = $ReleasingModel->getAmountDue($Releasing, $this->Filter->date_asof);
                
            if ($aAd['actual_due'] < $this->Filter->months_delinquent) 
                continue;
                
        
            if ($maccount_group_id != $r->account_group_id) {
                if ($is_draft_printer) 
                    $details .= "<bold>";

                $details .= "\nAccount Group : " . $r->account_group . "\n";

                if ($is_draft_printer) 
                    $details .= "</bold>";

                $details .= str_repeat('-',30)."\n";
                $lc += 2;
                $maccount_group_id = $r->account_group_id;
            }

            $ctr++;
            $details.=  Utils::adjustRight($ctr,3).'. '.
                        Utils::adjustSize($r->account, 25).' '.
                        Utils::adjustSize(Utils::getDate($r->date) , 10).' '.
                        Utils::adjustSize(!empty(Utils::getDate($aAd['lastpay'])) ? Utils::getDate($aAd['lastpay']) : '', 10).' '.
                        Utils::adjustRight($aAd['months_due'],5).'    '.
                        Utils::adjustRight(number_format($aAd['amount_due']+$aAd['penalty'],2),12)."\n";
            $lc++;
            
            $total_amount += $aAd['amount_due'];			
            if ($lc > $this->pageLength && $is_draft_printer) {
                $this->content .= $header . $details;
                $details .= "<eject><reset>";
                Utils::doPrint($header.$details);
                $details = '';
                $lc=6;
            }			
        }

        $details .= "---- ------------------------- ---------- ---------- -------- ------------- ---------------\n";
        $details .= Utils::space(40).Utils::adjustSize('TOTAL AMOUNT ->',20).'  '.
                    Utils::adjustRight(number_format($total_amount,2),12)."\n";
        $details .= "---- ------------------------- ---------- ---------- -------- ------------- ---------------\n";
        
        
        $this->content .= $header . $details;
        if ($is_draft_printer)
        {
            $details .= "<eject>";
            Utils::doPrint($this->content);
        }	

        return $this->content;
    }
}