
CREATE TABLE IF NOT EXISTS public.partner (
    partner_id integer NOT NULL,
    partner text NOT NULL,
    date_created timestamp without time zone,
    date_modified timestamp without time zone,
    date_deleted timestamp without time zone,
    user_id_created integer,
    user_id_modified integer,
    user_id_deleted integer
);



CREATE SEQUENCE IF NOT EXISTS public.partner_partner_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.partner_partner_id_seq OWNED BY public.partner.partner_id;



ALTER TABLE ONLY public.partner ALTER COLUMN partner_id SET DEFAULT nextval('public.partner_partner_id_seq'::regclass);



ALTER TABLE ONLY public.partner
    ADD CONSTRAINT partner_partner_key UNIQUE (partner);




ALTER TABLE ONLY public.partner
    ADD CONSTRAINT partner_pkey PRIMARY KEY (partner_id);


ALTER TABLE branch ADD COLUMN IF NOT EXISTS partner_id integer;

ALTER TABLE ONLY public.branch
    ADD CONSTRAINT branch_partner_fkey FOREIGN KEY (partner_id) REFERENCES public.partner(partner_id) ON DELETE CASCADE;
