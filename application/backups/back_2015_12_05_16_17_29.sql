-- MySQL dump 10.13  Distrib 5.5.24, for Win64 (x86)
--
-- Host: localhost    Database: bd_sisacademico
-- ------------------------------------------------------
-- Server version	5.5.24-log

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
-- Table structure for table `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asistencia` (
  `asi_id` int(11) NOT NULL AUTO_INCREMENT,
  `asi_fecha` varchar(45) NOT NULL,
  `asi_obs` varchar(45) DEFAULT NULL,
  `asi_idest` int(11) NOT NULL,
  `asi_idfal` int(11) NOT NULL,
  `materia_idmateria` int(11) NOT NULL,
  PRIMARY KEY (`asi_id`),
  KEY `asi_idfal_idx` (`asi_idfal`),
  KEY `fk_asistencia_materia1_idx` (`materia_idmateria`),
  KEY `asi_idest` (`asi_idest`),
  CONSTRAINT `asi_idest` FOREIGN KEY (`asi_idest`) REFERENCES `estudiante` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `asi_idfal` FOREIGN KEY (`asi_idfal`) REFERENCES `par_tipo_falta` (`ptf_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_asistencia_materia1` FOREIGN KEY (`materia_idmateria`) REFERENCES `materia` (`mat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia`
--

LOCK TABLES `asistencia` WRITE;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
INSERT INTO `asistencia` (`asi_id`, `asi_fecha`, `asi_obs`, `asi_idest`, `asi_idfal`, `materia_idmateria`) VALUES (1,'10/11/2015',NULL,2,1,2),(2,'11/11/2015',NULL,2,3,2),(3,'15/11/2015',NULL,1,3,1);
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `cur_id` int(11) NOT NULL,
  `cur_sigla` varchar(45) NOT NULL,
  `cur_descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`cur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` (`cur_id`, `cur_sigla`, `cur_descripcion`) VALUES (1,'PRI-SEC','PRIMERO DE SECUNDARIA'),(2,'SEG-SEC','SEGUNDO DE SECUANDARIA'),(3,'TER-SEC','TERCERO DE SECUNDARIA'),(4,'CUA-SEC','CUARTO DE SECUNDARIA');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `est_id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`est_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`est_id`, `codigo`, `descripcion`) VALUES (1,'A','ACTIVO'),(2,'I','INACTIVO');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante` (
  `est_id` int(11) NOT NULL,
  `est_nombre` varchar(45) NOT NULL,
  `est_paterno` varchar(45) NOT NULL,
  `est_materno` varchar(45) DEFAULT NULL,
  `est_ci` varchar(45) NOT NULL,
  `est_direccion` varchar(100) DEFAULT NULL,
  `est_email` varchar(45) DEFAULT NULL,
  `est_telefono` varchar(45) DEFAULT NULL,
  `est_movil` varchar(45) DEFAULT NULL,
  `est_fechanac` date NOT NULL,
  `est_login` varchar(45) NOT NULL,
  `est_password` varchar(45) NOT NULL,
  `est_rude` varchar(45) NOT NULL,
  `est_fotoadj` blob,
  `est_fechareg` date NOT NULL,
  `par_expedido_id` int(11) NOT NULL,
  `par_genero_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `curso_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`est_id`),
  KEY `fk_estudiante_par_expedido1_idx` (`par_expedido_id`),
  KEY `fk_estudiante_par_genero1_idx` (`par_genero_id`),
  KEY `fk_estudiante_rol1_idx` (`rol_id`),
  KEY `fk_estudiante_estado1_idx` (`estado_id`),
  KEY `fk_estudiante_curso1_idx` (`curso_id`),
  CONSTRAINT `fk_estudiante_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`cur_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_par_expedido1` FOREIGN KEY (`par_expedido_id`) REFERENCES `par_expedido` (`uexp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_par_genero1` FOREIGN KEY (`par_genero_id`) REFERENCES `par_genero` (`ugn_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_rol1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` (`est_id`, `est_nombre`, `est_paterno`, `est_materno`, `est_ci`, `est_direccion`, `est_email`, `est_telefono`, `est_movil`, `est_fechanac`, `est_login`, `est_password`, `est_rude`, `est_fotoadj`, `est_fechareg`, `par_expedido_id`, `par_genero_id`, `rol_id`, `estado_id`, `curso_id`) VALUES (1,'JUAN','PEREZ','LOZA','5784574','MIRAFLORES NRO 123','juan@gmail.com',NULL,NULL,'0000-00-00','juan','juan','45679865',NULL,'0000-00-00',1,2,3,1,2),(2,'MARIA','GOMEZ','PERALES','6852145','ACHACHICALA NRO 525','maria@gmai.com',NULL,NULL,'0000-00-00','maria','maria','89652347',NULL,'0000-00-00',1,1,3,1,1),(3,'PEDRO','FLORES','MOLINA','4858547','AV ARCE NRO 456','pedro@gmail.com','2457585',NULL,'0000-00-00','pedro','pedro','85858585',NULL,'0000-00-00',1,2,3,1,3),(4,'Carlos','Camargo','Ticona','6789098','sopocachi','car@hotmail.com','2345678','7897643','2015-12-17','ccamargo','1234','345689528',NULL,'1990-12-17',1,2,3,1,1);
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia` (
  `mat_id` int(11) NOT NULL,
  `mat_gestion` varchar(45) DEFAULT NULL,
  `mat_sigla` varchar(45) NOT NULL,
  `mat_descripcion` varchar(100) NOT NULL,
  `mat_hora` varchar(45) DEFAULT NULL,
  `dia_id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL,
  PRIMARY KEY (`mat_id`),
  KEY `fk_materia_profesor1_idx` (`profesor_id`),
  KEY `fk_materia_par_dia1_idx` (`dia_id`),
  CONSTRAINT `fk_materia_par_dia1` FOREIGN KEY (`dia_id`) REFERENCES `par_dia` (`dia_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_materia_profesor1` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` (`mat_id`, `mat_gestion`, `mat_sigla`, `mat_descripcion`, `mat_hora`, `dia_id`, `profesor_id`) VALUES (1,'2015','MAT','MATEMATICAS','08:00',1,1),(2,'2015','SOC','SOCIALES','09:00',1,2),(3,'2015','FIS','FISICA','10:00',1,1);
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota`
--

DROP TABLE IF EXISTS `nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota` (
  `not_id` int(11) NOT NULL,
  `not_gestion` int(11) NOT NULL,
  `not_1` int(11) DEFAULT NULL,
  `not_2` int(11) DEFAULT NULL,
  `not_3` int(11) DEFAULT NULL,
  `not_4` int(11) DEFAULT NULL,
  `est_id` int(11) NOT NULL,
  `mat_id` int(11) NOT NULL,
  PRIMARY KEY (`not_id`),
  KEY `fk_nota_estudiante_id1_idx` (`est_id`),
  KEY `fk_nota_materia_id1_idx` (`mat_id`),
  CONSTRAINT `fk_nota_estudiante_id1` FOREIGN KEY (`est_id`) REFERENCES `estudiante` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_nota_materia_id1` FOREIGN KEY (`mat_id`) REFERENCES `materia` (`mat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota`
--

LOCK TABLES `nota` WRITE;
/*!40000 ALTER TABLE `nota` DISABLE KEYS */;
INSERT INTO `nota` (`not_id`, `not_gestion`, `not_1`, `not_2`, `not_3`, `not_4`, `est_id`, `mat_id`) VALUES (1,2015,58,64,54,89,1,1),(2,2015,78,45,98,57,2,3),(3,2015,45,78,97,45,1,2);
/*!40000 ALTER TABLE `nota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `par_dia`
--

DROP TABLE IF EXISTS `par_dia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `par_dia` (
  `dia_id` int(11) NOT NULL,
  `dia_codigo` varchar(45) NOT NULL,
  `dia_descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`dia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `par_dia`
--

LOCK TABLES `par_dia` WRITE;
/*!40000 ALTER TABLE `par_dia` DISABLE KEYS */;
INSERT INTO `par_dia` (`dia_id`, `dia_codigo`, `dia_descripcion`) VALUES (1,'LUN','LUNES'),(2,'MAR','MARTES'),(3,'MIER','MIERCOLES'),(4,'JUE','JUEVES'),(5,'VIE','VIERNES'),(6,'SAB','SABADO'),(7,'DOM','DOMINGO');
/*!40000 ALTER TABLE `par_dia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `par_expedido`
--

DROP TABLE IF EXISTS `par_expedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `par_expedido` (
  `uexp_id` int(11) NOT NULL,
  `uexp_codigo` varchar(5) DEFAULT NULL,
  `uexp_denominacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`uexp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `par_expedido`
--

LOCK TABLES `par_expedido` WRITE;
/*!40000 ALTER TABLE `par_expedido` DISABLE KEYS */;
INSERT INTO `par_expedido` (`uexp_id`, `uexp_codigo`, `uexp_denominacion`) VALUES (1,'LP','LA PAZ'),(2,'OR','ORURO'),(3,'PT','POTOSI'),(4,'CBBA','COCHABAMBA'),(5,'STC','SANTA CRUZ'),(6,'CH','CHUQUISACA'),(7,'TJ','TARIJA'),(8,'BE','BENI'),(9,'PA','PANDO');
/*!40000 ALTER TABLE `par_expedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `par_genero`
--

DROP TABLE IF EXISTS `par_genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `par_genero` (
  `ugn_id` int(11) NOT NULL AUTO_INCREMENT,
  `ugn_codigo` varchar(5) NOT NULL,
  `ugn_descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`ugn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `par_genero`
--

LOCK TABLES `par_genero` WRITE;
/*!40000 ALTER TABLE `par_genero` DISABLE KEYS */;
INSERT INTO `par_genero` (`ugn_id`, `ugn_codigo`, `ugn_descripcion`) VALUES (1,'F','FEMENINO'),(2,'M','MASCULINO');
/*!40000 ALTER TABLE `par_genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `par_tipo_disciplinario`
--

DROP TABLE IF EXISTS `par_tipo_disciplinario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `par_tipo_disciplinario` (
  `ptd_id` int(11) NOT NULL,
  `ptd_codigo` varchar(45) NOT NULL,
  `ptd_descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`ptd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `par_tipo_disciplinario`
--

LOCK TABLES `par_tipo_disciplinario` WRITE;
/*!40000 ALTER TABLE `par_tipo_disciplinario` DISABLE KEYS */;
INSERT INTO `par_tipo_disciplinario` (`ptd_id`, `ptd_codigo`, `ptd_descripcion`) VALUES (1,'BUL','BULLING'),(2,'ROB','ROBO'),(3,'HUR','HURTO'),(4,'AGFI','AGRESIONES FISICAS'),(5,'POR','PORNOGRAFIA'),(6,'OTR','OTROS');
/*!40000 ALTER TABLE `par_tipo_disciplinario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `par_tipo_falta`
--

DROP TABLE IF EXISTS `par_tipo_falta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `par_tipo_falta` (
  `ptf_id` int(11) NOT NULL AUTO_INCREMENT,
  `ptf_codigo` varchar(45) NOT NULL,
  `ptf_descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`ptf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `par_tipo_falta`
--

LOCK TABLES `par_tipo_falta` WRITE;
/*!40000 ALTER TABLE `par_tipo_falta` DISABLE KEYS */;
INSERT INTO `par_tipo_falta` (`ptf_id`, `ptf_codigo`, `ptf_descripcion`) VALUES (1,'ATR','ATRASO'),(2,'FUG','FUGA'),(3,'FIN','FALTA INJUSTIFICADA'),(4,'FJU','FALTA JUSTIFICADA'),(5,'PER','PERMISO');
/*!40000 ALTER TABLE `par_tipo_falta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesor` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_gestion` int(11) NOT NULL,
  `pro_nombre` varchar(45) NOT NULL,
  `pro_paterno` varchar(45) NOT NULL,
  `pro_materno` varchar(45) DEFAULT NULL,
  `pro_ci` varchar(45) NOT NULL,
  `pro_direccion` varchar(100) DEFAULT NULL,
  `pro_email` varchar(45) DEFAULT NULL,
  `pro_telefono` varchar(45) DEFAULT NULL,
  `pro_movil` varchar(45) DEFAULT NULL,
  `pro_login` varchar(45) NOT NULL,
  `pro_password` varchar(45) NOT NULL,
  `pro_fechreg` date NOT NULL,
  `par_expedido_id` int(11) NOT NULL,
  `par_genero_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `fk_profesor_par_expedido1_idx` (`par_expedido_id`),
  KEY `fk_profesor_par_genero1_idx` (`par_genero_id`),
  KEY `fk_profesor_rol1_idx` (`rol_id`),
  KEY `fk_profesor_estado1_idx` (`estado_id`),
  CONSTRAINT `fk_profesor_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_profesor_par_expedido1` FOREIGN KEY (`par_expedido_id`) REFERENCES `par_expedido` (`uexp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_profesor_par_genero1` FOREIGN KEY (`par_genero_id`) REFERENCES `par_genero` (`ugn_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_profesor_rol1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
INSERT INTO `profesor` (`pro_id`, `pro_gestion`, `pro_nombre`, `pro_paterno`, `pro_materno`, `pro_ci`, `pro_direccion`, `pro_email`, `pro_telefono`, `pro_movil`, `pro_login`, `pro_password`, `pro_fechreg`, `par_expedido_id`, `par_genero_id`, `rol_id`, `estado_id`) VALUES (1,2015,'FELIX HUGO','MONTES','SALAZAR','6457854','Z TEMBLADERANI','hugo@gmail.com','2458522','75120225','FMONTES','1234','0000-00-00',1,2,2,1),(2,2015,'EDUARDO','SALINAS','PIZA','6052639','Z. ACHACHICALA','eddy@hotmail.com','2306739','73247186','ESALINAS','1234','0000-00-00',1,2,4,1);
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_disciplinario`
--

DROP TABLE IF EXISTS `registro_disciplinario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro_disciplinario` (
  `dis_id` int(11) NOT NULL,
  `dis_fecha` date NOT NULL,
  `dis_numcaso` int(11) NOT NULL,
  `dis_relacionHecho` text,
  `dis_solucion` text,
  `dis_estudiante` int(11) NOT NULL,
  PRIMARY KEY (`dis_id`),
  KEY `fk_disciplinario_estudiante_idx` (`dis_estudiante`),
  KEY `fk_disciplinario_tipodisciplina_idx` (`dis_numcaso`),
  CONSTRAINT `fk_disciplinario_estudiante` FOREIGN KEY (`dis_estudiante`) REFERENCES `estudiante` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_disciplinario_tipodisciplina` FOREIGN KEY (`dis_numcaso`) REFERENCES `par_tipo_disciplinario` (`ptd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_disciplinario`
--

LOCK TABLES `registro_disciplinario` WRITE;
/*!40000 ALTER TABLE `registro_disciplinario` DISABLE KEYS */;
INSERT INTO `registro_disciplinario` (`dis_id`, `dis_fecha`, `dis_numcaso`, `dis_relacionHecho`, `dis_solucion`, `dis_estudiante`) VALUES (1,'0000-00-00',1,'Se denuncio el robo de un celular','Se solicita llamada a los padres de familia del estudiante',1),(2,'0000-00-00',3,'Se denuncio agrsiones fisicas contra el alumno pepito','Se solicita llamada a los padres de familia del estudiante',2);
/*!40000 ALTER TABLE `registro_disciplinario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `rl_id` int(11) NOT NULL AUTO_INCREMENT,
  `rl_codigo` varchar(45) NOT NULL,
  `rl_denominacion` varchar(45) NOT NULL,
  PRIMARY KEY (`rl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` (`rl_id`, `rl_codigo`, `rl_denominacion`) VALUES (1,'ADM','ADMINISTRATIVO'),(2,'ROOT','SUPER USUARIO'),(3,'EST','ESTUDIANTE'),(4,'DOC','DOCENTE');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-07 12:17:29
