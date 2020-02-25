<?php 
namespace App\Libraries\Finance\Report;
use App\Helpers\Utils;
use App\Helpers\Finance\FinanceUtils;
use App\Libraries\Finance\Security;
use \App\Libraries\Administration\SysConfig;

class LoanReleases extends BaseReport 
{
    public function __construct() {

        $this->previewFontSize = 13;
        parent::__construct();
    }

    public function generateReport($is_draft_printer=false) {
        // @todo: investigate why update on report action.
        /*
        $qu = "update releasing set account_group_id = account.account_group_id 
            from account 
            where account.account_id = releasing.account_id and (releasing.account_group_id=0 or releasing.account_group_id IS NULL)";
        $qr = pg_query($qu) or message(pg_errormessage());
        */

        $reportWidth = 136;
        $InsuranceModel = new \App\Models\Finance\InsuranceModel();

        $from = $to = "";

        $q = "SELECT *
                FROM 
                    releasing
                LEFT JOIN
                    account ON releasing.account_id=account.account_id
                LEFT JOIN
                    account_group ON account_group.account_group_id=releasing.account_group_id 
                LEFT JOIN
                    account_class ON account_class.account_class_id=account_group.account_class_id
                WHERE 1=1 ";
        
        if ($this->Filter->criteriaBy == 'date') {
            $from = $this->Filter->date_from;
            $to = $this->Filter->date_to;
            $q .= " AND date>='{$this->Filter->date_from}' AND  date<='{$this->Filter->date_to}' ";
        }
        else {
            $from = $this->Filter->control_number_from;
            $to = $this->Filter->control_number_to;

            if (!empty($this->Filter->control_number_from))
                $q .= " AND releasing_id>='{$this->Filter->control_number_from}' ";
            if (!empty($this->Filter->control_number_to))
                $q .= " AND releasing_id<='{$this->Filter->control_number_to}' ";
        }

        if (!empty($this->Filter->account_class_id)) {            
            $q .= " AND account_class.account_class_id='{$this->Filter->account_class_id}'";
        }

        if (!empty($this->Filter->branch_id))
        {
            $q .= " AND branch_id='{$this->Filter->branch_id}'";
        }

        if ($this->Filter->show_posted == 'T')
        {
            $q .= " and status != 'U' ";
        }
        elseif ($this->Filter->show_posted == 'U')
        {
            $q .= " and status= 'U'";
        }

        // filter out if user is not "A" admin && not Legal "L && account_status is legal 'L'"
        if (!Security::isAdminOrLegal()) {
            $q .= " AND account.account_status != 'L' ";
        }

        $q .= "	order by date, account";
        $query = $this->db->query($q);

        $header = "\n";
        $detail = '';

        $header .= Utils::center($this->getHeader(), $reportWidth)."\n";
        $header .= Utils::center('SUMMARY OF LOAN RELEASES', $reportWidth)."\n";
        $header .= Utils::center($from.' To '.$to, $reportWidth)."\n";
        $header .= Utils::center('Printed '.date('m/d/Y g:ia'), $reportWidth)."\n\n";
        $header .= "---- -------- -------------------- --------------- ------------ ---------- ----------- ---------- ------------ ------------ ------------\n";
        $header .= "      DATE     ACCOUNT              GROUP           PRINCIPAL    SERVICE    CFEE/INS   AdvChg/OTH   PREVLOAN       OBLIG       RELEASED \n";
        $header .= "---- -------- -------------------- --------------- ------------ ---------- ----------- ---------- ------------ ------------ ------------\n";
        $details = '';

        $this->content = '';

        $total_amount = $total_principal = $total_service_charge = $total_adv_interest = $total_insurance = 0;
        $total_collection_fee = $total_ocharge = $total_previous_balance = $total_gross = $total_released = 0;
        $total_advance_change = $total_printout = $total_atm_charge = $total_other_charges= $total_photo = 0;
        $total_referral_fee = $total_ca_balance = $total_insurance = 0;
        $total_deduction = $total_interest = $total_redeem = $total_adv_intcomp = 0;
        $total_prevprin = $total_prevint = $total_inspremium =0;
        $total_insincome = $total_rebins_ap = $total_rebins_in = 0; 
        $lc=6;
        $ctr=0;

        foreach ($query->getResult() as $r)
        {
            $ctr++;
            $lc++;
            if ($is_draft_printer) 
                $details .= "<bold>";

            $details.= Utils::adjustRight($ctr,3).'. '.
                    Utils::adjustSize(Utils::udate($r->date),8).' '.
                    Utils::adjustSize($r->account,20).' ';
            if ($r->account_group_id != 0)
            {
                $details .= Utils::adjustSize(substr($r->account_group, 0, 15), 15) . ' ';
            }
            else
            {
                $details .= Utils::space(16);
            }
            
            $ocharge = $r->vat + $r->advance_payment + $r->advance_change + $r->photo + $r->printout + $r->atm_charge + $r->other_charges;
            if ($r->status == 'C')
            {
                $details .= "*** CANCELLED ****\n";
            }
            else
            {
                $details .=	Utils::adjustRight(Utils::number_format2($r->principal,2),12).' '.
                        Utils::adjustRight(Utils::number_format2($r->service_charge,2),10).' '.
                        Utils::adjustRight(Utils::number_format2($r->collection_fee,2),11).' '.
                        Utils::adjustRight(Utils::number_format2($ocharge,2),10).' '.
                        Utils::adjustRight(Utils::number_format2($r->previous_balance,2),12).' '.
                        Utils::adjustRight(Utils::number_format2($r->gross,2),12).' '.
                        Utils::adjustRight(Utils::number_format2($r->released,2),12)."\n";
    
                $total_principal += $r->principal;
                $total_advance_change += $r->advance_change;
                $total_printout += $r->printout;
                $total_photo += $r->photo;
                $total_atm_charge  += $r->atm_charge;
                $total_service_charge += $r->service_charge;
                $total_adv_interest += $r->advance_payment;
                $total_adv_intcomp  += $r->advance_payment * ($r->interest / $r->gross);
                $total_collection_fee += $r->collection_fee;
                $total_insurance += $r->principal*(intval(SysConfig::get('INSURANCEFEE'))/100);
                $total_referral_fee += $r->referral_fee;
                $total_ca_balance += $r->ca_balance;
                $total_interest += $r->interest;
                $total_ocharge += $ocharge;
                $total_other_charges += $r->other_charges;
                $total_previous_balance += $r->previous_balance;
                $total_redeem += $r->redeem;
                $total_gross += $r->gross;
                $total_released += $r->released;
                $insureamt = $credit = 0;

                $agebal = FinanceUtils::fAgebal($r->date, $r->date_birth);

                if ($agebal < $r->term)  {
                    $term = $agebal;
                }
                else {
                    $term = $r->term;
                }

                if ($r->insure) {
                    // $q = "select * from insurance where releasing_id='$r->releasing_id' and status='A' order by insurance_id";
                    // $ri = fetch_object($q);
                    $ri = $InsuranceModel->asObject()->where(['releasing_id'=>$r->releasing_id, 'status'=>'A'])->first();

                    if ($r->principal < 50000) {
                        $xmul = intval($term/12);
                        if ($term /12 != $xmul) 
                            $xmul++; 

                        $regadd = 20 * $xmul;
                        $credit = $ri->credit - $regadd;
                        $insureamt = ($credit - round($credit*0.15151515,2)) + $regadd;
                        $credit = $ri->credit;
                    } 
                    else {
                        $insureamt = $ri->credit - round($ri->credit*0.15151515,2);
                        $credit = $ri->credit;
                    }	
                }
    
                $insureincome = $credit - $insureamt;
                $total_inspremium += $insureamt;
                $total_insincome  += $insureincome;
                $rebinsure_ap 	= $r->reb_insure - round($r->reb_insure*0.15151515,2);
                $rebinsure_ap 	+= $r->reb_insure2 - round($r->reb_insure2*0.15151515,2);
                $total_rebins_ap  += $rebinsure_ap;
                $rebinsureincome  = $r->reb_insure + $r->reb_insure2 - $rebinsure_ap;
                $total_rebins_in += $rebinsureincome; 
    
                $total_deduction += $r->service_charge + $r->collection_fee + $r->advance_change + 
                            $r->redeem + $r->printout + $r->photo + 
                            $r->referral_fee + $r->previous_balance + $r->vat + $insureamt +
                            $r->other_charges + $r->atm_charge + $r->advance_payment;
    
                $intapp = $prnapp = $monthint = $balterm = $insureamt = 0;

                if ($r->interest !=0 and $r->term !=0) 
                    $monthint = $r->interest/$r->term;
                if ($r->previous_balance !=0 and $r->ammort != 0) 
                    $balterm  = $r->previous_balance/$r->ammort;

                $intapp = $balterm * $monthint;
                $prnapp = $r->previous_balance - $intapp;
                $total_prevprin += $prnapp;
                $total_prevint += $intapp;
                    
            }
                        
            if ($lc > $this->pageLength && $is_draft_printer)
            {
                $this->content .= $header.$details;
                $details .= "<eject>";
                
                Utils::doPrint($header.$details);
                $lc=6;
                $details = '';
            }			
        }
        if ($lc > $this->pageLength - 5 && $is_draft_printer) {
            $this->content .= $header.$details;
            $details .= "<eject>";
            
            Utils::doPrint($header.$details);
            $lc=6;
            $details = '';
        }			
    
        $details .= "---------- ----------------------- --------------- ------------ ---------- ----------- ---------- ------------ ------------ ------------\n";
        
        $details .= Utils::space(40).Utils::adjustSize('TOTAL :',9).' '.
                        Utils::adjustRight(number_format($total_principal,2),12).' '.
                        Utils::adjustRight(number_format($total_service_charge,2),10).' '.
                        Utils::adjustRight(number_format($total_collection_fee,2),11).' '.
                        Utils::adjustRight(number_format($total_ocharge,2),10).' '.
                        Utils::adjustRight($total_previous_balance,12).' '.
                        Utils::adjustRight($total_gross,12).' '.
                        Utils::adjustRight($total_released,12)."\n";
        $details .= "---------- ----------------------- --------------- ------------ ---------- ----------- ---------- ------------ ------------ ------------\n";
    
        if ($lc > $this->pageLength - 5 && $is_draft_printer) {
            $this->content .= $header.$details;
            $details .= "<eject>";
            
            Utils::doPrint($header.$details);
            $lc=6;
            $details = '';
        }		
    
        $details .= Utils::space(20).'Total Obligation : '.Utils::adjustRight(number_format($total_gross,2),14).Utils::space(10).
                        'Total Deduction : '.Utils::adjustRight(number_format($total_deduction,2),14).Utils::space(10)."\n";
        $details .= Utils::space(20).'Total Principal  : '.Utils::adjustRight(number_format($total_principal,2),14).Utils::space(10).
                        'Total Released  : '.Utils::adjustRight(number_format($total_released,2),14)."\n";
        $details .= "---------- ----------------------- --------------- ------------ ---------- ----------- ---------- ------------ ------------ ------------\n";
    
        $total_collection_fee -= $total_insurance;
        
        $details .= Utils::adjustSize("Breakdown: ",12).Utils::adjustSize("Total Advance Payment",25).Utils::adjustRight(number_format($total_adv_interest,2),12).Utils::space(5). 	
                        Utils::adjustSize("Total Collection Fee",25).Utils::adjustRight(number_format($total_collection_fee,2),12).Utils::space(5).
                        Utils::adjustSize("Total Other Charges",25).Utils::adjustRight(number_format($total_other_charges,2),12).Utils::space(5)."\n";
    
        $details .= Utils::space(12).Utils::adjustSize("Advance Change",25).Utils::adjustRight(number_format($total_advance_change,2),12).Utils::space(5). 	
                        Utils::adjustSize("Total Service Charge",25).Utils::adjustRight(number_format($total_service_charge,2),12).Utils::space(5). 	
                        Utils::adjustSize("ATM Charge",25).Utils::adjustRight(number_format($total_atm_charge,2),12).Utils::space(5)."\n";
    
        $details .= Utils::space(12).Utils::adjustSize("Cash Advance",25).Utils::adjustRight(number_format($total_ca_balance,2),12).Utils::space(5).	
                        Utils::adjustSize("Total Insurance Fee",25).Utils::adjustRight(number_format($total_insurance,2),12).Utils::space(5).
                        Utils::adjustSize("Photo Charge",25).Utils::adjustRight(number_format($total_photo,2),12)."\n"; 	
                    
        $details .= Utils::space(12).Utils::adjustSize("Interest",25).Utils::adjustRight(number_format($total_interest,2),12).Utils::space(5). 	
                        Utils::adjustSize("Referral Fee",25).Utils::adjustRight(number_format($total_referral_fee,2),12).Utils::space(5). 	
                        Utils::adjustSize("Printout",25).Utils::adjustRight(number_format($total_printout,2),12)."\n";
    
        $details .= Utils::space(12).Utils::adjustSize("Gawad",25).Utils::adjustRight(number_format($total_redeem,2),12).Utils::space(5). 	
                        Utils::adjustSize("Previous Loan",25).Utils::adjustRight(number_format($total_previous_balance,2),12).Utils::space(5). 	
                        Utils::adjustSize("Insurance Premium-Payable",25).Utils::adjustRight(number_format($total_inspremium,2),12)."\n";
    
        $details .= Utils::space(12).Utils::adjustSize("",25).Utils::adjustRight('',12).Utils::space(5). 	
                        Utils::adjustSize("",25).Utils::adjustRight('',12).Utils::space(5). 	
                        Utils::adjustSize("Insurance Premium-Income",25).Utils::adjustRight(number_format($total_insincome,2),12)."\n";
    
        $details .= Utils::space(12).Utils::adjustSize("",25).Utils::adjustRight('',12).Utils::space(5). 	
                        Utils::adjustSize("",25).Utils::adjustRight('',12).Utils::space(5). 	
                        Utils::adjustSize("Insurance Rebate-Payable",25).Utils::adjustRight(number_format($total_rebins_ap,2),12)."\n";
    
        $details .= Utils::space(12).Utils::adjustSize("",25).Utils::adjustRight('',12).Utils::space(5). 	
                        Utils::adjustSize("",25).Utils::adjustRight('',12).Utils::space(5). 	
                        Utils::adjustSize("Insurance Rebate-Income",25).Utils::adjustRight(number_format($total_rebins_in,2),12)."\n\n";
    
        $details .= Utils::space(12).Utils::adjustSize("Total Advance Paymnt Principal",30).
                    Utils::adjustRight(number_format($total_adv_interest-$total_adv_intcomp,2),12).
                    Utils::space(14).Utils::adjustSize("  Prev. Principal",23).Utils::adjustRight(number_format($total_prevprin,2),10).Utils::space(5)."\n";
    
        $details .= Utils::space(12).Utils::adjustSize("Total Advance Paymnt Interest",30).Utils::adjustRight(number_format($total_adv_intcomp,2),12).
                    Utils::space(14).Utils::adjustSize("  Prev. Interest ",23).Utils::adjustRight(number_format($total_prevint,2),10).Utils::space(5)."\n";
    
        //$details .= Utils::space(12).Utils::adjustSize("Photo Charge",25).Utils::adjustRight(number_format($total_photo,2),10).Utils::space(5). 	
        //				Utils::adjustSize("Printout",25).Utils::adjustRight(number_format($total_printout,2),10)."\n"; 	
    
        $details .= "\n\n";
        $this->content .= $header.$details;
        if ($is_draft_printer)
        {
            $details .= "<eject><reset>";
            Utils::doPrint($header.$details);
        }	

        return  $this->content;

    }
}