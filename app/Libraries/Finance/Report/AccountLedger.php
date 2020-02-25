<?php 
namespace App\Libraries\Finance\Report;
use App\Helpers\Utils;
use App\Helpers\Finance\FinanceUtils;
use App\Libraries\Finance\Security;
use \App\Libraries\Finance\SysConfig;

class AccountLedger extends BaseReport 
{
    public function __construct() {

        $this->previewFontSize = 13;
        parent::__construct();
    }

    /**
     * needs to be optimized
     */
    public function generateReport($is_draft_printer=false) {

        $q = "SELECT 
                    account.account_id,
                    account.account,
                    account.account_group_id,				
                    account.address,
                    account.salary,
                    account.clientbank_id,
                    account.withdraw_day,
                    account.wday,
                    branch.branch,
                    account_group.account_group,
                    clientbank.clientbank,
                    clientbank.withdraw_day,
                    accountrems.remark
            FROM 
                     account
                LEFT JOIN
                    branch ON branch.branch_id=account.branch_id
                LEFT JOIN
                    clientbank ON clientbank.clientbank_id=account.clientbank_id
                LEFT JOIN
                    account_group ON  account_group.account_group_id=account.account_group_id
                LEFT JOIN
                    accountrems ON accountrems.account_id=account.account_id
            WHERE 
                    account.account_id='{$this->Filter->account_id}'";

        $Query = $this->db->query($q);
        $Account = $Query->getRow();

        $releasing_id = null;
        // will probably loop by releasing id

        $reportWidth = 80;
        $details = "\n";
        $details .= Utils::center('A C C O U N T   L E D G E R', $reportWidth) . "\n";
        $details .= Utils::center($this->getHeader(), $reportWidth) . "\n";
        $details .= Utils::center('Date Printed '.date('m/d/Y g:ia'), $reportWidth)."\n\n";
        $details .= 'Customer: '.Utils::adjustSize($Account->account, 45).'  '.' Pension: '. number_format($Account->salary, 2) . "\n";
        $details .= 'Group   : '.Utils::adjustSize($Account->account_group, 20).' Bank:'.Utils::adjustSize($Account->clientbank, 25).' ';
        $details .= 'OWD : '.$Account->withdraw_day . "\n";
        $details .= 'Branch  : '.Utils::adjustSize($Account->branch, 30).Utils::space(20).'  LRWD: '.$Account->wday . "\n";
        
        if ($this->Filter->show_withdrawn) {
            $details .= '--- ---------- ---------- -- ------------ ---------- ---------- ---------- ------------'."\n";
            $details .= '    Date       Reference       Debit      Withdrawn     Credit    Excess      Balance '."\n";
            $details .= '--- ---------- ---------- -- ------------ ---------- ---------- ---------- ------------'."\n";
        }
        else {
            $details .= '--- ---------- ---------- -- ------------ ------------ ------------ '."\n";
            $details .= '    Date       Reference      Debit        Credit       Balance   '."\n";
            $details .= '--- ---------- ---------- -- ------------ ------------ ------------ '."\n";
        }
        $q = "SELECT 
                    ledger.date,
                    ledger.type,
                    ledger.debit,
                    ledger.credit,
                    ledger.account_id,
                    ledger.releasing_id,
                    ledger.reference,
                    ledger.remarks,
                    ledger.ledger_id,
                    ledger.admin_id,
                    ledger_admin.username AS ledger_username,

                    
                    releasing.principal,
                    releasing.ammort,
                    releasing.gross,
                    releasing.balance,
                    releasing.term,
                    releasing.advance_applied, 
                    releasing.advance_payment, 
                    releasing.previous_balance,
                    releasing.mode,
                    releasing.withdraw_day as withday_loan,
                    releasing.admin_id as admin_id_releasing,
                    releasing_admin.username AS releasing_username, 

                    loan_type.loan_type,
                    
                    ph.admin_id AS payment_user_id,
                    ph.date as payment_date,
                    pd.withdrawn AS payment_withdrawn,
                    pd.excess AS payment_execess,
                    pd.amount AS payment_amount,
                    pd.payment_detail_id,
                    pd.payment_header_id,
                    pha.username AS payment_username

                FROM 
                    ledger
                JOIN
                    releasing ON ledger.releasing_id=releasing.releasing_id
                LEFT JOIN
                    loan_type ON loan_type.loan_type_id=releasing.loan_type_id
                LEFT JOIN
                    payment_header AS ph ON ph.payment_header_id=ledger.reference AND ledger.type='C' AND ph.status != 'C'
                LEFT JOIN
                    payment_detail AS pd ON pd.payment_header_id=ph.payment_header_id AND pd.account_id=ledger.account_id AND ledger.type='C'
                LEFT JOIN
                    admin AS pha ON pha.admin_id=ph.admin_id
                LEFT JOIN
                    admin AS ledger_admin ON ledger_admin.admin_id=ledger.admin_id
                LEFT JOIN 
                    admin AS releasing_admin ON releasing_admin.admin_id=releasing.admin_id
                WHERE 
                    ledger.account_id='{$this->Filter->account_id}' 
                    AND ledger.status!='C'";
    
        if ($releasing_id != '') {
            $q .= " AND releasing.releasing_id ='$releasing_id'";
        }
        elseif ($this->Filter->show_loan_status == 'B' || $this->Filter->show_loan_status == 'F')  {
            $q .= " AND releasing.balance > 1 ";
        }
        elseif ($this->Filter->show_loan_status == 'P') {
            $q .= " AND releasing.balance <= 1 ";
        }

        $q .= "	ORDER BY ledger.releasing_id, ledger.date";

        $QueryLedger = $this->db->query($q);
       
        $lc = 0;
        $total_credit = $total_debit = 0;
        $sub_credit = $sub_debit = $sub_withdrawn = $sub_excess = $sub_balance = 0;
        $total_obligation = $total_ammort = $total_withdrawn = $total_excess = $accountbalance = 0;
        $mreleasing_id='';
        $multiple = $cc = $penalty = $tremaining_ammort_count = 0;
    
        while ($row = $QueryLedger->getUnbufferedRow())
        {
                $withdrawn = $excess = 0;
                $reference = '';
                $date = Utils::ymd2mdy($row->date);
                if ($mreleasing_id != $row->releasing_id && $mreleasing_id != '')
                {
    
                    if ($this->Filter->show_withdrawn)
                    {
                        $details .= '--- ---------- ---------- -- ------------ ---------- ---------- ---------- ------------'."\n";
                        $details .= Utils::space(29).
                        Utils::adjustRight(number_format($sub_debit,2),12).' '.
                        Utils::adjustRight(number_format($sub_withdrawn,2),10).' '.
                        Utils::adjustRight(number_format($sub_credit,2),10).' '.
                        Utils::adjustRight(number_format($sub_excess,2),10).' '.
                        Utils::adjustRight(number_format($sub_balance,2),12)."\n\n";
                    }
                    else
                    {
                        $details .= '--- ---------- ---------- -- ------------ ------------ ------------ '."\n";
                    
                        $details .= Utils::space(29).
                        Utils::adjustRight(number_format($sub_debit,2),12).' '.
                        Utils::adjustRight(number_format($sub_credit,2),12).' '.
                        Utils::adjustRight(number_format($sub_balance,2),12)."\n\n";
                    }
                    
                    $lc += 3;
                    $sub_credit = $sub_debit = $sub_balance = $sub_withdrawn = $sub_excess = 0;


                    if ($this->Filter->show_loan_status == 'F') {
                        break;
                    }                    
                }
                $mreleasing_id = $row->releasing_id;
                
                if ($row->type == 'D') {
                    $reference = strtoupper($row->releasing_username);
    
                    $details .= "Loan Type : " . $row->loan_type .
                            "   Mode  :" . ($row->mode == 'S' ? 'Semi-Monthly' : ($row->mode=='W' ? 'Weekly' : 'Monthly')).
                            "   Terms :" . $row->term . '   Voucher '.str_pad($row->releasing_id,8,'0',STR_PAD_LEFT) . "\n";
                    $details .= "Principal :" . Utils::adjustRight(number_format($row->principal, 2) ,12) . " " .
                            "   Ammortization : ".number_format($row->ammort, 2) . 
                            "     OWD: " . $Account->withdraw_day . ($row->withday_loan!=0 ?'     LRWD: '.$row->withday_loan:'') . "\n";

                    $lc++;
                    
                    if ($row->balance > 0){
                        if ($row->balance > $row->ammort) {
                            $total_ammort += $row->ammort;
                        }
                        else {
                            $total_ammort += $row->balance;
                        }
                    }
                    $total_obligation += $row->gross;
                    
                    $cc = 0;
                }
                elseif ($row->type == 'P') {
                    $date = Utils::getDate($row->payment_date, 'm/d/Y');
                    $reference = $row->ledger_username;
                    $penalty += $row->debit;
                }
                elseif ($row->type == 'R' || $row->remarks == 'RENEW')
                {
                    $reference = strtoupper($row->releasing_username);

                    if ((float)$sub_balance != (float)$row->previous_balance) {
                        if ((float)$sub_balance > (float)$row->previous_balance)
                            $row->credit = $row->previous_balance;
                        else
                            $row->credit = $sub_balance;
                    } 
                    elseif ((float)$sub_balance == (float)$row->previous_balance && (float)$row->credit != (float)$sub_balance) {
                            $row->credit = $sub_balance;
                    } 
                    
                }
                elseif ($row->type == 'C')
                {
                    $reference = $row->payment_username;
                    $withdrawn = $row->payment_withdrawn;
                    $excess = $row->payment_execess;
                }

                $accountbalance += $row->debit - $row->credit;
                $total_credit += $row->credit;
                $total_debit += $row->debit;
    
                $sub_credit += $row->credit;
                $sub_debit += $row->debit;
                $sub_withdrawn += $withdrawn;
                $sub_excess += $excess;

                if ($withdrawn < $row->credit) {
                    $sub_balance += $row->debit - $row->credit - $excess;
                }
                else {
                    $sub_balance += $row->debit - $row->credit;
                }
                if ($row->type == 'D' && $row->advance_applied != '') {
    
                    $details .= Utils::space(4).Utils::adjustSize($date,10).' ';				
                    $details .= Utils::adjustSize($reference,10).' '.
                                Utils::adjustSize($row->type,2).' '.
                                Utils::adjustRight(number_format($row->debit, 2), 12) . ' '.
                                Utils::adjustRight(number_format(0,2),12).' '.
                                Utils::adjustRight(number_format($sub_balance,2),12)."\n";
                    $lc++;
                    $cc++;
                    $details .= Utils::adjustRight($cc,2).'. '.
                                Utils::adjustSize(Utils::ymd2mdy($row->advance_applied),10).' '.
                                Utils::adjustSize($reference, 10).' '.
                                Utils::adjustSize($row->type, 2).' '.
                                Utils::adjustRight(number_format(0,2),12).' ';
    
                    if ($this->Filter->show_withdrawn) {
                        $details .= Utils::adjustRight(number_format($withdrawn, 2), 10) . ' ' .
                                Utils::adjustRight(number_format($row->credit, 2), 10) . ' '.
                                Utils::adjustRight(number_format($excess, 2), 10) . ' ' .
                                Utils::adjustRight(number_format($sub_balance, 2), 12) . ' ';
                    }
                    else {
                        $details .= Utils::adjustRight(number_format($row->credit, 2), 12) . ' ' .
                                    Utils::adjustRight(number_format($sub_balance, 2), 12) . ' ';
    
                    }
                    $details .= "\n";
    
                    $total_withdrawn += $withdrawn;
                    $total_excess += $excess;
                }
                else
                {
                    if ($row->type != 'D') {
                        $cc++;
                    }

                    $details .= Utils::adjustRight(Utils::number_format2($cc, 0), 2) . '. ';
                    $details .=	Utils::adjustSize($date, 10) . ' ';                           //application date
                    $details .= Utils::adjustSize($reference, 10) . ' ' .
                                Utils::adjustSize($row->type, 2) . ' ';
                    if ($row->debit == 0 and $row->payment_date != '') {
                        $details .=	Utils::adjustSize(Utils::getDate($row->payment_date, 'm/d/Y'), 12) . ' ';				    //collection date
                    } 
                    else {			
                        $details .=	Utils::adjustRight(number_format($row->debit, 2), 12) . ' ';
                    }
    
                    if ($this->Filter->show_withdrawn) {
                        $details .= Utils::adjustRight(number_format($withdrawn, 2), 10).' '.
                                        Utils::adjustRight(number_format($row->credit, 2), 10).' '.
                                        Utils::adjustRight(number_format($excess,2),10).' '.
                                        Utils::adjustRight(number_format($sub_balance,2),12).' ';
                    }
                    else
                    {
                        $details .= Utils::adjustRight(number_format($row->credit, 2), 12) . ' '.
                                        Utils::adjustRight(number_format($sub_balance, 2), 12) . ' ';
    
                    }
                    
                    $total_withdrawn += $withdrawn;
                    $total_excess += $excess;
                    
                    $details .= "\n";
                }				

                $lc++;	
                if ($lc > $this->pageLength) {			
                    if ($is_draft_printer) {
                        $details .= "<eject>";
                        Utils::doPrint($details);
                    }
                    
                    $lc=8;
                    $this->content .= $details;
                    $details = '';
                }
    
            if ($row->ammort > 0) {
                $remaining_ammort_count = round(($sub_balance-$penalty)/$row->ammort, 2);
    
                if ($remaining_ammort_count > intval($remaining_ammort_count)) {
                    $remaining_ammort_count=intval($remaining_ammort_count)+1;
                }
                $remaining_ammort_count = intval($remaining_ammort_count);
            }
            else
            {
                $remaining_ammort_count = '';
            }
            
            $penalty = 0;
        }
    
        if ($multiple >0 ) {
            
            if ($this->Filter->show_withdrawn) {
                        $details .= '--- ---------- ---------- -- ------------ ---------- ----------- ----------- ----------'."\n";
                        $details .= Utils::space(5).Utils::adjustSize('Remaining Ammort: '.$remaining_ammort_count,24).
                            Utils::adjustRight(number_format($sub_debit,2),12).' '.
                            Utils::adjustRight(number_format($sub_withdrawn,2),10).' '.
                            Utils::adjustRight(number_format($sub_credit,2),10).' '.
                            Utils::adjustRight(number_format($sub_excess,2),10).' '.
                            Utils::adjustRight(number_format($sub_balance,2),12)."\n\n";
            }
            else {
                $details .= '--- ---------- ---------- -- ------------ ------------ ------------ '."\n";
                $details .= Utils::space(5).Utils::adjustSize('Remaining Ammort: '.$remaining_ammort_count,24).
                    Utils::adjustRight(number_format($sub_debit,2),12).' '.
                    Utils::adjustRight(number_format($sub_credit,2),12).' '.
                    Utils::adjustRight(number_format($sub_balance,2),12)."\n\n";
            }
            $lc++;
            $lc++;
        }

        if ($accountbalance !=0 and $total_ammort !=0)
            $remaining_ammort_count = round(($accountbalance)/$total_ammort,2);
        else
            $remaining_ammort_count = 0;	

        if ($remaining_ammort_count > intval($remaining_ammort_count)) {
            $remaining_ammort_count=intval($remaining_ammort_count)+1;
        }

        $remaining_ammort_count = intval($remaining_ammort_count);
    
        if ($this->Filter->show_withdrawn) {
            $details .= '--- ---------- ---------- -- ------------ ---------- ---------- ---------- ------------'."\n";
            $details .= Utils::space(5).Utils::adjustSize('Remaining Ammort: '.$remaining_ammort_count,24).
                    Utils::adjustRight(number_format($total_debit,2),12).' '.
                    Utils::adjustRight(number_format($total_withdrawn,2),10).' '.
                    Utils::adjustRight(number_format($total_credit,2),10).' '.
                    Utils::adjustRight(number_format($total_excess,2),10).' '.
                    Utils::adjustRight(number_format($accountbalance,2),12)."\n";
            $details .= '--- ---------- ---------- -- ------------ ---------- ---------- ---------- ------------'."\n";
        }
        else {
            $details .= '--- ---------- ---------- -- ------------ ------------ ------------ '."\n";
            $details .= Utils::space(5).Utils::adjustSize('Remaining Ammort: '.$remaining_ammort_count,24).
                    Utils::adjustRight(number_format($total_debit,2),12).' '.
                    Utils::adjustRight(number_format($total_credit,2),12).' '.
                    Utils::adjustRight(number_format($accountbalance,2),12)."\n";
            $details .= '--- ---------- ---------- -- ------------ ------------ ------------ '."\n";
        }
    
        $details .= Utils::space(10).'Total Obligation......'.Utils::adjustRight(number_format($total_obligation,2),12)."\n";
        $details .= Utils::space(10).'Total Ammortization...'.Utils::adjustRight(number_format($total_ammort,2),12)."\n";
        $details .= Utils::space(10).'Total Balance.........'.Utils::adjustRight(number_format($accountbalance,2),12)."\n\n";
        $details .= 'Remarks :'."\n";
        $details .= $Account->remark."\n";
        $this->content .= $details; 
        return  $this->content;
    }
}