CREATE EXTENSION IF NOT EXISTS ltree;

CREATE TABLE IF NOT EXISTS menu (
    id SERIAL,
    menu text NOT NULL,
    description text,
    icon text,
    slug text,
    module_id integer,
    date_created timestamp without time zone DEFAULT now(),
    date_modified timestamp without time zone DEFAULT now(),
    date_deleted timestamp without time zone DEFAULT null,
    user_id_created integer,
    user_id_modified integer,
    user_id_deleted integer,
    path ltree,
    sort_order integer
);
CREATE UNIQUE INDEX IF NOT EXISTS "menu_path_ukey" ON "public"."menu" USING BTREE ("path");

INSERT INTO menu (menu, slug, path, sort_order) values ('Top','','Top', '0');
INSERT INTO menu (menu, slug, path, sort_order, description, icon) values ('Finance','/finance','Top.Finance','780', 'Loans, collection and loan reports', 'fa fa-piggy-bank');
INSERT INTO menu (menu, slug, path, sort_order, description, icon) values ('Pensioner','/pensioner/login','Top.Pensioner_Login','850', 'Pensioner login', 'fa fa-ruble-sign');
INSERT INTO menu (menu, slug, path, sort_order, description, icon) values ('Cash Position','/cash','Top.Cash','780', 'Cash Position and bank reconciliation', 'fa fa-money-bill-wave');
INSERT INTO menu (menu, slug, path, sort_order, description, icon) values ('Payroll','/payroll','Top.Payroll','850', 'Payroll', 'fa fa-file-invoice');
INSERT INTO menu (menu, slug, path, sort_order, description, icon) values ('Accounting','/accounting','Top.Accounting','850', 'Accounting', 'fa fa-table');
INSERT INTO menu (menu, slug, path, sort_order, description, icon) values ('Administration','/administration','Top.Administration','1290', 'Systems administration', 'fa fa-landmark');

INSERT INTO menu (menu, slug, path, sort_order) values ('File','', 'Top.Finance.File', '10');
INSERT INTO menu (menu, slug, path, sort_order) values ('Account Info','/finance/account','Top.Finance.File.Account_Info','20');
INSERT INTO menu (menu, slug, path, sort_order) values ('Account Group','/finance/accountgroup','Top.Finance.File.Account_Group','30');
INSERT INTO menu (menu, slug, path, sort_order) values ('Client Banks Monitor','/finance/atmmonitor','Top.Finance.File.Banks_Monitor','40');
INSERT INTO menu (menu, slug, path, sort_order) values ('Client Banks','/finance/clientbank','Top.Finance.File.Client_Banks','50');
INSERT INTO menu (menu, slug, path, sort_order) values ('Recalculate Loans Ledger','/finance/recalc','Top.Finance.File.Loans_Ledger','60');
INSERT INTO menu (menu, slug, path, sort_order) values ('Process Penalties','/finance/computepenalty','Top.Finance.File.Process_Penalties','70');
INSERT INTO menu (menu, slug, path, sort_order) values ('Process Penalties','/finance/computepenalty','Top.Finance.File.Process_Penalties.Process_Penalties','80');
INSERT INTO menu (menu, slug, path, sort_order) values ('Browse Penalties','/finance/penalty.browse','Top.Finance.File.Process_Penalties.Process_Penalties.Browse_Penalties','90');
INSERT INTO menu (menu, slug, path, sort_order) values ('Collection Fee Table','/finance/collectionfee','Top.Finance.File.Collection_Fee','100');
INSERT INTO menu (menu, slug, path, sort_order) values ('Service Charge Table','/finance/servicecharge','Top.Finance.File.Service_Charge','110');
INSERT INTO menu (menu, slug, path, sort_order) values ('Branches','/finance/branch','Top.Finance.File.Branches','120');
INSERT INTO menu (menu, slug, path, sort_order) values ('Partners','/finance/partner','Top.Finance.File.Partners','130');
INSERT INTO menu (menu, slug, path, sort_order) values ('Loan Type','/finance/loantype','Top.Finance.File.Loan_Type','140');
INSERT INTO menu (menu, slug, path, sort_order) values ('Account Classification','/finance/accountclass','Top.Finance.File.Account_Classification','150');
INSERT INTO menu (menu, slug, path, sort_order) values ('Loans','/finance/loan.releasing.browse', 'Top.Finance.Loans', '160');
INSERT INTO menu (menu, slug, path, sort_order) values ('Loan Releasing','/finance/loan.releasing.browse','Top.Finance.Loans.Releasing','170');
INSERT INTO menu (menu, slug, path, sort_order) values ('Overrides','/finance/override','Top.Finance.Loans.Overrides','180');
INSERT INTO menu (menu, slug, path, sort_order) values ('Insurance Payment','/finance/payinsure','Top.Finance.Loans.Insurance_Payment','190');
INSERT INTO menu (menu, slug, path, sort_order) values ('Summary of Loan Releases','/report/releases','Top.Finance.Loans.Summary_Loan_Releases','200');
INSERT INTO menu (menu, slug, path, sort_order) values ('Insurance Ledger','/finance/insureledger','Top.Finance.Loans.Insurance_Ledger','210');
INSERT INTO menu (menu, slug, path, sort_order) values ('Recalculate Loans Ledger','/finance/recalc','Top.Finance.Loans.Loans_Ledger','220');
INSERT INTO menu (menu, slug, path, sort_order) values ('Process Penalties','/finance/computepenalty','Top.Finance.Loans.Process_Penalties','230');
INSERT INTO menu (menu, slug, path, sort_order) values ('Browse Penalties','/finance/penalty.browse','Top.Finance.Loans.Browse_Penalties','240');
INSERT INTO menu (menu, slug, path, sort_order) values ('Loan Deposit Summary','/finance/report/loandeposit','Top.Finance.Loans.Loan_Deposite_Summary','250');
INSERT INTO menu (menu, slug, path, sort_order) values ('Deposit Release Summary','/finance/report/depositrelease','Top.Finance.Loans.Deposit_Release_Summary','260');
INSERT INTO menu (menu, slug, path, sort_order) values ('Interbranch Loan Transactions','/finance/report/interbranch_loan','Top.Finance.Loans.Interbranch_Transactions','270');
INSERT INTO menu (menu, slug, path, sort_order) values ('Releases Fully Paid in 5 months','/finance/report/paidin3','Top.Finance.Loans.Releases_PaidIn','280');

