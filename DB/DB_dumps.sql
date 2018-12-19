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
  PRIMARY KEY (`answer`,`task`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `task_answers_idx` (`task`),
  CONSTRAINT `task_answers` FOREIGN KEY (`task`) REFERENCES `task` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15664 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer_options`
--

LOCK TABLES `answer_options` WRITE;
/*!40000 ALTER TABLE `answer_options` DISABLE KEYS */;
INSERT INTO `answer_options` VALUES (1,'Jazz',1),(2,'Rock',1),(3,'Pop ',1);
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
  PRIMARY KEY (`name`,`user`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `user_creation_idx` (`user`),
  CONSTRAINT `user_creation` FOREIGN KEY (`user`) REFERENCES `user` (`user`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign`
--

LOCK TABLES `campaign` WRITE;
/*!40000 ALTER TABLE `campaign` DISABLE KEYS */;
INSERT INTO `campaign` VALUES (2,'PROVA 2','2018-06-21','2099-06-25','2018-06-21','2099-06-24','frigamonti@test.com'),(3,'PROVA 3','2018-06-21','2099-06-25','2018-06-21','2099-06-24','frigamonti@test.com'),(4,'PROVA 4','2018-06-21','2099-06-25','2018-06-21','2099-06-24','acatullo@test.com'),(5,'PROVA 5','2018-06-21','2099-06-25','2018-06-21','2099-06-24','acatullo@test.com'),(1,'PROVA1','2018-06-21','2099-06-25','2018-06-21','2099-06-24','acatullo@test.com');
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
  `main_skill` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`,`main_skill`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill`
--

LOCK TABLES `skill` WRITE;
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;
INSERT INTO `skill` VALUES (1,'Musica',0),(2,'Games',0),(3,'Film',0),(4,'Informatica',0),(5,'Jazz',1),(6,'Blues',1),(7,'Metal',1),(8,'Folk',1),(9,'Funky',1),(10,'Rock',1),(11,'Hip-Pop',1),(12,'Rap',1),(13,'Pop',1),(14,'Indie',1),(15,'RPG',2),(16,'FPS Arena',2),(17,'Moba',2),(18,'Quiz',2),(19,'Survival horror',2),(20,'Simulazione',2),(21,'Sport',2),(22,'Indie',2),(23,'Avventura Grafica',2),(24,'Animazione',3),(25,'Commedia',3),(26,'Documentario',3),(27,'Avventura',3),(28,'Horror',3),(29,'Thriller',3),(30,'Storico',3),(31,'Fantasy',3),(32,'Drammatico',3),(33,'Notebook',4),(34,'Tablet',4),(35,'Schede Grafiche',4),(36,'Monitor',4),(37,'Stampanti',4),(38,'Hard Disk',4),(39,'Router',4),(40,'Mouse',4),(41,'Tastiere',4);
/*!40000 ALTER TABLE `skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skill_subcategory`
--

DROP TABLE IF EXISTS `skill_subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `reward` varchar(100) DEFAULT NULL,
  `state` int(1) DEFAULT '0' COMMENT '0 = creato\n1 = in corso\n2 = risultato calcolato',
  `campaign` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `campaign_task_idx` (`campaign`),
  CONSTRAINT `campaign_task` FOREIGN KEY (`campaign`) REFERENCES `campaign` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15581 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` VALUES (1,'Indica la categoria migliore per il seguente album musicale ','The dark side of moon ',5,60,NULL,2,1),(2,'PROVA 1','PROVA 1',5,60,NULL,2,1),(3,'PROVA 2','PROVA 2',5,60,NULL,2,1);
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `task_analytics`
--

DROP TABLE IF EXISTS `task_analytics`;
/*!50001 DROP VIEW IF EXISTS `task_analytics`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `task_analytics` AS SELECT 
 1 AS `campaign_id`,
 1 AS `campaign_name`,
 1 AS `task_id`,
 1 AS `task_title`,
 1 AS `task_description`,
 1 AS `worker_max`,
 1 AS `majority_required`,
 1 AS `task_state`,
 1 AS `nof_answer`,
 1 AS `answer_id`,
 1 AS `answer`*/;
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
  `score` int(1) DEFAULT NULL,
  `answer` int(11) DEFAULT NULL,
  PRIMARY KEY (`task`,`user`),
  KEY `user_answer_idx` (`answer`),
  KEY `user_id_idx` (`user`),
  CONSTRAINT `task_id` FOREIGN KEY (`task`) REFERENCES `task` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `user_answer` FOREIGN KEY (`answer`) REFERENCES `answer_options` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `user_id` FOREIGN KEY (`user`) REFERENCES `user` (`user`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_performed`
--

LOCK TABLES `task_performed` WRITE;
/*!40000 ALTER TABLE `task_performed` DISABLE KEYS */;
INSERT INTO `task_performed` VALUES (1,'acatullo_wrk@test.com',1,1),(1,'b@test.com',1,1),(1,'c@test.com',0,2),(1,'fg@test.com',0,2),(1,'p@p',1,1);
/*!40000 ALTER TABLE `task_performed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_skill`
--

DROP TABLE IF EXISTS `task_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill` int(11) NOT NULL,
  `skill_subcategory` int(11) DEFAULT NULL,
  `task` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_idx` (`task`),
  KEY `skill_idx` (`skill`),
  KEY `skill_category_idx` (`skill_subcategory`),
  CONSTRAINT `skill` FOREIGN KEY (`skill`) REFERENCES `skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_subcategory` FOREIGN KEY (`skill_subcategory`) REFERENCES `skill_subcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `task` FOREIGN KEY (`task`) REFERENCES `task` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_skill`
--

LOCK TABLES `task_skill` WRITE;
/*!40000 ALTER TABLE `task_skill` DISABLE KEYS */;
INSERT INTO `task_skill` VALUES (1,1,NULL,1);
/*!40000 ALTER TABLE `task_skill` ENABLE KEYS */;
UNLOCK TABLES;

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
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('1@1','1','admin','admin','2018-10-08','Via dei pini','Pieve Emanuele','Milano','2018-12-14 12:20:26','ADMIN',1),('a@test.com','a','a','a',NULL,NULL,NULL,NULL,'2018-10-29 17:04:18','REQUESTER',1),('acatullo@test.com','1234','Alessio','Catullo',NULL,NULL,NULL,NULL,'2018-12-14 12:20:16','REQUESTER',1),('acatullo_wrk@test.com','1234','Alessio','Catullo',NULL,NULL,NULL,NULL,'2018-12-13 14:49:57','WORKER',1),('asd@asd','asd','asd','asd',NULL,NULL,NULL,NULL,NULL,'REQUESTER',1),('b@test.com','1234','b','b',NULL,NULL,NULL,NULL,NULL,'WORKER',1),('c@test.com','1234','c','c',NULL,NULL,NULL,NULL,NULL,'WORKER',1),('dfg@dfg','dfg','dfg','dfg',NULL,NULL,NULL,NULL,NULL,'WORKER',1),('fg@test.com','1234','Fil','gor',NULL,NULL,NULL,NULL,NULL,'WORKER',1),('frigamonti@test.com','1234','Filippo','Rigamonti',NULL,NULL,NULL,NULL,'2018-06-20 15:37:12','REQUESTER',1),('frigamonti_wrk@test.com','1234','Filippo','Rigamonti',NULL,NULL,NULL,NULL,NULL,'WORKER',1),('g@g','g','Andrea','g',NULL,NULL,NULL,NULL,'2018-10-02 22:51:14','WORKER',1),('gasdf@asdf','asd','giada','gge',NULL,NULL,NULL,NULL,NULL,'REQUESTER',1),('h@h','h','h','h',NULL,NULL,NULL,NULL,NULL,'WORKER',1),('m@c','1234','marta','castoldi',NULL,NULL,NULL,NULL,NULL,'REQUESTER',0),('nacar@gmail.com','asd','andrea','nacar',NULL,NULL,NULL,NULL,'2018-08-24 18:31:16','WORKER',1),('p@p','p','p','p',NULL,NULL,NULL,NULL,NULL,'WORKER',1),('sdf@sdf','sdf','sdf','sdf',NULL,NULL,NULL,NULL,NULL,'REQUESTER',0),('v@c','c','viviana','catullo',NULL,NULL,NULL,NULL,'2018-08-26 17:40:55','REQUESTER',0),('wer@wer','wer','wer','wer',NULL,NULL,NULL,NULL,'2018-12-14 12:11:02','REQUESTER',0);
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
  CONSTRAINT `user_mail` FOREIGN KEY (`user`) REFERENCES `user` (`user`) ON DELETE NO ACTION ON UPDATE CASCADE
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
-- Dumping routines for database 'crowd_sourcing'
--
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
    tsk_a.nof_answer >= (tsk_a.worker_max * tsk_a.majority_required) / 100
        AND tsk_a.task_state >= 1
        AND tsk_a.task_id = task_id
ORDER BY tsk_a.nof_answer DESC
LIMIT 0 , 1;

SELECT 
    COUNT(tsk_a.answer), tsk_a.worker_max
INTO answer_number , max_worker FROM
    task_analytics AS tsk_a
WHERE
    tsk_a.task_state >= 1
        AND tsk_a.task_id = task_id;
    
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
/*!50003 DROP PROCEDURE IF EXISTS `campaign_analytics` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `campaign_analytics`(IN my_campaign_id INT(11))
BEGIN
	DECLARE fetch_done INT DEFAULT FALSE;
    DECLARE procedure_done INT DEFAULT FALSE;
	DECLARE my_task_id INT(11);
	DECLARE task_id_cursor CURSOR FOR SELECT tsk.id FROM task tsk WHERE tsk.campaign = my_campaign_id AND tsk.state >= 2;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fetch_done = TRUE, procedure_done = TRUE;
    
    DROP TEMPORARY TABLE IF EXISTS my_tmp_task;
    CREATE TEMPORARY TABLE IF NOT EXISTS my_tmp_task 
		(my_tsk_id INT(11) , my_tsk_title VARCHAR(150), my_tsk_description LONGTEXT, my_res_ans_id INT(11), my_res_ans VARCHAR(150));
    
    OPEN task_id_cursor;
    LOOPTASK: LOOP
    
		FETCH task_id_cursor INTO my_task_id;
		IF fetch_done = TRUE THEN
			LEAVE LOOPTASK;
		END IF;
        
		CALL task_results(my_task_id, @result_answer_id, @result_answer);
            
		IF (procedure_done = TRUE) THEN 
		   SET fetch_done = FALSE;
		END IF;
		
		-- SELECT tsk.id, tsk.title, tsk.description, @result_answer_id, @result_answer FROM task tsk WHERE tsk.id = my_task_id;
		INSERT INTO my_tmp_task(my_tsk_id, my_tsk_title, my_tsk_description, my_res_ans_id, my_res_ans) 
			SELECT tsk.id, tsk.title, tsk.description, @result_answer_id, @result_answer FROM task tsk WHERE tsk.id = my_task_id;   
    END LOOP LOOPTASK;
    
    CLOSE task_id_cursor;
    SELECT * FROM my_tmp_task;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `task_results` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `task_results`(IN task_id INT(11), OUT result_answer_id INT(11), OUT result_answer VARCHAR(150))
BEGIN
	SELECT tsk_a.answer_id, tsk_a.answer INTO result_answer_id, result_answer
    FROM task_analytics AS tsk_a
    WHERE tsk_a.nof_answer >= (tsk_a.worker_max * tsk_a.majority_required) / 100 AND tsk_a.task_state >= 1 AND tsk_a.task_id = task_id
    ORDER BY tsk_a.nof_answer DESC
    LIMIT 0, 1;
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
/*!50001 VIEW `task_analytics` AS select `cmp`.`id` AS `campaign_id`,`cmp`.`name` AS `campaign_name`,`tsk`.`id` AS `task_id`,`tsk`.`title` AS `task_title`,`tsk`.`description` AS `task_description`,`tsk`.`worker_max` AS `worker_max`,`tsk`.`majority` AS `majority_required`,`tsk`.`state` AS `task_state`,count(`tsk_p`.`answer`) AS `nof_answer`,`ans`.`id` AS `answer_id`,`ans`.`answer` AS `answer` from (((`campaign` `cmp` join `task` `tsk` on((`tsk`.`campaign` = `cmp`.`id`))) left join `task_performed` `tsk_p` on((`tsk_p`.`task` = `tsk`.`id`))) left join `answer_options` `ans` on((`ans`.`id` = `tsk_p`.`answer`))) where (`tsk`.`state` >= 1) group by `campaign_id`,`campaign_name`,`task_id`,`task_title`,`task_description`,`tsk`.`worker_max`,`majority_required`,`task_state`,`answer_id`,`ans`.`answer` */;
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

-- Dump completed on 2018-12-19 15:20:12
