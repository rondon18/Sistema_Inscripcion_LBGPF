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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `año-escolar`
--

LOCK TABLES `año-escolar` WRITE;
/*!40000 ALTER TABLE `año-escolar` DISABLE KEYS */;
INSERT INTO `año-escolar` VALUES (12,'2022','2023');
/*!40000 ALTER TABLE `año-escolar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora` (
  `idBitacora` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuarios` int(11) NOT NULL,
  `fechaInicioSesion` date NOT NULL,
  `horaInicioSesion` time NOT NULL,
  `linksVisitados` text NOT NULL,
  `fechaFinalSesion` date DEFAULT NULL,
  `horaFinalSesion` time DEFAULT NULL,
  PRIMARY KEY (`idBitacora`),
  KEY `fk_usuarios_bitacora` (`idUsuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` VALUES (1,2,'2022-04-22','17:34:06','Muchos,ajshdvjasgdvjashdvjh','2022-04-22','19:34:06'),(2,2,'2022-04-26','01:51:36','/proyecto_pst/controladores/login.php','0000-00-00','00:00:00'),(3,2,'2022-04-26','01:52:40','Inicia Sesión,Visita menú principal,Visita menú principal,Visita menú principal,Visita menú principal,Visita menú principal,Visita menú principal,Visita menú principal,Visita perfil,Visita perfil,Visita perfil',NULL,NULL),(4,2,'2022-04-26','02:18:26','Inicia Sesión,Visita menú principal',NULL,NULL),(5,4,'2022-04-26','02:19:36','Inicia Sesión,Visita menú principal',NULL,NULL),(6,2,'2022-04-26','04:26:27','Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal, Cierra sesión.','2022-04-26','04:34:54'),(7,2,'2022-04-26','04:34:59','Inicia Sesión, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-04-26','09:08:52'),(8,4,'2022-04-26','09:08:59','Inicia Sesión, Visita menú principal',NULL,NULL),(9,2,'2022-04-28','22:22:54','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil',NULL,NULL),(10,2,'2022-04-30','13:41:12','Inicia Sesión, Visita menú principal, Visita menú principal, Cierra sesión.','2022-04-30','13:42:21'),(11,11,'2022-04-30','14:51:41','Inicia Sesión, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita menú principal, Cierra sesión.','2022-04-30','14:57:15'),(12,11,'2022-04-30','14:57:22','Inicia Sesión, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Edita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Edita perfil, Edita perfil',NULL,NULL),(13,2,'2022-04-30','15:27:52','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil',NULL,NULL),(14,2,'2022-04-30','15:52:39','Inicia Sesión, Visita menú principal, Visita menú principal',NULL,NULL),(15,11,'2022-04-30','15:52:50','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-04-30','16:04:32'),(16,11,'2022-04-30','21:26:16','Inicia Sesión, Visita menú principal, Visita perfil',NULL,NULL),(17,2,'2022-04-30','21:26:49','Inicia Sesión, Visita menú principal, Visita perfil',NULL,NULL),(18,2,'2022-04-30','21:27:17','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.','2022-04-30','21:33:23'),(19,2,'2022-04-30','21:33:26','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.','2022-04-30','22:35:59'),(20,2,'2022-04-30','23:27:04','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-01','01:50:43'),(21,4,'2022-05-01','01:50:47','Inicia Sesión, Visita menú principal',NULL,NULL),(22,2,'2022-05-01','02:38:49','Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-01','02:48:25'),(23,4,'2022-05-01','02:48:29','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.','2022-05-01','05:09:23'),(24,4,'2022-05-01','05:09:28','Inicia Sesión, Visita menú principal, Visita perfil',NULL,NULL),(25,2,'2022-05-01','13:32:14','Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-01','15:18:11'),(26,4,'2022-05-01','15:18:15','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil',NULL,NULL),(27,4,'2022-05-01','19:44:49','Inicia Sesión, Visita menú principal, Visita menú principal, Visita menú principal, Cierra sesión.','2022-05-02','04:33:24'),(28,11,'2022-05-02','01:42:01','Inicia Sesión, Visita menú principal',NULL,NULL),(29,2,'2022-05-02','04:34:31','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-02','16:14:13'),(30,12,'2022-05-02','04:40:10','Inicia Sesión, Visita menú principal, Visita perfil',NULL,NULL),(31,2,'2022-05-02','04:42:32','Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.','2022-05-02','05:24:55'),(32,12,'2022-05-02','05:25:21','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita menú principal, Cierra sesión.','2022-05-02','06:50:03'),(33,4,'2022-05-02','06:50:22','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal',NULL,NULL),(34,4,'2022-05-02','13:56:51','Inicia Sesión, Visita menú principal, Consulta estudiantes',NULL,NULL),(35,4,'2022-05-02','16:14:55','Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-04','01:20:02'),(36,2,'2022-05-03','11:56:17','Inicia Sesión, Visita menú principal, Visita perfil',NULL,NULL),(37,4,'2022-05-03','12:02:53','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.','2022-05-03','12:14:09'),(38,4,'2022-05-03','13:03:19','Inicia Sesión, Visita menú principal, Consulta estudiantes',NULL,NULL),(39,2,'2022-05-03','13:48:26','Inicia Sesión, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-03','14:06:22'),(40,5,'2022-05-03','14:06:39','Inicia Sesión, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-03','14:58:41'),(41,2,'2022-05-03','14:58:46','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.','2022-05-03','15:03:36'),(42,2,'2022-05-03','15:03:42','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.','2022-05-03','15:06:12'),(43,5,'2022-05-03','15:06:29','Inicia Sesión, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita perfil,Se da de baja, Cierra sesión.','2022-05-03','15:11:16'),(44,2,'2022-05-03','15:13:04','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.','2022-05-03','15:43:35'),(45,4,'2022-05-03','16:24:51','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal',NULL,NULL),(46,4,'2022-05-03','16:28:32','Inicia Sesión, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal',NULL,NULL),(47,4,'2022-05-03','16:43:16','Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-03','22:04:02'),(48,2,'2022-05-03','22:17:23','Inicia Sesión, Visita menú principal, Cierra sesión.','2022-05-03','22:17:26'),(49,4,'2022-05-03','22:17:32','Inicia Sesión, Visita menú principal, Cierra sesión.','2022-05-03','22:17:35'),(50,4,'2022-05-03','22:17:54','Inicia Sesión, Visita menú principal, Cierra sesión.','2022-05-03','22:22:30'),(51,4,'2022-05-03','22:22:44','Inicia Sesión, Visita menú principal, Cierra sesión.','2022-05-03','22:22:52'),(52,4,'2022-05-03','22:23:20','Inicia Sesión, Visita menú principal, Cierra sesión.','2022-05-03','22:23:30'),(53,2,'2022-05-03','22:23:41','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-03','22:46:27'),(54,4,'2022-05-03','22:46:48','Inicia Sesión, Visita menú principal, Visita perfil,Se da de baja, Cierra sesión.','2022-05-03','22:47:01'),(55,1,'2022-05-03','22:50:37','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal',NULL,NULL),(56,2,'2022-05-04','01:20:06','Inicia Sesión, Visita menú principal, Cierra sesión.','2022-05-04','01:34:51'),(57,1,'2022-05-04','01:34:55','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes',NULL,NULL),(58,1,'2022-05-04','07:10:27','Inicia Sesión, Visita menú principal',NULL,NULL),(59,2,'2022-05-04','08:57:23','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Consulta estudiantes',NULL,NULL),(60,1,'2022-05-04','15:46:06','Inicia Sesión, Visita menú principal',NULL,NULL),(61,1,'2022-05-05','07:31:24','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-05','08:37:41'),(62,12,'2022-05-05','08:38:20','Inicia Sesión, Visita menú principal, Visita perfil, Visita perfil, Visita menú principal, Visita perfil,Se da de baja, Visita perfil, Visita perfil,Se da de baja, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil,Se da de baja,Se da de baja, Cierra sesión.','2022-05-05','08:43:06'),(63,1,'2022-05-05','08:43:16','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil',NULL,NULL),(64,13,'2022-05-05','18:30:54','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Cierra sesión.','2022-05-05','18:50:07'),(65,13,'2022-05-05','18:52:19','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil',NULL,NULL),(66,1,'2022-05-06','05:53:57','Inicia Sesión, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal',NULL,NULL),(67,2,'2022-05-06','20:47:35','Inicia Sesión, Visita menú principal, Cierra sesión.','2022-05-06','21:57:21'),(68,1,'2022-05-06','21:57:30','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Elimina un usuario, Elimina un usuario, Elimina un usuario, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes',NULL,NULL),(69,1,'2022-05-07','17:50:54','Inicia Sesión, Visita menú principal, Visita menú principal',NULL,NULL);
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carnet-patria`
--

DROP TABLE IF EXISTS `carnet-patria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carnet-patria` (
  `idCarnet` int(11) NOT NULL AUTO_INCREMENT,
  `Código_Carnet` varchar(10) NOT NULL,
  `Serial_Carnet` varchar(10) NOT NULL,
  `Cédula_Persona` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idCarnet`),
  KEY `fk_personas_carnet` (`Cédula_Persona`),
  CONSTRAINT `fk_personas_carnet` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carnet-patria`
--

LOCK TABLES `carnet-patria` WRITE;
/*!40000 ALTER TABLE `carnet-patria` DISABLE KEYS */;
INSERT INTO `carnet-patria` VALUES (1,'1234567890','1234567890','V26666666'),(2,'1234567890','1234567890','V11111111'),(3,'1111111111','2222222222','V27919566'),(4,'3333333333','4444444444','V25555555'),(5,'1234567890','1234567890','V30016821'),(6,'1234567890','1234567890','V17312460');
/*!40000 ALTER TABLE `carnet-patria` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactos_auxiliares`
--

LOCK TABLES `contactos_auxiliares` WRITE;
/*!40000 ALTER TABLE `contactos_auxiliares` DISABLE KEYS */;
INSERT INTO `contactos_auxiliares` VALUES (7,'Vecino','V27919567',3),(10,'ajshdvjasd','V25555555',7),(11,'ajshdvjasd','E16855747',8);
/*!40000 ALTER TABLE `contactos_auxiliares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos-económicos`
--

DROP TABLE IF EXISTS `datos-económicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos-económicos` (
  `idDatos-económicos` int(11) NOT NULL AUTO_INCREMENT,
  `Banco` varchar(45) NOT NULL,
  `Tipo_Cuenta` varchar(45) NOT NULL,
  `Cta_Bancaria` varchar(45) NOT NULL,
  `idRepresentantes` int(11) NOT NULL,
  PRIMARY KEY (`idDatos-económicos`,`idRepresentantes`),
  KEY `fk_datos-económicos_representantes1_idx` (`idRepresentantes`),
  CONSTRAINT `fk_datos-económicos_representantes1` FOREIGN KEY (`idRepresentantes`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-económicos`
--

LOCK TABLES `datos-económicos` WRITE;
/*!40000 ALTER TABLE `datos-económicos` DISABLE KEYS */;
INSERT INTO `datos-económicos` VALUES (1,'Banco Provincial, S.A.','Corriente','1351351351384135',3),(4,'Banco Provincial, S.A.','Corriente','11111111111111111111',7),(5,'Banco Provincial, S.A.','Corriente','11111111111111111111',8);
/*!40000 ALTER TABLE `datos-económicos` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-laborales`
--

LOCK TABLES `datos-laborales` WRITE;
/*!40000 ALTER TABLE `datos-laborales` DISABLE KEYS */;
INSERT INTO `datos-laborales` VALUES (4,'Desempleado','','','',3),(7,'Desempleado','','','',7),(8,'Desktop Support Technician','Fisher-Konopelski','2','Semanal',8);
/*!40000 ALTER TABLE `datos-laborales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos-salud`
--

DROP TABLE IF EXISTS `datos-salud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos-salud` (
  `idDatos-Médicos` int(11) NOT NULL AUTO_INCREMENT,
  `Estatura` int(11) NOT NULL,
  `Peso` int(11) NOT NULL,
  `Índice` varchar(45) COLLATE utf8_bin NOT NULL,
  `Circ_Braquial` int(11) NOT NULL,
  `Lateralidad` varchar(45) COLLATE utf8_bin NOT NULL,
  `Tipo_Sangre` varchar(45) COLLATE utf8_bin NOT NULL,
  `Medicación` varchar(50) COLLATE utf8_bin NOT NULL,
  `Dieta_Especial` varchar(50) COLLATE utf8_bin NOT NULL,
  `Enfermedad` varchar(50) COLLATE utf8_bin NOT NULL,
  `Impedimento_Físico` varchar(60) COLLATE utf8_bin NOT NULL,
  `Alergias` varchar(50) COLLATE utf8_bin NOT NULL,
  `Cond_Vista` varchar(45) COLLATE utf8_bin NOT NULL,
  `Cond_Dental` varchar(45) COLLATE utf8_bin NOT NULL,
  `Institucion_Medica` varchar(50) COLLATE utf8_bin NOT NULL,
  `Carnet_Discapacidad` varchar(20) COLLATE utf8_bin NOT NULL,
  `idEstudiantes` int(11) NOT NULL,
  PRIMARY KEY (`idDatos-Médicos`,`idEstudiantes`),
  UNIQUE KEY `idEstudiantes` (`idEstudiantes`),
  KEY `idUsuarios_idx` (`idEstudiantes`),
  CONSTRAINT `fk_Estudiantes_Datos-Médicos` FOREIGN KEY (`idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-salud`
--

LOCK TABLES `datos-salud` WRITE;
/*!40000 ALTER TABLE `datos-salud` DISABLE KEYS */;
INSERT INTO `datos-salud` VALUES (1,180,35,'1',12,'Diestro','AB-','hjgchjgch','hgchjgch','','Motora, Escritura, Embarazo','cxhchgc','Regular','Mala','vjgcvjgcv','hgchgc',6),(10,1,1,'1',1,'Diestro','AB-','hjgchjgch','hgchjgch','','Motora, Escritura, Embarazo','cxhchgc','Regular','Mala','vjgcvjgcv','hgchgc',1),(13,175,40,'100',100,'Zurdo','AB+','','','','Motora, Escritura,','','Regular','Buena','morbi non lectus aliquam sit amet diam in magna bi','123456789',7);
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
  `Condición_Canaima` varchar(45) COLLATE utf8_bin NOT NULL,
  `Acceso_Internet` varchar(45) COLLATE utf8_bin NOT NULL,
  `idEstudiantes` int(11) NOT NULL,
  PRIMARY KEY (`idDatos-Sociales`,`idEstudiantes`),
  UNIQUE KEY `idEstudiantes` (`idEstudiantes`),
  KEY `idEstudiantes_idx` (`idEstudiantes`),
  CONSTRAINT `fk_Estudiantes_Datos-Sociales` FOREIGN KEY (`idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-sociales`
--

LOCK TABLES `datos-sociales` WRITE;
/*!40000 ALTER TABLE `datos-sociales` DISABLE KEYS */;
INSERT INTO `datos-sociales` VALUES (1,'Si','Muy buenas Condiciones','Si',6),(9,'Si','Muy buenas Condiciones','Si',1),(10,'Si','Muy buenas Condiciones','No',7);
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
  UNIQUE KEY `idEstudiantes` (`idEstudiantes`),
  KEY `idEstudiantes_idx` (`idEstudiantes`),
  CONSTRAINT `fk_Estudiantes_Datos-Tallas` FOREIGN KEY (`idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-tallas`
--

LOCK TABLES `datos-tallas` WRITE;
/*!40000 ALTER TABLE `datos-tallas` DISABLE KEYS */;
INSERT INTO `datos-tallas` VALUES (1,'S','32','36',6),(5,'1','1','11',1),(6,'M','32','37',7);
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
  UNIQUE KEY `idRepresentante` (`idRepresentante`),
  KEY `fk_representantes_vivienda` (`idRepresentante`),
  CONSTRAINT `fk_representantes_vivienda` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-vivienda`
--

LOCK TABLES `datos-vivienda` WRITE;
/*!40000 ALTER TABLE `datos-vivienda` DISABLE KEYS */;
INSERT INTO `datos-vivienda` VALUES (1,'Buena','Casa','Propia',3),(2,'Buena','Casa','Propia',7),(3,'Buena','Casa','Alquilada',8);
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
  `Cédula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  `idRepresentante` int(11) NOT NULL,
  `Relación_Representante` varchar(20) COLLATE utf8_bin NOT NULL,
  `idPadre` int(11) NOT NULL,
  `Relación_Padre` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idEstudiantes`,`Cédula_Persona`,`idRepresentante`,`idPadre`),
  KEY `Cédula_Persona_idx` (`Cédula_Persona`),
  KEY `id_Representante_idx` (`idRepresentante`),
  KEY `fk_estudiantes_padres1_idx` (`idPadre`),
  CONSTRAINT `fk_Personas_Estudiantes` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Representantes_Estudiantes` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_estudiantes_padres1` FOREIGN KEY (`idPadre`) REFERENCES `padres` (`idPadres`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes`
--

LOCK TABLES `estudiantes` WRITE;
/*!40000 ALTER TABLE `estudiantes` DISABLE KEYS */;
INSERT INTO `estudiantes` VALUES (1,'asjbfkajsdbf','Solo','V26666666',3,'Tío',1,'Padre'),(6,'ahbsjdhavda','vjahsfdhavd','V11111111',3,'Abuelo',2,'Padre'),(7,'morbi non lectus aliquam sit amet diam in magna bibendum imperdiet','Padre','V30016821',8,'Padre',3,'Padre');
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
  `Académico` text DEFAULT NULL,
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
  `Año_Repetido` varchar(20) COLLATE utf8_bin NOT NULL,
  `Que_Materias_Repite` varchar(75) COLLATE utf8_bin NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  PRIMARY KEY (`idEstudiante-Repitente`,`idEstudiante`),
  KEY `idEstudiantes_idx` (`idEstudiante`),
  CONSTRAINT `fk_Estudiantes_Materias-Pendientes` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes-repitentes`
--

LOCK TABLES `estudiantes-repitentes` WRITE;
/*!40000 ALTER TABLE `estudiantes-repitentes` DISABLE KEYS */;
INSERT INTO `estudiantes-repitentes` VALUES (1,'Muchas','','',6),(2,'','','',1),(3,'','','',7);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
INSERT INTO `grado` VALUES (1,'Primer año',6,12),(5,'Segundo Año',1,12),(6,'Segundo Año',7,12);
/*!40000 ALTER TABLE `grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Inscripciónes`
--

DROP TABLE IF EXISTS `Inscripciónes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Inscripciónes` (
  `idInscripciónes` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha_Inscripción` varchar(12) COLLATE utf8_bin NOT NULL,
  `Hora_Inscripción` varchar(12) COLLATE utf8_bin NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  PRIMARY KEY (`idInscripciónes`,`idUsuario`,`idEstudiante`),
  KEY `idEstudiante_idx` (`idEstudiante`),
  KEY `idUsuarios_idx` (`idUsuario`),
  CONSTRAINT `fk_Estudiantes_Inscripciónes` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Usuarios_Inscripciónes` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Inscripciónes`
--

LOCK TABLES `Inscripciónes` WRITE;
/*!40000 ALTER TABLE `Inscripciónes` DISABLE KEYS */;
/*!40000 ALTER TABLE `Inscripciónes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `padres`
--

DROP TABLE IF EXISTS `padres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `padres` (
  `idPadres` int(11) NOT NULL AUTO_INCREMENT,
  `País_Residencia` varchar(25) COLLATE utf8_bin NOT NULL,
  `Cédula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idPadres`,`Cédula_Persona`),
  UNIQUE KEY `Cédula_Persona_UNIQUE` (`Cédula_Persona`),
  KEY `Cédula_Persona_idx` (`Cédula_Persona`),
  CONSTRAINT `Cédula_Persona` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `padres`
--

LOCK TABLES `padres` WRITE;
/*!40000 ALTER TABLE `padres` DISABLE KEYS */;
INSERT INTO `padres` VALUES (1,'Venezuela','V25555555'),(2,'España','V27919566'),(3,'Venezuela','V17312460'),(4,'Guatemala','V30016821');
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (5,'Elber','Alonso','Rondón','Hernández','V27919566','2001-05-05','Mérida','M','earh_2001@outlook.com','La Pedregosa Alta','Casado(a)'),(10,'Elber','Alonso','Rondón','Hernández','V27919567','2001-05-05','Mérida','M','earh_2001@outlook.com','La Pedregosa Alta','S'),(12,'María','Gabriela','Ballestero','Rodríguez','V28636530','2002-05-09','Caja Seca','F','mgbrodriguez952@gmail.com','Caja Seca','S'),(13,'Elber','Alonso','Rondón','Hernándes','V27555555','2001-05-05','Mérida','M','earh_2001@outlook.com','La pedregosa','Soltero(a)'),(14,'Elber','Alonso','Rondón','Hernández','V25555555','2001-05-05','','M','ashjfd@sdbf','asjdhvadj',''),(17,'Elber','Alonso','Rondón','Hernández','V26666666','2003-05-05','Mérida','M','ashjfd@sdbf','asjdhvadj','Soltero(a)'),(18,'Hermenegildo','hgcajshgdcjh','gcjhgchjgchjgchj','gcjhgchjgc','V11111111','2006-11-11','hgfvchgcjgfcx','M','jcjhg@sajhdfvsj','En su casa','Soltero(a)'),(20,'Elber','Alonso','Rondón','Hernández','V27919569','2001-05-05','','M','earh2001@outlook.com','',''),(21,'Elber','Alonso','Rondón','Hernández','E12345678','2001-05-05','','M','elber.alonso16@gmail.com','',''),(22,'Carlos','Enrique','Goméz','Lopez','E14635135','2002-05-05','','M','earh2001@outlook.com','',''),(23,'Latia','Egon','Topes','Benes','E23566954','1995-02-20','4 Arkansas Lane','F','ebenes0@utexas.edu','53971 Elmside Junction','Soltero(a)'),(24,'Aldric','Sybilla','Embling','Baptista','V12252106','1973-03-21','634 Bunker Hill Street\r\n','F','sbaptista1@google.cn','961 Dawn Court\r\n','Casado(a)'),(25,'Belia','Briny','Muro','Crannell','E12777408','1962-01-28','6 Loomis Trail','F','bcrannell2@umn.edu','99 4th Hill\r\n','Divorsiado(a)'),(26,'Danit','Alan','Maskrey','Pietasch','V30016821','2009-08-08','9755 Duke Circle','M','apietasch3@hhs.gov','599 Springview Drive\r\n','Casado(a)'),(27,'Chauncey','Deanna','Mackneis','Stables','V17312460','1974-07-12','dstables4@t.co','M','67 Summerview Parkway','0351 La Follette Trail','Soltero(a)'),(28,'Reina','Goldie\n','Gurdon','Musso','E16855747','1985-11-07','78 Stang Drive\r\n','F','rgurdon5@nps.gov','986 Nevada Avenue\r\n','');
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
  `Grado_Académico` varchar(15) COLLATE utf8_bin NOT NULL,
  `Cédula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idRepresentantes`),
  KEY `fk_personas_representantes` (`Cédula_Persona`),
  CONSTRAINT `fk_personas_representantes` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `representantes`
--

LOCK TABLES `representantes` WRITE;
/*!40000 ALTER TABLE `representantes` DISABLE KEYS */;
INSERT INTO `representantes` VALUES (3,'Bachillerato','V27919566'),(7,'Bachillerato','V27555555'),(8,'Bachillerato','V12252106'),(9,'Universitario','E12777408');
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
  `Prefijo` varchar(4) DEFAULT NULL,
  `Número_Telefónico` varchar(10) DEFAULT NULL,
  `Relación_Teléfono` varchar(20) NOT NULL,
  `Cédula_Persona` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idTeléfonos`),
  KEY `fk_personas_teléfonos` (`Cédula_Persona`),
  CONSTRAINT `fk_personas_teléfonos` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teléfonos`
--

LOCK TABLES `teléfonos` WRITE;
/*!40000 ALTER TABLE `teléfonos` DISABLE KEYS */;
INSERT INTO `teléfonos` VALUES (19,'0416','12345678','Principal','V27919566'),(20,'0412','87654321','Secundario','V27919566'),(21,'0274','12349587','Auxiliar','V27919566'),(22,'0274','12349587','Trabajo','V27919566'),(23,'0416','12345678','Principal','V27919567'),(24,'0412','87654321','Secundario','V27919567'),(25,'0274','12349587','Auxiliar','V27919567'),(30,'0426','8994472','Principal','V28636530'),(31,'0412','0763135','Secundario','V28636530'),(32,'0274','12349587','Auxiliar','V28636530'),(33,'0274','12349587','Trabajo','V28636530'),(34,'0412','3569252','Principal','V27555555'),(35,'0416','3569245','Secundario','V27555555'),(36,'','','Auxiliar','V27555555'),(37,'','','Trabajo','V27555555'),(38,'0416','12345678','Principal','V25555555'),(39,'','','Secundario','V25555555'),(40,'0414','51351123','Auxiliar','V25555555'),(53,'0416','12345678','Principal','V11111111'),(54,'0412','3569252','Secundario','V11111111'),(55,'0416','12345678','Principal','V26666666'),(56,'0412','3569252','Secundario','V26666666'),(57,'0412','3569252','Principal','V12252106'),(58,'0416','3569245','Secundario','V12252106'),(59,'','','Auxiliar','V12252106'),(60,'','','Trabajo','V12252106'),(62,'0416','12345678','Principal','V30016821'),(63,'0412','3569252','Secundario','V30016821'),(64,'0412','3569252','Principal','V17312460'),(65,'0416','3569245','Secundario','V17312460'),(66,'0416','3569245','Auxiliar','V17312460');
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
  `Pregunta_Seg_1` text COLLATE utf8_bin NOT NULL,
  `Pregunta_Seg_2` text COLLATE utf8_bin NOT NULL,
  `Respuesta_1` text COLLATE utf8_bin NOT NULL,
  `Respuesta_2` text COLLATE utf8_bin NOT NULL,
  `Cédula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idUsuarios`),
  UNIQUE KEY `Cédula_Persona` (`Cédula_Persona`),
  KEY `Cédula_Persona_idx` (`Cédula_Persona`),
  CONSTRAINT `fk_personas_usuarios` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'12345',1,'Ciudad donde naciste','Color que más te gusta','Caja Seca','Azul','V28636530'),(2,'12345',2,'Ciudad donde naciste','Color que más te gusta','Mérida','Azul','V27919566'),(13,'',2,'Ciudad donde naciste','Mérida','Color que más te gusta','Azul','E14635135');
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

-- Dump completed on 2022-05-07 20:47:04
