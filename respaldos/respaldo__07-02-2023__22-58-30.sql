-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: Localhost    Database: base_proyecto_nueva
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `antropometria_est`
--

DROP TABLE IF EXISTS `antropometria_est`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `antropometria_est` (
  `cedula_estudiante` varchar(45) NOT NULL,
  `estatura` int(11) NOT NULL,
  `peso` float NOT NULL,
  `indice_m_c` float NOT NULL,
  `circ_braquial` float NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  UNIQUE KEY `cedula_estudiante_UNIQUE` (`cedula_estudiante`),
  CONSTRAINT `fk_antropometria_est_datos_salud1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `datos_salud` (`cedula_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `antropometria_est`
--

LOCK TABLES `antropometria_est` WRITE;
/*!40000 ALTER TABLE `antropometria_est` DISABLE KEYS */;
/*!40000 ALTER TABLE `antropometria_est` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `hora_ingreso` time NOT NULL,
  `hora_salida` time NOT NULL,
  `acciones_realizadas` text NOT NULL,
  `cedula_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` VALUES (1,'2023-02-05','0000-00-00','00:53:52','00:00:00','Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta estudiantes, Registra un estudiante, Registra un estudiante, Registra un estudiante, Registra un estudiante, Registra un estudiante, Registra un estudiante, Registra un estudiante, Registra un estudiante, Registra un estudiante, Registra un estudiante, Registra un estudiante, Registra un estudiante, Registra un estudiante, Registra un estudiante, Registra un estudiante, Registra un estudiante, Registra un estudiante, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita área de consulta, Visita menú principal, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita perfil, Modifica su perfil, Visita menú principal, Registra un estudiante, Consulta estudiantes, Visita área de consulta, Visita menú principal, Visita menú principal','V27919566'),(2,'2023-02-07','0000-00-00','11:22:15','00:00:00','Inicia Sesión, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta estudiantes','V27919566'),(3,'2023-02-07','2023-02-07','12:14:08','12:20:04','Inicia Sesión, Visita menú principal, Visita perfil, Visita perfil, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Cierra sesión.','V67685246'),(4,'2023-02-07','0000-00-00','12:20:42','00:00:00','Inicia Sesión, Visita menú principal, Visita menú principal, Visita modulo de mantenimiento, Visita modulo de mantenimiento, Visita modulo de mantenimiento, Visita modulo de mantenimiento, Visita modulo de mantenimiento, Visita modulo de mantenimiento, Visita modulo de mantenimiento, Visita menú principal, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita modulo de mantenimiento, Visita menú principal, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Elimina un estudiante, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Elimina un estudiante, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Elimina un estudiante, Elimina un estudiante, Elimina un estudiante, Elimina un estudiante, Elimina un estudiante, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta padres, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta bitácora, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita área de consulta, Visita menú principal, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita modulo de mantenimiento, Visita menú principal, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita modulo de mantenimiento, Visita modulo de mantenimiento, Visita modulo de mantenimiento, Visita menú principal, Consulta estudiantes, Visita área de consulta, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta representantes, Consulta estudiantes, Visita menú principal, Visita modulo de mantenimiento, Visita modulo de mantenimiento, Visita modulo de mantenimiento','V27919566');
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carnet_patria`
--

DROP TABLE IF EXISTS `carnet_patria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carnet_patria` (
  `cedula_persona` varchar(45) NOT NULL,
  `codigo_carnet` varchar(45) NOT NULL,
  `serial_carnet` varchar(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  UNIQUE KEY `cedula_persona_UNIQUE` (`cedula_persona`),
  CONSTRAINT `fk_carnet_patria_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carnet_patria`
--

LOCK TABLES `carnet_patria` WRITE;
/*!40000 ALTER TABLE `carnet_patria` DISABLE KEYS */;
INSERT INTO `carnet_patria` VALUES ('V79879879','','');
/*!40000 ALTER TABLE `carnet_patria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `condiciones_est`
--

DROP TABLE IF EXISTS `condiciones_est`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `condiciones_est` (
  `cedula_estudiante` varchar(45) NOT NULL,
  `visual` char(1) NOT NULL,
  `motora` char(1) NOT NULL,
  `auditiva` char(1) NOT NULL,
  `escritura` char(1) NOT NULL,
  `lectura` char(1) NOT NULL,
  `lenguaje` char(1) NOT NULL,
  `embarazo` char(1) NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  UNIQUE KEY `cedula_estudiante_UNIQUE` (`cedula_estudiante`),
  CONSTRAINT `fk_condiciones_est_datos_salud1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `datos_salud` (`cedula_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condiciones_est`
--

LOCK TABLES `condiciones_est` WRITE;
/*!40000 ALTER TABLE `condiciones_est` DISABLE KEYS */;
/*!40000 ALTER TABLE `condiciones_est` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactos_aux`
--

DROP TABLE IF EXISTS `contactos_aux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactos_aux` (
  `cedula_representante` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `prefijo_telefono` varchar(45) NOT NULL,
  `nro_telefono` varchar(45) NOT NULL,
  `relacion` varchar(45) NOT NULL,
  PRIMARY KEY (`cedula_representante`),
  UNIQUE KEY `cedula_representante_UNIQUE` (`cedula_representante`),
  CONSTRAINT `fk_contactos_aux_representantes1` FOREIGN KEY (`cedula_representante`) REFERENCES `representantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactos_aux`
--

LOCK TABLES `contactos_aux` WRITE;
/*!40000 ALTER TABLE `contactos_aux` DISABLE KEYS */;
INSERT INTO `contactos_aux` VALUES ('V79879879','primernombreaux','primerapellidoaux','1234','1234567','relacionauxd');
/*!40000 ALTER TABLE `contactos_aux` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_academicos`
--

DROP TABLE IF EXISTS `datos_academicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_academicos` (
  `cedula_estudiante` varchar(45) NOT NULL,
  `a_repetido` varchar(45) NOT NULL,
  `materias_repetidas` text NOT NULL,
  `materias_pendientes` text NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  CONSTRAINT `fk_datos_academicos_estudiantes1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `estudiantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_academicos`
--

LOCK TABLES `datos_academicos` WRITE;
/*!40000 ALTER TABLE `datos_academicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `datos_academicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_economicos`
--

DROP TABLE IF EXISTS `datos_economicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_economicos` (
  `cedula_representante` varchar(45) NOT NULL,
  `banco` varchar(240) NOT NULL,
  `tipo_cuenta` varchar(45) NOT NULL,
  `nro_cuenta` varchar(45) NOT NULL,
  PRIMARY KEY (`cedula_representante`),
  UNIQUE KEY `cedula_representante_UNIQUE` (`cedula_representante`),
  CONSTRAINT `fk_datos_economicos_representantes1` FOREIGN KEY (`cedula_representante`) REFERENCES `representantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_economicos`
--

LOCK TABLES `datos_economicos` WRITE;
/*!40000 ALTER TABLE `datos_economicos` DISABLE KEYS */;
INSERT INTO `datos_economicos` VALUES ('V79879879','','','');
/*!40000 ALTER TABLE `datos_economicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_laborales`
--

DROP TABLE IF EXISTS `datos_laborales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_laborales` (
  `cedula_persona` varchar(45) NOT NULL,
  `empleo` varchar(45) NOT NULL,
  `lugar_trabajo` varchar(45) NOT NULL,
  `remuneracion` varchar(45) NOT NULL,
  `tipo_remuneracion` varchar(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  UNIQUE KEY `cedula_persona_UNIQUE` (`cedula_persona`),
  CONSTRAINT `fk_datos_laborales_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_laborales`
--

LOCK TABLES `datos_laborales` WRITE;
/*!40000 ALTER TABLE `datos_laborales` DISABLE KEYS */;
INSERT INTO `datos_laborales` VALUES ('V10','','','',''),('V5','','','',''),('V7','','','',''),('V79879879','','','',''),('V8','','','',''),('V9','','','','');
/*!40000 ALTER TABLE `datos_laborales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_salud`
--

DROP TABLE IF EXISTS `datos_salud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_salud` (
  `cedula_estudiante` varchar(45) NOT NULL,
  `lateralidad` varchar(45) NOT NULL,
  `tipo_sangre` varchar(45) NOT NULL,
  `medicacion` text NOT NULL,
  `dieta_especial` text NOT NULL,
  `padecimiento` text NOT NULL,
  `impedimento_fisico` text NOT NULL,
  `necesidad_educativa` text NOT NULL,
  `condicion_vista` varchar(45) NOT NULL,
  `condicion_dental` varchar(45) NOT NULL,
  `institucion_medica` varchar(45) NOT NULL,
  `carnet_discapacidad` varchar(45) NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  CONSTRAINT `fk_datos_salud_estudiantes1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `estudiantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_salud`
--

LOCK TABLES `datos_salud` WRITE;
/*!40000 ALTER TABLE `datos_salud` DISABLE KEYS */;
/*!40000 ALTER TABLE `datos_salud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_sociales`
--

DROP TABLE IF EXISTS `datos_sociales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_sociales` (
  `cedula_estudiante` varchar(45) NOT NULL,
  `tiene_canaima` varchar(45) NOT NULL,
  `condicion_canaima` varchar(45) NOT NULL,
  `acceso_internet` varchar(45) NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  UNIQUE KEY `cedula_estudiante_UNIQUE` (`cedula_estudiante`),
  CONSTRAINT `fk_datos_sociales_estudiantes1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `estudiantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_sociales`
--

LOCK TABLES `datos_sociales` WRITE;
/*!40000 ALTER TABLE `datos_sociales` DISABLE KEYS */;
/*!40000 ALTER TABLE `datos_sociales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_vivienda`
--

DROP TABLE IF EXISTS `datos_vivienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_vivienda` (
  `cedula_persona` varchar(45) NOT NULL,
  `condicion` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `tenencia` varchar(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  UNIQUE KEY `cedula_persona_UNIQUE` (`cedula_persona`),
  CONSTRAINT `fk_datos_vivienda_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_vivienda`
--

LOCK TABLES `datos_vivienda` WRITE;
/*!40000 ALTER TABLE `datos_vivienda` DISABLE KEYS */;
INSERT INTO `datos_vivienda` VALUES ('V10','','',''),('V5','','',''),('V7','','',''),('V79879879','Mala','Habitación','Propia'),('V8','','',''),('V9','','','');
/*!40000 ALTER TABLE `datos_vivienda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direcciones`
--

DROP TABLE IF EXISTS `direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direcciones` (
  `cedula_persona` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `municipio` varchar(45) NOT NULL,
  `parroquia` varchar(45) NOT NULL,
  `sector` varchar(45) NOT NULL,
  `calle` varchar(45) NOT NULL,
  `nro_casa` varchar(45) NOT NULL,
  `punto_referencia` text NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  CONSTRAINT `fk_direcciones_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direcciones`
--

LOCK TABLES `direcciones` WRITE;
/*!40000 ALTER TABLE `direcciones` DISABLE KEYS */;
INSERT INTO `direcciones` VALUES ('V10','','','','','','',''),('V5','','','','','','',''),('V7','','','','','','',''),('V79879879','Mérida','AAD','Presidente Betancourt','sector','calle','nro_casa','punto_referencia'),('V8','','','','','','',''),('V9','','','','','','','');
/*!40000 ALTER TABLE `direcciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiantes` (
  `cedula_persona` varchar(45) NOT NULL,
  `cedula_escolar` varchar(45) NOT NULL,
  `plantel_proced` text NOT NULL,
  `con_quien_vive` varchar(45) NOT NULL,
  `relacion_representante` varchar(45) NOT NULL,
  `cedula_padre` varchar(45) NOT NULL,
  `cedula_madre` varchar(45) NOT NULL,
  `cedula_representante` varchar(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`,`cedula_padre`,`cedula_madre`,`cedula_representante`),
  UNIQUE KEY `cedula_persona_UNIQUE` (`cedula_persona`),
  KEY `fk_estudiantes_padres1_idx` (`cedula_padre`),
  KEY `fk_estudiantes_padres2_idx` (`cedula_madre`),
  KEY `fk_estudiantes_personas1_idx` (`cedula_persona`),
  KEY `fk_estudiantes_representantes1_idx` (`cedula_representante`),
  CONSTRAINT `fk_estudiantes_padres1` FOREIGN KEY (`cedula_padre`) REFERENCES `padres` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_estudiantes_padres2` FOREIGN KEY (`cedula_madre`) REFERENCES `padres` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_estudiantes_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_estudiantes_representantes1` FOREIGN KEY (`cedula_representante`) REFERENCES `representantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes`
--

LOCK TABLES `estudiantes` WRITE;
/*!40000 ALTER TABLE `estudiantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado_a_cursar_est`
--

DROP TABLE IF EXISTS `grado_a_cursar_est`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grado_a_cursar_est` (
  `grado_a_cursar` varchar(45) NOT NULL,
  `cedula_estudiante` varchar(45) NOT NULL,
  `id_per_academico` int(11) NOT NULL,
  PRIMARY KEY (`cedula_estudiante`,`id_per_academico`),
  KEY `fk_grado_a_cursar_est_per_academico1_idx` (`id_per_academico`),
  CONSTRAINT `fk_grado_a_cursar_est_estudiantes1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `estudiantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_grado_a_cursar_est_per_academico1` FOREIGN KEY (`id_per_academico`) REFERENCES `per_academico` (`id_per_academico`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado_a_cursar_est`
--

LOCK TABLES `grado_a_cursar_est` WRITE;
/*!40000 ALTER TABLE `grado_a_cursar_est` DISABLE KEYS */;
/*!40000 ALTER TABLE `grado_a_cursar_est` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscripciones`
--

DROP TABLE IF EXISTS `inscripciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscripciones` (
  `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(45) NOT NULL,
  `hora` varchar(45) NOT NULL,
  `cedula_usuario` varchar(45) NOT NULL,
  `cedula_estudiante` varchar(45) NOT NULL,
  PRIMARY KEY (`id_inscripcion`),
  KEY `fk_inscripciones_usuarios1_idx` (`cedula_usuario`),
  KEY `fk_inscripciones_estudiantes1_idx` (`cedula_estudiante`),
  CONSTRAINT `fk_inscripciones_estudiantes1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `estudiantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_inscripciones_usuarios1` FOREIGN KEY (`cedula_usuario`) REFERENCES `usuarios` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscripciones`
--

LOCK TABLES `inscripciones` WRITE;
/*!40000 ALTER TABLE `inscripciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscripciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `observaciones_est`
--

DROP TABLE IF EXISTS `observaciones_est`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `observaciones_est` (
  `cedula_estudiante` varchar(45) NOT NULL,
  `social` text NOT NULL,
  `fisico` text NOT NULL,
  `personal` text NOT NULL,
  `familiar` text NOT NULL,
  `academico` text NOT NULL,
  `otra` text NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  UNIQUE KEY `cedula_estudiante_UNIQUE` (`cedula_estudiante`),
  CONSTRAINT `fk_observaciones_est_estudiantes1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `estudiantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `observaciones_est`
--

LOCK TABLES `observaciones_est` WRITE;
/*!40000 ALTER TABLE `observaciones_est` DISABLE KEYS */;
/*!40000 ALTER TABLE `observaciones_est` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `padres`
--

DROP TABLE IF EXISTS `padres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `padres` (
  `cedula_persona` varchar(45) NOT NULL,
  `pais_residencia` varchar(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  UNIQUE KEY `cedula_persona_UNIQUE` (`cedula_persona`),
  CONSTRAINT `fk_padres_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `padres`
--

LOCK TABLES `padres` WRITE;
/*!40000 ALTER TABLE `padres` DISABLE KEYS */;
INSERT INTO `padres` VALUES ('V10',''),('V5',''),('V7',''),('V79879879','Venezuela'),('V8',''),('V9','');
/*!40000 ALTER TABLE `padres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `per_academico`
--

DROP TABLE IF EXISTS `per_academico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `per_academico` (
  `id_per_academico` int(11) NOT NULL AUTO_INCREMENT,
  `inicio` varchar(45) NOT NULL,
  `fin` varchar(45) NOT NULL,
  PRIMARY KEY (`id_per_academico`)
) ENGINE=InnoDB AUTO_INCREMENT=20242026 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `per_academico`
--

LOCK TABLES `per_academico` WRITE;
/*!40000 ALTER TABLE `per_academico` DISABLE KEYS */;
INSERT INTO `per_academico` VALUES (20242025,'2024','2025');
/*!40000 ALTER TABLE `per_academico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personas` (
  `cedula` varchar(45) NOT NULL,
  `p_nombre` varchar(45) NOT NULL,
  `s_nombre` varchar(45) NOT NULL,
  `p_apellido` varchar(45) NOT NULL,
  `s_apellido` varchar(45) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_nacimiento` text NOT NULL,
  `genero` char(2) NOT NULL,
  `estado_civil` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `grado_academico` varchar(45) NOT NULL,
  PRIMARY KEY (`cedula`),
  UNIQUE KEY `cedula_UNIQUE` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES ('V10','','','','','0000-00-00','','F','','',''),('V26985572','Franklin','Darío','Contreras','Rodríguez','0000-00-00','','M','Soltero(a)','contreras19.franklin@gmail.com','Universitario'),('V27919566','Elber','Alonso','Rondón','Hernández','2001-05-05','Mérida','M','Soltero(a)','earh_2001@outlook.com','Universitario'),('V28636530','María','Gabriela','Ballestero','Rodríguez','2002-05-09','Caja seca','F','Soltero(a)','mgba952@gmail.com','Universitario'),('V48787647','pnombreu','','papellidou','','2000-02-07','','','','',''),('V5','','','','','0000-00-00','','F','','',''),('V67685246','pnombreu','snombreu','papellidou','','2001-02-07','','M','','example@example.com',''),('V7','','','','','0000-00-00','','F','','',''),('V79879879','primernombrr','','primerapellidr','','2000-02-05','lugar_nacimiento_r','M','Soltero(a)','example@example.com','Universitario'),('V8','','','','','0000-00-00','','F','','',''),('V9','','','','','0000-00-00','','F','','','');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `representantes`
--

DROP TABLE IF EXISTS `representantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `representantes` (
  `cedula_persona` varchar(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  UNIQUE KEY `cedula_persona_UNIQUE` (`cedula_persona`),
  CONSTRAINT `fk_representantes_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `representantes`
--

LOCK TABLES `representantes` WRITE;
/*!40000 ALTER TABLE `representantes` DISABLE KEYS */;
INSERT INTO `representantes` VALUES ('V79879879');
/*!40000 ALTER TABLE `representantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tallas_est`
--

DROP TABLE IF EXISTS `tallas_est`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tallas_est` (
  `cedula_estudiante` varchar(45) NOT NULL,
  `camisa` varchar(45) NOT NULL,
  `pantalon` varchar(45) NOT NULL,
  `calzado` varchar(45) NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  UNIQUE KEY `cedula_estudiante_UNIQUE` (`cedula_estudiante`),
  CONSTRAINT `fk_tallas_est_datos_salud1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `datos_salud` (`cedula_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tallas_est`
--

LOCK TABLES `tallas_est` WRITE;
/*!40000 ALTER TABLE `tallas_est` DISABLE KEYS */;
/*!40000 ALTER TABLE `tallas_est` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefonos`
--

DROP TABLE IF EXISTS `telefonos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefonos` (
  `cedula_persona` varchar(45) NOT NULL,
  `relacion` varchar(45) NOT NULL,
  `prefijo` varchar(45) NOT NULL,
  `numero` varchar(45) NOT NULL,
  KEY `fk_telefonos_personas1` (`cedula_persona`),
  CONSTRAINT `fk_telefonos_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefonos`
--

LOCK TABLES `telefonos` WRITE;
/*!40000 ALTER TABLE `telefonos` DISABLE KEYS */;
INSERT INTO `telefonos` VALUES ('V79879879','Principal','4231','4234234'),('V79879879','Secundario','3453','2342343'),('V79879879','Auxiliar','6465','4356435'),('V79879879','Trabajo','',''),('V5','Principal','',''),('V5','Secundario','',''),('V5','Trabajo','',''),('V7','Principal','',''),('V7','Secundario','',''),('V7','Trabajo','',''),('V8','Principal','',''),('V8','Secundario','',''),('V8','Trabajo','',''),('V9','Principal','',''),('V9','Secundario','',''),('V9','Trabajo','',''),('V10','Principal','',''),('V10','Secundario','',''),('V10','Trabajo','','');
/*!40000 ALTER TABLE `telefonos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `cedula_persona` varchar(45) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `privilegios` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `pregunta_seg_1` varchar(45) NOT NULL,
  `respuesta_1` varchar(45) NOT NULL,
  `pregunta_seg_2` varchar(45) NOT NULL,
  `respuesta_2` varchar(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  UNIQUE KEY `cedula_persona_UNIQUE` (`cedula_persona`),
  KEY `fk_usuarios_personas1_idx` (`cedula_persona`),
  CONSTRAINT `fk_usuarios_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('V26985572','Desarrollador','0','12345','','','',''),('V27919566','Desarrollador','0','12345','Color favorito','Azúl','Nombre de mascota','Mia'),('V28636530','Desarrollador','0','Gab_952','Color favorito','Azúl','',''),('V67685246','Secretario(a)','2','clave324','Ciudad de tu luna de miel','respuesta_1','Ciudad de tu luna de miel','respuesta_2');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vac_covid19_est`
--

DROP TABLE IF EXISTS `vac_covid19_est`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vac_covid19_est` (
  `cedula_estudiante` varchar(45) NOT NULL,
  `vac_aplicada` text NOT NULL,
  `dosis` int(11) NOT NULL,
  `lote` varchar(45) NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  UNIQUE KEY `cedula_estudiante_UNIQUE` (`cedula_estudiante`),
  CONSTRAINT `fk_vac_covid19_est_datos_salud1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `datos_salud` (`cedula_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vac_covid19_est`
--

LOCK TABLES `vac_covid19_est` WRITE;
/*!40000 ALTER TABLE `vac_covid19_est` DISABLE KEYS */;
/*!40000 ALTER TABLE `vac_covid19_est` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacunas_est`
--

DROP TABLE IF EXISTS `vacunas_est`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vacunas_est` (
  `cedula_estudiante` varchar(45) NOT NULL,
  `espec_vacuna` varchar(45) NOT NULL,
  `estado_vacuna` varchar(45) NOT NULL,
  KEY `fk_vacunas_est_datos_salud1` (`cedula_estudiante`),
  CONSTRAINT `fk_vacunas_est_datos_salud1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `datos_salud` (`cedula_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacunas_est`
--

LOCK TABLES `vacunas_est` WRITE;
/*!40000 ALTER TABLE `vacunas_est` DISABLE KEYS */;
/*!40000 ALTER TABLE `vacunas_est` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vista_estudiantes`
--

DROP TABLE IF EXISTS `vista_estudiantes`;
/*!50001 DROP VIEW IF EXISTS `vista_estudiantes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vista_estudiantes` (
  `cedula` tinyint NOT NULL,
  `p_nombre` tinyint NOT NULL,
  `s_nombre` tinyint NOT NULL,
  `p_apellido` tinyint NOT NULL,
  `s_apellido` tinyint NOT NULL,
  `fecha_nacimiento` tinyint NOT NULL,
  `lugar_nacimiento` tinyint NOT NULL,
  `genero` tinyint NOT NULL,
  `email` tinyint NOT NULL,
  `estado` tinyint NOT NULL,
  `municipio` tinyint NOT NULL,
  `parroquia` tinyint NOT NULL,
  `sector` tinyint NOT NULL,
  `calle` tinyint NOT NULL,
  `nro_casa` tinyint NOT NULL,
  `punto_referencia` tinyint NOT NULL,
  `codigo_carnet` tinyint NOT NULL,
  `serial_carnet` tinyint NOT NULL,
  `cedula_escolar` tinyint NOT NULL,
  `plantel_proced` tinyint NOT NULL,
  `con_quien_vive` tinyint NOT NULL,
  `relacion_representante` tinyint NOT NULL,
  `cedula_padre` tinyint NOT NULL,
  `cedula_madre` tinyint NOT NULL,
  `cedula_representante` tinyint NOT NULL,
  `lateralidad` tinyint NOT NULL,
  `tipo_sangre` tinyint NOT NULL,
  `medicacion` tinyint NOT NULL,
  `dieta_especial` tinyint NOT NULL,
  `padecimiento` tinyint NOT NULL,
  `impedimento_fisico` tinyint NOT NULL,
  `necesidad_educativa` tinyint NOT NULL,
  `condicion_vista` tinyint NOT NULL,
  `condicion_dental` tinyint NOT NULL,
  `institucion_medica` tinyint NOT NULL,
  `carnet_discapacidad` tinyint NOT NULL,
  `vac_aplicada` tinyint NOT NULL,
  `dosis` tinyint NOT NULL,
  `lote` tinyint NOT NULL,
  `camisa` tinyint NOT NULL,
  `pantalon` tinyint NOT NULL,
  `calzado` tinyint NOT NULL,
  `estatura` tinyint NOT NULL,
  `peso` tinyint NOT NULL,
  `indice_m_c` tinyint NOT NULL,
  `circ_braquial` tinyint NOT NULL,
  `visual` tinyint NOT NULL,
  `motora` tinyint NOT NULL,
  `auditiva` tinyint NOT NULL,
  `escritura` tinyint NOT NULL,
  `lectura` tinyint NOT NULL,
  `lenguaje` tinyint NOT NULL,
  `embarazo` tinyint NOT NULL,
  `social` tinyint NOT NULL,
  `fisico` tinyint NOT NULL,
  `personal` tinyint NOT NULL,
  `familiar` tinyint NOT NULL,
  `academico` tinyint NOT NULL,
  `otra` tinyint NOT NULL,
  `grado_repetido` tinyint NOT NULL,
  `materias_repetidas` tinyint NOT NULL,
  `materias_pendientes` tinyint NOT NULL,
  `tiene_canaima` tinyint NOT NULL,
  `condicion_canaima` tinyint NOT NULL,
  `acceso_internet` tinyint NOT NULL,
  `grado_a_cursar` tinyint NOT NULL,
  `id_per_academico` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vista_padres`
--

DROP TABLE IF EXISTS `vista_padres`;
/*!50001 DROP VIEW IF EXISTS `vista_padres`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vista_padres` (
  `cedula` tinyint NOT NULL,
  `p_nombre` tinyint NOT NULL,
  `s_nombre` tinyint NOT NULL,
  `p_apellido` tinyint NOT NULL,
  `s_apellido` tinyint NOT NULL,
  `fecha_nacimiento` tinyint NOT NULL,
  `lugar_nacimiento` tinyint NOT NULL,
  `genero` tinyint NOT NULL,
  `estado_civil` tinyint NOT NULL,
  `email` tinyint NOT NULL,
  `grado_academico` tinyint NOT NULL,
  `estado` tinyint NOT NULL,
  `municipio` tinyint NOT NULL,
  `parroquia` tinyint NOT NULL,
  `sector` tinyint NOT NULL,
  `calle` tinyint NOT NULL,
  `nro_casa` tinyint NOT NULL,
  `punto_referencia` tinyint NOT NULL,
  `empleo` tinyint NOT NULL,
  `lugar_trabajo` tinyint NOT NULL,
  `remuneracion` tinyint NOT NULL,
  `tipo_remuneracion` tinyint NOT NULL,
  `condicion` tinyint NOT NULL,
  `tipo` tinyint NOT NULL,
  `tenencia` tinyint NOT NULL,
  `pais_residencia` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vista_representantes`
--

DROP TABLE IF EXISTS `vista_representantes`;
/*!50001 DROP VIEW IF EXISTS `vista_representantes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vista_representantes` (
  `cedula` tinyint NOT NULL,
  `p_nombre` tinyint NOT NULL,
  `s_nombre` tinyint NOT NULL,
  `p_apellido` tinyint NOT NULL,
  `s_apellido` tinyint NOT NULL,
  `fecha_nacimiento` tinyint NOT NULL,
  `lugar_nacimiento` tinyint NOT NULL,
  `genero` tinyint NOT NULL,
  `estado_civil` tinyint NOT NULL,
  `email` tinyint NOT NULL,
  `grado_academico` tinyint NOT NULL,
  `estado` tinyint NOT NULL,
  `municipio` tinyint NOT NULL,
  `parroquia` tinyint NOT NULL,
  `sector` tinyint NOT NULL,
  `calle` tinyint NOT NULL,
  `nro_casa` tinyint NOT NULL,
  `punto_referencia` tinyint NOT NULL,
  `codigo_carnet` tinyint NOT NULL,
  `serial_carnet` tinyint NOT NULL,
  `empleo` tinyint NOT NULL,
  `lugar_trabajo` tinyint NOT NULL,
  `remuneracion` tinyint NOT NULL,
  `tipo_remuneracion` tinyint NOT NULL,
  `condicion` tinyint NOT NULL,
  `tipo` tinyint NOT NULL,
  `tenencia` tinyint NOT NULL,
  `banco` tinyint NOT NULL,
  `tipo_cuenta` tinyint NOT NULL,
  `nro_cuenta` tinyint NOT NULL,
  `nombre_aux` tinyint NOT NULL,
  `apellido_aux` tinyint NOT NULL,
  `pref_aux` tinyint NOT NULL,
  `numero_aux` tinyint NOT NULL,
  `relacion_aux` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vista_usuarios`
--

DROP TABLE IF EXISTS `vista_usuarios`;
/*!50001 DROP VIEW IF EXISTS `vista_usuarios`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vista_usuarios` (
  `cedula` tinyint NOT NULL,
  `p_nombre` tinyint NOT NULL,
  `s_nombre` tinyint NOT NULL,
  `p_apellido` tinyint NOT NULL,
  `s_apellido` tinyint NOT NULL,
  `fecha_nacimiento` tinyint NOT NULL,
  `lugar_nacimiento` tinyint NOT NULL,
  `genero` tinyint NOT NULL,
  `estado_civil` tinyint NOT NULL,
  `email` tinyint NOT NULL,
  `grado_academico` tinyint NOT NULL,
  `cedula_persona` tinyint NOT NULL,
  `rol` tinyint NOT NULL,
  `privilegios` tinyint NOT NULL,
  `contraseña` tinyint NOT NULL,
  `pregunta_seg_1` tinyint NOT NULL,
  `respuesta_1` tinyint NOT NULL,
  `pregunta_seg_2` tinyint NOT NULL,
  `respuesta_2` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vista_estudiantes`
--

/*!50001 DROP TABLE IF EXISTS `vista_estudiantes`*/;
/*!50001 DROP VIEW IF EXISTS `vista_estudiantes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_estudiantes` AS select `personas`.`cedula` AS `cedula`,`personas`.`p_nombre` AS `p_nombre`,`personas`.`s_nombre` AS `s_nombre`,`personas`.`p_apellido` AS `p_apellido`,`personas`.`s_apellido` AS `s_apellido`,`personas`.`fecha_nacimiento` AS `fecha_nacimiento`,`personas`.`lugar_nacimiento` AS `lugar_nacimiento`,`personas`.`genero` AS `genero`,`personas`.`email` AS `email`,`direcciones`.`estado` AS `estado`,`direcciones`.`municipio` AS `municipio`,`direcciones`.`parroquia` AS `parroquia`,`direcciones`.`sector` AS `sector`,`direcciones`.`calle` AS `calle`,`direcciones`.`nro_casa` AS `nro_casa`,`direcciones`.`punto_referencia` AS `punto_referencia`,`carnet_patria`.`codigo_carnet` AS `codigo_carnet`,`carnet_patria`.`serial_carnet` AS `serial_carnet`,`estudiantes`.`cedula_escolar` AS `cedula_escolar`,`estudiantes`.`plantel_proced` AS `plantel_proced`,`estudiantes`.`con_quien_vive` AS `con_quien_vive`,`estudiantes`.`relacion_representante` AS `relacion_representante`,`estudiantes`.`cedula_padre` AS `cedula_padre`,`estudiantes`.`cedula_madre` AS `cedula_madre`,`estudiantes`.`cedula_representante` AS `cedula_representante`,`datos_salud`.`lateralidad` AS `lateralidad`,`datos_salud`.`tipo_sangre` AS `tipo_sangre`,`datos_salud`.`medicacion` AS `medicacion`,`datos_salud`.`dieta_especial` AS `dieta_especial`,`datos_salud`.`padecimiento` AS `padecimiento`,`datos_salud`.`impedimento_fisico` AS `impedimento_fisico`,`datos_salud`.`necesidad_educativa` AS `necesidad_educativa`,`datos_salud`.`condicion_vista` AS `condicion_vista`,`datos_salud`.`condicion_dental` AS `condicion_dental`,`datos_salud`.`institucion_medica` AS `institucion_medica`,`datos_salud`.`carnet_discapacidad` AS `carnet_discapacidad`,`vac_covid19_est`.`vac_aplicada` AS `vac_aplicada`,`vac_covid19_est`.`dosis` AS `dosis`,`vac_covid19_est`.`lote` AS `lote`,`tallas_est`.`camisa` AS `camisa`,`tallas_est`.`pantalon` AS `pantalon`,`tallas_est`.`calzado` AS `calzado`,`antropometria_est`.`estatura` AS `estatura`,`antropometria_est`.`peso` AS `peso`,`antropometria_est`.`indice_m_c` AS `indice_m_c`,`antropometria_est`.`circ_braquial` AS `circ_braquial`,`condiciones_est`.`visual` AS `visual`,`condiciones_est`.`motora` AS `motora`,`condiciones_est`.`auditiva` AS `auditiva`,`condiciones_est`.`escritura` AS `escritura`,`condiciones_est`.`lectura` AS `lectura`,`condiciones_est`.`lenguaje` AS `lenguaje`,`condiciones_est`.`embarazo` AS `embarazo`,`observaciones_est`.`social` AS `social`,`observaciones_est`.`fisico` AS `fisico`,`observaciones_est`.`personal` AS `personal`,`observaciones_est`.`familiar` AS `familiar`,`observaciones_est`.`academico` AS `academico`,`observaciones_est`.`otra` AS `otra`,`datos_academicos`.`a_repetido` AS `grado_repetido`,`datos_academicos`.`materias_repetidas` AS `materias_repetidas`,`datos_academicos`.`materias_pendientes` AS `materias_pendientes`,`datos_sociales`.`tiene_canaima` AS `tiene_canaima`,`datos_sociales`.`condicion_canaima` AS `condicion_canaima`,`datos_sociales`.`acceso_internet` AS `acceso_internet`,`grado_a_cursar_est`.`grado_a_cursar` AS `grado_a_cursar`,`grado_a_cursar_est`.`id_per_academico` AS `id_per_academico` from ((((((((((((`personas` join `estudiantes`) join `direcciones`) join `carnet_patria`) join `datos_salud`) join `vac_covid19_est`) join `tallas_est`) join `antropometria_est`) join `condiciones_est`) join `observaciones_est`) join `datos_sociales`) join `datos_academicos`) join `grado_a_cursar_est`) where `personas`.`cedula` = `direcciones`.`cedula_persona` and `personas`.`cedula` = `carnet_patria`.`cedula_persona` and `personas`.`cedula` = `estudiantes`.`cedula_persona` and `personas`.`cedula` = `datos_salud`.`cedula_estudiante` and `personas`.`cedula` = `vac_covid19_est`.`cedula_estudiante` and `personas`.`cedula` = `tallas_est`.`cedula_estudiante` and `personas`.`cedula` = `antropometria_est`.`cedula_estudiante` and `personas`.`cedula` = `condiciones_est`.`cedula_estudiante` and `personas`.`cedula` = `observaciones_est`.`cedula_estudiante` and `personas`.`cedula` = `datos_academicos`.`cedula_estudiante` and `personas`.`cedula` = `datos_sociales`.`cedula_estudiante` and `personas`.`cedula` = `grado_a_cursar_est`.`cedula_estudiante` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_padres`
--

/*!50001 DROP TABLE IF EXISTS `vista_padres`*/;
/*!50001 DROP VIEW IF EXISTS `vista_padres`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_padres` AS select `personas`.`cedula` AS `cedula`,`personas`.`p_nombre` AS `p_nombre`,`personas`.`s_nombre` AS `s_nombre`,`personas`.`p_apellido` AS `p_apellido`,`personas`.`s_apellido` AS `s_apellido`,`personas`.`fecha_nacimiento` AS `fecha_nacimiento`,`personas`.`lugar_nacimiento` AS `lugar_nacimiento`,`personas`.`genero` AS `genero`,`personas`.`estado_civil` AS `estado_civil`,`personas`.`email` AS `email`,`personas`.`grado_academico` AS `grado_academico`,`direcciones`.`estado` AS `estado`,`direcciones`.`municipio` AS `municipio`,`direcciones`.`parroquia` AS `parroquia`,`direcciones`.`sector` AS `sector`,`direcciones`.`calle` AS `calle`,`direcciones`.`nro_casa` AS `nro_casa`,`direcciones`.`punto_referencia` AS `punto_referencia`,`datos_laborales`.`empleo` AS `empleo`,`datos_laborales`.`lugar_trabajo` AS `lugar_trabajo`,`datos_laborales`.`remuneracion` AS `remuneracion`,`datos_laborales`.`tipo_remuneracion` AS `tipo_remuneracion`,`datos_vivienda`.`condicion` AS `condicion`,`datos_vivienda`.`tipo` AS `tipo`,`datos_vivienda`.`tenencia` AS `tenencia`,`padres`.`pais_residencia` AS `pais_residencia` from ((((`personas` join `direcciones`) join `datos_laborales`) join `datos_vivienda`) join `padres`) where `personas`.`cedula` = `direcciones`.`cedula_persona` and `personas`.`cedula` = `datos_laborales`.`cedula_persona` and `personas`.`cedula` = `datos_vivienda`.`cedula_persona` and `personas`.`cedula` = `padres`.`cedula_persona` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_representantes`
--

/*!50001 DROP TABLE IF EXISTS `vista_representantes`*/;
/*!50001 DROP VIEW IF EXISTS `vista_representantes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_representantes` AS select `personas`.`cedula` AS `cedula`,`personas`.`p_nombre` AS `p_nombre`,`personas`.`s_nombre` AS `s_nombre`,`personas`.`p_apellido` AS `p_apellido`,`personas`.`s_apellido` AS `s_apellido`,`personas`.`fecha_nacimiento` AS `fecha_nacimiento`,`personas`.`lugar_nacimiento` AS `lugar_nacimiento`,`personas`.`genero` AS `genero`,`personas`.`estado_civil` AS `estado_civil`,`personas`.`email` AS `email`,`personas`.`grado_academico` AS `grado_academico`,`direcciones`.`estado` AS `estado`,`direcciones`.`municipio` AS `municipio`,`direcciones`.`parroquia` AS `parroquia`,`direcciones`.`sector` AS `sector`,`direcciones`.`calle` AS `calle`,`direcciones`.`nro_casa` AS `nro_casa`,`direcciones`.`punto_referencia` AS `punto_referencia`,`carnet_patria`.`codigo_carnet` AS `codigo_carnet`,`carnet_patria`.`serial_carnet` AS `serial_carnet`,`datos_laborales`.`empleo` AS `empleo`,`datos_laborales`.`lugar_trabajo` AS `lugar_trabajo`,`datos_laborales`.`remuneracion` AS `remuneracion`,`datos_laborales`.`tipo_remuneracion` AS `tipo_remuneracion`,`datos_vivienda`.`condicion` AS `condicion`,`datos_vivienda`.`tipo` AS `tipo`,`datos_vivienda`.`tenencia` AS `tenencia`,`datos_economicos`.`banco` AS `banco`,`datos_economicos`.`tipo_cuenta` AS `tipo_cuenta`,`datos_economicos`.`nro_cuenta` AS `nro_cuenta`,`contactos_aux`.`nombre` AS `nombre_aux`,`contactos_aux`.`apellido` AS `apellido_aux`,`contactos_aux`.`prefijo_telefono` AS `pref_aux`,`contactos_aux`.`nro_telefono` AS `numero_aux`,`contactos_aux`.`relacion` AS `relacion_aux` from (((((((`personas` join `direcciones`) join `carnet_patria`) join `datos_laborales`) join `datos_vivienda`) join `representantes`) join `datos_economicos`) join `contactos_aux`) where `personas`.`cedula` = `direcciones`.`cedula_persona` and `personas`.`cedula` = `carnet_patria`.`cedula_persona` and `personas`.`cedula` = `datos_laborales`.`cedula_persona` and `personas`.`cedula` = `datos_vivienda`.`cedula_persona` and `personas`.`cedula` = `representantes`.`cedula_persona` and `personas`.`cedula` = `datos_economicos`.`cedula_representante` and `personas`.`cedula` = `contactos_aux`.`cedula_representante` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_usuarios`
--

/*!50001 DROP TABLE IF EXISTS `vista_usuarios`*/;
/*!50001 DROP VIEW IF EXISTS `vista_usuarios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_usuarios` AS select `personas`.`cedula` AS `cedula`,`personas`.`p_nombre` AS `p_nombre`,`personas`.`s_nombre` AS `s_nombre`,`personas`.`p_apellido` AS `p_apellido`,`personas`.`s_apellido` AS `s_apellido`,`personas`.`fecha_nacimiento` AS `fecha_nacimiento`,`personas`.`lugar_nacimiento` AS `lugar_nacimiento`,`personas`.`genero` AS `genero`,`personas`.`estado_civil` AS `estado_civil`,`personas`.`email` AS `email`,`personas`.`grado_academico` AS `grado_academico`,`usuarios`.`cedula_persona` AS `cedula_persona`,`usuarios`.`rol` AS `rol`,`usuarios`.`privilegios` AS `privilegios`,`usuarios`.`contraseña` AS `contraseña`,`usuarios`.`pregunta_seg_1` AS `pregunta_seg_1`,`usuarios`.`respuesta_1` AS `respuesta_1`,`usuarios`.`pregunta_seg_2` AS `pregunta_seg_2`,`usuarios`.`respuesta_2` AS `respuesta_2` from (`personas` join `usuarios`) where `personas`.`cedula` = `usuarios`.`cedula_persona` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-07 17:58:32
