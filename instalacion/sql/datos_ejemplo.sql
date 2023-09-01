--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

--
-- Name: Preguntas_id_preguntas_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('"Preguntas_id_preguntas_seq"', 1, false);


--
-- Name: Respuestas_Usuario_id_Respuestas_Usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('"Respuestas_Usuario_id_Respuestas_Usuario_seq"', 1, false);


--
-- Data for Name: anexos; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO anexos VALUES ('20219980000062', '2021998000006200001', 7, 24.338, 'S', 'ADMON', 'Respuesta a comunicación 20219980000062 de fecha 2021-03-31.', 1, '120219980000062_00001.pdf', 'N', 0, NULL, 1, '20219980000141', '2021-03-31 12:14:56.631012-05', 3, NULL, 1, '2021-03-31 12:14:56.631012-05', 1, NULL, '998', NULL, NULL, NULL, 145, NULL, NULL, '2021-03-31 12:14:56.631012', '2021-03-31 12:14:15.167631-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, 0, '120219980000062_00001.docx', false, NULL, 1);
INSERT INTO anexos VALUES ('20219980000092', '2021998000009200001', 7, 24.338, 'S', 'ADMON', 'Respuesta a comunicación 20219980000092 de fecha 2021-04-08.', 1, '120219980000092_00001.pdf', 'N', 0, NULL, 1, '20219980000161', '2021-04-13 16:22:06.77482-05', 4, NULL, 1, '2021-04-13 16:22:06.77482-05', 1, NULL, '998', NULL, NULL, NULL, 2, NULL, NULL, '2021-04-13 16:22:06.77482', '2021-04-13 16:17:03.939116-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '', NULL, '11', '2', NULL, NULL, NULL, NULL, 0, '120219980000092_00001.docx', false, NULL, 1);
INSERT INTO anexos VALUES ('20219980000012', '2021998000001200003', 7, 24.302, 'S', 'ADMON', 'Respuesta a comunicación 20219980000012 de fecha 2021-02-23.', 3, '120219980000012_00003.pdf', 'N', 0, NULL, 1, '20219980000071', '2021-02-23 18:00:54.214015-05', 4, NULL, 1, '2021-02-23 18:01:08.526438-05', 1, NULL, '998', NULL, NULL, NULL, 455, NULL, NULL, '2021-02-23 18:00:54.214015', '2021-02-23 18:00:50.509455-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '20219981110000002E', NULL, '11', '1', NULL, NULL, NULL, NULL, 0, '120219980000012_00003.docx', false, NULL, 1);
INSERT INTO anexos VALUES ('20219980000032', '2021998000003200001', 7, 15.168, '1', 'ADMON', 'Prueba de entrega 20219980000032', 1, '120219980000032_00001.pdf', 'N', 0, NULL, 0, '0', NULL, 0, NULL, 7, NULL, 7, NULL, '998', NULL, NULL, NULL, 423, NULL, NULL, NULL, '2021-02-24 16:18:44.890832-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, 0, NULL, false, NULL, 0);
INSERT INTO anexos VALUES ('20219980000042', '2021998000004200001', 7, 15.142, '1', 'ADMON', 'Prueba de entreaga de la documentación', 1, '120219980000042_00001.pdf', 'N', 0, NULL, 0, '0', NULL, 0, NULL, 7, NULL, 7, NULL, '998', NULL, NULL, NULL, 455, NULL, NULL, NULL, '2021-03-01 09:08:34.586809-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, 0, NULL, false, NULL, 0);
INSERT INTO anexos VALUES ('20219980000042', '2021998000004200002', 7, 41.751, 'N', 'RECEPCION.INVM', 'Documento de respuesta dada', 2, '120219980000042_00002.pdf', 'N', 0, NULL, 0, NULL, NULL, 0, NULL, 1, NULL, 1, NULL, '100', NULL, NULL, NULL, 455, NULL, NULL, NULL, '2021-03-01 09:12:59.411402-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, 0, NULL, false, NULL, 0);
INSERT INTO anexos VALUES ('20219980000042', '2021998000004200003', 7, 15.142, '1', 'ADMON', 'Prueba entrega externa al cliente', 3, '120219980000042_00003.pdf', 'N', 0, NULL, 0, '0', NULL, 0, NULL, 7, NULL, 7, NULL, '998', NULL, NULL, NULL, 490, NULL, NULL, NULL, '2021-03-01 09:18:47.419861-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, 0, NULL, false, NULL, 0);
INSERT INTO anexos VALUES ('20219980000052', '2021998000005200003', 7, 24.338, 'S', 'ADMON', 'Respuesta a comunicación 20219980000052 de fecha 2021-03-31.', 3, '120219980000052_00003.pdf', 'N', 0, NULL, 1, '20219980000121', '2021-03-31 10:48:36.719563-05', 3, NULL, 1, '2021-03-31 10:48:36.719563-05', 1, NULL, '998', NULL, NULL, NULL, 145, NULL, NULL, '2021-03-31 10:48:36.719563', '2021-03-31 10:48:32.526629-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '20219981120000003E', NULL, '11', '2', NULL, NULL, NULL, NULL, 1, '120219980000052_00003.docx', false, NULL, 1);
INSERT INTO anexos VALUES ('20219980000021', '2021998000002100002', 7, 24.302, 'S', 'ADMON', 'Respuesta', 2, '120219980000021_00002.pdf', 'N', 0, NULL, 1, '20219980000031', '2021-02-23 14:58:30.530382-05', 4, NULL, 1, '2021-02-23 14:58:30.530382-05', 1, NULL, '998', NULL, NULL, NULL, 455, NULL, NULL, '2021-02-23 14:58:30.530382', '2021-02-23 14:58:03.985288-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '', NULL, '11', '1', NULL, NULL, NULL, NULL, 1, '120219980000021_00002.docx', true, NULL, 1);
INSERT INTO anexos VALUES ('20219980000021', '2021998000002100001', 7, 24.302, 'S', 'ADMON', 'Respuesta', 1, '120219980000021_00001.pdf', 'N', 0, NULL, 1, '20219980000021', '2021-02-23 14:59:13.35083-05', 4, NULL, 1, '2021-02-23 16:39:26.218571-05', 1, NULL, '998', NULL, NULL, NULL, 455, NULL, NULL, '2021-02-23 14:59:13.35083', '2021-02-23 14:49:17.947172-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '', NULL, '11', '1', NULL, NULL, NULL, NULL, 1, '120219980000021_00001.docx', true, NULL, 1);
INSERT INTO anexos VALUES ('20219980000022', '2021998000002200001', 7, 41.476, '1', 'ADMON', '20219980000022', 1, '120219980000022_00001.pdf', 'N', 0, NULL, 0, '0', NULL, 0, NULL, 7, NULL, 7, NULL, '998', NULL, NULL, NULL, 459, NULL, NULL, NULL, '2021-02-23 17:40:19.001506-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '11', '1', NULL, NULL, NULL, NULL, 0, NULL, true, NULL, 0);
INSERT INTO anexos VALUES ('20219980000041', '2021998000004100001', 7, 24.302, 'S', 'ADMON', 'Respuesta cargada', 1, '120219980000041_00001.pdf', 'N', 0, NULL, 1, '20219980000041', '2021-02-23 16:43:11.283435-05', 4, NULL, 1, '2021-02-23 16:43:11.283435-05', 1, NULL, '998', NULL, NULL, NULL, 455, NULL, NULL, '2021-02-23 16:43:11.283435', '2021-02-23 16:43:06.846806-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '', NULL, '11', '1', NULL, NULL, NULL, NULL, 1, '120219980000041_00001.docx', true, NULL, 1);
INSERT INTO anexos VALUES ('20219980000041', '2021998000004100002', 7, 181.781, 'N', 'ADMON', 'Soporte', 2, '120219980000041_00002.pdf', 'N', 0, NULL, 0, NULL, NULL, 0, NULL, 1, NULL, 1, NULL, '998', NULL, NULL, NULL, 489, NULL, NULL, NULL, '2021-02-23 16:44:00.953908-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '11', '1', NULL, NULL, NULL, NULL, 0, NULL, true, NULL, 0);
INSERT INTO anexos VALUES ('20219980000012', '2021998000001200001', 7, 2.464, '1', 'ADMON', 'anexo', 1, '120219980000012_00001.pdf', 'N', 0, NULL, 0, '0', NULL, 0, NULL, 7, NULL, 7, NULL, '998', NULL, NULL, NULL, 489, NULL, NULL, NULL, '2021-02-23 16:48:09.716173-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '11', '1', NULL, NULL, NULL, NULL, 0, NULL, false, NULL, 0);
INSERT INTO anexos VALUES ('20219980000072', '2021998000007200002', 7, 35.238, 'S', 'ADMON', 'anexo 1', 2, '120219980000072_00002.pdf', 'N', 0, NULL, 0, NULL, NULL, 0, NULL, 1, NULL, 1, NULL, '998', NULL, NULL, NULL, 2, NULL, NULL, NULL, '2021-04-13 16:32:11.072499-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, 0, NULL, false, NULL, 0);
INSERT INTO anexos VALUES ('20219980000012', '2021998000001200002', 7, 24.302, 'S', 'ADMON', 'Respuesta a comunicación 20219980000012 de fecha 2021-02-23.', 2, '120219980000012_00002.pdf', 'N', 0, NULL, 1, '20219980000051', '2021-02-23 16:48:58.409761-05', 4, NULL, 1, '2021-02-23 16:54:40.944345-05', 1, NULL, '998', NULL, NULL, NULL, 455, NULL, NULL, '2021-02-23 16:48:58.409761', '2021-02-23 16:48:49.510107-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '', NULL, '11', '1', NULL, NULL, NULL, NULL, 0, '120219980000012_00002.docx', false, NULL, 1);
INSERT INTO anexos VALUES ('20219980000022', '2021998000002200002', 7, 24.302, 'S', 'ADMON', 'Respuesta a comunicación 20219980000022 de fecha 2021-02-23.', 2, '120219980000022_00002.pdf', 'N', 0, NULL, 1, '20219980000061', '2021-02-23 17:41:50.203955-05', 4, NULL, 1, '2021-02-23 17:56:29.382501-05', 1, NULL, '998', NULL, NULL, NULL, 455, NULL, NULL, '2021-02-23 17:41:50.203955', '2021-02-23 17:41:44.557901-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '20219981110000002E', NULL, '11', '1', NULL, NULL, NULL, NULL, 1, '120219980000022_00002.docx', true, NULL, 1);
INSERT INTO anexos VALUES ('20219980000052', '2021998000005200004', 7, 24.338, 'S', 'ADMON', 'Respuesta a comunicación 20219980000052 de fecha 2021-03-31.', 4, '120219980000052_00004.pdf', 'N', 0, NULL, 1, '20219980000131', '2021-03-31 10:50:01.230526-05', 3, NULL, 1, '2021-03-31 10:50:01.230526-05', 1, NULL, '998', NULL, NULL, NULL, 145, NULL, NULL, '2021-03-31 10:50:01.230526', '2021-03-31 10:49:57.277776-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '20219981120000003E', NULL, '11', '2', NULL, NULL, NULL, NULL, 0, '120219980000052_00004.docx', false, NULL, 1);
INSERT INTO anexos VALUES ('20219980000052', '2021998000005200001', 7, 246.196, '1', 'ADMON', 'anexo', 1, '120219980000052_00001.pdf', 'N', 0, NULL, 0, '0', NULL, 0, NULL, 7, NULL, 7, NULL, '998', NULL, NULL, NULL, 145, NULL, NULL, NULL, '2021-03-31 10:33:32.43117-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '11', '2', NULL, NULL, NULL, NULL, 0, NULL, false, NULL, 0);
INSERT INTO anexos VALUES ('20219980000052', '2021998000005200002', 24, 24.338, 'S', 'ADMON', 'Respuesta a comunicación 20219980000052 de fecha 2021-03-31.', 2, '120219980000052_00002.docx', 'N', 0, NULL, 1, '20219980000111', '2021-03-31 10:38:11.180031-05', 4, NULL, 1, '2021-03-31 10:38:11.180031-05', 1, NULL, '998', NULL, NULL, NULL, 145, NULL, NULL, '2021-03-31 10:38:11.180031', '2021-03-31 10:34:24.445079-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '', NULL, '11', '2', NULL, NULL, NULL, NULL, 0, NULL, false, NULL, 1);
INSERT INTO anexos VALUES ('20219980000082', '2021998000008200001', 14, 61.854, 'S', 'ADMON', 'Respuesta a comunicación 20219980000082 de fecha 2021-04-07.', 1, '120219980000082_00001.odt', 'N', 0, NULL, 1, '20219980000151', '2021-04-07 09:39:59.053384-05', 3, NULL, 1, '2021-04-07 09:39:59.053384-05', 1, NULL, '998', NULL, NULL, NULL, 455, NULL, NULL, '2021-04-07 09:39:59.053384', '2021-04-07 09:36:49.7496-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '', NULL, '11', '2', NULL, NULL, NULL, NULL, 0, NULL, false, NULL, 1);
INSERT INTO anexos VALUES ('20219980000072', '2021998000007200001', 7, 24.338, 'S', 'ADMON', 'Respuesta a comunicación 20219980000072 de fecha 2021-03-31.', 1, '120219980000072_00001.pdf', 'N', 0, NULL, 1, '20219980000171', '2021-04-13 16:31:54.577765-05', 4, NULL, 1, '2021-04-13 16:31:54.577765-05', 1, NULL, '998', NULL, NULL, NULL, 455, NULL, NULL, '2021-04-13 16:31:54.577765', '2021-04-13 16:31:50.48347-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, 0, '120219980000072_00001.docx', false, NULL, 1);
INSERT INTO anexos VALUES ('20219980000092', '2021998000009200002', 7, 304.286, 'S', 'ADMON', 'anexo 1', 2, '120219980000092_00002.pdf', 'N', 0, NULL, 0, NULL, NULL, 0, NULL, 1, NULL, 1, NULL, '998', NULL, NULL, NULL, 145, NULL, NULL, NULL, '2021-04-13 16:22:44.976512-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '11', '2', NULL, NULL, NULL, NULL, 0, NULL, false, NULL, 0);
INSERT INTO anexos VALUES ('20219980000092', '2021998000009200003', 7, 17.343, 'S', 'ADMON', 'anexo 2', 3, '120219980000092_00003.pdf', 'N', 0, NULL, 0, NULL, NULL, 0, NULL, 1, NULL, 1, NULL, '998', NULL, NULL, NULL, 155, NULL, NULL, NULL, '2021-04-13 16:23:10.872305-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '11', '2', NULL, NULL, NULL, NULL, 0, NULL, false, NULL, 0);
INSERT INTO anexos VALUES ('20219980000042', '2021998000004200004', 7, 24.338, 'S', 'ADMON', 'Respuesta a comunicación 20219980000042 de fecha 2021-03-01.', 4, '120219980000042_00004.pdf', 'N', 0, NULL, 1, '20219980000181', '2021-04-13 17:00:10.17476-05', 3, NULL, 1, '2021-04-13 17:00:10.17476-05', 1, NULL, '998', NULL, NULL, NULL, 2, NULL, NULL, '2021-04-13 17:00:10.17476', '2021-04-13 17:00:06.060785-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, 1, '120219980000042_00004.docx', false, NULL, 1);
INSERT INTO anexos VALUES ('20219980000201', '2021998000020100001', 7, 24.338, 'S', 'ADMON', 'formato', 1, '120219980000201_00001.pdf', 'N', 0, NULL, 1, '20219980000201', '2021-04-13 17:31:11.64617-05', 3, NULL, 1, '2021-04-13 17:31:11.64617-05', 1, NULL, '998', NULL, NULL, NULL, 455, NULL, NULL, '2021-04-13 17:31:11.64617', '2021-04-13 17:31:06.605826-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '', NULL, '11', '2', NULL, NULL, NULL, NULL, 0, '120219980000201_00001.docx', false, NULL, 1);
INSERT INTO anexos VALUES ('20219980000102', '2021998000010200001', 7, 24.338, 'S', 'ADMON', 'Respuesta a comunicación 20219980000102 de fecha 2021-04-13.', 1, '120219980000102_00001.pdf', 'N', 0, NULL, 1, '20219980000191', '2021-04-13 17:27:48.316339-05', 3, NULL, 1, '2021-04-13 17:27:48.316339-05', 1, NULL, '998', NULL, NULL, NULL, 2, NULL, NULL, '2021-04-13 17:27:48.316339', '2021-04-13 17:27:44.560065-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '20219981120000003E', NULL, '11', '2', NULL, NULL, NULL, NULL, 0, '120219980000102_00001.docx', false, NULL, 1);


--
-- Data for Name: anexos_historico; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--



--
-- Data for Name: anexos_tipo; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO anexos_tipo VALUES (1, 'doc', 'Word', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (2, 'xls', 'Excel', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (3, 'ppt', 'PowerPoint', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (4, 'tif', 'Imagen Tif', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (5, 'jpg', 'Imagen jpg', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (6, 'gif', 'Imagen gif', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (7, 'pdf', 'Acrobat Reader', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (8, 'txt', 'Documento txt', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (9, 'zip', 'Comprimido', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (10, 'rtf', 'Rich Text Format (rtf)', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (11, 'dia', 'Dia(Diagrama)', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (12, 'zargo', 'Argo(Diagrama)', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (13, 'csv', 'csv (separado por comas)', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (14, 'odt', 'OpenDocument Text', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (20, 'avi', '.avi (Video)', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (21, 'mpg', '.mpg (video)', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (23, 'tar', '.tar (Comprimido)', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (24, 'docx', 'Microsoft Word 2010+', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (25, 'xlsx', 'Microsoft Excel 2010+', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (26, 'pptx', 'Microsoft Power Point 2010+', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (27, 'png', 'Imagen png', 'fas fa-file-invoice');
INSERT INTO anexos_tipo VALUES (28, 'xml', 'Documento Xml', 'fas fa-file-invoice');


--
-- Data for Name: bodega_empresas; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--



--
-- Data for Name: borrar_carpeta_personalizada; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--



--
-- Data for Name: borrar_empresa_esp; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--



--
-- Data for Name: carpeta; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO carpeta VALUES (0, 'Entrada', 1);
INSERT INTO carpeta VALUES (1, 'Salida', 1);
INSERT INTO carpeta VALUES (12, 'Devueltos', 1);
INSERT INTO carpeta VALUES (11, 'Vo.Bo.', 1);
INSERT INTO carpeta VALUES (14, 'Reasignación Masiva', 1);
INSERT INTO carpeta VALUES (4, 'Pqrsd', 1);
INSERT INTO carpeta VALUES (3, 'Comunicación Interna', 1);


--
-- Data for Name: carpeta_per; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO carpeta_per VALUES (1, '999', 'Masiva', 'Radicacion Masiva', 99, 1);
INSERT INTO carpeta_per VALUES (1, '998', 'Masiva', 'Radicacion Masiva', 99, 2);


--
-- Name: carpeta_per_id_caperta_per_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('carpeta_per_id_caperta_per_seq', 2, true);


--
-- Data for Name: centro_poblado; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--



--
-- Data for Name: configuracion_contrasena; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO configuracion_contrasena VALUES (4, 3, 'month', 3, false, '2020');
INSERT INTO configuracion_contrasena VALUES (3, 3, 'month', 3, false, '2020');
INSERT INTO configuracion_contrasena VALUES (1, 3, 'month', 3, false, '2020');
INSERT INTO configuracion_contrasena VALUES (2, 4, 'month', 3, false, '2020');
INSERT INTO configuracion_contrasena VALUES (5, 3, 'month', 1, true, '2020');


--
-- Name: configuracion_contrasena_idConfiguracionContracsena_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('"configuracion_contrasena_idConfiguracionContracsena_seq"', 1, true);


--
-- Name: configuracion_general_fondo_id_campo_configuracion_fondo_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('configuracion_general_fondo_id_campo_configuracion_fondo_seq', 1, true);


--
-- Name: contrasenas_guardadas_id_contrasena_guardada_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('contrasenas_guardadas_id_contrasena_guardada_seq', 1, true);


--
-- Data for Name: datosocr; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--



--
-- Name: datosocr_indice_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('datosocr_indice_seq', 1, false);


--
-- Data for Name: departamento; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO departamento VALUES (1, 'TODOS', 1, 170);
INSERT INTO departamento VALUES (5, 'ANTIOQUÍA', 1, 170);
INSERT INTO departamento VALUES (8, 'ATLÁNTICO', 1, 170);
INSERT INTO departamento VALUES (13, 'BOLÍVAR', 1, 170);
INSERT INTO departamento VALUES (15, 'BOYACÁ', 1, 170);
INSERT INTO departamento VALUES (17, 'CALDAS', 1, 170);
INSERT INTO departamento VALUES (19, 'CAUCA', 1, 170);
INSERT INTO departamento VALUES (20, 'CESAR', 1, 170);
INSERT INTO departamento VALUES (23, 'CÓRDOBA', 1, 170);
INSERT INTO departamento VALUES (25, 'CUNDINAMARCA', 1, 170);
INSERT INTO departamento VALUES (27, 'CHOCO', 1, 170);
INSERT INTO departamento VALUES (41, 'HUILA', 1, 170);
INSERT INTO departamento VALUES (44, 'LA GUAJIRA', 1, 170);
INSERT INTO departamento VALUES (47, 'MAGDALENA', 1, 170);
INSERT INTO departamento VALUES (50, 'META', 1, 170);
INSERT INTO departamento VALUES (52, 'NARIÑO', 1, 170);
INSERT INTO departamento VALUES (54, 'NORTE DE SANTANDER', 1, 170);
INSERT INTO departamento VALUES (63, 'QUINDÍO', 1, 170);
INSERT INTO departamento VALUES (66, 'RISARALDA', 1, 170);
INSERT INTO departamento VALUES (68, 'SANTANDER', 1, 170);
INSERT INTO departamento VALUES (70, 'SUCRE', 1, 170);
INSERT INTO departamento VALUES (73, 'TOLIMA', 1, 170);
INSERT INTO departamento VALUES (76, 'VALLE DEL CAUCA', 1, 170);
INSERT INTO departamento VALUES (81, 'ARAUCA', 1, 170);
INSERT INTO departamento VALUES (85, 'CASANARE', 1, 170);
INSERT INTO departamento VALUES (86, 'PUTUMAYO', 1, 170);
INSERT INTO departamento VALUES (88, 'SAN ANDRÉS', 1, 170);
INSERT INTO departamento VALUES (91, 'AMAZONAS', 1, 170);
INSERT INTO departamento VALUES (94, 'GUAINÍA', 1, 170);
INSERT INTO departamento VALUES (95, 'GUAVIARE', 1, 170);
INSERT INTO departamento VALUES (97, 'VAUPÉS', 1, 170);
INSERT INTO departamento VALUES (99, 'VICHADA', 1, 170);
INSERT INTO departamento VALUES (11, 'D.C.', 1, 170);
INSERT INTO departamento VALUES (18, 'CAQUETÁ', 1, 170);


--
-- Data for Name: dependencia; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO dependencia VALUES ('998', 'Dependencia de Skinatech', 11, '998', 1, '998', 'DAS', 1, 'Carrera 37 No. 53-50', NULL, NULL, '998', '998', 1, 170, 1, NULL, '998');
INSERT INTO dependencia VALUES ('999', 'Dependencia Administración Archivo', 11, '999', 1, '999', 'DAA', 1, 'Carrera 37 No. 53-50', NULL, NULL, '999', '999', 1, 170, 1, NULL, '999');
INSERT INTO dependencia VALUES ('100', 'INVIMA SAS', 11, '998', 1, '998', 'INVM', NULL, 'Zona franca de bogota', NULL, NULL, NULL, NULL, 1, 170, 1, NULL, NULL);
INSERT INTO dependencia VALUES ('101', 'SKINA TECHNOLOGIES', 11, '998', 1, '998', 'SKN', NULL, 'Zona franca Bodega 10', NULL, NULL, NULL, NULL, 1, 170, 1, NULL, NULL);


--
-- Data for Name: dependencia_visibilidad; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO dependencia_visibilidad VALUES (1, '1021', '1020');


--
-- Name: dependencias; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('dependencias', 0, false);


--
-- Data for Name: direccion_usuarios; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--



--
-- Name: direccion_usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('direccion_usuarios_id_seq', 1, false);


--
-- Data for Name: estado; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO estado VALUES (9, 'Documento Orfeo', NULL);
INSERT INTO estado VALUES (2, 'Asignado', 4);
INSERT INTO estado VALUES (3, 'En tramite', 4);
INSERT INTO estado VALUES (4, 'Finalizado', 4);
INSERT INTO estado VALUES (5, 'Con Respuesta', 4);
INSERT INTO estado VALUES (1, 'Nueva', 4);


--
-- Data for Name: estado_civil_pqrs; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO estado_civil_pqrs VALUES (1, 'Soltero(a)');
INSERT INTO estado_civil_pqrs VALUES (2, 'Casado(a)');
INSERT INTO estado_civil_pqrs VALUES (3, 'Viudo(a)');
INSERT INTO estado_civil_pqrs VALUES (4, 'Unión Libre ');
INSERT INTO estado_civil_pqrs VALUES (5, 'Divorciado');


--
-- Name: estado_civil_pqrs_id_estado_civil_pqrs_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('estado_civil_pqrs_id_estado_civil_pqrs_seq', 1, false);


--
-- Data for Name: fondo_acumulado_comunicaciones; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--



--
-- Name: fondo_acumulado_comunicaciones_id_fondo_acumulado_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('fondo_acumulado_comunicaciones_id_fondo_acumulado_seq', 1, true);


--
-- Data for Name: fun_funcionario; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--



--
-- Data for Name: genero_pqrs; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO genero_pqrs VALUES (1, 'Masculino');
INSERT INTO genero_pqrs VALUES (2, 'Femenino');
INSERT INTO genero_pqrs VALUES (3, 'Otro');
INSERT INTO genero_pqrs VALUES (4, 'N/A');


--
-- Data for Name: grupo_interes; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO grupo_interes VALUES (1, 'Ninguno');
INSERT INTO grupo_interes VALUES (2, 'Sindicato del Sector Publico');
INSERT INTO grupo_interes VALUES (3, 'Veeduría Ciudadana');
INSERT INTO grupo_interes VALUES (4, 'Representante de Asociación de Usuario');
INSERT INTO grupo_interes VALUES (5, 'Representante EPS');
INSERT INTO grupo_interes VALUES (6, 'Integrante Junta Directiva');


--
-- Data for Name: grupos_informados; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO grupos_informados VALUES (8, 'Equipo Tecnico de Gestión Documental', 'Integrantes Del Comité De Archivo', 1);


--
-- Name: grupos_informados_id_grupos_informados_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('grupos_informados_id_grupos_informados_seq', 1, false);


--
-- Name: grupos_informados_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('grupos_informados_seq', 1, false);


--
-- Data for Name: hist_eventos; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO hist_eventos VALUES ('998', '2021-02-23 14:39:12.573669-05', 1, '20219980000011', ' Se radicado correctamente el documento ', 1, '1234567890', '1', 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 14:39:12.583346-05', 1, '20219980000011', 'A: ADMON - Se ha generado el radicado No.20219980000011 y se esta notificando.', 1, '1234567890', NULL, 8, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 14:45:03.518364-05', 1, '20219980000021', ' Se radicado correctamente el documento ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 14:46:36.508172-05', 1, '20219980000021', 'Modificacion Documento  en la descripcion de anexos del radicado', 1, '1234567890', NULL, 11, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 14:48:24.611126-05', 1, '20219980000021', 'Modificacion Documento  en la descripcion de anexos del radicado', 1, '1234567890', NULL, 11, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 14:58:09.60168-05', 1, '20219980000031', ' ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 14:58:52.696489-05', 1, '20219980000031', 'Se firmó el documento con el radicado 20219980000031', 1, '1234567890', NULL, 67, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 14:58:52.697935-05', 1, '20219980000021', 'Se firmó el documento con el radicado 20219980000031', 1, '1234567890', NULL, 67, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 14:59:19.269798-05', 1, '20219980000021', 'Se firmó el documento con el radicado 20219980000021', 1, '1234567890', NULL, 67, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 14:59:27.868874-05', 1, '20219980000021', 'Se envió la notificación de correo sobre la respuesta dada con No.radicado 20219980000021 al remitente/destinatario.soporte@skinatech.com', 1, '1234567890', NULL, 71, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:14:53.517069-05', 1, '20219980000021', 'Se envió la notificación de correo sobre la respuesta dada con No.radicado 20219980000021 al remitente/destinatario.soporte@skinatech.com', 1, '1234567890', NULL, 71, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:17:29.009036-05', 1, '20219980000021', 'Asignación de TRD', 1, '1234567890', NULL, 32, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:19:38.920919-05', 1, '20219980000021', '*Modificado TRD* COMUNICACIONES OFICIALES//Propuestas', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:23:17.53308-05', 1, '20219980000021', '*Modificado TRD* COMUNICACIONES OFICIALES//Propuestas', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:28:36.792828-05', 1, '20219980000021', 'Radicado Publico.', 1, '1234567890', NULL, 54, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:28:45.605187-05', 1, '20219980000021', 'Radicado Confidencial', 1, '1234567890', NULL, 54, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:29:24.584461-05', 1, '20219980000021', '*Eliminado TRD*COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones/Propuestas', 1, '1234567890', NULL, 33, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:29:49.273323-05', 1, '20219980000021', 'Asignación de TRD', 1, '1234567890', NULL, 32, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:30:09.59448-05', 1, '20219980000021', 'Modificacion Documento  en la descripcion de anexos del radicado', 1, '1234567890', NULL, 11, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:42:34.282214-05', 1, '20219980000041', ' Se radicado correctamente el documento ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:43:25.619047-05', 1, '20219980000041', 'Se firmó el documento con el radicado 20219980000041', 1, '1234567890', NULL, 67, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:44:08.216189-05', 1, '20219980000041', 'Se envió la notificación de correo sobre la respuesta dada con No.radicado 20219980000041 al remitente/destinatario.soporte@skinatech.com', 1, '1234567890', NULL, 71, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:45:09.10979-05', 1, '20219980000041', 'Asignación de TRD', 1, '1234567890', NULL, 32, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:45:16.71992-05', 1, '20219980000041', '*Modificado TRD* COMUNICACIONES OFICIALES//Respuesta', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:47:03.61546-05', 1, '20219980000012', ' Se radicado correctamente el documento ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:47:36.053706-05', 1, '20219980000012', '20219980000012', 1, '1234567890', NULL, 42, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:48:09.716173-05', 1, '20219980000012', 'anexo', 998, '1234567890', NULL, 29, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:48:09.716173-05', 1, '20219980000012', 'Se adjunto el anexo al radicado, anexo', 1, '1234567890', NULL, 29, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:48:58.409761-05', 1, '20219980000051', ' ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 16:48:58.409761-05', 1, '20219980000012', 'Se actualizó el estado del radicado a <b>"Con Respuesta"</b> y se asigno el número 20219980000051', 1, '1234567890', NULL, 69, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:11:38.787729-05', 1, '20219980000041', '*Modificado TRD* COMUNICACIONES OFICIALES//Respuesta', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:14:06.815328-05', 1, '20219980000041', '*Modificado TRD* COMUNICACIONES OFICIALES//Respuesta', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:15:22.111322-05', 1, '20219980000041', '*Modificado TRD* COMUNICACIONES OFICIALES//Respuesta', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:15:41.177739-05', 1, '20219980000041', '*Modificado TRD* COMUNICACIONES OFICIALES//Respuesta', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:16:06.056987-05', 1, '20219980000041', '*Modificado TRD* COMUNICACIONES OFICIALES//Respuesta', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:27:52.314162-05', 1, '20219980000041', '*Modificado TRD* COMUNICACIONES OFICIALES//Respuesta', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:34:32.966649-05', 1, '20219980000041', '*Modificado TRD* COMUNICACIONES OFICIALES//Respuesta', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:35:31.626662-05', 1, '20219980000041', '*Modificado TRD* COMUNICACIONES OFICIALES//Respuesta', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:39:31.025378-05', 1, '20219980000022', ' Se radicado correctamente el documento ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:40:07.052462-05', 1, '20219980000022', '20219980000022', 1, '1234567890', NULL, 42, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:40:19.001506-05', 1, '20219980000022', '20219980000022', 998, '1234567890', NULL, 29, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:40:19.001506-05', 1, '20219980000022', 'Se adjunto el anexo al radicado, 20219980000022', 1, '1234567890', NULL, 29, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:40:36.972792-05', 1, '20219980000022', 'Asignación de TRD', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:41:50.203955-05', 1, '20219980000061', ' ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:41:50.203955-05', 1, '20219980000022', 'Se actualizó el estado del radicado a <b>"Con Respuesta"</b> y se asigno el número 20219980000061', 1, '1234567890', NULL, 69, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:41:56.159029-05', 1, '20219980000061', 'Se firmó el documento con el radicado 20219980000061', 1, '1234567890', NULL, 67, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:41:56.160422-05', 1, '20219980000022', 'Se firmó el documento con el radicado 20219980000061', 1, '1234567890', NULL, 67, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:41:57.654766-05', 1, '20219980000061', 'Se envio notificación al ciudadano con el correo <b>soporte@skinatech.com </b> <br><br>', 1, '1234567890', NULL, 71, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:41:57.656686-05', 1, '20219980000022', 'Se envio notificación al ciudadano con el correo <b>soporte@skinatech.com </b> <br><br>', 1, '1234567890', NULL, 71, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 11:03:05.583042-05', 1, '20219980000052', 'se reasigna', 1, '1234567890', NULL, 9, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.798024-05', 1, '20219980000021', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.884232-05', 1, '20219980000021', 'Se ha marcado como publico el documento anexado con el número 2021998000002100002.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.92162-05', 1, '20219980000021', 'Se ha marcado como publico el documento anexado con el número 2021998000002100002.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.926574-05', 1, '20219980000021', 'Se ha marcado como publico el documento anexado con el número 2021998000002100001.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.927883-05', 1, '20219980000021', 'Se ha marcado como publico el documento anexado con el número 2021998000002100001.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.929064-05', 1, '20219980000021', 'Se ha marcado como publico el documento anexado con el número 2021998000002100001.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.938993-05', 1, '20219980000021', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.940206-05', 1, '20219980000021', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.941655-05', 1, '20219980000021', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.942813-05', 1, '20219980000022', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.950158-05', 1, '20219980000021', 'Se ha marcado como publico el documento anexado con el número 2021998000002200001.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.951367-05', 1, '20219980000021', 'Se ha marcado como publico el documento anexado con el número 2021998000002200001.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.956363-05', 1, '20219980000021', 'Se ha marcado como publico el documento anexado con el número 2021998000002200001.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.957602-05', 1, '20219980000022', 'Se ha marcado como publico el documento anexado con el número 2021998000002200001.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.95876-05', 1, '20219980000022', 'Se ha marcado como publico el documento anexado con el número 2021998000002200001.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.961747-05', 1, '20219980000021', 'Se ha marcado como publico el documento anexado con el número 2021998000002200002.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.962943-05', 1, '20219980000021', 'Se ha marcado como publico el documento anexado con el número 2021998000002200002.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.965316-05', 1, '20219980000021', 'Se ha marcado como publico el documento anexado con el número 2021998000002200002.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.966584-05', 1, '20219980000022', 'Se ha marcado como publico el documento anexado con el número 2021998000002200002.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.967896-05', 1, '20219980000022', 'Se ha marcado como publico el documento anexado con el número 2021998000002200002.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.969064-05', 1, '20219980000022', 'Se ha marcado como publico el documento anexado con el número 2021998000002200002.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.980841-05', 1, '20219980000021', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.982048-05', 1, '20219980000021', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.983245-05', 1, '20219980000021', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.984435-05', 1, '20219980000022', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.989106-05', 1, '20219980000022', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.990581-05', 1, '20219980000022', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.991743-05', 1, '20219980000041', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.995116-05', 1, '20219980000021', 'Se ha marcado como publico el documento anexado con el número 2021998000004100001.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.996287-05', 1, '20219980000021', 'Se ha marcado como publico el documento anexado con el número 2021998000004100001.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.997443-05', 1, '20219980000021', 'Se ha marcado como publico el documento anexado con el número 2021998000004100001.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:50.999217-05', 1, '20219980000022', 'Se ha marcado como publico el documento anexado con el número 2021998000004100001.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.000441-05', 1, '20219980000022', 'Se ha marcado como publico el documento anexado con el número 2021998000004100001.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.001618-05', 1, '20219980000022', 'Se ha marcado como publico el documento anexado con el número 2021998000004100001.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.00281-05', 1, '20219980000041', 'Se ha marcado como publico el documento anexado con el número 2021998000004100001.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.003988-05', 1, '20219980000041', 'Se ha marcado como publico el documento anexado con el número 2021998000004100001.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.01427-05', 1, '20219980000021', 'Se ha marcado como publico el documento anexado con el número 2021998000004100002.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.015646-05', 1, '20219980000021', 'Se ha marcado como publico el documento anexado con el número 2021998000004100002.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.016872-05', 1, '20219980000021', 'Se ha marcado como publico el documento anexado con el número 2021998000004100002.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.018097-05', 1, '20219980000022', 'Se ha marcado como publico el documento anexado con el número 2021998000004100002.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.02328-05', 1, '20219980000022', 'Se ha marcado como publico el documento anexado con el número 2021998000004100002.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.024487-05', 1, '20219980000022', 'Se ha marcado como publico el documento anexado con el número 2021998000004100002.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.025689-05', 1, '20219980000041', 'Se ha marcado como publico el documento anexado con el número 2021998000004100002.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.026969-05', 1, '20219980000041', 'Se ha marcado como publico el documento anexado con el número 2021998000004100002.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.03158-05', 1, '20219980000041', 'Se ha marcado como publico el documento anexado con el número 2021998000004100002.', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.035411-05', 1, '20219980000021', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.036595-05', 1, '20219980000021', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.037762-05', 1, '20219980000021', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.038977-05', 1, '20219980000022', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.040178-05', 1, '20219980000022', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.041935-05', 1, '20219980000022', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.043099-05', 1, '20219980000041', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.044304-05', 1, '20219980000041', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.045479-05', 1, '20219980000041', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:42:51.046668-05', 1, '20219980000061', 'Se ha marcado como publico el documento principal del radicado número .', 1, '1234567890', NULL, 72, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 17:43:53.95192-05', 1, '20219980000012', 'Asignación de TRD', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 18:00:54.214015-05', 1, '20219980000071', ' ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-23 18:00:54.214015-05', 1, '20219980000012', 'Se actualizó el estado del radicado a <b>"Con Respuesta"</b> y se asigno el número 20219980000071', 1, '1234567890', NULL, 69, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-24 15:29:46.342261-05', 1, '20219980000032', ' Se radicado correctamente el documento ', 1, '1234567890', NULL, 2, NULL, '1022982736', '100');
INSERT INTO hist_eventos VALUES ('998', '2021-02-24 16:16:16.847435-05', 1, '20219980000032', 'Se cargan facturas radicadas', 1, '1234567890', NULL, 42, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-02-24 16:18:44.890832-05', 1, '20219980000032', 'Prueba de entrega 20219980000032', 998, '1234567890', NULL, 29, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-02-24 16:18:44.890832-05', 1, '20219980000032', 'Se adjunto el anexo al radicado, Prueba de entrega 20219980000032', 1, '1234567890', NULL, 29, NULL, '1022982736', '100');
INSERT INTO hist_eventos VALUES ('998', '2021-03-01 08:28:46.632385-05', 1, '20219980000042', ' Se radicado correctamente el documento ', 1, '1234567890', NULL, 2, NULL, '1022982736', '100');
INSERT INTO hist_eventos VALUES ('998', '2021-03-01 08:32:38.857889-05', 1, '20219980000042', 'Facturas originales', 1, '1234567890', NULL, 42, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-01 09:08:34.586809-05', 1, '20219980000042', 'Prueba de entreaga de la documentación', 998, '1234567890', NULL, 29, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-03-01 09:08:34.586809-05', 1, '20219980000042', 'Se adjunto el anexo al radicado, Prueba de entreaga de la documentación', 1, '1234567890', NULL, 29, NULL, '1022982736', '100');
INSERT INTO hist_eventos VALUES ('100', '2021-03-01 09:14:40.040828-05', 1, '20219980000042', 'Se carga respuesta', 1, '1022982736', NULL, 12, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-01 09:18:47.419861-05', 1, '20219980000042', 'Prueba entrega externa al cliente', 998, '1234567890', NULL, 29, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-03-01 09:18:47.419861-05', 1, '20219980000042', 'Se adjunto el anexo al radicado, Prueba entrega externa al cliente', 1, '1234567890', NULL, 29, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-09 10:27:49.103704-05', 1, '20219980000081', 'Radicado insertado del grupo de masiva 20219980000081', 1, '1234567890', NULL, 30, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-09 10:27:49.103704-05', 1, '20219980000091', 'Radicado insertado del grupo de masiva 20219980000081', 1, '1234567890', NULL, 30, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-09 10:27:49.103704-05', 1, '20219980000101', 'Radicado insertado del grupo de masiva 20219980000081', 1, '1234567890', NULL, 30, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:32:06.527652-05', 1, '20219980000052', ' Se radicado correctamente el documento ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:32:51.328095-05', 1, '20219980000052', '20219980000052', 1, '1234567890', NULL, 42, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:33:32.43117-05', 1, '20219980000052', 'anexo', 998, '1234567890', NULL, 29, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:33:32.43117-05', 1, '20219980000052', 'Se adjunto el anexo al radicado, anexo', 1, '1234567890', NULL, 29, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:34:33.616189-05', 1, '20219980000111', ' ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:34:33.616189-05', 1, '20219980000052', 'Se actualizó el estado del radicado a <b>"Con Respuesta"</b> y se asigno el número 20219980000111', 1, '1234567890', NULL, 69, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:38:21.063709-05', 1, '20219980000052', 'Se envió la notificación de correo sobre la respuesta dada con No.radicado 20219980000052 al remitente/destinatario.soporte@skinatech.com', 1, '1234567890', NULL, 71, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:38:44.257657-05', 1, '20219980000052', 'Se envió la notificación de correo sobre la respuesta dada con No.radicado 20219980000052 al remitente/destinatario.soporte@skinatech.com', 1, '1234567890', NULL, 71, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:39:12.511482-05', 1, '20219980000052', 'Asignación de TRD', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:39:28.257918-05', 1, '20219980000052', 'Radicado Confidencial', 1, '1234567890', NULL, 54, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:48:36.719563-05', 1, '20219980000121', ' ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:48:36.719563-05', 1, '20219980000052', 'Se actualizó el estado del radicado a <b>"Con Respuesta"</b> y se asigno el número 20219980000121', 1, '1234567890', NULL, 69, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:48:52.181724-05', 1, '20219980000121', 'Se firmó el documento con el radicado 20219980000121', 1, '1234567890', NULL, 67, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:48:52.183425-05', 1, '20219980000052', 'Se firmó el documento con el radicado 20219980000121', 1, '1234567890', NULL, 67, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:48:53.883222-05', 1, '20219980000121', 'Se envio notificación al ciudadano con el correo <b>soporte@skinatech.com </b> <br><br>', 1, '1234567890', NULL, 71, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:48:53.884521-05', 1, '20219980000052', 'Se envio notificación al ciudadano con el correo <b>soporte@skinatech.com </b> <br><br>', 1, '1234567890', NULL, 71, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:50:01.230526-05', 1, '20219980000131', ' ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 10:50:01.230526-05', 1, '20219980000052', 'Se actualizó el estado del radicado a <b>"Con Respuesta"</b> y se asigno el número 20219980000131', 1, '1234567890', NULL, 69, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 11:03:18.276067-05', 1, '20219980000052', 'se reasigna', 1, '1234567890', NULL, 9, NULL, '1022982736', '100');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 11:36:38.414866-05', 1, '20219980000062', ' Se radicado correctamente el documento ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 11:36:38.419496-05', 1, '20219980000062', 'A: ADMON - Se ha generado el radicado No.20219980000062 y se esta notificando.', 1, '1234567890', NULL, 8, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 11:36:38.423767-05', 1, '20219980000062', 'A: RECEPCION.INVM - Se ha generado el radicado No.20219980000062 y se esta notificando.', 1, '1234567890', NULL, 8, NULL, '1022982736', '100');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 11:43:16.238507-05', 1, '20219980000062', 'Docxumento principal', 1, '1234567890', NULL, 42, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 12:14:15.167631-05', 1, '20219980000062', 'Se actualizó el estado del radicado a <b>"En tramite"</b>, ya se cargó el formato de respuesta.', 1, '1234567890', NULL, 69, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 12:14:56.631012-05', 1, '20219980000141', ' ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 12:14:56.631012-05', 1, '20219980000062', 'Se actualizó el estado del radicado a <b>"Con Respuesta"</b> y se asigno el número 20219980000141', 1, '1234567890', NULL, 69, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-03-31 12:25:09.110957-05', 1, '20219980000072', ' Se radicado correctamente el documento ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-07 09:29:50.81627-05', 1, '20219980000082', ' Se radicado correctamente el documento ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-07 09:32:26.50954-05', 1, '20219980000082', 'tramitar', 1, '1234567890', NULL, 42, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-07 09:36:49.7496-05', 1, '20219980000082', 'Se actualizó el estado del radicado a <b>"En tramite"</b>, ya se cargó el formato de respuesta.', 1, '1234567890', NULL, 69, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-07 09:39:59.053384-05', 1, '20219980000151', ' ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-07 09:39:59.053384-05', 1, '20219980000082', 'Se actualizó el estado del radicado a <b>"Con Respuesta"</b> y se asigno el número 20219980000151', 1, '1234567890', NULL, 69, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-08 09:39:16.485329-05', 1, '20219980000092', ' Se radicado correctamente el documento ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-08 09:40:53.272971-05', 1, '20219980000092', 'para aprobacion', 1, '1234567890', NULL, 42, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 16:17:03.939116-05', 1, '20219980000092', 'Se actualizó el estado del radicado a <b>"En tramite"</b>, ya se cargó el formato de respuesta.', 1, '1234567890', NULL, 69, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 16:18:51.413878-05', 1, '20219980000161', ' ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 16:18:51.413878-05', 1, '20219980000092', 'Se actualizó el estado del radicado a <b>"Con Respuesta"</b> y se asigno el número 20219980000161', 1, '1234567890', NULL, 69, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 16:23:42.364852-05', 1, '20219980000092', 'Se envió la notificación de correo sobre la respuesta dada con No.radicado 20219980000092 al remitente/destinatario.soporte@skinatech.com', 1, '1234567890', NULL, 71, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 16:24:49.493866-05', 1, '20219980000092', 'Asignación de TRD', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 16:29:58.974154-05', 1, '20219980000082', 'Asignación de TRD', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 16:30:22.710722-05', 1, '20219980000082', '*Modificado TRD* COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones/Solicitud de permiso para tal', 1, '1234567890', NULL, 32, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 16:30:59.219521-05', 1, '20219980000082', 'no requiere respuesta', 1, '1234567890', NULL, 65, NULL, '12345678909', '999');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 16:31:50.48347-05', 1, '20219980000072', 'Se actualizó el estado del radicado a <b>"En tramite"</b>, ya se cargó el formato de respuesta.', 1, '1234567890', NULL, 69, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 16:31:54.577765-05', 1, '20219980000171', ' ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 16:31:54.577765-05', 1, '20219980000072', 'Se actualizó el estado del radicado a <b>"Con Respuesta"</b> y se asigno el número 20219980000171', 1, '1234567890', NULL, 69, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 16:42:23.590439-05', 1, '20219980000072', 'Se envió la notificación de correo sobre la respuesta dada con No.radicado 20219980000072 al remitente/destinatario.soporte@skinatech.com', 1, '1234567890', NULL, 71, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 16:45:37.886969-05', 1, '20219980000072', 'Se envió la notificación de correo sobre la respuesta dada con No.radicado 20219980000072 al remitente/destinatario.soporte@skinatech.com', 1, '1234567890', NULL, 71, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 16:47:04.246872-05', 1, '20219980000072', 'Se envió la notificación de correo sobre la respuesta dada con No.radicado 20219980000072 al remitente/destinatario.soporte@skinatech.com', 1, '1234567890', NULL, 71, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 16:48:34.836573-05', 1, '20219980000072', 'Se envió la notificación de correo sobre la respuesta dada con No.radicado 20219980000072 al remitente/destinatario.soporte@skinatech.com', 1, '1234567890', NULL, 71, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 17:00:10.17476-05', 1, '20219980000181', ' ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 17:00:10.17476-05', 1, '20219980000042', 'Se actualizó el estado del radicado a <b>"Con Respuesta"</b> y se asigno el número 20219980000181', 1, '1234567890', NULL, 69, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 17:00:23.724521-05', 1, '20219980000181', 'Se firmó el documento con el radicado 20219980000181', 1, '1234567890', NULL, 67, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 17:00:23.727333-05', 1, '20219980000042', 'Se firmó el documento con el radicado 20219980000181', 1, '1234567890', NULL, 67, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 17:06:33.965358-05', 1, '20219980000062', 'reasignación', 2, '1234567890', NULL, 9, NULL, '1022982735', '101');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 17:26:00.245667-05', 1, '20219980000102', ' Se radicado correctamente el documento ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 17:26:00.251421-05', 1, '20219980000102', 'A: ADMON - Se ha generado el radicado No.20219980000102 y se esta notificando.', 1, '1234567890', NULL, 8, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 17:26:00.255878-05', 1, '20219980000102', 'A: JMGAMEZ - Se ha generado el radicado No.20219980000102 y se esta notificando.', 2, '1234567890', NULL, 8, NULL, '1022982735', '101');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 17:26:45.653827-05', 1, '20219980000102', '20219980000102', 1, '1234567890', NULL, 42, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 17:27:13.133345-05', 1, '20219980000102', 'Asignación de TRD', 1, '1234567890', NULL, 32, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 17:27:20.970797-05', 1, '20219980000102', '*Modificado TRD* COMUNICACIONES OFICIALES/Actas Comité de Participación Local de Salud (COPACO)/Comunicaciones oficiales', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 17:27:44.560065-05', 1, '20219980000102', 'Se actualizó el estado del radicado a <b>"En tramite"</b>, ya se cargó el formato de respuesta.', 1, '1234567890', NULL, 69, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 17:27:48.316339-05', 1, '20219980000191', ' ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 17:27:48.316339-05', 1, '20219980000102', 'Se actualizó el estado del radicado a <b>"Con Respuesta"</b> y se asigno el número 20219980000191', 1, '1234567890', NULL, 69, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 17:30:39.053757-05', 1, '20219980000201', ' Se radicado correctamente el documento ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-13 17:31:32.484454-05', 1, '20219980000201', 'Asignación de TRD', 998, '1234567890', NULL, 32, NULL, '1234567890', '1');
INSERT INTO hist_eventos VALUES ('998', '2021-04-15 10:13:58.192931-05', 1, '20219980000092', ' Almacenado en Fisico ', 1, '1234567890', NULL, 57, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-15 11:18:40.033578-05', 1, '20219980000092', 'Se realizó transferencia manual.', 1, '1234567890', NULL, 67, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-15 14:42:11.633787-05', 1, '20219980000102', ' Almacenado en Fisico ', 1, '1234567890', NULL, 57, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-15 14:43:11.488017-05', 1, '20219980000102', 'Se realizó transferencia manual.', 1, '1234567890', NULL, 67, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-15 15:08:31.100841-05', 1, '20219980000191', ' Almacenado en Fisico ', 1, '1234567890', NULL, 57, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-15 15:16:57.737467-05', 1, '20219980000191', 'Se realizó transferencia manual.', 1, '1234567890', NULL, 67, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-16 15:14:58.800541-05', 1, '20219980000014', ' Se radicado correctamente el documento ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-16 16:16:53.642178-05', 1, '20219980000112', ' Se radicado correctamente el documento ', 1, '1234567890', NULL, 2, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-16 16:16:53.647156-05', 1, '20219980000112', 'A: JMGAMEZ - Se ha generado el radicado No.20219980000112 y se esta notificando.', 2, '1234567890', NULL, 8, NULL, '1022982735', '101');
INSERT INTO hist_eventos VALUES ('998', '2021-04-16 16:21:02.716297-05', 1, '20219980000112', 'se adjunta documento', 1, '1234567890', NULL, 42, NULL, '1234567890', '998');
INSERT INTO hist_eventos VALUES ('998', '2021-04-16 16:25:58.067202-05', 1, '20219980000112', 'aprobado para pago', 1, '1234567890', NULL, 9, NULL, '1234567890', '998');


--
-- Data for Name: informados; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO informados VALUES ('20219980000011', 1, '998', 'A: ADMON - Se ha generado el radicado No.20219980000011 y se esta notificando. ', '2021-02-23', 0, NULL, 1234567890, '1234567890', NULL);
INSERT INTO informados VALUES ('20219980000062', 1, '100', 'A: RECEPCION.INVM - Se ha generado el radicado No.20219980000062 y se esta notificando. ', '2021-03-31', 0, NULL, 1234567890, '1022982736', NULL);
INSERT INTO informados VALUES ('20219980000062', 1, '998', 'A: ADMON - Se ha generado el radicado No.20219980000062 y se esta notificando. ', '2021-03-31', 1, NULL, 1234567890, '1234567890', NULL);
INSERT INTO informados VALUES ('20219980000102', 2, '101', 'A: JMGAMEZ - Se ha generado el radicado No.20219980000102 y se esta notificando. ', '2021-04-13', 0, NULL, 1234567890, '1022982735', NULL);
INSERT INTO informados VALUES ('20219980000102', 1, '998', 'A: ADMON - Se ha generado el radicado No.20219980000102 y se esta notificando. ', '2021-04-13', 1, NULL, 1234567890, '1234567890', NULL);
INSERT INTO informados VALUES ('20219980000112', 2, '101', 'A: JMGAMEZ - Se ha generado el radicado No.20219980000112 y se esta notificando. ', '2021-04-16', 0, NULL, 1234567890, '1022982735', NULL);


--
-- Data for Name: inventario_documental; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO inventario_documental VALUES (66, 'Dependencia', '998', '0001', 'CENTRAL', '0001-998', 'SERIE', 'SUBSERIE', '2020-12-01', '2020-12-31', 500, 500, 500, '', 500, 500, 500, 3, 'NOTAS', 'SOPORTE');
INSERT INTO inventario_documental VALUES (68, 'ua', 'op', 'no', 'ob', 'co', 'no', 'sub', '2020-12-09', '2020-12-25', 1, 2, 3, '4', 5, 6, 7, 2, 'Prueba de carga', '8');


--
-- Data for Name: inventario_documentos; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO inventario_documentos VALUES (34, '20209980000214.pdf', '202000000034.pdf', '/dk1/www/html/orfeo-6.0/bodega/2020/inventario/202000000034.pdf', 'pdf', '3489', 1234567890, '2020-12-16', 66);
INSERT INTO inventario_documentos VALUES (36, 'PDF PRUEBA.pdf', '202000000036.pdf', '/dk1/www/html/orfeo-6.0/bodega/2020/inventario/202000000036.pdf', 'pdf', '44930', 1234567890, '2020-12-16', 66);
INSERT INTO inventario_documentos VALUES (38, 'El español de Colombia.pdf', '202000000038.pdf', '/dk1/www/html/orfeo-6.0/bodega/2020/inventario/202000000038.pdf', 'pdf', '29075', 1234567890, '2020-12-17', 68);


--
-- Data for Name: medio_recepcion; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO medio_recepcion VALUES (1, 'Mensajeria');
INSERT INTO medio_recepcion VALUES (6, 'Telefono');
INSERT INTO medio_recepcion VALUES (3, 'Correo electrónico');
INSERT INTO medio_recepcion VALUES (4, 'Personal');
INSERT INTO medio_recepcion VALUES (5, 'Pagina web');


--
-- Data for Name: municipio; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO municipio VALUES (1, 10, 'NEW YORK', 1, 249, '0', NULL, 1);
INSERT INTO municipio VALUES (8, 9, 'BARCELONA', 2, 724, '0', NULL, 1);
INSERT INTO municipio VALUES (1, 16, 'GINEBRA', 2, 767, '0', NULL, 1);
INSERT INTO municipio VALUES (16, 9, 'CUENCA', 2, 724, '0', NULL, 1);
INSERT INTO municipio VALUES (1, 5, 'MEDELLIN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (2, 5, 'ABEJORRAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (4, 5, 'ABRIAQUI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (21, 5, 'ALEJANDRIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (30, 5, 'AMAGA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (31, 5, 'AMALFI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (34, 5, 'ANDES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (36, 5, 'ANGELOPOLIS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (38, 5, 'ANGOSTURA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (40, 5, 'ANORI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (42, 5, 'SANTA FE DE ANTIOQUIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (44, 5, 'ANZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (51, 5, 'ARBOLETES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (55, 5, 'ARGELIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (59, 5, 'ARMENIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (79, 5, 'BARBOSA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (86, 5, 'BELMIRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (88, 5, 'BELLO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (91, 5, 'BETANIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (93, 5, 'BETULIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (101, 5, 'CIUDAD BOLIVAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (107, 5, 'BRICEÑO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (113, 5, 'BURITICA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (120, 5, 'CACERES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (125, 5, 'CAICEDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (129, 5, 'CALDAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (134, 5, 'CAMPAMENTO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (138, 5, 'CAÑASGORDAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (142, 5, 'CARACOLI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (145, 5, 'CARAMANTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (147, 5, 'CAREPA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (148, 5, 'EL CARMEN DE VIBORAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (150, 5, 'CAROLINA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (154, 5, 'CAUCASIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (172, 5, 'CHIGORODO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (190, 5, 'CISNEROS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (197, 5, 'COCORNA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (206, 5, 'CONCEPCION', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (209, 5, 'CONCORDIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (212, 5, 'COPACABANA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (234, 5, 'DABEIBA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (237, 5, 'DON MATIAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (240, 5, 'EBEJICO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (250, 5, 'EL BAGRE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (264, 5, 'ENTRERRIOS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (266, 5, 'ENVIGADO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (282, 5, 'FREDONIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (284, 5, 'FRONTINO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (306, 5, 'GIRALDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (308, 5, 'GIRARDOTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (310, 5, 'GOMEZ PLATA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (313, 5, 'GRANADA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (315, 5, 'GUADALUPE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (318, 5, 'GUARNE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (321, 5, 'GUATAPE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (347, 5, 'HELICONIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (353, 5, 'HISPANIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (360, 5, 'ITAGUI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (361, 5, 'ITUANGO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (364, 5, 'JARDIN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (368, 5, 'JERICO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (376, 5, 'LA CEJA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (380, 5, 'LA ESTRELLA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (390, 5, 'LA PINTADA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (400, 5, 'LA UNION', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (411, 5, 'LIBORINA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (425, 5, 'MACEO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (440, 5, 'MARINILLA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (467, 5, 'MONTEBELLO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (475, 5, 'MURINDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (480, 5, 'MUTATA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (483, 5, 'NARIÑO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (490, 5, 'NECOCLI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (495, 5, 'NECHI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (501, 5, 'OLAYA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (541, 5, 'PEÑOL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (543, 5, 'PEQUE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (576, 5, 'PUEBLORRICO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (585, 5, 'PUERTO NARE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (591, 5, 'PUERTO TRIUNFO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (604, 5, 'REMEDIOS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (607, 5, 'RETIRO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (615, 5, 'RIONEGRO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (628, 5, 'SABANALARGA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (631, 5, 'SABANETA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (642, 5, 'SALGAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (647, 5, 'SAN ANDRES DE CUERQUIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (649, 5, 'SAN CARLOS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (652, 5, 'SAN FRANCISCO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (656, 5, 'SAN JERONIMO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (658, 5, 'SAN JOSE DE LA MONTAÑA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (659, 5, 'SAN JUAN DE URABA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (660, 5, 'SAN LUIS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (664, 5, 'SAN PEDRO DE LOS MILAGROS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (665, 5, 'SAN PEDRO DE URABA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (667, 5, 'SAN RAFAEL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (670, 5, 'SAN ROQUE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (674, 5, 'SAN VICENTE FERRER', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (679, 5, 'SANTA BARBARA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (686, 5, 'SANTA ROSA DE OSOS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (690, 5, 'SANTO DOMINGO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (697, 5, 'EL SANTUARIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (736, 5, 'SEGOVIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (756, 5, 'SONSON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (761, 5, 'SOPETRAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (789, 5, 'TAMESIS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (790, 5, 'TARAZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (792, 5, 'TARSO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (809, 5, 'TITIRIBI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (819, 5, 'TOLEDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (837, 5, 'TURBO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (842, 5, 'URAMITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (847, 5, 'URRAO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (854, 5, 'VALDIVIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (856, 5, 'VALPARAISO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (858, 5, 'VEGACHI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (861, 5, 'VENECIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (873, 5, 'VIGIA DEL FUERTE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (885, 5, 'YALI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (887, 5, 'YARUMAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (890, 5, 'YOLOMBO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (893, 5, 'YONDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (895, 5, 'ZARAGOZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 8, 'BARRANQUILLA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (78, 8, 'BARANOA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (137, 8, 'CAMPO DE LA CRUZ', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (141, 8, 'CANDELARIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (296, 8, 'GALAPA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (372, 8, 'JUAN DE ACOSTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (421, 8, 'LURUACO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (433, 8, 'MALAMBO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (436, 8, 'MANATI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (520, 8, 'PALMAR DE VARELA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (549, 8, 'PIOJO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (558, 8, 'POLONUEVO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (560, 8, 'PONEDERA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (573, 8, 'PUERTO COLOMBIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (606, 8, 'REPELON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (634, 8, 'SABANAGRANDE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (638, 8, 'SABANALARGA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (675, 8, 'SANTA LUCIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (685, 8, 'SANTO TOMAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (758, 8, 'SOLEDAD', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (770, 8, 'SUAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (832, 8, 'TUBARA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (849, 8, 'USIACURI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 13, 'CARTAGENA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (6, 13, 'ACHI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (30, 13, 'ALTOS DEL ROSARIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (42, 13, 'ARENAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (52, 13, 'ARJONA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (62, 13, 'ARROYOHONDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (74, 13, 'BARRANCO DE LOBA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (140, 13, 'CALAMAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (160, 13, 'CANTAGALLO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (188, 13, 'CICUCO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (212, 13, 'CORDOBA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (222, 13, 'CLEMENCIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (244, 13, 'EL CARMEN DE BOLIVAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (248, 13, 'EL GUAMO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (268, 13, 'EL PEÑON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (300, 13, 'HATILLO DE LOBA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (430, 13, 'MAGANGUE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (433, 13, 'MAHATES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (440, 13, 'MARGARITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (442, 13, 'MARIA LA BAJA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (458, 13, 'MONTECRISTO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (468, 13, 'MOMPOS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (473, 13, 'MORALES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (490, 13, 'NOROSI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (549, 13, 'PINILLOS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (580, 13, 'REGIDOR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (600, 13, 'RIO VIEJO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (620, 13, 'SAN CRISTOBAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (647, 13, 'SAN ESTANISLAO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (650, 13, 'SAN FERNANDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (654, 13, 'SAN JACINTO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (655, 13, 'SAN JACINTO DEL CAUCA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (657, 13, 'SAN JUAN NEPOMUCENO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (667, 13, 'SAN MARTIN DE LOBA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (670, 13, 'SAN PABLO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (673, 13, 'SANTA CATALINA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (683, 13, 'SANTA ROSA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (688, 13, 'SANTA ROSA DEL SUR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (744, 13, 'SIMITI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (760, 13, 'SOPLAVIENTO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (780, 13, 'TALAIGUA NUEVO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (810, 13, 'TIQUISIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (836, 13, 'TURBACO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (838, 13, 'TURBANA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (873, 13, 'VILLANUEVA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (894, 13, 'ZAMBRANO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 15, 'TUNJA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (22, 15, 'ALMEIDA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (47, 15, 'AQUITANIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (51, 15, 'ARCABUCO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (87, 15, 'BELEN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (90, 15, 'BERBEO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (92, 15, 'BETEITIVA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (97, 15, 'BOAVITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (104, 15, 'BOYACA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (106, 15, 'BRICEÑO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (109, 15, 'BUENAVISTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (114, 15, 'BUSBANZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (131, 15, 'CALDAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (135, 15, 'CAMPOHERMOSO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (162, 15, 'CERINZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (172, 15, 'CHINAVITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (176, 15, 'CHIQUINQUIRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (180, 15, 'CHISCAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (183, 15, 'CHITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (185, 15, 'CHITARAQUE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (187, 15, 'CHIVATA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (189, 15, 'CIENEGA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (204, 15, 'COMBITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (212, 15, 'COPER', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (215, 15, 'CORRALES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (218, 15, 'COVARACHIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (223, 15, 'CUBARA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (224, 15, 'CUCAITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (226, 15, 'CUITIVA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (232, 15, 'CHIQUIZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (236, 15, 'CHIVOR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (238, 15, 'DUITAMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (244, 15, 'EL COCUY', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (248, 15, 'EL ESPINO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (272, 15, 'FIRAVITOBA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (276, 15, 'FLORESTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (293, 15, 'GACHANTIVA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (296, 15, 'GAMEZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (299, 15, 'GARAGOA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (317, 15, 'GUACAMAYAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (322, 15, 'GUATEQUE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (325, 15, 'GUAYATA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (332, 15, 'GUICAN DE LA SIERRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (362, 15, 'IZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (367, 15, 'JENESANO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (368, 15, 'JERICO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (377, 15, 'LABRANZAGRANDE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (380, 15, 'LA CAPILLA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (401, 15, 'LA VICTORIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (403, 15, 'LA UVITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (407, 15, 'VILLA DE LEYVA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (425, 15, 'MACANAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (442, 15, 'MARIPI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (455, 15, 'MIRAFLORES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (464, 15, 'MONGUA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (466, 15, 'MONGUI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (469, 15, 'MONIQUIRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (476, 15, 'MOTAVITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (480, 15, 'MUZO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (491, 15, 'NOBSA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (494, 15, 'NUEVO COLON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (500, 15, 'OICATA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (507, 15, 'OTANCHE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (511, 15, 'PACHAVITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (514, 15, 'PAEZ', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (516, 15, 'PAIPA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (518, 15, 'PAJARITO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (522, 15, 'PANQUEBA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (531, 15, 'PAUNA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (533, 15, 'PAYA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (537, 15, 'PAZ DE RIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (542, 15, 'PESCA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (550, 15, 'PISBA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (572, 15, 'PUERTO BOYACA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (580, 15, 'QUIPAMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (599, 15, 'RAMIRIQUI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (600, 15, 'RAQUIRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (621, 15, 'RONDON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (632, 15, 'SABOYA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (638, 15, 'SACHICA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (646, 15, 'SAMACA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (660, 15, 'SAN EDUARDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (664, 15, 'SAN JOSE DE PARE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (667, 15, 'SAN LUIS DE GACENO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (673, 15, 'SAN MATEO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (676, 15, 'SAN MIGUEL DE SEMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (681, 15, 'SAN PABLO DE BORBUR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (686, 15, 'SANTANA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (690, 15, 'SANTA MARIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (693, 15, 'SANTA ROSA DE VITERBO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (696, 15, 'SANTA SOFIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (720, 15, 'SATIVANORTE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (723, 15, 'SATIVASUR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (740, 15, 'SIACHOQUE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (753, 15, 'SOATA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (755, 15, 'SOCOTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (757, 15, 'SOCHA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (759, 15, 'SOGAMOSO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (761, 15, 'SOMONDOCO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (762, 15, 'SORA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (763, 15, 'SOTAQUIRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (764, 15, 'SORACA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (774, 15, 'SUSACON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (776, 15, 'SUTAMARCHAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (778, 15, 'SUTATENZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (790, 15, 'TASCO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (798, 15, 'TENZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (804, 15, 'TIBANA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (806, 15, 'TIBASOSA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (808, 15, 'TINJACA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (810, 15, 'TIPACOQUE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (814, 15, 'TOCA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (816, 15, 'TOGUI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (820, 15, 'TOPAGA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (822, 15, 'TOTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (832, 15, 'TUNUNGUA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (835, 15, 'TURMEQUE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (837, 15, 'TUTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (839, 15, 'TUTAZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (842, 15, 'UMBITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (861, 15, 'VENTAQUEMADA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (879, 15, 'VIRACACHA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (897, 15, 'ZETAQUIRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 17, 'MANIZALES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (13, 17, 'AGUADAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (42, 17, 'ANSERMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (50, 17, 'ARANZAZU', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (88, 17, 'BELALCAZAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (174, 17, 'CHINCHINA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (272, 17, 'FILADELFIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (380, 17, 'LA DORADA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (388, 17, 'LA MERCED', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (433, 17, 'MANZANARES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (442, 17, 'MARMATO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (444, 17, 'MARQUETALIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (446, 17, 'MARULANDA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (486, 17, 'NEIRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (495, 17, 'NORCASIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (513, 17, 'PACORA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (524, 17, 'PALESTINA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (541, 17, 'PENSILVANIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (614, 17, 'RIOSUCIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (616, 17, 'RISARALDA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (653, 17, 'SALAMINA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (662, 17, 'SAMANA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (665, 17, 'SAN JOSE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (777, 17, 'SUPIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (867, 17, 'VICTORIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (873, 17, 'VILLAMARIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (877, 17, 'VITERBO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 19, 'POPAYAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (22, 19, 'ALMAGUER', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (50, 19, 'ARGELIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (75, 19, 'BALBOA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (100, 19, 'BOLIVAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (110, 19, 'BUENOS AIRES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (130, 19, 'CAJIBIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (137, 19, 'CALDONO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (142, 19, 'CALOTO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (212, 19, 'CORINTO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (256, 19, 'EL TAMBO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (290, 19, 'FLORENCIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (300, 19, 'GUACHENE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (318, 19, 'GUAPI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (355, 19, 'INZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (364, 19, 'JAMBALO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (392, 19, 'LA SIERRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (397, 19, 'LA VEGA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (418, 19, 'LOPEZ DE MICAY', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (450, 19, 'MERCADERES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (455, 19, 'MIRANDA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (473, 19, 'MORALES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (513, 19, 'PADILLA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (517, 19, 'PAEZ', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (532, 19, 'PATIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (533, 19, 'PIAMONTE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (548, 19, 'PIENDAMO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (573, 19, 'PUERTO TEJADA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (585, 19, 'PURACE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (622, 19, 'ROSAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (693, 19, 'SAN SEBASTIAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (698, 19, 'SANTANDER DE QUILICHAO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (701, 19, 'SANTA ROSA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (743, 19, 'SILVIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (760, 19, 'SOTARA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (780, 19, 'SUAREZ', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (785, 19, 'SUCRE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (807, 19, 'TIMBIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (809, 19, 'TIMBIQUI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (821, 19, 'TORIBIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (824, 19, 'TOTORO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (845, 19, 'VILLA RICA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 20, 'VALLEDUPAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (13, 20, 'AGUSTIN CODAZZI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (32, 20, 'ASTREA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (45, 20, 'BECERRIL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (60, 20, 'BOSCONIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (175, 20, 'CHIMICHAGUA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (178, 20, 'CHIRIGUANA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (228, 20, 'CURUMANI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (238, 20, 'EL COPEY', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (250, 20, 'EL PASO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (295, 20, 'GAMARRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (310, 20, 'GONZALEZ', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (383, 20, 'LA GLORIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (400, 20, 'LA JAGUA DE IBIRICO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (443, 20, 'MANAURE BALCON DEL CESAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (517, 20, 'PAILITAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (550, 20, 'PELAYA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (570, 20, 'PUEBLO BELLO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (614, 20, 'RIO DE ORO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (621, 20, 'LA PAZ', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (710, 20, 'SAN ALBERTO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (750, 20, 'SAN DIEGO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (770, 20, 'SAN MARTIN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (787, 20, 'TAMALAMEQUE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 23, 'MONTERIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (68, 23, 'AYAPEL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (79, 23, 'BUENAVISTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (90, 23, 'CANALETE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (162, 23, 'CERETE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (168, 23, 'CHIMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (182, 23, 'CHINU', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (189, 23, 'CIENAGA DE ORO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (300, 23, 'COTORRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (350, 23, 'LA APARTADA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (417, 23, 'LORICA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (419, 23, 'LOS CORDOBAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (464, 23, 'MOMIL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (466, 23, 'MONTELIBANO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (500, 23, 'MOÑITOS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (555, 23, 'PLANETA RICA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (570, 23, 'PUEBLO NUEVO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (574, 23, 'PUERTO ESCONDIDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (580, 23, 'PUERTO LIBERTADOR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (586, 23, 'PURISIMA DE LA CONCEPCION', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (660, 23, 'SAHAGUN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (670, 23, 'SAN ANDRES DE SOTAVENTO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (672, 23, 'SAN ANTERO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (675, 23, 'SAN BERNARDO DEL VIENTO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (678, 23, 'SAN CARLOS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (682, 23, 'SAN JOSE DE URE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (686, 23, 'SAN PELAYO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (807, 23, 'TIERRALTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (815, 23, 'TUCHIN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (855, 23, 'VALENCIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 25, 'AGUA DE DIOS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (19, 25, 'ALBAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (35, 25, 'ANAPOIMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (40, 25, 'ANOLAIMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (53, 25, 'ARBELAEZ', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (86, 25, 'BELTRAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (95, 25, 'BITUIMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (99, 25, 'BOJACA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (120, 25, 'CABRERA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (123, 25, 'CACHIPAY', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (126, 25, 'CAJICA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (148, 25, 'CAPARRAPI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (151, 25, 'CAQUEZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (154, 25, 'CARMEN DE CARUPA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (168, 25, 'CHAGUANI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (175, 25, 'CHIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (178, 25, 'CHIPAQUE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (181, 25, 'CHOACHI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (183, 25, 'CHOCONTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (200, 25, 'COGUA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (214, 25, 'COTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (224, 25, 'CUCUNUBA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (245, 25, 'EL COLEGIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (258, 25, 'EL PEÑON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (260, 25, 'EL ROSAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (269, 25, 'FACATATIVA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (279, 25, 'FOMEQUE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (281, 25, 'FOSCA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (286, 25, 'FUNZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (288, 25, 'FUQUENE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (290, 25, 'FUSAGASUGA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (293, 25, 'GACHALA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (295, 25, 'GACHANCIPA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (297, 25, 'GACHETA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (299, 25, 'GAMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (307, 25, 'GIRARDOT', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (312, 25, 'GRANADA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (317, 25, 'GUACHETA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (320, 25, 'GUADUAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (322, 25, 'GUASCA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (324, 25, 'GUATAQUI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (326, 25, 'GUATAVITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (328, 25, 'GUAYABAL DE SIQUIMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (335, 25, 'GUAYABETAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (339, 25, 'GUTIERREZ', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (368, 25, 'JERUSALEN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (372, 25, 'JUNIN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (377, 25, 'LA CALERA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (386, 25, 'LA MESA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (394, 25, 'LA PALMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (398, 25, 'LA PEÑA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (402, 25, 'LA VEGA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (407, 25, 'LENGUAZAQUE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (426, 25, 'MACHETA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (430, 25, 'MADRID', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (436, 25, 'MANTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (438, 25, 'MEDINA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (473, 25, 'MOSQUERA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (483, 25, 'NARIÑO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (486, 25, 'NEMOCON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (488, 25, 'NILO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (489, 25, 'NIMAIMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (491, 25, 'NOCAIMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (506, 25, 'VENECIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (513, 25, 'PACHO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (518, 25, 'PAIME', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (524, 25, 'PANDI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (530, 25, 'PARATEBUENO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (535, 25, 'PASCA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (572, 25, 'PUERTO SALGAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (580, 25, 'PULI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (592, 25, 'QUEBRADANEGRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (594, 25, 'QUETAME', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (596, 25, 'QUIPILE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (599, 25, 'APULO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (612, 25, 'RICAURTE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (645, 25, 'SAN ANTONIO DEL TEQUENDAMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (649, 25, 'SAN BERNARDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (653, 25, 'SAN CAYETANO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (658, 25, 'SAN FRANCISCO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (662, 25, 'SAN JUAN DE RIOSECO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (718, 25, 'SASAIMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (736, 25, 'SESQUILE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (740, 25, 'SIBATE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (743, 25, 'SILVANIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (745, 25, 'SIMIJACA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (754, 25, 'SOACHA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (758, 25, 'SOPO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (769, 25, 'SUBACHOQUE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (772, 25, 'SUESCA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (777, 25, 'SUPATA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (779, 25, 'SUSA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (781, 25, 'SUTATAUSA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (785, 25, 'TABIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (793, 25, 'TAUSA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (797, 25, 'TENA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (799, 25, 'TENJO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (805, 25, 'TIBACUY', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (807, 25, 'TIBIRITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (815, 25, 'TOCAIMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (817, 25, 'TOCANCIPA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (823, 25, 'TOPAIPI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (839, 25, 'UBALA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (841, 25, 'UBAQUE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (843, 25, 'VILLA DE SAN DIEGO DE UBATE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (845, 25, 'UNE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (851, 25, 'UTICA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (862, 25, 'VERGARA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (867, 25, 'VIANI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (871, 25, 'VILLAGOMEZ', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (873, 25, 'VILLAPINZON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (875, 25, 'VILLETA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (878, 25, 'VIOTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (885, 25, 'YACOPI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (898, 25, 'ZIPACON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (899, 25, 'ZIPAQUIRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 27, 'QUIBDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (6, 27, 'ACANDI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (25, 27, 'ALTO BAUDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (50, 27, 'ATRATO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (73, 27, 'BAGADO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (75, 27, 'BAHIA SOLANO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (77, 27, 'BAJO BAUDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (99, 27, 'BOJAYA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (135, 27, 'EL CANTON DEL SAN PABLO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (150, 27, 'CARMEN DEL DARIEN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (160, 27, 'CERTEGUI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (205, 27, 'CONDOTO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (245, 27, 'EL CARMEN DE ATRATO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (250, 27, 'EL LITORAL DEL SAN JUAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (361, 27, 'ISTMINA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (372, 27, 'JURADO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (413, 27, 'LLORO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (425, 27, 'MEDIO ATRATO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (430, 27, 'MEDIO BAUDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (450, 27, 'MEDIO SAN JUAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (491, 27, 'NOVITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (495, 27, 'NUQUI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (580, 27, 'RIO IRO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (600, 27, 'RIO QUITO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (615, 27, 'RIOSUCIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (660, 27, 'SAN JOSE DEL PALMAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (745, 27, 'SIPI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (787, 27, 'TADO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (800, 27, 'UNGUIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (810, 27, 'UNION PANAMERICANA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 41, 'NEIVA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (6, 41, 'ACEVEDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (13, 41, 'AGRADO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (16, 41, 'AIPE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (20, 41, 'ALGECIRAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (26, 41, 'ALTAMIRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (78, 41, 'BARAYA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (132, 41, 'CAMPOALEGRE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (206, 41, 'COLOMBIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (244, 41, 'ELIAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (298, 41, 'GARZON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (306, 41, 'GIGANTE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (319, 41, 'GUADALUPE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (349, 41, 'HOBO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (357, 41, 'IQUIRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (359, 41, 'ISNOS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (378, 41, 'LA ARGENTINA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (396, 41, 'LA PLATA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (483, 41, 'NATAGA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (503, 41, 'OPORAPA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (518, 41, 'PAICOL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (524, 41, 'PALERMO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (530, 41, 'PALESTINA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (548, 41, 'PITAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (551, 41, 'PITALITO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (615, 41, 'RIVERA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (660, 41, 'SALADOBLANCO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (668, 41, 'SAN AGUSTIN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (676, 41, 'SANTA MARIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (770, 41, 'SUAZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (791, 41, 'TARQUI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (797, 41, 'TESALIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (799, 41, 'TELLO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (801, 41, 'TERUEL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (807, 41, 'TIMANA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (872, 41, 'VILLAVIEJA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (885, 41, 'YAGUARA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 44, 'RIOHACHA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (35, 44, 'ALBANIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (78, 44, 'BARRANCAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (90, 44, 'DIBULLA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (98, 44, 'DISTRACCION', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (110, 44, 'EL MOLINO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (279, 44, 'FONSECA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (378, 44, 'HATONUEVO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (420, 44, 'LA JAGUA DEL PILAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (430, 44, 'MAICAO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (560, 44, 'MANAURE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (650, 44, 'SAN JUAN DEL CESAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (847, 44, 'URIBIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (855, 44, 'URUMITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (874, 44, 'VILLANUEVA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 47, 'SANTA MARTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (30, 47, 'ALGARROBO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (53, 47, 'ARACATACA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (58, 47, 'ARIGUANI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (161, 47, 'CERRO DE SAN ANTONIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (170, 47, 'CHIVOLO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (189, 47, 'CIENAGA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (205, 47, 'CONCORDIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (245, 47, 'EL BANCO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (258, 47, 'EL PIÑON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (268, 47, 'EL RETEN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (288, 47, 'FUNDACION', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (318, 47, 'GUAMAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (460, 47, 'NUEVA GRANADA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (541, 47, 'PEDRAZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (545, 47, 'PIJIÑO DEL CARMEN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (551, 47, 'PIVIJAY', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (555, 47, 'PLATO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (570, 47, 'PUEBLOVIEJO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (605, 47, 'REMOLINO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (660, 47, 'SABANAS DE SAN ANGEL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (675, 47, 'SALAMINA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (692, 47, 'SAN SEBASTIAN DE BUENAVISTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (703, 47, 'SAN ZENON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (707, 47, 'SANTA ANA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (720, 47, 'SANTA BARBARA DE PINTO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (745, 47, 'SITIONUEVO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (798, 47, 'TENERIFE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (960, 47, 'ZAPAYAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (980, 47, 'ZONA BANANERA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 50, 'VILLAVICENCIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (6, 50, 'ACACIAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (110, 50, 'BARRANCA DE UPIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (124, 50, 'CABUYARO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (150, 50, 'CASTILLA LA NUEVA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (223, 50, 'CUBARRAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (226, 50, 'CUMARAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (245, 50, 'EL CALVARIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (251, 50, 'EL CASTILLO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (270, 50, 'EL DORADO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (287, 50, 'FUENTE DE ORO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (313, 50, 'GRANADA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (318, 50, 'GUAMAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (325, 50, 'MAPIRIPAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (330, 50, 'MESETAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (350, 50, 'LA MACARENA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (370, 50, 'URIBE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (400, 50, 'LEJANIAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (450, 50, 'PUERTO CONCORDIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (568, 50, 'PUERTO GAITAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (573, 50, 'PUERTO LOPEZ', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (577, 50, 'PUERTO LLERAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (590, 50, 'PUERTO RICO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (606, 50, 'RESTREPO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (680, 50, 'SAN CARLOS DE GUAROA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (683, 50, 'SAN JUAN DE ARAMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (686, 50, 'SAN JUANITO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (689, 50, 'SAN MARTIN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (711, 50, 'VISTAHERMOSA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 52, 'PASTO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (19, 52, 'ALBAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (22, 52, 'ALDANA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (36, 52, 'ANCUYA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (51, 52, 'ARBOLEDA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (79, 52, 'BARBACOAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (83, 52, 'BELEN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (110, 52, 'BUESACO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (203, 52, 'COLON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (207, 52, 'CONSACA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (210, 52, 'CONTADERO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (215, 52, 'CORDOBA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (224, 52, 'CUASPUD', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (227, 52, 'CUMBAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (233, 52, 'CUMBITARA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (240, 52, 'CHACHAGUI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (250, 52, 'EL CHARCO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (254, 52, 'EL PEÑOL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (256, 52, 'EL ROSARIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (258, 52, 'EL TABLON DE GOMEZ', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (260, 52, 'EL TAMBO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (287, 52, 'FUNES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (317, 52, 'GUACHUCAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (320, 52, 'GUAITARILLA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (323, 52, 'GUALMATAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (352, 52, 'ILES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (354, 52, 'IMUES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (356, 52, 'IPIALES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (378, 52, 'LA CRUZ', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (381, 52, 'LA FLORIDA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (385, 52, 'LA LLANADA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (390, 52, 'LA TOLA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (399, 52, 'LA UNION', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (405, 52, 'LEIVA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (411, 52, 'LINARES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (418, 52, 'LOS ANDES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (427, 52, 'MAGUI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (435, 52, 'MALLAMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (473, 52, 'MOSQUERA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (480, 52, 'NARIÑO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (490, 52, 'OLAYA HERRERA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (506, 52, 'OSPINA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (520, 52, 'FRANCISCO PIZARRO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (540, 52, 'POLICARPA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (560, 52, 'POTOSI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (565, 52, 'PROVIDENCIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (573, 52, 'PUERRES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (585, 52, 'PUPIALES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (612, 52, 'RICAURTE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (621, 52, 'ROBERTO PAYAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (678, 52, 'SAMANIEGO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (683, 52, 'SANDONA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (685, 52, 'SAN BERNARDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (687, 52, 'SAN LORENZO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (693, 52, 'SAN PABLO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (694, 52, 'SAN PEDRO DE CARTAGO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (696, 52, 'SANTA BARBARA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (699, 52, 'SANTACRUZ', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (720, 52, 'SAPUYES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (786, 52, 'TAMINANGO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (788, 52, 'TANGUA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (835, 52, 'SAN ANDRES DE TUMACO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (838, 52, 'TUQUERRES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (885, 52, 'YACUANQUER', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 54, 'CUCUTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (3, 54, 'ABREGO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (51, 54, 'ARBOLEDAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (99, 54, 'BOCHALEMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (109, 54, 'BUCARASICA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (125, 54, 'CACOTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (128, 54, 'CACHIRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (172, 54, 'CHINACOTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (174, 54, 'CHITAGA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (206, 54, 'CONVENCION', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (223, 54, 'CUCUTILLA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (239, 54, 'DURANIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (245, 54, 'EL CARMEN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (250, 54, 'EL TARRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (261, 54, 'EL ZULIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (313, 54, 'GRAMALOTE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (344, 54, 'HACARI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (347, 54, 'HERRAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (377, 54, 'LABATECA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (385, 54, 'LA ESPERANZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (398, 54, 'LA PLAYA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (405, 54, 'LOS PATIOS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (418, 54, 'LOURDES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (480, 54, 'MUTISCUA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (498, 54, 'OCAÑA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (518, 54, 'PAMPLONA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (520, 54, 'PAMPLONITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (553, 54, 'PUERTO SANTANDER', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (599, 54, 'RAGONVALIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (660, 54, 'SALAZAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (670, 54, 'SAN CALIXTO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (673, 54, 'SAN CAYETANO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (680, 54, 'SANTIAGO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (720, 54, 'SARDINATA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (743, 54, 'SILOS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (800, 54, 'TEORAMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (810, 54, 'TIBU', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (820, 54, 'TOLEDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (871, 54, 'VILLA CARO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (874, 54, 'VILLA DEL ROSARIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 63, 'ARMENIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (111, 63, 'BUENAVISTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (130, 63, 'CALARCA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (190, 63, 'CIRCASIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (212, 63, 'CORDOBA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (272, 63, 'FILANDIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (302, 63, 'GENOVA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (401, 63, 'LA TEBAIDA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (470, 63, 'MONTENEGRO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (548, 63, 'PIJAO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (594, 63, 'QUIMBAYA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (690, 63, 'SALENTO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 66, 'PEREIRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (45, 66, 'APIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (75, 66, 'BALBOA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (88, 66, 'BELEN DE UMBRIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (170, 66, 'DOSQUEBRADAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (318, 66, 'GUATICA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (383, 66, 'LA CELIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (400, 66, 'LA VIRGINIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (440, 66, 'MARSELLA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (456, 66, 'MISTRATO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (572, 66, 'PUEBLO RICO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (594, 66, 'QUINCHIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (682, 66, 'SANTA ROSA DE CABAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (687, 66, 'SANTUARIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 68, 'BUCARAMANGA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (13, 68, 'AGUADA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (20, 68, 'ALBANIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (51, 68, 'ARATOCA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (77, 68, 'BARBOSA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (79, 68, 'BARICHARA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (81, 68, 'BARRANCABERMEJA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (92, 68, 'BETULIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (101, 68, 'BOLIVAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (121, 68, 'CABRERA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (132, 68, 'CALIFORNIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (147, 68, 'CAPITANEJO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (152, 68, 'CARCASI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (160, 68, 'CEPITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (162, 68, 'CERRITO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (167, 68, 'CHARALA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (169, 68, 'CHARTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (176, 68, 'CHIMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (179, 68, 'CHIPATA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (190, 68, 'CIMITARRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (207, 68, 'CONCEPCION', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (209, 68, 'CONFINES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (211, 68, 'CONTRATACION', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (217, 68, 'COROMORO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (229, 68, 'CURITI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (235, 68, 'EL CARMEN DE CHUCURI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (245, 68, 'EL GUACAMAYO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (250, 68, 'EL PEÑON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (255, 68, 'EL PLAYON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (264, 68, 'ENCINO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (266, 68, 'ENCISO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (271, 68, 'FLORIAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (276, 68, 'FLORIDABLANCA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (296, 68, 'GALAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (298, 68, 'GAMBITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (307, 68, 'GIRON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (318, 68, 'GUACA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (320, 68, 'GUADALUPE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (322, 68, 'GUAPOTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (324, 68, 'GUAVATA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (327, 68, 'GUEPSA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (344, 68, 'HATO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (368, 68, 'JESUS MARIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (370, 68, 'JORDAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (377, 68, 'LA BELLEZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (385, 68, 'LANDAZURI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (397, 68, 'LA PAZ', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (406, 68, 'LEBRIJA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (418, 68, 'LOS SANTOS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (425, 68, 'MACARAVITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (432, 68, 'MALAGA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (444, 68, 'MATANZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (464, 68, 'MOGOTES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (468, 68, 'MOLAGAVITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (498, 68, 'OCAMONTE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (500, 68, 'OIBA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (502, 68, 'ONZAGA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (522, 68, 'PALMAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (524, 68, 'PALMAS DEL SOCORRO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (533, 68, 'PARAMO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (547, 68, 'PIEDECUESTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (549, 68, 'PINCHOTE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (572, 68, 'PUENTE NACIONAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (573, 68, 'PUERTO PARRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (575, 68, 'PUERTO WILCHES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (615, 68, 'RIONEGRO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (655, 68, 'SABANA DE TORRES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (669, 68, 'SAN ANDRES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (673, 68, 'SAN BENITO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (679, 68, 'SAN GIL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (682, 68, 'SAN JOAQUIN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (684, 68, 'SAN JOSE DE MIRANDA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (686, 68, 'SAN MIGUEL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (689, 68, 'SAN VICENTE DE CHUCURI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (705, 68, 'SANTA BARBARA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (720, 68, 'SANTA HELENA DEL OPON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (745, 68, 'SIMACOTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (755, 68, 'SOCORRO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (770, 68, 'SUAITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (773, 68, 'SUCRE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (780, 68, 'SURATA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (820, 68, 'TONA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (855, 68, 'VALLE DE SAN JOSE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (861, 68, 'VELEZ', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (867, 68, 'VETAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (872, 68, 'VILLANUEVA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (895, 68, 'ZAPATOCA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 70, 'SINCELEJO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (110, 70, 'BUENAVISTA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (124, 70, 'CAIMITO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (204, 70, 'COLOSO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (215, 70, 'COROZAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (221, 70, 'COVEÑAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (230, 70, 'CHALAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (233, 70, 'EL ROBLE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (235, 70, 'GALERAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (265, 70, 'GUARANDA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (400, 70, 'LA UNION', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (418, 70, 'LOS PALMITOS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (429, 70, 'MAJAGUAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (473, 70, 'MORROA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (508, 70, 'OVEJAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (523, 70, 'PALMITO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (670, 70, 'SAMPUES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (678, 70, 'SAN BENITO ABAD', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (702, 70, 'SAN JUAN DE BETULIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (708, 70, 'SAN MARCOS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (713, 70, 'SAN ONOFRE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (717, 70, 'SAN PEDRO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (742, 70, 'SAN LUIS DE SINCE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (771, 70, 'SUCRE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (820, 70, 'SANTIAGO DE TOLU', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (823, 70, 'TOLU VIEJO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 73, 'IBAGUE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (24, 73, 'ALPUJARRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (26, 73, 'ALVARADO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (30, 73, 'AMBALEMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (43, 73, 'ANZOATEGUI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (55, 73, 'ARMERO GUAYABAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (67, 73, 'ATACO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (124, 73, 'CAJAMARCA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (148, 73, 'CARMEN DE APICALA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (152, 73, 'CASABIANCA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (168, 73, 'CHAPARRAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (200, 73, 'COELLO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (217, 73, 'COYAIMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (226, 73, 'CUNDAY', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (236, 73, 'DOLORES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (268, 73, 'ESPINAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (270, 73, 'FALAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (275, 73, 'FLANDES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (283, 73, 'FRESNO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (319, 73, 'GUAMO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (347, 73, 'HERVEO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (349, 73, 'HONDA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (352, 73, 'ICONONZO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (408, 73, 'LERIDA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (411, 73, 'LIBANO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (443, 73, 'SAN SEBASTIAN DE MARIQUITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (449, 73, 'MELGAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (461, 73, 'MURILLO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (483, 73, 'NATAGAIMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (504, 73, 'ORTEGA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (520, 73, 'PALOCABILDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (547, 73, 'PIEDRAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (555, 73, 'PLANADAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (563, 73, 'PRADO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (585, 73, 'PURIFICACION', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (616, 73, 'RIOBLANCO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (622, 73, 'RONCESVALLES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (624, 73, 'ROVIRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (671, 73, 'SALDAÑA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (675, 73, 'SAN ANTONIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (678, 73, 'SAN LUIS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (686, 73, 'SANTA ISABEL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (770, 73, 'SUAREZ', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (854, 73, 'VALLE DE SAN JUAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (861, 73, 'VENADILLO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (870, 73, 'VILLAHERMOSA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (873, 73, 'VILLARRICA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 76, 'CALI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (20, 76, 'ALCALA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (36, 76, 'ANDALUCIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (41, 76, 'ANSERMANUEVO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (54, 76, 'ARGELIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (100, 76, 'BOLIVAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (109, 76, 'BUENAVENTURA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (111, 76, 'GUADALAJARA DE BUGA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (113, 76, 'BUGALAGRANDE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (122, 76, 'CAICEDONIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (126, 76, 'CALIMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (130, 76, 'CANDELARIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (147, 76, 'CARTAGO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (233, 76, 'DAGUA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (243, 76, 'EL AGUILA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (246, 76, 'EL CAIRO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (248, 76, 'EL CERRITO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (250, 76, 'EL DOVIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (275, 76, 'FLORIDA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (306, 76, 'GINEBRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (318, 76, 'GUACARI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (364, 76, 'JAMUNDI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (377, 76, 'LA CUMBRE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (400, 76, 'LA UNION', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (403, 76, 'LA VICTORIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (497, 76, 'OBANDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (520, 76, 'PALMIRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (563, 76, 'PRADERA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (606, 76, 'RESTREPO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (616, 76, 'RIOFRIO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (622, 76, 'ROLDANILLO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (670, 76, 'SAN PEDRO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (736, 76, 'SEVILLA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (823, 76, 'TORO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (828, 76, 'TRUJILLO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (834, 76, 'TULUA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (845, 76, 'ULLOA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (863, 76, 'VERSALLES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (869, 76, 'VIJES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (890, 76, 'YOTOCO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (892, 76, 'YUMBO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (895, 76, 'ZARZAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 81, 'ARAUCA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (65, 81, 'ARAUQUITA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (220, 81, 'CRAVO NORTE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (300, 81, 'FORTUL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (591, 81, 'PUERTO RONDON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (736, 81, 'SARAVENA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (794, 81, 'TAME', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 85, 'YOPAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (10, 85, 'AGUAZUL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (15, 85, 'CHAMEZA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (125, 85, 'HATO COROZAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (136, 85, 'LA SALINA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (139, 85, 'MANI', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (230, 85, 'OROCUE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (250, 85, 'PAZ DE ARIPORO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (263, 85, 'PORE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (279, 85, 'RECETOR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (300, 85, 'SABANALARGA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (315, 85, 'SACAMA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (325, 85, 'SAN LUIS DE PALENQUE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (400, 85, 'TAMARA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (410, 85, 'TAURAMENA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (430, 85, 'TRINIDAD', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (440, 85, 'VILLANUEVA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 86, 'MOCOA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (219, 86, 'COLON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (320, 86, 'ORITO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (568, 86, 'PUERTO ASIS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (569, 86, 'PUERTO CAICEDO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (571, 86, 'PUERTO GUZMAN', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (573, 86, 'PUERTO LEGUIZAMO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (749, 86, 'SIBUNDOY', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (755, 86, 'SAN FRANCISCO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (757, 86, 'SAN MIGUEL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (760, 86, 'SANTIAGO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (865, 86, 'VALLE DEL GUAMUEZ', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (885, 86, 'VILLAGARZON', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 88, 'SAN ANDRES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (564, 88, 'PROVIDENCIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 91, 'LETICIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (263, 91, 'EL ENCANTO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (405, 91, 'LA CHORRERA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (407, 91, 'LA PEDRERA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (430, 91, 'LA VICTORIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (460, 91, 'MIRITI - PARANA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (530, 91, 'PUERTO ALEGRIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (536, 91, 'PUERTO ARICA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (540, 91, 'PUERTO NARIÑO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (669, 91, 'PUERTO SANTANDER', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (798, 91, 'TARAPACA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 94, 'INIRIDA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (343, 94, 'BARRANCO MINAS', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (663, 94, 'MAPIRIPANA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (883, 94, 'SAN FELIPE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (884, 94, 'PUERTO COLOMBIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (885, 94, 'LA GUADALUPE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (886, 94, 'CACAHUAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (887, 94, 'PANA PANA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (888, 94, 'MORICHAL', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 95, 'SAN JOSE DEL GUAVIARE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (15, 95, 'CALAMAR', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (25, 95, 'EL RETORNO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (200, 95, 'MIRAFLORES', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (1, 97, 'MITU', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (161, 97, 'CARURU', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (511, 97, 'PACOA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (666, 97, 'TARAIRA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (777, 97, 'PAPUNAUA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (889, 97, 'YAVARATE', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (524, 99, 'LA PRIMAVERA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (624, 99, 'SANTA ROSALIA', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (773, 99, 'CUMARIBO', 1, 170, NULL, NULL, 1);
INSERT INTO municipio VALUES (579, 5, 'Puerto Berrio', 1, 170, '0', NULL, 1);
INSERT INTO municipio VALUES (1, 11, 'BOGOTA', 1, 170, '1', '1-170-11-1', 1);
INSERT INTO municipio VALUES (225, 85, 'NUNCHIA', 1, 170, '1', '0-', 1);
INSERT INTO municipio VALUES (11, 20, 'AGUACHICA', 1, 170, '1', '0-', 1);
INSERT INTO municipio VALUES (162, 85, 'MONTERREY', 1, 170, '1', '1-170-25-123', 1);
INSERT INTO municipio VALUES (45, 5, 'APARTADÓ', 1, 170, '0', NULL, 1);


--
-- Data for Name: nivel_academico_pqrs; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO nivel_academico_pqrs VALUES (1, 'Educación Básica Primaria');
INSERT INTO nivel_academico_pqrs VALUES (2, 'Educación Básica Secundaria');
INSERT INTO nivel_academico_pqrs VALUES (3, 'Técnico/Tecnologo');
INSERT INTO nivel_academico_pqrs VALUES (4, 'Profesional');
INSERT INTO nivel_academico_pqrs VALUES (5, 'Especializacion');
INSERT INTO nivel_academico_pqrs VALUES (6, 'Maestría');


--
-- Name: nivel_academico_pqrs_id_nivel_acad_pqrs_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('nivel_academico_pqrs_id_nivel_acad_pqrs_seq', 1, false);


--
-- Name: num_resol_dtc; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('num_resol_dtc', 1, false);


--
-- Name: num_resol_dtn; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('num_resol_dtn', 1, false);


--
-- Name: num_resol_dtoc; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('num_resol_dtoc', 1, false);


--
-- Name: num_resol_dtor; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('num_resol_dtor', 1, false);


--
-- Name: num_resol_dts; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('num_resol_dts', 1, false);


--
-- Name: num_resol_gral; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('num_resol_gral', 1, false);


--
-- Data for Name: par_serv_servicios; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--



--
-- Data for Name: perfiles; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO perfiles VALUES (2, 'ADMINISTRADOR DEL SISTEMA', '1', '1', '1', '1', 5, 1, 2, 1, 1, '0', 0, 3, 3, 3, 3, 1, 1, 2, 0, 2, 1, 2, 0, 1, 1, 1, 0, 2, 0, '1', '1', 0, 1, 0, 1, 1, 0, 1, 0, 1, 1, 3, 1, 1, 1, NULL, 0, 1, 1, 1);
INSERT INTO perfiles VALUES (1, 'ADMINISTRADOR TABLAS DE RETENCIÓN DOCUMENTAL', '1', '0', '1', '1', 3, 0, 2, 0, 0, '0', 0, 3, 3, 0, 0, 0, 0, 0, 0, 1, 0, 2, 0, 1, 1, 1, 0, 2, 0, '1', '1', 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 2, 1, 0, 1, NULL, 0, 1, 0, 0);
INSERT INTO perfiles VALUES (3, 'FUNCIONARIO', '1', '0', '1', '1', 3, 0, 0, 0, 0, '0', 0, 1, 3, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0, 2, 0, '1', '1', 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 2, 1, 0, 0, NULL, 0, 0, 0, 0);
INSERT INTO perfiles VALUES (4, 'JEFE', '1', '0', '1', '1', 3, 0, 0, 0, 0, '0', 0, 1, 3, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0, 2, 0, '1', '1', 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 2, 1, 1, 0, NULL, 0, 0, 0, 0);
INSERT INTO perfiles VALUES (5, 'VENTANILLA DE RADICACIÓN', '1', '1', '1', '1', 3, 1, 0, 0, 1, '0', 0, 1, 3, 3, 3, 1, 1, 2, 0, 0, 0, 0, 0, 0, 1, 1, 0, 2, 0, '1', '1', 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 2, 1, 0, 0, NULL, 0, 0, 0, 0);


--
-- Name: perfiles_codi_perfil_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('perfiles_codi_perfil_seq', 6, false);


--
-- Data for Name: pl_generado_plg; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--



--
-- Data for Name: pl_tipo_plt; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--



--
-- Data for Name: plan_table; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--



--
-- Data for Name: plantilla_pl; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--



--
-- Name: plsql_profiler_runnumeric; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('plsql_profiler_runnumeric', 1, false);


--
-- Data for Name: pre_radicado; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--



--
-- Data for Name: preguntas; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO preguntas VALUES (1, '¿Cual era el nombre de tu primera mascota ?');
INSERT INTO preguntas VALUES (2, '¿Cual es el nombre de la ciudad en la que naciste?');
INSERT INTO preguntas VALUES (3, '¿Cual era el apodo de tu infancia?');
INSERT INTO preguntas VALUES (4, '¿Cual es el nombre de tu Abuelo?');
INSERT INTO preguntas VALUES (5, '¿Como se llama la primera escuela a la que asististe?');


--
-- Name: pres_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('pres_seq', 30392, false);


--
-- Data for Name: prestamo; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--



--
-- Data for Name: radicado; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO radicado VALUES ('20219980000141', '2021-03-31 12:14:56.631012-05', 145, NULL, NULL, 0, NULL, NULL, '2021-03-31', NULL, NULL, NULL, NULL, NULL, '170', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '20219980000062', '/2021/998/docs/120219980000062_00001.pdf', 2, '101', NULL, NULL, NULL, NULL, NULL, '', 'ADMON', '998', NULL, 1, 3, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-04-05 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, false, NULL, NULL, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000022', '2021-02-23 17:39:31.022139-05', 459, 0, 4, 0, NULL, NULL, '2021-02-23', 0, NULL, NULL, NULL, NULL, '170', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1 folio', '0', '2021/998/20219980000022.pdf', 1, '999', NULL, NULL, NULL, NULL, NULL, 'Radicaciones de pruebas para el proceso de validación', 'ADMON', '998', NULL, 1, 1, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-02-26 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, true, true, NULL, 4, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000121', '2021-03-31 10:48:36.719563-05', 145, NULL, NULL, 0, NULL, NULL, '2021-03-31', NULL, NULL, NULL, NULL, NULL, '170', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '20219980000052', '/2021/998/docs/120219980000052_00003.pdf', 1, '100', NULL, NULL, NULL, NULL, NULL, '', 'ADMON', '998', NULL, 1, 3, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-04-04 00:00:00-05', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, false, NULL, NULL, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000062', '2021-03-31 11:36:38.411506-05', 155, 0, 4, 0, NULL, NULL, '2021-03-31', 0, NULL, NULL, NULL, NULL, '170', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '2021/998/20219980000062.pdf', 2, '101', NULL, NULL, NULL, NULL, NULL, 'Radicaciones de pruebas para el proceso', 'ADMON', '998', NULL, 1, 3, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-04-05 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, false, NULL, 5, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000081', '2021-03-09 10:27:49.103704-05', 155, 1, NULL, NULL, NULL, NULL, '2021-03-09', 1, '1234567890', NULL, NULL, NULL, 'COLOMBIA', 1, NULL, 99, 9, 11, NULL, NULL, NULL, NULL, 0, '', '0', '/2021/998/docs/1234567890_2021_03_09_10_12_50.docx', 1, '998', NULL, NULL, NULL, NULL, NULL, '', NULL, '998', NULL, 1, 1, 1, 1, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL, false, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO radicado VALUES ('20219980000091', '2021-03-09 10:27:49.103704-05', 155, 1, NULL, NULL, NULL, NULL, '2021-03-09', 1, '1234567890', NULL, NULL, NULL, 'COLOMBIA', 1, NULL, 99, 9, 11, NULL, NULL, NULL, NULL, 0, '', '0', '/2021/998/docs/1234567890_2021_03_09_10_12_50.docx', 1, '998', NULL, NULL, NULL, NULL, NULL, '', NULL, '998', NULL, 1, 1, 1, 1, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL, false, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO radicado VALUES ('20219980000051', '2021-02-23 16:48:58.409761-05', 455, NULL, NULL, 0, NULL, NULL, '2021-02-23', NULL, NULL, NULL, NULL, NULL, '170', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '20219980000012', '/2021/998/docs/120219980000012_00002.pdf', 1, '998', NULL, NULL, NULL, NULL, NULL, '', NULL, '998', NULL, 1, 5, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-02-26 00:00:00-05', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, false, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO radicado VALUES ('20219980000101', '2021-03-09 10:27:49.103704-05', 155, 1, NULL, NULL, NULL, NULL, '2021-03-09', 1, '1234567890', NULL, NULL, NULL, 'COLOMBIA', 1, NULL, 99, 9, 11, NULL, NULL, NULL, NULL, 0, '', '0', '/2021/998/docs/1234567890_2021_03_09_10_12_50.docx', 1, '998', NULL, NULL, NULL, NULL, NULL, '', NULL, '998', NULL, 1, 1, 1, 1, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL, false, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO radicado VALUES ('20219980000061', '2021-02-23 17:41:50.203955-05', 455, NULL, NULL, 0, NULL, NULL, '2021-02-23', NULL, NULL, NULL, NULL, NULL, '170', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '20219980000022', '/2021/998/docs/120219980000022_00002.pdf', 1, '999', NULL, NULL, NULL, NULL, NULL, '', 'ADMON', '998', NULL, 1, 1, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-02-26 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, true, NULL, 4, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000131', '2021-03-31 10:50:01.230526-05', 145, NULL, NULL, 0, NULL, NULL, '2021-03-31', NULL, NULL, NULL, NULL, NULL, '170', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '20219980000052', '/2021/998/docs/120219980000052_00004.pdf', 1, '100', NULL, NULL, NULL, NULL, NULL, '', 'ADMON', '998', NULL, 1, 3, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-04-04 00:00:00-05', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, false, NULL, NULL, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000052', '2021-03-31 10:32:06.518428-05', 327, 0, 4, 0, NULL, NULL, '2021-03-31', 0, NULL, NULL, NULL, NULL, '170', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '2021/998/20219980000052.pdf', 1, '100', NULL, NULL, NULL, NULL, NULL, 'Radicaciones de pruebas para el proceso', 'ADMON', '998', NULL, 1, 3, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-04-04 00:00:00-05', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, true, false, NULL, 5, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000031', '2021-02-23 14:58:09.60168-05', 455, NULL, NULL, 0, NULL, NULL, '2021-02-23', NULL, NULL, NULL, NULL, NULL, '170', NULL, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '20219980000021', '/2021/998/docs/120219980000021_00002.pdf', 2, '101', NULL, NULL, NULL, NULL, NULL, '', 'ADMON', '998', NULL, 1, 5, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-02-24 00:00:00-05', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, '2021-04-13 00:00:00-05', NULL, false, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO radicado VALUES ('20219980000111', '2021-03-31 10:34:33.616189-05', 145, NULL, NULL, 0, NULL, NULL, '2021-03-31', NULL, NULL, NULL, NULL, NULL, '170', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '20219980000052', '/2021/998/docs/120219980000052_00002.docx', 1, '100', NULL, NULL, NULL, NULL, NULL, '', 'ADMON', '998', NULL, 1, 3, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-04-04 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, false, NULL, NULL, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000181', '2021-04-13 17:00:10.17476-05', 2, NULL, NULL, 0, NULL, NULL, '2021-04-13', NULL, NULL, NULL, NULL, NULL, '170', NULL, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '20219980000042', '/2021/998/docs/120219980000042_00004.pdf', 2, '101', NULL, NULL, NULL, NULL, NULL, '', 'ADMON', '998', NULL, 1, 5, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-04-09 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, '2021-04-13 00:00:00-05', NULL, false, NULL, NULL, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000071', '2021-02-23 18:00:54.214015-05', 455, NULL, NULL, 0, NULL, NULL, '2021-02-23', NULL, NULL, NULL, NULL, NULL, '170', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '20219980000012', '/2021/998/docs/120219980000012_00003.pdf', 1, '998', NULL, NULL, NULL, NULL, NULL, '', NULL, '998', NULL, 1, 5, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-02-26 00:00:00-05', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, false, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO radicado VALUES ('20219980000041', '2021-02-23 16:42:34.26997-05', 455, 0, 4, 0, NULL, NULL, '2021-02-23', 0, NULL, NULL, NULL, NULL, '170', NULL, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1 Folio', '0', '/2021/998/docs/120219980000041_00001.pdf', 2, '101', NULL, NULL, NULL, NULL, NULL, 'Radicaciones de pruebas para el proceso de validación', 'ADMON', '998', NULL, 1, 5, 1, 0, 1, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-02-23 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, '2021-04-13 00:00:00-05', NULL, true, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO radicado VALUES ('20219980000032', '2021-02-24 15:29:46.339231-05', 248, 0, 4, 0, NULL, NULL, '2021-02-24', 0, NULL, NULL, NULL, NULL, '170', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '0', '2021/998/20219980000032.pdf', 1, '100', NULL, NULL, NULL, NULL, NULL, 'Radicaciones de facturas recepcionadas en la entrada', NULL, '998', NULL, 1, 3, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-04-04 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, true, false, NULL, 2, NULL, NULL, NULL, NULL);
INSERT INTO radicado VALUES ('20219980000082', '2021-04-07 09:29:50.789853-05', 477, 0, 4, 0, NULL, NULL, '2021-04-07', 0, NULL, NULL, NULL, NULL, '170', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '2021/998/20219980000082.pdf', 1, '999', NULL, NULL, NULL, NULL, NULL, 'Solicitud de tala', 'ADMON', '998', NULL, 1, 1, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-04-18 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, 1, NULL, NULL, 0, NULL, 1, NULL, NULL, false, NULL, 5, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000151', '2021-04-07 09:39:59.053384-05', 455, NULL, NULL, 0, NULL, NULL, '2021-04-07', NULL, NULL, NULL, NULL, NULL, '170', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '20219980000082', '/2021/998/docs/120219980000082_00001.odt', 1, '999', NULL, NULL, NULL, NULL, NULL, '', 'ADMON', '998', NULL, 1, 1, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-04-18 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, 1, NULL, NULL, 0, NULL, 1, NULL, NULL, false, NULL, NULL, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000042', '2021-03-01 08:28:46.62342-05', 248, 0, 4, 0, NULL, NULL, '2021-03-01', 0, NULL, NULL, NULL, NULL, '170', NULL, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2 facturas', '0', '2021/998/20219980000042.pdf', 2, '101', NULL, NULL, NULL, NULL, NULL, 'Recepción de facturas', 'ADMON', '998', NULL, 1, 5, 1, 0, 1, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-04-09 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, '2021-04-13 00:00:00-05', NULL, false, NULL, 5, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000021', '2021-02-23 14:45:03.514159-05', 455, 0, 4, 0, NULL, NULL, '2021-02-23', 0, NULL, NULL, NULL, NULL, '170', NULL, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1 folio', '0', '/2021/998/docs/120219980000021_00001.pdf', 2, '101', NULL, NULL, NULL, NULL, NULL, 'Radicaciones de pruebas para el proceso correspondiente', 'ADMON', '998', NULL, 1, 5, 1, 0, 1, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-02-24 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, '2021-04-13 00:00:00-05', NULL, true, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO radicado VALUES ('20219980000092', '2021-04-08 09:39:16.450006-05', 248, 0, 4, 0, NULL, NULL, '2021-04-08', 0, NULL, NULL, NULL, NULL, '170', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '0', '2021/998/20219980000092.pdf', 1, '999', NULL, NULL, NULL, NULL, NULL, 'Factura 022', 'ADMON', '998', NULL, 1, 1, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-04-20 00:00:00-05', NULL, NULL, 1, 0, NULL, '0', NULL, NULL, NULL, 0, NULL, 2, NULL, NULL, false, NULL, 4, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000161', '2021-04-13 16:18:51.413878-05', 2, NULL, NULL, 0, NULL, NULL, '2021-04-13', NULL, NULL, NULL, NULL, NULL, '170', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '20219980000092', '/2021/998/docs/120219980000092_00001.pdf', 1, '999', NULL, NULL, NULL, NULL, NULL, '', 'ADMON', '998', NULL, 1, 1, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-04-20 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, false, NULL, 4, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000072', '2021-03-31 12:25:09.107661-05', 145, 0, 3, 0, NULL, NULL, '2021-03-31', 0, NULL, NULL, NULL, NULL, '170', NULL, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', NULL, 2, '101', NULL, NULL, NULL, NULL, NULL, 'Radicaciones por coreo', 'ADMON', '998', NULL, 1, 5, 1, 0, 1, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-05-06 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, '2021-04-13 00:00:00-05', NULL, false, NULL, 5, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000171', '2021-04-13 16:31:54.577765-05', 455, NULL, NULL, 0, NULL, NULL, '2021-04-13', NULL, NULL, NULL, NULL, NULL, '170', NULL, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '20219980000072', '/2021/998/docs/120219980000072_00001.pdf', 2, '101', NULL, NULL, NULL, NULL, NULL, '', 'ADMON', '998', NULL, 1, 5, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-05-06 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, '2021-04-13 00:00:00-05', NULL, false, NULL, NULL, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000102', '2021-04-13 17:26:00.239709-05', 155, 0, 4, 0, NULL, NULL, '2021-04-13', 0, NULL, NULL, NULL, NULL, '170', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1 Folio', '0', '2021/998/20219980000102.pdf', 1, '999', NULL, NULL, NULL, NULL, NULL, 'RADICACIONES DE PRUEBAS PARA EL PROCESO', 'ADMON', '998', NULL, 1, 1, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-04-15 00:00:00-05', NULL, NULL, 1, 0, NULL, '0', NULL, NULL, NULL, 0, NULL, 2, NULL, true, false, NULL, 4, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000191', '2021-04-13 17:27:48.316339-05', 2, NULL, NULL, 0, NULL, NULL, '2021-04-13', NULL, NULL, NULL, NULL, NULL, '170', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 10, '', '20219980000102', '/2021/998/docs/120219980000102_00001.pdf', 1, '999', NULL, NULL, NULL, NULL, NULL, '', 'ADMON', '998', NULL, 1, 1, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-04-15 00:00:00-05', NULL, NULL, 1, 0, NULL, '4', NULL, NULL, NULL, 0, NULL, 2, NULL, NULL, false, NULL, 4, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000201', '2021-04-13 17:30:39.049994-05', 155, 0, 4, 0, NULL, NULL, '2021-04-13', 0, NULL, NULL, NULL, NULL, '170', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1 Folio', '0', '/2021/998/docs/120219980000201_00001.pdf', 1, '999', NULL, NULL, NULL, NULL, NULL, 'RADICACIONES DE PRUEBAS DE ENTRADA', 'ADMON', '998', NULL, 1, 1, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-04-16 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, false, NULL, 4, NULL, NULL, NULL, '998');
INSERT INTO radicado VALUES ('20219980000014', '2021-04-16 15:14:58.797088-05', 154, 0, 4, 0, NULL, NULL, '2021-04-16', 0, NULL, NULL, NULL, NULL, '170', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', NULL, 1, '998', NULL, NULL, NULL, NULL, NULL, 'Radicaciones de pruebas', NULL, '998', NULL, 1, 5, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-04-19 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL, NULL, false, NULL, 2, NULL, 1, 1, NULL);
INSERT INTO radicado VALUES ('20219980000012', '2021-02-23 16:47:03.612278-05', 155, 0, 4, 0, NULL, NULL, '2021-02-23', 0, NULL, NULL, NULL, NULL, '170', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1 Folio', '0', '2021/998/20219980000012.pdf', 1, '998', NULL, NULL, NULL, NULL, NULL, 'Radicaciones de pruebas de entrada', NULL, '998', NULL, 1, 5, 1, 0, 1, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-02-26 00:00:00-05', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, true, false, NULL, 5, NULL, NULL, NULL, NULL);
INSERT INTO radicado VALUES ('20219980000112', '2021-04-16 16:16:53.63897-05', 248, 0, 4, 0, NULL, NULL, '2021-04-16', 0, NULL, NULL, NULL, NULL, '170', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '2021/998/20219980000112.pdf', 1, '998', NULL, NULL, NULL, NULL, NULL, 'Factura de proveedor 5588', 'ADMON', '998', NULL, 1, 5, 1, 0, 1, '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2021-05-22 00:00:00-05', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, false, NULL, 2, NULL, NULL, NULL, '998');


--
-- Data for Name: rango_edades_pqrs; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO rango_edades_pqrs VALUES (1, 'Menores a 18');
INSERT INTO rango_edades_pqrs VALUES (2, 'Entre 18 a 28');
INSERT INTO rango_edades_pqrs VALUES (3, 'Entre 29 a 59');
INSERT INTO rango_edades_pqrs VALUES (4, 'Mayores 60');
INSERT INTO rango_edades_pqrs VALUES (5, 'N/A');


--
-- Data for Name: respuestas_usuario; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--



--
-- Data for Name: rol_tipos_doc; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO rol_tipos_doc VALUES (2998, 2, 1, 1);
INSERT INTO rol_tipos_doc VALUES (2999, 2, 2, 1);
INSERT INTO rol_tipos_doc VALUES (3000, 2, 3, 1);
INSERT INTO rol_tipos_doc VALUES (3001, 2, 4, 1);
INSERT INTO rol_tipos_doc VALUES (3002, 2, 5, 1);
INSERT INTO rol_tipos_doc VALUES (3003, 2, 6, 1);
INSERT INTO rol_tipos_doc VALUES (3004, 2, 7, 1);
INSERT INTO rol_tipos_doc VALUES (3005, 2, 8, 1);
INSERT INTO rol_tipos_doc VALUES (3006, 2, 9, 1);
INSERT INTO rol_tipos_doc VALUES (3007, 2, 10, 1);
INSERT INTO rol_tipos_doc VALUES (3008, 2, 11, 1);
INSERT INTO rol_tipos_doc VALUES (3009, 2, 12, 1);
INSERT INTO rol_tipos_doc VALUES (3010, 2, 13, 1);
INSERT INTO rol_tipos_doc VALUES (3011, 2, 14, 1);
INSERT INTO rol_tipos_doc VALUES (3012, 2, 15, 1);
INSERT INTO rol_tipos_doc VALUES (3013, 2, 16, 1);
INSERT INTO rol_tipos_doc VALUES (3014, 2, 17, 1);
INSERT INTO rol_tipos_doc VALUES (3015, 2, 18, 1);
INSERT INTO rol_tipos_doc VALUES (3016, 2, 31, 1);
INSERT INTO rol_tipos_doc VALUES (3017, 2, 19, 1);
INSERT INTO rol_tipos_doc VALUES (3018, 2, 20, 1);
INSERT INTO rol_tipos_doc VALUES (3019, 2, 21, 1);
INSERT INTO rol_tipos_doc VALUES (3020, 2, 22, 1);
INSERT INTO rol_tipos_doc VALUES (3021, 2, 23, 1);
INSERT INTO rol_tipos_doc VALUES (3022, 2, 24, 1);
INSERT INTO rol_tipos_doc VALUES (3023, 2, 25, 1);
INSERT INTO rol_tipos_doc VALUES (3024, 2, 26, 1);
INSERT INTO rol_tipos_doc VALUES (3025, 2, 27, 1);
INSERT INTO rol_tipos_doc VALUES (3026, 2, 28, 1);
INSERT INTO rol_tipos_doc VALUES (3027, 2, 29, 1);
INSERT INTO rol_tipos_doc VALUES (3028, 2, 30, 1);
INSERT INTO rol_tipos_doc VALUES (3029, 2, 32, 1);
INSERT INTO rol_tipos_doc VALUES (3030, 2, 33, 1);
INSERT INTO rol_tipos_doc VALUES (3031, 2, 34, 1);
INSERT INTO rol_tipos_doc VALUES (3032, 2, 35, 1);
INSERT INTO rol_tipos_doc VALUES (3033, 2, 36, 1);
INSERT INTO rol_tipos_doc VALUES (3034, 2, 37, 1);
INSERT INTO rol_tipos_doc VALUES (3035, 2, 38, 1);
INSERT INTO rol_tipos_doc VALUES (3036, 2, 39, 1);
INSERT INTO rol_tipos_doc VALUES (3037, 2, 40, 1);
INSERT INTO rol_tipos_doc VALUES (3038, 2, 41, 1);
INSERT INTO rol_tipos_doc VALUES (3039, 2, 43, 1);
INSERT INTO rol_tipos_doc VALUES (3040, 2, 44, 1);
INSERT INTO rol_tipos_doc VALUES (3041, 2, 42, 1);
INSERT INTO rol_tipos_doc VALUES (3042, 2, 45, 1);
INSERT INTO rol_tipos_doc VALUES (3043, 2, 46, 1);
INSERT INTO rol_tipos_doc VALUES (3044, 2, 47, 1);
INSERT INTO rol_tipos_doc VALUES (3045, 2, 48, 1);
INSERT INTO rol_tipos_doc VALUES (3046, 2, 50, 1);
INSERT INTO rol_tipos_doc VALUES (3047, 2, 49, 1);
INSERT INTO rol_tipos_doc VALUES (3048, 2, 51, 1);
INSERT INTO rol_tipos_doc VALUES (3049, 2, 52, 1);
INSERT INTO rol_tipos_doc VALUES (3050, 2, 53, 1);
INSERT INTO rol_tipos_doc VALUES (3051, 2, 54, 1);
INSERT INTO rol_tipos_doc VALUES (3052, 2, 55, 1);
INSERT INTO rol_tipos_doc VALUES (3053, 2, 57, 1);
INSERT INTO rol_tipos_doc VALUES (3054, 2, 56, 1);
INSERT INTO rol_tipos_doc VALUES (3055, 2, 58, 1);
INSERT INTO rol_tipos_doc VALUES (3056, 2, 59, 1);
INSERT INTO rol_tipos_doc VALUES (3057, 2, 60, 1);
INSERT INTO rol_tipos_doc VALUES (3058, 2, 61, 1);
INSERT INTO rol_tipos_doc VALUES (3059, 2, 62, 1);
INSERT INTO rol_tipos_doc VALUES (3060, 2, 63, 1);
INSERT INTO rol_tipos_doc VALUES (3061, 2, 64, 1);
INSERT INTO rol_tipos_doc VALUES (3062, 2, 65, 1);
INSERT INTO rol_tipos_doc VALUES (3063, 2, 66, 1);
INSERT INTO rol_tipos_doc VALUES (3064, 2, 67, 1);
INSERT INTO rol_tipos_doc VALUES (3065, 2, 68, 1);
INSERT INTO rol_tipos_doc VALUES (3066, 2, 69, 1);
INSERT INTO rol_tipos_doc VALUES (3067, 2, 70, 1);
INSERT INTO rol_tipos_doc VALUES (3068, 2, 80, 1);
INSERT INTO rol_tipos_doc VALUES (3069, 2, 71, 1);
INSERT INTO rol_tipos_doc VALUES (3070, 2, 72, 1);
INSERT INTO rol_tipos_doc VALUES (3071, 2, 73, 1);
INSERT INTO rol_tipos_doc VALUES (3072, 2, 74, 1);
INSERT INTO rol_tipos_doc VALUES (3073, 2, 75, 1);
INSERT INTO rol_tipos_doc VALUES (3074, 2, 76, 1);
INSERT INTO rol_tipos_doc VALUES (3075, 2, 77, 1);
INSERT INTO rol_tipos_doc VALUES (3076, 2, 78, 1);
INSERT INTO rol_tipos_doc VALUES (3077, 2, 79, 1);
INSERT INTO rol_tipos_doc VALUES (3078, 2, 81, 1);
INSERT INTO rol_tipos_doc VALUES (3079, 2, 82, 1);
INSERT INTO rol_tipos_doc VALUES (3080, 2, 83, 1);
INSERT INTO rol_tipos_doc VALUES (3081, 2, 84, 1);
INSERT INTO rol_tipos_doc VALUES (3082, 2, 85, 1);
INSERT INTO rol_tipos_doc VALUES (3083, 2, 86, 1);
INSERT INTO rol_tipos_doc VALUES (3084, 2, 87, 1);
INSERT INTO rol_tipos_doc VALUES (3085, 2, 88, 1);
INSERT INTO rol_tipos_doc VALUES (3086, 2, 89, 1);
INSERT INTO rol_tipos_doc VALUES (3087, 2, 90, 1);
INSERT INTO rol_tipos_doc VALUES (3088, 2, 91, 1);
INSERT INTO rol_tipos_doc VALUES (3089, 2, 92, 1);
INSERT INTO rol_tipos_doc VALUES (3090, 2, 93, 1);
INSERT INTO rol_tipos_doc VALUES (3091, 2, 94, 1);
INSERT INTO rol_tipos_doc VALUES (3092, 2, 95, 1);
INSERT INTO rol_tipos_doc VALUES (3093, 2, 96, 1);
INSERT INTO rol_tipos_doc VALUES (3094, 2, 97, 1);
INSERT INTO rol_tipos_doc VALUES (3095, 2, 98, 1);
INSERT INTO rol_tipos_doc VALUES (3096, 2, 99, 1);
INSERT INTO rol_tipos_doc VALUES (3097, 2, 100, 1);
INSERT INTO rol_tipos_doc VALUES (3098, 2, 101, 1);
INSERT INTO rol_tipos_doc VALUES (3099, 2, 102, 1);
INSERT INTO rol_tipos_doc VALUES (3100, 2, 103, 1);
INSERT INTO rol_tipos_doc VALUES (3101, 2, 107, 1);
INSERT INTO rol_tipos_doc VALUES (3102, 2, 104, 1);
INSERT INTO rol_tipos_doc VALUES (3103, 2, 105, 1);
INSERT INTO rol_tipos_doc VALUES (3104, 2, 106, 1);
INSERT INTO rol_tipos_doc VALUES (3105, 2, 109, 1);
INSERT INTO rol_tipos_doc VALUES (3106, 2, 110, 1);
INSERT INTO rol_tipos_doc VALUES (3107, 2, 111, 1);
INSERT INTO rol_tipos_doc VALUES (3108, 2, 112, 1);
INSERT INTO rol_tipos_doc VALUES (3109, 2, 113, 1);
INSERT INTO rol_tipos_doc VALUES (3110, 2, 114, 1);
INSERT INTO rol_tipos_doc VALUES (3111, 2, 117, 1);
INSERT INTO rol_tipos_doc VALUES (3112, 2, 115, 1);
INSERT INTO rol_tipos_doc VALUES (3113, 2, 116, 1);
INSERT INTO rol_tipos_doc VALUES (3114, 2, 108, 1);
INSERT INTO rol_tipos_doc VALUES (3115, 2, 118, 1);
INSERT INTO rol_tipos_doc VALUES (3116, 2, 119, 1);
INSERT INTO rol_tipos_doc VALUES (3117, 2, 120, 1);
INSERT INTO rol_tipos_doc VALUES (3118, 2, 121, 1);
INSERT INTO rol_tipos_doc VALUES (3119, 2, 122, 1);
INSERT INTO rol_tipos_doc VALUES (3120, 2, 123, 1);
INSERT INTO rol_tipos_doc VALUES (3121, 2, 124, 1);
INSERT INTO rol_tipos_doc VALUES (3122, 2, 125, 1);
INSERT INTO rol_tipos_doc VALUES (3123, 2, 126, 1);
INSERT INTO rol_tipos_doc VALUES (3124, 2, 128, 1);
INSERT INTO rol_tipos_doc VALUES (3125, 2, 127, 1);
INSERT INTO rol_tipos_doc VALUES (3126, 2, 129, 1);
INSERT INTO rol_tipos_doc VALUES (3127, 2, 130, 1);
INSERT INTO rol_tipos_doc VALUES (3128, 2, 131, 1);
INSERT INTO rol_tipos_doc VALUES (3129, 2, 132, 1);
INSERT INTO rol_tipos_doc VALUES (3130, 2, 133, 1);
INSERT INTO rol_tipos_doc VALUES (3131, 2, 137, 1);
INSERT INTO rol_tipos_doc VALUES (3132, 2, 134, 1);
INSERT INTO rol_tipos_doc VALUES (3133, 2, 135, 1);
INSERT INTO rol_tipos_doc VALUES (3134, 2, 136, 1);
INSERT INTO rol_tipos_doc VALUES (3135, 2, 138, 1);
INSERT INTO rol_tipos_doc VALUES (3136, 2, 139, 1);
INSERT INTO rol_tipos_doc VALUES (3137, 2, 140, 1);
INSERT INTO rol_tipos_doc VALUES (3138, 2, 141, 1);
INSERT INTO rol_tipos_doc VALUES (3139, 2, 142, 1);
INSERT INTO rol_tipos_doc VALUES (3140, 2, 143, 1);
INSERT INTO rol_tipos_doc VALUES (3141, 2, 144, 1);
INSERT INTO rol_tipos_doc VALUES (3142, 2, 145, 1);
INSERT INTO rol_tipos_doc VALUES (3143, 2, 146, 1);
INSERT INTO rol_tipos_doc VALUES (3144, 2, 147, 1);
INSERT INTO rol_tipos_doc VALUES (3145, 2, 148, 1);
INSERT INTO rol_tipos_doc VALUES (3146, 2, 149, 1);
INSERT INTO rol_tipos_doc VALUES (3147, 2, 150, 1);
INSERT INTO rol_tipos_doc VALUES (3148, 2, 151, 1);
INSERT INTO rol_tipos_doc VALUES (3149, 2, 152, 1);
INSERT INTO rol_tipos_doc VALUES (3150, 2, 153, 1);
INSERT INTO rol_tipos_doc VALUES (3151, 2, 154, 1);
INSERT INTO rol_tipos_doc VALUES (3152, 2, 155, 1);
INSERT INTO rol_tipos_doc VALUES (3153, 2, 156, 1);
INSERT INTO rol_tipos_doc VALUES (3154, 2, 158, 1);
INSERT INTO rol_tipos_doc VALUES (3155, 2, 157, 1);
INSERT INTO rol_tipos_doc VALUES (3156, 2, 159, 1);
INSERT INTO rol_tipos_doc VALUES (3157, 2, 160, 1);
INSERT INTO rol_tipos_doc VALUES (3158, 2, 161, 1);
INSERT INTO rol_tipos_doc VALUES (3159, 2, 162, 1);
INSERT INTO rol_tipos_doc VALUES (3160, 2, 163, 1);
INSERT INTO rol_tipos_doc VALUES (3161, 2, 164, 1);
INSERT INTO rol_tipos_doc VALUES (3162, 2, 165, 1);
INSERT INTO rol_tipos_doc VALUES (3163, 2, 166, 1);
INSERT INTO rol_tipos_doc VALUES (3164, 2, 167, 1);
INSERT INTO rol_tipos_doc VALUES (3165, 2, 168, 1);
INSERT INTO rol_tipos_doc VALUES (3166, 2, 171, 1);
INSERT INTO rol_tipos_doc VALUES (3167, 2, 170, 1);
INSERT INTO rol_tipos_doc VALUES (3168, 2, 172, 1);
INSERT INTO rol_tipos_doc VALUES (3169, 2, 173, 1);
INSERT INTO rol_tipos_doc VALUES (3170, 2, 169, 1);
INSERT INTO rol_tipos_doc VALUES (3171, 2, 174, 1);
INSERT INTO rol_tipos_doc VALUES (3172, 2, 175, 1);
INSERT INTO rol_tipos_doc VALUES (3173, 2, 176, 1);
INSERT INTO rol_tipos_doc VALUES (3174, 2, 177, 1);
INSERT INTO rol_tipos_doc VALUES (3175, 2, 178, 1);
INSERT INTO rol_tipos_doc VALUES (3176, 2, 179, 1);
INSERT INTO rol_tipos_doc VALUES (3177, 2, 180, 1);
INSERT INTO rol_tipos_doc VALUES (3178, 2, 181, 1);
INSERT INTO rol_tipos_doc VALUES (3179, 2, 182, 1);
INSERT INTO rol_tipos_doc VALUES (3180, 2, 183, 1);
INSERT INTO rol_tipos_doc VALUES (3181, 2, 184, 1);
INSERT INTO rol_tipos_doc VALUES (3182, 2, 185, 1);
INSERT INTO rol_tipos_doc VALUES (3183, 2, 186, 1);
INSERT INTO rol_tipos_doc VALUES (3184, 2, 187, 1);
INSERT INTO rol_tipos_doc VALUES (3185, 2, 188, 1);
INSERT INTO rol_tipos_doc VALUES (3186, 2, 189, 1);
INSERT INTO rol_tipos_doc VALUES (3187, 2, 190, 1);
INSERT INTO rol_tipos_doc VALUES (3188, 2, 191, 1);
INSERT INTO rol_tipos_doc VALUES (3189, 2, 192, 1);
INSERT INTO rol_tipos_doc VALUES (3190, 2, 193, 1);
INSERT INTO rol_tipos_doc VALUES (3191, 2, 194, 1);
INSERT INTO rol_tipos_doc VALUES (3192, 2, 195, 1);
INSERT INTO rol_tipos_doc VALUES (3193, 2, 196, 1);
INSERT INTO rol_tipos_doc VALUES (3194, 2, 197, 1);
INSERT INTO rol_tipos_doc VALUES (3195, 2, 198, 1);
INSERT INTO rol_tipos_doc VALUES (3196, 2, 199, 1);
INSERT INTO rol_tipos_doc VALUES (3197, 2, 200, 1);
INSERT INTO rol_tipos_doc VALUES (3198, 2, 201, 1);
INSERT INTO rol_tipos_doc VALUES (3199, 2, 202, 1);
INSERT INTO rol_tipos_doc VALUES (3200, 2, 203, 1);
INSERT INTO rol_tipos_doc VALUES (3201, 2, 204, 1);
INSERT INTO rol_tipos_doc VALUES (3202, 2, 205, 1);
INSERT INTO rol_tipos_doc VALUES (3203, 2, 206, 1);
INSERT INTO rol_tipos_doc VALUES (3204, 2, 207, 1);
INSERT INTO rol_tipos_doc VALUES (3205, 2, 208, 1);
INSERT INTO rol_tipos_doc VALUES (3206, 2, 209, 1);
INSERT INTO rol_tipos_doc VALUES (3207, 2, 210, 1);
INSERT INTO rol_tipos_doc VALUES (3208, 2, 211, 1);
INSERT INTO rol_tipos_doc VALUES (3209, 2, 212, 1);
INSERT INTO rol_tipos_doc VALUES (3210, 2, 213, 1);
INSERT INTO rol_tipos_doc VALUES (3211, 2, 214, 1);
INSERT INTO rol_tipos_doc VALUES (3212, 2, 215, 1);
INSERT INTO rol_tipos_doc VALUES (3213, 2, 217, 1);
INSERT INTO rol_tipos_doc VALUES (3214, 2, 216, 1);
INSERT INTO rol_tipos_doc VALUES (3215, 2, 218, 1);
INSERT INTO rol_tipos_doc VALUES (3216, 2, 219, 1);
INSERT INTO rol_tipos_doc VALUES (3217, 2, 220, 1);
INSERT INTO rol_tipos_doc VALUES (3218, 2, 221, 1);
INSERT INTO rol_tipos_doc VALUES (3219, 2, 222, 1);
INSERT INTO rol_tipos_doc VALUES (3220, 2, 223, 1);
INSERT INTO rol_tipos_doc VALUES (3221, 2, 224, 1);
INSERT INTO rol_tipos_doc VALUES (3222, 2, 225, 1);
INSERT INTO rol_tipos_doc VALUES (3223, 2, 226, 1);
INSERT INTO rol_tipos_doc VALUES (3224, 2, 227, 1);
INSERT INTO rol_tipos_doc VALUES (3225, 2, 228, 1);
INSERT INTO rol_tipos_doc VALUES (3226, 2, 229, 1);
INSERT INTO rol_tipos_doc VALUES (3227, 2, 230, 1);
INSERT INTO rol_tipos_doc VALUES (3228, 2, 231, 1);
INSERT INTO rol_tipos_doc VALUES (3229, 2, 232, 1);
INSERT INTO rol_tipos_doc VALUES (3230, 2, 233, 1);
INSERT INTO rol_tipos_doc VALUES (3231, 2, 234, 1);
INSERT INTO rol_tipos_doc VALUES (3232, 2, 235, 1);
INSERT INTO rol_tipos_doc VALUES (3233, 2, 236, 1);
INSERT INTO rol_tipos_doc VALUES (3234, 2, 237, 1);
INSERT INTO rol_tipos_doc VALUES (3235, 2, 238, 1);
INSERT INTO rol_tipos_doc VALUES (3236, 2, 239, 1);
INSERT INTO rol_tipos_doc VALUES (3237, 2, 240, 1);
INSERT INTO rol_tipos_doc VALUES (3238, 2, 241, 1);
INSERT INTO rol_tipos_doc VALUES (3239, 2, 242, 1);
INSERT INTO rol_tipos_doc VALUES (3240, 2, 243, 1);
INSERT INTO rol_tipos_doc VALUES (3241, 2, 244, 1);
INSERT INTO rol_tipos_doc VALUES (3242, 2, 245, 1);
INSERT INTO rol_tipos_doc VALUES (3243, 2, 246, 1);
INSERT INTO rol_tipos_doc VALUES (3244, 2, 247, 1);
INSERT INTO rol_tipos_doc VALUES (3245, 2, 248, 1);
INSERT INTO rol_tipos_doc VALUES (3246, 2, 249, 1);
INSERT INTO rol_tipos_doc VALUES (3247, 2, 251, 1);
INSERT INTO rol_tipos_doc VALUES (3248, 2, 250, 1);
INSERT INTO rol_tipos_doc VALUES (3249, 2, 499, 1);
INSERT INTO rol_tipos_doc VALUES (3250, 2, 252, 1);
INSERT INTO rol_tipos_doc VALUES (3251, 2, 253, 1);
INSERT INTO rol_tipos_doc VALUES (3252, 2, 255, 1);
INSERT INTO rol_tipos_doc VALUES (3253, 2, 256, 1);
INSERT INTO rol_tipos_doc VALUES (3254, 2, 254, 1);
INSERT INTO rol_tipos_doc VALUES (3255, 2, 257, 1);
INSERT INTO rol_tipos_doc VALUES (3256, 2, 258, 1);
INSERT INTO rol_tipos_doc VALUES (3257, 2, 259, 1);
INSERT INTO rol_tipos_doc VALUES (3258, 2, 260, 1);
INSERT INTO rol_tipos_doc VALUES (3259, 2, 261, 1);
INSERT INTO rol_tipos_doc VALUES (3260, 2, 262, 1);
INSERT INTO rol_tipos_doc VALUES (3261, 2, 263, 1);
INSERT INTO rol_tipos_doc VALUES (3262, 2, 264, 1);
INSERT INTO rol_tipos_doc VALUES (3263, 2, 265, 1);
INSERT INTO rol_tipos_doc VALUES (3264, 2, 266, 1);
INSERT INTO rol_tipos_doc VALUES (3265, 2, 267, 1);
INSERT INTO rol_tipos_doc VALUES (3266, 2, 268, 1);
INSERT INTO rol_tipos_doc VALUES (3267, 2, 269, 1);
INSERT INTO rol_tipos_doc VALUES (3268, 2, 270, 1);
INSERT INTO rol_tipos_doc VALUES (3269, 2, 271, 1);
INSERT INTO rol_tipos_doc VALUES (3270, 2, 272, 1);
INSERT INTO rol_tipos_doc VALUES (3271, 2, 273, 1);
INSERT INTO rol_tipos_doc VALUES (3272, 2, 275, 1);
INSERT INTO rol_tipos_doc VALUES (3273, 2, 276, 1);
INSERT INTO rol_tipos_doc VALUES (3274, 2, 274, 1);
INSERT INTO rol_tipos_doc VALUES (3275, 2, 277, 1);
INSERT INTO rol_tipos_doc VALUES (3276, 2, 278, 1);
INSERT INTO rol_tipos_doc VALUES (3277, 2, 279, 1);
INSERT INTO rol_tipos_doc VALUES (3278, 2, 280, 1);
INSERT INTO rol_tipos_doc VALUES (3279, 2, 281, 1);
INSERT INTO rol_tipos_doc VALUES (3280, 2, 282, 1);
INSERT INTO rol_tipos_doc VALUES (3281, 2, 283, 1);
INSERT INTO rol_tipos_doc VALUES (3282, 2, 286, 1);
INSERT INTO rol_tipos_doc VALUES (3283, 2, 284, 1);
INSERT INTO rol_tipos_doc VALUES (3284, 2, 285, 1);
INSERT INTO rol_tipos_doc VALUES (3285, 2, 287, 1);
INSERT INTO rol_tipos_doc VALUES (3286, 2, 288, 1);
INSERT INTO rol_tipos_doc VALUES (3287, 2, 289, 1);
INSERT INTO rol_tipos_doc VALUES (3288, 2, 290, 1);
INSERT INTO rol_tipos_doc VALUES (3289, 2, 291, 1);
INSERT INTO rol_tipos_doc VALUES (3290, 2, 292, 1);
INSERT INTO rol_tipos_doc VALUES (3291, 2, 294, 1);
INSERT INTO rol_tipos_doc VALUES (3292, 2, 295, 1);
INSERT INTO rol_tipos_doc VALUES (3293, 2, 296, 1);
INSERT INTO rol_tipos_doc VALUES (3294, 2, 293, 1);
INSERT INTO rol_tipos_doc VALUES (3295, 2, 297, 1);
INSERT INTO rol_tipos_doc VALUES (3296, 2, 298, 1);
INSERT INTO rol_tipos_doc VALUES (3297, 2, 299, 1);
INSERT INTO rol_tipos_doc VALUES (3298, 2, 300, 1);
INSERT INTO rol_tipos_doc VALUES (3299, 2, 301, 1);
INSERT INTO rol_tipos_doc VALUES (3300, 2, 302, 1);
INSERT INTO rol_tipos_doc VALUES (3301, 2, 303, 1);
INSERT INTO rol_tipos_doc VALUES (3302, 2, 304, 1);
INSERT INTO rol_tipos_doc VALUES (3303, 2, 305, 1);
INSERT INTO rol_tipos_doc VALUES (3304, 2, 306, 1);
INSERT INTO rol_tipos_doc VALUES (3305, 2, 307, 1);
INSERT INTO rol_tipos_doc VALUES (3306, 2, 308, 1);
INSERT INTO rol_tipos_doc VALUES (3307, 2, 309, 1);
INSERT INTO rol_tipos_doc VALUES (3308, 2, 310, 1);
INSERT INTO rol_tipos_doc VALUES (3309, 2, 311, 1);
INSERT INTO rol_tipos_doc VALUES (3310, 2, 312, 1);
INSERT INTO rol_tipos_doc VALUES (3311, 2, 313, 1);
INSERT INTO rol_tipos_doc VALUES (3312, 2, 314, 1);
INSERT INTO rol_tipos_doc VALUES (3313, 2, 315, 1);
INSERT INTO rol_tipos_doc VALUES (3314, 2, 316, 1);
INSERT INTO rol_tipos_doc VALUES (3315, 2, 317, 1);
INSERT INTO rol_tipos_doc VALUES (3316, 2, 318, 1);
INSERT INTO rol_tipos_doc VALUES (3317, 2, 319, 1);
INSERT INTO rol_tipos_doc VALUES (3318, 2, 320, 1);
INSERT INTO rol_tipos_doc VALUES (3319, 2, 321, 1);
INSERT INTO rol_tipos_doc VALUES (3320, 2, 322, 1);
INSERT INTO rol_tipos_doc VALUES (3321, 2, 323, 1);
INSERT INTO rol_tipos_doc VALUES (3322, 2, 324, 1);
INSERT INTO rol_tipos_doc VALUES (3323, 2, 325, 1);
INSERT INTO rol_tipos_doc VALUES (3324, 2, 326, 1);
INSERT INTO rol_tipos_doc VALUES (3325, 2, 327, 1);
INSERT INTO rol_tipos_doc VALUES (3326, 2, 328, 1);
INSERT INTO rol_tipos_doc VALUES (3327, 2, 329, 1);
INSERT INTO rol_tipos_doc VALUES (3328, 2, 330, 1);
INSERT INTO rol_tipos_doc VALUES (3329, 2, 331, 1);
INSERT INTO rol_tipos_doc VALUES (3330, 2, 332, 1);
INSERT INTO rol_tipos_doc VALUES (3331, 2, 333, 1);
INSERT INTO rol_tipos_doc VALUES (3332, 2, 334, 1);
INSERT INTO rol_tipos_doc VALUES (3333, 2, 335, 1);
INSERT INTO rol_tipos_doc VALUES (3334, 2, 336, 1);
INSERT INTO rol_tipos_doc VALUES (3335, 2, 337, 1);
INSERT INTO rol_tipos_doc VALUES (3336, 2, 500, 1);
INSERT INTO rol_tipos_doc VALUES (3337, 2, 338, 1);
INSERT INTO rol_tipos_doc VALUES (5503, 3, 1, 1);
INSERT INTO rol_tipos_doc VALUES (5504, 3, 2, 1);
INSERT INTO rol_tipos_doc VALUES (5505, 3, 3, 1);
INSERT INTO rol_tipos_doc VALUES (5506, 3, 4, 1);
INSERT INTO rol_tipos_doc VALUES (5507, 3, 5, 1);
INSERT INTO rol_tipos_doc VALUES (5508, 3, 6, 1);
INSERT INTO rol_tipos_doc VALUES (5509, 3, 7, 1);
INSERT INTO rol_tipos_doc VALUES (5510, 3, 8, 1);
INSERT INTO rol_tipos_doc VALUES (5511, 3, 9, 1);
INSERT INTO rol_tipos_doc VALUES (5512, 3, 10, 1);
INSERT INTO rol_tipos_doc VALUES (5513, 3, 11, 1);
INSERT INTO rol_tipos_doc VALUES (5514, 3, 12, 1);
INSERT INTO rol_tipos_doc VALUES (5515, 3, 13, 1);
INSERT INTO rol_tipos_doc VALUES (5516, 3, 14, 1);
INSERT INTO rol_tipos_doc VALUES (5517, 3, 15, 1);
INSERT INTO rol_tipos_doc VALUES (5518, 3, 16, 1);
INSERT INTO rol_tipos_doc VALUES (5519, 3, 17, 1);
INSERT INTO rol_tipos_doc VALUES (5520, 3, 18, 1);
INSERT INTO rol_tipos_doc VALUES (5521, 3, 31, 1);
INSERT INTO rol_tipos_doc VALUES (5522, 3, 19, 1);
INSERT INTO rol_tipos_doc VALUES (5523, 3, 20, 1);
INSERT INTO rol_tipos_doc VALUES (5524, 3, 21, 1);
INSERT INTO rol_tipos_doc VALUES (5525, 3, 22, 1);
INSERT INTO rol_tipos_doc VALUES (5526, 3, 23, 1);
INSERT INTO rol_tipos_doc VALUES (5527, 3, 24, 1);
INSERT INTO rol_tipos_doc VALUES (5528, 3, 25, 1);
INSERT INTO rol_tipos_doc VALUES (5529, 3, 26, 1);
INSERT INTO rol_tipos_doc VALUES (5530, 3, 27, 1);
INSERT INTO rol_tipos_doc VALUES (5531, 3, 28, 1);
INSERT INTO rol_tipos_doc VALUES (5532, 3, 29, 1);
INSERT INTO rol_tipos_doc VALUES (5533, 3, 30, 1);
INSERT INTO rol_tipos_doc VALUES (5534, 3, 32, 1);
INSERT INTO rol_tipos_doc VALUES (5535, 3, 33, 1);
INSERT INTO rol_tipos_doc VALUES (5536, 3, 34, 1);
INSERT INTO rol_tipos_doc VALUES (5537, 3, 35, 1);
INSERT INTO rol_tipos_doc VALUES (5538, 3, 36, 1);
INSERT INTO rol_tipos_doc VALUES (5539, 3, 37, 1);
INSERT INTO rol_tipos_doc VALUES (5540, 3, 38, 1);
INSERT INTO rol_tipos_doc VALUES (5541, 3, 39, 1);
INSERT INTO rol_tipos_doc VALUES (5542, 3, 40, 1);
INSERT INTO rol_tipos_doc VALUES (5543, 3, 41, 1);
INSERT INTO rol_tipos_doc VALUES (5544, 3, 43, 1);
INSERT INTO rol_tipos_doc VALUES (5545, 3, 44, 1);
INSERT INTO rol_tipos_doc VALUES (5546, 3, 42, 1);
INSERT INTO rol_tipos_doc VALUES (5547, 3, 45, 1);
INSERT INTO rol_tipos_doc VALUES (5548, 3, 46, 1);
INSERT INTO rol_tipos_doc VALUES (5549, 3, 47, 1);
INSERT INTO rol_tipos_doc VALUES (5550, 3, 48, 1);
INSERT INTO rol_tipos_doc VALUES (5551, 3, 50, 1);
INSERT INTO rol_tipos_doc VALUES (5552, 3, 49, 1);
INSERT INTO rol_tipos_doc VALUES (5553, 3, 51, 1);
INSERT INTO rol_tipos_doc VALUES (5554, 3, 52, 1);
INSERT INTO rol_tipos_doc VALUES (5555, 3, 53, 1);
INSERT INTO rol_tipos_doc VALUES (5556, 3, 54, 1);
INSERT INTO rol_tipos_doc VALUES (5557, 3, 55, 1);
INSERT INTO rol_tipos_doc VALUES (5558, 3, 57, 1);
INSERT INTO rol_tipos_doc VALUES (5559, 3, 56, 1);
INSERT INTO rol_tipos_doc VALUES (5560, 3, 58, 1);
INSERT INTO rol_tipos_doc VALUES (5561, 3, 59, 1);
INSERT INTO rol_tipos_doc VALUES (5562, 3, 60, 1);
INSERT INTO rol_tipos_doc VALUES (5563, 3, 61, 1);
INSERT INTO rol_tipos_doc VALUES (5564, 3, 62, 1);
INSERT INTO rol_tipos_doc VALUES (5565, 3, 63, 1);
INSERT INTO rol_tipos_doc VALUES (5566, 3, 64, 1);
INSERT INTO rol_tipos_doc VALUES (5567, 3, 65, 1);
INSERT INTO rol_tipos_doc VALUES (5568, 3, 66, 1);
INSERT INTO rol_tipos_doc VALUES (5569, 3, 67, 1);
INSERT INTO rol_tipos_doc VALUES (5570, 3, 68, 1);
INSERT INTO rol_tipos_doc VALUES (5571, 3, 69, 1);
INSERT INTO rol_tipos_doc VALUES (5572, 3, 70, 1);
INSERT INTO rol_tipos_doc VALUES (5573, 3, 80, 1);
INSERT INTO rol_tipos_doc VALUES (5574, 3, 71, 1);
INSERT INTO rol_tipos_doc VALUES (5575, 3, 72, 1);
INSERT INTO rol_tipos_doc VALUES (5576, 3, 73, 1);
INSERT INTO rol_tipos_doc VALUES (5577, 3, 74, 1);
INSERT INTO rol_tipos_doc VALUES (5578, 3, 75, 1);
INSERT INTO rol_tipos_doc VALUES (5579, 3, 76, 1);
INSERT INTO rol_tipos_doc VALUES (5580, 3, 77, 1);
INSERT INTO rol_tipos_doc VALUES (5581, 3, 78, 1);
INSERT INTO rol_tipos_doc VALUES (5582, 3, 79, 1);
INSERT INTO rol_tipos_doc VALUES (5583, 3, 81, 1);
INSERT INTO rol_tipos_doc VALUES (5584, 3, 82, 1);
INSERT INTO rol_tipos_doc VALUES (5585, 3, 83, 1);
INSERT INTO rol_tipos_doc VALUES (5586, 3, 84, 1);
INSERT INTO rol_tipos_doc VALUES (5587, 3, 85, 1);
INSERT INTO rol_tipos_doc VALUES (5588, 3, 86, 1);
INSERT INTO rol_tipos_doc VALUES (5589, 3, 87, 1);
INSERT INTO rol_tipos_doc VALUES (5590, 3, 88, 1);
INSERT INTO rol_tipos_doc VALUES (5591, 3, 89, 1);
INSERT INTO rol_tipos_doc VALUES (5592, 3, 90, 1);
INSERT INTO rol_tipos_doc VALUES (5593, 3, 91, 1);
INSERT INTO rol_tipos_doc VALUES (5594, 3, 92, 1);
INSERT INTO rol_tipos_doc VALUES (5595, 3, 93, 1);
INSERT INTO rol_tipos_doc VALUES (5596, 3, 94, 1);
INSERT INTO rol_tipos_doc VALUES (5597, 3, 95, 1);
INSERT INTO rol_tipos_doc VALUES (5598, 3, 96, 1);
INSERT INTO rol_tipos_doc VALUES (5599, 3, 97, 1);
INSERT INTO rol_tipos_doc VALUES (5600, 3, 98, 1);
INSERT INTO rol_tipos_doc VALUES (5601, 3, 99, 1);
INSERT INTO rol_tipos_doc VALUES (5602, 3, 100, 1);
INSERT INTO rol_tipos_doc VALUES (5603, 3, 101, 1);
INSERT INTO rol_tipos_doc VALUES (5604, 3, 102, 1);
INSERT INTO rol_tipos_doc VALUES (5605, 3, 103, 1);
INSERT INTO rol_tipos_doc VALUES (5606, 3, 107, 1);
INSERT INTO rol_tipos_doc VALUES (5607, 3, 104, 1);
INSERT INTO rol_tipos_doc VALUES (5608, 3, 105, 1);
INSERT INTO rol_tipos_doc VALUES (5609, 3, 106, 1);
INSERT INTO rol_tipos_doc VALUES (5610, 3, 109, 1);
INSERT INTO rol_tipos_doc VALUES (5611, 3, 110, 1);
INSERT INTO rol_tipos_doc VALUES (5612, 3, 111, 1);
INSERT INTO rol_tipos_doc VALUES (5613, 3, 112, 1);
INSERT INTO rol_tipos_doc VALUES (5614, 3, 113, 1);
INSERT INTO rol_tipos_doc VALUES (5615, 3, 114, 1);
INSERT INTO rol_tipos_doc VALUES (5616, 3, 117, 1);
INSERT INTO rol_tipos_doc VALUES (5617, 3, 115, 1);
INSERT INTO rol_tipos_doc VALUES (5618, 3, 116, 1);
INSERT INTO rol_tipos_doc VALUES (5619, 3, 108, 1);
INSERT INTO rol_tipos_doc VALUES (5620, 3, 118, 1);
INSERT INTO rol_tipos_doc VALUES (5621, 3, 119, 1);
INSERT INTO rol_tipos_doc VALUES (5622, 3, 120, 1);
INSERT INTO rol_tipos_doc VALUES (5623, 3, 121, 1);
INSERT INTO rol_tipos_doc VALUES (5624, 3, 122, 1);
INSERT INTO rol_tipos_doc VALUES (5625, 3, 123, 1);
INSERT INTO rol_tipos_doc VALUES (5626, 3, 124, 1);
INSERT INTO rol_tipos_doc VALUES (5627, 3, 125, 1);
INSERT INTO rol_tipos_doc VALUES (5628, 3, 126, 1);
INSERT INTO rol_tipos_doc VALUES (5629, 3, 128, 1);
INSERT INTO rol_tipos_doc VALUES (5630, 3, 127, 1);
INSERT INTO rol_tipos_doc VALUES (5631, 3, 129, 1);
INSERT INTO rol_tipos_doc VALUES (5632, 3, 130, 1);
INSERT INTO rol_tipos_doc VALUES (5633, 3, 131, 1);
INSERT INTO rol_tipos_doc VALUES (5634, 3, 132, 1);
INSERT INTO rol_tipos_doc VALUES (5635, 3, 133, 1);
INSERT INTO rol_tipos_doc VALUES (5636, 3, 137, 1);
INSERT INTO rol_tipos_doc VALUES (5637, 3, 134, 1);
INSERT INTO rol_tipos_doc VALUES (5638, 3, 135, 1);
INSERT INTO rol_tipos_doc VALUES (5639, 3, 136, 1);
INSERT INTO rol_tipos_doc VALUES (5640, 3, 138, 1);
INSERT INTO rol_tipos_doc VALUES (5641, 3, 139, 1);
INSERT INTO rol_tipos_doc VALUES (5642, 3, 140, 1);
INSERT INTO rol_tipos_doc VALUES (5643, 3, 141, 1);
INSERT INTO rol_tipos_doc VALUES (5644, 3, 142, 1);
INSERT INTO rol_tipos_doc VALUES (5645, 3, 143, 1);
INSERT INTO rol_tipos_doc VALUES (5646, 3, 144, 1);
INSERT INTO rol_tipos_doc VALUES (5647, 3, 145, 1);
INSERT INTO rol_tipos_doc VALUES (5648, 3, 146, 1);
INSERT INTO rol_tipos_doc VALUES (5649, 3, 147, 1);
INSERT INTO rol_tipos_doc VALUES (5650, 3, 148, 1);
INSERT INTO rol_tipos_doc VALUES (5651, 3, 149, 1);
INSERT INTO rol_tipos_doc VALUES (5652, 3, 150, 1);
INSERT INTO rol_tipos_doc VALUES (5653, 3, 151, 1);
INSERT INTO rol_tipos_doc VALUES (5654, 3, 152, 1);
INSERT INTO rol_tipos_doc VALUES (5655, 3, 153, 1);
INSERT INTO rol_tipos_doc VALUES (5656, 3, 154, 1);
INSERT INTO rol_tipos_doc VALUES (5657, 3, 155, 1);
INSERT INTO rol_tipos_doc VALUES (5658, 3, 156, 1);
INSERT INTO rol_tipos_doc VALUES (5659, 3, 158, 1);
INSERT INTO rol_tipos_doc VALUES (5660, 3, 157, 1);
INSERT INTO rol_tipos_doc VALUES (5661, 3, 159, 1);
INSERT INTO rol_tipos_doc VALUES (5662, 3, 160, 1);
INSERT INTO rol_tipos_doc VALUES (5663, 3, 161, 1);
INSERT INTO rol_tipos_doc VALUES (5664, 3, 162, 1);
INSERT INTO rol_tipos_doc VALUES (5665, 3, 163, 1);
INSERT INTO rol_tipos_doc VALUES (5666, 3, 164, 1);
INSERT INTO rol_tipos_doc VALUES (5667, 3, 165, 1);
INSERT INTO rol_tipos_doc VALUES (5668, 3, 166, 1);
INSERT INTO rol_tipos_doc VALUES (5669, 3, 167, 1);
INSERT INTO rol_tipos_doc VALUES (5670, 3, 168, 1);
INSERT INTO rol_tipos_doc VALUES (5671, 3, 171, 1);
INSERT INTO rol_tipos_doc VALUES (5672, 3, 170, 1);
INSERT INTO rol_tipos_doc VALUES (5673, 3, 172, 1);
INSERT INTO rol_tipos_doc VALUES (5674, 3, 173, 1);
INSERT INTO rol_tipos_doc VALUES (5675, 3, 169, 1);
INSERT INTO rol_tipos_doc VALUES (5676, 3, 174, 1);
INSERT INTO rol_tipos_doc VALUES (5677, 3, 175, 1);
INSERT INTO rol_tipos_doc VALUES (5678, 3, 176, 1);
INSERT INTO rol_tipos_doc VALUES (5679, 3, 177, 1);
INSERT INTO rol_tipos_doc VALUES (5680, 3, 178, 1);
INSERT INTO rol_tipos_doc VALUES (5681, 3, 179, 1);
INSERT INTO rol_tipos_doc VALUES (5682, 3, 180, 1);
INSERT INTO rol_tipos_doc VALUES (5683, 3, 181, 1);
INSERT INTO rol_tipos_doc VALUES (5684, 3, 182, 1);
INSERT INTO rol_tipos_doc VALUES (5685, 3, 183, 1);
INSERT INTO rol_tipos_doc VALUES (5686, 3, 184, 1);
INSERT INTO rol_tipos_doc VALUES (5687, 3, 185, 1);
INSERT INTO rol_tipos_doc VALUES (5688, 3, 186, 1);
INSERT INTO rol_tipos_doc VALUES (5689, 3, 187, 1);
INSERT INTO rol_tipos_doc VALUES (5690, 3, 188, 1);
INSERT INTO rol_tipos_doc VALUES (5691, 3, 189, 1);
INSERT INTO rol_tipos_doc VALUES (5692, 3, 190, 1);
INSERT INTO rol_tipos_doc VALUES (5693, 3, 191, 1);
INSERT INTO rol_tipos_doc VALUES (5694, 3, 192, 1);
INSERT INTO rol_tipos_doc VALUES (5695, 3, 193, 1);
INSERT INTO rol_tipos_doc VALUES (5696, 3, 194, 1);
INSERT INTO rol_tipos_doc VALUES (5697, 3, 195, 1);
INSERT INTO rol_tipos_doc VALUES (5698, 3, 196, 1);
INSERT INTO rol_tipos_doc VALUES (5699, 3, 197, 1);
INSERT INTO rol_tipos_doc VALUES (5700, 3, 198, 1);
INSERT INTO rol_tipos_doc VALUES (5701, 3, 199, 1);
INSERT INTO rol_tipos_doc VALUES (5702, 3, 200, 1);
INSERT INTO rol_tipos_doc VALUES (5703, 3, 201, 1);
INSERT INTO rol_tipos_doc VALUES (5704, 3, 202, 1);
INSERT INTO rol_tipos_doc VALUES (5705, 3, 203, 1);
INSERT INTO rol_tipos_doc VALUES (5706, 3, 204, 1);
INSERT INTO rol_tipos_doc VALUES (5707, 3, 205, 1);
INSERT INTO rol_tipos_doc VALUES (5708, 3, 206, 1);
INSERT INTO rol_tipos_doc VALUES (5709, 3, 207, 1);
INSERT INTO rol_tipos_doc VALUES (5710, 3, 208, 1);
INSERT INTO rol_tipos_doc VALUES (5711, 3, 209, 1);
INSERT INTO rol_tipos_doc VALUES (5712, 3, 210, 1);
INSERT INTO rol_tipos_doc VALUES (5713, 3, 211, 1);
INSERT INTO rol_tipos_doc VALUES (5714, 3, 212, 1);
INSERT INTO rol_tipos_doc VALUES (5715, 3, 213, 1);
INSERT INTO rol_tipos_doc VALUES (5716, 3, 214, 1);
INSERT INTO rol_tipos_doc VALUES (5717, 3, 215, 1);
INSERT INTO rol_tipos_doc VALUES (5718, 3, 217, 1);
INSERT INTO rol_tipos_doc VALUES (5719, 3, 216, 1);
INSERT INTO rol_tipos_doc VALUES (5720, 3, 218, 1);
INSERT INTO rol_tipos_doc VALUES (5721, 3, 219, 1);
INSERT INTO rol_tipos_doc VALUES (5722, 3, 220, 1);
INSERT INTO rol_tipos_doc VALUES (5723, 3, 221, 1);
INSERT INTO rol_tipos_doc VALUES (5724, 3, 222, 1);
INSERT INTO rol_tipos_doc VALUES (5725, 3, 223, 1);
INSERT INTO rol_tipos_doc VALUES (5726, 3, 224, 1);
INSERT INTO rol_tipos_doc VALUES (5727, 3, 225, 1);
INSERT INTO rol_tipos_doc VALUES (5728, 3, 226, 1);
INSERT INTO rol_tipos_doc VALUES (5729, 3, 227, 1);
INSERT INTO rol_tipos_doc VALUES (5730, 3, 228, 1);
INSERT INTO rol_tipos_doc VALUES (5731, 3, 229, 1);
INSERT INTO rol_tipos_doc VALUES (5732, 3, 230, 1);
INSERT INTO rol_tipos_doc VALUES (5733, 3, 231, 1);
INSERT INTO rol_tipos_doc VALUES (5734, 3, 232, 1);
INSERT INTO rol_tipos_doc VALUES (5735, 3, 233, 1);
INSERT INTO rol_tipos_doc VALUES (5736, 3, 234, 1);
INSERT INTO rol_tipos_doc VALUES (5737, 3, 235, 1);
INSERT INTO rol_tipos_doc VALUES (5738, 3, 236, 1);
INSERT INTO rol_tipos_doc VALUES (5739, 3, 237, 1);
INSERT INTO rol_tipos_doc VALUES (5740, 3, 238, 1);
INSERT INTO rol_tipos_doc VALUES (5741, 3, 239, 1);
INSERT INTO rol_tipos_doc VALUES (5742, 3, 240, 1);
INSERT INTO rol_tipos_doc VALUES (5743, 3, 241, 1);
INSERT INTO rol_tipos_doc VALUES (5744, 3, 242, 1);
INSERT INTO rol_tipos_doc VALUES (5745, 3, 243, 1);
INSERT INTO rol_tipos_doc VALUES (5746, 3, 244, 1);
INSERT INTO rol_tipos_doc VALUES (5747, 3, 245, 1);
INSERT INTO rol_tipos_doc VALUES (5748, 3, 246, 1);
INSERT INTO rol_tipos_doc VALUES (5749, 3, 247, 1);
INSERT INTO rol_tipos_doc VALUES (5750, 3, 248, 1);
INSERT INTO rol_tipos_doc VALUES (5751, 3, 249, 1);
INSERT INTO rol_tipos_doc VALUES (5752, 3, 251, 1);
INSERT INTO rol_tipos_doc VALUES (5753, 3, 250, 1);
INSERT INTO rol_tipos_doc VALUES (5754, 3, 499, 1);
INSERT INTO rol_tipos_doc VALUES (5755, 3, 252, 1);
INSERT INTO rol_tipos_doc VALUES (5756, 3, 253, 1);
INSERT INTO rol_tipos_doc VALUES (5757, 3, 255, 1);
INSERT INTO rol_tipos_doc VALUES (5758, 3, 256, 1);
INSERT INTO rol_tipos_doc VALUES (5759, 3, 254, 1);
INSERT INTO rol_tipos_doc VALUES (5760, 3, 257, 1);
INSERT INTO rol_tipos_doc VALUES (5761, 3, 258, 1);
INSERT INTO rol_tipos_doc VALUES (5762, 3, 259, 1);
INSERT INTO rol_tipos_doc VALUES (5763, 3, 260, 1);
INSERT INTO rol_tipos_doc VALUES (5764, 3, 261, 1);
INSERT INTO rol_tipos_doc VALUES (5765, 3, 262, 1);
INSERT INTO rol_tipos_doc VALUES (5766, 3, 263, 1);
INSERT INTO rol_tipos_doc VALUES (5767, 3, 264, 1);
INSERT INTO rol_tipos_doc VALUES (5768, 3, 265, 1);
INSERT INTO rol_tipos_doc VALUES (5769, 3, 266, 1);
INSERT INTO rol_tipos_doc VALUES (5770, 3, 267, 1);
INSERT INTO rol_tipos_doc VALUES (5771, 3, 283, 1);
INSERT INTO rol_tipos_doc VALUES (5772, 3, 268, 1);
INSERT INTO rol_tipos_doc VALUES (5773, 3, 269, 1);
INSERT INTO rol_tipos_doc VALUES (5774, 3, 270, 1);
INSERT INTO rol_tipos_doc VALUES (5775, 3, 271, 1);
INSERT INTO rol_tipos_doc VALUES (5776, 3, 272, 1);
INSERT INTO rol_tipos_doc VALUES (5777, 3, 273, 1);
INSERT INTO rol_tipos_doc VALUES (5778, 3, 275, 1);
INSERT INTO rol_tipos_doc VALUES (5779, 3, 276, 1);
INSERT INTO rol_tipos_doc VALUES (5780, 3, 274, 1);
INSERT INTO rol_tipos_doc VALUES (5781, 3, 277, 1);
INSERT INTO rol_tipos_doc VALUES (5782, 3, 278, 1);
INSERT INTO rol_tipos_doc VALUES (5783, 3, 279, 1);
INSERT INTO rol_tipos_doc VALUES (5784, 3, 280, 1);
INSERT INTO rol_tipos_doc VALUES (5785, 3, 281, 1);
INSERT INTO rol_tipos_doc VALUES (5786, 3, 282, 1);
INSERT INTO rol_tipos_doc VALUES (5787, 3, 286, 1);
INSERT INTO rol_tipos_doc VALUES (5788, 3, 284, 1);
INSERT INTO rol_tipos_doc VALUES (5789, 3, 285, 1);
INSERT INTO rol_tipos_doc VALUES (5790, 3, 287, 1);
INSERT INTO rol_tipos_doc VALUES (5791, 3, 288, 1);
INSERT INTO rol_tipos_doc VALUES (5792, 3, 289, 1);
INSERT INTO rol_tipos_doc VALUES (5793, 3, 290, 1);
INSERT INTO rol_tipos_doc VALUES (5794, 3, 291, 1);
INSERT INTO rol_tipos_doc VALUES (5795, 3, 292, 1);
INSERT INTO rol_tipos_doc VALUES (5796, 3, 294, 1);
INSERT INTO rol_tipos_doc VALUES (5797, 3, 295, 1);
INSERT INTO rol_tipos_doc VALUES (5798, 3, 296, 1);
INSERT INTO rol_tipos_doc VALUES (5799, 3, 293, 1);
INSERT INTO rol_tipos_doc VALUES (5800, 3, 297, 1);
INSERT INTO rol_tipos_doc VALUES (5801, 3, 298, 1);
INSERT INTO rol_tipos_doc VALUES (5802, 3, 299, 1);
INSERT INTO rol_tipos_doc VALUES (5803, 3, 300, 1);
INSERT INTO rol_tipos_doc VALUES (5804, 3, 301, 1);
INSERT INTO rol_tipos_doc VALUES (5805, 3, 302, 1);
INSERT INTO rol_tipos_doc VALUES (5806, 3, 303, 1);
INSERT INTO rol_tipos_doc VALUES (5807, 3, 304, 1);
INSERT INTO rol_tipos_doc VALUES (5808, 3, 305, 1);
INSERT INTO rol_tipos_doc VALUES (5809, 3, 306, 1);
INSERT INTO rol_tipos_doc VALUES (5810, 3, 307, 1);
INSERT INTO rol_tipos_doc VALUES (5811, 3, 308, 1);
INSERT INTO rol_tipos_doc VALUES (5812, 3, 309, 1);
INSERT INTO rol_tipos_doc VALUES (5813, 3, 310, 1);
INSERT INTO rol_tipos_doc VALUES (5814, 3, 311, 1);
INSERT INTO rol_tipos_doc VALUES (5815, 3, 312, 1);
INSERT INTO rol_tipos_doc VALUES (5816, 3, 313, 1);
INSERT INTO rol_tipos_doc VALUES (5817, 3, 314, 1);
INSERT INTO rol_tipos_doc VALUES (5818, 3, 315, 1);
INSERT INTO rol_tipos_doc VALUES (5819, 3, 316, 1);
INSERT INTO rol_tipos_doc VALUES (5820, 3, 317, 1);
INSERT INTO rol_tipos_doc VALUES (5821, 3, 318, 1);
INSERT INTO rol_tipos_doc VALUES (5822, 3, 319, 1);
INSERT INTO rol_tipos_doc VALUES (5823, 3, 320, 1);
INSERT INTO rol_tipos_doc VALUES (5824, 3, 321, 1);
INSERT INTO rol_tipos_doc VALUES (5825, 3, 322, 1);
INSERT INTO rol_tipos_doc VALUES (5826, 3, 323, 1);
INSERT INTO rol_tipos_doc VALUES (5827, 3, 324, 1);
INSERT INTO rol_tipos_doc VALUES (5828, 3, 325, 1);
INSERT INTO rol_tipos_doc VALUES (5829, 3, 326, 1);
INSERT INTO rol_tipos_doc VALUES (5830, 3, 327, 1);
INSERT INTO rol_tipos_doc VALUES (5831, 3, 328, 1);
INSERT INTO rol_tipos_doc VALUES (5832, 3, 329, 1);
INSERT INTO rol_tipos_doc VALUES (5833, 3, 330, 1);
INSERT INTO rol_tipos_doc VALUES (5834, 3, 331, 1);
INSERT INTO rol_tipos_doc VALUES (5835, 3, 332, 1);
INSERT INTO rol_tipos_doc VALUES (5836, 3, 333, 1);
INSERT INTO rol_tipos_doc VALUES (5837, 3, 334, 1);
INSERT INTO rol_tipos_doc VALUES (5838, 3, 335, 1);
INSERT INTO rol_tipos_doc VALUES (5839, 3, 336, 1);
INSERT INTO rol_tipos_doc VALUES (5840, 3, 337, 1);
INSERT INTO rol_tipos_doc VALUES (5841, 3, 500, 1);
INSERT INTO rol_tipos_doc VALUES (5842, 3, 338, 1);
INSERT INTO rol_tipos_doc VALUES (5843, 3, 339, 1);
INSERT INTO rol_tipos_doc VALUES (5844, 3, 340, 1);
INSERT INTO rol_tipos_doc VALUES (5845, 3, 341, 1);
INSERT INTO rol_tipos_doc VALUES (5846, 3, 342, 1);
INSERT INTO rol_tipos_doc VALUES (5847, 3, 343, 1);
INSERT INTO rol_tipos_doc VALUES (5848, 3, 345, 1);
INSERT INTO rol_tipos_doc VALUES (5849, 3, 346, 1);
INSERT INTO rol_tipos_doc VALUES (5850, 3, 344, 1);
INSERT INTO rol_tipos_doc VALUES (5851, 3, 348, 1);
INSERT INTO rol_tipos_doc VALUES (5852, 3, 350, 1);
INSERT INTO rol_tipos_doc VALUES (5853, 3, 351, 1);
INSERT INTO rol_tipos_doc VALUES (5854, 3, 352, 1);
INSERT INTO rol_tipos_doc VALUES (5855, 3, 353, 1);
INSERT INTO rol_tipos_doc VALUES (5856, 3, 354, 1);
INSERT INTO rol_tipos_doc VALUES (5857, 3, 355, 1);
INSERT INTO rol_tipos_doc VALUES (5858, 3, 349, 1);
INSERT INTO rol_tipos_doc VALUES (5859, 3, 356, 1);
INSERT INTO rol_tipos_doc VALUES (5860, 3, 357, 1);
INSERT INTO rol_tipos_doc VALUES (5861, 3, 358, 1);
INSERT INTO rol_tipos_doc VALUES (5862, 3, 359, 1);
INSERT INTO rol_tipos_doc VALUES (5863, 3, 360, 1);
INSERT INTO rol_tipos_doc VALUES (5864, 3, 361, 1);
INSERT INTO rol_tipos_doc VALUES (5865, 3, 362, 1);
INSERT INTO rol_tipos_doc VALUES (5866, 3, 363, 1);
INSERT INTO rol_tipos_doc VALUES (5867, 3, 372, 1);
INSERT INTO rol_tipos_doc VALUES (5868, 3, 373, 1);
INSERT INTO rol_tipos_doc VALUES (5869, 3, 364, 1);
INSERT INTO rol_tipos_doc VALUES (5870, 3, 365, 1);
INSERT INTO rol_tipos_doc VALUES (5871, 3, 366, 1);
INSERT INTO rol_tipos_doc VALUES (5872, 3, 367, 1);
INSERT INTO rol_tipos_doc VALUES (5873, 3, 368, 1);
INSERT INTO rol_tipos_doc VALUES (5874, 3, 369, 1);
INSERT INTO rol_tipos_doc VALUES (5875, 3, 370, 1);
INSERT INTO rol_tipos_doc VALUES (5876, 3, 375, 1);
INSERT INTO rol_tipos_doc VALUES (5877, 3, 376, 1);
INSERT INTO rol_tipos_doc VALUES (5878, 3, 377, 1);
INSERT INTO rol_tipos_doc VALUES (5879, 3, 378, 1);
INSERT INTO rol_tipos_doc VALUES (5880, 3, 379, 1);
INSERT INTO rol_tipos_doc VALUES (5881, 3, 374, 1);
INSERT INTO rol_tipos_doc VALUES (5882, 3, 371, 1);
INSERT INTO rol_tipos_doc VALUES (5883, 3, 380, 1);
INSERT INTO rol_tipos_doc VALUES (5884, 3, 381, 1);
INSERT INTO rol_tipos_doc VALUES (5885, 3, 382, 1);
INSERT INTO rol_tipos_doc VALUES (5886, 3, 383, 1);
INSERT INTO rol_tipos_doc VALUES (5887, 3, 384, 1);
INSERT INTO rol_tipos_doc VALUES (5888, 3, 385, 1);
INSERT INTO rol_tipos_doc VALUES (5889, 3, 386, 1);
INSERT INTO rol_tipos_doc VALUES (5890, 3, 387, 1);
INSERT INTO rol_tipos_doc VALUES (5891, 3, 388, 1);
INSERT INTO rol_tipos_doc VALUES (5892, 3, 389, 1);
INSERT INTO rol_tipos_doc VALUES (5893, 3, 390, 1);
INSERT INTO rol_tipos_doc VALUES (5894, 3, 391, 1);
INSERT INTO rol_tipos_doc VALUES (5895, 3, 392, 1);
INSERT INTO rol_tipos_doc VALUES (5896, 3, 393, 1);
INSERT INTO rol_tipos_doc VALUES (5897, 3, 394, 1);
INSERT INTO rol_tipos_doc VALUES (5898, 3, 395, 1);
INSERT INTO rol_tipos_doc VALUES (5899, 3, 396, 1);
INSERT INTO rol_tipos_doc VALUES (5900, 3, 397, 1);
INSERT INTO rol_tipos_doc VALUES (5901, 3, 398, 1);
INSERT INTO rol_tipos_doc VALUES (5902, 3, 399, 1);
INSERT INTO rol_tipos_doc VALUES (5903, 3, 400, 1);
INSERT INTO rol_tipos_doc VALUES (5904, 3, 401, 1);
INSERT INTO rol_tipos_doc VALUES (5905, 3, 402, 1);
INSERT INTO rol_tipos_doc VALUES (5906, 3, 403, 1);
INSERT INTO rol_tipos_doc VALUES (5907, 3, 404, 1);
INSERT INTO rol_tipos_doc VALUES (5908, 3, 405, 1);
INSERT INTO rol_tipos_doc VALUES (5909, 3, 406, 1);
INSERT INTO rol_tipos_doc VALUES (5910, 3, 408, 1);
INSERT INTO rol_tipos_doc VALUES (5911, 3, 409, 1);
INSERT INTO rol_tipos_doc VALUES (5912, 3, 410, 1);
INSERT INTO rol_tipos_doc VALUES (5913, 3, 411, 1);
INSERT INTO rol_tipos_doc VALUES (5914, 3, 412, 1);
INSERT INTO rol_tipos_doc VALUES (5915, 3, 407, 1);
INSERT INTO rol_tipos_doc VALUES (5916, 3, 413, 1);
INSERT INTO rol_tipos_doc VALUES (5917, 3, 414, 1);
INSERT INTO rol_tipos_doc VALUES (5918, 3, 415, 1);
INSERT INTO rol_tipos_doc VALUES (5919, 3, 416, 1);
INSERT INTO rol_tipos_doc VALUES (5920, 3, 417, 1);
INSERT INTO rol_tipos_doc VALUES (5921, 3, 418, 1);
INSERT INTO rol_tipos_doc VALUES (5922, 3, 419, 1);
INSERT INTO rol_tipos_doc VALUES (5923, 3, 420, 1);
INSERT INTO rol_tipos_doc VALUES (5924, 3, 421, 1);
INSERT INTO rol_tipos_doc VALUES (5925, 3, 422, 1);
INSERT INTO rol_tipos_doc VALUES (5926, 3, 423, 1);
INSERT INTO rol_tipos_doc VALUES (5927, 3, 424, 1);
INSERT INTO rol_tipos_doc VALUES (5928, 3, 425, 1);
INSERT INTO rol_tipos_doc VALUES (5929, 3, 426, 1);
INSERT INTO rol_tipos_doc VALUES (5930, 3, 427, 1);
INSERT INTO rol_tipos_doc VALUES (5931, 3, 428, 1);
INSERT INTO rol_tipos_doc VALUES (5932, 3, 429, 1);
INSERT INTO rol_tipos_doc VALUES (5933, 3, 430, 1);
INSERT INTO rol_tipos_doc VALUES (5934, 3, 431, 1);
INSERT INTO rol_tipos_doc VALUES (5935, 3, 432, 1);
INSERT INTO rol_tipos_doc VALUES (5936, 3, 433, 1);
INSERT INTO rol_tipos_doc VALUES (5937, 3, 434, 1);
INSERT INTO rol_tipos_doc VALUES (5938, 3, 435, 1);
INSERT INTO rol_tipos_doc VALUES (5939, 3, 436, 1);
INSERT INTO rol_tipos_doc VALUES (5940, 3, 437, 1);
INSERT INTO rol_tipos_doc VALUES (5941, 3, 440, 1);
INSERT INTO rol_tipos_doc VALUES (5942, 3, 438, 1);
INSERT INTO rol_tipos_doc VALUES (5943, 3, 439, 1);
INSERT INTO rol_tipos_doc VALUES (5944, 3, 441, 1);
INSERT INTO rol_tipos_doc VALUES (5945, 3, 442, 1);
INSERT INTO rol_tipos_doc VALUES (5946, 3, 443, 1);
INSERT INTO rol_tipos_doc VALUES (5947, 3, 444, 1);
INSERT INTO rol_tipos_doc VALUES (5948, 3, 445, 1);
INSERT INTO rol_tipos_doc VALUES (5949, 3, 446, 1);
INSERT INTO rol_tipos_doc VALUES (5950, 3, 447, 1);
INSERT INTO rol_tipos_doc VALUES (5951, 3, 448, 1);
INSERT INTO rol_tipos_doc VALUES (5952, 3, 449, 1);
INSERT INTO rol_tipos_doc VALUES (5953, 3, 451, 1);
INSERT INTO rol_tipos_doc VALUES (5954, 3, 450, 1);
INSERT INTO rol_tipos_doc VALUES (5955, 3, 453, 1);
INSERT INTO rol_tipos_doc VALUES (5956, 3, 454, 1);
INSERT INTO rol_tipos_doc VALUES (5957, 3, 452, 1);
INSERT INTO rol_tipos_doc VALUES (5958, 3, 501, 1);
INSERT INTO rol_tipos_doc VALUES (5959, 3, 455, 1);
INSERT INTO rol_tipos_doc VALUES (5960, 3, 456, 1);
INSERT INTO rol_tipos_doc VALUES (5961, 3, 457, 1);
INSERT INTO rol_tipos_doc VALUES (5962, 3, 458, 1);
INSERT INTO rol_tipos_doc VALUES (5963, 3, 459, 1);
INSERT INTO rol_tipos_doc VALUES (5964, 3, 460, 1);
INSERT INTO rol_tipos_doc VALUES (5965, 3, 461, 1);
INSERT INTO rol_tipos_doc VALUES (5966, 3, 462, 1);
INSERT INTO rol_tipos_doc VALUES (5967, 3, 463, 1);
INSERT INTO rol_tipos_doc VALUES (5968, 3, 465, 1);
INSERT INTO rol_tipos_doc VALUES (5969, 3, 466, 1);
INSERT INTO rol_tipos_doc VALUES (5970, 3, 467, 1);
INSERT INTO rol_tipos_doc VALUES (5971, 3, 468, 1);
INSERT INTO rol_tipos_doc VALUES (5972, 3, 469, 1);
INSERT INTO rol_tipos_doc VALUES (5973, 3, 470, 1);
INSERT INTO rol_tipos_doc VALUES (5974, 3, 471, 1);
INSERT INTO rol_tipos_doc VALUES (5975, 3, 472, 1);
INSERT INTO rol_tipos_doc VALUES (5976, 3, 473, 1);
INSERT INTO rol_tipos_doc VALUES (5977, 3, 474, 1);
INSERT INTO rol_tipos_doc VALUES (5978, 3, 475, 1);
INSERT INTO rol_tipos_doc VALUES (5979, 3, 476, 1);
INSERT INTO rol_tipos_doc VALUES (5980, 3, 482, 1);
INSERT INTO rol_tipos_doc VALUES (5981, 3, 477, 1);
INSERT INTO rol_tipos_doc VALUES (5982, 3, 478, 1);
INSERT INTO rol_tipos_doc VALUES (5983, 3, 479, 1);
INSERT INTO rol_tipos_doc VALUES (5984, 3, 480, 1);
INSERT INTO rol_tipos_doc VALUES (5985, 3, 481, 1);
INSERT INTO rol_tipos_doc VALUES (5986, 3, 483, 1);
INSERT INTO rol_tipos_doc VALUES (5987, 3, 464, 1);
INSERT INTO rol_tipos_doc VALUES (5988, 3, 484, 1);
INSERT INTO rol_tipos_doc VALUES (5989, 3, 485, 1);
INSERT INTO rol_tipos_doc VALUES (5990, 3, 486, 1);
INSERT INTO rol_tipos_doc VALUES (5991, 3, 487, 1);
INSERT INTO rol_tipos_doc VALUES (5992, 3, 488, 1);
INSERT INTO rol_tipos_doc VALUES (5993, 3, 489, 1);
INSERT INTO rol_tipos_doc VALUES (5994, 3, 490, 1);
INSERT INTO rol_tipos_doc VALUES (5995, 3, 491, 1);
INSERT INTO rol_tipos_doc VALUES (5996, 3, 492, 1);
INSERT INTO rol_tipos_doc VALUES (5997, 3, 493, 1);
INSERT INTO rol_tipos_doc VALUES (5998, 3, 494, 1);
INSERT INTO rol_tipos_doc VALUES (5999, 3, 495, 1);
INSERT INTO rol_tipos_doc VALUES (6000, 3, 496, 1);
INSERT INTO rol_tipos_doc VALUES (6001, 3, 502, 1);
INSERT INTO rol_tipos_doc VALUES (6002, 3, 497, 1);
INSERT INTO rol_tipos_doc VALUES (6003, 3, 498, 1);
INSERT INTO rol_tipos_doc VALUES (1998, 5, 1, 1);
INSERT INTO rol_tipos_doc VALUES (1999, 5, 2, 1);
INSERT INTO rol_tipos_doc VALUES (2000, 5, 3, 1);
INSERT INTO rol_tipos_doc VALUES (2001, 5, 4, 1);
INSERT INTO rol_tipos_doc VALUES (2002, 5, 5, 1);
INSERT INTO rol_tipos_doc VALUES (2003, 5, 6, 1);
INSERT INTO rol_tipos_doc VALUES (2004, 5, 7, 1);
INSERT INTO rol_tipos_doc VALUES (2005, 5, 8, 1);
INSERT INTO rol_tipos_doc VALUES (2006, 5, 9, 1);
INSERT INTO rol_tipos_doc VALUES (2007, 5, 10, 1);
INSERT INTO rol_tipos_doc VALUES (2008, 5, 11, 1);
INSERT INTO rol_tipos_doc VALUES (2009, 5, 12, 1);
INSERT INTO rol_tipos_doc VALUES (2010, 5, 13, 1);
INSERT INTO rol_tipos_doc VALUES (2011, 5, 14, 1);
INSERT INTO rol_tipos_doc VALUES (2012, 5, 15, 1);
INSERT INTO rol_tipos_doc VALUES (2013, 5, 16, 1);
INSERT INTO rol_tipos_doc VALUES (2014, 5, 17, 1);
INSERT INTO rol_tipos_doc VALUES (2015, 5, 18, 1);
INSERT INTO rol_tipos_doc VALUES (2016, 5, 31, 1);
INSERT INTO rol_tipos_doc VALUES (2017, 5, 19, 1);
INSERT INTO rol_tipos_doc VALUES (2018, 5, 20, 1);
INSERT INTO rol_tipos_doc VALUES (2019, 5, 21, 1);
INSERT INTO rol_tipos_doc VALUES (2020, 5, 22, 1);
INSERT INTO rol_tipos_doc VALUES (2021, 5, 23, 1);
INSERT INTO rol_tipos_doc VALUES (2022, 5, 24, 1);
INSERT INTO rol_tipos_doc VALUES (2023, 5, 25, 1);
INSERT INTO rol_tipos_doc VALUES (2024, 5, 26, 1);
INSERT INTO rol_tipos_doc VALUES (2025, 5, 27, 1);
INSERT INTO rol_tipos_doc VALUES (2026, 5, 28, 1);
INSERT INTO rol_tipos_doc VALUES (2027, 5, 29, 1);
INSERT INTO rol_tipos_doc VALUES (2028, 5, 30, 1);
INSERT INTO rol_tipos_doc VALUES (2029, 5, 32, 1);
INSERT INTO rol_tipos_doc VALUES (2030, 5, 33, 1);
INSERT INTO rol_tipos_doc VALUES (2031, 5, 34, 1);
INSERT INTO rol_tipos_doc VALUES (2032, 5, 35, 1);
INSERT INTO rol_tipos_doc VALUES (2033, 5, 36, 1);
INSERT INTO rol_tipos_doc VALUES (2034, 5, 37, 1);
INSERT INTO rol_tipos_doc VALUES (2035, 5, 38, 1);
INSERT INTO rol_tipos_doc VALUES (2036, 5, 39, 1);
INSERT INTO rol_tipos_doc VALUES (2037, 5, 40, 1);
INSERT INTO rol_tipos_doc VALUES (2038, 5, 41, 1);
INSERT INTO rol_tipos_doc VALUES (2039, 5, 43, 1);
INSERT INTO rol_tipos_doc VALUES (2040, 5, 44, 1);
INSERT INTO rol_tipos_doc VALUES (2041, 5, 42, 1);
INSERT INTO rol_tipos_doc VALUES (2042, 5, 45, 1);
INSERT INTO rol_tipos_doc VALUES (2043, 5, 46, 1);
INSERT INTO rol_tipos_doc VALUES (2044, 5, 47, 1);
INSERT INTO rol_tipos_doc VALUES (2045, 5, 48, 1);
INSERT INTO rol_tipos_doc VALUES (2046, 5, 50, 1);
INSERT INTO rol_tipos_doc VALUES (2047, 5, 49, 1);
INSERT INTO rol_tipos_doc VALUES (2048, 5, 51, 1);
INSERT INTO rol_tipos_doc VALUES (2049, 5, 52, 1);
INSERT INTO rol_tipos_doc VALUES (2050, 5, 53, 1);
INSERT INTO rol_tipos_doc VALUES (2051, 5, 54, 1);
INSERT INTO rol_tipos_doc VALUES (2052, 5, 55, 1);
INSERT INTO rol_tipos_doc VALUES (2053, 5, 57, 1);
INSERT INTO rol_tipos_doc VALUES (2054, 5, 56, 1);
INSERT INTO rol_tipos_doc VALUES (2055, 5, 58, 1);
INSERT INTO rol_tipos_doc VALUES (2056, 5, 59, 1);
INSERT INTO rol_tipos_doc VALUES (2057, 5, 60, 1);
INSERT INTO rol_tipos_doc VALUES (2058, 5, 61, 1);
INSERT INTO rol_tipos_doc VALUES (2059, 5, 62, 1);
INSERT INTO rol_tipos_doc VALUES (2060, 5, 63, 1);
INSERT INTO rol_tipos_doc VALUES (2061, 5, 64, 1);
INSERT INTO rol_tipos_doc VALUES (2062, 5, 65, 1);
INSERT INTO rol_tipos_doc VALUES (2063, 5, 66, 1);
INSERT INTO rol_tipos_doc VALUES (2064, 5, 67, 1);
INSERT INTO rol_tipos_doc VALUES (2065, 5, 68, 1);
INSERT INTO rol_tipos_doc VALUES (2066, 5, 69, 1);
INSERT INTO rol_tipos_doc VALUES (2067, 5, 70, 1);
INSERT INTO rol_tipos_doc VALUES (2068, 5, 80, 1);
INSERT INTO rol_tipos_doc VALUES (2069, 5, 71, 1);
INSERT INTO rol_tipos_doc VALUES (2070, 5, 72, 1);
INSERT INTO rol_tipos_doc VALUES (2071, 5, 73, 1);
INSERT INTO rol_tipos_doc VALUES (2072, 5, 74, 1);
INSERT INTO rol_tipos_doc VALUES (2073, 5, 75, 1);
INSERT INTO rol_tipos_doc VALUES (2074, 5, 76, 1);
INSERT INTO rol_tipos_doc VALUES (2075, 5, 77, 1);
INSERT INTO rol_tipos_doc VALUES (2076, 5, 78, 1);
INSERT INTO rol_tipos_doc VALUES (2077, 5, 79, 1);
INSERT INTO rol_tipos_doc VALUES (2078, 5, 81, 1);
INSERT INTO rol_tipos_doc VALUES (2079, 5, 82, 1);
INSERT INTO rol_tipos_doc VALUES (2080, 5, 83, 1);
INSERT INTO rol_tipos_doc VALUES (2081, 5, 84, 1);
INSERT INTO rol_tipos_doc VALUES (2082, 5, 85, 1);
INSERT INTO rol_tipos_doc VALUES (2083, 5, 86, 1);
INSERT INTO rol_tipos_doc VALUES (2084, 5, 87, 1);
INSERT INTO rol_tipos_doc VALUES (2085, 5, 88, 1);
INSERT INTO rol_tipos_doc VALUES (2086, 5, 89, 1);
INSERT INTO rol_tipos_doc VALUES (2087, 5, 90, 1);
INSERT INTO rol_tipos_doc VALUES (2088, 5, 91, 1);
INSERT INTO rol_tipos_doc VALUES (2089, 5, 92, 1);
INSERT INTO rol_tipos_doc VALUES (2090, 5, 93, 1);
INSERT INTO rol_tipos_doc VALUES (2091, 5, 94, 1);
INSERT INTO rol_tipos_doc VALUES (2092, 5, 95, 1);
INSERT INTO rol_tipos_doc VALUES (2093, 5, 96, 1);
INSERT INTO rol_tipos_doc VALUES (2094, 5, 97, 1);
INSERT INTO rol_tipos_doc VALUES (2095, 5, 98, 1);
INSERT INTO rol_tipos_doc VALUES (2096, 5, 99, 1);
INSERT INTO rol_tipos_doc VALUES (2097, 5, 100, 1);
INSERT INTO rol_tipos_doc VALUES (2098, 5, 101, 1);
INSERT INTO rol_tipos_doc VALUES (2099, 5, 102, 1);
INSERT INTO rol_tipos_doc VALUES (2100, 5, 103, 1);
INSERT INTO rol_tipos_doc VALUES (2101, 5, 107, 1);
INSERT INTO rol_tipos_doc VALUES (2102, 5, 104, 1);
INSERT INTO rol_tipos_doc VALUES (2103, 5, 105, 1);
INSERT INTO rol_tipos_doc VALUES (2104, 5, 106, 1);
INSERT INTO rol_tipos_doc VALUES (2105, 5, 109, 1);
INSERT INTO rol_tipos_doc VALUES (2106, 5, 110, 1);
INSERT INTO rol_tipos_doc VALUES (2107, 5, 111, 1);
INSERT INTO rol_tipos_doc VALUES (2108, 5, 112, 1);
INSERT INTO rol_tipos_doc VALUES (2109, 5, 113, 1);
INSERT INTO rol_tipos_doc VALUES (2110, 5, 114, 1);
INSERT INTO rol_tipos_doc VALUES (2111, 5, 117, 1);
INSERT INTO rol_tipos_doc VALUES (2112, 5, 115, 1);
INSERT INTO rol_tipos_doc VALUES (2113, 5, 116, 1);
INSERT INTO rol_tipos_doc VALUES (2114, 5, 108, 1);
INSERT INTO rol_tipos_doc VALUES (2115, 5, 118, 1);
INSERT INTO rol_tipos_doc VALUES (2116, 5, 119, 1);
INSERT INTO rol_tipos_doc VALUES (2117, 5, 120, 1);
INSERT INTO rol_tipos_doc VALUES (2118, 5, 121, 1);
INSERT INTO rol_tipos_doc VALUES (2119, 5, 122, 1);
INSERT INTO rol_tipos_doc VALUES (2120, 5, 123, 1);
INSERT INTO rol_tipos_doc VALUES (2121, 5, 124, 1);
INSERT INTO rol_tipos_doc VALUES (2122, 5, 125, 1);
INSERT INTO rol_tipos_doc VALUES (2123, 5, 126, 1);
INSERT INTO rol_tipos_doc VALUES (2124, 5, 128, 1);
INSERT INTO rol_tipos_doc VALUES (2125, 5, 127, 1);
INSERT INTO rol_tipos_doc VALUES (2126, 5, 129, 1);
INSERT INTO rol_tipos_doc VALUES (2127, 5, 130, 1);
INSERT INTO rol_tipos_doc VALUES (2128, 5, 131, 1);
INSERT INTO rol_tipos_doc VALUES (2129, 5, 132, 1);
INSERT INTO rol_tipos_doc VALUES (2130, 5, 133, 1);
INSERT INTO rol_tipos_doc VALUES (2131, 5, 137, 1);
INSERT INTO rol_tipos_doc VALUES (2132, 5, 134, 1);
INSERT INTO rol_tipos_doc VALUES (2133, 5, 135, 1);
INSERT INTO rol_tipos_doc VALUES (2134, 5, 136, 1);
INSERT INTO rol_tipos_doc VALUES (2135, 5, 138, 1);
INSERT INTO rol_tipos_doc VALUES (2136, 5, 139, 1);
INSERT INTO rol_tipos_doc VALUES (2137, 5, 140, 1);
INSERT INTO rol_tipos_doc VALUES (2138, 5, 141, 1);
INSERT INTO rol_tipos_doc VALUES (2139, 5, 142, 1);
INSERT INTO rol_tipos_doc VALUES (2140, 5, 143, 1);
INSERT INTO rol_tipos_doc VALUES (2141, 5, 144, 1);
INSERT INTO rol_tipos_doc VALUES (2142, 5, 145, 1);
INSERT INTO rol_tipos_doc VALUES (2143, 5, 146, 1);
INSERT INTO rol_tipos_doc VALUES (2144, 5, 147, 1);
INSERT INTO rol_tipos_doc VALUES (2145, 5, 148, 1);
INSERT INTO rol_tipos_doc VALUES (2146, 5, 149, 1);
INSERT INTO rol_tipos_doc VALUES (2147, 5, 150, 1);
INSERT INTO rol_tipos_doc VALUES (2148, 5, 151, 1);
INSERT INTO rol_tipos_doc VALUES (2149, 5, 152, 1);
INSERT INTO rol_tipos_doc VALUES (2150, 5, 153, 1);
INSERT INTO rol_tipos_doc VALUES (2151, 5, 154, 1);
INSERT INTO rol_tipos_doc VALUES (2152, 5, 155, 1);
INSERT INTO rol_tipos_doc VALUES (2153, 5, 156, 1);
INSERT INTO rol_tipos_doc VALUES (2154, 5, 158, 1);
INSERT INTO rol_tipos_doc VALUES (2155, 5, 157, 1);
INSERT INTO rol_tipos_doc VALUES (2156, 5, 159, 1);
INSERT INTO rol_tipos_doc VALUES (2157, 5, 160, 1);
INSERT INTO rol_tipos_doc VALUES (2158, 5, 161, 1);
INSERT INTO rol_tipos_doc VALUES (2159, 5, 162, 1);
INSERT INTO rol_tipos_doc VALUES (2160, 5, 163, 1);
INSERT INTO rol_tipos_doc VALUES (2161, 5, 164, 1);
INSERT INTO rol_tipos_doc VALUES (2162, 5, 165, 1);
INSERT INTO rol_tipos_doc VALUES (2163, 5, 166, 1);
INSERT INTO rol_tipos_doc VALUES (2164, 5, 167, 1);
INSERT INTO rol_tipos_doc VALUES (2165, 5, 168, 1);
INSERT INTO rol_tipos_doc VALUES (2166, 5, 171, 1);
INSERT INTO rol_tipos_doc VALUES (2167, 5, 170, 1);
INSERT INTO rol_tipos_doc VALUES (2168, 5, 172, 1);
INSERT INTO rol_tipos_doc VALUES (2169, 5, 173, 1);
INSERT INTO rol_tipos_doc VALUES (2170, 5, 169, 1);
INSERT INTO rol_tipos_doc VALUES (2171, 5, 174, 1);
INSERT INTO rol_tipos_doc VALUES (2172, 5, 175, 1);
INSERT INTO rol_tipos_doc VALUES (2173, 5, 176, 1);
INSERT INTO rol_tipos_doc VALUES (2174, 5, 177, 1);
INSERT INTO rol_tipos_doc VALUES (2175, 5, 178, 1);
INSERT INTO rol_tipos_doc VALUES (2176, 5, 179, 1);
INSERT INTO rol_tipos_doc VALUES (2177, 5, 180, 1);
INSERT INTO rol_tipos_doc VALUES (2178, 5, 181, 1);
INSERT INTO rol_tipos_doc VALUES (2179, 5, 182, 1);
INSERT INTO rol_tipos_doc VALUES (2180, 5, 183, 1);
INSERT INTO rol_tipos_doc VALUES (2181, 5, 184, 1);
INSERT INTO rol_tipos_doc VALUES (2182, 5, 185, 1);
INSERT INTO rol_tipos_doc VALUES (2183, 5, 186, 1);
INSERT INTO rol_tipos_doc VALUES (2184, 5, 187, 1);
INSERT INTO rol_tipos_doc VALUES (2185, 5, 188, 1);
INSERT INTO rol_tipos_doc VALUES (2186, 5, 189, 1);
INSERT INTO rol_tipos_doc VALUES (2187, 5, 190, 1);
INSERT INTO rol_tipos_doc VALUES (2188, 5, 191, 1);
INSERT INTO rol_tipos_doc VALUES (2189, 5, 192, 1);
INSERT INTO rol_tipos_doc VALUES (2190, 5, 193, 1);
INSERT INTO rol_tipos_doc VALUES (2191, 5, 194, 1);
INSERT INTO rol_tipos_doc VALUES (2192, 5, 195, 1);
INSERT INTO rol_tipos_doc VALUES (2193, 5, 196, 1);
INSERT INTO rol_tipos_doc VALUES (2194, 5, 197, 1);
INSERT INTO rol_tipos_doc VALUES (2195, 5, 198, 1);
INSERT INTO rol_tipos_doc VALUES (2196, 5, 199, 1);
INSERT INTO rol_tipos_doc VALUES (2197, 5, 200, 1);
INSERT INTO rol_tipos_doc VALUES (2198, 5, 201, 1);
INSERT INTO rol_tipos_doc VALUES (2199, 5, 202, 1);
INSERT INTO rol_tipos_doc VALUES (2200, 5, 203, 1);
INSERT INTO rol_tipos_doc VALUES (2201, 5, 204, 1);
INSERT INTO rol_tipos_doc VALUES (2202, 5, 205, 1);
INSERT INTO rol_tipos_doc VALUES (2203, 5, 206, 1);
INSERT INTO rol_tipos_doc VALUES (2204, 5, 207, 1);
INSERT INTO rol_tipos_doc VALUES (2205, 5, 208, 1);
INSERT INTO rol_tipos_doc VALUES (2206, 5, 209, 1);
INSERT INTO rol_tipos_doc VALUES (2207, 5, 210, 1);
INSERT INTO rol_tipos_doc VALUES (2208, 5, 211, 1);
INSERT INTO rol_tipos_doc VALUES (2209, 5, 212, 1);
INSERT INTO rol_tipos_doc VALUES (2210, 5, 213, 1);
INSERT INTO rol_tipos_doc VALUES (2211, 5, 214, 1);
INSERT INTO rol_tipos_doc VALUES (2212, 5, 215, 1);
INSERT INTO rol_tipos_doc VALUES (2213, 5, 217, 1);
INSERT INTO rol_tipos_doc VALUES (2214, 5, 216, 1);
INSERT INTO rol_tipos_doc VALUES (2215, 5, 218, 1);
INSERT INTO rol_tipos_doc VALUES (2216, 5, 219, 1);
INSERT INTO rol_tipos_doc VALUES (2217, 5, 220, 1);
INSERT INTO rol_tipos_doc VALUES (2218, 5, 221, 1);
INSERT INTO rol_tipos_doc VALUES (2219, 5, 222, 1);
INSERT INTO rol_tipos_doc VALUES (2220, 5, 223, 1);
INSERT INTO rol_tipos_doc VALUES (2221, 5, 224, 1);
INSERT INTO rol_tipos_doc VALUES (2222, 5, 225, 1);
INSERT INTO rol_tipos_doc VALUES (2223, 5, 226, 1);
INSERT INTO rol_tipos_doc VALUES (2224, 5, 227, 1);
INSERT INTO rol_tipos_doc VALUES (2225, 5, 228, 1);
INSERT INTO rol_tipos_doc VALUES (2226, 5, 229, 1);
INSERT INTO rol_tipos_doc VALUES (2227, 5, 230, 1);
INSERT INTO rol_tipos_doc VALUES (2228, 5, 231, 1);
INSERT INTO rol_tipos_doc VALUES (2229, 5, 232, 1);
INSERT INTO rol_tipos_doc VALUES (2230, 5, 233, 1);
INSERT INTO rol_tipos_doc VALUES (2231, 5, 234, 1);
INSERT INTO rol_tipos_doc VALUES (2232, 5, 235, 1);
INSERT INTO rol_tipos_doc VALUES (2233, 5, 236, 1);
INSERT INTO rol_tipos_doc VALUES (2234, 5, 237, 1);
INSERT INTO rol_tipos_doc VALUES (2235, 5, 238, 1);
INSERT INTO rol_tipos_doc VALUES (2236, 5, 239, 1);
INSERT INTO rol_tipos_doc VALUES (2237, 5, 240, 1);
INSERT INTO rol_tipos_doc VALUES (2238, 5, 241, 1);
INSERT INTO rol_tipos_doc VALUES (2239, 5, 242, 1);
INSERT INTO rol_tipos_doc VALUES (2240, 5, 243, 1);
INSERT INTO rol_tipos_doc VALUES (2241, 5, 244, 1);
INSERT INTO rol_tipos_doc VALUES (2242, 5, 245, 1);
INSERT INTO rol_tipos_doc VALUES (2243, 5, 246, 1);
INSERT INTO rol_tipos_doc VALUES (2244, 5, 247, 1);
INSERT INTO rol_tipos_doc VALUES (2245, 5, 248, 1);
INSERT INTO rol_tipos_doc VALUES (2246, 5, 249, 1);
INSERT INTO rol_tipos_doc VALUES (2247, 5, 251, 1);
INSERT INTO rol_tipos_doc VALUES (2248, 5, 250, 1);
INSERT INTO rol_tipos_doc VALUES (2249, 5, 252, 1);
INSERT INTO rol_tipos_doc VALUES (2250, 5, 253, 1);
INSERT INTO rol_tipos_doc VALUES (2251, 5, 255, 1);
INSERT INTO rol_tipos_doc VALUES (2252, 5, 256, 1);
INSERT INTO rol_tipos_doc VALUES (2253, 5, 254, 1);
INSERT INTO rol_tipos_doc VALUES (2254, 5, 257, 1);
INSERT INTO rol_tipos_doc VALUES (2255, 5, 258, 1);
INSERT INTO rol_tipos_doc VALUES (2256, 5, 259, 1);
INSERT INTO rol_tipos_doc VALUES (2257, 5, 260, 1);
INSERT INTO rol_tipos_doc VALUES (2258, 5, 261, 1);
INSERT INTO rol_tipos_doc VALUES (2259, 5, 262, 1);
INSERT INTO rol_tipos_doc VALUES (2260, 5, 263, 1);
INSERT INTO rol_tipos_doc VALUES (2261, 5, 264, 1);
INSERT INTO rol_tipos_doc VALUES (2262, 5, 265, 1);
INSERT INTO rol_tipos_doc VALUES (2263, 5, 266, 1);
INSERT INTO rol_tipos_doc VALUES (2264, 5, 267, 1);
INSERT INTO rol_tipos_doc VALUES (2265, 5, 268, 1);
INSERT INTO rol_tipos_doc VALUES (2266, 5, 269, 1);
INSERT INTO rol_tipos_doc VALUES (2267, 5, 270, 1);
INSERT INTO rol_tipos_doc VALUES (2268, 5, 271, 1);
INSERT INTO rol_tipos_doc VALUES (2269, 5, 272, 1);
INSERT INTO rol_tipos_doc VALUES (2270, 5, 273, 1);
INSERT INTO rol_tipos_doc VALUES (2271, 5, 275, 1);
INSERT INTO rol_tipos_doc VALUES (2272, 5, 276, 1);
INSERT INTO rol_tipos_doc VALUES (2273, 5, 274, 1);
INSERT INTO rol_tipos_doc VALUES (2274, 5, 277, 1);
INSERT INTO rol_tipos_doc VALUES (2275, 5, 278, 1);
INSERT INTO rol_tipos_doc VALUES (2276, 5, 279, 1);
INSERT INTO rol_tipos_doc VALUES (2277, 5, 280, 1);
INSERT INTO rol_tipos_doc VALUES (2278, 5, 281, 1);
INSERT INTO rol_tipos_doc VALUES (2279, 5, 282, 1);
INSERT INTO rol_tipos_doc VALUES (2280, 5, 283, 1);
INSERT INTO rol_tipos_doc VALUES (2281, 5, 286, 1);
INSERT INTO rol_tipos_doc VALUES (2282, 5, 284, 1);
INSERT INTO rol_tipos_doc VALUES (2283, 5, 285, 1);
INSERT INTO rol_tipos_doc VALUES (2284, 5, 287, 1);
INSERT INTO rol_tipos_doc VALUES (2285, 5, 288, 1);
INSERT INTO rol_tipos_doc VALUES (2286, 5, 289, 1);
INSERT INTO rol_tipos_doc VALUES (2287, 5, 290, 1);
INSERT INTO rol_tipos_doc VALUES (2288, 5, 291, 1);
INSERT INTO rol_tipos_doc VALUES (2289, 5, 292, 1);
INSERT INTO rol_tipos_doc VALUES (2290, 5, 294, 1);
INSERT INTO rol_tipos_doc VALUES (2291, 5, 295, 1);
INSERT INTO rol_tipos_doc VALUES (2292, 5, 296, 1);
INSERT INTO rol_tipos_doc VALUES (2293, 5, 293, 1);
INSERT INTO rol_tipos_doc VALUES (2294, 5, 297, 1);
INSERT INTO rol_tipos_doc VALUES (2295, 5, 298, 1);
INSERT INTO rol_tipos_doc VALUES (2296, 5, 299, 1);
INSERT INTO rol_tipos_doc VALUES (2297, 5, 300, 1);
INSERT INTO rol_tipos_doc VALUES (2298, 5, 301, 1);
INSERT INTO rol_tipos_doc VALUES (2299, 5, 302, 1);
INSERT INTO rol_tipos_doc VALUES (2300, 5, 303, 1);
INSERT INTO rol_tipos_doc VALUES (2301, 5, 304, 1);
INSERT INTO rol_tipos_doc VALUES (2302, 5, 305, 1);
INSERT INTO rol_tipos_doc VALUES (2303, 5, 306, 1);
INSERT INTO rol_tipos_doc VALUES (2304, 5, 307, 1);
INSERT INTO rol_tipos_doc VALUES (2305, 5, 308, 1);
INSERT INTO rol_tipos_doc VALUES (2306, 5, 309, 1);
INSERT INTO rol_tipos_doc VALUES (2307, 5, 310, 1);
INSERT INTO rol_tipos_doc VALUES (2308, 5, 311, 1);
INSERT INTO rol_tipos_doc VALUES (2309, 5, 312, 1);
INSERT INTO rol_tipos_doc VALUES (2310, 5, 313, 1);
INSERT INTO rol_tipos_doc VALUES (2311, 5, 314, 1);
INSERT INTO rol_tipos_doc VALUES (2312, 5, 315, 1);
INSERT INTO rol_tipos_doc VALUES (2313, 5, 316, 1);
INSERT INTO rol_tipos_doc VALUES (2314, 5, 317, 1);
INSERT INTO rol_tipos_doc VALUES (2315, 5, 318, 1);
INSERT INTO rol_tipos_doc VALUES (2316, 5, 319, 1);
INSERT INTO rol_tipos_doc VALUES (2317, 5, 320, 1);
INSERT INTO rol_tipos_doc VALUES (2318, 5, 321, 1);
INSERT INTO rol_tipos_doc VALUES (2319, 5, 322, 1);
INSERT INTO rol_tipos_doc VALUES (2320, 5, 323, 1);
INSERT INTO rol_tipos_doc VALUES (2321, 5, 324, 1);
INSERT INTO rol_tipos_doc VALUES (2322, 5, 325, 1);
INSERT INTO rol_tipos_doc VALUES (2323, 5, 326, 1);
INSERT INTO rol_tipos_doc VALUES (2324, 5, 327, 1);
INSERT INTO rol_tipos_doc VALUES (2325, 5, 328, 1);
INSERT INTO rol_tipos_doc VALUES (2326, 5, 329, 1);
INSERT INTO rol_tipos_doc VALUES (2327, 5, 330, 1);
INSERT INTO rol_tipos_doc VALUES (2328, 5, 331, 1);
INSERT INTO rol_tipos_doc VALUES (2329, 5, 332, 1);
INSERT INTO rol_tipos_doc VALUES (2330, 5, 333, 1);
INSERT INTO rol_tipos_doc VALUES (2331, 5, 334, 1);
INSERT INTO rol_tipos_doc VALUES (2332, 5, 335, 1);
INSERT INTO rol_tipos_doc VALUES (2333, 5, 336, 1);
INSERT INTO rol_tipos_doc VALUES (2334, 5, 337, 1);
INSERT INTO rol_tipos_doc VALUES (2335, 5, 338, 1);
INSERT INTO rol_tipos_doc VALUES (2336, 5, 339, 1);
INSERT INTO rol_tipos_doc VALUES (2337, 5, 340, 1);
INSERT INTO rol_tipos_doc VALUES (2338, 5, 341, 1);
INSERT INTO rol_tipos_doc VALUES (2339, 5, 342, 1);
INSERT INTO rol_tipos_doc VALUES (2340, 5, 343, 1);
INSERT INTO rol_tipos_doc VALUES (2341, 5, 345, 1);
INSERT INTO rol_tipos_doc VALUES (2342, 5, 346, 1);
INSERT INTO rol_tipos_doc VALUES (2343, 5, 344, 1);
INSERT INTO rol_tipos_doc VALUES (2344, 5, 347, 1);
INSERT INTO rol_tipos_doc VALUES (2345, 5, 348, 1);
INSERT INTO rol_tipos_doc VALUES (2346, 5, 350, 1);
INSERT INTO rol_tipos_doc VALUES (2347, 5, 351, 1);
INSERT INTO rol_tipos_doc VALUES (2348, 5, 352, 1);
INSERT INTO rol_tipos_doc VALUES (2349, 5, 353, 1);
INSERT INTO rol_tipos_doc VALUES (2350, 5, 354, 1);
INSERT INTO rol_tipos_doc VALUES (2351, 5, 355, 1);
INSERT INTO rol_tipos_doc VALUES (2352, 5, 349, 1);
INSERT INTO rol_tipos_doc VALUES (2353, 5, 356, 1);
INSERT INTO rol_tipos_doc VALUES (2354, 5, 357, 1);
INSERT INTO rol_tipos_doc VALUES (2355, 5, 358, 1);
INSERT INTO rol_tipos_doc VALUES (2356, 5, 359, 1);
INSERT INTO rol_tipos_doc VALUES (2357, 5, 360, 1);
INSERT INTO rol_tipos_doc VALUES (2358, 5, 361, 1);
INSERT INTO rol_tipos_doc VALUES (2359, 5, 362, 1);
INSERT INTO rol_tipos_doc VALUES (2360, 5, 363, 1);
INSERT INTO rol_tipos_doc VALUES (2361, 5, 372, 1);
INSERT INTO rol_tipos_doc VALUES (2362, 5, 373, 1);
INSERT INTO rol_tipos_doc VALUES (2363, 5, 364, 1);
INSERT INTO rol_tipos_doc VALUES (2364, 5, 365, 1);
INSERT INTO rol_tipos_doc VALUES (2365, 5, 366, 1);
INSERT INTO rol_tipos_doc VALUES (2366, 5, 367, 1);
INSERT INTO rol_tipos_doc VALUES (2367, 5, 368, 1);
INSERT INTO rol_tipos_doc VALUES (2368, 5, 369, 1);
INSERT INTO rol_tipos_doc VALUES (2369, 5, 370, 1);
INSERT INTO rol_tipos_doc VALUES (2370, 5, 375, 1);
INSERT INTO rol_tipos_doc VALUES (2371, 5, 376, 1);
INSERT INTO rol_tipos_doc VALUES (2372, 5, 377, 1);
INSERT INTO rol_tipos_doc VALUES (2373, 5, 378, 1);
INSERT INTO rol_tipos_doc VALUES (2374, 5, 379, 1);
INSERT INTO rol_tipos_doc VALUES (2375, 5, 374, 1);
INSERT INTO rol_tipos_doc VALUES (2376, 5, 371, 1);
INSERT INTO rol_tipos_doc VALUES (2377, 5, 380, 1);
INSERT INTO rol_tipos_doc VALUES (2378, 5, 381, 1);
INSERT INTO rol_tipos_doc VALUES (2379, 5, 382, 1);
INSERT INTO rol_tipos_doc VALUES (2380, 5, 383, 1);
INSERT INTO rol_tipos_doc VALUES (2381, 5, 384, 1);
INSERT INTO rol_tipos_doc VALUES (2382, 5, 385, 1);
INSERT INTO rol_tipos_doc VALUES (2383, 5, 386, 1);
INSERT INTO rol_tipos_doc VALUES (2384, 5, 387, 1);
INSERT INTO rol_tipos_doc VALUES (2385, 5, 388, 1);
INSERT INTO rol_tipos_doc VALUES (2386, 5, 389, 1);
INSERT INTO rol_tipos_doc VALUES (2387, 5, 390, 1);
INSERT INTO rol_tipos_doc VALUES (2388, 5, 391, 1);
INSERT INTO rol_tipos_doc VALUES (2389, 5, 392, 1);
INSERT INTO rol_tipos_doc VALUES (2390, 5, 393, 1);
INSERT INTO rol_tipos_doc VALUES (2391, 5, 394, 1);
INSERT INTO rol_tipos_doc VALUES (2392, 5, 395, 1);
INSERT INTO rol_tipos_doc VALUES (2393, 5, 396, 1);
INSERT INTO rol_tipos_doc VALUES (2394, 5, 397, 1);
INSERT INTO rol_tipos_doc VALUES (2395, 5, 398, 1);
INSERT INTO rol_tipos_doc VALUES (2396, 5, 399, 1);
INSERT INTO rol_tipos_doc VALUES (2397, 5, 400, 1);
INSERT INTO rol_tipos_doc VALUES (2398, 5, 401, 1);
INSERT INTO rol_tipos_doc VALUES (2399, 5, 402, 1);
INSERT INTO rol_tipos_doc VALUES (2400, 5, 403, 1);
INSERT INTO rol_tipos_doc VALUES (2401, 5, 404, 1);
INSERT INTO rol_tipos_doc VALUES (2402, 5, 405, 1);
INSERT INTO rol_tipos_doc VALUES (2403, 5, 406, 1);
INSERT INTO rol_tipos_doc VALUES (2404, 5, 408, 1);
INSERT INTO rol_tipos_doc VALUES (2405, 5, 409, 1);
INSERT INTO rol_tipos_doc VALUES (2406, 5, 410, 1);
INSERT INTO rol_tipos_doc VALUES (2407, 5, 411, 1);
INSERT INTO rol_tipos_doc VALUES (2408, 5, 412, 1);
INSERT INTO rol_tipos_doc VALUES (2409, 5, 407, 1);
INSERT INTO rol_tipos_doc VALUES (2410, 5, 413, 1);
INSERT INTO rol_tipos_doc VALUES (2411, 5, 414, 1);
INSERT INTO rol_tipos_doc VALUES (2412, 5, 415, 1);
INSERT INTO rol_tipos_doc VALUES (2413, 5, 416, 1);
INSERT INTO rol_tipos_doc VALUES (2414, 5, 417, 1);
INSERT INTO rol_tipos_doc VALUES (2415, 5, 418, 1);
INSERT INTO rol_tipos_doc VALUES (2416, 5, 419, 1);
INSERT INTO rol_tipos_doc VALUES (2417, 5, 420, 1);
INSERT INTO rol_tipos_doc VALUES (2418, 5, 421, 1);
INSERT INTO rol_tipos_doc VALUES (2419, 5, 422, 1);
INSERT INTO rol_tipos_doc VALUES (2420, 5, 423, 1);
INSERT INTO rol_tipos_doc VALUES (2421, 5, 424, 1);
INSERT INTO rol_tipos_doc VALUES (2422, 5, 425, 1);
INSERT INTO rol_tipos_doc VALUES (2423, 5, 426, 1);
INSERT INTO rol_tipos_doc VALUES (2424, 5, 427, 1);
INSERT INTO rol_tipos_doc VALUES (2425, 5, 428, 1);
INSERT INTO rol_tipos_doc VALUES (2426, 5, 429, 1);
INSERT INTO rol_tipos_doc VALUES (2427, 5, 430, 1);
INSERT INTO rol_tipos_doc VALUES (2428, 5, 431, 1);
INSERT INTO rol_tipos_doc VALUES (2429, 5, 432, 1);
INSERT INTO rol_tipos_doc VALUES (2430, 5, 433, 1);
INSERT INTO rol_tipos_doc VALUES (2431, 5, 434, 1);
INSERT INTO rol_tipos_doc VALUES (2432, 5, 435, 1);
INSERT INTO rol_tipos_doc VALUES (2433, 5, 436, 1);
INSERT INTO rol_tipos_doc VALUES (2434, 5, 437, 1);
INSERT INTO rol_tipos_doc VALUES (2435, 5, 440, 1);
INSERT INTO rol_tipos_doc VALUES (2436, 5, 438, 1);
INSERT INTO rol_tipos_doc VALUES (2437, 5, 439, 1);
INSERT INTO rol_tipos_doc VALUES (2438, 5, 441, 1);
INSERT INTO rol_tipos_doc VALUES (2439, 5, 442, 1);
INSERT INTO rol_tipos_doc VALUES (2440, 5, 443, 1);
INSERT INTO rol_tipos_doc VALUES (2441, 5, 444, 1);
INSERT INTO rol_tipos_doc VALUES (2442, 5, 445, 1);
INSERT INTO rol_tipos_doc VALUES (2443, 5, 446, 1);
INSERT INTO rol_tipos_doc VALUES (2444, 5, 447, 1);
INSERT INTO rol_tipos_doc VALUES (2445, 5, 448, 1);
INSERT INTO rol_tipos_doc VALUES (2446, 5, 449, 1);
INSERT INTO rol_tipos_doc VALUES (2447, 5, 451, 1);
INSERT INTO rol_tipos_doc VALUES (2448, 5, 450, 1);
INSERT INTO rol_tipos_doc VALUES (2449, 5, 453, 1);
INSERT INTO rol_tipos_doc VALUES (2450, 5, 454, 1);
INSERT INTO rol_tipos_doc VALUES (2451, 5, 452, 1);
INSERT INTO rol_tipos_doc VALUES (2452, 5, 455, 1);
INSERT INTO rol_tipos_doc VALUES (2453, 5, 456, 1);
INSERT INTO rol_tipos_doc VALUES (2454, 5, 457, 1);
INSERT INTO rol_tipos_doc VALUES (2455, 5, 458, 1);
INSERT INTO rol_tipos_doc VALUES (2456, 5, 459, 1);
INSERT INTO rol_tipos_doc VALUES (2457, 5, 460, 1);
INSERT INTO rol_tipos_doc VALUES (2458, 5, 461, 1);
INSERT INTO rol_tipos_doc VALUES (2459, 5, 462, 1);
INSERT INTO rol_tipos_doc VALUES (2460, 5, 463, 1);
INSERT INTO rol_tipos_doc VALUES (2461, 5, 464, 1);
INSERT INTO rol_tipos_doc VALUES (2462, 5, 465, 1);
INSERT INTO rol_tipos_doc VALUES (2463, 5, 466, 1);
INSERT INTO rol_tipos_doc VALUES (2464, 5, 467, 1);
INSERT INTO rol_tipos_doc VALUES (2465, 5, 468, 1);
INSERT INTO rol_tipos_doc VALUES (2466, 5, 469, 1);
INSERT INTO rol_tipos_doc VALUES (2467, 5, 470, 1);
INSERT INTO rol_tipos_doc VALUES (2468, 5, 471, 1);
INSERT INTO rol_tipos_doc VALUES (2469, 5, 472, 1);
INSERT INTO rol_tipos_doc VALUES (2470, 5, 473, 1);
INSERT INTO rol_tipos_doc VALUES (2471, 5, 474, 1);
INSERT INTO rol_tipos_doc VALUES (2472, 5, 475, 1);
INSERT INTO rol_tipos_doc VALUES (2473, 5, 476, 1);
INSERT INTO rol_tipos_doc VALUES (2474, 5, 482, 1);
INSERT INTO rol_tipos_doc VALUES (2475, 5, 477, 1);
INSERT INTO rol_tipos_doc VALUES (2476, 5, 478, 1);
INSERT INTO rol_tipos_doc VALUES (2477, 5, 479, 1);
INSERT INTO rol_tipos_doc VALUES (2478, 5, 480, 1);
INSERT INTO rol_tipos_doc VALUES (2479, 5, 481, 1);
INSERT INTO rol_tipos_doc VALUES (2480, 5, 483, 1);
INSERT INTO rol_tipos_doc VALUES (2481, 5, 484, 1);
INSERT INTO rol_tipos_doc VALUES (2482, 5, 485, 1);
INSERT INTO rol_tipos_doc VALUES (2483, 5, 486, 1);
INSERT INTO rol_tipos_doc VALUES (2484, 5, 487, 1);
INSERT INTO rol_tipos_doc VALUES (2485, 5, 488, 1);
INSERT INTO rol_tipos_doc VALUES (2486, 5, 489, 1);
INSERT INTO rol_tipos_doc VALUES (2487, 5, 490, 1);
INSERT INTO rol_tipos_doc VALUES (2488, 5, 491, 1);
INSERT INTO rol_tipos_doc VALUES (2489, 5, 492, 1);
INSERT INTO rol_tipos_doc VALUES (2490, 5, 493, 1);
INSERT INTO rol_tipos_doc VALUES (2491, 5, 494, 1);
INSERT INTO rol_tipos_doc VALUES (2492, 5, 495, 1);
INSERT INTO rol_tipos_doc VALUES (2493, 5, 496, 1);
INSERT INTO rol_tipos_doc VALUES (2494, 5, 497, 1);
INSERT INTO rol_tipos_doc VALUES (2495, 5, 498, 1);
INSERT INTO rol_tipos_doc VALUES (3338, 2, 339, 1);
INSERT INTO rol_tipos_doc VALUES (3339, 2, 340, 1);
INSERT INTO rol_tipos_doc VALUES (3340, 2, 341, 1);
INSERT INTO rol_tipos_doc VALUES (3341, 2, 342, 1);
INSERT INTO rol_tipos_doc VALUES (3342, 2, 343, 1);
INSERT INTO rol_tipos_doc VALUES (3343, 2, 345, 1);
INSERT INTO rol_tipos_doc VALUES (3344, 2, 346, 1);
INSERT INTO rol_tipos_doc VALUES (3345, 2, 344, 1);
INSERT INTO rol_tipos_doc VALUES (3346, 2, 347, 1);
INSERT INTO rol_tipos_doc VALUES (3347, 2, 348, 1);
INSERT INTO rol_tipos_doc VALUES (3348, 2, 350, 1);
INSERT INTO rol_tipos_doc VALUES (3349, 2, 351, 1);
INSERT INTO rol_tipos_doc VALUES (3350, 2, 352, 1);
INSERT INTO rol_tipos_doc VALUES (3351, 2, 353, 1);
INSERT INTO rol_tipos_doc VALUES (3352, 2, 354, 1);
INSERT INTO rol_tipos_doc VALUES (3353, 2, 355, 1);
INSERT INTO rol_tipos_doc VALUES (3354, 2, 349, 1);
INSERT INTO rol_tipos_doc VALUES (3355, 2, 356, 1);
INSERT INTO rol_tipos_doc VALUES (3356, 2, 357, 1);
INSERT INTO rol_tipos_doc VALUES (3357, 2, 358, 1);
INSERT INTO rol_tipos_doc VALUES (3358, 2, 359, 1);
INSERT INTO rol_tipos_doc VALUES (3359, 2, 360, 1);
INSERT INTO rol_tipos_doc VALUES (3360, 2, 361, 1);
INSERT INTO rol_tipos_doc VALUES (3361, 2, 362, 1);
INSERT INTO rol_tipos_doc VALUES (3362, 2, 363, 1);
INSERT INTO rol_tipos_doc VALUES (3363, 2, 372, 1);
INSERT INTO rol_tipos_doc VALUES (3364, 2, 373, 1);
INSERT INTO rol_tipos_doc VALUES (3365, 2, 364, 1);
INSERT INTO rol_tipos_doc VALUES (3366, 2, 365, 1);
INSERT INTO rol_tipos_doc VALUES (3367, 2, 366, 1);
INSERT INTO rol_tipos_doc VALUES (3368, 2, 367, 1);
INSERT INTO rol_tipos_doc VALUES (3369, 2, 368, 1);
INSERT INTO rol_tipos_doc VALUES (3370, 2, 369, 1);
INSERT INTO rol_tipos_doc VALUES (3371, 2, 370, 1);
INSERT INTO rol_tipos_doc VALUES (3372, 2, 375, 1);
INSERT INTO rol_tipos_doc VALUES (3373, 2, 376, 1);
INSERT INTO rol_tipos_doc VALUES (3374, 2, 377, 1);
INSERT INTO rol_tipos_doc VALUES (3375, 2, 379, 1);
INSERT INTO rol_tipos_doc VALUES (3376, 2, 378, 1);
INSERT INTO rol_tipos_doc VALUES (3377, 2, 374, 1);
INSERT INTO rol_tipos_doc VALUES (3378, 2, 371, 1);
INSERT INTO rol_tipos_doc VALUES (3379, 2, 380, 1);
INSERT INTO rol_tipos_doc VALUES (3380, 2, 381, 1);
INSERT INTO rol_tipos_doc VALUES (3381, 2, 382, 1);
INSERT INTO rol_tipos_doc VALUES (3382, 2, 383, 1);
INSERT INTO rol_tipos_doc VALUES (3383, 2, 384, 1);
INSERT INTO rol_tipos_doc VALUES (3384, 2, 385, 1);
INSERT INTO rol_tipos_doc VALUES (3385, 2, 386, 1);
INSERT INTO rol_tipos_doc VALUES (3386, 2, 387, 1);
INSERT INTO rol_tipos_doc VALUES (3387, 2, 388, 1);
INSERT INTO rol_tipos_doc VALUES (3388, 2, 389, 1);
INSERT INTO rol_tipos_doc VALUES (3389, 2, 390, 1);
INSERT INTO rol_tipos_doc VALUES (3390, 2, 391, 1);
INSERT INTO rol_tipos_doc VALUES (3391, 2, 392, 1);
INSERT INTO rol_tipos_doc VALUES (3392, 2, 393, 1);
INSERT INTO rol_tipos_doc VALUES (3393, 2, 394, 1);
INSERT INTO rol_tipos_doc VALUES (3394, 2, 395, 1);
INSERT INTO rol_tipos_doc VALUES (3395, 2, 396, 1);
INSERT INTO rol_tipos_doc VALUES (3396, 2, 397, 1);
INSERT INTO rol_tipos_doc VALUES (3397, 2, 398, 1);
INSERT INTO rol_tipos_doc VALUES (3398, 2, 399, 1);
INSERT INTO rol_tipos_doc VALUES (3399, 2, 400, 1);
INSERT INTO rol_tipos_doc VALUES (3400, 2, 401, 1);
INSERT INTO rol_tipos_doc VALUES (3401, 2, 402, 1);
INSERT INTO rol_tipos_doc VALUES (3402, 2, 403, 1);
INSERT INTO rol_tipos_doc VALUES (3403, 2, 404, 1);
INSERT INTO rol_tipos_doc VALUES (3404, 2, 405, 1);
INSERT INTO rol_tipos_doc VALUES (3405, 2, 406, 1);
INSERT INTO rol_tipos_doc VALUES (3406, 2, 408, 1);
INSERT INTO rol_tipos_doc VALUES (3407, 2, 409, 1);
INSERT INTO rol_tipos_doc VALUES (3408, 2, 410, 1);
INSERT INTO rol_tipos_doc VALUES (3409, 2, 411, 1);
INSERT INTO rol_tipos_doc VALUES (3410, 2, 412, 1);
INSERT INTO rol_tipos_doc VALUES (3411, 2, 407, 1);
INSERT INTO rol_tipos_doc VALUES (3412, 2, 413, 1);
INSERT INTO rol_tipos_doc VALUES (3413, 2, 414, 1);
INSERT INTO rol_tipos_doc VALUES (3414, 2, 415, 1);
INSERT INTO rol_tipos_doc VALUES (3415, 2, 416, 1);
INSERT INTO rol_tipos_doc VALUES (3416, 2, 417, 1);
INSERT INTO rol_tipos_doc VALUES (3417, 2, 418, 1);
INSERT INTO rol_tipos_doc VALUES (3418, 2, 419, 1);
INSERT INTO rol_tipos_doc VALUES (3419, 2, 420, 1);
INSERT INTO rol_tipos_doc VALUES (3420, 2, 421, 1);
INSERT INTO rol_tipos_doc VALUES (3421, 2, 422, 1);
INSERT INTO rol_tipos_doc VALUES (3422, 2, 423, 1);
INSERT INTO rol_tipos_doc VALUES (3423, 2, 424, 1);
INSERT INTO rol_tipos_doc VALUES (3424, 2, 425, 1);
INSERT INTO rol_tipos_doc VALUES (3425, 2, 426, 1);
INSERT INTO rol_tipos_doc VALUES (3426, 2, 427, 1);
INSERT INTO rol_tipos_doc VALUES (3427, 2, 428, 1);
INSERT INTO rol_tipos_doc VALUES (3428, 2, 429, 1);
INSERT INTO rol_tipos_doc VALUES (3429, 2, 430, 1);
INSERT INTO rol_tipos_doc VALUES (3430, 2, 431, 1);
INSERT INTO rol_tipos_doc VALUES (3431, 2, 432, 1);
INSERT INTO rol_tipos_doc VALUES (3432, 2, 433, 1);
INSERT INTO rol_tipos_doc VALUES (3433, 2, 434, 1);
INSERT INTO rol_tipos_doc VALUES (3434, 2, 435, 1);
INSERT INTO rol_tipos_doc VALUES (3435, 2, 436, 1);
INSERT INTO rol_tipos_doc VALUES (3436, 2, 437, 1);
INSERT INTO rol_tipos_doc VALUES (3437, 2, 440, 1);
INSERT INTO rol_tipos_doc VALUES (3438, 2, 438, 1);
INSERT INTO rol_tipos_doc VALUES (3439, 2, 439, 1);
INSERT INTO rol_tipos_doc VALUES (3440, 2, 441, 1);
INSERT INTO rol_tipos_doc VALUES (3441, 2, 442, 1);
INSERT INTO rol_tipos_doc VALUES (3442, 2, 443, 1);
INSERT INTO rol_tipos_doc VALUES (3443, 2, 444, 1);
INSERT INTO rol_tipos_doc VALUES (3444, 2, 445, 1);
INSERT INTO rol_tipos_doc VALUES (3445, 2, 446, 1);
INSERT INTO rol_tipos_doc VALUES (3446, 2, 447, 1);
INSERT INTO rol_tipos_doc VALUES (3447, 2, 448, 1);
INSERT INTO rol_tipos_doc VALUES (3448, 2, 449, 1);
INSERT INTO rol_tipos_doc VALUES (3449, 2, 451, 1);
INSERT INTO rol_tipos_doc VALUES (3450, 2, 450, 1);
INSERT INTO rol_tipos_doc VALUES (3451, 2, 453, 1);
INSERT INTO rol_tipos_doc VALUES (3452, 2, 454, 1);
INSERT INTO rol_tipos_doc VALUES (3453, 2, 452, 1);
INSERT INTO rol_tipos_doc VALUES (3454, 2, 455, 1);
INSERT INTO rol_tipos_doc VALUES (3455, 2, 456, 1);
INSERT INTO rol_tipos_doc VALUES (3456, 2, 457, 1);
INSERT INTO rol_tipos_doc VALUES (3457, 2, 458, 1);
INSERT INTO rol_tipos_doc VALUES (3458, 2, 459, 1);
INSERT INTO rol_tipos_doc VALUES (3459, 2, 460, 1);
INSERT INTO rol_tipos_doc VALUES (3460, 2, 461, 1);
INSERT INTO rol_tipos_doc VALUES (3461, 2, 462, 1);
INSERT INTO rol_tipos_doc VALUES (3462, 2, 463, 1);
INSERT INTO rol_tipos_doc VALUES (3463, 2, 464, 1);
INSERT INTO rol_tipos_doc VALUES (3464, 2, 465, 1);
INSERT INTO rol_tipos_doc VALUES (3465, 2, 466, 1);
INSERT INTO rol_tipos_doc VALUES (3466, 2, 467, 1);
INSERT INTO rol_tipos_doc VALUES (3467, 2, 468, 1);
INSERT INTO rol_tipos_doc VALUES (3468, 2, 469, 1);
INSERT INTO rol_tipos_doc VALUES (3469, 2, 470, 1);
INSERT INTO rol_tipos_doc VALUES (3470, 2, 471, 1);
INSERT INTO rol_tipos_doc VALUES (3471, 2, 472, 1);
INSERT INTO rol_tipos_doc VALUES (3472, 2, 473, 1);
INSERT INTO rol_tipos_doc VALUES (3473, 2, 474, 1);
INSERT INTO rol_tipos_doc VALUES (3474, 2, 475, 1);
INSERT INTO rol_tipos_doc VALUES (3475, 2, 476, 1);
INSERT INTO rol_tipos_doc VALUES (3476, 2, 482, 1);
INSERT INTO rol_tipos_doc VALUES (3477, 2, 477, 1);
INSERT INTO rol_tipos_doc VALUES (3478, 2, 478, 1);
INSERT INTO rol_tipos_doc VALUES (3479, 2, 479, 1);
INSERT INTO rol_tipos_doc VALUES (3480, 2, 480, 1);
INSERT INTO rol_tipos_doc VALUES (3481, 2, 481, 1);
INSERT INTO rol_tipos_doc VALUES (3482, 2, 483, 1);
INSERT INTO rol_tipos_doc VALUES (3483, 2, 484, 1);
INSERT INTO rol_tipos_doc VALUES (3484, 2, 485, 1);
INSERT INTO rol_tipos_doc VALUES (3485, 2, 486, 1);
INSERT INTO rol_tipos_doc VALUES (3486, 2, 487, 1);
INSERT INTO rol_tipos_doc VALUES (3487, 2, 488, 1);
INSERT INTO rol_tipos_doc VALUES (3488, 2, 489, 1);
INSERT INTO rol_tipos_doc VALUES (3489, 2, 490, 1);
INSERT INTO rol_tipos_doc VALUES (3490, 2, 491, 1);
INSERT INTO rol_tipos_doc VALUES (3491, 2, 492, 1);
INSERT INTO rol_tipos_doc VALUES (3492, 2, 493, 1);
INSERT INTO rol_tipos_doc VALUES (3493, 2, 494, 1);
INSERT INTO rol_tipos_doc VALUES (3494, 2, 495, 1);
INSERT INTO rol_tipos_doc VALUES (3495, 2, 496, 1);
INSERT INTO rol_tipos_doc VALUES (3496, 2, 497, 1);
INSERT INTO rol_tipos_doc VALUES (3497, 2, 498, 1);
INSERT INTO rol_tipos_doc VALUES (3498, 2, 501, 1);
INSERT INTO rol_tipos_doc VALUES (3499, 1, 1, 1);
INSERT INTO rol_tipos_doc VALUES (3500, 1, 2, 1);
INSERT INTO rol_tipos_doc VALUES (3501, 1, 3, 1);
INSERT INTO rol_tipos_doc VALUES (3502, 1, 4, 1);
INSERT INTO rol_tipos_doc VALUES (3503, 1, 5, 1);
INSERT INTO rol_tipos_doc VALUES (3504, 1, 6, 1);
INSERT INTO rol_tipos_doc VALUES (3505, 1, 7, 1);
INSERT INTO rol_tipos_doc VALUES (3506, 1, 8, 1);
INSERT INTO rol_tipos_doc VALUES (3507, 1, 9, 1);
INSERT INTO rol_tipos_doc VALUES (3508, 1, 10, 1);
INSERT INTO rol_tipos_doc VALUES (3509, 1, 11, 1);
INSERT INTO rol_tipos_doc VALUES (3510, 1, 12, 1);
INSERT INTO rol_tipos_doc VALUES (3511, 1, 13, 1);
INSERT INTO rol_tipos_doc VALUES (3512, 1, 14, 1);
INSERT INTO rol_tipos_doc VALUES (3513, 1, 15, 1);
INSERT INTO rol_tipos_doc VALUES (3514, 1, 16, 1);
INSERT INTO rol_tipos_doc VALUES (3515, 1, 17, 1);
INSERT INTO rol_tipos_doc VALUES (3516, 1, 18, 1);
INSERT INTO rol_tipos_doc VALUES (3517, 1, 31, 1);
INSERT INTO rol_tipos_doc VALUES (3518, 1, 19, 1);
INSERT INTO rol_tipos_doc VALUES (3519, 1, 20, 1);
INSERT INTO rol_tipos_doc VALUES (3520, 1, 21, 1);
INSERT INTO rol_tipos_doc VALUES (3521, 1, 22, 1);
INSERT INTO rol_tipos_doc VALUES (3522, 1, 23, 1);
INSERT INTO rol_tipos_doc VALUES (3523, 1, 24, 1);
INSERT INTO rol_tipos_doc VALUES (3524, 1, 25, 1);
INSERT INTO rol_tipos_doc VALUES (3525, 1, 26, 1);
INSERT INTO rol_tipos_doc VALUES (3526, 1, 27, 1);
INSERT INTO rol_tipos_doc VALUES (3527, 1, 28, 1);
INSERT INTO rol_tipos_doc VALUES (3528, 1, 29, 1);
INSERT INTO rol_tipos_doc VALUES (3529, 1, 30, 1);
INSERT INTO rol_tipos_doc VALUES (3530, 1, 32, 1);
INSERT INTO rol_tipos_doc VALUES (3531, 1, 33, 1);
INSERT INTO rol_tipos_doc VALUES (3532, 1, 34, 1);
INSERT INTO rol_tipos_doc VALUES (3533, 1, 35, 1);
INSERT INTO rol_tipos_doc VALUES (3534, 1, 36, 1);
INSERT INTO rol_tipos_doc VALUES (3535, 1, 37, 1);
INSERT INTO rol_tipos_doc VALUES (3536, 1, 38, 1);
INSERT INTO rol_tipos_doc VALUES (3537, 1, 39, 1);
INSERT INTO rol_tipos_doc VALUES (3538, 1, 40, 1);
INSERT INTO rol_tipos_doc VALUES (3539, 1, 41, 1);
INSERT INTO rol_tipos_doc VALUES (3540, 1, 43, 1);
INSERT INTO rol_tipos_doc VALUES (3541, 1, 44, 1);
INSERT INTO rol_tipos_doc VALUES (3542, 1, 42, 1);
INSERT INTO rol_tipos_doc VALUES (3543, 1, 45, 1);
INSERT INTO rol_tipos_doc VALUES (3544, 1, 46, 1);
INSERT INTO rol_tipos_doc VALUES (3545, 1, 47, 1);
INSERT INTO rol_tipos_doc VALUES (3546, 1, 48, 1);
INSERT INTO rol_tipos_doc VALUES (3547, 1, 50, 1);
INSERT INTO rol_tipos_doc VALUES (3548, 1, 49, 1);
INSERT INTO rol_tipos_doc VALUES (3549, 1, 51, 1);
INSERT INTO rol_tipos_doc VALUES (3550, 1, 52, 1);
INSERT INTO rol_tipos_doc VALUES (3551, 1, 53, 1);
INSERT INTO rol_tipos_doc VALUES (3552, 1, 54, 1);
INSERT INTO rol_tipos_doc VALUES (3553, 1, 55, 1);
INSERT INTO rol_tipos_doc VALUES (3554, 1, 57, 1);
INSERT INTO rol_tipos_doc VALUES (3555, 1, 56, 1);
INSERT INTO rol_tipos_doc VALUES (3556, 1, 58, 1);
INSERT INTO rol_tipos_doc VALUES (3557, 1, 59, 1);
INSERT INTO rol_tipos_doc VALUES (3558, 1, 60, 1);
INSERT INTO rol_tipos_doc VALUES (3559, 1, 61, 1);
INSERT INTO rol_tipos_doc VALUES (3560, 1, 62, 1);
INSERT INTO rol_tipos_doc VALUES (3561, 1, 63, 1);
INSERT INTO rol_tipos_doc VALUES (3562, 1, 64, 1);
INSERT INTO rol_tipos_doc VALUES (3563, 1, 65, 1);
INSERT INTO rol_tipos_doc VALUES (3564, 1, 66, 1);
INSERT INTO rol_tipos_doc VALUES (3565, 1, 67, 1);
INSERT INTO rol_tipos_doc VALUES (3566, 1, 68, 1);
INSERT INTO rol_tipos_doc VALUES (3567, 1, 69, 1);
INSERT INTO rol_tipos_doc VALUES (3568, 1, 70, 1);
INSERT INTO rol_tipos_doc VALUES (3569, 1, 80, 1);
INSERT INTO rol_tipos_doc VALUES (3570, 1, 71, 1);
INSERT INTO rol_tipos_doc VALUES (3571, 1, 72, 1);
INSERT INTO rol_tipos_doc VALUES (3572, 1, 73, 1);
INSERT INTO rol_tipos_doc VALUES (3573, 1, 74, 1);
INSERT INTO rol_tipos_doc VALUES (3574, 1, 75, 1);
INSERT INTO rol_tipos_doc VALUES (3575, 1, 76, 1);
INSERT INTO rol_tipos_doc VALUES (3576, 1, 77, 1);
INSERT INTO rol_tipos_doc VALUES (3577, 1, 78, 1);
INSERT INTO rol_tipos_doc VALUES (3578, 1, 79, 1);
INSERT INTO rol_tipos_doc VALUES (3579, 1, 81, 1);
INSERT INTO rol_tipos_doc VALUES (3580, 1, 82, 1);
INSERT INTO rol_tipos_doc VALUES (3581, 1, 83, 1);
INSERT INTO rol_tipos_doc VALUES (3582, 1, 84, 1);
INSERT INTO rol_tipos_doc VALUES (3583, 1, 85, 1);
INSERT INTO rol_tipos_doc VALUES (3584, 1, 86, 1);
INSERT INTO rol_tipos_doc VALUES (3585, 1, 87, 1);
INSERT INTO rol_tipos_doc VALUES (3586, 1, 88, 1);
INSERT INTO rol_tipos_doc VALUES (3587, 1, 89, 1);
INSERT INTO rol_tipos_doc VALUES (3588, 1, 90, 1);
INSERT INTO rol_tipos_doc VALUES (3589, 1, 91, 1);
INSERT INTO rol_tipos_doc VALUES (3590, 1, 92, 1);
INSERT INTO rol_tipos_doc VALUES (3591, 1, 93, 1);
INSERT INTO rol_tipos_doc VALUES (3592, 1, 94, 1);
INSERT INTO rol_tipos_doc VALUES (3593, 1, 95, 1);
INSERT INTO rol_tipos_doc VALUES (3594, 1, 96, 1);
INSERT INTO rol_tipos_doc VALUES (3595, 1, 97, 1);
INSERT INTO rol_tipos_doc VALUES (3596, 1, 98, 1);
INSERT INTO rol_tipos_doc VALUES (3597, 1, 99, 1);
INSERT INTO rol_tipos_doc VALUES (3598, 1, 100, 1);
INSERT INTO rol_tipos_doc VALUES (3599, 1, 101, 1);
INSERT INTO rol_tipos_doc VALUES (3600, 1, 102, 1);
INSERT INTO rol_tipos_doc VALUES (3601, 1, 103, 1);
INSERT INTO rol_tipos_doc VALUES (3602, 1, 107, 1);
INSERT INTO rol_tipos_doc VALUES (3603, 1, 104, 1);
INSERT INTO rol_tipos_doc VALUES (3604, 1, 105, 1);
INSERT INTO rol_tipos_doc VALUES (3605, 1, 106, 1);
INSERT INTO rol_tipos_doc VALUES (3606, 1, 109, 1);
INSERT INTO rol_tipos_doc VALUES (3607, 1, 110, 1);
INSERT INTO rol_tipos_doc VALUES (3608, 1, 111, 1);
INSERT INTO rol_tipos_doc VALUES (3609, 1, 112, 1);
INSERT INTO rol_tipos_doc VALUES (3610, 1, 113, 1);
INSERT INTO rol_tipos_doc VALUES (3611, 1, 114, 1);
INSERT INTO rol_tipos_doc VALUES (3612, 1, 117, 1);
INSERT INTO rol_tipos_doc VALUES (3613, 1, 115, 1);
INSERT INTO rol_tipos_doc VALUES (3614, 1, 116, 1);
INSERT INTO rol_tipos_doc VALUES (3615, 1, 108, 1);
INSERT INTO rol_tipos_doc VALUES (3616, 1, 118, 1);
INSERT INTO rol_tipos_doc VALUES (3617, 1, 119, 1);
INSERT INTO rol_tipos_doc VALUES (3618, 1, 120, 1);
INSERT INTO rol_tipos_doc VALUES (3619, 1, 121, 1);
INSERT INTO rol_tipos_doc VALUES (3620, 1, 122, 1);
INSERT INTO rol_tipos_doc VALUES (3621, 1, 123, 1);
INSERT INTO rol_tipos_doc VALUES (3622, 1, 124, 1);
INSERT INTO rol_tipos_doc VALUES (3623, 1, 125, 1);
INSERT INTO rol_tipos_doc VALUES (3624, 1, 126, 1);
INSERT INTO rol_tipos_doc VALUES (3625, 1, 128, 1);
INSERT INTO rol_tipos_doc VALUES (3626, 1, 127, 1);
INSERT INTO rol_tipos_doc VALUES (3627, 1, 129, 1);
INSERT INTO rol_tipos_doc VALUES (3628, 1, 130, 1);
INSERT INTO rol_tipos_doc VALUES (3629, 1, 131, 1);
INSERT INTO rol_tipos_doc VALUES (3630, 1, 132, 1);
INSERT INTO rol_tipos_doc VALUES (3631, 1, 133, 1);
INSERT INTO rol_tipos_doc VALUES (3632, 1, 137, 1);
INSERT INTO rol_tipos_doc VALUES (3633, 1, 134, 1);
INSERT INTO rol_tipos_doc VALUES (3634, 1, 135, 1);
INSERT INTO rol_tipos_doc VALUES (3635, 1, 136, 1);
INSERT INTO rol_tipos_doc VALUES (3636, 1, 138, 1);
INSERT INTO rol_tipos_doc VALUES (3637, 1, 139, 1);
INSERT INTO rol_tipos_doc VALUES (3638, 1, 140, 1);
INSERT INTO rol_tipos_doc VALUES (3639, 1, 141, 1);
INSERT INTO rol_tipos_doc VALUES (3640, 1, 142, 1);
INSERT INTO rol_tipos_doc VALUES (3641, 1, 143, 1);
INSERT INTO rol_tipos_doc VALUES (3642, 1, 144, 1);
INSERT INTO rol_tipos_doc VALUES (3643, 1, 145, 1);
INSERT INTO rol_tipos_doc VALUES (3644, 1, 146, 1);
INSERT INTO rol_tipos_doc VALUES (3645, 1, 147, 1);
INSERT INTO rol_tipos_doc VALUES (3646, 1, 148, 1);
INSERT INTO rol_tipos_doc VALUES (3647, 1, 149, 1);
INSERT INTO rol_tipos_doc VALUES (3648, 1, 150, 1);
INSERT INTO rol_tipos_doc VALUES (3649, 1, 151, 1);
INSERT INTO rol_tipos_doc VALUES (3650, 1, 152, 1);
INSERT INTO rol_tipos_doc VALUES (3651, 1, 153, 1);
INSERT INTO rol_tipos_doc VALUES (3652, 1, 154, 1);
INSERT INTO rol_tipos_doc VALUES (3653, 1, 155, 1);
INSERT INTO rol_tipos_doc VALUES (3654, 1, 156, 1);
INSERT INTO rol_tipos_doc VALUES (3655, 1, 158, 1);
INSERT INTO rol_tipos_doc VALUES (3656, 1, 157, 1);
INSERT INTO rol_tipos_doc VALUES (3657, 1, 159, 1);
INSERT INTO rol_tipos_doc VALUES (3658, 1, 160, 1);
INSERT INTO rol_tipos_doc VALUES (3659, 1, 161, 1);
INSERT INTO rol_tipos_doc VALUES (3660, 1, 162, 1);
INSERT INTO rol_tipos_doc VALUES (3661, 1, 163, 1);
INSERT INTO rol_tipos_doc VALUES (3662, 1, 164, 1);
INSERT INTO rol_tipos_doc VALUES (3663, 1, 165, 1);
INSERT INTO rol_tipos_doc VALUES (3664, 1, 166, 1);
INSERT INTO rol_tipos_doc VALUES (3665, 1, 167, 1);
INSERT INTO rol_tipos_doc VALUES (3666, 1, 168, 1);
INSERT INTO rol_tipos_doc VALUES (3667, 1, 171, 1);
INSERT INTO rol_tipos_doc VALUES (3668, 1, 170, 1);
INSERT INTO rol_tipos_doc VALUES (3669, 1, 172, 1);
INSERT INTO rol_tipos_doc VALUES (3670, 1, 173, 1);
INSERT INTO rol_tipos_doc VALUES (3671, 1, 169, 1);
INSERT INTO rol_tipos_doc VALUES (3672, 1, 174, 1);
INSERT INTO rol_tipos_doc VALUES (3673, 1, 175, 1);
INSERT INTO rol_tipos_doc VALUES (3674, 1, 176, 1);
INSERT INTO rol_tipos_doc VALUES (3675, 1, 177, 1);
INSERT INTO rol_tipos_doc VALUES (3676, 1, 178, 1);
INSERT INTO rol_tipos_doc VALUES (3677, 1, 179, 1);
INSERT INTO rol_tipos_doc VALUES (3678, 1, 180, 1);
INSERT INTO rol_tipos_doc VALUES (3679, 1, 181, 1);
INSERT INTO rol_tipos_doc VALUES (3680, 1, 182, 1);
INSERT INTO rol_tipos_doc VALUES (3681, 1, 183, 1);
INSERT INTO rol_tipos_doc VALUES (3682, 1, 184, 1);
INSERT INTO rol_tipos_doc VALUES (3683, 1, 185, 1);
INSERT INTO rol_tipos_doc VALUES (3684, 1, 186, 1);
INSERT INTO rol_tipos_doc VALUES (3685, 1, 187, 1);
INSERT INTO rol_tipos_doc VALUES (3686, 1, 188, 1);
INSERT INTO rol_tipos_doc VALUES (3687, 1, 189, 1);
INSERT INTO rol_tipos_doc VALUES (3688, 1, 190, 1);
INSERT INTO rol_tipos_doc VALUES (3689, 1, 191, 1);
INSERT INTO rol_tipos_doc VALUES (3690, 1, 192, 1);
INSERT INTO rol_tipos_doc VALUES (3691, 1, 193, 1);
INSERT INTO rol_tipos_doc VALUES (3692, 1, 194, 1);
INSERT INTO rol_tipos_doc VALUES (3693, 1, 195, 1);
INSERT INTO rol_tipos_doc VALUES (3694, 1, 196, 1);
INSERT INTO rol_tipos_doc VALUES (3695, 1, 197, 1);
INSERT INTO rol_tipos_doc VALUES (3696, 1, 198, 1);
INSERT INTO rol_tipos_doc VALUES (3697, 1, 199, 1);
INSERT INTO rol_tipos_doc VALUES (3698, 1, 200, 1);
INSERT INTO rol_tipos_doc VALUES (3699, 1, 201, 1);
INSERT INTO rol_tipos_doc VALUES (3700, 1, 202, 1);
INSERT INTO rol_tipos_doc VALUES (3701, 1, 203, 1);
INSERT INTO rol_tipos_doc VALUES (3702, 1, 204, 1);
INSERT INTO rol_tipos_doc VALUES (3703, 1, 205, 1);
INSERT INTO rol_tipos_doc VALUES (3704, 1, 206, 1);
INSERT INTO rol_tipos_doc VALUES (3705, 1, 207, 1);
INSERT INTO rol_tipos_doc VALUES (3706, 1, 208, 1);
INSERT INTO rol_tipos_doc VALUES (3707, 1, 209, 1);
INSERT INTO rol_tipos_doc VALUES (3708, 1, 210, 1);
INSERT INTO rol_tipos_doc VALUES (3709, 1, 211, 1);
INSERT INTO rol_tipos_doc VALUES (3710, 1, 212, 1);
INSERT INTO rol_tipos_doc VALUES (3711, 1, 213, 1);
INSERT INTO rol_tipos_doc VALUES (3712, 1, 214, 1);
INSERT INTO rol_tipos_doc VALUES (3713, 1, 215, 1);
INSERT INTO rol_tipos_doc VALUES (3714, 1, 217, 1);
INSERT INTO rol_tipos_doc VALUES (3715, 1, 216, 1);
INSERT INTO rol_tipos_doc VALUES (3716, 1, 218, 1);
INSERT INTO rol_tipos_doc VALUES (3717, 1, 219, 1);
INSERT INTO rol_tipos_doc VALUES (3718, 1, 220, 1);
INSERT INTO rol_tipos_doc VALUES (3719, 1, 221, 1);
INSERT INTO rol_tipos_doc VALUES (3720, 1, 222, 1);
INSERT INTO rol_tipos_doc VALUES (3721, 1, 223, 1);
INSERT INTO rol_tipos_doc VALUES (3722, 1, 224, 1);
INSERT INTO rol_tipos_doc VALUES (3723, 1, 225, 1);
INSERT INTO rol_tipos_doc VALUES (3724, 1, 226, 1);
INSERT INTO rol_tipos_doc VALUES (3725, 1, 227, 1);
INSERT INTO rol_tipos_doc VALUES (3726, 1, 228, 1);
INSERT INTO rol_tipos_doc VALUES (3727, 1, 229, 1);
INSERT INTO rol_tipos_doc VALUES (3728, 1, 230, 1);
INSERT INTO rol_tipos_doc VALUES (3729, 1, 231, 1);
INSERT INTO rol_tipos_doc VALUES (3730, 1, 232, 1);
INSERT INTO rol_tipos_doc VALUES (3731, 1, 233, 1);
INSERT INTO rol_tipos_doc VALUES (3732, 1, 234, 1);
INSERT INTO rol_tipos_doc VALUES (3733, 1, 235, 1);
INSERT INTO rol_tipos_doc VALUES (3734, 1, 236, 1);
INSERT INTO rol_tipos_doc VALUES (3735, 1, 237, 1);
INSERT INTO rol_tipos_doc VALUES (3736, 1, 238, 1);
INSERT INTO rol_tipos_doc VALUES (3737, 1, 239, 1);
INSERT INTO rol_tipos_doc VALUES (3738, 1, 240, 1);
INSERT INTO rol_tipos_doc VALUES (3739, 1, 241, 1);
INSERT INTO rol_tipos_doc VALUES (3740, 1, 242, 1);
INSERT INTO rol_tipos_doc VALUES (3741, 1, 243, 1);
INSERT INTO rol_tipos_doc VALUES (3742, 1, 244, 1);
INSERT INTO rol_tipos_doc VALUES (3743, 1, 245, 1);
INSERT INTO rol_tipos_doc VALUES (3744, 1, 246, 1);
INSERT INTO rol_tipos_doc VALUES (3745, 1, 247, 1);
INSERT INTO rol_tipos_doc VALUES (3746, 1, 248, 1);
INSERT INTO rol_tipos_doc VALUES (3747, 1, 249, 1);
INSERT INTO rol_tipos_doc VALUES (3748, 1, 251, 1);
INSERT INTO rol_tipos_doc VALUES (3749, 1, 250, 1);
INSERT INTO rol_tipos_doc VALUES (3750, 1, 499, 1);
INSERT INTO rol_tipos_doc VALUES (3751, 1, 252, 1);
INSERT INTO rol_tipos_doc VALUES (3752, 1, 253, 1);
INSERT INTO rol_tipos_doc VALUES (3753, 1, 255, 1);
INSERT INTO rol_tipos_doc VALUES (3754, 1, 256, 1);
INSERT INTO rol_tipos_doc VALUES (3755, 1, 254, 1);
INSERT INTO rol_tipos_doc VALUES (3756, 1, 257, 1);
INSERT INTO rol_tipos_doc VALUES (3757, 1, 258, 1);
INSERT INTO rol_tipos_doc VALUES (3758, 1, 259, 1);
INSERT INTO rol_tipos_doc VALUES (3759, 1, 260, 1);
INSERT INTO rol_tipos_doc VALUES (3760, 1, 261, 1);
INSERT INTO rol_tipos_doc VALUES (3761, 1, 262, 1);
INSERT INTO rol_tipos_doc VALUES (3762, 1, 263, 1);
INSERT INTO rol_tipos_doc VALUES (3763, 1, 264, 1);
INSERT INTO rol_tipos_doc VALUES (3764, 1, 265, 1);
INSERT INTO rol_tipos_doc VALUES (3765, 1, 266, 1);
INSERT INTO rol_tipos_doc VALUES (3766, 1, 267, 1);
INSERT INTO rol_tipos_doc VALUES (3767, 1, 283, 1);
INSERT INTO rol_tipos_doc VALUES (3768, 1, 268, 1);
INSERT INTO rol_tipos_doc VALUES (3769, 1, 269, 1);
INSERT INTO rol_tipos_doc VALUES (3770, 1, 270, 1);
INSERT INTO rol_tipos_doc VALUES (3771, 1, 271, 1);
INSERT INTO rol_tipos_doc VALUES (3772, 1, 272, 1);
INSERT INTO rol_tipos_doc VALUES (3773, 1, 273, 1);
INSERT INTO rol_tipos_doc VALUES (3774, 1, 275, 1);
INSERT INTO rol_tipos_doc VALUES (3775, 1, 276, 1);
INSERT INTO rol_tipos_doc VALUES (3776, 1, 274, 1);
INSERT INTO rol_tipos_doc VALUES (3777, 1, 277, 1);
INSERT INTO rol_tipos_doc VALUES (3778, 1, 278, 1);
INSERT INTO rol_tipos_doc VALUES (3779, 1, 279, 1);
INSERT INTO rol_tipos_doc VALUES (3780, 1, 280, 1);
INSERT INTO rol_tipos_doc VALUES (3781, 1, 281, 1);
INSERT INTO rol_tipos_doc VALUES (3782, 1, 282, 1);
INSERT INTO rol_tipos_doc VALUES (3783, 1, 286, 1);
INSERT INTO rol_tipos_doc VALUES (3784, 1, 284, 1);
INSERT INTO rol_tipos_doc VALUES (3785, 1, 285, 1);
INSERT INTO rol_tipos_doc VALUES (3786, 1, 287, 1);
INSERT INTO rol_tipos_doc VALUES (3787, 1, 288, 1);
INSERT INTO rol_tipos_doc VALUES (3788, 1, 289, 1);
INSERT INTO rol_tipos_doc VALUES (3789, 1, 290, 1);
INSERT INTO rol_tipos_doc VALUES (3790, 1, 291, 1);
INSERT INTO rol_tipos_doc VALUES (3791, 1, 292, 1);
INSERT INTO rol_tipos_doc VALUES (3792, 1, 294, 1);
INSERT INTO rol_tipos_doc VALUES (3793, 1, 295, 1);
INSERT INTO rol_tipos_doc VALUES (3794, 1, 296, 1);
INSERT INTO rol_tipos_doc VALUES (3795, 1, 293, 1);
INSERT INTO rol_tipos_doc VALUES (3796, 1, 297, 1);
INSERT INTO rol_tipos_doc VALUES (3797, 1, 298, 1);
INSERT INTO rol_tipos_doc VALUES (3798, 1, 299, 1);
INSERT INTO rol_tipos_doc VALUES (3799, 1, 300, 1);
INSERT INTO rol_tipos_doc VALUES (3800, 1, 301, 1);
INSERT INTO rol_tipos_doc VALUES (3801, 1, 302, 1);
INSERT INTO rol_tipos_doc VALUES (3802, 1, 303, 1);
INSERT INTO rol_tipos_doc VALUES (3803, 1, 304, 1);
INSERT INTO rol_tipos_doc VALUES (3804, 1, 305, 1);
INSERT INTO rol_tipos_doc VALUES (3805, 1, 306, 1);
INSERT INTO rol_tipos_doc VALUES (3806, 1, 307, 1);
INSERT INTO rol_tipos_doc VALUES (3807, 1, 308, 1);
INSERT INTO rol_tipos_doc VALUES (3808, 1, 309, 1);
INSERT INTO rol_tipos_doc VALUES (3809, 1, 310, 1);
INSERT INTO rol_tipos_doc VALUES (3810, 1, 311, 1);
INSERT INTO rol_tipos_doc VALUES (3811, 1, 312, 1);
INSERT INTO rol_tipos_doc VALUES (3812, 1, 313, 1);
INSERT INTO rol_tipos_doc VALUES (3813, 1, 314, 1);
INSERT INTO rol_tipos_doc VALUES (3814, 1, 315, 1);
INSERT INTO rol_tipos_doc VALUES (3815, 1, 316, 1);
INSERT INTO rol_tipos_doc VALUES (3816, 1, 317, 1);
INSERT INTO rol_tipos_doc VALUES (3817, 1, 318, 1);
INSERT INTO rol_tipos_doc VALUES (3818, 1, 319, 1);
INSERT INTO rol_tipos_doc VALUES (3819, 1, 320, 1);
INSERT INTO rol_tipos_doc VALUES (3820, 1, 321, 1);
INSERT INTO rol_tipos_doc VALUES (3821, 1, 322, 1);
INSERT INTO rol_tipos_doc VALUES (3822, 1, 323, 1);
INSERT INTO rol_tipos_doc VALUES (3823, 1, 324, 1);
INSERT INTO rol_tipos_doc VALUES (3824, 1, 325, 1);
INSERT INTO rol_tipos_doc VALUES (3825, 1, 326, 1);
INSERT INTO rol_tipos_doc VALUES (3826, 1, 327, 1);
INSERT INTO rol_tipos_doc VALUES (3827, 1, 328, 1);
INSERT INTO rol_tipos_doc VALUES (3828, 1, 329, 1);
INSERT INTO rol_tipos_doc VALUES (3829, 1, 330, 1);
INSERT INTO rol_tipos_doc VALUES (3830, 1, 331, 1);
INSERT INTO rol_tipos_doc VALUES (3831, 1, 332, 1);
INSERT INTO rol_tipos_doc VALUES (3832, 1, 333, 1);
INSERT INTO rol_tipos_doc VALUES (3833, 1, 334, 1);
INSERT INTO rol_tipos_doc VALUES (3834, 1, 335, 1);
INSERT INTO rol_tipos_doc VALUES (3835, 1, 336, 1);
INSERT INTO rol_tipos_doc VALUES (3836, 1, 337, 1);
INSERT INTO rol_tipos_doc VALUES (3837, 1, 500, 1);
INSERT INTO rol_tipos_doc VALUES (3838, 1, 338, 1);
INSERT INTO rol_tipos_doc VALUES (3839, 1, 339, 1);
INSERT INTO rol_tipos_doc VALUES (3840, 1, 340, 1);
INSERT INTO rol_tipos_doc VALUES (3841, 1, 341, 1);
INSERT INTO rol_tipos_doc VALUES (3842, 1, 342, 1);
INSERT INTO rol_tipos_doc VALUES (3843, 1, 343, 1);
INSERT INTO rol_tipos_doc VALUES (3844, 1, 345, 1);
INSERT INTO rol_tipos_doc VALUES (3845, 1, 346, 1);
INSERT INTO rol_tipos_doc VALUES (3846, 1, 344, 1);
INSERT INTO rol_tipos_doc VALUES (3847, 1, 348, 1);
INSERT INTO rol_tipos_doc VALUES (3848, 1, 350, 1);
INSERT INTO rol_tipos_doc VALUES (3849, 1, 351, 1);
INSERT INTO rol_tipos_doc VALUES (3850, 1, 352, 1);
INSERT INTO rol_tipos_doc VALUES (3851, 1, 353, 1);
INSERT INTO rol_tipos_doc VALUES (3852, 1, 354, 1);
INSERT INTO rol_tipos_doc VALUES (3853, 1, 355, 1);
INSERT INTO rol_tipos_doc VALUES (3854, 1, 349, 1);
INSERT INTO rol_tipos_doc VALUES (3855, 1, 356, 1);
INSERT INTO rol_tipos_doc VALUES (3856, 1, 357, 1);
INSERT INTO rol_tipos_doc VALUES (3857, 1, 358, 1);
INSERT INTO rol_tipos_doc VALUES (3858, 1, 359, 1);
INSERT INTO rol_tipos_doc VALUES (3859, 1, 360, 1);
INSERT INTO rol_tipos_doc VALUES (3860, 1, 361, 1);
INSERT INTO rol_tipos_doc VALUES (3861, 1, 362, 1);
INSERT INTO rol_tipos_doc VALUES (3862, 1, 363, 1);
INSERT INTO rol_tipos_doc VALUES (3863, 1, 372, 1);
INSERT INTO rol_tipos_doc VALUES (3864, 1, 373, 1);
INSERT INTO rol_tipos_doc VALUES (3865, 1, 364, 1);
INSERT INTO rol_tipos_doc VALUES (3866, 1, 365, 1);
INSERT INTO rol_tipos_doc VALUES (3867, 1, 366, 1);
INSERT INTO rol_tipos_doc VALUES (3868, 1, 367, 1);
INSERT INTO rol_tipos_doc VALUES (3869, 1, 368, 1);
INSERT INTO rol_tipos_doc VALUES (3870, 1, 369, 1);
INSERT INTO rol_tipos_doc VALUES (3871, 1, 370, 1);
INSERT INTO rol_tipos_doc VALUES (3872, 1, 375, 1);
INSERT INTO rol_tipos_doc VALUES (3873, 1, 376, 1);
INSERT INTO rol_tipos_doc VALUES (3874, 1, 377, 1);
INSERT INTO rol_tipos_doc VALUES (3875, 1, 378, 1);
INSERT INTO rol_tipos_doc VALUES (3876, 1, 379, 1);
INSERT INTO rol_tipos_doc VALUES (3877, 1, 374, 1);
INSERT INTO rol_tipos_doc VALUES (3878, 1, 371, 1);
INSERT INTO rol_tipos_doc VALUES (3879, 1, 380, 1);
INSERT INTO rol_tipos_doc VALUES (3880, 1, 381, 1);
INSERT INTO rol_tipos_doc VALUES (3881, 1, 382, 1);
INSERT INTO rol_tipos_doc VALUES (3882, 1, 383, 1);
INSERT INTO rol_tipos_doc VALUES (3883, 1, 384, 1);
INSERT INTO rol_tipos_doc VALUES (3884, 1, 385, 1);
INSERT INTO rol_tipos_doc VALUES (3885, 1, 386, 1);
INSERT INTO rol_tipos_doc VALUES (3886, 1, 387, 1);
INSERT INTO rol_tipos_doc VALUES (3887, 1, 388, 1);
INSERT INTO rol_tipos_doc VALUES (3888, 1, 389, 1);
INSERT INTO rol_tipos_doc VALUES (3889, 1, 390, 1);
INSERT INTO rol_tipos_doc VALUES (3890, 1, 391, 1);
INSERT INTO rol_tipos_doc VALUES (3891, 1, 392, 1);
INSERT INTO rol_tipos_doc VALUES (3892, 1, 393, 1);
INSERT INTO rol_tipos_doc VALUES (3893, 1, 394, 1);
INSERT INTO rol_tipos_doc VALUES (3894, 1, 395, 1);
INSERT INTO rol_tipos_doc VALUES (3895, 1, 396, 1);
INSERT INTO rol_tipos_doc VALUES (3896, 1, 397, 1);
INSERT INTO rol_tipos_doc VALUES (3897, 1, 398, 1);
INSERT INTO rol_tipos_doc VALUES (3898, 1, 399, 1);
INSERT INTO rol_tipos_doc VALUES (3899, 1, 400, 1);
INSERT INTO rol_tipos_doc VALUES (3900, 1, 401, 1);
INSERT INTO rol_tipos_doc VALUES (3901, 1, 402, 1);
INSERT INTO rol_tipos_doc VALUES (3902, 1, 403, 1);
INSERT INTO rol_tipos_doc VALUES (3903, 1, 404, 1);
INSERT INTO rol_tipos_doc VALUES (3904, 1, 405, 1);
INSERT INTO rol_tipos_doc VALUES (3905, 1, 406, 1);
INSERT INTO rol_tipos_doc VALUES (3906, 1, 408, 1);
INSERT INTO rol_tipos_doc VALUES (3907, 1, 409, 1);
INSERT INTO rol_tipos_doc VALUES (3908, 1, 410, 1);
INSERT INTO rol_tipos_doc VALUES (3909, 1, 411, 1);
INSERT INTO rol_tipos_doc VALUES (3910, 1, 412, 1);
INSERT INTO rol_tipos_doc VALUES (3911, 1, 407, 1);
INSERT INTO rol_tipos_doc VALUES (3912, 1, 413, 1);
INSERT INTO rol_tipos_doc VALUES (3913, 1, 414, 1);
INSERT INTO rol_tipos_doc VALUES (3914, 1, 415, 1);
INSERT INTO rol_tipos_doc VALUES (3915, 1, 416, 1);
INSERT INTO rol_tipos_doc VALUES (3916, 1, 417, 1);
INSERT INTO rol_tipos_doc VALUES (3917, 1, 418, 1);
INSERT INTO rol_tipos_doc VALUES (3918, 1, 419, 1);
INSERT INTO rol_tipos_doc VALUES (3919, 1, 420, 1);
INSERT INTO rol_tipos_doc VALUES (3920, 1, 421, 1);
INSERT INTO rol_tipos_doc VALUES (3921, 1, 422, 1);
INSERT INTO rol_tipos_doc VALUES (3922, 1, 423, 1);
INSERT INTO rol_tipos_doc VALUES (3923, 1, 424, 1);
INSERT INTO rol_tipos_doc VALUES (3924, 1, 425, 1);
INSERT INTO rol_tipos_doc VALUES (3925, 1, 426, 1);
INSERT INTO rol_tipos_doc VALUES (3926, 1, 427, 1);
INSERT INTO rol_tipos_doc VALUES (3927, 1, 428, 1);
INSERT INTO rol_tipos_doc VALUES (3928, 1, 429, 1);
INSERT INTO rol_tipos_doc VALUES (3929, 1, 430, 1);
INSERT INTO rol_tipos_doc VALUES (3930, 1, 431, 1);
INSERT INTO rol_tipos_doc VALUES (3931, 1, 432, 1);
INSERT INTO rol_tipos_doc VALUES (3932, 1, 433, 1);
INSERT INTO rol_tipos_doc VALUES (3933, 1, 434, 1);
INSERT INTO rol_tipos_doc VALUES (3934, 1, 435, 1);
INSERT INTO rol_tipos_doc VALUES (3935, 1, 436, 1);
INSERT INTO rol_tipos_doc VALUES (3936, 1, 437, 1);
INSERT INTO rol_tipos_doc VALUES (3937, 1, 440, 1);
INSERT INTO rol_tipos_doc VALUES (3938, 1, 438, 1);
INSERT INTO rol_tipos_doc VALUES (3939, 1, 439, 1);
INSERT INTO rol_tipos_doc VALUES (3940, 1, 441, 1);
INSERT INTO rol_tipos_doc VALUES (3941, 1, 442, 1);
INSERT INTO rol_tipos_doc VALUES (3942, 1, 443, 1);
INSERT INTO rol_tipos_doc VALUES (3943, 1, 444, 1);
INSERT INTO rol_tipos_doc VALUES (3944, 1, 445, 1);
INSERT INTO rol_tipos_doc VALUES (3945, 1, 446, 1);
INSERT INTO rol_tipos_doc VALUES (3946, 1, 447, 1);
INSERT INTO rol_tipos_doc VALUES (3947, 1, 448, 1);
INSERT INTO rol_tipos_doc VALUES (3948, 1, 449, 1);
INSERT INTO rol_tipos_doc VALUES (3949, 1, 451, 1);
INSERT INTO rol_tipos_doc VALUES (3950, 1, 450, 1);
INSERT INTO rol_tipos_doc VALUES (3951, 1, 453, 1);
INSERT INTO rol_tipos_doc VALUES (3952, 1, 454, 1);
INSERT INTO rol_tipos_doc VALUES (3953, 1, 452, 1);
INSERT INTO rol_tipos_doc VALUES (3954, 1, 501, 1);
INSERT INTO rol_tipos_doc VALUES (3955, 1, 455, 1);
INSERT INTO rol_tipos_doc VALUES (3956, 1, 456, 1);
INSERT INTO rol_tipos_doc VALUES (3957, 1, 457, 1);
INSERT INTO rol_tipos_doc VALUES (3958, 1, 458, 1);
INSERT INTO rol_tipos_doc VALUES (3959, 1, 459, 1);
INSERT INTO rol_tipos_doc VALUES (3960, 1, 460, 1);
INSERT INTO rol_tipos_doc VALUES (3961, 1, 461, 1);
INSERT INTO rol_tipos_doc VALUES (3962, 1, 462, 1);
INSERT INTO rol_tipos_doc VALUES (3963, 1, 463, 1);
INSERT INTO rol_tipos_doc VALUES (3964, 1, 465, 1);
INSERT INTO rol_tipos_doc VALUES (3965, 1, 466, 1);
INSERT INTO rol_tipos_doc VALUES (3966, 1, 467, 1);
INSERT INTO rol_tipos_doc VALUES (3967, 1, 468, 1);
INSERT INTO rol_tipos_doc VALUES (3968, 1, 469, 1);
INSERT INTO rol_tipos_doc VALUES (3969, 1, 470, 1);
INSERT INTO rol_tipos_doc VALUES (3970, 1, 471, 1);
INSERT INTO rol_tipos_doc VALUES (3971, 1, 472, 1);
INSERT INTO rol_tipos_doc VALUES (3972, 1, 473, 1);
INSERT INTO rol_tipos_doc VALUES (3973, 1, 474, 1);
INSERT INTO rol_tipos_doc VALUES (3974, 1, 475, 1);
INSERT INTO rol_tipos_doc VALUES (3975, 1, 476, 1);
INSERT INTO rol_tipos_doc VALUES (3976, 1, 482, 1);
INSERT INTO rol_tipos_doc VALUES (3977, 1, 477, 1);
INSERT INTO rol_tipos_doc VALUES (3978, 1, 478, 1);
INSERT INTO rol_tipos_doc VALUES (3979, 1, 479, 1);
INSERT INTO rol_tipos_doc VALUES (3980, 1, 480, 1);
INSERT INTO rol_tipos_doc VALUES (3981, 1, 481, 1);
INSERT INTO rol_tipos_doc VALUES (3982, 1, 483, 1);
INSERT INTO rol_tipos_doc VALUES (3983, 1, 464, 1);
INSERT INTO rol_tipos_doc VALUES (3984, 1, 484, 1);
INSERT INTO rol_tipos_doc VALUES (3985, 1, 485, 1);
INSERT INTO rol_tipos_doc VALUES (3986, 1, 486, 1);
INSERT INTO rol_tipos_doc VALUES (3987, 1, 487, 1);
INSERT INTO rol_tipos_doc VALUES (3988, 1, 488, 1);
INSERT INTO rol_tipos_doc VALUES (3989, 1, 489, 1);
INSERT INTO rol_tipos_doc VALUES (3990, 1, 490, 1);
INSERT INTO rol_tipos_doc VALUES (3991, 1, 491, 1);
INSERT INTO rol_tipos_doc VALUES (3992, 1, 492, 1);
INSERT INTO rol_tipos_doc VALUES (3993, 1, 493, 1);
INSERT INTO rol_tipos_doc VALUES (3994, 1, 494, 1);
INSERT INTO rol_tipos_doc VALUES (3995, 1, 495, 1);
INSERT INTO rol_tipos_doc VALUES (3996, 1, 496, 1);
INSERT INTO rol_tipos_doc VALUES (3997, 1, 502, 1);
INSERT INTO rol_tipos_doc VALUES (3998, 1, 497, 1);
INSERT INTO rol_tipos_doc VALUES (3999, 1, 498, 1);
INSERT INTO rol_tipos_doc VALUES (4501, 4, 1, 1);
INSERT INTO rol_tipos_doc VALUES (4502, 4, 2, 1);
INSERT INTO rol_tipos_doc VALUES (4503, 4, 3, 1);
INSERT INTO rol_tipos_doc VALUES (4504, 4, 4, 1);
INSERT INTO rol_tipos_doc VALUES (4505, 4, 5, 1);
INSERT INTO rol_tipos_doc VALUES (4506, 4, 6, 1);
INSERT INTO rol_tipos_doc VALUES (4507, 4, 7, 1);
INSERT INTO rol_tipos_doc VALUES (4508, 4, 8, 1);
INSERT INTO rol_tipos_doc VALUES (4509, 4, 9, 1);
INSERT INTO rol_tipos_doc VALUES (4510, 4, 10, 1);
INSERT INTO rol_tipos_doc VALUES (4511, 4, 11, 1);
INSERT INTO rol_tipos_doc VALUES (4512, 4, 12, 1);
INSERT INTO rol_tipos_doc VALUES (4513, 4, 13, 1);
INSERT INTO rol_tipos_doc VALUES (4514, 4, 14, 1);
INSERT INTO rol_tipos_doc VALUES (4515, 4, 15, 1);
INSERT INTO rol_tipos_doc VALUES (4516, 4, 16, 1);
INSERT INTO rol_tipos_doc VALUES (4517, 4, 17, 1);
INSERT INTO rol_tipos_doc VALUES (4518, 4, 18, 1);
INSERT INTO rol_tipos_doc VALUES (4519, 4, 31, 1);
INSERT INTO rol_tipos_doc VALUES (4520, 4, 19, 1);
INSERT INTO rol_tipos_doc VALUES (4521, 4, 20, 1);
INSERT INTO rol_tipos_doc VALUES (4522, 4, 21, 1);
INSERT INTO rol_tipos_doc VALUES (4523, 4, 22, 1);
INSERT INTO rol_tipos_doc VALUES (4524, 4, 23, 1);
INSERT INTO rol_tipos_doc VALUES (4525, 4, 24, 1);
INSERT INTO rol_tipos_doc VALUES (4526, 4, 25, 1);
INSERT INTO rol_tipos_doc VALUES (4527, 4, 26, 1);
INSERT INTO rol_tipos_doc VALUES (4528, 4, 27, 1);
INSERT INTO rol_tipos_doc VALUES (4529, 4, 28, 1);
INSERT INTO rol_tipos_doc VALUES (4530, 4, 29, 1);
INSERT INTO rol_tipos_doc VALUES (4531, 4, 30, 1);
INSERT INTO rol_tipos_doc VALUES (4532, 4, 32, 1);
INSERT INTO rol_tipos_doc VALUES (4533, 4, 33, 1);
INSERT INTO rol_tipos_doc VALUES (4534, 4, 34, 1);
INSERT INTO rol_tipos_doc VALUES (4535, 4, 35, 1);
INSERT INTO rol_tipos_doc VALUES (4536, 4, 36, 1);
INSERT INTO rol_tipos_doc VALUES (4537, 4, 37, 1);
INSERT INTO rol_tipos_doc VALUES (4538, 4, 38, 1);
INSERT INTO rol_tipos_doc VALUES (4539, 4, 39, 1);
INSERT INTO rol_tipos_doc VALUES (4540, 4, 40, 1);
INSERT INTO rol_tipos_doc VALUES (4541, 4, 41, 1);
INSERT INTO rol_tipos_doc VALUES (4542, 4, 43, 1);
INSERT INTO rol_tipos_doc VALUES (4543, 4, 44, 1);
INSERT INTO rol_tipos_doc VALUES (4544, 4, 42, 1);
INSERT INTO rol_tipos_doc VALUES (4545, 4, 45, 1);
INSERT INTO rol_tipos_doc VALUES (4546, 4, 46, 1);
INSERT INTO rol_tipos_doc VALUES (4547, 4, 47, 1);
INSERT INTO rol_tipos_doc VALUES (4548, 4, 48, 1);
INSERT INTO rol_tipos_doc VALUES (4549, 4, 50, 1);
INSERT INTO rol_tipos_doc VALUES (4550, 4, 49, 1);
INSERT INTO rol_tipos_doc VALUES (4551, 4, 51, 1);
INSERT INTO rol_tipos_doc VALUES (4552, 4, 52, 1);
INSERT INTO rol_tipos_doc VALUES (4553, 4, 53, 1);
INSERT INTO rol_tipos_doc VALUES (4554, 4, 54, 1);
INSERT INTO rol_tipos_doc VALUES (4555, 4, 55, 1);
INSERT INTO rol_tipos_doc VALUES (4556, 4, 57, 1);
INSERT INTO rol_tipos_doc VALUES (4557, 4, 56, 1);
INSERT INTO rol_tipos_doc VALUES (4558, 4, 58, 1);
INSERT INTO rol_tipos_doc VALUES (4559, 4, 59, 1);
INSERT INTO rol_tipos_doc VALUES (4560, 4, 60, 1);
INSERT INTO rol_tipos_doc VALUES (4561, 4, 61, 1);
INSERT INTO rol_tipos_doc VALUES (4562, 4, 62, 1);
INSERT INTO rol_tipos_doc VALUES (4563, 4, 63, 1);
INSERT INTO rol_tipos_doc VALUES (4564, 4, 64, 1);
INSERT INTO rol_tipos_doc VALUES (4565, 4, 65, 1);
INSERT INTO rol_tipos_doc VALUES (4566, 4, 66, 1);
INSERT INTO rol_tipos_doc VALUES (4567, 4, 67, 1);
INSERT INTO rol_tipos_doc VALUES (4568, 4, 68, 1);
INSERT INTO rol_tipos_doc VALUES (4569, 4, 69, 1);
INSERT INTO rol_tipos_doc VALUES (4570, 4, 70, 1);
INSERT INTO rol_tipos_doc VALUES (4571, 4, 80, 1);
INSERT INTO rol_tipos_doc VALUES (4572, 4, 71, 1);
INSERT INTO rol_tipos_doc VALUES (4573, 4, 72, 1);
INSERT INTO rol_tipos_doc VALUES (4574, 4, 73, 1);
INSERT INTO rol_tipos_doc VALUES (4575, 4, 74, 1);
INSERT INTO rol_tipos_doc VALUES (4576, 4, 75, 1);
INSERT INTO rol_tipos_doc VALUES (4577, 4, 76, 1);
INSERT INTO rol_tipos_doc VALUES (4578, 4, 77, 1);
INSERT INTO rol_tipos_doc VALUES (4579, 4, 78, 1);
INSERT INTO rol_tipos_doc VALUES (4580, 4, 79, 1);
INSERT INTO rol_tipos_doc VALUES (4581, 4, 81, 1);
INSERT INTO rol_tipos_doc VALUES (4582, 4, 82, 1);
INSERT INTO rol_tipos_doc VALUES (4583, 4, 83, 1);
INSERT INTO rol_tipos_doc VALUES (4584, 4, 84, 1);
INSERT INTO rol_tipos_doc VALUES (4585, 4, 85, 1);
INSERT INTO rol_tipos_doc VALUES (4586, 4, 86, 1);
INSERT INTO rol_tipos_doc VALUES (4587, 4, 87, 1);
INSERT INTO rol_tipos_doc VALUES (4588, 4, 88, 1);
INSERT INTO rol_tipos_doc VALUES (4589, 4, 89, 1);
INSERT INTO rol_tipos_doc VALUES (4590, 4, 90, 1);
INSERT INTO rol_tipos_doc VALUES (4591, 4, 91, 1);
INSERT INTO rol_tipos_doc VALUES (4592, 4, 92, 1);
INSERT INTO rol_tipos_doc VALUES (4593, 4, 93, 1);
INSERT INTO rol_tipos_doc VALUES (4594, 4, 94, 1);
INSERT INTO rol_tipos_doc VALUES (4595, 4, 95, 1);
INSERT INTO rol_tipos_doc VALUES (4596, 4, 96, 1);
INSERT INTO rol_tipos_doc VALUES (4597, 4, 97, 1);
INSERT INTO rol_tipos_doc VALUES (4598, 4, 98, 1);
INSERT INTO rol_tipos_doc VALUES (4599, 4, 99, 1);
INSERT INTO rol_tipos_doc VALUES (4600, 4, 100, 1);
INSERT INTO rol_tipos_doc VALUES (4601, 4, 101, 1);
INSERT INTO rol_tipos_doc VALUES (4602, 4, 102, 1);
INSERT INTO rol_tipos_doc VALUES (4603, 4, 103, 1);
INSERT INTO rol_tipos_doc VALUES (4604, 4, 107, 1);
INSERT INTO rol_tipos_doc VALUES (4605, 4, 104, 1);
INSERT INTO rol_tipos_doc VALUES (4606, 4, 105, 1);
INSERT INTO rol_tipos_doc VALUES (4607, 4, 106, 1);
INSERT INTO rol_tipos_doc VALUES (4608, 4, 109, 1);
INSERT INTO rol_tipos_doc VALUES (4609, 4, 110, 1);
INSERT INTO rol_tipos_doc VALUES (4610, 4, 111, 1);
INSERT INTO rol_tipos_doc VALUES (4611, 4, 112, 1);
INSERT INTO rol_tipos_doc VALUES (4612, 4, 113, 1);
INSERT INTO rol_tipos_doc VALUES (4613, 4, 114, 1);
INSERT INTO rol_tipos_doc VALUES (4614, 4, 117, 1);
INSERT INTO rol_tipos_doc VALUES (4615, 4, 115, 1);
INSERT INTO rol_tipos_doc VALUES (4616, 4, 116, 1);
INSERT INTO rol_tipos_doc VALUES (4617, 4, 108, 1);
INSERT INTO rol_tipos_doc VALUES (4618, 4, 118, 1);
INSERT INTO rol_tipos_doc VALUES (4619, 4, 119, 1);
INSERT INTO rol_tipos_doc VALUES (4620, 4, 120, 1);
INSERT INTO rol_tipos_doc VALUES (4621, 4, 121, 1);
INSERT INTO rol_tipos_doc VALUES (4622, 4, 122, 1);
INSERT INTO rol_tipos_doc VALUES (4623, 4, 123, 1);
INSERT INTO rol_tipos_doc VALUES (4624, 4, 124, 1);
INSERT INTO rol_tipos_doc VALUES (4625, 4, 125, 1);
INSERT INTO rol_tipos_doc VALUES (4626, 4, 126, 1);
INSERT INTO rol_tipos_doc VALUES (4627, 4, 128, 1);
INSERT INTO rol_tipos_doc VALUES (4628, 4, 127, 1);
INSERT INTO rol_tipos_doc VALUES (4629, 4, 129, 1);
INSERT INTO rol_tipos_doc VALUES (4630, 4, 130, 1);
INSERT INTO rol_tipos_doc VALUES (4631, 4, 131, 1);
INSERT INTO rol_tipos_doc VALUES (4632, 4, 132, 1);
INSERT INTO rol_tipos_doc VALUES (4633, 4, 133, 1);
INSERT INTO rol_tipos_doc VALUES (4634, 4, 137, 1);
INSERT INTO rol_tipos_doc VALUES (4635, 4, 134, 1);
INSERT INTO rol_tipos_doc VALUES (4636, 4, 135, 1);
INSERT INTO rol_tipos_doc VALUES (4637, 4, 136, 1);
INSERT INTO rol_tipos_doc VALUES (4638, 4, 138, 1);
INSERT INTO rol_tipos_doc VALUES (4639, 4, 139, 1);
INSERT INTO rol_tipos_doc VALUES (4640, 4, 140, 1);
INSERT INTO rol_tipos_doc VALUES (4641, 4, 141, 1);
INSERT INTO rol_tipos_doc VALUES (4642, 4, 142, 1);
INSERT INTO rol_tipos_doc VALUES (4643, 4, 143, 1);
INSERT INTO rol_tipos_doc VALUES (4644, 4, 144, 1);
INSERT INTO rol_tipos_doc VALUES (4645, 4, 145, 1);
INSERT INTO rol_tipos_doc VALUES (4646, 4, 146, 1);
INSERT INTO rol_tipos_doc VALUES (4647, 4, 147, 1);
INSERT INTO rol_tipos_doc VALUES (4648, 4, 148, 1);
INSERT INTO rol_tipos_doc VALUES (4649, 4, 149, 1);
INSERT INTO rol_tipos_doc VALUES (4650, 4, 150, 1);
INSERT INTO rol_tipos_doc VALUES (4651, 4, 151, 1);
INSERT INTO rol_tipos_doc VALUES (4652, 4, 152, 1);
INSERT INTO rol_tipos_doc VALUES (4653, 4, 153, 1);
INSERT INTO rol_tipos_doc VALUES (4654, 4, 154, 1);
INSERT INTO rol_tipos_doc VALUES (4655, 4, 155, 1);
INSERT INTO rol_tipos_doc VALUES (4656, 4, 156, 1);
INSERT INTO rol_tipos_doc VALUES (4657, 4, 158, 1);
INSERT INTO rol_tipos_doc VALUES (4658, 4, 157, 1);
INSERT INTO rol_tipos_doc VALUES (4659, 4, 159, 1);
INSERT INTO rol_tipos_doc VALUES (4660, 4, 160, 1);
INSERT INTO rol_tipos_doc VALUES (4661, 4, 161, 1);
INSERT INTO rol_tipos_doc VALUES (4662, 4, 162, 1);
INSERT INTO rol_tipos_doc VALUES (4663, 4, 163, 1);
INSERT INTO rol_tipos_doc VALUES (4664, 4, 164, 1);
INSERT INTO rol_tipos_doc VALUES (4665, 4, 165, 1);
INSERT INTO rol_tipos_doc VALUES (4666, 4, 166, 1);
INSERT INTO rol_tipos_doc VALUES (4667, 4, 167, 1);
INSERT INTO rol_tipos_doc VALUES (4668, 4, 168, 1);
INSERT INTO rol_tipos_doc VALUES (4669, 4, 171, 1);
INSERT INTO rol_tipos_doc VALUES (4670, 4, 170, 1);
INSERT INTO rol_tipos_doc VALUES (4671, 4, 172, 1);
INSERT INTO rol_tipos_doc VALUES (4672, 4, 173, 1);
INSERT INTO rol_tipos_doc VALUES (4673, 4, 169, 1);
INSERT INTO rol_tipos_doc VALUES (4674, 4, 174, 1);
INSERT INTO rol_tipos_doc VALUES (4675, 4, 175, 1);
INSERT INTO rol_tipos_doc VALUES (4676, 4, 176, 1);
INSERT INTO rol_tipos_doc VALUES (4677, 4, 177, 1);
INSERT INTO rol_tipos_doc VALUES (4678, 4, 178, 1);
INSERT INTO rol_tipos_doc VALUES (4679, 4, 179, 1);
INSERT INTO rol_tipos_doc VALUES (4680, 4, 180, 1);
INSERT INTO rol_tipos_doc VALUES (4681, 4, 181, 1);
INSERT INTO rol_tipos_doc VALUES (4682, 4, 182, 1);
INSERT INTO rol_tipos_doc VALUES (4683, 4, 183, 1);
INSERT INTO rol_tipos_doc VALUES (4684, 4, 184, 1);
INSERT INTO rol_tipos_doc VALUES (4685, 4, 185, 1);
INSERT INTO rol_tipos_doc VALUES (4686, 4, 186, 1);
INSERT INTO rol_tipos_doc VALUES (4687, 4, 187, 1);
INSERT INTO rol_tipos_doc VALUES (4688, 4, 188, 1);
INSERT INTO rol_tipos_doc VALUES (4689, 4, 189, 1);
INSERT INTO rol_tipos_doc VALUES (4690, 4, 190, 1);
INSERT INTO rol_tipos_doc VALUES (4691, 4, 191, 1);
INSERT INTO rol_tipos_doc VALUES (4692, 4, 192, 1);
INSERT INTO rol_tipos_doc VALUES (4693, 4, 193, 1);
INSERT INTO rol_tipos_doc VALUES (4694, 4, 194, 1);
INSERT INTO rol_tipos_doc VALUES (4695, 4, 195, 1);
INSERT INTO rol_tipos_doc VALUES (4696, 4, 196, 1);
INSERT INTO rol_tipos_doc VALUES (4697, 4, 197, 1);
INSERT INTO rol_tipos_doc VALUES (4698, 4, 198, 1);
INSERT INTO rol_tipos_doc VALUES (4699, 4, 199, 1);
INSERT INTO rol_tipos_doc VALUES (4700, 4, 200, 1);
INSERT INTO rol_tipos_doc VALUES (4701, 4, 201, 1);
INSERT INTO rol_tipos_doc VALUES (4702, 4, 202, 1);
INSERT INTO rol_tipos_doc VALUES (4703, 4, 203, 1);
INSERT INTO rol_tipos_doc VALUES (4704, 4, 204, 1);
INSERT INTO rol_tipos_doc VALUES (4705, 4, 205, 1);
INSERT INTO rol_tipos_doc VALUES (4706, 4, 206, 1);
INSERT INTO rol_tipos_doc VALUES (4707, 4, 207, 1);
INSERT INTO rol_tipos_doc VALUES (4708, 4, 208, 1);
INSERT INTO rol_tipos_doc VALUES (4709, 4, 209, 1);
INSERT INTO rol_tipos_doc VALUES (4710, 4, 210, 1);
INSERT INTO rol_tipos_doc VALUES (4711, 4, 211, 1);
INSERT INTO rol_tipos_doc VALUES (4712, 4, 212, 1);
INSERT INTO rol_tipos_doc VALUES (4713, 4, 213, 1);
INSERT INTO rol_tipos_doc VALUES (4714, 4, 214, 1);
INSERT INTO rol_tipos_doc VALUES (4715, 4, 215, 1);
INSERT INTO rol_tipos_doc VALUES (4716, 4, 217, 1);
INSERT INTO rol_tipos_doc VALUES (4717, 4, 216, 1);
INSERT INTO rol_tipos_doc VALUES (4718, 4, 218, 1);
INSERT INTO rol_tipos_doc VALUES (4719, 4, 219, 1);
INSERT INTO rol_tipos_doc VALUES (4720, 4, 220, 1);
INSERT INTO rol_tipos_doc VALUES (4721, 4, 221, 1);
INSERT INTO rol_tipos_doc VALUES (4722, 4, 222, 1);
INSERT INTO rol_tipos_doc VALUES (4723, 4, 223, 1);
INSERT INTO rol_tipos_doc VALUES (4724, 4, 224, 1);
INSERT INTO rol_tipos_doc VALUES (4725, 4, 225, 1);
INSERT INTO rol_tipos_doc VALUES (4726, 4, 226, 1);
INSERT INTO rol_tipos_doc VALUES (4727, 4, 227, 1);
INSERT INTO rol_tipos_doc VALUES (4728, 4, 228, 1);
INSERT INTO rol_tipos_doc VALUES (4729, 4, 229, 1);
INSERT INTO rol_tipos_doc VALUES (4730, 4, 230, 1);
INSERT INTO rol_tipos_doc VALUES (4731, 4, 231, 1);
INSERT INTO rol_tipos_doc VALUES (4732, 4, 232, 1);
INSERT INTO rol_tipos_doc VALUES (4733, 4, 233, 1);
INSERT INTO rol_tipos_doc VALUES (4734, 4, 234, 1);
INSERT INTO rol_tipos_doc VALUES (4735, 4, 235, 1);
INSERT INTO rol_tipos_doc VALUES (4736, 4, 236, 1);
INSERT INTO rol_tipos_doc VALUES (4737, 4, 237, 1);
INSERT INTO rol_tipos_doc VALUES (4738, 4, 238, 1);
INSERT INTO rol_tipos_doc VALUES (4739, 4, 239, 1);
INSERT INTO rol_tipos_doc VALUES (4740, 4, 240, 1);
INSERT INTO rol_tipos_doc VALUES (4741, 4, 241, 1);
INSERT INTO rol_tipos_doc VALUES (4742, 4, 242, 1);
INSERT INTO rol_tipos_doc VALUES (4743, 4, 243, 1);
INSERT INTO rol_tipos_doc VALUES (4744, 4, 244, 1);
INSERT INTO rol_tipos_doc VALUES (4745, 4, 245, 1);
INSERT INTO rol_tipos_doc VALUES (4746, 4, 246, 1);
INSERT INTO rol_tipos_doc VALUES (4747, 4, 247, 1);
INSERT INTO rol_tipos_doc VALUES (4748, 4, 248, 1);
INSERT INTO rol_tipos_doc VALUES (4749, 4, 249, 1);
INSERT INTO rol_tipos_doc VALUES (4750, 4, 251, 1);
INSERT INTO rol_tipos_doc VALUES (4751, 4, 250, 1);
INSERT INTO rol_tipos_doc VALUES (4752, 4, 499, 1);
INSERT INTO rol_tipos_doc VALUES (4753, 4, 252, 1);
INSERT INTO rol_tipos_doc VALUES (4754, 4, 253, 1);
INSERT INTO rol_tipos_doc VALUES (4755, 4, 255, 1);
INSERT INTO rol_tipos_doc VALUES (4756, 4, 256, 1);
INSERT INTO rol_tipos_doc VALUES (4757, 4, 254, 1);
INSERT INTO rol_tipos_doc VALUES (4758, 4, 257, 1);
INSERT INTO rol_tipos_doc VALUES (4759, 4, 258, 1);
INSERT INTO rol_tipos_doc VALUES (4760, 4, 259, 1);
INSERT INTO rol_tipos_doc VALUES (4761, 4, 260, 1);
INSERT INTO rol_tipos_doc VALUES (4762, 4, 261, 1);
INSERT INTO rol_tipos_doc VALUES (4763, 4, 262, 1);
INSERT INTO rol_tipos_doc VALUES (4764, 4, 263, 1);
INSERT INTO rol_tipos_doc VALUES (4765, 4, 264, 1);
INSERT INTO rol_tipos_doc VALUES (4766, 4, 265, 1);
INSERT INTO rol_tipos_doc VALUES (4767, 4, 266, 1);
INSERT INTO rol_tipos_doc VALUES (4768, 4, 267, 1);
INSERT INTO rol_tipos_doc VALUES (4769, 4, 283, 1);
INSERT INTO rol_tipos_doc VALUES (4770, 4, 268, 1);
INSERT INTO rol_tipos_doc VALUES (4771, 4, 269, 1);
INSERT INTO rol_tipos_doc VALUES (4772, 4, 270, 1);
INSERT INTO rol_tipos_doc VALUES (4773, 4, 271, 1);
INSERT INTO rol_tipos_doc VALUES (4774, 4, 272, 1);
INSERT INTO rol_tipos_doc VALUES (4775, 4, 273, 1);
INSERT INTO rol_tipos_doc VALUES (4776, 4, 275, 1);
INSERT INTO rol_tipos_doc VALUES (4777, 4, 276, 1);
INSERT INTO rol_tipos_doc VALUES (4778, 4, 274, 1);
INSERT INTO rol_tipos_doc VALUES (4779, 4, 277, 1);
INSERT INTO rol_tipos_doc VALUES (4780, 4, 278, 1);
INSERT INTO rol_tipos_doc VALUES (4781, 4, 279, 1);
INSERT INTO rol_tipos_doc VALUES (4782, 4, 280, 1);
INSERT INTO rol_tipos_doc VALUES (4783, 4, 281, 1);
INSERT INTO rol_tipos_doc VALUES (4784, 4, 282, 1);
INSERT INTO rol_tipos_doc VALUES (4785, 4, 286, 1);
INSERT INTO rol_tipos_doc VALUES (4786, 4, 284, 1);
INSERT INTO rol_tipos_doc VALUES (4787, 4, 285, 1);
INSERT INTO rol_tipos_doc VALUES (4788, 4, 287, 1);
INSERT INTO rol_tipos_doc VALUES (4789, 4, 288, 1);
INSERT INTO rol_tipos_doc VALUES (4790, 4, 289, 1);
INSERT INTO rol_tipos_doc VALUES (4791, 4, 290, 1);
INSERT INTO rol_tipos_doc VALUES (4792, 4, 291, 1);
INSERT INTO rol_tipos_doc VALUES (4793, 4, 292, 1);
INSERT INTO rol_tipos_doc VALUES (4794, 4, 294, 1);
INSERT INTO rol_tipos_doc VALUES (4795, 4, 295, 1);
INSERT INTO rol_tipos_doc VALUES (4796, 4, 296, 1);
INSERT INTO rol_tipos_doc VALUES (4797, 4, 293, 1);
INSERT INTO rol_tipos_doc VALUES (4798, 4, 297, 1);
INSERT INTO rol_tipos_doc VALUES (4799, 4, 298, 1);
INSERT INTO rol_tipos_doc VALUES (4800, 4, 299, 1);
INSERT INTO rol_tipos_doc VALUES (4801, 4, 300, 1);
INSERT INTO rol_tipos_doc VALUES (4802, 4, 301, 1);
INSERT INTO rol_tipos_doc VALUES (4803, 4, 302, 1);
INSERT INTO rol_tipos_doc VALUES (4804, 4, 303, 1);
INSERT INTO rol_tipos_doc VALUES (4805, 4, 304, 1);
INSERT INTO rol_tipos_doc VALUES (4806, 4, 305, 1);
INSERT INTO rol_tipos_doc VALUES (4807, 4, 306, 1);
INSERT INTO rol_tipos_doc VALUES (4808, 4, 307, 1);
INSERT INTO rol_tipos_doc VALUES (4809, 4, 308, 1);
INSERT INTO rol_tipos_doc VALUES (4810, 4, 309, 1);
INSERT INTO rol_tipos_doc VALUES (4811, 4, 310, 1);
INSERT INTO rol_tipos_doc VALUES (4812, 4, 311, 1);
INSERT INTO rol_tipos_doc VALUES (4813, 4, 312, 1);
INSERT INTO rol_tipos_doc VALUES (4814, 4, 313, 1);
INSERT INTO rol_tipos_doc VALUES (4815, 4, 314, 1);
INSERT INTO rol_tipos_doc VALUES (4816, 4, 315, 1);
INSERT INTO rol_tipos_doc VALUES (4817, 4, 316, 1);
INSERT INTO rol_tipos_doc VALUES (4818, 4, 317, 1);
INSERT INTO rol_tipos_doc VALUES (4819, 4, 318, 1);
INSERT INTO rol_tipos_doc VALUES (4820, 4, 319, 1);
INSERT INTO rol_tipos_doc VALUES (4821, 4, 320, 1);
INSERT INTO rol_tipos_doc VALUES (4822, 4, 321, 1);
INSERT INTO rol_tipos_doc VALUES (4823, 4, 322, 1);
INSERT INTO rol_tipos_doc VALUES (4824, 4, 323, 1);
INSERT INTO rol_tipos_doc VALUES (4825, 4, 324, 1);
INSERT INTO rol_tipos_doc VALUES (4826, 4, 325, 1);
INSERT INTO rol_tipos_doc VALUES (4827, 4, 326, 1);
INSERT INTO rol_tipos_doc VALUES (4828, 4, 327, 1);
INSERT INTO rol_tipos_doc VALUES (4829, 4, 328, 1);
INSERT INTO rol_tipos_doc VALUES (4830, 4, 329, 1);
INSERT INTO rol_tipos_doc VALUES (4831, 4, 330, 1);
INSERT INTO rol_tipos_doc VALUES (4832, 4, 331, 1);
INSERT INTO rol_tipos_doc VALUES (4833, 4, 332, 1);
INSERT INTO rol_tipos_doc VALUES (4834, 4, 333, 1);
INSERT INTO rol_tipos_doc VALUES (4835, 4, 334, 1);
INSERT INTO rol_tipos_doc VALUES (4836, 4, 335, 1);
INSERT INTO rol_tipos_doc VALUES (4837, 4, 336, 1);
INSERT INTO rol_tipos_doc VALUES (4838, 4, 337, 1);
INSERT INTO rol_tipos_doc VALUES (4839, 4, 500, 1);
INSERT INTO rol_tipos_doc VALUES (4840, 4, 338, 1);
INSERT INTO rol_tipos_doc VALUES (4841, 4, 339, 1);
INSERT INTO rol_tipos_doc VALUES (4842, 4, 340, 1);
INSERT INTO rol_tipos_doc VALUES (4843, 4, 341, 1);
INSERT INTO rol_tipos_doc VALUES (4844, 4, 342, 1);
INSERT INTO rol_tipos_doc VALUES (4845, 4, 343, 1);
INSERT INTO rol_tipos_doc VALUES (4846, 4, 345, 1);
INSERT INTO rol_tipos_doc VALUES (4847, 4, 346, 1);
INSERT INTO rol_tipos_doc VALUES (4848, 4, 344, 1);
INSERT INTO rol_tipos_doc VALUES (4849, 4, 348, 1);
INSERT INTO rol_tipos_doc VALUES (4850, 4, 350, 1);
INSERT INTO rol_tipos_doc VALUES (4851, 4, 351, 1);
INSERT INTO rol_tipos_doc VALUES (4852, 4, 352, 1);
INSERT INTO rol_tipos_doc VALUES (4853, 4, 353, 1);
INSERT INTO rol_tipos_doc VALUES (4854, 4, 354, 1);
INSERT INTO rol_tipos_doc VALUES (4855, 4, 355, 1);
INSERT INTO rol_tipos_doc VALUES (4856, 4, 349, 1);
INSERT INTO rol_tipos_doc VALUES (4857, 4, 356, 1);
INSERT INTO rol_tipos_doc VALUES (4858, 4, 357, 1);
INSERT INTO rol_tipos_doc VALUES (4859, 4, 358, 1);
INSERT INTO rol_tipos_doc VALUES (4860, 4, 359, 1);
INSERT INTO rol_tipos_doc VALUES (4861, 4, 360, 1);
INSERT INTO rol_tipos_doc VALUES (4862, 4, 361, 1);
INSERT INTO rol_tipos_doc VALUES (4863, 4, 362, 1);
INSERT INTO rol_tipos_doc VALUES (4864, 4, 363, 1);
INSERT INTO rol_tipos_doc VALUES (4865, 4, 372, 1);
INSERT INTO rol_tipos_doc VALUES (4866, 4, 373, 1);
INSERT INTO rol_tipos_doc VALUES (4867, 4, 364, 1);
INSERT INTO rol_tipos_doc VALUES (4868, 4, 365, 1);
INSERT INTO rol_tipos_doc VALUES (4869, 4, 366, 1);
INSERT INTO rol_tipos_doc VALUES (4870, 4, 367, 1);
INSERT INTO rol_tipos_doc VALUES (4871, 4, 368, 1);
INSERT INTO rol_tipos_doc VALUES (4872, 4, 369, 1);
INSERT INTO rol_tipos_doc VALUES (4873, 4, 370, 1);
INSERT INTO rol_tipos_doc VALUES (4874, 4, 375, 1);
INSERT INTO rol_tipos_doc VALUES (4875, 4, 376, 1);
INSERT INTO rol_tipos_doc VALUES (4876, 4, 377, 1);
INSERT INTO rol_tipos_doc VALUES (4877, 4, 378, 1);
INSERT INTO rol_tipos_doc VALUES (4878, 4, 379, 1);
INSERT INTO rol_tipos_doc VALUES (4879, 4, 374, 1);
INSERT INTO rol_tipos_doc VALUES (4880, 4, 371, 1);
INSERT INTO rol_tipos_doc VALUES (4881, 4, 380, 1);
INSERT INTO rol_tipos_doc VALUES (4882, 4, 381, 1);
INSERT INTO rol_tipos_doc VALUES (4883, 4, 382, 1);
INSERT INTO rol_tipos_doc VALUES (4884, 4, 383, 1);
INSERT INTO rol_tipos_doc VALUES (4885, 4, 384, 1);
INSERT INTO rol_tipos_doc VALUES (4886, 4, 385, 1);
INSERT INTO rol_tipos_doc VALUES (4887, 4, 386, 1);
INSERT INTO rol_tipos_doc VALUES (4888, 4, 387, 1);
INSERT INTO rol_tipos_doc VALUES (4889, 4, 388, 1);
INSERT INTO rol_tipos_doc VALUES (4890, 4, 389, 1);
INSERT INTO rol_tipos_doc VALUES (4891, 4, 390, 1);
INSERT INTO rol_tipos_doc VALUES (4892, 4, 391, 1);
INSERT INTO rol_tipos_doc VALUES (4893, 4, 392, 1);
INSERT INTO rol_tipos_doc VALUES (4894, 4, 393, 1);
INSERT INTO rol_tipos_doc VALUES (4895, 4, 394, 1);
INSERT INTO rol_tipos_doc VALUES (4896, 4, 395, 1);
INSERT INTO rol_tipos_doc VALUES (4897, 4, 396, 1);
INSERT INTO rol_tipos_doc VALUES (4898, 4, 397, 1);
INSERT INTO rol_tipos_doc VALUES (4899, 4, 398, 1);
INSERT INTO rol_tipos_doc VALUES (4900, 4, 399, 1);
INSERT INTO rol_tipos_doc VALUES (4901, 4, 400, 1);
INSERT INTO rol_tipos_doc VALUES (4902, 4, 401, 1);
INSERT INTO rol_tipos_doc VALUES (4903, 4, 402, 1);
INSERT INTO rol_tipos_doc VALUES (4904, 4, 403, 1);
INSERT INTO rol_tipos_doc VALUES (4905, 4, 404, 1);
INSERT INTO rol_tipos_doc VALUES (4906, 4, 405, 1);
INSERT INTO rol_tipos_doc VALUES (4907, 4, 406, 1);
INSERT INTO rol_tipos_doc VALUES (4908, 4, 408, 1);
INSERT INTO rol_tipos_doc VALUES (4909, 4, 409, 1);
INSERT INTO rol_tipos_doc VALUES (4910, 4, 410, 1);
INSERT INTO rol_tipos_doc VALUES (4911, 4, 411, 1);
INSERT INTO rol_tipos_doc VALUES (4912, 4, 412, 1);
INSERT INTO rol_tipos_doc VALUES (4913, 4, 407, 1);
INSERT INTO rol_tipos_doc VALUES (4914, 4, 413, 1);
INSERT INTO rol_tipos_doc VALUES (4915, 4, 414, 1);
INSERT INTO rol_tipos_doc VALUES (4916, 4, 415, 1);
INSERT INTO rol_tipos_doc VALUES (4917, 4, 416, 1);
INSERT INTO rol_tipos_doc VALUES (4918, 4, 417, 1);
INSERT INTO rol_tipos_doc VALUES (4919, 4, 418, 1);
INSERT INTO rol_tipos_doc VALUES (4920, 4, 419, 1);
INSERT INTO rol_tipos_doc VALUES (4921, 4, 420, 1);
INSERT INTO rol_tipos_doc VALUES (4922, 4, 421, 1);
INSERT INTO rol_tipos_doc VALUES (4923, 4, 422, 1);
INSERT INTO rol_tipos_doc VALUES (4924, 4, 423, 1);
INSERT INTO rol_tipos_doc VALUES (4925, 4, 424, 1);
INSERT INTO rol_tipos_doc VALUES (4926, 4, 425, 1);
INSERT INTO rol_tipos_doc VALUES (4927, 4, 426, 1);
INSERT INTO rol_tipos_doc VALUES (4928, 4, 427, 1);
INSERT INTO rol_tipos_doc VALUES (4929, 4, 428, 1);
INSERT INTO rol_tipos_doc VALUES (4930, 4, 429, 1);
INSERT INTO rol_tipos_doc VALUES (4931, 4, 430, 1);
INSERT INTO rol_tipos_doc VALUES (4932, 4, 431, 1);
INSERT INTO rol_tipos_doc VALUES (4933, 4, 432, 1);
INSERT INTO rol_tipos_doc VALUES (4934, 4, 433, 1);
INSERT INTO rol_tipos_doc VALUES (4935, 4, 434, 1);
INSERT INTO rol_tipos_doc VALUES (4936, 4, 435, 1);
INSERT INTO rol_tipos_doc VALUES (4937, 4, 436, 1);
INSERT INTO rol_tipos_doc VALUES (4938, 4, 437, 1);
INSERT INTO rol_tipos_doc VALUES (4939, 4, 440, 1);
INSERT INTO rol_tipos_doc VALUES (4940, 4, 438, 1);
INSERT INTO rol_tipos_doc VALUES (4941, 4, 439, 1);
INSERT INTO rol_tipos_doc VALUES (4942, 4, 441, 1);
INSERT INTO rol_tipos_doc VALUES (4943, 4, 442, 1);
INSERT INTO rol_tipos_doc VALUES (4944, 4, 443, 1);
INSERT INTO rol_tipos_doc VALUES (4945, 4, 444, 1);
INSERT INTO rol_tipos_doc VALUES (4946, 4, 445, 1);
INSERT INTO rol_tipos_doc VALUES (4947, 4, 446, 1);
INSERT INTO rol_tipos_doc VALUES (4948, 4, 447, 1);
INSERT INTO rol_tipos_doc VALUES (4949, 4, 448, 1);
INSERT INTO rol_tipos_doc VALUES (4950, 4, 449, 1);
INSERT INTO rol_tipos_doc VALUES (4951, 4, 451, 1);
INSERT INTO rol_tipos_doc VALUES (4952, 4, 450, 1);
INSERT INTO rol_tipos_doc VALUES (4953, 4, 453, 1);
INSERT INTO rol_tipos_doc VALUES (4954, 4, 454, 1);
INSERT INTO rol_tipos_doc VALUES (4955, 4, 452, 1);
INSERT INTO rol_tipos_doc VALUES (4956, 4, 501, 1);
INSERT INTO rol_tipos_doc VALUES (4957, 4, 455, 1);
INSERT INTO rol_tipos_doc VALUES (4958, 4, 456, 1);
INSERT INTO rol_tipos_doc VALUES (4959, 4, 457, 1);
INSERT INTO rol_tipos_doc VALUES (4960, 4, 458, 1);
INSERT INTO rol_tipos_doc VALUES (4961, 4, 459, 1);
INSERT INTO rol_tipos_doc VALUES (4962, 4, 460, 1);
INSERT INTO rol_tipos_doc VALUES (4963, 4, 461, 1);
INSERT INTO rol_tipos_doc VALUES (4964, 4, 462, 1);
INSERT INTO rol_tipos_doc VALUES (4965, 4, 463, 1);
INSERT INTO rol_tipos_doc VALUES (4966, 4, 465, 1);
INSERT INTO rol_tipos_doc VALUES (4967, 4, 466, 1);
INSERT INTO rol_tipos_doc VALUES (4968, 4, 467, 1);
INSERT INTO rol_tipos_doc VALUES (4969, 4, 468, 1);
INSERT INTO rol_tipos_doc VALUES (4970, 4, 469, 1);
INSERT INTO rol_tipos_doc VALUES (4971, 4, 470, 1);
INSERT INTO rol_tipos_doc VALUES (4972, 4, 471, 1);
INSERT INTO rol_tipos_doc VALUES (4973, 4, 472, 1);
INSERT INTO rol_tipos_doc VALUES (4974, 4, 473, 1);
INSERT INTO rol_tipos_doc VALUES (4975, 4, 474, 1);
INSERT INTO rol_tipos_doc VALUES (4976, 4, 475, 1);
INSERT INTO rol_tipos_doc VALUES (4977, 4, 476, 1);
INSERT INTO rol_tipos_doc VALUES (4978, 4, 482, 1);
INSERT INTO rol_tipos_doc VALUES (4979, 4, 477, 1);
INSERT INTO rol_tipos_doc VALUES (4980, 4, 478, 1);
INSERT INTO rol_tipos_doc VALUES (4981, 4, 479, 1);
INSERT INTO rol_tipos_doc VALUES (4982, 4, 480, 1);
INSERT INTO rol_tipos_doc VALUES (4983, 4, 481, 1);
INSERT INTO rol_tipos_doc VALUES (4984, 4, 483, 1);
INSERT INTO rol_tipos_doc VALUES (4985, 4, 464, 1);
INSERT INTO rol_tipos_doc VALUES (4986, 4, 484, 1);
INSERT INTO rol_tipos_doc VALUES (4987, 4, 485, 1);
INSERT INTO rol_tipos_doc VALUES (4988, 4, 486, 1);
INSERT INTO rol_tipos_doc VALUES (4989, 4, 487, 1);
INSERT INTO rol_tipos_doc VALUES (4990, 4, 488, 1);
INSERT INTO rol_tipos_doc VALUES (4991, 4, 489, 1);
INSERT INTO rol_tipos_doc VALUES (4992, 4, 490, 1);
INSERT INTO rol_tipos_doc VALUES (4993, 4, 491, 1);
INSERT INTO rol_tipos_doc VALUES (4994, 4, 492, 1);
INSERT INTO rol_tipos_doc VALUES (4995, 4, 493, 1);
INSERT INTO rol_tipos_doc VALUES (4996, 4, 494, 1);
INSERT INTO rol_tipos_doc VALUES (4997, 4, 495, 1);
INSERT INTO rol_tipos_doc VALUES (4998, 4, 496, 1);
INSERT INTO rol_tipos_doc VALUES (4999, 4, 502, 1);
INSERT INTO rol_tipos_doc VALUES (5000, 4, 497, 1);
INSERT INTO rol_tipos_doc VALUES (5001, 4, 498, 1);


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO roles VALUES (1, 'ADMINISTRADOR TABLAS DE RETENCIÓN DOCUMENTAL', '2018-08-08', 1);
INSERT INTO roles VALUES (3, 'FUNCIONARIO', '2018-08-08', 1);
INSERT INTO roles VALUES (5, 'VENTANILLA DE RADICACIÓN', '2018-08-08', 1);
INSERT INTO roles VALUES (2, 'ADMINISTRADOR DEL SISTEMA', '2018-08-08', 1);
INSERT INTO roles VALUES (4, 'JEFE', '2018-08-08', 1);


--
-- Name: roles_cod_rol_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('roles_cod_rol_seq', 6, false);


--
-- Name: sec_bodega_empresas; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sec_bodega_empresas', 1, false);


--
-- Name: sec_central; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sec_central', 1, false);


--
-- Name: sec_ciu_ciudadano; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sec_ciu_ciudadano', 2, false);


--
-- Name: sec_def_contactos; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sec_def_contactos', 1, false);


--
-- Name: sec_dir_direcciones; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sec_dir_direcciones', 43, true);


--
-- Name: sec_edificio; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sec_edificio', 5, true);


--
-- Name: sec_fondo; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sec_fondo', 1, false);


--
-- Name: sec_inv; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sec_inv', 1, false);


--
-- Name: sec_oem_empresas; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sec_oem_empresas', 1, false);


--
-- Name: sec_oem_oempresas; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sec_oem_oempresas', 1, true);


--
-- Name: sec_planilla; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sec_planilla', 8, true);


--
-- Name: sec_planilla_envio; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sec_planilla_envio', 4, true);


--
-- Name: sec_planilla_tx; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sec_planilla_tx', 1, false);


--
-- Name: sec_prestamo; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sec_prestamo', 1, false);


--
-- Name: sec_rol_tipos_doc; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sec_rol_tipos_doc', 6003, true);


--
-- Name: sec_sgd_hfld_histflujodoc; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sec_sgd_hfld_histflujodoc', 1, false);


--
-- Name: secr_subseries_id_tabla; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('secr_subseries_id_tabla', 279, true);

--
-- Name: secr_tp1_; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('secr_tp1_', 1, false);

--
-- Name: secr_tp1_998; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('secr_tp1_998', 20, true);

--
-- Name: secr_tp1_999; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('secr_tp1_999', 1, false);

--
-- Name: secr_tp2_; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('secr_tp2_', 1, false);

--
-- Name: secr_tp2_998; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('secr_tp2_998', 11, true);

--
-- Name: secr_tp2_999; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('secr_tp2_999', 1, false);

--
-- Name: secr_tp4_; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('secr_tp4_', 1, false);

--
-- Name: secr_tp4_998; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('secr_tp4_998', 1, true);

--
-- Name: secr_tp4_999; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('secr_tp4_999', 1, false);

--
-- Name: seq_parexp_paramexpediente; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('seq_parexp_paramexpediente', 16, true);

--
-- Name: seq_sgd_mrd_codigo; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('seq_sgd_mrd_codigo', 2298, true);

--
-- Data for Name: servicios_pqrs; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO servicios_pqrs VALUES (1, 'General');
INSERT INTO servicios_pqrs VALUES (2, 'Urgencias');
INSERT INTO servicios_pqrs VALUES (3, 'Consulta Externa');
INSERT INTO servicios_pqrs VALUES (4, 'Hospitalización');
INSERT INTO servicios_pqrs VALUES (5, 'Laboratorio Clínico');
INSERT INTO servicios_pqrs VALUES (6, 'Imageniología');
INSERT INTO servicios_pqrs VALUES (7, 'Oficina de Talento Humano');
INSERT INTO servicios_pqrs VALUES (8, 'Oficina de Subsidios');
INSERT INTO servicios_pqrs VALUES (9, 'Coordinación Administrativa');
INSERT INTO servicios_pqrs VALUES (10, 'Coordinación Asistencial');
INSERT INTO servicios_pqrs VALUES (11, 'Albergues');
INSERT INTO servicios_pqrs VALUES (12, 'Gerencia');
INSERT INTO servicios_pqrs VALUES (13, 'Pagaduría');
INSERT INTO servicios_pqrs VALUES (14, 'N/A');

--
-- Name: sgd_anar_secue; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sgd_anar_secue', 1, false);

--
-- Data for Name: sgd_apli_aplintegra; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_apli_aplintegra VALUES (0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Data for Name: sgd_carp_descripcion; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_carp_descripcion VALUES ('900', 1, 'Oficio');

--
-- Name: sgd_ciu_secue; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sgd_ciu_secue', 1, false);

--
-- Data for Name: sgd_clta_clstarif; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_clta_clstarif VALUES (1, 1, 1, 'ENVIÓ MENSAJERO PERSONAL', 1, 1);

--
-- Data for Name: sgd_cob_campobliga; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_cob_campobliga VALUES (1, 'PAIS_NOMBRE', 'PAIS_NOMBRE', 2);
INSERT INTO sgd_cob_campobliga VALUES (2, 'NOMBRE', 'NOMBRE', 1);
INSERT INTO sgd_cob_campobliga VALUES (3, 'MUNI_NOMBRE', 'MUNI_NOMBRE', 1);
INSERT INTO sgd_cob_campobliga VALUES (4, 'DEPTO_NOMBRE', 'DEPTO_NOMBRE', 1);
INSERT INTO sgd_cob_campobliga VALUES (5, 'F_RAD_S', 'F_RAD_S', 1);
INSERT INTO sgd_cob_campobliga VALUES (6, 'TIPO', 'TIPO', 2);
INSERT INTO sgd_cob_campobliga VALUES (7, 'NOMBRE', 'NOMBRE', 2);
INSERT INTO sgd_cob_campobliga VALUES (8, 'MUNI_NOMBRE', 'MUNI_NOMBRE', 2);
INSERT INTO sgd_cob_campobliga VALUES (9, 'DEPTO_NOMBRE', 'DEPTO_NOMBRE', 2);
INSERT INTO sgd_cob_campobliga VALUES (10, 'DIR', 'DIR', 2);

--
-- Data for Name: sgd_def_continentes; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_def_continentes VALUES (1, 'AMERICA');
INSERT INTO sgd_def_continentes VALUES (2, 'EUROPA');
INSERT INTO sgd_def_continentes VALUES (3, 'ASIA');
INSERT INTO sgd_def_continentes VALUES (4, 'AFRICA');
INSERT INTO sgd_def_continentes VALUES (5, 'OCEANIA');
INSERT INTO sgd_def_continentes VALUES (6, 'ANTARTIDA');

--
-- Data for Name: sgd_def_paises; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_def_paises VALUES (170, 1, 'COLOMBIA');
INSERT INTO sgd_def_paises VALUES (862, 1, 'VENEZUELA');
INSERT INTO sgd_def_paises VALUES (214, 1, 'REPUBLICA DOMINICANA');
INSERT INTO sgd_def_paises VALUES (32, 1, 'ARGENTINA');
INSERT INTO sgd_def_paises VALUES (591, 1, 'PANAMA');
INSERT INTO sgd_def_paises VALUES (249, 1, 'ESTADOS UNIDOS');
INSERT INTO sgd_def_paises VALUES (276, 2, 'ALEMANIA');
INSERT INTO sgd_def_paises VALUES (55, 1, 'BRASIL');
INSERT INTO sgd_def_paises VALUES (244, 4, 'ANGOLA');
INSERT INTO sgd_def_paises VALUES (724, 2, 'ESPAÑA');
INSERT INTO sgd_def_paises VALUES (767, 2, 'SUIZA');
INSERT INTO sgd_def_paises VALUES (604, 1, 'PERU');
INSERT INTO sgd_def_paises VALUES (724, 1, 'ESPAÑA');

--
-- Data for Name: sgd_deve_dev_envio; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_deve_dev_envio VALUES (1, 'CASA DESOCUPADA');
INSERT INTO sgd_deve_dev_envio VALUES (2, 'CAMBIO DE DOMICILIO USUARIO');
INSERT INTO sgd_deve_dev_envio VALUES (3, 'CERRADO');
INSERT INTO sgd_deve_dev_envio VALUES (4, 'DEVUELTO DE PORTERIA');
INSERT INTO sgd_deve_dev_envio VALUES (5, 'DIRECCION DEFICIENTE');
INSERT INTO sgd_deve_dev_envio VALUES (6, 'FALLECIDO');
INSERT INTO sgd_deve_dev_envio VALUES (7, 'NO EXISTE NUMERO');
INSERT INTO sgd_deve_dev_envio VALUES (8, 'NO RESIDE');
INSERT INTO sgd_deve_dev_envio VALUES (9, 'NO RECLAMADO');
INSERT INTO sgd_deve_dev_envio VALUES (10, 'NO EXISTE EMPRESA');
INSERT INTO sgd_deve_dev_envio VALUES (11, 'ZONA DE ALTO RIESGO');
INSERT INTO sgd_deve_dev_envio VALUES (12, 'SOBRE DESOCUPADO');
INSERT INTO sgd_deve_dev_envio VALUES (13, 'FUERA PERIMETRO URBANO');
INSERT INTO sgd_deve_dev_envio VALUES (14, 'ENVIADO A ADPOSTAL, CONTROL DE CALIDAD');
INSERT INTO sgd_deve_dev_envio VALUES (15, 'SIN SELLO');
INSERT INTO sgd_deve_dev_envio VALUES (16, 'DOCUMENTO MAL RADICADO');
INSERT INTO sgd_deve_dev_envio VALUES (17, 'SOBREPASO TIEMPO DE ESPERA');
INSERT INTO sgd_deve_dev_envio VALUES (18, 'SE TRASLADO');

--
-- Data for Name: sgd_dir_drecciones; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_dir_drecciones VALUES (8, 1, 1, NULL, '20219980000031', NULL, 1, 11, 'Carrera 37 No. 53-50', '6431582', 'soporte@skinatech.com', 0, NULL, NULL, NULL, 'Edith Liliana Becerra Abril', NULL, 'SKINA TECHNOLOGIES SAS', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (10, 1, 1, NULL, '20219980000021', NULL, 1, 11, 'Carrera 37 No. 53-50', '6431582', 'soporte@skinatech.com', 0, NULL, NULL, NULL, 'Edith Liliana Becerra Abril', NULL, 'SKINA TECHNOLOGIES SAS -- ', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (12, 1, 1, NULL, '20219980000041', NULL, 1, 11, 'Carrera 37 No. 53-50', '6431582', 'soporte@skinatech.com', 0, NULL, NULL, NULL, 'JOSÉ LEODAN GUANGA', NULL, 'SKINA TECHNOLOGIES SAS', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (13, 1, 1, NULL, '20219980000012', NULL, 1, 11, 'Carrera 37 No. 53-50 ', '6431582', 'soporte@skinatech.com ', 0, NULL, NULL, NULL, 'JOSÉ LEODAN GUANGA', NULL, 'SKINA TECHNOLOGIES SAS  --', 2, NULL, '8002509887', 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (14, 1, 1, NULL, '20219980000051', NULL, 1, 11, 'Carrera 37 No. 53-50', '6431582', 'soporte@skinatech.com', 0, NULL, NULL, NULL, 'JOSÉ LEODAN GUANGA', NULL, 'SKINA TECHNOLOGIES SAS', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (15, 1, 1, NULL, '20219980000022', NULL, 1, 11, 'Carrera 37 No. 53-50 ', '6431582', 'soporte@skinatech.com ', 0, NULL, NULL, NULL, '', NULL, 'SKINA TECHNOLOGIES SAS  --', 2, NULL, '8002509887', 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (16, 1, 1, NULL, '20219980000061', NULL, 1, 11, 'Carrera 37 No. 53-50', '6431582', 'soporte@skinatech.com', 0, NULL, NULL, NULL, '', NULL, 'SKINA TECHNOLOGIES SAS', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (17, 1, 1, NULL, '20219980000071', NULL, 1, 11, 'Carrera 37 No. 53-50', '6431582', 'soporte@skinatech.com', 0, NULL, NULL, NULL, 'JOSÉ LEODAN GUANGA', NULL, 'SKINA TECHNOLOGIES SAS', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (18, 1, NULL, NULL, '20219980000032', NULL, 1, 11, 'Zona franca de bogota ', '', 'soporte@skinatech.com ', 0, NULL, NULL, NULL, '', '1', 'USUARIO RECEPCIÓN INVIMA  RECEPCION.INVM', 4, NULL, '1022982736', 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (19, 1, NULL, NULL, '20219980000042', NULL, 1, 11, 'Zona franca de bogota ', '', 'soporte@skinatech.com ', 0, NULL, NULL, NULL, '', '1', 'USUARIO RECEPCIÓN INVIMA  RECEPCION.INVM', 4, NULL, '1022982736', 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (20, 1, 1, NULL, '20219980000081', NULL, 1, 11, 'Carrera 37 No. 53-50', '', '', 0, NULL, NULL, NULL, 'NO REGISTRA', NULL, 'SKINA TECHNOLOGIES SAS  ', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (21, 1, 1, NULL, '20219980000091', NULL, 1, 11, 'Carrera 37 No. 53-50', '', '', 0, NULL, NULL, NULL, 'NO REGISTRA', NULL, 'SKINA TECHNOLOGIES SAS  ', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (22, 1, 1, NULL, '20219980000101', NULL, 1, 11, 'Carrera 37 No. 53-50', '', '', 0, NULL, NULL, NULL, 'NO REGISTRA', NULL, 'SKINA TECHNOLOGIES SAS  ', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (23, 1, 1, NULL, '20219980000052', NULL, 1, 11, 'Carrera 37 No. 53-50 ', '6431582', 'soporte@skinatech.com ', 0, NULL, NULL, NULL, 'PRUEBAS', NULL, 'SKINA TECHNOLOGIES SAS  --', 2, NULL, '8002509887', 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (25, 1, 1, NULL, '20219980000111', NULL, 1, 11, 'Carrera 37 No. 53-50', '6431582', 'soporte@skinatech.com', 0, NULL, NULL, NULL, 'PRUEBAS', NULL, 'SKINA TECHNOLOGIES SAS', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (26, 1, 1, NULL, '20219980000121', NULL, 1, 11, 'Carrera 37 No. 53-50', '6431582', 'soporte@skinatech.com', 0, NULL, NULL, NULL, 'PRUEBAS', NULL, 'SKINA TECHNOLOGIES SAS', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (27, 1, 1, NULL, '20219980000131', NULL, 1, 11, 'Carrera 37 No. 53-50', '6431582', 'soporte@skinatech.com', 0, NULL, NULL, NULL, 'PRUEBAS', NULL, 'SKINA TECHNOLOGIES SAS', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (28, 1, 1, NULL, '20219980000062', NULL, 1, 11, 'Carrera 37 No. 53-50 ', '6431582', 'soporte@skinatech.com ', 0, NULL, NULL, NULL, '', NULL, 'SKINA TECHNOLOGIES SAS  --', 2, NULL, '8002509887', 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (29, 1, 1, NULL, '20219980000141', NULL, 1, 11, 'Carrera 37 No. 53-50', '6431582', 'soporte@skinatech.com', 0, NULL, NULL, NULL, '', NULL, 'SKINA TECHNOLOGIES SAS', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (30, 1, 1, NULL, '20219980000072', NULL, 1, 11, 'Carrera 37 No. 53-50 ', '6431582', 'soporte@skinatech.com ', 0, NULL, NULL, NULL, '', NULL, 'SKINA TECHNOLOGIES SAS  --', 2, NULL, '8002509887', 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (31, 1, 1, NULL, '20219980000082', NULL, 1, 11, 'Carrera 37 No. 53-50 ', '6431582', 'soporte@skinatech.com ', 0, NULL, NULL, NULL, '', NULL, 'SKINA TECHNOLOGIES SAS  --', 2, NULL, '8002509887', 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (32, 1, 1, NULL, '20219980000151', NULL, 1, 11, 'Carrera 37 No. 53-50', '6431582', 'soporte@skinatech.com', 0, NULL, NULL, NULL, '', NULL, 'SKINA TECHNOLOGIES SAS', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (33, 1, 1, NULL, '20219980000092', NULL, 1, 11, 'Carrera 37 No. 53-50 ', '6431582', 'soporte@skinatech.com ', 0, NULL, NULL, NULL, '', NULL, 'SKINA TECHNOLOGIES SAS  --', 2, NULL, '8002509887', 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (35, 1, 1, NULL, '20219980000161', NULL, 1, 11, 'Carrera 37 No. 53-50', '6431582', 'soporte@skinatech.com', 0, NULL, NULL, NULL, '', NULL, 'SKINA TECHNOLOGIES SAS', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (36, 1, 1, NULL, '20219980000171', NULL, 1, 11, 'Carrera 37 No. 53-50', '6431582', 'soporte@skinatech.com', 0, NULL, NULL, NULL, '', NULL, 'SKINA TECHNOLOGIES SAS', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (37, 1, NULL, NULL, '20219980000181', NULL, 1, 11, 'Zona franca de bogota', '', 'soporte@skinatech.com', 0, NULL, NULL, NULL, '', '1022982736', 'USUARIO RECEPCIÓN INVIMA', 4, NULL, '1022982736', 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (38, 1, 1, NULL, '20219980000102', NULL, 1, 11, 'Carrera 37 No. 53-50 ', '6431582', 'soporte@skinatech.com ', 0, NULL, NULL, NULL, 'JOSÉ LEODAN GUANGA', NULL, 'SKINA TECHNOLOGIES SAS  --', 2, NULL, '8002509887', 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (39, 1, 1, NULL, '20219980000191', NULL, 1, 11, 'Carrera 37 No. 53-50', '6431582', 'soporte@skinatech.com', 0, NULL, NULL, NULL, 'JOSÉ LEODAN GUANGA', NULL, 'SKINA TECHNOLOGIES SAS', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (41, 1, 1, NULL, '20219980000201', NULL, 1, 11, 'Carrera 37 No. 53-50', '6431582', 'soporte@skinatech.com', 0, NULL, NULL, NULL, 'JOSÉ LEODAN GUANGA', NULL, 'SKINA TECHNOLOGIES SAS', 2, NULL, NULL, 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (42, 1, 1, NULL, '20219980000014', NULL, 1, 11, 'Carrera 37 No. 53-50 ', '6431582', 'soporte@skinatech.com ', 0, NULL, NULL, NULL, 'PRUEBAS', NULL, 'SKINA TECHNOLOGIES SAS  --', 2, NULL, '8002509887', 170, 1);
INSERT INTO sgd_dir_drecciones VALUES (43, 1, 1, NULL, '20219980000112', NULL, 1, 11, 'Carrera 37 No. 53-50 ', '6431582', 'soporte@skinatech.com ', 0, NULL, NULL, NULL, '', NULL, 'SKINA TECHNOLOGIES SAS  --', 2, NULL, '8002509887', 170, 1);

--
-- Name: sgd_dir_secue; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sgd_dir_secue', 1, false);

--
-- Data for Name: sgd_dt_radicado; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_dt_radicado VALUES ('20219980000011', 2);
INSERT INTO sgd_dt_radicado VALUES ('20219980000031', 0);
INSERT INTO sgd_dt_radicado VALUES ('20219980000021', 1);
INSERT INTO sgd_dt_radicado VALUES ('20219980000041', 0);
INSERT INTO sgd_dt_radicado VALUES ('20219980000012', 3);
INSERT INTO sgd_dt_radicado VALUES ('20219980000051', 0);
INSERT INTO sgd_dt_radicado VALUES ('20219980000022', 3);
INSERT INTO sgd_dt_radicado VALUES ('20219980000061', 0);
INSERT INTO sgd_dt_radicado VALUES ('20219980000071', 0);
INSERT INTO sgd_dt_radicado VALUES ('20219980000032', 30);
INSERT INTO sgd_dt_radicado VALUES ('20219980000042', 30);
INSERT INTO sgd_dt_radicado VALUES ('20219980000081', 30);
INSERT INTO sgd_dt_radicado VALUES ('20219980000091', 30);
INSERT INTO sgd_dt_radicado VALUES ('20219980000101', 30);
INSERT INTO sgd_dt_radicado VALUES ('20219980000052', 2);
INSERT INTO sgd_dt_radicado VALUES ('20219980000111', 0);
INSERT INTO sgd_dt_radicado VALUES ('20219980000121', 0);
INSERT INTO sgd_dt_radicado VALUES ('20219980000131', 0);
INSERT INTO sgd_dt_radicado VALUES ('20219980000062', 3);
INSERT INTO sgd_dt_radicado VALUES ('20219980000141', 0);
INSERT INTO sgd_dt_radicado VALUES ('20219980000072', 30);
INSERT INTO sgd_dt_radicado VALUES ('20219980000082', 10);
INSERT INTO sgd_dt_radicado VALUES ('20219980000151', 0);
INSERT INTO sgd_dt_radicado VALUES ('20219980000092', 10);
INSERT INTO sgd_dt_radicado VALUES ('20219980000161', 0);
INSERT INTO sgd_dt_radicado VALUES ('20219980000171', 0);
INSERT INTO sgd_dt_radicado VALUES ('20219980000181', 0);
INSERT INTO sgd_dt_radicado VALUES ('20219980000102', 2);
INSERT INTO sgd_dt_radicado VALUES ('20219980000191', 0);
INSERT INTO sgd_dt_radicado VALUES ('20219980000201', 3);
INSERT INTO sgd_dt_radicado VALUES ('20219980000014', 2);
INSERT INTO sgd_dt_radicado VALUES ('20219980000112', 30);

--
-- Data for Name: sgd_eanu_estanulacion; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_eanu_estanulacion VALUES ('RADICADO EN SOLICITUD DE ANULACION', 1);
INSERT INTO sgd_eanu_estanulacion VALUES ('RADICADO ANULADO', 2);
INSERT INTO sgd_eanu_estanulacion VALUES ('RADICADO EN SOLICITUD DE REVIVIR', 3);
INSERT INTO sgd_eanu_estanulacion VALUES ('RADICADO IMPOSIBLE DE ANULAR', 9);

--
-- Data for Name: sgd_eit_items; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_eit_items VALUES (1, 0, 'SKINATECH', 'SKN', 11, 1);
INSERT INTO sgd_eit_items VALUES (2, 1, 'ARCHIVO GESTION', 'AG', NULL, NULL);
INSERT INTO sgd_eit_items VALUES (3, 2, 'ESTANTES 1', 'ES1', NULL, NULL);
INSERT INTO sgd_eit_items VALUES (4, 3, 'ENTREPAÑOS 1', 'EN1', NULL, NULL);
INSERT INTO sgd_eit_items VALUES (5, 4, 'CAJAS 1', 'CA1', NULL, NULL);

--
-- Data for Name: sgd_ejes_tematicos; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_ejes_tematicos VALUES (1, 'SOLICITUD DE INFORMACIÓN', 'Corrección de errores en facturas, recibos y pagos', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (34, 'SOLICITUD DE DIVULGACIÓN DE INFORMCION', 'n/a', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (35, 'IMPUESTO SOBRE EL ALUMBRADO PÚBLICO', 'n/a', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (36, 'CONSTRUCCIÓN, MANTENIMIENTO E INSTALACIÓN DE OBRAS DE INFRAESTRUCTURA', 'Novedades,facturación,facilidades de pago', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (37, 'ATENCIÓN AL CIUDADANO (ATENCIÓN DE PQRSD)', 'Obtener el préstamo o alquiler de los parques estadios o escenarios deportivos municipales o distritales.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (38, 'RADICACIÓN DE DOCUMENTOS PARA ADELANTAR ACTIVIDADES DE CONSTRUCCIÓN Y ENAJENACIÓN DE INMUEBLES DESTINADOS A VIVIENDA', 'Tramites de salud o aseguramiento', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (39, 'MODIFICACIÓN DEL PLANO URBANÍSTICO', 'Reclamo ante la entidad por prestación de los servicios prestados', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (40, 'LEGALIZACIÓN URBANÍSTICA DE ASENTAMIENTOS HUMANOS', 'Solicitud de formación en programas y/o servicios ofertados por la dependencia, en cumplimiento de los requisitos para tal fin.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (41, 'INSCRIPCIÓN O CAMBIO DEL REPRESENTANTE LEGAL Y/O REVISOR FISCAL DE LA PROPIEDAD HORIZONTAL', 'Permiso de extensión de horario permiso de pasacalles permiso de rifas permiso de enajenación permiso de espectáculos públicos permiso para inscripción como arrendador inscripción propiedad horizontal', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (42, 'INSCRIPCIÓN DE LA PROPIEDAD HORIZONTAL', 'Recepción de denuncia por vulneración de derechos', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (121, 'MANTENIMIENTO DE ZONAS VERDES', 'Informes, registros fotográficos, actas de satisfacción y liquidación', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (43, 'IMPUESTO DE DELINEACIÓN URBANA', 'Denuncia por perdida de documentos registro de marca de ganado permiso para el transporte de menaje certificado de vecindad certificado de conducta diligencia de embargo y secuestro por orden judicial', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (44, 'DETERMINANTES PARA LA FORMULACIÓN DE PLANES PARCIALES', 'Solicitud de visita domiciliaria y audiencia de conciliación para definir custodia y cuidados personales', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (45, 'DETERMINANTES PARA EL AJUSTE DE UN PLAN PARCIAL', 'Solicitud de audiencia de conciliación para regular visitas', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (46, 'COPIA CERTIFICADA DE PLANOS', 'Acción civil realizada en las denuncias por violencia intrafamiliar y violencia contra la mujer', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (47, 'CONCEPTO DE USO DEL SUELO', 'Solicitud de audiencia de conciliación para regulación, aumento, disminución y exoneración de cuota de alimentos', 10, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (48, 'CERTIFICADO DE PERMISO DE OCUPACIÓN CONCEPTO DE NORMA URBANÍSTICA', 'Visita a los establecimientos abiertos al p¿publico con el fin de verificar el cumplimiento de la ley 232/95 y decreto 1879/08', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (49, 'AUTORIZACIÓN PARA EL MOVIMIENTO DE TIERRAS', 'Solicitudes de restitución y recuperación de espacio público. Controla la publicidad visual exterior', 10, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (50, 'APROBACIÓN DE PISCINAS', 'Solicitud de apoyo en eventos y/o reuniones', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (51, 'APROBACIÓN DE LOS PLANOS DE PROPIEDAD HORIZONTAL', 'Solicitud de facilidades de pago de las deudas con el municipio.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (52, 'AJUSTE DE UN PLAN PARCIAL ADOPTADO', 'Solicitud de inscripción de los establecimientos de comercio de los impuestos de industria y comercio.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (53, 'AJUSTE DE COTAS Y ÁREAS', 'Solicitud de levantamiento de embargos, levantamiento de afectación de valorización.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (54, 'INCORPORACIÓN Y ENTREGA DE LAS ÁREAS DE CESIÓN A FAVOR DEL MUNICIPIO', 'Solicitud de certificaciones de nomenclatura, certificaciones catastrales, certificaciones de impuesto predial, industria y comercio.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (55, 'FORMULACIÓN DEL PROYECTO DE PLAN DE REGULARIZACIÓN', 'Declaración privada de impuesto de industria y comercio.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (56, 'FORMULACIÓN DEL PROYECTO DE PLAN DE IMPLANTACIÓN', 'Solicitud mantenimiento correctivo y preventivo de equipos de tecnología.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (57, 'CONSULTA PRELIMINAR PARA LA FORMULACIÓN DE PLANES DE REGULARIZACIÓN', 'Certificado de descuentos comerciales', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (58, 'CONSULTA PRELIMINAR PARA LA FORMULACIÓN DE PLANES DE IMPLANTACIÓN', 'Legalización de viáticos', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (59, 'ASIGNACIÓN DE NOMENCLATURA', 'Solicitud inventario, baja, mantenimiento, seguimiento.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (60, 'FORMULACIÓN Y RADICACIÓN DEL PROYECTO DEL PLAN PARCIAL.', 'Acoso laboral según lo establecido en la ley 1010 de 2006', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (61, 'RADICACIÓN DE DOCUMENTOS PARA ENAJENAR INSCRIPCIÓN DE PROPIEDAD HORIZONTAL.', 'Autenticación de actos administrativos', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (62, 'INSCRIPCIÓN DE ENTIDADES URBANIZADORAS', 'Solicitud o autorización de recursos físicos, humanos, financieros, didácticos por parte de establecimientos educativos (biblioteca, hemeroteca, laboratorio, medios informáticos, medios audiovisuales). Asignación de recursos a ie, dotaciones', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (63, 'RETIRO DE UN HOGAR DE LA BASE DE DATOS DEL SISTEMA DE IDENTIFICACIÓN Y CLASIFICACIÓN DE POTENCIALES BENEFICIARIOS DE PROGRAMAS SOCIALES - SISBEN', 'Comunicaciones, requerimientos relacionados con el sindicato', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (64, 'RETIRO DE PERSONAS DE LA BASE DE DATOS DEL SISTEMA DE IDENTIFICACIÓN Y CLASIFICACIÓN DE POTENCIALES BENEFICIARIOS DE PROGRAMAS SOCIALES - SISBEN', 'Solicitud creación o cambio de contraseña en los sistemas', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (65, 'INCLUSIÓN DE PERSONAS EN LA BASE DE DATOS DEL SISTEMA DE IDENTIFICACIÓN Y CLASIFICACIÓN DE POTENCIALES BENEFICIARIOS DE PROGRAMAS SOCIALES – SISBEN', 'Expedición del certificado de ingresos y retenciones', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (66, 'ACTUALIZACIÓN DE DATOS DE IDENTIFICACIÓN EN LA BASE DE DATOS DEL SISTEMA DE IDENTIFICACIÓN Y CLASIFICACIÓN DE POTENCIALES BENEFICIARIOS DE PROGRAMAS SOCIALES – SISBEN', 'Oficios en los que se reportan los convenios por libranzas realizados por los funcionarios, solitud e inactividad de descuentos. Certificación de deducciones. Retiro de entidades.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (67, 'CLASIFICACIÓN SOCIO ECONÓMICA', 'Elaboración o solicitud de paz y salvo', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (68, 'SUPERVISOR DELEGADO DE SORTEO Y CONCURSO', 'Emisión de bono pensional', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (69, 'PERMISO PARA INSCRIPCION COMO ARRENDAR', 'Documentos para inclusión en historia laboral', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (70, 'PERMISO PARA DEMOSTRACIONES PUBLICAS DE PÓLVORA ARTÍCULOS PIROTÉCNICOS O JUEGOS ARTIFICIAL.', 'Solicitud de la planta de cargos.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (71, 'PUBLICIDAD VISUAL EXTERIOR', 'Concepto de medicina laboral para traslado o reubicación por salud, por pensión de invalidez', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (72, 'PRORROGA DE SORTEO DE RIFAS', 'Todo lo relacionado con salud ocupacional', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (73, 'CONCEPTO DE EXCEPCIÓN DE JUEGOS DE SUERTE Y AZAR EN LA MODALIDAD DE RIFAS.', 'Concursos publico de meritos y convocatorias internas', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (74, 'RECONOCIMIENTO DE ESCENARIOS HABILITADOS PARA LA REALIZACIÓN DE ESPECTÁCULOS PÚBLICOS DE ARTES ESCÉNICAS.', 'Certificado de no vinculado a la entidad.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (75, 'PERMISO PARA ESPECTÁCULOS PÚBLICOS DE LAS ESCÉNICAS EN ESCENARIOS NO HABILITADOS', 'Certificado de afiliación al fondo.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (76, 'ASESORÍA A VÍCTIMAS', 'Auxilio: auxilio por maternidad, auxilio por enfermedad profesional, auxilio por enfermedad no profesional, auxilio por accidente de trabajo, indemnización por accidente de trabajo, auxilio funerario por fallecimiento del pensionado, seguro por muerte pensión: solicitud de pensión invalidez, pensión por retiro por vejez, pensión por aportes al (i.s.s), re liquidación pensional,sustitución pensional, pensión post mortem 20 años, pensión post mortem 18 años, sobreviviente, indemnización sustitutiva (vejez, invalidez y sobrevivientes). Solicitud de certificado / ajuste pensión. Ordinaria de jubilación nacional, nacionalizado, territoriales cesantías: cesantías definitivas, cesantías definitivas por fallecimiento, cesantías parciales/ intereses de cesantías cancelación de prestaciones sociales y factores salariales que no tienen disponibilidad presupuestal', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (77, 'ASESORÍA SICO-SOCIAL', 'Renuncias, retiros, declaratoria de vacancia, perdida de capacidad laboral, destituciones, traslados, fallecimientos', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (78, 'ASESORÍA EN LEGISLACIÓN FAMILIAR', 'Incapacidades, licencias, comisiones, suspensión, separación temporal del cargo. Reporte de remisiones medicas. Ausentismo', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (79, 'APOYO DE EMERGENCIA A VÍCTIMAS', 'Solicitud de documentos soportes de la hoja de vida (documentos / copias). Radicación de hoja de vida para solicitud de empleos. Recibo de documentos soportes para anexar a la hoja de vida', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (80, 'APOYO A MENORES INFRACTORES', 'Solicitud de certificado de antecedentes disciplinarios', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (81, 'VIGILANCIA A ESTABLECIMIENTOS ABIERTOS AL PÚBLICO', 'Certificación que establece el cargo, tiempo de servicio desde su vinculación a la entidad y el salario devengado.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (82, 'LICENCIA DE OCUPACIÓN DEL ESPACIO PÚBLICO PARA LA LOCALIZACIÓN DE EQUIPAMIENTO', 'Reconocimiento del 8%, 10%, 15%, 20% hasta el 40% para factor salarial', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (83, 'LICENCIA DE INTERVENCIÓN DEL ESPACIO PÚBLICO', 'Certificación que establece el tiempo de servicio desde su vinculación a la entidad.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (84, 'DEVOLUCIÓN DE ELEMENTOS RETENIDOS POR OCUPACIÓN ILEGAL DEL ESPACIO PÚBLICO', 'Certificado para liquidación de prestaciones que incluye factor salarial', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (85, 'VIGILANCIA AL ESPACIO PÚBLICO', 'Certificación que establece el salario devengado por el funcionario', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (86, 'REGISTRO DE LA PUBLICIDAD EXTERIOR VISUAL', 'Duplicados de reporte de cesantías', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (87, 'LICENCIA DE INHUMACIÓN DE CADÁVERES', 'Reclamaciones relacionadas con la nomina.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (88, 'AUTORIZACIÓN PARA LA OPERACIÓN DE JUEGOS DE SUERTE Y AZAR EN LA MODALIDAD DE RIFAS', 'Información relacionada con tecnología.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (89, 'TRASLADO DE CADÁVERES', 'Radicación de facturas y gestión para el pago de servicios públicos de los establecimientos públicos adscritos al municipio.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (90, 'REGISTRO DE MARCAS DE GANADO', 'Necesidades de construcción, reconstrucción, reparación, ampliación, mantenimiento y mejoramiento de bienes e inmuebles, proyectos, informes y estudios', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (91, 'IMPUESTO SOBRE CASINOS Y JUEGOS PERMITIDOS', 'Indicadores de la gestión de infraestructura física y vivienda', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (92, 'IMPUESTO DE ESPECTÁCULOS PÚBLICOS', 'Solicitud de retiro parcial y/o total del ahorro programado, o de proyecto.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (93, 'IMPUESTO AL DEGÜELLO DE GANADO MENOR', 'Población afectada por la violencia, discapacitados, reinsertados, afrodesendientes, madres cabeza de familias y población indígena.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (94, 'EXENCIÓN DEL IMPUESTO DE ESPECTÁCULOS PÚBLICOS', 'Proyecto de mejoramiento de vivienda, construcción en sitio propio, vivienda nueva.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (95, 'DERECHOS DE EXPLOTACIÓN DE JUEGOS DE SUERTE Y AZAR EN LA MODALIDAD DE RIFAS', 'Titulación de inmuebles fiscales ocupados por vivienda de interés social', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (96, 'MATRICULA DE ARRENDADORES CANCELACIÓN DE LA MATRÍCULA DE ARRENDADORES', 'Levantamiento de condiciones resolutorias, hipotecas, y patrimonio de familia y gravamen de valorización', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (97, 'EXPEDICIÓN DE CERTIFICADOS, DENUNCIAS, DECLARACIONES JURAMENTADAS, CONSTANCIAS', 'Quejas presentadas contra servidores públicos. En algunos caso debe enviarse a control interno disciplinario de la alcaldía o la gobernación para lo cual debe especificarse en el sistema', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (98, 'QUERELLAS CIVILES', 'Inconformidad a la entrega de obras recibidas', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (99, 'QUEJAS POLICIVAS', 'Certificación que establece vinculo laboral entre el contratista y el municipio, tiempo de servicio desde su vinculación a la institución y el valor del contrato.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (100, 'PERMISOS PARA: RIFAS, JUEGOS Y ESPECTÁCULOS, PASACALLES, TRANSPORTE O MENAJE, TRANSPORTE DE GANADO, REGISTRO, INHUMACIÓN', 'Certificación que acredita la posesión del bien inmueble.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (101, 'DERECHOS HUMANOS', 'Inauguraciones, entrega de obras de infraestructura, entrega de viviendas.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (102, 'GARANTÍAS PARA LA SEGURIDAD Y CONVIVENCIA (OBSERVATORIO DEL DELITO, MANUAL DE CONVIVENCIA, PLAN DE SEGURIDAD DEMOCRÁTICA)', 'Solicitud de información estadística.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (103, 'PREVENCIÓN (FRENTES DE SEGURIDAD, BOMBEROS, PROGRAMA DE CONVIVENCIA CIUDADANA).', 'Solicitud de determinantes, aprobación planos para propiedad horizontal, reproducción de sellos, aprobación de planes parciales, inquietudes.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (104, 'REACCIÓN (POLICÍAS BACHILLERES, POLICÍA COMUNITARIA, ATENCIÓN A PRESOS, HOGAR DE PASO, CAI, CÁMARAS DE VIGILANCIA, BOMBEROS.', 'Solicitud de cambio de estrato o actualización de este.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (106, 'DESARROLLO HUMANO Y SOCIAL EN MUJER Y FAMILIA, JUVENTUD, VÍCTIMAS, DISCAPACIDAD, ADULTO MAYOR, ETNIAS Y AFRODESCENDIENTES', 'Solicitudes de modificación, actualización, inclusión del sisben', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (107, 'CONFORMACIÓN DE FORMAS ORGANIZATIVAS', 'Informes, registros fotográficos, actas de satisfacción y de liquidación', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (108, 'FAMILIAS EN ACCIÓN; SUBSIDIOS ECONÓMICOS', 'Solicitud del consejo municipal de la gestion del riesgo.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (109, 'ADULTO MAYOR; SUBSIDIOS ECONÓMICOS, CASA HOGAR', 'Solicitud de certificado de usos del suelo y zonas de riesgo', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (110, 'DISCAPACIDAD APARATOS DE LOCOMOCION', 'Solicitud de certificado de estratificación, retiros sisben y no sisben', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (111, 'BIENESTARINA APOYO ALIMENTARIO', 'Solicitud de licencias urbanísticas', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (112, 'SEGURIDAD ALIMENTARIA MANA INFANTIL', 'Solicitudes de comunidades indígenas, censos.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (113, 'ATENCIÓN AL CIUDADANO (ATENCION DE PQRSDF)', 'Solicitud de radicación de proyectos la banco de proyectos', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (242, 'PROPUESTAS Y OBSERVACIONES', 'Información para la contratación.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (114, 'ASESORÍA EN TEMÁTICAS DE SALUD PUBLICA COMO SON SON HABILIDADES PARA LA VIDA, NUTRICIÓN PUBLICA,ATENCIÓN PRIMARIA EN SALUD,APS,ENFERMERÍA PSICOLOGÍA, TRABAJO SOCIAL, HIGIENE ORAL, ACTIVIDAD FÍSICA.', 'Certificaciones y liquidación de pagos de sentencias judiciales', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (115, 'SUMINISTRO DE MEDICAMENTO', 'Ley 285 de 2009, decreto 1716 de 2009. Presentada la petición de conciliación ante la entidad, el comité de conciliación cuenta con quince (15) días a partir de su recibo para tomar la correspondiente decisión, la cual comunicará en el curso de la audiencia de conciliación, aportando copia auténtica de la respectiva acta o certificación en la que consten sus fundamentos. Las partes por mutuo acuerdo podrán prorrogar el término de tres (3) meses consagrado para el trámite conciliatorio extrajudicial, pero en dicho lapso no operará la suspensión del término de caducidad o prescripción.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (116, 'SUMINISTRO DE BIOLOGICO', 'Juzgados laborales, juagados civiles, penales, administrativos y fiscalía.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (117, 'SUBSIDIOS EN SALUD - SEC SALUD', 'Acciones de nulidad y restablecimiento del derecho, acciones de reparación directa, acciones de simple nulidad y ejecutivos', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (118, 'FORMULACIÓN DE PROYECTOS -SAMA', 'Acciones de cumplimiento, acciones de grupo, acciones de tutelas y acciones populares', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (119, 'ENTREGA DE INSUMO', 'Solicitudes o envío de documentos por parte de los ministerios. Solicitudes se encuentra indicadores de gestión', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (120, 'RUIDO VIGILANCIA Y CONTROL', 'Información para la contratación.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (122, 'ASESORIA Y ASISTENCIA', 'Solicitud de copias de documentos', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (123, 'APOYOS A PRODUCCIÓN AGROPECUARIA', 'Solicitud de tala o poda de arboles urbanos', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (124, 'AUTORIZACIÓN PARA TALA Y PODA DE ARBOLES', 'Recibo de donaciones por parte de entidades', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (125, 'CERTIFICADO DE CONDICIÓN FÍSICA ANIMAL EQUINOS SAMA', 'Recibo de cotizaciones de proveedores', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (126, 'PLAN DE ACOMPAÑAMIENTO SOCIAL', 'Todos los requerimientos relacionado con el sistema integrado de gestión de la entidad territorial', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (127, 'REGISTRO TRASLADO DE PERSONA EN ALTO RIESGO', 'Solicitud de realización de asistencia técnica rural.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (128, 'EJECUCIÓN DE PROYECTO DE VIVIENDA', 'Solicitud de informes de resultados de las inspecciones realizadas', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (129, 'SUBSIDIOS Y ENTREGA DE VIVIENDAS', 'Estímulos, recreación, inducción', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (130, 'REGISTRO PARA LEVANTAMIENTO DE CANCELACIÓN DE CONDICIÓN RESOLUTORIA DE TÍTULOS DE PROPIEDAD', 'Solicitud de certificado', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (131, 'SOLICITUD DE ACLARACIONES Y CANCELACIÓN DE PATRIMONIO', 'Informes relacionados con comunidades indígenas', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (132, 'TITULACIONES DE PREDIO', 'Solicitud de vinculación de funcionarios', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (133, 'LEVANTAMIENTO DE GRAVAMENES Y ACLARACIONES DE LOS TITULOS TRASLATICIOS DE DOMINIO.EJES PROYECTOS ESPECIALES', 'Normas nacional, departamental, municipal y distrital: leyes, resoluciones, decretos orden', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (135, 'PROCESOS CONTRAVENCIONALES', 'Información para publicar', 1, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (136, 'HABILITACIÓN DE EMPRESAS DE TRANSPORTE', 'Solicitud de campañas educativas, de información o comunicación, así como las de promoción de la salud y prevención de la enfermedad, acciones colectivas o de ivyc', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (137, 'MATRICULAS DE VEHÍCULO DE IMPULCION HUMANA Y TRACCIÓN ANIMAL', 'Solicitud de vigilancia a eventos de riesgo al consumo, el ambiento o la zoonosis', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (138, 'LICENCIAS DE CONDUCCION', 'Solicitud de vigilancia a eventos de salud pública o acciones de control', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (139, 'TRAMITES DE VEHICULOS', 'Solicitud de asesoría y asistencia en programas y/o servicios ofertados por la dependencia, en cumplimiento de los requisitos para tal fin.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (140, 'EMBARGO Y SECUESTRE DE VEHÍCULOS EJES MOVILIDAD', 'Solicitud de asesoría y asistencia en programas y/o servicios ofertados por la dependencia, en cumplimiento de los requisitos para tal fin.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (142, 'FISCALIZACIÓN DE IMPUESTOS', 'Solicitud de impresos elaborados por la dependencia ya sean estadísticos, de promoción de la salud, prevención de la enfermedad, salud pública, aseguramiento, programas sociales, emergencias y desastres en salud', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (143, 'CERTIFICADOS', 'Información sobre estadísticas de salud o promoción social, comportamientos epidemiológicos, entre otros', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (144, 'MUTACION Y FOTOLECTURA', 'Solicitud de retiro de vehículos.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (145, 'PAZ Y SALVO MUNICIPALES', 'Solicitud de capacitación en seguridad vial.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (146, 'SOBRETASA MUNICIPAL O DISTRITAL A LA GASOLINA MOTOR', 'Solicitud de cierre de vías', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (147, 'REGISTRO DE CONTRIBUYENTES DEL IMPUESTO DE INDUSTRIA Y COMERCIO.', 'Recurso procesal por el que unas actuaciones judiciales se remiten a un órgano superior con la posibilidad de practicar nuevas pruebas para que revoque la resolución dictada por otro inferior', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (148, 'MODIFICACIÓN EN EL REGISTRO DE CONTRIBUYENTES DEL IMPUESTO DE INDUSTRIA Y COMERCIO', 'Recurso judicial que se interpone para que una resolución dictada sea modificada o se dejen sin efecto. Recurso de reposición frente a un acto administrativo, una decisión administrativa o sanción.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (149, 'FACILIDADES DE PAGO PARA LOS DEUDORES DE OBLIGACIONES TRIBUTARIAS', 'Solicitud de conceptos jurídicos relacionados con el sector de transito', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (150, 'FACILIDADES DE PAGO PARA LOS DEUDORES DE OBLIGACIONES NO TRIBUTARIAS', 'Solicitud de información, fallo, terminación de procesos, modificación al fallo, certificado de embargos', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (151, 'EXENCIÓN DEL IMPUESTO PREDIAL UNIFICADO', 'Contratación, proceso en el cual se pacta la prestación del servicio, interventorias de contratos (seguimiento y supervisión de contratos, notificaciones, actas de interventoria, informes de interventoria, planos e inventarios). Solicitud de ampliación de contratos de personal. Información relacionada con contratos. Documentación para tramite de pago (contratistas, proveedores, etc.). Convenios', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (152, 'EXENCIÓN DEL IMPUESTO DE INDUSTRIA Y COMERCIO', 'Radicación de guías, cartillas, revistas, periódicos, boletines', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (153, 'DEVOLUCIÓN Y / O COMPENSACIÓN DE PAGOS EN EXCESO Y PAGOS DE LO NO DEBIDO POR CONCEPTOS NO TRIBUTARIOS', 'Directivas, circulares, memorando', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (154, 'DEVOLUCIÓN Y/O COMPENSACIÓN DE PAGOS EN EXCESO Y PAGOS DE LO NO DEBIDO.', 'Solicitudes o solicitudes de información por parte de otras entidades privadas. Dentro de solicitudes se encuentra indicadores de gestión', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (155, 'CORRECCIÓN DE ERRORES E INCONSISTENCIAS EN DECLARACIONES Y RECIBOS DE PAGO', 'Requerimientos o solicitudes de información por ministerios diferente al de educación, icfes, icetex, sena, dian, conpes. Dentro de solicitudes se encuentra indicadores de gestión.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (156, 'CONTRIBUCION POR VALORIZACION', 'Requerimientos o solicitudes de información por parte de fiscalía, tribunales y entes judiciales, concejos nacionales, corte suprema. Dentro de solicitudes se encuentra indicadores de gestión', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (157, 'CANCELACIÓN DEL REGISTRO DE CONTRIBUYENTES DEL IMPUESTO DE INDUSTRIA Y COMERCIO.', 'Requerimientos o solicitudes de información realizadas por los entes de control. Ej. Procuraduría, contraloría, defensoría del pueblo, personería municipales. Dentro de solicitudes se encuentra indicadores de gestión', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (158, 'IMPUESTO Y CONTRIBUCIONES: PREDIAL,INDUSTRIA Y COMERCIO Y VALORIZACIÓN.(NOVEDADES,FACTURACIÓN,FACILIDADES DE PAGO.', 'Videos, fotos, periódicos, revistas', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (159, 'PRESTAMOS DE PARQUES Y / ESCENARIOS DEPORTIVOS PARA LA RACIONALIZAN DE ESPECTÁCULOS DE LAS ARTES ESCENICAS', 'Solicitud audiencias o citas con el alcalde, los secretarios, gerente o jefes de oficina. Estas se programaran de acuerdo a agenda', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (160, 'TRÁMITE DE SALUD O ASEGURAMIENTO', 'Campañas pedagogas, culturales, publicitarias e informativas', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (161, 'RECLAMO CONTRA LA PRESTACIÓN DE UN SERVICIO', 'Felicitaciones emitidas por los ciudadanos.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (162, 'SOLICITUDES DE FORMACIÓN', 'Todas las invitaciones realizadas. Ej. Eventos, foros, capacitaciones, tarjetas, seminarios, etc.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (163, 'GESTIÓN DE TRAMITES DESPACHO GOBIERNO', 'Permiso de extensión de horario permiso de pasacalles permiso de rifas permiso de enajenación permiso de espectáculos públicos permiso para inscripción como arrendador inscripción propiedad horizontal', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (164, 'QUEJA POLICIVA', 'Recepción de denuncia por vulneración de derechos', 5, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (165, 'GESTIÓN DE TRAMITES INSPECCIÓN DE POLICÍA', 'Denuncia por perdida de documentos registro de marca de ganado permiso para el transporte de menaje certificado de vecindad certificado de conducta diligencia de embargo y secuestro por orden judicial', 5, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (166, 'CUSTODIA Y CUIDADOS PERSONALES', 'Solicitud de visita domiciliaria y audiencia de conciliación para definir custodia y cuidados personales', 5, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (167, 'REGULACIÓN DE VISITAS', 'Solicitud de audiencia de conciliación para regular visitas', 5, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (168, 'VIOLENCIA INTRAFAMILIAR - VIF VIOLENCIA CONTRA LA MUJER', 'Acción civil realizada en las denuncias por violencia intrafamiliar y violencia contra la mujer', 5, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (169, 'PROCESO DE ALIMENTOS', 'Solicitud de audiencia de conciliación para regulación, aumento, disminución y exoneración de cuota de alimentos', 5, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (170, 'VIGILANCIA Y CONTROL ESTABLECIMIENTOS ABIERTOS AL PÚBLICO', 'Visita a los establecimientos abiertos al p¿publico con el fin de verificar el cumplimiento de la ley 232/95 y decreto 1879/08', 5, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (171, 'VIGILANCIA Y CONTROL ESPACIO PÚBLICO', 'Solicitudes de restitución y recuperación de espacio público. Controla la publicidad visual exterior', 30, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (172, 'EVENTOS', 'Solicitud de apoyo en eventos y/o reuniones', 10, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (173, 'ACUERDOS DE PAGO', 'Solicitud de facilidades de pago de las deudas con el municipio.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (174, 'MATRICULA ESTABLECIMIENTOS DE COMERCIO', 'Solicitud de inscripción de los establecimientos de comercio de los impuestos de industria y comercio.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (175, 'LEVANTAMIENTO DE MEDIDAS CAUTELARÍAS', 'Solicitud de levantamiento de embargos, levantamiento de afectación de valorización.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (176, 'CERTIFICACIONES DE IMPUESTOS Y CATASTRALES', 'Solicitud de certificaciones de nomenclatura, certificaciones catastrales, certificaciones de impuesto predial, industria y comercio.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (177, 'DECLARACIÓN DE INDUSTRIA Y COMERCIO', 'Declaración privada de impuesto de industria y comercio.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (178, 'SERVICIO TÉCNICO DE MANTENIMIENTO DE COMPUTADORES', 'Solicitud mantenimiento correctivo y preventivo de equipos de tecnología.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (179, 'CERTIFICADO DE DESCUENTOS COMERCIALES', 'Certificado de descuentos comerciales', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (180, 'LEGALIZACIÓN DE VIÁTICOS', 'Legalización de viáticos', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (181, 'BIENES Y MUEBLES', 'Solicitud inventario, baja, mantenimiento, seguimiento.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (182, 'ACOSO LABORAL', 'Acoso laboral según lo establecido en la ley 1010 de 2006', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (183, 'AUTENTICACIÓN DE ACTOS ADMINISTRATIVOS', 'Autenticación de actos administrativos', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (184, 'NECESIDADES DE RECURSOS', 'Solicitud o autorización de recursos físicos, humanos, financieros, didácticos por parte de establecimientos educativos (biblioteca, hemeroteca, laboratorio, medios informáticos, medios audiovisuales). Asignación de recursos a ie, dotaciones', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (185, 'COMUNICACIONES SINDICATO', 'Comunicaciones, requerimientos relacionados con el sindicato', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (186, 'CONTRASEÑA EN LOS SISTEMAS', 'Solicitud creación o cambio de contraseña en los sistemas', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (187, 'CERTIFICADO DE INGRESOS Y RETENCIONES', 'Expedición del certificado de ingresos y retenciones', 5, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (188, 'TERCEROS POR LIBRANZAS', 'Oficios en los que se reportan los convenios por libranzas realizados por los funcionarios, solitud e inactividad de descuentos. Certificación de deducciones. Retiro de entidades.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (189, 'PAZ Y SALVO', 'Elaboración o solicitud de paz y salvo', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (190, 'EMISIÓN DE BONO PENSIONAL', 'Emisión de bono pensional', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (191, 'DOCUMENTOS PARA INCLUSIÓN EN HISTORIA LABORAL', 'Documentos para inclusión en historia laboral', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (192, 'PLANTA DE CARGOS', 'Solicitud de la planta de cargos.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (193, 'VALORACIONES MEDICAS', 'Concepto de medicina laboral para traslado o reubicación por salud, por pensión de invalidez', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (194, 'SALUD OCUPACIONAL', 'Todo lo relacionado con salud ocupacional', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (195, 'CONCURSOS PUBLICO DE MERITOS Y CONVOCATORIAS INTERNAS', 'Concursos publico de meritos y convocatorias internas', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (196, 'CERTIFICADO DE NO VINCULADO', 'Certificado de no vinculado a la entidad.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (197, 'CERTIFICADO DE PRESTACIONES SOCIALES Y ECONÓMICAS', 'Certificado de afiliación al fondo.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (237, 'CONCILIACIONES EXTRAJUDICIALES', 'Ley 285 de 2009, decreto 1716 de 2009. Presentada la petición de conciliación ante la entidad, el comité de conciliación cuenta con quince (15) días a partir de su recibo para tomar la correspondiente decisión, la cual comunicará en el curso de la audiencia de conciliación, aportando copia auténtica de la respectiva acta o certificación en la que consten sus fundamentos. Las partes por mutuo acuerdo podrán prorrogar el término de tres (3) meses consagrado para el trámite conciliatorio extrajudicial, pero en dicho lapso no operará la suspensión del término de caducidad o prescripción.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (238, 'DEMANDAS ORDINARIAS', 'Juzgados laborales, juagados civiles, penales, administrativos y fiscalía.', 5, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (198, 'PRESTACIONES SOCIALES Y ECONÓMICA', 'Auxilio: auxilio por maternidad, auxilio por enfermedad profesional, auxilio por enfermedad no profesional, auxilio por accidente de trabajo, indemnización por accidente de trabajo, auxilio funerario por fallecimiento del pensionado, seguro por muerte pensión: solicitud de pensión invalidez, pensión por retiro por vejez, pensión por aportes al (i.s.s), re liquidación pensional,sustitución pensional, pensión post mortem 20 años, pensión post mortem 18 años, sobreviviente, indemnización sustitutiva (vejez, invalidez y sobrevivientes). Solicitud de certificado / ajuste pensión. Ordinaria de jubilación nacional, nacionalizado, territoriales cesantías: cesantías definitivas, cesantías definitivas por fallecimiento, cesantías parciales/ intereses de cesantías cancelación de prestaciones sociales y factores salariales que no tienen disponibilidad presupuestal', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (199, 'VACANTES DEFINITIVAS', 'Renuncias, retiros, declaratoria de vacancia, perdida de capacidad laboral, destituciones, traslados, fallecimientos', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (200, 'VACANTES TEMPORALES', 'Incapacidades, licencias, comisiones, suspensión, separación temporal del cargo. Reporte de remisiones medicas. Ausentismo', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (201, 'HOJAS DE VIDA (DOCUMENTACIÓN / COPIAS)', 'Solicitud de documentos soportes de la hoja de vida (documentos / copias). Radicación de hoja de vida para solicitud de empleos. Recibo de documentos soportes para anexar a la hoja de vida', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (202, 'CERTIFICADO DE ANTECEDENTES DISCIPLINARIOS', 'Solicitud de certificado de antecedentes disciplinarios', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (203, 'CERTIFICADO LABORAL', 'Certificación que establece el cargo, tiempo de servicio desde su vinculación a la entidad y el salario devengado.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (252, 'CERTIFICACIÓN DE FUNCIONES', 'Solicitud de certificado', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (204, 'CERTIFICACIÓN DE SALARIOS Y DEVENGADOS', 'Reconocimiento del 8%, 10%, 15%, 20% hasta el 40% para factor salarial', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (205, 'CERTIFICADO TIEMPO DE SERVICIO', 'Certificación que establece el tiempo de servicio desde su vinculación a la entidad.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (206, 'CERTIFICADO DE FACTOR SALARIAL', 'Certificado para liquidación de prestaciones que incluye factor salarial', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (207, 'CERTIFICACIÓN SALARIAL', 'Certificación que establece el salario devengado por el funcionario', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (208, 'REPORTE DE CESANTÍAS', 'Duplicados de reporte de cesantías', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (209, 'NOMINA', 'Reclamaciones relacionadas con la nomina.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (210, 'GESTIÓN USO E IMPLEMENTACIÓN DE LAS MTIC', 'Información relacionada con tecnología.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (211, 'SERVICIOS PÚBLICOS', 'Radicación de facturas y gestión para el pago de servicios públicos de los establecimientos públicos adscritos al municipio.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (212, 'INFRAESTRUCTURA FÍSICA Y VIVIENDA', 'Necesidades de construcción, reconstrucción, reparación, ampliación, mantenimiento y mejoramiento de bienes e inmuebles, proyectos, informes y estudios', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (213, 'GESTIÓN DE INFORMACIÓN', 'Indicadores de la gestión de infraestructura física y vivienda', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (214, 'RETIRO DE PROYECTOS DE VIVIENDA', 'Solicitud de retiro parcial y/o total del ahorro programado, o de proyecto.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (215, 'POBLACIÓN VULNERABLE', 'Población afectada por la violencia, discapacitados, reinsertados, afrodesendientes, madres cabeza de familias y población indígena.', 10, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (216, 'CONVOCATORIAS', 'Proyecto de mejoramiento de vivienda, construcción en sitio propio, vivienda nueva.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (217, 'SOLICITUD DE TITULACIÓN DE INMUEBLES FISCALES', 'Titulación de inmuebles fiscales ocupados por vivienda de interés social', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (218, 'SOLICITUD DE LEVANTAMIENTO DE GRAVAMEN', 'Levantamiento de condiciones resolutorias, hipotecas, y patrimonio de familia y gravamen de valorización', 60, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (219, 'QUEJAS CONTRA SERVIDORES PÚBLICOS', 'Quejas presentadas contra servidores públicos. En algunos caso debe enviarse a control interno disciplinario de la alcaldía o la gobernación para lo cual debe especificarse en el sistema', 30, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (220, 'QUEJAS Y REGLAMOS POR OBRAS DE INFRAESTRUCTURA FÍSICA Y VIVIENDA', 'Inconformidad a la entrega de obras recibidas', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (221, 'CERTIFICADO DE OBRAS', 'Certificación que establece vinculo laboral entre el contratista y el municipio, tiempo de servicio desde su vinculación a la institución y el valor del contrato.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (222, 'CERTIFICACIONES DE POSESIÓN DE PREDIOS', 'Certificación que acredita la posesión del bien inmueble.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (223, 'EVENTOS DE INFRAESTRUCTURA FÍSICA Y VIVIENDA', 'Inauguraciones, entrega de obras de infraestructura, entrega de viviendas.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (224, 'ESTADÍSTICAS', 'Solicitud de información estadística.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (225, 'ACTUACIONES URBANÍSTICAS', 'Solicitud de determinantes, aprobación planos para propiedad horizontal, reproducción de sellos, aprobación de planes parciales, inquietudes.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (226, 'ESTRATIFICACIÓN SOCIO ECONÓMICA', 'Solicitud de cambio de estrato o actualización de este.', 45, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (227, 'SOLICITUD DE ENCUESTA', 'Solicitud de encuesta nueva, cambio de domicilio, cambio de residencia o por inconformidad.', 60, 'Calendario', true);
INSERT INTO sgd_ejes_tematicos VALUES (228, 'ACTUALIZACIONES E INCLUSIONES SISBEN', 'Solicitudes de modificación, actualización, inclusión del sisben', 195, 'Calendario', true);
INSERT INTO sgd_ejes_tematicos VALUES (229, 'SEGUIMIENTO A PROYECTOS DE INVERSIÓN Y TRANSFERENCIA POR ASIGNACIÓN DIRECTA', 'Informes, registros fotográficos, actas de satisfacción y de liquidación', 180, 'Calendario', true);
INSERT INTO sgd_ejes_tematicos VALUES (230, 'CERTIFICADOS DEL CONSEJO MUNICIPAL DE LA GESTION DEL RIESGO.', 'Solicitud del consejo municipal de la gestion del riesgo.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (231, 'CERTIFICADO DE USOS DEL SUELO Y ZONAS DE RIESGO', 'Solicitud de certificado de usos del suelo y zonas de riesgo', 8, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (232, 'CERTIFICADO DE ESTRATIFICACIÓN Y SISBEN', 'Solicitud de certificado de estratificación, retiros sisben y no sisben', 8, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (233, 'SOLICITUD DE LICENCIAS URBANÍSTICAS', 'Solicitud de licencias urbanísticas', 8, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (234, 'COMUNIDADES INDÍGENAS', 'Solicitudes de comunidades indígenas, censos.', 45, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (235, 'PROYECTOS', 'Solicitud de radicación de proyectos la banco de proyectos', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (236, 'TRAMITE DE PAGOS DE SENTENCIAS JUDICIALES', 'Certificaciones y liquidación de pagos de sentencias judiciales', 10, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (239, 'DEMANDAS CONTENCIOSO ADMINISTRATIVO', 'Acciones de nulidad y restablecimiento del derecho, acciones de reparación directa, acciones de simple nulidad y ejecutivos', 5, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (240, 'DEMANDA CONSTITUCIONALES', 'Acciones de cumplimiento, acciones de grupo, acciones de tutelas y acciones populares', 5, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (241, 'COMUNICACIONES MINISTERIOS', 'Solicitudes o envío de documentos por parte de los ministerios. Solicitudes se encuentra indicadores de gestión', 5, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (243, 'SEGUIMIENTO A PROYECTOS DE INVERSIÓN', 'Informes, registros fotográficos, actas de satisfacción y liquidación', 5, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (244, 'FOTOCOPIA DE DOCUMENTOS', 'Solicitud de copias de documentos', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (245, 'TALA O PODA DE ARBOLES URBANOS', 'Solicitud de tala o poda de arboles urbanos', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (246, 'DONACIONES', 'Recibo de donaciones por parte de entidades', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (247, 'COTIZACIONES', 'Recibo de cotizaciones de proveedores', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (248, 'SISTEMAS INTEGRADOS DE GESTIÓN', 'Todos los requerimientos relacionado con el sistema integrado de gestión de la entidad territorial', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (249, 'SOLICITUD DE ASISTENCIA TÉCNICA RURAL Y EXTENSIÓN', 'Solicitud de realización de asistencia técnica rural.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (250, 'INFORMES DE INSPECCIÓN Y VIGILANCIA', 'Solicitud de informes de resultados de las inspecciones realizadas', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (251, 'BIENESTAR', 'Estímulos, recreación, inducción', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (253, 'INFORMES COMUNIDADES INDÍGENAS', 'Informes relacionados con comunidades indígenas', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (254, 'VINCULACIONES', 'Solicitud de vinculación de funcionarios', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (255, 'NORMATIVIDAD', 'Normas nacional, departamental, municipal y distrital: leyes, resoluciones, decretos orden', 30, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (256, 'COMUNICACIONES ENTE TERRITORIAL', 'Solicitudes o envío de documentos por parte del ente territorial (alcaldía, gobernación, dependencias del ente territorial: secretarías de hacienda, secretarias de salud, etc.). Dentro las solicitudes se encuentra indicadores de gestión', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (257, 'PROPUESTAS O PAUTAS PUBLICITARIAS', 'Información para publicar', 10, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (258, 'SOLICITUD DE CAMPAÑAS DE IEC, PYP O VYC', 'Solicitud de campañas educativas, de información o comunicación, así como las de promoción de la salud y prevención de la enfermedad, acciones colectivas o de ivyc', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (259, 'SOLICITUDES DE VIGILANCIA Y CONTROL A FACTORES DE RIESGO', 'Solicitud de vigilancia a eventos de riesgo al consumo, el ambiento o la zoonosis', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (260, 'VIGILANCIA EPIDEMIOLÓGICA O ACCIONES DE CONTROL', 'Solicitud de vigilancia a eventos de salud pública o acciones de control', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (261, 'ASESORÍA Y ASISTENCIA EN PROGRAMAS OFERTADOS', 'Solicitud de asesoría y asistencia en programas y/o servicios ofertados por la dependencia, en cumplimiento de los requisitos para tal fin.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (262, 'SOLICITUDES DE ASESORÍA Y ASISTENCIA', 'Solicitud de asesoría y asistencia en programas y/o servicios ofertados por la dependencia, en cumplimiento de los requisitos para tal fin.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (263, 'SOLICITUDES DE APOYO SOCIAL', 'Solicitud de apoyo social en programas y/o servicios ofertados por la dependencia, en cumplimiento de los requisitos para tal fin.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (264, 'IMPRESOS E INFORMACIÓN', 'Solicitud de impresos elaborados por la dependencia ya sean estadísticos, de promoción de la salud, prevención de la enfermedad, salud pública, aseguramiento, programas sociales, emergencias y desastres en salud', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (265, 'INFORMACIÓN Y ESTADÍSTICAS EN SALUD', 'Información sobre estadísticas de salud o promoción social, comportamientos epidemiológicos, entre otros', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (266, 'RETIRO DE VEHÍCULOS', 'Solicitud de retiro de vehículos.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (267, 'CAPACITACIONES', 'Solicitud de capacitación en seguridad vial.', 5, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (268, 'CIERRE DE VÍA', 'Solicitud de cierre de vías', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (269, 'RECURSO DE APELACIÓN', 'Recurso procesal por el que unas actuaciones judiciales se remiten a un órgano superior con la posibilidad de practicar nuevas pruebas para que revoque la resolución dictada por otro inferior', 5, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (270, 'RECURSO DE REPOSICIÓN', 'Recurso judicial que se interpone para que una resolución dictada sea modificada o se dejen sin efecto. Recurso de reposición frente a un acto administrativo, una decisión administrativa o sanción.', 60, 'Calendario', true);
INSERT INTO sgd_ejes_tematicos VALUES (271, 'CONCEPTOS JURÍDICOS', 'Solicitud de conceptos jurídicos relacionados con el sector de transito', 60, 'Calendario', true);
INSERT INTO sgd_ejes_tematicos VALUES (272, 'EMBARGOS JUDICIALES', 'Solicitud de información, fallo, terminación de procesos, modificación al fallo, certificado de embargos', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (273, 'CONTRATACIÓN', 'Contratación, proceso en el cual se pacta la prestación del servicio, interventorias de contratos (seguimiento y supervisión de contratos, notificaciones, actas de interventoria, informes de interventoria, planos e inventarios). Solicitud de ampliación de contratos de personal. Información relacionada con contratos. Documentación para tramite de pago (contratistas, proveedores, etc.). Convenios', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (274, 'DOCUMENTOS DE APOYO', 'Radicación de guías, cartillas, revistas, periódicos, boletines', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (275, 'DIRECTRICES ORDEN NACIONAL Y/O DEPARTAMENTAL', 'Directivas, circulares, memorando', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (276, 'COMUNICACIONES ENTIDADES PRIVADAS', 'Solicitudes o solicitudes de información por parte de otras entidades privadas. Dentro de solicitudes se encuentra indicadores de gestión', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (277, 'COMUNICACIONES ENTES NACIONALES (ORGANISMOS ESTATALES)', 'Requerimientos o solicitudes de información por ministerios diferente al de educación, icfes, icetex, sena, dian, conpes. Dentro de solicitudes se encuentra indicadores de gestión.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (278, 'COMUNICACIONES ORGANISMOS JUDICIALES', 'Requerimientos o solicitudes de información por parte de fiscalía, tribunales y entes judiciales, concejos nacionales, corte suprema. Dentro de solicitudes se encuentra indicadores de gestión', 10, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (279, 'COMUNICACIONES ENTES DE CONTROL', 'Requerimientos o solicitudes de información realizadas por los entes de control. Ej. Procuraduría, contraloría, defensoría del pueblo, personería municipales. Dentro de solicitudes se encuentra indicadores de gestión', 10, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (280, 'EVIDENCIAS GRAFICAS O INFOGRAFICAS', 'Videos, fotos, periódicos, revistas', 10, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (281, 'AUDIENCIAS O CITAS PROGRAMADAS', 'Solicitud audiencias o citas con el alcalde, los secretarios, gerente o jefes de oficina. Estas se programaran de acuerdo a agenda', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (282, 'CAMPAÑAS', 'Campañas pedagogas, culturales, publicitarias e informativas', 5, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (283, 'FELICITACIONES', 'Felicitaciones emitidas por los ciudadanos.', 15, 'Laboral', true);
INSERT INTO sgd_ejes_tematicos VALUES (284, 'INVITACIONES', 'Todas las invitaciones realizadas. Ej. Eventos, foros, capacitaciones, tarjetas, seminarios, etc.', 5, 'Laboral', true);

--
-- Name: sgd_ejes_tematicos_dependenci_id_sgd_eje_tematico_dependenc_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sgd_ejes_tematicos_dependenci_id_sgd_eje_tematico_dependenc_seq', 343, true);

--
-- Name: sgd_ejes_tematicos_id_sgd_eje_tematico_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sgd_ejes_tematicos_id_sgd_eje_tematico_seq', 284, true);

--
-- Data for Name: sgd_exp_expediente; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_exp_expediente VALUES ('20219981110000002E', '20219980000021', '2021-02-23', NULL, '998', 1, '1234567890', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO sgd_exp_expediente VALUES ('20219981110000002E', '20219980000041', '2021-02-23', NULL, '998', 1, '1234567890', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2);
INSERT INTO sgd_exp_expediente VALUES ('20219981110000002E', '20219980000022', '2021-02-23', NULL, '998', 1, '1234567890', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3);
INSERT INTO sgd_exp_expediente VALUES ('20219981110000002E', '20219980000061', '2021-02-23', NULL, '998', 1, '1234567890', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4);
INSERT INTO sgd_exp_expediente VALUES ('20219981110000002E', '20219980000012', '2021-02-23', NULL, '998', 1, '1234567890', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5);
INSERT INTO sgd_exp_expediente VALUES ('20219981110000002E', '20219980000071', '2021-02-23', NULL, '998', 1, '1234567890', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6);
INSERT INTO sgd_exp_expediente VALUES ('20219981120000003E', '20219980000052', '2021-03-31', NULL, '998', 1, '1234567890', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7);
INSERT INTO sgd_exp_expediente VALUES ('20219981120000003E', '20219980000121', '2021-03-31', NULL, '998', 1, '1234567890', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8);
INSERT INTO sgd_exp_expediente VALUES ('20219981120000003E', '20219980000131', '2021-03-31', NULL, '998', 1, '1234567890', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9);
INSERT INTO sgd_exp_expediente VALUES ('20219981120000004E', '20219980000082', '2021-04-13', NULL, '998', 1, '1234567890', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11);
INSERT INTO sgd_exp_expediente VALUES ('20219981120000003E', '20219980000201', '2021-04-13', NULL, '998', 1, '1234567890', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14);
INSERT INTO sgd_exp_expediente VALUES ('20219981120000003E', '20219980000092', '2021-04-15', NULL, '998', 1, '1234567890', 1, '', '', '1', '3', '2', '5', '5', '2021-04-15', NULL, NULL, NULL, '0', 1, 1, '2022-04-15', '0', 0, 0, 'ADMON', '1', NULL, '4', NULL, NULL, NULL, NULL, NULL, 10);
INSERT INTO sgd_exp_expediente VALUES ('20219981120000003E', '20219980000102', '2021-04-15', NULL, '998', 1, '1234567890', 1, '', '', '1', '3', '2', '5', '5', '2021-04-15', NULL, NULL, NULL, '0', 1, 1, '2022-04-15', '0', 0, 0, 'ADMON', '1', NULL, '4', NULL, NULL, NULL, NULL, NULL, 12);
INSERT INTO sgd_exp_expediente VALUES ('20219981120000003E', '20219980000191', '2021-04-15', NULL, '998', 1, '1234567890', 1, '', '', '2', '3', '2', '5', '5', '2021-04-15', NULL, NULL, NULL, '0', 1, 1, '2022-04-15', '0', 0, 0, 'ADMON', '1', NULL, '4', NULL, NULL, NULL, NULL, NULL, 13);

--
-- Name: sgd_exp_expediente_id_expediente_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sgd_exp_expediente_id_expediente_seq', 14, true);

--
-- Data for Name: sgd_fenv_frmenvio; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_fenv_frmenvio VALUES (1, 'MENSAJERO PERSONAL', 1, 1);

--
-- Data for Name: sgd_fexp_flujoexpedientes; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_fexp_flujoexpedientes VALUES (0, 0, 0, 0, '', '');

--
-- Data for Name: sgd_firmas_qr; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_firmas_qr VALUES ('20219980000031', 'ADMON', 'Usuario de Soporte', '1234567890', '998', '2021-02-23 14:58:52.691107', 1, 1);
INSERT INTO sgd_firmas_qr VALUES ('20219980000021', 'ADMON', 'Usuario de Soporte', '1234567890', '998', '2021-02-23 14:59:19.258168', 1, 1);
INSERT INTO sgd_firmas_qr VALUES ('20219980000041', 'ADMON', 'Usuario de Soporte', '1234567890', '998', '2021-02-23 16:43:25.594178', 1, 1);
INSERT INTO sgd_firmas_qr VALUES ('20219980000061', 'ADMON', 'Usuario de Soporte', '1234567890', '998', '2021-02-23 17:41:56.152507', 1, 1);
INSERT INTO sgd_firmas_qr VALUES ('20219980000121', 'ADMON', 'Usuario de Soporte', '1234567890', '998', '2021-03-31 10:48:52.169581', 1, 1);
INSERT INTO sgd_firmas_qr VALUES ('20219980000181', 'ADMON', 'Usuario de Soporte', '1234567890', '998', '2021-04-13 17:00:23.686539', 1, 1);

--
-- Data for Name: sgd_hfld_histflujodoc; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-11-17 09:58:21.790507', '00001', '20201510000652', '1082846888', 4, '151', 62, NULL, 'Incluir radicado en Expediente 00001', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-11-27 14:19:03.109189', '20209981100000001E', '20209980000011', '1234567890', 1, '998', 51, NULL, 'TRD COMUNICACIONES/Comunicaciones Oficiales (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-11-27 14:25:50.365649', '20209981100000001E', '20209980000021', '1234567890', 1, '998', 53, NULL, 'Se ingresa al expediente del radicado padre (20209980000011)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-03 16:23:23.14673', '20209981100000001E', '20209980000014', '1234567890', 1, '998', 62, NULL, 'Incluir radicado en Expediente 20209981100000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-04 11:58:46.556356', '20209981100000001E', '20209980000034', '1234567890', 1, '998', 62, NULL, 'Incluir radicado en Expediente 20209981100000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-04 12:02:28.622612', '20209981100000001E', '20209980000024', '1234567890', 1, '998', 62, NULL, 'Incluir radicado en Expediente 20209981100000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-10 16:52:33.287913', '202009981120000001E', '202009980000011', '1234567890', 1, '0998', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones Oficiales Recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-10 16:58:53.507617', '202009981120000001E', '202009980000012', '1022982736', 2, '0998', 62, NULL, 'Incluir radicado en Expediente 202009981120000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-10 17:24:42.071457', '202009981120000001E', '202009980000034', '1234567890', 1, '0998', 62, NULL, 'Incluir radicado en Expediente 202009981120000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-16 10:15:28.693625', '202009981120000001E', '202009980000074', '1234567890', 1, '0998', 62, NULL, 'Incluir radicado en Expediente 202009981120000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-17 15:19:27.539694', '202009981110000002E', '202009980000032', '1234567890', 1, '0998', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones Oficiales Envidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-17 15:20:28.47353', '202009981120000002E', '202009980000032', '1234567890', 1, '0998', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones Oficiales Recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-17 15:24:01.47623', '202009981110000002E', '202009980000032', '1234567890', 1, '0998', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones Oficiales Envidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-17 15:30:50.961043', '202009981120000001E', '202009980000032', '1234567890', 1, '0998', 62, NULL, 'Incluir radicado en Expediente 202009981120000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-18 08:58:48.529239', '202009981120000002E', '202009980000042', '1234567890', 1, '0998', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones Oficiales Recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-18 08:59:15.979001', '202009981120000002E', '202009980000042', '1234567890', 1, '0998', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones Oficiales Recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-18 09:03:52.826048', '202009981120000001E', '202009980000042', '1234567890', 1, '0998', 62, NULL, 'Incluir radicado en Expediente 202009981120000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-18 09:06:21.003176', '202009981120000001E', '202009980000022', '1234567890', 1, '0998', 62, NULL, 'Incluir radicado en Expediente 202009981120000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-21 10:03:49.547746', '202009981110000002E', '202009980000084', '1234567890', 1, '0998', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones Oficiales Envidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-21 11:06:22.770511', '202009981120000001E', '202009980000013', '1234567890', 1, '0998', 62, NULL, 'Incluir radicado en Expediente 202009981120000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-21 11:32:08.62809', '202009981120000001E', '202009980000154', '1234567890', 1, '0998', 62, NULL, 'Incluir radicado en Expediente 202009981120000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-22 09:27:02.956652', '202009981110000002E', '202009980000061', '1234567890', 1, '0998', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones Oficiales Envidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-22 09:53:38.087379', '202009981110000002E', '202009980000061', '1234567890', 1, '0998', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones Oficiales Envidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-22 09:58:49.389563', '202009981110000002E', '202009980000061', '1234567890', 1, '0998', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones Oficiales Envidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-22 10:03:10.882133', '202009981120000002E', '202009980000061', '1234567890', 1, '0998', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones Oficiales Recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-22 10:23:53.563245', '202009981110000002E', '202009980000061', '1234567890', 1, '0998', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones Oficiales Envidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-22 10:26:03.479632', '202009981120000003E', '202009980000184', '1234567890', 1, '0998', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones Oficiales Recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-23 07:55:31.251644', '202009981120000004E', '202009980000444', '1234567890', 1, '0998', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones Oficiales Recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-23 08:57:20.924583', '202009981120000004E', '202009980000462', '1234567890', 1, '0998', 62, NULL, 'Incluir radicado en Expediente 202009981120000004E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2020-12-28 10:02:55.999108', '202009981120000004E', '202009980000151', '1234567890', 1, '0998', 53, NULL, 'Se ingresa al expediente del radicado padre (202009980000444)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-14 10:25:16.913518', '202110301110000001E', '202110300000111', '81745108', 1, '1030', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones Oficiales Envidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-14 10:30:30.104265', '202110301610000002E', '202110000000194', '52779966', 4, '1030', 51, NULL, 'TRD DERECHOS DE PETICIÓN/Peticiones, Quejas, Reclamos y Sugerencias (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-15 08:50:52.513804', '202110601610000003E', '202110210000204', '20994882', 5, '1060', 51, NULL, 'TRD DERECHOS DE PETICIÓN/Peticiones, Quejas, Reclamos y Sugerencias (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-18 08:35:23.840197', '202110301610000002E', '202110210000584', '20995001', 2, '1031', 62, NULL, 'Incluir radicado en Expediente 202110301610000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 1, NULL, '2021-01-18 08:37:08.922078', '202110301610000002E', '202110210000584', '20995001', 2, '1031', 58, NULL, 'Se Cerro el Expediente  ', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-19 12:31:08.937707', '202110501960000004E', '202110210000032', '80538280', 1, '1050', 51, NULL, 'TRD INFORMES/Informes de Gestión Institucional (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 08:29:14.687375', '202110001110000005E', '202110210000614', '52153547', 1, '1000', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones enviadas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 08:53:53.299782', '202110501960000004E', '202110210002822', '80538280', 1, '1050', 62, NULL, 'Incluir radicado en Expediente 202110501960000004E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 10:19:32.586021', '202110601120000006E', '202110210001462', '1078366668', 1, '1060', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 10:27:00.14223', '202110602310000007E', '202110210000072', '20994882', 5, '1060', 51, NULL, 'TRD LICENCIAS/Licencias de Construcción en Modalidades de Obra Nueva, Ampliación, Adecuación, Reconocimiento, Modificación, Urbanismo, Restauración, Reforzamiento Estructural, Demolición, Revalidación Reconstrucción, (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 10:35:48.117845', '202110602310000007E', '202110210002174', '20994882', 5, '1060', 62, NULL, 'Incluir radicado en Expediente 202110602310000007E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 10:38:25.346421', '202110601610000003E', '202110210002174', '20994882', 5, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 10:40:21.276129', '202110602310000007E', '202110210002524', '20994882', 5, '1060', 62, NULL, 'Incluir radicado en Expediente 202110602310000007E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 10:42:17.853318', '202110602310000007E', '202110210002504', '20994882', 5, '1060', 62, NULL, 'Incluir radicado en Expediente 202110602310000007E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 10:43:28.554257', '202110602310000007E', '202110210001214', '20994882', 5, '1060', 62, NULL, 'Incluir radicado en Expediente 202110602310000007E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 10:44:19.612115', '202110601610000003E', '202110210001124', '20994882', 5, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 10:44:51.317143', '202110601610000003E', '202110210000444', '20994882', 5, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 10:47:27.528967', '202110601610000003E', '202110210001114', '79653907', 6, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 10:48:35.745947', '202110601610000003E', '202110210000014', '79653907', 6, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 10:51:31.520063', '202110601610000003E', '202110210000042', '79653907', 6, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 11:26:56.067473', '202110801610000008E', '202110210000384', '6761082', 1, '1080', 51, NULL, 'TRD DERECHOS DE PETICIÓN/Peticiones, Quejas, Reclamos y Sugerencias (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 13:59:00.066527', '202110601610000003E', '202110210000054', '23857813', 2, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 15:00:28.986262', '202110601610000003E', '202110210001154', '20994882', 5, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 15:20:18.362389', '202110601610000003E', '202110210001354', '20994882', 5, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 16:14:07.521561', '202110322720000009E', '202110210002082', '1070952561', 6, '1032', 51, NULL, 'TRD PROCESOS/Procesos de Reconocimiento Voluntario de Paternidad (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 16:16:59.080607', '202110322720000009E', '202110210000092', '1070952561', 6, '1032', 62, NULL, 'Incluir radicado en Expediente 202110322720000009E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 16:23:52.340614', '202110801610000010E', '202110210001342', '6761082', 1, '1080', 51, NULL, 'TRD DERECHOS DE PETICIÓN/Peticiones, Quejas, Reclamos y Sugerencias (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 16:43:04.105132', '202110305100000011E', '202110210001784', '81745108', 1, '1030', 51, NULL, 'TRD CERTIFICACIONES/Certificaciones de residencia (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 16:44:12.938294', '202110305100000011E', '202110210001774', '81745108', 1, '1030', 62, NULL, 'Incluir radicado en Expediente 202110305100000011E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 16:56:09.397226', '202110321610000012E', '202110210000874', '1070952561', 6, '1032', 51, NULL, 'TRD DERECHOS DE PETICIÓN/Peticiones, Quejas, Reclamos y Sugerencias (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 17:14:50.904654', '202110311610000013E', '202110210000584', '20995001', 2, '1031', 51, NULL, 'TRD DERECHOS DE PETICIÓN/Peticiones, Quejas, Reclamos y Sugerencias (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-20 17:18:42.503233', '202110311610000013E', '202110210000594', '20995001', 2, '1031', 62, NULL, 'Incluir radicado en Expediente 202110311610000013E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 1, NULL, '2021-01-21 07:06:16.89901', '202110601120000006E', '202110210001462', '1078366668', 1, '1060', 58, NULL, 'Se Cerro el Expediente  ', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 07:44:46.219772', '202110602310000007E', '202110210000652', '23857813', 2, '1060', 62, NULL, 'Incluir radicado en Expediente 202110602310000007E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 07:45:36.798021', '202110602310000007E', '202110210000642', '23857813', 2, '1060', 62, NULL, 'Incluir radicado en Expediente 202110602310000007E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 08:14:17.837933', '202110602310000007E', '202110210003172', '20994882', 5, '1060', 62, NULL, 'Incluir radicado en Expediente 202110602310000007E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 09:06:21.715327', '202110801110000014E', '202110800000701', '6761082', 1, '1080', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones enviadas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 09:12:57.016809', '202110801110000014E', '202110210001442', '6761082', 1, '1080', 62, NULL, 'Incluir radicado en Expediente 202110801110000014E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 10:40:43.129103', '202110311610000013E', '202110210000914', '20995001', 2, '1031', 62, NULL, 'Incluir radicado en Expediente 202110311610000013E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 11:01:57.084002', '202110321120000015E', '202110210000152', '1070952561', 6, '1032', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 11:12:32.418731', '202110801110000014E', '202110800000731', '6761082', 1, '1080', 62, NULL, 'Incluir radicado en Expediente 202110801110000014E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 11:15:15.585734', '202110801110000016E', '202110210001202', '6761082', 1, '1080', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones enviadas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 1, NULL, '2021-01-21 11:15:38.559843', '202110801110000016E', '202110210001202', '6761082', 1, '1080', 58, NULL, 'Se Cerro el Expediente  ', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 12:14:13.486272', '202110305100000011E', '202110210002952', '81745108', 1, '1030', 62, NULL, 'Incluir radicado en Expediente 202110305100000011E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 12:14:39.849988', '202110305100000011E', '202110210002962', '81745108', 1, '1030', 62, NULL, 'Incluir radicado en Expediente 202110305100000011E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 12:14:57.797402', '202110305100000011E', '202110210002932', '81745108', 1, '1030', 62, NULL, 'Incluir radicado en Expediente 202110305100000011E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 12:15:20.561356', '202110305100000011E', '202110210002622', '81745108', 1, '1030', 62, NULL, 'Incluir radicado en Expediente 202110305100000011E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 12:15:53.739393', '202110305100000011E', '202110210002592', '81745108', 1, '1030', 62, NULL, 'Incluir radicado en Expediente 202110305100000011E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 12:19:19.714011', '202110301910000017E', '202110210001682', '81745108', 1, '1030', 51, NULL, 'TRD INFORMES/Informes a Entes de Control y vigilancia (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 14:01:32.393184', '202110601610000003E', '202110210003362', '1078366668', 1, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 14:48:54.115982', '202110311610000013E', '202110210001104', '20995001', 2, '1031', 62, NULL, 'Incluir radicado en Expediente 202110311610000013E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 1, NULL, '2021-01-21 14:49:38.192718', '202110311610000013E', '202110210001104', '20995001', 2, '1031', 58, NULL, 'Se Cerro el Expediente  ', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 16:08:19.552278', '202110601610000003E', '202110210000684', '80409393', 4, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 16:26:54.99616', '202110605110000018E', '202110210000742', '80409393', 4, '1060', 51, NULL, 'TRD CERTIFICACIONES/Certificaciones de viabiidad del Uso del Suelo (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 1, NULL, '2021-01-21 16:28:30.275608', '202110605110000018E', '202110210000742', '80409393', 4, '1060', 58, NULL, 'Se Cerro el Expediente  ', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 16:50:06.603735', '202110601610000003E', '202110210003144', '20994882', 5, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-21 16:59:26.008331', '202110605110000019E', '202110210000424', '80409393', 4, '1060', 51, NULL, 'TRD CERTIFICACIONES/Certificaciones de viabiidad del Uso del Suelo (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-22 07:57:07.088044', '202110301110000001E', '202110300000043', '81745108', 1, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301110000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-22 08:09:23.465582', '202110302360000020E', '202110300000431', '80852213', 3, '1030', 51, NULL, 'TRD ACTAS/Actas de comité de Transporte (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-22 08:22:29.507147', '202110302360000020E', '202110300000821', '80852213', 3, '1030', 62, NULL, 'Incluir radicado en Expediente 202110302360000020E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-22 08:31:32.120784', '202110302360000020E', '202110300000851', '80852213', 3, '1030', 62, NULL, 'Incluir radicado en Expediente 202110302360000020E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-22 08:32:47.972999', '202110302360000020E', '202110210001802', '80852213', 3, '1030', 62, NULL, 'Incluir radicado en Expediente 202110302360000020E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-22 08:33:14.243232', '202110302360000020E', '202110210000562', '80852213', 3, '1030', 62, NULL, 'Incluir radicado en Expediente 202110302360000020E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-22 08:33:39.121599', '202110302360000020E', '202110210000432', '80852213', 3, '1030', 62, NULL, 'Incluir radicado en Expediente 202110302360000020E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-22 08:37:18.313402', '202110302360000020E', '202110210003344', '80852213', 3, '1030', 62, NULL, 'Incluir radicado en Expediente 202110302360000020E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-22 09:53:40.691708', '202110305100000011E', '202110210002092', '81745108', 1, '1030', 62, NULL, 'Incluir radicado en Expediente 202110305100000011E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-22 13:12:03.846996', '202110201120000021E', '202110210000282', '1078370117', 12, '1020', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-22 13:14:39.043793', '202110801110000022E', '202110800000991', '6761082', 1, '1080', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones enviadas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-22 13:15:34.551941', '202110201120000021E', '202110200000371', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201120000021E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-23 12:45:20.736673', '202110701120000023E', '202110210001722', '1075651906', 3, '1070', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-25 08:33:03.806938', '202110602310000007E', '202110210003834', '20994882', 5, '1060', 62, NULL, 'Incluir radicado en Expediente 202110602310000007E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-25 09:26:24.574582', '202110601610000003E', '202110210000294', '1052396800', 3, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-25 09:28:12.988701', '202110601610000003E', '202110210000304', '1052396800', 3, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-25 12:57:41.414571', '202110201610000024E', '202110210000184', '20994213', 1, '1020', 51, NULL, 'TRD DERECHOS DE PETICIÓN/Peticiones, Quejas, Reclamos y Sugerencias (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-25 14:20:04.62584', '202110302360000020E', '202110210002702', '80852213', 3, '1030', 62, NULL, 'Incluir radicado en Expediente 202110302360000020E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-25 15:25:33.483221', '202110101110000025E', '202110100001001', '1073502330', 5, '1010', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones enviadas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 08:27:52.376811', '202110322710000026E', '202110210000962', '53139563', 2, '1032', 51, NULL, 'TRD PROCESOS/Procesos Administrativos de Restablecimiento de Derechos (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 09:57:52.799008', '202110201120000027E', '202110210000342', '1078370117', 12, '1020', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 09:58:12.507612', '202110201120000027E', '202110210001732', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201120000027E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 09:58:29.36366', '202110201120000027E', '202110210002012', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201120000027E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 09:58:45.587621', '202110201120000027E', '202110210003802', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201120000027E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 10:50:28.756294', '202110601610000003E', '202110210003752', '23857813', 2, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 11:46:57.236127', '202110301120000028E', '202110210001712', '81745108', 1, '1030', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 12:21:51.368155', '202110301110000001E', '202110300001371', '1078371179', 5, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301110000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 12:23:21.993031', '202110301110000001E', '202110210003842', '81745108', 1, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301110000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 12:47:45.125066', '202110311120000029E', '202110210002782', '20995001', 2, '1031', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 1, NULL, '2021-01-26 13:09:49.808642', '202110301610000002E', '202110000000194', '52779966', 4, '1030', 59, NULL, 'Se Reabrio el Expediente  ', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 13:10:41.232301', '202110301610000002E', '202110210001314', '80852213', 3, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301610000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 13:12:04.901583', '202110301110000001E', '202110210001252', '52779966', 4, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301110000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 13:12:29.103592', '202110301610000002E', '202110210001182', '52779966', 4, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301610000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 14:45:47.889632', '202110301120000028E', '202110200000053', '81745108', 1, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301120000028E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 14:48:35.807981', '202110301120000030E', '202110200000053', '81745108', 1, '1030', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 14:48:35.907816', '202110301120000031E', '202110200000053', '81745108', 1, '1030', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 1, NULL, '2021-01-26 14:52:26.232615', '20211030112000028E', '202110200000053', '81745108', 1, '1030', 58, NULL, 'Se Cerro el Expediente  ', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 15:15:48.979386', '202110201120000032E', '202110100000103', '20994213', 1, '1020', 51, NULL, 'TRD CONSECUTIVOS DE COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 16:22:25.285407', '202110601610000003E', '202110210004504', '20994882', 5, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-26 16:50:08.062496', '202110201610000024E', '202110200001441', '20994213', 1, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201610000024E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-27 08:54:34.294812', '202110601610000003E', '202110210004294', '1052396800', 3, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-27 08:55:54.547202', '202110601610000003E', '202110210004284', '1052396800', 3, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-27 08:56:48.5529', '202110601610000003E', '202110210004274', '1052396800', 3, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-27 12:02:57.597912', '202110602310000007E', '202110210003934', '1052396800', 3, '1060', 62, NULL, 'Incluir radicado en Expediente 202110602310000007E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-27 12:04:29.158619', '202110602310000007E', '202110210003924', '1052396800', 3, '1060', 62, NULL, 'Incluir radicado en Expediente 202110602310000007E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-27 12:42:27.19898', '202110601610000003E', '202110210004494', '20994882', 5, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-27 12:59:35.289037', '202110201610000024E', '202110210003824', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201610000024E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 1, NULL, '2021-01-27 14:51:00.677318', '202110605110000019E', '202110210000424', '80409393', 4, '1060', 58, NULL, 'Se Cerro el Expediente  ', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 1, NULL, '2021-01-27 14:51:07.087913', '202110605110000019E', '202110210000424', '80409393', 4, '1060', 59, NULL, 'Se Reabrio el Expediente  ', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 1, NULL, '2021-01-27 14:51:38.888171', '202110605110000019E', '202110210000424', '80409393', 4, '1060', 59, NULL, 'Se Reabrio el Expediente  ', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 1, NULL, '2021-01-27 14:53:15.951309', '202110305100000011E', '202110210002932', '80409393', 4, '1060', 58, NULL, 'Se Cerro el Expediente  ', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 1, NULL, '2021-01-27 14:53:20.145099', '202110305100000011E', '202110210002932', '80409393', 4, '1060', 59, NULL, 'Se Reabrio el Expediente  ', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 1, NULL, '2021-01-27 15:12:35.218119', '202110605110000018E', '202110210000742', '1078371056', 7, '1060', 59, NULL, 'Se Reabrio el Expediente  ', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-27 15:13:14.459433', '202110605110000018E', '202110210004482', '1078371056', 7, '1060', 62, NULL, 'Incluir radicado en Expediente 202110605110000018E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-27 15:22:49.406935', '202110501960000033E', '202110210003892', '80538280', 1, '1050', 51, NULL, 'TRD INFORMES/Informes de Gestión Institucional (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-27 16:59:48.358939', '202110201610000024E', '202110210003964', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201610000024E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-28 08:36:34.192713', '202110301610000002E', '202110210002654', '80852213', 3, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301610000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-28 10:14:32.826339', '202110401110000034E', '202110210004412', '55221190', 1, '1040', 51, NULL, 'TRD COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones enviadas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-28 10:15:15.206641', '202110401110000034E', '202110210003952', '55221190', 1, '1040', 62, NULL, 'Incluir radicado en Expediente 202110401110000034E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-28 10:47:12.45793', '202110601610000003E', '202110210004844', '20994882', 5, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-28 11:19:27.216793', '202110602310000007E', '202110210002574', '79653907', 6, '1060', 62, NULL, 'Incluir radicado en Expediente 202110602310000007E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-28 12:04:10.951057', '202110602310000007E', '202110210003044', '79653907', 6, '1060', 62, NULL, 'Incluir radicado en Expediente 202110602310000007E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-28 12:18:10.378895', '202110301610000002E', '202110210002184', '1078371179', 5, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301610000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-28 12:18:38.907595', '202110301610000002E', '202110210003264', '1078371179', 5, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301610000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-28 12:18:54.62977', '202110301610000002E', '202110210003614', '1078371179', 5, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301610000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-28 14:06:16.456172', '202110601610000003E', '202110210002882', '1078371056', 7, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-28 14:08:22.625092', '202110601610000003E', '202110210002724', '1078371056', 7, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-28 14:09:43.452541', '202110601610000003E', '202110210001074', '1078371056', 7, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-28 14:11:14.409301', '202110601610000003E', '202110210001994', '1078371056', 7, '1060', 62, NULL, 'Incluir radicado en Expediente 202110601610000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-28 15:50:57.164572', '202110602310000007E', '202110210004012', '23857813', 2, '1060', 62, NULL, 'Incluir radicado en Expediente 202110602310000007E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-28 16:40:24.565228', '202110201610000024E', '202110200001821', '20994213', 1, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201610000024E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-28 16:57:40.093234', '202110301120000030E', '202110210000172', '81745108', 1, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301120000030E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-28 16:59:10.842458', '202110301120000028E', '202110210000172', '81745108', 1, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301120000028E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 07:47:48.152271', '202109981110000035E', '202109980000013', '1234567890', 1, '0998', 51, NULL, 'TRD COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones enviadas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 09:37:06.700866', '202110801610000036E', '202110210003904', '6761082', 1, '1080', 51, NULL, 'TRD DERECHOS DE PETICIÓN/Peticiones, Quejas, Reclamos y Sugerencias (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 11:19:38.132337', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 11:20:18.353123', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 11:22:11.336514', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 11:26:20.482397', '202110301910000017E', '202110210003272', '1078371179', 5, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301910000017E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 11:28:26.159139', '202110301610000002E', '202110210003272', '1078371179', 5, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301610000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 11:28:32.031606', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 11:29:27.419247', '202110701120000023E', '202110210000662', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 11:36:36.641144', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 11:37:15.933212', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 11:44:09.046027', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 11:47:11.774', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 1, NULL, '2021-01-29 11:49:28.825193', '202110701120000023E', '202110210001722', '20994603', 1, '1070', 56, NULL, 'Se modifico el responsable  ', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 1, NULL, '2021-01-29 11:49:47.453857', '202110701120000023E', '202110210001722', '20994603', 1, '1070', 58, NULL, 'Se Cerro el Expediente  ', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 1, NULL, '2021-01-29 11:49:59.339129', '202110701120000023E', '202110210001722', '20994603', 1, '1070', 59, NULL, 'Se Reabrio el Expediente  ', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 11:50:42.877059', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 11:51:43.246109', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 11:54:19.320687', '202110701120000023E', '202110700001301', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 11:58:11.007987', '202110701120000023E', '202110210003212', '1075651906', 3, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 12:04:30.83791', '202110301110000001E', '202110210003272', '1078371179', 5, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301110000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 12:05:25.954685', '202110301110000001E', '202110210003272', '1078371179', 5, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301110000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 12:06:30.096654', '202110301110000001E', '202110210003272', '1078371179', 5, '1030', 62, NULL, 'Incluir radicado en Expediente 202110301110000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 12:25:28.51446', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 12:26:15.609468', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 12:30:39.168828', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 12:33:54.837226', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 12:35:23.874018', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 12:38:59.982664', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 12:44:53.741257', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 13:00:56.83738', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 13:03:29.741794', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 13:12:32.62685', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 13:12:41.201902', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 13:19:56.492038', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 13:23:35.195207', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 13:25:55.30724', '202110701120000023E', '202110210003212', '20994603', 1, '1070', 62, NULL, 'Incluir radicado en Expediente 202110701120000023E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-01-29 16:21:41.515848', '202110301110000001E', '202109980000012', '1234567890', 1, '0998', 62, NULL, 'Incluir radicado en Expediente 202110301110000001E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-01 08:57:03.307812', '202110201610000024E', '202110200001981', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201610000024E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-02 08:45:06.392154', '202110201610000024E', '202110310005452', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201610000024E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-02 15:53:55.109537', '202110201610000024E', '202110200002011', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201610000024E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-02 16:01:56.212104', '202110201610000024E', '202109980000022', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201610000024E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-03 09:16:49.746593', '202110201110000037E', '202109980005464', '1078370117', 12, '1020', 51, NULL, 'TRD COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones enviadas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-03 09:17:39.225443', '202110201120000021E', '202110200002031', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201120000021E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-04 08:56:35.756142', '202110201610000024E', '202109980005684', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201610000024E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-04 16:15:21.298141', '202110201120000032E', '202110200000233', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201120000032E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-05 08:58:00.389178', '202110201610000024E', '202109980005694', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201610000024E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-05 09:12:04.276744', '202110201120000027E', '202110200002081', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201120000027E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-09 17:59:20.783699', '202110201110000038E', '202110210005152', '20994213', 1, '1020', 51, NULL, 'TRD COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones enviadas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-11 10:48:10.724092', '202110201110000038E', '202110200002101', '20994213', 1, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201110000038E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-12 15:38:29.053816', '202110201610000024E', '202110200001971', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201610000024E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-15 09:09:04.516035', '202110201610000024E', '202110200001991', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201610000024E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-15 14:14:29.615464', '202109981110000039E', '202109980000332', '1234567890', 1, '0998', 51, NULL, 'TRD COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones enviadas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-16 15:15:04.123796', '202109981610000040E', '202109980000322', '1234567890', 1, '0998', 51, NULL, 'TRD DERECHOS DE PETICIÓN/Peticiones, Quejas, Reclamos y Sugerencias (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-16 17:54:17.50947', '202109981110000035E', '202109980000312', '1234567890', 1, '0998', 62, NULL, 'Incluir radicado en Expediente 202109981110000035E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-16 17:55:36.859268', '202109981110000035E', '202109980000302', '1234567890', 1, '0998', 62, NULL, 'Incluir radicado en Expediente 202109981110000035E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-16 18:02:49.746582', '202109981110000035E', '202109980000282', '1234567890', 1, '0998', 62, NULL, 'Incluir radicado en Expediente 202109981110000035E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-16 18:05:52.779907', '202109981110000035E', '202109980000292', '1234567890', 1, '0998', 62, NULL, 'Incluir radicado en Expediente 202109981110000035E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-17 09:08:33.995518', '202110201610000024E', '202110210005924', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201610000024E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-22 10:18:24.909231', '202110201610000024E', '202110210005934', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201610000024E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-22 10:22:06.227433', '202110201120000021E', '202110200003011', '1078370117', 12, '1020', 62, NULL, 'Incluir radicado en Expediente 202110201120000021E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-22 16:31:46.365481', '202110201110000041E', '202109980005944', '1078370117', 12, '1020', 51, NULL, 'TRD COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones enviadas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-23 16:19:38.928025', '20219981110000001E', '20219980000021', '1234567890', 1, '998', 51, NULL, 'TRD COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones enviadas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-23 16:23:17.541797', '20219981110000002E', '20219980000021', '1234567890', 1, '998', 51, NULL, 'TRD COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones enviadas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-23 16:45:16.700377', '20219981110000002E', '20219980000041', '1234567890', 1, '998', 62, NULL, 'Incluir radicado en Expediente 20219981110000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-23 17:11:38.778718', '20219981110000002E', '20219980000041', '1234567890', 1, '998', 62, NULL, 'Incluir radicado en Expediente 20219981110000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-23 17:14:06.80646', '20219981110000002E', '20219980000041', '1234567890', 1, '998', 62, NULL, 'Incluir radicado en Expediente 20219981110000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-23 17:15:22.099582', '20219981110000002E', '20219980000041', '1234567890', 1, '998', 62, NULL, 'Incluir radicado en Expediente 20219981110000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-23 17:15:41.172556', '20219981110000002E', '20219980000041', '1234567890', 1, '998', 62, NULL, 'Incluir radicado en Expediente 20219981110000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-23 17:16:06.051323', '20219981110000002E', '20219980000041', '1234567890', 1, '998', 62, NULL, 'Incluir radicado en Expediente 20219981110000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-23 17:27:52.304943', '20219981110000002E', '20219980000041', '1234567890', 1, '998', 62, NULL, 'Incluir radicado en Expediente 20219981110000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-23 17:34:32.961004', '20219981110000002E', '20219980000041', '1234567890', 1, '998', 62, NULL, 'Incluir radicado en Expediente 20219981110000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-23 17:35:31.546574', '20219981110000002E', '20219980000041', '1234567890', 1, '998', 62, NULL, 'Incluir radicado en Expediente 20219981110000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-23 17:40:36.961582', '20219981110000002E', '20219980000022', '1234567890', 1, '998', 62, NULL, 'Incluir radicado en Expediente 20219981110000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-23 17:41:50.203955', '20219981110000002E', '20219980000061', '1234567890', 1, '998', 53, NULL, 'Se ingresa al expediente del radicado padre (20219980000022)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-23 17:43:53.93058', '20219981110000002E', '20219980000012', '1234567890', 1, '998', 62, NULL, 'Incluir radicado en Expediente 20219981110000002E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-02-23 18:00:54.214015', '20219981110000002E', '20219980000071', '1234567890', 1, '998', 53, NULL, 'Se ingresa al expediente del radicado padre (20219980000012)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-03-31 10:39:12.517083', '20219981120000003E', '20219980000052', '1234567890', 1, '998', 51, NULL, 'TRD COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-03-31 10:48:36.719563', '20219981120000003E', '20219980000121', '1234567890', 1, '998', 53, NULL, 'Se ingresa al expediente del radicado padre (20219980000052)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-03-31 10:50:01.230526', '20219981120000003E', '20219980000131', '1234567890', 1, '998', 53, NULL, 'Se ingresa al expediente del radicado padre (20219980000052)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-04-13 16:24:49.469453', '20219981120000003E', '20219980000092', '1234567890', 1, '998', 62, NULL, 'Incluir radicado en Expediente 20219981120000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-04-13 16:29:58.979474', '20219981120000004E', '20219980000082', '1234567890', 1, '998', 51, NULL, 'TRD COMUNICACIONES OFICIALES/Consecutivo de Comunicaciones recibidas (Creación de Expediente.)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-04-13 17:27:20.96424', '20219981120000003E', '20219980000102', '1234567890', 1, '998', 62, NULL, 'Incluir radicado en Expediente 20219981120000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-04-13 17:27:48.316339', '20219981120000003E', '20219980000191', '1234567890', 1, '998', 53, NULL, 'Se ingresa al expediente del radicado padre (20219980000102)', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-04-13 17:31:32.476118', '20219981120000003E', '20219980000201', '1234567890', 1, '998', 62, NULL, 'Incluir radicado en Expediente 20219981120000003E', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-04-15 11:18:37.395533', '20219981120000003E', '20219980000092', '1234567890', 1, '998', 68, NULL, 'Se transfiere el radicado 20219980000092 al archivo central.', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-04-15 14:43:09.853069', '20219981120000003E', '20219980000102', '1234567890', 1, '998', 68, NULL, 'Se transfiere el radicado 20219980000102 al archivo central.', NULL, NULL);
INSERT INTO sgd_hfld_histflujodoc VALUES (NULL, 0, NULL, '2021-04-15 15:16:55.314601', '20219981120000003E', '20219980000191', '1234567890', 1, '998', 68, NULL, 'Se transfiere el radicado 20219980000191 al archivo central.', NULL, NULL);

--
-- Name: sgd_hmtd_secue; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sgd_hmtd_secue', 1, false);

--
-- Name: sgd_info_secue; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sgd_info_secue', 1, false);

--
-- Name: sgd_mat_secue; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sgd_mat_secue', 1, false);

--
-- Data for Name: sgd_mrd_matrird; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_mrd_matrird VALUES (2612, '998', 16, 1, 413, 'Electronico', '2021-02-23', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2617, '998', 11, 2, 327, 'Electronico', '2021-03-31', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2618, '998', 11, 2, 248, 'Electronico', '2021-04-13', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2613, '998', 11, 1, 413, 'Electronico', '2021-02-23', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2619, '998', 11, 2, 477, 'Electronico', '2021-04-13', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2614, '998', 16, 1, 455, 'Electronico', '2021-02-23', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2615, '998', 11, 1, 455, 'Electronico', '2021-02-23', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2616, '998', 11, 1, 459, 'Electronico', '2021-02-23', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2300, '998', 11, 1, 58, '2', '2020-12-10', NULL, '1');
INSERT INTO sgd_mrd_matrird VALUES (2299, '998', 11, 1, 155, '2', '2020-12-10', NULL, '1');
INSERT INTO sgd_mrd_matrird VALUES (2301, '998', 11, 2, 58, '2', '2020-12-10', NULL, '1');
INSERT INTO sgd_mrd_matrird VALUES (2302, '998', 11, 2, 155, '2', '2020-12-10', NULL, '1');
INSERT INTO sgd_mrd_matrird VALUES (2303, '998', 11, 2, 154, 'Electronico', '2020-12-10', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2304, '998', 11, 2, 201, 'Electronico', '2020-12-10', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2305, '998', 11, 1, 92, 'Electronico', '2020-12-17', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2306, '998', 11, 2, 92, 'Electronico', '2020-12-17', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2307, '998', 11, 1, 146, 'Electronico', '2020-12-21', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2308, '998', 11, 2, 1, 'Electronico', '2020-12-21', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2309, '998', 11, 2, 347, 'Electronico', '2020-12-21', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2310, '998', 11, 1, 118, 'Electronico', '2020-12-22', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2311, '998', 11, 2, 118, 'Electronico', '2020-12-22', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2312, '998', 11, 2, 499, 'Electronico', '2020-12-23', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2586, '998', 11, 1, 283, 'Electronico', '2021-01-29', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2591, '998', 11, 1, 105, 'Electronico', '2021-01-29', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2601, '998', 11, 1, 112, 'Electronico', '2021-02-15', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2602, '998', 11, 1, 122, 'Electronico', '2021-02-16', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2603, '998', 16, 1, 204, '2', '2021-02-16', NULL, '1');
INSERT INTO sgd_mrd_matrird VALUES (2604, '998', 16, 1, 208, '2', '2021-02-16', NULL, '1');
INSERT INTO sgd_mrd_matrird VALUES (2605, '998', 16, 1, 210, '2', '2021-02-16', NULL, '1');
INSERT INTO sgd_mrd_matrird VALUES (2606, '998', 16, 1, 122, 'Electronico', '2021-02-16', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2607, '998', 11, 1, 106, 'Electronico', '2021-02-16', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2608, '998', 11, 2, 116, 'Electronico', '2021-02-16', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2609, '998', 11, 1, 116, 'Electronico', '2021-02-16', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2610, '998', 16, 1, 155, 'Electronico', '2021-02-17', '2050-12-31', '1');
INSERT INTO sgd_mrd_matrird VALUES (2611, '998', 16, 1, 11, 'Electronico', '2021-02-18', '2050-12-31', '1');

--
-- Data for Name: sgd_noh_nohabiles; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_noh_nohabiles VALUES ('2019-01-01');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-01-06');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-01-07');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-01-13');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-01-20');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-01-27');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-02-02');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-02-10');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-02-17');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-02-24');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-03-03');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-03-10');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-03-17');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-03-24');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-03-25');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-03-31');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-04-07');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-04-14');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-04-18');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-04-19');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-04-21');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-04-28');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-05-05');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-05-12');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-05-19');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-05-26');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-06-02');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-06-03');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-06-09');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-06-16');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-06-23');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-06-24');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-06-30');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-07-01');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-07-07');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-07-14');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-07-20');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-07-21');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-07-28');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-08-04');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-08-07');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-08-11');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-08-18');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-08-19');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-08-25');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-09-01');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-09-08');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-09-15');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-09-22');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-09-29');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-10-06');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-10-13');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-10-14');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-10-20');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-10-27');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-11-03');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-11-04');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-11-10');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-11-11');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-11-17');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-11-24');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-12-01');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-12-08');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-12-15');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-12-22');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-12-25');
INSERT INTO sgd_noh_nohabiles VALUES ('2019-12-29');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-01-01');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-01-05');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-01-06');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-01-12');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-01-19');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-01-26');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-02-02');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-02-09');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-02-16');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-02-23');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-03-01');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-03-08');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-03-15');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-03-22');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-03-23');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-03-29');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-04-05');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-04-09');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-04-10');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-04-12');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-04-19');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-04-26');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-05-01');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-05-03');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-05-10');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-05-17');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-05-24');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-05-25');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-05-31');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-06-07');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-06-14');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-06-15');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-06-21');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-06-22');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-06-28');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-06-29');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-07-05');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-07-12');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-07-19');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-07-20');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-07-26');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-08-02');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-08-07');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-08-09');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-08-16');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-08-17');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-08-23');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-08-30');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-09-06');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-09-13');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-09-20');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-09-27');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-10-04');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-10-11');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-10-12');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-10-18');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-10-25');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-11-01');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-11-02');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-11-08');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-11-15');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-11-16');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-11-22');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-11-29');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-12-06');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-12-08');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-12-13');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-12-20');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-12-25');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-12-27');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-01-01');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-01-03');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-01-10');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-01-11');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-01-17');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-01-24');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-02-14');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-02-21');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-02-28');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-03-07');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-03-14');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-03-21');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-03-22');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-03-28');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-04-01');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-04-02');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-04-04');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-04-11');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-04-18');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-04-25');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-05-01');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-05-02');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-05-09');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-05-16');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-05-17');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-05-23');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-05-30');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-06-06');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-06-07');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-06-13');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-06-14');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-06-20');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-06-27');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-07-04');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-07-05');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-07-11');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-07-18');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-07-20');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-07-25');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-08-01');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-08-07');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-08-08');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-08-15');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-08-16');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-08-22');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-08-29');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-09-05');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-09-12');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-09-19');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-09-26');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-10-03');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-10-10');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-10-17');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-10-18');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-10-24');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-10-31');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-11-01');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-11-07');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-11-14');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-11-15');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-11-21');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-11-28');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-12-05');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-12-08');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-12-12');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-12-19');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-12-25');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-12-26');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-01-01');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-01-02');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-01-09');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-01-10');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-01-16');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-01-23');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-01-30');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-02-06');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-02-13');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-02-20');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-02-27');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-03-06');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-03-13');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-03-20');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-03-21');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-04-10');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-04-14');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-04-15');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-04-17');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-04-24');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-05-01');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-05-08');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-05-15');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-05-22');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-05-29');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-05-30');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-06-05');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-06-12');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-06-19');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-06-20');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-06-26');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-06-27');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-07-03');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-07-04');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-07-10');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-07-17');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-07-20');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-07-24');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-07-31');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-08-07');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-08-14');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-08-15');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-08-21');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-08-28');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-09-04');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-09-11');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-09-18');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-09-25');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-10-02');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-10-09');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-10-16');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-10-17');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-10-23');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-10-30');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-11-06');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-11-07');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-11-13');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-11-14');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-11-20');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-11-27');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-12-04');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-12-08');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-12-11');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-12-18');
INSERT INTO sgd_noh_nohabiles VALUES ('2022-12-25');
INSERT INTO sgd_noh_nohabiles VALUES ('2020-12-05');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-02-13');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-02-06');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-02-20');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-02-27');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-03-06');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-03-13');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-03-20');
INSERT INTO sgd_noh_nohabiles VALUES ('2021-03-27');

--
-- Data for Name: sgd_oem_oempresas; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_oem_oempresas VALUES (1, 4, 'SKINA TECHNOLOGIES SAS', '--', '8002509887', '', 1, 11, 'Carrera 37 No. 53-50', '6431582', 1, 170, 'soporte@skinatech.com');

--
-- Name: sgd_oem_secue; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sgd_oem_secue', 2, false);

--
-- Data for Name: sgd_parametro; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_parametro VALUES ('PRESTAMO_ESTADO', 5, 'Prestamo indefinido');
INSERT INTO sgd_parametro VALUES ('PRESTAMO_REQUERIMIENTO', 1, 'Documento');
INSERT INTO sgd_parametro VALUES ('PRESTAMO_REQUERIMIENTO', 2, 'Anexo');
INSERT INTO sgd_parametro VALUES ('PRESTAMO_REQUERIMIENTO', 3, 'Anexo y Documento');
INSERT INTO sgd_parametro VALUES ('PRESTAMO_DIAS_PREST', 1, '8');
INSERT INTO sgd_parametro VALUES ('PRESTAMO_DIAS_CANC', 1, '2');
INSERT INTO sgd_parametro VALUES ('PRESTAMO_PASW', 1, '1');
INSERT INTO sgd_parametro VALUES ('PRESTAMO_ESTADO', 4, 'Cancelado');
INSERT INTO sgd_parametro VALUES ('PRESTAMO_ESTADO', 3, 'Devuelto');
INSERT INTO sgd_parametro VALUES ('PRESTAMO_ESTADO', 2, 'Prestado');
INSERT INTO sgd_parametro VALUES ('PRESTAMO_ESTADO', 1, 'Solicitado');

--
-- Data for Name: sgd_parexp_paramexpediente; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_parexp_paramexpediente VALUES (1, '998', '', 'Nombre de Carpeta', 1, 1);
INSERT INTO sgd_parexp_paramexpediente VALUES (2, '999', '', 'Nombre de Carpeta', 1, 1);

--
-- Data for Name: sgd_pexp_procexpedientes; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_pexp_procexpedientes VALUES (0, NULL, 0, NULL, NULL, 1, 0);

--
-- Name: sgd_plg_secue; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sgd_plg_secue', 1, false);

--
-- Data for Name: sgd_rdf_retdocf; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_rdf_retdocf VALUES (2613, '20219980000021', '998', 1, '1234567890', '2021-02-23');
INSERT INTO sgd_rdf_retdocf VALUES (2615, '20219980000041', '998', 1, '1234567890', '2021-02-23');
INSERT INTO sgd_rdf_retdocf VALUES (2616, '20219980000022', '998', 1, '1234567890', '2021-02-23');
INSERT INTO sgd_rdf_retdocf VALUES (2299, '20219980000012', '998', 1, '1234567890', '2021-02-23');
INSERT INTO sgd_rdf_retdocf VALUES (2299, '20219980000081', '998', 1, '1234567890', '2021-03-09');
INSERT INTO sgd_rdf_retdocf VALUES (2299, '20219980000091', '998', 1, '1234567890', '2021-03-09');
INSERT INTO sgd_rdf_retdocf VALUES (2299, '20219980000101', '998', 1, '1234567890', '2021-03-09');
INSERT INTO sgd_rdf_retdocf VALUES (2617, '20219980000052', '998', 1, '1234567890', '2021-03-31');
INSERT INTO sgd_rdf_retdocf VALUES (2618, '20219980000092', '998', 1, '1234567890', '2021-04-13');
INSERT INTO sgd_rdf_retdocf VALUES (2619, '20219980000082', '998', 1, '1234567890', '2021-04-13');
INSERT INTO sgd_rdf_retdocf VALUES (2302, '20219980000102', '998', 1, '1234567890', '2021-04-13');
INSERT INTO sgd_rdf_retdocf VALUES (2302, '20219980000201', '998', 1, '1234567890', '2021-04-13');

--
-- Data for Name: sgd_renv_regenvio; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_renv_regenvio VALUES (1, 1, '2021-02-23 16:39:26.218571', '20219980000021', 'BOGOTA', '6431582', 'soporte@skinatech.com', '1', 214, 0, 1, 1234567890, 'SKINA TECHNOLOGIES SAS -- ', 0, 10, '1', NULL, '998', 1, '20219980000021', 'Carrera 37 No. 53-50', 'D.C.', 'BOGOTA', NULL, 1, 0, '20219980000021', NULL, NULL, NULL, '0', '0', '0', '0', NULL, 'COLOMBIA', '20219980000021');
INSERT INTO sgd_renv_regenvio VALUES (2, 1, '2021-02-23 16:54:40.944345', '20219980000051', 'BOGOTA', '6431582', 'soporte@skinatech.com', '1', 214, 0, 1, 1234567890, 'SKINA TECHNOLOGIES SAS', 0, 14, '2', NULL, '998', 1, '20219980000051', 'Carrera 37 No. 53-50', 'D.C.', 'BOGOTA', NULL, 1, 0, '20219980000051', NULL, NULL, NULL, '0', '0', '0', '0', NULL, 'COLOMBIA', '20219980000051');
INSERT INTO sgd_renv_regenvio VALUES (3, 1, '2021-02-23 17:56:29.382501', '20219980000061', 'BOGOTA', '6431582', 'soporte@skinatech.com', '1', 214, 0, 1, 1234567890, 'SKINA TECHNOLOGIES SAS', 0, 16, '3', NULL, '998', 1, '20219980000061', 'Carrera 37 No. 53-50', 'D.C.', 'BOGOTA', NULL, 1, 0, '20219980000061', NULL, NULL, NULL, '0', '0', '0', '0', NULL, 'COLOMBIA', '20219980000061');
INSERT INTO sgd_renv_regenvio VALUES (4, 1, '2021-02-23 18:01:08.526438', '20219980000071', 'BOGOTA', '6431582', 'soporte@skinatech.com', '1', 214, 0, 1, 1234567890, 'SKINA TECHNOLOGIES SAS', 0, 17, '4', NULL, '998', 1, '20219980000071', 'Carrera 37 No. 53-50', 'D.C.', 'BOGOTA', NULL, 1, 0, '20219980000071', NULL, NULL, NULL, '0', '0', '0', '0', NULL, 'COLOMBIA', '20219980000071');
INSERT INTO sgd_renv_regenvio VALUES (5, NULL, '2021-03-09 10:27:49.103704', '20219980000081', '1', '', '', '', NULL, 0, 1, 1234567890, 'SKINA TECHNOLOGIES SAS', 0, NULL, NULL, NULL, '998', 1, '20219980000081', 'Carrera 37 No. 53-50', 'D.C.', 'BOGOTA', NULL, 0, 1, 'Masiva grupo 20219980000081', NULL, NULL, NULL, '0', '0', '0', '0', '998', 'COLOMBIA', NULL);
INSERT INTO sgd_renv_regenvio VALUES (5, NULL, '2021-03-09 10:27:49.103704', '20219980000091', '1', '', '', '', NULL, 0, 1, 1234567890, 'SKINA TECHNOLOGIES SAS', 0, NULL, NULL, NULL, '998', 1, '20219980000081', 'Carrera 37 No. 53-50', 'D.C.', 'BOGOTA', NULL, 0, 1, 'Masiva grupo 20219980000081', NULL, NULL, NULL, '0', '0', '0', '0', '998', 'COLOMBIA', NULL);
INSERT INTO sgd_renv_regenvio VALUES (5, NULL, '2021-03-09 10:27:49.103704', '20219980000101', '1', '', '', '', NULL, 0, 1, 1234567890, 'SKINA TECHNOLOGIES SAS', 0, NULL, NULL, NULL, '998', 1, '20219980000081', 'Carrera 37 No. 53-50', 'D.C.', 'BOGOTA', NULL, 0, 1, 'Masiva grupo 20219980000081', NULL, NULL, NULL, '0', '0', '0', '0', '998', 'COLOMBIA', NULL);

--
-- Data for Name: sgd_sbrd_subserierd; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_sbrd_subserierd VALUES (1, 1, 'Acciones de Cumplimiento', '2020-12-10', '2030-11-25', 2, 8, 'SELECCION', 'PAPEL', 'Subserie documental en la que se conservan los documentos por los cuales un ciudadano acude ante un juez administrativo para hacer efectivo el cumplimiento de una ley o un acto administrativo, buscando así que se ordene a la autoridad correspondiente el cumplimiento del deber omitido. Manual para el ejercicio de las acciones constitucionales. Bogotá: Editorial Universidad del Rosario, 2007. Pág. 14 Serie Documental con valor primario denttro de las funciones admisnitartivas de la alcaldía, culminandoa el tiempo de retención en el Archivo Central, se procede a tomar una muestra aleatoria simple del 5% para su conservación. La demás documentación se destruye a través del método de picado.', 1);
INSERT INTO sgd_sbrd_subserierd VALUES (1, 2, 'Acciones de Grupo', '2020-12-10', '2030-11-25', 2, 8, 'SELECCION', 'PAPEL', 'Subserie documental en la que se conservan los documentos por los cuales un grupo de personas afectadas por una misma causa acuden a las autoridades judiciales para obtener el reconocimiento y pago de la indemnización por los perjuicios recibidos. Manual para el ejercicio de las acciones constitucionales. Bogotá: Editorial Universidad del Rosario, 2007. Pág. 12. posse  valor primario denttro de las funciones admisnitartivas de la alcaldía, culminandoa el tiempo de retención en el Archivo Central, se procede a tomar una muestra aleatoria simple del 5% para su conservación. La demás documentación se destruye a través del método de picado.', 2);
INSERT INTO sgd_sbrd_subserierd VALUES (1, 3, 'Acciones de Tutela', '2020-12-10', '2030-11-25', 2, 8, 'SELECCION', 'PAPEL', 'Subserie documental en la que se conservan los documentos por los cuales un ciudadano acude ante un juez de la República, con el fin de buscar un pronunciamiento que proteja un derecho constitucional fundamental vulnerado o amenazado por acción u omisión de una entidad pública o particular. Guía de mecanismos constitucionales de protección de Derechos Humanos. Pág. 72. Serie Documental con valor primario denttro de las funciones admisnitartivas de la alcaldía, culminandoa el tiempo de retención en el Archivo Central, se procede a tomar una muestra aleatoria simple del 5% para su conservación. La demás documentación se destruye a través del método de picado.', 3);
INSERT INTO sgd_sbrd_subserierd VALUES (1, 4, 'Acciones Populares', '2020-12-10', '2030-11-25', 2, 8, 'SELECCION', 'PAPEL', 'Subserie documental en la que se conservan los documentos por los cuales una persona, colectivo o entidad acude ante un juez de la República en defensa y protección de los derechos e intereses colectivos enunciados en el artículo 88 de la Constitución Política de Colombia y el artículo 4 de la Ley 472 de 1998. Manual para el ejercicio de las acciones constitucionales. Bogotá: Editorial Universidad del Rosario, 2007. Pág. 10. Serie Documental con valor primario denttro de las funciones admisnitartivas de la alcaldía, culminandoa el tiempo de retención en el Archivo Central, se procede a tomar una muestra aleatoria simple del 5% para su conservación. La demás documentación se destruye a través del método de picado.', 4);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 1, 'Actas Comité Institucional de Gestión y Desempeño', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 5);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 2, 'Actas Comité Asesor de Contratación Municipal', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 6);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 3, 'Actas Comité de Aprobación de Exenciones', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 7);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 4, 'Actas Comité de Atención Integral al Adulto Mayor', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 8);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 5, 'Actas Comité de Certificación Municipal', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 9);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 6, 'Actas Comité de Comisión de Personal', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 10);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 7, 'Actas Comité de Convivencia Escolar', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 11);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 8, 'Actas de Comité de Coordinación del Sistema de Control Interno', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 12);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 9, 'Actas Comité de Discapacidad', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 13);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 10, 'Actas Comité de Erradicación de Trabajo Infantil (CETI)', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 14);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 11, 'Actas Comité de Participación Local de Salud (COPACO)', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 15);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 12, 'Actas Comité Derechos Humanos', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 16);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 13, 'Actas Comité Fondo Luis Carlos Galán', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 17);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 14, 'Actas Comité Garantías Electorales', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 18);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 15, 'Actas Comité Gestión de Riesgos de Desastres', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 19);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 16, 'Actas Comité Infancia y Adolescencia', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 20);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 17, 'Actas Comité Interno Disciplinario', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 21);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 18, 'Actas Comité Municipal de Convivencia Escolar', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 22);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 19, 'Actas Comité Municipal de Igualdad de Oportunidades', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 23);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 20, 'Actas Comité para la Prevención Integral del Consumo de SPA', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 24);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 21, 'Actas Comité Paritario de Seguridad  y Salud en el Trabajo', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 25);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 22, 'Actas Comité Permanente de Estratificación', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 26);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 23, 'Actas Comité Red de Buen Trato', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 27);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 24, 'Actas Comité Sostenibilidad Contable', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 28);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 25, 'Actas Comité Técnico de Administración del SISBEN', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 29);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 26, 'Actas Comité Técnico Interinstitucional de Educación Ambiental Municipal (CIDEAM)', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 30);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 28, 'Actas Consejo de Desarrollo Rural', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 31);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 29, 'Actas Consejo de Gobierno en Linea', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 32);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 30, 'Actas Consejo de Juventud', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 33);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 31, 'Actas Consejo de Política Económica y Social (COMPES)', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 34);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 32, 'Actas Consejo de Política Social', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 35);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 33, 'Actas Consejo de Seguridad', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 36);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 34, 'Actas Consejo Fondo de Vivienda de Interés Social  (FOVIS)', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 37);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 35, 'Actas Consejo Territorial de Planeación', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 38);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 27, 'Actas de Anulación de Consecutivo', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 39);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 36, 'Actas de comité de Transporte', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 40);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 37, 'Actas de Conciliaciòn', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 41);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 38, 'Actas de Gestión Oficina de Comunicaciones', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 42);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 39, 'Actas de Incautación de Mercancia', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 43);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 40, 'Actas de Incautación de Sustancias Psicoactivas', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 44);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 41, 'Actas de Justicia Transicional', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 45);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 42, 'Actas de Posesion', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 46);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 43, 'Actas de Reuniones Administrativas', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 47);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 44, 'Actas del Consejo de Política Fiscal (CONFIS)', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 48);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 45, 'Actas Entrega de cargo', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 49);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 46, 'Actas Inspección, Vigilancia y Control de Saneamiento Ambiental', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 50);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 47, 'Actas Junta Defensora de Animales', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 51);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 48, 'Actas Mesa Intersectorial de Infancia y Adolescencia', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 52);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 49, 'Actas Mesa Técnica de Familia', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 53);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 50, 'Actas Mesa Técnica Infancia y Adolescencia', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 54);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 51, 'Actas Mesa Técnica Primera Infancia', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 55);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 52, 'Actas  de Verificacion Ocular de Predios', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 56);
INSERT INTO sgd_sbrd_subserierd VALUES (2, 53, 'Actas Organo Colegiado de Administración y Decisión (OCAD)', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 57);
INSERT INTO sgd_sbrd_subserierd VALUES (4, 1, 'Autorizaciones de Pago', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio.Teniendo en cuenta que estos documentos no ofrecen posibilidades investigativas, se debe eliminar el soporte de estos documentos, teniendo en cuenta lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura en el Artículo 2.8.2.2.5 Eliminación de documentos, dejando constancia mediante Inventario y Acta de Eliminación aprobada por el Comité Interno de Archivo.', 58);
INSERT INTO sgd_sbrd_subserierd VALUES (4, 2, 'Autorizaciones de Transito', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio.Teniendo en cuenta que estos documentos no ofrecen posibilidades investigativas, se debe eliminar el soporte de estos documentos, teniendo en cuenta lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura en el Artículo 2.8.2.2.5 Eliminación de documentos, dejando constancia mediante Inventario y Acta de Eliminación aprobada por el Comité Interno de Archivo.', 59);
INSERT INTO sgd_sbrd_subserierd VALUES (4, 3, 'Autorizaciones de Vallas y Pasacalles', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio.Teniendo en cuenta que estos documentos no ofrecen posibilidades investigativas, se debe eliminar el soporte de estos documentos, teniendo en cuenta lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura en el Artículo 2.8.2.2.5 Eliminación de documentos, dejando constancia mediante Inventario y Acta de Eliminación aprobada por el Comité Interno de Archivo.', 60);
INSERT INTO sgd_sbrd_subserierd VALUES (4, 4, 'Autorizaciones Eventos y Espectáculos', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio.Teniendo en cuenta que estos documentos no ofrecen posibilidades investigativas, se debe eliminar el soporte de estos documentos, teniendo en cuenta lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura en el Artículo 2.8.2.2.5 Eliminación de documentos, dejando constancia mediante Inventario y Acta de Eliminación aprobada por el Comité Interno de Archivo.', 61);
INSERT INTO sgd_sbrd_subserierd VALUES (4, 5, 'Autorizaciones Urbanisticas', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio.Teniendo en cuenta que estos documentos no ofrecen posibilidades investigativas, se debe eliminar el soporte de estos documentos, teniendo en cuenta lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura en el Artículo 2.8.2.2.5 Eliminación de documentos, dejando constancia mediante Inventario y Acta de Eliminación aprobada por el Comité Interno de Archivo.', 62);
INSERT INTO sgd_sbrd_subserierd VALUES (3, 1, 'Nomina', '2020-12-10', '2025-11-25', 10, 90, 'M.TECNOLOGICO / SELECCION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, Se selecciona un 10% de lo producido en el periodo administrativo  El proceso de selección será realizado por el Comité Interno de Archivo, el jefe de la dependencia productora y los interesados. La documentación seleccionada, se debe transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. La Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio', 63);
INSERT INTO sgd_sbrd_subserierd VALUES (3, 2, 'Pasivocol', '2020-12-10', '2025-11-25', 5, 15, 'ELIMINACION', 'PAPEL / ELECTRONICO', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio.Teniendo en cuenta que estos documentos no ofrecen posibilidades investigativas, se debe eliminar el soporte de estos documentos, teniendo en cuenta lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura en el Artículo 2.8.2.2.5 Eliminación de documentos, dejando constancia mediante Inventario y Acta de Eliminación aprobada por el Comité Interno de Archivo.', 64);
INSERT INTO sgd_sbrd_subserierd VALUES (5, 1, 'Certificaciones Contractuales', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Sin procedimiento parametrizado', 65);
INSERT INTO sgd_sbrd_subserierd VALUES (5, 2, 'Certificaciones convenio universidades', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Sin procedimiento parametrizado', 66);
INSERT INTO sgd_sbrd_subserierd VALUES (5, 3, 'Certificaciones de EOT', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio.Teniendo en cuenta que estos documentos no ofrecen posibilidades investigativas, se debe eliminar el soporte de estos documentos, teniendo en cuenta lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura en el Artículo 2.8.2.2.5 Eliminación de documentos, dejando constancia mediante Inventario y Acta de Eliminación aprobada por el Comité Interno de Archivo.', 67);
INSERT INTO sgd_sbrd_subserierd VALUES (5, 4, 'Certificaciones de Estratificación', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Sin procedimiento parametrizado', 68);
INSERT INTO sgd_sbrd_subserierd VALUES (5, 5, 'Certificaciones de no riesgo', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio.Teniendo en cuenta que estos documentos no ofrecen posibilidades investigativas, se debe eliminar el soporte de estos documentos, teniendo en cuenta lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura en el Artículo 2.8.2.2.5 Eliminación de documentos, dejando constancia mediante Inventario y Acta de Eliminación aprobada por el Comité Interno de Archivo.', 69);
INSERT INTO sgd_sbrd_subserierd VALUES (5, 6, 'Certificaciones de Nomenclatura', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Sin procedimiento parametrizado', 70);
INSERT INTO sgd_sbrd_subserierd VALUES (5, 7, 'Certificaciones de Paz y Salvo', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio.Teniendo en cuenta que estos documentos no ofrecen posibilidades investigativas, se debe eliminar el soporte de estos documentos, teniendo en cuenta lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura en el Artículo 2.8.2.2.5 Eliminación de documentos, dejando constancia mediante Inventario y Acta de Eliminación aprobada por el Comité Interno de Archivo.', 71);
INSERT INTO sgd_sbrd_subserierd VALUES (5, 8, 'Certificaciones de Población Especial', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Sin procedimiento parametrizado', 72);
INSERT INTO sgd_sbrd_subserierd VALUES (5, 9, 'Certificaciones de registro en Banco de Proyectos', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio.Teniendo en cuenta que estos documentos no ofrecen posibilidades investigativas, se debe eliminar el soporte de estos documentos, teniendo en cuenta lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura en el Artículo 2.8.2.2.5 Eliminación de documentos, dejando constancia mediante Inventario y Acta de Eliminación aprobada por el Comité Interno de Archivo.', 73);
INSERT INTO sgd_sbrd_subserierd VALUES (5, 10, 'Certificaciones de residencia', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Sin procedimiento parametrizado', 74);
INSERT INTO sgd_sbrd_subserierd VALUES (5, 11, 'Certificaciones de viabiidad del Uso del Suelo', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio.Teniendo en cuenta que estos documentos no ofrecen posibilidades investigativas, se debe eliminar el soporte de estos documentos, teniendo en cuenta lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura en el Artículo 2.8.2.2.5 Eliminación de documentos, dejando constancia mediante Inventario y Acta de Eliminación aprobada por el Comité Interno de Archivo.', 75);
INSERT INTO sgd_sbrd_subserierd VALUES (5, 12, 'Certificaciones Horas Sociales', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Sin procedimiento parametrizado', 76);
INSERT INTO sgd_sbrd_subserierd VALUES (5, 13, 'Certificaciones Laborales', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio.Teniendo en cuenta que estos documentos no ofrecen posibilidades investigativas, se debe eliminar el soporte de estos documentos, teniendo en cuenta lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura en el Artículo 2.8.2.2.5 Eliminación de documentos, dejando constancia mediante Inventario y Acta de Eliminación aprobada por el Comité Interno de Archivo.', 77);
INSERT INTO sgd_sbrd_subserierd VALUES (5, 14, 'Certificaciones del Sisben', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Sin procedimiento parametrizado', 78);
INSERT INTO sgd_sbrd_subserierd VALUES (5, 15, 'Certificacion de Plusvalia', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Sin procedimiento parametrizado', 79);
INSERT INTO sgd_sbrd_subserierd VALUES (5, 16, 'Certificaciones servicio social', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Sin procedimiento parametrizado', 80);
INSERT INTO sgd_sbrd_subserierd VALUES (6, 1, 'Circulares Dispositivas', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Esta subserie Dispositiva se consigna la toma de decisiones, dirigidas a personas o instituciones en aspectos administrativos, jurídicos, económicos y sociales. Será fuente de información, para investigaciones de carácter histórico sobre los desarrollos administrativos de las entidades públicas.', 82);
INSERT INTO sgd_sbrd_subserierd VALUES (6, 2, 'Circulares Informativas', '2020-12-10', '2025-11-25', 2, 2, 'ELIMINACION', 'PAPEL', 'Tenienedo encuenta que la Circular informativa se expide con propósitos internos meramente de carácter administrativo, para informar, regular o establecer aspectos generales, que no están en los reglamentos internos del trabajo.Teniendo en cuenta que estos documentos no ofrecen posibilidades investigativas, se debe eliminar el soporte de estos documentos, teniendo en cuenta lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura en el Artículo 2.8.2.2.5 Eliminación de documentos, dejando constancia mediante Inventario y Acta de Eliminación aprobada por el Comité Interno de Archivo.', 83);
INSERT INTO sgd_sbrd_subserierd VALUES (7, 1, 'Comprobantes de baja de bienes de almacén', '2020-12-10', '2030-11-25', 3, 7, 'ELIMINACION', 'PAPEL', 'Teniendo en cuenta que esta subserie no posee valores para la investigación, debido a que la información se encuentra contenida en otros documentos tales como los inventarios generales y actas expedidas por el comité de inventarios, se debe eliminar el soporte de estos documentos, de acuerdo a lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura en el Artículo 2.8.2.2.5 Eliminación de documentos, dejando constancia mediante Inventario y Acta de Eliminación aprobada por el Comité Interno de Archivo', 85);
INSERT INTO sgd_sbrd_subserierd VALUES (7, 2, 'Comprobantes de egreso de bienes de almacén', '2020-12-10', '2030-11-25', 3, 7, 'ELIMINACION', 'PAPEL', 'Sin procedimiento parametrizado', 86);
INSERT INTO sgd_sbrd_subserierd VALUES (7, 3, 'Comprobantes de ingreso de bienes de almacén', '2020-12-10', '2030-11-25', 3, 7, 'ELIMINACION', 'PAPEL', 'Sin procedimiento parametrizado', 87);
INSERT INTO sgd_sbrd_subserierd VALUES (8, 1, 'Comprobantes contables de Egreso', '2020-12-10', '2030-11-25', 2, 8, 'ELIMINACION', 'PAPEL', '"Esta subserie no posee posibilidades para la investigación, debido a que la información se encuentra consolidada en otras fuentes tales como los Libros principales contables', 88);
INSERT INTO sgd_sbrd_subserierd VALUES (8, 2, 'Comprobantes Contables de Ingreso', '2020-12-10', '2030-11-25', 2, 8, 'ELIMINACION', 'PAPEL', '"Esta subserie no posee posibilidades para la investigación, debido a que la información se encuentra consolidada en otras fuentes tales como los Libros principales contables', 89);
INSERT INTO sgd_sbrd_subserierd VALUES (9, 1, 'Conceptos Jurìdicos', '2020-12-10', '2030-11-25', 2, 8, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'La Serie permanece dos años en el Archivo de Gestión, posteriormente se transfiere al Archivo Central donde se reproduce en Medio Técnico y se conserva por ocho años más, para luego ser transferidas al Archivo Histórico dada la importancia de su contenido', 90);
INSERT INTO sgd_sbrd_subserierd VALUES (9, 2, 'Conceptos Técnicos Agropecuarios', '2020-12-10', '2030-11-25', 2, 8, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'La Serie permanece dos años en el Archivo de Gestión, posteriormente se transfiere al Archivo Central donde se reproduce en Medio Técnico y se conserva por ocho años más, para luego ser transferidas al Archivo Histórico dada la importancia de su contenido', 91);
INSERT INTO sgd_sbrd_subserierd VALUES (9, 3, 'Conceptos Técnicos Ambientales', '2020-12-10', '2030-11-25', 2, 8, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'La Serie permanece dos años en el Archivo de Gestión, posteriormente se transfiere al Archivo Central donde se reproduce en Medio Técnico y se conserva por ocho años más, para luego ser transferidas al Archivo Histórico dada la importancia de su contenido', 92);
INSERT INTO sgd_sbrd_subserierd VALUES (9, 4, 'Conceptos de Normas Urbanísticas', '2020-12-10', '2030-11-25', 2, 8, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'La Serie permanece dos años en el Archivo de Gestión, posteriormente se transfiere al Archivo Central donde se reproduce en Medio Técnico y se conserva por ocho años más, para luego ser transferidas al Archivo Histórico dada la importancia de su contenido', 93);
INSERT INTO sgd_sbrd_subserierd VALUES (10, 1, 'Conciliaciones Bancarias', '2020-12-10', '2030-11-25', 2, 8, 'ELIMINACION', 'PAPEL', '"Esta subserie no posee posibilidades para la investigación, debido a que la información se encuentra consolidada en otras fuentes tales como los Libros principales contables', 95);
INSERT INTO sgd_sbrd_subserierd VALUES (12, 1, 'Contratos de Arrendamiento', '2020-12-10', '2038-11-25', 2, 18, 'SELECCION', 'PAPEL', '"Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, La alcaldía municipal determinara el proceso de selección teniendo en cuenta que este puede realizarse cuantitativa y cualitativamente. La selección cuantitativa se relaciona con la definición de un porcentaje de muestra el cual debe considerar el volumen de producción documental anual', 99);
INSERT INTO sgd_sbrd_subserierd VALUES (12, 2, 'Contratos de Comodato', '2020-12-10', '2038-11-25', 2, 18, 'SELECCION', 'PAPEL', 'Sin procedimiento parametrizado', 100);
INSERT INTO sgd_sbrd_subserierd VALUES (12, 3, 'Contratos de Consultoría', '2020-12-10', '2038-11-25', 2, 18, 'SELECCION', 'PAPEL', 'Sin procedimiento parametrizado', 101);
INSERT INTO sgd_sbrd_subserierd VALUES (12, 4, 'Contratos de Obra', '2020-12-10', '2038-11-25', 2, 18, 'SELECCION', 'PAPEL', 'Sin procedimiento parametrizado', 102);
INSERT INTO sgd_sbrd_subserierd VALUES (12, 5, 'Contratos de Prestación de Servicios', '2020-12-10', '2038-11-25', 2, 18, 'SELECCION', 'PAPEL', 'Sin procedimiento parametrizado', 103);
INSERT INTO sgd_sbrd_subserierd VALUES (12, 6, 'Contratos de Suministros', '2020-12-10', '2038-11-25', 2, 18, 'SELECCION', 'PAPEL', 'Sin procedimiento parametrizado', 104);
INSERT INTO sgd_sbrd_subserierd VALUES (13, 1, 'Convenios de cooperación internacional', '2020-12-10', '2038-11-25', 2, 18, 'SELECCION', 'PAPEL', 'Sin procedimiento parametrizado', 105);
INSERT INTO sgd_sbrd_subserierd VALUES (13, 2, 'Convenios de cooperación nacional', '2020-12-10', '2038-11-25', 2, 18, 'SELECCION', 'PAPEL', 'Sin procedimiento parametrizado', 106);
INSERT INTO sgd_sbrd_subserierd VALUES (13, 3, 'Convenios de organización osociacion', '2020-12-10', '2038-11-25', 2, 18, 'SELECCION', 'PAPEL', 'Sin procedimiento parametrizado', 107);
INSERT INTO sgd_sbrd_subserierd VALUES (13, 4, 'Convenios Interadministrativos', '2020-12-10', '2038-11-25', 2, 18, 'SELECCION', 'PAPEL', 'Sin procedimiento parametrizado', 108);
INSERT INTO sgd_sbrd_subserierd VALUES (13, 5, 'Convenios interinstitucionales', '2020-12-10', '2038-11-25', 2, 18, 'SELECCION', 'PAPEL', 'Sin procedimiento parametrizado', 109);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 1, 'Esquema de Ordenamiento Territorial Vigente', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 182);
INSERT INTO sgd_sbrd_subserierd VALUES (11, 2, 'Consecutivo de Comunicaciones recibidas', '2021-01-14', '2025-01-08', 2, 2, '2', 'Electronico', 'Consecutivo de Comunicaciones recibidas ', 97);
INSERT INTO sgd_sbrd_subserierd VALUES (9, 5, 'Conceptos Locativos', '2020-12-10', '2030-11-25', 2, 8, '', 'PAPEL', 'La Serie permanece dos años en el Archivo de Gestión, posteriormente se transfiere al Archivo Central donde se reproduce en Medio Técnico y se conserva por ocho años más, para luego ser transferidas al Archivo Histórico dada la importancia de su contenido', 94);
INSERT INTO sgd_sbrd_subserierd VALUES (14, 1, 'Declaraciones por Recaudo de Impuesto Aportes y participaciones', '2020-12-10', '2030-11-25', 2, 8, 'SELECCION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, Se selecciona un 10% de lo producido en el periodo administrativo  El proceso de selección será realizado por el Comité Interno de Archivo, el jefe de la dependencia productora y los interesados. La documentación seleccionada, se debe transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. La Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio', 110);
INSERT INTO sgd_sbrd_subserierd VALUES (14, 2, 'Declaraciones por Recaudo de Impuesto de Aviso y Tableros', '2020-12-10', '2030-11-25', 2, 8, 'SELECCION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, Se selecciona un 10% de lo producido en el periodo administrativo  El proceso de selección será realizado por el Comité Interno de Archivo, el jefe de la dependencia productora y los interesados. La documentación seleccionada, se debe transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. La Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio', 111);
INSERT INTO sgd_sbrd_subserierd VALUES (14, 3, 'Declaraciones por Recaudo de Impuesto de Espectáculos Públicos', '2020-12-10', '2030-11-25', 2, 8, 'SELECCION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, Se selecciona un 10% de lo producido en el periodo administrativo  El proceso de selección será realizado por el Comité Interno de Archivo, el jefe de la dependencia productora y los interesados. La documentación seleccionada, se debe transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. La Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio', 112);
INSERT INTO sgd_sbrd_subserierd VALUES (14, 4, 'Declaraciones por Recaudo de Impuesto de Industria y Comercio', '2020-12-10', '2030-11-25', 2, 8, 'SELECCION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, Se selecciona un 10% de lo producido en el periodo administrativo  El proceso de selección será realizado por el Comité Interno de Archivo, el jefe de la dependencia productora y los interesados. La documentación seleccionada, se debe transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. La Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio', 113);
INSERT INTO sgd_sbrd_subserierd VALUES (14, 5, 'Declaraciones por Recaudo de Impuesto de Multas', '2020-12-10', '2030-11-25', 2, 8, 'SELECCION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, Se selecciona un 10% de lo producido en el periodo administrativo  El proceso de selección será realizado por el Comité Interno de Archivo, el jefe de la dependencia productora y los interesados. La documentación seleccionada, se debe transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. La Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio', 114);
INSERT INTO sgd_sbrd_subserierd VALUES (14, 6, 'Declaraciones por Recaudo de Impuesto de Rentas contractuales', '2020-12-10', '2030-11-25', 2, 8, 'SELECCION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, Se selecciona un 10% de lo producido en el periodo administrativo  El proceso de selección será realizado por el Comité Interno de Archivo, el jefe de la dependencia productora y los interesados. La documentación seleccionada, se debe transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. La Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio', 115);
INSERT INTO sgd_sbrd_subserierd VALUES (14, 7, 'Declaraciones por Recaudo de Impuesto de Sobretasa a la Gasolina', '2020-12-10', '2030-11-25', 2, 8, 'SELECCION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, Se selecciona un 10% de lo producido en el periodo administrativo  El proceso de selección será realizado por el Comité Interno de Archivo, el jefe de la dependencia productora y los interesados. La documentación seleccionada, se debe transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. La Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio', 116);
INSERT INTO sgd_sbrd_subserierd VALUES (14, 8, 'Declaraciones por Recaudo de Impuesto de Tasas', '2020-12-10', '2030-11-25', 2, 8, 'SELECCION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, Se selecciona un 10% de lo producido en el periodo administrativo  El proceso de selección será realizado por el Comité Interno de Archivo, el jefe de la dependencia productora y los interesados. La documentación seleccionada, se debe transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. La Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio', 117);
INSERT INTO sgd_sbrd_subserierd VALUES (14, 9, 'Declaraciones por Recaudo de Impuesto Predial', '2020-12-10', '2030-11-25', 2, 8, 'SELECCION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, Se selecciona un 10% de lo producido en el periodo administrativo  El proceso de selección será realizado por el Comité Interno de Archivo, el jefe de la dependencia productora y los interesados. La documentación seleccionada, se debe transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. La Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio', 118);
INSERT INTO sgd_sbrd_subserierd VALUES (14, 10, 'Declaraciones por Recaudo de Impuesto Rifas Municipales', '2020-12-10', '2030-11-25', 2, 8, 'SELECCION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, Se selecciona un 10% de lo producido en el periodo administrativo  El proceso de selección será realizado por el Comité Interno de Archivo, el jefe de la dependencia productora y los interesados. La documentación seleccionada, se debe transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. La Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio', 119);
INSERT INTO sgd_sbrd_subserierd VALUES (15, 1, 'Decretos Municipales', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 1000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 120);
INSERT INTO sgd_sbrd_subserierd VALUES (16, 1, 'Peticiones, Quejas, Reclamos y Sugerencias', '2020-12-10', '2040-12-31', 2, 8, 'M.TECNOLOGICO / SELECCION', 'PAPEL / ELECTRONICO', 'Conservar dos años en el archivo de gestión, transferir al archivo central y conservar ocho años, transcurrido el tiempo de retención seleccionar una muestra aleatoria del 10% por cada año de producción documental, de los derechos de petición que se relacionen con temas misionales de la entidad.', 121);
INSERT INTO sgd_sbrd_subserierd VALUES (17, 1, 'Fichas de Caracterizacion Socioeconomica - Sisben', '2020-12-10', '2040-12-31', 2, 1, 'ELIMINACION', 'PAPEL / ELECTRONICO', 'Una vez cumplido el tiempo de retecnion por ser documentos con valor administrativo, se elimina completamente una vez transcurrió el tiempo de retención en el Archivo Central.', 122);
INSERT INTO sgd_sbrd_subserierd VALUES (17, 2, 'Retiros de Ficha', '2020-12-10', '2040-12-31', 2, 1, 'ELIMINACION', 'PAPEL / ELECTRONICO', 'Una vez cumplido el tiempo de retecnion por ser documentos con valor administrativo, se elimina completamente una vez transcurrió el tiempo de retención en el Archivo Central.', 123);
INSERT INTO sgd_sbrd_subserierd VALUES (17, 3, 'Retiro de Personas', '2020-12-10', '2040-12-31', 2, 1, 'ELIMINACION', 'PAPEL / ELECTRONICO', 'Una vez cumplido el tiempo de retecnion por ser documentos con valor administrativo, se elimina completamente una vez transcurrió el tiempo de retención en el Archivo Central.', 124);
INSERT INTO sgd_sbrd_subserierd VALUES (17, 4, 'Inclusión de Persona', '2020-12-10', '2040-12-31', 2, 1, 'ELIMINACION', 'PAPEL / ELECTRONICO', 'Una vez cumplido el tiempo de retecnion por ser documentos con valor administrativo, se elimina completamente una vez transcurrió el tiempo de retención en el Archivo Central.', 125);
INSERT INTO sgd_sbrd_subserierd VALUES (17, 5, 'Modificación de Ficha', '2020-12-10', '2040-12-31', 2, 1, 'ELIMINACION', 'PAPEL / ELECTRONICO', 'Una vez cumplido el tiempo de retecnion por ser documentos con valor administrativo, se elimina completamente una vez transcurrió el tiempo de retención en el Archivo Central.', 126);
INSERT INTO sgd_sbrd_subserierd VALUES (18, 1, 'Historias Laborales', '2020-12-10', '2040-12-31', 10, 90, 'M.TECNOLOGICO / SELECCION', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, Se selecciona un 10% de lo producido en el periodo administrativo  El proceso de selección será realizado por el Comité Interno de Archivo, el jefe de la dependencia productora y los interesados. La documentación seleccionada, se debe transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. La Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio', 132);
INSERT INTO sgd_sbrd_subserierd VALUES (18, 2, 'Historia Equipos de Computo', '2020-12-10', '2040-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias.', 133);
INSERT INTO sgd_sbrd_subserierd VALUES (18, 3, 'Historia Herramientas Agrícolas', '2020-12-10', '2040-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias.', 134);
INSERT INTO sgd_sbrd_subserierd VALUES (18, 4, 'Historias de vehículos y maquinaria', '2020-12-10', '2040-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias.', 135);
INSERT INTO sgd_sbrd_subserierd VALUES (18, 5, 'Historial de bienes e inmuebles', '2020-12-10', '2040-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias.', 136);
INSERT INTO sgd_sbrd_subserierd VALUES (19, 1, 'Informes a Entes de Control y vigilancia', '2020-12-10', '2025-11-25', 2, 3, 'SELECCION', 'PAPEL / ELECTRONICO', 'La subserie documental se fundamenta en la Ley 951 de 2005 y en la Resolución orgánica 6289 del 8 de marzo de 2011 expedida por la Contraloria General de la Nación Esta serie se selecciona después de pasado su tiempo de retención en el Archivo Central, ya que adquiere valores secundarios para la Alcaldía, se realiza a través de una muestra representativa, según manual de selección avalada por el comité de Gestión.', 137);
INSERT INTO sgd_sbrd_subserierd VALUES (19, 2, 'Informes de Auditorías de Control Interno y Calidad', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL / ELECTRONICO', 'Una vez cumplido el tiempo de retecnion por ser documentos con valor administrativo, se elimina completamente una vez transcurrió el tiempo de retención en el Archivo Central.', 138);
INSERT INTO sgd_sbrd_subserierd VALUES (19, 3, 'Informes de Auditorías Externas', '2020-12-10', '2025-11-25', 2, 3, 'SELECCION', 'PAPEL / ELECTRONICO', 'La subserie documental se fundamenta en la Ley 951 de 2005 y en la Resolución orgánica 6289 del 8 de marzo de 2011 expedida por la Contraloria General de la Nación Esta serie se selecciona después de pasado su tiempo de retención en el Archivo Central, ya que adquiere valores secundarios para la Alcaldía, se realiza a través de una muestra representativa, según manual de selección avalada por el comité de Gestión.', 139);
INSERT INTO sgd_sbrd_subserierd VALUES (19, 4, 'Informes de ejecución presupuestal', '2020-12-10', '2025-11-25', 4, 16, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL / ELECTRONICO', 'Una vez cumplido el tiempo de retecncion en el archivo de gestion 3 años, posteriormente 17 años en el archivo central, transcurrido el tiempo de retención eliminar.', 140);
INSERT INTO sgd_sbrd_subserierd VALUES (19, 5, 'Informes de Estados Financieros', '2020-12-10', '2025-11-25', 4, 16, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL / ELECTRONICO', 'Una vez cumplido el tiempo de retecncion en el archivo de gestion 3 años, posteriormente 17 años en el archivo central, transcurrido el tiempo de retención eliminar.', 141);
INSERT INTO sgd_sbrd_subserierd VALUES (19, 6, 'Informes de Gestión Institucional', '2020-12-10', '2030-11-25', 2, 18, 'ELIMINACION', 'PAPEL / ELECTRONICO', 'La subserie documental se fundamenta en la Ley 951 de 2005 y en la circular 11 de 2006 expedida por la Contraloria General de la Nación. Una vez cumplido el tiempo de retencion en el archivo central, la documentacion debera ser eliminada, ya que ha persido sus valores primarios y no posee valores secundarios.', 142);
INSERT INTO sgd_sbrd_subserierd VALUES (20, 1, 'Agenda de compromisos', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Una vez cumplido el tiempo de retencion en el archivo de gestion 2 años, posteriormente 3 años en el archivo central, transcurrido el tiempo de retención eliminar.', 143);
INSERT INTO sgd_sbrd_subserierd VALUES (20, 2, 'Registro de atención al usuario', '2020-12-10', '2024-11-25', 4, 1, 'ELIMINACION', 'PAPEL', 'Una vez cumplido el tiempo de retencion en el archivo de gestion 4 años, transcurrido el tiempo de retención eliminar.', 144);
INSERT INTO sgd_sbrd_subserierd VALUES (20, 3, 'Planillas de Atención al Usuario', '2020-12-10', '2024-11-25', 4, 1, 'ELIMINACION', 'PAPEL / ELECTRONICO', 'Una vez cumplido el tiempo de retencion en el archivo de gestion 4 años, transcurrido el tiempo de retención eliminar.', 147);
INSERT INTO sgd_sbrd_subserierd VALUES (20, 5, 'Libro de Control de Citaciones', '2020-12-10', '2023-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Una vez cumplido el tiempo de retencion en el archivo de gestion 2 años, posteriormente 3 años en el archivo central, transcurrido el tiempo de retención eliminar.', 149);
INSERT INTO sgd_sbrd_subserierd VALUES (20, 6, 'Libros de Citaciones', '2020-12-10', '2023-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Una vez cumplido el tiempo de retencion en el archivo de gestion 2 años, posteriormente 3 años en el archivo central, transcurrido el tiempo de retención eliminar.', 150);
INSERT INTO sgd_sbrd_subserierd VALUES (20, 7, 'Registro de comunicaciones oficiales (VENTANILLA UNICA DIGITAL)', '2020-12-10', '2023-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Una vez cumplido el tiempo de retencion en el archivo de gestion 2 años, posteriormente 3 años en el archivo central, transcurrido el tiempo de retención eliminar.', 151);
INSERT INTO sgd_sbrd_subserierd VALUES (20, 8, 'Registro de préstamo documental', '2020-12-10', '2023-11-25', 2, 3, 'ELIMINACION', 'PAPEL', 'Una vez cumplido el tiempo de retencion en el archivo de gestion 2 años, posteriormente 3 años en el archivo central, transcurrido el tiempo de retención eliminar.', 154);
INSERT INTO sgd_sbrd_subserierd VALUES (20, 9, 'Registro de transferencias documentales', '2020-12-10', '2025-11-25', 2, 5, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL / ELECTRONICO', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total.', 155);
INSERT INTO sgd_sbrd_subserierd VALUES (20, 10, 'Tablas de retención documental', '2020-12-10', '2025-11-25', 2, 5, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL / ELECTRONICO', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total.', 157);
INSERT INTO sgd_sbrd_subserierd VALUES (20, 11, 'Tablas de valoración documental', '2020-12-10', '2025-11-25', 2, 5, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL / ELECTRONICO', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total.', 158);
INSERT INTO sgd_sbrd_subserierd VALUES (20, 12, 'Títulos de Propiedad', '2020-12-10', '2025-11-25', 2, 5, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL / ELECTRONICO', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total.', 159);
INSERT INTO sgd_sbrd_subserierd VALUES (21, 1, 'Inventarios de semillas y material vegetal', '2020-12-10', '2025-11-25', 2, 3, 'ELIMINACION', 'PAPEL / ELECTRONICO', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio. Teniendo en cuenta que estos documentos no ofrecen posibilidades investigativas, se debe eliminar el soporte de estos documentos, teniendo en cuenta lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura en el Artículo 2.8.2.2.5 Eliminación de documentos, dejando constancia mediante Inventario y Acta de Eliminación aprobada por el Comité Interno de Archivo.', 162);
INSERT INTO sgd_sbrd_subserierd VALUES (21, 2, 'Inventarios documentales', '2020-12-10', '2025-11-25', 2, 3, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL / ELECTRONICO', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total.', 163);
INSERT INTO sgd_sbrd_subserierd VALUES (21, 3, 'Inventarios generales de bienes muebles e inmuebles', '2020-12-10', '2025-11-25', 2, 3, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL / ELECTRONICO', 'Subserie que posee valor probatorio y responsabilidad fiscal, ya que refleja y consolida los activos fijos y los bienes de la entidad. Una vez el Bien Mueble e Inmueble deje de hacer parte del inventario de bienes de la entidad, bien sea por baja o enajenación y cumplido el tiempo de retención se recomienda conservar totalmente para fines de auditorias de entes de control. Ley 42 del 26 de enero 1993 ” sobre la organización del Sistema de Control Fiscal y Financiero y los organismos que lo ejercen”', 164);
INSERT INTO sgd_sbrd_subserierd VALUES (21, 4, 'Inventarios individuales de bienes devolutivos', '2020-12-10', '2024-11-25', 4, 1, 'ELIMINACION', 'PAPEL / ELECTRONICO', 'Subserie que tiene valor administrativo, contable, legal einvestigativo, finalizado el período de retención no desarrolla valores secundarios y se procede a la eliminación según procedimiento previsto en Acuerdo 04 de 2013 (art. 15)', 165);
INSERT INTO sgd_sbrd_subserierd VALUES (22, 1, 'Libro Auxiliar de Bancos', '2020-12-10', '2030-11-25', 2, 8, 'ELIMINACION', 'PAPEL', 'Debido a que la información del Libro Auxiliar se halla consolidada en los Libros Mayor y Balances, y en los Estados Financieros a 31 de diciembre de cada vigencia anual, pierde sus valores investigativos. Por lo tanto, una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se debe eliminar el soporte de estos documentos, teniendo en cuenta lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura en el Artículo 2.8.2.2.5 Eliminación de documentos, dejando constancia mediante Inventario y Acta de Eliminación aprobada por el Comité Interno de Archivo.', 166);
INSERT INTO sgd_sbrd_subserierd VALUES (22, 2, 'Libro Auxiliar de Contabilidad', '2020-12-10', '2030-11-25', 2, 8, 'ELIMINACION', 'PAPEL', 'Sin procedimiento parametrizado', 167);
INSERT INTO sgd_sbrd_subserierd VALUES (22, 3, 'Libro Comprobante Diario', '2020-12-10', '2030-11-25', 2, 8, 'ELIMINACION', 'PAPEL', 'Sin procedimiento parametrizado', 168);
INSERT INTO sgd_sbrd_subserierd VALUES (22, 4, 'Libro de Presupuesto de Ingresos y Gastos', '2020-12-10', '2030-11-25', 2, 8, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'El Libro de presupuestos de ingreso y gastos son una fuente de información para la investigación en estudios económicos de la administración municipal sobre el manejo, distribución y ejecución de los recursos. Sirve para hacer comparativos de la administración de cada alcalde. Por estas razones, son de conservación permanente,  los documentos originales que posean valoreshistóricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio  (Ley 594 de 2000, artículo 19, parágrafo 2).Por lo anterior, una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias.  Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 169);
INSERT INTO sgd_sbrd_subserierd VALUES (22, 5, 'Libro Mayor y Balances', '2020-12-10', '2030-11-25', 2, 8, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'El Libro Mayor y Balances es fuente de información para la investigación en estudios económicos de la administración municipal sobre el manejo, distribución y ejecución de los recursos. Sirve para hacer comparativos de la administración de cada alcalde. Por estas razones, son de conservación permanente,  los documentos originales que posean valoreshistóricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio  (Ley 594 de 2000, artículo 19, parágrafo 2). Por lo anterior, una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias.  Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 170);
INSERT INTO sgd_sbrd_subserierd VALUES (23, 1, 'Licencias de Construcción en Modalidades de Obra Nueva, Ampliación, Adecuación, Reconocimiento, Modificación, Urbanismo, Restauración, Reforzamiento Estructural, Demolición, Revalidación Reconstrucción,', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias.', 171);
INSERT INTO sgd_sbrd_subserierd VALUES (23, 2, 'Licencias de Intervenciones y ocupaciones  del espacio Público', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias.', 172);
INSERT INTO sgd_sbrd_subserierd VALUES (23, 3, 'Licencias de Parcelación', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias.', 173);
INSERT INTO sgd_sbrd_subserierd VALUES (23, 4, 'Licencias de Subdivisión', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias.', 174);
INSERT INTO sgd_sbrd_subserierd VALUES (23, 5, 'Licencias de Transporte de Semovientes', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias.', 175);
INSERT INTO sgd_sbrd_subserierd VALUES (23, 6, 'Licencias Urbanísticas', '2020-12-10', '2038-11-25', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias.', 176);
INSERT INTO sgd_sbrd_subserierd VALUES (24, 1, 'Manuales de funciones por dependencia', '2020-12-10', '2025-11-25', 2, 3, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL / ELECTRONICO', 'Cumplido el tiempo de retención, se procede a conservar la documentación en medio tecnologico, debido a que la información procedimental debe ser conservada por constribuir a la historia organizacional.', 180);
INSERT INTO sgd_sbrd_subserierd VALUES (24, 2, 'Manuales específicos de funciones y requisitos', '2020-12-10', '2025-11-25', 2, 3, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL / ELECTRONICO', 'Cumplido el tiempo de retención, se procede a conservar la documentación en medio tecnologico, debido a que la información procedimental debe ser conservada por constribuir a la historia organizacional.', 181);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 2, 'Plan Agropecuario Municipal', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 183);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 3, 'Plan Anual de Adquisiciones', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 184);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 4, 'Plan de Accion', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 185);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 5, 'Plan de Asistencia Técnica', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 186);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 6, 'Plan de Bienestar Social y Estimulo Laboral', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 187);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 7, 'Plan de Convivencia social y salud mental', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 188);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 8, 'Plan de Dotación y Fortalecimiento de la Colección de la Biblioteca Municipal', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 189);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 9, 'Plan de Educación Municipal', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 190);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 10, 'Plan de Incentivos', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 191);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 11, 'Plan de Inducción y Reinducción', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 192);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 12, 'Plan de Movilidad', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 193);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 13, 'Plan de Ordenamiento Territorial - POT', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 194);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 14, 'Plan de Salud Publica de Intervenciones Colectivas', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 195);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 15, 'Plan de Seguridad alimentaria y nutricional Actividades del PIC Municipal', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 196);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 16, 'Plan de Seguridad y Privacidad de la Información', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 197);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 17, 'Plan de Señalización y Demarcación', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 198);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 18, 'Plan de Turismo Municipal', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 199);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 19, 'Plan de Vida Saludable y enfermedades transmisibles', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 200);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 20, 'Plan de Vivienda', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 201);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 21, 'Plan Estratégico de Seguridad Vial', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 202);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 22, 'Plan Estratégico de Tecnologías de la Información y las Comunicaciones PETI', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 203);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 23, 'Plan Indicativo', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 204);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 24, '"Plan Institucional de Gestión Ambiental ""PIGA""."', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 205);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 25, 'Plan Institucionales de Capacitaciones - PIC', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 206);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 26, 'Plan Local de Salud', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 207);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 27, 'Plan Local de Seguridad Vial', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 208);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 28, 'Plan Operativo Anual de inversión Municipal POAIM', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 209);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 29, 'Plan Operativo Anual de Salud Pública', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 210);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 30, 'Plan Vacaciones Personal', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 211);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 31, 'Planes de Desarrollo Municipal', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 212);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 32, 'Planes de Mejoramiento', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 213);
INSERT INTO sgd_sbrd_subserierd VALUES (25, 33, 'Planes municipales para la prevención y atención de emergencias y desastres', '2020-12-10', '2030-11-25', 2, 8, 'CONSERVACION TOTAL', 'PAPEL', 'Cumplido 2 años en el Archivo de Gestión se transfiere al Archivo Central para un tiempo de retención de 8 años, para su conservación total por tratarse de documentos que permiten garantizar la trazabilidad en la implementación de planes, programas y proyectos.', 214);
INSERT INTO sgd_sbrd_subserierd VALUES (26, 1, 'Presupuestos -Ejecuciones', '2020-12-10', '2025-11-25', 2, 5, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Serie documental de vital importancia para el logro de los objetivos del plan de gobierno de la Alcaldia Municipal de Tenjo, su conservación será permanente.', 215);
INSERT INTO sgd_sbrd_subserierd VALUES (27, 1, 'Procesos Administrativos de Restablecimiento de Derechos', '2020-12-10', '2025-11-25', 2, 5, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Serie documental de vital importancia para el logro de los objetivos del plan de gobierno de la Alcaldia Municipal de Tenjo, su conservación será permanente.', 216);
INSERT INTO sgd_sbrd_subserierd VALUES (27, 2, 'Procesos de Reconocimiento Voluntario de Paternidad', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 217);
INSERT INTO sgd_sbrd_subserierd VALUES (27, 3, 'Procesos de Violencia intrafamiliar', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 218);
INSERT INTO sgd_sbrd_subserierd VALUES (28, 1, 'Procesos calibracion de surtidores de combustibles', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 219);
INSERT INTO sgd_sbrd_subserierd VALUES (28, 2, 'Contravenciones en general', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 220);
INSERT INTO sgd_sbrd_subserierd VALUES (28, 3, 'Procesos de control de establecimientos de comercio', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 221);
INSERT INTO sgd_sbrd_subserierd VALUES (28, 4, 'Procesos de control de Pesos y Medidas', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 222);
INSERT INTO sgd_sbrd_subserierd VALUES (28, 5, 'Procesos de Despachos comisorios', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 223);
INSERT INTO sgd_sbrd_subserierd VALUES (28, 6, 'Procesos Querellas Policivas', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 224);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 1, 'Programa Primera Infancia', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 225);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 2, 'Programas Anual de Auditoria', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 226);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 3, 'Programa Adulto Mayor', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 227);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 4, 'Programa Alianzas con Entidades Educativas para la formación.', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 228);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 5, 'Programa Alianzas con Entidades Educativas y/o formación Empresarial', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 229);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 6, 'Programa Alimentación Escolar PAE', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 230);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 7, 'Programa Asociación de Artesanos', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 231);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 8, 'Programa Colombia Mayor', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 232);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 9, 'Programa Computadores para Educar', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 233);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 10, 'Programa de Apoyo a los Artesanos', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 234);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 11, 'Programa de apoyo ASOFAMAS', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 235);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 12, 'Programa de Aseguramiento Régimen Subsidiado', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 236);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 13, 'Programa de Atención Integral a la población Victima del Conflicto Armado', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 237);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 14, 'Programa de bienestar del Talento Humano', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 238);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 15, 'Programa de Discapacidad', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 239);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 16, 'Programa de Empleabilidad', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 240);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 17, 'Programa de Esterilización Canina y Felina', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 241);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 18, 'Programa de gestión de calidad', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 242);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 19, 'Programa de Gestión Documental', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 243);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 20, 'Programa de Inducción y Re inducción', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 244);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 21, 'Programa de Juveniles', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 245);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 22, 'Programa de Registro de Notificaciones semanales de Violencia Intrafamiliar,', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 246);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 23, 'Programa de Seguimiento a convenios centro de protección al Adulto Mayor', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 247);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 24, 'Programa de Urgencias Veterinarias', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 248);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 25, 'Programa de Vivienda de Interés Social y/o mejoramiento de vivienda.', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 249);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 26, 'Programa Estudiantes beneficiados en transporte escolar planillas Rutas', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 250);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 27, 'Programa Ferias Artesanales y Empresariales', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 251);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 28, 'Programa Fondo de educación superior subsidio matricula.', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 252);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 29, 'Programa Fortalecimiento y emprendimiento empresarial', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 253);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 30, 'Programa Nutricional Gobernación', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 254);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 31, 'Programa Nutricional ICBF', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 255);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 32, 'Programas de Infraestructura', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 256);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 33, 'Programa subsidio de Transporte Universitario Beneficiarios y no beneficiarios', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 257);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 34, 'Programa subsidio matricula no admitidos (Fondo de educación superior)', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 258);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 35, 'Programas anuales de caja (PAC)', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 259);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 36, 'Programas de asistencia técnica agrícola', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 260);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 37, 'Programas de asistencia técnica pecuaria', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 261);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 38, 'Programas de Capacitación', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 262);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 39, 'Programas de Equidad y Género', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 263);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 40, 'Programas de Familias en Acción', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 264);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 41, 'Programas de Perfil Epidemiológico - ASIS', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 265);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 42, 'Programas de Prevención de Violencia Intrafamiliar, abuso sexual y maltrato', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 266);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 43, 'Programas de promoción y prevención', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 267);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 44, 'Programas de Salud Publica', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 268);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 45, 'Programas de Transporte escolar', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 269);
INSERT INTO sgd_sbrd_subserierd VALUES (29, 46, 'Programas de vigilancia epidemiológica de la salud de los trabajadores', '2020-12-10', '2023-11-25', 2, 3, 'CONSERVACION TOTAL', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 2000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 270);
INSERT INTO sgd_sbrd_subserierd VALUES (30, 1, 'Banco de Proyectos', '2020-12-10', '2040-12-31', 2, 18, 'CONSERVACION TOTAL', 'PAPEL', '"Debido a que la serie ofrece posibilidades investigativas en diversos ámbitos de las ciencias humanas, se debe seleccionar un porcentaje para conservación permanente sobre aquellos Proyectos de Acuerdo en temas relacionados con Programas de Desarrollo de alto impacto social, en infraestructura, educación, cultura, salud, entre otros, para cada administración de Gobierno.  Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio. La alcaldía municipal determinara el proceso de selección teniendo en cuenta que este puede realizarse cuantitativa y cualitativamente. La selección cuantitativa se relaciona con la definición de un porcentaje de muestra el cual debe considerar el volumen de producción documental anual', 271);
INSERT INTO sgd_sbrd_subserierd VALUES (30, 2, 'Proyecto de compra de predios', '2020-12-10', '2040-12-31', 2, 18, 'CONSERVACION TOTAL', 'PAPEL', '"Debido a que la serie ofrece posibilidades investigativas en diversos ámbitos de las ciencias humanas, se debe seleccionar un porcentaje para conservación permanente sobre aquellos Proyectos de Acuerdo en temas relacionados con Programas de Desarrollo de alto impacto social, en infraestructura, educación, cultura, salud, entre otros, para cada administración de Gobierno.  Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio. La alcaldía municipal determinara el proceso de selección teniendo en cuenta que este puede realizarse cuantitativa y cualitativamente. La selección cuantitativa se relaciona con la definición de un porcentaje de muestra el cual debe considerar el volumen de producción documental anual', 272);
INSERT INTO sgd_sbrd_subserierd VALUES (30, 3, 'Proyecto de Inversión', '2020-12-10', '2040-12-31', 2, 18, 'CONSERVACION TOTAL', 'PAPEL', '"Debido a que la serie ofrece posibilidades investigativas en diversos ámbitos de las ciencias humanas, se debe seleccionar un porcentaje para conservación permanente sobre aquellos Proyectos de Acuerdo en temas relacionados con Programas de Desarrollo de alto impacto social, en infraestructura, educación, cultura, salud, entre otros, para cada administración de Gobierno.  Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio. La alcaldía municipal determinara el proceso de selección teniendo en cuenta que este puede realizarse cuantitativa y cualitativamente. La selección cuantitativa se relaciona con la definición de un porcentaje de muestra el cual debe considerar el volumen de producción documental anual', 273);
INSERT INTO sgd_sbrd_subserierd VALUES (30, 4, 'Proyectos de Acuerdo Municipal', '2020-12-10', '2040-12-31', 2, 18, 'CONSERVACION TOTAL', 'PAPEL', '"Debido a que la serie ofrece posibilidades investigativas en diversos ámbitos de las ciencias humanas, se debe seleccionar un porcentaje para conservación permanente sobre aquellos Proyectos de Acuerdo en temas relacionados con Programas de Desarrollo de alto impacto social, en infraestructura, educación, cultura, salud, entre otros, para cada administración de Gobierno.  Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio. La alcaldía municipal determinara el proceso de selección teniendo en cuenta que este puede realizarse cuantitativa y cualitativamente. La selección cuantitativa se relaciona con la definición de un porcentaje de muestra el cual debe considerar el volumen de producción documental anual', 274);
INSERT INTO sgd_sbrd_subserierd VALUES (30, 5, 'Proyectos de presupuesto', '2020-12-10', '2040-12-31', 2, 18, 'CONSERVACION TOTAL', 'PAPEL', '"Debido a que la serie ofrece posibilidades investigativas en diversos ámbitos de las ciencias humanas, se debe seleccionar un porcentaje para conservación permanente sobre aquellos Proyectos de Acuerdo en temas relacionados con Programas de Desarrollo de alto impacto social, en infraestructura, educación, cultura, salud, entre otros, para cada administración de Gobierno.  Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio. La alcaldía municipal determinara el proceso de selección teniendo en cuenta que este puede realizarse cuantitativa y cualitativamente. La selección cuantitativa se relaciona con la definición de un porcentaje de muestra el cual debe considerar el volumen de producción documental anual', 275);
INSERT INTO sgd_sbrd_subserierd VALUES (31, 1, 'Resoluciones Municipales', '2020-12-10', '2040-12-31', 2, 18, 'C.TOTAL / M.TECNOLOGICO', 'PAPEL', 'Una vez la Subserie cumpla los tiempos de retención contados a partir del cierre del expediente o trámite que le dio inicio, se deben transferir al Archivo Histórico para su conservación total, de acuerdo con lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura, en su Capítulo I, Artículo 2.8.2.1.5. De los Archivos Generales Territoriales y el Capítulo IX, Artículo 2.8.2.9.1 Transferencias secundarias. Además, la Ley 594 de 1000, artículo 19, parágrafo 2.  Los documentos originales que posean valores históricos no podrán ser destruidos, aun cuando hayan sido reproducidos y/o almacenados mediante cualquier medio .', 276);
INSERT INTO sgd_sbrd_subserierd VALUES (32, 1, 'Expediente Terapéutico Discapacidad', '2020-12-10', '2030-11-25', 2, 8, 'SELECCION', 'PAPEL', 'Cumplido en tiemp de retención, se procede a seleccionar un 10% de la documentación con el fin de dar testimonio de los programas y acciones adelantadas a nivel territorial para esta poblacion. Decreto 2082 de 1996.', 277);
INSERT INTO sgd_sbrd_subserierd VALUES (32, 2, 'Expediente Terapéutico Barreras de Aprendizaje', '2020-12-10', '2030-11-25', 2, 8, 'SELECCION', 'PAPEL', 'Cumplido en tiemp de retención, se procede a seleccionar un 10% de la documentación con el fin de dar testimonio de los programas y acciones adelantadas a nivel territorial para esta poblacion. Decreto 2082 de 1996.', 278);
INSERT INTO sgd_sbrd_subserierd VALUES (11, 1, 'Consecutivo de Comunicaciones enviadas', '2021-01-14', '2025-01-08', 2, 2, '2', 'Electronico', 'Copia de las comunicaciones oficiales enviadas que conforman un registro consecutivo en razón del número de radicación y se administran en la unidad de correspondencia o la que haga sus veces. Artículo 11, Acuerdo 060 de 2001; se debe eliminar el soporte de estos documentos, de acuerdo a lo establecido en el Decreto 1080 de 2015 del Ministerio de Cultura en el Artículo 2.8.2.2.5 Eliminación de documentos, dejando constancia mediante Inventario y Acta de Eliminación aprobada por el Comité Interno de Archivo', 96);
INSERT INTO sgd_sbrd_subserierd VALUES (11, 3, 'Consecutivo de Comunicaciones internas', '2021-01-14', '2025-01-08', 2, 2, '1', 'ELECTRONICO', '', 279);

--
-- Data for Name: sgd_sexp_secexpedientes; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_sexp_secexpedientes VALUES ('20219981110000001E', 11, 1, 1, '998', '1234567890', '2021-02-23', 0, 2021, '1234567890', 'COMUNICACIONES (998)', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0);
INSERT INTO sgd_sexp_secexpedientes VALUES ('20219981110000002E', 11, 1, 2, '998', '1234567890', '2021-02-23', 0, 2021, '1234567890', 'COMUNICACIONES DOS (998)', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0);
INSERT INTO sgd_sexp_secexpedientes VALUES ('20219981120000003E', 11, 2, 3, '998', '1234567890', '2021-03-31', 0, 2021, '1234567890', 'skinatech (998)', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0);
INSERT INTO sgd_sexp_secexpedientes VALUES ('20219981120000004E', 11, 2, 4, '998', '1234567890', '2021-04-13', 0, 2021, '1234567890', 'INFORMATIVAS (998)', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0);

--
-- Data for Name: sgd_srd_seriesrd; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_srd_seriesrd VALUES (1, 'ACCIONES CONSTITUCIONALES', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (2, 'ACTAS', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (3, 'ADMINISTRACION DE PERSONAL', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (4, 'AUTORIZACIONES', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (5, 'CERTIFICACIONES', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (6, 'CIRCULARES', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (7, 'COMPROBANTES DE ALMACEN', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (8, 'COMPROBANTES DE CONTABILIDAD', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (9, 'CONCEPTOS', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (10, 'CONCILIACIONES BANCARIAS', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (12, 'CONTRATOS', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (13, 'CONVENIOS', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (14, 'DECLARACIONES POR RECAUDO DE IMPUESTOS MUNICIPALES', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (15, 'DECRETOS MUNICIPALES', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (16, 'DERECHOS DE PETICIÓN', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (17, 'FICHAS', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (18, 'HISTORIAL', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (19, 'INFORMES', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (20, 'INSTRUMENTOS DE DESCRIPCION Y CONSULTA', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (21, 'INVENTARIOS', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (22, 'LIBROS CONTABLES', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (23, 'LICENCIAS', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (24, 'MANUALES', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (25, 'PLANES', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (26, 'PRESUPUESTOS', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (27, 'PROCESOS', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (28, 'PROCESOS POLICIVOS', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (29, 'PROGRAMAS', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (30, 'PROYECTOS', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (31, 'RESOLUCIONES MUNICIPALES', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (32, 'UNIDAD DE ATENCION INTEGRAL UAID', '2020-12-10', '2550-12-31');
INSERT INTO sgd_srd_seriesrd VALUES (11, 'COMUNICACIONES OFICIALES', '2021-01-04', '2026-01-21');

--
-- Data for Name: sgd_tar_tarifas; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_tar_tarifas VALUES (4, NULL, 1, 866, 866, 0, 1, 0, NULL);
INSERT INTO sgd_tar_tarifas VALUES (5, NULL, 1, 1337, 1337, 0, 1, 0, NULL);
INSERT INTO sgd_tar_tarifas VALUES (8, NULL, 1, 3412, 3412, 0, 1, 0, NULL);
INSERT INTO sgd_tar_tarifas VALUES (7, NULL, 1, 14259, 14259, 0, 1, 0, NULL);
INSERT INTO sgd_tar_tarifas VALUES (6, NULL, 1, 10694, 10694, 0, 1, 0, NULL);
INSERT INTO sgd_tar_tarifas VALUES (3, NULL, 1, 59, 59, 0, 1, 0, NULL);
INSERT INTO sgd_tar_tarifas VALUES (1, NULL, 1, 214, 214, 0, 1, 0, NULL);
INSERT INTO sgd_tar_tarifas VALUES (2, NULL, 1, 109, 109, 0, 1, 0, NULL);
INSERT INTO sgd_tar_tarifas VALUES (9, NULL, 1, 1, 1, 0, 1, 0, NULL);

--
-- Data for Name: sgd_tidm_tidocmasiva; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_tidm_tidocmasiva VALUES (1, 'PLANTILLA');
INSERT INTO sgd_tidm_tidocmasiva VALUES (2, 'CSV');

--
-- Data for Name: sgd_tip3_tipotercero; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_tip3_tipotercero VALUES (1, NULL, NULL, NULL, NULL, 0, 0, 1);

--
-- Data for Name: sgd_tpr_tpdcumento; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_tpr_tpdcumento VALUES (29, 'Actas de Justicia Transicional', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (111, 'Certificaciones de devolución', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (112, 'Certificaciones de estudio', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (499, 'Felicitaciones', 0, NULL, NULL, '1', 0, 1, 1, NULL, 1, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (18, 'Acta de terminación', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (113, 'Certificaciones de estudios académicos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (114, 'Certificaciones de experiencia de trabajo', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (501, 'respuesta', 45, NULL, NULL, '0', 1, 0, 1, NULL, 0, NULL, 0);
INSERT INTO sgd_tpr_tpdcumento VALUES (115, 'Certificaciones De Uso Del Suelo', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (116, 'Certificaciones De Viabilidad Del Uso Del Suelo', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (117, 'Certificaciones Demarcaciones Del Inmueble', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (118, 'Certificado de afiliación a la ARL', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (92, 'Avisos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (120, 'Certificado de antecedentes fiscales', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (121, 'Certificado de antecedentes judiciales', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (122, 'Certificado de aportes a parafiscales', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (123, 'Certificado de aportes a seguridad social', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (146, 'Citaciones', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (502, 'Traslado por competencia ', 5, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (124, 'Certificado de aportes parafiscales', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (238, 'Estudios de Suelos', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (125, 'Certificado de aptitud laboral (examen médico de ingreso)', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (126, 'Certificado de Calibración', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (127, 'Certificado de Disponibilidad Presupuestal', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (128, 'Certificado de disponibilidad presupuestal', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (129, 'Certificado de existencia y representación legal', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (130, 'Certificado de existencia y representación legal (personas Juridicas)', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (131, 'Certificado de inscripción ante el RUNT Seguro Obligatorio-SOAT', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (132, 'Certificado de insuficiencia o inexistencia de personal en planta', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (133, 'Certificado de la Revisión Tecnicomecánica y de Emisiones Contaminantes', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (134, 'Certificado de presentación del informe ejecutivo anual de evaluación al Sistema de Control Interno', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (135, 'Certificado de registro presupuestal', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (136, 'Certificado de tradición y libertad de inmueble', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (137, 'Certificado del SISBEN', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (138, 'Certificado finaciero de deuda cancelada', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (139, 'Certificado registro presupuestal', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (140, 'Certificados de antecedentes fiscales', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (141, 'Certificados de Disponibilidad Presupuestal', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (142, 'Certificados de registro presupuestal', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (143, 'Certificados de Residencia', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (144, 'Certificados de responsabilidad estructural', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (145, 'Circulares', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (147, 'Comparendos fisicos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (148, 'Comprobante contable de egresos', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (149, 'Comprobante contable de Ingreso', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (150, 'Comprobante de Baja de bienes de almacén', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (151, 'Comprobante de ingreso de bienes a almacén', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (152, 'Comprobantes de contabilidad', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (153, 'Compromisos', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (154, 'Comunicaciones con otras entidades', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (155, 'Comunicaciones oficiales', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (156, 'Comunicaciones oficiales consecutivo PQRS', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (157, 'Concepto de viabilidad', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (158, 'Concepto del bien', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (159, 'Concepto jurídico', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (160, 'Conceptos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (161, 'Conceptos De Normas Urbanísticas', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (162, 'Conceptos De Reparaciones Locativas', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (163, 'Conceptos Técnicos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (164, 'Conceptos Técnicos Agropecuarios', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (165, 'Conceptos Técnicos Ambientales', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (166, 'Conciliación Bancaria', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (167, 'Constancia ejecutoria', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (168, 'Construcción adecuación y manetenimiento de andenes senderos peatonales y ciclorutas', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (169, 'Construcción ampliación y mantenimiento   Infraestructura Fisica Educativa', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (170, 'Construcción ampliación y mantenimiento  Infraestructura  Alumbrado Público', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (171, 'Construcción ampliación y mantenimiento Infraestructura Adulto Mayor', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (172, 'Construcción ampliación y mantenimiento Infraestructura Fisica Cultural', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (173, 'Construcción ampliación y mantenimiento Infraestructura Fisica Deportiva', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (174, 'Construcción ampliación y mantenimiento Infraestructura Personas Diversamente Hábiles', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (251, 'Fallos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (474, 'Solicitud de información', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (497, 'Tutelas', 1, NULL, NULL, '1', 0, 1, 1, 1, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (175, 'Construcción ampliación y mantenimiento Infraestructura Primera Infancia', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (176, 'Contenido de la publicidad', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (177, 'Contestación de la demanda', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (178, 'Contestación del recurso', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (179, 'Convocatorias de Emprendimiento', 30, NULL, NULL, '1', 0, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (180, 'Convocatorias públicas', 30, NULL, NULL, '1', 0, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (181, 'Copia certificado de libertad', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (182, 'Copia de facturas', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (183, 'Copia recibo del impuesto predial cancelado', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (184, 'Copias documentos de identidad', 30, NULL, NULL, '1', 0, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (185, 'Cronogramas de actividades', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (186, 'Cuadros de clasificación documental', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (187, 'Cuenta de cobro', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (188, 'Datos de hogares Sisbenizados (software SISBEN III)', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (189, 'Declaración de Bienes y Rentas', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (190, 'Declaraciones por Recaudo de Impuesto Aportes y participaciones', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (193, 'Declaraciones por Recaudo de Impuesto de Industria y Comercio', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (194, 'Declaraciones por Recaudo de Impuesto de Multas', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (195, 'Declaraciones por Recaudo de Impuesto de Rentas contractuales', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (196, 'Declaraciones por Recaudo de Impuesto de Sobretasa a la Gasolina', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (197, 'Declaraciones por Recaudo de Impuesto de Tasas', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (198, 'Declaraciones por Recaudo de Impuesto Predial', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (199, 'Declaraciones por Recaudo de Impuesto Rifas Municipales', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (200, 'Decretos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (202, 'Demarcación del predio', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (205, 'Desarrollo de eventos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (206, 'Designación de comité evaluador', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (207, 'Despachos comisorios', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (208, 'Diagnostico', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (209, 'Diagnóstico de las necesidades de aprendizaje', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (210, 'Diagnóstico de necesidades', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (211, 'Diagnostico documental', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (212, 'Dictamen técnico del Consejo Consultivo de Ordenamiento Territorial en el que se conceptúa favorablemente respecto a la revisión', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (213, 'Diseño geometrico de via', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (214, 'Diseño y Contrucción Sistema Aprovechamiento de   Plantas de Tratamiento de agua', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (215, 'Disponibilidad inmediata de servicios públicos', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (216, 'Documento Técnico de Soporte de la revisión que explica las decisiones adoptadas en el proyecto de acuerdo', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (217, 'Documentos requisitos postulante', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (218, 'Dotación de unidades sanitarias', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (219, 'Emplazamientom para decalrar y para corregir', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (220, 'Entrega de Insumos agropecuariso', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (221, 'Escrito de recurso', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (222, 'Escrito descargos', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (223, 'Escrito recurso de apelación', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (224, 'Escritura Pública', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (225, 'Especificaciones técnicas del producto o servicio', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (226, 'Estado de Cambios en el Patrimonio', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (227, 'Estado de Cambios en la Situación Financiera', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (228, 'Estado de Flujos de Efectivo', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (229, 'Estado de Inventarios', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (230, 'Estado de Resultados', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (231, 'Estados de Costos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (232, 'Estados de Liquidación', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (233, 'Estados Financieros Consolidados', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (234, 'Estados Financieros de Períodos Intermedios', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (235, 'Estados Financieros Extraordinarios', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (294, 'Inventario documental archivo de gestión', 30, NULL, NULL, '1', 0, 0, 1, 30, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (236, 'Estudio de conveniencia y oportunidad', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (68, 'Auto de archivo', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (491, 'Sugerencias', 30, NULL, NULL, '1', 0, 1, 1, 30, 1, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (204, 'Derecho de petición', 30, NULL, NULL, '1', 0, 1, 1, 30, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (203, 'Denuncia', 30, NULL, NULL, '1', 1, 1, 1, NULL, 1, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (420, 'Queja', 30, NULL, NULL, '1', 0, 1, 1, 30, 1, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (347, 'Petición', 30, NULL, NULL, '1', 0, 1, 0, 30, 1, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (283, 'Informe', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (237, 'Estudios de evaluación de factores de selección', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (239, 'Estudios de viabilidad', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (240, 'Estudios jurídicos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (241, 'Estudios previos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (242, 'Estudios técnicos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (243, 'Estudios técnicos de soporte sobre los hechos condiciones o circunstancias que dan lugar a la revisión según sea el caso', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (244, 'Evaluación', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (245, 'Evaluación inicial del sistema de seguridad y salud en el trabajo', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (246, 'Examen médico pre-ocupacional', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (247, 'Extractos bancarios', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (248, 'Factura', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (249, 'Fallo de primera instancia', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (250, 'Fallo segunda instancia', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (252, 'Feria Dominical', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (253, 'Ficha MGA', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (254, 'Ficha Técnica', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (255, 'Fichas de eventos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (256, 'Fichas del SISBEN', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (257, 'Formacion para el Emprendimiento', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (258, 'Formato de Solicitud de Autorizaciones Eventos y Espectáculos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (259, 'Formulario de cancelación de registro de contribuyentes del impuesto de industria y comercio', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (260, 'Formulario unico nacional', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (261, 'Fotocopia de la factura de servicios públicos domiciliarios de la vivienda', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (262, 'Garantías', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (263, 'Garantía única y/o de responsabilidad civil extracontractual', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (264, 'Hoja de vida de la Función Pública para oferentes personas naturales y personas jurídicas', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (201, 'Demanda', 10, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (266, 'Incautaciones o embargos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (267, 'Indicadores', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (268, 'Informe de adjudicación', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (269, 'Informe de auditoría del Sistema de Gestión de Calidad', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (270, 'Informe de Ejecución', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (271, 'Informe de ejecución presupuestal', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (272, 'Informe de inconsistencias encontradas', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (273, 'Informe de interventoría', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (274, 'Informe de supervisión de contrato', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (275, 'Informe del plan', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (276, 'Informe del plan Agropecuario Municipal', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (277, 'Informe ejecutivo anual de evaluación al Sistema de Control Interno', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (278, 'Informe final de evaluación', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (279, 'Informe final de verificación del comité y calificación final', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (280, 'Informe pasivo pensional', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (281, 'Informe pormenorizado del estado de Control Interno', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (282, 'Informe preliminar de evaluación', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (288, 'Inscripciones', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (289, 'Instructivos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (290, 'Instrumento de control del mantenimiento preventivo y correctivo', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (291, 'Intervención Metros Lineales de Alcantarillado', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (292, 'Inventario de elementos devolutivos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (293, 'Inventarios documentales- Transferencias', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (295, 'Inventarios de Bienes Generales', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (296, 'Inventarios de Bienes Individuales', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (297, 'Invitación pública', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (298, 'Justificación de contratación directa', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (299, 'Justificación del Anteproyecto', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (300, 'Libros Auxiliares de Bancos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (301, 'Libros Auxiliares de Caja', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (302, 'Libros de Registro de Apropiaciones', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (303, 'Libros de registros de cuentas por pagar', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (304, 'Libros de registros de ingresos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (305, 'Libros de Registros de Reservas Presupuestales', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (306, 'Libros de Registros de Vigencias Futuras', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (307, 'Libros Diarios', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (308, 'Libros Mayores y de Balances', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (309, 'Licencia de Construcción', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (286, 'Informes de Gestión', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (310, 'Licencias de exhumación', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (311, 'Licencias de Inhumación', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (312, 'Licencias de Transporte de Semovientes', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (284, 'Informes de Seguimiento', 0, NULL, NULL, '0', 0, 0, 1, 0, 0, NULL, 0);
INSERT INTO sgd_tpr_tpdcumento VALUES (285, 'Informes de valoración psicológica', 0, NULL, NULL, '0', 0, 0, 1, 0, 0, NULL, 0);
INSERT INTO sgd_tpr_tpdcumento VALUES (287, 'Informes Sistema de Salud Pública -SIVIGILA', 0, NULL, NULL, '0', 0, 0, 1, 0, 0, NULL, 0);
INSERT INTO sgd_tpr_tpdcumento VALUES (500, 'OTRO', 0, NULL, NULL, '0', 0, 0, 1, 0, 0, NULL, 0);
INSERT INTO sgd_tpr_tpdcumento VALUES (346, 'Permisos Laborales', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 0);
INSERT INTO sgd_tpr_tpdcumento VALUES (313, 'Lista de oferentes habilitados para participar en la subasta', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (314, 'Listado de números radicados anulados', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (315, 'Listado maestro de documentos', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (316, 'Listados de Asistencia', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (317, 'Mantenimiento Red Vial Urbana', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (318, 'Mantenimiento Vías Terciarias', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (319, 'Manual de Funciones', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (320, 'Manual de procesos y procedimientos', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (321, 'Matriz de Ruta Integral de atención', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (322, 'Memoria justificativa', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (323, 'Memorias de ayudas', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (324, 'Memorias de Calculo', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (325, 'Minuta contractual', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (326, 'Minuta de contrato o convenio', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (327, 'Modificaciones', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (328, 'Nómina', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (329, 'Notas internas', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (330, 'Novedades', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (331, 'Obligaciones', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (332, 'Obras de Mitigación del Riesgo de Desastres', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (333, 'Observaciones al proyecto pliego de condiciones', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (334, 'Observaciones de los oferentes sobre las calificaciones', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (335, 'Oficios remisiorios', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (336, 'Orden de compra', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (337, 'Orden de pago', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (338, 'Pago Impuesto', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (339, 'Pagos', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (340, 'Participacion en eventos empresariales', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (341, 'Pasado Judicial - Certificado de Antecedentes Penales', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (342, 'Pavimentación y Construcción de Vías', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (344, 'Permiso tala de Arboles', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (345, 'Permisos de Tránsito vehícullos de más de 2 ejes', 30, NULL, NULL, '1', 0, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (349, 'Plan  de capacitación', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (350, 'Plan Agropecuario Municipal', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (351, 'Plan anual de incentivos institucional', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (352, 'Plan de acción', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (353, 'Plan de Asistencia Técnica', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (354, 'Plan de atención de emergencias ambientales', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (355, 'Plan de Bienestar Social y Estimulo Laboral', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (356, 'Plan de contigencia', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (357, 'Plan de Desarrollo de Ecoturismo', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (358, 'Plan de manejo ambiental', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (359, 'Plan de Manejo de Tráfico', 30, NULL, NULL, '1', 0, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (360, 'Plan de trabajo anual del Sistema De Seguridad y Salud en el Trabajo', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (361, 'Plan de Turismo Municipal', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (362, 'Plan de Vacaciones', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (363, 'Plan de Vivienda de Interés Social', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (364, 'Plan indicativo', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (365, 'Plan Institucional de Archivos - PINAR', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (366, '"Plan Institucional de Gestión Ambiental ""PIGA"""', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (367, 'Plan Local de Salud', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (368, 'Plan Municipal de Juventud', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (369, 'Plan operativo anual de inversión', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (370, 'Plan Operativo Anual de Salud Pública', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (371, 'Plan Salud Pública de Intervenciones Colectivas', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (372, 'Planes Anuales de Adquisiciones', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (373, 'Planillas de control de comunicaciones oficiales', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (374, 'Plano topografico', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (375, 'Planos arquitectonicos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (376, 'Planos de evacuación', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (377, 'Planos estructurales', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (378, 'Planos hidraulicos sanitarios y electricos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (379, 'Planos hidraulicos sanitarios y electricos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (380, 'Pliego de condiciones', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (381, 'Plusvalia', 30, NULL, NULL, '1', 0, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (382, 'Poder autenticado (apoderado)', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (383, 'Póliza', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (384, 'Práctica de pruebas', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (385, 'Presentación del proyecto a la autoridad ambiental', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (386, 'Prestamo maquinaria y equipo agropecuario', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (387, 'Presupuesto Municipal', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (388, 'Proceso de Exclusión', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (389, 'Procesos civiles en contra de la entidad', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (390, 'Procesos civiles iniciados por la entidad', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (391, 'Procesos contencioso administrativo', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (392, 'Procesos Laborales', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (455, 'Respuesta', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (393, 'Procesos Ordinarios', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (394, 'Procesos Penales', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (395, 'Programa', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (396, 'Programa anual de auditoria', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (397, 'Programa Anual Mensualizado de Caja – PAC', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (398, 'Programa de capacitación agropecuaria', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (399, 'Programa de Gestión del Riesgo de Desastres', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (400, 'Programa de Gobierno', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (401, 'Programa de Infraestructura  Gas natural', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (402, 'Programa de Infraestructura  Red Vial', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (403, 'Programa de primera Infancia', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (404, 'Programa de Salud Ocupacional', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (405, 'Programa Mantenimiento Edificios Públicos Municipales', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (406, 'Programa Mejoramiento Habitat', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (407, 'Programa Sostenibilidad Ambiental -GIRS', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (408, 'Programas Anuales Mensualizados de Caja PAC', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (409, 'Programas de gestión documental', 30, NULL, NULL, '1', 0, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (410, 'Programas de Infraestructura Agua Potable y Saneamiento basico', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (411, 'Programas de infraestructura Redes Eléctricas', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (412, 'Programas de infraestructura Telefonía y Datos', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (413, 'Propuestas', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (414, 'Propuestas no seleccionadas', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (415, 'Proyecto', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (416, 'Proyecto Parcelas Demostrativas', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (417, 'Proyectos de Mantenimiento de Bienes Muebles', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (418, 'Pruebas', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (419, 'Publicacion en pagina web', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (421, 'Radicado de Solicitud', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (422, 'Ratificación y ampliación de queja Pruebas', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (423, 'Recibo a satisfacción', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (424, 'Recibo de pago de impuesto', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (425, 'Recibos Universales', 30, NULL, NULL, '1', 0, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (428, 'Registro de acuerdos comerciales', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (429, 'Registro de asistencia', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (430, 'Registro de Clasificación económica de los gastos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (431, 'Registro de Modificaciones del PAC', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (432, 'Registro de novedades de nómina', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (433, 'Registro de Pagos programados de deuda pública', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (434, 'Registro de Proyección de Planta de personal del año próximo', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (436, 'Registro de publicación en página web', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (437, 'Registro publicación en el SECOP', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (438, 'Registro Único Tributario', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (439, 'Registro y Control del PAC', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (440, 'Registros de Cálculo de los ingresos corrientes por producto', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (441, 'Relación de bienes a dar baja', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (442, 'Relación de descuentos de salud pensión parafiscales y cesantías', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (443, 'Remisión de informe a la entidad correspondiente', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (444, 'Reporte de comparendos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (445, 'Reporte de incidentes', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (446, 'Reporte SIIF', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (447, 'Requerimiento Especial', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (448, 'Requerimiento ordinario', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (449, 'Resolución de apertura licitación o concurso', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (450, 'Resolución de justificación de la contratación directa', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (451, 'Resolución Declaratoria desierta', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (452, 'Resolución para dar de baja los bienes', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (453, 'Resoluciones', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (454, 'Resoluciones definitivas de medidas de protección', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (456, 'Respuesta a observaciones al pliego de condiciones', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (457, 'Respuesta Derecho de Petición', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (458, 'Saneamiento y Manejo de Vertimientos', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (459, 'Seguimiento', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (460, 'Seguimiento y Evaluación del POT vigente', 30, NULL, NULL, '1', 0, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (461, 'Serivicio de consulta asistencia', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (462, 'Servicio de consulta agricola', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (463, 'Servicio de consulta veterinaria', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (465, 'Solicitud al Consultorio Jurídico de un defensor de oficio', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (466, 'Solicitud al ordenador del gasto sobre adjudicación del proceso', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (467, 'Solicitud de adición o prórroga', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (67, 'Auto de admisión de recurso', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (57, 'Análisis del sector económico y de los oferentes', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (435, 'Registro de publicación en el SECOP', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (59, 'Antecedentes propios de tipo contractualInforme de Evaluación contemplando en observaciones', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (60, 'Anteproyecto del presupuesto de gastos', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (61, 'Anteproyecto del presupuesto de ingresos', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (62, 'Apoyo y Fortalecimiento Empresarial', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (63, 'Auto apertura de investigación', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (64, 'Auto concediendo recurso de queja', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (65, 'Auto corriendo traslado para alegar de conclusión', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (66, 'Auto de admisión', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (478, 'Solicitud de personal', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (69, 'Auto de cierre de investigación', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (70, 'Auto de conociemiento', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (71, 'Auto de incorporación y/o acumulación de expedientes', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (72, 'Auto de indagación', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (73, 'Auto de investigación', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (74, 'Auto de Mandamiento de pago', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (75, 'Auto de obedézcase y cúmplase lo resuelto por la segunda instancia', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (14, 'Acta de presentación personal del defensor de oficio', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (20, 'Actas  Comité de Participación Local de Salud (COPACO)', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (22, 'Actas Consejo de Política Social', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (23, 'Actas Consejo Fondo de Vivienda de Interés Social (FOVIS)', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (24, 'Actas Consejo Territorial de Planeación', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (26, 'Actas de finalización del convenio', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (27, 'Actas de Incautación de Mercancia', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (28, 'Actas de Incautación de Sustancias Psicoactivas', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (76, 'Auto de pliego de cargos', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (77, 'Auto de prorroga en proceso de investigación', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (78, 'Auto de pruebas', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (79, 'Auto de resolución de recurso', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (80, 'Auto decretando pruebas', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (81, 'Auto inhibitorio', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (82, 'Auto nombrando un defensor de oficio', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (83, 'Auto que resuelve recursos', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (84, 'Auto resolviendo nulidad', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (85, 'Auto resolviendo pruebas en descargos', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (86, 'Autorización Cambio de IPS', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (87, 'Autorización de baja de bienes', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (88, 'Autorizaciones de Modificación de Planos Urbanísticos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (89, 'Autorizaciones de Movimiento de Tierras', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (90, 'Autorizaciones de Propiedad Horizontal y sus Modificaciones', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (91, 'Avaluo y/o peritaje', 30, NULL, NULL, '1', 1, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (93, 'Avisos de prensa', 30, NULL, NULL, '1', 0, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (94, 'Balance General', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (95, 'Balance Inicial', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (96, 'Banco de Proyectos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (97, 'Banco Terminológico de series y subseries documentales', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (98, 'Boleta citación', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (99, 'Boletin Epidemiológico Municipal', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (100, 'Cartografía oficial', 30, NULL, NULL, '1', 0, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (101, 'Ceriticaciones de Retiro de EPS', 30, NULL, NULL, '1', 0, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (102, 'Certificación bancaria', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (103, 'Certificación de la vigencia de la tarjeta profesional de todos los profesionales responsables del proyecto', 30, NULL, NULL, '1', 0, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (104, 'Certificacion de retiro de SISBEN', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (105, 'Certificación de supervisión', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (106, 'Certificación de supervisión para trámite de pago de contrato de compraventa', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (107, 'Certificación del nuevo del SISBEN', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (58, 'Anexos', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (343, 'Peritaje técnico', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (6, 'Acta de Comité', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (3, 'Acta de adjudicación o Remate', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (4, 'Acta de aprobación', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (5, 'Acta de audiencia', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (7, 'Acta de Conciliación', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (8, 'Acta de Consejo', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (9, 'Acta de entrega de inmueble entregado en arrendamiento', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (10, 'Acta de inicio', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (11, 'Acta de liquidación', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (12, 'Acta de Obra', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (13, 'Acta de posesión', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (15, 'Acta de recibido', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (17, 'Acta de reunión', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (16, 'Acta de Reconocimiento Voluntario de Paternidad', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (21, 'Actas Consejo de Política Económica y Social (COMPES)', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (25, 'Actas de finalización', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (2, 'Acta', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (19, 'Acta Equipo Operativo MIPG', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (30, 'Actas de manifestación de interés para participar en el proceso', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (32, 'Acto administrativo de adjudicación', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (33, 'Acto administrativo de adopción', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (34, 'Acto administrativo de apertura del proceso de contratación', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (35, 'Acto administrativo de aprobación', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (36, 'Acto administrativo de establecimiento del convenio', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (37, 'Acto Administrativo de liquidacion oficial', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (38, 'Acto administrativo de nombramiento o contrato de trabajo  Oficio de notificación del nombramiento o contrato de trabajo', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (39, 'Acto administrativo de retiro o desvinculación del servidor de la entidad donde consten las razones del mismo', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (40, 'Acto administrativo de secuestre', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (41, 'Acto administrativo donde se notifica declaratoria de desierta', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (42, 'Acto administrativo por el cual se adopta el Plan  de vacaciones', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (43, 'Acto administrativo por el cual se adopta el Plan de Bienestar Social y Estimulo Laboral', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (44, 'Acto administrativo por el cual se adopta el plan de trabajo anual del sistema de seguridad y salud en el trabajo', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (45, 'Acto administrativo por el cual se adopta el Programa de Salud Ocupacional', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (47, 'Actos administrativos de avaluos y soportes', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (50, 'Acuerdo del Concejo municipal o Decreto municipal de adopción del Plan Documento de remisión a entes interesados', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (53, 'Adendas a los términos de referencia', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (54, 'Adición de afiliados o retiro cuando aplique', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (55, 'Afiliaciones a: Régimen de salud (EPS) pensión cesantías caja de compensación etc', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (56, 'Análisis de riesgos previsible en el proceso', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (119, 'Certificado de antecedentes disciplinarios', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (191, 'Declaraciones por Recaudo de Impuesto de Aviso y Tableros', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (192, 'Declaraciones por Recaudo de Impuesto de Espectáculos Públicos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (265, 'Hoja de vida de la Función Pública para personas naturales o personas jurídicas', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (108, 'Certificación individual de aduana para vehículos automotores', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (109, 'Certificaciones', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (110, 'Certificaciones de compensación', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (31, 'Acta de visita', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (46, 'Actos administrativos', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (48, 'Actualización Escolar', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (49, 'Acuerdo de pago', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (51, 'Acuerdos de Confidencialidad', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (52, 'Adendas', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (348, 'Plan', 0, NULL, NULL, '1', 1, 1, 1, 0, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (468, 'Solicitud de adición o prórroga del convenio', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (469, 'Solicitud de bienes y servicios', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (470, 'Solicitud de certificado de disponibilidad presupuestal', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (471, 'Solicitud de contratación con lista de chequeo', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (473, 'Solicitud de fotocopias del expediente', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (475, 'Solicitud de ingreso de los bienes a almacén', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (476, 'Solicitud de la Proyección de Ingresos y/o Marco Fiscal Actualizado', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (477, 'Solicitud de permiso para tala de Arboles', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (479, 'Solicitud de Presentación de Proyectos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (480, 'Solicitud de reposición y/o apelación', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (481, 'Solicitud de suministros', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (482, 'Solicitud del PAC', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (483, 'Solicitud elaboración de contrato', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (484, 'Solicitud Salidas Turisticas', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (485, 'Solución a agua potable y alcantarillado', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (486, 'Solución a residuos liquidos', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (487, 'Soportes contables', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (488, 'Soportes de pago', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (489, 'Soportes de remates', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (490, 'Soportes documentales de estudios', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (492, 'Suspendidos', 30, NULL, NULL, '1', 0, 0, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (493, 'Tabla de control de acceso', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (494, 'Tablas de retención documental', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (495, 'Tablas de valoración documental', 30, NULL, NULL, '1', 1, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (496, 'Tarjeta de Propiedad', 30, NULL, NULL, '1', 0, 1, 1, NULL, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (427, 'Recurso de Consideración', 30, NULL, NULL, '1', 0, 1, 1, 30, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (498, 'Verificaciones', 30, NULL, NULL, '1', 0, 0, 1, 30, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (426, 'reclamo', 30, NULL, NULL, '1', 0, 1, 1, 30, 1, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (1, 'Acciones populares', 10, NULL, NULL, '1', 1, 1, 1, 10, 0, NULL, 1);
INSERT INTO sgd_tpr_tpdcumento VALUES (464, 'Solicitud Interna', 15, NULL, NULL, '1', 1, 1, 1, 15, 0, NULL, 0);
INSERT INTO sgd_tpr_tpdcumento VALUES (472, 'Solicitud de disponibilidad presupuestal', 0, NULL, NULL, '1', 0, 0, 1, 0, 0, NULL, 0);
INSERT INTO sgd_tpr_tpdcumento VALUES (503, 'Solicitud de permiso ambiental', 10, NULL, NULL, '0', 0, 1, 1, NULL, 0, NULL, 0);

--
-- Data for Name: sgd_trad_tiporad; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_trad_tiporad VALUES (2, 'Entrada', NULL, 1, NULL, 1, 1);
INSERT INTO sgd_trad_tiporad VALUES (1, 'Salida', NULL, 1, NULL, 0, 1);
INSERT INTO sgd_trad_tiporad VALUES (4, 'Pqrsd', NULL, 1, NULL, 1, 1);
INSERT INTO sgd_trad_tiporad VALUES (3, 'Comunicación Interna', NULL, 1, NULL, 1, 1);

--
-- Data for Name: sgd_transfe_documentales; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_transfe_documentales VALUES (1, '20219981120000003E', 11, 2, 248, '20219980000092', '2021-04-15 10:13:58.192931-05', '998', 1, '2021-04-15 11:18:37.386882-05', '998', 1, 'transferencia_998_20210415111837.pdf');
INSERT INTO sgd_transfe_documentales VALUES (2, '20219981120000003E', 11, 2, 155, '20219980000102', '2021-04-15 14:42:11.633787-05', '998', 1, '2021-04-15 14:43:09.848611-05', '998', 1, 'transferencia_998_20210415144309.pdf');
INSERT INTO sgd_transfe_documentales VALUES (3, '20219981120000003E', 11, 2, 2, '20219980000191', '2021-04-15 15:08:31.100841-05', '998', 1, '2021-04-15 15:16:55.310281-05', '998', 1, 'transferencia_998_20210415151655.pdf');

--
-- Data for Name: sgd_ttr_transaccion; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_ttr_transaccion VALUES (40, 'Firma Digital de Documento');
INSERT INTO sgd_ttr_transaccion VALUES (41, 'Eliminacion solicitud de Firma Digital');
INSERT INTO sgd_ttr_transaccion VALUES (50, 'Cambio de Estado Expediente');
INSERT INTO sgd_ttr_transaccion VALUES (51, 'Creacion Expediente');
INSERT INTO sgd_ttr_transaccion VALUES (1, 'Recuperacion Radicado');
INSERT INTO sgd_ttr_transaccion VALUES (9, 'Reasignacion');
INSERT INTO sgd_ttr_transaccion VALUES (8, 'Informar');
INSERT INTO sgd_ttr_transaccion VALUES (19, 'Cambiar Tipo de Documento');
INSERT INTO sgd_ttr_transaccion VALUES (20, 'Crear Registro');
INSERT INTO sgd_ttr_transaccion VALUES (21, 'Editar Registro');
INSERT INTO sgd_ttr_transaccion VALUES (10, 'Movimiento entre Carpetas');
INSERT INTO sgd_ttr_transaccion VALUES (11, 'Modificacion Radicado');
INSERT INTO sgd_ttr_transaccion VALUES (7, 'Borrar Informado');
INSERT INTO sgd_ttr_transaccion VALUES (12, 'Devuelto-Reasignar');
INSERT INTO sgd_ttr_transaccion VALUES (13, 'Archivar');
INSERT INTO sgd_ttr_transaccion VALUES (14, 'Agendar');
INSERT INTO sgd_ttr_transaccion VALUES (15, 'Sacar de la agenda');
INSERT INTO sgd_ttr_transaccion VALUES (0, '--');
INSERT INTO sgd_ttr_transaccion VALUES (16, 'Reasignar para Vo.Bo.');
INSERT INTO sgd_ttr_transaccion VALUES (2, 'Radicacion');
INSERT INTO sgd_ttr_transaccion VALUES (22, 'Digitalizacion de Radicado');
INSERT INTO sgd_ttr_transaccion VALUES (23, 'Digitalizacion - Modificacion');
INSERT INTO sgd_ttr_transaccion VALUES (24, 'Asociacion Imagen fax');
INSERT INTO sgd_ttr_transaccion VALUES (30, 'Radicacion Masiva');
INSERT INTO sgd_ttr_transaccion VALUES (17, 'Modificacion de Causal');
INSERT INTO sgd_ttr_transaccion VALUES (18, 'Modificacion del Sector');
INSERT INTO sgd_ttr_transaccion VALUES (25, 'Solicitud de Anulacion');
INSERT INTO sgd_ttr_transaccion VALUES (26, 'Anulacion Rad');
INSERT INTO sgd_ttr_transaccion VALUES (27, 'Rechazo de Anulacion');
INSERT INTO sgd_ttr_transaccion VALUES (37, 'Cambio de Estado del Documento');
INSERT INTO sgd_ttr_transaccion VALUES (28, 'Devolucion de correo');
INSERT INTO sgd_ttr_transaccion VALUES (29, 'Digitalizacion de Anexo');
INSERT INTO sgd_ttr_transaccion VALUES (31, 'Borrado de Anexo a radicado');
INSERT INTO sgd_ttr_transaccion VALUES (32, 'Asignacion TRD');
INSERT INTO sgd_ttr_transaccion VALUES (33, 'Eliminar TRD');
INSERT INTO sgd_ttr_transaccion VALUES (35, 'Tipificacion de la decision');
INSERT INTO sgd_ttr_transaccion VALUES (36, 'Cambio en la Notificacion');
INSERT INTO sgd_ttr_transaccion VALUES (38, 'Cambio Vinculacion Documento');
INSERT INTO sgd_ttr_transaccion VALUES (39, 'Solicitud de Firma');
INSERT INTO sgd_ttr_transaccion VALUES (42, 'Digitalizacion Radicado(Asoc. Imagen Web)');
INSERT INTO sgd_ttr_transaccion VALUES (52, 'Excluir radicado de expediente');
INSERT INTO sgd_ttr_transaccion VALUES (53, 'Incluir radicado en expediente');
INSERT INTO sgd_ttr_transaccion VALUES (54, 'Cambio Seguridad del Documento');
INSERT INTO sgd_ttr_transaccion VALUES (57, 'Ingreso al Archivo Fisico');
INSERT INTO sgd_ttr_transaccion VALUES (55, 'Creación Subexpediente');
INSERT INTO sgd_ttr_transaccion VALUES (56, 'Cambio de Responsable');
INSERT INTO sgd_ttr_transaccion VALUES (58, 'Expediente Cerrado');
INSERT INTO sgd_ttr_transaccion VALUES (59, 'Expediente Reabierto');
INSERT INTO sgd_ttr_transaccion VALUES (61, 'Asignar TRD Multiple');
INSERT INTO sgd_ttr_transaccion VALUES (62, 'Insercion Expediente Multiple');
INSERT INTO sgd_ttr_transaccion VALUES (65, 'Archivado NRR');
INSERT INTO sgd_ttr_transaccion VALUES (66, 'Reasignación masiva');
INSERT INTO sgd_ttr_transaccion VALUES (67, 'Se firma el documento radicado');
INSERT INTO sgd_ttr_transaccion VALUES (68, 'Transferencia documental');
INSERT INTO sgd_ttr_transaccion VALUES (69, 'Cambio de Estado');
INSERT INTO sgd_ttr_transaccion VALUES (70, 'Publicar Documento');
INSERT INTO sgd_ttr_transaccion VALUES (71, 'Notificación de Correo');
INSERT INTO sgd_ttr_transaccion VALUES (72, 'Cambió el estado del anexo publico');
INSERT INTO sgd_ttr_transaccion VALUES (73, 'Desistimiento de Pqrsdf');

--
-- Name: sgd_tvd_depe_id; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sgd_tvd_depe_id', 0, false);

--
-- Data for Name: sgd_ush_usuhistorico; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '998', '1234567890', 40, '2021-02-23', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '998', '1234567890', 53, '2021-02-23', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 2, '101', '1022982735', 1, '2021-04-13', 'JMGAMEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 2, '101', '1022982735', 53, '2021-04-13', 'JMGAMEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 40, '2020-12-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 53, '2020-12-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 40, '2020-12-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 53, '2020-12-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '100', '1022982736', 1, '2021-02-24', 'RECEPCION.INVM');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '100', '1022982736', 53, '2021-02-24', 'RECEPCION.INVM');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '999', '12345678909', 40, '2021-04-13', 'DSALIDA');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '999', '12345678909', 53, '2021-04-13', 'DSALIDA');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '101', '1022982737', 1, '2021-02-24', 'RECEPCION.SKN');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '101', '1022982737', 53, '2021-02-24', 'RECEPCION.SKN');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '998', '1234567890', 40, '2021-04-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '998', '1234567890', 53, '2021-04-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1020', '20994213', 53, '2021-01-14', 'GARCIA.CONSTANZA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1021', '1078370117', 40, '2021-01-14', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1021', '1078370117', 53, '2021-01-14', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 4, '1021', '119680348', 1, '2021-01-15', 'EVALERA');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 4, '1021', '119680348', 53, '2021-01-15', 'EVALERA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1020', '20994822', 40, '2021-01-18', 'ARIAS.ROSA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1020', '20994822', 53, '2021-01-18', 'ARIAS.ROSA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1020', '20994822', 40, '2021-01-18', 'ARIAS.ROSA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1020', '20994822', 53, '2021-01-18', 'ARIAS.ROSA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1020', '20994822', 40, '2021-01-19', 'ARIAS.ROSA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1020', '20994822', 53, '2021-01-19', 'ARIAS.ROSA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1021', '1078370117', 50, '2021-01-19', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1021', '1078370117', 40, '2021-01-19', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1021', '1078370117', 53, '2021-01-19', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 12, '1020', '1078370117', 3, '2021-01-19', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 12, '1020', '1078370117', 40, '2021-01-19', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 12, '1020', '1078370117', 53, '2021-01-19', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 12, '1020', '1078370117', 40, '2021-01-19', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 12, '1020', '1078370117', 53, '2021-01-19', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 9, '1070', '20995593', 40, '2021-01-19', 'PEDREROS.VICKY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 9, '1070', '20995593', 53, '2021-01-19', 'PEDREROS.VICKY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 9, '1070', '20995593', 40, '2021-01-19', 'PEDREROS.VICKY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 9, '1070', '20995593', 53, '2021-01-19', 'PEDREROS.VICKY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1000', '20995883', 1, '2021-01-19', 'BELTRAN.ADRIANA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1000', '20995883', 53, '2021-01-19', 'BELTRAN.ADRIANA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 12, '1020', '1078370117', 40, '2021-01-19', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '998', '1234567890', 40, '2021-04-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '998', '1234567890', 53, '2021-04-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 40, '2020-12-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 53, '2020-12-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 40, '2020-12-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 53, '2020-12-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 40, '2020-12-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 53, '2020-12-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 40, '2020-12-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 53, '2020-12-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 40, '2020-12-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 53, '2020-12-15', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 40, '2020-12-16', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 53, '2020-12-16', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 40, '2020-12-16', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 53, '2020-12-16', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 3, '0998', '1111000222333', 1, '2020-12-18', 'PASTOR.HERNAN');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 3, '0998', '1111000222333', 53, '2020-12-18', 'PASTOR.HERNAN');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '1021', '1078370117', 1, '2020-12-21', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '1021', '1078370117', 53, '2020-12-21', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '1021', '1078370117', 40, '2020-12-21', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '1021', '1078370117', 53, '2020-12-21', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 2, '1021', '20688375', 1, '2020-12-22', 'BERENICE.BELTRAN');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 2, '1021', '20688375', 53, '2020-12-22', 'BERENICE.BELTRAN');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 4, '0998', '1078368367', 1, '2020-12-22', 'ALBEIRO.PULIDO');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 4, '0998', '1078368367', 53, '2020-12-22', 'ALBEIRO.PULIDO');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 40, '2020-12-22', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 53, '2020-12-22', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 40, '2020-12-22', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 53, '2020-12-22', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 40, '2020-12-22', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 53, '2020-12-22', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 3, '1021', '1078368367', 3, '2020-12-28', 'ALBEIRO.PULIDO');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 3, '1021', '1078368367', 40, '2020-12-28', 'ALBEIRO.PULIDO');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 3, '1021', '1078368367', 53, '2020-12-28', 'ALBEIRO.PULIDO');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 3, '1021', '1078368367', 40, '2020-12-28', 'ALBEIRO.PULIDO');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 3, '1021', '1078368367', 53, '2020-12-28', 'ALBEIRO.PULIDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1020', '1073506219', 40, '2021-01-04', 'ARDILA.NATALI');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1020', '1073506219', 53, '2021-01-04', 'ARDILA.NATALI');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1021', '1078370117', 40, '2021-01-04', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1021', '1078370117', 53, '2021-01-04', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1021', '20995105', 3, '2021-01-04', 'HERNANDEZ.RUBY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1021', '20995105', 40, '2021-01-04', 'HERNANDEZ.RUBY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1021', '20995105', 53, '2021-01-04', 'HERNANDEZ.RUBY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 8, '1032', '3230188', 3, '2021-01-04', 'CASAS.CAMILO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 8, '1032', '3230188', 40, '2021-01-04', 'CASAS.CAMILO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 8, '1032', '3230188', 53, '2021-01-04', 'CASAS.CAMILO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1032', '51915315', 40, '2021-01-04', 'MUNOZ.ANA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1032', '51915315', 53, '2021-01-04', 'MUNOZ.ANA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 7, '1010', '1014202898', 3, '2021-01-04', 'SANDOVAL.JOHN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 7, '1010', '1014202898', 40, '2021-01-04', 'SANDOVAL.JOHN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 7, '1010', '1014202898', 53, '2021-01-04', 'SANDOVAL.JOHN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1050', '52773181', 1, '2021-01-04', 'SAENZ.LILIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1050', '52773181', 53, '2021-01-04', 'SAENZ.LILIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 11, '1070', '37160095', 3, '2021-01-04', 'BUSTAMANTE.NADIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 11, '1070', '37160095', 40, '2021-01-04', 'BUSTAMANTE.NADIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 11, '1070', '37160095', 53, '2021-01-04', 'BUSTAMANTE.NADIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1021', '1078370117', 40, '2021-01-04', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1021', '1078370117', 53, '2021-01-04', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1000', '52153547', 40, '2021-01-05', 'GONZALEZ.SONIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1000', '52153547', 53, '2021-01-05', 'GONZALEZ.SONIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1010', '19472641', 40, '2021-01-05', 'LEON.FERNANDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1010', '19472641', 53, '2021-01-05', 'LEON.FERNANDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1020', '20994213', 40, '2021-01-05', 'GARCIA.CONSTANZA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1020', '20994213', 53, '2021-01-05', 'GARCIA.CONSTANZA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1030', '81745108', 40, '2021-01-05', 'CARDENAS.DANIEL');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1030', '81745108', 53, '2021-01-05', 'CARDENAS.DANIEL');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1031', '20995001', 40, '2021-01-05', 'GALVEZ.IVONNE');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1031', '20995001', 53, '2021-01-05', 'GALVEZ.IVONNE');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1031', '20995001', 40, '2021-01-05', 'GALVEZ.IVONNE');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1031', '20995001', 53, '2021-01-05', 'GALVEZ.IVONNE');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1031', '20995105', 40, '2021-01-05', 'HERNANDEZ.RUBY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1031', '20995105', 53, '2021-01-05', 'HERNANDEZ.RUBY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1021', '20995105', 50, '2021-01-05', 'HERNANDEZ.RUBY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1021', '20995105', 3, '2021-01-05', 'HERNANDEZ.RUBY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1021', '20995105', 40, '2021-01-05', 'HERNANDEZ.RUBY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1021', '20995105', 53, '2021-01-05', 'HERNANDEZ.RUBY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 6, '1090', '1078367544', 40, '2021-01-05', 'PINZON.JUDITH');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 6, '1090', '1078367544', 53, '2021-01-05', 'PINZON.JUDITH');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1021', '1078370117', 40, '2021-01-05', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1021', '1078370117', 53, '2021-01-05', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1021', '1078370117', 40, '2021-01-05', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1021', '1078370117', 53, '2021-01-05', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 6, '1060', '79653907', 3, '2021-01-05', 'TOQUICA.DANILO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 6, '1060', '79653907', 40, '2021-01-05', 'TOQUICA.DANILO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 6, '1060', '79653907', 53, '2021-01-05', 'TOQUICA.DANILO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1021', '1078368367', 40, '2021-01-05', 'ALBEIRO.PULIDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1021', '1078368367', 53, '2021-01-05', 'ALBEIRO.PULIDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1060', '1052396800', 40, '2021-01-05', 'CELY.KEILA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1060', '1052396800', 53, '2021-01-05', 'CELY.KEILA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1021', '1078368367', 40, '2021-01-05', 'ALBEIRO.PULIDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1021', '1078368367', 53, '2021-01-05', 'ALBEIRO.PULIDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1021', '1078370117', 40, '2021-01-05', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1021', '1078370117', 53, '2021-01-05', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1021', '1078368367', 40, '2021-01-05', 'ALBEIRO.PULIDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1021', '1078368367', 53, '2021-01-05', 'ALBEIRO.PULIDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1000', '52153547', 40, '2021-01-06', 'GONZALEZ.SONIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1000', '52153547', 53, '2021-01-06', 'GONZALEZ.SONIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1002', '80010648', 40, '2021-01-06', 'RODRIGUEZ.DIEGO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1002', '80010648', 53, '2021-01-06', 'RODRIGUEZ.DIEGO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1010', '19472641', 40, '2021-01-06', 'LEON.FERNANDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1010', '19472641', 53, '2021-01-06', 'LEON.FERNANDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 5, '1010', '1073502330', 40, '2021-01-06', 'TACHACK.YENY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 5, '1010', '1073502330', 53, '2021-01-06', 'TACHACK.YENY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1020', '20994213', 40, '2021-01-06', 'GARCIA.CONSTANZA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1020', '20994213', 53, '2021-01-06', 'GARCIA.CONSTANZA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 10, '1020', '20995172', 40, '2021-01-06', 'SOCHE.MIREYA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 10, '1020', '20995172', 53, '2021-01-06', 'SOCHE.MIREYA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1020', '1073506219', 40, '2021-01-06', 'ARDILA.NATALI');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1020', '1073506219', 53, '2021-01-06', 'ARDILA.NATALI');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1030', '81745108', 40, '2021-01-06', 'CARDENAS.DANIEL');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1030', '81745108', 53, '2021-01-06', 'CARDENAS.DANIEL');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1030', '52779966', 40, '2021-01-06', 'GIRALDO.ADRIANA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1030', '52779966', 53, '2021-01-06', 'GIRALDO.ADRIANA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1050', '52773181', 40, '2021-01-06', 'SAENZ.LILIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1050', '52773181', 53, '2021-01-06', 'SAENZ.LILIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 8, '1032', '3230188', 40, '2021-01-07', 'CASAS.CAMILO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 8, '1032', '3230188', 53, '2021-01-07', 'CASAS.CAMILO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1050', '80912402', 1, '2021-01-07', 'AYALA.CESAR');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1050', '80912402', 53, '2021-01-07', 'AYALA.CESAR');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1050', '20994404', 1, '2021-01-07', 'CASTAÑEDA.NUBIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1050', '20994404', 53, '2021-01-07', 'CASTAÑEDA.NUBIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 5, '1050', '79781671', 1, '2021-01-07', 'TOVAR.EDUARDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 5, '1050', '79781671', 53, '2021-01-07', 'TOVAR.EDUARDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 6, '1050', '1078367049', 1, '2021-01-07', 'ZORNOSA.HERNAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 6, '1050', '1078367049', 53, '2021-01-07', 'ZORNOSA.HERNAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1000', '52153547', 40, '2021-01-08', 'GONZALEZ.SONIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1000', '52153547', 53, '2021-01-08', 'GONZALEZ.SONIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1031', '20995001', 40, '2021-01-08', 'GALVEZ.IVONNE');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1031', '20995001', 53, '2021-01-08', 'GALVEZ.IVONNE');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1021', '1078368367', 40, '2021-01-12', 'ALBEIRO.PULIDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1021', '1078368367', 53, '2021-01-12', 'ALBEIRO.PULIDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1021', '20688375', 40, '2021-01-12', 'BERENICE.BELTRAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1021', '20688375', 53, '2021-01-12', 'BERENICE.BELTRAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1020', '1073506219', 40, '2021-01-12', 'ARDILA.NATALI');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1020', '1073506219', 53, '2021-01-12', 'ARDILA.NATALI');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1020', '1073506219', 40, '2021-01-12', 'ARDILA.NATALI');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1020', '1073506219', 53, '2021-01-12', 'ARDILA.NATALI');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1021', '20688375', 40, '2021-01-12', 'BERENICE.BELTRAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1021', '20688375', 53, '2021-01-12', 'BERENICE.BELTRAN');
INSERT INTO sgd_ush_usuhistorico VALUES (2, '998', '1022982736', 2, '0998', '1022982736', 7, '2021-01-13', 'JMGAMEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (2, '998', '1022982736', 2, '0998', '1022982736', 39, '2021-01-13', 'JMGAMEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (2, '998', '1022982736', 2, '0998', '1022982736', 8, '2021-01-13', 'JMGAMEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (2, '998', '1022982736', 2, '0998', '1022982736', 40, '2021-01-13', 'JMGAMEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (2, '998', '1022982736', 2, '0998', '1022982736', 53, '2021-01-13', 'JMGAMEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1031', '20995001', 40, '2021-01-14', 'GALVEZ.IVONNE');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1031', '20995001', 53, '2021-01-14', 'GALVEZ.IVONNE');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1030', '81745108', 40, '2021-01-14', 'CARDENAS.DANIEL');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1030', '81745108', 53, '2021-01-14', 'CARDENAS.DANIEL');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1030', '52779966', 40, '2021-01-14', 'GIRALDO.ADRIANA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1030', '52779966', 53, '2021-01-14', 'GIRALDO.ADRIANA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1000', '52153547', 40, '2021-01-14', 'GONZALEZ.SONIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1000', '52153547', 53, '2021-01-14', 'GONZALEZ.SONIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1001', '51779363', 40, '2021-01-14', 'IMBACUAN.MARIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1001', '51779363', 53, '2021-01-14', 'IMBACUAN.MARIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1010', '19472641', 40, '2021-01-14', 'LEON.FERNANDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1010', '19472641', 53, '2021-01-14', 'LEON.FERNANDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 5, '1010', '1073502330', 40, '2021-01-14', 'TACHACK.YENY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 5, '1010', '1073502330', 53, '2021-01-14', 'TACHACK.YENY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1020', '20994213', 40, '2021-01-14', 'GARCIA.CONSTANZA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 12, '1020', '1078370117', 53, '2021-01-19', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1080', '6761082', 40, '2021-01-20', 'RODRIGUEZ.COSME');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1080', '6761082', 53, '2021-01-20', 'RODRIGUEZ.COSME');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 8, '1032', '3230188', 40, '2021-01-20', 'CASAS.CAMILO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 8, '1032', '3230188', 53, '2021-01-20', 'CASAS.CAMILO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1032', '41633241', 40, '2021-01-20', 'CORTES.EDITH');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1032', '41633241', 53, '2021-01-20', 'CORTES.EDITH');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1032', '53139563', 40, '2021-01-20', 'GARCIA.TITA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1032', '53139563', 53, '2021-01-20', 'GARCIA.TITA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1032', '35424054', 40, '2021-01-20', 'HERNANDEZ.NIDIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1032', '35424054', 53, '2021-01-20', 'HERNANDEZ.NIDIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 5, '1032', '20983344', 40, '2021-01-20', 'RODRIGUEZ.NIDIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 5, '1032', '20983344', 53, '2021-01-20', 'RODRIGUEZ.NIDIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 6, '1032', '1070952561', 40, '2021-01-20', 'ROJAS.JENNIFER');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 6, '1032', '1070952561', 53, '2021-01-20', 'ROJAS.JENNIFER');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 7, '1032', '52863676', 40, '2021-01-20', 'TAMAYO.ANA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 7, '1032', '52863676', 53, '2021-01-20', 'TAMAYO.ANA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 5, '1030', '1078371179', 1, '2021-01-21', 'GOMEZ.SANDRA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 5, '1030', '1078371179', 53, '2021-01-21', 'GOMEZ.SANDRA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 6, '1030', '80240260', 1, '2021-01-21', 'CRUZ.OMAR');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 6, '1030', '80240260', 53, '2021-01-21', 'CRUZ.OMAR');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 7, '1060', '1078371056', 1, '2021-01-21', 'TORRES.SERGIO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 7, '1060', '1078371056', 53, '2021-01-21', 'TORRES.SERGIO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1050', '52773181', 40, '2021-01-21', 'SAENZ.LILIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1050', '52773181', 53, '2021-01-21', 'SAENZ.LILIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1080', '1078368051', 40, '2021-01-21', 'GONZALEZ.JUANITA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1080', '1078368051', 53, '2021-01-21', 'GONZALEZ.JUANITA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1100', '52273033', 40, '2021-01-25', 'AZA.GRACIELA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1100', '52273033', 53, '2021-01-25', 'AZA.GRACIELA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1050', '20994404', 40, '2021-01-25', 'CASTAÑEDA.NUBIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1050', '20994404', 53, '2021-01-25', 'CASTAÑEDA.NUBIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '0998', '1111000222333', 5, '2021-01-25', 'PASTOR.HERNAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '0998', '1111000222333', 40, '2021-01-25', 'PASTOR.HERNAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '0998', '1111000222333', 53, '2021-01-25', 'PASTOR.HERNAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1060', '80409393', 40, '2021-01-25', 'LEGUIZAMON.JORGE');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1060', '80409393', 53, '2021-01-25', 'LEGUIZAMON.JORGE');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1021', '20688375', 40, '2021-01-25', 'BERENICE.BELTRAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1021', '20688375', 53, '2021-01-25', 'BERENICE.BELTRAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1021', '20688375', 40, '2021-01-25', 'BERENICE.BELTRAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 2, '1021', '20688375', 53, '2021-01-25', 'BERENICE.BELTRAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '0998', '1111000222333', 40, '2021-01-25', 'PASTOR.HERNAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '0998', '1111000222333', 53, '2021-01-25', 'PASTOR.HERNAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '0998', '1111000222333', 40, '2021-01-26', 'PASTOR.HERNAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '0998', '1111000222333', 53, '2021-01-26', 'PASTOR.HERNAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 6, '1050', '1078367049', 40, '2021-01-26', 'ZORNOSA.HERNAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 6, '1050', '1078367049', 53, '2021-01-26', 'ZORNOSA.HERNAN');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 7, '1030', '1076623571', 1, '2021-01-26', 'PINEDA.EDUARDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 7, '1030', '1076623571', 53, '2021-01-26', 'PINEDA.EDUARDO');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '0998', '1078370594', 1, '2021-01-27', 'JOHAN.BULLA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '0998', '1078370594', 53, '2021-01-27', 'JOHAN.BULLA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1050', '20994404', 40, '2021-01-27', 'CASTANEDA.NUBIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1050', '20994404', 53, '2021-01-27', 'CASTANEDA.NUBIA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1021', '1078370594', 3, '2021-01-27', 'JOHAN.BULLA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1021', '1078370594', 40, '2021-01-27', 'JOHAN.BULLA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1021', '1078370594', 53, '2021-01-27', 'JOHAN.BULLA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1021', '1078370594', 40, '2021-01-27', 'JOHAN.BULLA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1021', '1078370594', 53, '2021-01-27', 'JOHAN.BULLA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1020', '20994822', 40, '2021-01-27', 'ARIAS.ROSA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1020', '20994822', 53, '2021-01-27', 'ARIAS.ROSA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1020', '20994822', 40, '2021-01-27', 'ARIAS.ROSA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 3, '1020', '20994822', 53, '2021-01-27', 'ARIAS.ROSA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1060', '80409393', 40, '2021-01-27', 'LEGUIZAMON.JORGE');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 4, '1060', '80409393', 53, '2021-01-27', 'LEGUIZAMON.JORGE');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 8, '1100', '20994596', 40, '2021-01-28', 'PASTOR.NORA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 8, '1100', '20994596', 53, '2021-01-28', 'PASTOR.NORA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 13, '1020', '1077974909', 1, '2021-01-28', 'RODRIGUEZ.LEIDY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 13, '1020', '1077974909', 53, '2021-01-28', 'RODRIGUEZ.LEIDY');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1080', '6761082', 40, '2021-01-28', 'RODRIGUEZ.COSME');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1080', '6761082', 53, '2021-01-28', 'RODRIGUEZ.COSME');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 6, '1080', '52020496', 40, '2021-01-28', 'RAMIREZ.VIVIANA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 6, '1080', '52020496', 53, '2021-01-28', 'RAMIREZ.VIVIANA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1070', '20994603', 40, '2021-01-29', 'ROMERO.DIANA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1070', '20994603', 53, '2021-01-29', 'ROMERO.DIANA');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '1070', '20994603', 40, '2021-01-29', 'ROMERO.DIANA');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '1070', '20994603', 53, '2021-01-29', 'ROMERO.DIANA');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 40, '2021-02-01', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 53, '2021-02-01', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1020', '20994213', 40, '2021-02-09', 'GARCIA.CONSTANZA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1020', '20994213', 53, '2021-02-09', 'GARCIA.CONSTANZA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 7, '1032', '52863676', 40, '2021-02-11', 'TAMAYO.ANA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 7, '1032', '52863676', 53, '2021-02-11', 'TAMAYO.ANA');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 40, '2021-02-17', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 53, '2021-02-17', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 40, '2021-02-17', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 1, '0998', '1234567890', 53, '2021-02-17', 'ADMON');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1020', '20994213', 40, '2021-02-17', 'GARCIA.CONSTANZA');
INSERT INTO sgd_ush_usuhistorico VALUES (3, '998', '1111000222333', 1, '1020', '20994213', 53, '2021-02-17', 'GARCIA.CONSTANZA');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 12, '1020', '1078370117', 40, '2021-02-22', 'PAOLA.RODRIGUEZ');
INSERT INTO sgd_ush_usuhistorico VALUES (1, '998', '1234567890', 12, '1020', '1078370117', 53, '2021-02-22', 'PAOLA.RODRIGUEZ');

--
-- Data for Name: sgd_usm_usumodifica; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_usm_usumodifica VALUES (47, 'Quito permiso impresion');
INSERT INTO sgd_usm_usumodifica VALUES (43, 'Otorgo permiso prestamo de documentos');
INSERT INTO sgd_usm_usumodifica VALUES (44, 'Quito permiso prestamo de documentos');
INSERT INTO sgd_usm_usumodifica VALUES (45, 'Otorgo permiso digitalizacion de documentos');
INSERT INTO sgd_usm_usumodifica VALUES (46, 'Quito permiso digitalizacion de documentos');
INSERT INTO sgd_usm_usumodifica VALUES (48, 'Otorgo permiso modificaciones');
INSERT INTO sgd_usm_usumodifica VALUES (49, 'Quito permiso modificaciones');
INSERT INTO sgd_usm_usumodifica VALUES (50, 'Cambio de perfil');
INSERT INTO sgd_usm_usumodifica VALUES (1, 'Creacion de usuario');
INSERT INTO sgd_usm_usumodifica VALUES (51, 'Otorgo permiso tablas retencion documental');
INSERT INTO sgd_usm_usumodifica VALUES (52, 'Quito permiso tablas retencion documental');
INSERT INTO sgd_usm_usumodifica VALUES (3, 'Cambio dependencia');
INSERT INTO sgd_usm_usumodifica VALUES (4, 'Cambio cedula');
INSERT INTO sgd_usm_usumodifica VALUES (5, 'Cambio nombre');
INSERT INTO sgd_usm_usumodifica VALUES (7, 'Cambio ubicacion');
INSERT INTO sgd_usm_usumodifica VALUES (8, 'Cambio piso');
INSERT INTO sgd_usm_usumodifica VALUES (9, 'Cambio estado');
INSERT INTO sgd_usm_usumodifica VALUES (10, 'Otorgo permiso radicacion entrada');
INSERT INTO sgd_usm_usumodifica VALUES (11, 'Otorgo permisos radicacion de entrada');
INSERT INTO sgd_usm_usumodifica VALUES (12, 'Quito permiso administracion sistema');
INSERT INTO sgd_usm_usumodifica VALUES (13, 'Otorgo permiso administracion sistema');
INSERT INTO sgd_usm_usumodifica VALUES (14, 'Quito permiso administracion archivo');
INSERT INTO sgd_usm_usumodifica VALUES (15, 'Otorgo permiso administracion archivo');
INSERT INTO sgd_usm_usumodifica VALUES (16, 'Habilitado como usuario nuevo');
INSERT INTO sgd_usm_usumodifica VALUES (17, 'Habilitado como usuario antiguo con clave');
INSERT INTO sgd_usm_usumodifica VALUES (18, 'Cambio nivel');
INSERT INTO sgd_usm_usumodifica VALUES (19, 'Otorgo permiso radicacion salida');
INSERT INTO sgd_usm_usumodifica VALUES (20, 'Otorgo permiso impresion');
INSERT INTO sgd_usm_usumodifica VALUES (21, 'Otorgo permiso radicacion masiva');
INSERT INTO sgd_usm_usumodifica VALUES (22, 'Quito permiso radicacion masiva');
INSERT INTO sgd_usm_usumodifica VALUES (23, 'Quito permiso devoluciones de correo');
INSERT INTO sgd_usm_usumodifica VALUES (24, 'Otorgo permiso devoluciones de correo');
INSERT INTO sgd_usm_usumodifica VALUES (25, 'Otorgo permiso de solicitud de anulacion');
INSERT INTO sgd_usm_usumodifica VALUES (26, 'Otorgo permiso de anulacion');
INSERT INTO sgd_usm_usumodifica VALUES (27, 'Otorgo permiso de solicitud de anulacion y anulacion');
INSERT INTO sgd_usm_usumodifica VALUES (28, 'Quito permiso radicacion memorandos');
INSERT INTO sgd_usm_usumodifica VALUES (29, 'Otorgo permiso radicacion memorandos');
INSERT INTO sgd_usm_usumodifica VALUES (30, 'Quito permiso radicacion resoluciones');
INSERT INTO sgd_usm_usumodifica VALUES (31, 'Otorgo permiso radicacion resoluciones');
INSERT INTO sgd_usm_usumodifica VALUES (33, 'Quito permiso envio de correo');
INSERT INTO sgd_usm_usumodifica VALUES (34, 'Otorgo permiso envio de correo');
INSERT INTO sgd_usm_usumodifica VALUES (35, 'Otorgo permiso radicacion de salida ');
INSERT INTO sgd_usm_usumodifica VALUES (39, 'Cambio extension');
INSERT INTO sgd_usm_usumodifica VALUES (40, 'Cambio email');
INSERT INTO sgd_usm_usumodifica VALUES (41, 'Quito permisos radicacion entrada');
INSERT INTO sgd_usm_usumodifica VALUES (42, 'Quito permisos de solicitud de anulacion y anulaciones');
INSERT INTO sgd_usm_usumodifica VALUES (53, 'Cambio de rol');
INSERT INTO sgd_usm_usumodifica VALUES (54, 'Se asigno rol');
INSERT INTO sgd_usm_usumodifica VALUES (80, 'Otorgo permiso de firma qr');
INSERT INTO sgd_usm_usumodifica VALUES (81, 'Quito permiso de firma qr');
INSERT INTO sgd_usm_usumodifica VALUES (82, 'Se cambia los permisos del Rol');
INSERT INTO sgd_usm_usumodifica VALUES (83, 'Otorgo permiso de descarga de archivos originales');
INSERT INTO sgd_usm_usumodifica VALUES (84, 'Quito permiso de descarga de archivos originales');
INSERT INTO sgd_usm_usumodifica VALUES (85, 'Otorgo permiso de transferencias documentales');
INSERT INTO sgd_usm_usumodifica VALUES (87, 'Otorgo permiso de publicar documentos');
INSERT INTO sgd_usm_usumodifica VALUES (88, 'Quito permiso de publicar documentos');
INSERT INTO sgd_usm_usumodifica VALUES (86, 'Quito permiso de descarga de archivos originales');

--
-- Data for Name: sphinx_index_meta; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sphinx_index_meta VALUES ('sph_idx_posts_main', 1, '2021-01-29 12:10:01.196636-05');

--
-- Name: sphinx_index_meta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('sphinx_index_meta_id_seq', 11, true);

--
-- Data for Name: tipo_doc_identificacion; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO tipo_doc_identificacion VALUES (0, 'Cedula de Ciudadania');
INSERT INTO tipo_doc_identificacion VALUES (1, 'Tarjeta de Identidad');
INSERT INTO tipo_doc_identificacion VALUES (2, 'Cedula de Extranjería');
INSERT INTO tipo_doc_identificacion VALUES (3, 'Pasaporte');
INSERT INTO tipo_doc_identificacion VALUES (4, 'Nit');
INSERT INTO tipo_doc_identificacion VALUES (5, 'NUIR');

--
-- Data for Name: tipo_poblacion_pqrs; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO tipo_poblacion_pqrs VALUES (1, 'Adulto Mayor');
INSERT INTO tipo_poblacion_pqrs VALUES (2, 'Ciudadano Rural');
INSERT INTO tipo_poblacion_pqrs VALUES (3, 'Desplazado');
INSERT INTO tipo_poblacion_pqrs VALUES (5, 'Persona en condición de Discapacidad');
INSERT INTO tipo_poblacion_pqrs VALUES (6, 'Persona en situación de Pobreza');
INSERT INTO tipo_poblacion_pqrs VALUES (7, 'Victima de violencia');
INSERT INTO tipo_poblacion_pqrs VALUES (8, 'LGBTI');
INSERT INTO tipo_poblacion_pqrs VALUES (9, 'Madre cabeza de familia');
INSERT INTO tipo_poblacion_pqrs VALUES (10, 'Ninguna de las Anteriores');
INSERT INTO tipo_poblacion_pqrs VALUES (11, 'Negritud');
INSERT INTO tipo_poblacion_pqrs VALUES (12, 'Otros');
INSERT INTO tipo_poblacion_pqrs VALUES (13, 'Afrodecendiente');
INSERT INTO tipo_poblacion_pqrs VALUES (14, 'Veteranos de la Fuerza Pública');
INSERT INTO tipo_poblacion_pqrs VALUES (15, 'Adolescente');
INSERT INTO tipo_poblacion_pqrs VALUES (16, 'Mujer Gestante');
INSERT INTO tipo_poblacion_pqrs VALUES (4, 'Poblacion Indigena');
INSERT INTO tipo_poblacion_pqrs VALUES (17, 'N/A');

--
-- Name: tipo_poblacion_pqrs_id_tp_pqrs_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('tipo_poblacion_pqrs_id_tp_pqrs_seq', 6, true);

--
-- Data for Name: tipo_remitente; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO tipo_remitente VALUES (1, 'Otras empresas', 0);
INSERT INTO tipo_remitente VALUES (3, 'Predio', 0);
INSERT INTO tipo_remitente VALUES (5, 'Otros', 0);
INSERT INTO tipo_remitente VALUES (6, 'Funcionario', 10);
INSERT INTO tipo_remitente VALUES (2, 'Persona natural', 10);
INSERT INTO tipo_remitente VALUES (4, 'Persona Jurídica', 10);

--
-- Data for Name: tipo_tratamiento_pqrs; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO tipo_tratamiento_pqrs VALUES (1, 'Señor');
INSERT INTO tipo_tratamiento_pqrs VALUES (2, 'Señora');
INSERT INTO tipo_tratamiento_pqrs VALUES (3, 'Ingeniero');
INSERT INTO tipo_tratamiento_pqrs VALUES (4, 'Ingeniera');

--
-- Name: tipo_tratamiento_pqrs_id_tipo_t_pqrs_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('tipo_tratamiento_pqrs_id_tipo_t_pqrs_seq', 1, false);

--
-- Data for Name: tipo_usuario_grupo; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO tipo_usuario_grupo VALUES (1, 'Ciudadano', 1);
INSERT INTO tipo_usuario_grupo VALUES (2, 'Entes de Control', 1);
INSERT INTO tipo_usuario_grupo VALUES (3, 'N/A', 1);

--
-- Name: tipo_usuario_grupo_id_grupo_tipo_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('tipo_usuario_grupo_id_grupo_tipo_usuario_seq', 1, false);

--
-- Data for Name: tipos_comunicaciones; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO tipos_comunicaciones VALUES (1, 'Enviadas');
INSERT INTO tipos_comunicaciones VALUES (2, 'Recibidas Internas');
INSERT INTO tipos_comunicaciones VALUES (3, 'Recibidas Externas');

--
-- Name: tipos_comunicaciones_id_tipos_comunicaciones_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('tipos_comunicaciones_id_tipos_comunicaciones_seq', 1, false);

--
-- Data for Name: sgd_ciu_ciudadano; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO sgd_ciu_ciudadano VALUES (0, 1, 'ANONIMO', 'Carrera 1 # 1 1 Sur', 'ANONIMO', NULL, '1111111111', NULL, 1, 11, '11111111111', 1, 170, 1, 1, 1, 1, 1, 3, 10, 1);

--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO "user" VALUES (1, 'anonimo', 'TKx14J91w_WJ0h2rmeORsD9XqksqCMmf', '$2y$13$p0MVeH7Q8b.nFv2fWWjGP.4NPv6SuCYEqCxZJwRMqkj4zsW97IV9i', NULL, 'soporte@skinatech.com', 10, 1577449952, 1577449952, 'WpKeD2Rw6-r7W9DWlrliYWMjbzvwtGkQ_1577449949', 2);

--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('user_id_seq', 2, false);

--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: orfeo62usr
--

INSERT INTO usuario VALUES (1, '100', 'RECEPCION.INVM', '2021-02-24', '02cb962ac59075b964b07152d2', '1', 'USUARIO RECEPCIÓN INVIMA', '0', '0', '1', '1022982736', 3, '210301091020o1921688236RECEPC', '2021-03-01', NULL, NULL, 'soporte@skinatech.com', 'Zona franca bodega 2', NULL, 2, 0, 0, 0, NULL, NULL, NULL, NULL, 3, 0, 0, 0, 0, NULL, NULL, NULL, 1, NULL, 0, 0, 0, 0, 1, 1, 0, 2, NULL, 170, 1, 0, '1', '1', NULL, NULL, 0, 0, 1, 0, 0, 0, 0, 3, 1, 0, 2, 1, 0, 0, NULL, 0, 0, 0, 0);
INSERT INTO usuario VALUES (2, '101', 'JMGAMEZ', '2021-04-13', '02cb962ac59075b964b07152d2', '1', 'Maritza Gamez', '0', '0', '1', '1022982735', 3, '210413050722o1921688236JMGAME', '2021-04-13', NULL, NULL, 'maritzagamez0106g@gmail.com', NULL, NULL, 2, 0, 0, 0, NULL, NULL, NULL, NULL, 3, 0, 0, 0, 0, NULL, NULL, NULL, 1, NULL, 0, 0, 0, 0, 1, 1, 0, 2, NULL, 170, 1, 0, '1', '1', NULL, NULL, 0, 0, 1, 0, 0, 0, 0, 3, 1, 0, 2, 1, 0, 0, NULL, 0, 0, 0, 0);
INSERT INTO usuario VALUES (1, '999', 'DSALIDA', '2019-11-05', '02cb962ac59075b964b07152d2', '1', 'Usuario de Archivo', '1', '1', '1', '12345678909', 5, '210413053258o1921688236DSALID', '2021-04-13', NULL, NULL, 'jmgamez@sinatech.com', NULL, NULL, 0, 2, 1, 1, NULL, NULL, NULL, 3, 3, 3, 1, 1, 2, NULL, NULL, NULL, 2, NULL, 1, 2, 0, 1, 1, 1, 0, 2, '--', 170, 1, 0, '1', '1', 0, 1, 0, 0, 1, 0, 1, 3, 0, 2, 1, 1, 3, 1, 1, 0, 0, 0, 1, 0, 0);
INSERT INTO usuario VALUES (1, '101', 'RECEPCION.SKN', '2021-02-24', '123', '1', 'USUARIO RECEPCIÓN SKN', '0', '0', '0', '1022982737', 3, NULL, NULL, NULL, NULL, 'jmgamez@skinatech.com', NULL, NULL, 2, 1, 0, 0, NULL, NULL, NULL, NULL, 3, 0, 0, 0, 0, NULL, NULL, NULL, 1, NULL, 0, 2, 0, 1, 1, 1, 0, 2, NULL, 170, 1, 0, '1', '1', NULL, NULL, 0, 0, 0, 0, 1, 0, 0, 1, 1, 0, 2, 1, 0, 1, NULL, 0, 1, 0, 0);
INSERT INTO usuario VALUES (1, '998', 'ADMON', '2019-11-05', '1232f297a57a5a743894a0e4a8', '1', 'Usuario de Soporte', '1', '1', '1', '1234567890', 5, '210428075608o1921688236ADMON', '2021-04-28', NULL, NULL, 'soporte.skinatech@gmail.com', NULL, NULL, 0, 2, 1, 1, NULL, '1', NULL, 3, 3, 3, 1, 1, 2, NULL, NULL, NULL, 2, NULL, 1, 2, 0, 1, 1, 1, 0, 2, '--', 170, 1, 0, '1', '1', 0, 1, 0, 0, 1, 0, 1, 3, 0, 2, 1, 1, 3, 1, 1, 1, 1, 1, 1, 0, 0);

--
-- Name: usuarios_grupos_informados_id_usuarios_grupos_informados_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('usuarios_grupos_informados_id_usuarios_grupos_informados_seq', 1, false);

--
-- Name: usuarios_grupos_informados_seq; Type: SEQUENCE SET; Schema: public; Owner: orfeo62usr
--

SELECT pg_catalog.setval('usuarios_grupos_informados_seq', 45, true);

--
-- PostgreSQL database dump complete
--