INSERT INTO menu (menu, slug, path, sort_order) values ('Payment','/finance/payment/browse','Top.Finance.Payment', '290');
INSERT INTO menu (menu, slug, path, sort_order) values ('Payment Entry','/finance/payment/browse','Top.Finance.Payment.Entry','300');
INSERT INTO menu (menu, slug, path, sort_order) values ('Gawad/Redeem/Transfer','/finance/redeem','Top.Finance.Payment.Gawad_Redeem_Transfer','310');
INSERT INTO menu (menu, slug, path, sort_order) values ('Summary of Payments','/finance/report/payment','Top.Finance.Payment.Summary_Payments','320');
INSERT INTO menu (menu, slug, path, sort_order) values ('Withdrawals Per Branch','/finance/report/paymentbranch','Top.Finance.Payment.Withdrawals_PerBranch','330');
INSERT INTO menu (menu, slug, path, sort_order) values ('Upload Data(From Branch)','/finance/payment/upload','Top.Finance.Payment.Upload_Data','340');
INSERT INTO menu (menu, slug, path, sort_order) values ('Download Data(To Branch)','/finance/payment/download','Top.Finance.Payment.Download_Data','350');
INSERT INTO menu (menu, slug, path, sort_order) values ('SL Penalty Correction','/finance/penaltyrestore','Top.Finance.Payment.SL_Penalty_Corr','360');

