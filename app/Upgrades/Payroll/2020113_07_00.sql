CREATE EXTENSION IF NOT EXISTS ltree;

CREATE TABLE IF NOT EXISTS menu (
    id SERIAL,
    menu text NOT NULL,
    description text,
    icon text,
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
INSERT INTO menu (menu, slug, path,parent_path, sort_order, description, icon) values ('Payroll','/payroll','Top.Payroll','Top','1', 'Payroll', 'fa-');

INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('File','','Top.Payroll.File','Top.Payroll','860');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Employee Master','/paymast.browse','Top.Payroll.File.Employee_Master','Top.Payroll.File','870');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Departments','/department','Top.Payroll.File.Departments','Top.Payroll.File','880');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Sections','/section','Top.Payroll.File.Sections','Top.Payroll.File','890');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Levels','/level','Top.Payroll.File.Levels','Top.Payroll.File','900');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Position','/position','Top.Payroll.File.Position','Top.Payroll.File','910');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('SSS Table','/ssstable','Top.Payroll.File.SSS_Table','Top.Payroll.File','920');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Philhealth Table','/phictable','Top.Payroll.File.Philhealth_Table','Top.Payroll.File','930');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Withholding Tax Table','/wtaxtable','Top.Payroll.File.Withholding_Tax','Top.Payroll.File','940');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Income Types','/income_type','Top.Payroll.File.Income_Types','Top.Payroll.File','950');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Deduction Types','/deduction_type','Top.Payroll.File.Deduction_Types','Top.Payroll.File','960');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Transaction','','Top.Payroll.Transaction','Top.Payroll','970');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Payroll','/payroll.transaction.browse','Top.Payroll.Transaction.Payroll','Top.Payroll.Transaction','980');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Auto Generate','/payroll.autogenerate','Top.Payroll.Transaction.Auto_Generate','Top.Payroll.Transaction','990');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Charges','/payrollcharge','Top.Payroll.Transaction.Charges','Top.Payroll.Transaction','1000');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Payroll Period','/payroll_period','Top.Payroll.Transaction.Payroll_Period','Top.Payroll.Transaction','1010');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Post(Close) Transactions','/payroll.posting','Top.Payroll.Transaction.Post_Transactions','Top.Payroll.Transaction','1020');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Recalculate Accounts','/payroll.recalc.account','Top.Payroll.Transaction.Recalculate_Accounts','Top.Payroll.Transaction','1030');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Memo Entry','/memo','Top.Payroll.Transaction.Memo','Top.Payroll.Transaction','1040');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Reports','','Top.Payroll.Reports','Top.Payroll','1050');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Employee Payslip','/report.payslip','Top.Payroll.Reports.Employee_Payslip','Top.Payroll.Reports','1060');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Payroll Summary','/report.payrollsummary','Top.Payroll.Reports.Payroll_Summary','Top.Payroll.Reports','1070');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('ATM Report','/report.atm','Top.Payroll.Reports.ATM_Report','Top.Payroll.Reports','1080');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Income Listing','/report.income','Top.Payroll.Reports.Income_Listing','Top.Payroll.Reports','1090');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Deduction Listing','/report.deduction','Top.Payroll.Reports.Deduction_Listing','Top.Payroll.Reports','1100');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Deduction Summary','/report.deductionsummary','Top.Payroll.Reports.Deduction_Summary','Top.Payroll.Reports','1110');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('SSS Summary','/report.sss','Top.Payroll.Reports.SSS_Summary','Top.Payroll.Reports','1120');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('WTax Summary','/report.wtax','Top.Payroll.Reports.WTax_Summary','Top.Payroll.Reports','1130');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('PHIC Summary','/report.phic','Top.Payroll.Reports.PHIC_Summary','Top.Payroll.Reports','1140');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('PagIbig Summary','/report.pagibig','Top.Payroll.Reports.PagIbig_Summary','Top.Payroll.Reports','1150');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('13th Month Periodic','/report.thirteenperiodic','Top.Payroll.Reports.13_MonthPeriodic','Top.Payroll.Reports','1160');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Annualization Report','/report.annualization','Top.Payroll.Reports.Annualization_Report','Top.Payroll.Reports','1170');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Charges Listing','/report.chargelist','Top.Payroll.Reports.Charges_Listing','Top.Payroll.Reports','1180');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Charges Summary','/report.chargesummary','Top.Payroll.Reports.Charges_Summary','Top.Payroll.Reports','1190');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Employee Account Ledger','/report.payrollaccountledger','Top.Payroll.Reports.Employee_Account_Ledger','Top.Payroll.Reports','1200');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Employee Account Summary','/report.payrollaccountsummary','Top.Payroll.Reports.Employee_Account_Summary','Top.Payroll.Reports','1210');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Setup','','Top.Payroll.Setup','Top.Payroll','1220');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Select Payroll Period','/selectpayrollperiod','Top.Payroll.Setup.Select_Period','Top.Payroll.Setup','1230');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Setup Payroll Period','/payroll_period','Top.Payroll.Setup.Setup_Period','Top.Payroll.Setup','1240');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Payroll Summary Format','/setup.payrollsummary','Top.Payroll.Setup.Payroll_Summary','Top.Payroll.Setup','1250');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Income Summary Format','/setup.incomesummary','Top.Payroll.Setup.Income_Summary','Top.Payroll.Setup','1260');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Deduction Summary Format','/setup.deductionsummary','Top.Payroll.Setup.Deduction_Summary','Top.Payroll.Setup','1270');
INSERT INTO menu (menu, slug, path,parent_path, sort_order) values ('Charges Summary Format','/setup.chargesummary','Top.Payroll.Setup.Charges_Summary','Top.Payroll.Setup','1280');


UPDATE menu SET parent_id = get_menu_id(parent_path) WHERE parent_path IS NOT NULL;
