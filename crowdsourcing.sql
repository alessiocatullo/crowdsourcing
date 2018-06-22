CREATE DATABASE  IF NOT EXISTS `crowd_sourcing` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `crowd_sourcing`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: crowd_sourcing
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
-- Table structure for table `answer_options`
--

DROP TABLE IF EXISTS `answer_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(150) NOT NULL,
  `task` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_answers_idx` (`task`),
  CONSTRAINT `task_answers` FOREIGN KEY (`task`) REFERENCES `task` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer_options`
--

LOCK TABLES `answer_options` WRITE;
/*!40000 ALTER TABLE `answer_options` DISABLE KEYS */;
INSERT INTO `answer_options` VALUES (1,'Jazz',1),(2,'Rock',1),(3,'Pop ',1),(4,'JE',2),(5,'JR',2);
/*!40000 ALTER TABLE `answer_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign`
--

DROP TABLE IF EXISTS `campaign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `dt_start` date NOT NULL,
  `dt_end` date NOT NULL,
  `dt_accession_start` date NOT NULL,
  `dt_accession_end` date NOT NULL,
  `user` varchar(254) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_creation_idx` (`user`),
  CONSTRAINT `user_creation` FOREIGN KEY (`user`) REFERENCES `user` (`mail`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign`
--

