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
-- Table structure for table `plyinf`
--

DROP TABLE IF EXISTS `plyinf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plyinf` (
  `PlyCod` char(20) NOT NULL,
  `PlyTitCod` char(20) default NULL,
  `PlyFstNam` varchar(20) default NULL,
  `PlyMidNam` varchar(20) default NULL,
  `PlyFamNam` varchar(20) default NULL,
  `PlyFstEng` varchar(20) default NULL,
  `PlyMidEng` varchar(20) default NULL,
  `PlyFamEng` varchar(20) default NULL,
  `PlyNatCod` char(20) default NULL,
  `PlyPerNum` varchar(20) default NULL,
  `PlyPasNum` varchar(20) default NULL,
  `PlyBirDte` char(8) default NULL,
  `PlyPicPth` varchar(200) default NULL,
  `PlyAddNum` varchar(200) default NULL,
  `PlyAddDtl` varchar(200) default NULL,
  `PlyAddCty` varchar(50) default NULL,
  `PlyAddPrv` varchar(50) default NULL,
  `PlyAddZip` varchar(10) default NULL,
  `PlyAddCot` varchar(50) default NULL,
  `PlyNumEng` varchar(200) default NULL,
  `PlyDtlEng` varchar(200) default NULL,
  `PlyRegCod` char(20) default NULL,
  `PlySexTyp` char(1) default NULL,
  `PlyPhnNum` varchar(100) default NULL,
  `PlyMblNum` varchar(100) default NULL,
  `PlyConPer` varchar(100) default NULL,
  `PlyConPhn` varchar(100) default NULL,
  `PlyEmlAdd` varchar(100) default NULL,
  `PlyCurStt` char(1) default NULL,
  `PlyCreDte` char(8) default NULL,
  `PlyExpDte` char(8) default NULL,
  `PlyUpdUid` char(20) default NULL,
  `PlyUpdDts` char(14) default NULL,
  PRIMARY KEY  (`PlyCod`)
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

-- Dump completed on 2014-04-07 22:26:19
