CREATE INDEX IF NOT EXISTS adminrights_admin_id_module_id_idx ON adminrights USING btree(admin_id, module_id);
CREATE INDEX IF NOT EXISTS account_lower_account ON account USING btree (LOWER(account));
CREATE INDEX IF NOT EXISTS account_clientbank_id_idx ON account USING btree (clientbank_id);
CREATE INDEX IF NOT EXISTS clientbank_lower_clientbank_id ON clientbank USING btree (clientbank);
