--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.4
-- Dumped by pg_dump version 9.3.4
-- Started on 2016-10-10 21:06:59

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'LATIN1';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 178 (class 3079 OID 11750)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2002 (class 0 OID 0)
-- Dependencies: 178
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 176 (class 1259 OID 198803)
-- Name: asignatura; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE asignatura (
    cod_asignatura character varying NOT NULL,
    nom_asignatura character varying,
    grado character varying
);


ALTER TABLE public.asignatura OWNER TO postgres;

--
-- TOC entry 171 (class 1259 OID 198738)
-- Name: aula; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE aula (
    cod_aula character varying NOT NULL,
    ubicacion character varying,
    capacidad character varying,
    cod_colegio character varying
);


ALTER TABLE public.aula OWNER TO postgres;

--
-- TOC entry 170 (class 1259 OID 198730)
-- Name: colegio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE colegio (
    cod_colegio character varying NOT NULL,
    nom_colegio character varying
);


ALTER TABLE public.colegio OWNER TO postgres;

--
-- TOC entry 177 (class 1259 OID 198811)
-- Name: dicta; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE dicta (
    cod_profesor character varying NOT NULL,
    cod_asignatura character varying NOT NULL
);


ALTER TABLE public.dicta OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 198772)
-- Name: editorial; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE editorial (
    cod_editorial character varying NOT NULL,
    nom_editorial character varying
);


ALTER TABLE public.editorial OWNER TO postgres;

--
-- TOC entry 173 (class 1259 OID 198764)
-- Name: libro; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE libro (
    cod_libro character varying NOT NULL,
    nom_libro character varying,
    cod_editorial character varying
);


ALTER TABLE public.libro OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 198751)
-- Name: profesor; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE profesor (
    cod_profesor character varying NOT NULL,
    nom_profesor character varying,
    cod_aula character varying
);


ALTER TABLE public.profesor OWNER TO postgres;

--
-- TOC entry 175 (class 1259 OID 198785)
-- Name: profesor_libro; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE profesor_libro (
    cod_profesor character varying NOT NULL,
    cod_libro character varying NOT NULL,
    fecha_prestamo date NOT NULL
);


ALTER TABLE public.profesor_libro OWNER TO postgres;

--
-- TOC entry 1993 (class 0 OID 198803)
-- Dependencies: 176
-- Data for Name: asignatura; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY asignatura (cod_asignatura, nom_asignatura, grado) FROM stdin;
001	Pensamiento Logico	1
002	Escritura	1
003	Pensamiento Numerico	1
004	Pensamiento Espacial	1
005	Ingles 	2
006	Escritura	2
\.


--
-- TOC entry 1988 (class 0 OID 198738)
-- Dependencies: 171
-- Data for Name: aula; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY aula (cod_aula, ubicacion, capacidad, cod_colegio) FROM stdin;
1A01	A	40	001
1B01	B	40	001
2B01	B	30	002
\.


--
-- TOC entry 1987 (class 0 OID 198730)
-- Dependencies: 170
-- Data for Name: colegio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY colegio (cod_colegio, nom_colegio) FROM stdin;
001	C.P. Cervantes
002	C.P. Quevedo
\.


--
-- TOC entry 1994 (class 0 OID 198811)
-- Dependencies: 177
-- Data for Name: dicta; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY dicta (cod_profesor, cod_asignatura) FROM stdin;
001	001
001	002
001	003
002	004
002	003
003	002
003	005
004	001
004	003
\.


--
-- TOC entry 1991 (class 0 OID 198772)
-- Dependencies: 174
-- Data for Name: editorial; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY editorial (cod_editorial, nom_editorial) FROM stdin;
001	Grao
002	Tecnicas Rubio
003	Prentice Hall
004	Temas de Hoy
\.


--
-- TOC entry 1990 (class 0 OID 198764)
-- Dependencies: 173
-- Data for Name: libro; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY libro (cod_libro, nom_libro, cod_editorial) FROM stdin;
001	Aprender y Enseñar en Educacion Infantil	001
002	Preescolar Rubio N6	002
003	Educacion INfantil N9	003
004	Saber Educar	004
\.


