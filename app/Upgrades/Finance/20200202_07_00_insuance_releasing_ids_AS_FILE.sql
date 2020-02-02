--
-- Name: insurance_releasing_id_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX insurance_releasing_id_idx ON public.insurance USING btree (releasing_id, status, insurance_id);

