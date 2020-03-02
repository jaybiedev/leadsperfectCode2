<?php 
namespace App\Libraries\Finance\Report;
use App\Helpers\Utils;
use App\Helpers\Finance\FinanceUtils;
use App\Libraries\Finance\Security;
use \App\Libraries\Finance\SysConfig;

class ActiveAccount extends BaseReport 
{
    public function __construct() {

        $this->previewFontSize = 13;
        parent::__construct();
    }

    public function generateReport($is_draft_printer=false) {

        $mdate = Utils::mdy2ymd($this->Filter->date_asof);
        $md = explode('-',$mdate);
    
        if ($md[1] == '01') {
            $yr = $md[0]-1;
            $cutdate = $yr.'-12-31';
        } 
        else {
            $mo = str_pad($md[1]-1,2,'0',STR_PAD_LEFT);
            $cutdate = $md[0].'-'.$mo.'-'.$md[2];
        }	 
        
        $q = "SELECT 
                    (CASE
                        WHEN  MAX(releasing.date)  > ldr.date THEN MAX(releasing.date)
                        ELSE
                            ldr.date
                    END) AS lastdate,
                    SUM(releasing.ammort) as ammort,
                    SUM(releasing.balance) as balance,
                    releasing.account_id,
                    account.account,
                    account.telno,
                    account.address,
                    account.branch_id,
                    account.account_group_id,
                    account_group.account_group,
                    branch.branch
            FROM 
                releasing
            LEFT JOIN 
                account ON account.account_id=releasing.account_id
            LEFT JOIN
                branch ON branch.branch_id=account.branch_id
            LEFT JOIN 
                account_group ON account_group.account_group_id=account.account_group_id                    
            LEFT JOIN
                -- get the last ledger entry with credit > 0 
                (SELECT ledger.*
                    FROM 
                        ledger 
                    LEFT JOIN
                        ledger AS ledger_null 
                        ON ledger_null.account_id=ledger.account_id 
                        AND ledger_null.credit > 0
                        AND ledger_null.ledger_id > ledger.ledger_id
                    WHERE                                                    
                        ledger.credit > 0
                        AND ledger_null.ledger_id IS NULL
                ) AS ldr ON ldr.account_id=releasing.account_id
            WHERE 
                account.enable 
                AND releasing.enable 
                AND releasing.balance > 0
                AND (releasing.date > '{$cutdate}' OR ldr.date > '{$cutdate}')";

        if (!empty($this->Filter->account_group_id)) {
            $q .= " AND account.account_group_id=" . $this->Filter->account_group_id;
        }

        if (!empty($this->Filter->branch_id))
        {
            $q .= " AND account.branch_id=" . $this->Filter->branch_id;
        }

        $q .= " GROUP BY
                releasing.account_id,
                account.account_id,
                account_group.account_group,
                branch.branch_id,
                ldr.date 
            ORDER BY 
                branch.branch, account_group.account_group, LOWER(account)";

        $query = $this->db->query($q);
        
        $reportWidth = 120;
        $header = "\n";
        $header .= Utils::center($this->getHeader(), $reportWidth)."\n";
        $header .= Utils::center('LIST OF ACTIVE ACCOUNTS AS OF '. $this->Filter->date_asof, $reportWidth)."\n";
        $header .= Utils::center('Printed '.date('m/d/Y g:ia'), $reportWidth)."\n\n";
        $header .= "---- ------------------------------ ------------ ------------ ---------- --------------- ------------------------------------------\n";
        $header .= "     Name of Account                 Balance       Ammort.    Last Trans    Telephone               Address\n";
        $header .= "---- ------------------------------ ------------ ------------ ---------- --------------- ------------------------------------------\n";
        $details = '';
        //$this->content = $header;
    
        $lc = 10;
        $ctr=0;
        $mbranch_id = $maccount_group_id = $maccount = $mtelno = $maddress = '';
        $mlastdate = '';
        $mammort = $mbalance = 0;
        $maccount_id = null;

        while ($r = $query->getUnbufferedRow()) 
        {
            if ($mbranch_id != $r->branch_id) {
                if (!empty($mbranch_id)) {
                    $details .= "\n";
                    $lc++;
                }

                $details .= Utils::adjustSize(strtoupper($r->branch) , 30) . "\n";
                $details .= str_repeat('=',30)."\n";
                $lc += 2;
            }

            if ($maccount_group_id!=$r->account_group_id) {
                if ($mbranch_id == $r->branch_id) {
                    $details .= "\n";
                    $lc++;                    
                }

                $details .= Utils::adjustSize(strtoupper($r->account_group), 30) . "\n";
                $details .= str_repeat('-',30)."\n";
                $lc += 2;
            }

            $mbranch_id = $r->branch_id;
            $maccount_group_id = $r->account_group_id;

            $ctr++;	
            $details .= Utils::adjustRight($ctr,3).'. '.Utils::adjustSize($r->account, 30).' '.
                        Utils::adjustRight(number_format($r->balance, 2), 12).' '.
                        Utils::adjustRight(number_format($r->ammort, 2), 12).' '.
                        Utils::adjustSize(Utils::getDate($r->lastdate), 10).' '.
                        Utils::adjustSize($r->telno, 15) . ' ' .
                        Utils::adjustSize($r->address, 40) . "\n";
            $lc++;

            if ($lc > $this->pageLength) {
                if ($is_draft_printer) {
                    Utils::doPrint($header . $details . "<eject>");
                }
                $this->content .= $header . $details;
                $lc = 10;
                $details = '';
            }
        }

        $details .= "---- ------------------------------ ------------ ------------ ---------- --------------- ------------------------------------------\n";
            
        $this->content .= $header . $details;

        if ($is_draft_printer) {
            Utils::doPrint($header.$details);
        }	
    
        return $this->content;
    }
}