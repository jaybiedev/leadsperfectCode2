



CREATE TABLE public.admin_branch_xref (
    id bigint NOT NULL,
    admin_id integer NOT NULL,
    branch_id integer NOT NULL,
    date_created timestamp without time zone,
    date_modified timestamp without time zone,
    date_deleted timestamp without time zone,
    user_id_created integer,
    user_id_modified integer,
    user_id_deleted integer
);



COMMENT ON COLUMN public.admin_branch_xref.admin_id IS 'admin is also user';



COMMENT ON COLUMN public.admin_branch_xref.user_id_created IS 'user_id is same as admin_id';



COMMENT ON COLUMN public.admin_branch_xref.user_id_modified IS 'user_id is same as admin_id';



COMMENT ON COLUMN public.admin_branch_xref.user_id_deleted IS 'user_id is same as admin_id';

CREATE SEQUENCE public.admin_branch_xref_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;



ALTER SEQUENCE public.admin_branch_xref_id_seq OWNED BY public.admin_branch_xref.id;



ALTER TABLE ONLY public.admin_branch_xref ALTER COLUMN id SET DEFAULT nextval('public.admin_branch_xref_id_seq'::regclass);



ALTER TABLE ONLY public.admin_branch_xref
    ADD CONSTRAINT admin_branch_xref_admin_id_branch_id_key UNIQUE (admin_id, branch_id);



ALTER TABLE ONLY public.admin_branch_xref
    ADD CONSTRAINT admin_branch_xref_pkey PRIMARY KEY (id);



ALTER TABLE ONLY public.admin_branch_xref
    ADD CONSTRAINT admin_branch_admin_fkey FOREIGN KEY (admin_id) REFERENCES public.admin(admin_id) ON DELETE CASCADE;



ALTER TABLE ONLY public.admin_branch_xref
    ADD CONSTRAINT admin_branch_branch_fkey FOREIGN KEY (branch_id) REFERENCES public.branch(branch_id) ON DELETE CASCADE;
