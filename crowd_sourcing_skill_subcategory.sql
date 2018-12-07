CREATE DATABASE  IF NOT EXISTS `crowd_sourcing` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `crowd_sourcing`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: crowd_sourcing
-- ------------------------------------------------------
-- Server version	5.6.38-log

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
-- Table structure for table `skill_subcategory`
--

DROP TABLE IF EXISTS `skill_subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skill_subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`,`name`,`category`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill_subcategory`
--

LOCK TABLES `skill_subcategory` WRITE;
/*!40000 ALTER TABLE `skill_subcategory` DISABLE KEYS */;
INSERT INTO `skill_subcategory` VALUES (1,'Jazz',1),(2,'Blues',1),(3,'Metal',1),(4,'Folk',1),(5,'Funky',1),(6,'Rock',1),(7,'Hip-Pop',1),(8,'Rap',1),(9,'Pop',1),(10,'Indie',1),(11,'RPG',2),(12,'FPS Arena',2),(13,'Moba',2),(14,'Quiz',2),(15,'Survival horror',2),(16,'Simulazione',2),(17,'Sport',2),(18,'Indie',2),(19,'Avventura Grafica',2),(20,'Animazione',3),(21,'Commedia',3),(22,'Documentario',3),(23,'Avventura',3),(24,'Horror',3),(25,'Thriller',3),(26,'Storico',3),(27,'Fantasy',3),(28,'Drammatico',3),(29,'Notebook',4),(38,'Tablet',4),(39,'Schede Grafiche',4),(40,'Monitor',4),(41,'Stampanti',4),(42,'Hard Disk',4),(43,'Router',4),(44,'Mouse',4),(45,'Tastiere',4);
/*!40000 ALTER TABLE `skill_subcategory` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-07 12:08:06