LOCK TABLES `campaign` WRITE;
/*!40000 ALTER TABLE `campaign` DISABLE KEYS */;
INSERT INTO `campaign` VALUES (1,'PROVA 1','2018-06-21','2099-06-25','2018-06-21','2099-06-24','acatullo@test.com'),(2,'PROVA 2','2018-06-21','2099-06-25','2018-06-21','2099-06-24','frigamonti@test.com'),(3,'PROVA 3','2018-06-21','2099-06-25','2018-06-21','2099-06-24','frigamonti@test.com'),(4,'PROVA 4','2018-06-21','2099-06-25','2018-06-21','2099-06-24','acatullo@test.com'),(5,'PROVA 5','2018-06-21','2099-06-25','2018-06-21','2099-06-24','acatullo@test.com');
/*!40000 ALTER TABLE `campaign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skill`
--

DROP TABLE IF EXISTS `skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill`
--

LOCK TABLES `skill` WRITE;
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;
/*!40000 ALTER TABLE `skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `description` longtext,
  `worker_max` int(5) NOT NULL,
  `majority` int(3) NOT NULL,
  `cash_reward` decimal(10,0) DEFAULT NULL,
  `item_reward` varchar(100) DEFAULT NULL,
  `campaign` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `campaign_task_idx` (`campaign`),
  CONSTRAINT `campaign_task` FOREIGN KEY (`campaign`) REFERENCES `campaign` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` VALUES (1,'Indica la categoria migliore per il seguente album musicale ','The dark side of moon ',5,60,NULL,NULL,1),(2,'cvbsfgb','rfwer',3,60,NULL,NULL,1);
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `task_answers`
--

DROP TABLE IF EXISTS `task_answers`;
/*!50001 DROP VIEW IF EXISTS `task_answers`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `task_answers` AS SELECT 
 1 AS `task_id`,
 1 AS `task_title`,
 1 AS `answer`,
 1 AS `majority`,
 1 AS `worker_max`,
 1 AS `count_answer`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `task_performed`
--

DROP TABLE IF EXISTS `task_performed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task_performed` (
  `task` int(11) NOT NULL,
  `user` varchar(254) NOT NULL,
  `score` int(1) NOT NULL,
  `state` int(1) DEFAULT NULL,
  `answer` int(11) DEFAULT NULL,
  PRIMARY KEY (`task`,`user`),
  KEY `user_answer_idx` (`answer`),
  KEY `user_id_idx` (`user`),
  CONSTRAINT `task_id` FOREIGN KEY (`task`) REFERENCES `task` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `user_answer` FOREIGN KEY (`answer`) REFERENCES `answer_options` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `user_id` FOREIGN KEY (`user`) REFERENCES `user` (`mail`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_performed`
--

LOCK TABLES `task_performed` WRITE;
/*!40000 ALTER TABLE `task_performed` DISABLE KEYS */;
INSERT INTO `task_performed` VALUES (1,'a@test.com',0,1,1),(1,'acatullo_wrk@test.com',1,1,2),(1,'b@test.com',1,1,3),(1,'c@test.com',0,1,3),(1,'frigamonti_wrk@test.com',1,1,2),(2,'a@test.com',0,1,4),(2,'acatullo_wrk@test.com',0,1,5),(2,'frigamonti_wrk@test.com',0,1,4);
/*!40000 ALTER TABLE `task_performed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `task_result`
--

DROP TABLE IF EXISTS `task_result`;
/*!50001 DROP VIEW IF EXISTS `task_result`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `task_result` AS SELECT 
 1 AS `campaign_name`,
 1 AS `task_title`,
 1 AS `task_description`,
 1 AS `worker_max`,
 1 AS `majority_required`,
 1 AS `validity`,
 1 AS `valid_answer`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `task_skills_required`
--

DROP TABLE IF EXISTS `task_skills_required`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task_skills_required` (
  `task` int(11) NOT NULL,
  `skill` int(11) NOT NULL,
  `rate_min` int(11) DEFAULT '0',
  PRIMARY KEY (`task`,`skill`),
  KEY `skill_idx` (`skill`),
  CONSTRAINT `skill` FOREIGN KEY (`skill`) REFERENCES `skill` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `task` FOREIGN KEY (`task`) REFERENCES `task` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_skills_required`
--

LOCK TABLES `task_skills_required` WRITE;
/*!40000 ALTER TABLE `task_skills_required` DISABLE KEYS */;
/*!40000 ALTER TABLE `task_skills_required` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `mail` varchar(254) NOT NULL,
  `password` varchar(20) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dt_birth` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `town` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('a@test.com','1234','a','a',NULL,NULL,NULL,NULL,NULL,'WORKER'),('acatullo@test.com','1234','Alessio','Catullo',NULL,NULL,NULL,NULL,NULL,'REQUESTER'),('acatullo_wrk@test.com','1234','Alessio','Catullo',NULL,NULL,NULL,NULL,NULL,'WORKER'),('b@test.com','1234','b','b',NULL,NULL,NULL,NULL,NULL,'WORKER'),('c@test.com','1234','c','c',NULL,NULL,NULL,NULL,NULL,'WORKER'),('frigamonti@test.com','1234','Filippo','Rigamonti',NULL,NULL,NULL,NULL,'2018-06-20 15:37:12','REQUESTER'),('frigamonti_wrk@test.com','1234','Filippo','Rigamonti',NULL,NULL,NULL,NULL,NULL,'WORKER');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_skills`
--

DROP TABLE IF EXISTS `user_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_skills` (
  `user` varchar(254) NOT NULL,
  `skill` int(11) NOT NULL,
  `rate` int(2) DEFAULT '0',
  PRIMARY KEY (`user`,`skill`),
  KEY `skill_id_idx` (`skill`),
  CONSTRAINT `skill_id` FOREIGN KEY (`skill`) REFERENCES `skill` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `user_mail` FOREIGN KEY (`user`) REFERENCES `user` (`mail`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_skills`
--

LOCK TABLES `user_skills` WRITE;
/*!40000 ALTER TABLE `user_skills` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `valid_answer`
--

DROP TABLE IF EXISTS `valid_answer`;
/*!50001 DROP VIEW IF EXISTS `valid_answer`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `valid_answer` AS SELECT 
 1 AS `task_id`,
 1 AS `task_title`,
 1 AS `answer`,
 1 AS `majority`,
 1 AS `worker_max`,
 1 AS `count_answer`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `task_answers`
--

/*!50001 DROP VIEW IF EXISTS `task_answers`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `task_answers` AS select `tsk`.`id` AS `task_id`,`tsk`.`title` AS `task_title`,`ans`.`answer` AS `answer`,`tsk`.`majority` AS `majority`,`tsk`.`worker_max` AS `worker_max`,count(0) AS `count_answer` from ((`task_performed` `tskp` join `answer_options` `ans`) join `task` `tsk`) where ((`tskp`.`task` = `tsk`.`id`) and (`tskp`.`answer` = `ans`.`id`)) group by `tsk`.`title`,`ans`.`answer` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `task_result`
--

/*!50001 DROP VIEW IF EXISTS `task_result`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `task_result` AS select `cmp`.`name` AS `campaign_name`,`tsk`.`title` AS `task_title`,`tsk`.`description` AS `task_description`,`tsk`.`worker_max` AS `worker_max`,`tsk`.`majority` AS `majority_required`,count(`va`.`answer`) AS `validity`,`va`.`answer` AS `valid_answer` from ((`campaign` `cmp` join `task` `tsk`) left join `valid_answer` `va` on((`va`.`task_id` = `tsk`.`id`))) where (`cmp`.`id` = `tsk`.`campaign`) group by `campaign_name`,`va`.`task_title`,`task_description`,`tsk`.`worker_max`,`majority_required`,`valid_answer` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `valid_answer`
--

/*!50001 DROP VIEW IF EXISTS `valid_answer`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `valid_answer` AS select `ta`.`task_id` AS `task_id`,`ta`.`task_title` AS `task_title`,`ta`.`answer` AS `answer`,`ta`.`majority` AS `majority`,`ta`.`worker_max` AS `worker_max`,`ta`.`count_answer` AS `count_answer` from `task_answers` `ta` where (((`ta`.`count_answer` / `ta`.`worker_max`) * 100) >= `ta`.`majority`) */;
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

-- Dump completed on 2018-06-22 15:54:52
