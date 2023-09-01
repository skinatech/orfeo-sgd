--
-- PostgreSQL database dump
--

-- Dumped from database version 11.14 (Debian 11.14-0+deb10u1)
-- Dumped by pg_dump version 11.14 (Debian 11.14-0+deb10u1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: buscarcadena(character varying, character varying); Type: FUNCTION; Schema: public; Owner: orfeo62usr
--

CREATE FUNCTION public.buscarcadena(cadena character varying, esquema character varying) RETURNS character varying
    LANGUAGE plpgsql
    AS $$

DECLARE

 tabla character varying;

 columna character varying;

 r record;

    BEGIN

    FOR tabla IN

        select table_name from information_schema.tables where table_schema = esquema 

    LOOP

        FOR columna IN

            SELECT column_name FROM information_schema.columns WHERE table_schema = 'public' 

                AND table_name = tabla and data_type = 'character varying'

        LOOP

            FOR r IN EXECUTE format('SELECT 1 FROM %I where %I = ''%I''', tabla,columna,cadena)

            LOOP

                return 'tabla: '|| tabla||' || columna: '||columna;

            END LOOP;

        END LOOP;

    END LOOP;

    return 'No encontrada';

    END;

$$;


ALTER FUNCTION public.buscarcadena(cadena character varying, esquema character varying) OWNER TO orfeo62usr;

--
-- Name: concat(text, text); Type: FUNCTION; Schema: public; Owner: orfeo62usr
--

CREATE FUNCTION public.concat(text, text) RETURNS text
    LANGUAGE sql
    AS $_$select case when $1 = '' then $2 else ($1 || ', ' || $2) end$_$;


ALTER FUNCTION public.concat(text, text) OWNER TO orfeo62usr;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: preguntas; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.preguntas (
    id_preguntas integer NOT NULL,
    pregunta character varying(150)
);


ALTER TABLE public.preguntas OWNER TO orfeo62usr;

--
-- Name: TABLE preguntas; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.preguntas IS 'Guarda la pregunta en general para restablecer contraseña';


--
-- Name: Preguntas_id_preguntas_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public."Preguntas_id_preguntas_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Preguntas_id_preguntas_seq" OWNER TO orfeo62usr;

--
-- Name: Preguntas_id_preguntas_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public."Preguntas_id_preguntas_seq" OWNED BY public.preguntas.id_preguntas;


--
-- Name: respuestas_usuario; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.respuestas_usuario (
    "id_Respuestas_Usuario" integer NOT NULL,
    id_pregunta integer NOT NULL,
    id_sgd_ciu_ciudadano integer NOT NULL,
    respuesta character varying(150) NOT NULL
);


ALTER TABLE public.respuestas_usuario OWNER TO orfeo62usr;

--
-- Name: TABLE respuestas_usuario; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.respuestas_usuario IS 'Preguntas por usuario';


--
-- Name: Respuestas_Usuario_id_Respuestas_Usuario_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public."Respuestas_Usuario_id_Respuestas_Usuario_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 999999999
    CACHE 1;


ALTER TABLE public."Respuestas_Usuario_id_Respuestas_Usuario_seq" OWNER TO orfeo62usr;

--
-- Name: Respuestas_Usuario_id_Respuestas_Usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public."Respuestas_Usuario_id_Respuestas_Usuario_seq" OWNED BY public.respuestas_usuario."id_Respuestas_Usuario";


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.usuario (
    usua_codi numeric(10,0) NOT NULL,
    depe_codi character varying(5) NOT NULL,
    usua_login character varying(50) NOT NULL,
    usua_fech_crea date,
    usua_pasw character varying(35) NOT NULL,
    usua_esta character varying(10) NOT NULL,
    usua_nomb character varying(45),
    perm_radi character(1) DEFAULT 0,
    usua_admin character(1) DEFAULT 0,
    usua_nuevo character(1) DEFAULT 0,
    usua_doc character varying(14) DEFAULT 0,
    codi_nivel numeric(2,0) DEFAULT 1,
    usua_sesion character varying(30),
    usua_fech_sesion date,
    usua_ext numeric(4,0),
    usua_nacim date,
    usua_email character varying(50),
    usua_at character varying(50),
    usua_piso numeric(2,0),
    perm_radi_sal numeric DEFAULT 0,
    usua_admin_archivo numeric(1,0) DEFAULT 0,
    usua_masiva numeric(1,0) DEFAULT 0,
    usua_perm_dev numeric(1,0) DEFAULT 0,
    usua_perm_numera_res character varying(1),
    usua_doc_suip character varying(15),
    usua_perm_numeradoc numeric(1,0),
    sgd_panu_codi numeric(4,0),
    usua_prad_tp1 numeric(1,0) DEFAULT 0,
    usua_prad_tp2 numeric(1,0) DEFAULT 0,
    usua_perm_envios numeric(1,0) DEFAULT 0,
    usua_perm_modifica numeric(1,0) DEFAULT 0,
    usua_perm_impresion numeric(1,0) DEFAULT 0,
    sgd_aper_codigo numeric(2,0),
    usu_telefono1 character varying(14),
    usua_encuesta character varying(1),
    sgd_perm_estadistica numeric(2,0),
    usua_perm_sancionados numeric(1,0),
    usua_admin_sistema numeric(1,0),
    usua_perm_trd numeric(1,0),
    usua_perm_firma numeric(1,0),
    usua_perm_prestamo numeric(1,0),
    usuario_publico numeric(1,0),
    usuario_reasignar numeric(1,0),
    usua_perm_notifica numeric(1,0),
    usua_perm_expediente numeric,
    usua_login_externo character varying(50),
    id_pais numeric(4,0) DEFAULT 170,
    id_cont numeric(2,0) DEFAULT 1,
    usua_auth_ldap numeric(1,0) DEFAULT 0,
    perm_archi character(1) DEFAULT 1,
    perm_vobo character(1) DEFAULT 1,
    perm_borrar_anexo numeric(1,0),
    perm_tipif_anexo numeric(1,0),
    usua_perm_adminflujos numeric(1,0) DEFAULT 0 NOT NULL,
    usua_exp_trd numeric(2,0) DEFAULT 0,
    usua_perm_rademail smallint,
    usua_perm_accesi numeric(1,0) DEFAULT 0,
    usua_perm_agrcontacto numeric(1,0) DEFAULT 0,
    usua_prad_tp4 smallint,
    usua_perm_preradicado numeric(1,0),
    cod_rol numeric(3,0),
    descargar_documentos numeric(1,0) DEFAULT 0,
    usua_perm_reasigna_masiva numeric(1,0),
    usua_nivel_consulta numeric(1,0),
    descarga_arc_original smallint DEFAULT 0,
    firma_qr smallint DEFAULT 0,
    per_transferencia_documental smallint DEFAULT 0,
    usua_perm_grupo_usuarios_informados numeric(1,0),
    usua_perm_doc_publico numeric(1,0) DEFAULT 0,
    usua_perm_consulta_rad numeric(1,0),
    consulta_inv_documental numeric DEFAULT 0,
    carga_inv_documental numeric DEFAULT 0,
    firma_mecanica numeric(1,0),
    usua_firma character varying(191),
    usua_prad_tp3 smallint,
    id_users_pqrs integer
);


ALTER TABLE public.usuario OWNER TO orfeo62usr;

--
-- Name: TABLE usuario; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.usuario IS 'USUARIO';


--
-- Name: COLUMN usuario.usua_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_codi IS 'CODIGO DE USUARIO';


--
-- Name: COLUMN usuario.depe_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.depe_codi IS 'DEPE_CODI';


--
-- Name: COLUMN usuario.usua_login; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_login IS 'LOGIN USUARIO';


--
-- Name: COLUMN usuario.usua_fech_crea; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_fech_crea IS 'FECHA DE CREACION DEL USUARIO';


--
-- Name: COLUMN usuario.usua_pasw; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_pasw IS 'USUA_PASW';


--
-- Name: COLUMN usuario.usua_esta; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_esta IS 'ESTADO DEL USUARIO - Activo o No (1/0)';


--
-- Name: COLUMN usuario.usua_nomb; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_nomb IS 'NOMBRE DEL USUARIO';


--
-- Name: COLUMN usuario.perm_radi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.perm_radi IS 'Permiso para digitalizacion de documentos: 1 permiso asignado';


--
-- Name: COLUMN usuario.usua_admin; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_admin IS 'Prestamo de documentos fisicos: 0 sin permiso -  1 permiso asignado ';


--
-- Name: COLUMN usuario.usua_nuevo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_nuevo IS 'Usuario Nuevo ? Si esta en ''0'' resetea la contrase?a';


--
-- Name: COLUMN usuario.usua_doc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_doc IS 'No. de Documento de Identificacion. ';


--
-- Name: COLUMN usuario.codi_nivel; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.codi_nivel IS 'Nivel del Usuario';


--
-- Name: COLUMN usuario.usua_sesion; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_sesion IS 'Sesion Actual del usuario o Ultima fecha que entro.';


--
-- Name: COLUMN usuario.usua_fech_sesion; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_fech_sesion IS 'Fecha de Actual de la session o Ultima Fecha.';


--
-- Name: COLUMN usuario.usua_ext; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_ext IS 'Numero de extension del usuario';


--
-- Name: COLUMN usuario.usua_nacim; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_nacim IS 'Fecha Nacimiento';


--
-- Name: COLUMN usuario.usua_email; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_email IS 'Mail';


--
-- Name: COLUMN usuario.usua_at; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_at IS 'Nombre del Equipo';


--
-- Name: COLUMN usuario.usua_piso; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_piso IS 'Piso en el que se encuentra laborando';


--
-- Name: COLUMN usuario.usua_admin_archivo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_admin_archivo IS 'Administrador de Archivo (Expedientes): 0 sin permiso - 1 permiso asignado ';


--
-- Name: COLUMN usuario.usua_masiva; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_masiva IS 'Permiso de radicacion masiva de documentos';


--
-- Name: COLUMN usuario.usua_perm_dev; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_perm_dev IS 'Devoluciones de correo (Dev_correo): 0 sin permiso - 1 permiso asignado';


--
-- Name: COLUMN usuario.sgd_panu_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.sgd_panu_codi IS 'Permisos de anulacion de radicados: 1 - Permiso de solicitud de anulado 2- Permiso de anulacion y generacion de actas 3- Permiso 1 y 2';


--
-- Name: COLUMN usuario.usua_prad_tp1; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_prad_tp1 IS 'Si esta en ''1'' El usuario Tiene Permisos de radicacicion Tipo 1.  En nuestro caso de salida';


--
-- Name: COLUMN usuario.usua_prad_tp2; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_prad_tp2 IS 'Si esta en ''2'' El usuario Tiene Permisos de radicacicion Tipo 2.  En nuestro caso de Entrada';


--
-- Name: COLUMN usuario.usua_perm_envios; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_perm_envios IS 'Envios de correo (correspondencia): 0 sin permiso - 1 permiso asignado';


--
-- Name: COLUMN usuario.usua_perm_modifica; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_perm_modifica IS 'Permiso de modificar Radicados';


--
-- Name: COLUMN usuario.usua_perm_impresion; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_perm_impresion IS 'Carpeta de impresion: 0 sin permiso - 1 permiso asignado';


--
-- Name: COLUMN usuario.sgd_perm_estadistica; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.sgd_perm_estadistica IS 'Si tiene ''1'' tiene permisos como jefe para ver las estadisticas de la dependencia.';


--
-- Name: COLUMN usuario.usua_admin_sistema; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_admin_sistema IS 'Administrador del sistema : 0 sin permiso - 1 permiso asignado';


--
-- Name: COLUMN usuario.usua_perm_trd; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_perm_trd IS 'Usuario Administracion de tablas de retencion documental : 0 sin permiso - 1 permiso asignado';


--
-- Name: COLUMN usuario.usua_perm_prestamo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_perm_prestamo IS 'Indica si un usuario tiene o no permiso de acceso al modulo de prestamo. Segun su valor:

Tiene permiso

(0) No tiene permiso';


--
-- Name: COLUMN usuario.perm_borrar_anexo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.perm_borrar_anexo IS 'Indica si un usuario tiene (1) o no (0) permiso para tipificar anexos .tif';


--
-- Name: COLUMN usuario.perm_tipif_anexo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.perm_tipif_anexo IS 'Indica si un usuario tiene (1)  o no (0) permiso para tipificar anexos .tif';


--
-- Name: COLUMN usuario.usua_perm_rademail; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_perm_rademail IS 'Permiso de radicacion de email';


--
-- Name: COLUMN usuario.usua_perm_accesi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_perm_accesi IS 'Permiso para  compatbilidad uso de lector de pantalla';


--
-- Name: COLUMN usuario.usua_perm_agrcontacto; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_perm_agrcontacto IS 'permiso para agregar contactos formualrio rad';


--
-- Name: COLUMN usuario.usua_perm_preradicado; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_perm_preradicado IS 'Identifica si tiene o no el permiso del formulario de pre-radicación';


--
-- Name: COLUMN usuario.cod_rol; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.cod_rol IS 'identifica el rol que se asigno al usuario';


--
-- Name: COLUMN usuario.usua_perm_reasigna_masiva; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_perm_reasigna_masiva IS 'Este permite asignar el permiso para realizar el proceso de reasignación masiva';


--
-- Name: COLUMN usuario.usua_nivel_consulta; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_nivel_consulta IS 'Este permiso permite asignar un nivel de consilta a los radicados';


--
-- Name: COLUMN usuario.descarga_arc_original; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.descarga_arc_original IS 'Este permiso permite descargar el archivo original del radicado';


--
-- Name: COLUMN usuario.firma_qr; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.firma_qr IS 'Este permiso permite firmar el radicado';


--
-- Name: COLUMN usuario.usua_perm_grupo_usuarios_informados; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_perm_grupo_usuarios_informados IS 'Este permiso permite asignar el permiso para crear gupos de informados nuevos';


--
-- Name: COLUMN usuario.usua_perm_consulta_rad; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_perm_consulta_rad IS 'Permiso para el proceso de consulta de radicados marcados como confidenciales';


--
-- Name: COLUMN usuario.consulta_inv_documental; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.consulta_inv_documental IS 'permiso para consulta de inventario documental';


--
-- Name: COLUMN usuario.carga_inv_documental; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.carga_inv_documental IS 'permiso para creación y carga de documentos en inventario documental';


--
-- Name: COLUMN usuario.firma_mecanica; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.firma_mecanica IS 'permiso para la firma mecánica';


--
-- Name: COLUMN usuario.usua_firma; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.usua_firma IS 'ruta donde se encuentra la imagen png';


--
-- Name: COLUMN usuario.id_users_pqrs; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.usuario.id_users_pqrs IS 'id del usuario en pqrs';


--
-- Name: V_USUARIO; Type: VIEW; Schema: public; Owner: orfeo62usr
--

CREATE VIEW public."V_USUARIO" AS
 SELECT usuario.usua_codi,
    usuario.usua_nomb,
    usuario.usua_login,
    usuario.depe_codi
   FROM public.usuario;


ALTER TABLE public."V_USUARIO" OWNER TO orfeo62usr;

--
-- Name: anexos; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.anexos (
    anex_radi_nume character varying(30) NOT NULL,
    anex_codigo character varying(30) NOT NULL,
    anex_tipo numeric(4,0) NOT NULL,
    anex_tamano numeric,
    anex_solo_lect character varying(1) NOT NULL,
    anex_creador character varying(50) NOT NULL,
    anex_desc character varying(512),
    anex_numero numeric(5,0) NOT NULL,
    anex_nomb_archivo character varying(150) NOT NULL,
    anex_borrado character varying(1) NOT NULL,
    anex_origen numeric(1,0) DEFAULT 0,
    anex_ubic character varying(15),
    anex_salida numeric(1,0) DEFAULT 0,
    radi_nume_salida character varying(30),
    anex_radi_fech timestamp with time zone DEFAULT now(),
    anex_estado numeric(1,0) DEFAULT 0,
    usua_doc character varying(14),
    sgd_rem_destino numeric(1,0) DEFAULT 0,
    anex_fech_envio timestamp with time zone,
    sgd_dir_tipo numeric(4,0),
    anex_fech_impres timestamp with time zone,
    anex_depe_creador character varying(5),
    sgd_doc_secuencia numeric(15,0),
    sgd_doc_padre character varying(20),
    sgd_arg_codigo numeric(2,0),
    sgd_tpr_codigo numeric(4,0),
    sgd_deve_codigo numeric(2,0),
    sgd_deve_fech date,
    sgd_fech_impres timestamp without time zone,
    anex_fech_anex timestamp with time zone,
    anex_depe_codi character varying(5),
    sgd_pnufe_codi numeric(4,0),
    sgd_dnufe_codi numeric(4,0),
    anex_usudoc_creador character varying(15),
    sgd_fech_doc date,
    sgd_apli_codi numeric(4,0),
    sgd_trad_codigo numeric(2,0),
    sgd_dir_direccion character varying(150),
    sgd_exp_numero character varying(20),
    numero_doc character varying(15),
    sgd_srd_codigo character varying(3),
    sgd_sbrd_codigo character varying(4),
    anex_num_hoja numeric,
    texto_archivo_anex text,
    anex_idarch_version numeric(3,0),
    anex_num_version numeric(2,0),
    doc_firmado_qr smallint DEFAULT 0,
    anex_nomb_archivo_orig character varying(150),
    radi_docu_publico boolean DEFAULT false,
    fecha_rec_remi date,
    anex_radicado numeric(1,0) DEFAULT 0,
    anex_tipo_envio numeric DEFAULT 0,
    doc_firmado_mecanica smallint,
    anexo_combinar_correspondencia smallint
);


ALTER TABLE public.anexos OWNER TO orfeo62usr;

--
-- Name: COLUMN anexos.numero_doc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.anexos.numero_doc IS 'Numero de documento';


--
-- Name: COLUMN anexos.sgd_srd_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.anexos.sgd_srd_codigo IS 'Serie';


--
-- Name: COLUMN anexos.sgd_sbrd_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.anexos.sgd_sbrd_codigo IS 'Subserie';


--
-- Name: COLUMN anexos.anex_idarch_version; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.anexos.anex_idarch_version IS 'Id del archivo de versión';


--
-- Name: COLUMN anexos.anex_num_version; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.anexos.anex_num_version IS 'Numero de versión del anexo';


--
-- Name: COLUMN anexos.radi_docu_publico; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.anexos.radi_docu_publico IS 'Guarda la información correspondiente el documento puede ser visible o no en el landin page';


--
-- Name: COLUMN anexos.fecha_rec_remi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.anexos.fecha_rec_remi IS 'fecha recibido remitente';


--
-- Name: COLUMN anexos.anex_radicado; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.anexos.anex_radicado IS 'Indica si el anexo va a ser una respuesta.';


--
-- Name: COLUMN anexos.anex_tipo_envio; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.anexos.anex_tipo_envio IS 'Inca la forma de envío de la respuesta dada, 1=Fisico, 2= Electrónico';


--
-- Name: COLUMN anexos.doc_firmado_mecanica; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.anexos.doc_firmado_mecanica IS 'Si el documento fue firmado con firma mecánica';


--
-- Name: COLUMN anexos.anexo_combinar_correspondencia; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.anexos.anexo_combinar_correspondencia IS 'Guardar que tipo de remitente es 1=remitente 2=destinatario';


--
-- Name: anexos_historico; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.anexos_historico (
    anex_hist_anex_codi character varying(20) NOT NULL,
    anex_hist_num_ver numeric(4,0) NOT NULL,
    anex_hist_tipo_mod character varying(2) NOT NULL,
    anex_hist_usua character varying(15) NOT NULL,
    anex_hist_fecha date NOT NULL,
    usua_doc character varying(14)
);


ALTER TABLE public.anexos_historico OWNER TO orfeo62usr;

--
-- Name: anexos_tipo; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.anexos_tipo (
    anex_tipo_codi numeric(4,0) NOT NULL,
    anex_tipo_ext character varying(10) NOT NULL,
    anex_tipo_desc character varying(50),
    anex_tipo_icon character varying DEFAULT 'fas fa-file-invoice'::character varying
);


ALTER TABLE public.anexos_tipo OWNER TO orfeo62usr;

--
-- Name: COLUMN anexos_tipo.anex_tipo_icon; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.anexos_tipo.anex_tipo_icon IS 'iconos';


--
-- Name: bodega_empresas; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.bodega_empresas (
    nombre_de_la_empresa character varying(300),
    nuir character varying(13),
    nit_de_la_empresa character varying(80),
    sigla_de_la_empresa character varying(80),
    direccion character varying(4000),
    codigo_del_departamento character varying(4000),
    codigo_del_municipio character varying(4000),
    telefono_1 character varying(4000),
    telefono_2 character varying(4000),
    email character varying(4000),
    nombre_rep_legal character varying(4000),
    cargo_rep_legal character varying(4000),
    identificador_empresa numeric(5,0) NOT NULL,
    are_esp_secue numeric(8,0) DEFAULT 8 NOT NULL,
    id_cont numeric(2,0) DEFAULT 1,
    id_pais numeric(4,0) DEFAULT 170,
    activa numeric(1,0) DEFAULT 1,
    flag_rups character varying(10),
    codigo_suscriptor character varying(50),
    id_users_pqrs integer,
    trte_codi integer DEFAULT 1
);


ALTER TABLE public.bodega_empresas OWNER TO orfeo62usr;

--
-- Name: COLUMN bodega_empresas.codigo_suscriptor; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.bodega_empresas.codigo_suscriptor IS 'Codigo del suscriptor';


--
-- Name: COLUMN bodega_empresas.id_users_pqrs; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.bodega_empresas.id_users_pqrs IS 'Indica el id del usuario correspondiente en la pagina publica';


--
-- Name: COLUMN bodega_empresas.trte_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.bodega_empresas.trte_codi IS 'Tipo de remitente';


--
-- Name: borrar_carpeta_personalizada; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.borrar_carpeta_personalizada (
    carp_per_codi numeric(2,0) NOT NULL,
    carp_per_usu character varying(15) NOT NULL,
    carp_per_desc character varying(80) NOT NULL
);


ALTER TABLE public.borrar_carpeta_personalizada OWNER TO orfeo62usr;

--
-- Name: borrar_empresa_esp; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.borrar_empresa_esp (
    eesp_codi numeric(7,0) NOT NULL,
    eesp_nomb character varying(150) NOT NULL,
    essp_nit character varying(13),
    essp_sigla character varying(30),
    depe_codi character varying(5),
    muni_codi numeric(4,0),
    eesp_dire character varying(50),
    eesp_rep_leg character varying(75)
);


ALTER TABLE public.borrar_empresa_esp OWNER TO orfeo62usr;

--
-- Name: TABLE borrar_empresa_esp; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.borrar_empresa_esp IS 'EMPRESA_ESP';


--
-- Name: COLUMN borrar_empresa_esp.eesp_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.borrar_empresa_esp.eesp_codi IS 'CODGO DE EMPRESA DE SERVICIOS PUBLICOS';


--
-- Name: COLUMN borrar_empresa_esp.eesp_nomb; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.borrar_empresa_esp.eesp_nomb IS 'NOMBRE DE EMPRESA';


--
-- Name: COLUMN borrar_empresa_esp.essp_nit; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.borrar_empresa_esp.essp_nit IS 'ESSP_NIT';


--
-- Name: COLUMN borrar_empresa_esp.essp_sigla; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.borrar_empresa_esp.essp_sigla IS 'ESSP_SIGLA';


--
-- Name: COLUMN borrar_empresa_esp.depe_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.borrar_empresa_esp.depe_codi IS 'DEPE_CODI';


--
-- Name: COLUMN borrar_empresa_esp.muni_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.borrar_empresa_esp.muni_codi IS 'MUNI_CODI';


--
-- Name: carpeta; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.carpeta (
    carp_codi numeric(2,0) NOT NULL,
    carp_desc character varying(80) NOT NULL,
    mostrar_como_tipo numeric(1,0) DEFAULT 1
);


ALTER TABLE public.carpeta OWNER TO orfeo62usr;

--
-- Name: TABLE carpeta; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.carpeta IS 'CARPETA';


--
-- Name: COLUMN carpeta.carp_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.carpeta.carp_codi IS 'CARP_CODI';


--
-- Name: COLUMN carpeta.carp_desc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.carpeta.carp_desc IS 'CARP_DESC';


--
-- Name: COLUMN carpeta.mostrar_como_tipo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.carpeta.mostrar_como_tipo IS 'Indica si se debe mostrar o no como tipo de radicado en el sistema aplica mas que todo para PQRS';


--
-- Name: carpeta_per; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.carpeta_per (
    usua_codi numeric(3,0) NOT NULL,
    depe_codi character varying(5) NOT NULL,
    nomb_carp character varying(50),
    desc_carp character varying(50),
    codi_carp numeric(3,0) DEFAULT 99,
    id_caperta_per integer NOT NULL
);


ALTER TABLE public.carpeta_per OWNER TO orfeo62usr;

--
-- Name: carpeta_per_id_caperta_per_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.carpeta_per_id_caperta_per_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.carpeta_per_id_caperta_per_seq OWNER TO orfeo62usr;

--
-- Name: carpeta_per_id_caperta_per_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.carpeta_per_id_caperta_per_seq OWNED BY public.carpeta_per.id_caperta_per;


--
-- Name: centro_poblado; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.centro_poblado (
    cpob_codi numeric(4,0) NOT NULL,
    muni_codi numeric(4,0) NOT NULL,
    dpto_codi numeric(2,0) NOT NULL,
    cpob_nomb character varying(100) NOT NULL,
    cpob_nomb_anterior character varying(100)
);


ALTER TABLE public.centro_poblado OWNER TO orfeo62usr;

--
-- Name: TABLE centro_poblado; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.centro_poblado IS 'CENTRO_POBLADO';


--
-- Name: COLUMN centro_poblado.cpob_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.centro_poblado.cpob_codi IS 'CPOB_CODI';


--
-- Name: COLUMN centro_poblado.muni_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.centro_poblado.muni_codi IS 'MUNI_CODI';


--
-- Name: COLUMN centro_poblado.dpto_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.centro_poblado.dpto_codi IS 'DPTO_CODI';


--
-- Name: COLUMN centro_poblado.cpob_nomb; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.centro_poblado.cpob_nomb IS 'CPOB_NOMB';


--
-- Name: configuracion_contrasena; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.configuracion_contrasena (
    "idConfiguracionContracsena" integer NOT NULL,
    numero_periocidad numeric(2,0) NOT NULL,
    descripcion_periocidad character varying(15) NOT NULL,
    dias_notificacion numeric(2,0) NOT NULL,
    estado_configuracion_contrasena boolean NOT NULL,
    anio_creacion character varying(4)
);


ALTER TABLE public.configuracion_contrasena OWNER TO orfeo62usr;

--
-- Name: TABLE configuracion_contrasena; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.configuracion_contrasena IS 'tabla que guarda la información de las configuraciones de las contrasñeas';


--
-- Name: COLUMN configuracion_contrasena."idConfiguracionContracsena"; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.configuracion_contrasena."idConfiguracionContracsena" IS 'Identificador de tabla';


--
-- Name: COLUMN configuracion_contrasena.numero_periocidad; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.configuracion_contrasena.numero_periocidad IS 'Indica la cantidad de dias, semanas o meses en los que vence la contraseña';


--
-- Name: COLUMN configuracion_contrasena.descripcion_periocidad; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.configuracion_contrasena.descripcion_periocidad IS 'Indica la descripción de la periocidad dias, semanas y meses';


--
-- Name: COLUMN configuracion_contrasena.dias_notificacion; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.configuracion_contrasena.dias_notificacion IS 'indica la cantidad de dias antes del vencimiento de la contraseña';


--
-- Name: COLUMN configuracion_contrasena.estado_configuracion_contrasena; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.configuracion_contrasena.estado_configuracion_contrasena IS 'Indica el estado de la confuguración';


--
-- Name: COLUMN configuracion_contrasena.anio_creacion; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.configuracion_contrasena.anio_creacion IS 'guara el año en el que se crea la configuración';


--
-- Name: configuracion_contrasena_idConfiguracionContracsena_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public."configuracion_contrasena_idConfiguracionContracsena_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."configuracion_contrasena_idConfiguracionContracsena_seq" OWNER TO orfeo62usr;

--
-- Name: configuracion_contrasena_idConfiguracionContracsena_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public."configuracion_contrasena_idConfiguracionContracsena_seq" OWNED BY public.configuracion_contrasena."idConfiguracionContracsena";


--
-- Name: configuracion_general_fondo; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.configuracion_general_fondo (
    id_campo_configuracion_fondo integer NOT NULL,
    nombre_campo_configuracion_fondo character varying(100),
    descripcion_campo_configuracion_fondo character varying(100),
    consultar_configuracion_fondo numeric(2,0),
    tipo_consulta_configuracion_fondo numeric(2,0)
);


ALTER TABLE public.configuracion_general_fondo OWNER TO orfeo62usr;

--
-- Name: TABLE configuracion_general_fondo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.configuracion_general_fondo IS 'En esta tabla se va a guardar la configuración de los campos que se mostraran en el visor de consulta de fondo acumulado. 1= decretos, 2= resoluciones, 3=comunicaciones, 4=contratos, 5=posesiones, 6=titulaciones, 7=manual funciones, 8=plan desarrollo, 9=acuerdos, 10=historia laboral';


--
-- Name: COLUMN configuracion_general_fondo.id_campo_configuracion_fondo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.configuracion_general_fondo.id_campo_configuracion_fondo IS 'Guarda el identificador de la tabla';


--
-- Name: COLUMN configuracion_general_fondo.nombre_campo_configuracion_fondo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.configuracion_general_fondo.nombre_campo_configuracion_fondo IS 'Referencia al nombre del campo de la tabla donde se guarda la información leida del excel';


--
-- Name: COLUMN configuracion_general_fondo.descripcion_campo_configuracion_fondo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.configuracion_general_fondo.descripcion_campo_configuracion_fondo IS 'Referencia el texto que va a mostrar en el formulario el label del campo de la tabla donde se guarda la información leida del excel tipo_consulta_configuracion_fondo';


--
-- Name: COLUMN configuracion_general_fondo.consultar_configuracion_fondo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.configuracion_general_fondo.consultar_configuracion_fondo IS 'Indica si el campo va a ser utilizado para consultar de la información leida del excel';


--
-- Name: COLUMN configuracion_general_fondo.tipo_consulta_configuracion_fondo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.configuracion_general_fondo.tipo_consulta_configuracion_fondo IS 'Indica el tipo de archivo leido';


--
-- Name: configuracion_general_fondo_id_campo_configuracion_fondo_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.configuracion_general_fondo_id_campo_configuracion_fondo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.configuracion_general_fondo_id_campo_configuracion_fondo_seq OWNER TO orfeo62usr;

--
-- Name: configuracion_general_fondo_id_campo_configuracion_fondo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.configuracion_general_fondo_id_campo_configuracion_fondo_seq OWNED BY public.configuracion_general_fondo.id_campo_configuracion_fondo;


--
-- Name: contrasenas_guardadas; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.contrasenas_guardadas (
    id_contrasena_guardada integer NOT NULL,
    usua_login_contrasena_guardada character varying(15) NOT NULL,
    contrasena_anterior_contrasena_guardada character varying(150) NOT NULL,
    contrasena_nueva_contrasena_guardada character varying(150) NOT NULL,
    fecha_creacion_contrasena_guardada date NOT NULL,
    fecha_vencimiento_contrasena_guardada date NOT NULL,
    estado_contrasena_guardada boolean DEFAULT true NOT NULL
);


ALTER TABLE public.contrasenas_guardadas OWNER TO orfeo62usr;

--
-- Name: TABLE contrasenas_guardadas; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.contrasenas_guardadas IS 'Guarda las contraseñas correspondientes a los usuarios.';


--
-- Name: COLUMN contrasenas_guardadas.id_contrasena_guardada; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.contrasenas_guardadas.id_contrasena_guardada IS 'Identificador de tabla';


--
-- Name: COLUMN contrasenas_guardadas.usua_login_contrasena_guardada; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.contrasenas_guardadas.usua_login_contrasena_guardada IS 'indica el usuario al que se le esta guardando la contraseña';


--
-- Name: COLUMN contrasenas_guardadas.contrasena_anterior_contrasena_guardada; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.contrasenas_guardadas.contrasena_anterior_contrasena_guardada IS 'indica la contraseña anterior que tenia el usuario';


--
-- Name: COLUMN contrasenas_guardadas.contrasena_nueva_contrasena_guardada; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.contrasenas_guardadas.contrasena_nueva_contrasena_guardada IS 'indica la contraseña nueva que tiene el usuario';


--
-- Name: COLUMN contrasenas_guardadas.fecha_creacion_contrasena_guardada; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.contrasenas_guardadas.fecha_creacion_contrasena_guardada IS 'indica la fecha en la que se crea el registro';


--
-- Name: COLUMN contrasenas_guardadas.fecha_vencimiento_contrasena_guardada; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.contrasenas_guardadas.fecha_vencimiento_contrasena_guardada IS 'indica la fecha de vencimiento de la contraseña';


--
-- Name: COLUMN contrasenas_guardadas.estado_contrasena_guardada; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.contrasenas_guardadas.estado_contrasena_guardada IS 'indica el estado de la contraseña';


--
-- Name: contrasenas_guardadas_id_contrasena_guardada_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.contrasenas_guardadas_id_contrasena_guardada_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.contrasenas_guardadas_id_contrasena_guardada_seq OWNER TO orfeo62usr;

--
-- Name: contrasenas_guardadas_id_contrasena_guardada_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.contrasenas_guardadas_id_contrasena_guardada_seq OWNED BY public.contrasenas_guardadas.id_contrasena_guardada;


--
-- Name: datosocr; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.datosocr (
    indice integer NOT NULL,
    nume_radi character varying(30) NOT NULL,
    texto text NOT NULL,
    radi_nume_deri character varying(30),
    fecha_radi timestamp with time zone NOT NULL,
    tipo numeric(2,0) NOT NULL,
    radi_depe_radi character varying(5) NOT NULL,
    tipo_radi numeric(2,0) NOT NULL,
    tdoc_codi numeric(4,0) NOT NULL,
    anex_desc character varying(50000),
    fechaocr timestamp with time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.datosocr OWNER TO orfeo62usr;

--
-- Name: TABLE datosocr; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.datosocr IS 'datosocr es donde se guarda directamente todo lo que skinascan reconoce como texto';


--
-- Name: datosocr_indice_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.datosocr_indice_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.datosocr_indice_seq OWNER TO orfeo62usr;

--
-- Name: datosocr_indice_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.datosocr_indice_seq OWNED BY public.datosocr.indice;


--
-- Name: departamento; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.departamento (
    dpto_codi numeric(3,0) NOT NULL,
    dpto_nomb character varying(70) NOT NULL,
    id_cont numeric(2,0) DEFAULT 1,
    id_pais numeric(4,0) DEFAULT 170 NOT NULL
);


ALTER TABLE public.departamento OWNER TO orfeo62usr;

--
-- Name: TABLE departamento; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.departamento IS 'DEPARTAMENTO';


--
-- Name: COLUMN departamento.dpto_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.departamento.dpto_codi IS 'DPTO_CODI';


--
-- Name: COLUMN departamento.dpto_nomb; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.departamento.dpto_nomb IS 'DPTO_NOMB';


--
-- Name: dependencia; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.dependencia (
    depe_codi character varying(5) NOT NULL,
    depe_nomb character varying(700) NOT NULL,
    dpto_codi numeric(2,0),
    depe_codi_padre character varying(5),
    muni_codi numeric(4,0),
    depe_codi_territorial character varying(5),
    dep_sigla character varying(100),
    dep_central numeric(1,0),
    dep_direccion character varying(100),
    depe_num_interna numeric(4,0),
    depe_num_resolucion numeric(4,0),
    depe_rad_tp1 character varying(5),
    depe_rad_tp2 character varying(5),
    id_cont numeric(2,0) DEFAULT 1,
    id_pais numeric(4,0) DEFAULT 170,
    depe_estado numeric(1,0) DEFAULT 0,
    depe_segu numeric(1,0),
    depe_rad_tp4 character varying(5),
    depe_rad_tp3 character varying(5)
);


ALTER TABLE public.dependencia OWNER TO orfeo62usr;

--
-- Name: COLUMN dependencia.depe_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.dependencia.depe_codi IS 'CODIGO DE DEPENDENCIA';


--
-- Name: COLUMN dependencia.depe_nomb; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.dependencia.depe_nomb IS 'NOMBRE DE DEPENDENCIA';


--
-- Name: COLUMN dependencia.dep_sigla; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.dependencia.dep_sigla IS 'SIGLA DE LA DEPENDENCIA';


--
-- Name: COLUMN dependencia.dep_central; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.dependencia.dep_central IS 'INDICA SI SE TRATA DE UNA DEPENDENCIA DEL NIVEL CENTRAL';


--
-- Name: COLUMN dependencia.depe_segu; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.dependencia.depe_segu IS 'Guarda valor que identifica que la dependencia tenga seguridad o no en la consulta de radicados ';


--
-- Name: dependencia_visibilidad; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.dependencia_visibilidad (
    codigo_visibilidad numeric(18,0) NOT NULL,
    dependencia_visible character varying(5) NOT NULL,
    dependencia_observa character varying(5) NOT NULL
);


ALTER TABLE public.dependencia_visibilidad OWNER TO orfeo62usr;

--
-- Name: dependencias; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.dependencias
    START WITH 0
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 9999
    CACHE 1;


ALTER TABLE public.dependencias OWNER TO orfeo62usr;

--
-- Name: direccion_usuarios; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.direccion_usuarios (
    id integer NOT NULL,
    "DirCam1" character varying(10),
    "DirCam2" character varying(10),
    "DirCam3" character varying(10),
    "DirCam4" character varying(10),
    "DirCam5" character varying(10),
    "DirCam6" character varying(10)
);


ALTER TABLE public.direccion_usuarios OWNER TO orfeo62usr;

--
-- Name: TABLE direccion_usuarios; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.direccion_usuarios IS 'guarda la dirección del usuariio';


--
-- Name: direccion_usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.direccion_usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.direccion_usuarios_id_seq OWNER TO orfeo62usr;

--
-- Name: direccion_usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.direccion_usuarios_id_seq OWNED BY public.direccion_usuarios.id;


--
-- Name: estado; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.estado (
    esta_codi numeric(2,0) NOT NULL,
    esta_desc character varying(100) NOT NULL,
    estado_tipo_radicado numeric(1,0)
);


ALTER TABLE public.estado OWNER TO orfeo62usr;

--
-- Name: TABLE estado; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.estado IS 'ESTADO';


--
-- Name: COLUMN estado.esta_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.estado.esta_codi IS 'ESTA_CODI';


--
-- Name: COLUMN estado.esta_desc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.estado.esta_desc IS 'ESTA_DESC';


--
-- Name: COLUMN estado.estado_tipo_radicado; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.estado.estado_tipo_radicado IS 'Guarda el id del tipo de radicado donde se ve afectado el estado';


--
-- Name: estado_civil_pqrs; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.estado_civil_pqrs (
    id_estado_civil_pqrs integer NOT NULL,
    tipo_estado_civil_pqrs character varying(50)
);


ALTER TABLE public.estado_civil_pqrs OWNER TO orfeo62usr;

--
-- Name: estado_civil_pqrs_id_estado_civil_pqrs_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.estado_civil_pqrs_id_estado_civil_pqrs_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estado_civil_pqrs_id_estado_civil_pqrs_seq OWNER TO orfeo62usr;

--
-- Name: estado_civil_pqrs_id_estado_civil_pqrs_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.estado_civil_pqrs_id_estado_civil_pqrs_seq OWNED BY public.estado_civil_pqrs.id_estado_civil_pqrs;


--
-- Name: fondo_acumulado_comunicaciones_id_fondo_acumulado_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.fondo_acumulado_comunicaciones_id_fondo_acumulado_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.fondo_acumulado_comunicaciones_id_fondo_acumulado_seq OWNER TO orfeo62usr;

--
-- Name: fondo_acumulado_comunicaciones; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.fondo_acumulado_comunicaciones (
    id_fondo_acumulado_comunicaciones integer DEFAULT nextval('public.fondo_acumulado_comunicaciones_id_fondo_acumulado_seq'::regclass) NOT NULL,
    tipo_fondo numeric(1,0),
    campo1 date,
    campo2 character varying(10000),
    campo3 character varying(10),
    campo4 character varying(10000),
    campo5 character varying(10000),
    campo6 character varying(10000),
    campo7 character varying(10000),
    campo8 character varying(10000),
    campo9 character varying(1000),
    campo10 character varying(10000),
    campo11 character varying(10000),
    campo12 numeric(4,0)
);


ALTER TABLE public.fondo_acumulado_comunicaciones OWNER TO orfeo62usr;

--
-- Name: COLUMN fondo_acumulado_comunicaciones.id_fondo_acumulado_comunicaciones; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.fondo_acumulado_comunicaciones.id_fondo_acumulado_comunicaciones IS 'Guarda el identificador de la tabla';


--
-- Name: COLUMN fondo_acumulado_comunicaciones.tipo_fondo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.fondo_acumulado_comunicaciones.tipo_fondo IS 'Guarda el tipo de archivo del fondo acumulado 3= comunicaciones, 2= resoluciones';


--
-- Name: COLUMN fondo_acumulado_comunicaciones.campo1; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.fondo_acumulado_comunicaciones.campo1 IS 'Guarda fecha_recibido que se esta leyendo';


--
-- Name: COLUMN fondo_acumulado_comunicaciones.campo2; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.fondo_acumulado_comunicaciones.campo2 IS 'Guarda codigo_dependencia que se esta leyendo';


--
-- Name: COLUMN fondo_acumulado_comunicaciones.campo3; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.fondo_acumulado_comunicaciones.campo3 IS 'Guarda numero_consecutivo que se esta leyendo';


--
-- Name: COLUMN fondo_acumulado_comunicaciones.campo4; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.fondo_acumulado_comunicaciones.campo4 IS 'Guarda entidad que se esta leyendo';


--
-- Name: COLUMN fondo_acumulado_comunicaciones.campo5; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.fondo_acumulado_comunicaciones.campo5 IS 'Guarda persona que se esta leyendo';


--
-- Name: COLUMN fondo_acumulado_comunicaciones.campo6; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.fondo_acumulado_comunicaciones.campo6 IS 'Guarda ubicacion_electronica que se esta leyendo';


--
-- Name: COLUMN fondo_acumulado_comunicaciones.campo7; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.fondo_acumulado_comunicaciones.campo7 IS 'Guarda lugar que se esta leyendo';


--
-- Name: COLUMN fondo_acumulado_comunicaciones.campo8; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.fondo_acumulado_comunicaciones.campo8 IS 'Guarda referencia que se esta leyendo';


--
-- Name: COLUMN fondo_acumulado_comunicaciones.campo9; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.fondo_acumulado_comunicaciones.campo9 IS 'Guarda anexos que se esta leyendo';


--
-- Name: COLUMN fondo_acumulado_comunicaciones.campo10; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.fondo_acumulado_comunicaciones.campo10 IS 'Guarda usuario_firma que se esta leyendo';


--
-- Name: COLUMN fondo_acumulado_comunicaciones.campo11; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.fondo_acumulado_comunicaciones.campo11 IS 'Guarda no_conforme que se esta leyendo';


--
-- Name: COLUMN fondo_acumulado_comunicaciones.campo12; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.fondo_acumulado_comunicaciones.campo12 IS 'Guarda año que se esta leyendo';


--
-- Name: fun_funcionario; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.fun_funcionario (
    usua_doc character varying(14),
    usua_fech_crea date NOT NULL,
    usua_esta character varying(10) NOT NULL,
    usua_nomb character varying(45),
    usua_ext numeric(4,0),
    usua_nacim date,
    usua_email character varying(50),
    usua_at character varying(15),
    usua_piso numeric(2,0),
    cedula_ok character(1) DEFAULT 'n'::bpchar,
    cedula_suip character varying(15),
    nombre_suip character varying(45),
    observa character(20)
);


ALTER TABLE public.fun_funcionario OWNER TO orfeo62usr;

--
-- Name: genero_pqrs; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.genero_pqrs (
    genero_pqrs_id integer NOT NULL,
    genero_pqrs_tipo text
);


ALTER TABLE public.genero_pqrs OWNER TO orfeo62usr;

--
-- Name: grupo_interes; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.grupo_interes (
    id_grupo_interes integer NOT NULL,
    nombre_grupo_interes character varying(50)
);


ALTER TABLE public.grupo_interes OWNER TO orfeo62usr;

--
-- Name: TABLE grupo_interes; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.grupo_interes IS 'Guarda la información relacionada a los grupos de interes';


--
-- Name: COLUMN grupo_interes.id_grupo_interes; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.grupo_interes.id_grupo_interes IS 'Identificador de tabla';


--
-- Name: COLUMN grupo_interes.nombre_grupo_interes; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.grupo_interes.nombre_grupo_interes IS 'Nombre del grupo de interés de la entidad';


--
-- Name: grupos_informados; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.grupos_informados (
    id_grupos_informados integer NOT NULL,
    nombre_grupo character varying(100) NOT NULL,
    descripcion_grupo character varying(255),
    activo_grupo integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.grupos_informados OWNER TO orfeo62usr;

--
-- Name: TABLE grupos_informados; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.grupos_informados IS 'Tabla para almacenar los nombres de los grupos a los que se van a informar los radicados';


--
-- Name: grupos_informados_id_grupos_informados_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.grupos_informados_id_grupos_informados_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.grupos_informados_id_grupos_informados_seq OWNER TO orfeo62usr;

--
-- Name: grupos_informados_id_grupos_informados_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.grupos_informados_id_grupos_informados_seq OWNED BY public.grupos_informados.id_grupos_informados;


--
-- Name: grupos_informados_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.grupos_informados_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.grupos_informados_seq OWNER TO orfeo62usr;

--
-- Name: grupos_informados_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.grupos_informados_seq OWNED BY public.grupos_informados.id_grupos_informados;


--
-- Name: hist_eventos; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.hist_eventos (
    depe_codi character varying(5) NOT NULL,
    hist_fech timestamp with time zone NOT NULL,
    usua_codi numeric(10,0) NOT NULL,
    radi_nume_radi character varying(30) NOT NULL,
    hist_obse character varying(10000) NOT NULL,
    usua_codi_dest numeric(10,0),
    usua_doc character varying(14),
    usua_doc_old character varying(15),
    sgd_ttr_codigo numeric(3,0),
    hist_usua_autor character varying(14),
    hist_doc_dest character varying(14),
    depe_codi_dest character varying(5)
);


ALTER TABLE public.hist_eventos OWNER TO orfeo62usr;

--
-- Name: TABLE hist_eventos; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.hist_eventos IS 'HIST_EVENTOS';


--
-- Name: COLUMN hist_eventos.depe_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.hist_eventos.depe_codi IS 'DEPE_CODI';


--
-- Name: COLUMN hist_eventos.hist_fech; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.hist_eventos.hist_fech IS 'HIST_FECH';


--
-- Name: COLUMN hist_eventos.usua_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.hist_eventos.usua_codi IS 'USUA_CODI';


--
-- Name: COLUMN hist_eventos.radi_nume_radi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.hist_eventos.radi_nume_radi IS 'Numero de Radicado';


--
-- Name: COLUMN hist_eventos.hist_obse; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.hist_eventos.hist_obse IS 'HIST_OBSE';


--
-- Name: COLUMN hist_eventos.usua_codi_dest; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.hist_eventos.usua_codi_dest IS 'Codigo del usuario destino.';


--
-- Name: COLUMN hist_eventos.sgd_ttr_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.hist_eventos.sgd_ttr_codigo IS 'Tipo de Evento';


--
-- Name: COLUMN hist_eventos.hist_doc_dest; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.hist_eventos.hist_doc_dest IS 'Documento del usuario destino No. implentado';


--
-- Name: COLUMN hist_eventos.depe_codi_dest; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.hist_eventos.depe_codi_dest IS 'Codigo de la dependencia del usuario destino';


--
-- Name: informados; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.informados (
    radi_nume_radi character varying(30) NOT NULL,
    usua_codi numeric(10,0) NOT NULL,
    depe_codi character varying(5) NOT NULL,
    info_desc character varying(600),
    info_fech date NOT NULL,
    info_leido numeric(1,0) DEFAULT 0,
    usua_codi_info numeric(3,0),
    info_codi numeric(10,0),
    usua_doc character varying(14),
    info_resp character varying(10)
);


ALTER TABLE public.informados OWNER TO orfeo62usr;

--
-- Name: COLUMN informados.usua_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.informados.usua_codi IS 'Codigo de usuario';


--
-- Name: COLUMN informados.info_resp; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.informados.info_resp IS 'Indica si el informado necesita respuesta.';


--
-- Name: inventario_documental; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.inventario_documental (
    id_inv_documental integer NOT NULL,
    uni_administrativa character varying,
    ofi_productora character varying,
    no_orden character varying,
    objeto character varying,
    codigo character varying,
    nombre character varying,
    sub_serie character varying,
    fecha_ext_ini date,
    fecha_ext_end date,
    caja numeric,
    carpeta numeric,
    tomo numeric,
    otro character varying,
    modulo numeric,
    estante numeric,
    no_folios numeric,
    fr_consulta numeric,
    notas character varying,
    soporte character varying
);


ALTER TABLE public.inventario_documental OWNER TO orfeo62usr;

--
-- Name: COLUMN inventario_documental.fr_consulta; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.inventario_documental.fr_consulta IS '1 => baja, 2 => media, 3 => alta';


--
-- Name: inventario_documentos; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.inventario_documentos (
    id_inv_documento integer NOT NULL,
    original_inv_doc character varying,
    nombre_inv_doc character varying,
    ruta_inv_doc character varying,
    tipo_inv_doc character varying,
    tamano_inv_doc character varying,
    user_inv_doc numeric,
    creacion_inv_doc date,
    id_inv_documental numeric
);


ALTER TABLE public.inventario_documentos OWNER TO orfeo62usr;

--
-- Name: medio_recepcion; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.medio_recepcion (
    mrec_codi numeric(2,0) NOT NULL,
    mrec_desc character varying(100) NOT NULL
);


ALTER TABLE public.medio_recepcion OWNER TO orfeo62usr;

--
-- Name: TABLE medio_recepcion; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.medio_recepcion IS 'MEDIO_RECEPCION';


--
-- Name: COLUMN medio_recepcion.mrec_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.medio_recepcion.mrec_codi IS 'CODIGO DE MEDIO DE RECEPCION';


--
-- Name: COLUMN medio_recepcion.mrec_desc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.medio_recepcion.mrec_desc IS 'DESCRIPCION DEL MEDIO';


--
-- Name: municipio; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.municipio (
    muni_codi numeric(4,0) NOT NULL,
    dpto_codi numeric(3,0) NOT NULL,
    muni_nomb character varying(100) NOT NULL,
    id_cont numeric(2,0) DEFAULT 1,
    id_pais numeric(4,0) DEFAULT 170 NOT NULL,
    homologa_muni character varying(10),
    homologa_idmuni character varying(15),
    activa numeric(1,0) DEFAULT 1
);


ALTER TABLE public.municipio OWNER TO orfeo62usr;

--
-- Name: TABLE municipio; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.municipio IS 'MUNICIPIO';


--
-- Name: COLUMN municipio.muni_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.municipio.muni_codi IS 'MUNI_CODI';


--
-- Name: COLUMN municipio.dpto_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.municipio.dpto_codi IS 'DPTO_CODI';


--
-- Name: COLUMN municipio.muni_nomb; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.municipio.muni_nomb IS 'MUNI_NOMB';


--
-- Name: nivel_academico_pqrs_id_nivel_acad_pqrs_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.nivel_academico_pqrs_id_nivel_acad_pqrs_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nivel_academico_pqrs_id_nivel_acad_pqrs_seq OWNER TO orfeo62usr;

--
-- Name: nivel_academico_pqrs; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.nivel_academico_pqrs (
    id_nivel_acad_pqrs integer DEFAULT nextval('public.nivel_academico_pqrs_id_nivel_acad_pqrs_seq'::regclass) NOT NULL,
    descripcion_nivel_acad_pqrs character varying(50)
);


ALTER TABLE public.nivel_academico_pqrs OWNER TO orfeo62usr;

--
-- Name: num_resol_dtc; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.num_resol_dtc
    START WITH 24
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 999999
    CACHE 1;


ALTER TABLE public.num_resol_dtc OWNER TO orfeo62usr;

--
-- Name: num_resol_dtn; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.num_resol_dtn
    START WITH 101
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 99999999999999999
    CACHE 1;


ALTER TABLE public.num_resol_dtn OWNER TO orfeo62usr;

--
-- Name: num_resol_dtoc; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.num_resol_dtoc
    START WITH 21
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 99999999999999999
    CACHE 1;


ALTER TABLE public.num_resol_dtoc OWNER TO orfeo62usr;

--
-- Name: num_resol_dtor; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.num_resol_dtor
    START WITH 61
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 99999999999999999
    CACHE 1;


ALTER TABLE public.num_resol_dtor OWNER TO orfeo62usr;

--
-- Name: num_resol_dts; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.num_resol_dts
    START WITH 61
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 99999999999999999
    CACHE 1;


ALTER TABLE public.num_resol_dts OWNER TO orfeo62usr;

--
-- Name: num_resol_gral; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.num_resol_gral
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 99999999999999999
    CACHE 20;


ALTER TABLE public.num_resol_gral OWNER TO orfeo62usr;

--
-- Name: par_serv_servicios; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.par_serv_servicios (
    par_serv_secue numeric(8,0) NOT NULL,
    par_serv_codigo character varying(5),
    par_serv_nombre character varying(100),
    par_serv_estado character varying(1)
);


ALTER TABLE public.par_serv_servicios OWNER TO orfeo62usr;

--
-- Name: perfiles; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.perfiles (
    codi_perfil integer NOT NULL,
    nomb_perfil character varying(150) NOT NULL,
    usua_esta character varying DEFAULT 1 NOT NULL,
    perm_radi character(1) DEFAULT 0,
    usua_admin character(1) DEFAULT 0,
    usua_nuevo character varying(1) DEFAULT 0 NOT NULL,
    codi_nivel numeric(2,0) DEFAULT 3 NOT NULL,
    perm_radi_sal numeric(1,0) DEFAULT 0,
    usua_admin_archivo numeric(1,0) DEFAULT 0,
    usua_masiva numeric(1,0) DEFAULT 0,
    usua_perm_dev numeric(1,0) DEFAULT 0,
    usua_perm_numera_res character varying(1) DEFAULT 0,
    usua_perm_numeradoc numeric DEFAULT 0,
    sgd_panu_codi numeric(4,0) DEFAULT 0,
    usua_prad_tp1 numeric(1,0) DEFAULT 0,
    usua_prad_tp2 numeric(1,0) DEFAULT 0,
    usua_prad_tp4 numeric(1,0) DEFAULT 0,
    usua_perm_envios numeric(1,0) DEFAULT 0,
    usua_perm_modifica numeric(1,0) DEFAULT 0,
    usua_perm_impresion numeric(1,0) DEFAULT 0,
    sgd_aper_codigo numeric(1,0) DEFAULT 0,
    sgd_perm_estadistica numeric(2,0) DEFAULT 0,
    usua_admin_sistema numeric(1,0) DEFAULT 0,
    usua_perm_trd numeric(1,0) DEFAULT 0,
    usua_perm_firma numeric(1,0) DEFAULT 0,
    usua_perm_prestamo numeric(1,0) DEFAULT 0,
    usuario_publico numeric(1,0) DEFAULT 1,
    usuario_reasignar numeric(1,0) DEFAULT 0,
    usua_perm_notifica numeric(1,0) DEFAULT 0,
    usua_perm_expediente numeric DEFAULT 0,
    usua_auth_ldap numeric(1,0) DEFAULT 0,
    perm_archi character varying(1) DEFAULT 0,
    perm_vobo character varying(1) DEFAULT 1,
    perm_borrar_anexo numeric(1,0) DEFAULT 0,
    perm_tipif_anexo numeric(1,0) DEFAULT 0,
    usua_perm_adminflujos numeric(1,0) DEFAULT 0,
    usua_exp_trd numeric(2,0) DEFAULT 0,
    usua_perm_rademail smallint DEFAULT 0,
    usua_perm_accesi numeric(1,0) DEFAULT 0,
    usua_perm_agrcontacto numeric(1,0) DEFAULT 0,
    usua_perm_preradicado numeric(1,0) DEFAULT 0,
    descargar_documentos numeric(1,0) DEFAULT 0,
    usua_perm_reasigna_masiva numeric(1,0),
    usua_nivel_consulta numeric,
    descarga_arc_original smallint DEFAULT 0,
    firma_qr smallint DEFAULT 0,
    per_transferencia_documental smallint DEFAULT 0,
    usua_perm_grupo_usuarios_informados numeric(1,0),
    usua_perm_doc_publico numeric(1,0) DEFAULT 0,
    usua_perm_consulta_rad numeric(1,0),
    consulta_inv_documental numeric,
    carga_inv_documental numeric,
    firma_mecanica smallint,
    usua_prad_tp3 smallint
);


ALTER TABLE public.perfiles OWNER TO orfeo62usr;

--
-- Name: TABLE perfiles; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.perfiles IS 'Guarda los permisos de accesos al sistema mediante un rol';


--
-- Name: COLUMN perfiles.codi_perfil; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.codi_perfil IS 'Identificador de la tabla perfiles el que se relaciona con la tabla usuario';


--
-- Name: COLUMN perfiles.nomb_perfil; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.nomb_perfil IS 'Nombre del perfil (rol)';


--
-- Name: COLUMN perfiles.usua_esta; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_esta IS 'Estado del usuario - Activo o No (1/0)';


--
-- Name: COLUMN perfiles.perm_radi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.perm_radi IS 'Permiso para digitalizacion de documentos: 1 permiso asignado';


--
-- Name: COLUMN perfiles.usua_admin; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_admin IS 'Prestamo de documentos fisicos: 0 sin permiso -  1 permiso asignado';


--
-- Name: COLUMN perfiles.usua_nuevo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_nuevo IS 'Usuario Nuevo ? Si esta en ''''0'''' resetea la contraseña';


--
-- Name: COLUMN perfiles.codi_nivel; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.codi_nivel IS 'Nivel del Usuario';


--
-- Name: COLUMN perfiles.usua_admin_archivo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_admin_archivo IS 'Administrador de Archivo (Expedientes): 0 sin permiso - 1 permiso asignado';


--
-- Name: COLUMN perfiles.usua_masiva; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_masiva IS 'Permiso de radicacion masiva de documentos';


--
-- Name: COLUMN perfiles.usua_perm_dev; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_perm_dev IS 'Devoluciones de correo (Dev_correo): 0 sin permiso - 1 permiso asignado';


--
-- Name: COLUMN perfiles.sgd_panu_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.sgd_panu_codi IS 'Permisos de anulacion de radicados: 1 - Permiso de solicitud de anulado 2- Permiso de anulacion y generacion de actas 3- Permiso 1 y 2';


--
-- Name: COLUMN perfiles.usua_prad_tp1; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_prad_tp1 IS 'Si esta en ''''1'''' El usuario Tiene Permisos de radicacicion Tipo 1.  En nuestro caso de salida';


--
-- Name: COLUMN perfiles.usua_prad_tp2; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_prad_tp2 IS 'Si esta en ''''2'''' El usuario Tiene Permisos de radicacicion Tipo 2.  En nuestro caso de Entrada';


--
-- Name: COLUMN perfiles.usua_perm_envios; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_perm_envios IS 'Envios de correo (correspondencia): 0 sin permiso - 1 permiso asignado';


--
-- Name: COLUMN perfiles.usua_perm_modifica; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_perm_modifica IS 'Permiso de modificar Radicados';


--
-- Name: COLUMN perfiles.usua_perm_impresion; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_perm_impresion IS 'Carpeta de impresion: 0 sin permiso - 1 permiso asignado';


--
-- Name: COLUMN perfiles.sgd_perm_estadistica; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.sgd_perm_estadistica IS 'Si tiene ''''1'''' tiene permisos como jefe para ver las estadisticas de la dependencia';


--
-- Name: COLUMN perfiles.usua_admin_sistema; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_admin_sistema IS 'Administrador del sistema : 0 sin permiso - 1 permiso asignado';


--
-- Name: COLUMN perfiles.usua_perm_trd; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_perm_trd IS 'Usuario Administracion de tablas de retencion documental : 0 sin permiso - 1 permiso asignado';


--
-- Name: COLUMN perfiles.usua_perm_prestamo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_perm_prestamo IS 'Indica si un usuario tiene o no permiso de acceso al modulo de prestamo. Segun su valor: Tiene permiso (0) No tiene permiso';


--
-- Name: COLUMN perfiles.perm_borrar_anexo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.perm_borrar_anexo IS 'Indica si un usuario tiene (1) o no (0) permiso para tipificar anexos .pdf';


--
-- Name: COLUMN perfiles.perm_tipif_anexo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.perm_tipif_anexo IS 'Indica si un usuario tiene (1)  o no (0) permiso para tipificar anexos .pdf';


--
-- Name: COLUMN perfiles.usua_perm_rademail; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_perm_rademail IS 'Permiso de radicacion de email';


--
-- Name: COLUMN perfiles.usua_perm_accesi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_perm_accesi IS 'Permiso para  compatbilidad uso de lector de pantalla';


--
-- Name: COLUMN perfiles.usua_perm_agrcontacto; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_perm_agrcontacto IS 'permiso para agregar contactos formualrio rad';


--
-- Name: COLUMN perfiles.usua_perm_preradicado; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_perm_preradicado IS 'Permiso para la pre-radicación que se realiza en el sistema';


--
-- Name: COLUMN perfiles.usua_perm_reasigna_masiva; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_perm_reasigna_masiva IS 'Este permite asignar el permiso para realizar el proceso de reasignación masiva';


--
-- Name: COLUMN perfiles.usua_nivel_consulta; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_nivel_consulta IS 'Este permiso permite asignar un nivel de consilta a los radicados';


--
-- Name: COLUMN perfiles.descarga_arc_original; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.descarga_arc_original IS 'Este permiso permite descargar el archivo original del radicado';


--
-- Name: COLUMN perfiles.firma_qr; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.firma_qr IS 'Este permiso permite firmar el radicado';


--
-- Name: COLUMN perfiles.usua_perm_grupo_usuarios_informados; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_perm_grupo_usuarios_informados IS 'Este permiso permite asignar el permiso para crear gupos de informados nuevos';


--
-- Name: COLUMN perfiles.usua_perm_consulta_rad; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.usua_perm_consulta_rad IS 'Permiso para el proceso de consulta de radicados marcados como confidenciales';


--
-- Name: COLUMN perfiles.consulta_inv_documental; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.consulta_inv_documental IS 'permiso para consulta de inventario documental';


--
-- Name: COLUMN perfiles.carga_inv_documental; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.carga_inv_documental IS 'permiso para creacion y carga de documentos en inventario documental';


--
-- Name: COLUMN perfiles.firma_mecanica; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.perfiles.firma_mecanica IS 'permiso de firma mecánica';


--
-- Name: perfiles_codi_perfil_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.perfiles_codi_perfil_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.perfiles_codi_perfil_seq OWNER TO orfeo62usr;

--
-- Name: perfiles_codi_perfil_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.perfiles_codi_perfil_seq OWNED BY public.perfiles.codi_perfil;


--
-- Name: pl_generado_plg; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.pl_generado_plg (
    depe_codi character varying(5),
    radi_nume_radi character varying(15),
    plt_codi numeric(4,0),
    plg_codi numeric(4,0),
    plg_comentarios character varying(150),
    plg_analiza numeric(10,0),
    plg_firma numeric(10,0),
    plg_autoriza numeric(10,0),
    plg_imprime numeric(10,0),
    plg_envia numeric(10,0),
    plg_archivo_tmp character varying(150),
    plg_archivo_final character varying(150),
    plg_nombre character varying(30),
    plg_crea numeric(10,0) DEFAULT 0,
    plg_autoriza_fech date,
    plg_imprime_fech date,
    plg_envia_fech date,
    plg_crea_fech date,
    plg_creador character varying(20),
    pl_codi numeric(4,0),
    usua_doc character varying(14),
    sgd_rem_destino numeric(1,0) DEFAULT 0,
    radi_nume_sal character varying(15) DEFAULT 0
);


ALTER TABLE public.pl_generado_plg OWNER TO orfeo62usr;

--
-- Name: pl_tipo_plt; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.pl_tipo_plt (
    plt_codi numeric(4,0) NOT NULL,
    plt_desc character varying(35)
);


ALTER TABLE public.pl_tipo_plt OWNER TO orfeo62usr;

--
-- Name: plan_table; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.plan_table (
    statement_id character varying(30),
    "timestamp" date,
    remarks character varying(80),
    operation character varying(30),
    options character varying(30),
    object_node character varying(128),
    object_owner character varying(30),
    object_name character varying(30),
    object_instance integer,
    object_type character varying(30),
    optimizer character varying(255),
    search_columns numeric,
    id integer,
    parent_id integer,
    "position" integer,
    cost integer,
    cardinality integer,
    s integer,
    other_tag character varying(255),
    partition_start character varying(255),
    partition_stop character varying(255),
    partition_id integer,
    other character varying(255),
    distribution character varying(30)
);


ALTER TABLE public.plan_table OWNER TO orfeo62usr;

--
-- Name: plantilla_pl; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.plantilla_pl (
    pl_codi numeric(4,0) NOT NULL,
    depe_codi character varying(5),
    pl_nomb character varying(35),
    pl_archivo character varying(35),
    pl_desc character varying(150),
    pl_fech date,
    usua_codi numeric(10,0),
    pl_uso numeric(1,0) DEFAULT 0
);


ALTER TABLE public.plantilla_pl OWNER TO orfeo62usr;

--
-- Name: plsql_profiler_runnumeric; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.plsql_profiler_runnumeric
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 99999999999999999
    CACHE 1;


ALTER TABLE public.plsql_profiler_runnumeric OWNER TO orfeo62usr;

--
-- Name: pre_radicado; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.pre_radicado (
    radi_nume_radi character(30) NOT NULL,
    radi_fech_radi timestamp with time zone NOT NULL,
    estado integer NOT NULL
);


ALTER TABLE public.pre_radicado OWNER TO orfeo62usr;

--
-- Name: TABLE pre_radicado; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.pre_radicado IS 'almacena los radicados que se han generado de forma inicial sin remitente alguno';


--
-- Name: pres_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.pres_seq
    START WITH 30392
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 99999999999999999
    CACHE 1;


ALTER TABLE public.pres_seq OWNER TO orfeo62usr;

--
-- Name: prestamo; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.prestamo (
    pres_id numeric(10,0) NOT NULL,
    radi_nume_radi character varying(30) NOT NULL,
    usua_login_actu character varying(50) NOT NULL,
    depe_codi character varying(5) NOT NULL,
    usua_login_pres character varying(50),
    pres_desc character varying(200),
    pres_fech_pres timestamp without time zone,
    pres_fech_devo timestamp without time zone,
    pres_fech_pedi timestamp without time zone NOT NULL,
    pres_estado numeric(2,0),
    pres_requerimiento numeric(2,0),
    pres_depe_arch character varying(5),
    pres_fech_venc timestamp without time zone,
    dev_desc character varying(500),
    pres_fech_canc timestamp without time zone,
    usua_login_canc character varying(50),
    usua_login_rx character varying(50)
);


ALTER TABLE public.prestamo OWNER TO orfeo62usr;

--
-- Name: COLUMN prestamo.dev_desc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.prestamo.dev_desc IS 'Observaciones realizadas por el usuario que recibe la devolucion acerca de la cantidad, el estado, tipo o sucesos acontecidos con los documentos y anexos fisicos';


--
-- Name: COLUMN prestamo.pres_fech_canc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.prestamo.pres_fech_canc IS 'Fecha de cancelacion de la solicitud';


--
-- Name: COLUMN prestamo.usua_login_canc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.prestamo.usua_login_canc IS 'Login del usuario que cancela la solicitud';


--
-- Name: COLUMN prestamo.usua_login_rx; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.prestamo.usua_login_rx IS 'Login del usuario que recibe el documento al momento de entregar.';


--
-- Name: radicado; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.radicado (
    radi_nume_radi character varying(30) NOT NULL,
    radi_fech_radi timestamp with time zone NOT NULL,
    tdoc_codi numeric(4,0) NOT NULL,
    trte_codi numeric(2,0),
    mrec_codi numeric(2,0),
    eesp_codi numeric(10,0),
    eotra_codi numeric(10,0),
    radi_tipo_empr character varying(2),
    radi_fech_ofic date,
    tdid_codi numeric(2,0),
    radi_nume_iden character varying(30),
    radi_nomb character varying(90),
    radi_prim_apel character varying(50),
    radi_segu_apel character varying(50),
    radi_pais character varying(70),
    muni_codi numeric(5,0),
    cpob_codi numeric(4,0),
    carp_codi numeric(3,0),
    esta_codi numeric(2,0),
    dpto_codi numeric(2,0),
    cen_muni_codi numeric(4,0),
    cen_dpto_codi numeric(2,0),
    radi_dire_corr character varying(100),
    radi_tele_cont character varying(15),
    radi_nume_hoja numeric(4,0),
    radi_desc_anex character varying(500),
    radi_nume_deri character varying(30),
    radi_path character varying(100),
    radi_usua_actu numeric(10,0),
    radi_depe_actu character varying(5),
    radi_fech_asig timestamp with time zone,
    radi_arch1 character varying(10),
    radi_arch2 character varying(10),
    radi_arch3 character varying(10),
    radi_arch4 character varying(10),
    ra_asun character varying(50000),
    radi_usu_ante character varying(45),
    radi_depe_radi character varying(5),
    radicado_referencia_cliente character varying(60),
    radi_usua_radi numeric(10,0),
    codi_nivel numeric(2,0) DEFAULT 1,
    flag_nivel integer DEFAULT 1,
    carp_per numeric(1,0) DEFAULT 0,
    radi_leido numeric(1,0) DEFAULT 0,
    radi_cuentai character varying(20),
    radi_tipo_deri numeric(2,0) DEFAULT 0,
    listo character varying(2),
    sgd_tma_codigo numeric(4,0),
    sgd_mtd_codigo numeric(4,0),
    par_serv_secue numeric(8,0),
    sgd_fld_codigo numeric(3,0) DEFAULT 0,
    radi_agend numeric(1,0),
    radi_fech_agend timestamp with time zone,
    radi_fech_doc date,
    sgd_doc_secuencia numeric(15,0),
    sgd_pnufe_codi numeric(4,0),
    sgd_eanu_codigo numeric(1,0),
    sgd_not_codi numeric(3,0),
    radi_fech_notif timestamp with time zone,
    sgd_tdec_codigo numeric(4,0),
    sgd_apli_codi numeric(4,0),
    sgd_ttr_codigo integer DEFAULT 0,
    usua_doc_ante character varying(14),
    radi_fech_antetx timestamp with time zone,
    sgd_trad_codigo numeric(2,0),
    fech_vcmto timestamp with time zone,
    tdoc_vcmto numeric(4,0),
    sgd_termino_real numeric(4,0),
    id_cont numeric(2,0) DEFAULT 1,
    sgd_spub_codigo numeric(2,0) DEFAULT 0,
    id_pais numeric(4,0),
    medio_m character varying(5),
    radi_nrr numeric(2,0),
    numero_rm character varying(15),
    numero_tran character varying(15),
    firma_qr smallint DEFAULT 0,
    tipo_usario_interes numeric(2,0) DEFAULT 0,
    doc_transferido smallint DEFAULT 1,
    radi_fech_reasignado timestamp with time zone,
    radi_envio_correo boolean,
    radi_docu_publico boolean DEFAULT false,
    radi_eje_tematico numeric,
    radi_estado_pqrs numeric DEFAULT 1,
    descripcion_asunto_pqrs text,
    grupo_interes integer,
    servicio_pqr integer,
    radi_depe_ante character varying(5)
);


ALTER TABLE public.radicado OWNER TO orfeo62usr;

--
-- Name: COLUMN radicado.radi_nume_radi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_nume_radi IS 'Numero de Radicado';


--
-- Name: COLUMN radicado.radi_fech_radi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_fech_radi IS 'FECHA DE RADICACION';


--
-- Name: COLUMN radicado.tdoc_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.tdoc_codi IS 'Tipo de Documento, (ej. Res, derecho pet, tutela, etc .. . . . .)';


--
-- Name: COLUMN radicado.trte_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.trte_codi IS 'TRTE_CODI';


--
-- Name: COLUMN radicado.mrec_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.mrec_codi IS 'MREC_CODI';


--
-- Name: COLUMN radicado.eesp_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.eesp_codi IS 'EESP_CODI';


--
-- Name: COLUMN radicado.eotra_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.eotra_codi IS 'EOTRA_CODI';


--
-- Name: COLUMN radicado.radi_tipo_empr; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_tipo_empr IS 'TIPO DE EMPRESA (OTRA O ESP)';


--
-- Name: COLUMN radicado.radi_fech_ofic; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_fech_ofic IS 'FECHA DE OFICIO';


--
-- Name: COLUMN radicado.tdid_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.tdid_codi IS 'TDID_CODI';


--
-- Name: COLUMN radicado.radi_nume_iden; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_nume_iden IS 'NUMERO DE IDENTIFICACION';


--
-- Name: COLUMN radicado.radi_nomb; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_nomb IS 'NOMBRE';


--
-- Name: COLUMN radicado.radi_prim_apel; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_prim_apel IS '1 APELLIDO';


--
-- Name: COLUMN radicado.radi_segu_apel; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_segu_apel IS '2 APELLIDO';


--
-- Name: COLUMN radicado.radi_pais; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_pais IS 'PAIS (DEFAULT COLOMBIA)';


--
-- Name: COLUMN radicado.muni_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.muni_codi IS 'MUNI_CODI';


--
-- Name: COLUMN radicado.cpob_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.cpob_codi IS 'CPOB_CODI';


--
-- Name: COLUMN radicado.carp_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.carp_codi IS 'CARP_CODI';


--
-- Name: COLUMN radicado.esta_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.esta_codi IS 'ESTA_CODI';


--
-- Name: COLUMN radicado.dpto_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.dpto_codi IS 'DPTO_CODI';


--
-- Name: COLUMN radicado.cen_muni_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.cen_muni_codi IS 'CEN_MUNI_CODI';


--
-- Name: COLUMN radicado.cen_dpto_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.cen_dpto_codi IS 'CEN_DPTO_CODI';


--
-- Name: COLUMN radicado.radi_dire_corr; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_dire_corr IS 'DIRECCION CORRESPONDENCIA';


--
-- Name: COLUMN radicado.radi_tele_cont; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_tele_cont IS 'TELEFONO CONTACTO';


--
-- Name: COLUMN radicado.radi_nume_hoja; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_nume_hoja IS 'NUMERO DE HOJAS';


--
-- Name: COLUMN radicado.radi_desc_anex; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_desc_anex IS 'DESCRIPCION DE ANEXOS';


--
-- Name: COLUMN radicado.radi_nume_deri; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_nume_deri IS 'NUMERO DERIVADO';


--
-- Name: COLUMN radicado.radi_path; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_path IS 'RADI_PATH';


--
-- Name: COLUMN radicado.radi_usua_actu; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_usua_actu IS 'USUARIO ACTUAL';


--
-- Name: COLUMN radicado.radi_depe_actu; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_depe_actu IS 'DEPENDENCIA ACTUAL (USUARIO)';


--
-- Name: COLUMN radicado.radi_fech_asig; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_fech_asig IS 'FECHA DE ASIGNACION DEL USUARIO';


--
-- Name: COLUMN radicado.radi_arch1; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_arch1 IS 'CAMPO PARA ARCHIVO FISICO';


--
-- Name: COLUMN radicado.radi_arch2; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_arch2 IS 'CAMPO PARA ARCHIVO FISICO';


--
-- Name: COLUMN radicado.radi_arch3; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_arch3 IS 'CAMPO PARA ARCHIVO FISICO';


--
-- Name: COLUMN radicado.radi_arch4; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_arch4 IS 'CAMPO PARA ARCHIVO FISICO';


--
-- Name: COLUMN radicado.radicado_referencia_cliente; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radicado_referencia_cliente IS 'Este campo guarda la información del radicado de referencia del cliente externo a las comunicaciones que se reciben';


--
-- Name: COLUMN radicado.usua_doc_ante; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.usua_doc_ante IS 'Codigo TTR. transaccion.';


--
-- Name: COLUMN radicado.radi_fech_antetx; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_fech_antetx IS 'Documento del usuario que realizo la anterior tx';


--
-- Name: COLUMN radicado.sgd_trad_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.sgd_trad_codigo IS 'Fecha de la Ultima transaccion.';


--
-- Name: COLUMN radicado.numero_rm; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.numero_rm IS 'numero de registro';


--
-- Name: COLUMN radicado.numero_tran; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.numero_tran IS 'Numero de transaccion';


--
-- Name: COLUMN radicado.doc_transferido; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.doc_transferido IS '1 Gestión 2 Central 3 Hitorico';


--
-- Name: COLUMN radicado.radi_envio_correo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_envio_correo IS 'Guardar en la columna radi_envio_correo en false (no quiero notificación) y true (quiero que me notifique.) ';


--
-- Name: COLUMN radicado.radi_docu_publico; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_docu_publico IS 'Guarda la información correspondiente el documento puede ser visible o no en el landin page';


--
-- Name: COLUMN radicado.radi_eje_tematico; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_eje_tematico IS 'Guarda el identificador del eje tematico, esto es como para tenerlo presente';


--
-- Name: COLUMN radicado.radi_estado_pqrs; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_estado_pqrs IS 'Guarda el estado de una PQRs';


--
-- Name: COLUMN radicado.descripcion_asunto_pqrs; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.descripcion_asunto_pqrs IS 'guara la descripción del asunto de la pqrs';


--
-- Name: COLUMN radicado.grupo_interes; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.grupo_interes IS 'Guarda la información de los grupos de interes';


--
-- Name: COLUMN radicado.servicio_pqr; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.servicio_pqr IS 'Guarda el id del servicio correspondiente a la PQRS';


--
-- Name: COLUMN radicado.radi_depe_ante; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.radicado.radi_depe_ante IS 'codigo de la dependencia anterior';


--
-- Name: rango_edades_pqrs; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.rango_edades_pqrs (
    id_rango_edades_pqrs integer NOT NULL,
    nombre_rango_edades_pqrs character varying NOT NULL
);


ALTER TABLE public.rango_edades_pqrs OWNER TO orfeo62usr;

--
-- Name: TABLE rango_edades_pqrs; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.rango_edades_pqrs IS 'tabla que guarda la información respecto a las dedades.';


--
-- Name: COLUMN rango_edades_pqrs.id_rango_edades_pqrs; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.rango_edades_pqrs.id_rango_edades_pqrs IS 'Identificador de tabla';


--
-- Name: COLUMN rango_edades_pqrs.nombre_rango_edades_pqrs; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.rango_edades_pqrs.nombre_rango_edades_pqrs IS 'las opciones de edades';


--
-- Name: rol_tipos_doc; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.rol_tipos_doc (
    cod_rol_tipos integer NOT NULL,
    cod_rol numeric,
    cod_tp_tpdcumento numeric,
    estado numeric
);


ALTER TABLE public.rol_tipos_doc OWNER TO orfeo62usr;

--
-- Name: TABLE rol_tipos_doc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.rol_tipos_doc IS 'Se guarda el codigo del rol y los tipos documentales a los que tiene acceso un usuario';


--
-- Name: roles; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.roles (
    cod_rol integer NOT NULL,
    nomb_rol character varying(200),
    fecha date,
    estado numeric
);


ALTER TABLE public.roles OWNER TO orfeo62usr;

--
-- Name: TABLE roles; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.roles IS 'Almacena los roles de la herramienta, acorde a los perfiles';


--
-- Name: roles_cod_rol_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.roles_cod_rol_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_cod_rol_seq OWNER TO orfeo62usr;

--
-- Name: roles_cod_rol_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.roles_cod_rol_seq OWNED BY public.roles.cod_rol;


--
-- Name: sec_bodega_empresas; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sec_bodega_empresas
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 9999999999999999
    CACHE 1;


ALTER TABLE public.sec_bodega_empresas OWNER TO orfeo62usr;

--
-- Name: sec_central; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sec_central
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 9999999999999999
    CACHE 1;


ALTER TABLE public.sec_central OWNER TO orfeo62usr;

--
-- Name: sec_ciu_ciudadano; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sec_ciu_ciudadano
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 9999999999999999
    CACHE 1;


ALTER TABLE public.sec_ciu_ciudadano OWNER TO orfeo62usr;

--
-- Name: sec_def_contactos; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sec_def_contactos
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 9999999999999999
    CACHE 1;


ALTER TABLE public.sec_def_contactos OWNER TO orfeo62usr;

--
-- Name: sec_dir_direcciones; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sec_dir_direcciones
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 9999999999999999
    CACHE 1;


ALTER TABLE public.sec_dir_direcciones OWNER TO orfeo62usr;

--
-- Name: sec_edificio; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sec_edificio
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 9999999999999999
    CACHE 1;


ALTER TABLE public.sec_edificio OWNER TO orfeo62usr;

--
-- Name: sec_fondo; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sec_fondo
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 99999999
    CACHE 1;


ALTER TABLE public.sec_fondo OWNER TO orfeo62usr;

--
-- Name: sec_inv; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sec_inv
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sec_inv OWNER TO orfeo62usr;

--
-- Name: sec_oem_empresas; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sec_oem_empresas
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sec_oem_empresas OWNER TO orfeo62usr;

--
-- Name: sec_oem_oempresas; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sec_oem_oempresas
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 9999999999999999
    CACHE 1;


ALTER TABLE public.sec_oem_oempresas OWNER TO orfeo62usr;

--
-- Name: sec_planilla; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sec_planilla
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 9999999999999999
    CACHE 1;


ALTER TABLE public.sec_planilla OWNER TO orfeo62usr;

--
-- Name: sec_planilla_envio; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sec_planilla_envio
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 9999999999999999
    CACHE 1;


ALTER TABLE public.sec_planilla_envio OWNER TO orfeo62usr;

--
-- Name: sec_planilla_tx; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sec_planilla_tx
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 9999999999999999
    CACHE 1;


ALTER TABLE public.sec_planilla_tx OWNER TO orfeo62usr;

--
-- Name: sec_prestamo; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sec_prestamo
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 9999999999999999
    CACHE 1;


ALTER TABLE public.sec_prestamo OWNER TO orfeo62usr;

--
-- Name: sec_rol_tipos_doc; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sec_rol_tipos_doc
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 999999999999999
    CACHE 1;


ALTER TABLE public.sec_rol_tipos_doc OWNER TO orfeo62usr;

--
-- Name: sec_rol_tipos_doc; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.sec_rol_tipos_doc OWNED BY public.rol_tipos_doc.cod_rol_tipos;


--
-- Name: sec_sgd_hfld_histflujodoc; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sec_sgd_hfld_histflujodoc
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 9999999999999999
    CACHE 1;


ALTER TABLE public.sec_sgd_hfld_histflujodoc OWNER TO orfeo62usr;

--
-- Name: secr_subseries_id_tabla; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.secr_subseries_id_tabla
    START WITH 279
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 999999999
    CACHE 1;


ALTER TABLE public.secr_subseries_id_tabla OWNER TO orfeo62usr;

--
-- Name: secr_tp1_; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.secr_tp1_
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.secr_tp1_ OWNER TO orfeo62usr;

--
-- Name: secr_tp1_998; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.secr_tp1_998
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 999999
    CACHE 1;


ALTER TABLE public.secr_tp1_998 OWNER TO orfeo62usr;

--
-- Name: secr_tp1_999; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.secr_tp1_999
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 999999
    CACHE 1;


ALTER TABLE public.secr_tp1_999 OWNER TO orfeo62usr;

--
-- Name: secr_tp2_; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.secr_tp2_
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.secr_tp2_ OWNER TO orfeo62usr;

--
-- Name: secr_tp2_998; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.secr_tp2_998
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 999999
    CACHE 1;


ALTER TABLE public.secr_tp2_998 OWNER TO orfeo62usr;

--
-- Name: secr_tp2_999; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.secr_tp2_999
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 999999
    CACHE 1;


ALTER TABLE public.secr_tp2_999 OWNER TO orfeo62usr;

--
-- Name: secr_tp3_; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.secr_tp3_
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 999999999
    CACHE 1;


ALTER TABLE public.secr_tp3_ OWNER TO orfeo62usr;

--
-- Name: secr_tp3_998; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.secr_tp3_998
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 999999999
    CACHE 1;


ALTER TABLE public.secr_tp3_998 OWNER TO orfeo62usr;

--
-- Name: secr_tp4_; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.secr_tp4_
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.secr_tp4_ OWNER TO orfeo62usr;

--
-- Name: secr_tp4_998; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.secr_tp4_998
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 999999
    CACHE 1;


ALTER TABLE public.secr_tp4_998 OWNER TO orfeo62usr;

--
-- Name: secr_tp4_999; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.secr_tp4_999
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 999999
    CACHE 1;


ALTER TABLE public.secr_tp4_999 OWNER TO orfeo62usr;

--
-- Name: seq_parexp_paramexpediente; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.seq_parexp_paramexpediente
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 999999999
    CACHE 1;


ALTER TABLE public.seq_parexp_paramexpediente OWNER TO orfeo62usr;

--
-- Name: seq_sgd_mrd_codigo; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.seq_sgd_mrd_codigo
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 999999999
    CACHE 1;


ALTER TABLE public.seq_sgd_mrd_codigo OWNER TO orfeo62usr;

--
-- Name: servicios_pqrs; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.servicios_pqrs (
    id_servicio_pqrs integer NOT NULL,
    nombre_servicio_pqrs character varying(50)
);


ALTER TABLE public.servicios_pqrs OWNER TO orfeo62usr;

--
-- Name: TABLE servicios_pqrs; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.servicios_pqrs IS 'Indica los servicios que se prestan en la entidad';


--
-- Name: COLUMN servicios_pqrs.id_servicio_pqrs; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.servicios_pqrs.id_servicio_pqrs IS 'Identificador de tabla';


--
-- Name: COLUMN servicios_pqrs.nombre_servicio_pqrs; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.servicios_pqrs.nombre_servicio_pqrs IS 'Guarda el nombre del servicio';


--
-- Name: sgd_agen_agendados; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_agen_agendados (
    sgd_agen_fech date,
    sgd_agen_observacion character varying(4000),
    radi_nume_radi character varying(30) NOT NULL,
    usua_doc character varying(18) NOT NULL,
    depe_codi character varying(5),
    sgd_agen_codigo numeric,
    sgd_agen_fechplazo date,
    sgd_agen_activo numeric
);


ALTER TABLE public.sgd_agen_agendados OWNER TO orfeo62usr;

--
-- Name: sgd_anar_anexarg; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_anar_anexarg (
    sgd_anar_codi numeric(4,0) NOT NULL,
    anex_codigo character varying(20),
    sgd_argd_codi numeric(4,0),
    sgd_anar_argcod numeric(4,0)
);


ALTER TABLE public.sgd_anar_anexarg OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_anar_anexarg; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_anar_anexarg IS 'Indica los argumentos o criterios a incluir dentro de un tipo de documento generado';


--
-- Name: COLUMN sgd_anar_anexarg.sgd_anar_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_anar_anexarg.sgd_anar_codi IS 'id del registro';


--
-- Name: COLUMN sgd_anar_anexarg.anex_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_anar_anexarg.anex_codigo IS 'codigo del anexo';


--
-- Name: COLUMN sgd_anar_anexarg.sgd_argd_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_anar_anexarg.sgd_argd_codi IS 'codigo del argumento empleado';


--
-- Name: COLUMN sgd_anar_anexarg.sgd_anar_argcod; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_anar_anexarg.sgd_anar_argcod IS 'valor del campo llave, de tabla que contiene el argumento referenciado';


--
-- Name: sgd_anar_secue; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sgd_anar_secue
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 99999999999999999
    CACHE 1;


ALTER TABLE public.sgd_anar_secue OWNER TO orfeo62usr;

--
-- Name: sgd_anu_anulados; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_anu_anulados (
    sgd_anu_id numeric(4,0),
    sgd_anu_desc character varying(250),
    radi_nume_radi character varying(30),
    sgd_eanu_codi numeric(4,0),
    sgd_anu_sol_fech date,
    sgd_anu_fech date,
    depe_codi character varying(5),
    usua_doc character varying(14),
    usua_codi numeric(4,0),
    depe_codi_anu character varying(5),
    usua_doc_anu character varying(14),
    usua_codi_anu numeric(4,0),
    usua_anu_acta numeric(8,0),
    sgd_anu_path_acta character varying(200),
    sgd_trad_codigo numeric(2,0)
);


ALTER TABLE public.sgd_anu_anulados OWNER TO orfeo62usr;

--
-- Name: sgd_aper_adminperfiles; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_aper_adminperfiles (
    sgd_aper_codigo numeric(2,0),
    sgd_aper_descripcion character varying(20)
);


ALTER TABLE public.sgd_aper_adminperfiles OWNER TO orfeo62usr;

--
-- Name: sgd_apli_aplintegra; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_apli_aplintegra (
    sgd_apli_codi numeric(4,0),
    sgd_apli_descrip character varying(150),
    sgd_apli_lk1desc character varying(150),
    sgd_apli_lk1 character varying(150),
    sgd_apli_lk2desc character varying(150),
    sgd_apli_lk2 character varying(150),
    sgd_apli_lk3desc character varying(150),
    sgd_apli_lk3 character varying(150),
    sgd_apli_lk4desc character varying(150),
    sgd_apli_lk4 character varying(150)
);


ALTER TABLE public.sgd_apli_aplintegra OWNER TO orfeo62usr;

--
-- Name: sgd_aplmen_aplimens; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_aplmen_aplimens (
    sgd_aplmen_codi numeric(4,0),
    sgd_apli_codi numeric(4,0),
    sgd_aplmen_ref character varying(20),
    sgd_aplmen_haciaorfeo numeric(4,0),
    sgd_aplmen_desdeorfeo numeric(4,0)
);


ALTER TABLE public.sgd_aplmen_aplimens OWNER TO orfeo62usr;

--
-- Name: sgd_aplus_plicusua; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_aplus_plicusua (
    sgd_aplus_codi numeric(4,0),
    sgd_apli_codi numeric(4,0),
    usua_doc character varying(14),
    sgd_trad_codigo numeric(2,0),
    sgd_aplus_prioridad numeric(1,0)
);


ALTER TABLE public.sgd_aplus_plicusua OWNER TO orfeo62usr;

--
-- Name: sgd_arch_depe; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_arch_depe (
    sgd_arch_depe character varying(5),
    sgd_arch_edificio numeric(6,0),
    sgd_arch_item numeric(6,0),
    sgd_arch_id numeric NOT NULL
);


ALTER TABLE public.sgd_arch_depe OWNER TO orfeo62usr;

--
-- Name: sgd_archivo_central; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_archivo_central (
    sgd_archivo_id numeric NOT NULL,
    sgd_archivo_tipo numeric,
    sgd_archivo_orden character varying(15),
    sgd_archivo_fechai timestamp with time zone,
    sgd_archivo_demandado character varying(1500),
    sgd_archivo_demandante character varying(200),
    sgd_archivo_cc_demandante numeric,
    sgd_archivo_depe character varying(5),
    sgd_archivo_zona character varying(4),
    sgd_archivo_carro numeric,
    sgd_archivo_cara character varying(4),
    sgd_archivo_estante numeric,
    sgd_archivo_entrepano numeric,
    sgd_archivo_caja numeric,
    sgd_archivo_unidocu character varying(40),
    sgd_archivo_anexo character varying(4000),
    sgd_archivo_inder numeric DEFAULT 0,
    sgd_archivo_path character varying(4000),
    sgd_archivo_year numeric(4,0),
    sgd_archivo_rad character varying(15) NOT NULL,
    sgd_archivo_srd numeric,
    sgd_archivo_sbrd numeric,
    sgd_archivo_folios numeric,
    sgd_archivo_mata numeric DEFAULT 0,
    sgd_archivo_fechaf timestamp with time zone,
    sgd_archivo_prestamo numeric(1,0),
    sgd_archivo_funprest character(100),
    sgd_archivo_fechprest timestamp with time zone,
    sgd_archivo_fechprestf timestamp with time zone,
    depe_codi character varying(5),
    sgd_archivo_usua character varying(15),
    sgd_archivo_fech timestamp with time zone
);


ALTER TABLE public.sgd_archivo_central OWNER TO orfeo62usr;

--
-- Name: sgd_archivo_fondo; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_archivo_fondo (
    sgd_archivo_id numeric NOT NULL,
    sgd_archivo_tipo numeric,
    sgd_archivo_orden character varying(15),
    sgd_archivo_fechai timestamp with time zone,
    sgd_archivo_demandado character varying(1500),
    sgd_archivo_demandante character varying(200),
    sgd_archivo_cc_demandante numeric,
    sgd_archivo_depe character varying(5),
    sgd_archivo_zona character varying(4),
    sgd_archivo_carro numeric,
    sgd_archivo_cara character varying(4),
    sgd_archivo_estante numeric,
    sgd_archivo_entrepano numeric,
    sgd_archivo_caja numeric,
    sgd_archivo_unidocu character varying(40),
    sgd_archivo_anexo character varying(4000),
    sgd_archivo_inder numeric DEFAULT 0,
    sgd_archivo_path character varying(4000),
    sgd_archivo_year numeric(4,0),
    sgd_archivo_rad character varying(15) NOT NULL,
    sgd_archivo_srd numeric,
    sgd_archivo_folios numeric,
    sgd_archivo_mata numeric DEFAULT 0,
    sgd_archivo_fechaf timestamp with time zone,
    sgd_archivo_prestamo numeric(1,0),
    sgd_archivo_funprest character(100),
    sgd_archivo_fechprest timestamp with time zone,
    sgd_archivo_fechprestf timestamp with time zone,
    depe_codi character varying(5),
    sgd_archivo_usua character varying(15),
    sgd_archivo_fech timestamp with time zone
);


ALTER TABLE public.sgd_archivo_fondo OWNER TO orfeo62usr;

--
-- Name: sgd_archivo_hist; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_archivo_hist (
    depe_codi character varying(5) NOT NULL,
    hist_fech timestamp with time zone NOT NULL,
    usua_codi numeric(10,0) NOT NULL,
    sgd_archivo_rad character varying(14),
    hist_obse character varying(600) NOT NULL,
    usua_doc character varying(14),
    sgd_ttr_codigo numeric(3,0),
    hist_id numeric
);


ALTER TABLE public.sgd_archivo_hist OWNER TO orfeo62usr;

--
-- Name: sgd_argd_argdoc; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_argd_argdoc (
    sgd_argd_codi numeric(4,0) NOT NULL,
    sgd_pnufe_codi numeric(4,0),
    sgd_argd_tabla character varying(100),
    sgd_argd_tcodi character varying(100),
    sgd_argd_tdes character varying(100),
    sgd_argd_llist character varying(150),
    sgd_argd_campo character varying(100)
);


ALTER TABLE public.sgd_argd_argdoc OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_argd_argdoc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_argd_argdoc IS 'Define los argumentos que ha de incluir un tipo de documento';


--
-- Name: COLUMN sgd_argd_argdoc.sgd_argd_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_argd_argdoc.sgd_argd_codi IS 'Id del registro';


--
-- Name: COLUMN sgd_argd_argdoc.sgd_pnufe_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_argd_argdoc.sgd_pnufe_codi IS 'Codigo del proceso';


--
-- Name: COLUMN sgd_argd_argdoc.sgd_argd_tabla; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_argd_argdoc.sgd_argd_tabla IS 'Nombre de la tabla tabla a la que hace refencia el argumento';


--
-- Name: COLUMN sgd_argd_argdoc.sgd_argd_tcodi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_argd_argdoc.sgd_argd_tcodi IS 'Nombre del campo llave de la tabla referenciada';


--
-- Name: COLUMN sgd_argd_argdoc.sgd_argd_tdes; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_argd_argdoc.sgd_argd_tdes IS 'Nombre del campo descripcion de la tabla referenciada';


--
-- Name: COLUMN sgd_argd_argdoc.sgd_argd_llist; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_argd_argdoc.sgd_argd_llist IS 'Texto del label descriptor  que ha  de aparecen de forma dinamica en la pagina web';


--
-- Name: COLUMN sgd_argd_argdoc.sgd_argd_campo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_argd_argdoc.sgd_argd_campo IS 'Etiqueta que ha de incluirse en el documento para referenciar este campo';


--
-- Name: sgd_argup_argudoctop; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_argup_argudoctop (
    sgd_argup_codi numeric(4,0) NOT NULL,
    sgd_argup_desc character varying(50),
    sgd_tpr_codigo numeric(4,0)
);


ALTER TABLE public.sgd_argup_argudoctop OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_argup_argudoctop; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_argup_argudoctop IS 'Almacena los argumentos para contestar pliegos de cargos';


--
-- Name: COLUMN sgd_argup_argudoctop.sgd_argup_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_argup_argudoctop.sgd_argup_codi IS 'Id del registro';


--
-- Name: COLUMN sgd_argup_argudoctop.sgd_argup_desc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_argup_argudoctop.sgd_argup_desc IS 'Descripcion';


--
-- Name: sgd_auditoria; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_auditoria (
    usua_doc character varying(12),
    ip character varying(15),
    tipo character varying(5),
    tabla character varying(50),
    isql character(5000),
    fecha timestamp with time zone DEFAULT now()
);


ALTER TABLE public.sgd_auditoria OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_auditoria; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_auditoria IS 'Tabla para radicacion via web';


--
-- Name: sgd_camexp_campoexpediente; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_camexp_campoexpediente (
    sgd_camexp_codigo numeric(4,0) NOT NULL,
    sgd_camexp_campo character varying(30) NOT NULL,
    sgd_parexp_codigo numeric(4,0) NOT NULL,
    sgd_camexp_fk numeric DEFAULT 0,
    sgd_camexp_tablafk character varying(30),
    sgd_camexp_campofk character varying(30),
    sgd_camexp_campovalor character varying(30),
    sgd_camexp_orden numeric(1,0)
);


ALTER TABLE public.sgd_camexp_campoexpediente OWNER TO orfeo62usr;

--
-- Name: sgd_carp_descripcion; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_carp_descripcion (
    sgd_carp_depecodi character varying(5) NOT NULL,
    sgd_carp_tiporad numeric(2,0) NOT NULL,
    sgd_carp_descr character varying(40)
);


ALTER TABLE public.sgd_carp_descripcion OWNER TO orfeo62usr;

--
-- Name: sgd_cau_causal; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_cau_causal (
    sgd_cau_codigo numeric(4,0) NOT NULL,
    sgd_cau_descrip character varying(150)
);


ALTER TABLE public.sgd_cau_causal OWNER TO orfeo62usr;

--
-- Name: sgd_caux_causales; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_caux_causales (
    sgd_caux_codigo numeric(10,0) NOT NULL,
    radi_nume_radi character varying(15),
    sgd_dcau_codigo numeric(4,0),
    sgd_ddca_codigo numeric(4,0),
    sgd_caux_fecha date,
    usua_doc character varying(14)
);


ALTER TABLE public.sgd_caux_causales OWNER TO orfeo62usr;

--
-- Name: sgd_ciu_ciudadano; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_ciu_ciudadano (
    tdid_codi numeric(2,0),
    sgd_ciu_codigo numeric(8,0) DEFAULT nextval('public.sec_ciu_ciudadano'::regclass) NOT NULL,
    sgd_ciu_nombre character varying(150),
    sgd_ciu_direccion character varying(150),
    sgd_ciu_apell1 character varying(50),
    sgd_ciu_apell2 character varying(50),
    sgd_ciu_telefono character varying(50),
    sgd_ciu_email character varying(50),
    muni_codi numeric(4,0),
    dpto_codi numeric(2,0),
    sgd_ciu_cedula character varying(13),
    id_cont numeric(2,0) DEFAULT 1,
    id_pais numeric(4,0) DEFAULT 170,
    id_estado_civil_pqrs integer NOT NULL,
    genero_pqrs_id integer NOT NULL,
    id_users_pqrs integer NOT NULL,
    barrio character varying(150),
    sgd_ciu_edad integer,
    sgd_ciu_ubicacion numeric(1,0),
    trte_codi integer DEFAULT 2 NOT NULL,
    tipo_poblacion integer,
    telefono_fijo character varying(20),
    fecha_nacimiento date
);


ALTER TABLE public.sgd_ciu_ciudadano OWNER TO orfeo62usr;

--
-- Name: COLUMN sgd_ciu_ciudadano.sgd_ciu_edad; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_ciu_ciudadano.sgd_ciu_edad IS 'Guarda la edad de la persona en relación a la opción de la tabla rango_edades';


--
-- Name: COLUMN sgd_ciu_ciudadano.sgd_ciu_ubicacion; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_ciu_ciudadano.sgd_ciu_ubicacion IS 'Guarda la inormación correspondiente a Urbana =1 o Rural =0';


--
-- Name: COLUMN sgd_ciu_ciudadano.trte_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_ciu_ciudadano.trte_codi IS 'Tipo de remitente';


--
-- Name: COLUMN sgd_ciu_ciudadano.tipo_poblacion; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_ciu_ciudadano.tipo_poblacion IS 'Indica el tipo de población a la que pertenece el que interpone la PQRS';


--
-- Name: COLUMN sgd_ciu_ciudadano.telefono_fijo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_ciu_ciudadano.telefono_fijo IS 'Numero de telefono opcional fijo';


--
-- Name: COLUMN sgd_ciu_ciudadano.fecha_nacimiento; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_ciu_ciudadano.fecha_nacimiento IS 'Guarda la decha de nacimiento del ciudadano';


--
-- Name: sgd_ciu_secue; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sgd_ciu_secue
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 99999999
    CACHE 1;


ALTER TABLE public.sgd_ciu_secue OWNER TO orfeo62usr;

--
-- Name: sgd_clta_clstarif; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_clta_clstarif (
    sgd_fenv_codigo numeric(5,0),
    sgd_clta_codser numeric(5,0),
    sgd_tar_codigo numeric(5,0),
    sgd_clta_descrip character varying(100),
    sgd_clta_pesdes numeric(15,0),
    sgd_clta_peshast numeric(15,0)
);


ALTER TABLE public.sgd_clta_clstarif OWNER TO orfeo62usr;

--
-- Name: sgd_cob_campobliga; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_cob_campobliga (
    sgd_cob_codi numeric(4,0) NOT NULL,
    sgd_cob_desc character varying(150),
    sgd_cob_label character varying(50),
    sgd_tidm_codi numeric(4,0)
);


ALTER TABLE public.sgd_cob_campobliga OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_cob_campobliga; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_cob_campobliga IS 'Indica los campos obligatorios que hacen parte de un tipo de documento de correspondencia masiva';


--
-- Name: COLUMN sgd_cob_campobliga.sgd_cob_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_cob_campobliga.sgd_cob_codi IS 'ID del registro';


--
-- Name: COLUMN sgd_cob_campobliga.sgd_cob_desc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_cob_campobliga.sgd_cob_desc IS 'Descripcion';


--
-- Name: COLUMN sgd_cob_campobliga.sgd_cob_label; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_cob_campobliga.sgd_cob_label IS 'Rotulo del campo a incluir dentro del documento';


--
-- Name: COLUMN sgd_cob_campobliga.sgd_tidm_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_cob_campobliga.sgd_tidm_codi IS 'Codigo del documento';


--
-- Name: sgd_dcau_causal; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_dcau_causal (
    sgd_dcau_codigo numeric(4,0) NOT NULL,
    sgd_cau_codigo numeric(4,0),
    sgd_dcau_descrip character varying(150)
);


ALTER TABLE public.sgd_dcau_causal OWNER TO orfeo62usr;

--
-- Name: sgd_ddca_ddsgrgdo; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_ddca_ddsgrgdo (
    sgd_ddca_codigo numeric(4,0) NOT NULL,
    sgd_dcau_codigo numeric(4,0),
    par_serv_secue numeric(8,0),
    sgd_ddca_descrip character varying(150)
);


ALTER TABLE public.sgd_ddca_ddsgrgdo OWNER TO orfeo62usr;

--
-- Name: sgd_def_contactos; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_def_contactos (
    ctt_id numeric(15,0) NOT NULL,
    ctt_nombre character varying(60) NOT NULL,
    ctt_cargo character varying(60) NOT NULL,
    ctt_telefono character varying(25),
    ctt_id_tipo numeric(4,0) NOT NULL,
    ctt_id_empresa numeric(15,0) NOT NULL
);


ALTER TABLE public.sgd_def_contactos OWNER TO orfeo62usr;

--
-- Name: sgd_def_continentes; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_def_continentes (
    id_cont numeric(2,0),
    nombre_cont character varying(20) NOT NULL
);


ALTER TABLE public.sgd_def_continentes OWNER TO orfeo62usr;

--
-- Name: sgd_def_paises; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_def_paises (
    id_pais numeric(4,0) NOT NULL,
    id_cont numeric(2,0) DEFAULT 1 NOT NULL,
    nombre_pais character varying(30) NOT NULL
);


ALTER TABLE public.sgd_def_paises OWNER TO orfeo62usr;

--
-- Name: sgd_deve_dev_envio; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_deve_dev_envio (
    sgd_deve_codigo numeric(2,0) NOT NULL,
    sgd_deve_desc character varying(150) NOT NULL
);


ALTER TABLE public.sgd_deve_dev_envio OWNER TO orfeo62usr;

--
-- Name: sgd_dir_drecciones; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_dir_drecciones (
    sgd_dir_codigo numeric(10,0) NOT NULL,
    sgd_dir_tipo numeric(4,0) NOT NULL,
    sgd_oem_codigo numeric(8,0),
    sgd_ciu_codigo numeric(8,0),
    radi_nume_radi character varying(30),
    sgd_esp_codi numeric(5,0),
    muni_codi numeric(4,0),
    dpto_codi numeric(3,0),
    sgd_dir_direccion character varying(150),
    sgd_dir_telefono character varying(50),
    sgd_dir_mail character varying(50),
    sgd_sec_codigo numeric(13,0),
    sgd_temporal_nombre character varying(150),
    anex_codigo numeric(20,0),
    sgd_anex_codigo character varying(20),
    sgd_dir_nombre character varying(150),
    sgd_doc_fun character varying(14),
    sgd_dir_nomremdes character varying(1000),
    sgd_trd_codigo numeric(1,0),
    sgd_dir_tdoc numeric(1,0),
    sgd_dir_doc character varying(14),
    id_pais numeric(4,0) DEFAULT 170,
    id_cont numeric(2,0) DEFAULT 1
);


ALTER TABLE public.sgd_dir_drecciones OWNER TO orfeo62usr;

--
-- Name: COLUMN sgd_dir_drecciones.sgd_dir_nomremdes; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_dir_drecciones.sgd_dir_nomremdes IS 'NOMBRE DE REMITENTE O DESTINATARIO';


--
-- Name: COLUMN sgd_dir_drecciones.sgd_trd_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_dir_drecciones.sgd_trd_codigo IS 'TIPO DE REMITENTE/DESTINATARIO (1 Ciudadanao, 2 OtrasEmpresas, 3 Esp, 4 Funcionario)';


--
-- Name: COLUMN sgd_dir_drecciones.sgd_dir_tdoc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_dir_drecciones.sgd_dir_tdoc IS 'NUMERO DE DOCUMENTO';


--
-- Name: sgd_dir_secue; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sgd_dir_secue
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 99999999
    CACHE 1;


ALTER TABLE public.sgd_dir_secue OWNER TO orfeo62usr;

--
-- Name: sgd_dnufe_docnufe; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_dnufe_docnufe (
    sgd_dnufe_codi numeric(4,0) NOT NULL,
    sgd_pnufe_codi numeric(4,0),
    sgd_tpr_codigo numeric(4,0),
    sgd_dnufe_label character varying(150),
    trte_codi numeric(2,0),
    sgd_dnufe_main character varying(1),
    sgd_dnufe_path character varying(150),
    sgd_dnufe_gerarq character varying(10),
    anex_tipo_codi numeric(4,0)
);


ALTER TABLE public.sgd_dnufe_docnufe OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_dnufe_docnufe; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_dnufe_docnufe IS 'Indica los documentos que componen un proceso de numeracion y fechado';


--
-- Name: COLUMN sgd_dnufe_docnufe.sgd_dnufe_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_dnufe_docnufe.sgd_dnufe_codi IS 'Id del registro';


--
-- Name: COLUMN sgd_dnufe_docnufe.sgd_pnufe_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_dnufe_docnufe.sgd_pnufe_codi IS 'codigo del proceso';


--
-- Name: COLUMN sgd_dnufe_docnufe.sgd_tpr_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_dnufe_docnufe.sgd_tpr_codigo IS 'codigo del documento que hace parte de un proceso de numeracion y fechado';


--
-- Name: COLUMN sgd_dnufe_docnufe.sgd_dnufe_label; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_dnufe_docnufe.sgd_dnufe_label IS 'label del documento que ha de usarse en la interfaz de gestion de procesos de numeracion y fechado';


--
-- Name: COLUMN sgd_dnufe_docnufe.trte_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_dnufe_docnufe.trte_codi IS 'indica el tipo de remitente para quien va dirigida la comunicacion';


--
-- Name: COLUMN sgd_dnufe_docnufe.sgd_dnufe_main; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_dnufe_docnufe.sgd_dnufe_main IS 'Indica si el registro es el documento principal del paquete';


--
-- Name: sgd_dt_radicado; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_dt_radicado (
    radi_nume_radi character varying(30) NOT NULL,
    dias_termino numeric(2,0) NOT NULL
);


ALTER TABLE public.sgd_dt_radicado OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_dt_radicado; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_dt_radicado IS 'Dias de termino por radicado';


--
-- Name: COLUMN sgd_dt_radicado.radi_nume_radi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_dt_radicado.radi_nume_radi IS 'Numero de radicado';


--
-- Name: COLUMN sgd_dt_radicado.dias_termino; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_dt_radicado.dias_termino IS 'dias de termino';


--
-- Name: sgd_eanu_estanulacion; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_eanu_estanulacion (
    sgd_eanu_desc character varying(150),
    sgd_eanu_codi numeric
);


ALTER TABLE public.sgd_eanu_estanulacion OWNER TO orfeo62usr;

--
-- Name: sgd_einv_inventario; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_einv_inventario (
    sgd_einv_codigo numeric NOT NULL,
    sgd_depe_nomb character varying(400),
    sgd_depe_codi character varying(5),
    sgd_einv_expnum character varying(18),
    sgd_einv_titulo character varying(400),
    sgd_einv_unidad numeric,
    sgd_einv_fech date,
    sgd_einv_fechfin date,
    sgd_einv_radicados character varying(40),
    sgd_einv_folios numeric,
    sgd_einv_nundocu numeric,
    sgd_einv_nundocubodega numeric,
    sgd_einv_caja numeric,
    sgd_einv_cajabodega numeric,
    sgd_einv_srd numeric,
    sgd_einv_nomsrd character varying(400),
    sgd_einv_sbrd numeric,
    sgd_einv_nomsbrd character varying(400),
    sgd_einv_retencion character varying(400),
    sgd_einv_disfinal character varying(400),
    sgd_einv_ubicacion character varying(400),
    sgd_einv_observacion character varying(400)
);


ALTER TABLE public.sgd_einv_inventario OWNER TO orfeo62usr;

--
-- Name: sgd_eit_items; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_eit_items (
    sgd_eit_codigo numeric NOT NULL,
    sgd_eit_cod_padre numeric DEFAULT 0,
    sgd_eit_nombre character varying(40),
    sgd_eit_sigla character varying(6),
    codi_dpto numeric(4,0),
    codi_muni numeric(5,0)
);


ALTER TABLE public.sgd_eit_items OWNER TO orfeo62usr;

--
-- Name: sgd_ejes_tematicos; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_ejes_tematicos (
    id_sgd_eje_tematico integer NOT NULL,
    nombre_eje_tematico character varying(1000),
    descripcion_eje_tematico character varying(1000),
    plazo_eje_tematico numeric(3,0),
    tipo_plazo_eje_tematico character varying(10),
    activo_eje_tematico boolean
);


ALTER TABLE public.sgd_ejes_tematicos OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_ejes_tematicos; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_ejes_tematicos IS 'Guarda la información de los ejes tematicos los cuales se utilizan para clasificar el documento que se esta solicitando';


--
-- Name: COLUMN sgd_ejes_tematicos.id_sgd_eje_tematico; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_ejes_tematicos.id_sgd_eje_tematico IS 'Codigo del eje tematico';


--
-- Name: COLUMN sgd_ejes_tematicos.nombre_eje_tematico; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_ejes_tematicos.nombre_eje_tematico IS 'Nombre del eje tematico';


--
-- Name: COLUMN sgd_ejes_tematicos.descripcion_eje_tematico; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_ejes_tematicos.descripcion_eje_tematico IS 'Descripcion del eje tematico';


--
-- Name: COLUMN sgd_ejes_tematicos.plazo_eje_tematico; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_ejes_tematicos.plazo_eje_tematico IS 'Dias de plazo';


--
-- Name: COLUMN sgd_ejes_tematicos.tipo_plazo_eje_tematico; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_ejes_tematicos.tipo_plazo_eje_tematico IS 'Tipo de plazo';


--
-- Name: sgd_ejes_tematicos_dependencia; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_ejes_tematicos_dependencia (
    id_sgd_eje_tematico_dependencia integer NOT NULL,
    id_sgd_eje_tematico numeric,
    depe_codi character varying(5),
    estado_eje_tematico boolean
);


ALTER TABLE public.sgd_ejes_tematicos_dependencia OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_ejes_tematicos_dependencia; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_ejes_tematicos_dependencia IS 'Guarda la relación de los ejes tematicos a sociados a una dependencia';


--
-- Name: COLUMN sgd_ejes_tematicos_dependencia.id_sgd_eje_tematico; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_ejes_tematicos_dependencia.id_sgd_eje_tematico IS 'Guarda el id del ejetematica para la dependencia';


--
-- Name: COLUMN sgd_ejes_tematicos_dependencia.depe_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_ejes_tematicos_dependencia.depe_codi IS 'Guarda el código de la dependencia';


--
-- Name: sgd_ejes_tematicos_dependenci_id_sgd_eje_tematico_dependenc_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sgd_ejes_tematicos_dependenci_id_sgd_eje_tematico_dependenc_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sgd_ejes_tematicos_dependenci_id_sgd_eje_tematico_dependenc_seq OWNER TO orfeo62usr;

--
-- Name: sgd_ejes_tematicos_dependenci_id_sgd_eje_tematico_dependenc_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.sgd_ejes_tematicos_dependenci_id_sgd_eje_tematico_dependenc_seq OWNED BY public.sgd_ejes_tematicos_dependencia.id_sgd_eje_tematico_dependencia;


--
-- Name: sgd_ejes_tematicos_id_sgd_eje_tematico_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sgd_ejes_tematicos_id_sgd_eje_tematico_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sgd_ejes_tematicos_id_sgd_eje_tematico_seq OWNER TO orfeo62usr;

--
-- Name: sgd_ejes_tematicos_id_sgd_eje_tematico_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.sgd_ejes_tematicos_id_sgd_eje_tematico_seq OWNED BY public.sgd_ejes_tematicos.id_sgd_eje_tematico;


--
-- Name: sgd_empus_empusuario; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_empus_empusuario (
    usua_login character varying(10),
    identificador_empresa numeric(10,0)
);


ALTER TABLE public.sgd_empus_empusuario OWNER TO orfeo62usr;

--
-- Name: COLUMN sgd_empus_empusuario.identificador_empresa; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_empus_empusuario.identificador_empresa IS 'Corresponde al identificador de la tabla bodega_empresas';


--
-- Name: sgd_ent_entidades; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_ent_entidades (
    sgd_ent_nit character varying(13) NOT NULL,
    sgd_ent_codsuc character varying(4) NOT NULL,
    sgd_ent_pias numeric(5,0),
    dpto_codi numeric(2,0),
    muni_codi numeric(4,0),
    sgd_ent_descrip character varying(80),
    sgd_ent_direccion character varying(50),
    sgd_ent_telefono character varying(50)
);


ALTER TABLE public.sgd_ent_entidades OWNER TO orfeo62usr;

--
-- Name: sgd_enve_envioespecial; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_enve_envioespecial (
    sgd_fenv_codigo numeric(4,0),
    sgd_enve_valorl character varying(30),
    sgd_enve_valorn character varying(30),
    sgd_enve_desc character varying(30)
);


ALTER TABLE public.sgd_enve_envioespecial OWNER TO orfeo62usr;

--
-- Name: COLUMN sgd_enve_envioespecial.sgd_fenv_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_enve_envioespecial.sgd_fenv_codigo IS 'Codigo Empresa de envio';


--
-- Name: COLUMN sgd_enve_envioespecial.sgd_enve_valorl; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_enve_envioespecial.sgd_enve_valorl IS 'Valor Campo Local';


--
-- Name: COLUMN sgd_enve_envioespecial.sgd_enve_valorn; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_enve_envioespecial.sgd_enve_valorn IS 'Valor Campo Nacional';


--
-- Name: COLUMN sgd_enve_envioespecial.sgd_enve_desc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_enve_envioespecial.sgd_enve_desc IS 'Descripcion Valor';


--
-- Name: sgd_estc_estconsolid; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_estc_estconsolid (
    sgd_estc_codigo numeric,
    sgd_tpr_codigo numeric,
    dep_nombre character varying(30),
    depe_codi character varying(5),
    sgd_estc_ctotal numeric,
    sgd_estc_centramite numeric,
    sgd_estc_csinriesgo numeric,
    sgd_estc_criesgomedio numeric,
    sgd_estc_criesgoalto numeric,
    sgd_estc_ctramitados numeric,
    sgd_estc_centermino numeric,
    sgd_estc_cfueratermino numeric,
    sgd_estc_fechgen date,
    sgd_estc_fechini date,
    sgd_estc_fechfin date,
    sgd_estc_fechiniresp date,
    sgd_estc_fechfinresp date,
    sgd_estc_dsinriesgo numeric,
    sgd_estc_driesgomegio numeric,
    sgd_estc_driesgoalto numeric,
    sgd_estc_dtermino numeric,
    sgd_estc_grupgenerado numeric
);


ALTER TABLE public.sgd_estc_estconsolid OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_estc_estconsolid; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_estc_estconsolid IS 'Tabla en la cual se almacenan consolidados de las territoriales.';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_codigo IS 'Codigo Registro Unico';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_tpr_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_tpr_codigo IS 'Tipo de Documento';


--
-- Name: COLUMN sgd_estc_estconsolid.dep_nombre; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.dep_nombre IS 'Nombre Grupo Dependenciad de cada Territorial';


--
-- Name: COLUMN sgd_estc_estconsolid.depe_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.depe_codi IS 'Codigo dependencia';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_ctotal; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_ctotal IS 'Cantidad Documentos';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_centramite; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_centramite IS 'Cantidad Documentos En tramite';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_csinriesgo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_csinriesgo IS 'Cantidad Documentos Sin riesgo';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_criesgomedio; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_criesgomedio IS 'Cantidad de Documentos en Riesgo Medio';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_criesgoalto; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_criesgoalto IS 'Cantidad de Documentos en Riesgo Alto';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_ctramitados; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_ctramitados IS 'Cantidad de Documentos Tramitados';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_centermino; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_centermino IS 'Cantidad Documentos Tramitados en Termino';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_cfueratermino; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_cfueratermino IS 'Cantidad Documentos Tramitados Fuera de Termino';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_fechgen; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_fechgen IS 'Fecha Generados';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_fechini; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_fechini IS 'Fecha Inicio de Reporde de Radicados';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_fechfin; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_fechfin IS 'Fecha Fin de Reporte de Radicados';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_fechiniresp; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_fechiniresp IS 'Fecha inicio de Documentos respuesta';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_fechfinresp; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_fechfinresp IS 'Fecha Fin de Documentos Respuesta';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_dsinriesgo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_dsinriesgo IS 'Dias definidos para Riesgo Bajo';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_driesgomegio; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_driesgomegio IS 'Dias Para Riesgo Medio';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_driesgoalto; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_driesgoalto IS 'Dias Para Riesgo Alto';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_dtermino; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_dtermino IS 'Dias Reales de Termino de los Documentos.';


--
-- Name: COLUMN sgd_estc_estconsolid.sgd_estc_grupgenerado; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_estc_estconsolid.sgd_estc_grupgenerado IS 'Numero Historico de la Generacion.';


--
-- Name: sgd_estinst_estadoinstancia; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_estinst_estadoinstancia (
    sgd_estinst_codi numeric(4,0),
    sgd_apli_codi numeric(4,0),
    sgd_instorf_codi numeric(4,0),
    sgd_estinst_valor numeric(4,0),
    sgd_estinst_habilita numeric(1,0),
    sgd_estinst_mensaje character varying(100)
);


ALTER TABLE public.sgd_estinst_estadoinstancia OWNER TO orfeo62usr;

--
-- Name: sgd_exp_expediente_id_expediente_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sgd_exp_expediente_id_expediente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sgd_exp_expediente_id_expediente_seq OWNER TO orfeo62usr;

--
-- Name: sgd_exp_expediente; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_exp_expediente (
    sgd_exp_numero character varying(20) NOT NULL,
    radi_nume_radi character varying(30),
    sgd_exp_fech date,
    sgd_exp_fech_mod date,
    depe_codi character varying(5),
    usua_codi numeric(3,0),
    usua_doc character varying(15),
    sgd_exp_estado numeric(1,0) DEFAULT 0,
    sgd_exp_titulo character varying(50),
    sgd_exp_asunto character varying(150),
    sgd_exp_carpeta character varying(30),
    sgd_exp_ufisica character varying(20),
    sgd_exp_isla character varying(10),
    sgd_exp_estante character varying(10),
    sgd_exp_caja character varying(10),
    sgd_exp_fech_arch date,
    sgd_srd_codigo numeric(3,0),
    sgd_sbrd_codigo numeric(3,0),
    sgd_fexp_codigo numeric(3,0),
    sgd_exp_subexpediente character varying(20),
    sgd_exp_archivo numeric(1,0),
    sgd_exp_unicon numeric(1,0),
    sgd_exp_fechfin date,
    sgd_exp_folios character varying(6),
    sgd_exp_rete numeric(2,0),
    sgd_exp_entrepa numeric(6,0),
    radi_usua_arch character varying(40),
    sgd_exp_edificio character varying(400),
    sgd_exp_caja_bodega character varying(40),
    sgd_exp_carro character varying(40),
    sgd_exp_carpeta_bodega character varying(40),
    sgd_exp_privado numeric(1,0),
    sgd_exp_cd character varying(10),
    sgd_exp_nref character varying(7),
    sgd_sexp_paraexp1 character varying(50),
    id_expediente integer DEFAULT nextval('public.sgd_exp_expediente_id_expediente_seq'::regclass) NOT NULL,
    CONSTRAINT sgd_exp_expediente_exp_check CHECK ((btrim((radi_nume_radi)::text) <> (''::character varying)::text)),
    CONSTRAINT sgd_exp_expediente_radi_check CHECK ((btrim((sgd_exp_numero)::text) <> (''::character varying)::text))
);


ALTER TABLE public.sgd_exp_expediente OWNER TO orfeo62usr;

--
-- Name: COLUMN sgd_exp_expediente.sgd_exp_numero; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.sgd_exp_numero IS 'Numero de Expediente';


--
-- Name: COLUMN sgd_exp_expediente.radi_nume_radi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.radi_nume_radi IS 'Radicado Asociado por cada radicado puede existir un registro de ubicacion en el expediente.';


--
-- Name: COLUMN sgd_exp_expediente.sgd_exp_fech; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.sgd_exp_fech IS 'Fecha de Creacion del Expediente';


--
-- Name: COLUMN sgd_exp_expediente.sgd_exp_fech_mod; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.sgd_exp_fech_mod IS 'Fecha de Ultima modificacion';


--
-- Name: COLUMN sgd_exp_expediente.depe_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.depe_codi IS 'Dependencia que crea el expediente';


--
-- Name: COLUMN sgd_exp_expediente.usua_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.usua_codi IS 'Codigo del Usuario que crea el expediente ';


--
-- Name: COLUMN sgd_exp_expediente.usua_doc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.usua_doc IS 'Documento del usuario que crea el documento';


--
-- Name: COLUMN sgd_exp_expediente.sgd_exp_estado; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.sgd_exp_estado IS 'Indica si el radicado esta archivado (1) o no (0)';


--
-- Name: COLUMN sgd_exp_expediente.sgd_exp_titulo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.sgd_exp_titulo IS 'Titulo de expediente se coloca en archivo';


--
-- Name: COLUMN sgd_exp_expediente.sgd_exp_asunto; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.sgd_exp_asunto IS 'Asunto del expediente';


--
-- Name: COLUMN sgd_exp_expediente.sgd_exp_carpeta; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.sgd_exp_carpeta IS 'Ubicacion en carpeta';


--
-- Name: COLUMN sgd_exp_expediente.sgd_exp_ufisica; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.sgd_exp_ufisica IS 'Ubicacion fisica';


--
-- Name: COLUMN sgd_exp_expediente.sgd_exp_isla; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.sgd_exp_isla IS 'Isla';


--
-- Name: COLUMN sgd_exp_expediente.sgd_exp_estante; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.sgd_exp_estante IS 'Estante';


--
-- Name: COLUMN sgd_exp_expediente.sgd_exp_caja; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.sgd_exp_caja IS 'Caja';


--
-- Name: COLUMN sgd_exp_expediente.sgd_exp_fech_arch; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.sgd_exp_fech_arch IS 'Fecha de archivado';


--
-- Name: COLUMN sgd_exp_expediente.sgd_srd_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.sgd_srd_codigo IS 'Serie';


--
-- Name: COLUMN sgd_exp_expediente.sgd_sbrd_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.sgd_sbrd_codigo IS 'Subserie';


--
-- Name: COLUMN sgd_exp_expediente.sgd_fexp_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.sgd_fexp_codigo IS 'Fecha del expediente';


--
-- Name: COLUMN sgd_exp_expediente.sgd_exp_subexpediente; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.sgd_exp_subexpediente IS 'Nombre de subexpediente';


--
-- Name: COLUMN sgd_exp_expediente.id_expediente; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_exp_expediente.id_expediente IS 'Autoincremental de la tabla para diferenciar los datos correspondientes';


--
-- Name: sgd_fars_faristas; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_fars_faristas (
    sgd_fars_codigo numeric(5,0) NOT NULL,
    sgd_pexp_codigo numeric(4,0),
    sgd_fexp_codigoini numeric(6,0),
    sgd_fexp_codigofin numeric(6,0),
    sgd_fars_diasminimo numeric(3,0),
    sgd_fars_diasmaximo numeric(3,0),
    sgd_fars_desc character varying(100),
    sgd_trad_codigo numeric(2,0),
    sgd_srd_codigo numeric(3,0),
    sgd_sbrd_codigo numeric(3,0),
    sgd_fars_tipificacion numeric(1,0),
    sgd_tpr_codigo numeric,
    sgd_fars_automatico numeric,
    sgd_fars_rolgeneral numeric
);


ALTER TABLE public.sgd_fars_faristas OWNER TO orfeo62usr;

--
-- Name: sgd_fenv_frmenvio; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_fenv_frmenvio (
    sgd_fenv_codigo numeric(5,0) NOT NULL,
    sgd_fenv_descrip character varying(150),
    sgd_fenv_planilla numeric(1,0) DEFAULT 0 NOT NULL,
    sgd_fenv_estado numeric(1,0) DEFAULT 1 NOT NULL
);


ALTER TABLE public.sgd_fenv_frmenvio OWNER TO orfeo62usr;

--
-- Name: sgd_fexp_flujoexpedientes; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_fexp_flujoexpedientes (
    sgd_fexp_codigo numeric(6,0),
    sgd_pexp_codigo numeric(6,0),
    sgd_fexp_orden numeric(4,0),
    sgd_fexp_terminos numeric(4,0),
    sgd_fexp_imagen character varying(50),
    sgd_fexp_descrip character varying(150)
);


ALTER TABLE public.sgd_fexp_flujoexpedientes OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_fexp_flujoexpedientes; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_fexp_flujoexpedientes IS 'Descripcion de la etapa en el Tipo de Proceso incicado en el campo SGD_PEXP_CODIGO';


--
-- Name: COLUMN sgd_fexp_flujoexpedientes.sgd_fexp_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_fexp_flujoexpedientes.sgd_fexp_codigo IS 'Codigo etapa del Flujo. Codigo debe ser Unico.';


--
-- Name: COLUMN sgd_fexp_flujoexpedientes.sgd_pexp_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_fexp_flujoexpedientes.sgd_pexp_codigo IS 'Codigo de proceso al cual se le incluira el flujo';


--
-- Name: COLUMN sgd_fexp_flujoexpedientes.sgd_fexp_orden; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_fexp_flujoexpedientes.sgd_fexp_orden IS 'Orden de la Etapa en el Flujo Documental';


--
-- Name: COLUMN sgd_fexp_flujoexpedientes.sgd_fexp_terminos; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_fexp_flujoexpedientes.sgd_fexp_terminos IS 'Numero de dias de plazo para cumplimiento de esta etapa.';


--
-- Name: COLUMN sgd_fexp_flujoexpedientes.sgd_fexp_imagen; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_fexp_flujoexpedientes.sgd_fexp_imagen IS 'Icono para distinguir la etapa.';


--
-- Name: COLUMN sgd_fexp_flujoexpedientes.sgd_fexp_descrip; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_fexp_flujoexpedientes.sgd_fexp_descrip IS 'Descripcion de la etapa en el Tipo de Proceso incicado en el campo SGD_PEXP_CODIGO';


--
-- Name: sgd_firmas_qr; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_firmas_qr (
    radi_nume_radi character varying(30) NOT NULL,
    usua_login character varying(50) NOT NULL,
    usua_nomb character varying(45) NOT NULL,
    usua_doc character varying(14) NOT NULL,
    depe_codi character varying(5) NOT NULL,
    firma_fecha timestamp without time zone NOT NULL,
    permiso_firma numeric(1,0) NOT NULL,
    usua_codi numeric(10,0)
);


ALTER TABLE public.sgd_firmas_qr OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_firmas_qr; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_firmas_qr IS 'almacena la información de los radicados firmados';


--
-- Name: COLUMN sgd_firmas_qr.radi_nume_radi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_firmas_qr.radi_nume_radi IS 'Número de radicado';


--
-- Name: COLUMN sgd_firmas_qr.usua_login; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_firmas_qr.usua_login IS 'Usuario que genera la firma';


--
-- Name: COLUMN sgd_firmas_qr.usua_nomb; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_firmas_qr.usua_nomb IS 'Nombre del usuario';


--
-- Name: COLUMN sgd_firmas_qr.usua_doc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_firmas_qr.usua_doc IS 'Documento de identidad del usuario';


--
-- Name: COLUMN sgd_firmas_qr.depe_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_firmas_qr.depe_codi IS 'Dependencia del usuario';


--
-- Name: COLUMN sgd_firmas_qr.firma_fecha; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_firmas_qr.firma_fecha IS 'Fecha de generación de la firma';


--
-- Name: COLUMN sgd_firmas_qr.permiso_firma; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_firmas_qr.permiso_firma IS 'Permiso de firma actual del usuario';


--
-- Name: sgd_firrad_firmarads; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_firrad_firmarads (
    sgd_firrad_id numeric(15,0) NOT NULL,
    radi_nume_radi character varying(15) NOT NULL,
    usua_doc character varying(14) NOT NULL,
    sgd_firrad_firma character varying(255),
    sgd_firrad_fecha date,
    sgd_firrad_docsolic character varying(14) NOT NULL,
    sgd_firrad_fechsolic date NOT NULL,
    sgd_firrad_pk character varying(255)
);


ALTER TABLE public.sgd_firrad_firmarads OWNER TO orfeo62usr;

--
-- Name: sgd_fld_flujodoc; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_fld_flujodoc (
    sgd_fld_codigo numeric(3,0),
    sgd_fld_desc character varying(100),
    sgd_tpr_codigo numeric(3,0),
    sgd_fld_imagen character varying(50),
    sgd_fld_grupoweb integer DEFAULT 0
);


ALTER TABLE public.sgd_fld_flujodoc OWNER TO orfeo62usr;

--
-- Name: sgd_fun_funciones; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_fun_funciones (
    sgd_fun_codigo numeric(4,0) NOT NULL,
    sgd_fun_descrip character varying(530),
    sgd_fun_fech_ini date,
    sgd_fun_fech_fin date
);


ALTER TABLE public.sgd_fun_funciones OWNER TO orfeo62usr;

--
-- Name: sgd_hfld_histflujodoc; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_hfld_histflujodoc (
    sgd_hfld_codigo numeric(6,0),
    sgd_fexp_codigo numeric(3,0) NOT NULL,
    sgd_exp_fechflujoant date,
    sgd_hfld_fech timestamp without time zone,
    sgd_exp_numero character varying(30),
    radi_nume_radi character varying(30),
    usua_doc character varying(10),
    usua_codi numeric(10,0),
    depe_codi character varying(5),
    sgd_ttr_codigo numeric(2,0),
    sgd_fexp_observa character varying(500),
    sgd_hfld_observa character varying(500),
    sgd_fars_codigo numeric,
    sgd_hfld_automatico numeric
);


ALTER TABLE public.sgd_hfld_histflujodoc OWNER TO orfeo62usr;

--
-- Name: COLUMN sgd_hfld_histflujodoc.sgd_hfld_fech; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_hfld_histflujodoc.sgd_hfld_fech IS 'Fecha Historico de expediente';


--
-- Name: sgd_hmtd_hismatdoc; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_hmtd_hismatdoc (
    sgd_hmtd_codigo numeric(6,0) NOT NULL,
    sgd_hmtd_fecha date NOT NULL,
    radi_nume_radi character varying(15) NOT NULL,
    usua_codi numeric(10,0) NOT NULL,
    sgd_hmtd_obse character varying(600) NOT NULL,
    usua_doc numeric(13,0),
    depe_codi character varying(5),
    sgd_mtd_codigo numeric(4,0)
);


ALTER TABLE public.sgd_hmtd_hismatdoc OWNER TO orfeo62usr;

--
-- Name: sgd_hmtd_secue; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sgd_hmtd_secue
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 999999
    CACHE 1;


ALTER TABLE public.sgd_hmtd_secue OWNER TO orfeo62usr;

--
-- Name: sgd_info_secue; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sgd_info_secue
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 9999999999
    CACHE 1;


ALTER TABLE public.sgd_info_secue OWNER TO orfeo62usr;

--
-- Name: sgd_instorf_instanciasorfeo; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_instorf_instanciasorfeo (
    sgd_instorf_codi numeric(4,0),
    sgd_instorf_desc character varying(100)
);


ALTER TABLE public.sgd_instorf_instanciasorfeo OWNER TO orfeo62usr;

--
-- Name: sgd_lip_linkip; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_lip_linkip (
    sgd_lip_id numeric(4,0) NOT NULL,
    sgd_lip_ipini character varying(20) NOT NULL,
    sgd_lip_ipfin character varying(20),
    sgd_lip_dirintranet character varying(150) NOT NULL,
    depe_codi character varying(5) NOT NULL,
    sgd_lip_arch character varying(70),
    sgd_lip_diascache numeric(5,0),
    sgd_lip_rutaftp character varying(150),
    sgd_lip_servftp character varying(50),
    sgd_lip_usbd character varying(20),
    sgd_lip_nombd character varying(20),
    sgd_lip_pwdbd character varying(20),
    sgd_lip_usftp character varying(20),
    sgd_lip_pwdftp character varying(30)
);


ALTER TABLE public.sgd_lip_linkip OWNER TO orfeo62usr;

--
-- Name: sgd_mat_matriz; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_mat_matriz (
    sgd_mat_codigo numeric(4,0) NOT NULL,
    depe_codi character varying(5),
    sgd_fun_codigo numeric(4,0),
    sgd_prc_codigo numeric(4,0),
    sgd_prd_codigo numeric(4,0),
    sgd_mat_fech_ini date,
    sgd_mat_fech_fin date,
    sgd_mat_peso_prd numeric(5,2)
);


ALTER TABLE public.sgd_mat_matriz OWNER TO orfeo62usr;

--
-- Name: sgd_mat_secue; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sgd_mat_secue
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 99999999
    CACHE 1;


ALTER TABLE public.sgd_mat_secue OWNER TO orfeo62usr;

--
-- Name: sgd_mpes_mddpeso; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_mpes_mddpeso (
    sgd_mpes_codigo numeric(5,0) NOT NULL,
    sgd_mpes_descrip character varying(10)
);


ALTER TABLE public.sgd_mpes_mddpeso OWNER TO orfeo62usr;

--
-- Name: sgd_mrd_matrird; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_mrd_matrird (
    sgd_mrd_codigo numeric(4,0) DEFAULT nextval('public.seq_sgd_mrd_codigo'::regclass) NOT NULL,
    depe_codi character varying(5) NOT NULL,
    sgd_srd_codigo numeric(4,0) NOT NULL,
    sgd_sbrd_codigo numeric(4,0) NOT NULL,
    sgd_tpr_codigo numeric(4,0) NOT NULL,
    soporte character varying(50),
    sgd_mrd_fechini date,
    sgd_mrd_fechfin date,
    sgd_mrd_esta character varying(10)
);


ALTER TABLE public.sgd_mrd_matrird OWNER TO orfeo62usr;

--
-- Name: COLUMN sgd_mrd_matrird.sgd_mrd_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_mrd_matrird.sgd_mrd_codigo IS 'Se agrega secuencia para la trd';


--
-- Name: sgd_msdep_msgdep; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_msdep_msgdep (
    sgd_msdep_codi numeric(15,0) NOT NULL,
    depe_codi character varying(5) NOT NULL,
    sgd_msg_codi numeric(15,0) NOT NULL
);


ALTER TABLE public.sgd_msdep_msgdep OWNER TO orfeo62usr;

--
-- Name: sgd_msg_mensaje; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_msg_mensaje (
    sgd_msg_codi numeric(15,0) NOT NULL,
    sgd_tme_codi numeric(3,0) NOT NULL,
    sgd_msg_desc character varying(150),
    sgd_msg_fechdesp date NOT NULL,
    sgd_msg_url character varying(150) NOT NULL,
    sgd_msg_veces numeric(3,0) NOT NULL,
    sgd_msg_ancho numeric(6,0) NOT NULL,
    sgd_msg_largo numeric(6,0) NOT NULL
);


ALTER TABLE public.sgd_msg_mensaje OWNER TO orfeo62usr;

--
-- Name: sgd_mtd_matriz_doc; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_mtd_matriz_doc (
    sgd_mtd_codigo numeric(4,0) NOT NULL,
    sgd_mat_codigo numeric(4,0),
    sgd_tpr_codigo numeric(4,0)
);


ALTER TABLE public.sgd_mtd_matriz_doc OWNER TO orfeo62usr;

--
-- Name: sgd_noh_nohabiles; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_noh_nohabiles (
    noh_fecha date NOT NULL
);


ALTER TABLE public.sgd_noh_nohabiles OWNER TO orfeo62usr;

--
-- Name: sgd_not_notificacion; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_not_notificacion (
    sgd_not_codi numeric(3,0) NOT NULL,
    sgd_not_descrip character varying(100) NOT NULL
);


ALTER TABLE public.sgd_not_notificacion OWNER TO orfeo62usr;

--
-- Name: sgd_ntrd_notifrad; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_ntrd_notifrad (
    radi_nume_radi character varying(15) NOT NULL,
    sgd_not_codi numeric(3,0) NOT NULL,
    sgd_ntrd_notificador character varying(150),
    sgd_ntrd_notificado character varying(150),
    sgd_ntrd_fecha_not date,
    sgd_ntrd_num_edicto numeric(6,0),
    sgd_ntrd_fecha_fija date,
    sgd_ntrd_fecha_desfija date,
    sgd_ntrd_observaciones character varying(150)
);


ALTER TABLE public.sgd_ntrd_notifrad OWNER TO orfeo62usr;

--
-- Name: sgd_oem_oempresas; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_oem_oempresas (
    sgd_oem_codigo numeric(8,0) NOT NULL,
    tdid_codi numeric(2,0),
    sgd_oem_oempresa character varying(300),
    sgd_oem_rep_legal character varying(300),
    sgd_oem_nit character varying(20),
    sgd_oem_sigla character varying(1000),
    muni_codi numeric(4,0),
    dpto_codi numeric(2,0),
    sgd_oem_direccion character varying(1000),
    sgd_oem_telefono character varying(1000),
    id_cont numeric(2,0) DEFAULT 1,
    id_pais numeric(4,0) DEFAULT 170,
    email character varying(1000)
);


ALTER TABLE public.sgd_oem_oempresas OWNER TO orfeo62usr;

--
-- Name: sgd_oem_secue; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sgd_oem_secue
    START WITH 18398
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 99999999
    CACHE 1;


ALTER TABLE public.sgd_oem_secue OWNER TO orfeo62usr;

--
-- Name: sgd_panu_peranulados; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_panu_peranulados (
    sgd_panu_codi numeric(4,0),
    sgd_panu_desc character varying(200)
);


ALTER TABLE public.sgd_panu_peranulados OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_panu_peranulados; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_panu_peranulados IS 'Define los permisos de anulacion de documentos';


--
-- Name: COLUMN sgd_panu_peranulados.sgd_panu_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_panu_peranulados.sgd_panu_codi IS 'Descripcion';


--
-- Name: sgd_parametro; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_parametro (
    param_nomb character varying(25) NOT NULL,
    param_codi numeric(5,0) NOT NULL,
    param_valor character varying(25) NOT NULL
);


ALTER TABLE public.sgd_parametro OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_parametro; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_parametro IS 'Almacena parametros compuestos por dos valores: identificador y valor';


--
-- Name: COLUMN sgd_parametro.param_nomb; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_parametro.param_nomb IS 'Nombre del tipo de parametro';


--
-- Name: COLUMN sgd_parametro.param_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_parametro.param_codi IS 'Codigo identificador del parametro';


--
-- Name: COLUMN sgd_parametro.param_valor; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_parametro.param_valor IS 'Valor del parametro';


--
-- Name: sgd_parexp_paramexpediente; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_parexp_paramexpediente (
    sgd_parexp_codigo integer DEFAULT nextval('public.seq_parexp_paramexpediente'::regclass) NOT NULL,
    depe_codi character varying(5) NOT NULL,
    sgd_parexp_tabla character varying(30) NOT NULL,
    sgd_parexp_etiqueta character varying(30) NOT NULL,
    sgd_parexp_orden numeric(1,0),
    sgd_parexp_editable numeric(1,0)
);


ALTER TABLE public.sgd_parexp_paramexpediente OWNER TO orfeo62usr;

--
-- Name: COLUMN sgd_parexp_paramexpediente.sgd_parexp_editable; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_parexp_paramexpediente.sgd_parexp_editable IS '1 o 0';


--
-- Name: sgd_pen_pensionados; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_pen_pensionados (
    tdid_codi numeric(2,0),
    sgd_ciu_codigo numeric(8,0) NOT NULL,
    sgd_ciu_nombre character varying(150),
    sgd_ciu_direccion character varying(150),
    sgd_ciu_apell1 character varying(50),
    sgd_ciu_apell2 character varying(50),
    sgd_ciu_telefono character varying(50),
    sgd_ciu_email character varying(50),
    muni_codi numeric(4,0),
    dpto_codi numeric(2,0),
    sgd_ciu_cedula character varying(20),
    id_cont numeric(2,0) DEFAULT 1,
    id_pais numeric(4,0) DEFAULT 170
);


ALTER TABLE public.sgd_pen_pensionados OWNER TO orfeo62usr;

--
-- Name: sgd_pexp_procexpedientes; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_pexp_procexpedientes (
    sgd_pexp_codigo numeric NOT NULL,
    sgd_pexp_descrip character varying(100),
    sgd_pexp_terminos numeric DEFAULT 0,
    sgd_srd_codigo numeric(3,0),
    sgd_sbrd_codigo numeric(3,0),
    sgd_pexp_automatico numeric(1,0) DEFAULT 1,
    sgd_pexp_tieneflujo numeric(1,0) DEFAULT 0
);


ALTER TABLE public.sgd_pexp_procexpedientes OWNER TO orfeo62usr;

--
-- Name: COLUMN sgd_pexp_procexpedientes.sgd_pexp_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_pexp_procexpedientes.sgd_pexp_codigo IS 'Codigo que identifica el proceso';


--
-- Name: COLUMN sgd_pexp_procexpedientes.sgd_pexp_descrip; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_pexp_procexpedientes.sgd_pexp_descrip IS 'Nombre del proceso';


--
-- Name: COLUMN sgd_pexp_procexpedientes.sgd_pexp_terminos; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_pexp_procexpedientes.sgd_pexp_terminos IS 'termino del proceso';


--
-- Name: COLUMN sgd_pexp_procexpedientes.sgd_srd_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_pexp_procexpedientes.sgd_srd_codigo IS 'Serie (trd) que identifica el proceso';


--
-- Name: COLUMN sgd_pexp_procexpedientes.sgd_sbrd_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_pexp_procexpedientes.sgd_sbrd_codigo IS 'Subserie (trd) que identifica el proceso';


--
-- Name: COLUMN sgd_pexp_procexpedientes.sgd_pexp_tieneflujo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_pexp_procexpedientes.sgd_pexp_tieneflujo IS 'Si el expediente tiene flujo';


--
-- Name: sgd_plg_secue; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sgd_plg_secue
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 9999999999
    CACHE 1;


ALTER TABLE public.sgd_plg_secue OWNER TO orfeo62usr;

--
-- Name: sgd_pnufe_procnumfe; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_pnufe_procnumfe (
    sgd_pnufe_codi numeric(4,0) NOT NULL,
    sgd_tpr_codigo numeric(4,0),
    sgd_pnufe_descrip character varying(150),
    sgd_pnufe_serie character varying(50)
);


ALTER TABLE public.sgd_pnufe_procnumfe OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_pnufe_procnumfe; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_pnufe_procnumfe IS 'Cataloga los procesos de numeracion y fechado';


--
-- Name: COLUMN sgd_pnufe_procnumfe.sgd_pnufe_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_pnufe_procnumfe.sgd_pnufe_codi IS 'Codigo del proceso';


--
-- Name: COLUMN sgd_pnufe_procnumfe.sgd_tpr_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_pnufe_procnumfe.sgd_tpr_codigo IS 'Codigo del documento que genera el procedimiento';


--
-- Name: COLUMN sgd_pnufe_procnumfe.sgd_pnufe_descrip; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_pnufe_procnumfe.sgd_pnufe_descrip IS 'Descripcion del procedimiento generado';


--
-- Name: COLUMN sgd_pnufe_procnumfe.sgd_pnufe_serie; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_pnufe_procnumfe.sgd_pnufe_serie IS 'Serie que maneja la numeracion de los documentos';


--
-- Name: sgd_pnun_procenum; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_pnun_procenum (
    sgd_pnun_codi numeric(4,0) NOT NULL,
    sgd_pnufe_codi numeric(4,0),
    depe_codi character varying(5),
    sgd_pnun_prepone character varying(50)
);


ALTER TABLE public.sgd_pnun_procenum OWNER TO orfeo62usr;

--
-- Name: COLUMN sgd_pnun_procenum.sgd_pnun_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_pnun_procenum.sgd_pnun_codi IS 'Id del registro';


--
-- Name: COLUMN sgd_pnun_procenum.sgd_pnufe_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_pnun_procenum.sgd_pnufe_codi IS 'Codigo del proceso';


--
-- Name: COLUMN sgd_pnun_procenum.depe_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_pnun_procenum.depe_codi IS 'Codigo de la dependencia';


--
-- Name: COLUMN sgd_pnun_procenum.sgd_pnun_prepone; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_pnun_procenum.sgd_pnun_prepone IS 'Preposicion empleada para generar el numero completo del documento';


--
-- Name: sgd_prc_proceso; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_prc_proceso (
    sgd_prc_codigo numeric(4,0) NOT NULL,
    sgd_prc_descrip character varying(150),
    sgd_prc_fech_ini date,
    sgd_prc_fech_fin date
);


ALTER TABLE public.sgd_prc_proceso OWNER TO orfeo62usr;

--
-- Name: sgd_prd_prcdmentos; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_prd_prcdmentos (
    sgd_prd_codigo numeric(4,0) NOT NULL,
    sgd_prd_descrip character varying(200),
    sgd_prd_fech_ini date,
    sgd_prd_fech_fin date
);


ALTER TABLE public.sgd_prd_prcdmentos OWNER TO orfeo62usr;

--
-- Name: sgd_rda_retdoca; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_rda_retdoca (
    anex_radi_nume numeric(15,0) NOT NULL,
    anex_codigo character varying(20) NOT NULL,
    radi_nume_salida character varying(15),
    anex_borrado character varying(1),
    sgd_mrd_codigo numeric(4,0) NOT NULL,
    depe_codi character varying(5) NOT NULL,
    usua_codi numeric(10,0) NOT NULL,
    usua_doc character varying(14) NOT NULL,
    sgd_rda_fech date,
    sgd_deve_codigo numeric(2,0),
    anex_solo_lect character varying(1),
    anex_radi_fech date,
    anex_estado numeric(1,0),
    anex_nomb_archivo character varying(50),
    anex_tipo numeric(4,0),
    sgd_dir_tipo numeric(4,0)
);


ALTER TABLE public.sgd_rda_retdoca OWNER TO orfeo62usr;

--
-- Name: sgd_rdf_retdocf; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_rdf_retdocf (
    sgd_mrd_codigo numeric(4,0) NOT NULL,
    radi_nume_radi character varying(30) NOT NULL,
    depe_codi character varying(5) NOT NULL,
    usua_codi numeric(10,0) NOT NULL,
    usua_doc character varying(14) NOT NULL,
    sgd_rdf_fech date NOT NULL
);


ALTER TABLE public.sgd_rdf_retdocf OWNER TO orfeo62usr;

--
-- Name: sgd_renv_regenvio; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_renv_regenvio (
    sgd_renv_codigo numeric NOT NULL,
    sgd_fenv_codigo numeric,
    sgd_renv_fech timestamp without time zone,
    radi_nume_sal character varying(30),
    sgd_renv_destino character varying,
    sgd_renv_telefono character varying,
    sgd_renv_mail character varying,
    sgd_renv_peso character varying,
    sgd_renv_valor numeric,
    sgd_renv_certificado numeric,
    sgd_renv_estado numeric,
    usua_doc numeric,
    sgd_renv_nombre character varying,
    sgd_rem_destino numeric DEFAULT 0,
    sgd_dir_codigo numeric,
    sgd_renv_planilla character varying(8),
    sgd_renv_fech_sal timestamp without time zone,
    depe_codi character varying(5),
    sgd_dir_tipo numeric(4,0) DEFAULT 0,
    radi_nume_grupo character varying(30),
    sgd_renv_dir character varying(100),
    sgd_renv_depto character varying(30),
    sgd_renv_mpio character varying(30),
    sgd_renv_tel character varying(20),
    sgd_renv_cantidad numeric(4,0) DEFAULT 0,
    sgd_renv_tipo numeric(1,0) DEFAULT 0,
    sgd_renv_observa character varying(200),
    sgd_renv_grupo numeric(14,0),
    sgd_deve_codigo numeric(2,0),
    sgd_deve_fech timestamp without time zone,
    sgd_renv_valortotal character varying(14) DEFAULT 0,
    sgd_renv_valistamiento character varying(10) DEFAULT 0,
    sgd_renv_vdescuento character varying(10) DEFAULT 0,
    sgd_renv_vadicional character varying(14) DEFAULT 0,
    sgd_depe_genera character varying(5),
    sgd_renv_pais character varying(30) DEFAULT 'colombia'::character varying,
    sgd_renv_guia character varying(100)
);


ALTER TABLE public.sgd_renv_regenvio OWNER TO orfeo62usr;

--
-- Name: sgd_rmr_radmasivre; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_rmr_radmasivre (
    sgd_rmr_grupo character varying(15) NOT NULL,
    sgd_rmr_radi character varying(15) NOT NULL
);


ALTER TABLE public.sgd_rmr_radmasivre OWNER TO orfeo62usr;

--
-- Name: sgd_sbrd_subserierd; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_sbrd_subserierd (
    sgd_srd_codigo numeric(4,0) NOT NULL,
    sgd_sbrd_codigo numeric(4,0) NOT NULL,
    sgd_sbrd_descrip character varying(500) NOT NULL,
    sgd_sbrd_fechini date NOT NULL,
    sgd_sbrd_fechfin date NOT NULL,
    sgd_sbrd_tiemag numeric(4,0),
    sgd_sbrd_tiemac numeric(4,0),
    sgd_sbrd_dispfin character varying(50),
    sgd_sbrd_soporte character varying(50),
    sgd_sbrd_procedi character varying(1500),
    id_tabla numeric(4,0) DEFAULT nextval('public.secr_subseries_id_tabla'::regclass) NOT NULL
);


ALTER TABLE public.sgd_sbrd_subserierd OWNER TO orfeo62usr;

--
-- Name: COLUMN sgd_sbrd_subserierd.id_tabla; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_sbrd_subserierd.id_tabla IS 'Secuencia que controla la creación de subseries mediante el sistema';


--
-- Name: sgd_sed_sede; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_sed_sede (
    sgd_sed_codi numeric(4,0) NOT NULL,
    sgd_sed_desc character varying(50)
);


ALTER TABLE public.sgd_sed_sede OWNER TO orfeo62usr;

--
-- Name: sgd_senuf_secnumfe; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_senuf_secnumfe (
    sgd_senuf_codi numeric(4,0) NOT NULL,
    sgd_pnufe_codi numeric(4,0),
    depe_codi character varying(5),
    sgd_senuf_sec character varying(50)
);


ALTER TABLE public.sgd_senuf_secnumfe OWNER TO orfeo62usr;

--
-- Name: sgd_sexp_secexpedientes; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_sexp_secexpedientes (
    sgd_exp_numero character varying(30) NOT NULL,
    sgd_srd_codigo numeric,
    sgd_sbrd_codigo numeric,
    sgd_sexp_secuencia numeric NOT NULL,
    depe_codi character varying(5),
    usua_doc character varying(15),
    sgd_sexp_fech date,
    sgd_fexp_codigo numeric,
    sgd_sexp_ano numeric,
    usua_doc_responsable character varying(18),
    sgd_sexp_parexp1 character varying(250),
    sgd_sexp_parexp2 character varying(160),
    sgd_sexp_parexp3 character varying(160),
    sgd_sexp_parexp4 character varying(160),
    sgd_sexp_parexp5 character varying(160),
    sgd_pexp_codigo numeric(3,0),
    sgd_exp_fech_arch date,
    sgd_fld_codigo numeric(3,0),
    sgd_exp_fechflujoant date,
    sgd_mrd_codigo numeric(4,0),
    sgd_exp_subexpediente numeric(18,0),
    sgd_exp_privado numeric(1,0),
    sgd_sexp_estado numeric(1,0) DEFAULT 0 NOT NULL
);


ALTER TABLE public.sgd_sexp_secexpedientes OWNER TO orfeo62usr;

--
-- Name: COLUMN sgd_sexp_secexpedientes.sgd_exp_numero; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_sexp_secexpedientes.sgd_exp_numero IS 'Numero del expediente';


--
-- Name: COLUMN sgd_sexp_secexpedientes.sgd_srd_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_sexp_secexpedientes.sgd_srd_codigo IS 'codigo serie';


--
-- Name: COLUMN sgd_sexp_secexpedientes.sgd_sbrd_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_sexp_secexpedientes.sgd_sbrd_codigo IS 'codigo subserie';


--
-- Name: COLUMN sgd_sexp_secexpedientes.sgd_sexp_secuencia; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_sexp_secexpedientes.sgd_sexp_secuencia IS 'numero del expediente';


--
-- Name: COLUMN sgd_sexp_secexpedientes.depe_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_sexp_secexpedientes.depe_codi IS 'Dependencia creadora';


--
-- Name: COLUMN sgd_sexp_secexpedientes.usua_doc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_sexp_secexpedientes.usua_doc IS 'Documento del usuario creador';


--
-- Name: COLUMN sgd_sexp_secexpedientes.sgd_sexp_fech; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_sexp_secexpedientes.sgd_sexp_fech IS 'Fecha de inicio del proceso';


--
-- Name: COLUMN sgd_sexp_secexpedientes.sgd_fexp_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_sexp_secexpedientes.sgd_fexp_codigo IS 'Codigo de proceso';


--
-- Name: COLUMN sgd_sexp_secexpedientes.sgd_sexp_ano; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_sexp_secexpedientes.sgd_sexp_ano IS 'A?o del expediente';


--
-- Name: COLUMN sgd_sexp_secexpedientes.sgd_sexp_estado; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_sexp_secexpedientes.sgd_sexp_estado IS 'Estado de transferencia, 0 ninguna, 1 primaria, 2, secundaria, 3 eliminado';


--
-- Name: sgd_srd_seriesrd; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_srd_seriesrd (
    sgd_srd_codigo numeric(4,0) NOT NULL,
    sgd_srd_descrip character varying(500) NOT NULL,
    sgd_srd_fechini date NOT NULL,
    sgd_srd_fechfin date NOT NULL
);


ALTER TABLE public.sgd_srd_seriesrd OWNER TO orfeo62usr;

--
-- Name: sgd_tar_tarifas; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_tar_tarifas (
    sgd_fenv_codigo numeric(5,0),
    sgd_tar_codser numeric(5,0),
    sgd_tar_codigo numeric(5,0),
    sgd_tar_valenv1 numeric(15,0),
    sgd_tar_valenv2 numeric(15,0),
    sgd_tar_valenv1g1 numeric(15,0),
    sgd_clta_codser numeric(5,0),
    sgd_tar_valenv2g2 numeric(15,0),
    sgd_clta_descrip character varying(100)
);


ALTER TABLE public.sgd_tar_tarifas OWNER TO orfeo62usr;

--
-- Name: sgd_tdec_tipodecision; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_tdec_tipodecision (
    sgd_apli_codi numeric(4,0) NOT NULL,
    sgd_tdec_codigo numeric(4,0) NOT NULL,
    sgd_tdec_descrip character varying(150),
    sgd_tdec_sancionar numeric(1,0),
    sgd_tdec_firmeza numeric(1,0),
    sgd_tdec_versancion numeric(1,0),
    sgd_tdec_showmenu numeric(1,0),
    sgd_tdec_updnotif numeric(1,0),
    sgd_tdec_veragota numeric(1,0)
);


ALTER TABLE public.sgd_tdec_tipodecision OWNER TO orfeo62usr;

--
-- Name: sgd_tid_tipdecision; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_tid_tipdecision (
    sgd_tid_codi numeric(4,0) NOT NULL,
    sgd_tid_desc character varying(150),
    sgd_tpr_codigo numeric(4,0),
    sgd_pexp_codigo numeric(2,0),
    sgd_tpr_codigop numeric(2,0)
);


ALTER TABLE public.sgd_tid_tipdecision OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_tid_tipdecision; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_tid_tipdecision IS 'Tipos de decision';


--
-- Name: COLUMN sgd_tid_tipdecision.sgd_tid_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_tid_tipdecision.sgd_tid_codi IS 'Id del registro';


--
-- Name: COLUMN sgd_tid_tipdecision.sgd_tid_desc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_tid_tipdecision.sgd_tid_desc IS 'Descripcion';


--
-- Name: sgd_tidm_tidocmasiva; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_tidm_tidocmasiva (
    sgd_tidm_codi numeric(4,0) NOT NULL,
    sgd_tidm_desc character varying(150)
);


ALTER TABLE public.sgd_tidm_tidocmasiva OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_tidm_tidocmasiva; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_tidm_tidocmasiva IS 'Cataloga los documentos que hacen parte del procedimiento de correspondencia masiva';


--
-- Name: COLUMN sgd_tidm_tidocmasiva.sgd_tidm_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_tidm_tidocmasiva.sgd_tidm_codi IS 'Codigo del documento';


--
-- Name: COLUMN sgd_tidm_tidocmasiva.sgd_tidm_desc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_tidm_tidocmasiva.sgd_tidm_desc IS 'Descripcion';


--
-- Name: sgd_tip3_tipotercero; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_tip3_tipotercero (
    sgd_tip3_codigo numeric(2,0) NOT NULL,
    sgd_dir_tipo numeric(4,0),
    sgd_tip3_nombre character varying(15),
    sgd_tip3_desc character varying(30),
    sgd_tip3_imgpestana character varying(20),
    sgd_tpr_tp1 numeric(1,0) DEFAULT 0,
    sgd_tpr_tp2 numeric(1,0) DEFAULT 0,
    sgd_tpr_tp4 smallint DEFAULT 1,
    sgd_tpr_tp3 smallint DEFAULT 1
);


ALTER TABLE public.sgd_tip3_tipotercero OWNER TO orfeo62usr;

--
-- Name: sgd_tma_temas; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_tma_temas (
    sgd_tma_codigo numeric(4,0) NOT NULL,
    depe_codi character varying(5),
    sgd_prc_codigo numeric(4,0),
    sgd_tma_descrip character varying(150)
);


ALTER TABLE public.sgd_tma_temas OWNER TO orfeo62usr;

--
-- Name: sgd_tme_tipmen; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_tme_tipmen (
    sgd_tme_codi numeric(3,0) NOT NULL,
    sgd_tme_desc character varying(150)
);


ALTER TABLE public.sgd_tme_tipmen OWNER TO orfeo62usr;

--
-- Name: sgd_tpr_tpdcumento; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_tpr_tpdcumento (
    sgd_tpr_codigo numeric(4,0) NOT NULL,
    sgd_tpr_descrip character varying(500),
    sgd_tpr_termino numeric(4,0),
    sgd_tpr_tpuso numeric(1,0),
    sgd_tpr_numera character(1),
    sgd_tpr_radica character(1),
    sgd_tpr_tp1 numeric(1,0) DEFAULT 0,
    sgd_tpr_tp2 numeric(1,0) DEFAULT 0,
    sgd_tpr_estado numeric(1,0),
    sgd_termino_real numeric(4,0),
    sgd_tpr_web smallint DEFAULT 0,
    sgd_tpr_tiptermino character varying(5),
    sgd_tpr_tp4 numeric(1,0) DEFAULT 0,
    sgd_tpr_tp3 smallint
);


ALTER TABLE public.sgd_tpr_tpdcumento OWNER TO orfeo62usr;

--
-- Name: COLUMN sgd_tpr_tpdcumento.sgd_tpr_numera; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_tpr_tpdcumento.sgd_tpr_numera IS 'INDICA SI UN DOCUMNTO PUEDE NUMERARSE';


--
-- Name: COLUMN sgd_tpr_tpdcumento.sgd_tpr_radica; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_tpr_tpdcumento.sgd_tpr_radica IS 'INDICA SI UN DOCUMNTO PUEDE RADICARSE';


--
-- Name: COLUMN sgd_tpr_tpdcumento.sgd_tpr_tp1; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_tpr_tpdcumento.sgd_tpr_tp1 IS 'Radicados de salida';


--
-- Name: COLUMN sgd_tpr_tpdcumento.sgd_tpr_tp2; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_tpr_tpdcumento.sgd_tpr_tp2 IS 'Radicados de entrada';


--
-- Name: COLUMN sgd_tpr_tpdcumento.sgd_tpr_estado; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_tpr_tpdcumento.sgd_tpr_estado IS 'Estado del documento 1- habilitado 2- deshabilitado';


--
-- Name: COLUMN sgd_tpr_tpdcumento.sgd_tpr_web; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_tpr_tpdcumento.sgd_tpr_web IS 'Indica si se debe mostrar o no el tipo documental en el fomulario de PQRS';


--
-- Name: sgd_trad_tiporad; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_trad_tiporad (
    sgd_trad_codigo numeric(2,0) NOT NULL,
    sgd_trad_descr character varying(30),
    sgd_trad_icono character varying(30),
    sgd_trad_diasbloqueo numeric(2,0),
    sgd_trad_genradsal smallint,
    tiporadi_email numeric(1,0) DEFAULT 0,
    mostrar_como_tipo numeric(1,0) DEFAULT 1
);


ALTER TABLE public.sgd_trad_tiporad OWNER TO orfeo62usr;

--
-- Name: COLUMN sgd_trad_tiporad.mostrar_como_tipo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_trad_tiporad.mostrar_como_tipo IS 'Indica si se debe mostrar o no como tipo de radicado en el sistema aplica mas que todo para PQRS';


--
-- Name: sgd_transfe_documentales; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_transfe_documentales (
    id_trans numeric(15,0) NOT NULL,
    sgd_exp_numero character varying(20),
    sgd_srd_codigo numeric(4,0),
    sgd_sbrd_codigo numeric(4,0),
    sgd_tpr_codigo numeric(4,0),
    radi_nume_radi character varying(30),
    fecha_archivado timestamp with time zone,
    depe_codi_arch character varying(5),
    usua_codi_arch numeric(10,0),
    fecha_transferencia timestamp with time zone,
    depe_codi_trans character varying(5),
    usua_codi_trans numeric(10,0),
    nombre_archivo character varying(100)
);


ALTER TABLE public.sgd_transfe_documentales OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_transfe_documentales; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_transfe_documentales IS 'Registra las transferencias documentales';


--
-- Name: COLUMN sgd_transfe_documentales.id_trans; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_transfe_documentales.id_trans IS 'Id unico de la tabla';


--
-- Name: COLUMN sgd_transfe_documentales.sgd_exp_numero; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_transfe_documentales.sgd_exp_numero IS 'Numero de expediente';


--
-- Name: COLUMN sgd_transfe_documentales.sgd_srd_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_transfe_documentales.sgd_srd_codigo IS 'Codigo Serie';


--
-- Name: COLUMN sgd_transfe_documentales.sgd_sbrd_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_transfe_documentales.sgd_sbrd_codigo IS 'Codigo Subserie';


--
-- Name: COLUMN sgd_transfe_documentales.sgd_tpr_codigo; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_transfe_documentales.sgd_tpr_codigo IS 'Codigo tipo documental';


--
-- Name: COLUMN sgd_transfe_documentales.radi_nume_radi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_transfe_documentales.radi_nume_radi IS 'Numero radicado';


--
-- Name: COLUMN sgd_transfe_documentales.fecha_archivado; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_transfe_documentales.fecha_archivado IS 'Fecha archivado';


--
-- Name: COLUMN sgd_transfe_documentales.depe_codi_arch; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_transfe_documentales.depe_codi_arch IS 'Dependencia de usuario que archivo';


--
-- Name: COLUMN sgd_transfe_documentales.usua_codi_arch; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_transfe_documentales.usua_codi_arch IS 'Codigo de usuario que archivo';


--
-- Name: COLUMN sgd_transfe_documentales.fecha_transferencia; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_transfe_documentales.fecha_transferencia IS 'Fecha de transaccion documental';


--
-- Name: COLUMN sgd_transfe_documentales.depe_codi_trans; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_transfe_documentales.depe_codi_trans IS 'Dependencia de usuario que transfirio';


--
-- Name: COLUMN sgd_transfe_documentales.usua_codi_trans; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_transfe_documentales.usua_codi_trans IS 'Codigo de usuario que transfirio';


--
-- Name: sgd_ttr_transaccion; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_ttr_transaccion (
    sgd_ttr_codigo numeric(3,0) NOT NULL,
    sgd_ttr_descrip character varying(100) NOT NULL
);


ALTER TABLE public.sgd_ttr_transaccion OWNER TO orfeo62usr;

--
-- Name: sgd_tvd_depe_id; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sgd_tvd_depe_id
    START WITH 0
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 99999
    CACHE 1;


ALTER TABLE public.sgd_tvd_depe_id OWNER TO orfeo62usr;

--
-- Name: sgd_tvd_dependencia; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_tvd_dependencia (
    sgd_depe_codi character varying(5) NOT NULL,
    sgd_depe_nombre character varying(200) NOT NULL,
    sgd_depe_fechini date NOT NULL,
    sgd_depe_fechfin date NOT NULL
);


ALTER TABLE public.sgd_tvd_dependencia OWNER TO orfeo62usr;

--
-- Name: sgd_tvd_series; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_tvd_series (
    sgd_depe_codi character varying(5) NOT NULL,
    sgd_stvd_codi numeric(4,0) NOT NULL,
    sgd_stvd_nombre character varying(200) NOT NULL,
    sgd_stvd_ac numeric(4,0),
    sgd_stvd_dispfin numeric(2,0),
    sgd_stvd_proc character varying(500)
);


ALTER TABLE public.sgd_tvd_series OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_tvd_series; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_tvd_series IS 'Series de TVD';


--
-- Name: COLUMN sgd_tvd_series.sgd_depe_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_tvd_series.sgd_depe_codi IS 'Codigo de dependencia TVD';


--
-- Name: COLUMN sgd_tvd_series.sgd_stvd_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_tvd_series.sgd_stvd_codi IS 'Codigo de serieTVD';


--
-- Name: COLUMN sgd_tvd_series.sgd_stvd_nombre; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_tvd_series.sgd_stvd_nombre IS 'Nombre de serie TVD';


--
-- Name: COLUMN sgd_tvd_series.sgd_stvd_ac; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_tvd_series.sgd_stvd_ac IS 'Retencion en AC';


--
-- Name: COLUMN sgd_tvd_series.sgd_stvd_dispfin; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_tvd_series.sgd_stvd_dispfin IS 'Disposicion final';


--
-- Name: COLUMN sgd_tvd_series.sgd_stvd_proc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.sgd_tvd_series.sgd_stvd_proc IS 'procedimiento';


--
-- Name: sgd_ush_usuhistorico; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_ush_usuhistorico (
    sgd_ush_admcod numeric(10,0) NOT NULL,
    sgd_ush_admdep character varying(5) NOT NULL,
    sgd_ush_admdoc character varying(14) NOT NULL,
    sgd_ush_usucod numeric(10,0) NOT NULL,
    sgd_ush_usudep character varying(5) NOT NULL,
    sgd_ush_usudoc character varying(14) NOT NULL,
    sgd_ush_modcod numeric(5,0) NOT NULL,
    sgd_ush_fechevento date NOT NULL,
    sgd_ush_usulogin character varying(20) NOT NULL
);


ALTER TABLE public.sgd_ush_usuhistorico OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_ush_usuhistorico; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_ush_usuhistorico IS 'Representa las modificaciones hechas a los usuarios. Registro historico por usuario sobre el tipo de transaccion realizada y los cambios con fecha y hora de realizacion.';


--
-- Name: sgd_usm_usumodifica; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sgd_usm_usumodifica (
    sgd_usm_modcod numeric(5,0) NOT NULL,
    sgd_usm_moddescr character varying(60) NOT NULL
);


ALTER TABLE public.sgd_usm_usumodifica OWNER TO orfeo62usr;

--
-- Name: TABLE sgd_usm_usumodifica; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sgd_usm_usumodifica IS 'Contiene los tipos de modificaciones que se pueden hacer a los usuarios del sistema.';


--
-- Name: sphinx_index_meta; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sphinx_index_meta (
    index_name character varying(50) NOT NULL,
    max_id integer NOT NULL,
    last_update timestamp with time zone NOT NULL
);


ALTER TABLE public.sphinx_index_meta OWNER TO orfeo62usr;

--
-- Name: TABLE sphinx_index_meta; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sphinx_index_meta IS 'sphinx_index_meta esta tabla se usa para dejar una marca de tiempo cada vez que se ejecuta el proceso de indexación';


--
-- Name: sphinx_index_remove; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.sphinx_index_remove (
    id integer NOT NULL,
    indice integer NOT NULL,
    estado numeric(1,0) NOT NULL,
    fecha_creacion timestamp with time zone NOT NULL,
    fecha_ejecucion timestamp with time zone,
    identificador character varying(30) NOT NULL
);


ALTER TABLE public.sphinx_index_remove OWNER TO orfeo62usr;

--
-- Name: TABLE sphinx_index_remove; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.sphinx_index_remove IS 'sphinx_index_remove se usa para indicarle a sphinx que registros debe eliminar, orfeo carga datos en esta tabla cuando actualizan un anexo cargado con skinascan';


--
-- Name: sphinx_index_meta_id_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.sphinx_index_meta_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sphinx_index_meta_id_seq OWNER TO orfeo62usr;

--
-- Name: sphinx_index_meta_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.sphinx_index_meta_id_seq OWNED BY public.sphinx_index_remove.id;


--
-- Name: tipo_doc_identificacion; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.tipo_doc_identificacion (
    tdid_codi numeric(2,0) NOT NULL,
    tdid_desc character varying(100) NOT NULL
);


ALTER TABLE public.tipo_doc_identificacion OWNER TO orfeo62usr;

--
-- Name: TABLE tipo_doc_identificacion; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.tipo_doc_identificacion IS 'TIPO_DOC_IDENTIFICACION';


--
-- Name: COLUMN tipo_doc_identificacion.tdid_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.tipo_doc_identificacion.tdid_codi IS 'CODIGO DEL TIPO DE DOCUMENTO DE IDENTIFICACION';


--
-- Name: COLUMN tipo_doc_identificacion.tdid_desc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.tipo_doc_identificacion.tdid_desc IS 'DESCIPCION DEL TIPO DE DOCUMENTO DE IDENTIFICACION';


--
-- Name: tipo_poblacion_pqrs_id_tp_pqrs_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.tipo_poblacion_pqrs_id_tp_pqrs_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_poblacion_pqrs_id_tp_pqrs_seq OWNER TO orfeo62usr;

--
-- Name: tipo_poblacion_pqrs; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.tipo_poblacion_pqrs (
    id_tp_pqrs integer DEFAULT nextval('public.tipo_poblacion_pqrs_id_tp_pqrs_seq'::regclass) NOT NULL,
    tipo_p_pqrs character varying
);


ALTER TABLE public.tipo_poblacion_pqrs OWNER TO orfeo62usr;

--
-- Name: tipo_remitente; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.tipo_remitente (
    trte_codi numeric(2,0) NOT NULL,
    trte_desc character varying(100) NOT NULL,
    aplica_pqrs numeric(2,0) DEFAULT 0
);


ALTER TABLE public.tipo_remitente OWNER TO orfeo62usr;

--
-- Name: TABLE tipo_remitente; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.tipo_remitente IS 'TIPO_REMITENTE';


--
-- Name: COLUMN tipo_remitente.trte_codi; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.tipo_remitente.trte_codi IS 'CODIGO TIPO DE REMITENTE';


--
-- Name: COLUMN tipo_remitente.trte_desc; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.tipo_remitente.trte_desc IS 'DESC DEL TIPO DE REMITENTE';


--
-- Name: COLUMN tipo_remitente.aplica_pqrs; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public.tipo_remitente.aplica_pqrs IS 'indica si se muestra o no en el formulario de PQRS 0=No, 10= SI';


--
-- Name: tipo_tratamiento_pqrs_id_tipo_t_pqrs_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.tipo_tratamiento_pqrs_id_tipo_t_pqrs_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 9999999999999
    CACHE 1;


ALTER TABLE public.tipo_tratamiento_pqrs_id_tipo_t_pqrs_seq OWNER TO orfeo62usr;

--
-- Name: tipo_tratamiento_pqrs; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.tipo_tratamiento_pqrs (
    id_tipo_t_pqrs integer DEFAULT nextval('public.tipo_tratamiento_pqrs_id_tipo_t_pqrs_seq'::regclass) NOT NULL,
    tipo_t_pqrs character varying NOT NULL
);


ALTER TABLE public.tipo_tratamiento_pqrs OWNER TO orfeo62usr;

--
-- Name: tipo_usuario_grupo; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.tipo_usuario_grupo (
    id_grupo_tipo_usuario integer NOT NULL,
    nombre_tipo_usuario character varying(30),
    estdo_tipo_usuario numeric(1,0)
);


ALTER TABLE public.tipo_usuario_grupo OWNER TO orfeo62usr;

--
-- Name: tipo_usuario_grupo_id_grupo_tipo_usuario_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.tipo_usuario_grupo_id_grupo_tipo_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_usuario_grupo_id_grupo_tipo_usuario_seq OWNER TO orfeo62usr;

--
-- Name: tipo_usuario_grupo_id_grupo_tipo_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.tipo_usuario_grupo_id_grupo_tipo_usuario_seq OWNED BY public.tipo_usuario_grupo.id_grupo_tipo_usuario;


--
-- Name: tipos_comunicaciones; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.tipos_comunicaciones (
    id_tipos_comunicaciones integer NOT NULL,
    nombre_tipos_comunicaciones character varying
);


ALTER TABLE public.tipos_comunicaciones OWNER TO orfeo62usr;

--
-- Name: TABLE tipos_comunicaciones; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.tipos_comunicaciones IS 'En esta tabla se guarda la información de las diferentes pestañas incluidas en el archivo entregado por el cliente';


--
-- Name: tipos_comunicaciones_id_tipos_comunicaciones_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.tipos_comunicaciones_id_tipos_comunicaciones_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipos_comunicaciones_id_tipos_comunicaciones_seq OWNER TO orfeo62usr;

--
-- Name: tipos_comunicaciones_id_tipos_comunicaciones_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.tipos_comunicaciones_id_tipos_comunicaciones_seq OWNED BY public.tipos_comunicaciones.id_tipos_comunicaciones;


--
-- Name: ubicacion_fisica; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.ubicacion_fisica (
    ubic_depe_radi character varying(5),
    ubic_depe_arch character varying(5)
);


ALTER TABLE public.ubicacion_fisica OWNER TO orfeo62usr;

--
-- Name: user; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public."user" (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    auth_key character varying(32) NOT NULL,
    password_hash character varying(255) NOT NULL,
    password_reset_token character varying(255),
    email character varying(255),
    status smallint DEFAULT 10 NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL,
    verification_token character varying(255) DEFAULT NULL::character varying,
    security_questions integer DEFAULT 0
);


ALTER TABLE public."user" OWNER TO orfeo62usr;

--
-- Name: COLUMN "user".security_questions; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON COLUMN public."user".security_questions IS '0 = sin metodo de Recuperacion de cuenta  1 = metodo por Preguntas 2 = metodo por correo ';


--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_id_seq OWNER TO orfeo62usr;

--
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.user_id_seq OWNED BY public."user".id;


--
-- Name: usuarios_grupos_informados; Type: TABLE; Schema: public; Owner: orfeo62usr
--

CREATE TABLE public.usuarios_grupos_informados (
    id_usuarios_grupos_informados integer NOT NULL,
    id_grupos_informados integer NOT NULL,
    usua_login character varying(50) NOT NULL,
    usuario_grupo_activo integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.usuarios_grupos_informados OWNER TO orfeo62usr;

--
-- Name: TABLE usuarios_grupos_informados; Type: COMMENT; Schema: public; Owner: orfeo62usr
--

COMMENT ON TABLE public.usuarios_grupos_informados IS 'Se utiliza para relacionar los usuarios con los grupos';


--
-- Name: usuarios_grupos_informados_id_usuarios_grupos_informados_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.usuarios_grupos_informados_id_usuarios_grupos_informados_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_grupos_informados_id_usuarios_grupos_informados_seq OWNER TO orfeo62usr;

--
-- Name: usuarios_grupos_informados_id_usuarios_grupos_informados_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.usuarios_grupos_informados_id_usuarios_grupos_informados_seq OWNED BY public.usuarios_grupos_informados.id_usuarios_grupos_informados;


--
-- Name: usuarios_grupos_informados_seq; Type: SEQUENCE; Schema: public; Owner: orfeo62usr
--

CREATE SEQUENCE public.usuarios_grupos_informados_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_grupos_informados_seq OWNER TO orfeo62usr;

--
-- Name: usuarios_grupos_informados_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: orfeo62usr
--

ALTER SEQUENCE public.usuarios_grupos_informados_seq OWNED BY public.usuarios_grupos_informados.id_usuarios_grupos_informados;


--
-- Name: carpeta_per id_caperta_per; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.carpeta_per ALTER COLUMN id_caperta_per SET DEFAULT nextval('public.carpeta_per_id_caperta_per_seq'::regclass);


--
-- Name: configuracion_contrasena idConfiguracionContracsena; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.configuracion_contrasena ALTER COLUMN "idConfiguracionContracsena" SET DEFAULT nextval('public."configuracion_contrasena_idConfiguracionContracsena_seq"'::regclass);


--
-- Name: configuracion_general_fondo id_campo_configuracion_fondo; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.configuracion_general_fondo ALTER COLUMN id_campo_configuracion_fondo SET DEFAULT nextval('public.configuracion_general_fondo_id_campo_configuracion_fondo_seq'::regclass);


--
-- Name: contrasenas_guardadas id_contrasena_guardada; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.contrasenas_guardadas ALTER COLUMN id_contrasena_guardada SET DEFAULT nextval('public.contrasenas_guardadas_id_contrasena_guardada_seq'::regclass);


--
-- Name: datosocr indice; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.datosocr ALTER COLUMN indice SET DEFAULT nextval('public.datosocr_indice_seq'::regclass);


--
-- Name: direccion_usuarios id; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.direccion_usuarios ALTER COLUMN id SET DEFAULT nextval('public.direccion_usuarios_id_seq'::regclass);

--
-- Name: estado_civil_pqrs id_estado_civil_pqrs; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.estado_civil_pqrs ALTER COLUMN id_estado_civil_pqrs SET DEFAULT nextval('public.estado_civil_pqrs_id_estado_civil_pqrs_seq'::regclass);

--
-- Name: grupos_informados id_grupos_informados; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.grupos_informados ALTER COLUMN id_grupos_informados SET DEFAULT nextval('public.grupos_informados_seq'::regclass);

--
-- Name: perfiles codi_perfil; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.perfiles ALTER COLUMN codi_perfil SET DEFAULT nextval('public.perfiles_codi_perfil_seq'::regclass);

--
-- Name: preguntas id_preguntas; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.preguntas ALTER COLUMN id_preguntas SET DEFAULT nextval('public."Preguntas_id_preguntas_seq"'::regclass);

--
-- Name: respuestas_usuario id_Respuestas_Usuario; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.respuestas_usuario ALTER COLUMN "id_Respuestas_Usuario" SET DEFAULT nextval('public."Respuestas_Usuario_id_Respuestas_Usuario_seq"'::regclass);

--
-- Name: rol_tipos_doc cod_rol_tipos; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.rol_tipos_doc ALTER COLUMN cod_rol_tipos SET DEFAULT nextval('public.sec_rol_tipos_doc'::regclass);

--
-- Name: roles cod_rol; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.roles ALTER COLUMN cod_rol SET DEFAULT nextval('public.roles_cod_rol_seq'::regclass);

--
-- Name: sgd_ejes_tematicos id_sgd_eje_tematico; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_ejes_tematicos ALTER COLUMN id_sgd_eje_tematico SET DEFAULT nextval('public.sgd_ejes_tematicos_id_sgd_eje_tematico_seq'::regclass);

--
-- Name: sgd_ejes_tematicos_dependencia id_sgd_eje_tematico_dependencia; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_ejes_tematicos_dependencia ALTER COLUMN id_sgd_eje_tematico_dependencia SET DEFAULT nextval('public.sgd_ejes_tematicos_dependenci_id_sgd_eje_tematico_dependenc_seq'::regclass);

--
-- Name: sphinx_index_remove id; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sphinx_index_remove ALTER COLUMN id SET DEFAULT nextval('public.sphinx_index_meta_id_seq'::regclass);

--
-- Name: tipo_usuario_grupo id_grupo_tipo_usuario; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.tipo_usuario_grupo ALTER COLUMN id_grupo_tipo_usuario SET DEFAULT nextval('public.tipo_usuario_grupo_id_grupo_tipo_usuario_seq'::regclass);

--
-- Name: tipos_comunicaciones id_tipos_comunicaciones; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.tipos_comunicaciones ALTER COLUMN id_tipos_comunicaciones SET DEFAULT nextval('public.tipos_comunicaciones_id_tipos_comunicaciones_seq'::regclass);

--
-- Name: user id; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public."user" ALTER COLUMN id SET DEFAULT nextval('public.user_id_seq'::regclass);

--
-- Name: usuarios_grupos_informados id_usuarios_grupos_informados; Type: DEFAULT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.usuarios_grupos_informados ALTER COLUMN id_usuarios_grupos_informados SET DEFAULT nextval('public.usuarios_grupos_informados_seq'::regclass);

--
-- Name: Preguntas_id_preguntas_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public."Preguntas_id_preguntas_seq"', 1, false);

--
-- Name: Respuestas_Usuario_id_Respuestas_Usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public."Respuestas_Usuario_id_Respuestas_Usuario_seq"', 1, false);

--
-- Name: carpeta_per_id_caperta_per_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.carpeta_per_id_caperta_per_seq', 2, true);

--
-- Name: configuracion_contrasena_idConfiguracionContracsena_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public."configuracion_contrasena_idConfiguracionContracsena_seq"', 5, true);

--
-- Name: configuracion_general_fondo_id_campo_configuracion_fondo_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.configuracion_general_fondo_id_campo_configuracion_fondo_seq', 143, true);

--
-- Name: contrasenas_guardadas_id_contrasena_guardada_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.contrasenas_guardadas_id_contrasena_guardada_seq', 160, true);

--
-- Name: datosocr_indice_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.datosocr_indice_seq', 1, false);

--
-- Name: dependencias; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.dependencias', 0, false);

--
-- Name: direccion_usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.direccion_usuarios_id_seq', 1, false);

--
-- Name: estado_civil_pqrs_id_estado_civil_pqrs_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.estado_civil_pqrs_id_estado_civil_pqrs_seq', 1, false);

--
-- Name: fondo_acumulado_comunicaciones_id_fondo_acumulado_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.fondo_acumulado_comunicaciones_id_fondo_acumulado_seq', 127481, true);

--
-- Name: grupos_informados_id_grupos_informados_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.grupos_informados_id_grupos_informados_seq', 1, false);

--
-- Name: grupos_informados_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.grupos_informados_seq', 1, false);

--
-- Name: nivel_academico_pqrs_id_nivel_acad_pqrs_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.nivel_academico_pqrs_id_nivel_acad_pqrs_seq', 1, false);

--
-- Name: num_resol_dtc; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.num_resol_dtc', 24, false);

--
-- Name: num_resol_dtn; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.num_resol_dtn', 101, false);

--
-- Name: num_resol_dtoc; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.num_resol_dtoc', 21, false);

--
-- Name: num_resol_dtor; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.num_resol_dtor', 61, false);

--
-- Name: num_resol_dts; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.num_resol_dts', 61, false);

--
-- Name: num_resol_gral; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.num_resol_gral', 1, false);

--
-- Name: perfiles_codi_perfil_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.perfiles_codi_perfil_seq', 6, false);

--
-- Name: plsql_profiler_runnumeric; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.plsql_profiler_runnumeric', 1, false);

--
-- Name: pres_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.pres_seq', 30392, false);

--
-- Name: roles_cod_rol_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.roles_cod_rol_seq', 6, false);

--
-- Name: sec_bodega_empresas; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sec_bodega_empresas', 1, true);

--
-- Name: sec_central; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sec_central', 1, false);

--
-- Name: sec_ciu_ciudadano; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sec_ciu_ciudadano', 2, true);

--
-- Name: sec_def_contactos; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sec_def_contactos', 1, false);

--
-- Name: sec_dir_direcciones; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sec_dir_direcciones', 127, true);

--
-- Name: sec_edificio; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sec_edificio', 5, true);

--
-- Name: sec_fondo; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sec_fondo', 1, false);

--
-- Name: sec_inv; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sec_inv', 1, false);

--
-- Name: sec_oem_empresas; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sec_oem_empresas', 5, false);

--
-- Name: sec_oem_oempresas; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sec_oem_oempresas', 7, true);

--
-- Name: sec_planilla; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sec_planilla', 12, true);

--
-- Name: sec_planilla_envio; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sec_planilla_envio', 5, true);

--
-- Name: sec_planilla_tx; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sec_planilla_tx', 1, true);

--
-- Name: sec_prestamo; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sec_prestamo', 2, true);

--
-- Name: sec_rol_tipos_doc; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sec_rol_tipos_doc', 9017, true);

--
-- Name: sec_sgd_hfld_histflujodoc; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sec_sgd_hfld_histflujodoc', 1, false);

--
-- Name: secr_subseries_id_tabla; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.secr_subseries_id_tabla', 279, true);

--
-- Name: secr_tp1_; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.secr_tp1_', 1, true);

--
-- Name: secr_tp1_998; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.secr_tp1_998', 31, true);

--
-- Name: secr_tp1_999; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.secr_tp1_999', 1, false);

--
-- Name: secr_tp2_; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.secr_tp2_', 7, true);

--
-- Name: secr_tp2_998; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.secr_tp2_998', 65, true);

--
-- Name: secr_tp2_999; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.secr_tp2_999', 1, false);

--
-- Name: secr_tp3_; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.secr_tp3_', 3, true);

--
-- Name: secr_tp3_998; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.secr_tp3_998', 1, true);

--
-- Name: secr_tp4_; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.secr_tp4_', 1, false);

--
-- Name: secr_tp4_998; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.secr_tp4_998', 10, true);

--
-- Name: secr_tp4_999; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.secr_tp4_999', 1, false);

--
-- Name: seq_parexp_paramexpediente; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.seq_parexp_paramexpediente', 16, true);

--
-- Name: seq_sgd_mrd_codigo; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.seq_sgd_mrd_codigo', 2298, true);

--
-- Name: sgd_anar_secue; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sgd_anar_secue', 1, false);

--
-- Name: sgd_ciu_secue; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sgd_ciu_secue', 1, false);

--
-- Name: sgd_dir_secue; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sgd_dir_secue', 1, false);

--
-- Name: sgd_ejes_tematicos_dependenci_id_sgd_eje_tematico_dependenc_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sgd_ejes_tematicos_dependenci_id_sgd_eje_tematico_dependenc_seq', 343, true);

--
-- Name: sgd_ejes_tematicos_id_sgd_eje_tematico_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sgd_ejes_tematicos_id_sgd_eje_tematico_seq', 284, true);

--
-- Name: sgd_exp_expediente_id_expediente_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sgd_exp_expediente_id_expediente_seq', 40, true);

--
-- Name: sgd_hmtd_secue; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sgd_hmtd_secue', 1, false);

--
-- Name: sgd_info_secue; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sgd_info_secue', 1, false);

--
-- Name: sgd_mat_secue; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sgd_mat_secue', 1, false);

--
-- Name: sgd_oem_secue; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sgd_oem_secue', 18398, false);

--
-- Name: sgd_plg_secue; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sgd_plg_secue', 1, false);

--
-- Name: sgd_tvd_depe_id; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sgd_tvd_depe_id', 0, false);

--
-- Name: sphinx_index_meta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.sphinx_index_meta_id_seq', 11, true);

--
-- Name: tipo_poblacion_pqrs_id_tp_pqrs_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.tipo_poblacion_pqrs_id_tp_pqrs_seq', 6, true);

--
-- Name: tipo_tratamiento_pqrs_id_tipo_t_pqrs_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.tipo_tratamiento_pqrs_id_tipo_t_pqrs_seq', 1, false);

--
-- Name: tipo_usuario_grupo_id_grupo_tipo_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.tipo_usuario_grupo_id_grupo_tipo_usuario_seq', 1, false);

--
-- Name: tipos_comunicaciones_id_tipos_comunicaciones_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.tipos_comunicaciones_id_tipos_comunicaciones_seq', 1, false);

--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.user_id_seq', 9, true);

--
-- Name: usuarios_grupos_informados_id_usuarios_grupos_informados_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.usuarios_grupos_informados_id_usuarios_grupos_informados_seq', 1, false);

--
-- Name: usuarios_grupos_informados_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('public.usuarios_grupos_informados_seq', 45, true);

--
-- Name: sgd_arch_depe ID; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_arch_depe
    ADD CONSTRAINT "ID" PRIMARY KEY (sgd_arch_id);

--
-- Name: sgd_ttr_transaccion PK_SGD_TTR_TRANSACCION; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_ttr_transaccion
    ADD CONSTRAINT "PK_SGD_TTR_TRANSACCION" PRIMARY KEY (sgd_ttr_codigo);

--
-- Name: preguntas Preguntas_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.preguntas
    ADD CONSTRAINT "Preguntas_pkey" PRIMARY KEY (id_preguntas);

--
-- Name: respuestas_usuario Respuestas_Usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.respuestas_usuario
    ADD CONSTRAINT "Respuestas_Usuario_pkey" PRIMARY KEY ("id_Respuestas_Usuario");

--
-- Name: sgd_trad_tiporad SGD_TRAD_TIPORAD_CODIGO_INX; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_trad_tiporad
    ADD CONSTRAINT "SGD_TRAD_TIPORAD_CODIGO_INX" PRIMARY KEY (sgd_trad_codigo);


--
-- Name: bodega_empresas bodega_empresas_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.bodega_empresas
    ADD CONSTRAINT bodega_empresas_pkey PRIMARY KEY (identificador_empresa);

--
-- Name: configuracion_contrasena configuracion_contrasena_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.configuracion_contrasena
    ADD CONSTRAINT configuracion_contrasena_pkey PRIMARY KEY ("idConfiguracionContracsena");

--
-- Name: configuracion_general_fondo configuracion_general_fondo_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.configuracion_general_fondo
    ADD CONSTRAINT configuracion_general_fondo_pkey PRIMARY KEY (id_campo_configuracion_fondo);

--
-- Name: contrasenas_guardadas contrasenas_guardadas_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.contrasenas_guardadas
    ADD CONSTRAINT contrasenas_guardadas_pkey PRIMARY KEY (id_contrasena_guardada);

--
-- Name: datosocr datosocr_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.datosocr
    ADD CONSTRAINT datosocr_pkey PRIMARY KEY (indice);

--
-- Name: departamento departamento_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.departamento
    ADD CONSTRAINT departamento_pkey PRIMARY KEY (dpto_codi, id_pais);

--
-- Name: direccion_usuarios direccion_usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.direccion_usuarios
    ADD CONSTRAINT direccion_usuarios_pkey PRIMARY KEY (id);

--
-- Name: fondo_acumulado_comunicaciones fondo_acumulado_comunicaciones_pk; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.fondo_acumulado_comunicaciones
    ADD CONSTRAINT fondo_acumulado_comunicaciones_pk PRIMARY KEY (id_fondo_acumulado_comunicaciones);

--
-- Name: grupo_interes grupo_interes_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.grupo_interes
    ADD CONSTRAINT grupo_interes_pkey PRIMARY KEY (id_grupo_interes);

--
-- Name: grupos_informados grupos_informados_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.grupos_informados
    ADD CONSTRAINT grupos_informados_pkey PRIMARY KEY (id_grupos_informados);

--
-- Name: carpeta_per id_carpeta_per; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.carpeta_per
    ADD CONSTRAINT id_carpeta_per PRIMARY KEY (id_caperta_per);

--
-- Name: inventario_documental inventario_documental_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.inventario_documental
    ADD CONSTRAINT inventario_documental_pkey PRIMARY KEY (id_inv_documental);

--
-- Name: inventario_documentos inventario_documentos_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.inventario_documentos
    ADD CONSTRAINT inventario_documentos_pkey PRIMARY KEY (id_inv_documento);

--
-- Name: municipio municipio_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.municipio
    ADD CONSTRAINT municipio_pkey PRIMARY KEY (muni_codi, dpto_codi, id_pais);

--
-- Name: perfiles perfiles_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.perfiles
    ADD CONSTRAINT perfiles_pkey PRIMARY KEY (codi_perfil);

--
-- Name: anexos pk_anex_codigo; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.anexos
    ADD CONSTRAINT pk_anex_codigo PRIMARY KEY (anex_codigo);

--
-- Name: dependencia pk_depe_codi; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.dependencia
    ADD CONSTRAINT pk_depe_codi PRIMARY KEY (depe_codi);

--
-- Name: sgd_dt_radicado pk_dt_radicado; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_dt_radicado
    ADD CONSTRAINT pk_dt_radicado PRIMARY KEY (radi_nume_radi);

--
-- Name: sgd_parexp_paramexpediente pk_parexp_codigo; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_parexp_paramexpediente
    ADD CONSTRAINT pk_parexp_codigo UNIQUE (sgd_parexp_codigo);

--
-- Name: radicado pk_radicados; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.radicado
    ADD CONSTRAINT pk_radicados PRIMARY KEY (radi_nume_radi);

--
-- Name: sgd_dir_drecciones pk_sgd_dir_codigo; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_dir_drecciones
    ADD CONSTRAINT pk_sgd_dir_codigo PRIMARY KEY (sgd_dir_codigo);

--
-- Name: sgd_sexp_secexpedientes pk_sgd_sexp_secuencia; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_sexp_secexpedientes
    ADD CONSTRAINT pk_sgd_sexp_secuencia PRIMARY KEY (sgd_sexp_secuencia);

--
-- Name: usuario pk_usua_depe; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT pk_usua_depe PRIMARY KEY (usua_codi, depe_codi);

--
-- Name: pre_radicado pre_radicado_radi_nume_radi_key; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.pre_radicado
    ADD CONSTRAINT pre_radicado_radi_nume_radi_key UNIQUE (radi_nume_radi);

--
-- Name: sgd_dt_radicado radi_nume_radi; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_dt_radicado
    ADD CONSTRAINT radi_nume_radi UNIQUE (radi_nume_radi);

--
-- Name: rango_edades_pqrs rango_edades_pqrs_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.rango_edades_pqrs
    ADD CONSTRAINT rango_edades_pqrs_pkey PRIMARY KEY (id_rango_edades_pqrs);

--
-- Name: rol_tipos_doc rol_tipos_doc_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.rol_tipos_doc
    ADD CONSTRAINT rol_tipos_doc_pkey PRIMARY KEY (cod_rol_tipos);

--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (cod_rol);

--
-- Name: sgd_sed_sede sede_codi; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_sed_sede
    ADD CONSTRAINT sede_codi UNIQUE (sgd_sed_codi);

--
-- Name: servicios_pqrs servicios_pqrs_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.servicios_pqrs
    ADD CONSTRAINT servicios_pqrs_pkey PRIMARY KEY (id_servicio_pqrs);

--
-- Name: sgd_archivo_central sgd_archivo_central2_pk; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_archivo_central
    ADD CONSTRAINT sgd_archivo_central2_pk PRIMARY KEY (sgd_archivo_id);

--
-- Name: sgd_ciu_ciudadano sgd_ciu_ciudadano_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_ciu_ciudadano
    ADD CONSTRAINT sgd_ciu_ciudadano_pkey PRIMARY KEY (sgd_ciu_codigo, id_users_pqrs);

--
-- Name: sgd_def_paises sgd_def_paises_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_def_paises
    ADD CONSTRAINT sgd_def_paises_pkey PRIMARY KEY (id_pais, id_cont);

--
-- Name: sgd_ejes_tematicos_dependencia sgd_ejes_tematicos_dependencia_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_ejes_tematicos_dependencia
    ADD CONSTRAINT sgd_ejes_tematicos_dependencia_pkey PRIMARY KEY (id_sgd_eje_tematico_dependencia);

--
-- Name: sgd_ejes_tematicos sgd_ejes_tematicos_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_ejes_tematicos
    ADD CONSTRAINT sgd_ejes_tematicos_pkey PRIMARY KEY (id_sgd_eje_tematico);

--
-- Name: sgd_fenv_frmenvio sgd_fenv_frmenvio_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_fenv_frmenvio
    ADD CONSTRAINT sgd_fenv_frmenvio_pkey PRIMARY KEY (sgd_fenv_codigo);

--
-- Name: sgd_tpr_tpdcumento sgd_tpr_codigo; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_tpr_tpdcumento
    ADD CONSTRAINT sgd_tpr_codigo UNIQUE (sgd_tpr_codigo);

--
-- Name: sgd_transfe_documentales sgd_transfe_documentales_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_transfe_documentales
    ADD CONSTRAINT sgd_transfe_documentales_pkey PRIMARY KEY (id_trans);

--
-- Name: sphinx_index_remove sphinx_index_meta_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sphinx_index_remove
    ADD CONSTRAINT sphinx_index_meta_pkey PRIMARY KEY (id);

--
-- Name: sgd_sbrd_subserierd srd_sbrd_codigo; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_sbrd_subserierd
    ADD CONSTRAINT srd_sbrd_codigo UNIQUE (sgd_srd_codigo, sgd_sbrd_codigo);

--
-- Name: tipo_poblacion_pqrs tipo_poblacion_pqrs_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.tipo_poblacion_pqrs
    ADD CONSTRAINT tipo_poblacion_pqrs_pkey PRIMARY KEY (id_tp_pqrs);

--
-- Name: tipo_usuario_grupo tipo_usuario_grupo_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.tipo_usuario_grupo
    ADD CONSTRAINT tipo_usuario_grupo_pkey PRIMARY KEY (id_grupo_tipo_usuario);

--
-- Name: tipos_comunicaciones tipos_comunicaciones_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.tipos_comunicaciones
    ADD CONSTRAINT tipos_comunicaciones_pkey PRIMARY KEY (id_tipos_comunicaciones);

--
-- Name: sgd_mrd_matrird trd_dependencia; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_mrd_matrird
    ADD CONSTRAINT trd_dependencia UNIQUE (depe_codi, sgd_srd_codigo, sgd_sbrd_codigo, sgd_tpr_codigo);


--
-- Name: carpeta_per unique_carpeta; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.carpeta_per
    ADD CONSTRAINT unique_carpeta UNIQUE (usua_codi, depe_codi, codi_carp);


--
-- Name: usuario unique_depe_usua; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT unique_depe_usua UNIQUE (usua_codi, depe_codi);


--
-- Name: sgd_exp_expediente unique_expediente_radicado; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_exp_expediente
    ADD CONSTRAINT unique_expediente_radicado UNIQUE (sgd_exp_numero, radi_nume_radi);


--
-- Name: sgd_parexp_paramexpediente unique_parexp; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_parexp_paramexpediente
    ADD CONSTRAINT unique_parexp UNIQUE (sgd_parexp_codigo, depe_codi);


--
-- Name: sgd_dir_drecciones unique_radicado; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_dir_drecciones
    ADD CONSTRAINT unique_radicado UNIQUE (radi_nume_radi);


--
-- Name: sgd_sexp_secexpedientes unique_secexpediente; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_sexp_secexpedientes
    ADD CONSTRAINT unique_secexpediente UNIQUE (sgd_exp_numero, sgd_sexp_parexp1);


--
-- Name: user user_password_reset_token_key; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_password_reset_token_key UNIQUE (password_reset_token);


--
-- Name: user user_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- Name: user user_username_key; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_username_key UNIQUE (username);


--
-- Name: usuario usua_login; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usua_login UNIQUE (usua_login);


--
-- Name: usuarios_grupos_informados usuarios_grupos_informados_pkey; Type: CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.usuarios_grupos_informados
    ADD CONSTRAINT usuarios_grupos_informados_pkey PRIMARY KEY (id_usuarios_grupos_informados);


--
-- Name: fondo_acumulado_comunicaciones_index; Type: INDEX; Schema: public; Owner: orfeo62usr
--

CREATE UNIQUE INDEX fondo_acumulado_comunicaciones_index ON public.fondo_acumulado_comunicaciones USING btree (campo3, campo12);


--
-- Name: id_tabla; Type: INDEX; Schema: public; Owner: orfeo62usr
--

CREATE UNIQUE INDEX id_tabla ON public.sgd_sbrd_subserierd USING btree (id_tabla);


--
-- Name: sgd_ciu_ciudadano sgd_ciu_edad; Type: FK CONSTRAINT; Schema: public; Owner: orfeo62usr
--

ALTER TABLE ONLY public.sgd_ciu_ciudadano
    ADD CONSTRAINT sgd_ciu_edad FOREIGN KEY (sgd_ciu_edad) REFERENCES public.rango_edades_pqrs(id_rango_edades_pqrs);


--
-- Name: FUNCTION concat(text, text); Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON FUNCTION public.concat(text, text) TO postgres;


--
-- Name: TABLE usuario; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.usuario TO postgres;
GRANT ALL ON TABLE public.usuario TO PUBLIC;


--
-- Name: TABLE anexos; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.anexos TO postgres;
GRANT ALL ON TABLE public.anexos TO PUBLIC;


--
-- Name: TABLE anexos_historico; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.anexos_historico TO postgres;
GRANT ALL ON TABLE public.anexos_historico TO PUBLIC;


--
-- Name: TABLE anexos_tipo; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.anexos_tipo TO postgres;
GRANT ALL ON TABLE public.anexos_tipo TO PUBLIC;


--
-- Name: TABLE bodega_empresas; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.bodega_empresas TO postgres;
GRANT ALL ON TABLE public.bodega_empresas TO PUBLIC;


--
-- Name: TABLE borrar_carpeta_personalizada; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.borrar_carpeta_personalizada TO postgres;
GRANT ALL ON TABLE public.borrar_carpeta_personalizada TO PUBLIC;


--
-- Name: TABLE borrar_empresa_esp; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.borrar_empresa_esp TO postgres;
GRANT ALL ON TABLE public.borrar_empresa_esp TO PUBLIC;


--
-- Name: TABLE carpeta; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.carpeta TO postgres;
GRANT ALL ON TABLE public.carpeta TO PUBLIC;


--
-- Name: TABLE carpeta_per; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.carpeta_per TO postgres;
GRANT ALL ON TABLE public.carpeta_per TO PUBLIC;


--
-- Name: TABLE centro_poblado; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.centro_poblado TO postgres;
GRANT ALL ON TABLE public.centro_poblado TO PUBLIC;


--
-- Name: TABLE departamento; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.departamento TO postgres;
GRANT ALL ON TABLE public.departamento TO PUBLIC;


--
-- Name: TABLE dependencia; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.dependencia TO postgres;
GRANT ALL ON TABLE public.dependencia TO PUBLIC;


--
-- Name: TABLE dependencia_visibilidad; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.dependencia_visibilidad TO postgres;
GRANT ALL ON TABLE public.dependencia_visibilidad TO PUBLIC;


--
-- Name: TABLE estado; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.estado TO postgres;
GRANT ALL ON TABLE public.estado TO PUBLIC;


--
-- Name: TABLE fun_funcionario; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.fun_funcionario TO postgres;


--
-- Name: TABLE hist_eventos; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.hist_eventos TO postgres;
GRANT ALL ON TABLE public.hist_eventos TO PUBLIC;


--
-- Name: TABLE informados; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.informados TO postgres;
GRANT ALL ON TABLE public.informados TO PUBLIC;


--
-- Name: TABLE medio_recepcion; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.medio_recepcion TO postgres;
GRANT ALL ON TABLE public.medio_recepcion TO PUBLIC;


--
-- Name: TABLE municipio; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.municipio TO postgres;
GRANT ALL ON TABLE public.municipio TO PUBLIC;


--
-- Name: TABLE par_serv_servicios; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.par_serv_servicios TO postgres;
GRANT ALL ON TABLE public.par_serv_servicios TO PUBLIC;


--
-- Name: TABLE pl_generado_plg; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.pl_generado_plg TO postgres;
GRANT ALL ON TABLE public.pl_generado_plg TO PUBLIC;


--
-- Name: TABLE pl_tipo_plt; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.pl_tipo_plt TO postgres;
GRANT ALL ON TABLE public.pl_tipo_plt TO PUBLIC;


--
-- Name: TABLE plan_table; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.plan_table TO postgres;
GRANT ALL ON TABLE public.plan_table TO PUBLIC;


--
-- Name: TABLE plantilla_pl; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.plantilla_pl TO postgres;
GRANT ALL ON TABLE public.plantilla_pl TO PUBLIC;


--
-- Name: TABLE prestamo; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.prestamo TO postgres;
GRANT ALL ON TABLE public.prestamo TO PUBLIC;


--
-- Name: TABLE radicado; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.radicado TO postgres;
GRANT ALL ON TABLE public.radicado TO PUBLIC;


--
-- Name: TABLE sgd_agen_agendados; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_agen_agendados TO postgres;
GRANT ALL ON TABLE public.sgd_agen_agendados TO PUBLIC;


--
-- Name: TABLE sgd_anar_anexarg; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_anar_anexarg TO postgres;
GRANT ALL ON TABLE public.sgd_anar_anexarg TO PUBLIC;


--
-- Name: TABLE sgd_anu_anulados; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_anu_anulados TO postgres;
GRANT ALL ON TABLE public.sgd_anu_anulados TO PUBLIC;


--
-- Name: TABLE sgd_aper_adminperfiles; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_aper_adminperfiles TO postgres;
GRANT ALL ON TABLE public.sgd_aper_adminperfiles TO PUBLIC;


--
-- Name: TABLE sgd_apli_aplintegra; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_apli_aplintegra TO postgres;
GRANT ALL ON TABLE public.sgd_apli_aplintegra TO PUBLIC;


--
-- Name: TABLE sgd_aplmen_aplimens; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_aplmen_aplimens TO postgres;
GRANT ALL ON TABLE public.sgd_aplmen_aplimens TO PUBLIC;


--
-- Name: TABLE sgd_aplus_plicusua; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_aplus_plicusua TO postgres;
GRANT ALL ON TABLE public.sgd_aplus_plicusua TO PUBLIC;


--
-- Name: TABLE sgd_archivo_central; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_archivo_central TO postgres;
GRANT ALL ON TABLE public.sgd_archivo_central TO PUBLIC;


--
-- Name: TABLE sgd_archivo_hist; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_archivo_hist TO postgres;
GRANT ALL ON TABLE public.sgd_archivo_hist TO PUBLIC;


--
-- Name: TABLE sgd_argd_argdoc; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_argd_argdoc TO postgres;
GRANT ALL ON TABLE public.sgd_argd_argdoc TO PUBLIC;


--
-- Name: TABLE sgd_argup_argudoctop; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_argup_argudoctop TO postgres;
GRANT ALL ON TABLE public.sgd_argup_argudoctop TO PUBLIC;


--
-- Name: TABLE sgd_camexp_campoexpediente; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_camexp_campoexpediente TO postgres;
GRANT ALL ON TABLE public.sgd_camexp_campoexpediente TO PUBLIC;


--
-- Name: TABLE sgd_carp_descripcion; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_carp_descripcion TO postgres;
GRANT ALL ON TABLE public.sgd_carp_descripcion TO PUBLIC;


--
-- Name: TABLE sgd_cau_causal; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_cau_causal TO postgres;
GRANT ALL ON TABLE public.sgd_cau_causal TO PUBLIC;


--
-- Name: TABLE sgd_caux_causales; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_caux_causales TO postgres;
GRANT ALL ON TABLE public.sgd_caux_causales TO PUBLIC;


--
-- Name: TABLE sgd_clta_clstarif; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_clta_clstarif TO postgres;
GRANT ALL ON TABLE public.sgd_clta_clstarif TO PUBLIC;


--
-- Name: TABLE sgd_cob_campobliga; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_cob_campobliga TO postgres;
GRANT ALL ON TABLE public.sgd_cob_campobliga TO PUBLIC;


--
-- Name: TABLE sgd_dcau_causal; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_dcau_causal TO postgres;
GRANT ALL ON TABLE public.sgd_dcau_causal TO PUBLIC;


--
-- Name: TABLE sgd_ddca_ddsgrgdo; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_ddca_ddsgrgdo TO postgres;
GRANT ALL ON TABLE public.sgd_ddca_ddsgrgdo TO PUBLIC;


--
-- Name: TABLE sgd_def_contactos; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_def_contactos TO postgres;
GRANT ALL ON TABLE public.sgd_def_contactos TO PUBLIC;


--
-- Name: TABLE sgd_def_continentes; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_def_continentes TO postgres;
GRANT ALL ON TABLE public.sgd_def_continentes TO PUBLIC;


--
-- Name: TABLE sgd_def_paises; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_def_paises TO postgres;
GRANT ALL ON TABLE public.sgd_def_paises TO PUBLIC;


--
-- Name: TABLE sgd_deve_dev_envio; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_deve_dev_envio TO postgres;
GRANT ALL ON TABLE public.sgd_deve_dev_envio TO PUBLIC;


--
-- Name: TABLE sgd_dir_drecciones; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_dir_drecciones TO postgres;
GRANT ALL ON TABLE public.sgd_dir_drecciones TO PUBLIC;


--
-- Name: TABLE sgd_dnufe_docnufe; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_dnufe_docnufe TO postgres;
GRANT ALL ON TABLE public.sgd_dnufe_docnufe TO PUBLIC;


--
-- Name: TABLE sgd_eanu_estanulacion; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_eanu_estanulacion TO postgres;
GRANT ALL ON TABLE public.sgd_eanu_estanulacion TO PUBLIC;


--
-- Name: TABLE sgd_einv_inventario; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_einv_inventario TO postgres;
GRANT ALL ON TABLE public.sgd_einv_inventario TO PUBLIC;


--
-- Name: TABLE sgd_eit_items; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_eit_items TO postgres;
GRANT ALL ON TABLE public.sgd_eit_items TO PUBLIC;


--
-- Name: TABLE sgd_ent_entidades; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_ent_entidades TO postgres;
GRANT ALL ON TABLE public.sgd_ent_entidades TO PUBLIC;


--
-- Name: TABLE sgd_enve_envioespecial; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_enve_envioespecial TO postgres;
GRANT ALL ON TABLE public.sgd_enve_envioespecial TO PUBLIC;


--
-- Name: TABLE sgd_estc_estconsolid; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_estc_estconsolid TO postgres;
GRANT ALL ON TABLE public.sgd_estc_estconsolid TO PUBLIC;


--
-- Name: TABLE sgd_estinst_estadoinstancia; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_estinst_estadoinstancia TO postgres;
GRANT ALL ON TABLE public.sgd_estinst_estadoinstancia TO PUBLIC;


--
-- Name: TABLE sgd_exp_expediente; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_exp_expediente TO postgres;
GRANT ALL ON TABLE public.sgd_exp_expediente TO PUBLIC;


--
-- Name: TABLE sgd_fars_faristas; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_fars_faristas TO postgres;
GRANT ALL ON TABLE public.sgd_fars_faristas TO PUBLIC;


--
-- Name: TABLE sgd_fenv_frmenvio; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_fenv_frmenvio TO postgres;
GRANT ALL ON TABLE public.sgd_fenv_frmenvio TO PUBLIC;


--
-- Name: TABLE sgd_fexp_flujoexpedientes; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_fexp_flujoexpedientes TO postgres;
GRANT ALL ON TABLE public.sgd_fexp_flujoexpedientes TO PUBLIC;


--
-- Name: TABLE sgd_firrad_firmarads; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_firrad_firmarads TO postgres;
GRANT ALL ON TABLE public.sgd_firrad_firmarads TO PUBLIC;


--
-- Name: TABLE sgd_fld_flujodoc; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_fld_flujodoc TO postgres;
GRANT ALL ON TABLE public.sgd_fld_flujodoc TO PUBLIC;


--
-- Name: TABLE sgd_fun_funciones; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_fun_funciones TO postgres;
GRANT ALL ON TABLE public.sgd_fun_funciones TO PUBLIC;


--
-- Name: TABLE sgd_hfld_histflujodoc; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_hfld_histflujodoc TO postgres;
GRANT ALL ON TABLE public.sgd_hfld_histflujodoc TO PUBLIC;


--
-- Name: TABLE sgd_hmtd_hismatdoc; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_hmtd_hismatdoc TO postgres;
GRANT ALL ON TABLE public.sgd_hmtd_hismatdoc TO PUBLIC;


--
-- Name: TABLE sgd_instorf_instanciasorfeo; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_instorf_instanciasorfeo TO postgres;
GRANT ALL ON TABLE public.sgd_instorf_instanciasorfeo TO PUBLIC;


--
-- Name: TABLE sgd_lip_linkip; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_lip_linkip TO postgres;
GRANT ALL ON TABLE public.sgd_lip_linkip TO PUBLIC;


--
-- Name: TABLE sgd_mat_matriz; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_mat_matriz TO postgres;
GRANT ALL ON TABLE public.sgd_mat_matriz TO PUBLIC;


--
-- Name: TABLE sgd_mpes_mddpeso; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_mpes_mddpeso TO postgres;
GRANT ALL ON TABLE public.sgd_mpes_mddpeso TO PUBLIC;


--
-- Name: TABLE sgd_mrd_matrird; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_mrd_matrird TO postgres;
GRANT ALL ON TABLE public.sgd_mrd_matrird TO PUBLIC;


--
-- Name: TABLE sgd_msdep_msgdep; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_msdep_msgdep TO postgres;
GRANT ALL ON TABLE public.sgd_msdep_msgdep TO PUBLIC;


--
-- Name: TABLE sgd_msg_mensaje; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_msg_mensaje TO postgres;
GRANT ALL ON TABLE public.sgd_msg_mensaje TO PUBLIC;


--
-- Name: TABLE sgd_mtd_matriz_doc; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_mtd_matriz_doc TO postgres;
GRANT ALL ON TABLE public.sgd_mtd_matriz_doc TO PUBLIC;


--
-- Name: TABLE sgd_noh_nohabiles; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_noh_nohabiles TO postgres;
GRANT ALL ON TABLE public.sgd_noh_nohabiles TO PUBLIC;


--
-- Name: TABLE sgd_not_notificacion; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_not_notificacion TO postgres;
GRANT ALL ON TABLE public.sgd_not_notificacion TO PUBLIC;


--
-- Name: TABLE sgd_ntrd_notifrad; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_ntrd_notifrad TO postgres;
GRANT ALL ON TABLE public.sgd_ntrd_notifrad TO PUBLIC;


--
-- Name: TABLE sgd_oem_oempresas; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_oem_oempresas TO postgres;
GRANT ALL ON TABLE public.sgd_oem_oempresas TO PUBLIC;


--
-- Name: TABLE sgd_panu_peranulados; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_panu_peranulados TO postgres;
GRANT ALL ON TABLE public.sgd_panu_peranulados TO PUBLIC;


--
-- Name: TABLE sgd_parametro; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_parametro TO postgres;
GRANT ALL ON TABLE public.sgd_parametro TO PUBLIC;


--
-- Name: TABLE sgd_parexp_paramexpediente; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_parexp_paramexpediente TO postgres;
GRANT ALL ON TABLE public.sgd_parexp_paramexpediente TO PUBLIC;


--
-- Name: TABLE sgd_pexp_procexpedientes; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_pexp_procexpedientes TO postgres;
GRANT ALL ON TABLE public.sgd_pexp_procexpedientes TO PUBLIC;


--
-- Name: TABLE sgd_pnufe_procnumfe; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_pnufe_procnumfe TO postgres;
GRANT ALL ON TABLE public.sgd_pnufe_procnumfe TO PUBLIC;


--
-- Name: TABLE sgd_pnun_procenum; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_pnun_procenum TO postgres;
GRANT ALL ON TABLE public.sgd_pnun_procenum TO PUBLIC;


--
-- Name: TABLE sgd_prc_proceso; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_prc_proceso TO postgres;
GRANT ALL ON TABLE public.sgd_prc_proceso TO PUBLIC;


--
-- Name: TABLE sgd_prd_prcdmentos; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_prd_prcdmentos TO postgres;
GRANT ALL ON TABLE public.sgd_prd_prcdmentos TO PUBLIC;


--
-- Name: TABLE sgd_rda_retdoca; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_rda_retdoca TO postgres;
GRANT ALL ON TABLE public.sgd_rda_retdoca TO PUBLIC;


--
-- Name: TABLE sgd_rdf_retdocf; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_rdf_retdocf TO postgres;
GRANT ALL ON TABLE public.sgd_rdf_retdocf TO PUBLIC;


--
-- Name: TABLE sgd_renv_regenvio; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_renv_regenvio TO postgres;
GRANT ALL ON TABLE public.sgd_renv_regenvio TO PUBLIC;


--
-- Name: TABLE sgd_rmr_radmasivre; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_rmr_radmasivre TO postgres;
GRANT ALL ON TABLE public.sgd_rmr_radmasivre TO PUBLIC;


--
-- Name: TABLE sgd_sbrd_subserierd; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_sbrd_subserierd TO postgres;
GRANT ALL ON TABLE public.sgd_sbrd_subserierd TO PUBLIC;


--
-- Name: TABLE sgd_sed_sede; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_sed_sede TO postgres;
GRANT ALL ON TABLE public.sgd_sed_sede TO PUBLIC;


--
-- Name: TABLE sgd_senuf_secnumfe; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_senuf_secnumfe TO postgres;
GRANT ALL ON TABLE public.sgd_senuf_secnumfe TO PUBLIC;


--
-- Name: TABLE sgd_sexp_secexpedientes; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_sexp_secexpedientes TO postgres;
GRANT ALL ON TABLE public.sgd_sexp_secexpedientes TO PUBLIC;


--
-- Name: TABLE sgd_srd_seriesrd; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_srd_seriesrd TO postgres;
GRANT ALL ON TABLE public.sgd_srd_seriesrd TO PUBLIC;


--
-- Name: TABLE sgd_tar_tarifas; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_tar_tarifas TO postgres;
GRANT ALL ON TABLE public.sgd_tar_tarifas TO PUBLIC;


--
-- Name: TABLE sgd_tdec_tipodecision; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_tdec_tipodecision TO postgres;
GRANT ALL ON TABLE public.sgd_tdec_tipodecision TO PUBLIC;


--
-- Name: TABLE sgd_tid_tipdecision; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_tid_tipdecision TO postgres;
GRANT ALL ON TABLE public.sgd_tid_tipdecision TO PUBLIC;


--
-- Name: TABLE sgd_tidm_tidocmasiva; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_tidm_tidocmasiva TO postgres;
GRANT ALL ON TABLE public.sgd_tidm_tidocmasiva TO PUBLIC;


--
-- Name: TABLE sgd_tip3_tipotercero; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_tip3_tipotercero TO postgres;
GRANT ALL ON TABLE public.sgd_tip3_tipotercero TO PUBLIC;


--
-- Name: TABLE sgd_tma_temas; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_tma_temas TO postgres;
GRANT ALL ON TABLE public.sgd_tma_temas TO PUBLIC;


--
-- Name: TABLE sgd_tme_tipmen; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_tme_tipmen TO postgres;
GRANT ALL ON TABLE public.sgd_tme_tipmen TO PUBLIC;


--
-- Name: TABLE sgd_tpr_tpdcumento; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_tpr_tpdcumento TO postgres;
GRANT ALL ON TABLE public.sgd_tpr_tpdcumento TO PUBLIC;


--
-- Name: TABLE sgd_trad_tiporad; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_trad_tiporad TO postgres;
GRANT ALL ON TABLE public.sgd_trad_tiporad TO PUBLIC;


--
-- Name: TABLE sgd_ttr_transaccion; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_ttr_transaccion TO postgres;
GRANT ALL ON TABLE public.sgd_ttr_transaccion TO PUBLIC;


--
-- Name: TABLE sgd_ush_usuhistorico; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_ush_usuhistorico TO postgres;
GRANT ALL ON TABLE public.sgd_ush_usuhistorico TO PUBLIC;


--
-- Name: TABLE sgd_usm_usumodifica; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.sgd_usm_usumodifica TO postgres;
GRANT ALL ON TABLE public.sgd_usm_usumodifica TO PUBLIC;


--
-- Name: TABLE tipo_doc_identificacion; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.tipo_doc_identificacion TO postgres;
GRANT ALL ON TABLE public.tipo_doc_identificacion TO PUBLIC;


--
-- Name: TABLE tipo_remitente; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.tipo_remitente TO postgres;
GRANT ALL ON TABLE public.tipo_remitente TO PUBLIC;


--
-- Name: TABLE ubicacion_fisica; Type: ACL; Schema: public; Owner: orfeo62usr
--

GRANT ALL ON TABLE public.ubicacion_fisica TO postgres;
GRANT ALL ON TABLE public.ubicacion_fisica TO PUBLIC;


--
-- PostgreSQL database dump complete
--

