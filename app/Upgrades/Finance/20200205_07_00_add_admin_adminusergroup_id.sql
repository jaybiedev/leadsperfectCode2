ALTER TABLE ONLY public.adminusergroup
    ADD CONSTRAINT IF NOT EXISTS adminusergroup_pkey UNIQUE (adminusergroup_id);

ALTER TABLE admin ADD COLUMN IF NOT EXISTS adminusergroup_id INTEGER default NULL;


ALTER TABLE ONLY public.admin
    ADD CONSTRAINT IF NOT EXISTS admin_adminusergroup_fkey FOREIGN KEY (adminusergroup_id) REFERENCES public.adminusergroup(adminusergroup_id);


UPDATE admin SET adminusergroup_id=(SELECT adminusergroup_id FROM adminusergroup WHERE usergroup=admin.usergroup);