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
-- Dumping routines for database 'chainatfc'
--
/*!50003 DROP FUNCTION IF EXISTS `fFormat` */;
--
-- WARNING: old server version. The following dump may be incomplete.
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `fFormat`(sFormat TEXT, sPar1 TEXT) RETURNS text CHARSET utf8
BEGIN
  RETURN REPLACE(sFormat, '%s', sPar1);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fn_addPlayerMealItem` */;
--
-- WARNING: old server version. The following dump may be incomplete.
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_addPlayerMealItem`(IN `p_worklistSeq` INT, IN `p_orderCode` VARCHAR(20), IN `p_mealCode` VARCHAR(20), IN `p_mealWeight` INT, IN `p_mealCalorie` INT, IN `p_yearMonth` VARCHAR(6), IN `p_date` VARCHAR(2))
BEGIN
	DECLARE l_seq INTEGER;
	
	DECLARE l_exists INTEGER;
	SET l_exists = 0;
	
	SELECT 1 INTO l_exists FROM wklinf wl WHERE wl.WklPwlSeq = p_worklistSeq AND wl.WklOdrCod = p_orderCode;
	
	IF l_exists = 0 THEN
		CALL pRaiseError("this is a sample error message");
	END IF;
	
	SELECT IFNULL(MAX(wm.WkmMelSeq), 0) + 1 INTO l_seq FROM wkmInf wm WHERE wm.WkmPwlSeq = p_worklistSeq AND wm.WkmOdrCod = p_orderCode;
	
	INSERT INTO wkminf(WkmPwlSeq, WkmOdrCod, WkmMelSeq, WkmMelCod, WkmMelWeg, WkmMelCal, WkmEdtYon, WkmMelYrm, WkmMelDay, WkmOdrStt)
	VALUES (p_worklistSeq, p_orderCode, l_seq, p_mealCode, p_mealWeight, p_mealCalorie, 'N', p_yearMonth, p_date, 'N');
	
	SELECT wm.WkmPwlSeq, wm.WkmMelSeq, wm.WkmOdrCod, wm.WkmMelCod, wm.WkmMelWeg, wm.WkmMelCal, om.OdrLocNam, om2.OdrSubTyp
	FROM wkminf wm, odrmst om, odrmst om2
	WHERE wm.WkmMelCod = om.OdrCod AND wm.WkmOdrCod = om2.OdrCod AND
		wm.WkmPwlSeq = p_worklistSeq AND wm.WkmOdrCod = p_orderCode AND wm.WkmMelSeq = l_seq;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fn_deleteFoodMeal` */;
--
-- WARNING: old server version. The following dump may be incomplete.
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_deleteFoodMeal`(IN `p_yearMonth` VARCHAR(6), IN `p_day` VARCHAR(2), IN `p_weekDay` SMALLINT, IN `p_type` VARCHAR(3), IN `p_code` VARCHAR(20))
BEGIN
	DECLARE l_ommNum INTEGER;
	
	SELECT o.OmmNum INTO l_ommNum FROM ommmst o WHERE o.OmmYrm = p_yearMonth AND o.OmmDay = p_day AND o.OmmTyp = p_type;

	IF l_ommNum IS NOT NULL THEN
		DELETE FROM omdmst WHERE OmdNum = l_ommNum AND OmdOdrCod = p_code;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fn_deletePlayerMealItem` */;
--
-- WARNING: old server version. The following dump may be incomplete.
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_deletePlayerMealItem`(IN `p_worklistSeq` INT, IN `p_orderCode` VARCHAR(20), IN `p_mealSeq` INT)
BEGIN
	DELETE FROM wkminf WHERE WkmPwlSeq = p_worklistSeq AND WkmOdrCod = p_orderCode AND WkmMelSeq = p_mealSeq;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fn_editPlayerMealItem` */;
--
-- WARNING: old server version. The following dump may be incomplete.
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_editPlayerMealItem`(IN `p_worklistSeq` INT, IN `p_orderCode` VARCHAR(20), IN `p_mealSeq` INT, IN `p_mealCode` VARCHAR(20), IN `p_mealWeight` INT, IN `p_mealCalorie` INT)
BEGIN
	UPDATE wkminf 
	SET WkmMelCod = p_mealCode, WkmMelWeg = p_mealWeight, WkmMelCal = p_mealCalorie
	WHERE WkmPwlSeq = p_worklistSeq AND WkmOdrCod = p_orderCode AND WkmMelSeq = p_mealSeq;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fn_findFoodMeal` */;
--
-- WARNING: old server version. The following dump may be incomplete.
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_findFoodMeal`(IN `p_name` VARCHAR(50))
BEGIN
	SELECT * FROM odrmst om WHERE om.OdrCatTyp = 'NUT' AND om.OdrSubTyp = 'DTL' AND 
		(om.OdrLocNam LIKE CONCAT('%', p_name, '%') OR om.OdrEngNam LIKE CONCAT('%', p_name, '%'));
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fn_findPlayer` */;
--
-- WARNING: old server version. The following dump may be incomplete.
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_findPlayer`(IN `p_term` VARCHAR(100))
BEGIN
	SELECT *
	FROM plyinf p
	WHERE p.PlyFstNam LIKE CONCAT('%', p_term, '%') OR p.PlyFamNam LIKE CONCAT('%', p_term, '%') OR
		p.PlyFstEng LIKE CONCAT('%', p_term, '%') OR p.PlyFamEng LIKE CONCAT('%', p_term, '%');
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fn_getFoodMealSet` */;
--
-- WARNING: old server version. The following dump may be incomplete.
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getFoodMealSet`(IN `p_yearMonth` VARCHAR(6), IN `p_day` VARCHAR(2))
BEGIN
	SELECT od.OmdMelWeg, od.OmdMelCal, mm.OdrCod, mm.OdrLocNam, om.OmmTyp 
	FROM ommmst om, omdmst od, odrmst mm 
	WHERE om.OmmNum = od.OmdNum AND od.OmdOdrCod = mm.OdrCod AND om.OmmYrm = p_yearMonth AND
		om.OmmDay = p_day
	ORDER BY od.OmdNum, od.OmdSeq;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fn_getPlayerMealSet` */;
--
-- WARNING: old server version. The following dump may be incomplete.
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getPlayerMealSet`(IN `p_player` VARCHAR(20), IN `p_date` VARCHAR(8))
BEGIN
	SELECT wm.WkmPwlSeq, wm.WkmMelSeq, wm.WkmOdrCod, wm.WkmMelCod, wm.WkmMelWeg, wm.WkmMelCal, om.OdrLocNam, om2.OdrSubTyp
	FROM pwlinf pw, wkminf wm, odrmst om, odrmst om2
	WHERE pw.PwlSeqNum = wm.WkmPwlSeq AND wm.WkmMelCod = om.OdrCod AND
		wm.WkmOdrCod = om2.OdrCod AND
		pw.PwlPlyCod = p_player AND pw.PwlAppDte = p_date;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fn_getPlayerWorklistMeal` */;
--
-- WARNING: old server version. The following dump may be incomplete.
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getPlayerWorklistMeal`(IN `p_player` VARCHAR(20), IN `p_date` VARCHAR(8))
BEGIN
	SELECT om.OdrSubTyp, wl.WklOdrCod
	FROM pwlinf pw, wklinf wl, odrmst om
	WHERE pw.PwlSeqNum = wl.WklPwlSeq AND wl.WklOdrCod = om.OdrCod AND
			om.OdrCatTyp = 'NUT' AND om.OdrSubTyp <> 'DTL' AND
			pw.PwlPlyCod = p_player AND pw.PwlAppDte = p_date;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fn_getRegistrationReceiveList` */;
--
-- WARNING: old server version. The following dump may be incomplete.
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getRegistrationReceiveList`(IN `p_meal` VARCHAR(10))
BEGIN
	SELECT * FROM plyinf pi WHERE pi.PlyCod IN 
		(
			SELECT p.PwlPlyCod FROM pwlinf p, wklinf w, odrmst o WHERE 
			p.PwlSeqNum = w.WklPwlSeq AND w.WklOdrCod = o.OdrCod AND 
			o.OdrCatTyp = 'NUT' AND w.WklCurStt = 'Y' AND o.OdrSubTyp = p_meal
		);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fn_getRegistrationWaitingList` */;
--
-- WARNING: old server version. The following dump may be incomplete.
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getRegistrationWaitingList`(IN `p_meal` VARCHAR(10))
BEGIN
	SELECT * FROM plyinf pi WHERE pi.PlyCod IN 
		(
			SELECT p.PwlPlyCod FROM pwlinf p, wklinf w, odrmst o WHERE 
			p.PwlSeqNum = w.WklPwlSeq AND w.WklOdrCod = o.OdrCod AND 
			o.OdrCatTyp = 'NUT' AND w.WklCurStt = 'N' AND o.OdrSubTyp = p_meal
		);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fn_getTodayPreparation` */;
--
-- WARNING: old server version. The following dump may be incomplete.
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getTodayPreparation`(IN `p_date` VARCHAR(8), IN `p_mealType` VARCHAR(20))
BEGIN

