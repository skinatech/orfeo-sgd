-- MySQL dump 10.14  Distrib 5.5.59-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: orfeodb
-- ------------------------------------------------------
-- Server version	5.5.59-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `_sequence`
--

DROP TABLE IF EXISTS `_sequence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_sequence` (
  `idSequence` int(2) NOT NULL AUTO_INCREMENT,
  `seq_name` varchar(50) NOT NULL,
  `seq_val` int(11) NOT NULL DEFAULT '0',
  `seq_increment` int(10) unsigned NOT NULL DEFAULT '1',
  `seq_minvalue` int(10) unsigned NOT NULL DEFAULT '0',
  `seq_restart_value` int(30) NOT NULL,
  PRIMARY KEY (`idSequence`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_sequence`
--

LOCK TABLES `_sequence` WRITE;
/*!40000 ALTER TABLE `_sequence` DISABLE KEYS */;
INSERT INTO `_sequence` VALUES (1,'secr_tp1_',3,1,1,0),(2,'secr_tp1_998',1,1,1,0),(3,'secr_tp2_',8,1,1,0),(4,'secr_tp2_998',1,1,1,0),(5,'secr_tp4_',1,1,1,0),(6,'num_resol_dtc',1,1,1,0),(7,'num_resol_dtn',1,1,1,0),(8,'num_resol_dtoc',1,1,1,0),(9,'num_resol_dtor',1,1,1,0),(10,'num_resol_dts',1,1,1,0),(11,'num_resol_gral',1,1,1,0),(12,'plsql_profiler_run umeric',1,1,1,0),(13,'pres_seq',1,1,1,0),(14,'sec_bodega_empresas',10,1,1,0),(15,'sec_central',1,1,1,0),(16,'sec_ciu_ciudadano',3,1,1,0),(17,'sec_def_contactos',2,1,1,0),(18,'sec_dir_direcciones',9,1,1,0),(19,'sec_edificio',1,1,1,0),(20,'sec_fondo',1,1,1,0),(21,'sec_inv',1,1,1,0),(22,'sec_oem_empresas',1,1,1,0),(23,'sec_planilla',1,1,1,0),(24,'sec_planilla_envio',1,1,1,0),(25,'sec_planilla_tx',1,1,1,0),(26,'sec_prestamo',1,1,1,0),(27,'sec_sgd_hfld_histflujodoc',1,1,1,0),(28,'sgd_anar_secue',1,1,1,0),(29,'sgd_ciu_secue',1,1,1,0),(30,'sgd_dir_secue',1,1,1,0),(31,'sgd_hmtd_secue',1,1,1,0),(32,'sgd_info_secue',1,1,1,0),(33,'sgd_mat_secue',1,1,1,0),(34,'sgd_oem_secue',1,1,1,0),(35,'sgd_plg_secue',1,1,1,0),(36,'sgd_tvd_depe_id',1,1,1,0);
/*!40000 ALTER TABLE `_sequence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anexos`
--

DROP TABLE IF EXISTS `anexos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anexos` (
  `anex_radi_nume` varchar(15) NOT NULL,
  `anex_codigo` varchar(20) NOT NULL,
  `anex_tipo` decimal(4,0) NOT NULL,
  `anex_tamano` decimal(10,0) DEFAULT NULL,
  `anex_solo_lect` varchar(1) NOT NULL,
  `anex_creador` varchar(50) NOT NULL,
  `anex_desc` varchar(512) DEFAULT NULL,
  `anex_numero` decimal(5,0) NOT NULL,
  `anex_nomb_archivo` varchar(50) NOT NULL,
  `anex_borrado` varchar(1) NOT NULL,
  `anex_origen` decimal(1,0) DEFAULT '0',
  `anex_ubic` varchar(15) DEFAULT NULL,
  `anex_salida` decimal(1,0) DEFAULT '0',
  `radi_nume_salida` varchar(15) DEFAULT NULL,
  `anex_radi_fech` datetime DEFAULT NULL,
  `anex_estado` decimal(1,0) DEFAULT '0',
  `usua_doc` varchar(14) DEFAULT NULL,
  `sgd_rem_destino` decimal(1,0) DEFAULT '0',
  `anex_fech_envio` datetime DEFAULT NULL,
  `sgd_dir_tipo` decimal(4,0) DEFAULT NULL,
  `anex_fech_impres` datetime DEFAULT NULL,
  `anex_depe_creador` varchar(5) DEFAULT NULL,
  `sgd_doc_secuencia` decimal(15,0) DEFAULT NULL,
  `sgd_doc_padre` varchar(20) DEFAULT NULL,
  `sgd_arg_codigo` decimal(2,0) DEFAULT NULL,
  `sgd_tpr_codigo` decimal(4,0) DEFAULT NULL,
  `sgd_deve_codigo` decimal(2,0) DEFAULT NULL,
  `sgd_deve_fech` date DEFAULT NULL,
  `sgd_fech_impres` datetime DEFAULT NULL,
  `anex_fech_anex` datetime DEFAULT NULL,
  `anex_depe_codi` varchar(5) DEFAULT NULL,
  `sgd_pnufe_codi` decimal(4,0) DEFAULT NULL,
  `sgd_dnufe_codi` decimal(4,0) DEFAULT NULL,
  `anex_usudoc_creador` varchar(15) DEFAULT NULL,
  `sgd_fech_doc` date DEFAULT NULL,
  `sgd_apli_codi` decimal(4,0) DEFAULT NULL,
  `sgd_trad_codigo` decimal(2,0) DEFAULT NULL,
  `sgd_dir_direccion` varchar(150) DEFAULT NULL,
  `sgd_exp_numero` varchar(18) DEFAULT NULL,
  `numero_doc` varchar(15) DEFAULT NULL,
  `sgd_srd_codigo` varchar(3) DEFAULT NULL,
  `sgd_sbrd_codigo` varchar(4) DEFAULT NULL,
  `anex_num_hoja` decimal(10,0) DEFAULT NULL,
  `texto_archivo_anex` text,
  `anex_idarch_version` decimal(3,0) DEFAULT NULL,
  `anex_num_version` decimal(2,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anexos`
--

LOCK TABLES `anexos` WRITE;
/*!40000 ALTER TABLE `anexos` DISABLE KEYS */;
INSERT INTO `anexos` VALUES ('20189980000012','2018998000001200001',24,22,'N','ADMON','Respuesta a comunicaciÃ³n 20189980000012 de fecha 2018-04-20.',1,'120189980000012_00001.docx','N',0,NULL,1,NULL,NULL,0,NULL,1,NULL,1,NULL,'998',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-04-20 13:59:37',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL),('20189980000012','2018998000001200002',24,22,'S','ADMON','seWae6Ie',2,'120189980000012_00002.docx','N',0,NULL,1,'20189980000032','2018-04-20 14:11:04',3,NULL,1,'2018-04-20 14:11:04',1,NULL,'998',NULL,NULL,NULL,NULL,NULL,NULL,'2018-04-20 14:11:04','2018-04-20 14:06:41',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL),('20189980000012','2018998000001200003',24,22,'S','ADMON','seWae6Ie',3,'120189980000012_00003.docx','N',0,NULL,1,'20189980000052','2018-04-20 14:11:56',3,NULL,1,'2018-04-20 14:11:56',1,NULL,'998',NULL,NULL,NULL,NULL,NULL,NULL,'2018-04-20 14:11:56','2018-04-20 14:11:47',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `anexos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anexos_historico`
--

DROP TABLE IF EXISTS `anexos_historico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anexos_historico` (
  `anex_hist_anex_codi` varchar(20) NOT NULL,
  `anex_hist_num_ver` decimal(4,0) NOT NULL,
  `anex_hist_tipo_mod` varchar(2) NOT NULL,
  `anex_hist_usua` varchar(15) NOT NULL,
  `anex_hist_fecha` date NOT NULL,
  `usua_doc` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anexos_historico`
--

LOCK TABLES `anexos_historico` WRITE;
/*!40000 ALTER TABLE `anexos_historico` DISABLE KEYS */;
/*!40000 ALTER TABLE `anexos_historico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anexos_tipo`
--

DROP TABLE IF EXISTS `anexos_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anexos_tipo` (
  `anex_tipo_codi` decimal(4,0) NOT NULL,
  `anex_tipo_ext` varchar(10) NOT NULL,
  `anex_tipo_desc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anexos_tipo`
--

LOCK TABLES `anexos_tipo` WRITE;
/*!40000 ALTER TABLE `anexos_tipo` DISABLE KEYS */;
INSERT INTO `anexos_tipo` VALUES (1,'doc','Word'),(2,'xls','Excel'),(3,'ppt','PowerPoint'),(4,'tif','Imagen Tif'),(5,'jpg','Imagen jpg'),(6,'gif','Imagen gif'),(7,'pdf','Acrobat Reader'),(8,'txt','Documento txt'),(9,'zip','Comprimido'),(10,'rtf','Rich Text Format (rtf)'),(11,'dia','Dia(Diagrama)'),(12,'zargo','Argo(Diagrama)'),(13,'csv','csv (separado por comas)'),(14,'odt','OpenDocument Text'),(20,'avi','.avi (Video)'),(21,'mpg','.mpg (video)'),(23,'tar','.tar (Comprimido)'),(24,'docx','Microsoft Word 2010+'),(25,'xlsx','Microsoft Excel 2010+'),(26,'pptx','Microsoft Power Point 2010+');
/*!40000 ALTER TABLE `anexos_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bodega_empresas`
--

DROP TABLE IF EXISTS `bodega_empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bodega_empresas` (
  `nombre_de_la_empresa` varchar(300) DEFAULT NULL,
  `nuir` varchar(13) DEFAULT NULL,
  `nit_de_la_empresa` varchar(80) DEFAULT NULL,
  `sigla_de_la_empresa` varchar(80) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `codigo_del_departamento` varchar(500) DEFAULT NULL,
  `codigo_del_municipio` varchar(500) DEFAULT NULL,
  `telefono_1` varchar(500) DEFAULT NULL,
  `telefono_2` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `nombre_rep_legal` varchar(500) DEFAULT NULL,
  `cargo_rep_legal` varchar(500) DEFAULT NULL,
  `identificador_empresa` decimal(5,0) NOT NULL,
  `are_esp_secue` decimal(8,0) NOT NULL,
  `id_cont` decimal(2,0) DEFAULT '1',
  `id_pais` decimal(4,0) DEFAULT '170',
  `activa` decimal(1,0) DEFAULT '1',
  `flag_rups` varchar(10) DEFAULT NULL,
  `codigo_suscriptor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`identificador_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bodega_empresas`
--

LOCK TABLES `bodega_empresas` WRITE;
/*!40000 ALTER TABLE `bodega_empresas` DISABLE KEYS */;
INSERT INTO `bodega_empresas` VALUES ('AGENCIA NACIONAL DE INFRAESTUCTURA',NULL,'830.125.996.9','ANI','Calle 24 A # 59 - 42 Edificio T3 Torre 4 Piso 2','11','1','',NULL,'contactenos@ani.gov.co','--',NULL,1,8,1,170,1,NULL,NULL),('SKINA TECNOLOGIES SAS','','10278597','SKINA','Carrera 64 No 96-17','11','1','2226-2080','+ 57 300 469-38','info@skinatech.com','JAIME ENRIQUE GOMEZ',NULL,2,8,1,170,1,NULL,''),('CONCONCRETO',NULL,'890.901.110-8','--','CARRERA 6 No. 115- 65 Oficina 409 F','11','1','',NULL,'contactenos@conconcreto.com','--',NULL,3,8,1,170,1,NULL,NULL),('CONSORCIO RUTA 40',NULL,'--','RUTA 40','\"Calle 99 N°14-49','11','1','',NULL,'Torre EAR\"','--',NULL,4,8,1,170,1,NULL,NULL),('DEPARTAMENTO NACIONAL DE ESTADISTICA',NULL,'899.99.9027-8','DANE','Cra. 59 #26-60','11','1','',NULL,'contacto@dane.gov.co','--',NULL,5,8,1,170,1,NULL,NULL),('MINISTERIO DE TRANSPORTE',NULL,'899.999.055-4','--','Calle 24 # 62 - 49 Piso 9','11','1','',NULL,'notificacionesjudiciales@mintransporte.gov.co','--',NULL,6,8,1,170,1,NULL,NULL),('SUPERINTENDENCIA DE PUERTOS Y TRANSPORTE',NULL,'800.170.433-6','--','CALLE 63 No. 9 A - 45 Pisos 2 y 3','11','1','',NULL,'atencionciudadano@supertransporte.gov.co','--',NULL,7,8,1,170,1,NULL,NULL);
/*!40000 ALTER TABLE `bodega_empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `borrar_carpeta_personalizada`
--

DROP TABLE IF EXISTS `borrar_carpeta_personalizada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `borrar_carpeta_personalizada` (
  `carp_per_codi` decimal(2,0) NOT NULL,
  `carp_per_usu` varchar(15) NOT NULL,
  `carp_per_desc` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrar_carpeta_personalizada`
--

LOCK TABLES `borrar_carpeta_personalizada` WRITE;
/*!40000 ALTER TABLE `borrar_carpeta_personalizada` DISABLE KEYS */;
/*!40000 ALTER TABLE `borrar_carpeta_personalizada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `borrar_empresa_esp`
--

DROP TABLE IF EXISTS `borrar_empresa_esp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `borrar_empresa_esp` (
  `eesp_codi` decimal(7,0) NOT NULL,
  `eesp_nomb` varchar(150) NOT NULL,
  `essp_nit` varchar(13) DEFAULT NULL,
  `essp_sigla` varchar(30) DEFAULT NULL,
  `depe_codi` varchar(5) DEFAULT NULL,
  `muni_codi` decimal(4,0) DEFAULT NULL,
  `eesp_dire` varchar(50) DEFAULT NULL,
  `eesp_rep_leg` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrar_empresa_esp`
--

LOCK TABLES `borrar_empresa_esp` WRITE;
/*!40000 ALTER TABLE `borrar_empresa_esp` DISABLE KEYS */;
/*!40000 ALTER TABLE `borrar_empresa_esp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carpeta`
--

DROP TABLE IF EXISTS `carpeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carpeta` (
  `carp_codi` decimal(2,0) NOT NULL,
  `carp_desc` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carpeta`
--

LOCK TABLES `carpeta` WRITE;
/*!40000 ALTER TABLE `carpeta` DISABLE KEYS */;
INSERT INTO `carpeta` VALUES (12,'Devueltos'),(11,'Vo.Bo.'),(1,'Salida'),(0,'Entrada'),(4,'PQRS');
/*!40000 ALTER TABLE `carpeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carpeta_per`
--

DROP TABLE IF EXISTS `carpeta_per`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carpeta_per` (
  `usua_codi` decimal(3,0) NOT NULL,
  `depe_codi` varchar(5) NOT NULL,
  `nomb_carp` varchar(50) DEFAULT NULL,
  `desc_carp` varchar(50) DEFAULT NULL,
  `codi_carp` decimal(3,0) DEFAULT '99'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carpeta_per`
--

LOCK TABLES `carpeta_per` WRITE;
/*!40000 ALTER TABLE `carpeta_per` DISABLE KEYS */;
INSERT INTO `carpeta_per` VALUES (1,'998','Masiva','Radicacion Masiva',99),(2,'100','Masiva','Radicacion Masiva',99),(3,'200','Masiva','Radicacion Masiva',99),(4,'300','Masiva','Radicacion Masiva',99),(5,'400','Masiva','Radicacion Masiva',99);
/*!40000 ALTER TABLE `carpeta_per` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centro_poblado`
--

DROP TABLE IF EXISTS `centro_poblado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centro_poblado` (
  `cpob_codi` decimal(4,0) NOT NULL,
  `muni_codi` decimal(4,0) NOT NULL,
  `dpto_codi` decimal(2,0) NOT NULL,
  `cpob_nomb` varchar(100) NOT NULL,
  `cpob_nomb_anterior` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centro_poblado`
--

LOCK TABLES `centro_poblado` WRITE;
/*!40000 ALTER TABLE `centro_poblado` DISABLE KEYS */;
/*!40000 ALTER TABLE `centro_poblado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `columnas`
--

DROP TABLE IF EXISTS `columnas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `columnas` (
  `columna` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `columnas`
--

LOCK TABLES `columnas` WRITE;
/*!40000 ALTER TABLE `columnas` DISABLE KEYS */;
INSERT INTO `columnas` VALUES ('ra_asun');
/*!40000 ALTER TABLE `columnas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `dpto_codi` decimal(3,0) NOT NULL,
  `dpto_nomb` varchar(70) NOT NULL,
  `id_cont` decimal(2,0) DEFAULT '1',
  `id_pais` decimal(4,0) DEFAULT '170'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'TODOS',1,170),(5,'ANTIOQUÍA',1,170),(8,'ATLÁNTICO',1,170),(13,'BOLÍVAR',1,170),(15,'BOYACÁ',1,170),(17,'CALDAS',1,170),(19,'CAUCA',1,170),(20,'CESAR',1,170),(23,'CÓRDOBA',1,170),(25,'CUNDINAMARCA',1,170),(27,'CHOCO',1,170),(41,'HUILA',1,170),(44,'LA GUAJIRA',1,170),(47,'MAGDALENA',1,170),(50,'META',1,170),(52,'NARIÑO',1,170),(54,'NORTE DE SANTANDER',1,170),(63,'QUINDÍO',1,170),(66,'RISARALDA',1,170),(68,'SANTANDER',1,170),(70,'SUCRE',1,170),(73,'TOLIMA',1,170),(76,'VALLE DEL CAUCA',1,170),(81,'ARAUCA',1,170),(85,'CASANARE',1,170),(86,'PUTUMAYO',1,170),(88,'SAN ANDRÉS',1,170),(91,'AMAZONAS',1,170),(94,'GUAINÍA',1,170),(95,'GUAVIARE',1,170),(97,'VAUPÉS',1,170),(99,'VICHADA',1,170),(11,'D.C.',1,170);
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dependencia`
--

DROP TABLE IF EXISTS `dependencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dependencia` (
  `depe_codi` varchar(5) NOT NULL,
  `depe_nomb` varchar(70) NOT NULL,
  `dpto_codi` decimal(2,0) DEFAULT NULL,
  `depe_codi_padre` varchar(5) DEFAULT NULL,
  `muni_codi` decimal(4,0) DEFAULT NULL,
  `depe_codi_territorial` varchar(5) DEFAULT NULL,
  `dep_sigla` varchar(100) DEFAULT NULL,
  `dep_central` decimal(1,0) DEFAULT NULL,
  `dep_direccion` varchar(100) DEFAULT NULL,
  `depe_num_interna` decimal(4,0) DEFAULT NULL,
  `depe_num_resolucion` decimal(4,0) DEFAULT NULL,
  `depe_rad_tp1` varchar(5) DEFAULT NULL,
  `depe_rad_tp2` varchar(5) DEFAULT NULL,
  `id_cont` decimal(2,0) DEFAULT '1',
  `id_pais` decimal(4,0) DEFAULT '170',
  `depe_estado` decimal(1,0) DEFAULT '0',
  `depe_segu` decimal(1,0) DEFAULT NULL,
  `depe_rad_tp4` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependencia`
--

LOCK TABLES `dependencia` WRITE;
/*!40000 ALTER TABLE `dependencia` DISABLE KEYS */;
INSERT INTO `dependencia` VALUES ('998','Dependencia de Prueba',11,'998',1,'998',NULL,1,NULL,NULL,NULL,NULL,NULL,1,170,1,NULL,NULL),('100','Gerencia General',11,'998',1,'998','GG',NULL,'Bogota D.C.',NULL,NULL,NULL,NULL,1,170,1,NULL,NULL),('200','Gestion Administrativa',11,'998',1,'998','GA',NULL,'Bogota D.C',NULL,NULL,NULL,NULL,1,170,1,NULL,NULL),('300','Gestion Comercial',11,'998',1,'998','GC',NULL,'Bogota D.C',NULL,NULL,NULL,NULL,1,170,1,NULL,NULL),('400','Tecnologia de Informacion',11,'998',1,'998','',NULL,'Bogota D.C',NULL,NULL,NULL,NULL,1,170,1,NULL,NULL),('500','Gestion de Soluciones',11,'998',1,'998','GS',NULL,'Bogota D.C',NULL,NULL,NULL,NULL,1,170,1,NULL,NULL),('600','Geston Presupuesto',11,'998',1,'998','GP',NULL,'Bogota D.C',NULL,NULL,NULL,NULL,1,170,1,NULL,NULL),('700','Gerencia de Personal',11,'998',1,'998','GP',NULL,'Bogota D.C',NULL,NULL,NULL,NULL,1,170,1,NULL,NULL);
/*!40000 ALTER TABLE `dependencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dependencia_visibilidad`
--

DROP TABLE IF EXISTS `dependencia_visibilidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dependencia_visibilidad` (
  `codigo_visibilidad` decimal(18,0) NOT NULL,
  `dependencia_visible` varchar(5) NOT NULL,
  `dependencia_observa` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependencia_visibilidad`
--

LOCK TABLES `dependencia_visibilidad` WRITE;
/*!40000 ALTER TABLE `dependencia_visibilidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `dependencia_visibilidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dup_eliminar`
--

DROP TABLE IF EXISTS `dup_eliminar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dup_eliminar` (
  `sgd_oem_codigo` decimal(8,0) NOT NULL,
  `tdid_codi` decimal(2,0) DEFAULT NULL,
  `sgd_oem_oempresa` varchar(150) DEFAULT NULL,
  `sgd_oem_rep_legal` varchar(150) DEFAULT NULL,
  `sgd_oem_nit` varchar(14) DEFAULT NULL,
  `sgd_oem_sigla` varchar(50) DEFAULT NULL,
  `muni_codi` decimal(4,0) DEFAULT NULL,
  `dpto_codi` decimal(2,0) DEFAULT NULL,
  `sgd_oem_direccion` varchar(100) DEFAULT NULL,
  `sgd_oem_telefono` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dup_eliminar`
--

LOCK TABLES `dup_eliminar` WRITE;
/*!40000 ALTER TABLE `dup_eliminar` DISABLE KEYS */;
/*!40000 ALTER TABLE `dup_eliminar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_cod_actualizar`
--

DROP TABLE IF EXISTS `emp_cod_actualizar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_cod_actualizar` (
  `emp_cod_ant` varchar(10) DEFAULT NULL,
  `emp_cod_nue` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_cod_actualizar`
--

LOCK TABLES `emp_cod_actualizar` WRITE;
/*!40000 ALTER TABLE `emp_cod_actualizar` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_cod_actualizar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas_temporal`
--

DROP TABLE IF EXISTS `empresas_temporal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas_temporal` (
  `nombre_de_la_empresa` varchar(160) DEFAULT NULL,
  `nuir` varchar(13) DEFAULT NULL,
  `nit_de_la_empresa` varchar(80) DEFAULT NULL,
  `sigla_de_la_empresa` varchar(80) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `codigo_del_departamento` varchar(500) DEFAULT NULL,
  `codigo_del_municipio` varchar(500) DEFAULT NULL,
  `telefono_1` varchar(500) DEFAULT NULL,
  `telefono_2` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `nombre_rep_legal` varchar(500) DEFAULT NULL,
  `cargo_rep_legal` varchar(500) DEFAULT NULL,
  `identificador_empresa` decimal(5,0) DEFAULT NULL,
  `are_esp_secue` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas_temporal`
--

LOCK TABLES `empresas_temporal` WRITE;
/*!40000 ALTER TABLE `empresas_temporal` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresas_temporal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `esta_codi` decimal(2,0) NOT NULL,
  `esta_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fun_funcionario`
--

DROP TABLE IF EXISTS `fun_funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fun_funcionario` (
  `usua_doc` varchar(14) DEFAULT NULL,
  `usua_fech_crea` date NOT NULL,
  `usua_esta` varchar(10) NOT NULL,
  `usua_nomb` varchar(45) DEFAULT NULL,
  `usua_ext` decimal(4,0) DEFAULT NULL,
  `usua_nacim` date DEFAULT NULL,
  `usua_email` varchar(50) DEFAULT NULL,
  `usua_at` varchar(15) DEFAULT NULL,
  `usua_piso` decimal(2,0) DEFAULT NULL,
  `cedula_ok` char(1) DEFAULT 'n',
  `cedula_suip` varchar(15) DEFAULT NULL,
  `nombre_suip` varchar(45) DEFAULT NULL,
  `observa` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fun_funcionario`
--

LOCK TABLES `fun_funcionario` WRITE;
/*!40000 ALTER TABLE `fun_funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `fun_funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hist_eventos`
--

DROP TABLE IF EXISTS `hist_eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hist_eventos` (
  `depe_codi` varchar(5) NOT NULL,
  `hist_fech` datetime NOT NULL,
  `usua_codi` decimal(10,0) NOT NULL,
  `radi_nume_radi` varchar(15) NOT NULL,
  `hist_obse` varchar(10000) NOT NULL,
  `usua_codi_dest` decimal(10,0) DEFAULT NULL,
  `usua_doc` varchar(14) DEFAULT NULL,
  `usua_doc_old` varchar(15) DEFAULT NULL,
  `sgd_ttr_codigo` decimal(3,0) DEFAULT NULL,
  `hist_usua_autor` varchar(14) DEFAULT NULL,
  `hist_doc_dest` varchar(14) DEFAULT NULL,
  `depe_codi_dest` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hist_eventos`
--

LOCK TABLES `hist_eventos` WRITE;
/*!40000 ALTER TABLE `hist_eventos` DISABLE KEYS */;
INSERT INTO `hist_eventos` VALUES ('998','2018-04-20 13:44:34',1,'20189980000012',' ',1,'1234567890','',2,NULL,'1234567890','998'),('998','2018-04-20 13:45:19',1,'20189980000012','AsignaciÃ³n de TRD',1,'1234567890','',32,NULL,'1234567890','998'),('998','2018-04-20 14:10:49',1,'20189980000022',' ',1,'1234567890','',2,NULL,'1234567890','998'),('998','2018-04-20 14:11:04',1,'20189980000032',' ',1,'1234567890','',2,NULL,'1234567890','998'),('998','2018-04-20 14:11:53',1,'20189980000042',' ',1,'1234567890','',2,NULL,'1234567890','998'),('998','2018-04-20 14:11:56',1,'20189980000052',' ',1,'1234567890','',2,NULL,'1234567890','998'),('998','2018-05-17 11:03:22',1,'20189980000062',' ',1,'1234567890','',2,NULL,'1234567890','998'),('998','2018-05-17 11:37:04',1,'20189980000012','Imagen asociada 20189980000012',1,'1234567890','',42,NULL,'1234567890','998'),('998','2018-05-17 11:41:19',1,'20189980000012','Se reasigna de forma correcta',1,'1234567890','',9,NULL,'1234567890','998'),('998','2018-05-17 16:20:49',1,'20189980000062','AsignaciÃ³n de TRD',1,'1234567890','',32,NULL,'1234567890','998'),('998','2018-05-22 11:04:06',1,'20189980000072',' ',1,'1234567890','',2,NULL,'1234567890','998'),('998','2018-05-22 11:05:36',1,'20189980000072','20189980000072',1,'1234567890','',42,NULL,'1234567890','998'),('998','2018-05-22 11:08:59',1,'20189980000072','20189980000072',1,'1234567890','',42,NULL,'1234567890','998'),('998','2018-05-23 12:22:10',1,'20189980000072','AsignaciÃ³n de TRD',1,'1234567890','',32,NULL,'1234567890','998'),('998','2018-05-23 13:00:31',1,'20189980000021','Radicado insertado del grupo de masiva 20189980000021',1,'1234567890','',30,NULL,'1234567890','998');
/*!40000 ALTER TABLE `hist_eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informados`
--

DROP TABLE IF EXISTS `informados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `informados` (
  `radi_nume_radi` varchar(15) NOT NULL,
  `usua_codi` decimal(10,0) NOT NULL,
  `depe_codi` varchar(5) NOT NULL,
  `info_desc` varchar(600) DEFAULT NULL,
  `info_fech` date NOT NULL,
  `info_leido` decimal(1,0) DEFAULT '0',
  `usua_codi_info` decimal(3,0) DEFAULT NULL,
  `info_codi` decimal(10,0) DEFAULT NULL,
  `usua_doc` varchar(14) DEFAULT NULL,
  `info_resp` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informados`
--

LOCK TABLES `informados` WRITE;
/*!40000 ALTER TABLE `informados` DISABLE KEYS */;
/*!40000 ALTER TABLE `informados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medio_recepcion`
--

DROP TABLE IF EXISTS `medio_recepcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medio_recepcion` (
  `mrec_codi` decimal(2,0) NOT NULL,
  `mrec_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medio_recepcion`
--

LOCK TABLES `medio_recepcion` WRITE;
/*!40000 ALTER TABLE `medio_recepcion` DISABLE KEYS */;
INSERT INTO `medio_recepcion` VALUES (1,'Correo'),(2,'Internet'),(3,'Mail'),(4,'Personal'),(5,'Telefonico');
/*!40000 ALTER TABLE `medio_recepcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipio` (
  `muni_codi` decimal(4,0) NOT NULL,
  `dpto_codi` decimal(3,0) NOT NULL,
  `muni_nomb` varchar(100) NOT NULL,
  `id_cont` decimal(2,0) DEFAULT '1',
  `id_pais` decimal(4,0) DEFAULT '170',
  `homologa_muni` varchar(10) DEFAULT NULL,
  `homologa_idmuni` varchar(15) DEFAULT NULL,
  `activa` decimal(1,0) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (1,10,'NEW YORK',1,249,'0',NULL,1),(8,9,'BARCELONA',2,724,'0',NULL,1),(1,16,'GINEBRA',2,767,'0',NULL,1),(16,9,'CUENCA',2,724,'0',NULL,1),(999,1,'TODOS',1,170,NULL,NULL,1),(1,5,'MEDELLIN',1,170,NULL,NULL,1),(2,5,'ABEJORRAL',1,170,NULL,NULL,1),(4,5,'ABRIAQUI',1,170,NULL,NULL,1),(21,5,'ALEJANDRIA',1,170,NULL,NULL,1),(30,5,'AMAGA',1,170,NULL,NULL,1),(31,5,'AMALFI',1,170,NULL,NULL,1),(34,5,'ANDES',1,170,NULL,NULL,1),(36,5,'ANGELOPOLIS',1,170,NULL,NULL,1),(38,5,'ANGOSTURA',1,170,NULL,NULL,1),(40,5,'ANORI',1,170,NULL,NULL,1),(42,5,'SANTA FE DE ANTIOQUIA',1,170,NULL,NULL,1),(44,5,'ANZA',1,170,NULL,NULL,1),(45,5,'APARTADO',1,170,NULL,NULL,1),(51,5,'ARBOLETES',1,170,NULL,NULL,1),(55,5,'ARGELIA',1,170,NULL,NULL,1),(59,5,'ARMENIA',1,170,NULL,NULL,1),(79,5,'BARBOSA',1,170,NULL,NULL,1),(86,5,'BELMIRA',1,170,NULL,NULL,1),(88,5,'BELLO',1,170,NULL,NULL,1),(91,5,'BETANIA',1,170,NULL,NULL,1),(93,5,'BETULIA',1,170,NULL,NULL,1),(101,5,'CIUDAD BOLIVAR',1,170,NULL,NULL,1),(107,5,'BRICEÑO',1,170,NULL,NULL,1),(113,5,'BURITICA',1,170,NULL,NULL,1),(120,5,'CACERES',1,170,NULL,NULL,1),(125,5,'CAICEDO',1,170,NULL,NULL,1),(129,5,'CALDAS',1,170,NULL,NULL,1),(134,5,'CAMPAMENTO',1,170,NULL,NULL,1),(138,5,'CAÑASGORDAS',1,170,NULL,NULL,1),(142,5,'CARACOLI',1,170,NULL,NULL,1),(145,5,'CARAMANTA',1,170,NULL,NULL,1),(147,5,'CAREPA',1,170,NULL,NULL,1),(148,5,'EL CARMEN DE VIBORAL',1,170,NULL,NULL,1),(150,5,'CAROLINA',1,170,NULL,NULL,1),(154,5,'CAUCASIA',1,170,NULL,NULL,1),(172,5,'CHIGORODO',1,170,NULL,NULL,1),(190,5,'CISNEROS',1,170,NULL,NULL,1),(197,5,'COCORNA',1,170,NULL,NULL,1),(206,5,'CONCEPCION',1,170,NULL,NULL,1),(209,5,'CONCORDIA',1,170,NULL,NULL,1),(212,5,'COPACABANA',1,170,NULL,NULL,1),(234,5,'DABEIBA',1,170,NULL,NULL,1),(237,5,'DON MATIAS',1,170,NULL,NULL,1),(240,5,'EBEJICO',1,170,NULL,NULL,1),(250,5,'EL BAGRE',1,170,NULL,NULL,1),(264,5,'ENTRERRIOS',1,170,NULL,NULL,1),(266,5,'ENVIGADO',1,170,NULL,NULL,1),(282,5,'FREDONIA',1,170,NULL,NULL,1),(284,5,'FRONTINO',1,170,NULL,NULL,1),(306,5,'GIRALDO',1,170,NULL,NULL,1),(308,5,'GIRARDOTA',1,170,NULL,NULL,1),(310,5,'GOMEZ PLATA',1,170,NULL,NULL,1),(313,5,'GRANADA',1,170,NULL,NULL,1),(315,5,'GUADALUPE',1,170,NULL,NULL,1),(318,5,'GUARNE',1,170,NULL,NULL,1),(321,5,'GUATAPE',1,170,NULL,NULL,1),(347,5,'HELICONIA',1,170,NULL,NULL,1),(353,5,'HISPANIA',1,170,NULL,NULL,1),(360,5,'ITAGUI',1,170,NULL,NULL,1),(361,5,'ITUANGO',1,170,NULL,NULL,1),(364,5,'JARDIN',1,170,NULL,NULL,1),(368,5,'JERICO',1,170,NULL,NULL,1),(376,5,'LA CEJA',1,170,NULL,NULL,1),(380,5,'LA ESTRELLA',1,170,NULL,NULL,1),(390,5,'LA PINTADA',1,170,NULL,NULL,1),(400,5,'LA UNION',1,170,NULL,NULL,1),(411,5,'LIBORINA',1,170,NULL,NULL,1),(425,5,'MACEO',1,170,NULL,NULL,1),(440,5,'MARINILLA',1,170,NULL,NULL,1),(467,5,'MONTEBELLO',1,170,NULL,NULL,1),(475,5,'MURINDO',1,170,NULL,NULL,1),(480,5,'MUTATA',1,170,NULL,NULL,1),(483,5,'NARIÑO',1,170,NULL,NULL,1),(490,5,'NECOCLI',1,170,NULL,NULL,1),(495,5,'NECHI',1,170,NULL,NULL,1),(501,5,'OLAYA',1,170,NULL,NULL,1),(541,5,'PEÑOL',1,170,NULL,NULL,1),(543,5,'PEQUE',1,170,NULL,NULL,1),(576,5,'PUEBLORRICO',1,170,NULL,NULL,1),(585,5,'PUERTO NARE',1,170,NULL,NULL,1),(591,5,'PUERTO TRIUNFO',1,170,NULL,NULL,1),(604,5,'REMEDIOS',1,170,NULL,NULL,1),(607,5,'RETIRO',1,170,NULL,NULL,1),(615,5,'RIONEGRO',1,170,NULL,NULL,1),(628,5,'SABANALARGA',1,170,NULL,NULL,1),(631,5,'SABANETA',1,170,NULL,NULL,1),(642,5,'SALGAR',1,170,NULL,NULL,1),(647,5,'SAN ANDRES DE CUERQUIA',1,170,NULL,NULL,1),(649,5,'SAN CARLOS',1,170,NULL,NULL,1),(652,5,'SAN FRANCISCO',1,170,NULL,NULL,1),(656,5,'SAN JERONIMO',1,170,NULL,NULL,1),(658,5,'SAN JOSE DE LA MONTAÑA',1,170,NULL,NULL,1),(659,5,'SAN JUAN DE URABA',1,170,NULL,NULL,1),(660,5,'SAN LUIS',1,170,NULL,NULL,1),(664,5,'SAN PEDRO DE LOS MILAGROS',1,170,NULL,NULL,1),(665,5,'SAN PEDRO DE URABA',1,170,NULL,NULL,1),(667,5,'SAN RAFAEL',1,170,NULL,NULL,1),(670,5,'SAN ROQUE',1,170,NULL,NULL,1),(674,5,'SAN VICENTE FERRER',1,170,NULL,NULL,1),(679,5,'SANTA BARBARA',1,170,NULL,NULL,1),(686,5,'SANTA ROSA DE OSOS',1,170,NULL,NULL,1),(690,5,'SANTO DOMINGO',1,170,NULL,NULL,1),(697,5,'EL SANTUARIO',1,170,NULL,NULL,1),(736,5,'SEGOVIA',1,170,NULL,NULL,1),(756,5,'SONSON',1,170,NULL,NULL,1),(761,5,'SOPETRAN',1,170,NULL,NULL,1),(789,5,'TAMESIS',1,170,NULL,NULL,1),(790,5,'TARAZA',1,170,NULL,NULL,1),(792,5,'TARSO',1,170,NULL,NULL,1),(809,5,'TITIRIBI',1,170,NULL,NULL,1),(819,5,'TOLEDO',1,170,NULL,NULL,1),(837,5,'TURBO',1,170,NULL,NULL,1),(842,5,'URAMITA',1,170,NULL,NULL,1),(847,5,'URRAO',1,170,NULL,NULL,1),(854,5,'VALDIVIA',1,170,NULL,NULL,1),(856,5,'VALPARAISO',1,170,NULL,NULL,1),(858,5,'VEGACHI',1,170,NULL,NULL,1),(861,5,'VENECIA',1,170,NULL,NULL,1),(873,5,'VIGIA DEL FUERTE',1,170,NULL,NULL,1),(885,5,'YALI',1,170,NULL,NULL,1),(887,5,'YARUMAL',1,170,NULL,NULL,1),(890,5,'YOLOMBO',1,170,NULL,NULL,1),(893,5,'YONDO',1,170,NULL,NULL,1),(895,5,'ZARAGOZA',1,170,NULL,NULL,1),(1,8,'BARRANQUILLA',1,170,NULL,NULL,1),(78,8,'BARANOA',1,170,NULL,NULL,1),(137,8,'CAMPO DE LA CRUZ',1,170,NULL,NULL,1),(141,8,'CANDELARIA',1,170,NULL,NULL,1),(296,8,'GALAPA',1,170,NULL,NULL,1),(372,8,'JUAN DE ACOSTA',1,170,NULL,NULL,1),(421,8,'LURUACO',1,170,NULL,NULL,1),(433,8,'MALAMBO',1,170,NULL,NULL,1),(436,8,'MANATI',1,170,NULL,NULL,1),(520,8,'PALMAR DE VARELA',1,170,NULL,NULL,1),(549,8,'PIOJO',1,170,NULL,NULL,1),(558,8,'POLONUEVO',1,170,NULL,NULL,1),(560,8,'PONEDERA',1,170,NULL,NULL,1),(573,8,'PUERTO COLOMBIA',1,170,NULL,NULL,1),(606,8,'REPELON',1,170,NULL,NULL,1),(634,8,'SABANAGRANDE',1,170,NULL,NULL,1),(638,8,'SABANALARGA',1,170,NULL,NULL,1),(675,8,'SANTA LUCIA',1,170,NULL,NULL,1),(685,8,'SANTO TOMAS',1,170,NULL,NULL,1),(758,8,'SOLEDAD',1,170,NULL,NULL,1),(770,8,'SUAN',1,170,NULL,NULL,1),(832,8,'TUBARA',1,170,NULL,NULL,1),(849,8,'USIACURI',1,170,NULL,NULL,1),(1,11,'BOGOTA',1,170,NULL,NULL,1),(1,13,'CARTAGENA',1,170,NULL,NULL,1),(6,13,'ACHI',1,170,NULL,NULL,1),(30,13,'ALTOS DEL ROSARIO',1,170,NULL,NULL,1),(42,13,'ARENAL',1,170,NULL,NULL,1),(52,13,'ARJONA',1,170,NULL,NULL,1),(62,13,'ARROYOHONDO',1,170,NULL,NULL,1),(74,13,'BARRANCO DE LOBA',1,170,NULL,NULL,1),(140,13,'CALAMAR',1,170,NULL,NULL,1),(160,13,'CANTAGALLO',1,170,NULL,NULL,1),(188,13,'CICUCO',1,170,NULL,NULL,1),(212,13,'CORDOBA',1,170,NULL,NULL,1),(222,13,'CLEMENCIA',1,170,NULL,NULL,1),(244,13,'EL CARMEN DE BOLIVAR',1,170,NULL,NULL,1),(248,13,'EL GUAMO',1,170,NULL,NULL,1),(268,13,'EL PEÑON',1,170,NULL,NULL,1),(300,13,'HATILLO DE LOBA',1,170,NULL,NULL,1),(430,13,'MAGANGUE',1,170,NULL,NULL,1),(433,13,'MAHATES',1,170,NULL,NULL,1),(440,13,'MARGARITA',1,170,NULL,NULL,1),(442,13,'MARIA LA BAJA',1,170,NULL,NULL,1),(458,13,'MONTECRISTO',1,170,NULL,NULL,1),(468,13,'MOMPOS',1,170,NULL,NULL,1),(473,13,'MORALES',1,170,NULL,NULL,1),(490,13,'NOROSI',1,170,NULL,NULL,1),(549,13,'PINILLOS',1,170,NULL,NULL,1),(580,13,'REGIDOR',1,170,NULL,NULL,1),(600,13,'RIO VIEJO',1,170,NULL,NULL,1),(620,13,'SAN CRISTOBAL',1,170,NULL,NULL,1),(647,13,'SAN ESTANISLAO',1,170,NULL,NULL,1),(650,13,'SAN FERNANDO',1,170,NULL,NULL,1),(654,13,'SAN JACINTO',1,170,NULL,NULL,1),(655,13,'SAN JACINTO DEL CAUCA',1,170,NULL,NULL,1),(657,13,'SAN JUAN NEPOMUCENO',1,170,NULL,NULL,1),(667,13,'SAN MARTIN DE LOBA',1,170,NULL,NULL,1),(670,13,'SAN PABLO',1,170,NULL,NULL,1),(673,13,'SANTA CATALINA',1,170,NULL,NULL,1),(683,13,'SANTA ROSA',1,170,NULL,NULL,1),(688,13,'SANTA ROSA DEL SUR',1,170,NULL,NULL,1),(744,13,'SIMITI',1,170,NULL,NULL,1),(760,13,'SOPLAVIENTO',1,170,NULL,NULL,1),(780,13,'TALAIGUA NUEVO',1,170,NULL,NULL,1),(810,13,'TIQUISIO',1,170,NULL,NULL,1),(836,13,'TURBACO',1,170,NULL,NULL,1),(838,13,'TURBANA',1,170,NULL,NULL,1),(873,13,'VILLANUEVA',1,170,NULL,NULL,1),(894,13,'ZAMBRANO',1,170,NULL,NULL,1),(1,15,'TUNJA',1,170,NULL,NULL,1),(22,15,'ALMEIDA',1,170,NULL,NULL,1),(47,15,'AQUITANIA',1,170,NULL,NULL,1),(51,15,'ARCABUCO',1,170,NULL,NULL,1),(87,15,'BELEN',1,170,NULL,NULL,1),(90,15,'BERBEO',1,170,NULL,NULL,1),(92,15,'BETEITIVA',1,170,NULL,NULL,1),(97,15,'BOAVITA',1,170,NULL,NULL,1),(104,15,'BOYACA',1,170,NULL,NULL,1),(106,15,'BRICEÑO',1,170,NULL,NULL,1),(109,15,'BUENAVISTA',1,170,NULL,NULL,1),(114,15,'BUSBANZA',1,170,NULL,NULL,1),(131,15,'CALDAS',1,170,NULL,NULL,1),(135,15,'CAMPOHERMOSO',1,170,NULL,NULL,1),(162,15,'CERINZA',1,170,NULL,NULL,1),(172,15,'CHINAVITA',1,170,NULL,NULL,1),(176,15,'CHIQUINQUIRA',1,170,NULL,NULL,1),(180,15,'CHISCAS',1,170,NULL,NULL,1),(183,15,'CHITA',1,170,NULL,NULL,1),(185,15,'CHITARAQUE',1,170,NULL,NULL,1),(187,15,'CHIVATA',1,170,NULL,NULL,1),(189,15,'CIENEGA',1,170,NULL,NULL,1),(204,15,'COMBITA',1,170,NULL,NULL,1),(212,15,'COPER',1,170,NULL,NULL,1),(215,15,'CORRALES',1,170,NULL,NULL,1),(218,15,'COVARACHIA',1,170,NULL,NULL,1),(223,15,'CUBARA',1,170,NULL,NULL,1),(224,15,'CUCAITA',1,170,NULL,NULL,1),(226,15,'CUITIVA',1,170,NULL,NULL,1),(232,15,'CHIQUIZA',1,170,NULL,NULL,1),(236,15,'CHIVOR',1,170,NULL,NULL,1),(238,15,'DUITAMA',1,170,NULL,NULL,1),(244,15,'EL COCUY',1,170,NULL,NULL,1),(248,15,'EL ESPINO',1,170,NULL,NULL,1),(272,15,'FIRAVITOBA',1,170,NULL,NULL,1),(276,15,'FLORESTA',1,170,NULL,NULL,1),(293,15,'GACHANTIVA',1,170,NULL,NULL,1),(296,15,'GAMEZA',1,170,NULL,NULL,1),(299,15,'GARAGOA',1,170,NULL,NULL,1),(317,15,'GUACAMAYAS',1,170,NULL,NULL,1),(322,15,'GUATEQUE',1,170,NULL,NULL,1),(325,15,'GUAYATA',1,170,NULL,NULL,1),(332,15,'GUICAN DE LA SIERRA',1,170,NULL,NULL,1),(362,15,'IZA',1,170,NULL,NULL,1),(367,15,'JENESANO',1,170,NULL,NULL,1),(368,15,'JERICO',1,170,NULL,NULL,1),(377,15,'LABRANZAGRANDE',1,170,NULL,NULL,1),(380,15,'LA CAPILLA',1,170,NULL,NULL,1),(401,15,'LA VICTORIA',1,170,NULL,NULL,1),(403,15,'LA UVITA',1,170,NULL,NULL,1),(407,15,'VILLA DE LEYVA',1,170,NULL,NULL,1),(425,15,'MACANAL',1,170,NULL,NULL,1),(442,15,'MARIPI',1,170,NULL,NULL,1),(455,15,'MIRAFLORES',1,170,NULL,NULL,1),(464,15,'MONGUA',1,170,NULL,NULL,1),(466,15,'MONGUI',1,170,NULL,NULL,1),(469,15,'MONIQUIRA',1,170,NULL,NULL,1),(476,15,'MOTAVITA',1,170,NULL,NULL,1),(480,15,'MUZO',1,170,NULL,NULL,1),(491,15,'NOBSA',1,170,NULL,NULL,1),(494,15,'NUEVO COLON',1,170,NULL,NULL,1),(500,15,'OICATA',1,170,NULL,NULL,1),(507,15,'OTANCHE',1,170,NULL,NULL,1),(511,15,'PACHAVITA',1,170,NULL,NULL,1),(514,15,'PAEZ',1,170,NULL,NULL,1),(516,15,'PAIPA',1,170,NULL,NULL,1),(518,15,'PAJARITO',1,170,NULL,NULL,1),(522,15,'PANQUEBA',1,170,NULL,NULL,1),(531,15,'PAUNA',1,170,NULL,NULL,1),(533,15,'PAYA',1,170,NULL,NULL,1),(537,15,'PAZ DE RIO',1,170,NULL,NULL,1),(542,15,'PESCA',1,170,NULL,NULL,1),(550,15,'PISBA',1,170,NULL,NULL,1),(572,15,'PUERTO BOYACA',1,170,NULL,NULL,1),(580,15,'QUIPAMA',1,170,NULL,NULL,1),(599,15,'RAMIRIQUI',1,170,NULL,NULL,1),(600,15,'RAQUIRA',1,170,NULL,NULL,1),(621,15,'RONDON',1,170,NULL,NULL,1),(632,15,'SABOYA',1,170,NULL,NULL,1),(638,15,'SACHICA',1,170,NULL,NULL,1),(646,15,'SAMACA',1,170,NULL,NULL,1),(660,15,'SAN EDUARDO',1,170,NULL,NULL,1),(664,15,'SAN JOSE DE PARE',1,170,NULL,NULL,1),(667,15,'SAN LUIS DE GACENO',1,170,NULL,NULL,1),(673,15,'SAN MATEO',1,170,NULL,NULL,1),(676,15,'SAN MIGUEL DE SEMA',1,170,NULL,NULL,1),(681,15,'SAN PABLO DE BORBUR',1,170,NULL,NULL,1),(686,15,'SANTANA',1,170,NULL,NULL,1),(690,15,'SANTA MARIA',1,170,NULL,NULL,1),(693,15,'SANTA ROSA DE VITERBO',1,170,NULL,NULL,1),(696,15,'SANTA SOFIA',1,170,NULL,NULL,1),(720,15,'SATIVANORTE',1,170,NULL,NULL,1),(723,15,'SATIVASUR',1,170,NULL,NULL,1),(740,15,'SIACHOQUE',1,170,NULL,NULL,1),(753,15,'SOATA',1,170,NULL,NULL,1),(755,15,'SOCOTA',1,170,NULL,NULL,1),(757,15,'SOCHA',1,170,NULL,NULL,1),(759,15,'SOGAMOSO',1,170,NULL,NULL,1),(761,15,'SOMONDOCO',1,170,NULL,NULL,1),(762,15,'SORA',1,170,NULL,NULL,1),(763,15,'SOTAQUIRA',1,170,NULL,NULL,1),(764,15,'SORACA',1,170,NULL,NULL,1),(774,15,'SUSACON',1,170,NULL,NULL,1),(776,15,'SUTAMARCHAN',1,170,NULL,NULL,1),(778,15,'SUTATENZA',1,170,NULL,NULL,1),(790,15,'TASCO',1,170,NULL,NULL,1),(798,15,'TENZA',1,170,NULL,NULL,1),(804,15,'TIBANA',1,170,NULL,NULL,1),(806,15,'TIBASOSA',1,170,NULL,NULL,1),(808,15,'TINJACA',1,170,NULL,NULL,1),(810,15,'TIPACOQUE',1,170,NULL,NULL,1),(814,15,'TOCA',1,170,NULL,NULL,1),(816,15,'TOGUI',1,170,NULL,NULL,1),(820,15,'TOPAGA',1,170,NULL,NULL,1),(822,15,'TOTA',1,170,NULL,NULL,1),(832,15,'TUNUNGUA',1,170,NULL,NULL,1),(835,15,'TURMEQUE',1,170,NULL,NULL,1),(837,15,'TUTA',1,170,NULL,NULL,1),(839,15,'TUTAZA',1,170,NULL,NULL,1),(842,15,'UMBITA',1,170,NULL,NULL,1),(861,15,'VENTAQUEMADA',1,170,NULL,NULL,1),(879,15,'VIRACACHA',1,170,NULL,NULL,1),(897,15,'ZETAQUIRA',1,170,NULL,NULL,1),(1,17,'MANIZALES',1,170,NULL,NULL,1),(13,17,'AGUADAS',1,170,NULL,NULL,1),(42,17,'ANSERMA',1,170,NULL,NULL,1),(50,17,'ARANZAZU',1,170,NULL,NULL,1),(88,17,'BELALCAZAR',1,170,NULL,NULL,1),(174,17,'CHINCHINA',1,170,NULL,NULL,1),(272,17,'FILADELFIA',1,170,NULL,NULL,1),(380,17,'LA DORADA',1,170,NULL,NULL,1),(388,17,'LA MERCED',1,170,NULL,NULL,1),(433,17,'MANZANARES',1,170,NULL,NULL,1),(442,17,'MARMATO',1,170,NULL,NULL,1),(444,17,'MARQUETALIA',1,170,NULL,NULL,1),(446,17,'MARULANDA',1,170,NULL,NULL,1),(486,17,'NEIRA',1,170,NULL,NULL,1),(495,17,'NORCASIA',1,170,NULL,NULL,1),(513,17,'PACORA',1,170,NULL,NULL,1),(524,17,'PALESTINA',1,170,NULL,NULL,1),(541,17,'PENSILVANIA',1,170,NULL,NULL,1),(614,17,'RIOSUCIO',1,170,NULL,NULL,1),(616,17,'RISARALDA',1,170,NULL,NULL,1),(653,17,'SALAMINA',1,170,NULL,NULL,1),(662,17,'SAMANA',1,170,NULL,NULL,1),(665,17,'SAN JOSE',1,170,NULL,NULL,1),(777,17,'SUPIA',1,170,NULL,NULL,1),(867,17,'VICTORIA',1,170,NULL,NULL,1),(873,17,'VILLAMARIA',1,170,NULL,NULL,1),(877,17,'VITERBO',1,170,NULL,NULL,1),(1,19,'POPAYAN',1,170,NULL,NULL,1),(22,19,'ALMAGUER',1,170,NULL,NULL,1),(50,19,'ARGELIA',1,170,NULL,NULL,1),(75,19,'BALBOA',1,170,NULL,NULL,1),(100,19,'BOLIVAR',1,170,NULL,NULL,1),(110,19,'BUENOS AIRES',1,170,NULL,NULL,1),(130,19,'CAJIBIO',1,170,NULL,NULL,1),(137,19,'CALDONO',1,170,NULL,NULL,1),(142,19,'CALOTO',1,170,NULL,NULL,1),(212,19,'CORINTO',1,170,NULL,NULL,1),(256,19,'EL TAMBO',1,170,NULL,NULL,1),(290,19,'FLORENCIA',1,170,NULL,NULL,1),(300,19,'GUACHENE',1,170,NULL,NULL,1),(318,19,'GUAPI',1,170,NULL,NULL,1),(355,19,'INZA',1,170,NULL,NULL,1),(364,19,'JAMBALO',1,170,NULL,NULL,1),(392,19,'LA SIERRA',1,170,NULL,NULL,1),(397,19,'LA VEGA',1,170,NULL,NULL,1),(418,19,'LOPEZ DE MICAY',1,170,NULL,NULL,1),(450,19,'MERCADERES',1,170,NULL,NULL,1),(455,19,'MIRANDA',1,170,NULL,NULL,1),(473,19,'MORALES',1,170,NULL,NULL,1),(513,19,'PADILLA',1,170,NULL,NULL,1),(517,19,'PAEZ',1,170,NULL,NULL,1),(532,19,'PATIA',1,170,NULL,NULL,1),(533,19,'PIAMONTE',1,170,NULL,NULL,1),(548,19,'PIENDAMO',1,170,NULL,NULL,1),(573,19,'PUERTO TEJADA',1,170,NULL,NULL,1),(585,19,'PURACE',1,170,NULL,NULL,1),(622,19,'ROSAS',1,170,NULL,NULL,1),(693,19,'SAN SEBASTIAN',1,170,NULL,NULL,1),(698,19,'SANTANDER DE QUILICHAO',1,170,NULL,NULL,1),(701,19,'SANTA ROSA',1,170,NULL,NULL,1),(743,19,'SILVIA',1,170,NULL,NULL,1),(760,19,'SOTARA',1,170,NULL,NULL,1),(780,19,'SUAREZ',1,170,NULL,NULL,1),(785,19,'SUCRE',1,170,NULL,NULL,1),(807,19,'TIMBIO',1,170,NULL,NULL,1),(809,19,'TIMBIQUI',1,170,NULL,NULL,1),(821,19,'TORIBIO',1,170,NULL,NULL,1),(824,19,'TOTORO',1,170,NULL,NULL,1),(845,19,'VILLA RICA',1,170,NULL,NULL,1),(1,20,'VALLEDUPAR',1,170,NULL,NULL,1),(11,20,'AGUACHICA',1,170,NULL,NULL,1),(13,20,'AGUSTIN CODAZZI',1,170,NULL,NULL,1),(32,20,'ASTREA',1,170,NULL,NULL,1),(45,20,'BECERRIL',1,170,NULL,NULL,1),(60,20,'BOSCONIA',1,170,NULL,NULL,1),(175,20,'CHIMICHAGUA',1,170,NULL,NULL,1),(178,20,'CHIRIGUANA',1,170,NULL,NULL,1),(228,20,'CURUMANI',1,170,NULL,NULL,1),(238,20,'EL COPEY',1,170,NULL,NULL,1),(250,20,'EL PASO',1,170,NULL,NULL,1),(295,20,'GAMARRA',1,170,NULL,NULL,1),(310,20,'GONZALEZ',1,170,NULL,NULL,1),(383,20,'LA GLORIA',1,170,NULL,NULL,1),(400,20,'LA JAGUA DE IBIRICO',1,170,NULL,NULL,1),(443,20,'MANAURE BALCON DEL CESAR',1,170,NULL,NULL,1),(517,20,'PAILITAS',1,170,NULL,NULL,1),(550,20,'PELAYA',1,170,NULL,NULL,1),(570,20,'PUEBLO BELLO',1,170,NULL,NULL,1),(614,20,'RIO DE ORO',1,170,NULL,NULL,1),(621,20,'LA PAZ',1,170,NULL,NULL,1),(710,20,'SAN ALBERTO',1,170,NULL,NULL,1),(750,20,'SAN DIEGO',1,170,NULL,NULL,1),(770,20,'SAN MARTIN',1,170,NULL,NULL,1),(787,20,'TAMALAMEQUE',1,170,NULL,NULL,1),(1,23,'MONTERIA',1,170,NULL,NULL,1),(68,23,'AYAPEL',1,170,NULL,NULL,1),(79,23,'BUENAVISTA',1,170,NULL,NULL,1),(90,23,'CANALETE',1,170,NULL,NULL,1),(162,23,'CERETE',1,170,NULL,NULL,1),(168,23,'CHIMA',1,170,NULL,NULL,1),(182,23,'CHINU',1,170,NULL,NULL,1),(189,23,'CIENAGA DE ORO',1,170,NULL,NULL,1),(300,23,'COTORRA',1,170,NULL,NULL,1),(350,23,'LA APARTADA',1,170,NULL,NULL,1),(417,23,'LORICA',1,170,NULL,NULL,1),(419,23,'LOS CORDOBAS',1,170,NULL,NULL,1),(464,23,'MOMIL',1,170,NULL,NULL,1),(466,23,'MONTELIBANO',1,170,NULL,NULL,1),(500,23,'MOÑITOS',1,170,NULL,NULL,1),(555,23,'PLANETA RICA',1,170,NULL,NULL,1),(570,23,'PUEBLO NUEVO',1,170,NULL,NULL,1),(574,23,'PUERTO ESCONDIDO',1,170,NULL,NULL,1),(580,23,'PUERTO LIBERTADOR',1,170,NULL,NULL,1),(586,23,'PURISIMA DE LA CONCEPCION',1,170,NULL,NULL,1),(660,23,'SAHAGUN',1,170,NULL,NULL,1),(670,23,'SAN ANDRES DE SOTAVENTO',1,170,NULL,NULL,1),(672,23,'SAN ANTERO',1,170,NULL,NULL,1),(675,23,'SAN BERNARDO DEL VIENTO',1,170,NULL,NULL,1),(678,23,'SAN CARLOS',1,170,NULL,NULL,1),(682,23,'SAN JOSE DE URE',1,170,NULL,NULL,1),(686,23,'SAN PELAYO',1,170,NULL,NULL,1),(807,23,'TIERRALTA',1,170,NULL,NULL,1),(815,23,'TUCHIN',1,170,NULL,NULL,1),(855,23,'VALENCIA',1,170,NULL,NULL,1),(1,25,'AGUA DE DIOS',1,170,NULL,NULL,1),(19,25,'ALBAN',1,170,NULL,NULL,1),(35,25,'ANAPOIMA',1,170,NULL,NULL,1),(40,25,'ANOLAIMA',1,170,NULL,NULL,1),(53,25,'ARBELAEZ',1,170,NULL,NULL,1),(86,25,'BELTRAN',1,170,NULL,NULL,1),(95,25,'BITUIMA',1,170,NULL,NULL,1),(99,25,'BOJACA',1,170,NULL,NULL,1),(120,25,'CABRERA',1,170,NULL,NULL,1),(123,25,'CACHIPAY',1,170,NULL,NULL,1),(126,25,'CAJICA',1,170,NULL,NULL,1),(148,25,'CAPARRAPI',1,170,NULL,NULL,1),(151,25,'CAQUEZA',1,170,NULL,NULL,1),(154,25,'CARMEN DE CARUPA',1,170,NULL,NULL,1),(168,25,'CHAGUANI',1,170,NULL,NULL,1),(175,25,'CHIA',1,170,NULL,NULL,1),(178,25,'CHIPAQUE',1,170,NULL,NULL,1),(181,25,'CHOACHI',1,170,NULL,NULL,1),(183,25,'CHOCONTA',1,170,NULL,NULL,1),(200,25,'COGUA',1,170,NULL,NULL,1),(214,25,'COTA',1,170,NULL,NULL,1),(224,25,'CUCUNUBA',1,170,NULL,NULL,1),(245,25,'EL COLEGIO',1,170,NULL,NULL,1),(258,25,'EL PEÑON',1,170,NULL,NULL,1),(260,25,'EL ROSAL',1,170,NULL,NULL,1),(269,25,'FACATATIVA',1,170,NULL,NULL,1),(279,25,'FOMEQUE',1,170,NULL,NULL,1),(281,25,'FOSCA',1,170,NULL,NULL,1),(286,25,'FUNZA',1,170,NULL,NULL,1),(288,25,'FUQUENE',1,170,NULL,NULL,1),(290,25,'FUSAGASUGA',1,170,NULL,NULL,1),(293,25,'GACHALA',1,170,NULL,NULL,1),(295,25,'GACHANCIPA',1,170,NULL,NULL,1),(297,25,'GACHETA',1,170,NULL,NULL,1),(299,25,'GAMA',1,170,NULL,NULL,1),(307,25,'GIRARDOT',1,170,NULL,NULL,1),(312,25,'GRANADA',1,170,NULL,NULL,1),(317,25,'GUACHETA',1,170,NULL,NULL,1),(320,25,'GUADUAS',1,170,NULL,NULL,1),(322,25,'GUASCA',1,170,NULL,NULL,1),(324,25,'GUATAQUI',1,170,NULL,NULL,1),(326,25,'GUATAVITA',1,170,NULL,NULL,1),(328,25,'GUAYABAL DE SIQUIMA',1,170,NULL,NULL,1),(335,25,'GUAYABETAL',1,170,NULL,NULL,1),(339,25,'GUTIERREZ',1,170,NULL,NULL,1),(368,25,'JERUSALEN',1,170,NULL,NULL,1),(372,25,'JUNIN',1,170,NULL,NULL,1),(377,25,'LA CALERA',1,170,NULL,NULL,1),(386,25,'LA MESA',1,170,NULL,NULL,1),(394,25,'LA PALMA',1,170,NULL,NULL,1),(398,25,'LA PEÑA',1,170,NULL,NULL,1),(402,25,'LA VEGA',1,170,NULL,NULL,1),(407,25,'LENGUAZAQUE',1,170,NULL,NULL,1),(426,25,'MACHETA',1,170,NULL,NULL,1),(430,25,'MADRID',1,170,NULL,NULL,1),(436,25,'MANTA',1,170,NULL,NULL,1),(438,25,'MEDINA',1,170,NULL,NULL,1),(473,25,'MOSQUERA',1,170,NULL,NULL,1),(483,25,'NARIÑO',1,170,NULL,NULL,1),(486,25,'NEMOCON',1,170,NULL,NULL,1),(488,25,'NILO',1,170,NULL,NULL,1),(489,25,'NIMAIMA',1,170,NULL,NULL,1),(491,25,'NOCAIMA',1,170,NULL,NULL,1),(506,25,'VENECIA',1,170,NULL,NULL,1),(513,25,'PACHO',1,170,NULL,NULL,1),(518,25,'PAIME',1,170,NULL,NULL,1),(524,25,'PANDI',1,170,NULL,NULL,1),(530,25,'PARATEBUENO',1,170,NULL,NULL,1),(535,25,'PASCA',1,170,NULL,NULL,1),(572,25,'PUERTO SALGAR',1,170,NULL,NULL,1),(580,25,'PULI',1,170,NULL,NULL,1),(592,25,'QUEBRADANEGRA',1,170,NULL,NULL,1),(594,25,'QUETAME',1,170,NULL,NULL,1),(596,25,'QUIPILE',1,170,NULL,NULL,1),(599,25,'APULO',1,170,NULL,NULL,1),(612,25,'RICAURTE',1,170,NULL,NULL,1),(645,25,'SAN ANTONIO DEL TEQUENDAMA',1,170,NULL,NULL,1),(649,25,'SAN BERNARDO',1,170,NULL,NULL,1),(653,25,'SAN CAYETANO',1,170,NULL,NULL,1),(658,25,'SAN FRANCISCO',1,170,NULL,NULL,1),(662,25,'SAN JUAN DE RIOSECO',1,170,NULL,NULL,1),(718,25,'SASAIMA',1,170,NULL,NULL,1),(736,25,'SESQUILE',1,170,NULL,NULL,1),(740,25,'SIBATE',1,170,NULL,NULL,1),(743,25,'SILVANIA',1,170,NULL,NULL,1),(745,25,'SIMIJACA',1,170,NULL,NULL,1),(754,25,'SOACHA',1,170,NULL,NULL,1),(758,25,'SOPO',1,170,NULL,NULL,1),(769,25,'SUBACHOQUE',1,170,NULL,NULL,1),(772,25,'SUESCA',1,170,NULL,NULL,1),(777,25,'SUPATA',1,170,NULL,NULL,1),(779,25,'SUSA',1,170,NULL,NULL,1),(781,25,'SUTATAUSA',1,170,NULL,NULL,1),(785,25,'TABIO',1,170,NULL,NULL,1),(793,25,'TAUSA',1,170,NULL,NULL,1),(797,25,'TENA',1,170,NULL,NULL,1),(799,25,'TENJO',1,170,NULL,NULL,1),(805,25,'TIBACUY',1,170,NULL,NULL,1),(807,25,'TIBIRITA',1,170,NULL,NULL,1),(815,25,'TOCAIMA',1,170,NULL,NULL,1),(817,25,'TOCANCIPA',1,170,NULL,NULL,1),(823,25,'TOPAIPI',1,170,NULL,NULL,1),(839,25,'UBALA',1,170,NULL,NULL,1),(841,25,'UBAQUE',1,170,NULL,NULL,1),(843,25,'VILLA DE SAN DIEGO DE UBATE',1,170,NULL,NULL,1),(845,25,'UNE',1,170,NULL,NULL,1),(851,25,'UTICA',1,170,NULL,NULL,1),(862,25,'VERGARA',1,170,NULL,NULL,1),(867,25,'VIANI',1,170,NULL,NULL,1),(871,25,'VILLAGOMEZ',1,170,NULL,NULL,1),(873,25,'VILLAPINZON',1,170,NULL,NULL,1),(875,25,'VILLETA',1,170,NULL,NULL,1),(878,25,'VIOTA',1,170,NULL,NULL,1),(885,25,'YACOPI',1,170,NULL,NULL,1),(898,25,'ZIPACON',1,170,NULL,NULL,1),(899,25,'ZIPAQUIRA',1,170,NULL,NULL,1),(1,27,'QUIBDO',1,170,NULL,NULL,1),(6,27,'ACANDI',1,170,NULL,NULL,1),(25,27,'ALTO BAUDO',1,170,NULL,NULL,1),(50,27,'ATRATO',1,170,NULL,NULL,1),(73,27,'BAGADO',1,170,NULL,NULL,1),(75,27,'BAHIA SOLANO',1,170,NULL,NULL,1),(77,27,'BAJO BAUDO',1,170,NULL,NULL,1),(99,27,'BOJAYA',1,170,NULL,NULL,1),(135,27,'EL CANTON DEL SAN PABLO',1,170,NULL,NULL,1),(150,27,'CARMEN DEL DARIEN',1,170,NULL,NULL,1),(160,27,'CERTEGUI',1,170,NULL,NULL,1),(205,27,'CONDOTO',1,170,NULL,NULL,1),(245,27,'EL CARMEN DE ATRATO',1,170,NULL,NULL,1),(250,27,'EL LITORAL DEL SAN JUAN',1,170,NULL,NULL,1),(361,27,'ISTMINA',1,170,NULL,NULL,1),(372,27,'JURADO',1,170,NULL,NULL,1),(413,27,'LLORO',1,170,NULL,NULL,1),(425,27,'MEDIO ATRATO',1,170,NULL,NULL,1),(430,27,'MEDIO BAUDO',1,170,NULL,NULL,1),(450,27,'MEDIO SAN JUAN',1,170,NULL,NULL,1),(491,27,'NOVITA',1,170,NULL,NULL,1),(495,27,'NUQUI',1,170,NULL,NULL,1),(580,27,'RIO IRO',1,170,NULL,NULL,1),(600,27,'RIO QUITO',1,170,NULL,NULL,1),(615,27,'RIOSUCIO',1,170,NULL,NULL,1),(660,27,'SAN JOSE DEL PALMAR',1,170,NULL,NULL,1),(745,27,'SIPI',1,170,NULL,NULL,1),(787,27,'TADO',1,170,NULL,NULL,1),(800,27,'UNGUIA',1,170,NULL,NULL,1),(810,27,'UNION PANAMERICANA',1,170,NULL,NULL,1),(1,41,'NEIVA',1,170,NULL,NULL,1),(6,41,'ACEVEDO',1,170,NULL,NULL,1),(13,41,'AGRADO',1,170,NULL,NULL,1),(16,41,'AIPE',1,170,NULL,NULL,1),(20,41,'ALGECIRAS',1,170,NULL,NULL,1),(26,41,'ALTAMIRA',1,170,NULL,NULL,1),(78,41,'BARAYA',1,170,NULL,NULL,1),(132,41,'CAMPOALEGRE',1,170,NULL,NULL,1),(206,41,'COLOMBIA',1,170,NULL,NULL,1),(244,41,'ELIAS',1,170,NULL,NULL,1),(298,41,'GARZON',1,170,NULL,NULL,1),(306,41,'GIGANTE',1,170,NULL,NULL,1),(319,41,'GUADALUPE',1,170,NULL,NULL,1),(349,41,'HOBO',1,170,NULL,NULL,1),(357,41,'IQUIRA',1,170,NULL,NULL,1),(359,41,'ISNOS',1,170,NULL,NULL,1),(378,41,'LA ARGENTINA',1,170,NULL,NULL,1),(396,41,'LA PLATA',1,170,NULL,NULL,1),(483,41,'NATAGA',1,170,NULL,NULL,1),(503,41,'OPORAPA',1,170,NULL,NULL,1),(518,41,'PAICOL',1,170,NULL,NULL,1),(524,41,'PALERMO',1,170,NULL,NULL,1),(530,41,'PALESTINA',1,170,NULL,NULL,1),(548,41,'PITAL',1,170,NULL,NULL,1),(551,41,'PITALITO',1,170,NULL,NULL,1),(615,41,'RIVERA',1,170,NULL,NULL,1),(660,41,'SALADOBLANCO',1,170,NULL,NULL,1),(668,41,'SAN AGUSTIN',1,170,NULL,NULL,1),(676,41,'SANTA MARIA',1,170,NULL,NULL,1),(770,41,'SUAZA',1,170,NULL,NULL,1),(791,41,'TARQUI',1,170,NULL,NULL,1),(797,41,'TESALIA',1,170,NULL,NULL,1),(799,41,'TELLO',1,170,NULL,NULL,1),(801,41,'TERUEL',1,170,NULL,NULL,1),(807,41,'TIMANA',1,170,NULL,NULL,1),(872,41,'VILLAVIEJA',1,170,NULL,NULL,1),(885,41,'YAGUARA',1,170,NULL,NULL,1),(1,44,'RIOHACHA',1,170,NULL,NULL,1),(35,44,'ALBANIA',1,170,NULL,NULL,1),(78,44,'BARRANCAS',1,170,NULL,NULL,1),(90,44,'DIBULLA',1,170,NULL,NULL,1),(98,44,'DISTRACCION',1,170,NULL,NULL,1),(110,44,'EL MOLINO',1,170,NULL,NULL,1),(279,44,'FONSECA',1,170,NULL,NULL,1),(378,44,'HATONUEVO',1,170,NULL,NULL,1),(420,44,'LA JAGUA DEL PILAR',1,170,NULL,NULL,1),(430,44,'MAICAO',1,170,NULL,NULL,1),(560,44,'MANAURE',1,170,NULL,NULL,1),(650,44,'SAN JUAN DEL CESAR',1,170,NULL,NULL,1),(847,44,'URIBIA',1,170,NULL,NULL,1),(855,44,'URUMITA',1,170,NULL,NULL,1),(874,44,'VILLANUEVA',1,170,NULL,NULL,1),(1,47,'SANTA MARTA',1,170,NULL,NULL,1),(30,47,'ALGARROBO',1,170,NULL,NULL,1),(53,47,'ARACATACA',1,170,NULL,NULL,1),(58,47,'ARIGUANI',1,170,NULL,NULL,1),(161,47,'CERRO DE SAN ANTONIO',1,170,NULL,NULL,1),(170,47,'CHIVOLO',1,170,NULL,NULL,1),(189,47,'CIENAGA',1,170,NULL,NULL,1),(205,47,'CONCORDIA',1,170,NULL,NULL,1),(245,47,'EL BANCO',1,170,NULL,NULL,1),(258,47,'EL PIÑON',1,170,NULL,NULL,1),(268,47,'EL RETEN',1,170,NULL,NULL,1),(288,47,'FUNDACION',1,170,NULL,NULL,1),(318,47,'GUAMAL',1,170,NULL,NULL,1),(460,47,'NUEVA GRANADA',1,170,NULL,NULL,1),(541,47,'PEDRAZA',1,170,NULL,NULL,1),(545,47,'PIJIÑO DEL CARMEN',1,170,NULL,NULL,1),(551,47,'PIVIJAY',1,170,NULL,NULL,1),(555,47,'PLATO',1,170,NULL,NULL,1),(570,47,'PUEBLOVIEJO',1,170,NULL,NULL,1),(605,47,'REMOLINO',1,170,NULL,NULL,1),(660,47,'SABANAS DE SAN ANGEL',1,170,NULL,NULL,1),(675,47,'SALAMINA',1,170,NULL,NULL,1),(692,47,'SAN SEBASTIAN DE BUENAVISTA',1,170,NULL,NULL,1),(703,47,'SAN ZENON',1,170,NULL,NULL,1),(707,47,'SANTA ANA',1,170,NULL,NULL,1),(720,47,'SANTA BARBARA DE PINTO',1,170,NULL,NULL,1),(745,47,'SITIONUEVO',1,170,NULL,NULL,1),(798,47,'TENERIFE',1,170,NULL,NULL,1),(960,47,'ZAPAYAN',1,170,NULL,NULL,1),(980,47,'ZONA BANANERA',1,170,NULL,NULL,1),(1,50,'VILLAVICENCIO',1,170,NULL,NULL,1),(6,50,'ACACIAS',1,170,NULL,NULL,1),(110,50,'BARRANCA DE UPIA',1,170,NULL,NULL,1),(124,50,'CABUYARO',1,170,NULL,NULL,1),(150,50,'CASTILLA LA NUEVA',1,170,NULL,NULL,1),(223,50,'CUBARRAL',1,170,NULL,NULL,1),(226,50,'CUMARAL',1,170,NULL,NULL,1),(245,50,'EL CALVARIO',1,170,NULL,NULL,1),(251,50,'EL CASTILLO',1,170,NULL,NULL,1),(270,50,'EL DORADO',1,170,NULL,NULL,1),(287,50,'FUENTE DE ORO',1,170,NULL,NULL,1),(313,50,'GRANADA',1,170,NULL,NULL,1),(318,50,'GUAMAL',1,170,NULL,NULL,1),(325,50,'MAPIRIPAN',1,170,NULL,NULL,1),(330,50,'MESETAS',1,170,NULL,NULL,1),(350,50,'LA MACARENA',1,170,NULL,NULL,1),(370,50,'URIBE',1,170,NULL,NULL,1),(400,50,'LEJANIAS',1,170,NULL,NULL,1),(450,50,'PUERTO CONCORDIA',1,170,NULL,NULL,1),(568,50,'PUERTO GAITAN',1,170,NULL,NULL,1),(573,50,'PUERTO LOPEZ',1,170,NULL,NULL,1),(577,50,'PUERTO LLERAS',1,170,NULL,NULL,1),(590,50,'PUERTO RICO',1,170,NULL,NULL,1),(606,50,'RESTREPO',1,170,NULL,NULL,1),(680,50,'SAN CARLOS DE GUAROA',1,170,NULL,NULL,1),(683,50,'SAN JUAN DE ARAMA',1,170,NULL,NULL,1),(686,50,'SAN JUANITO',1,170,NULL,NULL,1),(689,50,'SAN MARTIN',1,170,NULL,NULL,1),(711,50,'VISTAHERMOSA',1,170,NULL,NULL,1),(1,52,'PASTO',1,170,NULL,NULL,1),(19,52,'ALBAN',1,170,NULL,NULL,1),(22,52,'ALDANA',1,170,NULL,NULL,1),(36,52,'ANCUYA',1,170,NULL,NULL,1),(51,52,'ARBOLEDA',1,170,NULL,NULL,1),(79,52,'BARBACOAS',1,170,NULL,NULL,1),(83,52,'BELEN',1,170,NULL,NULL,1),(110,52,'BUESACO',1,170,NULL,NULL,1),(203,52,'COLON',1,170,NULL,NULL,1),(207,52,'CONSACA',1,170,NULL,NULL,1),(210,52,'CONTADERO',1,170,NULL,NULL,1),(215,52,'CORDOBA',1,170,NULL,NULL,1),(224,52,'CUASPUD',1,170,NULL,NULL,1),(227,52,'CUMBAL',1,170,NULL,NULL,1),(233,52,'CUMBITARA',1,170,NULL,NULL,1),(240,52,'CHACHAGUI',1,170,NULL,NULL,1),(250,52,'EL CHARCO',1,170,NULL,NULL,1),(254,52,'EL PEÑOL',1,170,NULL,NULL,1),(256,52,'EL ROSARIO',1,170,NULL,NULL,1),(258,52,'EL TABLON DE GOMEZ',1,170,NULL,NULL,1),(260,52,'EL TAMBO',1,170,NULL,NULL,1),(287,52,'FUNES',1,170,NULL,NULL,1),(317,52,'GUACHUCAL',1,170,NULL,NULL,1),(320,52,'GUAITARILLA',1,170,NULL,NULL,1),(323,52,'GUALMATAN',1,170,NULL,NULL,1),(352,52,'ILES',1,170,NULL,NULL,1),(354,52,'IMUES',1,170,NULL,NULL,1),(356,52,'IPIALES',1,170,NULL,NULL,1),(378,52,'LA CRUZ',1,170,NULL,NULL,1),(381,52,'LA FLORIDA',1,170,NULL,NULL,1),(385,52,'LA LLANADA',1,170,NULL,NULL,1),(390,52,'LA TOLA',1,170,NULL,NULL,1),(399,52,'LA UNION',1,170,NULL,NULL,1),(405,52,'LEIVA',1,170,NULL,NULL,1),(411,52,'LINARES',1,170,NULL,NULL,1),(418,52,'LOS ANDES',1,170,NULL,NULL,1),(427,52,'MAGUI',1,170,NULL,NULL,1),(435,52,'MALLAMA',1,170,NULL,NULL,1),(473,52,'MOSQUERA',1,170,NULL,NULL,1),(480,52,'NARIÑO',1,170,NULL,NULL,1),(490,52,'OLAYA HERRERA',1,170,NULL,NULL,1),(506,52,'OSPINA',1,170,NULL,NULL,1),(520,52,'FRANCISCO PIZARRO',1,170,NULL,NULL,1),(540,52,'POLICARPA',1,170,NULL,NULL,1),(560,52,'POTOSI',1,170,NULL,NULL,1),(565,52,'PROVIDENCIA',1,170,NULL,NULL,1),(573,52,'PUERRES',1,170,NULL,NULL,1),(585,52,'PUPIALES',1,170,NULL,NULL,1),(612,52,'RICAURTE',1,170,NULL,NULL,1),(621,52,'ROBERTO PAYAN',1,170,NULL,NULL,1),(678,52,'SAMANIEGO',1,170,NULL,NULL,1),(683,52,'SANDONA',1,170,NULL,NULL,1),(685,52,'SAN BERNARDO',1,170,NULL,NULL,1),(687,52,'SAN LORENZO',1,170,NULL,NULL,1),(693,52,'SAN PABLO',1,170,NULL,NULL,1),(694,52,'SAN PEDRO DE CARTAGO',1,170,NULL,NULL,1),(696,52,'SANTA BARBARA',1,170,NULL,NULL,1),(699,52,'SANTACRUZ',1,170,NULL,NULL,1),(720,52,'SAPUYES',1,170,NULL,NULL,1),(786,52,'TAMINANGO',1,170,NULL,NULL,1),(788,52,'TANGUA',1,170,NULL,NULL,1),(835,52,'SAN ANDRES DE TUMACO',1,170,NULL,NULL,1),(838,52,'TUQUERRES',1,170,NULL,NULL,1),(885,52,'YACUANQUER',1,170,NULL,NULL,1),(1,54,'CUCUTA',1,170,NULL,NULL,1),(3,54,'ABREGO',1,170,NULL,NULL,1),(51,54,'ARBOLEDAS',1,170,NULL,NULL,1),(99,54,'BOCHALEMA',1,170,NULL,NULL,1),(109,54,'BUCARASICA',1,170,NULL,NULL,1),(125,54,'CACOTA',1,170,NULL,NULL,1),(128,54,'CACHIRA',1,170,NULL,NULL,1),(172,54,'CHINACOTA',1,170,NULL,NULL,1),(174,54,'CHITAGA',1,170,NULL,NULL,1),(206,54,'CONVENCION',1,170,NULL,NULL,1),(223,54,'CUCUTILLA',1,170,NULL,NULL,1),(239,54,'DURANIA',1,170,NULL,NULL,1),(245,54,'EL CARMEN',1,170,NULL,NULL,1),(250,54,'EL TARRA',1,170,NULL,NULL,1),(261,54,'EL ZULIA',1,170,NULL,NULL,1),(313,54,'GRAMALOTE',1,170,NULL,NULL,1),(344,54,'HACARI',1,170,NULL,NULL,1),(347,54,'HERRAN',1,170,NULL,NULL,1),(377,54,'LABATECA',1,170,NULL,NULL,1),(385,54,'LA ESPERANZA',1,170,NULL,NULL,1),(398,54,'LA PLAYA',1,170,NULL,NULL,1),(405,54,'LOS PATIOS',1,170,NULL,NULL,1),(418,54,'LOURDES',1,170,NULL,NULL,1),(480,54,'MUTISCUA',1,170,NULL,NULL,1),(498,54,'OCAÑA',1,170,NULL,NULL,1),(518,54,'PAMPLONA',1,170,NULL,NULL,1),(520,54,'PAMPLONITA',1,170,NULL,NULL,1),(553,54,'PUERTO SANTANDER',1,170,NULL,NULL,1),(599,54,'RAGONVALIA',1,170,NULL,NULL,1),(660,54,'SALAZAR',1,170,NULL,NULL,1),(670,54,'SAN CALIXTO',1,170,NULL,NULL,1),(673,54,'SAN CAYETANO',1,170,NULL,NULL,1),(680,54,'SANTIAGO',1,170,NULL,NULL,1),(720,54,'SARDINATA',1,170,NULL,NULL,1),(743,54,'SILOS',1,170,NULL,NULL,1),(800,54,'TEORAMA',1,170,NULL,NULL,1),(810,54,'TIBU',1,170,NULL,NULL,1),(820,54,'TOLEDO',1,170,NULL,NULL,1),(871,54,'VILLA CARO',1,170,NULL,NULL,1),(874,54,'VILLA DEL ROSARIO',1,170,NULL,NULL,1),(1,63,'ARMENIA',1,170,NULL,NULL,1),(111,63,'BUENAVISTA',1,170,NULL,NULL,1),(130,63,'CALARCA',1,170,NULL,NULL,1),(190,63,'CIRCASIA',1,170,NULL,NULL,1),(212,63,'CORDOBA',1,170,NULL,NULL,1),(272,63,'FILANDIA',1,170,NULL,NULL,1),(302,63,'GENOVA',1,170,NULL,NULL,1),(401,63,'LA TEBAIDA',1,170,NULL,NULL,1),(470,63,'MONTENEGRO',1,170,NULL,NULL,1),(548,63,'PIJAO',1,170,NULL,NULL,1),(594,63,'QUIMBAYA',1,170,NULL,NULL,1),(690,63,'SALENTO',1,170,NULL,NULL,1),(1,66,'PEREIRA',1,170,NULL,NULL,1),(45,66,'APIA',1,170,NULL,NULL,1),(75,66,'BALBOA',1,170,NULL,NULL,1),(88,66,'BELEN DE UMBRIA',1,170,NULL,NULL,1),(170,66,'DOSQUEBRADAS',1,170,NULL,NULL,1),(318,66,'GUATICA',1,170,NULL,NULL,1),(383,66,'LA CELIA',1,170,NULL,NULL,1),(400,66,'LA VIRGINIA',1,170,NULL,NULL,1),(440,66,'MARSELLA',1,170,NULL,NULL,1),(456,66,'MISTRATO',1,170,NULL,NULL,1),(572,66,'PUEBLO RICO',1,170,NULL,NULL,1),(594,66,'QUINCHIA',1,170,NULL,NULL,1),(682,66,'SANTA ROSA DE CABAL',1,170,NULL,NULL,1),(687,66,'SANTUARIO',1,170,NULL,NULL,1),(1,68,'BUCARAMANGA',1,170,NULL,NULL,1),(13,68,'AGUADA',1,170,NULL,NULL,1),(20,68,'ALBANIA',1,170,NULL,NULL,1),(51,68,'ARATOCA',1,170,NULL,NULL,1),(77,68,'BARBOSA',1,170,NULL,NULL,1),(79,68,'BARICHARA',1,170,NULL,NULL,1),(81,68,'BARRANCABERMEJA',1,170,NULL,NULL,1),(92,68,'BETULIA',1,170,NULL,NULL,1),(101,68,'BOLIVAR',1,170,NULL,NULL,1),(121,68,'CABRERA',1,170,NULL,NULL,1),(132,68,'CALIFORNIA',1,170,NULL,NULL,1),(147,68,'CAPITANEJO',1,170,NULL,NULL,1),(152,68,'CARCASI',1,170,NULL,NULL,1),(160,68,'CEPITA',1,170,NULL,NULL,1),(162,68,'CERRITO',1,170,NULL,NULL,1),(167,68,'CHARALA',1,170,NULL,NULL,1),(169,68,'CHARTA',1,170,NULL,NULL,1),(176,68,'CHIMA',1,170,NULL,NULL,1),(179,68,'CHIPATA',1,170,NULL,NULL,1),(190,68,'CIMITARRA',1,170,NULL,NULL,1),(207,68,'CONCEPCION',1,170,NULL,NULL,1),(209,68,'CONFINES',1,170,NULL,NULL,1),(211,68,'CONTRATACION',1,170,NULL,NULL,1),(217,68,'COROMORO',1,170,NULL,NULL,1),(229,68,'CURITI',1,170,NULL,NULL,1),(235,68,'EL CARMEN DE CHUCURI',1,170,NULL,NULL,1),(245,68,'EL GUACAMAYO',1,170,NULL,NULL,1),(250,68,'EL PEÑON',1,170,NULL,NULL,1),(255,68,'EL PLAYON',1,170,NULL,NULL,1),(264,68,'ENCINO',1,170,NULL,NULL,1),(266,68,'ENCISO',1,170,NULL,NULL,1),(271,68,'FLORIAN',1,170,NULL,NULL,1),(276,68,'FLORIDABLANCA',1,170,NULL,NULL,1),(296,68,'GALAN',1,170,NULL,NULL,1),(298,68,'GAMBITA',1,170,NULL,NULL,1),(307,68,'GIRON',1,170,NULL,NULL,1),(318,68,'GUACA',1,170,NULL,NULL,1),(320,68,'GUADALUPE',1,170,NULL,NULL,1),(322,68,'GUAPOTA',1,170,NULL,NULL,1),(324,68,'GUAVATA',1,170,NULL,NULL,1),(327,68,'GUEPSA',1,170,NULL,NULL,1),(344,68,'HATO',1,170,NULL,NULL,1),(368,68,'JESUS MARIA',1,170,NULL,NULL,1),(370,68,'JORDAN',1,170,NULL,NULL,1),(377,68,'LA BELLEZA',1,170,NULL,NULL,1),(385,68,'LANDAZURI',1,170,NULL,NULL,1),(397,68,'LA PAZ',1,170,NULL,NULL,1),(406,68,'LEBRIJA',1,170,NULL,NULL,1),(418,68,'LOS SANTOS',1,170,NULL,NULL,1),(425,68,'MACARAVITA',1,170,NULL,NULL,1),(432,68,'MALAGA',1,170,NULL,NULL,1),(444,68,'MATANZA',1,170,NULL,NULL,1),(464,68,'MOGOTES',1,170,NULL,NULL,1),(468,68,'MOLAGAVITA',1,170,NULL,NULL,1),(498,68,'OCAMONTE',1,170,NULL,NULL,1),(500,68,'OIBA',1,170,NULL,NULL,1),(502,68,'ONZAGA',1,170,NULL,NULL,1),(522,68,'PALMAR',1,170,NULL,NULL,1),(524,68,'PALMAS DEL SOCORRO',1,170,NULL,NULL,1),(533,68,'PARAMO',1,170,NULL,NULL,1),(547,68,'PIEDECUESTA',1,170,NULL,NULL,1),(549,68,'PINCHOTE',1,170,NULL,NULL,1),(572,68,'PUENTE NACIONAL',1,170,NULL,NULL,1),(573,68,'PUERTO PARRA',1,170,NULL,NULL,1),(575,68,'PUERTO WILCHES',1,170,NULL,NULL,1),(615,68,'RIONEGRO',1,170,NULL,NULL,1),(655,68,'SABANA DE TORRES',1,170,NULL,NULL,1),(669,68,'SAN ANDRES',1,170,NULL,NULL,1),(673,68,'SAN BENITO',1,170,NULL,NULL,1),(679,68,'SAN GIL',1,170,NULL,NULL,1),(682,68,'SAN JOAQUIN',1,170,NULL,NULL,1),(684,68,'SAN JOSE DE MIRANDA',1,170,NULL,NULL,1),(686,68,'SAN MIGUEL',1,170,NULL,NULL,1),(689,68,'SAN VICENTE DE CHUCURI',1,170,NULL,NULL,1),(705,68,'SANTA BARBARA',1,170,NULL,NULL,1),(720,68,'SANTA HELENA DEL OPON',1,170,NULL,NULL,1),(745,68,'SIMACOTA',1,170,NULL,NULL,1),(755,68,'SOCORRO',1,170,NULL,NULL,1),(770,68,'SUAITA',1,170,NULL,NULL,1),(773,68,'SUCRE',1,170,NULL,NULL,1),(780,68,'SURATA',1,170,NULL,NULL,1),(820,68,'TONA',1,170,NULL,NULL,1),(855,68,'VALLE DE SAN JOSE',1,170,NULL,NULL,1),(861,68,'VELEZ',1,170,NULL,NULL,1),(867,68,'VETAS',1,170,NULL,NULL,1),(872,68,'VILLANUEVA',1,170,NULL,NULL,1),(895,68,'ZAPATOCA',1,170,NULL,NULL,1),(1,70,'SINCELEJO',1,170,NULL,NULL,1),(110,70,'BUENAVISTA',1,170,NULL,NULL,1),(124,70,'CAIMITO',1,170,NULL,NULL,1),(204,70,'COLOSO',1,170,NULL,NULL,1),(215,70,'COROZAL',1,170,NULL,NULL,1),(221,70,'COVEÑAS',1,170,NULL,NULL,1),(230,70,'CHALAN',1,170,NULL,NULL,1),(233,70,'EL ROBLE',1,170,NULL,NULL,1),(235,70,'GALERAS',1,170,NULL,NULL,1),(265,70,'GUARANDA',1,170,NULL,NULL,1),(400,70,'LA UNION',1,170,NULL,NULL,1),(418,70,'LOS PALMITOS',1,170,NULL,NULL,1),(429,70,'MAJAGUAL',1,170,NULL,NULL,1),(473,70,'MORROA',1,170,NULL,NULL,1),(508,70,'OVEJAS',1,170,NULL,NULL,1),(523,70,'PALMITO',1,170,NULL,NULL,1),(670,70,'SAMPUES',1,170,NULL,NULL,1),(678,70,'SAN BENITO ABAD',1,170,NULL,NULL,1),(702,70,'SAN JUAN DE BETULIA',1,170,NULL,NULL,1),(708,70,'SAN MARCOS',1,170,NULL,NULL,1),(713,70,'SAN ONOFRE',1,170,NULL,NULL,1),(717,70,'SAN PEDRO',1,170,NULL,NULL,1),(742,70,'SAN LUIS DE SINCE',1,170,NULL,NULL,1),(771,70,'SUCRE',1,170,NULL,NULL,1),(820,70,'SANTIAGO DE TOLU',1,170,NULL,NULL,1),(823,70,'TOLU VIEJO',1,170,NULL,NULL,1),(1,73,'IBAGUE',1,170,NULL,NULL,1),(24,73,'ALPUJARRA',1,170,NULL,NULL,1),(26,73,'ALVARADO',1,170,NULL,NULL,1),(30,73,'AMBALEMA',1,170,NULL,NULL,1),(43,73,'ANZOATEGUI',1,170,NULL,NULL,1),(55,73,'ARMERO GUAYABAL',1,170,NULL,NULL,1),(67,73,'ATACO',1,170,NULL,NULL,1),(124,73,'CAJAMARCA',1,170,NULL,NULL,1),(148,73,'CARMEN DE APICALA',1,170,NULL,NULL,1),(152,73,'CASABIANCA',1,170,NULL,NULL,1),(168,73,'CHAPARRAL',1,170,NULL,NULL,1),(200,73,'COELLO',1,170,NULL,NULL,1),(217,73,'COYAIMA',1,170,NULL,NULL,1),(226,73,'CUNDAY',1,170,NULL,NULL,1),(236,73,'DOLORES',1,170,NULL,NULL,1),(268,73,'ESPINAL',1,170,NULL,NULL,1),(270,73,'FALAN',1,170,NULL,NULL,1),(275,73,'FLANDES',1,170,NULL,NULL,1),(283,73,'FRESNO',1,170,NULL,NULL,1),(319,73,'GUAMO',1,170,NULL,NULL,1),(347,73,'HERVEO',1,170,NULL,NULL,1),(349,73,'HONDA',1,170,NULL,NULL,1),(352,73,'ICONONZO',1,170,NULL,NULL,1),(408,73,'LERIDA',1,170,NULL,NULL,1),(411,73,'LIBANO',1,170,NULL,NULL,1),(443,73,'SAN SEBASTIAN DE MARIQUITA',1,170,NULL,NULL,1),(449,73,'MELGAR',1,170,NULL,NULL,1),(461,73,'MURILLO',1,170,NULL,NULL,1),(483,73,'NATAGAIMA',1,170,NULL,NULL,1),(504,73,'ORTEGA',1,170,NULL,NULL,1),(520,73,'PALOCABILDO',1,170,NULL,NULL,1),(547,73,'PIEDRAS',1,170,NULL,NULL,1),(555,73,'PLANADAS',1,170,NULL,NULL,1),(563,73,'PRADO',1,170,NULL,NULL,1),(585,73,'PURIFICACION',1,170,NULL,NULL,1),(616,73,'RIOBLANCO',1,170,NULL,NULL,1),(622,73,'RONCESVALLES',1,170,NULL,NULL,1),(624,73,'ROVIRA',1,170,NULL,NULL,1),(671,73,'SALDAÑA',1,170,NULL,NULL,1),(675,73,'SAN ANTONIO',1,170,NULL,NULL,1),(678,73,'SAN LUIS',1,170,NULL,NULL,1),(686,73,'SANTA ISABEL',1,170,NULL,NULL,1),(770,73,'SUAREZ',1,170,NULL,NULL,1),(854,73,'VALLE DE SAN JUAN',1,170,NULL,NULL,1),(861,73,'VENADILLO',1,170,NULL,NULL,1),(870,73,'VILLAHERMOSA',1,170,NULL,NULL,1),(873,73,'VILLARRICA',1,170,NULL,NULL,1),(1,76,'CALI',1,170,NULL,NULL,1),(20,76,'ALCALA',1,170,NULL,NULL,1),(36,76,'ANDALUCIA',1,170,NULL,NULL,1),(41,76,'ANSERMANUEVO',1,170,NULL,NULL,1),(54,76,'ARGELIA',1,170,NULL,NULL,1),(100,76,'BOLIVAR',1,170,NULL,NULL,1),(109,76,'BUENAVENTURA',1,170,NULL,NULL,1),(111,76,'GUADALAJARA DE BUGA',1,170,NULL,NULL,1),(113,76,'BUGALAGRANDE',1,170,NULL,NULL,1),(122,76,'CAICEDONIA',1,170,NULL,NULL,1),(126,76,'CALIMA',1,170,NULL,NULL,1),(130,76,'CANDELARIA',1,170,NULL,NULL,1),(147,76,'CARTAGO',1,170,NULL,NULL,1),(233,76,'DAGUA',1,170,NULL,NULL,1),(243,76,'EL AGUILA',1,170,NULL,NULL,1),(246,76,'EL CAIRO',1,170,NULL,NULL,1),(248,76,'EL CERRITO',1,170,NULL,NULL,1),(250,76,'EL DOVIO',1,170,NULL,NULL,1),(275,76,'FLORIDA',1,170,NULL,NULL,1),(306,76,'GINEBRA',1,170,NULL,NULL,1),(318,76,'GUACARI',1,170,NULL,NULL,1),(364,76,'JAMUNDI',1,170,NULL,NULL,1),(377,76,'LA CUMBRE',1,170,NULL,NULL,1),(400,76,'LA UNION',1,170,NULL,NULL,1),(403,76,'LA VICTORIA',1,170,NULL,NULL,1),(497,76,'OBANDO',1,170,NULL,NULL,1),(520,76,'PALMIRA',1,170,NULL,NULL,1),(563,76,'PRADERA',1,170,NULL,NULL,1),(606,76,'RESTREPO',1,170,NULL,NULL,1),(616,76,'RIOFRIO',1,170,NULL,NULL,1),(622,76,'ROLDANILLO',1,170,NULL,NULL,1),(670,76,'SAN PEDRO',1,170,NULL,NULL,1),(736,76,'SEVILLA',1,170,NULL,NULL,1),(823,76,'TORO',1,170,NULL,NULL,1),(828,76,'TRUJILLO',1,170,NULL,NULL,1),(834,76,'TULUA',1,170,NULL,NULL,1),(845,76,'ULLOA',1,170,NULL,NULL,1),(863,76,'VERSALLES',1,170,NULL,NULL,1),(869,76,'VIJES',1,170,NULL,NULL,1),(890,76,'YOTOCO',1,170,NULL,NULL,1),(892,76,'YUMBO',1,170,NULL,NULL,1),(895,76,'ZARZAL',1,170,NULL,NULL,1),(1,81,'ARAUCA',1,170,NULL,NULL,1),(65,81,'ARAUQUITA',1,170,NULL,NULL,1),(220,81,'CRAVO NORTE',1,170,NULL,NULL,1),(300,81,'FORTUL',1,170,NULL,NULL,1),(591,81,'PUERTO RONDON',1,170,NULL,NULL,1),(736,81,'SARAVENA',1,170,NULL,NULL,1),(794,81,'TAME',1,170,NULL,NULL,1),(1,85,'YOPAL',1,170,NULL,NULL,1),(10,85,'AGUAZUL',1,170,NULL,NULL,1),(15,85,'CHAMEZA',1,170,NULL,NULL,1),(125,85,'HATO COROZAL',1,170,NULL,NULL,1),(136,85,'LA SALINA',1,170,NULL,NULL,1),(139,85,'MANI',1,170,NULL,NULL,1),(162,85,'MONTERREY',1,170,NULL,NULL,1),(225,85,'NUNCHIA',1,170,NULL,NULL,1),(230,85,'OROCUE',1,170,NULL,NULL,1),(250,85,'PAZ DE ARIPORO',1,170,NULL,NULL,1),(263,85,'PORE',1,170,NULL,NULL,1),(279,85,'RECETOR',1,170,NULL,NULL,1),(300,85,'SABANALARGA',1,170,NULL,NULL,1),(315,85,'SACAMA',1,170,NULL,NULL,1),(325,85,'SAN LUIS DE PALENQUE',1,170,NULL,NULL,1),(400,85,'TAMARA',1,170,NULL,NULL,1),(410,85,'TAURAMENA',1,170,NULL,NULL,1),(430,85,'TRINIDAD',1,170,NULL,NULL,1),(440,85,'VILLANUEVA',1,170,NULL,NULL,1),(1,86,'MOCOA',1,170,NULL,NULL,1),(219,86,'COLON',1,170,NULL,NULL,1),(320,86,'ORITO',1,170,NULL,NULL,1),(568,86,'PUERTO ASIS',1,170,NULL,NULL,1),(569,86,'PUERTO CAICEDO',1,170,NULL,NULL,1),(571,86,'PUERTO GUZMAN',1,170,NULL,NULL,1),(573,86,'PUERTO LEGUIZAMO',1,170,NULL,NULL,1),(749,86,'SIBUNDOY',1,170,NULL,NULL,1),(755,86,'SAN FRANCISCO',1,170,NULL,NULL,1),(757,86,'SAN MIGUEL',1,170,NULL,NULL,1),(760,86,'SANTIAGO',1,170,NULL,NULL,1),(865,86,'VALLE DEL GUAMUEZ',1,170,NULL,NULL,1),(885,86,'VILLAGARZON',1,170,NULL,NULL,1),(1,88,'SAN ANDRES',1,170,NULL,NULL,1),(564,88,'PROVIDENCIA',1,170,NULL,NULL,1),(1,91,'LETICIA',1,170,NULL,NULL,1),(263,91,'EL ENCANTO',1,170,NULL,NULL,1),(405,91,'LA CHORRERA',1,170,NULL,NULL,1),(407,91,'LA PEDRERA',1,170,NULL,NULL,1),(430,91,'LA VICTORIA',1,170,NULL,NULL,1),(460,91,'MIRITI - PARANA',1,170,NULL,NULL,1),(530,91,'PUERTO ALEGRIA',1,170,NULL,NULL,1),(536,91,'PUERTO ARICA',1,170,NULL,NULL,1),(540,91,'PUERTO NARIÑO',1,170,NULL,NULL,1),(669,91,'PUERTO SANTANDER',1,170,NULL,NULL,1),(798,91,'TARAPACA',1,170,NULL,NULL,1),(1,94,'INIRIDA',1,170,NULL,NULL,1),(343,94,'BARRANCO MINAS',1,170,NULL,NULL,1),(663,94,'MAPIRIPANA',1,170,NULL,NULL,1),(883,94,'SAN FELIPE',1,170,NULL,NULL,1),(884,94,'PUERTO COLOMBIA',1,170,NULL,NULL,1),(885,94,'LA GUADALUPE',1,170,NULL,NULL,1),(886,94,'CACAHUAL',1,170,NULL,NULL,1),(887,94,'PANA PANA',1,170,NULL,NULL,1),(888,94,'MORICHAL',1,170,NULL,NULL,1),(1,95,'SAN JOSE DEL GUAVIARE',1,170,NULL,NULL,1),(15,95,'CALAMAR',1,170,NULL,NULL,1),(25,95,'EL RETORNO',1,170,NULL,NULL,1),(200,95,'MIRAFLORES',1,170,NULL,NULL,1),(1,97,'MITU',1,170,NULL,NULL,1),(161,97,'CARURU',1,170,NULL,NULL,1),(511,97,'PACOA',1,170,NULL,NULL,1),(666,97,'TARAIRA',1,170,NULL,NULL,1),(777,97,'PAPUNAUA',1,170,NULL,NULL,1),(889,97,'YAVARATE',1,170,NULL,NULL,1),(524,99,'LA PRIMAVERA',1,170,NULL,NULL,1),(624,99,'SANTA ROSALIA',1,170,NULL,NULL,1),(579,5,'Puerto Berrio',1,170,'0',NULL,1);
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `par_serv_servicios`
--

DROP TABLE IF EXISTS `par_serv_servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `par_serv_servicios` (
  `par_serv_secue` decimal(8,0) NOT NULL,
  `par_serv_codigo` varchar(5) DEFAULT NULL,
  `par_serv_nombre` varchar(100) DEFAULT NULL,
  `par_serv_estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `par_serv_servicios`
--

LOCK TABLES `par_serv_servicios` WRITE;
/*!40000 ALTER TABLE `par_serv_servicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `par_serv_servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfiles` (
  `codi_perfil` decimal(10,0) NOT NULL,
  `nomb_perfil` varchar(45) NOT NULL,
  `usua_esta` varchar(10) NOT NULL,
  `perm_radi` char(1) DEFAULT '0',
  `usua_admin` char(1) DEFAULT '0',
  `usua_nuevo` char(1) DEFAULT '0',
  `codi_nivel` decimal(2,0) DEFAULT '1',
  `perm_radi_sal` decimal(10,0) DEFAULT '0',
  `usua_admin_archivo` decimal(1,0) DEFAULT '0',
  `usua_masiva` decimal(1,0) DEFAULT '0',
  `usua_perm_dev` decimal(1,0) DEFAULT '0',
  `usua_perm_numera_res` varchar(1) DEFAULT NULL,
  `usua_perm_numeradoc` decimal(1,0) DEFAULT NULL,
  `sgd_panu_codi` decimal(4,0) DEFAULT NULL,
  `usua_prad_tp1` decimal(1,0) DEFAULT '0',
  `usua_prad_tp2` decimal(1,0) DEFAULT '0',
  `usua_prad_tp4` decimal(1,0) DEFAULT '0',
  `usua_perm_envios` decimal(1,0) DEFAULT '0',
  `usua_perm_modifica` decimal(1,0) DEFAULT '0',
  `usua_perm_impresion` decimal(1,0) DEFAULT '0',
  `sgd_aper_codigo` decimal(2,0) DEFAULT NULL,
  `sgd_perm_estadistica` decimal(2,0) DEFAULT NULL,
  `usua_admin_sistema` decimal(1,0) DEFAULT NULL,
  `usua_perm_trd` decimal(1,0) DEFAULT NULL,
  `usua_perm_firma` decimal(1,0) DEFAULT NULL,
  `usua_perm_prestamo` decimal(1,0) DEFAULT NULL,
  `usuario_publico` decimal(1,0) DEFAULT NULL,
  `usuario_reasignar` decimal(1,0) DEFAULT NULL,
  `usua_perm_notifica` decimal(1,0) DEFAULT NULL,
  `usua_perm_expediente` decimal(10,0) DEFAULT NULL,
  `usua_auth_ldap` decimal(1,0) DEFAULT '0',
  `perm_archi` char(1) DEFAULT '1',
  `perm_vobo` char(1) DEFAULT '1',
  `perm_borrar_anexo` decimal(1,0) DEFAULT NULL,
  `perm_tipif_anexo` decimal(1,0) DEFAULT NULL,
  `usua_perm_adminflujos` decimal(1,0) NOT NULL DEFAULT '0',
  `usua_exp_trd` decimal(2,0) DEFAULT '0',
  `usua_perm_rademail` smallint(6) DEFAULT NULL,
  `usua_perm_accesi` decimal(1,0) DEFAULT '0',
  `usua_perm_agrcontacto` decimal(1,0) DEFAULT '0',
  `usua_prad_tp3` decimal(1,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfiles`
--

LOCK TABLES `perfiles` WRITE;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
INSERT INTO `perfiles` VALUES (1,'Directivo','0','0','0','1',1,0,0,0,0,'0',0,3,3,3,3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'0','1',0,0,0,0,1,0,0,NULL),(2,'Asistente','0','0','0','1',1,2,0,0,0,'0',0,3,3,3,3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'0','1',0,0,0,1,1,0,0,NULL),(3,'Jefe','0','0','0','1',1,2,0,0,0,'0',0,3,3,3,3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'0','1',0,0,0,1,1,0,0,NULL),(4,'Funcionario','0','0','0','1',1,2,0,0,0,'0',0,3,3,3,3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'0','1',0,0,0,1,1,0,0,NULL),(5,'Ventanilla','0','0','0','1',1,2,0,0,0,'0',0,3,3,3,3,0,0,0,1,0,0,0,0,0,0,0,0,0,0,'0','1',0,0,0,1,1,0,0,NULL),(6,'Admin de sistema','0','0','1','1',1,2,0,0,0,'0',0,3,3,3,3,0,0,0,1,0,0,0,0,0,0,0,0,0,0,'0','1',0,0,0,1,1,0,0,NULL),(7,'Admin de gestion documental','0','0','0','1',1,2,0,0,0,'0',0,3,3,3,3,0,0,0,1,0,0,0,0,0,0,0,0,0,0,'0','1',0,0,0,1,1,0,0,NULL);
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pl_generado_plg`
--

DROP TABLE IF EXISTS `pl_generado_plg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pl_generado_plg` (
  `depe_codi` varchar(5) DEFAULT NULL,
  `radi_nume_radi` varchar(15) DEFAULT NULL,
  `plt_codi` decimal(4,0) DEFAULT NULL,
  `plg_codi` decimal(4,0) DEFAULT NULL,
  `plg_comentarios` varchar(150) DEFAULT NULL,
  `plg_analiza` decimal(10,0) DEFAULT NULL,
  `plg_firma` decimal(10,0) DEFAULT NULL,
  `plg_autoriza` decimal(10,0) DEFAULT NULL,
  `plg_imprime` decimal(10,0) DEFAULT NULL,
  `plg_envia` decimal(10,0) DEFAULT NULL,
  `plg_archivo_tmp` varchar(150) DEFAULT NULL,
  `plg_archivo_final` varchar(150) DEFAULT NULL,
  `plg_nombre` varchar(30) DEFAULT NULL,
  `plg_crea` decimal(10,0) DEFAULT '0',
  `plg_autoriza_fech` date DEFAULT NULL,
  `plg_imprime_fech` date DEFAULT NULL,
  `plg_envia_fech` date DEFAULT NULL,
  `plg_crea_fech` date DEFAULT NULL,
  `plg_creador` varchar(20) DEFAULT NULL,
  `pl_codi` decimal(4,0) DEFAULT NULL,
  `usua_doc` varchar(14) DEFAULT NULL,
  `sgd_rem_destino` decimal(1,0) DEFAULT '0',
  `radi_nume_sal` varchar(15) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pl_generado_plg`
--

LOCK TABLES `pl_generado_plg` WRITE;
/*!40000 ALTER TABLE `pl_generado_plg` DISABLE KEYS */;
/*!40000 ALTER TABLE `pl_generado_plg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pl_tipo_plt`
--

DROP TABLE IF EXISTS `pl_tipo_plt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pl_tipo_plt` (
  `plt_codi` decimal(4,0) NOT NULL,
  `plt_desc` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pl_tipo_plt`
--

LOCK TABLES `pl_tipo_plt` WRITE;
/*!40000 ALTER TABLE `pl_tipo_plt` DISABLE KEYS */;
/*!40000 ALTER TABLE `pl_tipo_plt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan_table`
--

DROP TABLE IF EXISTS `plan_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan_table` (
  `statement_id` varchar(30) DEFAULT NULL,
  `timestamp` date DEFAULT NULL,
  `remarks` varchar(80) DEFAULT NULL,
  `operation` varchar(30) DEFAULT NULL,
  `options` varchar(30) DEFAULT NULL,
  `object_node` varchar(128) DEFAULT NULL,
  `object_owner` varchar(30) DEFAULT NULL,
  `object_name` varchar(30) DEFAULT NULL,
  `object_instance` int(11) DEFAULT NULL,
  `object_type` varchar(30) DEFAULT NULL,
  `optimizer` varchar(255) DEFAULT NULL,
  `search_columns` decimal(10,0) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `cardinality` int(11) DEFAULT NULL,
  `s` int(11) DEFAULT NULL,
  `other_tag` varchar(255) DEFAULT NULL,
  `partition_start` varchar(255) DEFAULT NULL,
  `partition_stop` varchar(255) DEFAULT NULL,
  `partition_id` int(11) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `distribution` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan_table`
--

LOCK TABLES `plan_table` WRITE;
/*!40000 ALTER TABLE `plan_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `plan_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plsql_profiler_data`
--

DROP TABLE IF EXISTS `plsql_profiler_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plsql_profiler_data` (
  `runid` decimal(10,0) DEFAULT NULL,
  `unit_numeric` decimal(10,0) DEFAULT NULL,
  `line` decimal(10,0) NOT NULL,
  `total_occur` decimal(10,0) DEFAULT NULL,
  `total_time` decimal(10,0) DEFAULT NULL,
  `min_time` decimal(10,0) DEFAULT NULL,
  `max_time` decimal(10,0) DEFAULT NULL,
  `spare1` decimal(10,0) DEFAULT NULL,
  `spare2` decimal(10,0) DEFAULT NULL,
  `spare3` decimal(10,0) DEFAULT NULL,
  `spare4` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plsql_profiler_data`
--

LOCK TABLES `plsql_profiler_data` WRITE;
/*!40000 ALTER TABLE `plsql_profiler_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `plsql_profiler_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plsql_profiler_runs`
--

DROP TABLE IF EXISTS `plsql_profiler_runs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plsql_profiler_runs` (
  `runid` decimal(10,0) DEFAULT NULL,
  `related_run` decimal(10,0) DEFAULT NULL,
  `run_owner` varchar(32) DEFAULT NULL,
  `run_date` date DEFAULT NULL,
  `run_comment` varchar(2047) DEFAULT NULL,
  `run_total_time` decimal(10,0) DEFAULT NULL,
  `run_system_info` varchar(2047) DEFAULT NULL,
  `run_comment1` varchar(2047) DEFAULT NULL,
  `spare1` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plsql_profiler_runs`
--

LOCK TABLES `plsql_profiler_runs` WRITE;
/*!40000 ALTER TABLE `plsql_profiler_runs` DISABLE KEYS */;
/*!40000 ALTER TABLE `plsql_profiler_runs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plsql_profiler_units`
--

DROP TABLE IF EXISTS `plsql_profiler_units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plsql_profiler_units` (
  `runid` decimal(10,0) DEFAULT NULL,
  `unit_numeric` decimal(10,0) DEFAULT NULL,
  `unit_type` varchar(32) DEFAULT NULL,
  `unit_owner` varchar(32) DEFAULT NULL,
  `unit_name` varchar(32) DEFAULT NULL,
  `unit_timestamp` date DEFAULT NULL,
  `total_time` decimal(10,0) NOT NULL DEFAULT '0',
  `spare1` decimal(10,0) DEFAULT NULL,
  `spare2` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plsql_profiler_units`
--

LOCK TABLES `plsql_profiler_units` WRITE;
/*!40000 ALTER TABLE `plsql_profiler_units` DISABLE KEYS */;
/*!40000 ALTER TABLE `plsql_profiler_units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestamo`
--

DROP TABLE IF EXISTS `prestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prestamo` (
  `pres_id` decimal(10,0) NOT NULL,
  `radi_nume_radi` varchar(15) NOT NULL,
  `usua_login_actu` varchar(50) NOT NULL,
  `depe_codi` varchar(5) NOT NULL,
  `usua_login_pres` varchar(50) DEFAULT NULL,
  `pres_desc` varchar(200) DEFAULT NULL,
  `pres_fech_pres` datetime DEFAULT NULL,
  `pres_fech_devo` datetime DEFAULT NULL,
  `pres_fech_pedi` datetime NOT NULL,
  `pres_estado` decimal(2,0) DEFAULT NULL,
  `pres_requerimiento` decimal(2,0) DEFAULT NULL,
  `pres_depe_arch` varchar(5) DEFAULT NULL,
  `pres_fech_venc` datetime DEFAULT NULL,
  `dev_desc` varchar(500) DEFAULT NULL,
  `pres_fech_canc` datetime DEFAULT NULL,
  `usua_login_canc` varchar(50) DEFAULT NULL,
  `usua_login_rx` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestamo`
--

LOCK TABLES `prestamo` WRITE;
/*!40000 ALTER TABLE `prestamo` DISABLE KEYS */;
/*!40000 ALTER TABLE `prestamo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radicado`
--

DROP TABLE IF EXISTS `radicado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radicado` (
  `radi_nume_radi` varchar(15) NOT NULL,
  `radi_fech_radi` datetime NOT NULL,
  `tdoc_codi` decimal(4,0) NOT NULL,
  `trte_codi` decimal(2,0) DEFAULT NULL,
  `mrec_codi` decimal(2,0) DEFAULT NULL,
  `eesp_codi` decimal(10,0) DEFAULT NULL,
  `eotra_codi` decimal(10,0) DEFAULT NULL,
  `radi_tipo_empr` varchar(2) DEFAULT NULL,
  `radi_fech_ofic` date DEFAULT NULL,
  `tdid_codi` decimal(2,0) DEFAULT NULL,
  `radi_nume_iden` varchar(15) DEFAULT NULL,
  `radi_nomb` varchar(90) DEFAULT NULL,
  `radi_prim_apel` varchar(50) DEFAULT NULL,
  `radi_segu_apel` varchar(50) DEFAULT NULL,
  `radi_pais` varchar(70) DEFAULT NULL,
  `muni_codi` decimal(5,0) DEFAULT NULL,
  `cpob_codi` decimal(4,0) DEFAULT NULL,
  `carp_codi` decimal(3,0) DEFAULT NULL,
  `esta_codi` decimal(2,0) DEFAULT NULL,
  `dpto_codi` decimal(2,0) DEFAULT NULL,
  `cen_muni_codi` decimal(4,0) DEFAULT NULL,
  `cen_dpto_codi` decimal(2,0) DEFAULT NULL,
  `radi_dire_corr` varchar(100) DEFAULT NULL,
  `radi_tele_cont` varchar(15) DEFAULT NULL,
  `radi_nume_hoja` decimal(4,0) DEFAULT NULL,
  `radi_desc_anex` varchar(500) DEFAULT NULL,
  `radi_nume_deri` varchar(15) DEFAULT NULL,
  `radi_path` varchar(100) DEFAULT NULL,
  `radi_usua_actu` decimal(10,0) DEFAULT NULL,
  `radi_depe_actu` varchar(5) DEFAULT NULL,
  `radi_fech_asig` datetime DEFAULT NULL,
  `radi_arch1` varchar(10) DEFAULT NULL,
  `radi_arch2` varchar(10) DEFAULT NULL,
  `radi_arch3` varchar(10) DEFAULT NULL,
  `radi_arch4` varchar(10) DEFAULT NULL,
  `ra_asun` varchar(350) DEFAULT NULL,
  `radi_usu_ante` varchar(45) DEFAULT NULL,
  `radi_depe_radi` varchar(5) DEFAULT NULL,
  `radi_rem` varchar(60) DEFAULT NULL,
  `radi_usua_radi` decimal(10,0) DEFAULT NULL,
  `codi_nivel` decimal(2,0) DEFAULT '1',
  `flag_nivel` int(11) DEFAULT '1',
  `carp_per` decimal(1,0) DEFAULT '0',
  `radi_leido` decimal(1,0) DEFAULT '0',
  `radi_cuentai` varchar(20) DEFAULT NULL,
  `radi_tipo_deri` decimal(2,0) DEFAULT '0',
  `listo` varchar(2) DEFAULT NULL,
  `sgd_tma_codigo` decimal(4,0) DEFAULT NULL,
  `sgd_mtd_codigo` decimal(4,0) DEFAULT NULL,
  `par_serv_secue` decimal(8,0) DEFAULT NULL,
  `sgd_fld_codigo` decimal(3,0) DEFAULT '0',
  `radi_agend` decimal(1,0) DEFAULT NULL,
  `radi_fech_agend` datetime DEFAULT NULL,
  `radi_fech_doc` date DEFAULT NULL,
  `sgd_doc_secuencia` decimal(15,0) DEFAULT NULL,
  `sgd_pnufe_codi` decimal(4,0) DEFAULT NULL,
  `sgd_eanu_codigo` decimal(1,0) DEFAULT NULL,
  `sgd_not_codi` decimal(3,0) DEFAULT NULL,
  `radi_fech_notif` datetime DEFAULT NULL,
  `sgd_tdec_codigo` decimal(4,0) DEFAULT NULL,
  `sgd_apli_codi` decimal(4,0) DEFAULT NULL,
  `sgd_ttr_codigo` int(11) DEFAULT '0',
  `usua_doc_ante` varchar(14) DEFAULT NULL,
  `radi_fech_antetx` datetime DEFAULT NULL,
  `sgd_trad_codigo` decimal(2,0) DEFAULT NULL,
  `fech_vcmto` datetime DEFAULT NULL,
  `tdoc_vcmto` decimal(4,0) DEFAULT NULL,
  `sgd_termino_real` decimal(4,0) DEFAULT NULL,
  `id_cont` decimal(2,0) DEFAULT '1',
  `sgd_spub_codigo` decimal(2,0) DEFAULT '0',
  `id_pais` decimal(4,0) DEFAULT NULL,
  `medio_m` varchar(5) DEFAULT NULL,
  `radi_nrr` decimal(2,0) DEFAULT NULL,
  `numero_rm` varchar(15) DEFAULT NULL,
  `numero_tran` varchar(15) DEFAULT NULL,
  `texto_archivo` text,
  PRIMARY KEY (`radi_nume_radi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radicado`
--

LOCK TABLES `radicado` WRITE;
/*!40000 ALTER TABLE `radicado` DISABLE KEYS */;
INSERT INTO `radicado` VALUES ('20189980000011','2018-05-23 12:54:03',0,1,NULL,NULL,NULL,NULL,'2018-05-23',0,'1234567890',NULL,NULL,NULL,'COLOMBIA',1,NULL,99,9,11,NULL,NULL,NULL,NULL,0,'','NULL','/2018/998/docs/1234567890_2018_05_23_12_50_35.docx',1,'998',NULL,NULL,NULL,NULL,NULL,'',NULL,'998',NULL,1,1,1,1,0,'',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL),('20189980000012','2018-04-20 13:44:34',10,0,4,0,NULL,NULL,'2018-04-20',0,NULL,NULL,NULL,NULL,'170',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'SKINA TECNOLOGIES SAS','0','2018/998/20189980000012.pdf',1,'998',NULL,NULL,NULL,NULL,NULL,'Radicaciones de pruebas','ADMON','998',NULL,1,5,1,0,1,'',0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL),('20189980000021','2018-05-23 13:00:31',0,1,NULL,NULL,NULL,NULL,'2018-05-23',0,'1234567890',NULL,NULL,NULL,'COLOMBIA',1,NULL,99,9,11,NULL,NULL,NULL,NULL,0,'','NULL','/2018/998/docs/1234567890_2018_05_23_13_00_24.docx',1,'998',NULL,NULL,NULL,NULL,NULL,'',NULL,'998',NULL,1,1,1,1,0,'',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL),('20189980000022','2018-04-20 14:10:49',0,NULL,NULL,0,NULL,NULL,'2018-04-20',NULL,NULL,NULL,NULL,NULL,'170',NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','20189980000012','/2018/998/docs/120189980000012_00002.docx',1,'998',NULL,NULL,NULL,NULL,NULL,'',NULL,'998',NULL,1,5,1,0,0,'',0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL),('20189980000032','2018-04-20 14:11:04',0,NULL,NULL,0,NULL,NULL,'2018-04-20',NULL,NULL,NULL,NULL,NULL,'170',NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','20189980000012','/2018/998/docs/120189980000012_00002.docx',1,'998',NULL,NULL,NULL,NULL,NULL,'',NULL,'998',NULL,1,5,1,0,0,'',0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL),('20189980000042','2018-04-20 14:11:53',0,NULL,NULL,0,NULL,NULL,'2018-04-20',NULL,NULL,NULL,NULL,NULL,'170',NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','20189980000012','/2018/998/docs/120189980000012_00003.docx',1,'998',NULL,NULL,NULL,NULL,NULL,'',NULL,'998',NULL,1,5,1,0,0,'',0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL),('20189980000052','2018-04-20 14:11:56',0,NULL,NULL,0,NULL,NULL,'2018-04-20',NULL,NULL,NULL,NULL,NULL,'170',NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','20189980000012','/2018/998/docs/120189980000012_00003.docx',1,'998',NULL,NULL,NULL,NULL,NULL,'',NULL,'998',NULL,1,5,1,0,0,'',0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL),('20189980000062','2018-05-17 11:03:22',14,0,4,0,NULL,NULL,'2018-05-17',0,NULL,NULL,NULL,NULL,'170',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'SKINA TECNOLOGIES SAS','0',NULL,1,'998',NULL,NULL,NULL,NULL,NULL,'Radicaciones de Pruebas',NULL,'998',NULL,1,5,1,0,1,'',0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL),('20189980000072','2018-05-22 11:04:06',1,0,4,0,NULL,NULL,'2018-05-22',0,NULL,NULL,NULL,NULL,'170',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'SKINA TECNOLOGIES SAS','0','2018/998/20189980000072.pdf',1,'998',NULL,NULL,NULL,NULL,NULL,'RadicaciÃ³n de pruebas',NULL,'998',NULL,1,5,1,0,1,'',0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `radicado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `retencion_doc_tmp`
--

DROP TABLE IF EXISTS `retencion_doc_tmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `retencion_doc_tmp` (
  `cod_serie` decimal(4,0) DEFAULT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `tipologia_doc` varchar(200) DEFAULT NULL,
  `cod_subserie` varchar(10) DEFAULT NULL,
  `subserie` varchar(100) DEFAULT NULL,
  `tipologia_sub` varchar(200) DEFAULT NULL,
  `dependencia` varchar(5) DEFAULT NULL,
  `nom_depe` varchar(200) DEFAULT NULL,
  `archivo_gestion` decimal(3,0) DEFAULT NULL,
  `archivo_central` decimal(3,0) DEFAULT NULL,
  `disposicion` varchar(100) DEFAULT NULL,
  `soporte` varchar(20) DEFAULT NULL,
  `procedimiento` varchar(500) DEFAULT NULL,
  `tipo_doc` decimal(4,0) DEFAULT NULL,
  `error` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retencion_doc_tmp`
--

LOCK TABLES `retencion_doc_tmp` WRITE;
/*!40000 ALTER TABLE `retencion_doc_tmp` DISABLE KEYS */;
/*!40000 ALTER TABLE `retencion_doc_tmp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_def_contactos`
--

DROP TABLE IF EXISTS `sec_def_contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_def_contactos` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_def_contactos`
--

LOCK TABLES `sec_def_contactos` WRITE;
/*!40000 ALTER TABLE `sec_def_contactos` DISABLE KEYS */;
/*!40000 ALTER TABLE `sec_def_contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_dir_direcciones`
--

DROP TABLE IF EXISTS `sec_dir_direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_dir_direcciones` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_dir_direcciones`
--

LOCK TABLES `sec_dir_direcciones` WRITE;
/*!40000 ALTER TABLE `sec_dir_direcciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `sec_dir_direcciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secr_tp1_`
--

DROP TABLE IF EXISTS `secr_tp1_`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secr_tp1_` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secr_tp1_`
--

LOCK TABLES `secr_tp1_` WRITE;
/*!40000 ALTER TABLE `secr_tp1_` DISABLE KEYS */;
/*!40000 ALTER TABLE `secr_tp1_` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secr_tp_nodefinido`
--

DROP TABLE IF EXISTS `secr_tp_nodefinido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secr_tp_nodefinido` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secr_tp_nodefinido`
--

LOCK TABLES `secr_tp_nodefinido` WRITE;
/*!40000 ALTER TABLE `secr_tp_nodefinido` DISABLE KEYS */;
/*!40000 ALTER TABLE `secr_tp_nodefinido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_acm_acusemsg`
--

DROP TABLE IF EXISTS `sgd_acm_acusemsg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_acm_acusemsg` (
  `sgd_msg_codi` decimal(15,0) NOT NULL,
  `usua_doc` varchar(14) DEFAULT NULL,
  `sgd_msg_leido` decimal(3,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_acm_acusemsg`
--

LOCK TABLES `sgd_acm_acusemsg` WRITE;
/*!40000 ALTER TABLE `sgd_acm_acusemsg` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_acm_acusemsg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_actadd_actualiadicional`
--

DROP TABLE IF EXISTS `sgd_actadd_actualiadicional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_actadd_actualiadicional` (
  `sgd_actadd_codi` decimal(4,0) DEFAULT NULL,
  `sgd_apli_codi` decimal(4,0) DEFAULT NULL,
  `sgd_instorf_codi` decimal(4,0) DEFAULT NULL,
  `sgd_actadd_query` varchar(500) DEFAULT NULL,
  `sgd_actadd_desc` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_actadd_actualiadicional`
--

LOCK TABLES `sgd_actadd_actualiadicional` WRITE;
/*!40000 ALTER TABLE `sgd_actadd_actualiadicional` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_actadd_actualiadicional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_agen_agendados`
--

DROP TABLE IF EXISTS `sgd_agen_agendados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_agen_agendados` (
  `sgd_agen_fech` date DEFAULT NULL,
  `sgd_agen_observacion` varchar(500) DEFAULT NULL,
  `radi_nume_radi` varchar(15) NOT NULL,
  `usua_doc` varchar(18) NOT NULL,
  `depe_codi` varchar(5) DEFAULT NULL,
  `sgd_agen_codigo` decimal(10,0) DEFAULT NULL,
  `sgd_agen_fechplazo` date DEFAULT NULL,
  `sgd_agen_activo` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_agen_agendados`
--

LOCK TABLES `sgd_agen_agendados` WRITE;
/*!40000 ALTER TABLE `sgd_agen_agendados` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_agen_agendados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_anar_anexarg`
--

DROP TABLE IF EXISTS `sgd_anar_anexarg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_anar_anexarg` (
  `sgd_anar_codi` decimal(4,0) NOT NULL,
  `anex_codigo` varchar(20) DEFAULT NULL,
  `sgd_argd_codi` decimal(4,0) DEFAULT NULL,
  `sgd_anar_argcod` decimal(4,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_anar_anexarg`
--

LOCK TABLES `sgd_anar_anexarg` WRITE;
/*!40000 ALTER TABLE `sgd_anar_anexarg` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_anar_anexarg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_anu_anulados`
--

DROP TABLE IF EXISTS `sgd_anu_anulados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_anu_anulados` (
  `sgd_anu_id` decimal(4,0) DEFAULT NULL,
  `sgd_anu_desc` varchar(250) DEFAULT NULL,
  `radi_nume_radi` varchar(15) DEFAULT NULL,
  `sgd_eanu_codi` decimal(4,0) DEFAULT NULL,
  `sgd_anu_sol_fech` date DEFAULT NULL,
  `sgd_anu_fech` date DEFAULT NULL,
  `depe_codi` varchar(5) DEFAULT NULL,
  `usua_doc` varchar(14) DEFAULT NULL,
  `usua_codi` decimal(4,0) DEFAULT NULL,
  `depe_codi_anu` varchar(5) DEFAULT NULL,
  `usua_doc_anu` varchar(14) DEFAULT NULL,
  `usua_codi_anu` decimal(4,0) DEFAULT NULL,
  `usua_anu_acta` decimal(8,0) DEFAULT NULL,
  `sgd_anu_path_acta` varchar(200) DEFAULT NULL,
  `sgd_trad_codigo` decimal(2,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_anu_anulados`
--

LOCK TABLES `sgd_anu_anulados` WRITE;
/*!40000 ALTER TABLE `sgd_anu_anulados` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_anu_anulados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_aper_adminperfiles`
--

DROP TABLE IF EXISTS `sgd_aper_adminperfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_aper_adminperfiles` (
  `sgd_aper_codigo` decimal(2,0) DEFAULT NULL,
  `sgd_aper_descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_aper_adminperfiles`
--

LOCK TABLES `sgd_aper_adminperfiles` WRITE;
/*!40000 ALTER TABLE `sgd_aper_adminperfiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_aper_adminperfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_apli_aplintegra`
--

DROP TABLE IF EXISTS `sgd_apli_aplintegra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_apli_aplintegra` (
  `sgd_apli_codi` decimal(4,0) DEFAULT NULL,
  `sgd_apli_descrip` varchar(150) DEFAULT NULL,
  `sgd_apli_lk1desc` varchar(150) DEFAULT NULL,
  `sgd_apli_lk1` varchar(150) DEFAULT NULL,
  `sgd_apli_lk2desc` varchar(150) DEFAULT NULL,
  `sgd_apli_lk2` varchar(150) DEFAULT NULL,
  `sgd_apli_lk3desc` varchar(150) DEFAULT NULL,
  `sgd_apli_lk3` varchar(150) DEFAULT NULL,
  `sgd_apli_lk4desc` varchar(150) DEFAULT NULL,
  `sgd_apli_lk4` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_apli_aplintegra`
--

LOCK TABLES `sgd_apli_aplintegra` WRITE;
/*!40000 ALTER TABLE `sgd_apli_aplintegra` DISABLE KEYS */;
INSERT INTO `sgd_apli_aplintegra` VALUES (0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `sgd_apli_aplintegra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_aplmen_aplimens`
--

DROP TABLE IF EXISTS `sgd_aplmen_aplimens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_aplmen_aplimens` (
  `sgd_aplmen_codi` decimal(4,0) DEFAULT NULL,
  `sgd_apli_codi` decimal(4,0) DEFAULT NULL,
  `sgd_aplmen_ref` varchar(20) DEFAULT NULL,
  `sgd_aplmen_haciaorfeo` decimal(4,0) DEFAULT NULL,
  `sgd_aplmen_desdeorfeo` decimal(4,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_aplmen_aplimens`
--

LOCK TABLES `sgd_aplmen_aplimens` WRITE;
/*!40000 ALTER TABLE `sgd_aplmen_aplimens` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_aplmen_aplimens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_aplus_plicusua`
--

DROP TABLE IF EXISTS `sgd_aplus_plicusua`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_aplus_plicusua` (
  `sgd_aplus_codi` decimal(4,0) DEFAULT NULL,
  `sgd_apli_codi` decimal(4,0) DEFAULT NULL,
  `usua_doc` varchar(14) DEFAULT NULL,
  `sgd_trad_codigo` decimal(2,0) DEFAULT NULL,
  `sgd_aplus_prioridad` decimal(1,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_aplus_plicusua`
--

LOCK TABLES `sgd_aplus_plicusua` WRITE;
/*!40000 ALTER TABLE `sgd_aplus_plicusua` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_aplus_plicusua` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_arch_depe`
--

DROP TABLE IF EXISTS `sgd_arch_depe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_arch_depe` (
  `sgd_arch_depe` varchar(5) DEFAULT NULL,
  `sgd_arch_edificio` decimal(6,0) DEFAULT NULL,
  `sgd_arch_item` decimal(6,0) DEFAULT NULL,
  `sgd_arch_id` decimal(10,0) NOT NULL,
  PRIMARY KEY (`sgd_arch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_arch_depe`
--

LOCK TABLES `sgd_arch_depe` WRITE;
/*!40000 ALTER TABLE `sgd_arch_depe` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_arch_depe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_archivo_central`
--

DROP TABLE IF EXISTS `sgd_archivo_central`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_archivo_central` (
  `sgd_archivo_id` decimal(10,0) NOT NULL,
  `sgd_archivo_tipo` decimal(10,0) DEFAULT NULL,
  `sgd_archivo_orden` varchar(15) DEFAULT NULL,
  `sgd_archivo_fechai` datetime DEFAULT NULL,
  `sgd_archivo_demandado` varchar(1500) DEFAULT NULL,
  `sgd_archivo_demandante` varchar(200) DEFAULT NULL,
  `sgd_archivo_cc_demandante` decimal(10,0) DEFAULT NULL,
  `sgd_archivo_depe` varchar(5) DEFAULT NULL,
  `sgd_archivo_zona` varchar(4) DEFAULT NULL,
  `sgd_archivo_carro` decimal(10,0) DEFAULT NULL,
  `sgd_archivo_cara` varchar(4) DEFAULT NULL,
  `sgd_archivo_estante` decimal(10,0) DEFAULT NULL,
  `sgd_archivo_entrepano` decimal(10,0) DEFAULT NULL,
  `sgd_archivo_caja` decimal(10,0) DEFAULT NULL,
  `sgd_archivo_unidocu` varchar(40) DEFAULT NULL,
  `sgd_archivo_anexo` varchar(500) DEFAULT NULL,
  `sgd_archivo_inder` decimal(10,0) DEFAULT '0',
  `sgd_archivo_path` varchar(500) DEFAULT NULL,
  `sgd_archivo_year` decimal(4,0) DEFAULT NULL,
  `sgd_archivo_rad` varchar(15) NOT NULL,
  `sgd_archivo_srd` decimal(10,0) DEFAULT NULL,
  `sgd_archivo_sbrd` decimal(10,0) DEFAULT NULL,
  `sgd_archivo_folios` decimal(10,0) DEFAULT NULL,
  `sgd_archivo_mata` decimal(10,0) DEFAULT '0',
  `sgd_archivo_fechaf` datetime DEFAULT NULL,
  `sgd_archivo_prestamo` decimal(1,0) DEFAULT NULL,
  `sgd_archivo_funprest` char(100) DEFAULT NULL,
  `sgd_archivo_fechprest` datetime DEFAULT NULL,
  `sgd_archivo_fechprestf` datetime DEFAULT NULL,
  `depe_codi` varchar(5) DEFAULT NULL,
  `sgd_archivo_usua` varchar(15) DEFAULT NULL,
  `sgd_archivo_fech` datetime DEFAULT NULL,
  PRIMARY KEY (`sgd_archivo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_archivo_central`
--

LOCK TABLES `sgd_archivo_central` WRITE;
/*!40000 ALTER TABLE `sgd_archivo_central` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_archivo_central` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_archivo_fondo`
--

DROP TABLE IF EXISTS `sgd_archivo_fondo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_archivo_fondo` (
  `sgd_archivo_id` decimal(10,0) NOT NULL,
  `sgd_archivo_tipo` decimal(10,0) DEFAULT NULL,
  `sgd_archivo_orden` varchar(15) DEFAULT NULL,
  `sgd_archivo_fechai` datetime DEFAULT NULL,
  `sgd_archivo_demandado` varchar(1500) DEFAULT NULL,
  `sgd_archivo_demandante` varchar(200) DEFAULT NULL,
  `sgd_archivo_cc_demandante` decimal(10,0) DEFAULT NULL,
  `sgd_archivo_depe` varchar(5) DEFAULT NULL,
  `sgd_archivo_zona` varchar(4) DEFAULT NULL,
  `sgd_archivo_carro` decimal(10,0) DEFAULT NULL,
  `sgd_archivo_cara` varchar(4) DEFAULT NULL,
  `sgd_archivo_estante` decimal(10,0) DEFAULT NULL,
  `sgd_archivo_entrepano` decimal(10,0) DEFAULT NULL,
  `sgd_archivo_caja` decimal(10,0) DEFAULT NULL,
  `sgd_archivo_unidocu` varchar(40) DEFAULT NULL,
  `sgd_archivo_anexo` varchar(500) DEFAULT NULL,
  `sgd_archivo_inder` decimal(10,0) DEFAULT '0',
  `sgd_archivo_path` varchar(500) DEFAULT NULL,
  `sgd_archivo_year` decimal(4,0) DEFAULT NULL,
  `sgd_archivo_rad` varchar(15) NOT NULL,
  `sgd_archivo_srd` decimal(10,0) DEFAULT NULL,
  `sgd_archivo_folios` decimal(10,0) DEFAULT NULL,
  `sgd_archivo_mata` decimal(10,0) DEFAULT '0',
  `sgd_archivo_fechaf` datetime DEFAULT NULL,
  `sgd_archivo_prestamo` decimal(1,0) DEFAULT NULL,
  `sgd_archivo_funprest` char(100) DEFAULT NULL,
  `sgd_archivo_fechprest` datetime DEFAULT NULL,
  `sgd_archivo_fechprestf` datetime DEFAULT NULL,
  `depe_codi` varchar(5) DEFAULT NULL,
  `sgd_archivo_usua` varchar(15) DEFAULT NULL,
  `sgd_archivo_fech` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_archivo_fondo`
--

LOCK TABLES `sgd_archivo_fondo` WRITE;
/*!40000 ALTER TABLE `sgd_archivo_fondo` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_archivo_fondo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_archivo_hist`
--

DROP TABLE IF EXISTS `sgd_archivo_hist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_archivo_hist` (
  `depe_codi` varchar(5) NOT NULL,
  `hist_fech` datetime NOT NULL,
  `usua_codi` decimal(10,0) NOT NULL,
  `sgd_archivo_rad` varchar(14) DEFAULT NULL,
  `hist_obse` varchar(600) NOT NULL,
  `usua_doc` varchar(14) DEFAULT NULL,
  `sgd_ttr_codigo` decimal(3,0) DEFAULT NULL,
  `hist_id` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_archivo_hist`
--

LOCK TABLES `sgd_archivo_hist` WRITE;
/*!40000 ALTER TABLE `sgd_archivo_hist` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_archivo_hist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_arg_pliego`
--

DROP TABLE IF EXISTS `sgd_arg_pliego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_arg_pliego` (
  `sgd_arg_codigo` decimal(2,0) NOT NULL,
  `sgd_arg_desc` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_arg_pliego`
--

LOCK TABLES `sgd_arg_pliego` WRITE;
/*!40000 ALTER TABLE `sgd_arg_pliego` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_arg_pliego` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_argd_argdoc`
--

DROP TABLE IF EXISTS `sgd_argd_argdoc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_argd_argdoc` (
  `sgd_argd_codi` decimal(4,0) NOT NULL,
  `sgd_pnufe_codi` decimal(4,0) DEFAULT NULL,
  `sgd_argd_tabla` varchar(100) DEFAULT NULL,
  `sgd_argd_tcodi` varchar(100) DEFAULT NULL,
  `sgd_argd_tdes` varchar(100) DEFAULT NULL,
  `sgd_argd_llist` varchar(150) DEFAULT NULL,
  `sgd_argd_campo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_argd_argdoc`
--

LOCK TABLES `sgd_argd_argdoc` WRITE;
/*!40000 ALTER TABLE `sgd_argd_argdoc` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_argd_argdoc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_argup_argudoctop`
--

DROP TABLE IF EXISTS `sgd_argup_argudoctop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_argup_argudoctop` (
  `sgd_argup_codi` decimal(4,0) NOT NULL,
  `sgd_argup_desc` varchar(50) DEFAULT NULL,
  `sgd_tpr_codigo` decimal(4,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_argup_argudoctop`
--

LOCK TABLES `sgd_argup_argudoctop` WRITE;
/*!40000 ALTER TABLE `sgd_argup_argudoctop` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_argup_argudoctop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_auditoria`
--

DROP TABLE IF EXISTS `sgd_auditoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_auditoria` (
  `fecha` varchar(10) DEFAULT NULL,
  `usua_doc` varchar(12) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `tipo` varchar(5) DEFAULT NULL,
  `tabla` varchar(50) DEFAULT NULL,
  `isql` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_auditoria`
--

LOCK TABLES `sgd_auditoria` WRITE;
/*!40000 ALTER TABLE `sgd_auditoria` DISABLE KEYS */;
INSERT INTO `sgd_auditoria` VALUES ('1524247706','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180420010826O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),USUA_DOC_SUIP=^1^    WHERE  USUA_LOGIN = ^ADMON^ '),('1524247715','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_NUEVO=^1^,USUA_PASW=^1232F297A57A5A743894A0E4A8^,DEPE_CODI=^998^, USUA_SESION=^CAMBIO PWD(20180420^ WHERE USUA_LOGIN=^ADMON^'),('1524247720','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180420010840O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1524249814','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:20 13:0443:34^ \n                WHERE USUA_SESION LIKE ^%180420010840O1921688113ADMON%^'),('1524249817','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180420014337O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),USUA_DOC_SUIP=^1^    WHERE  USUA_LOGIN = ^ADMON^ '),('1524249874','1234567890','192.168.8.113','u','_SEQUENCE','UPDATE _SEQUENCE SET SEQ_VAL=2 WHERE SEQ_NAME=^SECR_TP2_^'),('1524249874','1234567890','192.168.8.113','i','RADICADO','INSERT INTO RADICADO(RADI_TIPO_DERI,RADI_CUENTAI,EESP_CODI,MREC_CODI,RADI_FECH_OFIC,RADI_NUME_DERI,RADI_USUA_RADI,RADI_PAIS,RA_ASUN,RADI_DESC_ANEX,RADI_DEPE_RADI,RADI_USUA_ACTU,CARP_CODI,CARP_PER,RADI_NUME_RADI,TRTE_CODI,RADI_FECH_RADI,RADI_DEPE_ACTU,TDOC_CODI,TDID_CODI,CODI_NIVEL,SGD_APLI_CODI,RADI_PATH) VALUES (0,^^,0,4,^2018-04-20^,^0^,1,^170^,^RADICACIONES DE PRUEBAS^,^SKINA TECNOLOGIES SAS^,^998^,1,0,0,^20189980000012^,0,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),^998^,10,0,5,0,NULL)'),('1524249874','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_TIPO_DERI=0,RADI_CUENTAI=^^,EESP_CODI=0,MREC_CODI=4,RADI_FECH_OFIC=^2018-04-20^,RADI_NUME_DERI=^0^,RADI_USUA_RADI=1,RADI_PAIS=^170^,RA_ASUN=^RADICACIONES DE PRUEBAS^,RADI_DESC_ANEX=^SKINA TECNOLOGIES SAS^,RADI_DEPE_RADI=^998^,RADI_USUA_ACTU=1,CARP_CODI=0,CARP_PER=0,TRTE_CODI=0,RADI_FECH_RADI=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),RADI_DEPE_ACTU=^998^,TDOC_CODI=10,TDID_CODI=0,CODI_NIVEL=5,SGD_APLI_CODI=0,RADI_PATH=NULL WHERE RADI_NUME_RADI=^20189980000012^'),('1524249874','1234567890','192.168.8.113','i','HIST_EVENTOS','INSERT INTO HIST_EVENTOS(USUA_DOC_OLD,RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_CODI_DEST,DEPE_CODI_DEST,USUA_DOC,HIST_DOC_DEST,SGD_TTR_CODIGO,HIST_OBSE,HIST_FECH) VALUES (1,20189980000012,^998^,1,1,^998^,^1234567890^,1234567890,2,^ ^,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1524249874','1234567890','192.168.8.113','i','SGD_DT_RADICADO','INSERT INTO SGD_DT_RADICADO VALUES (^20189980000012^,3)'),('1524249874','1234567890','192.168.8.113','u','_SEQUENCE','UPDATE _SEQUENCE SET SEQ_VAL=2 WHERE SEQ_NAME=^SEC_DIR_DIRECCIONES^'),('1524249874','1234567890','192.168.8.113','u','SGD_DIR_DRECCIONES','UPDATE SGD_DIR_DRECCIONES SET SGD_TRD_CODIGO=3,SGD_DIR_NOMREMDES=^AGENCIA NACIONAL DE INFRAESTUCTURA -- ANI^,SGD_DIR_DOC=^830.125.996.9^,MUNI_CODI=1,DPTO_CODI=11,ID_PAIS=170,ID_CONT=1,SGD_DOC_FUN=NULL,SGD_OEM_CODIGO=NULL,SGD_CIU_CODIGO=NULL,SGD_ESP_CODI=1,SGD_SEC_CODIGO=0,SGD_DIR_DIRECCION=^CALLE 24 A # 59 - 42 EDIFICIO T3 TORRE 4 PISO 2 ^,SGD_DIR_TELEFONO=^^,SGD_DIR_MAIL=^CONTACTENOS@ANI.GOV.CO ^,SGD_DIR_CODIGO=1,SGD_DIR_NOMBRE=^^ WHERE RADI_NUME_RADI=^20189980000012^ AND SGD_DIR_TIPO=1'),('1524249874','1234567890','192.168.8.113','i','SGD_DIR_DRECCIONES','INSERT INTO SGD_DIR_DRECCIONES (SGD_TRD_CODIGO,SGD_DIR_NOMREMDES,SGD_DIR_DOC,MUNI_CODI,DPTO_CODI,ID_PAIS,ID_CONT,SGD_DOC_FUN,SGD_OEM_CODIGO,SGD_CIU_CODIGO,SGD_ESP_CODI,RADI_NUME_RADI,SGD_SEC_CODIGO,SGD_DIR_DIRECCION,SGD_DIR_TELEFONO,SGD_DIR_MAIL,SGD_DIR_TIPO,SGD_DIR_CODIGO,SGD_DIR_NOMBRE) VALUES (3,^AGENCIA NACIONAL DE INFRAESTUCTURA -- ANI^,^830.125.996.9^,1,11,170,1,NULL,NULL,NULL,1,^20189980000012^,0,^CALLE 24 A # 59 - 42 EDIFICIO T3 TORRE 4 PISO 2 ^,^^,^CONTACTENOS@ANI.GOV.CO ^,1,1,^^)'),('1524249910','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524249919','1234567890','192.168.8.113','i','SGD_RDF_RETDOCF','INSERT INTO SGD_RDF_RETDOCF(RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_DOC,SGD_MRD_CODIGO,SGD_RDF_FECH) VALUES (^20189980000012^,^998^,1,1234567890,4,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1524249919','1234567890','192.168.8.113','i','HIST_EVENTOS','INSERT INTO HIST_EVENTOS(RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_CODI_DEST,DEPE_CODI_DEST,USUA_DOC,HIST_DOC_DEST,SGD_TTR_CODIGO,HIST_OBSE,HIST_FECH) VALUES (20189980000012,^998^,1,1,^998^,^1234567890^,1234567890,32,^ASIGNACIÃ³N DE TRD^,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1524249919','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET TDOC_CODI=6 WHERE \n						RADI_NUME_RADI =^ 20189980000012^'),('1524249919','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET FECH_VCMTO =  ^Y-M-D H:I:S^ WHERE RADI_NUME_RADI = ^20189980000012^ '),('1524249920','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524249923','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524249927','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524250670','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180420015750O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1524250743','1234567890','192.168.8.113','i','SGD_USH_USUHISTORICO','INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (,^^, ^^, , ^998^, ^1234567890^, 5, NOW(), ^ADMON^)'),('1524250744','1234567890','192.168.8.113','i','SGD_USH_USUHISTORICO','INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (, ^^, ^^, , ^998^, ^1234567890^, 3, NOW(), ^ADMON^)'),('1524250744','1234567890','192.168.8.113','i','SGD_USH_USUHISTORICO','INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (, ^^,^^, , ^998^, ^1234567890^, 40, NOW(), ^ADMON^)'),('1524250744','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET  USUA_NOMB = ^USUARIO ADMINISTRADOR^,  DEPE_CODI = ^998^,  USUA_CODI = 1,  USUA_EMAIL = ^PRUEBAS@SKINATECH.COM^ WHERE USUA_LOGIN = ^ADMON^'),('1524250744','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET  USUA_PERM_PRESTAMO = 1,  PERM_RADI = 1,  USUA_MASIVA = 1,  USUA_PERM_IMPRESION = 2,  SGD_PANU_CODI = 3,  USUA_ADMIN_ARCHIVO = ^2^,  USUA_PERM_DEV = ^1^,  USUA_ADMIN_SISTEMA = ^1^,  USUA_NUEVO = ^1^,  USUA_PERM_ENVIOS = 1,  SGD_PERM_ESTADISTICA = 2,  USUA_PERM_FIRMA = 0,  USUARIO_REASIGNAR = 1,  USUARIO_PUBLICO = 1,  PERM_BORRAR_ANEXO = 1,  PERM_TIPIF_ANEXO = 1,  USUA_PERM_RADEMAIL = 1,  USUA_AUTH_LDAP = 0,  USUA_PERM_ADMINFLUJOS = 0,  PERM_ARCHI = 1,  USUA_PRAD_TP1 = 3,  USUA_PRAD_TP2 = 3,  USUA_PRAD_TP4 = 3,  USUA_PERM_MODIFICA = 1,  USUA_PERM_NOTIFICA = 0,  USUA_PERM_EXPEDIENTE = 2,  USUA_PERM_ACCESI = 0,  USUA_PERM_AGRCONTACTO = 1,  USUA_ESTA = ^1^,  USUA_PERM_TRD = ^2^,  CODI_NIVEL = 5  WHERE USUA_LOGIN = ^ADMON^'),('1524250744','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET  USUA_PERM_PRESTAMO = 1,  PERM_RADI = 1,  USUA_MASIVA = 1,  USUA_PERM_IMPRESION = 2,  SGD_PANU_CODI = 3,  USUA_ADMIN_ARCHIVO = ^2^,  USUA_PERM_DEV = ^1^,  USUA_ADMIN_SISTEMA = ^1^,  USUA_NUEVO = ^1^,  USUA_PERM_ENVIOS = 1,  SGD_PERM_ESTADISTICA = 2,  USUA_PERM_FIRMA = 0,  USUARIO_REASIGNAR = 1,  USUARIO_PUBLICO = 1,  PERM_BORRAR_ANEXO = 1,  PERM_TIPIF_ANEXO = 1,  USUA_PERM_RADEMAIL = 1,  USUA_AUTH_LDAP = 0,  USUA_PERM_ADMINFLUJOS = 0,  PERM_ARCHI = 1,  USUA_PRAD_TP1 = 3,  USUA_PRAD_TP2 = 3,  USUA_PRAD_TP4 = 3,  USUA_PERM_MODIFICA = 1,  USUA_PERM_NOTIFICA = 0,  USUA_PERM_EXPEDIENTE = 2,  USUA_PERM_ACCESI = 0,  USUA_PERM_AGRCONTACTO = 1,  USUA_ESTA = ^1^,  USUA_PERM_TRD = ^2^,  CODI_NIVEL = 5  WHERE USUA_LOGIN = ^ADMON^'),('1524250750','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:20 13:0459:10^ \n                WHERE USUA_SESION LIKE ^%180420015750O1921688113ADMON%^'),('1524250754','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180420015914O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1524250758','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524250761','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524250763','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524250776','1234567890','192.168.8.113','i','ANEXOS\n				','INSERT INTO ANEXOS\n				(SGD_REM_DESTINO,ANEX_RADI_NUME,ANEX_CODIGO,ANEX_TIPO,ANEX_TAMANO   ,ANEX_SOLO_LECT,ANEX_CREADOR,ANEX_DESC,ANEX_NUMERO,ANEX_NOMB_ARCHIVO   ,ANEX_BORRADO,ANEX_SALIDA ,SGD_DIR_TIPO,ANEX_DEPE_CREADOR,SGD_TPR_CODIGO,ANEX_FECH_ANEX,SGD_APLI_CODI,SGD_TRAD_CODIGO, SGD_EXP_NUMERO)\n	           VALUES (1  ,^20189980000012^         ,^2018998000001200001^    ,24    ,21.833     ,^N^,^ADMON^     ,^RESPUESTA A COMUNICACIÃ³N 20189980000012 DE FECHA 2018-04-20.^ ,00001 ,^120189980000012_00001.DOCX^,^N^         ,1,1,^998^,NULL,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),        NULL    ,1, ^^ ) '),('1524250781','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524250842','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:20 14:0400:42^ \n                WHERE USUA_SESION LIKE ^%180420015914O1921688113ADMON%^'),('1524250846','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180420020046O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1524250956','1234567890','192.168.8.113','i','SGD_USH_USUHISTORICO','INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (,^^, ^^, , ^998^, ^1234567890^, 5, NOW(), ^ADMON^)'),('1524250956','1234567890','192.168.8.113','i','SGD_USH_USUHISTORICO','INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (, ^^, ^^, , ^998^, ^1234567890^, 3, NOW(), ^ADMON^)'),('1524250956','1234567890','192.168.8.113','i','SGD_USH_USUHISTORICO','INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (, ^^,^^, , ^998^, ^1234567890^, 40, NOW(), ^ADMON^)'),('1524250956','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET  USUA_NOMB = ^USUARIO ADMINISTRADOR^,  DEPE_CODI = ^998^,  USUA_CODI = 1,  USUA_EMAIL = ^SOPORTE.SKINATECH@GMAIL.COM^ WHERE USUA_LOGIN = ^ADMON^'),('1524250956','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET  USUA_PERM_PRESTAMO = 1,  PERM_RADI = 1,  USUA_MASIVA = 1,  USUA_PERM_IMPRESION = 2,  SGD_PANU_CODI = 3,  USUA_ADMIN_ARCHIVO = ^2^,  USUA_PERM_DEV = ^1^,  USUA_ADMIN_SISTEMA = ^1^,  USUA_NUEVO = ^1^,  USUA_PERM_ENVIOS = 1,  SGD_PERM_ESTADISTICA = 2,  USUA_PERM_FIRMA = 0,  USUARIO_REASIGNAR = 1,  USUARIO_PUBLICO = 1,  PERM_BORRAR_ANEXO = 1,  PERM_TIPIF_ANEXO = 1,  USUA_PERM_RADEMAIL = 1,  USUA_AUTH_LDAP = 0,  USUA_PERM_ADMINFLUJOS = 0,  PERM_ARCHI = 1,  USUA_PRAD_TP1 = 0,  USUA_PRAD_TP2 = 3,  USUA_PRAD_TP4 = 0,  USUA_PERM_MODIFICA = 1,  USUA_PERM_NOTIFICA = 0,  USUA_PERM_EXPEDIENTE = 2,  USUA_PERM_ACCESI = 0,  USUA_PERM_AGRCONTACTO = 1,  USUA_ESTA = ^1^,  USUA_PERM_TRD = ^2^,  CODI_NIVEL = 5  WHERE USUA_LOGIN = ^ADMON^'),('1524250956','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET  USUA_PERM_PRESTAMO = 1,  PERM_RADI = 1,  USUA_MASIVA = 1,  USUA_PERM_IMPRESION = 2,  SGD_PANU_CODI = 3,  USUA_ADMIN_ARCHIVO = ^2^,  USUA_PERM_DEV = ^1^,  USUA_ADMIN_SISTEMA = ^1^,  USUA_NUEVO = ^1^,  USUA_PERM_ENVIOS = 1,  SGD_PERM_ESTADISTICA = 2,  USUA_PERM_FIRMA = 0,  USUARIO_REASIGNAR = 1,  USUARIO_PUBLICO = 1,  PERM_BORRAR_ANEXO = 1,  PERM_TIPIF_ANEXO = 1,  USUA_PERM_RADEMAIL = 1,  USUA_AUTH_LDAP = 0,  USUA_PERM_ADMINFLUJOS = 0,  PERM_ARCHI = 1,  USUA_PRAD_TP1 = 0,  USUA_PRAD_TP2 = 3,  USUA_PRAD_TP4 = 0,  USUA_PERM_MODIFICA = 1,  USUA_PERM_NOTIFICA = 0,  USUA_PERM_EXPEDIENTE = 2,  USUA_PERM_ACCESI = 0,  USUA_PERM_AGRCONTACTO = 1,  USUA_ESTA = ^1^,  USUA_PERM_TRD = ^2^,  CODI_NIVEL = 5  WHERE USUA_LOGIN = ^ADMON^'),('1524250961','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:20 14:0402:41^ \n                WHERE USUA_SESION LIKE ^%180420020046O1921688113ADMON%^'),('1524250965','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180420020245O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1524251172','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524251174','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524251201','1234567890','192.168.8.113','i','ANEXOS\n				','INSERT INTO ANEXOS\n				(SGD_REM_DESTINO,ANEX_RADI_NUME,ANEX_CODIGO,ANEX_TIPO,ANEX_TAMANO   ,ANEX_SOLO_LECT,ANEX_CREADOR,ANEX_DESC,ANEX_NUMERO,ANEX_NOMB_ARCHIVO   ,ANEX_BORRADO,ANEX_SALIDA ,SGD_DIR_TIPO,ANEX_DEPE_CREADOR,SGD_TPR_CODIGO,ANEX_FECH_ANEX,SGD_APLI_CODI,SGD_TRAD_CODIGO, SGD_EXP_NUMERO)\n	           VALUES (1  ,^20189980000012^         ,^2018998000001200002^    ,24    ,21.833     ,^N^,^ADMON^     ,^SEWAE6IE^ ,00002 ,^120189980000012_00002.DOCX^,^N^         ,1,1,^998^,NULL,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),        NULL    ,2, ^^ ) '),('1524251265','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524251277','1234567890','192.168.8.113','u','ANEXOS','UPDATE ANEXOS SET  ANEX_NOMB_ARCHIVO=^120189980000012_00002.DOCX^,ANEX_TAMANO = 21.833,ANEX_TIPO=24,  ANEX_SALIDA=1,SGD_REM_DESTINO=1,SGD_DIR_TIPO=1,ANEX_DESC=^SEWAE6IE^, SGD_TRAD_CODIGO = 2, SGD_APLI_CODI = NULL  WHERE ANEX_CODIGO=^2018998000001200002^'),('1524251325','1234567890','192.168.8.113','u','ANEXOS','UPDATE ANEXOS SET  ANEX_NOMB_ARCHIVO=^120189980000012_00002.DOCX^,ANEX_TAMANO = 21.833,ANEX_TIPO=24,  ANEX_SALIDA=1,SGD_REM_DESTINO=1,SGD_DIR_TIPO=1,ANEX_DESC=^SEWAE6IE^, SGD_TRAD_CODIGO = 2, SGD_APLI_CODI = NULL  WHERE ANEX_CODIGO=^2018998000001200002^'),('1524251425','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:20 14:0410:25^ \n                WHERE USUA_SESION LIKE ^%180420020245O1921688113ADMON%^'),('1524251428','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180420021028O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1524251432','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524251434','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524251443','1234567890','192.168.8.113','u','ANEXOS','UPDATE ANEXOS SET  ANEX_NOMB_ARCHIVO=^120189980000012_00002.DOCX^,ANEX_TAMANO = 21.833,ANEX_TIPO=24,  ANEX_SALIDA=1,SGD_REM_DESTINO=1,SGD_DIR_TIPO=1,ANEX_DESC=^SEWAE6IE^, SGD_TRAD_CODIGO = 2, SGD_APLI_CODI = NULL  WHERE ANEX_CODIGO=^2018998000001200002^'),('1524251445','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524251449','1234567890','192.168.8.113','u','_SEQUENCE','UPDATE _SEQUENCE SET SEQ_VAL=3 WHERE SEQ_NAME=^SECR_TP2_^'),('1524251449','1234567890','192.168.8.113','i','RADICADO','INSERT INTO RADICADO(RADI_TIPO_DERI,RADI_CUENTAI,EESP_CODI,MREC_CODI,RADI_FECH_OFIC,RADI_NUME_DERI,RADI_USUA_RADI,RADI_PAIS,RA_ASUN,RADI_DESC_ANEX,RADI_DEPE_RADI,RADI_USUA_ACTU,CARP_CODI,CARP_PER,RADI_NUME_RADI,TRTE_CODI,RADI_FECH_RADI,RADI_DEPE_ACTU,TDOC_CODI,TDID_CODI,CODI_NIVEL,SGD_APLI_CODI,RADI_PATH) VALUES (0,^^,0,NULL,^2018-04-20^,^20189980000012^,1,^170^,^^,^^,^998^,1,2,0,^20189980000022^,NULL,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),^998^,0,NULL,5,0,^/2018/998/DOCS/120189980000012_00002.DOCX^)'),('1524251449','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_TIPO_DERI=0,RADI_CUENTAI=^^,EESP_CODI=0,MREC_CODI=NULL,RADI_FECH_OFIC=^2018-04-20^,RADI_NUME_DERI=^20189980000012^,RADI_USUA_RADI=1,RADI_PAIS=^170^,RA_ASUN=^^,RADI_DESC_ANEX=^^,RADI_DEPE_RADI=^998^,RADI_USUA_ACTU=1,CARP_CODI=2,CARP_PER=0,TRTE_CODI=NULL,RADI_FECH_RADI=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),RADI_DEPE_ACTU=^998^,TDOC_CODI=0,TDID_CODI=NULL,CODI_NIVEL=5,SGD_APLI_CODI=0,RADI_PATH=^/2018/998/DOCS/120189980000012_00002.DOCX^ WHERE RADI_NUME_RADI=^20189980000022^'),('1524251449','1234567890','192.168.8.113','i','HIST_EVENTOS','INSERT INTO HIST_EVENTOS(RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_CODI_DEST,DEPE_CODI_DEST,USUA_DOC,HIST_DOC_DEST,SGD_TTR_CODIGO,HIST_OBSE,HIST_FECH) VALUES (20189980000022,^998^,1,1,^998^,^1234567890^,1234567890,2,^ ^,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1524251449','1234567890','192.168.8.113','u','ANEXOS','UPDATE ANEXOS SET RADI_NUME_SALIDA=^20189980000022^,\n						ANEX_SOLO_LECT = ^S^,\n						ANEX_RADI_FECH = FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),\n						ANEX_ESTADO = 2,\n						ANEX_NOMB_ARCHIVO = ^120189980000012_00002.DOCX^, \n						ANEX_TIPO=^24^,\n						SGD_DEVE_CODIGO = NULL\n		           WHERE ANEX_CODIGO=^2018998000001200002^ AND ANEX_RADI_NUME=^20189980000012^'),('1524251449','1234567890','192.168.8.113','u','_SEQUENCE','UPDATE _SEQUENCE SET SEQ_VAL=3 WHERE SEQ_NAME=^SEC_DIR_DIRECCIONES^'),('1524251449','1234567890','192.168.8.113','u','SGD_DIR_DRECCIONES','UPDATE SGD_DIR_DRECCIONES SET SGD_TRD_CODIGO=3,SGD_DIR_NOMREMDES=^^,SGD_DIR_DOC=NULL,MUNI_CODI=1,DPTO_CODI=11,ID_PAIS=170,ID_CONT=1,SGD_DOC_FUN=NULL,SGD_OEM_CODIGO=NULL,SGD_CIU_CODIGO=NULL,SGD_ESP_CODI=1,SGD_SEC_CODIGO=0,SGD_DIR_DIRECCION=^CALLE 24 A # 59 - 42 EDIFICIO T3 TORRE 4 PISO 2^,SGD_DIR_TELEFONO=^^,SGD_DIR_MAIL=^CONTACTENOS@ANI.GOV.CO^,SGD_DIR_CODIGO=2,SGD_DIR_NOMBRE=^^ WHERE RADI_NUME_RADI=^20189980000022^ AND SGD_DIR_TIPO=1'),('1524251449','1234567890','192.168.8.113','i','SGD_DIR_DRECCIONES','INSERT INTO SGD_DIR_DRECCIONES (SGD_TRD_CODIGO,SGD_DIR_NOMREMDES,SGD_DIR_DOC,MUNI_CODI,DPTO_CODI,ID_PAIS,ID_CONT,SGD_DOC_FUN,SGD_OEM_CODIGO,SGD_CIU_CODIGO,SGD_ESP_CODI,RADI_NUME_RADI,SGD_SEC_CODIGO,SGD_DIR_DIRECCION,SGD_DIR_TELEFONO,SGD_DIR_MAIL,SGD_DIR_TIPO,SGD_DIR_CODIGO,SGD_DIR_NOMBRE) VALUES (3,^^,NULL,1,11,170,1,NULL,NULL,NULL,1,^20189980000022^,0,^CALLE 24 A # 59 - 42 EDIFICIO T3 TORRE 4 PISO 2^,^^,^CONTACTENOS@ANI.GOV.CO^,1,2,^^)'),('1524251449','1234567890','192.168.8.113','d','ANEXOS','DELETE FROM ANEXOS WHERE RADI_NUME_SALIDA=^20189980000022^ AND CAST(SGD_DIR_TIPO AS CHAR(4)) LIKE ^7%^ AND SGD_DIR_TIPO !=7 '),('1524251449','1234567890','192.168.8.113','i','SGD_DT_RADICADO','INSERT INTO SGD_DT_RADICADO (RADI_NUME_RADI, DIAS_TERMINO) VALUES (^20189980000022^, 0)'),('1524251464','1234567890','192.168.8.113','u','_SEQUENCE','UPDATE _SEQUENCE SET SEQ_VAL=4 WHERE SEQ_NAME=^SECR_TP2_^'),('1524251464','1234567890','192.168.8.113','i','RADICADO','INSERT INTO RADICADO(RADI_TIPO_DERI,RADI_CUENTAI,EESP_CODI,MREC_CODI,RADI_FECH_OFIC,RADI_NUME_DERI,RADI_USUA_RADI,RADI_PAIS,RA_ASUN,RADI_DESC_ANEX,RADI_DEPE_RADI,RADI_USUA_ACTU,CARP_CODI,CARP_PER,RADI_NUME_RADI,TRTE_CODI,RADI_FECH_RADI,RADI_DEPE_ACTU,TDOC_CODI,TDID_CODI,CODI_NIVEL,SGD_APLI_CODI,RADI_PATH) VALUES (0,^^,0,NULL,^2018-04-20^,^20189980000012^,1,^170^,^^,^^,^998^,1,2,0,^20189980000032^,NULL,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),^998^,0,NULL,5,0,^/2018/998/DOCS/120189980000012_00002.DOCX^)'),('1524251464','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_TIPO_DERI=0,RADI_CUENTAI=^^,EESP_CODI=0,MREC_CODI=NULL,RADI_FECH_OFIC=^2018-04-20^,RADI_NUME_DERI=^20189980000012^,RADI_USUA_RADI=1,RADI_PAIS=^170^,RA_ASUN=^^,RADI_DESC_ANEX=^^,RADI_DEPE_RADI=^998^,RADI_USUA_ACTU=1,CARP_CODI=2,CARP_PER=0,TRTE_CODI=NULL,RADI_FECH_RADI=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),RADI_DEPE_ACTU=^998^,TDOC_CODI=0,TDID_CODI=NULL,CODI_NIVEL=5,SGD_APLI_CODI=0,RADI_PATH=^/2018/998/DOCS/120189980000012_00002.DOCX^ WHERE RADI_NUME_RADI=^20189980000032^'),('1524251464','1234567890','192.168.8.113','i','HIST_EVENTOS','INSERT INTO HIST_EVENTOS(RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_CODI_DEST,DEPE_CODI_DEST,USUA_DOC,HIST_DOC_DEST,SGD_TTR_CODIGO,HIST_OBSE,HIST_FECH) VALUES (20189980000032,^998^,1,1,^998^,^1234567890^,1234567890,2,^ ^,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1524251464','1234567890','192.168.8.113','u','ANEXOS','UPDATE ANEXOS SET RADI_NUME_SALIDA=^20189980000032^,\n						ANEX_SOLO_LECT = ^S^,\n						ANEX_RADI_FECH = FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),\n						ANEX_ESTADO = 2,\n						ANEX_NOMB_ARCHIVO = ^120189980000012_00002.DOCX^, \n						ANEX_TIPO=^24^,\n						SGD_DEVE_CODIGO = NULL\n		           WHERE ANEX_CODIGO=^2018998000001200002^ AND ANEX_RADI_NUME=^20189980000012^'),('1524251464','1234567890','192.168.8.113','u','_SEQUENCE','UPDATE _SEQUENCE SET SEQ_VAL=4 WHERE SEQ_NAME=^SEC_DIR_DIRECCIONES^'),('1524251464','1234567890','192.168.8.113','u','SGD_DIR_DRECCIONES','UPDATE SGD_DIR_DRECCIONES SET SGD_TRD_CODIGO=3,SGD_DIR_NOMREMDES=^^,SGD_DIR_DOC=NULL,MUNI_CODI=1,DPTO_CODI=11,ID_PAIS=170,ID_CONT=1,SGD_DOC_FUN=NULL,SGD_OEM_CODIGO=NULL,SGD_CIU_CODIGO=NULL,SGD_ESP_CODI=1,SGD_SEC_CODIGO=0,SGD_DIR_DIRECCION=^CALLE 24 A # 59 - 42 EDIFICIO T3 TORRE 4 PISO 2^,SGD_DIR_TELEFONO=^^,SGD_DIR_MAIL=^CONTACTENOS@ANI.GOV.CO^,SGD_DIR_CODIGO=3,SGD_DIR_NOMBRE=^^ WHERE RADI_NUME_RADI=^20189980000032^ AND SGD_DIR_TIPO=1'),('1524251464','1234567890','192.168.8.113','i','SGD_DIR_DRECCIONES','INSERT INTO SGD_DIR_DRECCIONES (SGD_TRD_CODIGO,SGD_DIR_NOMREMDES,SGD_DIR_DOC,MUNI_CODI,DPTO_CODI,ID_PAIS,ID_CONT,SGD_DOC_FUN,SGD_OEM_CODIGO,SGD_CIU_CODIGO,SGD_ESP_CODI,RADI_NUME_RADI,SGD_SEC_CODIGO,SGD_DIR_DIRECCION,SGD_DIR_TELEFONO,SGD_DIR_MAIL,SGD_DIR_TIPO,SGD_DIR_CODIGO,SGD_DIR_NOMBRE) VALUES (3,^^,NULL,1,11,170,1,NULL,NULL,NULL,1,^20189980000032^,0,^CALLE 24 A # 59 - 42 EDIFICIO T3 TORRE 4 PISO 2^,^^,^CONTACTENOS@ANI.GOV.CO^,1,3,^^)'),('1524251464','1234567890','192.168.8.113','d','ANEXOS','DELETE FROM ANEXOS WHERE RADI_NUME_SALIDA=^20189980000032^ AND CAST(SGD_DIR_TIPO AS CHAR(4)) LIKE ^7%^ AND SGD_DIR_TIPO !=7 '),('1524251464','1234567890','192.168.8.113','i','SGD_DT_RADICADO','INSERT INTO SGD_DT_RADICADO (RADI_NUME_RADI, DIAS_TERMINO) VALUES (^20189980000032^, 0)'),('1524251464','1234567890','192.168.8.113','u','ANEXOS','UPDATE ANEXOS  SET ANEX_ESTADO=3,SGD_FECH_IMPRES= FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600), ANEX_FECH_ENVIO=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),SGD_DEVE_FECH = NULL, SGD_DEVE_CODIGO=NULL WHERE RADI_NUME_SALIDA =^20189980000032^  AND SGD_DIR_TIPO <>7  AND ANEX_ESTADO=2'),('1524251466','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524251494','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524251507','1234567890','192.168.8.113','i','ANEXOS\n				','INSERT INTO ANEXOS\n				(SGD_REM_DESTINO,ANEX_RADI_NUME,ANEX_CODIGO,ANEX_TIPO,ANEX_TAMANO   ,ANEX_SOLO_LECT,ANEX_CREADOR,ANEX_DESC,ANEX_NUMERO,ANEX_NOMB_ARCHIVO   ,ANEX_BORRADO,ANEX_SALIDA ,SGD_DIR_TIPO,ANEX_DEPE_CREADOR,SGD_TPR_CODIGO,ANEX_FECH_ANEX,SGD_APLI_CODI,SGD_TRAD_CODIGO, SGD_EXP_NUMERO)\n	           VALUES (1  ,^20189980000012^         ,^2018998000001200003^    ,24    ,21.833     ,^N^,^ADMON^     ,^SEWAE6IE^ ,00003 ,^120189980000012_00003.DOCX^,^N^         ,1,1,^998^,NULL,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),        NULL    ,2, ^^ ) '),('1524251509','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524251513','1234567890','192.168.8.113','u','_SEQUENCE','UPDATE _SEQUENCE SET SEQ_VAL=5 WHERE SEQ_NAME=^SECR_TP2_^'),('1524251513','1234567890','192.168.8.113','i','RADICADO','INSERT INTO RADICADO(RADI_TIPO_DERI,RADI_CUENTAI,EESP_CODI,MREC_CODI,RADI_FECH_OFIC,RADI_NUME_DERI,RADI_USUA_RADI,RADI_PAIS,RA_ASUN,RADI_DESC_ANEX,RADI_DEPE_RADI,RADI_USUA_ACTU,CARP_CODI,CARP_PER,RADI_NUME_RADI,TRTE_CODI,RADI_FECH_RADI,RADI_DEPE_ACTU,TDOC_CODI,TDID_CODI,CODI_NIVEL,SGD_APLI_CODI,RADI_PATH) VALUES (0,^^,0,NULL,^2018-04-20^,^20189980000012^,1,^170^,^^,^^,^998^,1,2,0,^20189980000042^,NULL,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),^998^,0,NULL,5,0,^/2018/998/DOCS/120189980000012_00003.DOCX^)'),('1524251513','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_TIPO_DERI=0,RADI_CUENTAI=^^,EESP_CODI=0,MREC_CODI=NULL,RADI_FECH_OFIC=^2018-04-20^,RADI_NUME_DERI=^20189980000012^,RADI_USUA_RADI=1,RADI_PAIS=^170^,RA_ASUN=^^,RADI_DESC_ANEX=^^,RADI_DEPE_RADI=^998^,RADI_USUA_ACTU=1,CARP_CODI=2,CARP_PER=0,TRTE_CODI=NULL,RADI_FECH_RADI=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),RADI_DEPE_ACTU=^998^,TDOC_CODI=0,TDID_CODI=NULL,CODI_NIVEL=5,SGD_APLI_CODI=0,RADI_PATH=^/2018/998/DOCS/120189980000012_00003.DOCX^ WHERE RADI_NUME_RADI=^20189980000042^'),('1524251513','1234567890','192.168.8.113','i','HIST_EVENTOS','INSERT INTO HIST_EVENTOS(RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_CODI_DEST,DEPE_CODI_DEST,USUA_DOC,HIST_DOC_DEST,SGD_TTR_CODIGO,HIST_OBSE,HIST_FECH) VALUES (20189980000042,^998^,1,1,^998^,^1234567890^,1234567890,2,^ ^,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1524251513','1234567890','192.168.8.113','u','ANEXOS','UPDATE ANEXOS SET RADI_NUME_SALIDA=^20189980000042^,\n						ANEX_SOLO_LECT = ^S^,\n						ANEX_RADI_FECH = FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),\n						ANEX_ESTADO = 2,\n						ANEX_NOMB_ARCHIVO = ^120189980000012_00003.DOCX^, \n						ANEX_TIPO=^24^,\n						SGD_DEVE_CODIGO = NULL\n		           WHERE ANEX_CODIGO=^2018998000001200003^ AND ANEX_RADI_NUME=^20189980000012^'),('1524251513','1234567890','192.168.8.113','u','_SEQUENCE','UPDATE _SEQUENCE SET SEQ_VAL=5 WHERE SEQ_NAME=^SEC_DIR_DIRECCIONES^'),('1524251513','1234567890','192.168.8.113','u','SGD_DIR_DRECCIONES','UPDATE SGD_DIR_DRECCIONES SET SGD_TRD_CODIGO=3,SGD_DIR_NOMREMDES=^^,SGD_DIR_DOC=NULL,MUNI_CODI=1,DPTO_CODI=11,ID_PAIS=170,ID_CONT=1,SGD_DOC_FUN=NULL,SGD_OEM_CODIGO=NULL,SGD_CIU_CODIGO=NULL,SGD_ESP_CODI=1,SGD_SEC_CODIGO=0,SGD_DIR_DIRECCION=^CALLE 24 A # 59 - 42 EDIFICIO T3 TORRE 4 PISO 2^,SGD_DIR_TELEFONO=^^,SGD_DIR_MAIL=^CONTACTENOS@ANI.GOV.CO^,SGD_DIR_CODIGO=4,SGD_DIR_NOMBRE=^^ WHERE RADI_NUME_RADI=^20189980000042^ AND SGD_DIR_TIPO=1'),('1524251513','1234567890','192.168.8.113','i','SGD_DIR_DRECCIONES','INSERT INTO SGD_DIR_DRECCIONES (SGD_TRD_CODIGO,SGD_DIR_NOMREMDES,SGD_DIR_DOC,MUNI_CODI,DPTO_CODI,ID_PAIS,ID_CONT,SGD_DOC_FUN,SGD_OEM_CODIGO,SGD_CIU_CODIGO,SGD_ESP_CODI,RADI_NUME_RADI,SGD_SEC_CODIGO,SGD_DIR_DIRECCION,SGD_DIR_TELEFONO,SGD_DIR_MAIL,SGD_DIR_TIPO,SGD_DIR_CODIGO,SGD_DIR_NOMBRE) VALUES (3,^^,NULL,1,11,170,1,NULL,NULL,NULL,1,^20189980000042^,0,^CALLE 24 A # 59 - 42 EDIFICIO T3 TORRE 4 PISO 2^,^^,^CONTACTENOS@ANI.GOV.CO^,1,4,^^)'),('1524251513','1234567890','192.168.8.113','d','ANEXOS','DELETE FROM ANEXOS WHERE RADI_NUME_SALIDA=^20189980000042^ AND CAST(SGD_DIR_TIPO AS CHAR(4)) LIKE ^7%^ AND SGD_DIR_TIPO !=7 '),('1524251513','1234567890','192.168.8.113','i','SGD_DT_RADICADO','INSERT INTO SGD_DT_RADICADO (RADI_NUME_RADI, DIAS_TERMINO) VALUES (^20189980000042^, 0)'),('1524251516','1234567890','192.168.8.113','u','_SEQUENCE','UPDATE _SEQUENCE SET SEQ_VAL=6 WHERE SEQ_NAME=^SECR_TP2_^'),('1524251516','1234567890','192.168.8.113','i','RADICADO','INSERT INTO RADICADO(RADI_TIPO_DERI,RADI_CUENTAI,EESP_CODI,MREC_CODI,RADI_FECH_OFIC,RADI_NUME_DERI,RADI_USUA_RADI,RADI_PAIS,RA_ASUN,RADI_DESC_ANEX,RADI_DEPE_RADI,RADI_USUA_ACTU,CARP_CODI,CARP_PER,RADI_NUME_RADI,TRTE_CODI,RADI_FECH_RADI,RADI_DEPE_ACTU,TDOC_CODI,TDID_CODI,CODI_NIVEL,SGD_APLI_CODI,RADI_PATH) VALUES (0,^^,0,NULL,^2018-04-20^,^20189980000012^,1,^170^,^^,^^,^998^,1,2,0,^20189980000052^,NULL,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),^998^,0,NULL,5,0,^/2018/998/DOCS/120189980000012_00003.DOCX^)'),('1524251516','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_TIPO_DERI=0,RADI_CUENTAI=^^,EESP_CODI=0,MREC_CODI=NULL,RADI_FECH_OFIC=^2018-04-20^,RADI_NUME_DERI=^20189980000012^,RADI_USUA_RADI=1,RADI_PAIS=^170^,RA_ASUN=^^,RADI_DESC_ANEX=^^,RADI_DEPE_RADI=^998^,RADI_USUA_ACTU=1,CARP_CODI=2,CARP_PER=0,TRTE_CODI=NULL,RADI_FECH_RADI=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),RADI_DEPE_ACTU=^998^,TDOC_CODI=0,TDID_CODI=NULL,CODI_NIVEL=5,SGD_APLI_CODI=0,RADI_PATH=^/2018/998/DOCS/120189980000012_00003.DOCX^ WHERE RADI_NUME_RADI=^20189980000052^'),('1524251516','1234567890','192.168.8.113','i','HIST_EVENTOS','INSERT INTO HIST_EVENTOS(RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_CODI_DEST,DEPE_CODI_DEST,USUA_DOC,HIST_DOC_DEST,SGD_TTR_CODIGO,HIST_OBSE,HIST_FECH) VALUES (20189980000052,^998^,1,1,^998^,^1234567890^,1234567890,2,^ ^,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1524251516','1234567890','192.168.8.113','u','ANEXOS','UPDATE ANEXOS SET RADI_NUME_SALIDA=^20189980000052^,\n						ANEX_SOLO_LECT = ^S^,\n						ANEX_RADI_FECH = FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),\n						ANEX_ESTADO = 2,\n						ANEX_NOMB_ARCHIVO = ^120189980000012_00003.DOCX^, \n						ANEX_TIPO=^24^,\n						SGD_DEVE_CODIGO = NULL\n		           WHERE ANEX_CODIGO=^2018998000001200003^ AND ANEX_RADI_NUME=^20189980000012^'),('1524251516','1234567890','192.168.8.113','u','_SEQUENCE','UPDATE _SEQUENCE SET SEQ_VAL=6 WHERE SEQ_NAME=^SEC_DIR_DIRECCIONES^'),('1524251516','1234567890','192.168.8.113','u','SGD_DIR_DRECCIONES','UPDATE SGD_DIR_DRECCIONES SET SGD_TRD_CODIGO=3,SGD_DIR_NOMREMDES=^^,SGD_DIR_DOC=NULL,MUNI_CODI=1,DPTO_CODI=11,ID_PAIS=170,ID_CONT=1,SGD_DOC_FUN=NULL,SGD_OEM_CODIGO=NULL,SGD_CIU_CODIGO=NULL,SGD_ESP_CODI=1,SGD_SEC_CODIGO=0,SGD_DIR_DIRECCION=^CALLE 24 A # 59 - 42 EDIFICIO T3 TORRE 4 PISO 2^,SGD_DIR_TELEFONO=^^,SGD_DIR_MAIL=^CONTACTENOS@ANI.GOV.CO^,SGD_DIR_CODIGO=5,SGD_DIR_NOMBRE=^^ WHERE RADI_NUME_RADI=^20189980000052^ AND SGD_DIR_TIPO=1'),('1524251516','1234567890','192.168.8.113','i','SGD_DIR_DRECCIONES','INSERT INTO SGD_DIR_DRECCIONES (SGD_TRD_CODIGO,SGD_DIR_NOMREMDES,SGD_DIR_DOC,MUNI_CODI,DPTO_CODI,ID_PAIS,ID_CONT,SGD_DOC_FUN,SGD_OEM_CODIGO,SGD_CIU_CODIGO,SGD_ESP_CODI,RADI_NUME_RADI,SGD_SEC_CODIGO,SGD_DIR_DIRECCION,SGD_DIR_TELEFONO,SGD_DIR_MAIL,SGD_DIR_TIPO,SGD_DIR_CODIGO,SGD_DIR_NOMBRE) VALUES (3,^^,NULL,1,11,170,1,NULL,NULL,NULL,1,^20189980000052^,0,^CALLE 24 A # 59 - 42 EDIFICIO T3 TORRE 4 PISO 2^,^^,^CONTACTENOS@ANI.GOV.CO^,1,5,^^)'),('1524251516','1234567890','192.168.8.113','d','ANEXOS','DELETE FROM ANEXOS WHERE RADI_NUME_SALIDA=^20189980000052^ AND CAST(SGD_DIR_TIPO AS CHAR(4)) LIKE ^7%^ AND SGD_DIR_TIPO !=7 '),('1524251516','1234567890','192.168.8.113','i','SGD_DT_RADICADO','INSERT INTO SGD_DT_RADICADO (RADI_NUME_RADI, DIAS_TERMINO) VALUES (^20189980000052^, 0)'),('1524251516','1234567890','192.168.8.113','u','ANEXOS','UPDATE ANEXOS  SET ANEX_ESTADO=3,SGD_FECH_IMPRES= FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600), ANEX_FECH_ENVIO=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),SGD_DEVE_FECH = NULL, SGD_DEVE_CODIGO=NULL WHERE RADI_NUME_SALIDA =^20189980000052^  AND SGD_DIR_TIPO <>7  AND ANEX_ESTADO=2'),('1524251519','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524251522','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524251523','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1524252030','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:20 14:0420:30^ \n                WHERE USUA_SESION LIKE ^%180420021028O1921688113ADMON%^'),('1524252144','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180420022224O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1524253314','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:20 14:0441:54^ \n                WHERE USUA_SESION LIKE ^%180420022224O1921688113ADMON%^'),('1524253452','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180420024412O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),USUA_DOC_SUIP=^1^    WHERE  USUA_LOGIN = ^ADMON^ '),('1524253481','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:20 14:0444:41^ \n                WHERE USUA_SESION LIKE ^%180420024412O1921688113ADMON%^'),('1524253490','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180420024450O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1524253497','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:20 14:0444:57^ \n                WHERE USUA_SESION LIKE ^%180420024450O1921688113ADMON%^'),('1524253547','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180420024547O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),USUA_DOC_SUIP=^1^    WHERE  USUA_LOGIN = ^ADMON^ '),('1524255917','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:20 15:0425:17^ \n                WHERE USUA_SESION LIKE ^%180420032402O1921688113ADMON%^'),('1524255922','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180420032522O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),USUA_DOC_SUIP=^1^    WHERE  USUA_LOGIN = ^ADMON^ '),('1524255942','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:20 15:0425:42^ \n                WHERE USUA_SESION LIKE ^%180420032522O1921688113ADMON%^'),('1524256473','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:20 15:0434:33^ \n                WHERE USUA_SESION LIKE ^%180420033340O1921688113ADMON%^'),('1524265617','1234567890','192.168.8.111','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180420060657O1921688111ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),USUA_DOC_SUIP=^1^    WHERE  USUA_LOGIN = ^ADMON^ '),('1524265734','1234567890','192.168.8.111','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:20 18:0408:54^ \n                WHERE USUA_SESION LIKE ^%180420060657O1921688111ADMON%^'),('1524265736','1234567890','192.168.8.111','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180420060856O1921688111ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1524265783','1234567890','192.168.8.111','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:20 18:0409:43^ \n                WHERE USUA_SESION LIKE ^%180420060856O1921688111ADMON%^'),('1525098619','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180430093019O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),USUA_DOC_SUIP=^1^    WHERE  USUA_LOGIN = ^ADMON^ '),('1525098859','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:30 09:0434:19^ \n                WHERE USUA_SESION LIKE ^%180430093019O1921688113ADMON%^'),('1525098862','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180430093422O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),USUA_DOC_SUIP=^1^    WHERE  USUA_LOGIN = ^ADMON^ '),('1525098956','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:30 09:0435:56^ \n                WHERE USUA_SESION LIKE ^%180430093422O1921688113ADMON%^'),('1525098964','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180430093604O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),USUA_DOC_SUIP=^1^    WHERE  USUA_LOGIN = ^ADMON^ '),('1525098970','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:30 09:0436:10^ \n                WHERE USUA_SESION LIKE ^%180430093604O1921688113ADMON%^'),('1525099215','1234567890','192.168.8.111','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180430094015O1921688111ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),USUA_DOC_SUIP=^1^    WHERE  USUA_LOGIN = ^ADMON^ '),('1525099321','1234567890','192.168.8.112','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180430094201O1921688112ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1525100882','1234567890','192.168.8.111','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:30 10:0408:02^ \n                WHERE USUA_SESION LIKE ^%180430094015O1921688111ADMON%^'),('1525100892','1234567890','192.168.8.111','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180430100812O1921688111ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1525105313','1234567890','192.168.8.111','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:30 11:0421:53^ \n                WHERE USUA_SESION LIKE ^%180430100812O1921688111ADMON%^'),('1525105335','1234567890','192.168.8.111','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180430112215O1921688111ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1525105346','1234567890','192.168.8.111','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:30 11:0422:26^ \n                WHERE USUA_SESION LIKE ^%180430112215O1921688111ADMON%^'),('1525105352','1234567890','192.168.8.111','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180430112232O1921688111ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1525105369','1234567890','192.168.8.111','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:30 11:0422:49^ \n                WHERE USUA_SESION LIKE ^%180430112232O1921688111ADMON%^'),('1525105375','1234567890','192.168.8.111','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180430112255O1921688111ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1525105387','1234567890','192.168.8.111','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:30 11:0423:07^ \n                WHERE USUA_SESION LIKE ^%180430112255O1921688111ADMON%^'),('1525105625','1234567890','192.168.8.111','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180430112705O1921688111ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1525105628','1234567890','192.168.8.111','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:04:30 11:0427:08^ \n                WHERE USUA_SESION LIKE ^%180430112705O1921688111ADMON%^'),('1526571992','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180517104632O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),USUA_DOC_SUIP=^1^    WHERE  USUA_LOGIN = ^ADMON^ '),('1526572177','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:17 10:0549:37^ \n                WHERE USUA_SESION LIKE ^%180517104632O1921688113ADMON%^'),('1526572180','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180517104940O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),USUA_DOC_SUIP=^1^    WHERE  USUA_LOGIN = ^ADMON^ '),('1526572817','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:17 11:0500:17^ \n                WHERE USUA_SESION LIKE ^%180517104940O1921688113ADMON%^'),('1526572822','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180517110022O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),USUA_DOC_SUIP=^1^    WHERE  USUA_LOGIN = ^ADMON^ '),('1526572928','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:17 11:0502:08^ \n                WHERE USUA_SESION LIKE ^%180517110022O1921688113ADMON%^'),('1526572935','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180517110215O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526572942','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:17 11:0502:22^ \n                WHERE USUA_SESION LIKE ^%180517110215O1921688113ADMON%^'),('1526572952','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180517110232O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),USUA_DOC_SUIP=^1^    WHERE  USUA_LOGIN = ^ADMON^ '),('1526573002','1234567890','192.168.8.113','u','_SEQUENCE','UPDATE _SEQUENCE SET SEQ_VAL=7 WHERE SEQ_NAME=^SECR_TP2_^'),('1526573002','1234567890','192.168.8.113','i','RADICADO','INSERT INTO RADICADO(RADI_TIPO_DERI,RADI_CUENTAI,EESP_CODI,MREC_CODI,RADI_FECH_OFIC,RADI_NUME_DERI,RADI_USUA_RADI,RADI_PAIS,RA_ASUN,RADI_DESC_ANEX,RADI_DEPE_RADI,RADI_USUA_ACTU,CARP_CODI,CARP_PER,RADI_NUME_RADI,TRTE_CODI,RADI_FECH_RADI,RADI_DEPE_ACTU,TDOC_CODI,TDID_CODI,CODI_NIVEL,SGD_APLI_CODI,RADI_PATH) VALUES (0,^^,0,4,^2018-05-17^,^0^,1,^170^,^RADICACIONES DE PRUEBAS^,^SKINA TECNOLOGIES SAS^,^998^,1,0,0,^20189980000062^,0,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),^998^,14,0,5,0,NULL)'),('1526573002','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_TIPO_DERI=0,RADI_CUENTAI=^^,EESP_CODI=0,MREC_CODI=4,RADI_FECH_OFIC=^2018-05-17^,RADI_NUME_DERI=^0^,RADI_USUA_RADI=1,RADI_PAIS=^170^,RA_ASUN=^RADICACIONES DE PRUEBAS^,RADI_DESC_ANEX=^SKINA TECNOLOGIES SAS^,RADI_DEPE_RADI=^998^,RADI_USUA_ACTU=1,CARP_CODI=0,CARP_PER=0,TRTE_CODI=0,RADI_FECH_RADI=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),RADI_DEPE_ACTU=^998^,TDOC_CODI=14,TDID_CODI=0,CODI_NIVEL=5,SGD_APLI_CODI=0,RADI_PATH=NULL WHERE RADI_NUME_RADI=^20189980000062^'),('1526573002','1234567890','192.168.8.113','i','HIST_EVENTOS','INSERT INTO HIST_EVENTOS(USUA_DOC_OLD,RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_CODI_DEST,DEPE_CODI_DEST,USUA_DOC,HIST_DOC_DEST,SGD_TTR_CODIGO,HIST_OBSE,HIST_FECH) VALUES (1,20189980000062,^998^,1,1,^998^,^1234567890^,1234567890,2,^ ^,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1526573002','1234567890','192.168.8.113','i','SGD_DT_RADICADO','INSERT INTO SGD_DT_RADICADO VALUES (^20189980000062^,2)'),('1526573002','1234567890','192.168.8.113','u','_SEQUENCE','UPDATE _SEQUENCE SET SEQ_VAL=7 WHERE SEQ_NAME=^SEC_DIR_DIRECCIONES^'),('1526573002','1234567890','192.168.8.113','u','SGD_DIR_DRECCIONES','UPDATE SGD_DIR_DRECCIONES SET SGD_TRD_CODIGO=3,SGD_DIR_NOMREMDES=^SKINA TECNOLOGIES SAS JAIME ENRIQUE GOMEZ SKINA^,SGD_DIR_DOC=10278597,MUNI_CODI=1,DPTO_CODI=11,ID_PAIS=170,ID_CONT=1,SGD_DOC_FUN=NULL,SGD_OEM_CODIGO=NULL,SGD_CIU_CODIGO=NULL,SGD_ESP_CODI=2,SGD_SEC_CODIGO=0,SGD_DIR_DIRECCION=^CARRERA 64 NO 96-17 ^,SGD_DIR_TELEFONO=^2226-2080^,SGD_DIR_MAIL=^INFO@SKINATECH.COM ^,SGD_DIR_CODIGO=6,SGD_DIR_NOMBRE=^^ WHERE RADI_NUME_RADI=^20189980000062^ AND SGD_DIR_TIPO=1'),('1526573002','1234567890','192.168.8.113','i','SGD_DIR_DRECCIONES','INSERT INTO SGD_DIR_DRECCIONES (SGD_TRD_CODIGO,SGD_DIR_NOMREMDES,SGD_DIR_DOC,MUNI_CODI,DPTO_CODI,ID_PAIS,ID_CONT,SGD_DOC_FUN,SGD_OEM_CODIGO,SGD_CIU_CODIGO,SGD_ESP_CODI,RADI_NUME_RADI,SGD_SEC_CODIGO,SGD_DIR_DIRECCION,SGD_DIR_TELEFONO,SGD_DIR_MAIL,SGD_DIR_TIPO,SGD_DIR_CODIGO,SGD_DIR_NOMBRE) VALUES (3,^SKINA TECNOLOGIES SAS JAIME ENRIQUE GOMEZ SKINA^,10278597,1,11,170,1,NULL,NULL,NULL,2,^20189980000062^,0,^CARRERA 64 NO 96-17 ^,^2226-2080^,^INFO@SKINATECH.COM ^,1,6,^^)'),('1526573291','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526573789','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526574872','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:17 11:0534:32^ \n                WHERE USUA_SESION LIKE ^%180517110232O1921688113ADMON%^'),('1526574875','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180517113435O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526575024','1234567890','192.168.8.113','u','RADICADO\n		SET','UPDATE RADICADO\n		SET RADI_PATH=^2018/998/20189980000012.PDF^\n  			WHERE RADI_NUME_RADI=^20189980000012^'),('1526575024','1234567890','192.168.8.113','i','HIST_EVENTOS','INSERT INTO HIST_EVENTOS(RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_CODI_DEST,DEPE_CODI_DEST,USUA_DOC,HIST_DOC_DEST,SGD_TTR_CODIGO,HIST_OBSE,HIST_FECH) VALUES (20189980000012,^998^,1,1,^998^,^1234567890^,1234567890,42,^IMAGEN ASOCIADA 20189980000012^,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1526575189','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575218','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575228','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575236','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575243','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575245','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575246','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575248','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575278','1234567890','192.168.8.113','u','RADICADO\n				SET\n				','UPDATE RADICADO\n				SET\n				  RADI_USU_ANTE=^ADMON^\n				  ,RADI_DEPE_ACTU=^998^\n				  ,RADI_USUA_ACTU=1\n				  ,CARP_CODI=0\n				  ,CARP_PER=0\n				  ,RADI_LEIDO=0\n				  , RADI_FECH_AGEND=NULL\n				  ,RADI_AGEND=NULL\n				  ,CODI_NIVEL=5\n			 WHERE RADI_DEPE_ACTU=^998^\n			 	   AND RADI_USUA_ACTU=1\n				   AND RADI_NUME_RADI IN(^20189980000012^)'),('1526575279','1234567890','192.168.8.113','i','HIST_EVENTOS','INSERT INTO HIST_EVENTOS(RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_CODI_DEST,DEPE_CODI_DEST,USUA_DOC,HIST_DOC_DEST,SGD_TTR_CODIGO,HIST_OBSE,HIST_FECH) VALUES (20189980000012,^998^,1,1,^998^,^1234567890^,1234567890,9,^SE REASIGNA DE FORMA CORRECTA^,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1526575294','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575296','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575298','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575299','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575300','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575301','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575370','1234567890','192.168.8.113','i','SGD_USH_USUHISTORICO','INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (,^^, ^^, , ^998^, ^1234567890^, 5, NOW(), ^ADMON^)'),('1526575371','1234567890','192.168.8.113','i','SGD_USH_USUHISTORICO','INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (, ^^, ^^, , ^998^, ^1234567890^, 3, NOW(), ^ADMON^)'),('1526575371','1234567890','192.168.8.113','i','SGD_USH_USUHISTORICO','INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN) VALUES (, ^^,^^, , ^998^, ^1234567890^, 40, NOW(), ^ADMON^)'),('1526575371','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET  USUA_NOMB = ^USUARIO ADMINISTRADOR^,  DEPE_CODI = ^998^,  USUA_CODI = 1,  USUA_EMAIL = ^PRUEBAS@SKINATECH.COM^ WHERE USUA_LOGIN = ^ADMON^'),('1526575371','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET  USUA_PERM_PRESTAMO = 1,  PERM_RADI = 1,  USUA_MASIVA = 1,  USUA_PERM_IMPRESION = 2,  SGD_PANU_CODI = 3,  USUA_ADMIN_ARCHIVO = ^2^,  USUA_PERM_DEV = ^1^,  USUA_ADMIN_SISTEMA = ^1^,  USUA_NUEVO = ^1^,  USUA_PERM_ENVIOS = 1,  SGD_PERM_ESTADISTICA = 2,  USUA_PERM_FIRMA = 0,  USUARIO_REASIGNAR = 1,  USUARIO_PUBLICO = 1,  PERM_BORRAR_ANEXO = 1,  PERM_TIPIF_ANEXO = 1,  USUA_PERM_RADEMAIL = 0,  USUA_AUTH_LDAP = 0,  USUA_PERM_ADMINFLUJOS = 0,  PERM_ARCHI = 1,  USUA_PRAD_TP1 = 3,  USUA_PRAD_TP2 = 3,  USUA_PRAD_TP4 = 3,  USUA_PERM_MODIFICA = 1,  USUA_PERM_NOTIFICA = 0,  USUA_PERM_EXPEDIENTE = 2,  USUA_PERM_ACCESI = 0,  USUA_PERM_AGRCONTACTO = 1,  USUA_ESTA = ^1^,  USUA_PERM_TRD = ^2^,  CODI_NIVEL = 5  WHERE USUA_LOGIN = ^ADMON^'),('1526575371','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET  USUA_PERM_PRESTAMO = 1,  PERM_RADI = 1,  USUA_MASIVA = 1,  USUA_PERM_IMPRESION = 2,  SGD_PANU_CODI = 3,  USUA_ADMIN_ARCHIVO = ^2^,  USUA_PERM_DEV = ^1^,  USUA_ADMIN_SISTEMA = ^1^,  USUA_NUEVO = ^1^,  USUA_PERM_ENVIOS = 1,  SGD_PERM_ESTADISTICA = 2,  USUA_PERM_FIRMA = 0,  USUARIO_REASIGNAR = 1,  USUARIO_PUBLICO = 1,  PERM_BORRAR_ANEXO = 1,  PERM_TIPIF_ANEXO = 1,  USUA_PERM_RADEMAIL = 0,  USUA_AUTH_LDAP = 0,  USUA_PERM_ADMINFLUJOS = 0,  PERM_ARCHI = 1,  USUA_PRAD_TP1 = 3,  USUA_PRAD_TP2 = 3,  USUA_PRAD_TP4 = 3,  USUA_PERM_MODIFICA = 1,  USUA_PERM_NOTIFICA = 0,  USUA_PERM_EXPEDIENTE = 2,  USUA_PERM_ACCESI = 0,  USUA_PERM_AGRCONTACTO = 1,  USUA_ESTA = ^1^,  USUA_PERM_TRD = ^2^,  CODI_NIVEL = 5  WHERE USUA_LOGIN = ^ADMON^'),('1526575371','1234567890','192.168.8.113','i','SGD_USH_USUHISTORICO','INSERT INTO SGD_USH_USUHISTORICO (SGD_USH_ADMCOD, SGD_USH_ADMDEP, SGD_USH_ADMDOC, SGD_USH_USUCOD, SGD_USH_USUDEP, SGD_USH_USUDOC, SGD_USH_MODCOD, SGD_USH_FECHEVENTO, SGD_USH_USULOGIN)  VALUES (, ^^, ^^, 1,^998^, ^1234567890^, 35, ^2018-05-17 11:42:51^, ^ADMON^)'),('1526575380','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575390','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575396','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575398','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575399','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526575401','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526577293','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526577295','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526578464','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180517123424O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526578500','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526578510','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:17 12:0535:10^ \n                WHERE USUA_SESION LIKE ^%180517123424O1921688113ADMON%^'),('1526578899','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:17 12:0541:39^ \n                WHERE USUA_SESION LIKE ^%180517123522O1921688113ADMON%^'),('1526578903','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180517124143O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526588515','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:17 15:0521:55^ \n                WHERE USUA_SESION LIKE ^%180517024715O1921688113ADMON%^'),('1526588519','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180517032159O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526589500','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:17 15:0538:20^ \n                WHERE USUA_SESION LIKE ^%180517033634O1921688113ADMON%^'),('1526589504','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180517033824O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526589514','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526589521','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526589823','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180517034343O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526589835','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526589841','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526589850','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:17 15:0544:10^ \n                WHERE USUA_SESION LIKE ^%180517034343O1921688113ADMON%^'),('1526591844','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:17 16:0517:24^ \n                WHERE USUA_SESION LIKE ^%180517041644O1921688113ADMON%^'),('1526591855','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180517041735O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526591860','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526591863','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526591865','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526591868','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526591871','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526591872','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526591874','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526591877','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526591879','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526591881','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526591882','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526592028','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:17 16:0520:28^ \n                WHERE USUA_SESION LIKE ^%180517041834O1921688113ADMON%^'),('1526592031','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180517042031O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526592036','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526592049','1234567890','192.168.8.113','i','SGD_RDF_RETDOCF','INSERT INTO SGD_RDF_RETDOCF(RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_DOC,SGD_MRD_CODIGO,SGD_RDF_FECH) VALUES (^20189980000062^,^998^,1,1234567890,4,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1526592049','1234567890','192.168.8.113','i','HIST_EVENTOS','INSERT INTO HIST_EVENTOS(RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_CODI_DEST,DEPE_CODI_DEST,USUA_DOC,HIST_DOC_DEST,SGD_TTR_CODIGO,HIST_OBSE,HIST_FECH) VALUES (20189980000062,^998^,1,1,^998^,^1234567890^,1234567890,32,^ASIGNACIÃ³N DE TRD^,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1526592049','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET TDOC_CODI=6 WHERE \n						RADI_NUME_RADI =^ 20189980000062^'),('1526592049','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET FECH_VCMTO =  ^Y-M-D H:I:S^ WHERE RADI_NUME_RADI = ^20189980000062^ '),('1526592051','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526592054','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526671609','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:18 14:0526:49^ \n                WHERE USUA_SESION LIKE ^%180518020626O1921688113ADMON%^'),('1526671612','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180518022652O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526671615','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526672048','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:18 14:0534:08^ \n                WHERE USUA_SESION LIKE ^%180518022716O1921688113ADMON%^'),('1526672051','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180518023411O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526672055','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526672058','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526672557','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:18 14:0542:37^ \n                WHERE USUA_SESION LIKE ^%180518024204O1921688113ADMON%^'),('1526672561','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180518024241O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526672565','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526675334','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:18 15:0528:54^ \n                WHERE USUA_SESION LIKE ^%180518032231O1921688113ADMON%^'),('1526675338','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180518032858O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526675341','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526675858','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:18 15:0537:38^ \n                WHERE USUA_SESION LIKE ^%180518032858O1921688113ADMON%^'),('1526675862','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180518033742O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526675866','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526676180','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:18 15:0543:00^ \n                WHERE USUA_SESION LIKE ^%180518034217O1921688113ADMON%^'),('1526676183','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180518034303O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526676187','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526676193','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526676194','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526676222','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:18 15:0543:42^ \n                WHERE USUA_SESION LIKE ^%180518034303O1921688113ADMON%^'),('1526676225','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180518034345O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526676227','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526677205','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180518040005O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526677209','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526677216','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:18 16:0500:16^ \n                WHERE USUA_SESION LIKE ^%180518040005O1921688113ADMON%^'),('1526677253','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180518040053O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526677256','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526682372','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:18 17:0526:12^ \n                WHERE USUA_SESION LIKE ^%180518050040O1921688113ADMON%^'),('1526682376','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180518052616O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526682381','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526682391','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526682395','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526682400','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526682405','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526682414','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526682418','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526683532','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:18 17:0545:32^ \n                WHERE USUA_SESION LIKE ^%180518053934O1921688113ADMON%^'),('1526683536','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180518054536O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526683540','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526683544','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526683704','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526683705','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526683707','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526683711','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:18 17:0548:31^ \n                WHERE USUA_SESION LIKE ^%180518054536O1921688113ADMON%^'),('1526683715','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180518054835O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526683719','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526683721','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526683808','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526683950','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526683979','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526684004','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526684030','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526684069','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526684076','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526906099','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180521073459O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526912213','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:21 09:0516:53^ \n                WHERE USUA_SESION LIKE ^%180521073541O1921688113ADMON%^'),('1526912217','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180521091657O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526912221','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912226','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912227','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912230','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912233','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912234','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912236','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912238','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912240','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912243','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912260','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912264','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912299','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912380','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912431','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912469','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912478','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:21 09:0521:18^ \n                WHERE USUA_SESION LIKE ^%180521091657O1921688113ADMON%^'),('1526912482','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180521092122O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526912485','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912493','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912585','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912598','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912638','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:21 09:0523:58^ \n                WHERE USUA_SESION LIKE ^%180521092336O1921688113ADMON%^'),('1526912640','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180521092400O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526912644','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912646','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912648','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912696','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912731','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:21 09:0525:31^ \n                WHERE USUA_SESION LIKE ^%180521092511O1921688113ADMON%^'),('1526912734','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180521092534O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526912738','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912740','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912747','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912749','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912751','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912752','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912754','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912864','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912931','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912978','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:21 09:0529:38^ \n                WHERE USUA_SESION LIKE ^%180521092906O1921688113ADMON%^'),('1526912981','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180521092941O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526912984','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526912986','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526912988','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000062^ '),('1526912992','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526912995','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526913032','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526913076','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526913484','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526913527','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526913613','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:21 09:0540:13^ \n                WHERE USUA_SESION LIKE ^%180521093902O1921688113ADMON%^'),('1526913616','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180521094016O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526913619','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526913621','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526913624','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526913800','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526914590','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526914817','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526914960','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526914962','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526914964','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526914966','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526914968','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526915054','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526915682','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526915683','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526915684','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526915785','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526915832','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526915852','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526916320','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:21 10:0525:20^ \n                WHERE USUA_SESION LIKE ^%180521102145O1921688113ADMON%^'),('1526916326','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180521102526O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526916330','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526916394','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526916566','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526916587','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526916631','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526916726','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526920351','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:21 11:0532:31^ \n                WHERE USUA_SESION LIKE ^%180521112404O1921688113ADMON%^'),('1526920354','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180521113234O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526920365','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526920407','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526920451','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:21 11:0534:11^ \n                WHERE USUA_SESION LIKE ^%180521113234O1921688113ADMON%^'),('1526920460','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180521113420O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526920484','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:21 11:0534:44^ \n                WHERE USUA_SESION LIKE ^%180521113420O1921688113ADMON%^'),('1526925611','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:21 13:0500:11^ \n                WHERE USUA_SESION LIKE ^%180521113507O1921688113ADMON%^'),('1526925615','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180521010015O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526925619','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526925622','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526925624','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526925626','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526925646','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526925648','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526925649','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526925651','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526931257','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:21 14:0534:17^ \n                WHERE USUA_SESION LIKE ^%180521021857O1921688113ADMON%^'),('1526931266','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180521023426O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526931275','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526931324','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526931327','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526931612','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:21 14:0540:12^ \n                WHERE USUA_SESION LIKE ^%180521023542O1921688113ADMON%^'),('1526931616','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180521024016O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526992566','1234567890','10.11.11.3','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:22 07:0536:06^ \n                WHERE USUA_SESION LIKE ^%180522072821O1011113ADMON%^'),('1526992571','1234567890','10.11.11.3','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180522073611O1011113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1526992596','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526992604','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526992606','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526992614','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1526992616','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527003350','1234567890','10.11.11.3','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:22 10:0535:50^ \n                WHERE USUA_SESION LIKE ^%180522094447O1011113ADMON%^'),('1527003354','1234567890','10.11.11.3','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180522103554O1011113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1527003358','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527003367','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527003369','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527003372','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527003380','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527003382','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527003812','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527003815','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527003816','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527004132','1234567890','10.11.11.3','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180522104852O1011113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1527004136','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527004139','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527004141','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527004143','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527004337','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527004339','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527004366','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527004680','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527004829','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527004894','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000012^ '),('1527005046','1234567890','10.11.11.3','u','_SEQUENCE','UPDATE _SEQUENCE SET SEQ_VAL=8 WHERE SEQ_NAME=^SECR_TP2_^'),('1527005046','1234567890','10.11.11.3','i','RADICADO','INSERT INTO RADICADO(RADI_TIPO_DERI,RADI_CUENTAI,EESP_CODI,MREC_CODI,RADI_FECH_OFIC,RADI_NUME_DERI,RADI_USUA_RADI,RADI_PAIS,RA_ASUN,RADI_DESC_ANEX,RADI_DEPE_RADI,RADI_USUA_ACTU,CARP_CODI,CARP_PER,RADI_NUME_RADI,TRTE_CODI,RADI_FECH_RADI,RADI_DEPE_ACTU,TDOC_CODI,TDID_CODI,CODI_NIVEL,SGD_APLI_CODI,RADI_PATH) VALUES (0,^^,0,4,^2018-05-22^,^0^,1,^170^,^RADICACIÃ³N DE PRUEBAS^,^SKINA TECNOLOGIES SAS^,^998^,1,0,0,^20189980000072^,0,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),^998^,1,0,5,0,NULL)'),('1527005046','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_TIPO_DERI=0,RADI_CUENTAI=^^,EESP_CODI=0,MREC_CODI=4,RADI_FECH_OFIC=^2018-05-22^,RADI_NUME_DERI=^0^,RADI_USUA_RADI=1,RADI_PAIS=^170^,RA_ASUN=^RADICACIÃ³N DE PRUEBAS^,RADI_DESC_ANEX=^SKINA TECNOLOGIES SAS^,RADI_DEPE_RADI=^998^,RADI_USUA_ACTU=1,CARP_CODI=0,CARP_PER=0,TRTE_CODI=0,RADI_FECH_RADI=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),RADI_DEPE_ACTU=^998^,TDOC_CODI=1,TDID_CODI=0,CODI_NIVEL=5,SGD_APLI_CODI=0,RADI_PATH=NULL WHERE RADI_NUME_RADI=^20189980000072^'),('1527005046','1234567890','10.11.11.3','i','HIST_EVENTOS','INSERT INTO HIST_EVENTOS(RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_CODI_DEST,DEPE_CODI_DEST,USUA_DOC,HIST_DOC_DEST,SGD_TTR_CODIGO,HIST_OBSE,HIST_FECH) VALUES (20189980000072,^998^,1,1,^998^,^1234567890^,1234567890,2,^ ^,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1527005047','1234567890','10.11.11.3','i','SGD_DT_RADICADO','INSERT INTO SGD_DT_RADICADO VALUES (^20189980000072^,2)'),('1527005047','1234567890','10.11.11.3','u','_SEQUENCE','UPDATE _SEQUENCE SET SEQ_VAL=8 WHERE SEQ_NAME=^SEC_DIR_DIRECCIONES^'),('1527005047','1234567890','10.11.11.3','u','SGD_DIR_DRECCIONES','UPDATE SGD_DIR_DRECCIONES SET SGD_TRD_CODIGO=3,SGD_DIR_NOMREMDES=^SKINA TECNOLOGIES SAS JAIME ENRIQUE GOMEZ SKINA^,SGD_DIR_DOC=10278597,MUNI_CODI=1,DPTO_CODI=11,ID_PAIS=170,ID_CONT=1,SGD_DOC_FUN=NULL,SGD_OEM_CODIGO=NULL,SGD_CIU_CODIGO=NULL,SGD_ESP_CODI=2,SGD_SEC_CODIGO=0,SGD_DIR_DIRECCION=^CARRERA 64 NO 96-17 ^,SGD_DIR_TELEFONO=^2226-2080^,SGD_DIR_MAIL=^INFO@SKINATECH.COM ^,SGD_DIR_CODIGO=7,SGD_DIR_NOMBRE=^MA TERESA FLECHAS J.^ WHERE RADI_NUME_RADI=^20189980000072^ AND SGD_DIR_TIPO=1'),('1527005047','1234567890','10.11.11.3','i','SGD_DIR_DRECCIONES','INSERT INTO SGD_DIR_DRECCIONES (SGD_TRD_CODIGO,SGD_DIR_NOMREMDES,SGD_DIR_DOC,MUNI_CODI,DPTO_CODI,ID_PAIS,ID_CONT,SGD_DOC_FUN,SGD_OEM_CODIGO,SGD_CIU_CODIGO,SGD_ESP_CODI,RADI_NUME_RADI,SGD_SEC_CODIGO,SGD_DIR_DIRECCION,SGD_DIR_TELEFONO,SGD_DIR_MAIL,SGD_DIR_TIPO,SGD_DIR_CODIGO,SGD_DIR_NOMBRE) VALUES (3,^SKINA TECNOLOGIES SAS JAIME ENRIQUE GOMEZ SKINA^,10278597,1,11,170,1,NULL,NULL,NULL,2,^20189980000072^,0,^CARRERA 64 NO 96-17 ^,^2226-2080^,^INFO@SKINATECH.COM ^,1,7,^MA TERESA FLECHAS J.^)'),('1527005136','1234567890','10.11.11.3','u','RADICADO\n		SET','UPDATE RADICADO\n		SET RADI_PATH=^2018/998/20189980000072.PDF^\n  			WHERE RADI_NUME_RADI=^20189980000072^'),('1527005136','1234567890','10.11.11.3','i','HIST_EVENTOS','INSERT INTO HIST_EVENTOS(RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_CODI_DEST,DEPE_CODI_DEST,USUA_DOC,HIST_DOC_DEST,SGD_TTR_CODIGO,HIST_OBSE,HIST_FECH) VALUES (20189980000072,^998^,1,1,^998^,^1234567890^,1234567890,42,^20189980000072^,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1527005153','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527005157','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527005162','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527005165','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527005177','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527005273','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527005303','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527005339','1234567890','10.11.11.3','u','RADICADO\n		SET','UPDATE RADICADO\n		SET RADI_PATH=^2018/998/20189980000072.PDF^\n  			WHERE RADI_NUME_RADI=^20189980000072^'),('1527005339','1234567890','10.11.11.3','i','HIST_EVENTOS','INSERT INTO HIST_EVENTOS(RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_CODI_DEST,DEPE_CODI_DEST,USUA_DOC,HIST_DOC_DEST,SGD_TTR_CODIGO,HIST_OBSE,HIST_FECH) VALUES (20189980000072,^998^,1,1,^998^,^1234567890^,1234567890,42,^20189980000072^,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1527005349','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527005503','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527005507','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527005978','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527005979','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527006635','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527006701','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527006829','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527006906','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527006999','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527007357','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527007406','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527007603','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527007833','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527008099','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527008503','1234567890','10.11.11.3','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:22 12:0501:43^ \n                WHERE USUA_SESION LIKE ^%180522115611O1011113ADMON%^'),('1527008506','1234567890','10.11.11.3','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180522120146O1011113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1527008516','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527008823','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527009155','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527009339','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527009533','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527009870','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527010052','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527010252','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527010528','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527029817','1234567890','10.11.11.3','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180522055657O1011113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1527029917','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527029924','1234567890','10.11.11.3','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527036489','1234567890','10.11.11.3','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:22 19:0548:09^ \n                WHERE USUA_SESION LIKE ^%180522071528O1011113ADMON%^'),('1527036498','1234567890','10.11.11.3','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180522074818O1011113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600)    WHERE  USUA_LOGIN = ^ADMON^ '),('1527089197','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:23 10:0526:37^ \n                WHERE USUA_SESION LIKE ^%180523072351O1921688113ADMON%^'),('1527089202','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180523102642O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),USUA_DOC_SUIP=^1^    WHERE  USUA_LOGIN = ^ADMON^ '),('1527089207','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096103','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO \n                SET USUA_SESION=^FIN  2018:05:23 12:0521:43^ \n                WHERE USUA_SESION LIKE ^%180523113857O1921688113ADMON%^'),('1527096107','1234567890','192.168.8.113','u','USUARIO','UPDATE USUARIO SET USUA_SESION= ^180523122147O1921688113ADMON^ ,USUA_FECH_SESION=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600),USUA_DOC_SUIP=^1^    WHERE  USUA_LOGIN = ^ADMON^ '),('1527096112','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096114','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096120','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096130','1234567890','192.168.8.113','i','SGD_RDF_RETDOCF','INSERT INTO SGD_RDF_RETDOCF(RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_DOC,SGD_MRD_CODIGO,SGD_RDF_FECH) VALUES (^20189980000072^,^998^,1,1234567890,6,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1527096130','1234567890','192.168.8.113','i','HIST_EVENTOS','INSERT INTO HIST_EVENTOS(RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_CODI_DEST,DEPE_CODI_DEST,USUA_DOC,HIST_DOC_DEST,SGD_TTR_CODIGO,HIST_OBSE,HIST_FECH) VALUES (20189980000072,^998^,1,1,^998^,^1234567890^,1234567890,32,^ASIGNACIÃ³N DE TRD^,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1527096131','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET TDOC_CODI=11 WHERE \n						RADI_NUME_RADI =^ 20189980000072^'),('1527096131','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET FECH_VCMTO =  ^Y-M-D H:I:S^ WHERE RADI_NUME_RADI = ^20189980000072^ '),('1527096132','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096135','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096137','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096477','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096480','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096482','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096485','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096521','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096531','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096539','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096542','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096545','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096547','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096550','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096574','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096604','1234567890','192.168.8.113','i','SGD_SEXP_SECEXPEDIENTES','INSERT INTO SGD_SEXP_SECEXPEDIENTES(SGD_EXP_NUMERO   ,SGD_SEXP_FECH      ,DEPE_CODI   ,USUA_DOC   ,SGD_FEXP_CODIGO,SGD_SRD_CODIGO,SGD_SBRD_CODIGO,SGD_SEXP_SECUENCIA, SGD_SEXP_ANO, USUA_DOC_RESPONSABLE, SGD_PEXP_CODIGO, SGD_SEXP_PAREXP1 ) VALUES (^2018998040300001E^,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600) ,^998^,^1234567890^,0              ,4     ,3        ,^00001^ ,2018, 1234567890, 0 , ^ACCIONES DE EXPEDIENTE^ )'),('1527096604','1234567890','192.168.8.113','i','SGD_HFLD_HISTFLUJODOC','INSERT INTO SGD_HFLD_HISTFLUJODOC(SGD_EXP_NUMERO,SGD_FEXP_CODIGO,RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_DOC,SGD_TTR_CODIGO,SGD_HFLD_OBSERVA,SGD_HFLD_FECH) VALUES (^2018998040300001E^,0,^20189980000072^,^998^,1,1234567890,51,^*TRD*4/3 (CREACION DE EXPEDIENTE.)^,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))'),('1527096604','1234567890','192.168.8.113','u','SGD_SEXP_SECEXPEDIENTES','UPDATE SGD_SEXP_SECEXPEDIENTES SET SGD_FEXP_CODIGO=    WHERE  SGD_EXP_NUMERO = ^2018998040300001E^  AND  SGD_PEXP_CODIGO = 0 '),('1527096609','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096611','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096614','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527096616','1234567890','192.168.8.113','u','RADICADO','UPDATE RADICADO SET RADI_LEIDO=1    WHERE  RADI_DEPE_ACTU = ^998^  AND  RADI_USUA_ACTU = 1  AND  RADI_NUME_RADI = ^20189980000072^ '),('1527098043','1234567890','192.168.8.113','u','_SEQUENCE','UPDATE _SEQUENCE SET SEQ_VAL=2 WHERE SEQ_NAME=^SECR_TP1_^'),('1527098043','1234567890','192.168.8.113','i','RADICADO','INSERT INTO RADICADO (RADI_TIPO_DERI, RADI_CUENTAI, EESP_CODI, MREC_CODI, RADI_FECH_OFIC, RADI_NUME_DERI,\n			RADI_USUA_RADI, TDID_CODI, RADI_DESC_ANEX, RADI_NUME_HOJA, RADI_PAIS, RA_ASUN, RADI_DEPE_RADI, RADI_USUA_ACTU,\n			CARP_CODI, RADI_NUME_RADI, TRTE_CODI, RADI_NUME_IDEN, RADI_FECH_RADI, RADI_DEPE_ACTU, TDOC_CODI, ESTA_CODI,\n			ID_CONT, DPTO_CODI, MUNI_CODI, RADI_PATH, CARP_PER)\n			VALUES\n			(NULL, ^^, NULL, NULL, FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600), ^NULL^, ^1^,\n			^0^, ^^, 0, ^COLOMBIA^, ^^, ^998^, ^1^, ^99^, ^20189980000011^, ^1^,\n			^1234567890^, FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600), ^998^, ^0^, ^9^, ^1^, 11, 1,\n			^/2018/998/DOCS/1234567890_2018_05_23_12_50_35.DOCX^,1)'),('1527098043','1234567890','192.168.8.113','i','SGD_DT_RADICADO','INSERT INTO SGD_DT_RADICADO VALUES (^20189980000011^,5)'),('1527098431','1234567890','192.168.8.113','u','_SEQUENCE','UPDATE _SEQUENCE SET SEQ_VAL=3 WHERE SEQ_NAME=^SECR_TP1_^'),('1527098431','1234567890','192.168.8.113','i','RADICADO','INSERT INTO RADICADO (RADI_TIPO_DERI, RADI_CUENTAI, EESP_CODI, MREC_CODI, RADI_FECH_OFIC, RADI_NUME_DERI,\n			RADI_USUA_RADI, TDID_CODI, RADI_DESC_ANEX, RADI_NUME_HOJA, RADI_PAIS, RA_ASUN, RADI_DEPE_RADI, RADI_USUA_ACTU,\n			CARP_CODI, RADI_NUME_RADI, TRTE_CODI, RADI_NUME_IDEN, RADI_FECH_RADI, RADI_DEPE_ACTU, TDOC_CODI, ESTA_CODI,\n			ID_CONT, DPTO_CODI, MUNI_CODI, RADI_PATH, CARP_PER)\n			VALUES\n			(NULL, ^^, NULL, NULL, FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600), ^NULL^, ^1^,\n			^0^, ^^, 0, ^COLOMBIA^, ^^, ^998^, ^1^, ^99^, ^20189980000021^, ^1^,\n			^1234567890^, FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600), ^998^, ^0^, ^9^, ^1^, 11, 1,\n			^/2018/998/DOCS/1234567890_2018_05_23_13_00_24.DOCX^,1)'),('1527098431','1234567890','192.168.8.113','i','SGD_DT_RADICADO','INSERT INTO SGD_DT_RADICADO VALUES (^20189980000021^,5)'),('1527098431','1234567890','192.168.8.113','u','_SEQUENCE','UPDATE _SEQUENCE SET SEQ_VAL=9 WHERE SEQ_NAME=^SEC_DIR_DIRECCIONES^'),('1527098431','1234567890','192.168.8.113','i','SGD_RENV_REGENVIO','INSERT INTO SGD_RENV_REGENVIO (USUA_DOC, SGD_RENV_CODIGO, SGD_FENV_CODIGO, SGD_RENV_FECH,\n						RADI_NUME_SAL, SGD_RENV_DESTINO, SGD_RENV_TELEFONO, SGD_RENV_MAIL, SGD_RENV_PESO, SGD_RENV_VALOR,\n						SGD_RENV_CERTIFICADO, SGD_RENV_ESTADO, SGD_RENV_NOMBRE, SGD_DIR_CODIGO, DEPE_CODI, SGD_DIR_TIPO,\n						RADI_NUME_GRUPO, SGD_RENV_PLANILLA, SGD_RENV_DIR, SGD_RENV_PAIS, SGD_RENV_DEPTO, SGD_RENV_MPIO,\n						SGD_RENV_TIPO, SGD_RENV_OBSERVA,SGD_DEPE_GENERA)\n						VALUES\n						(1234567890, 1, NULL, FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600), ^20189980000021^, ^1^, ^^, ^^,^^,\n						NULL, 0, 1, ^AGENCIA NACIONAL DE INFRAESTU^, NULL, ^998^, ^1^, ^20189980000021^, NULL,\n						^CALLE 24 A # 59 - 42 EDIFICIO^, ^COLOMBIA^,^D.C.^, ^BOGOTA^, 1, ^MASIVA GRUPO 20189980000021^,\n						^998^) '),('1527098431','1234567890','192.168.8.113','i','SGD_RDF_RETDOCF','INSERT INTO SGD_RDF_RETDOCF(USUA_DOC, SGD_MRD_CODIGO, SGD_RDF_FECH, RADI_NUME_RADI, DEPE_CODI, USUA_CODI)\n						VALUES(1234567890, 7,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600), ^20189980000021^, ^998^, 1 )'),('1527098431','1234567890','192.168.8.113','i','HIST_EVENTOS','INSERT INTO HIST_EVENTOS(RADI_NUME_RADI,DEPE_CODI,USUA_CODI,USUA_CODI_DEST,DEPE_CODI_DEST,USUA_DOC,HIST_DOC_DEST,SGD_TTR_CODIGO,HIST_OBSE,HIST_FECH) VALUES (20189980000021,^998^,1,1,^998^,^1234567890^,1234567890,30,^RADICADO INSERTADO DEL GRUPO DE MASIVA 20189980000021^,FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())+(0)*24*3600))');
/*!40000 ALTER TABLE `sgd_auditoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_camexp_campoexpediente`
--

DROP TABLE IF EXISTS `sgd_camexp_campoexpediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_camexp_campoexpediente` (
  `sgd_camexp_codigo` decimal(4,0) NOT NULL,
  `sgd_camexp_campo` varchar(30) NOT NULL,
  `sgd_parexp_codigo` decimal(4,0) NOT NULL,
  `sgd_camexp_fk` decimal(10,0) DEFAULT '0',
  `sgd_camexp_tablafk` varchar(30) DEFAULT NULL,
  `sgd_camexp_campofk` varchar(30) DEFAULT NULL,
  `sgd_camexp_campovalor` varchar(30) DEFAULT NULL,
  `sgd_camexp_orden` decimal(1,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_camexp_campoexpediente`
--

LOCK TABLES `sgd_camexp_campoexpediente` WRITE;
/*!40000 ALTER TABLE `sgd_camexp_campoexpediente` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_camexp_campoexpediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_carp_descripcion`
--

DROP TABLE IF EXISTS `sgd_carp_descripcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_carp_descripcion` (
  `sgd_carp_depecodi` varchar(5) NOT NULL,
  `sgd_carp_tiporad` decimal(2,0) NOT NULL,
  `sgd_carp_descr` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_carp_descripcion`
--

LOCK TABLES `sgd_carp_descripcion` WRITE;
/*!40000 ALTER TABLE `sgd_carp_descripcion` DISABLE KEYS */;
INSERT INTO `sgd_carp_descripcion` VALUES ('900',1,'Oficio');
/*!40000 ALTER TABLE `sgd_carp_descripcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_cau_causal`
--

DROP TABLE IF EXISTS `sgd_cau_causal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_cau_causal` (
  `sgd_cau_codigo` decimal(4,0) NOT NULL,
  `sgd_cau_descrip` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_cau_causal`
--

LOCK TABLES `sgd_cau_causal` WRITE;
/*!40000 ALTER TABLE `sgd_cau_causal` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_cau_causal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_caux_causales`
--

DROP TABLE IF EXISTS `sgd_caux_causales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_caux_causales` (
  `sgd_caux_codigo` decimal(10,0) NOT NULL,
  `radi_nume_radi` varchar(15) DEFAULT NULL,
  `sgd_dcau_codigo` decimal(4,0) DEFAULT NULL,
  `sgd_ddca_codigo` decimal(4,0) DEFAULT NULL,
  `sgd_caux_fecha` date DEFAULT NULL,
  `usua_doc` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_caux_causales`
--

LOCK TABLES `sgd_caux_causales` WRITE;
/*!40000 ALTER TABLE `sgd_caux_causales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_caux_causales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_ciu_ciudadano`
--

DROP TABLE IF EXISTS `sgd_ciu_ciudadano`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_ciu_ciudadano` (
  `tdid_codi` decimal(2,0) DEFAULT NULL,
  `sgd_ciu_codigo` decimal(8,0) DEFAULT NULL,
  `sgd_ciu_nombre` varchar(150) DEFAULT NULL,
  `sgd_ciu_direccion` varchar(150) DEFAULT NULL,
  `sgd_ciu_apell1` varchar(50) DEFAULT NULL,
  `sgd_ciu_apell2` varchar(50) DEFAULT NULL,
  `sgd_ciu_telefono` varchar(50) DEFAULT NULL,
  `sgd_ciu_email` varchar(50) DEFAULT NULL,
  `muni_codi` decimal(4,0) DEFAULT NULL,
  `dpto_codi` decimal(2,0) DEFAULT NULL,
  `sgd_ciu_cedula` varchar(13) DEFAULT NULL,
  `id_cont` decimal(2,0) DEFAULT '1',
  `id_pais` decimal(4,0) DEFAULT '170'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_ciu_ciudadano`
--

LOCK TABLES `sgd_ciu_ciudadano` WRITE;
/*!40000 ALTER TABLE `sgd_ciu_ciudadano` DISABLE KEYS */;
INSERT INTO `sgd_ciu_ciudadano` VALUES (NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,170),(4,1,'ANONIMO','CARERRA 14 T 74B-59 SUR','ANONIMO','','2858-546754','pruebas@skinatech.com',1,11,'111111111',1,170);
/*!40000 ALTER TABLE `sgd_ciu_ciudadano` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_clta_clstarif`
--

DROP TABLE IF EXISTS `sgd_clta_clstarif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_clta_clstarif` (
  `sgd_fenv_codigo` decimal(5,0) DEFAULT NULL,
  `sgd_clta_codser` decimal(5,0) DEFAULT NULL,
  `sgd_tar_codigo` decimal(5,0) DEFAULT NULL,
  `sgd_clta_descrip` varchar(100) DEFAULT NULL,
  `sgd_clta_pesdes` decimal(15,0) DEFAULT NULL,
  `sgd_clta_peshast` decimal(15,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_clta_clstarif`
--

LOCK TABLES `sgd_clta_clstarif` WRITE;
/*!40000 ALTER TABLE `sgd_clta_clstarif` DISABLE KEYS */;
INSERT INTO `sgd_clta_clstarif` VALUES (1,1,3,'URBANO NORMAL (PRIMER KILO)',1,1000),(1,1,4,'URBANO NORMAL (KILO ADICIONAL)',1000,1000),(1,1,6,'PREMIER (ORIGEN BOGOTA PRIMER KILO)',1,1000),(1,1,7,'PREMIER (ORIGEN BOGOTA KILO ADICIONAL)',1000,1000),(1,1,2,'SERVIENTREGA CORRESPONDENCIA DE IDA',1,500),(1,1,1,'SERVIENTREGA CORRESPONDENCIA DE VUELTA',1,500),(1,1,5,'MENSAJERO PERSONALES',1,1000),(2,1,1,'ENTREGA A COURRIER',10,100);
/*!40000 ALTER TABLE `sgd_clta_clstarif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_cob_campobliga`
--

DROP TABLE IF EXISTS `sgd_cob_campobliga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_cob_campobliga` (
  `sgd_cob_codi` decimal(4,0) NOT NULL,
  `sgd_cob_desc` varchar(150) DEFAULT NULL,
  `sgd_cob_label` varchar(50) DEFAULT NULL,
  `sgd_tidm_codi` decimal(4,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_cob_campobliga`
--

LOCK TABLES `sgd_cob_campobliga` WRITE;
/*!40000 ALTER TABLE `sgd_cob_campobliga` DISABLE KEYS */;
INSERT INTO `sgd_cob_campobliga` VALUES (1,'PAIS_NOMBRE','PAIS_NOMBRE',2),(2,'NOMBRE','NOMBRE',1),(3,'MUNI_NOMBRE','MUNI_NOMBRE',1),(4,'DEPTO_NOMBRE','DEPTO_NOMBRE',1),(5,'F_RAD_S','F_RAD_S',1),(6,'TIPO','TIPO',2),(7,'NOMBRE','NOMBRE',2),(8,'MUNI_NOMBRE','MUNI_NOMBRE',2),(9,'DEPTO_NOMBRE','DEPTO_NOMBRE',2),(10,'DIR','DIR',2);
/*!40000 ALTER TABLE `sgd_cob_campobliga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_dcau_causal`
--

DROP TABLE IF EXISTS `sgd_dcau_causal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_dcau_causal` (
  `sgd_dcau_codigo` decimal(4,0) NOT NULL,
  `sgd_cau_codigo` decimal(4,0) DEFAULT NULL,
  `sgd_dcau_descrip` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_dcau_causal`
--

LOCK TABLES `sgd_dcau_causal` WRITE;
/*!40000 ALTER TABLE `sgd_dcau_causal` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_dcau_causal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_ddca_ddsgrgdo`
--

DROP TABLE IF EXISTS `sgd_ddca_ddsgrgdo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_ddca_ddsgrgdo` (
  `sgd_ddca_codigo` decimal(4,0) NOT NULL,
  `sgd_dcau_codigo` decimal(4,0) DEFAULT NULL,
  `par_serv_secue` decimal(8,0) DEFAULT NULL,
  `sgd_ddca_descrip` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_ddca_ddsgrgdo`
--

LOCK TABLES `sgd_ddca_ddsgrgdo` WRITE;
/*!40000 ALTER TABLE `sgd_ddca_ddsgrgdo` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_ddca_ddsgrgdo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_def_contactos`
--

DROP TABLE IF EXISTS `sgd_def_contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_def_contactos` (
  `ctt_id` decimal(15,0) NOT NULL,
  `ctt_nombre` varchar(60) NOT NULL,
  `ctt_cargo` varchar(60) NOT NULL,
  `ctt_telefono` varchar(25) DEFAULT NULL,
  `ctt_id_tipo` decimal(4,0) NOT NULL,
  `ctt_id_empresa` decimal(15,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_def_contactos`
--

LOCK TABLES `sgd_def_contactos` WRITE;
/*!40000 ALTER TABLE `sgd_def_contactos` DISABLE KEYS */;
INSERT INTO `sgd_def_contactos` VALUES (2,'JAIME ENRIQUE GOMEZ','CEO','2262080',0,2);
/*!40000 ALTER TABLE `sgd_def_contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_def_continentes`
--

DROP TABLE IF EXISTS `sgd_def_continentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_def_continentes` (
  `id_cont` decimal(2,0) DEFAULT NULL,
  `nombre_cont` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_def_continentes`
--

LOCK TABLES `sgd_def_continentes` WRITE;
/*!40000 ALTER TABLE `sgd_def_continentes` DISABLE KEYS */;
INSERT INTO `sgd_def_continentes` VALUES (1,'AMERICA'),(2,'EUROPA'),(3,'ASIA'),(4,'AFRICA'),(5,'OCEANIA'),(6,'ANTARTIDA');
/*!40000 ALTER TABLE `sgd_def_continentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_def_paises`
--

DROP TABLE IF EXISTS `sgd_def_paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_def_paises` (
  `id_pais` decimal(4,0) DEFAULT NULL,
  `id_cont` decimal(2,0) NOT NULL DEFAULT '1',
  `nombre_pais` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_def_paises`
--

LOCK TABLES `sgd_def_paises` WRITE;
/*!40000 ALTER TABLE `sgd_def_paises` DISABLE KEYS */;
INSERT INTO `sgd_def_paises` VALUES (170,1,'COLOMBIA'),(862,1,'VENEZUELA'),(1,1,'MEXICO'),(214,1,'REPUBLICA DOMINICANA'),(32,1,'ARGENTINA'),(591,1,'PANAMA'),(249,1,'ESTADOS UNIDOS'),(276,2,'ALEMANIA'),(55,1,'BRASIL'),(724,2,'ESPAÑA'),(767,2,'SUIZA'),(604,1,'PERU'),(218,1,'ECUADOR');
/*!40000 ALTER TABLE `sgd_def_paises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_deve_dev_envio`
--

DROP TABLE IF EXISTS `sgd_deve_dev_envio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_deve_dev_envio` (
  `sgd_deve_codigo` decimal(2,0) NOT NULL,
  `sgd_deve_desc` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_deve_dev_envio`
--

LOCK TABLES `sgd_deve_dev_envio` WRITE;
/*!40000 ALTER TABLE `sgd_deve_dev_envio` DISABLE KEYS */;
INSERT INTO `sgd_deve_dev_envio` VALUES (1,'CASA DESOCUPADA'),(2,'CAMBIO DE DOMICILIO USUARIO'),(3,'CERRADO'),(5,'DEVUELTO DE PORTERIA'),(6,'DIRECCION DEFICIENTE'),(7,'FALLECIDO'),(8,'NO EXISTE NUMERO'),(9,'NO RESIDE'),(10,'NO RECLAMADO'),(12,'SE TRASLADO'),(13,'NO EXISTE EMPRESA'),(14,'ZONA DE ALTO RIESGO'),(15,'SOBRE DESOCUPADO'),(16,'FUERA PERIMETRO URBANO'),(17,'ENVIADO A ADPOSTAL, CONTROL DE CALIDAD'),(18,'SIN SELLO'),(90,'DOCUMENTO MAL RADICADO'),(99,'SOBREPASO TIEMPO DE ESPERA'),(18,'SIN SELLO'),(19,'PERRO BRAVO');
/*!40000 ALTER TABLE `sgd_deve_dev_envio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_dir_drecciones`
--

DROP TABLE IF EXISTS `sgd_dir_drecciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_dir_drecciones` (
  `sgd_dir_codigo` decimal(10,0) NOT NULL,
  `sgd_dir_tipo` decimal(4,0) NOT NULL,
  `sgd_oem_codigo` decimal(8,0) DEFAULT NULL,
  `sgd_ciu_codigo` decimal(8,0) DEFAULT NULL,
  `radi_nume_radi` varchar(15) DEFAULT NULL,
  `sgd_esp_codi` decimal(5,0) DEFAULT NULL,
  `muni_codi` decimal(4,0) DEFAULT NULL,
  `dpto_codi` decimal(3,0) DEFAULT NULL,
  `sgd_dir_direccion` varchar(150) DEFAULT NULL,
  `sgd_dir_telefono` varchar(50) DEFAULT NULL,
  `sgd_dir_mail` varchar(50) DEFAULT NULL,
  `sgd_sec_codigo` decimal(13,0) DEFAULT NULL,
  `sgd_temporal_nombre` varchar(150) DEFAULT NULL,
  `anex_codigo` decimal(20,0) DEFAULT NULL,
  `sgd_anex_codigo` varchar(20) DEFAULT NULL,
  `sgd_dir_nombre` varchar(150) DEFAULT NULL,
  `sgd_doc_fun` varchar(14) DEFAULT NULL,
  `sgd_dir_nomremdes` varchar(1000) DEFAULT NULL,
  `sgd_trd_codigo` decimal(1,0) DEFAULT NULL,
  `sgd_dir_tdoc` decimal(1,0) DEFAULT NULL,
  `sgd_dir_doc` varchar(14) DEFAULT NULL,
  `id_pais` decimal(4,0) DEFAULT '170',
  `id_cont` decimal(2,0) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_dir_drecciones`
--

LOCK TABLES `sgd_dir_drecciones` WRITE;
/*!40000 ALTER TABLE `sgd_dir_drecciones` DISABLE KEYS */;
INSERT INTO `sgd_dir_drecciones` VALUES (1,1,NULL,NULL,'20189980000012',1,1,11,'Calle 24 A # 59 - 42 Edificio T3 Torre 4 Piso 2 ','','contactenos@ani.gov.co ',0,NULL,NULL,NULL,'',NULL,'AGENCIA NACIONAL DE INFRAESTUCTURA -- ANI',3,NULL,'830.125.996.9',170,1),(2,1,NULL,NULL,'20189980000022',1,1,11,'Calle 24 A # 59 - 42 Edificio T3 Torre 4 Piso 2','','contactenos@ani.gov.co',0,NULL,NULL,NULL,'',NULL,'',3,NULL,NULL,170,1),(3,1,NULL,NULL,'20189980000032',1,1,11,'Calle 24 A # 59 - 42 Edificio T3 Torre 4 Piso 2','','contactenos@ani.gov.co',0,NULL,NULL,NULL,'',NULL,'',3,NULL,NULL,170,1),(4,1,NULL,NULL,'20189980000042',1,1,11,'Calle 24 A # 59 - 42 Edificio T3 Torre 4 Piso 2','','contactenos@ani.gov.co',0,NULL,NULL,NULL,'',NULL,'',3,NULL,NULL,170,1),(5,1,NULL,NULL,'20189980000052',1,1,11,'Calle 24 A # 59 - 42 Edificio T3 Torre 4 Piso 2','','contactenos@ani.gov.co',0,NULL,NULL,NULL,'',NULL,'',3,NULL,NULL,170,1),(6,1,NULL,NULL,'20189980000062',2,1,11,'Carrera 64 No 96-17 ','2226-2080','info@skinatech.com ',0,NULL,NULL,NULL,'',NULL,'SKINA TECNOLOGIES SAS JAIME ENRIQUE GOMEZ SKINA',3,NULL,'10278597',170,1),(7,1,NULL,NULL,'20189980000072',2,1,11,'Carrera 64 No 96-17 ','2226-2080','info@skinatech.com ',0,NULL,NULL,NULL,'Ma Teresa Flechas J.',NULL,'SKINA TECNOLOGIES SAS JAIME ENRIQUE GOMEZ SKINA',3,NULL,'10278597',170,1);
/*!40000 ALTER TABLE `sgd_dir_drecciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_dnufe_docnufe`
--

DROP TABLE IF EXISTS `sgd_dnufe_docnufe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_dnufe_docnufe` (
  `sgd_dnufe_codi` decimal(4,0) NOT NULL,
  `sgd_pnufe_codi` decimal(4,0) DEFAULT NULL,
  `sgd_tpr_codigo` decimal(4,0) DEFAULT NULL,
  `sgd_dnufe_label` varchar(150) DEFAULT NULL,
  `trte_codi` decimal(2,0) DEFAULT NULL,
  `sgd_dnufe_main` varchar(1) DEFAULT NULL,
  `sgd_dnufe_path` varchar(150) DEFAULT NULL,
  `sgd_dnufe_gerarq` varchar(10) DEFAULT NULL,
  `anex_tipo_codi` decimal(4,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_dnufe_docnufe`
--

LOCK TABLES `sgd_dnufe_docnufe` WRITE;
/*!40000 ALTER TABLE `sgd_dnufe_docnufe` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_dnufe_docnufe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_dt_radicado`
--

DROP TABLE IF EXISTS `sgd_dt_radicado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_dt_radicado` (
  `radi_nume_radi` varchar(15) NOT NULL,
  `dias_termino` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_dt_radicado`
--

LOCK TABLES `sgd_dt_radicado` WRITE;
/*!40000 ALTER TABLE `sgd_dt_radicado` DISABLE KEYS */;
INSERT INTO `sgd_dt_radicado` VALUES ('20189980000012',3),('20189980000022',0),('20189980000032',0),('20189980000042',0),('20189980000052',0),('20189980000062',2),('20189980000072',2),('20189980000011',5),('20189980000021',5);
/*!40000 ALTER TABLE `sgd_dt_radicado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_eanu_estanulacion`
--

DROP TABLE IF EXISTS `sgd_eanu_estanulacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_eanu_estanulacion` (
  `sgd_eanu_desc` varchar(150) DEFAULT NULL,
  `sgd_eanu_codi` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_eanu_estanulacion`
--

LOCK TABLES `sgd_eanu_estanulacion` WRITE;
/*!40000 ALTER TABLE `sgd_eanu_estanulacion` DISABLE KEYS */;
INSERT INTO `sgd_eanu_estanulacion` VALUES ('RADICADO EN SOLICITUD DE ANULACION',1),('RADICADO ANULADO',2),('RADICADO EN SOLICITUD DE REVIVIR',3),('RADICADO IMPOSIBLE DE ANULAR',9);
/*!40000 ALTER TABLE `sgd_eanu_estanulacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_einv_inventario`
--

DROP TABLE IF EXISTS `sgd_einv_inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_einv_inventario` (
  `sgd_einv_codigo` decimal(10,0) NOT NULL,
  `sgd_depe_nomb` varchar(400) DEFAULT NULL,
  `sgd_depe_codi` varchar(5) DEFAULT NULL,
  `sgd_einv_expnum` varchar(18) DEFAULT NULL,
  `sgd_einv_titulo` varchar(400) DEFAULT NULL,
  `sgd_einv_unidad` decimal(10,0) DEFAULT NULL,
  `sgd_einv_fech` date DEFAULT NULL,
  `sgd_einv_fechfin` date DEFAULT NULL,
  `sgd_einv_radicados` varchar(40) DEFAULT NULL,
  `sgd_einv_folios` decimal(10,0) DEFAULT NULL,
  `sgd_einv_nundocu` decimal(10,0) DEFAULT NULL,
  `sgd_einv_nundocubodega` decimal(10,0) DEFAULT NULL,
  `sgd_einv_caja` decimal(10,0) DEFAULT NULL,
  `sgd_einv_cajabodega` decimal(10,0) DEFAULT NULL,
  `sgd_einv_srd` decimal(10,0) DEFAULT NULL,
  `sgd_einv_nomsrd` varchar(400) DEFAULT NULL,
  `sgd_einv_sbrd` decimal(10,0) DEFAULT NULL,
  `sgd_einv_nomsbrd` varchar(400) DEFAULT NULL,
  `sgd_einv_retencion` varchar(400) DEFAULT NULL,
  `sgd_einv_disfinal` varchar(400) DEFAULT NULL,
  `sgd_einv_ubicacion` varchar(400) DEFAULT NULL,
  `sgd_einv_observacion` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_einv_inventario`
--

LOCK TABLES `sgd_einv_inventario` WRITE;
/*!40000 ALTER TABLE `sgd_einv_inventario` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_einv_inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_eit_items`
--

DROP TABLE IF EXISTS `sgd_eit_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_eit_items` (
  `sgd_eit_codigo` decimal(10,0) NOT NULL,
  `sgd_eit_cod_padre` decimal(10,0) DEFAULT '0',
  `sgd_eit_nombre` varchar(40) DEFAULT NULL,
  `sgd_eit_sigla` varchar(6) DEFAULT NULL,
  `codi_dpto` decimal(4,0) DEFAULT NULL,
  `codi_muni` decimal(5,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_eit_items`
--

LOCK TABLES `sgd_eit_items` WRITE;
/*!40000 ALTER TABLE `sgd_eit_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_eit_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_eje_tema`
--

DROP TABLE IF EXISTS `sgd_eje_tema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_eje_tema` (
  `sgd_tema_codigo` varchar(10) NOT NULL,
  `sgd_tema_nomb` varchar(150) NOT NULL,
  `sgd_tema_desc` varchar(350) NOT NULL,
  `sgd_tema_plazo` decimal(2,0) DEFAULT NULL,
  `sgd_tema_tpplazo` varchar(50) DEFAULT NULL,
  `sgd_tema_estado` decimal(2,0) NOT NULL,
  `sgd_tema_depe` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_eje_tema`
--

LOCK TABLES `sgd_eje_tema` WRITE;
/*!40000 ALTER TABLE `sgd_eje_tema` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_eje_tema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_empus_empusuario`
--

DROP TABLE IF EXISTS `sgd_empus_empusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_empus_empusuario` (
  `usua_login` varchar(10) DEFAULT NULL,
  `identificador_empresa` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_empus_empusuario`
--

LOCK TABLES `sgd_empus_empusuario` WRITE;
/*!40000 ALTER TABLE `sgd_empus_empusuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_empus_empusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_ent_entidades`
--

DROP TABLE IF EXISTS `sgd_ent_entidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_ent_entidades` (
  `sgd_ent_nit` varchar(13) NOT NULL,
  `sgd_ent_codsuc` varchar(4) NOT NULL,
  `sgd_ent_pias` decimal(5,0) DEFAULT NULL,
  `dpto_codi` decimal(2,0) DEFAULT NULL,
  `muni_codi` decimal(4,0) DEFAULT NULL,
  `sgd_ent_descrip` varchar(80) DEFAULT NULL,
  `sgd_ent_direccion` varchar(50) DEFAULT NULL,
  `sgd_ent_telefono` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_ent_entidades`
--

LOCK TABLES `sgd_ent_entidades` WRITE;
/*!40000 ALTER TABLE `sgd_ent_entidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_ent_entidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_enve_envioespecial`
--

DROP TABLE IF EXISTS `sgd_enve_envioespecial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_enve_envioespecial` (
  `sgd_fenv_codigo` decimal(4,0) DEFAULT NULL,
  `sgd_enve_valorl` varchar(30) DEFAULT NULL,
  `sgd_enve_valorn` varchar(30) DEFAULT NULL,
  `sgd_enve_desc` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_enve_envioespecial`
--

LOCK TABLES `sgd_enve_envioespecial` WRITE;
/*!40000 ALTER TABLE `sgd_enve_envioespecial` DISABLE KEYS */;
INSERT INTO `sgd_enve_envioespecial` VALUES (109,'1200','1200','Valor descuento automático'),(109,'160','160','Valor alistamiento'),(109,'1300','3300','Valor cert. acuse de recibido');
/*!40000 ALTER TABLE `sgd_enve_envioespecial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_est_estadi`
--

DROP TABLE IF EXISTS `sgd_est_estadi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_est_estadi` (
  `radi_nume_radi` tinyint(4) NOT NULL,
  `radi_fech_radi` tinyint(4) NOT NULL,
  `radi_depe_radi` tinyint(4) NOT NULL,
  `radi_usua_radi` tinyint(4) NOT NULL,
  `radi_depe_actu` tinyint(4) NOT NULL,
  `radi_usua_actu` tinyint(4) NOT NULL,
  `trte_codi` tinyint(4) NOT NULL,
  `tdid_codi` tinyint(4) NOT NULL,
  `radi_nomb` tinyint(4) NOT NULL,
  `eesp_codi` tinyint(4) NOT NULL,
  `usua_nomb` tinyint(4) NOT NULL,
  `depe_nomb` tinyint(4) NOT NULL,
  `tdid_desc` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_est_estadi`
--

LOCK TABLES `sgd_est_estadi` WRITE;
/*!40000 ALTER TABLE `sgd_est_estadi` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_est_estadi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_estc_estconsolid`
--

DROP TABLE IF EXISTS `sgd_estc_estconsolid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_estc_estconsolid` (
  `sgd_estc_codigo` decimal(10,0) DEFAULT NULL,
  `sgd_tpr_codigo` decimal(10,0) DEFAULT NULL,
  `dep_nombre` varchar(30) DEFAULT NULL,
  `depe_codi` varchar(5) DEFAULT NULL,
  `sgd_estc_ctotal` decimal(10,0) DEFAULT NULL,
  `sgd_estc_centramite` decimal(10,0) DEFAULT NULL,
  `sgd_estc_csinriesgo` decimal(10,0) DEFAULT NULL,
  `sgd_estc_criesgomedio` decimal(10,0) DEFAULT NULL,
  `sgd_estc_criesgoalto` decimal(10,0) DEFAULT NULL,
  `sgd_estc_ctramitados` decimal(10,0) DEFAULT NULL,
  `sgd_estc_centermino` decimal(10,0) DEFAULT NULL,
  `sgd_estc_cfueratermino` decimal(10,0) DEFAULT NULL,
  `sgd_estc_fechgen` date DEFAULT NULL,
  `sgd_estc_fechini` date DEFAULT NULL,
  `sgd_estc_fechfin` date DEFAULT NULL,
  `sgd_estc_fechiniresp` date DEFAULT NULL,
  `sgd_estc_fechfinresp` date DEFAULT NULL,
  `sgd_estc_dsinriesgo` decimal(10,0) DEFAULT NULL,
  `sgd_estc_driesgomegio` decimal(10,0) DEFAULT NULL,
  `sgd_estc_driesgoalto` decimal(10,0) DEFAULT NULL,
  `sgd_estc_dtermino` decimal(10,0) DEFAULT NULL,
  `sgd_estc_grupgenerado` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_estc_estconsolid`
--

LOCK TABLES `sgd_estc_estconsolid` WRITE;
/*!40000 ALTER TABLE `sgd_estc_estconsolid` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_estc_estconsolid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_estinst_estadoinstancia`
--

DROP TABLE IF EXISTS `sgd_estinst_estadoinstancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_estinst_estadoinstancia` (
  `sgd_estinst_codi` decimal(4,0) DEFAULT NULL,
  `sgd_apli_codi` decimal(4,0) DEFAULT NULL,
  `sgd_instorf_codi` decimal(4,0) DEFAULT NULL,
  `sgd_estinst_valor` decimal(4,0) DEFAULT NULL,
  `sgd_estinst_habilita` decimal(1,0) DEFAULT NULL,
  `sgd_estinst_mensaje` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_estinst_estadoinstancia`
--

LOCK TABLES `sgd_estinst_estadoinstancia` WRITE;
/*!40000 ALTER TABLE `sgd_estinst_estadoinstancia` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_estinst_estadoinstancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_exp_expediente`
--

DROP TABLE IF EXISTS `sgd_exp_expediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_exp_expediente` (
  `sgd_exp_numero` varchar(18) DEFAULT NULL,
  `radi_nume_radi` varchar(18) DEFAULT NULL,
  `sgd_exp_fech` date DEFAULT NULL,
  `sgd_exp_fech_mod` date DEFAULT NULL,
  `depe_codi` varchar(5) DEFAULT NULL,
  `usua_codi` decimal(3,0) DEFAULT NULL,
  `usua_doc` varchar(15) DEFAULT NULL,
  `sgd_exp_estado` decimal(1,0) DEFAULT '0',
  `sgd_exp_titulo` varchar(50) DEFAULT NULL,
  `sgd_exp_asunto` varchar(150) DEFAULT NULL,
  `sgd_exp_carpeta` varchar(30) DEFAULT NULL,
  `sgd_exp_ufisica` varchar(20) DEFAULT NULL,
  `sgd_exp_isla` varchar(10) DEFAULT NULL,
  `sgd_exp_estante` varchar(10) DEFAULT NULL,
  `sgd_exp_caja` varchar(10) DEFAULT NULL,
  `sgd_exp_fech_arch` date DEFAULT NULL,
  `sgd_srd_codigo` decimal(3,0) DEFAULT NULL,
  `sgd_sbrd_codigo` decimal(3,0) DEFAULT NULL,
  `sgd_fexp_codigo` decimal(3,0) DEFAULT NULL,
  `sgd_exp_subexpediente` varchar(20) DEFAULT NULL,
  `sgd_exp_archivo` decimal(1,0) DEFAULT NULL,
  `sgd_exp_unicon` decimal(1,0) DEFAULT NULL,
  `sgd_exp_fechfin` date DEFAULT NULL,
  `sgd_exp_folios` varchar(6) DEFAULT NULL,
  `sgd_exp_rete` decimal(2,0) DEFAULT NULL,
  `sgd_exp_entrepa` decimal(6,0) DEFAULT NULL,
  `radi_usua_arch` varchar(40) DEFAULT NULL,
  `sgd_exp_edificio` varchar(400) DEFAULT NULL,
  `sgd_exp_caja_bodega` varchar(40) DEFAULT NULL,
  `sgd_exp_carro` varchar(40) DEFAULT NULL,
  `sgd_exp_carpeta_bodega` varchar(40) DEFAULT NULL,
  `sgd_exp_privado` decimal(1,0) DEFAULT NULL,
  `sgd_exp_cd` varchar(10) DEFAULT NULL,
  `sgd_exp_nref` varchar(7) DEFAULT NULL,
  `sgd_sexp_paraexp1` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_exp_expediente`
--

LOCK TABLES `sgd_exp_expediente` WRITE;
/*!40000 ALTER TABLE `sgd_exp_expediente` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_exp_expediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_fars_faristas`
--

DROP TABLE IF EXISTS `sgd_fars_faristas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_fars_faristas` (
  `sgd_fars_codigo` decimal(5,0) NOT NULL,
  `sgd_pexp_codigo` decimal(4,0) DEFAULT NULL,
  `sgd_fexp_codigoini` decimal(6,0) DEFAULT NULL,
  `sgd_fexp_codigofin` decimal(6,0) DEFAULT NULL,
  `sgd_fars_diasminimo` decimal(3,0) DEFAULT NULL,
  `sgd_fars_diasmaximo` decimal(3,0) DEFAULT NULL,
  `sgd_fars_desc` varchar(100) DEFAULT NULL,
  `sgd_trad_codigo` decimal(2,0) DEFAULT NULL,
  `sgd_srd_codigo` decimal(3,0) DEFAULT NULL,
  `sgd_sbrd_codigo` decimal(3,0) DEFAULT NULL,
  `sgd_fars_tipificacion` decimal(1,0) DEFAULT NULL,
  `sgd_tpr_codigo` decimal(10,0) DEFAULT NULL,
  `sgd_fars_automatico` decimal(10,0) DEFAULT NULL,
  `sgd_fars_rolgeneral` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_fars_faristas`
--

LOCK TABLES `sgd_fars_faristas` WRITE;
/*!40000 ALTER TABLE `sgd_fars_faristas` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_fars_faristas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_fenv_frmenvio`
--

DROP TABLE IF EXISTS `sgd_fenv_frmenvio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_fenv_frmenvio` (
  `sgd_fenv_codigo` decimal(5,0) NOT NULL,
  `sgd_fenv_descrip` varchar(40) DEFAULT NULL,
  `sgd_fenv_planilla` decimal(1,0) NOT NULL DEFAULT '0',
  `sgd_fenv_estado` decimal(1,0) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_fenv_frmenvio`
--

LOCK TABLES `sgd_fenv_frmenvio` WRITE;
/*!40000 ALTER TABLE `sgd_fenv_frmenvio` DISABLE KEYS */;
INSERT INTO `sgd_fenv_frmenvio` VALUES (1,'Servientrega',1,1),(2,'Mensajero Personal',1,1);
/*!40000 ALTER TABLE `sgd_fenv_frmenvio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_fexp_flujoexpedientes`
--

DROP TABLE IF EXISTS `sgd_fexp_flujoexpedientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_fexp_flujoexpedientes` (
  `sgd_fexp_codigo` decimal(6,0) DEFAULT NULL,
  `sgd_pexp_codigo` decimal(6,0) DEFAULT NULL,
  `sgd_fexp_orden` decimal(4,0) DEFAULT NULL,
  `sgd_fexp_terminos` decimal(4,0) DEFAULT NULL,
  `sgd_fexp_imagen` varchar(50) DEFAULT NULL,
  `sgd_fexp_descrip` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_fexp_flujoexpedientes`
--

LOCK TABLES `sgd_fexp_flujoexpedientes` WRITE;
/*!40000 ALTER TABLE `sgd_fexp_flujoexpedientes` DISABLE KEYS */;
INSERT INTO `sgd_fexp_flujoexpedientes` VALUES (0,0,0,0,'','');
/*!40000 ALTER TABLE `sgd_fexp_flujoexpedientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_firrad_firmarads`
--

DROP TABLE IF EXISTS `sgd_firrad_firmarads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_firrad_firmarads` (
  `sgd_firrad_id` decimal(15,0) NOT NULL,
  `radi_nume_radi` varchar(15) NOT NULL,
  `usua_doc` varchar(14) NOT NULL,
  `sgd_firrad_firma` varchar(255) DEFAULT NULL,
  `sgd_firrad_fecha` date DEFAULT NULL,
  `sgd_firrad_docsolic` varchar(14) NOT NULL,
  `sgd_firrad_fechsolic` date NOT NULL,
  `sgd_firrad_pk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_firrad_firmarads`
--

LOCK TABLES `sgd_firrad_firmarads` WRITE;
/*!40000 ALTER TABLE `sgd_firrad_firmarads` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_firrad_firmarads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_fld_flujodoc`
--

DROP TABLE IF EXISTS `sgd_fld_flujodoc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_fld_flujodoc` (
  `sgd_fld_codigo` decimal(3,0) DEFAULT NULL,
  `sgd_fld_desc` varchar(100) DEFAULT NULL,
  `sgd_tpr_codigo` decimal(3,0) DEFAULT NULL,
  `sgd_fld_imagen` varchar(50) DEFAULT NULL,
  `sgd_fld_grupoweb` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_fld_flujodoc`
--

LOCK TABLES `sgd_fld_flujodoc` WRITE;
/*!40000 ALTER TABLE `sgd_fld_flujodoc` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_fld_flujodoc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_fun_funciones`
--

DROP TABLE IF EXISTS `sgd_fun_funciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_fun_funciones` (
  `sgd_fun_codigo` decimal(4,0) NOT NULL,
  `sgd_fun_descrip` varchar(530) DEFAULT NULL,
  `sgd_fun_fech_ini` date DEFAULT NULL,
  `sgd_fun_fech_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_fun_funciones`
--

LOCK TABLES `sgd_fun_funciones` WRITE;
/*!40000 ALTER TABLE `sgd_fun_funciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_fun_funciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_hfld_histflujodoc`
--

DROP TABLE IF EXISTS `sgd_hfld_histflujodoc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_hfld_histflujodoc` (
  `sgd_hfld_codigo` decimal(6,0) DEFAULT NULL,
  `sgd_fexp_codigo` decimal(3,0) NOT NULL,
  `sgd_exp_fechflujoant` date DEFAULT NULL,
  `sgd_hfld_fech` datetime DEFAULT NULL,
  `sgd_exp_numero` varchar(18) DEFAULT NULL,
  `radi_nume_radi` varchar(15) DEFAULT NULL,
  `usua_doc` varchar(10) DEFAULT NULL,
  `usua_codi` decimal(10,0) DEFAULT NULL,
  `depe_codi` varchar(5) DEFAULT NULL,
  `sgd_ttr_codigo` decimal(2,0) DEFAULT NULL,
  `sgd_fexp_observa` varchar(500) DEFAULT NULL,
  `sgd_hfld_observa` varchar(500) DEFAULT NULL,
  `sgd_fars_codigo` decimal(10,0) DEFAULT NULL,
  `sgd_hfld_automatico` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_hfld_histflujodoc`
--

LOCK TABLES `sgd_hfld_histflujodoc` WRITE;
/*!40000 ALTER TABLE `sgd_hfld_histflujodoc` DISABLE KEYS */;
INSERT INTO `sgd_hfld_histflujodoc` VALUES (NULL,0,NULL,'2018-05-23 12:30:04','2018998040300001E','20189980000072','1234567890',1,'998',51,NULL,'*TRD*4/3 (Creacion de Expediente.)',NULL,NULL);
/*!40000 ALTER TABLE `sgd_hfld_histflujodoc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_hmtd_hismatdoc`
--

DROP TABLE IF EXISTS `sgd_hmtd_hismatdoc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_hmtd_hismatdoc` (
  `sgd_hmtd_codigo` decimal(6,0) NOT NULL,
  `sgd_hmtd_fecha` date NOT NULL,
  `radi_nume_radi` varchar(15) NOT NULL,
  `usua_codi` decimal(10,0) NOT NULL,
  `sgd_hmtd_obse` varchar(600) NOT NULL,
  `usua_doc` decimal(13,0) DEFAULT NULL,
  `depe_codi` varchar(5) DEFAULT NULL,
  `sgd_mtd_codigo` decimal(4,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_hmtd_hismatdoc`
--

LOCK TABLES `sgd_hmtd_hismatdoc` WRITE;
/*!40000 ALTER TABLE `sgd_hmtd_hismatdoc` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_hmtd_hismatdoc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_instorf_instanciasorfeo`
--

DROP TABLE IF EXISTS `sgd_instorf_instanciasorfeo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_instorf_instanciasorfeo` (
  `sgd_instorf_codi` decimal(4,0) DEFAULT NULL,
  `sgd_instorf_desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_instorf_instanciasorfeo`
--

LOCK TABLES `sgd_instorf_instanciasorfeo` WRITE;
/*!40000 ALTER TABLE `sgd_instorf_instanciasorfeo` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_instorf_instanciasorfeo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_lip_linkip`
--

DROP TABLE IF EXISTS `sgd_lip_linkip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_lip_linkip` (
  `sgd_lip_id` decimal(4,0) NOT NULL,
  `sgd_lip_ipini` varchar(20) NOT NULL,
  `sgd_lip_ipfin` varchar(20) DEFAULT NULL,
  `sgd_lip_dirintranet` varchar(150) NOT NULL,
  `depe_codi` varchar(5) NOT NULL,
  `sgd_lip_arch` varchar(70) DEFAULT NULL,
  `sgd_lip_diascache` decimal(5,0) DEFAULT NULL,
  `sgd_lip_rutaftp` varchar(150) DEFAULT NULL,
  `sgd_lip_servftp` varchar(50) DEFAULT NULL,
  `sgd_lip_usbd` varchar(20) DEFAULT NULL,
  `sgd_lip_nombd` varchar(20) DEFAULT NULL,
  `sgd_lip_pwdbd` varchar(20) DEFAULT NULL,
  `sgd_lip_usftp` varchar(20) DEFAULT NULL,
  `sgd_lip_pwdftp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_lip_linkip`
--

LOCK TABLES `sgd_lip_linkip` WRITE;
/*!40000 ALTER TABLE `sgd_lip_linkip` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_lip_linkip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_mpes_mddpeso`
--

DROP TABLE IF EXISTS `sgd_mpes_mddpeso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_mpes_mddpeso` (
  `sgd_mpes_codigo` decimal(5,0) NOT NULL,
  `sgd_mpes_descrip` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_mpes_mddpeso`
--

LOCK TABLES `sgd_mpes_mddpeso` WRITE;
/*!40000 ALTER TABLE `sgd_mpes_mddpeso` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_mpes_mddpeso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_mrd_matrird`
--

DROP TABLE IF EXISTS `sgd_mrd_matrird`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_mrd_matrird` (
  `sgd_mrd_codigo` decimal(4,0) NOT NULL,
  `depe_codi` varchar(5) NOT NULL,
  `sgd_srd_codigo` decimal(4,0) NOT NULL,
  `sgd_sbrd_codigo` decimal(4,0) NOT NULL,
  `sgd_tpr_codigo` decimal(4,0) NOT NULL,
  `soporte` varchar(12) DEFAULT NULL,
  `sgd_mrd_fechini` date DEFAULT NULL,
  `sgd_mrd_fechfin` date DEFAULT NULL,
  `sgd_mrd_esta` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_mrd_matrird`
--

LOCK TABLES `sgd_mrd_matrird` WRITE;
/*!40000 ALTER TABLE `sgd_mrd_matrird` DISABLE KEYS */;
INSERT INTO `sgd_mrd_matrird` VALUES (1,'100',5,1,9,'1','2018-03-15',NULL,'1'),(2,'100',5,1,16,'1','2018-03-15',NULL,'1'),(3,'100',4,3,13,'1','2018-03-15',NULL,'1'),(4,'998',4,3,6,'1','2018-03-15',NULL,'1'),(5,'998',4,3,9,'1','2018-03-15',NULL,'1'),(6,'998',4,3,11,'1','2018-03-15',NULL,'1'),(7,'998',4,3,13,'1','2018-03-15',NULL,'1');
/*!40000 ALTER TABLE `sgd_mrd_matrird` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_msdep_msgdep`
--

DROP TABLE IF EXISTS `sgd_msdep_msgdep`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_msdep_msgdep` (
  `sgd_msdep_codi` decimal(15,0) NOT NULL,
  `depe_codi` varchar(5) NOT NULL,
  `sgd_msg_codi` decimal(15,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_msdep_msgdep`
--

LOCK TABLES `sgd_msdep_msgdep` WRITE;
/*!40000 ALTER TABLE `sgd_msdep_msgdep` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_msdep_msgdep` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_msg_mensaje`
--

DROP TABLE IF EXISTS `sgd_msg_mensaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_msg_mensaje` (
  `sgd_msg_codi` decimal(15,0) NOT NULL,
  `sgd_tme_codi` decimal(3,0) NOT NULL,
  `sgd_msg_desc` varchar(150) DEFAULT NULL,
  `sgd_msg_fechdesp` date NOT NULL,
  `sgd_msg_url` varchar(150) NOT NULL,
  `sgd_msg_veces` decimal(3,0) NOT NULL,
  `sgd_msg_ancho` decimal(6,0) NOT NULL,
  `sgd_msg_largo` decimal(6,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_msg_mensaje`
--

LOCK TABLES `sgd_msg_mensaje` WRITE;
/*!40000 ALTER TABLE `sgd_msg_mensaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_msg_mensaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_noh_nohabiles`
--

DROP TABLE IF EXISTS `sgd_noh_nohabiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_noh_nohabiles` (
  `noh_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_noh_nohabiles`
--

LOCK TABLES `sgd_noh_nohabiles` WRITE;
/*!40000 ALTER TABLE `sgd_noh_nohabiles` DISABLE KEYS */;
INSERT INTO `sgd_noh_nohabiles` VALUES ('2017-01-01'),('2017-01-08'),('2017-01-09'),('2017-01-15'),('2017-01-22'),('2017-01-29'),('2017-02-05'),('2017-02-12'),('2017-02-19'),('2017-02-26'),('2017-03-05'),('2017-03-12'),('2017-03-19'),('2017-03-20'),('2017-03-26'),('2017-04-02'),('2017-04-09'),('2017-04-13'),('2017-04-14'),('2017-04-16'),('2017-04-23'),('2017-04-30'),('2017-05-01'),('2017-05-07'),('2017-05-14'),('2017-05-21'),('2017-05-28'),('2017-05-29'),('2017-06-04'),('2017-06-11'),('2017-06-18'),('2017-06-19'),('2017-06-25'),('2017-06-26'),('2017-07-02'),('2017-07-03'),('2017-07-09'),('2017-07-16'),('2017-07-20'),('2017-07-23'),('2017-07-30'),('2017-08-06'),('2017-08-07'),('2017-08-13'),('2017-08-20'),('2017-08-21'),('2017-08-27'),('2017-09-03'),('2017-09-10'),('2017-09-17'),('2017-09-24'),('2017-10-01'),('2017-10-08'),('2017-10-15'),('2017-10-16'),('2017-10-29'),('2017-11-06'),('2017-11-12'),('2017-11-13'),('2017-11-19'),('2017-11-26'),('2017-12-03'),('2017-12-08'),('2017-12-10'),('2017-12-17'),('2017-12-24'),('2017-12-25'),('2017-12-31'),('2018-01-01'),('2018-01-07'),('2018-01-08'),('2018-01-14'),('2018-01-21'),('2018-01-28'),('2018-02-04'),('2018-02-11'),('2018-02-18'),('2018-02-25'),('2018-03-04'),('2018-03-11'),('2018-03-18'),('2018-03-19'),('2018-03-25'),('2018-03-29'),('2018-03-30'),('2018-04-01'),('2018-04-08'),('2018-04-15'),('2018-04-22'),('2018-04-29'),('2018-05-01'),('2018-05-06'),('2018-05-13'),('2018-05-14'),('2018-05-20'),('2018-05-27'),('2018-06-03'),('2018-06-04'),('2018-06-10'),('2018-06-11'),('2018-06-17'),('2018-06-24'),('2018-07-01'),('2018-07-02'),('2018-07-08'),('2018-07-15'),('2018-07-20'),('2018-07-22'),('2018-07-29'),('2018-08-05'),('2018-08-07'),('2018-08-12'),('2018-08-19'),('2018-08-20'),('2018-08-26'),('2018-09-02'),('2018-09-09'),('2018-09-16'),('2018-09-23'),('2018-09-30'),('2018-10-07'),('2018-10-14'),('2018-10-15'),('2018-10-21'),('2018-10-28'),('2018-11-04'),('2018-11-05'),('2018-11-11'),('2018-11-12'),('2018-11-18'),('2018-11-25'),('2018-12-02'),('2018-12-08'),('2018-12-09'),('2018-12-16'),('2018-12-23'),('2018-12-25'),('2018-12-30'),('2019-01-01'),('2019-01-06'),('2019-01-07'),('2019-01-13'),('2019-01-20'),('2019-01-27'),('2019-02-02'),('2019-02-10'),('2019-02-17'),('2019-02-24'),('2019-03-03'),('2019-03-10'),('2019-03-17'),('2019-03-24'),('2019-03-25'),('2019-03-31'),('2019-04-07'),('2019-04-14'),('2019-04-18'),('2019-04-19'),('2019-04-21'),('2019-04-28'),('2019-05-05'),('2019-05-12'),('2019-05-19'),('2019-05-26'),('2019-06-02'),('2019-06-03'),('2019-06-09'),('2019-06-16'),('2019-06-23'),('2019-06-24'),('2019-06-30'),('2019-07-01'),('2019-07-07'),('2019-07-14'),('2019-07-20'),('2019-07-21'),('2019-07-28'),('2019-08-04'),('2019-08-07'),('2019-08-11'),('2019-08-18'),('2019-08-19'),('2019-08-25'),('2019-09-01'),('2019-09-08'),('2019-09-15'),('2019-09-22'),('2019-09-29'),('2019-10-06'),('2019-10-13'),('2019-10-14'),('2019-10-20'),('2019-10-27'),('2019-11-03'),('2019-11-04'),('2019-11-10'),('2019-11-11'),('2019-11-17'),('2019-11-24'),('2019-12-01'),('2019-12-08'),('2019-12-15'),('2019-12-22'),('2019-12-25'),('2019-12-29'),('2020-01-01'),('2020-01-05'),('2020-01-06'),('2020-01-12'),('2020-01-19'),('2020-01-26'),('2020-02-02'),('2020-02-09'),('2020-02-16'),('2020-02-23'),('2020-03-01'),('2020-03-08'),('2020-03-15'),('2020-03-22'),('2020-03-23'),('2020-03-29'),('2020-04-05'),('2020-04-09'),('2020-04-10'),('2020-04-12'),('2020-04-19'),('2020-04-26'),('2020-05-01'),('2020-05-03'),('2020-05-10'),('2020-05-17'),('2020-05-24'),('2020-05-25'),('2020-05-31'),('2020-06-07'),('2020-06-14'),('2020-06-15'),('2020-06-21'),('2020-06-22'),('2020-06-28'),('2020-06-29'),('2020-07-05'),('2020-07-12'),('2020-07-19'),('2020-07-20'),('2020-07-26'),('2020-08-02'),('2020-08-07'),('2020-08-09'),('2020-08-16'),('2020-08-17'),('2020-08-23'),('2020-08-30'),('2020-09-06'),('2020-09-13'),('2020-09-20'),('2020-09-27'),('2020-10-04'),('2020-10-11'),('2020-10-12'),('2020-10-18'),('2020-10-25'),('2020-11-01'),('2020-11-02'),('2020-11-08'),('2020-11-15'),('2020-11-16'),('2020-11-22'),('2020-11-29'),('2020-12-06'),('2020-12-08'),('2020-12-13'),('2020-12-20'),('2020-12-25'),('2020-12-27'),('2021-01-01'),('2021-01-03'),('2021-01-10'),('2021-01-11'),('2021-01-17'),('2021-01-24'),('2021-01-31'),('2021-02-07'),('2021-02-14'),('2021-02-21'),('2021-02-28'),('2021-03-07'),('2021-03-14'),('2021-03-21'),('2021-03-22'),('2021-03-28'),('2021-04-01'),('2021-04-02'),('2021-04-04'),('2021-04-11'),('2021-04-18'),('2021-04-25'),('2021-05-01'),('2021-05-02'),('2021-05-09'),('2021-05-16'),('2021-05-17'),('2021-05-23'),('2021-05-30'),('2021-06-06'),('2021-06-07'),('2021-06-13'),('2021-06-14'),('2021-06-20'),('2021-06-27'),('2021-07-04'),('2021-07-05'),('2021-07-11'),('2021-07-18'),('2021-07-20'),('2021-07-25'),('2021-08-01'),('2021-08-07'),('2021-08-08'),('2021-08-15'),('2021-08-16'),('2021-08-22'),('2021-08-29'),('2021-09-05'),('2021-09-12'),('2021-09-19'),('2021-09-26'),('2021-10-03'),('2021-10-10'),('2021-10-17'),('2021-10-18'),('2021-10-24'),('2021-10-31'),('2021-11-01'),('2021-11-07'),('2021-11-14'),('2021-11-15'),('2021-11-21'),('2021-11-28'),('2021-12-05'),('2021-12-08'),('2021-12-12'),('2021-12-19'),('2021-12-25'),('2021-12-26'),('2022-01-01'),('2022-01-02'),('2022-01-09'),('2022-01-10'),('2022-01-16'),('2022-01-23'),('2022-01-30'),('2022-02-06'),('2022-02-13'),('2022-02-20'),('2022-02-27'),('2022-03-06'),('2022-03-13'),('2022-03-20'),('2022-03-21'),('2022-03-27'),('2022-04-03'),('2022-04-10'),('2022-04-14'),('2022-04-15'),('2022-04-17'),('2022-04-24'),('2022-05-01'),('2022-05-08'),('2022-05-15'),('2022-05-22'),('2022-05-29'),('2022-05-30'),('2022-06-05'),('2022-06-12'),('2022-06-19'),('2022-06-20'),('2022-06-26'),('2022-06-27'),('2022-07-03'),('2022-07-04'),('2022-07-10'),('2022-07-17'),('2022-07-20'),('2022-07-24'),('2022-07-31'),('2022-08-07'),('2022-08-14'),('2022-08-15'),('2022-08-21'),('2022-08-28'),('2022-09-04'),('2022-09-11'),('2022-09-18'),('2022-09-25'),('2022-10-02'),('2022-10-09'),('2022-10-16'),('2022-10-17'),('2022-10-23'),('2022-10-30'),('2022-11-06'),('2022-11-07'),('2022-11-13'),('2022-11-14'),('2022-11-20'),('2022-11-27'),('2022-12-04'),('2022-12-08'),('2022-12-11'),('2022-12-18'),('2022-12-25');
/*!40000 ALTER TABLE `sgd_noh_nohabiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_not_notificacion`
--

DROP TABLE IF EXISTS `sgd_not_notificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_not_notificacion` (
  `sgd_not_codi` decimal(3,0) NOT NULL,
  `sgd_not_descrip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_not_notificacion`
--

LOCK TABLES `sgd_not_notificacion` WRITE;
/*!40000 ALTER TABLE `sgd_not_notificacion` DISABLE KEYS */;
INSERT INTO `sgd_not_notificacion` VALUES (1,'PERSONAL'),(2,'TELEFONICA');
/*!40000 ALTER TABLE `sgd_not_notificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_ntrd_notifrad`
--

DROP TABLE IF EXISTS `sgd_ntrd_notifrad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_ntrd_notifrad` (
  `radi_nume_radi` varchar(15) NOT NULL,
  `sgd_not_codi` decimal(3,0) NOT NULL,
  `sgd_ntrd_notificador` varchar(150) DEFAULT NULL,
  `sgd_ntrd_notificado` varchar(150) DEFAULT NULL,
  `sgd_ntrd_fecha_not` date DEFAULT NULL,
  `sgd_ntrd_num_edicto` decimal(6,0) DEFAULT NULL,
  `sgd_ntrd_fecha_fija` date DEFAULT NULL,
  `sgd_ntrd_fecha_desfija` date DEFAULT NULL,
  `sgd_ntrd_observaciones` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_ntrd_notifrad`
--

LOCK TABLES `sgd_ntrd_notifrad` WRITE;
/*!40000 ALTER TABLE `sgd_ntrd_notifrad` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_ntrd_notifrad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_oem_oempresas`
--

DROP TABLE IF EXISTS `sgd_oem_oempresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_oem_oempresas` (
  `sgd_oem_codigo` decimal(8,0) NOT NULL,
  `tdid_codi` decimal(2,0) DEFAULT NULL,
  `sgd_oem_oempresa` varchar(300) DEFAULT NULL,
  `sgd_oem_rep_legal` varchar(300) DEFAULT NULL,
  `sgd_oem_nit` varchar(14) DEFAULT NULL,
  `sgd_oem_sigla` varchar(1000) DEFAULT NULL,
  `muni_codi` decimal(4,0) DEFAULT NULL,
  `dpto_codi` decimal(2,0) DEFAULT NULL,
  `sgd_oem_direccion` varchar(1000) DEFAULT NULL,
  `sgd_oem_telefono` varchar(1000) DEFAULT NULL,
  `id_cont` decimal(2,0) DEFAULT '1',
  `id_pais` decimal(4,0) DEFAULT '170',
  `email` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_oem_oempresas`
--

LOCK TABLES `sgd_oem_oempresas` WRITE;
/*!40000 ALTER TABLE `sgd_oem_oempresas` DISABLE KEYS */;
INSERT INTO `sgd_oem_oempresas` VALUES (0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,170,NULL),(2,4,'POLICIA NACIONAL','DIRECCION DE TRANSITO Y TRANSPORTE','800141397','',290,25,'CALLE 13 N°18-24','5961400',1,170,NULL);
/*!40000 ALTER TABLE `sgd_oem_oempresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_panu_peranulados`
--

DROP TABLE IF EXISTS `sgd_panu_peranulados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_panu_peranulados` (
  `sgd_panu_codi` decimal(4,0) DEFAULT NULL,
  `sgd_panu_desc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_panu_peranulados`
--

LOCK TABLES `sgd_panu_peranulados` WRITE;
/*!40000 ALTER TABLE `sgd_panu_peranulados` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_panu_peranulados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_parametro`
--

DROP TABLE IF EXISTS `sgd_parametro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_parametro` (
  `param_nomb` varchar(25) NOT NULL,
  `param_codi` decimal(5,0) NOT NULL,
  `param_valor` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_parametro`
--

LOCK TABLES `sgd_parametro` WRITE;
/*!40000 ALTER TABLE `sgd_parametro` DISABLE KEYS */;
INSERT INTO `sgd_parametro` VALUES ('PRESTAMO_REQUERIMIENTO',1,'Documento'),('PRESTAMO_REQUERIMIENTO',2,'Anexo'),('PRESTAMO_REQUERIMIENTO',3,'Anexo y Documento'),('PRESTAMO_DIAS_PREST',1,'8'),('PRESTAMO_DIAS_CANC',1,'2'),('PRESTAMO_PASW',1,'1'),('PRESTAMO_ESTADO',4,'Cancelado'),('PRESTAMO_ESTADO',3,'Devuelto'),('PRESTAMO_ESTADO',2,'Prestado'),('PRESTAMO_ESTADO',1,'Solicitado'),('PRESTAMO_ESTADO',5,'Prestamo indefinido');
/*!40000 ALTER TABLE `sgd_parametro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_parexp_paramexpediente`
--

DROP TABLE IF EXISTS `sgd_parexp_paramexpediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_parexp_paramexpediente` (
  `sgd_parexp_codigo` decimal(4,0) NOT NULL,
  `depe_codi` varchar(5) NOT NULL,
  `sgd_parexp_tabla` varchar(30) NOT NULL,
  `sgd_parexp_etiqueta` varchar(20) NOT NULL,
  `sgd_parexp_orden` decimal(1,0) DEFAULT NULL,
  `sgd_parexp_editable` decimal(1,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_parexp_paramexpediente`
--

LOCK TABLES `sgd_parexp_paramexpediente` WRITE;
/*!40000 ALTER TABLE `sgd_parexp_paramexpediente` DISABLE KEYS */;
INSERT INTO `sgd_parexp_paramexpediente` VALUES (1,'100','','Nombre de Carpeta',1,1),(2,'200','','Nombre de Carpeta',1,1),(3,'300','','Nombre de Carpeta',1,1),(4,'400','','Nombre de Carpeta',1,1),(5,'500','','Nombre de Carpeta',1,1),(6,'600','','Nombre de Carpeta',1,1),(7,'700','','Nombre de Carpeta',1,1),(8,'998','','Nombre de Carpeta',1,1);
/*!40000 ALTER TABLE `sgd_parexp_paramexpediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_pen_pensionados`
--

DROP TABLE IF EXISTS `sgd_pen_pensionados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_pen_pensionados` (
  `tdid_codi` decimal(2,0) DEFAULT NULL,
  `sgd_ciu_codigo` decimal(8,0) NOT NULL,
  `sgd_ciu_nombre` varchar(150) DEFAULT NULL,
  `sgd_ciu_direccion` varchar(150) DEFAULT NULL,
  `sgd_ciu_apell1` varchar(50) DEFAULT NULL,
  `sgd_ciu_apell2` varchar(50) DEFAULT NULL,
  `sgd_ciu_telefono` varchar(50) DEFAULT NULL,
  `sgd_ciu_email` varchar(50) DEFAULT NULL,
  `muni_codi` decimal(4,0) DEFAULT NULL,
  `dpto_codi` decimal(2,0) DEFAULT NULL,
  `sgd_ciu_cedula` varchar(20) DEFAULT NULL,
  `id_cont` decimal(2,0) DEFAULT '1',
  `id_pais` decimal(4,0) DEFAULT '170'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_pen_pensionados`
--

LOCK TABLES `sgd_pen_pensionados` WRITE;
/*!40000 ALTER TABLE `sgd_pen_pensionados` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_pen_pensionados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_pexp_procexpedientes`
--

DROP TABLE IF EXISTS `sgd_pexp_procexpedientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_pexp_procexpedientes` (
  `sgd_pexp_codigo` decimal(10,0) NOT NULL,
  `sgd_pexp_descrip` varchar(100) DEFAULT NULL,
  `sgd_pexp_terminos` decimal(10,0) DEFAULT '0',
  `sgd_srd_codigo` decimal(3,0) DEFAULT NULL,
  `sgd_sbrd_codigo` decimal(3,0) DEFAULT NULL,
  `sgd_pexp_automatico` decimal(1,0) DEFAULT '1',
  `sgd_pexp_tieneflujo` decimal(1,0) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_pexp_procexpedientes`
--

LOCK TABLES `sgd_pexp_procexpedientes` WRITE;
/*!40000 ALTER TABLE `sgd_pexp_procexpedientes` DISABLE KEYS */;
INSERT INTO `sgd_pexp_procexpedientes` VALUES (0,NULL,0,NULL,NULL,1,0);
/*!40000 ALTER TABLE `sgd_pexp_procexpedientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_pnufe_procnumfe`
--

DROP TABLE IF EXISTS `sgd_pnufe_procnumfe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_pnufe_procnumfe` (
  `sgd_pnufe_codi` decimal(4,0) NOT NULL,
  `sgd_tpr_codigo` decimal(4,0) DEFAULT NULL,
  `sgd_pnufe_descrip` varchar(150) DEFAULT NULL,
  `sgd_pnufe_serie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_pnufe_procnumfe`
--

LOCK TABLES `sgd_pnufe_procnumfe` WRITE;
/*!40000 ALTER TABLE `sgd_pnufe_procnumfe` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_pnufe_procnumfe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_pnun_procenum`
--

DROP TABLE IF EXISTS `sgd_pnun_procenum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_pnun_procenum` (
  `sgd_pnun_codi` decimal(4,0) NOT NULL,
  `sgd_pnufe_codi` decimal(4,0) DEFAULT NULL,
  `depe_codi` varchar(5) DEFAULT NULL,
  `sgd_pnun_prepone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_pnun_procenum`
--

LOCK TABLES `sgd_pnun_procenum` WRITE;
/*!40000 ALTER TABLE `sgd_pnun_procenum` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_pnun_procenum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_prc_proceso`
--

DROP TABLE IF EXISTS `sgd_prc_proceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_prc_proceso` (
  `sgd_prc_codigo` decimal(4,0) NOT NULL,
  `sgd_prc_descrip` varchar(150) DEFAULT NULL,
  `sgd_prc_fech_ini` date DEFAULT NULL,
  `sgd_prc_fech_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_prc_proceso`
--

LOCK TABLES `sgd_prc_proceso` WRITE;
/*!40000 ALTER TABLE `sgd_prc_proceso` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_prc_proceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_prd_prcdmentos`
--

DROP TABLE IF EXISTS `sgd_prd_prcdmentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_prd_prcdmentos` (
  `sgd_prd_codigo` decimal(4,0) NOT NULL,
  `sgd_prd_descrip` varchar(200) DEFAULT NULL,
  `sgd_prd_fech_ini` date DEFAULT NULL,
  `sgd_prd_fech_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_prd_prcdmentos`
--

LOCK TABLES `sgd_prd_prcdmentos` WRITE;
/*!40000 ALTER TABLE `sgd_prd_prcdmentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_prd_prcdmentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_rda_retdoca`
--

DROP TABLE IF EXISTS `sgd_rda_retdoca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_rda_retdoca` (
  `anex_radi_nume` decimal(15,0) NOT NULL,
  `anex_codigo` varchar(20) NOT NULL,
  `radi_nume_salida` varchar(15) DEFAULT NULL,
  `anex_borrado` varchar(1) DEFAULT NULL,
  `sgd_mrd_codigo` decimal(4,0) NOT NULL,
  `depe_codi` varchar(5) NOT NULL,
  `usua_codi` decimal(10,0) NOT NULL,
  `usua_doc` varchar(14) NOT NULL,
  `sgd_rda_fech` date DEFAULT NULL,
  `sgd_deve_codigo` decimal(2,0) DEFAULT NULL,
  `anex_solo_lect` varchar(1) DEFAULT NULL,
  `anex_radi_fech` date DEFAULT NULL,
  `anex_estado` decimal(1,0) DEFAULT NULL,
  `anex_nomb_archivo` varchar(50) DEFAULT NULL,
  `anex_tipo` decimal(4,0) DEFAULT NULL,
  `sgd_dir_tipo` decimal(4,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_rda_retdoca`
--

LOCK TABLES `sgd_rda_retdoca` WRITE;
/*!40000 ALTER TABLE `sgd_rda_retdoca` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_rda_retdoca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_rdf_retdocf`
--

DROP TABLE IF EXISTS `sgd_rdf_retdocf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_rdf_retdocf` (
  `sgd_mrd_codigo` decimal(4,0) NOT NULL,
  `radi_nume_radi` varchar(15) NOT NULL,
  `depe_codi` varchar(5) NOT NULL,
  `usua_codi` decimal(10,0) NOT NULL,
  `usua_doc` varchar(14) NOT NULL,
  `sgd_rdf_fech` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_rdf_retdocf`
--

LOCK TABLES `sgd_rdf_retdocf` WRITE;
/*!40000 ALTER TABLE `sgd_rdf_retdocf` DISABLE KEYS */;
INSERT INTO `sgd_rdf_retdocf` VALUES (4,'20189980000012','998',1,'1234567890','2018-04-20'),(4,'20189980000062','998',1,'1234567890','2018-05-17'),(6,'20189980000072','998',1,'1234567890','2018-05-23'),(7,'20189980000021','998',1,'1234567890','2018-05-23');
/*!40000 ALTER TABLE `sgd_rdf_retdocf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_renv_regenvio`
--

DROP TABLE IF EXISTS `sgd_renv_regenvio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_renv_regenvio` (
  `sgd_renv_codigo` decimal(10,0) NOT NULL,
  `sgd_fenv_codigo` decimal(10,0) DEFAULT NULL,
  `sgd_renv_fech` datetime DEFAULT NULL,
  `radi_nume_sal` varchar(15) DEFAULT NULL,
  `sgd_renv_destino` varchar(250) DEFAULT NULL,
  `sgd_renv_telefono` varchar(250) DEFAULT NULL,
  `sgd_renv_mail` varchar(250) DEFAULT NULL,
  `sgd_renv_peso` varchar(250) DEFAULT NULL,
  `sgd_renv_valor` decimal(10,0) DEFAULT NULL,
  `sgd_renv_certificado` decimal(10,0) DEFAULT NULL,
  `sgd_renv_estado` decimal(10,0) DEFAULT NULL,
  `usua_doc` decimal(10,0) DEFAULT NULL,
  `sgd_renv_nombre` varchar(250) DEFAULT NULL,
  `sgd_rem_destino` decimal(10,0) DEFAULT '0',
  `sgd_dir_codigo` decimal(10,0) DEFAULT NULL,
  `sgd_renv_planilla` varchar(8) DEFAULT NULL,
  `sgd_renv_fech_sal` datetime DEFAULT NULL,
  `depe_codi` varchar(5) DEFAULT NULL,
  `sgd_dir_tipo` decimal(4,0) DEFAULT '0',
  `radi_nume_grupo` varchar(15) DEFAULT NULL,
  `sgd_renv_dir` varchar(100) DEFAULT NULL,
  `sgd_renv_depto` varchar(30) DEFAULT NULL,
  `sgd_renv_mpio` varchar(30) DEFAULT NULL,
  `sgd_renv_tel` varchar(20) DEFAULT NULL,
  `sgd_renv_cantidad` decimal(4,0) DEFAULT '0',
  `sgd_renv_tipo` decimal(1,0) DEFAULT '0',
  `sgd_renv_observa` varchar(200) DEFAULT NULL,
  `sgd_renv_grupo` decimal(14,0) DEFAULT NULL,
  `sgd_deve_codigo` decimal(2,0) DEFAULT NULL,
  `sgd_deve_fech` datetime DEFAULT NULL,
  `sgd_renv_valortotal` varchar(14) DEFAULT '0',
  `sgd_renv_valistamiento` varchar(10) DEFAULT '0',
  `sgd_renv_vdescuento` varchar(10) DEFAULT '0',
  `sgd_renv_vadicional` varchar(14) DEFAULT '0',
  `sgd_depe_genera` varchar(5) DEFAULT NULL,
  `sgd_renv_pais` varchar(30) DEFAULT 'colombia',
  `sgd_renv_guia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_renv_regenvio`
--

LOCK TABLES `sgd_renv_regenvio` WRITE;
/*!40000 ALTER TABLE `sgd_renv_regenvio` DISABLE KEYS */;
INSERT INTO `sgd_renv_regenvio` VALUES (1,NULL,'2018-05-23 13:00:31','20189980000021','1','','','',NULL,0,1,1234567890,'AGENCIA NACIONAL DE INFRAESTU',0,NULL,NULL,NULL,'998',1,'20189980000021','Calle 24 A # 59 - 42 Edificio','D.C.','BOGOTA',NULL,0,1,'Masiva grupo 20189980000021',NULL,NULL,NULL,'0','0','0','0','998','COLOMBIA',NULL);
/*!40000 ALTER TABLE `sgd_renv_regenvio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_renv_regenvio1`
--

DROP TABLE IF EXISTS `sgd_renv_regenvio1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_renv_regenvio1` (
  `sgd_renv_codigo` decimal(6,0) NOT NULL,
  `sgd_fenv_codigo` decimal(5,0) DEFAULT NULL,
  `sgd_renv_fech` date DEFAULT NULL,
  `radi_nume_sal` varchar(15) DEFAULT NULL,
  `sgd_renv_destino` varchar(150) DEFAULT NULL,
  `sgd_renv_telefono` varchar(50) DEFAULT NULL,
  `sgd_renv_mail` varchar(150) DEFAULT NULL,
  `sgd_renv_peso` varchar(10) DEFAULT NULL,
  `sgd_renv_valor` varchar(10) DEFAULT NULL,
  `sgd_renv_certificado` decimal(1,0) DEFAULT NULL,
  `sgd_renv_estado` decimal(1,0) DEFAULT NULL,
  `usua_doc` decimal(15,0) DEFAULT NULL,
  `sgd_renv_nombre` varchar(100) DEFAULT NULL,
  `sgd_rem_destino` decimal(1,0) DEFAULT '0',
  `sgd_dir_codigo` decimal(10,0) DEFAULT NULL,
  `sgd_renv_planilla` varchar(8) DEFAULT NULL,
  `sgd_renv_fech_sal` date DEFAULT NULL,
  `depe_codi` varchar(5) DEFAULT NULL,
  `sgd_dir_tipo` decimal(4,0) DEFAULT '0',
  `radi_nume_grupo` decimal(14,0) DEFAULT NULL,
  `sgd_renv_dir` varchar(100) DEFAULT NULL,
  `sgd_renv_depto` varchar(30) DEFAULT NULL,
  `sgd_renv_mpio` varchar(30) DEFAULT NULL,
  `sgd_renv_tel` varchar(20) DEFAULT NULL,
  `sgd_renv_cantidad` decimal(4,0) DEFAULT '0',
  `sgd_renv_tipo` decimal(1,0) DEFAULT '0',
  `sgd_renv_observa` varchar(200) DEFAULT NULL,
  `sgd_renv_grupo` decimal(14,0) DEFAULT NULL,
  `sgd_deve_codigo` decimal(2,0) DEFAULT NULL,
  `sgd_deve_fech` date DEFAULT NULL,
  `sgd_renv_valortotal` varchar(14) DEFAULT '0',
  `sgd_renv_valistamiento` varchar(10) DEFAULT '0',
  `sgd_renv_vdescuento` varchar(10) DEFAULT '0',
  `sgd_renv_vadicional` varchar(14) DEFAULT '0',
  `sgd_depe_genera` varchar(5) DEFAULT NULL,
  `sgd_renv_pais` varchar(30) DEFAULT 'colombia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_renv_regenvio1`
--

LOCK TABLES `sgd_renv_regenvio1` WRITE;
/*!40000 ALTER TABLE `sgd_renv_regenvio1` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_renv_regenvio1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_rfax_reservafax`
--

DROP TABLE IF EXISTS `sgd_rfax_reservafax`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_rfax_reservafax` (
  `sgd_rfax_codigo` decimal(10,0) DEFAULT NULL,
  `sgd_rfax_fax` varchar(30) DEFAULT NULL,
  `usua_login` varchar(30) DEFAULT NULL,
  `sgd_rfax_fech` date DEFAULT NULL,
  `sgd_rfax_fechradi` date DEFAULT NULL,
  `radi_nume_radi` varchar(15) DEFAULT NULL,
  `sgd_rfax_observa` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_rfax_reservafax`
--

LOCK TABLES `sgd_rfax_reservafax` WRITE;
/*!40000 ALTER TABLE `sgd_rfax_reservafax` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_rfax_reservafax` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_rmr_radmasivre`
--

DROP TABLE IF EXISTS `sgd_rmr_radmasivre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_rmr_radmasivre` (
  `sgd_rmr_grupo` varchar(15) NOT NULL,
  `sgd_rmr_radi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_rmr_radmasivre`
--

LOCK TABLES `sgd_rmr_radmasivre` WRITE;
/*!40000 ALTER TABLE `sgd_rmr_radmasivre` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_rmr_radmasivre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_san_sancionados`
--

DROP TABLE IF EXISTS `sgd_san_sancionados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_san_sancionados` (
  `sgd_san_ref` varchar(20) NOT NULL,
  `sgd_san_decision` varchar(60) DEFAULT NULL,
  `sgd_san_cargo` varchar(50) DEFAULT NULL,
  `sgd_san_expediente` varchar(20) DEFAULT NULL,
  `sgd_san_tipo_sancion` varchar(50) DEFAULT NULL,
  `sgd_san_plazo` varchar(100) DEFAULT NULL,
  `sgd_san_valor` decimal(14,2) DEFAULT NULL,
  `sgd_san_radicacion` varchar(15) DEFAULT NULL,
  `sgd_san_fecha_radicado` date DEFAULT NULL,
  `sgd_san_valorletras` varchar(1000) DEFAULT NULL,
  `sgd_san_nombreempresa` varchar(160) DEFAULT NULL,
  `sgd_san_motivos` varchar(160) DEFAULT NULL,
  `sgd_san_sectores` varchar(160) DEFAULT NULL,
  `sgd_san_padre` varchar(15) DEFAULT NULL,
  `sgd_san_fecha_padre` date DEFAULT NULL,
  `sgd_san_notificado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_san_sancionados`
--

LOCK TABLES `sgd_san_sancionados` WRITE;
/*!40000 ALTER TABLE `sgd_san_sancionados` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_san_sancionados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_sbrd_subserierd`
--

DROP TABLE IF EXISTS `sgd_sbrd_subserierd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_sbrd_subserierd` (
  `sgd_srd_codigo` decimal(4,0) NOT NULL,
  `sgd_sbrd_codigo` decimal(4,0) NOT NULL,
  `sgd_sbrd_descrip` varchar(500) NOT NULL,
  `sgd_sbrd_fechini` date NOT NULL,
  `sgd_sbrd_fechfin` date NOT NULL,
  `sgd_sbrd_tiemag` decimal(4,0) DEFAULT NULL,
  `sgd_sbrd_tiemac` decimal(4,0) DEFAULT NULL,
  `sgd_sbrd_dispfin` varchar(50) DEFAULT NULL,
  `sgd_sbrd_soporte` varchar(50) DEFAULT NULL,
  `sgd_sbrd_procedi` varchar(1500) DEFAULT NULL,
  `id_tabla` decimal(4,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_sbrd_subserierd`
--

LOCK TABLES `sgd_sbrd_subserierd` WRITE;
/*!40000 ALTER TABLE `sgd_sbrd_subserierd` DISABLE KEYS */;
INSERT INTO `sgd_sbrd_subserierd` VALUES (5,1,'Contratos','2018-03-15','2027-03-31',1,10,'1','Papel','Transferir al Archivo Histor una vez cumplido el periodo de retención. Se sugiere reproducción técnica por razones de preservación.',NULL),(5,2,'Calidad de Software','2018-03-15','2027-03-31',1,10,'1','Papel','Transferir al Archivo Historico una vez cumplido el periodo de retención. Se sugiere reproducción técnica por razones de preservación.',NULL),(5,3,'Control Interno','2018-03-15','2027-03-31',1,10,'1','Papel','Transferir al Archivo Histor una vez cumplido el periodo de retención. Se sugiere reproducción técnica por razones de preservación.',NULL),(4,3,'Correspondencia','2018-03-15','2027-03-31',1,10,'1','Papel','Transferir al Archivo Histor una vez cumplido el periodo de retención. Se sugiere reproducción técnica por razones de preservación.',NULL);
/*!40000 ALTER TABLE `sgd_sbrd_subserierd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_sed_sede`
--

DROP TABLE IF EXISTS `sgd_sed_sede`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_sed_sede` (
  `sgd_sed_codi` decimal(4,0) NOT NULL,
  `sgd_sed_desc` varchar(50) DEFAULT NULL,
  UNIQUE KEY `sede_codi` (`sgd_sed_codi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_sed_sede`
--

LOCK TABLES `sgd_sed_sede` WRITE;
/*!40000 ALTER TABLE `sgd_sed_sede` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_sed_sede` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_senuf_secnumfe`
--

DROP TABLE IF EXISTS `sgd_senuf_secnumfe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_senuf_secnumfe` (
  `sgd_senuf_codi` decimal(4,0) NOT NULL,
  `sgd_pnufe_codi` decimal(4,0) DEFAULT NULL,
  `depe_codi` varchar(5) DEFAULT NULL,
  `sgd_senuf_sec` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_senuf_secnumfe`
--

LOCK TABLES `sgd_senuf_secnumfe` WRITE;
/*!40000 ALTER TABLE `sgd_senuf_secnumfe` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_senuf_secnumfe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_sexp_secexpedientes`
--

DROP TABLE IF EXISTS `sgd_sexp_secexpedientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_sexp_secexpedientes` (
  `sgd_exp_numero` varchar(18) NOT NULL,
  `sgd_srd_codigo` decimal(10,0) DEFAULT NULL,
  `sgd_sbrd_codigo` decimal(10,0) DEFAULT NULL,
  `sgd_sexp_secuencia` decimal(10,0) DEFAULT NULL,
  `depe_codi` varchar(5) DEFAULT NULL,
  `usua_doc` varchar(15) DEFAULT NULL,
  `sgd_sexp_fech` date DEFAULT NULL,
  `sgd_fexp_codigo` decimal(10,0) DEFAULT NULL,
  `sgd_sexp_ano` decimal(10,0) DEFAULT NULL,
  `usua_doc_responsable` varchar(18) DEFAULT NULL,
  `sgd_sexp_parexp1` varchar(250) DEFAULT NULL,
  `sgd_sexp_parexp2` varchar(160) DEFAULT NULL,
  `sgd_sexp_parexp3` varchar(160) DEFAULT NULL,
  `sgd_sexp_parexp4` varchar(160) DEFAULT NULL,
  `sgd_sexp_parexp5` varchar(160) DEFAULT NULL,
  `sgd_pexp_codigo` decimal(3,0) DEFAULT NULL,
  `sgd_exp_fech_arch` date DEFAULT NULL,
  `sgd_fld_codigo` decimal(3,0) DEFAULT NULL,
  `sgd_exp_fechflujoant` date DEFAULT NULL,
  `sgd_mrd_codigo` decimal(4,0) DEFAULT NULL,
  `sgd_exp_subexpediente` decimal(18,0) DEFAULT NULL,
  `sgd_exp_privado` decimal(1,0) DEFAULT NULL,
  `sgd_sexp_estado` decimal(1,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_sexp_secexpedientes`
--

LOCK TABLES `sgd_sexp_secexpedientes` WRITE;
/*!40000 ALTER TABLE `sgd_sexp_secexpedientes` DISABLE KEYS */;
INSERT INTO `sgd_sexp_secexpedientes` VALUES ('2018998040300001E',4,3,1,'998','1234567890','2018-05-23',0,2018,'1234567890','Acciones de expediente',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `sgd_sexp_secexpedientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_srd_seriesrd`
--

DROP TABLE IF EXISTS `sgd_srd_seriesrd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_srd_seriesrd` (
  `sgd_srd_codigo` decimal(4,0) NOT NULL,
  `sgd_srd_descrip` varchar(60) NOT NULL,
  `sgd_srd_fechini` date NOT NULL,
  `sgd_srd_fechfin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_srd_seriesrd`
--

LOCK TABLES `sgd_srd_seriesrd` WRITE;
/*!40000 ALTER TABLE `sgd_srd_seriesrd` DISABLE KEYS */;
INSERT INTO `sgd_srd_seriesrd` VALUES (1,'ACTAS','2017-12-19','2050-12-31'),(2,'CERTIFICACIONES','2017-12-19','2050-12-31'),(3,'COMUNICACIONES','2017-12-19','2050-12-31'),(4,'CORRESPONDENCIA','2017-12-19','2050-12-31'),(5,'CONTROL INTERNO','2017-12-19','2050-12-31'),(6,'INFORMES','2017-12-19','2050-12-31');
/*!40000 ALTER TABLE `sgd_srd_seriesrd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_tar_tarifas`
--

DROP TABLE IF EXISTS `sgd_tar_tarifas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_tar_tarifas` (
  `sgd_fenv_codigo` decimal(5,0) DEFAULT NULL,
  `sgd_tar_codser` decimal(5,0) DEFAULT NULL,
  `sgd_tar_codigo` decimal(5,0) DEFAULT NULL,
  `sgd_tar_valenv1` decimal(15,0) DEFAULT NULL,
  `sgd_tar_valenv2` decimal(15,0) DEFAULT NULL,
  `sgd_tar_valenv1g1` decimal(15,0) DEFAULT NULL,
  `sgd_clta_codser` decimal(5,0) DEFAULT NULL,
  `sgd_tar_valenv2g2` decimal(15,0) DEFAULT NULL,
  `sgd_clta_descrip` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_tar_tarifas`
--

LOCK TABLES `sgd_tar_tarifas` WRITE;
/*!40000 ALTER TABLE `sgd_tar_tarifas` DISABLE KEYS */;
INSERT INTO `sgd_tar_tarifas` VALUES (1,NULL,3,4300,4300,0,1,0,NULL),(1,NULL,4,1900,1900,0,1,0,NULL),(1,NULL,6,9200,9200,0,1,0,NULL),(1,NULL,7,2500,2500,0,1,0,NULL),(1,NULL,2,5700,5700,0,1,0,NULL),(1,NULL,1,3600,3600,0,1,0,NULL),(1,NULL,5,1,1,0,1,0,NULL),(2,NULL,1,1900,4900,0,1,0,NULL);
/*!40000 ALTER TABLE `sgd_tar_tarifas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_tdec_tipodecision`
--

DROP TABLE IF EXISTS `sgd_tdec_tipodecision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_tdec_tipodecision` (
  `sgd_apli_codi` decimal(4,0) NOT NULL,
  `sgd_tdec_codigo` decimal(4,0) NOT NULL,
  `sgd_tdec_descrip` varchar(150) DEFAULT NULL,
  `sgd_tdec_sancionar` decimal(1,0) DEFAULT NULL,
  `sgd_tdec_firmeza` decimal(1,0) DEFAULT NULL,
  `sgd_tdec_versancion` decimal(1,0) DEFAULT NULL,
  `sgd_tdec_showmenu` decimal(1,0) DEFAULT NULL,
  `sgd_tdec_updnotif` decimal(1,0) DEFAULT NULL,
  `sgd_tdec_veragota` decimal(1,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_tdec_tipodecision`
--

LOCK TABLES `sgd_tdec_tipodecision` WRITE;
/*!40000 ALTER TABLE `sgd_tdec_tipodecision` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_tdec_tipodecision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_tid_tipdecision`
--

DROP TABLE IF EXISTS `sgd_tid_tipdecision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_tid_tipdecision` (
  `sgd_tid_codi` decimal(4,0) NOT NULL,
  `sgd_tid_desc` varchar(150) DEFAULT NULL,
  `sgd_tpr_codigo` decimal(4,0) DEFAULT NULL,
  `sgd_pexp_codigo` decimal(2,0) DEFAULT NULL,
  `sgd_tpr_codigop` decimal(2,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_tid_tipdecision`
--

LOCK TABLES `sgd_tid_tipdecision` WRITE;
/*!40000 ALTER TABLE `sgd_tid_tipdecision` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_tid_tipdecision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_tidm_tidocmasiva`
--

DROP TABLE IF EXISTS `sgd_tidm_tidocmasiva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_tidm_tidocmasiva` (
  `sgd_tidm_codi` decimal(4,0) NOT NULL,
  `sgd_tidm_desc` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_tidm_tidocmasiva`
--

LOCK TABLES `sgd_tidm_tidocmasiva` WRITE;
/*!40000 ALTER TABLE `sgd_tidm_tidocmasiva` DISABLE KEYS */;
INSERT INTO `sgd_tidm_tidocmasiva` VALUES (1,'PLANTILLA'),(2,'CSV');
/*!40000 ALTER TABLE `sgd_tidm_tidocmasiva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_tip3_tipotercero`
--

DROP TABLE IF EXISTS `sgd_tip3_tipotercero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_tip3_tipotercero` (
  `sgd_tip3_codigo` decimal(2,0) NOT NULL,
  `sgd_dir_tipo` decimal(4,0) DEFAULT NULL,
  `sgd_tip3_nombre` varchar(15) DEFAULT NULL,
  `sgd_tip3_desc` varchar(30) DEFAULT NULL,
  `sgd_tip3_imgpestana` varchar(20) DEFAULT NULL,
  `sgd_tpr_tp1` decimal(1,0) DEFAULT '0',
  `sgd_tpr_tp2` decimal(1,0) DEFAULT '0',
  `sgd_tpr_tp4` smallint(6) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_tip3_tipotercero`
--

LOCK TABLES `sgd_tip3_tipotercero` WRITE;
/*!40000 ALTER TABLE `sgd_tip3_tipotercero` DISABLE KEYS */;
INSERT INTO `sgd_tip3_tipotercero` VALUES (2,1,'DESTINATARIO','DESTINATARIO','tip3destina.jpg',1,0,0),(3,2,'EMPRESAS','EMPRESAS','tip3predio.jpg',1,1,1),(4,3,'ENTIDADES','ENTIDADES ESTATALES','tip3ent.jpg',1,1,1),(1,1,'REMITENTE','REMITENTE','tip3remitente.jpg',0,1,1);
/*!40000 ALTER TABLE `sgd_tip3_tipotercero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_tma_temas`
--

DROP TABLE IF EXISTS `sgd_tma_temas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_tma_temas` (
  `sgd_tma_codigo` decimal(4,0) NOT NULL,
  `depe_codi` varchar(5) DEFAULT NULL,
  `sgd_prc_codigo` decimal(4,0) DEFAULT NULL,
  `sgd_tma_descrip` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_tma_temas`
--

LOCK TABLES `sgd_tma_temas` WRITE;
/*!40000 ALTER TABLE `sgd_tma_temas` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_tma_temas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_tme_tipmen`
--

DROP TABLE IF EXISTS `sgd_tme_tipmen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_tme_tipmen` (
  `sgd_tme_codi` decimal(3,0) NOT NULL,
  `sgd_tme_desc` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_tme_tipmen`
--

LOCK TABLES `sgd_tme_tipmen` WRITE;
/*!40000 ALTER TABLE `sgd_tme_tipmen` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_tme_tipmen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_tpr_tpdcumento`
--

DROP TABLE IF EXISTS `sgd_tpr_tpdcumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_tpr_tpdcumento` (
  `sgd_tpr_codigo` decimal(4,0) NOT NULL,
  `sgd_tpr_descrip` varchar(500) DEFAULT NULL,
  `sgd_tpr_termino` decimal(4,0) DEFAULT NULL,
  `sgd_tpr_tpuso` decimal(1,0) DEFAULT NULL,
  `sgd_tpr_numera` char(1) DEFAULT NULL,
  `sgd_tpr_radica` char(1) DEFAULT NULL,
  `sgd_tpr_tp1` decimal(1,0) DEFAULT '0',
  `sgd_tpr_tp2` decimal(1,0) DEFAULT '0',
  `sgd_tpr_estado` decimal(1,0) DEFAULT NULL,
  `sgd_termino_real` decimal(4,0) DEFAULT NULL,
  `sgd_tpr_web` smallint(6) DEFAULT '1',
  `sgd_tpr_tiptermino` varchar(5) DEFAULT NULL,
  `sgd_tpr_tp4` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_tpr_tpdcumento`
--

LOCK TABLES `sgd_tpr_tpdcumento` WRITE;
/*!40000 ALTER TABLE `sgd_tpr_tpdcumento` DISABLE KEYS */;
INSERT INTO `sgd_tpr_tpdcumento` VALUES (0,'No Definido',0,1,'','1',1,1,1,0,1,NULL,1),(1,'Aceptacion de renuncia',15,NULL,NULL,'1',1,1,1,NULL,1,NULL,0),(2,'Acta',15,NULL,NULL,'0',1,1,1,NULL,1,NULL,0),(3,'Acta de entrega',15,NULL,NULL,'0',1,1,1,NULL,1,NULL,0),(4,'Adicion de contrato',15,NULL,NULL,'1',1,1,1,NULL,1,NULL,1),(5,'Afiliacion seguridad social',15,NULL,NULL,'1',1,1,1,NULL,1,NULL,0),(6,'Anexos',15,NULL,NULL,'0',0,0,1,NULL,1,NULL,0),(7,'Certificaciones laborales',15,NULL,NULL,'0',1,1,1,NULL,1,NULL,1),(8,'Certificacion Mensual',15,NULL,NULL,'1',1,1,NULL,NULL,1,NULL,0),(9,'Contrato',15,NULL,NULL,'1',1,1,1,NULL,1,NULL,0),(10,'Contratos de clientes',15,NULL,NULL,'1',1,1,1,NULL,1,NULL,0),(11,'Convocatoria',15,NULL,NULL,'1',1,1,1,NULL,1,NULL,0),(12,'Demanda',15,NULL,NULL,'1',1,1,1,NULL,1,NULL,0),(13,'Derechos de peticion',15,NULL,NULL,'1',1,1,1,NULL,1,NULL,0),(14,'Formato de calidad de Software',15,NULL,NULL,'1',1,1,1,NULL,1,NULL,0),(15,'Solicitud',15,NULL,NULL,'0',1,1,1,NULL,1,NULL,0),(16,'Otro si',15,NULL,NULL,'0',1,1,1,NULL,1,NULL,0),(17,'Permisos',15,NULL,NULL,'0',1,1,1,NULL,1,NULL,0),(18,'Vacaciones',15,NULL,NULL,'0',1,1,1,NULL,1,NULL,0);
/*!40000 ALTER TABLE `sgd_tpr_tpdcumento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_trad_tiporad`
--

DROP TABLE IF EXISTS `sgd_trad_tiporad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_trad_tiporad` (
  `sgd_trad_codigo` decimal(2,0) NOT NULL,
  `sgd_trad_descr` varchar(30) DEFAULT NULL,
  `sgd_trad_icono` varchar(30) DEFAULT NULL,
  `sgd_trad_diasbloqueo` decimal(2,0) DEFAULT NULL,
  `sgd_trad_genradsal` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`sgd_trad_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_trad_tiporad`
--

LOCK TABLES `sgd_trad_tiporad` WRITE;
/*!40000 ALTER TABLE `sgd_trad_tiporad` DISABLE KEYS */;
INSERT INTO `sgd_trad_tiporad` VALUES (1,'Salida',NULL,NULL,1),(2,'Entrada',NULL,NULL,1),(4,'PQRS',NULL,NULL,1);
/*!40000 ALTER TABLE `sgd_trad_tiporad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_ttr_transaccion`
--

DROP TABLE IF EXISTS `sgd_ttr_transaccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_ttr_transaccion` (
  `sgd_ttr_codigo` decimal(3,0) NOT NULL,
  `sgd_ttr_descrip` varchar(100) NOT NULL,
  PRIMARY KEY (`sgd_ttr_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_ttr_transaccion`
--

LOCK TABLES `sgd_ttr_transaccion` WRITE;
/*!40000 ALTER TABLE `sgd_ttr_transaccion` DISABLE KEYS */;
INSERT INTO `sgd_ttr_transaccion` VALUES (0,'--'),(1,'Recuperacion Radicado'),(2,'Radicacion'),(7,'Borrar Informado'),(8,'Informar'),(9,'Reasignacion'),(10,'Movimiento entre Carpetas'),(11,'Modificacion Radicado'),(12,'Devuelto-Reasignar'),(13,'Archivar'),(14,'Agendar'),(15,'Sacar de la agenda'),(16,'Reasignar para Vo.Bo.'),(17,'Modificacion de Causal'),(18,'Modificacion del Sector'),(19,'Cambiar Tipo de Documento'),(20,'Crear Registro'),(21,'Editar Registro'),(22,'Digitalizacion de Radicado'),(23,'Digitalizacion - Modificacion'),(24,'Asociacion Imagen fax'),(25,'Solicitud de Anulacion'),(26,'Anulacion Rad'),(27,'Rechazo de Anulacion'),(28,'Devolucion de correo'),(29,'Digitalizacion de Anexo'),(30,'Radicacion Masiva'),(31,'Borrado de Anexo a radicado'),(32,'Asignacion TRD'),(33,'Eliminar TRD'),(35,'Tipificacion de la decision'),(36,'Cambio en la Notificacion'),(37,'Cambio de Estado del Documento'),(38,'Cambio Vinculacion Documento'),(39,'Solicitud de Firma'),(40,'Firma Digital de Documento'),(41,'Eliminacion solicitud de Firma Digital'),(42,'Digitalizacion Radicado(Asoc. Imagen Web)'),(50,'Cambio de Estado Expediente'),(51,'Creacion Expediente'),(52,'Excluir radicado de expediente'),(53,'Incluir radicado en expediente'),(54,'Cambio Seguridad del Documento'),(55,'Creación Subexpediente'),(56,'Cambio de Responsable'),(57,'Ingreso al Archivo Fisico'),(58,'Expediente Cerrado'),(59,'Expediente Reabierto'),(61,'Asignar TRD Multiple'),(62,'Insercion Expediente Multiple'),(65,'Archivado NRR');
/*!40000 ALTER TABLE `sgd_ttr_transaccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_tvd_dependencia`
--

DROP TABLE IF EXISTS `sgd_tvd_dependencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_tvd_dependencia` (
  `sgd_depe_codi` varchar(5) NOT NULL,
  `sgd_depe_nombre` varchar(200) NOT NULL,
  `sgd_depe_fechini` date NOT NULL,
  `sgd_depe_fechfin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_tvd_dependencia`
--

LOCK TABLES `sgd_tvd_dependencia` WRITE;
/*!40000 ALTER TABLE `sgd_tvd_dependencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_tvd_dependencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_tvd_series`
--

DROP TABLE IF EXISTS `sgd_tvd_series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_tvd_series` (
  `sgd_depe_codi` varchar(5) NOT NULL,
  `sgd_stvd_codi` decimal(4,0) NOT NULL,
  `sgd_stvd_nombre` varchar(200) NOT NULL,
  `sgd_stvd_ac` decimal(4,0) DEFAULT NULL,
  `sgd_stvd_dispfin` decimal(2,0) DEFAULT NULL,
  `sgd_stvd_proc` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_tvd_series`
--

LOCK TABLES `sgd_tvd_series` WRITE;
/*!40000 ALTER TABLE `sgd_tvd_series` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_tvd_series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_ush_usuhistorico`
--

DROP TABLE IF EXISTS `sgd_ush_usuhistorico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_ush_usuhistorico` (
  `sgd_ush_admcod` decimal(10,0) NOT NULL,
  `sgd_ush_admdep` varchar(5) NOT NULL,
  `sgd_ush_admdoc` varchar(14) NOT NULL,
  `sgd_ush_usucod` decimal(10,0) NOT NULL,
  `sgd_ush_usudep` varchar(5) NOT NULL,
  `sgd_ush_usudoc` varchar(14) NOT NULL,
  `sgd_ush_modcod` decimal(5,0) NOT NULL,
  `sgd_ush_fechevento` date NOT NULL,
  `sgd_ush_usulogin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_ush_usuhistorico`
--

LOCK TABLES `sgd_ush_usuhistorico` WRITE;
/*!40000 ALTER TABLE `sgd_ush_usuhistorico` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgd_ush_usuhistorico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgd_usm_usumodifica`
--

DROP TABLE IF EXISTS `sgd_usm_usumodifica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgd_usm_usumodifica` (
  `sgd_usm_modcod` decimal(5,0) NOT NULL,
  `sgd_usm_moddescr` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgd_usm_usumodifica`
--

LOCK TABLES `sgd_usm_usumodifica` WRITE;
/*!40000 ALTER TABLE `sgd_usm_usumodifica` DISABLE KEYS */;
INSERT INTO `sgd_usm_usumodifica` VALUES (47,'Quito permiso impresion'),(43,'Otorgo permiso prestamo de documentos'),(44,'Quito permiso prestamo de documentos'),(45,'Otorgo permiso digitalizacion de documentos'),(46,'Quito permiso digitalizacion de documentos'),(48,'Otorgo permiso modificaciones'),(49,'Quito permiso modificaciones'),(50,'Cambio de perfil'),(1,'Creacion de usuario'),(51,'Otorgo permiso tablas retencion documental'),(52,'Quito permiso tablas retencion documental'),(3,'Cambio dependencia'),(4,'Cambio cedula'),(5,'Cambio nombre'),(7,'Cambio ubicacion'),(8,'Cambio piso'),(9,'Cambio estado'),(10,'Otorgo permiso radicacion entrada'),(11,'Otorgo permisos radicacion de entrada'),(12,'Quito permiso administracion sistema'),(13,'Otorgo permiso administracion sistema'),(14,'Quito permiso administracion archivo'),(15,'Otorgo permiso administracion archivo'),(16,'Habilitado como usuario nuevo'),(17,'Habilitado como usuario antiguo con clave'),(18,'Cambio nivel'),(19,'Otorgo permiso radicacion salida'),(20,'Otorgo permiso impresion'),(21,'Otorgo permiso radicacion masiva'),(22,'Quito permiso radicacion masiva'),(23,'Quito permiso devoluciones de correo'),(24,'Otorgo permiso devoluciones de correo'),(25,'Otorgo permiso de solicitud de anulacion'),(26,'Otorgo permiso de anulacion'),(27,'Otorgo permiso de solicitud de anulacion y anulacion'),(28,'Quito permiso radicacion memorandos'),(29,'Otorgo permiso radicacion memorandos'),(30,'Quito permiso radicacion resoluciones'),(31,'Otorgo permiso radicacion resoluciones'),(33,'Quito permiso envio de correo'),(34,'Otorgo permiso envio de correo'),(35,'Otorgo permiso radicacion de salida '),(39,'Cambio extension'),(40,'Cambio email'),(41,'Quito permisos radicacion entrada'),(42,'Quito permisos de solicitud de anulacion y anulaciones');
/*!40000 ALTER TABLE `sgd_usm_usumodifica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_doc_identificacion`
--

DROP TABLE IF EXISTS `tipo_doc_identificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_doc_identificacion` (
  `tdid_codi` decimal(2,0) NOT NULL,
  `tdid_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_doc_identificacion`
--

LOCK TABLES `tipo_doc_identificacion` WRITE;
/*!40000 ALTER TABLE `tipo_doc_identificacion` DISABLE KEYS */;
INSERT INTO `tipo_doc_identificacion` VALUES (0,'Cedula de Ciudadania'),(1,'Tarjeta de Identidad'),(2,'Cedula de Extranjería'),(3,'Pasaporte'),(4,'Nit'),(5,'NUIR');
/*!40000 ALTER TABLE `tipo_doc_identificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_remitente`
--

DROP TABLE IF EXISTS `tipo_remitente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_remitente` (
  `trte_codi` decimal(2,0) NOT NULL,
  `trte_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_remitente`
--

LOCK TABLES `tipo_remitente` WRITE;
/*!40000 ALTER TABLE `tipo_remitente` DISABLE KEYS */;
INSERT INTO `tipo_remitente` VALUES (0,'Entidades'),(1,'Otras empresas'),(2,'Persona natural'),(3,'Predio'),(5,'Otros'),(6,'Funcionario');
/*!40000 ALTER TABLE `tipo_remitente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubicacion_fisica`
--

DROP TABLE IF EXISTS `ubicacion_fisica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubicacion_fisica` (
  `ubic_depe_radi` varchar(5) DEFAULT NULL,
  `ubic_depe_arch` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicacion_fisica`
--

LOCK TABLES `ubicacion_fisica` WRITE;
/*!40000 ALTER TABLE `ubicacion_fisica` DISABLE KEYS */;
/*!40000 ALTER TABLE `ubicacion_fisica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `usua_codi` decimal(10,0) NOT NULL,
  `depe_codi` varchar(5) NOT NULL,
  `usua_login` varchar(50) NOT NULL,
  `usua_fech_crea` date DEFAULT NULL,
  `usua_pasw` varchar(35) NOT NULL,
  `usua_esta` varchar(10) NOT NULL,
  `usua_nomb` varchar(45) DEFAULT NULL,
  `perm_radi` char(1) DEFAULT '0',
  `usua_admin` char(1) DEFAULT '0',
  `usua_nuevo` char(1) DEFAULT '0',
  `usua_doc` varchar(14) DEFAULT '0',
  `codi_nivel` decimal(2,0) DEFAULT '1',
  `usua_sesion` varchar(30) DEFAULT NULL,
  `usua_fech_sesion` date DEFAULT NULL,
  `usua_ext` decimal(4,0) DEFAULT NULL,
  `usua_nacim` date DEFAULT NULL,
  `usua_email` varchar(50) DEFAULT NULL,
  `usua_at` varchar(50) DEFAULT NULL,
  `usua_piso` decimal(2,0) DEFAULT NULL,
  `perm_radi_sal` decimal(10,0) DEFAULT '0',
  `usua_admin_archivo` decimal(1,0) DEFAULT '0',
  `usua_masiva` decimal(1,0) DEFAULT '0',
  `usua_perm_dev` decimal(1,0) DEFAULT '0',
  `usua_perm_numera_res` varchar(1) DEFAULT NULL,
  `usua_doc_suip` varchar(15) DEFAULT NULL,
  `usua_perm_numeradoc` decimal(1,0) DEFAULT NULL,
  `sgd_panu_codi` decimal(4,0) DEFAULT NULL,
  `usua_prad_tp1` decimal(1,0) DEFAULT '0',
  `usua_prad_tp2` decimal(1,0) DEFAULT '0',
  `usua_perm_envios` decimal(1,0) DEFAULT '0',
  `usua_perm_modifica` decimal(1,0) DEFAULT '0',
  `usua_perm_impresion` decimal(1,0) DEFAULT '0',
  `sgd_aper_codigo` decimal(2,0) DEFAULT NULL,
  `usu_telefono1` varchar(14) DEFAULT NULL,
  `usua_encuesta` varchar(1) DEFAULT NULL,
  `sgd_perm_estadistica` decimal(2,0) DEFAULT NULL,
  `usua_perm_sancionados` decimal(1,0) DEFAULT NULL,
  `usua_admin_sistema` decimal(1,0) DEFAULT NULL,
  `usua_perm_trd` decimal(1,0) DEFAULT NULL,
  `usua_perm_firma` decimal(1,0) DEFAULT NULL,
  `usua_perm_prestamo` decimal(1,0) DEFAULT NULL,
  `usuario_publico` decimal(1,0) DEFAULT NULL,
  `usuario_reasignar` decimal(1,0) DEFAULT NULL,
  `usua_perm_notifica` decimal(1,0) DEFAULT NULL,
  `usua_perm_expediente` decimal(10,0) DEFAULT NULL,
  `usua_login_externo` varchar(15) DEFAULT NULL,
  `id_pais` decimal(4,0) DEFAULT '170',
  `id_cont` decimal(2,0) DEFAULT '1',
  `usua_auth_ldap` decimal(1,0) DEFAULT '0',
  `perm_archi` char(1) DEFAULT '1',
  `perm_vobo` char(1) DEFAULT '1',
  `perm_borrar_anexo` decimal(1,0) DEFAULT NULL,
  `perm_tipif_anexo` decimal(1,0) DEFAULT NULL,
  `usua_perm_adminflujos` decimal(1,0) NOT NULL DEFAULT '0',
  `usua_exp_trd` decimal(2,0) DEFAULT '0',
  `usua_perm_rademail` smallint(6) DEFAULT NULL,
  `usua_perm_accesi` decimal(1,0) DEFAULT '0',
  `usua_perm_agrcontacto` decimal(1,0) DEFAULT '0',
  `usua_prad_tp4` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'998','ADMON','2017-12-15','1232f297a57a5a743894a0e4a8','1','Usuario Administrador','1','1','1','1234567890',5,'180523122147o1921688113ADMON','2018-05-23',NULL,NULL,'pruebas@skinatech.com',NULL,NULL,NULL,2,1,1,NULL,'',1,3,3,3,1,1,2,NULL,NULL,NULL,2,NULL,1,2,0,1,1,1,0,2,NULL,170,1,0,'1','1',1,1,0,0,0,0,1,3);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-24 15:06:22
