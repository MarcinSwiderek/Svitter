-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: Svitter
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `Comments`
--

DROP TABLE IF EXISTS `Comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_text` varchar(60) DEFAULT NULL,
  `comment_date` datetime DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`),
  CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `Posts` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comments`
--

LOCK TABLES `Comments` WRITE;
/*!40000 ALTER TABLE `Comments` DISABLE KEYS */;
INSERT INTO `Comments` VALUES (1,18,6,'Tresc komentarza','2015-02-02 14:23:33'),(3,21,6,'aaaaaaaaa','2015-03-27 14:50:22'),(4,20,5,'jakis taki krotki ten komentarz jeb jeb jeb','2015-03-27 14:51:16'),(5,20,5,'aaaaaaa','2015-03-27 15:12:25'),(6,20,5,'dsadas','2015-03-27 15:12:27'),(7,20,5,'aaaaaaaaasdadsas','2015-03-27 15:19:03'),(8,20,6,'jhklhhkh','2015-03-27 15:28:05'),(9,20,6,'fdas','2015-03-27 15:30:31'),(10,20,9,'dasdfsaf','2015-03-31 19:20:38');
/*!40000 ALTER TABLE `Comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Messages`
--

DROP TABLE IF EXISTS `Messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_text` text,
  `message_date` datetime DEFAULT NULL,
  `if_read` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `sender_id` (`sender_id`),
  KEY `receiver_id` (`receiver_id`),
  CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `Users` (`id`),
  CONSTRAINT `Messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `Users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Messages`
--

LOCK TABLES `Messages` WRITE;
/*!40000 ALTER TABLE `Messages` DISABLE KEYS */;
INSERT INTO `Messages` VALUES (1,20,18,'Tekst wiadomo?ci','2015-02-13 13:24:24',NULL),(2,20,18,'dsadasffas','2015-03-31 16:53:02',NULL),(3,20,18,'hej andrzej !','2015-03-31 16:54:30',NULL),(4,20,18,'kolejna wiadomosc do andrzeja','2015-03-31 16:56:12',NULL),(5,18,18,'sasa','2015-03-31 17:53:27',NULL),(6,20,18,'CzeÅ›Ä‡ Andrzej ? co u ciebie ? ja tutaj sobie kodzÄ™, fajnie co ? hehe','2015-03-31 17:59:53',NULL),(7,18,20,'Wiadomosc do marcina\r\n','2015-03-31 19:09:34',NULL);
/*!40000 ALTER TABLE `Messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Posts`
--

DROP TABLE IF EXISTS `Posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_name` varchar(30) DEFAULT NULL,
  `post_input` varchar(140) DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `Posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Posts`
--

LOCK TABLES `Posts` WRITE;
/*!40000 ALTER TABLE `Posts` DISABLE KEYS */;
INSERT INTO `Posts` VALUES (4,18,'post andrzeja','trescdasd','2015-03-27 12:09:18'),(5,18,'post andrzeja','trescdasdczx','2015-03-27 12:10:18'),(6,18,'Nosz ja pier','Andrzej malkontent pisze opis..','2015-03-27 12:14:08'),(7,19,'Tytul posta mietka','tresc posta mietka\r\n','2015-03-27 12:30:45'),(8,18,'swiezy post ','aaaaa','2015-03-27 12:54:04'),(9,18,'nowy post','tresc nowego postu','2015-03-27 12:55:38'),(10,20,'','','2015-03-31 19:21:44');
/*!40000 ALTER TABLE `Posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (2,'test1','$2y$05$LTxHxX3uUBDf2INKQ1Vlg.oOah76LZptqykXWAkW.KCXqLRFwU/Ia'),(3,'test3','$2y$05$aq1XGz5srubDFTVqVEEDxuTZbgvDjsNW0v3OkU2qHS0ZLusvH4Cfq'),(4,'test2','$2y$05$Sj0gQGJiAkIxcRuaw0DFHuZiQVvEN3yTtc5Z//d4Ds4qH8enSPGSC'),(6,'test7','$2y$05$oWAvTq6Vxmmoue4x6eS53.uVbb.aKTpIbcPuh2zxJJgnE3GO7zeYK'),(7,'test8','$2y$05$XNYrF2G6ad7yAch1c/02b.swj8iF0l22006TJ/yf/TmW6f3D3n4pi'),(9,'test11','$2y$05$AM2p3W/XJrmbrOD0tD0iEeJVLiFO9kgs/m.87wbihERBjiic1bT2a'),(10,'maciek','$2y$05$CSoUBNEXR1I70HNQoJ9GZ.2my0t2XhicdmEDdG6rywUCRBHaU8zqK'),(11,'iras1','$2y$05$QHjkEYF4NPw.X01/mtuLyOkRm8neapJ6d5TaDkUPhkMt2kBdUOWxO'),(18,'andrzej','$2y$05$5qdSFg9aTuYwYOjn.NxJJOX.Gb60lj0FWYx2805z4J7Y2sjtnskfq'),(19,'mietek','$2y$05$1H8pXXTJGAuw7htqcE8/qevia9VlWCzmSo5lkdiCjivAXyIJN73yu'),(20,'marcin','$2y$05$TjM9EalslWczJ/HuEd8wL.SsNWk.70l13hg8o84zfGNHnQvnGLN2q'),(21,'test20','$2y$05$OTFI241ZH9oOkDfwxo3PjuflWxmaIhe1q/XTvGnNInmjqsKA9NmYe');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-31 21:46:15
