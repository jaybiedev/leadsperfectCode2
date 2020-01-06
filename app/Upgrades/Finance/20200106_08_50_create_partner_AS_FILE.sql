
CREATE TABLE public.partner (
    partner_id integer NOT NULL,
    partner text NOT NULL,
    date_created timestamp without time zone,
    date_modified timestamp without time zone,
    date_deleted timestamp without time zone,
    user_id_created integer,
    user_id_modified integer,
    user_id_deleted integer
);


--
-- Name: partner_partner_id_seq; Type: SEQUENCE; Schema: public; Owner: rute
--

CREATE SEQUENCE public.partner_partner_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.partner_partner_id_seq OWNER TO rute;

--
-- Name: partner_partner_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rute
--

ALTER SEQUENCE public.partner_partner_id_seq OWNED BY public.partner.partner_id;


--
-- Name: partner partner_id; Type: DEFAULT; Schema: public; Owner: rute
--

ALTER TABLE ONLY public.partner ALTER COLUMN partner_id SET DEFAULT nextval('public.partner_partner_id_seq'::regclass);


--
-- Name: partner partner_partner_key; Type: CONSTRAINT; Schema: public; Owner: rute
--

ALTER TABLE ONLY public.partner
    ADD CONSTRAINT partner_partner_key UNIQUE (partner);


--
-- Name: partner partner_pkey; Type: CONSTRAINT; Schema: public; Owner: rute
--

ALTER TABLE ONLY public.partner
    ADD CONSTRAINT partner_pkey PRIMARY KEY (partner_id);


ALTER TABLE branch ADD COLUMN IF NOT EXISTS partner_id integer;

--
-- Name: admin_branch_xref admin_branch_admin_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rute
--

ALTER TABLE ONLY public.branch
    ADD CONSTRAINT branch_partner_fkey FOREIGN KEY (partner_id) REFERENCES public.partner(partner_id) ON DELETE CASCADE;