--
-- TOC entry 1989 (class 0 OID 198751)
-- Dependencies: 172
-- Data for Name: profesor; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY profesor (cod_profesor, nom_profesor, cod_aula) FROM stdin;
001	juan perez	1A01
002	alicia garcia	1B01
003	andres fernandez	1A01
004	juan mendez	2B01
\.


--
-- TOC entry 1992 (class 0 OID 198785)
-- Dependencies: 175
-- Data for Name: profesor_libro; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY profesor_libro (cod_profesor, cod_libro, fecha_prestamo) FROM stdin;
001	001	2006-09-09
001	002	2005-05-05
001	001	2005-05-05
002	003	2005-05-06
002	001	2005-05-06
003	001	2006-09-09
003	004	2005-05-05
004	004	2006-12-18
004	001	2005-05-06
\.


--
-- TOC entry 1870 (class 2606 OID 198810)
-- Name: asignatura_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY asignatura
    ADD CONSTRAINT asignatura_pkey PRIMARY KEY (cod_asignatura);


--
-- TOC entry 1860 (class 2606 OID 198745)
-- Name: aula_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY aula
    ADD CONSTRAINT aula_pkey PRIMARY KEY (cod_aula);


--
-- TOC entry 1858 (class 2606 OID 198737)
-- Name: colegio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY colegio
    ADD CONSTRAINT colegio_pkey PRIMARY KEY (cod_colegio);


--
-- TOC entry 1872 (class 2606 OID 198818)
-- Name: dicta_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY dicta
    ADD CONSTRAINT dicta_pkey PRIMARY KEY (cod_profesor, cod_asignatura);


--
-- TOC entry 1866 (class 2606 OID 198779)
-- Name: editorial_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY editorial
    ADD CONSTRAINT editorial_pkey PRIMARY KEY (cod_editorial);


--
-- TOC entry 1864 (class 2606 OID 198771)
-- Name: libro_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY libro
    ADD CONSTRAINT libro_pkey PRIMARY KEY (cod_libro);


--
-- TOC entry 1868 (class 2606 OID 198792)
-- Name: profesor_libro_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY profesor_libro
    ADD CONSTRAINT profesor_libro_pkey PRIMARY KEY (cod_profesor, cod_libro, fecha_prestamo);


--
-- TOC entry 1862 (class 2606 OID 198758)
-- Name: profesor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY profesor
    ADD CONSTRAINT profesor_pkey PRIMARY KEY (cod_profesor);


--
-- TOC entry 1873 (class 2606 OID 198746)
-- Name: aula_cod_colegio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY aula
    ADD CONSTRAINT aula_cod_colegio_fkey FOREIGN KEY (cod_colegio) REFERENCES colegio(cod_colegio) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 1879 (class 2606 OID 198824)
-- Name: dicta_cod_asignatura_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY dicta
    ADD CONSTRAINT dicta_cod_asignatura_fkey FOREIGN KEY (cod_asignatura) REFERENCES asignatura(cod_asignatura) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 1878 (class 2606 OID 198819)
-- Name: dicta_cod_profesor_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY dicta
    ADD CONSTRAINT dicta_cod_profesor_fkey FOREIGN KEY (cod_profesor) REFERENCES profesor(cod_profesor) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 1875 (class 2606 OID 198780)
-- Name: libro_cod_editorial_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY libro
    ADD CONSTRAINT libro_cod_editorial_fkey FOREIGN KEY (cod_editorial) REFERENCES editorial(cod_editorial) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 1874 (class 2606 OID 198759)
-- Name: profesor_cod_aula_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY profesor
    ADD CONSTRAINT profesor_cod_aula_fkey FOREIGN KEY (cod_aula) REFERENCES aula(cod_aula) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 1877 (class 2606 OID 198798)
-- Name: profesor_libro_cod_libro_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY profesor_libro
    ADD CONSTRAINT profesor_libro_cod_libro_fkey FOREIGN KEY (cod_libro) REFERENCES libro(cod_libro) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 1876 (class 2606 OID 198793)
-- Name: profesor_libro_cod_profesor_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY profesor_libro
    ADD CONSTRAINT profesor_libro_cod_profesor_fkey FOREIGN KEY (cod_profesor) REFERENCES profesor(cod_profesor) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2001 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2016-10-10 21:07:00

--
-- PostgreSQL database dump complete
--

