CREATE DATABASE  IF NOT EXISTS `crowd_sourcing` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `crowd_sourcing`;
-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: localhost    Database: crowd_sourcing
-- ------------------------------------------------------
-- Server version	5.7.24-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `answer_options`
--

DROP TABLE IF EXISTS `answer_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `answer_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(150) NOT NULL,
  `task` int(11) NOT NULL,
  PRIMARY KEY (`answer`,`task`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `task_answers_idx` (`task`),
  CONSTRAINT `task_answers` FOREIGN KEY (`task`) REFERENCES `task` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer_options`
--

LOCK TABLES `answer_options` WRITE;
/*!40000 ALTER TABLE `answer_options` DISABLE KEYS */;
INSERT INTO `answer_options` VALUES (170,'Guided User Interface',67),(171,'General User Interface',67),(172,'Graphical User Iterface',67),(173,'Un altro nome per il CD-ROM',69),(174,'Una tecnica ad accesso diretto',69),(175,'Un dispositivo a nastro per registrazione',69),(180,'Un qualunque grafico stampato a video',82),(181,'Una istanza di una classe',82),(182,'Un insieme di codici relativi ad una gerarchia',82),(185,'Un array contenente dei dati di tipo numerico',84),(186,'Un oggetto contenente un gruppo di oggetti correlati tra loro',84),(187,'Sinonimo di costante	',84),(197,'Video Cartridge System',91),(198,'Video Computer Sound',91),(199,'Video Computer System',91),(200,'Muratore',92),(201,'Imbianchino ',92),(202,'Idraulico',92),(203,'Muratore',93),(204,'Imbianchino',93),(205,'Idraulico ',93),(206,'Laura Pausini',94),(207,'Emma',94),(208,'Giorgia',94),(209,'Elisa',94),(210,'Demi Lovato',95),(211,'Taylor Swift',95),(212,'Ariana Grande',95),(213,'Selena Gomez',95),(214,'Alberto Moravia',96),(215,'Italo Svevo',96),(216,'Luigi Pirandello',96),(217,'Carlo Levi',96),(218,'Paul Klee',97),(219,'Marcel Duchhamp',97),(220,'Egon Shiele',97),(221,'Roy Kinchestein',97),(222,'Germania',98),(223,'Austria',98),(224,'Danimarca',98),(225,'Belgio',98),(226,'Mar Baltico',99),(227,'Mar Morto',99),(228,'Mare Adriatico',99),(229,'Mare di Bering',99),(230,'Mar Tirreno',100),(231,'Mar Morto',100),(232,'Mar Nero',100),(233,' Oceano Indiano',100),(234,'Anzio',101),(235,'Marsala',101),(236,'Trieste',101),(237,'Quarto',101),(238,'Love me do',102),(239,'Let it be',102),(240,'We can work it out',102),(241,'Image',102),(242,'Led Zappelin',103),(243,'Rolling Stones',103),(244,'Metallica',103),(245,'Kiss',103);
/*!40000 ALTER TABLE `answer_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign`
--

DROP TABLE IF EXISTS `campaign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `campaign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `dt_start` date NOT NULL,
  `dt_end` date NOT NULL,
  `dt_accession_start` date NOT NULL,
  `dt_accession_end` date NOT NULL,
  `user` varchar(254) NOT NULL,
  PRIMARY KEY (`name`,`user`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `user_creation_idx` (`user`),
  CONSTRAINT `user_creation` FOREIGN KEY (`user`) REFERENCES `user` (`user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign`
--

LOCK TABLES `campaign` WRITE;
/*!40000 ALTER TABLE `campaign` DISABLE KEYS */;
INSERT INTO `campaign` VALUES (24,'Cultura generale','2019-01-19','2019-01-31','2019-01-20','2019-01-27','elenabagini@test'),(22,'CuoriositÃ  sui videogiochi','2019-01-19','2019-01-31','2019-01-20','2019-01-30','frigamonti@test'),(28,'Musica Internazionale','2019-01-19','2019-01-31','2019-01-20','2019-01-30','stefanobrustia@test'),(13,'Quiz sui linguaggi','2019-01-19','2019-03-29','2019-01-20','2019-03-29','frigamonti@test'),(25,'Testa la tua Geografia','2019-01-19','2019-01-31','2019-01-20','2019-01-31','albertoziliani@test'),(23,'Tutto sulla musica','2019-01-19','2019-03-21','2019-01-20','2019-01-31','elenabagini@test'),(26,'Tutto sulla storia','2019-01-19','2019-01-30','2019-01-20','2019-01-30','stefanobrustia@test');
/*!40000 ALTER TABLE `campaign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_performed`
--

DROP TABLE IF EXISTS `campaign_performed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `campaign_performed` (
  `campaign` int(11) NOT NULL,
  `user` varchar(45) NOT NULL,
  `notification` tinyint(4) DEFAULT NULL,
  `notification_value` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`campaign`,`user`),
  KEY `user_idx` (`user`),
  CONSTRAINT `campaign` FOREIGN KEY (`campaign`) REFERENCES `campaign` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user` FOREIGN KEY (`user`) REFERENCES `user` (`user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_performed`
--

LOCK TABLES `campaign_performed` WRITE;
/*!40000 ALTER TABLE `campaign_performed` DISABLE KEYS */;
INSERT INTO `campaign_performed` VALUES (13,'alessiocatullo@test',NULL,0),(22,'giacomodagnese@test',1,0),(28,'alessiocatullo@test',NULL,0),(28,'giacomodagnese@test',NULL,0);
/*!40000 ALTER TABLE `campaign_performed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skill`
--

DROP TABLE IF EXISTS `skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `main_skill` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`,`main_skill`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill`
--

LOCK TABLES `skill` WRITE;
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;
INSERT INTO `skill` VALUES (1,'Musica',0),(2,'Video Games',0),(3,'Film/Libri',0),(4,'Informatica',0),(5,'Jazz',1),(6,'Blues',1),(7,'Metal',1),(8,'Folk',1),(9,'Funky',1),(10,'Rock',1),(12,'Rap',1),(13,'Pop',1),(14,'Indie',1),(15,'RPG',2),(16,'FPS Arena',2),(17,'Moba',2),(18,'Quiz',2),(19,'Survival',2),(20,'Simulazione',2),(21,'Sport',2),(22,'Indie',2),(23,'Avventura Grafica',2),(24,'Animazione',3),(25,'Commedia',3),(26,'Documentario',3),(27,'Avventura',3),(28,'Horror',3),(29,'Thriller',3),(30,'Storico',3),(31,'Fantasy',3),(32,'Drammatico',3),(33,'Notebook',4),(34,'Tablet',4),(35,'Schede Grafiche',4),(36,'Monitor',4),(37,'Stampanti',4),(38,'Hard Disk',4),(39,'Router',4),(40,'Mouse',4),(41,'Tastiere',4),(42,'Bachata',1),(43,'Bossa Nova',1),(44,'Classica',1),(45,'Country',1),(46,'R&B',1),(47,'Electro',1),(48,'House',1),(49,'Gospel',1),(50,'Latina',1),(51,'Minimal',1),(52,'Punk',1),(53,'Salsa',1),(54,'Reggaeton',1),(55,'Swing',1),(56,'Techno',1),(57,'Arcade',2),(58,'FPS',2),(59,'Free-to-play',2),(60,'Picchiaduro',2),(61,'MMORPG',2),(62,'Open World',2),(63,'Puzzle',2),(64,'Battle Royale',2),(65,'Biografico',3),(66,'Linguaggi',0),(67,'SQL',66),(68,'Java',66),(69,'JavaScript',66),(70,'PHP',66),(71,'Python',66),(72,'C#',66),(73,'C',66),(74,'C++',66),(75,'Assembly',66),(76,'HTML',66),(77,'Pascal',66),(78,'Ruby',66),(79,'Visual Basic',66),(80,'Perl',66),(81,'Materie Scolastiche',0),(82,'Geografia',81),(83,'Storia',81),(84,'Arte',81),(85,'Scienze',81),(86,'Chimica',81),(87,'Matematica',81),(88,'Italiano',81);
/*!40000 ALTER TABLE `skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `description` longtext,
  `worker_max` int(5) NOT NULL,
  `majority` int(3) NOT NULL,
  `reward` varchar(100) DEFAULT NULL,
  `state` int(1) DEFAULT '0' COMMENT '0 = creato\n1 = in corso\n2 = risultato calcolato',
  `campaign` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `campaign_task_idx` (`campaign`),
  CONSTRAINT `campaign_task` FOREIGN KEY (`campaign`) REFERENCES `campaign` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` VALUES (67,'Cosa significa il termine','GUI',4,60,'',0,13),(69,'Cosa Ã¨ un','DAT',5,70,'',0,13),(82,'Nei linguaggi di programmazione Object Oriented','Un Oggetto Ã¨',5,60,'',0,13),(84,'Come si definisce una cosiddetta','Collection',6,60,'',0,13),(91,'In che anno Ã¨ uscito il seguente gioco?','Pray',5,60,'',0,22),(92,'La prima console Atari a cartucce si chiama Atari VCS 2600','la dicitura VCS, per cosa sta?',4,60,'',0,22),(93,'Quale Ã¨ il mestiere del seguente personaggio protagonista di svariati videogiochi','Mario',3,80,'',0,22),(94,'Qual Ã¨ stata la prima artista ad aver realizzato un concerto nel seguente stadio','San Siro',4,70,'',0,23),(95,'Quale artista ha fatto uscire di recente il seguente album?','Sweetener',4,50,'',0,23),(96,'Di chi Ã¨ il seguente libro','Il fu Mattia Pascal',3,60,'',0,24),(97,'Quale tra questi artisti fa parte della seguente corrente','Espressionismo',3,40,'',0,24),(98,'Dove mi trovo se risiedo nella seguente cittÃ ','Vienna',3,80,'',0,25),(99,'Quale mare bagna','La Finlandia',4,70,'',0,25),(100,'Dove sfocia il seguente fiume','Danubio',3,60,'',0,25),(101,'Dove sbarcarono gli Alleati','22 Gennaio 1944',5,60,'',0,26),(102,'Qual Ã© stato il primo successo del seguente gruppo','Beatles',3,60,'',2,28),(103,'Quale band rock canta','Satisfaction',4,60,'',0,28);
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `task_analytics`
--

DROP TABLE IF EXISTS `task_analytics`;
/*!50001 DROP VIEW IF EXISTS `task_analytics`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `task_analytics` AS SELECT 
 1 AS `campaign`,
 1 AS `id`,
 1 AS `title`,
 1 AS `description`,
 1 AS `worker_max`,
 1 AS `majority`,
 1 AS `state`,
 1 AS `answer`,
 1 AS `answer_id`,
 1 AS `nof_answer`,
 1 AS `percentage`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `task_performed`
--

DROP TABLE IF EXISTS `task_performed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `task_performed` (
  `task` int(11) NOT NULL,
  `user` varchar(254) NOT NULL,
  `score` int(1) DEFAULT NULL,
  `answer` int(11) DEFAULT NULL,
  PRIMARY KEY (`task`,`user`),
  KEY `user_answer_idx` (`answer`),
  KEY `user_id_idx` (`user`),
  CONSTRAINT `task_id` FOREIGN KEY (`task`) REFERENCES `task` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_answer` FOREIGN KEY (`answer`) REFERENCES `answer_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_id` FOREIGN KEY (`user`) REFERENCES `user` (`user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_performed`
--

LOCK TABLES `task_performed` WRITE;
/*!40000 ALTER TABLE `task_performed` DISABLE KEYS */;
INSERT INTO `task_performed` VALUES (69,'alessiocatullo@test',NULL,NULL),(102,'alessiocatullo@test',1,239),(102,'giacomodagnese@test',1,239);
/*!40000 ALTER TABLE `task_performed` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `crowd_sourcing`.`task_performed_checkAnswer` BEFORE UPDATE ON `task_performed` FOR EACH ROW
BEGIN
	DECLARE nWorker INT;
    DECLARE nRisposteDate INT;
    
    SET nWorker = (SELECT worker_max FROM task WHERE id = NEW.task);
	SET nRisposteDate = (SELECT COUNT(*) FROM task_performed WHERE task = NEW.task);
	IF nRisposteDate >= nWorker THEN
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'numero worker raggiunto';
	END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `task_skill`
--

DROP TABLE IF EXISTS `task_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `task_skill` (
  `skill` int(11) NOT NULL DEFAULT '0',
  `task` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`skill`,`task`),
  KEY `task_idx` (`task`),
  KEY `skill_idx` (`skill`),
  CONSTRAINT `skill` FOREIGN KEY (`skill`) REFERENCES `skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `task` FOREIGN KEY (`task`) REFERENCES `task` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_skill`
--

LOCK TABLES `task_skill` WRITE;
/*!40000 ALTER TABLE `task_skill` DISABLE KEYS */;
INSERT INTO `task_skill` VALUES (66,67),(4,69),(66,82),(68,82),(74,82),(4,84),(66,84),(68,84),(74,84),(2,91),(19,91),(2,92),(4,92),(2,93),(57,93),(63,93),(1,94),(13,94),(1,95),(12,95),(46,95),(48,95),(3,96),(88,96),(81,97),(84,97),(82,98),(82,99),(82,100),(83,101),(1,102),(6,102),(13,102),(1,103),(10,103);
/*!40000 ALTER TABLE `task_skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `user` (
  `user` varchar(254) NOT NULL,
  `password` varchar(20) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `role` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`user`,`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('admin@admin','admin','Super','User','2019-01-21 19:20:00','ADMIN',1),('albertoziliani@test','1234','Alberto','Ziliani','2019-01-20 18:11:26','REQUESTER',1),('alessandrorossi@test','1234','Alessandro','Rossi','2019-01-19 14:10:31','REQUESTER',1),('alessianigro@test','1234','Alessia','Nigro',NULL,'WORKER',1),('alessiocatullo@test','1234','Alessio','Catullo','2019-01-21 23:41:06','WORKER',1),('alessiocatullo_rqs@test','1234','Alessio','catullo','2018-08-26 17:40:55','REQUESTER',1),('alessiodipaola@test','1234','Alessio','Di Paola',NULL,'WORKER',1),('andreabasili@test','1234','Andrea','Basili',NULL,'WORKER',1),('atrinca@test','1234','Andrea','Trinca',NULL,'REQUESTER',0),('davidevia','1234','Davide','Via',NULL,'WORKER',1),('elenabagini@test','1234','Elena','Bagini','2019-01-20 17:59:12','REQUESTER',1),('fabiozannino','1234','Fabio','Zannino',NULL,'WORKER',1),('frigamonti@test','1234','Filippo','Rigamonti','2019-01-21 23:33:03','REQUESTER',1),('giacomodagnese@test','1234','Giacomo','D\'Agnese','2019-01-21 23:17:08','WORKER',1),('giovannipellegrino@test','1234','Giovanni','Pellegrino',NULL,'REQUESTER',0),('idolodicesare','1234','Idolo','Di Cesare',NULL,'WORKER',1),('larabozzoli@test','1234','Lara','Bozzoli',NULL,'WORKER',1),('marcodicarne@test','1234','Marco','Di Carne',NULL,'WORKER',1),('martacastoldi@test','1234','Marta','Castoldi','2018-10-02 22:51:14','WORKER',1),('massimilianogabetta@test','1234','Massimiliano','Gabetta',NULL,'REQUESTER',0),('matteobreviario@test','1234','Matteo','Breviario',NULL,'WORKER',1),('matteomasella@test','1234','Matteo','Masella',NULL,'REQUESTER',0),('mattiacaocci@test','1234','Mattia','Caocci',NULL,'WORKER',1),('salvatorefabozzi@test','1234','Salvatore','Fabozzi',NULL,'WORKER',1),('simonedecrescenzo@test','1234','Simone','Decrescenzo',NULL,'WORKER',1),('simoneportaluri@test','1234','Simone','Portaluri',NULL,'WORKER',1),('simonetoma@test','1234','Simone','Toma',NULL,'WORKER',1),('sostuni@test','1234','Stefano','Ostuni',NULL,'REQUESTER',1),('stefanobrustia@test','1234','Stefano','Brustia','2019-01-21 23:33:12','REQUESTER',1),('veronicamorelli@test','1234','Veronica','Morelli',NULL,'WORKER',1),('vivianacatullo@test','1234','Viviana','Catullo','2019-01-20 17:57:53','WORKER',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_skills`
--

DROP TABLE IF EXISTS `user_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `user_skills` (
  `user` varchar(254) NOT NULL,
  `skill` int(11) NOT NULL,
  PRIMARY KEY (`user`,`skill`),
  KEY `skill_id_idx` (`skill`),
  CONSTRAINT `skill_id` FOREIGN KEY (`skill`) REFERENCES `skill` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `user_mail` FOREIGN KEY (`user`) REFERENCES `user` (`user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_skills`
--

LOCK TABLES `user_skills` WRITE;
/*!40000 ALTER TABLE `user_skills` DISABLE KEYS */;
INSERT INTO `user_skills` VALUES ('giacomodagnese@test',1);
/*!40000 ALTER TABLE `user_skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'crowd_sourcing'
--
/*!50106 SET @save_time_zone= @@TIME_ZONE */ ;
/*!50106 DROP EVENT IF EXISTS `delete_campaign` */;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8 */ ;;
/*!50003 SET character_set_results = utf8 */ ;;
/*!50003 SET collation_connection  = utf8_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`root`@`localhost`*/ /*!50106 EVENT `delete_campaign` ON SCHEDULE EVERY 1 DAY STARTS '2019-01-22 00:16:03' ON COMPLETION PRESERVE ENABLE DO DELETE FROM campaign WHERE dt_end < NOW() */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
/*!50106 DROP EVENT IF EXISTS `update_ended_campaign` */;;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8 */ ;;
/*!50003 SET character_set_results = utf8 */ ;;
/*!50003 SET collation_connection  = utf8_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`root`@`localhost`*/ /*!50106 EVENT `update_ended_campaign` ON SCHEDULE EVERY 1 DAY STARTS '2019-01-22 00:15:20' ON COMPLETION PRESERVE ENABLE DO SELECT automatic_close_campaign() */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
DELIMITER ;
/*!50106 SET TIME_ZONE= @save_time_zone */ ;

--
-- Dumping routines for database 'crowd_sourcing'
--
/*!50003 DROP FUNCTION IF EXISTS `automatic_close_campaign` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `automatic_close_campaign`() RETURNS int(11)
BEGIN
	DECLARE fetch_done INT DEFAULT FALSE;
    DECLARE cam_id INT;
	DECLARE campaign_cursor CURSOR FOR SELECT id FROM campaign WHERE dt_accession_end < NOW();
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET fetch_done = TRUE;
    
    OPEN campaign_cursor;
    LOOPCAMP: LOOP
    
    FETCH campaign_cursor INTO cam_id;
		IF fetch_done = TRUE THEN
			LEAVE LOOPCAMP;
		END IF;
        
        UPDATE task SET status = 2 WHERE camapign = cam_id;
    
    END LOOP LOOPCAMP;
    CLOSE campaign_cursor;
RETURN 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `campaign_user_position` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `campaign_user_position`(cmp_id INT(11), usr_id VARCHAR(254)) RETURNS int(11)
BEGIN
	DECLARE fetch_done INT DEFAULT FALSE;
	DECLARE count_position INT DEFAULT 1; -- count of position --
    DECLARE usr_position INT DEFAULT 0; -- position in top10 of user / if is 0  ao the user doesn't exists in this campaign--
    DECLARE usr_email VARCHAR(254);
    
    DECLARE usr_cursor CURSOR FOR SELECT 
										tsk_p.user AS email
									FROM
										task_performed tsk_p
											JOIN
										task tsk ON tsk.id = tsk_p.task
											JOIN
										campaign cmp ON cmp.id = tsk.campaign
									WHERE
										cmp.id = cmp_id
                                        AND
                                        tsk_p.score IS NOT NULL
									GROUP BY email
									ORDER BY SUM(tsk_p.score) DESC, count(tsk_p.user);
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fetch_done = TRUE;
    
	OPEN usr_cursor;
    LOOPTASK: LOOP
    
		FETCH usr_cursor INTO usr_email;
		IF fetch_done = TRUE THEN
			LEAVE LOOPTASK;
		END IF;
        
		IF usr_id IS NOT NULL AND usr_id = usr_email THEN
			SET usr_position = count_position;
		END IF;
        SET count_position = count_position + 1;
        
    END LOOP LOOPTASK;
    CLOSE usr_cursor;
    
	RETURN usr_position;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `check_assignment_task` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `check_assignment_task`(id_camp INT, id_task INT) RETURNS int(11)
BEGIN
	DECLARE done BOOLEAN;
    DECLARE user_analized VARCHAR(245);
    DECLARE user_iterator CURSOR FOR SELECT us.user FROM user_skills as us JOIN (SELECT cp.campaign, nts.id, nts.skill, cp.user FROM campaign_performed as cp JOIN (SELECT t.id, t.campaign, ts.skill FROM task as t JOIN task_skill as ts ON t.id = ts.task WHERE t.id = id_task) as nts ON cp.campaign = nts.campaign WHERE notification = 1) as mad ON us.user = mad.user WHERE us.skill = mad.skill group by us.user;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
	
    OPEN user_iterator;
		LOOPUSER: LOOP
		FETCH user_iterator INTO user_analized;
        
        IF done THEN
			LEAVE LOOPUSER;
		END IF;
        
        INSERT INTO task_performed(task, user) VALUES (id_task, user_analized);
        
        UPDATE campaign_performed SET notification_value = notification_value + 1 WHERE user = user_analized AND campaign = id_camp;
        
        END LOOP LOOPUSER;
	CLOSE user_iterator;
RETURN 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `COUNTANSWER` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `COUNTANSWER`(task_in INT, answer_in INT) RETURNS int(11)
BEGIN
	DECLARE nof_answer INT;
    
    SET nof_answer = (SELECT COUNT(*) FROM task_performed WHERE task = task_in AND answer = answer_in); 
    
RETURN nof_answer;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `countAnswer_onTask` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `countAnswer_onTask`(task_id INT) RETURNS int(11)
BEGIN
	DECLARE nof_answer INT;
    
    SET nof_answer = (SELECT COUNT(*) FROM task_performed WHERE task = task_id AND answer IS NOT NULL); 
RETURN nof_answer;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `PROPORTION_RESULT` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `PROPORTION_RESULT`(tot INT, value INT) RETURNS int(11)
BEGIN
	DECLARE n INT;
    SET n = value*100/tot;
RETURN n;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `rating` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `rating`(user_in VARCHAR(245)) RETURNS int(11)
BEGIN
	DECLARE nRating int;
    SET nRating = (SELECT SUM(score) FROM task_performed WHERE user = user_in);
RETURN nRating;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `task_assignment` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `task_assignment`(my_user VARCHAR(254), my_campaign_id INT(11)) RETURNS int(11)
BEGIN

	/*DICHIARAZIONI DI VARIABILI*/
	DECLARE done_block1, done_block2, done_block3 INT DEFAULT FALSE;
    DECLARE debug INT;
    DECLARE approximaty DOUBLE;
	DECLARE approximaty_temp DOUBLE;
    DECLARE task_id_analized LONG;
    DECLARE task_skill_analized INT;
    DECLARE skill_worker_analized INT;
    DECLARE skill_worker_ifcategory INT;
    DECLARE task_skill_analized_category INT;
    DECLARE n_sub_category INT;
	DECLARE task_id LONG;
    DECLARE task_iterator CURSOR FOR
    
    SELECT tsk.id
        FROM (SELECT id, state, campaign FROM task WHERE campaign = my_campaign_id AND state < 2) as tsk 
			LEFT JOIN (SELECT task ,user FROM task_performed WHERE user = my_user) as tp ON tsk.id = tp.task
		WHERE tp.user IS NULL OR tp.user != my_user;
    
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done_block1 = TRUE;
	
    /*SET DELLE VARIABILI*/
	SET approximaty = 0;
	SET approximaty_temp = 0;
    SET debug = 0;
	SET task_id = null;

	/*-------------------------START BLOCK1 */
    OPEN task_iterator;
		/*-------------------------LOOP DEI TASK DELLA CAMPAGNA DEFINITA*/
		LOOPTASK: LOOP
		FETCH task_iterator INTO task_id_analized;
        
        SET done_block2 = false;
        SET done_block3 = false;
		        
		IF done_block1 THEN
			LEAVE LOOPTASK;
		END IF;
        
		/*-------------------------START BLOCK2*/
		CHECKSKILL: BEGIN
			DECLARE task_skill_iteretor CURSOR FOR SELECT tsksk.skill FROM task_skill tsksk WHERE tsksk.task = task_id_analized;
			DECLARE CONTINUE HANDLER FOR NOT FOUND SET done_block2 = TRUE;
			            
			OPEN task_skill_iteretor;
				/*-------------------------LOOP DELLE SKILL DEL CURRENT TASK*/
				LOOPSKILL: LOOP
				FETCH task_skill_iteretor INTO task_skill_analized;
				                
                IF done_block2 THEN
					SET done_block1 = false;
					LEAVE LOOPSKILL;
				END IF;
                
                /*-------------------------START BLOCK3 */
					CHECKSKILLWORKER: BEGIN
						DECLARE worker_skill_iterator CURSOR FOR SELECT wsk.skill FROM user_skills wsk WHERE wsk.user = my_user;
						DECLARE CONTINUE HANDLER FOR NOT FOUND SET done_block3 = TRUE;
                        
                        SET done_block3 = false;
                        /*-------------------------START CHECK SKILL*/
						OPEN worker_skill_iterator;
							LOOPWORKERSKILL: LOOP
							FETCH worker_skill_iterator INTO skill_worker_analized;
                            
                            IF done_block3 THEN
								SET done_block2 = false;
                                SET done_block1 = false;
								LEAVE LOOPWORKERSKILL;
							END IF;
                            
                            SET skill_worker_ifcategory = (SELECT main_skill FROM skill WHERE id = skill_worker_analized);
                            
                            IF skill_worker_ifcategory != 0 THEN
								IF task_skill_analized = skill_worker_analized THEN
									SET approximaty_temp = approximaty_temp + 1;
									ITERATE LOOPWORKERSKILL;
								END IF;
							END IF;
                            
							IF skill_worker_ifcategory = 0 THEN
								SET task_skill_analized_category = (SELECT main_skill FROM skill WHERE id = task_skill_analized);                               
								IF task_skill_analized_category = skill_worker_analized THEN
									SET n_sub_category = (SELECT COUNT(*) FROM skill WHERE main_skill = skill_worker_analized);
									SET approximaty_temp = approximaty_temp + 1/n_sub_category;
									ITERATE LOOPWORKERSKILL;
								END IF;
                                IF task_skill_analized = skill_worker_analized THEN
									SET approximaty_temp = approximaty_temp + 1;
									ITERATE LOOPWORKERSKILL;
                                END IF;
                                
							END IF;
                            
                            END LOOP LOOPWORKERSKILL;
						CLOSE worker_skill_iterator;
						/*-------------------------END CHECK SKILL*/
                    END CHECKSKILLWORKER;
                    /*-------------------------END BLOCK3 */
			    END LOOP LOOPSKILL;
                /*-------------------------END LOOP DELLE SKILL DEL CURRENT TASK*/
            CLOSE task_skill_iteretor;
		END CHECKSKILL;
        /*-------------------------END BLOCK2*/
        
		IF approximaty >= approximaty_temp THEN
			SET approximaty_temp = 0;
			ITERATE LOOPTASK;
		END IF;
		
		SET approximaty = approximaty_temp;
		SET approximaty_temp = 0;
		SET task_id = task_id_analized;
		
		END LOOP LOOPTASK;
		/*-------------------------END LOOP DEI TASK*/
    CLOSE task_iterator;
    /*-------------------------END BLOCK1*/

RETURN task_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `task_result` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `task_result`(task_id VARCHAR(254)) RETURNS varchar(254) CHARSET utf8
BEGIN
	DECLARE result_answer VARCHAR(254);
    SET result_answer = (SELECT tsk_a.answer

    FROM task_analytics AS tsk_a
    WHERE tsk_a.nof_answer >= (tsk_a.worker_max * tsk_a.majority) / 100 AND tsk_a.state >= 1 AND tsk_a.id = task_id
    ORDER BY tsk_a.nof_answer DESC
    LIMIT 0, 1);
RETURN result_answer;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `calculating_score` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `calculating_score`(IN task_id INT(11))
BEGIN
DECLARE someone_answered INT(11); 
DECLARE result_answer INT(11);
DECLARE answer_number INT(5);
DECLARE max_worker INT(5);
    SET result_answer = NULL;
    SET answer_number = 0;
    SET max_worker = 0;

SELECT 
    (tsk_a.answer_id)
INTO result_answer FROM
    task_analytics AS tsk_a
WHERE
    tsk_a.nof_answer >= (tsk_a.worker_max * tsk_a.majority) / 100
        AND tsk_a.state >= 1
        AND tsk_a.id = task_id
ORDER BY tsk_a.nof_answer DESC
LIMIT 0 , 1;

SELECT 
    COUNT(tsk_a.answer), tsk_a.worker_max
INTO answer_number , max_worker FROM
    task_analytics AS tsk_a
WHERE
    tsk_a.state >= 1
        AND tsk_a.id = task_id;

SELECT 
    COUNT(tsk_a.answer)
INTO someone_answered FROM
    task_analytics AS tsk_a
WHERE
    tsk_a.answer IS NOT NULL
        AND tsk_a.id = task_id;

IF someone_answered > 0 THEN
	UPDATE task SET state = 1
	WHERE id = task_id;
END IF;

IF result_answer IS NOT NULL OR answer_number = max_worker
THEN 
	UPDATE task SET state = 2
	WHERE id = task_id;
    
    UPDATE task_performed SET score = 1
	WHERE task = task_id AND answer = result_answer;
    
    UPDATE task_performed SET score = 0
	WHERE task = task_id AND answer != result_answer;
    
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `statistics_ofCampaign` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `statistics_ofCampaign`(IN my_user VARCHAR(254), IN my_camp INT(11), OUT tot_task INT,OUT tot_task_sub INT,OUT tot_task_answered INT,OUT tot_task_valid INT)
BEGIN
/*1 variabile*/  
SELECT COUNT(*) INTO tot_task FROM task WHERE campaign = my_camp;
/*2 variabile*/    
SELECT 
    COUNT(*) INTO tot_task_sub
FROM
    task_performed AS tp
        JOIN
    task AS t ON tp.task = t.id
WHERE
    t.campaign = my_camp AND tp.user = my_user;
/*3 variabile*/  
SELECT 
    COUNT(*) INTO tot_task_answered
FROM
    task_performed AS tp
        JOIN
    task AS t ON tp.task = t.id
WHERE
    t.campaign = my_camp
		AND tp.user = my_user
        AND tp.answer IS NOT NULL;
/*4 variabile*/  
SELECT 
    COUNT(*) INTO tot_task_valid
FROM
    task_performed AS tp
        JOIN
    task AS t ON tp.task = t.id
WHERE
    t.campaign = my_camp
		AND tp.user = my_user
        AND tp.answer IS NOT NULL
        AND tp.score = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `top10_user` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `top10_user`(IN cmp_id INT(11))
BEGIN
	
    DROP TEMPORARY TABLE IF EXISTS my_tmp_top10;
	CREATE TEMPORARY TABLE IF NOT EXISTS my_tmp_top10 
		(my_user VARCHAR(254) , my_tot_score INT, my_task_answers INT);
        
	INSERT INTO my_tmp_top10
	SELECT 
		tsk_p.user AS email, SUM(tsk_p.score) AS tot_score, count(tsk_p.user) as task_answers
	FROM
		task_performed tsk_p
			JOIN
		task tsk ON tsk.id = tsk_p.task
			JOIN
		campaign cmp ON cmp.id = tsk.campaign
	WHERE
		cmp.id = cmp_id
        AND tsk_p.answer IS NOT NULL
        AND tsk_p.score = 1
	GROUP BY email
	ORDER BY tot_score DESC, task_answers
	LIMIT 10;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `task_analytics`
--

/*!50001 DROP VIEW IF EXISTS `task_analytics`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `task_analytics` AS select `t`.`campaign` AS `campaign`,`t`.`id` AS `id`,`t`.`title` AS `title`,`t`.`description` AS `description`,`t`.`worker_max` AS `worker_max`,`t`.`majority` AS `majority`,`t`.`state` AS `state`,`ao`.`answer` AS `answer`,`ao`.`id` AS `answer_id`,`COUNTANSWER`(`t`.`id`,`ao`.`id`) AS `nof_answer`,`PROPORTION_RESULT`(`t`.`worker_max`,`COUNTANSWER`(`t`.`id`,`ao`.`id`)) AS `percentage` from (`task` `t` join `answer_options` `ao` on((`t`.`id` = `ao`.`task`))) */;
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

-- Dump completed on 2019-01-22  0:39:22
