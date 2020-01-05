

--
-- Name: admin_branch_xref; Type: TABLE; Schema: public; Owner: rute
--

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


ALTER TABLE public.admin_branch_xref OWNER TO rute;

--
-- Name: COLUMN admin_branch_xref.admin_id; Type: COMMENT; Schema: public; Owner: rute
--

COMMENT ON COLUMN public.admin_branch_xref.admin_id IS 'admin is also user';


--
-- Name: COLUMN admin_branch_xref.user_id_created; Type: COMMENT; Schema: public; Owner: rute
--

COMMENT ON COLUMN public.admin_branch_xref.user_id_created IS 'user_id is same as admin_id';


--
-- Name: COLUMN admin_branch_xref.user_id_modified; Type: COMMENT; Schema: public; Owner: rute
--

COMMENT ON COLUMN public.admin_branch_xref.user_id_modified IS 'user_id is same as admin_id';


--
-- Name: COLUMN admin_branch_xref.user_id_deleted; Type: COMMENT; Schema: public; Owner: rute
--

COMMENT ON COLUMN public.admin_branch_xref.user_id_deleted IS 'user_id is same as admin_id';


--
-- Name: admin_branch_xref_id_seq; Type: SEQUENCE; Schema: public; Owner: rute
--

CREATE SEQUENCE public.admin_branch_xref_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.admin_branch_xref_id_seq OWNER TO rute;

--
-- Name: admin_branch_xref_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rute
--

ALTER SEQUENCE public.admin_branch_xref_id_seq OWNED BY public.admin_branch_xref.id;


--
-- Name: admin_branch_xref id; Type: DEFAULT; Schema: public; Owner: rute
--

ALTER TABLE ONLY public.admin_branch_xref ALTER COLUMN id SET DEFAULT nextval('public.admin_branch_xref_id_seq'::regclass);

--
-- Name: admin_branch_xref admin_branch_xref_admin_id_branch_id_key; Type: CONSTRAINT; Schema: public; Owner: rute
--

ALTER TABLE ONLY public.admin_branch_xref
    ADD CONSTRAINT admin_branch_xref_admin_id_branch_id_key UNIQUE (admin_id, branch_id);

--
-- Name: admin_branch_xref admin_branch_xref_pkey; Type: CONSTRAINT; Schema: public; Owner: rute
--

ALTER TABLE ONLY public.admin_branch_xref
    ADD CONSTRAINT admin_branch_xref_pkey PRIMARY KEY (id);

--
-- Name: admin_branch_xref admin_branch_admin_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rute
--

ALTER TABLE ONLY public.admin_branch_xref
    ADD CONSTRAINT admin_branch_admin_fkey FOREIGN KEY (admin_id) REFERENCES public.admin(admin_id) ON DELETE CASCADE;


--
-- Name: admin_branch_xref admin_branch_branch_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rute
--

ALTER TABLE ONLY public.admin_branch_xref
    ADD CONSTRAINT admin_branch_branch_fkey FOREIGN KEY (branch_id) REFERENCES public.branch(branch_id) ON DELETE CASCADE;
