-- MySQL dump 10.13  Distrib 5.7.16, for osx10.11 (x86_64)
--
-- Host: localhost    Database: db_redforma
-- ------------------------------------------------------
-- Server version	5.7.16

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
-- Table structure for table `rf_company`
--

DROP TABLE IF EXISTS `rf_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rf_company` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL DEFAULT '',
  `slug` varchar(100) NOT NULL DEFAULT '',
  `ruc` varchar(11) DEFAULT NULL,
  `creator_id` int(11) unsigned NOT NULL,
  `num_stats` int(11) DEFAULT '0',
  `num_favs` int(11) DEFAULT '0',
  `image` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `contact_adress` varchar(100) DEFAULT NULL,
  `contact_phone1` varchar(9) DEFAULT NULL,
  `contact_phone2` varchar(9) DEFAULT NULL,
  `contact_facebook` varchar(80) DEFAULT NULL,
  `contact_twitter` varchar(80) DEFAULT NULL,
  `contact_webpage` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `featered` tinyint(1) DEFAULT '0',
  `state` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_company_creator` (`creator_id`),
  CONSTRAINT `fk_company_creator` FOREIGN KEY (`creator_id`) REFERENCES `rf_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rf_company`
--

LOCK TABLES `rf_company` WRITE;
/*!40000 ALTER TABLE `rf_company` DISABLE KEYS */;
INSERT INTO `rf_company` VALUES (1,'Studio Software','studio-software','334344',1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1);
/*!40000 ALTER TABLE `rf_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rf_company_categories_group`
--

DROP TABLE IF EXISTS `rf_company_categories_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rf_company_categories_group` (
  `category_id` int(11) unsigned NOT NULL,
  `company_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`category_id`,`company_id`),
  KEY `fk_company_category_group` (`company_id`),
  CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `rf_company_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_company_category_group` FOREIGN KEY (`company_id`) REFERENCES `rf_company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rf_company_categories_group`
--

LOCK TABLES `rf_company_categories_group` WRITE;
/*!40000 ALTER TABLE `rf_company_categories_group` DISABLE KEYS */;
INSERT INTO `rf_company_categories_group` VALUES (1,1),(2,1);
/*!40000 ALTER TABLE `rf_company_categories_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rf_company_category`
--

DROP TABLE IF EXISTS `rf_company_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rf_company_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) DEFAULT NULL,
  `state` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rf_company_category`
--

LOCK TABLES `rf_company_category` WRITE;
/*!40000 ALTER TABLE `rf_company_category` DISABLE KEYS */;
INSERT INTO `rf_company_category` VALUES (1,'Comercio Electronico',1),(2,'Automoviles',1),(3,'Seguridad',1);
/*!40000 ALTER TABLE `rf_company_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rf_person`
--

DROP TABLE IF EXISTS `rf_person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rf_person` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(70) NOT NULL DEFAULT '',
  `lastName` varchar(70) NOT NULL DEFAULT '',
  `documentType` char(10) DEFAULT NULL,
  `documentNumber` char(16) NOT NULL DEFAULT '',
  `contact_address` varchar(120) DEFAULT NULL,
  `contact_cellphone` varchar(9) DEFAULT NULL,
  `contact_facebook` varchar(120) DEFAULT NULL,
  `contact_twitter` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`id`) REFERENCES `rf_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rf_person`
--

LOCK TABLES `rf_person` WRITE;
/*!40000 ALTER TABLE `rf_person` DISABLE KEYS */;
INSERT INTO `rf_person` VALUES (1,'Andy ','Ecca','47792905','DNI',NULL,NULL,NULL,NULL),(2,'Juan ','Pablito Chullo','34747472','CE',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `rf_person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rf_review`
--

DROP TABLE IF EXISTS `rf_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rf_review` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `slug` varchar(120) NOT NULL DEFAULT '',
  `description` varchar(700) NOT NULL DEFAULT '',
  `author_id` int(11) unsigned NOT NULL,
  `company_id` int(11) unsigned NOT NULL,
  `num_stars` int(11) DEFAULT '0',
  `num_visits` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `state` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_review_author` (`author_id`),
  KEY `fk_review_company` (`company_id`),
  CONSTRAINT `fk_review_author` FOREIGN KEY (`author_id`) REFERENCES `rf_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_review_company` FOREIGN KEY (`company_id`) REFERENCES `rf_company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rf_review`
--

LOCK TABLES `rf_review` WRITE;
/*!40000 ALTER TABLE `rf_review` DISABLE KEYS */;
/*!40000 ALTER TABLE `rf_review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rf_user`
--

DROP TABLE IF EXISTS `rf_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rf_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(70) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `role_id` int(11) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_role` (`role_id`),
  CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `rf_user_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rf_user`
--

LOCK TABLES `rf_user` WRITE;
/*!40000 ALTER TABLE `rf_user` DISABLE KEYS */;
INSERT INTO `rf_user` VALUES (1,'andy.ecca@gmail.com','123456',3,NULL,NULL,NULL,NULL),(2,'juanpablocs21@gmail.com','123456',3,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `rf_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rf_user_role`
--

DROP TABLE IF EXISTS `rf_user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rf_user_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rf_user_role`
--

LOCK TABLES `rf_user_role` WRITE;
/*!40000 ALTER TABLE `rf_user_role` DISABLE KEYS */;
INSERT INTO `rf_user_role` VALUES (1,'Reviewer'),(2,'Company'),(3,'Admin'),(4,'Moderator');
/*!40000 ALTER TABLE `rf_user_role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-05 11:17:44