INSERT INTO menu (menu, slug, path, sort_order) values ('Excess','/finance/excess.ledger', 'Top.Finance.Excess', '370');
INSERT INTO menu (menu, slug, path, sort_order) values ('Excess Withdrawal/CA','/finance/excess.withdraw','Top.Finance.Excess.Excess_Withdrawal','380');
INSERT INTO menu (menu, slug, path, sort_order) values ('Excess Ledger','/finance/excessledger','Top.Finance.Excess.Excess_Ledger','390');
INSERT INTO menu (menu, slug, path, sort_order) values ('Excess Released','/finance/report/excessrelease','Top.Finance.Excess.Releases','400');
INSERT INTO menu (menu, slug, path, sort_order) values ('Summary of Excess','/finance/report/excesssummary  ','Top.Finance.Excess.Summary_Excess','410');
INSERT INTO menu (menu, slug, path, sort_order) values ('Excess/Change Report By Post Date','/finance/report/excessbypostdate','Top.Finance.Excess.Excess_Date_Posted','420');
INSERT INTO menu (menu, slug, path, sort_order) values ('Excess/Change Report By Month Advanced','/finance/report/excessmonthadvance','Top.Finance.Excess.Excess_Month_Advanced','430');
INSERT INTO menu (menu, slug, path, sort_order) values ('Excess Released Based on Starting Month','/finance/report/excessstartmonth','Top.Finance.Excess.Released_Based_StartMonth','440');
INSERT INTO menu (menu, slug, path, sort_order) values ('Excess Released for Specific Month Under Period Covered','/finance/report/excess_released','Top.Finance.Excess.Released_SpecificMonth','450');
INSERT INTO menu (menu, slug, path, sort_order) values ('Interbranch Excess Transactions','/finance/report/interbranch_excess','Top.Finance.Excess.Interbranch_Transactions','460');
INSERT INTO menu (menu, slug, path, sort_order) values ('Excess Balance','/finance/report/excessbalance','Top.Finance.Excess.Report_Balance','465');

INSERT INTO menu (menu, slug, path, sort_order) values ('Loan Reports','', 'Top.Finance.Loan_Reports','470');
INSERT INTO menu (menu, slug, path, sort_order) values ('Account Ledger','/finance/report/accountledger_oldledger','Top.Finance.Loan_Reports.Account_Ledger','480');
INSERT INTO menu (menu, slug, path, sort_order) values ('Receivable Listing','/finance/report/receivable','Top.Finance.Loan_Reports.Receivable_Listing','490');
INSERT INTO menu (menu, slug, path, sort_order) values ('Delinquent Accounts','/finance/report/delinquent','Top.Finance.Loan_Reports.Delinquent_Accounts','500');
INSERT INTO menu (menu, slug, path, sort_order) values ('Summary of Loan Releases','/finance/report/loanreleases','Top.Finance.Loan_Reports.Summary_Loan_Releases','510');
INSERT INTO menu (menu, slug, path, sort_order) values ('Summary of Payments/Collection','/finance/report/paymentbranch','Top.Finance.Loan_Reports.Summary_Payments','520');
INSERT INTO menu (menu, slug, path, sort_order) values ('Summary of Branch Collection','/finance/report/collectbranch','Top.Finance.Loan_Reports.Summary_Branch','530');
INSERT INTO menu (menu, slug, path, sort_order) values ('Payment/Collection Calendar','/finance/report/collectioncalendar','Top.Finance.Loan_Reports.Payment_Collection_Cal','540');
INSERT INTO menu (menu, slug, path, sort_order) values ('Withdrawal Schedule/Date Summary','/finance/report/withdrawday','Top.Finance.Loan_Reports.Withdrawal_Date','550');
INSERT INTO menu (menu, slug, path, sort_order) values ('Periodic ATM Summary','/finance/report/withdrawperiodic','Top.Finance.Loan_Reports.ATM_Summary', '560');
INSERT INTO menu (menu, slug, path, sort_order) values ('Individual ATM Report','/finance/report/withdrawindividual','Top.Finance.Loan_Reports.ATM_Report','570');
INSERT INTO menu (menu, slug, path, sort_order) values ('Uncollected Accounts for the Period','/finance/report/uncollected','Top.Finance.Loan_Reports.Uncollected_Accounts','580');
INSERT INTO menu (menu, slug, path, sort_order) values ('In/Out of Passbook/ATM','/finance/atmmonitor','Top.Finance.Loan_Reports.In_Out_ATM','590');
INSERT INTO menu (menu, slug, path, sort_order) values ('List of Active Accounts','/finance/report/activeaccount','Top.Finance.Loan_Reports.Active_Accounts','600');
INSERT INTO menu (menu, slug, path, sort_order) values ('Passbook/ATM Inventory per Bank','/finance/report/passbookinventory','Top.Finance.Loan_Reports.Passbook_ATMInv','610');
INSERT INTO menu (menu, slug, path, sort_order) values ('Penalty Report','/finance/report/penalty','Top.Finance.Loan_Reports.Penalty_Report','620');
INSERT INTO menu (menu, slug, path, sort_order) values ('Interest Income Report','/finance/report/interestincome','Top.Finance.Loan_Reports.Interest_Income_Report','630');
INSERT INTO menu (menu, slug, path, sort_order) values ('Aging of Accounts','/finance/report/aging','Top.Finance.Loan_Reports.Aging_Accounts','640');
INSERT INTO menu (menu, slug, path, sort_order) values ('Summary for Accounting Entry','/finance/report/accounting','Top.Finance.Loan_Reports.Summary_Account_Entry','650');
INSERT INTO menu (menu, slug, path, sort_order) values ('List of Overrides','/finance/report/override','Top.Finance.Loan_Reports.List_Overrides','660');
INSERT INTO menu (menu, slug, path, sort_order) values ('Interest Income Straight Line','/finance/report/interest1','Top.Finance.Loan_Reports.Interest_Income_StraightLine','670');
INSERT INTO menu (menu, slug, path, sort_order) values ('Fund Transfer Report','/finance/report/fundtransfer','Top.Finance.Loan_Reports.Fund_Transfer','680');
INSERT INTO menu (menu, slug, path, sort_order) values ('Receivable Listing w/ Penalty','/finance/report/receivablepenalty','Top.Finance.Loan_Reports.Receivable_Penalty','690');
INSERT INTO menu (menu, slug, path, sort_order) values ('Pensioner Listing w/ birthdate','/finance/report/customers','Top.Finance.Loan_Reports.Pensioner_Birthdate','700');
INSERT INTO menu (menu, slug, path, sort_order) values ('Receivable Listing Names Only','/finance/report/receivablenames','Top.Finance.Loan_Reports.Receivable_Names','710');
INSERT INTO menu (menu, slug, path, sort_order) values ('Clients with no Transactions','/finance/report/nonmoving','Top.Finance.Loan_Reports.Clients_No_Transactions','720');
INSERT INTO menu (menu, slug, path, sort_order) values ('Customer Listing','/finance/report/customers2','Top.Finance.Loan_Reports.Customer_Listing','730');
INSERT INTO menu (menu, slug, path, sort_order) values ('Insurance Due','/finance/report/insuredue','Top.Finance.Loan_Reports.Insurance_Due','740');

