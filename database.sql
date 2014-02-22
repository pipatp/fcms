-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.0.51b-community-nt-log - MySQL Community Edition (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.2.0.4675
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table fcms.cnfmst
CREATE TABLE IF NOT EXISTS `cnfmst` (
  `CnfGrpCod` char(20) NOT NULL,
  `CnfSubCod` char(20) NOT NULL,
  `CnfSeqNum` int(10) unsigned default NULL,
  `CnfLocNam` varchar(200) default NULL,
  `CnfEngNam` varchar(200) default NULL,
  `CnfDspVal` varchar(2000) default NULL,
  `CnfUpdUid` char(20) default NULL,
  `CnfUpdDts` char(14) default NULL,
  PRIMARY KEY  (`CnfGrpCod`,`CnfSubCod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.cnfmst: ~0 rows (approximately)
/*!40000 ALTER TABLE `cnfmst` DISABLE KEYS */;
/*!40000 ALTER TABLE `cnfmst` ENABLE KEYS */;


-- Dumping structure for table fcms.depmst
CREATE TABLE IF NOT EXISTS `depmst` (
  `DepCod` char(20) NOT NULL,
  `DepLocNam` varchar(100) default NULL,
  `DepEngNam` varchar(100) default NULL,
  `DepCreDte` char(8) default NULL,
  `DepExpDte` char(8) default NULL,
  `DepUpdUid` char(20) default NULL,
  `DepUpdDts` char(14) default NULL,
  PRIMARY KEY  (`DepCod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.depmst: ~0 rows (approximately)
/*!40000 ALTER TABLE `depmst` DISABLE KEYS */;
/*!40000 ALTER TABLE `depmst` ENABLE KEYS */;


-- Dumping structure for function fcms.fFormat
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `fFormat`(sFormat TEXT, sPar1 TEXT) RETURNS text CHARSET utf8
BEGIN
  RETURN REPLACE(sFormat, '%s', sPar1);
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_addPlayerMealItem
DELIMITER //
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
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_deleteFoodMeal
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_deleteFoodMeal`(IN `p_yearMonth` VARCHAR(6), IN `p_day` VARCHAR(2), IN `p_weekDay` SMALLINT, IN `p_type` VARCHAR(3), IN `p_code` VARCHAR(20))
BEGIN
	DECLARE l_ommNum INTEGER;
	
	SELECT o.OmmNum INTO l_ommNum FROM ommmst o WHERE o.OmmYrm = p_yearMonth AND o.OmmDay = p_day AND o.OmmTyp = p_type;

	IF l_ommNum IS NOT NULL THEN
		DELETE FROM omdmst WHERE OmdNum = l_ommNum AND OmdOdrCod = p_code;
	END IF;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_deletePlayerMealItem
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_deletePlayerMealItem`(IN `p_worklistSeq` INT, IN `p_orderCode` VARCHAR(20), IN `p_mealSeq` INT)
BEGIN
	DELETE FROM wkminf WHERE WkmPwlSeq = p_worklistSeq AND WkmOdrCod = p_orderCode AND WkmMelSeq = p_mealSeq;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_editPlayerMealItem
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_editPlayerMealItem`(IN `p_worklistSeq` INT, IN `p_orderCode` VARCHAR(20), IN `p_mealSeq` INT, IN `p_mealCode` VARCHAR(20), IN `p_mealWeight` INT, IN `p_mealCalorie` INT)
BEGIN
	UPDATE wkminf 
	SET WkmMelCod = p_mealCode, WkmMelWeg = p_mealWeight, WkmMelCal = p_mealCalorie
	WHERE WkmPwlSeq = p_worklistSeq AND WkmOdrCod = p_orderCode AND WkmMelSeq = p_mealSeq;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_findFoodMeal
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_findFoodMeal`(IN `p_name` VARCHAR(50))
BEGIN
	SELECT * FROM odrmst om WHERE om.OdrCatTyp = 'NUT' AND om.OdrSubTyp = 'DTL' AND 
		(om.OdrLocNam LIKE CONCAT('%', p_name, '%') OR om.OdrEngNam LIKE CONCAT('%', p_name, '%'));
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_findPlayer
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_findPlayer`(IN `p_term` VARCHAR(100))
BEGIN
	SELECT *
	FROM plyinf p
	WHERE p.PlyFstNam LIKE CONCAT('%', p_term, '%') OR p.PlyFamNam LIKE CONCAT('%', p_term, '%') OR
		p.PlyFstEng LIKE CONCAT('%', p_term, '%') OR p.PlyFamEng LIKE CONCAT('%', p_term, '%');
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getFitnessRegistrationList
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getFitnessRegistrationList`(IN `p_date` VARCHAR(8), IN `p_worklistState` VARCHAR(1))
BEGIN
	SELECT * FROM plyinf pi WHERE pi.PlyCod IN 
		(
			SELECT p.PwlPlyCod FROM pwlinf p, wklinf w, odrmst o WHERE 
			p.PwlSeqNum = w.WklPwlSeq AND w.WklOdrCod = o.OdrCod AND p.PwlAppDte = p_date AND
			o.OdrCatTyp = 'FIT' AND w.WklCurStt = p_worklistState
		);
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getFoodMealSet
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getFoodMealSet`(IN `p_yearMonth` VARCHAR(6), IN `p_day` VARCHAR(2))
BEGIN
	SELECT od.OmdMelWeg, od.OmdMelCal, mm.OdrCod, mm.OdrLocNam, om.OmmTyp 
	FROM ommmst om, omdmst od, odrmst mm 
	WHERE om.OmmNum = od.OmdNum AND od.OmdOdrCod = mm.OdrCod AND om.OmmYrm = p_yearMonth AND
		om.OmmDay = p_day
	ORDER BY od.OmdNum, od.OmdSeq;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getPlayerMealSet
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getPlayerMealSet`(IN `p_player` VARCHAR(20), IN `p_date` VARCHAR(8))
BEGIN
	SELECT wm.WkmPwlSeq, wm.WkmMelSeq, wm.WkmOdrCod, wm.WkmMelCod, wm.WkmMelWeg, wm.WkmMelCal, om.OdrLocNam, om2.OdrSubTyp
	FROM pwlinf pw, wkminf wm, odrmst om, odrmst om2
	WHERE pw.PwlSeqNum = wm.WkmPwlSeq AND wm.WkmMelCod = om.OdrCod AND
		wm.WkmOdrCod = om2.OdrCod AND
		pw.PwlPlyCod = p_player AND pw.PwlAppDte = p_date;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getPlayerWorklistMeal
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getPlayerWorklistMeal`(IN `p_player` VARCHAR(20), IN `p_date` VARCHAR(8))
BEGIN
	SELECT om.OdrSubTyp, wl.WklOdrCod
	FROM pwlinf pw, wklinf wl, odrmst om
	WHERE pw.PwlSeqNum = wl.WklPwlSeq AND wl.WklOdrCod = om.OdrCod AND
			om.OdrCatTyp = 'NUT' AND om.OdrSubTyp <> 'DTL' AND
			pw.PwlPlyCod = p_player AND pw.PwlAppDte = p_date;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getRegistrationReceiveList
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getRegistrationReceiveList`(IN `p_meal` VARCHAR(10), IN `p_date` VARCHAR(8))
BEGIN
	SELECT * FROM plyinf pi WHERE pi.PlyCod IN 
		(
			SELECT p.PwlPlyCod FROM pwlinf p, wklinf w, odrmst o WHERE 
			p.PwlSeqNum = w.WklPwlSeq AND w.WklOdrCod = o.OdrCod AND p.PwlAppDte = p_date AND
			o.OdrCatTyp = 'NUT' AND w.WklCurStt = 'Y' AND o.OdrSubTyp = p_meal
		);
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getRegistrationWaitingList
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getRegistrationWaitingList`(IN `p_meal` VARCHAR(10), IN `p_date` VARCHAR(8))
BEGIN
	SELECT * FROM plyinf pi WHERE pi.PlyCod IN 
		(
			SELECT p.PwlPlyCod FROM pwlinf p, wklinf w, odrmst o WHERE 
			p.PwlSeqNum = w.WklPwlSeq AND w.WklOdrCod = o.OdrCod AND p.PwlAppDte = p_date AND
			o.OdrCatTyp = 'NUT' AND w.WklCurStt = 'N' AND o.OdrSubTyp = p_meal
		);
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getTodayPreparation
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getTodayPreparation`(IN `p_date` VARCHAR(8), IN `p_mealType` VARCHAR(20))
BEGIN

SELECT pl.PwlSeqNum, wm.WkmMelSeq, pl.PwlPlyCod, pi.PlyFstNam, pi.PlyFamNam, od1.OdrSubTyp, od2.OdrLocNam, wm.WkmMelWeg, wm.WkmMelCal
FROM pwlinf pl, plyinf pi, wkminf wm, odrmst od1, odrmst od2, piminf im
WHERE pl.PwlPlyCod = pi.PlyCod AND pl.PwlSeqNum = wm.WkmPwlSeq AND
	wm.WkmOdrCod = od1.OdrCod AND wm.WkmMelCod = od2.OdrCod AND
	pl.PwlAppDte = p_date AND od1.OdrSubTyp = p_mealType
ORDER BY pl.PwlSeqNum, wm.WkmMelSeq;

END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_saveFoodMeal
DELIMITER //
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
END//
DELIMITER ;


-- Dumping structure for table fcms.odrmst
CREATE TABLE IF NOT EXISTS `odrmst` (
  `OdrCod` char(20) NOT NULL,
  `OdrLocNam` varchar(200) default NULL,
  `OdrEngNam` varchar(200) default NULL,
  `OdrCatTyp` char(20) NOT NULL,
  `OdrSubTyp` char(20) default NULL,
  `OdrCurStt` char(1) default NULL,
  `OdrCreDte` char(8) default NULL,
  `OdrExpDte` char(8) default NULL,
  `OdrUpdUid` char(20) default NULL,
  `OdrUpdDts` char(14) default NULL,
  PRIMARY KEY  (`OdrCod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.odrmst: ~18 rows (approximately)
/*!40000 ALTER TABLE `odrmst` DISABLE KEYS */;
INSERT INTO `odrmst` (`OdrCod`, `OdrLocNam`, `OdrEngNam`, `OdrCatTyp`, `OdrSubTyp`, `OdrCurStt`, `OdrCreDte`, `OdrExpDte`, `OdrUpdUid`, `OdrUpdDts`) VALUES
	('FIT000001', 'วิ่งลู่', NULL, 'FIT', 'DTL', NULL, NULL, NULL, NULL, NULL),
	('FIT000002', 'ปั่นจักรยาน', NULL, 'FIT', 'DTL', NULL, NULL, NULL, NULL, NULL),
	('NUT000001', 'ข้าวผัดหมู', NULL, 'NUT', 'DTL', NULL, NULL, NULL, NULL, NULL),
	('NUT000002', 'ข้าวผัดไก่', NULL, 'NUT', 'DTL', NULL, NULL, NULL, NULL, NULL),
	('NUT000003', 'ข้าวผัดปู', NULL, 'NUT', 'DTL', NULL, NULL, NULL, NULL, NULL),
	('NUT000004', 'ราดหน้าหมู', NULL, 'NUT', 'DTL', NULL, NULL, NULL, NULL, NULL),
	('NUT000005', 'ข้าวต้มหมู', NULL, 'NUT', 'DTL', NULL, NULL, NULL, NULL, NULL),
	('NUT000006', 'อาหารเสริม', NULL, 'NUT', 'DTL', NULL, NULL, NULL, NULL, NULL),
	('NUT000007', 'สลัดผัก', NULL, 'NUT', 'DTL', NULL, NULL, NULL, NULL, NULL),
	('NUT000008', 'ขนมปัง', NULL, 'NUT', 'DTL', NULL, NULL, NULL, NULL, NULL),
	('NUTBRK001', 'ชุดอาหารเช้า Set 1', NULL, 'NUT', 'BRK', NULL, NULL, NULL, NULL, NULL),
	('NUTBRK002', 'ชุดอาหารเช้า Set 2', NULL, 'NUT', 'BRK', NULL, NULL, NULL, NULL, NULL),
	('NUTDES001', 'ชุดอาหารว่าง Set 1', NULL, 'NUT', 'DES', NULL, NULL, NULL, NULL, NULL),
	('NUTDES002', 'ชุดอาหารว่าง Set 2', NULL, 'NUT', 'DES', NULL, NULL, NULL, NULL, NULL),
	('NUTDIN001', 'ชุดอาหารเย็น Set 1', NULL, 'NUT', 'DIN', NULL, NULL, NULL, NULL, NULL),
	('NUTDIN002', 'ชุดอาหารเย็น Set 2', NULL, 'NUT', 'DIN', NULL, NULL, NULL, NULL, NULL),
	('NUTLNH001', 'ชุดอาหารกลางวัน Set 1', NULL, 'NUT', 'LNH', NULL, NULL, NULL, NULL, NULL),
	('NUTLNH002', 'ชุดอาหารกลางวัน Set 2', NULL, 'NUT', 'LNH', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `odrmst` ENABLE KEYS */;


-- Dumping structure for table fcms.omdmst
CREATE TABLE IF NOT EXISTS `omdmst` (
  `OmdNum` int(10) unsigned NOT NULL,
  `OmdSeq` smallint(5) unsigned NOT NULL,
  `OmdOdrCod` char(20) default NULL,
  `OmdMelWeg` int(10) unsigned default NULL,
  `OmdMelCal` int(10) unsigned default NULL,
  `OmdUpdUid` char(20) default NULL,
  `OmdUpdDts` char(14) default NULL,
  PRIMARY KEY  (`OmdNum`,`OmdSeq`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.omdmst: ~21 rows (approximately)
/*!40000 ALTER TABLE `omdmst` DISABLE KEYS */;
INSERT INTO `omdmst` (`OmdNum`, `OmdSeq`, `OmdOdrCod`, `OmdMelWeg`, `OmdMelCal`, `OmdUpdUid`, `OmdUpdDts`) VALUES
	(1, 1, 'NUT000001', 300, 350, NULL, NULL),
	(1, 2, 'NUT000006', 100, 200, NULL, NULL),
	(1, 3, 'NUT000007', 150, 100, NULL, NULL),
	(1, 4, 'NUT000008', 50, 100, NULL, NULL),
	(2, 1, 'NUT000005', 300, 350, NULL, NULL),
	(2, 2, 'NUT000006', 100, 200, NULL, NULL),
	(2, 3, 'NUT000007', 150, 100, NULL, NULL),
	(2, 4, 'NUT000008', 150, 100, NULL, NULL),
	(11, 1, 'NUT000002', 150, 300, NULL, NULL),
	(11, 2, 'NUT000003', 80, 250, NULL, NULL),
	(11, 3, 'NUT000007', 100, 20, NULL, NULL),
	(12, 1, 'NUT000007', 10, 10, NULL, NULL),
	(12, 2, 'NUT000006', 10, 10, NULL, NULL),
	(14, 1, 'NUT000001', 100, 100, NULL, NULL),
	(15, 5, 'NUT000001', 10, 10, NULL, NULL),
	(15, 6, 'NUT000002', 10, 10, NULL, NULL),
	(16, 1, 'NUT000001', 10, 10, NULL, NULL),
	(16, 3, 'NUT000007', 10, 10, NULL, NULL),
	(17, 1, 'NUT000007', 100, 100, NULL, NULL),
	(18, 1, 'NUT000006', 10, 10, NULL, NULL),
	(20, 1, 'NUT000001', 100, 250, NULL, NULL);
/*!40000 ALTER TABLE `omdmst` ENABLE KEYS */;


-- Dumping structure for table fcms.ommmst
CREATE TABLE IF NOT EXISTS `ommmst` (
  `OmmNum` int(10) unsigned NOT NULL auto_increment,
  `OmmYrm` char(6) NOT NULL,
  `OmmDay` char(2) NOT NULL,
  `OmmWkd` smallint(5) unsigned default NULL,
  `OmmTyp` char(3) default NULL,
  `OmmUpdUid` char(20) default NULL,
  `OmmUpdDts` char(14) default NULL,
  PRIMARY KEY  (`OmmNum`,`OmmYrm`,`OmmDay`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.ommmst: ~18 rows (approximately)
/*!40000 ALTER TABLE `ommmst` DISABLE KEYS */;
INSERT INTO `ommmst` (`OmmNum`, `OmmYrm`, `OmmDay`, `OmmWkd`, `OmmTyp`, `OmmUpdUid`, `OmmUpdDts`) VALUES
	(1, '201401', '24', 5, 'BRK', NULL, NULL),
	(2, '201401', '24', 5, 'LNH', NULL, NULL),
	(3, '201401', '24', 5, 'DES', NULL, NULL),
	(4, '201401', '24', 5, 'DIN', NULL, NULL),
	(5, '201401', '25', 6, 'BRK', NULL, NULL),
	(6, '201401', '25', 6, 'LNH', NULL, NULL),
	(7, '201401', '25', 6, 'DES', NULL, NULL),
	(8, '201401', '25', 6, 'DIN', NULL, NULL),
	(11, '201401', '28', 2, 'BRK', NULL, NULL),
	(12, '201401', '26', 7, 'LNH', NULL, NULL),
	(13, '201401', '28', 2, 'LNH', NULL, NULL),
	(14, '201401', '26', 7, 'BRK', NULL, NULL),
	(15, '201401', '27', 1, 'BRK', NULL, NULL),
	(16, '201401', '27', 1, 'LNH', NULL, NULL),
	(17, '201401', '26', 7, 'DES', NULL, NULL),
	(18, '201401', '26', 7, 'DIN', NULL, NULL),
	(19, '201401', '27', 1, 'DES', NULL, NULL),
	(20, '201402', '19', 3, 'BRK', NULL, NULL);
/*!40000 ALTER TABLE `ommmst` ENABLE KEYS */;


-- Dumping structure for procedure fcms.pExecuteImmediate
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `pExecuteImmediate`(IN tSQLStmt TEXT)
BEGIN
  SET @executeImmediateSQL = tSQLStmt;
  PREPARE executeImmediateSTML FROM @executeImmediateSQL;
  EXECUTE executeImmediateSTML;
  DEALLOCATE PREPARE executeImmediateSTML;
END//
DELIMITER ;


-- Dumping structure for table fcms.piminf
CREATE TABLE IF NOT EXISTS `piminf` (
  `PimPlyCod` char(20) NOT NULL,
  `PimFac` varchar(200) default NULL,
  `PimFnt` varchar(200) default NULL,
  `PimBak` varchar(200) default NULL,
  `PimRit` varchar(200) default NULL,
  `PimLef` varchar(200) default NULL,
  `PimUpdUid` char(20) default NULL,
  `PimUpdDts` char(14) default NULL,
  PRIMARY KEY  (`PimPlyCod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.piminf: ~1 rows (approximately)
/*!40000 ALTER TABLE `piminf` DISABLE KEYS */;
INSERT INTO `piminf` (`PimPlyCod`, `PimFac`, `PimFnt`, `PimBak`, `PimRit`, `PimLef`, `PimUpdUid`, `PimUpdDts`) VALUES
	('P00001', 'L:\\AppServ\\www\\fcms\\images\\ChainatFC-logo2013.png', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `piminf` ENABLE KEYS */;


-- Dumping structure for table fcms.plainf
CREATE TABLE IF NOT EXISTS `plainf` (
  `PlaPlyCod` char(20) NOT NULL,
  `PlaPosCod` char(20) default NULL,
  `PlaStrDte` char(8) default NULL,
  `PlaEndDte` char(8) default NULL,
  `PlaUpdUid` char(20) default NULL,
  `PlaUpdDts` char(14) default NULL,
  PRIMARY KEY  (`PlaPlyCod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.plainf: ~0 rows (approximately)
/*!40000 ALTER TABLE `plainf` DISABLE KEYS */;
/*!40000 ALTER TABLE `plainf` ENABLE KEYS */;


-- Dumping structure for table fcms.plpinf
CREATE TABLE IF NOT EXISTS `plpinf` (
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
  `PlpUpdUid` char(20) default NULL,
  `PlpUpdDts` char(14) default NULL,
  PRIMARY KEY  (`PlpPlyCod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.plpinf: ~0 rows (approximately)
/*!40000 ALTER TABLE `plpinf` DISABLE KEYS */;
/*!40000 ALTER TABLE `plpinf` ENABLE KEYS */;


-- Dumping structure for table fcms.plvinf
CREATE TABLE IF NOT EXISTS `plvinf` (
  `PlvPwlNum` int(10) unsigned NOT NULL,
  `PlvSeqNum` int(10) unsigned NOT NULL,
  `PlvInpDts` char(14) default NULL,
  `PlvWeg` decimal(3,2) default NULL,
  `PlvHeg` decimal(3,2) default NULL,
  `PlvLowPrs` int(10) unsigned default NULL,
  `PlvHigPrs` int(10) unsigned default NULL,
  `PlvTem` decimal(3,2) default NULL,
  `PlvPul` int(10) unsigned default NULL,
  `PlvUpdUid` char(12) default NULL,
  `PlvUpdDts` char(14) default NULL,
  PRIMARY KEY  (`PlvPwlNum`,`PlvSeqNum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.plvinf: ~0 rows (approximately)
/*!40000 ALTER TABLE `plvinf` DISABLE KEYS */;
/*!40000 ALTER TABLE `plvinf` ENABLE KEYS */;


-- Dumping structure for table fcms.plyinf
CREATE TABLE IF NOT EXISTS `plyinf` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.plyinf: ~2 rows (approximately)
/*!40000 ALTER TABLE `plyinf` DISABLE KEYS */;
INSERT INTO `plyinf` (`PlyCod`, `PlyTitCod`, `PlyFstNam`, `PlyMidNam`, `PlyFamNam`, `PlyFstEng`, `PlyMidEng`, `PlyFamEng`, `PlyNatCod`, `PlyPerNum`, `PlyPasNum`, `PlyBirDte`, `PlyAddNum`, `PlyAddDtl`, `PlyAddCty`, `PlyAddPrv`, `PlyAddZip`, `PlyAddCot`, `PlyNumEng`, `PlyDtlEng`, `PlyRegCod`, `PlySexTyp`, `PlyPhnNum`, `PlyMblNum`, `PlyConPer`, `PlyConPhn`, `PlyEmlAdd`, `PlyCurStt`, `PlyCreDte`, `PlyExpDte`, `PlyUpdUid`, `PlyUpdDts`) VALUES
	('P00001', NULL, 'สมชาย', NULL, 'เข็มกลัด', 'Somchai', NULL, 'Khemglad', 'ไทย', NULL, NULL, '19800401', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	('P00002', NULL, 'จิรายุ', NULL, 'ไม่รู้', 'Jirayu', NULL, 'Mairu', 'ไทย', NULL, NULL, '19850125', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `plyinf` ENABLE KEYS */;


-- Dumping structure for table fcms.podinf
CREATE TABLE IF NOT EXISTS `podinf` (
  `PodPwlNum` int(10) unsigned NOT NULL,
  `PodSeq` int(10) unsigned NOT NULL,
  `PodCod` char(20) default NULL,
  `PodCat` char(20) default NULL,
  `PodNam` varchar(200) default NULL,
  `PodQty` smallint(5) unsigned default NULL,
  `PodStt` char(1) default NULL,
  `PodOdrUid` char(20) default NULL,
  `PodOdrDts` char(14) default NULL,
  `PodUpdUid` char(20) default NULL,
  `PodUpdDts` char(14) default NULL,
  PRIMARY KEY  (`PodPwlNum`,`PodSeq`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.podinf: ~0 rows (approximately)
/*!40000 ALTER TABLE `podinf` DISABLE KEYS */;
/*!40000 ALTER TABLE `podinf` ENABLE KEYS */;


-- Dumping structure for table fcms.posmst
CREATE TABLE IF NOT EXISTS `posmst` (
  `PosCod` char(10) NOT NULL,
  `PosLocPvc` varchar(200) default NULL,
  `PosLocAmp` varchar(200) default NULL,
  `PosLocNam` varchar(200) default NULL,
  `PosEngPvc` varchar(200) default NULL,
  `PosEngAmp` varchar(200) default NULL,
  `PosEngNam` varchar(200) default NULL,
  `PosCreDte` char(8) default NULL,
  `PosExpDte` char(8) default NULL,
  `PosUpdUid` char(20) default NULL,
  `PosUpdDts` char(14) default NULL,
  PRIMARY KEY  (`PosCod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.posmst: ~0 rows (approximately)
/*!40000 ALTER TABLE `posmst` DISABLE KEYS */;
/*!40000 ALTER TABLE `posmst` ENABLE KEYS */;


-- Dumping structure for procedure fcms.pRaiseError
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `pRaiseError`(sError VARCHAR(255))
BEGIN
  -- trick
  --   calling of not existing procedure with name that equals error message
  --   will force MySQL exception that looks like error message
  CALL pExecuteImmediate(fFormat('CALL `error: %s, solution`', sError));
END//
DELIMITER ;


-- Dumping structure for table fcms.pwlinf
CREATE TABLE IF NOT EXISTS `pwlinf` (
  `PwlSeqNum` int(10) unsigned NOT NULL auto_increment,
  `PwlPlyCod` char(20) NOT NULL,
  `PwlAppDte` char(8) NOT NULL,
  `PwlAppTim` char(4) NOT NULL,
  `PwlCurStt` char(1) default NULL,
  `PwlRegUid` char(20) default NULL,
  `PwlVstDtm` char(12) default NULL,
  `PwlUpdUid` char(20) default NULL,
  `PwlUpdDts` char(14) default NULL,
  PRIMARY KEY  (`PwlSeqNum`,`PwlPlyCod`,`PwlAppDte`,`PwlAppTim`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.pwlinf: ~4 rows (approximately)
/*!40000 ALTER TABLE `pwlinf` DISABLE KEYS */;
INSERT INTO `pwlinf` (`PwlSeqNum`, `PwlPlyCod`, `PwlAppDte`, `PwlAppTim`, `PwlCurStt`, `PwlRegUid`, `PwlVstDtm`, `PwlUpdUid`, `PwlUpdDts`) VALUES
	(1, 'P00001', '20140221', '0530', 'A', NULL, NULL, NULL, NULL),
	(2, 'P00001', '20140119', '0530', 'A', NULL, NULL, NULL, NULL),
	(3, 'P00002', '20140216', '0530', 'A', NULL, NULL, NULL, NULL),
	(4, 'P00002', '20140125', '0530', 'A', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `pwlinf` ENABLE KEYS */;


-- Dumping structure for table fcms.usrmst
CREATE TABLE IF NOT EXISTS `usrmst` (
  `UsrCod` char(20) NOT NULL,
  `UsrFstNam` varchar(20) default NULL,
  `UsrMidNam` varchar(20) default NULL,
  `UsrFamNam` varchar(20) default NULL,
  `UsrFstEng` varchar(20) default NULL,
  `UsrMidEng` varchar(20) default NULL,
  `UsrFamEng` varchar(20) default NULL,
  `UsrLogPwd` varchar(20) default NULL,
  `UsrEmpCod` varchar(20) default NULL,
  `UsrDepCod` varchar(20) default NULL,
  `UsrCreDte` char(8) default NULL,
  `UsrExpDte` char(8) default NULL,
  `UsrUpdUid` char(20) default NULL,
  `UsrUpdDts` char(14) default NULL,
  PRIMARY KEY  (`UsrCod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.usrmst: ~1 rows (approximately)
/*!40000 ALTER TABLE `usrmst` DISABLE KEYS */;
INSERT INTO `usrmst` (`UsrCod`, `UsrFstNam`, `UsrMidNam`, `UsrFamNam`, `UsrFstEng`, `UsrMidEng`, `UsrFamEng`, `UsrLogPwd`, `UsrEmpCod`, `UsrDepCod`, `UsrCreDte`, `UsrExpDte`, `UsrUpdUid`, `UsrUpdDts`) VALUES
	('test', NULL, NULL, NULL, NULL, NULL, NULL, 'welcome', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `usrmst` ENABLE KEYS */;


-- Dumping structure for table fcms.wklinf
CREATE TABLE IF NOT EXISTS `wklinf` (
  `WklPwlSeq` int(10) unsigned NOT NULL,
  `WklSeqNum` int(10) unsigned NOT NULL,
  `WklOdrCod` char(20) NOT NULL,
  `WklStrDtm` char(12) default NULL,
  `WklEndDtm` char(12) default NULL,
  `WklActDur` smallint(5) unsigned default NULL,
  `WklCurStt` char(1) default NULL,
  `WklRelStr` char(12) default NULL,
  `WklRelEnd` char(12) default NULL,
  `WklUpdUid` char(12) default NULL,
  `WklUpdDts` char(14) default NULL,
  PRIMARY KEY  (`WklPwlSeq`,`WklSeqNum`,`WklOdrCod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.wklinf: ~12 rows (approximately)
/*!40000 ALTER TABLE `wklinf` DISABLE KEYS */;
INSERT INTO `wklinf` (`WklPwlSeq`, `WklSeqNum`, `WklOdrCod`, `WklStrDtm`, `WklEndDtm`, `WklActDur`, `WklCurStt`, `WklRelStr`, `WklRelEnd`, `WklUpdUid`, `WklUpdDts`) VALUES
	(1, 1, 'FIT000001', '0600', '0700', 60, 'Y', NULL, NULL, NULL, NULL),
	(1, 2, 'FIT000002', '0700', '0730', 30, 'N', NULL, NULL, NULL, NULL),
	(1, 3, 'NUTBRK001', '0800', '0900', 60, 'Y', NULL, NULL, NULL, NULL),
	(1, 4, 'PHY000001', '0930', '1030', 60, 'N', NULL, NULL, NULL, NULL),
	(1, 5, 'FIT000003', '1030', '1130', 60, 'N', NULL, NULL, NULL, NULL),
	(1, 6, 'NUTLNH001', '1200', '1300', 60, 'N', NULL, NULL, NULL, NULL),
	(1, 7, 'PHY000001', '1330', '1500', 90, 'N', NULL, NULL, NULL, NULL),
	(1, 8, 'FIT000003', '1500', '1600', 60, 'N', NULL, NULL, NULL, NULL),
	(1, 9, 'FIT000004', '1600', '1700', 60, 'N', NULL, NULL, NULL, NULL),
	(1, 10, 'NUTDIN001', '1800', '1900', 60, 'N', NULL, NULL, NULL, NULL),
	(3, 1, 'NUTBRK001', '0700', '0800', 60, 'N', NULL, NULL, NULL, NULL),
	(3, 2, 'NUTLNH001', '1200', '1300', 60, 'Y', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `wklinf` ENABLE KEYS */;


-- Dumping structure for table fcms.wklmst
CREATE TABLE IF NOT EXISTS `wklmst` (
  `WklPlyCod` char(20) NOT NULL,
  `WklSeqNum` int(10) unsigned NOT NULL,
  `WklOdrCod` char(20) NOT NULL,
  `WklStrDtm` char(12) default NULL,
  `WklEndDtm` char(12) default NULL,
  `WklActDur` smallint(5) unsigned default NULL,
  `WklUpdUid` char(20) default NULL,
  `WklUpdDts` char(14) default NULL,
  PRIMARY KEY  (`WklPlyCod`,`WklSeqNum`,`WklOdrCod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.wklmst: ~10 rows (approximately)
/*!40000 ALTER TABLE `wklmst` DISABLE KEYS */;
INSERT INTO `wklmst` (`WklPlyCod`, `WklSeqNum`, `WklOdrCod`, `WklStrDtm`, `WklEndDtm`, `WklActDur`, `WklUpdUid`, `WklUpdDts`) VALUES
	('P00001', 1, 'FIT000001', '0600', '0700', 60, NULL, NULL),
	('P00001', 2, 'FIT000002', '0700', '0730', 30, NULL, NULL),
	('P00001', 3, 'NUTBRK001', '0800', '0900', 60, NULL, NULL),
	('P00001', 4, 'PHY000001', '0930', '1030', 60, NULL, NULL),
	('P00001', 5, 'FIT000003', '1030', '1130', 60, NULL, NULL),
	('P00001', 6, 'NUTLNH001', '1200', '1300', 60, NULL, NULL),
	('P00001', 7, 'PHY000001', '1330', '1500', 90, NULL, NULL),
	('P00001', 8, 'FIT000003', '1500', '1600', 60, NULL, NULL),
	('P00001', 9, 'FIT000004', '1600', '1700', 60, NULL, NULL),
	('P00001', 10, 'NUTDIN001', '1800', '1900', 60, NULL, NULL);
/*!40000 ALTER TABLE `wklmst` ENABLE KEYS */;


-- Dumping structure for table fcms.wkminf
CREATE TABLE IF NOT EXISTS `wkminf` (
  `WkmPwlSeq` int(10) unsigned NOT NULL,
  `WkmOdrCod` char(20) NOT NULL,
  `WkmMelSeq` smallint(5) unsigned NOT NULL,
  `WkmMelCod` char(20) default NULL,
  `WkmMelWeg` int(10) unsigned default NULL,
  `WkmMelCal` int(10) unsigned default NULL,
  `WkmEdtYon` char(1) default NULL,
  `WkmMelYrm` char(6) default NULL,
  `WkmMelDay` char(2) default NULL,
  `WkmOdrStt` char(1) default NULL,
  `WkmUpdUid` char(20) default NULL,
  `WkmUpdDts` char(14) default NULL,
  PRIMARY KEY  (`WkmPwlSeq`,`WkmOdrCod`,`WkmMelSeq`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.wkminf: ~9 rows (approximately)
/*!40000 ALTER TABLE `wkminf` DISABLE KEYS */;
INSERT INTO `wkminf` (`WkmPwlSeq`, `WkmOdrCod`, `WkmMelSeq`, `WkmMelCod`, `WkmMelWeg`, `WkmMelCal`, `WkmEdtYon`, `WkmMelYrm`, `WkmMelDay`, `WkmOdrStt`, `WkmUpdUid`, `WkmUpdDts`) VALUES
	(1, 'NUTBRK001', 2, 'NUT000006', 100, 250, 'N', '201401', '24', 'N', NULL, NULL),
	(1, 'NUTBRK001', 3, 'NUT000007', 150, 100, 'N', '201401', '24', 'N', NULL, NULL),
	(1, 'NUTBRK001', 4, 'NUT000008', 50, 100, 'N', '201401', '24', 'N', NULL, NULL),
	(1, 'NUTBRK001', 5, 'NUT000001', 100, 100, 'N', '201401', '24', 'N', NULL, NULL),
	(1, 'NUTDIN001', 2, 'NUT000003', 1, 2, 'N', '201401', '24', 'N', NULL, NULL),
	(1, 'NUTLNH001', 1, 'NUT000005', 300, 350, 'N', '201401', '24', 'N', NULL, NULL),
	(1, 'NUTLNH001', 2, 'NUT000006', 100, 200, 'N', '201401', '24', 'N', NULL, NULL),
	(1, 'NUTLNH001', 3, 'NUT000007', 150, 100, 'N', '201401', '24', 'N', NULL, NULL),
	(1, 'NUTLNH001', 4, 'NUT000008', 50, 100, 'N', '201401', '24', 'N', NULL, NULL);
/*!40000 ALTER TABLE `wkminf` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
