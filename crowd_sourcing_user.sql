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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user` varchar(254) NOT NULL,
  `password` varchar(20) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dt_birth` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `town` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('a@test.com','a','a','a',NULL,NULL,NULL,NULL,'2018-10-29 17:04:18','REQUESTER'),('acatullo@test.com','1234','Alessio','Catullo',NULL,NULL,NULL,NULL,'2018-12-05 15:50:09','REQUESTER'),('acatullo_wrk@test.com','1234','Alessio','Catullo',NULL,NULL,NULL,NULL,NULL,'WORKER'),('b@test.com','1234','b','b',NULL,NULL,NULL,NULL,NULL,'WORKER'),('c@test.com','1234','c','c',NULL,NULL,NULL,NULL,NULL,'WORKER'),('fg@test.com','1234','Fil','gor',NULL,NULL,NULL,NULL,NULL,'WORKER'),('frigamonti@test.com','1234','Filippo','Rigamonti',NULL,NULL,NULL,NULL,'2018-06-20 15:37:12','REQUESTER'),('frigamonti_wrk@test.com','1234','Filippo','Rigamonti',NULL,NULL,NULL,NULL,NULL,'WORKER'),('g@g','g','Andrea','g',NULL,NULL,NULL,NULL,'2018-10-02 22:51:14','WORKER'),('gasdf@asdf','asd','giada','gge',NULL,NULL,NULL,NULL,NULL,'REQUESTER'),('h@h','h','h','h',NULL,NULL,NULL,NULL,NULL,'WORKER'),('nacar@gmail.com','asd','andrea','nacar',NULL,NULL,NULL,NULL,'2018-08-24 18:31:16','WORKER'),('p@p','p','p','p',NULL,NULL,NULL,NULL,NULL,'WORKER'),('q@q','q','q','q',NULL,NULL,NULL,NULL,'2018-10-02 11:33:45','REQUESTER'),('v@c','c','viviana','catullo',NULL,NULL,NULL,NULL,'2018-08-26 17:40:55','REQUESTER');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-07 12:08:07