INSERT INTO menu (menu, slug, path, sort_order) values ('Account Queue','/finance/waiting.browse','Top.Finance.Account_Queue','750');
INSERT INTO menu (menu, slug, path, sort_order) values ('Account Queue','/finance/waiting.browse','Top.Finance.Account_Queue.Account_Queue','760');
INSERT INTO menu (menu, slug, path, sort_order) values ('Manual Queue','/finance/manpenque','Top.Finance.Account_Queue.Manual_Queue','770');

INSERT INTO menu (menu, slug, path, sort_order) values ('Transaction','','Top.Cash.File','795');
INSERT INTO menu (menu, slug, path, sort_order) values ('Location/Branch Master','/cash/branch','Top.Cash.File.Branch_Master','800');
INSERT INTO menu (menu, slug, path, sort_order) values ('Bank Master','/cash/bank','Top.Cash.File.Bank_Master','810');
INSERT INTO menu (menu, slug, path, sort_order) values ('Transaction','','Top.Cash.Transaction','820');
INSERT INTO menu (menu, slug, path, sort_order) values ('Branch Cash Position','/cash/cashpos','Top.Cash.Transaction.Branch_Cash','830');
INSERT INTO menu (menu, slug, path, sort_order) values ('Bank Reconciliation','/bcash/ankrecon','Top.Cash.Transaction.Brank_Reconciliation','840');

INSERT INTO menu (menu, slug, path, sort_order) values ('File','','Top.Administration.File','1000');
INSERT INTO menu (menu, slug, path, sort_order) values ('Configuration','/administration/configuration','Top.Administration.File.Configuration','1010');
INSERT INTO menu (menu, slug, path, sort_order) values ('User Groups','/administration/adminusergroup','Top.Administration.File.User_Group','1020');
INSERT INTO menu (menu, slug, path, sort_order) values ('Users','/administration/admin','Top.Administration.File.Users','1030');
INSERT INTO menu (menu, slug, path, sort_order) values ('Menu','/administration/menu','Top.Administration.File.Menu_Permissions','1050');