-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: Localhost    Database: SI_LBGPF
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `año-escolar`
--

LOCK TABLES `año-escolar` WRITE;
/*!40000 ALTER TABLE `año-escolar` DISABLE KEYS */;
INSERT INTO `año-escolar` VALUES (12,'2022','2023'),(13,'2023','2024');
/*!40000 ALTER TABLE `año-escolar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitácora`
--

DROP TABLE IF EXISTS `bitácora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitácora` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuarios` int(11) NOT NULL,
  `fechaInicioSesión` date NOT NULL,
  `horaInicioSesión` time NOT NULL,
  `linksVisitados` text NOT NULL,
  `fechaFinalSesión` date DEFAULT NULL,
  `horaFinalSesión` time DEFAULT NULL,
  PRIMARY KEY (`id_bitacora`),
  KEY `fk_usuarios_bitacora` (`idUsuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitácora`
--

LOCK TABLES `bitácora` WRITE;
/*!40000 ALTER TABLE `bitácora` DISABLE KEYS */;
INSERT INTO `bitácora` VALUES (1,2,'2022-04-22','17:34:06','Muchos,ajshdvjasgdvjashdvjh','2022-04-22','19:34:06'),(2,2,'2022-04-26','01:51:36','/proyecto_pst/controladores/login.php','0000-00-00','00:00:00'),(3,2,'2022-04-26','01:52:40','Inicia Sesión,Visita menú principal,Visita menú principal,Visita menú principal,Visita menú principal,Visita menú principal,Visita menú principal,Visita menú principal,Visita perfil,Visita perfil,Visita perfil',NULL,NULL),(4,2,'2022-04-26','02:18:26','Inicia Sesión,Visita menú principal',NULL,NULL),(5,4,'2022-04-26','02:19:36','Inicia Sesión,Visita menú principal',NULL,NULL),(6,2,'2022-04-26','04:26:27','Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal, Cierra sesión.','2022-04-26','04:34:54'),(7,2,'2022-04-26','04:34:59','Inicia Sesión, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-04-26','09:08:52'),(8,4,'2022-04-26','09:08:59','Inicia Sesión, Visita menú principal',NULL,NULL),(9,2,'2022-04-28','22:22:54','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil',NULL,NULL),(10,2,'2022-04-30','13:41:12','Inicia Sesión, Visita menú principal, Visita menú principal, Cierra sesión.','2022-04-30','13:42:21'),(11,11,'2022-04-30','14:51:41','Inicia Sesión, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita menú principal, Cierra sesión.','2022-04-30','14:57:15'),(12,11,'2022-04-30','14:57:22','Inicia Sesión, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Edita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Edita perfil, Edita perfil',NULL,NULL),(13,2,'2022-04-30','15:27:52','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil',NULL,NULL),(14,2,'2022-04-30','15:52:39','Inicia Sesión, Visita menú principal, Visita menú principal',NULL,NULL),(15,11,'2022-04-30','15:52:50','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-04-30','16:04:32'),(16,11,'2022-04-30','21:26:16','Inicia Sesión, Visita menú principal, Visita perfil',NULL,NULL),(17,2,'2022-04-30','21:26:49','Inicia Sesión, Visita menú principal, Visita perfil',NULL,NULL),(18,2,'2022-04-30','21:27:17','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.','2022-04-30','21:33:23'),(19,2,'2022-04-30','21:33:26','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.','2022-04-30','22:35:59'),(20,2,'2022-04-30','23:27:04','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-01','01:50:43'),(21,4,'2022-05-01','01:50:47','Inicia Sesión, Visita menú principal',NULL,NULL),(22,2,'2022-05-01','02:38:49','Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-01','02:48:25'),(23,4,'2022-05-01','02:48:29','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.','2022-05-01','05:09:23'),(24,4,'2022-05-01','05:09:28','Inicia Sesión, Visita menú principal, Visita perfil',NULL,NULL),(25,2,'2022-05-01','13:32:14','Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-01','15:18:11'),(26,4,'2022-05-01','15:18:15','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil',NULL,NULL),(27,4,'2022-05-01','19:44:49','Inicia Sesión, Visita menú principal, Visita menú principal, Visita menú principal, Cierra sesión.','2022-05-02','04:33:24'),(28,11,'2022-05-02','01:42:01','Inicia Sesión, Visita menú principal',NULL,NULL),(29,2,'2022-05-02','04:34:31','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-02','16:14:13'),(30,12,'2022-05-02','04:40:10','Inicia Sesión, Visita menú principal, Visita perfil',NULL,NULL),(31,2,'2022-05-02','04:42:32','Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.','2022-05-02','05:24:55'),(32,12,'2022-05-02','05:25:21','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita menú principal, Cierra sesión.','2022-05-02','06:50:03'),(33,4,'2022-05-02','06:50:22','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal',NULL,NULL),(34,4,'2022-05-02','13:56:51','Inicia Sesión, Visita menú principal, Consulta estudiantes',NULL,NULL),(35,4,'2022-05-02','16:14:55','Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-04','01:20:02'),(36,2,'2022-05-03','11:56:17','Inicia Sesión, Visita menú principal, Visita perfil',NULL,NULL),(37,4,'2022-05-03','12:02:53','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.','2022-05-03','12:14:09'),(38,4,'2022-05-03','13:03:19','Inicia Sesión, Visita menú principal, Consulta estudiantes',NULL,NULL),(39,2,'2022-05-03','13:48:26','Inicia Sesión, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-03','14:06:22'),(40,5,'2022-05-03','14:06:39','Inicia Sesión, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-03','14:58:41'),(41,2,'2022-05-03','14:58:46','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.','2022-05-03','15:03:36'),(42,2,'2022-05-03','15:03:42','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.','2022-05-03','15:06:12'),(43,5,'2022-05-03','15:06:29','Inicia Sesión, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita perfil,Se da de baja, Cierra sesión.','2022-05-03','15:11:16'),(44,2,'2022-05-03','15:13:04','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.','2022-05-03','15:43:35'),(45,4,'2022-05-03','16:24:51','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal',NULL,NULL),(46,4,'2022-05-03','16:28:32','Inicia Sesión, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal',NULL,NULL),(47,4,'2022-05-03','16:43:16','Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-03','22:04:02'),(48,2,'2022-05-03','22:17:23','Inicia Sesión, Visita menú principal, Cierra sesión.','2022-05-03','22:17:26'),(49,4,'2022-05-03','22:17:32','Inicia Sesión, Visita menú principal, Cierra sesión.','2022-05-03','22:17:35'),(50,4,'2022-05-03','22:17:54','Inicia Sesión, Visita menú principal, Cierra sesión.','2022-05-03','22:22:30'),(51,4,'2022-05-03','22:22:44','Inicia Sesión, Visita menú principal, Cierra sesión.','2022-05-03','22:22:52'),(52,4,'2022-05-03','22:23:20','Inicia Sesión, Visita menú principal, Cierra sesión.','2022-05-03','22:23:30'),(53,2,'2022-05-03','22:23:41','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-03','22:46:27'),(54,4,'2022-05-03','22:46:48','Inicia Sesión, Visita menú principal, Visita perfil,Se da de baja, Cierra sesión.','2022-05-03','22:47:01'),(55,1,'2022-05-03','22:50:37','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-08','00:59:26'),(56,2,'2022-05-04','01:20:06','Inicia Sesión, Visita menú principal, Cierra sesión.','2022-05-04','01:34:51'),(57,1,'2022-05-04','01:34:55','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes',NULL,NULL),(58,1,'2022-05-04','07:10:27','Inicia Sesión, Visita menú principal',NULL,NULL),(59,2,'2022-05-04','08:57:23','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Consulta estudiantes',NULL,NULL),(60,1,'2022-05-04','15:46:06','Inicia Sesión, Visita menú principal',NULL,NULL),(61,1,'2022-05-05','07:31:24','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.','2022-05-05','08:37:41'),(62,12,'2022-05-05','08:38:20','Inicia Sesión, Visita menú principal, Visita perfil, Visita perfil, Visita menú principal, Visita perfil,Se da de baja, Visita perfil, Visita perfil,Se da de baja, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil,Se da de baja,Se da de baja, Cierra sesión.','2022-05-05','08:43:06'),(63,1,'2022-05-05','08:43:16','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil',NULL,NULL),(64,13,'2022-05-05','18:30:54','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Cierra sesión.','2022-05-05','18:50:07'),(65,13,'2022-05-05','18:52:19','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil',NULL,NULL),(66,1,'2022-05-06','05:53:57','Inicia Sesión, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal',NULL,NULL),(67,2,'2022-05-06','20:47:35','Inicia Sesión, Visita menú principal, Cierra sesión.','2022-05-06','21:57:21'),(68,1,'2022-05-06','21:57:30','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Elimina un usuario, Elimina un usuario, Elimina un usuario, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes',NULL,NULL),(69,1,'2022-05-07','17:50:54','Inicia Sesión, Visita menú principal, Visita menú principal',NULL,NULL),(70,1,'2022-05-08','01:08:34','Inicia Sesión, Visita menú principal, Consulta estudiantes',NULL,NULL),(71,1,'2022-05-08','01:59:41','Inicia Sesión, Visita menú principal, Cierra sesión.','2022-05-08','02:00:26'),(72,1,'2022-05-08','02:00:31','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Cierra Sesión.','2022-05-08','02:43:35'),(73,1,'2022-05-08','02:43:40','Inicia Sesión, Visita menú principal, Cierra Sesión.','2022-05-08','02:46:55'),(74,1,'2022-05-08','19:47:13','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita menú principal, Consulta estudiantes',NULL,NULL),(75,1,'2022-05-09','12:40:06','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita perfil',NULL,NULL),(76,1,'2022-05-09','13:03:38','Inicia Sesión, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita menú principal, Cierra Sesión.','2022-05-10','08:36:42'),(77,1,'2022-05-10','08:36:48','Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal',NULL,NULL),(78,1,'2022-05-10','19:02:27','Inicia Sesión, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal',NULL,NULL),(79,1,'2022-05-10','21:43:07','Inicia Sesión, Visita menú principal, Visita perfil, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal',NULL,NULL),(80,1,'2022-05-10','21:50:57','Inicia Sesión, Visita menú principal, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Visita menú principal, Cierra Sesión.','2022-05-11','02:49:19'),(81,15,'2022-05-11','02:59:23','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Cierra Sesión.','2022-05-11','02:59:32'),(82,14,'2022-05-11','03:00:11','Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil, Visita perfil',NULL,NULL),(83,1,'2022-05-11','08:37:37','Inicia Sesión, Visita menú principal',NULL,NULL),(84,1,'2022-05-15','05:17:17','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes',NULL,NULL),(85,1,'2022-05-15','18:53:17','Inicia Sesión, Visita menú principal, Consulta estudiantes',NULL,NULL),(86,1,'2022-05-15','19:19:11','Inicia Sesión, Visita menú principal, Consulta estudiantes',NULL,NULL),(87,1,'2022-05-15','23:45:41','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes',NULL,NULL),(88,1,'2022-05-16','07:42:20','Inicia Sesión, Visita menú principal',NULL,NULL),(89,1,'2022-05-16','15:40:40','Inicia Sesión, Visita menú principal, Consulta estudiantes',NULL,NULL),(90,1,'2022-05-16','19:48:27','Inicia Sesión, Visita menú principal, Consulta estudiantes',NULL,NULL),(91,1,'2022-05-16','22:19:35','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes',NULL,NULL),(92,1,'2022-05-17','17:35:29','Inicia Sesión, Visita menú principal, Consulta estudiantes',NULL,NULL),(93,1,'2022-05-17','18:36:32','Inicia Sesión, Visita menú principal, Consulta estudiantes',NULL,NULL),(94,1,'2022-05-18','22:27:13','Inicia Sesión, Visita menú principal, Consulta estudiantes,Registra un estudiante, Consulta estudiantes,Registra un estudiante, Consulta estudiantes, Consulta estudiantes,Registra un estudiante, Consulta estudiantes',NULL,NULL),(95,1,'2022-05-19','16:51:01','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes',NULL,NULL),(96,1,'2022-05-19','18:26:49','Inicia Sesión, Visita menú principal',NULL,NULL),(97,1,'2022-05-21','11:05:42','Inicia Sesión, Visita menú principal',NULL,NULL),(98,1,'2022-06-22','22:03:38','Inicia Sesión, Visita menú principal',NULL,NULL),(99,14,'2022-07-14','12:43:05','Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes',NULL,NULL),(100,14,'2022-07-16','00:31:56','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal',NULL,NULL),(101,14,'2022-07-19','22:26:37','Inicia Sesión, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Visita menú principal,Registra un estudiante, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal,Registra un estudiante, Consulta estudiantes, Consulta estudiantes',NULL,NULL),(102,2,'2022-08-31','11:01:02','Inicia Sesión, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal',NULL,NULL),(103,14,'2022-09-18','01:01:13','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra Sesión.','2022-09-18','04:10:03'),(104,14,'2022-09-18','04:12:18','Inicia Sesión, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal',NULL,NULL),(105,14,'2022-09-18','04:24:26','Inicia Sesión, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Cierra Sesión.','2022-09-18','04:34:12'),(106,14,'2022-09-18','04:34:22','Inicia Sesión, Visita menú principal, Visita menú principal, Visita menú principal, Cierra Sesión.','2022-09-18','04:35:22'),(107,16,'2022-09-18','04:36:22','Inicia Sesión, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra Sesión.','2022-09-18','04:39:11'),(108,14,'2022-09-18','04:40:03','Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes',NULL,NULL),(109,14,'2022-09-18','19:19:50','Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal',NULL,NULL),(110,14,'2022-09-19','10:51:28','Inicia Sesión, Visita menú principal, Cierra Sesión.','2022-09-19','10:52:50'),(111,14,'2022-09-19','10:53:51','Inicia Sesión, Visita menú principal,Registra un estudiante,Registra un estudiante,Registra un estudiante, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal',NULL,NULL);
/*!40000 ALTER TABLE `bitácora` ENABLE KEYS */;
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
  CONSTRAINT `fk_personas_carnet` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carnet-patria`
--

LOCK TABLES `carnet-patria` WRITE;
/*!40000 ALTER TABLE `carnet-patria` DISABLE KEYS */;
INSERT INTO `carnet-patria` VALUES (3,'1111111111','2222222222','V27919566'),(18,'8543654868','3541854354','V27555555'),(20,'5413584384','8436685463','E45678912'),(22,'6541358484','8435438434','V54138415'),(24,'6541358484','8435438434','V54138416'),(25,'','','V15453234'),(27,'','','V27888000'),(33,'','','V8463432'),(34,'6553262421','2444444444','V51358435');
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
  `Primer_Nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `Segundo_Nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `Primer_Apellido` varchar(45) COLLATE utf8_bin NOT NULL,
  `Segundo_Apellido` varchar(45) COLLATE utf8_bin NOT NULL,
  `Relación` varchar(20) COLLATE utf8_bin NOT NULL,
  `Prefijo` varchar(4) COLLATE utf8_bin DEFAULT NULL,
  `Número_Telefónico` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `idRepresentante` int(20) NOT NULL,
  `idEstudiantes` int(11) NOT NULL,
  PRIMARY KEY (`idContactoAuxiliar`,`idRepresentante`),
  KEY `fk_representantes_auxiliares` (`idRepresentante`),
  KEY `fk_estudiantes_auxiliares` (`idEstudiantes`),
  CONSTRAINT `fk_estudiantes_auxiliares` FOREIGN KEY (`idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_representantes_auxiliares` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactos_auxiliares`
