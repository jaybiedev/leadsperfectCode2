CREATE EXTENSION IF NOT EXISTS ltree;

CREATE TABLE IF NOT EXISTS menu (
    id SERIAL,
    menu text NOT NULL,
    slug text,
    date_created timestamp without time zone DEFAULT now(),
    date_modified timestamp without time zone DEFAULT now(),
    date_deleted timestamp without time zone DEFAULT null,
    user_id_created integer,
    user_id_modified integer,
    user_id_deleted integer,
    path text,
    parent_path text,
    parent_id integer,
    sort_order integer,
    enabled boolean DEFAULT true
);
CREATE UNIQUE INDEX IF NOT EXISTS "menu_path_ukey" ON "public"."menu" USING BTREE ("path");

INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('File','','Top.Finance.File','Top.Finance','10');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Account Info','?p=account','Top.Finance.File.Account_Info','Top.Finance.File','20');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Account Group','?p=account_group','Top.Finance.File.Account_Group','Top.Finance.File','30');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Client Banks Monitor','?p=atmmonitor','Top.Finance.File.Banks_Monitor','Top.Finance.File','40');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Client Banks','?p=clientbank','Top.Finance.File.Client_Banks','Top.Finance.File','50');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Recalculate Loans Ledger','?p=recalc','Top.Finance.File.Loans_Ledger','Top.Finance.File','60');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Process Penalties','?p=computepenalty','Top.Finance.File.Process_Penalties','Top.Finance.File','70');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Process Penalties','?p=computepenalty','Top.Finance.File.Process_Penalties.Process_Penalties','Top.Finance.File','80');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Browse Penalties','?p=penalty.browse','Top.Finance.File.Process_Penalties.Process_Penalties.Browse_Penalties','Top.Finance.File','90');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Collection Fee Table','?p=collectionfee','Top.Finance.File.Collection_Fee','Top.Finance.File','100');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Service Charge Table','?p=servicecharge','Top.Finance.File.Service_Charge','Top.Finance.File','110');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Branches','finance/branch','Top.Finance.File.Branches','Top.Finance.File','120');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Partners','/finance/partner','Top.Finance.File.Partners','Top.Finance.File','130');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Loan Type','?p=loan_type','Top.Finance.File.Loan_Type','Top.Finance.File','140');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Account Classification','?p=account_class','Top.Finance.File.Account_Classification','Top.Finance.File','150');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Loans','?p=loan.releasing.browse','Top.Finance.Loans','Top.Finance','160');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Loan Releasing','?p=loan.releasing.browse','Top.Finance.Loans.Releasing','Top.Finance.Loans','170');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Overrides','?p=override','Top.Finance.Loans.Overrides','Top.Finance.Loans','180');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Insurance Payment','?p=payinsure','Top.Finance.Loans.Insurance_Payment','Top.Finance.Loans','190');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Summary of Loan Releases','?p=report.releasing','Top.Finance.Loans.Summary_Loan_Releases','Top.Finance.Loans','200');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Insurance Ledger','?p=insureledger','Top.Finance.Loans.Insurance_Ledger','Top.Finance.Loans','210');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Recalculate Loans Ledger','?p=recalc','Top.Finance.Loans.Loans_Ledger','Top.Finance.Loans','220');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Process Penalties','?p=computepenalty','Top.Finance.Loans.Process_Penalties','Top.Finance.Loans','230');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Browse Penalties','?p=penalty.browse','Top.Finance.Loans.Browse_Penalties','Top.Finance.Loans','240');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Loan Deposit Summary','?p=report.loandeposit','Top.Finance.Loans.Loan_Deposite_Summary','Top.Finance.Loans','250');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Deposit Release Summary','?p=report.depositrelease','Top.Finance.Loans.Deposit_Release_Summary','Top.Finance.Loans','260');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Interbranch Loan Transactions','?p=report.interbranch_loan','Top.Finance.Loans.Interbranch_Transactions','Top.Finance.Loans','270');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Releases Fully Paid in 5 months','?p=report.paidin3','Top.Finance.Loans.Releases_PaidIn','Top.Finance.Loans','280');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Payment','?p=payment.browse','Top.Finance.Payment','Top.Finance','290');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Payment Entry','?p=payment.browse','Top.Finance.Payment.Entry','Top.Finance.Payment','300');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Gawad/Redeem/Transfer','?p=redeem','Top.Finance.Payment.Gawad_Redeem_Transfer','Top.Finance.Payment','310');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Summary of Payments','?p=report.payment','Top.Finance.Payment.Summary_Payments','Top.Finance.Payment','320');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Withdrawals Per Branch','?p=report.paymentbranch','Top.Finance.Payment.Withdrawals_PerBranch','Top.Finance.Payment','330');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Upload Data(From Branch)','?p=payment.upload','Top.Finance.Payment.Upload_Data','Top.Finance.Payment','340');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Download Data(To Branch)','?p=payment.download','Top.Finance.Payment.Download_Data','Top.Finance.Payment','350');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('SL Penalty Correction','?p=penaltyrestore','Top.Finance.Payment.SL_Penalty_Corr','Top.Finance.Payment','360');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Excess','?p=excess.ledger','Top.Finance.Excess','Top.Finance','370');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Excess Withdrawal/CA','?p=excess.withdraw','Top.Finance.Excess.Excess_Withdrawal','Top.Finance.Excess','380');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Excess Ledger','?p=excess.ledger','Top.Finance.Excess.Excess_Ledger','Top.Finance.Excess','390');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Excess Withdrawal List','?p=report.wexcess2','Top.Finance.Excess.Withdrawal_List','Top.Finance.Excess','400');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Summary of Excess','?p=report.excess','Top.Finance.Excess.Summary_Excess','Top.Finance.Excess','410');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Excess/Change Withdrawn Report','?p=report.wexcess','Top.Finance.Excess.Excess_Change_Report','Top.Finance.Excess','420');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Excess/Change Advances Summary','?p=report.wexcessadvance','Top.Finance.Excess.Excess_Change_Summary','Top.Finance.Excess','430');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Excess Released Based on Starting Month','?p=report.wexcessadvance2','Top.Finance.Excess.Released_Based_StrtMonth','Top.Finance.Excess','440');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Excess Released for Specific Month Under Period Covered','?p=report.excess_released','Top.Finance.Excess.Released_SpecificMonth','Top.Finance.Excess','450');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Interbranch Excess Transactions','?p=report.interbranch_excess','Top.Finance.Excess.Interbranch_Transactions','Top.Finance.Excess','460');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Loan Reports','','Top.Finance.Loan_Reports','Top.Finance','470');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Account Ledger','?p=report.accountledger_oldledger','Top.Finance.Loan_Reports.Account_Ledger','Top.Finance.Loan_Reports','480');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Receivable Listing','?p=report.receivable','Top.Finance.Loan_Reports.Receivable_Listing','Top.Finance.Loan_Reports','490');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Delinquent Accounts','?p=report.delinquent','Top.Finance.Loan_Reports.Delinquent_Accounts','Top.Finance.Loan_Reports','500');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Summary of Loan Releases','?p=report.releasing','Top.Finance.Loan_Reports.Summary_Loan_Releases','Top.Finance.Loan_Reports','510');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Summary of Payments/Collection','?p=report.paymentbranch','Top.Finance.Loan_Reports.Summary_Payments','Top.Finance.Loan_Reports','520');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Summary of Branch Collection','?p=report.collectbranch','Top.Finance.Loan_Reports.Summary_Branch','Top.Finance.Loan_Reports','530');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Payment/Collection Calendar','?p=report.wcalendar','Top.Finance.Loan_Reports.Payment_Collection_Cal','Top.Finance.Loan_Reports','540');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Withdrawal Schedule/Date Summary','?p=report.withdrawday','Top.Finance.Loan_Reports.Withdrawal_Date','Top.Finance.Loan_Reports','550');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Periodic ATM Summary','?p=report.wperiodic','Top.Finance.Loan_Reports.ATM_Summary','Top.Finance.Loan_Reports','560');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Individual ATM Report','?p=report.windividual','Top.Finance.Loan_Reports.ATM_Report','Top.Finance.Loan_Reports','570');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Uncollected Accounts for the Period','?p=report.uncollected','Top.Finance.Loan_Reports.Uncollected_Accounts','Top.Finance.Loan_Reports','580');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('In/Out of Passbook/ATM','?p=atmmonitor','Top.Finance.Loan_Reports.In_Out_ATM','Top.Finance.Loan_Reports','590');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('List of Active Accounts','?p=report.activeaccount','Top.Finance.Loan_Reports.Active_Accounts','Top.Finance.Loan_Reports','600');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Passbook/ATM Inventory per Bank','?p=report.passbookinventory','Top.Finance.Loan_Reports.Passbook_ATMInv','Top.Finance.Loan_Reports','610');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Penalty Report','?p=report.penalty','Top.Finance.Loan_Reports.Penalty_Report','Top.Finance.Loan_Reports','620');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Interest Income Report','?p=report.interestincome','Top.Finance.Loan_Reports.Interest_Income_Report','Top.Finance.Loan_Reports','630');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Aging of Accounts','?p=report.aging','Top.Finance.Loan_Reports.Aging_Accounts','Top.Finance.Loan_Reports','640');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Summary for Accounting Entry','?p=report.accounting','Top.Finance.Loan_Reports.Summary_Account_Entry','Top.Finance.Loan_Reports','650');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('List of Overrides','?p=report.override','Top.Finance.Loan_Reports.List_Overrides','Top.Finance.Loan_Reports','660');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Interest Income Straight Line','?p=report.interest1','Top.Finance.Loan_Reports.Interest_Income_StraightLine','Top.Finance.Loan_Reports','670');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Fund Transfer Report','?p=report.fundxfer','Top.Finance.Loan_Reports.Fund_Transfer','Top.Finance.Loan_Reports','680');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Receivable Listing w/ Penalty','?p=report.receivable2','Top.Finance.Loan_Reports.Receivable_Penalty','Top.Finance.Loan_Reports','690');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Pensioner Listing w/ birthdate','?p=report.customers','Top.Finance.Loan_Reports.Pensioner_Birthdate','Top.Finance.Loan_Reports','700');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Receivable Listing Names Only','?p=report.receivable3','Top.Finance.Loan_Reports.Receivable_Names','Top.Finance.Loan_Reports','710');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Clients with no Transactions','?p=report.nonmoving','Top.Finance.Loan_Reports.Clients_No_Transactions','Top.Finance.Loan_Reports','720');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Customer Listing','?p=report.customers2','Top.Finance.Loan_Reports.Customer_Listing','Top.Finance.Loan_Reports','730');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Insurance Due','?p=report.insuredue','Top.Finance.Loan_Reports.Insurance_Due','Top.Finance.Loan_Reports','740');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Account Queue','?p=waiting.browse','Top.Finance.Account_Queue','Top.Finance','750');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Account Queue','?p=waiting.browse','Top.Finance.Account_Queue.Account_Queue','Top.Finance.Account_Queue','760');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Manual Queue','?p=manpenque','Top.Finance.Account_Queue.Manual_Queue','Top.Finance.Account_Queue','770');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Cash','','Top.Cash','Top','780');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('File','','Top.Cash.File','Top.Cash','790');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Location/Branch Master','?p=branch','Top.Cash.File.Branch_Master','Top.Cash.File','800');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Bank Master','?p=bank','Top.Cash.File.Bank_Master','Top.Cash.File','810');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Transaction','','Top.Cash.Transaction','Top.Cash','820');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Branch Cash Position','?p=cashpos','Top.Cash.Transaction.Branch_Cash','Top.Cash.Transaction','830');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Bank Reconciliation','?p=bankrecon','Top.Cash.Transaction.Brank_Reconciliation','Top.Cash.Transaction','840');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Payroll','','Top.Payroll','Top','850');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('File','','Top.Payroll.File','Top.Payroll','860');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Employee Master','?p=paymast.browse','Top.Payroll.File.Employee_Master','Top.Payroll.File','870');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Departments','?p=department','Top.Payroll.File.Departments','Top.Payroll.File','880');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Sections','?p=section','Top.Payroll.File.Sections','Top.Payroll.File','890');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Levels','?p=level','Top.Payroll.File.Levels','Top.Payroll.File','900');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Position','?p=position','Top.Payroll.File.Position','Top.Payroll.File','910');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('SSS Table','?p=ssstable','Top.Payroll.File.SSS_Table','Top.Payroll.File','920');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Philhealth Table','?p=phictable','Top.Payroll.File.Philhealth_Table','Top.Payroll.File','930');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Withholding Tax Table','?p=wtaxtable','Top.Payroll.File.Withholding_Tax','Top.Payroll.File','940');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Income Types','?p=income_type','Top.Payroll.File.Income_Types','Top.Payroll.File','950');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Deduction Types','?p=deduction_type','Top.Payroll.File.Deduction_Types','Top.Payroll.File','960');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Transaction','','Top.Payroll.Transaction','Top.Payroll','970');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Payroll','?p=payroll.transaction.browse','Top.Payroll.Transaction.Payroll','Top.Payroll.Transaction','980');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Auto Generate','?p=payroll.autogenerate','Top.Payroll.Transaction.Auto_Generate','Top.Payroll.Transaction','990');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Charges','?p=payrollcharge','Top.Payroll.Transaction.Charges','Top.Payroll.Transaction','1000');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Payroll Period','?p=payroll_period','Top.Payroll.Transaction.Payroll_Period','Top.Payroll.Transaction','1010');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Post(Close) Transactions','?p=payroll.posting','Top.Payroll.Transaction.Post_Transactions','Top.Payroll.Transaction','1020');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Recalculate Accounts','?p=payroll.recalc.account','Top.Payroll.Transaction.Recalculate_Accounts','Top.Payroll.Transaction','1030');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Memo Entry','?p=memo','Top.Payroll.Transaction.Memo','Top.Payroll.Transaction','1040');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Reports','','Top.Payroll.Reports','Top.Payroll','1050');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Employee Payslip','?p=report.payslip','Top.Payroll.Reports.Employee_Payslip','Top.Payroll.Reports','1060');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Payroll Summary','?p=report.payrollsummary','Top.Payroll.Reports.Payroll_Summary','Top.Payroll.Reports','1070');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('ATM Report','?p=report.atm','Top.Payroll.Reports.ATM_Report','Top.Payroll.Reports','1080');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Income Listing','?p=report.income','Top.Payroll.Reports.Income_Listing','Top.Payroll.Reports','1090');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Deduction Listing','?p=report.deduction','Top.Payroll.Reports.Deduction_Listing','Top.Payroll.Reports','1100');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Deduction Summary','?p=report.deductionsummary','Top.Payroll.Reports.Deduction_Summary','Top.Payroll.Reports','1110');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('SSS Summary','?p=report.sss','Top.Payroll.Reports.SSS_Summary','Top.Payroll.Reports','1120');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('WTax Summary','?p=report.wtax','Top.Payroll.Reports.WTax_Summary','Top.Payroll.Reports','1130');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('PHIC Summary','?p=report.phic','Top.Payroll.Reports.PHIC_Summary','Top.Payroll.Reports','1140');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('PagIbig Summary','?p=report.pagibig','Top.Payroll.Reports.PagIbig_Summary','Top.Payroll.Reports','1150');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('13th Month Periodic','?p=report.thirteenperiodic','Top.Payroll.Reports.13_MonthPeriodic','Top.Payroll.Reports','1160');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Annualization Report','?p=report.annualization','Top.Payroll.Reports.Annualization_Report','Top.Payroll.Reports','1170');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Charges Listing','?p=report.chargelist','Top.Payroll.Reports.Charges_Listing','Top.Payroll.Reports','1180');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Charges Summary','?p=report.chargesummary','Top.Payroll.Reports.Charges_Summary','Top.Payroll.Reports','1190');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Employee Account Ledger','?p=report.payrollaccountledger','Top.Payroll.Reports.Employee_Account_Ledger','Top.Payroll.Reports','1200');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Employee Account Summary','?p=report.payrollaccountsummary','Top.Payroll.Reports.Employee_Account_Summary','Top.Payroll.Reports','1210');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Setup','','Top.Payroll.Setup','Top.Payroll','1220');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Select Payroll Period','?p=selectpayrollperiod','Top.Payroll.Setup.Select_Period','Top.Payroll.Setup','1230');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Setup Payroll Period','?p=payroll_period','Top.Payroll.Setup.Setup_Period','Top.Payroll.Setup','1240');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Payroll Summary Format','?p=setup.payrollsummary','Top.Payroll.Setup.Payroll_Summary','Top.Payroll.Setup','1250');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Income Summary Format','?p=setup.incomesummary','Top.Payroll.Setup.Income_Summary','Top.Payroll.Setup','1260');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Deduction Summary Format','?p=setup.deductionsummary','Top.Payroll.Setup.Deduction_Summary','Top.Payroll.Setup','1270');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Charges Summary Format','?p=setup.chargesummary','Top.Payroll.Setup.Charges_Summary','Top.Payroll.Setup','1280');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('System','','Top.System','Top','1290');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('System Configuration','?p=sysconfig','Top.System.Configuration','Top.System','1300');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Passwords','?p=password','Top.System.Passwords','Top.System','1310');

UPDATE menu SET parent_id = get_menu_id(parent_path) WHERE parent_path IS NOT NULL;
