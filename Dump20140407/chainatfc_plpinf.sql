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
-- Table structure for table `plpinf`
--

DROP TABLE IF EXISTS `plpinf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plpinf` (
  `PlpPlyCod` char(20) NOT NULL,
  `PlpSeq` int(10) unsigned default NULL,
  `PlpStrDte` char(8) default NULL,
  `PlpEndDte` char(8) default NULL,
  `PlpAcc` smallint(5) unsigned default NULL,
  `PlpAgt` smallint(5) unsigned default NULL,
  `PlpBal` smallint(5) unsigned default NULL,
  `PlpJum` smallint(5) unsigned default NULL,
  `PlpNaf` smallint(5) unsigned default NULL,
  `PlpPac` smallint(5) unsigned default NULL,
  `PlpStm` smallint(5) unsigned default NULL,
  `PlpSta` smallint(5) unsigned default NULL,
  `PlpGkp` smallint(5) unsigned default NULL,
  `PlpPff` char(20) default NULL,
  `PlpHig` decimal(5,2) default NULL,
  `PlpWig` decimal(5,2) default NULL,
  `PlpUpdUid` char(20) default NULL,
  `PlpUpdDts` char(14) default NULL,
  PRIMARY KEY  (`PlpPlyCod`)
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

-- Dump completed on 2014-04-07 22:26:18