--

LOCK TABLES `contactos_auxiliares` WRITE;
/*!40000 ALTER TABLE `contactos_auxiliares` DISABLE KEYS */;
INSERT INTO `contactos_auxiliares` VALUES (29,'jsdvhdvfjsdfh','vjsvhfsjdhfv','sjdvfsjhfvsjdh','jshfvsjdhfvsjdh','dshfvbsjdf','3543','5143513',24,21);
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
  KEY `fk_datos-economicos_representantes1_idx` (`idRepresentantes`),
  CONSTRAINT `fk_datos-economicos_representantes1` FOREIGN KEY (`idRepresentantes`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-económicos`
--

LOCK TABLES `datos-económicos` WRITE;
/*!40000 ALTER TABLE `datos-económicos` DISABLE KEYS */;
INSERT INTO `datos-económicos` VALUES (1,'Banco Provincial, S.A.','Corriente','1351351351384135',3),(12,'Banco del Tesoro, C.A.','Corriente','64535435843543846354',16),(13,'Banco Mercantil, C.A','Corriente','41385418435348843584',17),(15,'Banco Plaza C.A.','Corriente','00000000000000000000',19),(20,'Venezolano de Crédito S.A.','Ahorro','54635148354684351485',24);
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
  KEY `fk_datos-laborales_representantes1` (`idRepresentantes`),
  CONSTRAINT `fk_datos-laborales_representantes1` FOREIGN KEY (`idRepresentantes`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-laborales`
--

LOCK TABLES `datos-laborales` WRITE;
/*!40000 ALTER TABLE `datos-laborales` DISABLE KEYS */;
INSERT INTO `datos-laborales` VALUES (4,'Desempleado','','','',3),(15,'Electrical Engineer','4 Mesta Hill','3','Diaria',16),(16,'Desempleado','','','',17),(18,'Chef','erffdgdfgdfgfdgdfgdfg','56','Mensual',19),(23,'sdfjsdvhfsjdf','sfvsjhvfvsdhjfd','1','Semanal',24);
/*!40000 ALTER TABLE `datos-laborales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos-laborales-madres`
--

DROP TABLE IF EXISTS `datos-laborales-madres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos-laborales-madres` (
  `idDatos-laboralesMa` int(11) NOT NULL AUTO_INCREMENT,
  `Empleo` varchar(45) NOT NULL,
  `Lugar_Trabajo` varchar(45) NOT NULL,
  `Remuneración` varchar(45) NOT NULL,
  `Tipo_Remuneración` varchar(45) NOT NULL,
  `idMadre` int(11) NOT NULL,
  PRIMARY KEY (`idDatos-laboralesMa`),
  KEY `idPadre` (`idMadre`),
  CONSTRAINT `datos-laborales-madres_ibfk_1` FOREIGN KEY (`idMadre`) REFERENCES `madre` (`idMadre`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-laborales-madres`
--

LOCK TABLES `datos-laborales-madres` WRITE;
/*!40000 ALTER TABLE `datos-laborales-madres` DISABLE KEYS */;
INSERT INTO `datos-laborales-madres` VALUES (1,'Mesera','No se un lugarxd','99','Semanal',1),(7,'Desempleado','','','',3),(14,'','','','Diaria',10);
/*!40000 ALTER TABLE `datos-laborales-madres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos-laborales-padres`
--

DROP TABLE IF EXISTS `datos-laborales-padres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos-laborales-padres` (
  `idDatos-laboralesPa` int(11) NOT NULL AUTO_INCREMENT,
  `Empleo` varchar(45) NOT NULL,
  `Lugar_Trabajo` varchar(45) NOT NULL,
  `Remuneración` varchar(45) NOT NULL,
  `Tipo_Remuneración` varchar(45) NOT NULL,
  `idPadre` int(11) NOT NULL,
  PRIMARY KEY (`idDatos-laboralesPa`),
  KEY `idPadre` (`idPadre`),
  CONSTRAINT `datos-laborales-padres_ibfk_1` FOREIGN KEY (`idPadre`) REFERENCES `padre` (`idPadre`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-laborales-padres`
--

LOCK TABLES `datos-laborales-padres` WRITE;
/*!40000 ALTER TABLE `datos-laborales-padres` DISABLE KEYS */;
INSERT INTO `datos-laborales-padres` VALUES (1,'Albañil','No se un lugar','7','Diaria',2),(2,'Repartidor','Pizza Hut','8','Quincenal',13),(4,'ttttttttttttttttttttttttttttt','nkjnljjljkjjlkdlvjlsdkjv','54','Semanal',16),(11,'','','','Diaria',23);
/*!40000 ALTER TABLE `datos-laborales-padres` ENABLE KEYS */;
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
  `Vacunado` varchar(50) COLLATE utf8_bin NOT NULL,
  `Vacuna` varchar(50) COLLATE utf8_bin NOT NULL,
  `Dosis` int(11) NOT NULL,
  `Lote` varchar(15) COLLATE utf8_bin NOT NULL,
  `Dieta_Especial` varchar(50) COLLATE utf8_bin NOT NULL,
  `Enfermedad` varchar(50) COLLATE utf8_bin NOT NULL,
  `Impedimento_Físico` varchar(90) COLLATE utf8_bin NOT NULL,
  `Necesidad_educativa` varchar(60) COLLATE utf8_bin NOT NULL,
  `Cond_Vista` varchar(45) COLLATE utf8_bin NOT NULL,
  `Cond_Dental` varchar(45) COLLATE utf8_bin NOT NULL,
  `Institución_Médica` varchar(50) COLLATE utf8_bin NOT NULL,
  `Carnet_Discapacidad` varchar(20) COLLATE utf8_bin NOT NULL,
  `idEstudiantes` int(11) NOT NULL,
  PRIMARY KEY (`idDatos-Médicos`,`idEstudiantes`),
  UNIQUE KEY `idEstudiantes` (`idEstudiantes`),
  KEY `idUsuarios_idx` (`idEstudiantes`),
  CONSTRAINT `fk_Estudiantes_Datos-Medicos` FOREIGN KEY (`idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-salud`
--

LOCK TABLES `datos-salud` WRITE;
/*!40000 ALTER TABLE `datos-salud` DISABLE KEYS */;
INSERT INTO `datos-salud` VALUES (20,175,40,'5135',25,'Diestro','A+','Si','AstraZeneca',0,'D12345678901234','','','Visual, Motora, Auditiva, Escritura, Lectura, Lenguaje, Embarazo, Educativa especial','Motriz','Buena','Buena','','',15),(24,175,40,'5135',25,'Diestro','A+','','',0,'','','','Visual, Motora, Auditiva, Escritura, Lectura, Lenguaje, Embarazo, Educ','','Buena','Buena','','',17),(28,111,11,'111',111,'Diestro','O+','No','',1,'111111111111111','','sdfjbsdjf','Motora','nm mv','Regular','Regular','','',21);
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-sociales`
--

LOCK TABLES `datos-sociales` WRITE;
/*!40000 ALTER TABLE `datos-sociales` DISABLE KEYS */;
INSERT INTO `datos-sociales` VALUES (17,'Si','Buenas Condiciones','Si',15),(19,'No','Malas Condiciones','Si',17),(23,'Si','Muy buenas Condiciones','Si',21);
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-tallas`
--

LOCK TABLES `datos-tallas` WRITE;
/*!40000 ALTER TABLE `datos-tallas` DISABLE KEYS */;
INSERT INTO `datos-tallas` VALUES (13,'M','30','37',15),(16,'M','30','37',17),(20,'11','11','11',21);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-vivienda`
--

LOCK TABLES `datos-vivienda` WRITE;
/*!40000 ALTER TABLE `datos-vivienda` DISABLE KEYS */;
INSERT INTO `datos-vivienda` VALUES (1,'Buena','Casa','Propia',3),(10,'Regular','Rancho','Alquilada',16),(11,'Regular','Casa','Propia',17),(12,'Regular','Apartamento','',19),(17,'Regular','Apartamento','Alquilada',24);
/*!40000 ALTER TABLE `datos-vivienda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos-vivienda-madres`
--

DROP TABLE IF EXISTS `datos-vivienda-madres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos-vivienda-madres` (
  `idDatos-viviendaMa` int(11) NOT NULL AUTO_INCREMENT,
  `Condiciones_Vivienda` varchar(25) NOT NULL,
  `Tipo_Vivienda` varchar(25) NOT NULL,
  `Tenencia_Vivienda` varchar(25) NOT NULL,
  `idMadre` int(11) NOT NULL,
  PRIMARY KEY (`idDatos-viviendaMa`),
  UNIQUE KEY `idRepresentante` (`idMadre`),
  KEY `fk_representantes_vivienda` (`idMadre`),
  CONSTRAINT `datos-vivienda-madres_ibfk_1` FOREIGN KEY (`idMadre`) REFERENCES `madre` (`idMadre`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-vivienda-madres`
--

LOCK TABLES `datos-vivienda-madres` WRITE;
/*!40000 ALTER TABLE `datos-vivienda-madres` DISABLE KEYS */;
INSERT INTO `datos-vivienda-madres` VALUES (1,'Buena','Apartamento','Propia',1),(2,'Regular','Rancho','Otro',3),(9,'','','',10);
/*!40000 ALTER TABLE `datos-vivienda-madres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos-vivienda-padres`
--

DROP TABLE IF EXISTS `datos-vivienda-padres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos-vivienda-padres` (
  `idDatos-viviendaPa` int(11) NOT NULL AUTO_INCREMENT,
  `Condiciones_Vivienda` varchar(25) NOT NULL,
  `Tipo_Vivienda` varchar(25) NOT NULL,
  `Tenencia_Vivienda` varchar(25) NOT NULL,
  `idPadre` int(11) NOT NULL,
  PRIMARY KEY (`idDatos-viviendaPa`),
  UNIQUE KEY `idRepresentante` (`idPadre`),
  KEY `fk_representantes_vivienda` (`idPadre`),
  KEY `idPadre` (`idPadre`),
  CONSTRAINT `datos-vivienda-padres_ibfk_1` FOREIGN KEY (`idPadre`) REFERENCES `padre` (`idPadre`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos-vivienda-padres`
--

LOCK TABLES `datos-vivienda-padres` WRITE;
/*!40000 ALTER TABLE `datos-vivienda-padres` DISABLE KEYS */;
INSERT INTO `datos-vivienda-padres` VALUES (1,'Buena','Casa','Alquilada',2),(2,'Mala','Apartamento','Alquilada',13),(4,'Buena','Apartamento','Prestada',16),(11,'','','',23);
/*!40000 ALTER TABLE `datos-vivienda-padres` ENABLE KEYS */;
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
  `Con_Quién_Vive` varchar(25) COLLATE utf8_bin NOT NULL,
  `Cédula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  `idRepresentante` int(11) NOT NULL,
  `Relación_Representante` varchar(20) COLLATE utf8_bin NOT NULL,
  `idPadre` int(11) NOT NULL,
  `idMadre` int(11) NOT NULL,
  PRIMARY KEY (`idEstudiantes`,`Cédula_Persona`,`idRepresentante`,`idPadre`),
  KEY `Cedula_Persona_idx` (`Cédula_Persona`),
  KEY `id_Representante_idx` (`idRepresentante`),
  KEY `fk_estudiantes_padres1_idx` (`idPadre`),
  KEY `idMadre` (`idMadre`),
  CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`idMadre`) REFERENCES `madre` (`idMadre`),
  CONSTRAINT `fk_Personas_Estudiantes` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Representantes_Estudiantes` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_estudiantes_padres1` FOREIGN KEY (`idPadre`) REFERENCES `padre` (`idPadre`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes`
--

LOCK TABLES `estudiantes` WRITE;
/*!40000 ALTER TABLE `estudiantes` DISABLE KEYS */;
INSERT INTO `estudiantes` VALUES (15,'Eastern Connecticut State University','Padre','V54138415',17,'Abuela',13,1),(17,'Eastern Connecticut State University','Padre','V54138416',17,'Abuela',13,1),(21,'sdjfgbsjhfgjnbvnbvnv','bsdjfhbsdjfhvsdhfv','V51358435',24,'Padre',23,10);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes-observaciones`
--

LOCK TABLES `estudiantes-observaciones` WRITE;
/*!40000 ALTER TABLE `estudiantes-observaciones` DISABLE KEYS */;
INSERT INTO `estudiantes-observaciones` VALUES (7,'jdkhfjkjzlxkcnjkzkkjnckldjkfjslnjksndjflbsjdbfjkdskjbjfbjsdjkfadbsjkfbjksbhdfkbabsjdfhabshdfhbhkasbhdfbksfbhbshkjdbfkadsbhfbhasbdhfbjsakbhdfbkjasbjdfk','jdkhfjkjzlxkcnjkzkkjnckldjkfjslnjksndjflbsjdbfjkdskjbjfbjsdjkfadbsjkfbjksbhdfkbabsjdfhabshdfhbhkasbhdfbksfbhbshkjdbfkadsbhfbhasbdhfbjsakbhdfbkjasbjdfk','jdkhfjkjzlxkcnjkzkkjnckldjkfjslnjksndjflbsjdbfjkdskjbjfbjsdjkfadbsjkfbjksbhdfkbabsjdfhabshdfhbhkasbhdfbksfbhbshkjdbfkadsbhfbhasbdhfbjsakbhdfbkjasbjdfk','jdkhfjkjzlxkcnjkzkkjnckldjkfjslnjksndjflbsjdbfjkdskjbjfbjsdjkfadbsjkfbjksbhdfkbabsjdfhabshdfhbhkasbhdfbksfbhbshkjdbfkadsbhfbhasbdhfbjsakbhdfbkjasbjdfk','jdkhfjkjzlxkcnjkzkkjnckldjkfjslnjksndjflbsjdbfjkdskjbjfbjsdjkfadbsjkfbjksbhdfkbabsjdfhabshdfhbhkasbhdfbksfbhbshkjdbfkadsbhfbhasbdhfbjsakbhdfbkjasbjdfk','jdkhfjkjzlxkcnjkzkkjnckldjkfjslnjksndjflbsjdbfjkdskjbjfbjsdjkfadbsjkfbjksbhdfkbabsjdfhabshdfhbhkasbhdfbksfbhbshkjdbfkadsbhfbhasbdhfbjsakbhdfbkjasbjdfk',15),(9,'No socializa mucho','','','','Adelantó un año','Deficit de atención',17),(13,'','','','','','',21);
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes-repitentes`
--

LOCK TABLES `estudiantes-repitentes` WRITE;
/*!40000 ALTER TABLE `estudiantes-repitentes` DISABLE KEYS */;
INSERT INTO `estudiantes-repitentes` VALUES (10,'','','',15),(15,'Inglés y Matematica','Segundo año','Inglés y Matematica',17),(16,'','','',17),(17,'','','',17),(18,'','','',17),(22,'','','',21),(23,'','','',21);
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
INSERT INTO `grado` VALUES (13,'Cuarto año',15,12),(15,'Quinto año',17,12),(19,'Primer año',21,13);
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
  `Fecha_Inscripción` varchar(12) COLLATE utf8_bin NOT NULL,
  `Hora_Inscripción` varchar(12) COLLATE utf8_bin NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  PRIMARY KEY (`idInscripciones`,`idUsuario`,`idEstudiante`),
  KEY `idEstudiante_idx` (`idEstudiante`),
  KEY `idUsuarios_idx` (`idUsuario`),
  CONSTRAINT `fk_Estudiantes_Inscripciones` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Usuarios_Inscripciones` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscripciones`
--

LOCK TABLES `inscripciones` WRITE;
/*!40000 ALTER TABLE `inscripciones` DISABLE KEYS */;
INSERT INTO `inscripciones` VALUES (4,'2022-09-19','12:47:59pm',14,21),(5,'2022-09-19','12:48:51pm',14,21);
/*!40000 ALTER TABLE `inscripciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `madre`
--

DROP TABLE IF EXISTS `madre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `madre` (
  `idMadre` int(11) NOT NULL AUTO_INCREMENT,
  `País_Residencia` varchar(25) COLLATE utf8_bin NOT NULL,
  `Grado_Académico` varchar(15) COLLATE utf8_bin NOT NULL,
  `Cédula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idMadre`,`Cédula_Persona`),
  UNIQUE KEY `Cedula_Persona_UNIQUE` (`Cédula_Persona`),
  KEY `Cedula_Persona_idx` (`Cédula_Persona`),
  CONSTRAINT `madre_ibfk_1` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `madre`
--

LOCK TABLES `madre` WRITE;
/*!40000 ALTER TABLE `madre` DISABLE KEYS */;
INSERT INTO `madre` VALUES (1,'Venezuela','','V13456324'),(3,'Grecia','','V43434343'),(10,'','','E75553213');
/*!40000 ALTER TABLE `madre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `padre`
--

DROP TABLE IF EXISTS `padre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `padre` (
  `idPadre` int(11) NOT NULL AUTO_INCREMENT,
  `País_Residencia` varchar(25) COLLATE utf8_bin NOT NULL,
  `Grado_Académico` varchar(15) COLLATE utf8_bin NOT NULL,
  `Cédula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idPadre`,`Cédula_Persona`),
  UNIQUE KEY `Cedula_Persona_UNIQUE` (`Cédula_Persona`),
  KEY `Cedula_Persona_idx` (`Cédula_Persona`),
  CONSTRAINT `Cedula_Persona` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `padre`
--

LOCK TABLES `padre` WRITE;
/*!40000 ALTER TABLE `padre` DISABLE KEYS */;
INSERT INTO `padre` VALUES (2,'España','','V27919566'),(9,'Venezuela','','Cédula_P'),(13,'Venezuela','','V87354354'),(14,'Venezuela','','V65434684'),(16,'Venezuela','Primaria','V65656565'),(23,'','','E87652136');
/*!40000 ALTER TABLE `padre` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (5,'Elber','Alonso','Rondón','Hernández','V27919566','2001-05-05','Mérida','M','earh_2001@outlook.com','La Pedregosa Alta','Casado(a)'),(12,'María','Gabriela','Ballestero','Rodríguez','V28636530','2002-05-09','','F','mgbrodriguez952@gmail.com','',''),(22,'Carlos','Enrique','Goméz','Lopez','E14635135','2002-05-05','','M','earh2001@outlook.com','',''),(53,'Alphonse','Harlie','Stean','Hernández','V27555555','1995-11-01','28888 David Parkway','M','ffetherstonhaugh0@microsoft.com','05 Menomonie Plaza','Soltero(a)'),(54,'Revkah','Ferrell','Abrey','Hernández','V25555555','1995-11-01','28888 David Parkway','M','kgratten0@webmd.com','36696 Petterle Trail','Soltero(a)'),(55,'Primer_Nombre_R','Segundo_Nombre_R','Primer_Apellido_R','Segundo_Apellido_R','Cédula_P','0000-00-00','Lugar_Nacimiento_R','Género_R','Correo_electrónico_R','Dirección_R','Estado_Civil_R'),(57,'María','Elena','González','González','V17341885','1989-12-21','','F','maryg280@gmail.com','','Soltero(a)'),(58,'Elsbeth','Tressa','Housaman','Kleiner','E12345678','1973-03-21','','F','tkleiner2@odnoklassniki.ru','','Casado(a)'),(59,'Amalia','Nerita','Venable','Bygraves','E45678912','1985-11-12','16817 Nevada Street','F','nbygraves6@seesaa.net','16817 Nevada Street','Casado(a)'),(69,'Tildy','Elsbeth','Quickenden','Allmen','V85413548','1985-11-12','16817 Nevada Street','F','tquickenden8@prlog.org','416 Prairie Rose Hill','Casado(a)'),(70,'Jordon','Emery','Peffer','Renad','V87354354','1995-01-01','59 Forest Run Junction','M','erenadrm@jigsy.com','59 Forest Run Junction','Casado(a)'),(71,'Codi','Fonsie','Scallon','Widocks','V54138415','2007-12-01','83657 Corscot Way','M','cscallona@slashdot.org','15213 Elmside Point\r\n','Soltero(a)'),(72,'Dex','Leicester','Vinker','Lawler','V65434684','1987-02-01','86341 Vernon Junction','M','llawlerm@webnode.com','86341 Vernon Junction','Casado(a)'),(74,'Codiman','Fonsie','Scallon','Widocks','V54138416','2007-12-01','83657 Corscot Way','M','cscallona@slashdot.org','15213 Elmside Point\r\n','Soltero(a)'),(75,'Remolia','Veneviento','Panini','Blight','V13456324','1982-02-23','San Petersburgo','F','therollercoasterssucks@gmail.com','San Juan de Lagunillas','Viudo(a)'),(76,'Filomena','Martina','Blanco','Paredes','V15453234','1996-08-08','Mérida','F','richardismylove@gmail.com','dkjflkjksdjfsjldfjkldjfjlksdf','Soltero(a)'),(77,'Juan','Roberto','Paredes','Blanco','V33333333','1996-08-08','Mérida','M','popopopopoop@gmail.com','fnkjsdnlfnjsdnkfnksnkjfkn','Soltero(a)'),(81,'grfghfdh','fdghfdhdf','rssgfgdfg','dfhfdhdfh','V43434343','1979-11-11','dsfoshdfhsfgksghdfsjd','F','gdghjgdhfghdfghidfg@yahoo.com','dfsdgsdfgdsgdsg','Casado(a)'),(82,'uuuuuuuuu','oooooooooo','yyyyyyyyyyy','eeeeeeeee','V65656565','1978-02-22','rtrtyfghfhfh','F','fghfdhghdfghdfh@yahoo.com','fdgsfgsdfgdsgdgds','Casado(a)'),(83,'rrrrrrrrrrrrr','ttttttttttttttt','eeeeeeeeeeeeee','tttttttttttt','V27888000','2007-02-21','yyyyyyy','F','tttttttt@hotmail.com','zxnjkvbjzxjvn,jzxmcv','Soltero(a)'),(84,'Pepito','Grillo','Manzano','Almero','V32222222','1987-02-04','','M','rtlolololollolololol@gmail.com','',''),(99,'hdkfjsb','hgcjvgchg','vhgcjhgvhj','ghgvhgcvj','V8463432','1999-11-11','sfvsjkdvsgf','M','jhbsdajh@asjkfb','\r\nnb mv nbv hgvhgvhgv','Soltero(a)'),(100,'','','','','E75553213','0000-00-00','','M','','',''),(101,'','','','','E87652136','0000-00-00','','M','','',''),(102,'jhvbnvb','hgcvhgchgc','hgchgc','hgchgc','V51358435','2010-11-11','sdvjhbvnbvnvnbvn','M','hvjhv@sdfvsjd.com','dskjfbsdhfbsjdhmvmhvjhvmhvmhvmh','Soltero(a)');
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `representantes`
--

LOCK TABLES `representantes` WRITE;
/*!40000 ALTER TABLE `representantes` DISABLE KEYS */;
INSERT INTO `representantes` VALUES (3,'Bachillerato','V27919566'),(16,'Primaria','V27555555'),(17,'Bachillerato','E45678912'),(18,'Universitario','V13456324'),(19,'Universitario','V15453234'),(24,'Bachillerato','V8463432');
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
  CONSTRAINT `fk_personas_teléfonos` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=267 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teléfonos`
--

LOCK TABLES `teléfonos` WRITE;
/*!40000 ALTER TABLE `teléfonos` DISABLE KEYS */;
INSERT INTO `teléfonos` VALUES (19,'0416','12345678','Principal','V27919566'),(20,'0412','87654321','Secundario','V27919566'),(21,'0274','12349587','Auxiliar','V27919566'),(22,'0274','12349587','Trabajo','V27919566'),(30,'0426','8994472','Principal','V28636530'),(31,'0412','0763135','Secundario','V28636530'),(32,'0274','12349587','Auxiliar','V28636530'),(33,'0274','12349587','Trabajo','V28636530'),(132,'0426','3569252','Principal','V27555555'),(133,'3211','9810982','Secundario','V27555555'),(134,'0412','8892984','Auxiliar','V27555555'),(135,'0275','7423456','Trabajo','V27555555'),(136,'0271','3513513','Principal','V25555555'),(137,'0424','8546385','Secundario','V25555555'),(138,'6211','6384513','Auxiliar','V25555555'),(139,'Pref','Teléfono_P','Principal','Cédula_P'),(140,'Pref','Teléfono_S','Secundario','Cédula_P'),(141,'Pref','Teléfono_S','Auxiliar','Cédula_P'),(145,'7575','8416846','Principal','E45678912'),(146,'4684','4136541','Secundario','E45678912'),(147,'3641','3154354','Auxiliar','E45678912'),(148,'','','Trabajo','E45678912'),(167,'5412','3415848','Principal','V85413548'),(168,'3854','3854138','Secundario','V85413548'),(169,'3841','4135138','Auxiliar','V85413548'),(170,'4384','8435438','Principal','V87354354'),(171,'4354','4354343','Secundario','V87354354'),(172,'8543','4385434','Principal','V54138415'),(173,'4354','3854854','Secundario','V54138415'),(174,'4354','3854854','Auxiliar','V54138415'),(175,'4538','4384384','Principal','V65434684'),(176,'4358','8435843','Secundario','V65434684'),(180,'4354','3854854','Auxiliar','V54138416'),(181,'4354','3854854','Secundario','V54138416'),(182,'4354','3854854','Principal','V54138416'),(183,'0274','7654321','Principal','V13456324'),(184,'0426','1234567','Secundario','V13456324'),(185,'4532','3434346','Auxiliar','V87354354'),(186,'0426','9999995','Trabajo','V87354354'),(187,'0274','5553334','Auxiliar','V13456324'),(188,'0416','6655443','Trabajo','V13456324'),(189,'0275','3333333','Principal','V15453234'),(190,'0274','2222222','Secundario','V15453234'),(191,'0426','1111111','Auxiliar','V15453234'),(192,'0275','2222222','Trabajo','V15453234'),(193,'0271','4444444','Principal','V33333333'),(194,'0412','2222222','Secundario','V33333333'),(195,'0414','1111111','Auxiliar','V33333333'),(201,'0271','5454645','Principal','V43434343'),(202,'0412','5464565','Secundario','V43434343'),(203,'0426','7777777','Principal','V65656565'),(204,'0416','4444444','Secundario','V65656565'),(205,'0426','6666666','Principal','V27888000'),(206,'0426','3333333','Secundario','V27888000'),(207,'0426','3333333','Auxiliar','V27888000'),(254,'8651','8561352','Principal','V8463432'),(255,'1532','1352125','Secundario','V8463432'),(256,'1352','3215252','Auxiliar','V8463432'),(257,'6534','4135135','Trabajo','V8463432'),(258,'','','Principal','E75553213'),(259,'','','Secundario','E75553213'),(260,'','','Trabajo','E75553213'),(261,'','','Principal','E87652136'),(262,'','','Secundario','E87652136'),(263,'','','Trabajo','E87652136'),(264,'2346','4635463','Principal','V51358435'),(265,'4684','4635435','Secundario','V51358435'),(266,'4684','4635435','Auxiliar','V51358435');
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
  UNIQUE KEY `Cedula_Persona` (`Cédula_Persona`),
  KEY `Cedula_Persona_idx` (`Cédula_Persona`),
  CONSTRAINT `fk_personas_usuarios` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Clave_01',1,'Ciudad donde naciste','Color que más te gusta','Caja Seca','Azul','V28636530'),(2,'12345',2,'Ciudad donde naciste','Color que más te gusta','Mérida','Azul','V27919566'),(13,'123456',2,'Ciudad donde naciste','Mérida','Color que más te gusta','Azul','E14635135'),(14,'Azul==1971',1,'¿Cuál es tu heroe favorito?','Color que más te gusta','Gonzalo Picón Febres','Verde','V17341885'),(15,'Clave_01',2,'Ciudad donde naciste','Fruta favorita','Mérida','Naranja','E12345678'),(16,'Un4nosexd//',2,'Ciudad donde naciste','Equipo deportivo preferido','no seeeeeeeeeeee','que no seeeeeeeeeeeeee','V32222222');
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

-- Dump completed on 2022-09-19 15:05:39
