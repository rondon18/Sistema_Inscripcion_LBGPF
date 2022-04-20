-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: Localhost    Database: bd_proyecto
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
-- Table structure for table `año-escolar`
--

DROP TABLE IF EXISTS `año-escolar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `año-escolar` (
  `idAño-Escolar` int(11) NOT NULL AUTO_INCREMENT,
  `Inicio_Año_Escolar` varchar(4) COLLATE utf8_bin NOT NULL,
  `Fin_Año_Escolar` varchar(4) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idAño-Escolar`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `año-escolar`
--

LOCK TABLES `año-escolar` WRITE;
/*!40000 ALTER TABLE `año-escolar` DISABLE KEYS */;
/*!40000 ALTER TABLE `año-escolar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactos_auxiliares`
--

DROP TABLE IF EXISTS `contactos_auxiliares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactos_auxiliares` (
  `idContactoAuxiliar` int(11) NOT NULL AUTO_INCREMENT,
  `Relación` varchar(20) COLLATE utf8_bin NOT NULL,
  `Cédula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  `idRepresentante` int(20) NOT NULL,
  PRIMARY KEY (`idContactoAuxiliar`,`idRepresentante`),
  KEY `fk_representantes_auxiliares` (`idRepresentante`),
  KEY `fk_personas_auxiliares` (`Cédula_Persona`),
  CONSTRAINT `fk_personas_auxiliares` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_representantes_auxiliares` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactos_auxiliares`
--

LOCK TABLES `contactos_auxiliares` WRITE;
/*!40000 ALTER TABLE `contactos_auxiliares` DISABLE KEYS */;
INSERT INTO `contactos_auxiliares` VALUES (7,'Vecino','27919567',3);
/*!40000 ALTER TABLE `contactos_auxiliares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos-economicos`
--

DROP TABLE IF EXISTS `datos-economicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos-economicos` (
  `idDatos-economicos` int(11) NOT NULL AUTO_INCREMENT,
  `Banco` varchar(45) NOT NULL,
  `Tipo_Cuenta` varchar(45) NOT NULL,
  `Cta_Bancaria` varchar(45) NOT NULL,
  `idRepresentantes` int(11) NOT NULL,
  PRIMARY KEY (`idDatos-economicos`,`idRepresentantes`),
  KEY `fk_datos-economicos_representantes1_idx` (`idRepresentantes`),
  CONSTRAINT `fk_datos-economicos_representantes1` FOREIGN KEY (`idRepresentantes`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-economicos`
--

LOCK TABLES `datos-economicos` WRITE;
/*!40000 ALTER TABLE `datos-economicos` DISABLE KEYS */;
INSERT INTO `datos-economicos` VALUES (1,'Banco Provincial, S.A.','Corriente','1351351351384135',3);
/*!40000 ALTER TABLE `datos-economicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos-laborales`
--

DROP TABLE IF EXISTS `datos-laborales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos-laborales` (
  `idDatos-laborales` int(11) NOT NULL AUTO_INCREMENT,
  `Empleo` varchar(45) NOT NULL,
  `Lugar_Trabajo` varchar(45) DEFAULT NULL,
  `Remuneración` varchar(45) DEFAULT NULL,
  `Tipo_Remuneración` varchar(45) DEFAULT NULL,
  `idRepresentantes` int(11) NOT NULL,
  PRIMARY KEY (`idDatos-laborales`,`idRepresentantes`),
  KEY `fk_datos-laborales_representantes1_idx` (`idRepresentantes`),
  CONSTRAINT `fk_datos-laborales_representantes1` FOREIGN KEY (`idRepresentantes`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-laborales`
--

LOCK TABLES `datos-laborales` WRITE;
/*!40000 ALTER TABLE `datos-laborales` DISABLE KEYS */;
INSERT INTO `datos-laborales` VALUES (4,'Desempleado','','','',3);
/*!40000 ALTER TABLE `datos-laborales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos-salud`
--

DROP TABLE IF EXISTS `datos-salud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos-salud` (
  `idDatos-Medicos` int(11) NOT NULL AUTO_INCREMENT,
  `Estatura` int(11) NOT NULL,
  `Peso` int(11) NOT NULL,
  `Indice` varchar(45) COLLATE utf8_bin NOT NULL,
  `Circ_Braquial` int(11) NOT NULL,
  `Lateralidad` varchar(45) COLLATE utf8_bin NOT NULL,
  `Tipo_Sangre` varchar(45) COLLATE utf8_bin NOT NULL,
  `Medicación` varchar(50) COLLATE utf8_bin NOT NULL,
  `Dieta_Especial` varchar(50) COLLATE utf8_bin NOT NULL,
  `Impedimento_Físico` varchar(60) COLLATE utf8_bin NOT NULL,
  `Alergias` varchar(50) COLLATE utf8_bin NOT NULL,
  `Cond_Vista` varchar(45) COLLATE utf8_bin NOT NULL,
  `Cond_Dental` varchar(45) COLLATE utf8_bin NOT NULL,
  `Institucion_Medica` varchar(50) COLLATE utf8_bin NOT NULL,
  `Carnet_Discapacidad` varchar(20) COLLATE utf8_bin NOT NULL,
  `idEstudiantes` int(11) NOT NULL,
  PRIMARY KEY (`idDatos-Medicos`,`idEstudiantes`),
  KEY `idUsuarios_idx` (`idEstudiantes`),
  CONSTRAINT `fk_Estudiantes_Datos-Medicos` FOREIGN KEY (`idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-salud`
--

LOCK TABLES `datos-salud` WRITE;
/*!40000 ALTER TABLE `datos-salud` DISABLE KEYS */;
/*!40000 ALTER TABLE `datos-salud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos-sociales`
--

DROP TABLE IF EXISTS `datos-sociales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos-sociales` (
  `idDatos-Sociales` int(11) NOT NULL AUTO_INCREMENT,
  `Posee_Canaima` char(2) COLLATE utf8_bin NOT NULL,
  `Condicion_Canaima` varchar(45) COLLATE utf8_bin NOT NULL,
  `Posee_Carnet_Patria` char(2) COLLATE utf8_bin NOT NULL,
  `Codigo_Carnet_Patria` varchar(20) COLLATE utf8_bin NOT NULL,
  `Serial_Carnet_Patria` varchar(20) COLLATE utf8_bin NOT NULL,
  `Acceso_Internet` varchar(45) COLLATE utf8_bin NOT NULL,
  `Con_Quien_Vive` varchar(45) COLLATE utf8_bin NOT NULL,
  `idEstudiantes` int(11) NOT NULL,
  PRIMARY KEY (`idDatos-Sociales`,`idEstudiantes`),
  KEY `idEstudiantes_idx` (`idEstudiantes`),
  CONSTRAINT `fk_Estudiantes_Datos-Sociales` FOREIGN KEY (`idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-sociales`
--

LOCK TABLES `datos-sociales` WRITE;
/*!40000 ALTER TABLE `datos-sociales` DISABLE KEYS */;
/*!40000 ALTER TABLE `datos-sociales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos-tallas`
--

DROP TABLE IF EXISTS `datos-tallas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos-tallas` (
  `idDatos-Tallas` int(11) NOT NULL AUTO_INCREMENT,
  `Talla_Camisa` varchar(45) COLLATE utf8_bin NOT NULL,
  `Talla_Pantalón` varchar(45) COLLATE utf8_bin NOT NULL,
  `Talla_Zapatos` varchar(45) COLLATE utf8_bin NOT NULL,
  `idEstudiantes` int(11) NOT NULL,
  PRIMARY KEY (`idDatos-Tallas`,`idEstudiantes`),
  KEY `idEstudiantes_idx` (`idEstudiantes`),
  CONSTRAINT `fk_Estudiantes_Datos-Tallas` FOREIGN KEY (`idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-tallas`
--

LOCK TABLES `datos-tallas` WRITE;
/*!40000 ALTER TABLE `datos-tallas` DISABLE KEYS */;
/*!40000 ALTER TABLE `datos-tallas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos-vivienda`
--

DROP TABLE IF EXISTS `datos-vivienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos-vivienda` (
  `idDatos-vivienda` int(11) NOT NULL AUTO_INCREMENT,
  `Condiciones_Vivienda` varchar(25) NOT NULL,
  `Tipo_Vivienda` varchar(25) NOT NULL,
  `Tenencia_Vivienda` varchar(25) NOT NULL,
  `idRepresentante` int(11) NOT NULL,
  PRIMARY KEY (`idDatos-vivienda`),
  KEY `fk_representantes_vivienda` (`idRepresentante`),
  CONSTRAINT `fk_representantes_vivienda` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-vivienda`
--

LOCK TABLES `datos-vivienda` WRITE;
/*!40000 ALTER TABLE `datos-vivienda` DISABLE KEYS */;
INSERT INTO `datos-vivienda` VALUES (1,'Buena','Casa','Propia',3);
/*!40000 ALTER TABLE `datos-vivienda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiantes` (
  `idEstudiantes` int(11) NOT NULL AUTO_INCREMENT,
  `Plantel_Procedencia` text COLLATE utf8_bin NOT NULL,
  `Con_Quien_Vive` varchar(25) COLLATE utf8_bin NOT NULL,
  `Cedula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  `idRepresentante` int(11) NOT NULL,
  `idPadre` int(11) NOT NULL,
  PRIMARY KEY (`idEstudiantes`,`Cedula_Persona`,`idRepresentante`,`idPadre`),
  KEY `Cedula_Persona_idx` (`Cedula_Persona`),
  KEY `id_Representante_idx` (`idRepresentante`),
  KEY `fk_estudiantes_padres1_idx` (`idPadre`),
  CONSTRAINT `fk_Personas_Estudiantes` FOREIGN KEY (`Cedula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Representantes_Estudiantes` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_estudiantes_padres1` FOREIGN KEY (`idPadre`) REFERENCES `padres` (`idPadres`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes`
--

LOCK TABLES `estudiantes` WRITE;
/*!40000 ALTER TABLE `estudiantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiantes-observaciones`
--

DROP TABLE IF EXISTS `estudiantes-observaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiantes-observaciones` (
  `idObservaciones` int(11) NOT NULL AUTO_INCREMENT,
  `Social` text DEFAULT NULL,
  `Físico` text DEFAULT NULL,
  `Personal` text DEFAULT NULL,
  `Familiar` text DEFAULT NULL,
  `Academico` text DEFAULT NULL,
  `Otra` text DEFAULT NULL,
  `idEstudiantes` int(11) NOT NULL,
  PRIMARY KEY (`idObservaciones`),
  KEY `fk_estudiantes_observaciones` (`idEstudiantes`),
  CONSTRAINT `fk_estudiantes_observaciones` FOREIGN KEY (`idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes-observaciones`
--

LOCK TABLES `estudiantes-observaciones` WRITE;
/*!40000 ALTER TABLE `estudiantes-observaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiantes-observaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiantes-repitentes`
--

DROP TABLE IF EXISTS `estudiantes-repitentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiantes-repitentes` (
  `idEstudiante-Repitente` int(11) NOT NULL AUTO_INCREMENT,
  `Materias_Pendientes` varchar(50) COLLATE utf8_bin NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  PRIMARY KEY (`idEstudiante-Repitente`,`idEstudiante`),
  KEY `idEstudiantes_idx` (`idEstudiante`),
  CONSTRAINT `fk_Estudiantes_Materias-Pendientes` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes-repitentes`
--

LOCK TABLES `estudiantes-repitentes` WRITE;
/*!40000 ALTER TABLE `estudiantes-repitentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiantes-repitentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado`
--

DROP TABLE IF EXISTS `grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grado` (
  `idGrado` int(11) NOT NULL AUTO_INCREMENT,
  `Grado_A_Cursar` varchar(45) COLLATE utf8_bin NOT NULL,
  `idEstudiantes` int(11) NOT NULL,
  `idAño-Escolar` int(11) NOT NULL,
  PRIMARY KEY (`idGrado`,`idEstudiantes`,`idAño-Escolar`),
  KEY `idEstudiante_idx` (`idEstudiantes`),
  KEY `fk_Año-Escolar_Grado` (`idAño-Escolar`),
  CONSTRAINT `fk_Año-Escolar_Grado` FOREIGN KEY (`idAño-Escolar`) REFERENCES `año-escolar` (`idAño-Escolar`),
  CONSTRAINT `fk_Estudiantes_Grado` FOREIGN KEY (`idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
/*!40000 ALTER TABLE `grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscripciones`
--

DROP TABLE IF EXISTS `inscripciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscripciones` (
  `idInscripciones` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha_Inscripcion` varchar(12) COLLATE utf8_bin NOT NULL,
  `Hora_Inscripción` varchar(12) COLLATE utf8_bin NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  PRIMARY KEY (`idInscripciones`,`idUsuario`,`idEstudiante`),
  KEY `idEstudiante_idx` (`idEstudiante`),
  KEY `idUsuarios_idx` (`idUsuario`),
  CONSTRAINT `fk_Estudiantes_Inscripciones` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Usuarios_Inscripciones` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscripciones`
--

LOCK TABLES `inscripciones` WRITE;
/*!40000 ALTER TABLE `inscripciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscripciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `padres`
--

DROP TABLE IF EXISTS `padres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `padres` (
  `idPadres` int(11) NOT NULL AUTO_INCREMENT,
  `Parentezco` varchar(45) COLLATE utf8_bin NOT NULL,
  `Cedula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idPadres`,`Cedula_Persona`),
  UNIQUE KEY `Cedula_Persona_UNIQUE` (`Cedula_Persona`),
  KEY `Cedula_Persona_idx` (`Cedula_Persona`),
  CONSTRAINT `Cedula_Persona` FOREIGN KEY (`Cedula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `padres`
--

LOCK TABLES `padres` WRITE;
/*!40000 ALTER TABLE `padres` DISABLE KEYS */;
/*!40000 ALTER TABLE `padres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personas` (
  `idPersonas` int(11) NOT NULL AUTO_INCREMENT,
  `Primer_Nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `Segundo_Nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `Primer_Apellido` varchar(45) COLLATE utf8_bin NOT NULL,
  `Segundo_Apellido` varchar(45) COLLATE utf8_bin NOT NULL,
  `Cédula` varchar(15) COLLATE utf8_bin NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Lugar_Nacimiento` varchar(100) COLLATE utf8_bin NOT NULL,
  `Género` varchar(45) COLLATE utf8_bin NOT NULL,
  `Correo_Electrónico` varchar(45) COLLATE utf8_bin NOT NULL,
  `Dirección` text COLLATE utf8_bin NOT NULL,
  `Estado_Civil` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idPersonas`),
  UNIQUE KEY `Cédula_UNIQUE` (`Cédula`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (5,'Elber','Alonso','Rondón','Hernández','27919566','2001-05-05','Mérida','M','earh_2001@outlook.com','La Pedregosa Alta','S'),(10,'Elber','Alonso','Rondón','Hernández','27919567','2001-05-05','Mérida','M','earh_2001@outlook.com','La Pedregosa Alta','S'),(12,'María','Gabriela','Ballestero','Rodríguez','28636530','2002-05-09','Caja Seca','F','mgbrodriguez952@gmail.com','Caja Seca','S');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `representantes`
--

DROP TABLE IF EXISTS `representantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `representantes` (
  `idRepresentantes` int(11) NOT NULL AUTO_INCREMENT,
  `Vinculo` varchar(45) COLLATE utf8_bin NOT NULL,
  `Grado_Academico` varchar(15) COLLATE utf8_bin NOT NULL,
  `Cedula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idRepresentantes`),
  KEY `fk_personas_representantes` (`Cedula_Persona`),
  CONSTRAINT `fk_personas_representantes` FOREIGN KEY (`Cedula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `representantes`
--

LOCK TABLES `representantes` WRITE;
/*!40000 ALTER TABLE `representantes` DISABLE KEYS */;
INSERT INTO `representantes` VALUES (3,'Padre','Bachillerato','27919566');
/*!40000 ALTER TABLE `representantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teléfonos`
--

DROP TABLE IF EXISTS `teléfonos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teléfonos` (
  `idTeléfonos` int(11) NOT NULL AUTO_INCREMENT,
  `Prefijo` varchar(4) NOT NULL,
  `Número_Telefónico` varchar(10) NOT NULL,
  `Relación_Teléfono` varchar(20) NOT NULL,
  `Cedula_Persona` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idTeléfonos`),
  KEY `fk_personas_teléfonos` (`Cedula_Persona`),
  CONSTRAINT `fk_personas_teléfonos` FOREIGN KEY (`Cedula_Persona`) REFERENCES `personas` (`Cédula`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teléfonos`
--

LOCK TABLES `teléfonos` WRITE;
/*!40000 ALTER TABLE `teléfonos` DISABLE KEYS */;
INSERT INTO `teléfonos` VALUES (19,'0416','12345678','Principal','27919566'),(20,'0412','87654321','Secundario','27919566'),(21,'0274','12349587','Auxiliar','27919566'),(22,'0274','12349587','Trabajo','27919566'),(23,'0416','12345678','Principal','27919567'),(24,'0412','87654321','Secundario','27919567'),(25,'0274','12349587','Auxiliar','27919567');
/*!40000 ALTER TABLE `teléfonos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `Clave` varchar(45) COLLATE utf8_bin NOT NULL,
  `Privilegios` int(11) NOT NULL,
  `Cedula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idUsuarios`),
  KEY `Cedula_Persona_idx` (`Cedula_Persona`),
  CONSTRAINT `fk_personas_usuarios` FOREIGN KEY (`Cedula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (2,'12345',2,'27919566'),(4,'12345',1,'28636530');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-20  0:44:25
