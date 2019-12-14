

CREATE TABLE public.content (
    id SERIAL NOT NULL,
    identifier text NOT NULL,
    content text,
    content_type text,
    date_created timestamp without time zone DEFAULT now() NOT NULL,
    date_updated timestamp without time zone DEFAULT now() NOT NULL,
    date_deleted timestamp without time zone,
    date_modified timestamp without time zone DEFAULT now(),
    user_id_created integer,
    user_id_modified integer,
    user_id_deleted integer
);
