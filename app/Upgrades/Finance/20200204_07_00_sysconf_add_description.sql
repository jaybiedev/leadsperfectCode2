ALTER TABLE sysconfig ADD COLUMN description TEXT default NULL;

UPDATE sysconfig SET description='Business Name' WHERE sysconfig='BUSINESS_NAME';
UPDATE sysconfig SET description='Business Address' WHERE sysconfig='BUSINESS_ADDR';
UPDATE sysconfig SET description='Business Phone' WHERE sysconfig='BUSINESS_TEL';
UPDATE sysconfig SET description='Business TIN' WHERE sysconfig='BUSINESS_TIN';
UPDATE sysconfig SET description='Business Registration Key' WHERE sysconfig='REG_SERIAL_NO';

UPDATE sysconfig SET description='Minimum Change/Excess Required' WHERE sysconfig='MIN_EXCESS';
UPDATE sysconfig SET description='Maximum Term' WHERE sysconfig='MAX_TERM';

UPDATE sysconfig SET description='Charges for Gawad/Redeem' WHERE sysconfig='REDEEM_CHARGE';
UPDATE sysconfig SET description='Charges for Account Transfer' WHERE sysconfig='BUSINESS_REG';

UPDATE sysconfig SET description='Insurance Fee(/Principal) %' WHERE sysconfig='INSURANCEFEE';
UPDATE sysconfig SET description='Insurance Policy Number' WHERE sysconfig='INSURE_POLICY';
UPDATE sysconfig SET description='Grace Period before Penalty (days)' WHERE sysconfig='GRACEPERIOD';
UPDATE sysconfig SET description='Printout Fee(Fixed)' WHERE sysconfig='PRINTOUTFEE';
UPDATE sysconfig SET description='Rate of ATM Charge(Pesos/Month)' WHERE sysconfig='ATM_CHARGE_RATE';