SELECT pl.PwlSeqNum, wm.WkmMelSeq, pi.PlyFstNam, pi.PlyFamNam, od1.OdrSubTyp, od2.OdrLocNam, wm.WkmMelWeg, wm.WkmMelCal
FROM pwlinf pl, plyinf pi, wkminf wm, odrmst od1, odrmst od2
WHERE pl.PwlPlyCod = pi.PlyCod AND pl.PwlSeqNum = wm.WkmPwlSeq AND
	wm.WkmOdrCod = od1.OdrCod AND wm.WkmMelCod = od2.OdrCod AND 
	pl.PwlAppDte = p_date AND od1.OdrSubTyp = p_mealType
ORDER BY pl.PwlSeqNum, wm.WkmMelSeq;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fn_saveFoodMeal` */;
--
-- WARNING: old server version. The following dump may be incomplete.
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_saveFoodMeal`(IN `p_yearMonth` VARCHAR(6), IN `p_day` VARCHAR(2), IN `p_weekDay` SMALLINT, IN `p_type` VARCHAR(3), IN `p_code` VARCHAR(20), IN `p_weight` INT, IN `p_calorie` INT)
BEGIN
	DECLARE l_ommNum INTEGER DEFAULT -1;
	DECLARE l_omdSeq INTEGER DEFAULT 0;
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		ROLLBACK;
	END;
	
	START TRANSACTION;
	
	SELECT o.OmmNum INTO l_ommNum FROM ommmst o WHERE o.OmmYrm = p_yearMonth AND o.OmmDay = p_day AND o.OmmTyp = p_type;

	IF l_ommNum = -1 THEN
		INSERT INTO ommmst(ommYrm, OmmDay, OmmWkd, OmmTyp) VALUES (p_yearMonth, p_day, p_weekDay, p_type);
		SET l_ommNum = LAST_INSERT_ID();
	END IF;
	
	SELECT MAX(d.OmdSeq) INTO l_omdSeq FROM omdmst d WHERE d.OmdNum = l_ommNum;
	
	IF l_omdSeq IS NULL THEN
		SET l_omdSeq = 1;
	ELSE
		SET l_omdSeq = l_omdSeq + 1;
	END IF;
	
	INSERT INTO omdmst(OmdNum, OmdSeq, OmdOdrCod, OmdMelWeg, OmdMelCal) VALUES (l_ommNum, l_omdSeq, p_code, p_weight, p_calorie);
	
	COMMIT;
	
	SELECT od.OdrLocNam FROM odrmst od WHERE od.OdrCod = p_code;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GenPlayerVisitData` */;
--
-- WARNING: old server version. The following dump may be incomplete.
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GenPlayerVisitData`(in SelDate char(8))
BEGIN 
	DECLARE LstNum Int;

	INSERT INTO `chainatfc`.`pwlinf` (`PwlPlyCod`, `PwlAppDte`, `PwlAppTim`, `PwlCurStt`, `PwlVstDtm`, `PwlDocCod`, `PwlUpdUid`, `PwlUpdDts`) VALUES ('P000000001', SelDate, '0600', 'V', concat(SelDate, '0630'), 'DR001', 'admin', concat(SelDate, '0630'));
	Set LstNum = last_insert_id();

	Insert into PodInf values(LstNum, 1, 'LAB001', 'LAB', 'LAB 001', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 2, 'LAB002', 'LAB', 'LAB 001', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 3, 'MED0001', 'MED', 'Medicine 0001', 4, 'Medicine Usage 001', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 4, 'MED0002', 'MED', 'Paracetamal 500 mg', 4, 'Paracetamal Usage', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 5, 'PHY001', 'PHY', 'Physical 001', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 6, 'PHY002', 'PHY', 'Physical 002', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 7, 'PHY003', 'PHY', 'Physical 003', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 8, 'XRAY001', 'XRAY', 'Chest PA.', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 9, 'XRAY002', 'XRAY', 'X-Ray 002', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));	

	INSERT INTO `chainatfc`.`pwlinf` (`PwlPlyCod`, `PwlAppDte`, `PwlAppTim`, `PwlCurStt`, `PwlVstDtm`, `PwlDocCod`, `PwlUpdUid`, `PwlUpdDts`) VALUES ('P000000002', SelDate, '0600', 'V', concat(SelDate, '0610'), 'DR002', 'admin', concat(SelDate, '0610'));
	Set LstNum = last_insert_id();

	Insert into PodInf values(LstNum, 1, 'LAB003', 'LAB', 'LAB 003', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 2, 'LAB004', 'LAB', 'LAB 004', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 3, 'MED0003', 'MED', 'Suridine', 3, 'Suridine Usage', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 4, 'MED0004', 'MED', 'Air-X', 3, 'Air-X Usage', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 5, 'PHY003', 'PHY', 'Physical 003', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 6, 'PHY004', 'PHY', 'Physical 004', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 7, 'PHY005', 'PHY', 'Physical 005', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 8, 'XRAY003', 'XRAY', 'X-Ray 003', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 9, 'XRAY004', 'XRAY', 'X-Ray 004', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));

	INSERT INTO `chainatfc`.`pwlinf` (`PwlPlyCod`, `PwlAppDte`, `PwlAppTim`, `PwlCurStt`, `PwlVstDtm`, `PwlDocCod`, `PwlUpdUid`, `PwlUpdDts`) VALUES ('P000000003', SelDate, '', 'R', concat(SelDate, '0620'), 'DR003', 'admin', concat(SelDate,  '0620'));
	Set LstNum = last_insert_id();

	Insert into PodInf values(LstNum, 1, 'LAB005', 'LAB', 'LAB 005', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 2, 'LAB006', 'LAB', 'LAB 006', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 3, 'MED0005', 'MED', 'Norgesic', 3, 'Norgesic Usage', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 4, 'MED0006', 'MED', 'Ultracarbon', 3, 'Ultracarbon Usage', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 5, 'PHY004', 'PHY', 'Physical 004', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 6, 'PHY005', 'PHY', 'Physical 005', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 7, 'PHY006', 'PHY', 'Physical 006', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 8, 'XRAY004', 'XRAY', 'X-Ray 004', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));
	Insert into PodInf values(LstNum, 9, 'XRAY005', 'XRAY', 'X-Ray 005', 1, '', '', 'O', 'DR001', Concat(SelDate, '090000'), 'DR001', Concat(SelDate, '090000'));

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-07 22:26:21
