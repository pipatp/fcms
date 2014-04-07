CREATE DATABASE  IF NOT EXISTS `chainatfc` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `chainatfc`;
-- MySQL dump 10.13  Distrib 5.6.11, for Win32 (x86)
--
-- Host: localhost    Database: chainatfc
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt-log

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
-- Not dumping tablespaces as no INFORMATION_SCHEMA.FILES table on this server
--

--
-- Table structure for table `plvinf`
--

DROP TABLE IF EXISTS `plvinf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plvinf` (
  `PlvPwlNum` int(10) unsigned NOT NULL,
  `PlvSeqNum` int(10) unsigned NOT NULL,
  `PlvInpDts` char(14) default NULL,
  `PlvWeg` decimal(5,2) default NULL,
  `PlvHeg` decimal(5,2) default NULL,
  `PlvLowPrs` int(10) unsigned default NULL,
  `PlvHigPrs` int(10) unsigned default NULL,
  `PlvTem` decimal(4,2) default NULL,
  `PlvPul` int(10) unsigned default NULL,
  `PlvVO2max` int(11) default NULL,
  `PlvRra` int(11) default NULL,
  `PlvRtQua` int(11) default NULL,
  `PlvLtQua` int(11) default NULL,
  `PlvRtHam` int(11) default NULL,
  `PlvLtHam` int(11) default NULL,
  `PlvCmt` varchar(500) default NULL,
  `PlvUpdUid` char(12) default NULL,
  `PlvUpdDts` char(14) default NULL,
  PRIMARY KEY  (`PlvPwlNum`,`PlvSeqNum`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-07 22:26:14
