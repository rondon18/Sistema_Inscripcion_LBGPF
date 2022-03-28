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
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumnos` (
  `idAlumnos` int(11) NOT NULL AUTO_INCREMENT,
  `Plantel_Procedencia` text COLLATE utf8_bin NOT NULL,
  `Cedula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  `idRepresentante` int(11) NOT NULL,
  `idPadre` int(11) NOT NULL,
  PRIMARY KEY (`idAlumnos`,`Cedula_Persona`,`idRepresentante`,`idPadre`),
  KEY `Cedula_Persona_idx` (`Cedula_Persona`),
  KEY `id_Representante_idx` (`idRepresentante`),
  KEY `fk_alumnos_padres1_idx` (`idPadre`),
  CONSTRAINT `fk_Personas_Alumnos` FOREIGN KEY (`Cedula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Representantes_Alumnos` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_alumnos_padres1` FOREIGN KEY (`idPadre`) REFERENCES `padres` (`idPadres`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (16,'fjsafkahdfvkjsadhvhf','hchjchg',45,1),(17,'jbjhabvdjahsdbvasdj','jhbkhbjgvjy',45,2),(18,'skjvbflhsjdfvskhaf','jvhjhvjyvkyvuij',45,1),(19,'Prueba','Prueba',57,3);
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumnos-repitentes`
--

DROP TABLE IF EXISTS `alumnos-repitentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumnos-repitentes` (
  `idAlumno-Repitente` int(11) NOT NULL AUTO_INCREMENT,
  `Materias_Pendientes` varchar(50) COLLATE utf8_bin NOT NULL,
  `idAlumno` int(11) NOT NULL,
  PRIMARY KEY (`idAlumno-Repitente`,`idAlumno`),
  KEY `idAlumnos_idx` (`idAlumno`),
  CONSTRAINT `fk_Alumnos_Materias-Pendientes` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`idAlumnos`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos-repitentes`
--

LOCK TABLES `alumnos-repitentes` WRITE;
/*!40000 ALTER TABLE `alumnos-repitentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumnos-repitentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `año-escolar`
--

DROP TABLE IF EXISTS `año-escolar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `año-escolar` (
  `idAño-Escolar` int(11) NOT NULL AUTO_INCREMENT,
  `Año_Escolar` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idAño-Escolar`),
  UNIQUE KEY `Año_Escolar` (`Año_Escolar`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
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
  `idRepresentante` int(20) NOT NULL,
  `Relación` varchar(20) COLLATE utf8_bin NOT NULL,
  `Nombre_Aux` varchar(30) COLLATE utf8_bin NOT NULL,
  `Tfl_P_Contacto_Aux` varchar(15) COLLATE utf8_bin NOT NULL,
  `Tfl_S_Contacto_Aux` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idContactoAuxiliar`,`idRepresentante`),
  KEY `fk_representantes_auxiliares` (`idRepresentante`),
  CONSTRAINT `fk_representantes_auxiliares` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactos_auxiliares`
--

LOCK TABLES `contactos_auxiliares` WRITE;
/*!40000 ALTER TABLE `contactos_auxiliares` DISABLE KEYS */;
INSERT INTO `contactos_auxiliares` VALUES (7,45,'Yo','Yo','8135431354','435168413'),(8,54,'hjcgjhgchgcjhgc','jgfchgchcghgc','hgchjgchjgchgc','hgchgchjgchjgc'),(9,55,'ssw','s','2222','1234789'),(10,56,'ssw','s','2222','1234789'),(11,57,'Padre','Admin','123456','789123');
/*!40000 ALTER TABLE `contactos_auxiliares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos-medicos`
--

DROP TABLE IF EXISTS `datos-medicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos-medicos` (
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
  `idAlumnos` int(11) NOT NULL,
  PRIMARY KEY (`idDatos-Medicos`,`idAlumnos`),
  KEY `idUsuarios_idx` (`idAlumnos`),
  CONSTRAINT `fk_Alumnos_Datos-Medicos` FOREIGN KEY (`idAlumnos`) REFERENCES `alumnos` (`idAlumnos`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-medicos`
--

LOCK TABLES `datos-medicos` WRITE;
/*!40000 ALTER TABLE `datos-medicos` DISABLE KEYS */;
INSERT INTO `datos-medicos` VALUES (2,5131351,3153513,'13513',5135131,'Diestro','O+','sdfsdfsdfsdf','afsdfsfsdf','Motora,Auditiva,Escritura,','sdfsjkfbsdkjf','Regular','Regular','adfsdfdsfsdfs','sdfsdfsdfsdf',16),(3,1,22,'1',2,'Zurdo','AB-','asdasfadsfd','asdasdsad','Visual, Motora, Auditiva, Escritura, Lectura, Embarazo','hfcjtch','Buena','Mala','asdasddfdff','sdfsdffbfg',17),(4,2,2,'2',2,'Ambidextro','O+','','hgfgdfgdfg','Visual, Auditiva, Lectura','gcujytchjgchj','Buena','Buena','','13581435',18),(5,0,0,'Prueba',0,'Ambidextro','O+','Prueba','Prueba','Visual, Motora, Auditiva, Escritura, Lectura, Embarazo','Prueba','Buena','Buena','Prueba','Prueba',19);
/*!40000 ALTER TABLE `datos-medicos` ENABLE KEYS */;
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
  `idAlumnos` int(11) NOT NULL,
  PRIMARY KEY (`idDatos-Sociales`,`idAlumnos`),
  KEY `idAlumnos_idx` (`idAlumnos`),
  CONSTRAINT `fk_Alumnos_Datos-Sociales` FOREIGN KEY (`idAlumnos`) REFERENCES `alumnos` (`idAlumnos`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-sociales`
--

LOCK TABLES `datos-sociales` WRITE;
/*!40000 ALTER TABLE `datos-sociales` DISABLE KEYS */;
INSERT INTO `datos-sociales` VALUES (2,'Si','Muy buenas condiciones','Si','2513514','31638541351','Si',16),(3,'Si','Muy buenas condiciones','Si','16384135418413','341854135841','Si',17),(4,'Si','Malas condiciones','No','','','Si',18),(5,'Si','Muy buenas condiciones','Si','Prueba','Prueba','Si',19);
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
  `idAlumnos` int(11) NOT NULL,
  PRIMARY KEY (`idDatos-Tallas`,`idAlumnos`),
  KEY `idAlumnos_idx` (`idAlumnos`),
  CONSTRAINT `fk_Alumnos_Datos-Tallas` FOREIGN KEY (`idAlumnos`) REFERENCES `alumnos` (`idAlumnos`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-tallas`
--

LOCK TABLES `datos-tallas` WRITE;
/*!40000 ALTER TABLE `datos-tallas` DISABLE KEYS */;
INSERT INTO `datos-tallas` VALUES (1,'35135135','351351','1351351',16),(2,'351','351','35132',17),(3,'3','2','3',18),(4,'Prueba','Prueba','Prueba',19);
/*!40000 ALTER TABLE `datos-tallas` ENABLE KEYS */;
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
  `idAlumnos` int(11) NOT NULL,
  `idAño-Escolar` int(11) NOT NULL,
  PRIMARY KEY (`idGrado`,`idAlumnos`,`idAño-Escolar`),
  KEY `idAlumno_idx` (`idAlumnos`),
  KEY `fk_Año-Escolar_Grado` (`idAño-Escolar`),
  CONSTRAINT `fk_Alumnos_Grado` FOREIGN KEY (`idAlumnos`) REFERENCES `alumnos` (`idAlumnos`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Año-Escolar_Grado` FOREIGN KEY (`idAño-Escolar`) REFERENCES `año-escolar` (`idAño-Escolar`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
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
  `Fecha_Inscripcion` date NOT NULL,
  `Hora_Inscripción` date NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  PRIMARY KEY (`idInscripciones`,`idUsuario`,`idAlumno`),
  KEY `idAlumno_idx` (`idAlumno`),
  KEY `idUsuarios_idx` (`idUsuario`),
  CONSTRAINT `fk_Alumnos_Inscripciones` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`idAlumnos`) ON DELETE CASCADE ON UPDATE CASCADE,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `padres`
--

LOCK TABLES `padres` WRITE;
/*!40000 ALTER TABLE `padres` DISABLE KEYS */;
INSERT INTO `padres` VALUES (1,'Padre','27919566'),(2,'Madre','762354726345'),(3,'Madre','Prueba1');
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
  `Nombres` varchar(45) COLLATE utf8_bin NOT NULL,
  `Apellidos` varchar(45) COLLATE utf8_bin NOT NULL,
  `Cédula` varchar(15) COLLATE utf8_bin NOT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Lugar_Nacimiento` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Género` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `Correo_Electronico` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `Dirección` text COLLATE utf8_bin DEFAULT NULL,
  `Teléfono_Principal` varchar(15) COLLATE utf8_bin NOT NULL,
  `Teléfono_Auxiliar` varchar(15) COLLATE utf8_bin NOT NULL,
  `Estado_Civil` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idPersonas`),
  UNIQUE KEY `Cédula_UNIQUE` (`Cédula`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (164,'Elber Alonso','Rondón Hernández','27919566','2001-05-05','Merida','M','earh_2001@outlook.com','La Pedregosa Alta','04123569252','04163569245','Soltero(a)'),(202,'gf xfgxgh','xghfx gxgh','vjhgchchgc','0000-00-00','vhgchjgcyhfc','F','habsd@jsadbdf','fxgfxgf','vcgfxhgf','xhgfxghf','Soltero(a)'),(203,'gv hgcvhgc','hjcjhgc hchgc','hgchc','0011-11-11','cvhjgcjhc','F','jhgc@vbchgfcjhg','fxgfxgf','cvhjgchjcx','xhjchjc','Soltero(a)'),(213,'54168416351jvghgc hgchc','hchgch chgchgc','hgchgchgchgchgc','0011-11-11','jvhcghc','M','cvhgcv@hvhjgc','cjhcchfchjgc','jhvihgcdhfxjhfx','hfcxhgjfxjhgcxh','Casado(a)'),(215,'d d','d d','23477234','0000-00-00','d','F','dd@ddd','sss','12347','1234','Soltero(a)'),(216,'d d','d d','1','1111-11-11','d','F','f@ggg','ggh','12347','1234','Soltero(a)'),(218,'d e','e d','12341234','2222-02-22','e','F','gg@gg','','12','12','Soltero(a)'),(256,'asdhabvsjdv jkvjksadhvfjshvfjkhv','jvjcvjgchcjhgc hjchfcxjhgc','hchjchg','0222-02-22','hchxgj','M','asd@hsdfb','vjshdvfjshdvfjkshvdfjk','gfxghdxg','fxghfxg','Soltero(a)'),(257,'hjavjdhvasdj jhvajdhvjsdhv','jvjhsadfvsjkdhfv vjsahdfvsjhdfv','762354726345','0122-02-11','hcxfxas','F','ashjv@dhsjv','bkjadbalksduihwiajbdk','42351351','38543514','Soltero(a)'),(258,'gvhgcvh chjgchgchj','gcjhgchgcjh gchgchjgchgc','jhbkhbjgvjy','1111-11-11','nbchjctc','F','asjsb@jhsvfsd','bkjadbalksduihwiajbdk','5135413581','351851351','Soltero(a)'),(259,'Admin Admin','Admin Admin','123456789','2022-02-13','Mérida','M','direccion@gpf.com','Santa monica','123456789','123456789','Soltero(a)'),(260,'hvcjuyfvkjycvjukv jgvcjkvjh,jyvkh','jkyvkhvjkhvk hvjhgvkjhvjhvjkhv','jvhjhvjyvkyvuij','1111-11-11','htdfchgcxhjrxc','M','sdfs@sdhfvsjdhfv','jkavbgfjhvfksj','nbskdjfbsfsjbkf','cjyhtcjhtcjh','Soltero(a)'),(261,'Prueba Prueba','Prueba Prueba','Prueba1','2222-02-22','Prueba','F','Prueba@Prueba1','Prueba','Prueba','Prueba','Soltero(a)'),(262,'Prueba Prueba','Prueba Prueba','Prueba','2222-02-22','Prueba','M','Prueba@Prueba','Prueba','Prueba','Prueba','Soltero(a)');
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
  `Banco` varchar(45) COLLATE utf8_bin NOT NULL,
  `Tipo_Cuenta` varchar(45) COLLATE utf8_bin NOT NULL,
  `Cta_Bancaria` varchar(20) COLLATE utf8_bin NOT NULL,
  `Grado_Inst` varchar(45) COLLATE utf8_bin NOT NULL,
  `Empleo` varchar(45) COLLATE utf8_bin NOT NULL,
  `Lugar_Trabajo` varchar(50) COLLATE utf8_bin NOT NULL,
  `Teléfono_Trabajo` varchar(11) COLLATE utf8_bin NOT NULL,
  `Remuneracion` int(11) DEFAULT NULL,
  `Tipo_Remuneración` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `Cedula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idRepresentantes`),
  KEY `fk_personas_representantes` (`Cedula_Persona`),
  CONSTRAINT `fk_personas_representantes` FOREIGN KEY (`Cedula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `representantes`
--

LOCK TABLES `representantes` WRITE;
/*!40000 ALTER TABLE `representantes` DISABLE KEYS */;
INSERT INTO `representantes` VALUES (45,'Padre','Banco Provincial, S.A.','Corriente','214748364743651','Bachillerato','Desempleado','','',0,'','27919566'),(54,'Padre','Banco Mercantil, C.A','Ahorro','2147483647','Primaria','38435123843','51368413514','2135814351',384135138,'Diaria','hgchgchgchgchgc'),(55,'Padre','Banco de Venezuela S.A.','Ahorro','12121212121212121212','Bachillerato','Vendedora','hh','1234789',0,'Diaria','23477234'),(56,'Madre','Banco de Venezuela S.A.','Ahorro','12121212121212121212','Bachillerato','Vendedora','k','1234789',0,'Diaria','1'),(57,'Padre','Provincial','Corriente','1613468463468464','Bachilleratp','Directivo','Liceo Gonzalo Picon Febres','1234567890',10000000,'mensual','123456789');
/*!40000 ALTER TABLE `representantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `Clave` varchar(45) COLLATE utf8_bin NOT NULL,
  `Privilegios` int(11) NOT NULL,
  `Cedula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  `idRepresentante` int(11) NOT NULL,
  PRIMARY KEY (`idUsuarios`,`Cedula_Persona`),
  KEY `Cedula_Persona_idx` (`Cedula_Persona`),
  KEY `fk_represntantes_usuarios_idx` (`idRepresentante`),
  CONSTRAINT `fk_personas_usuarios` FOREIGN KEY (`Cedula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_represntantes_usuarios` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'12345',2,'123456789',57),(61,'1234',1,'27919566',45),(62,'1234',1,'hgchgchgchgchgc',54),(63,'Aa1234..',1,'23477234',55),(64,'Aa1234..',1,'1',56);
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

-- Dump completed on 2022-03-27 19:53:02
