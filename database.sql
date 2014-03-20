-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.0.51b-community-nt-log - MySQL Community Edition (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for fcms
CREATE DATABASE IF NOT EXISTS `fcms` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `fcms`;


-- Dumping structure for table fcms.capinf
CREATE TABLE IF NOT EXISTS `capinf` (
  `CapSeqNum` bigint(20) unsigned NOT NULL auto_increment,
  `CapUsrCod` char(20) NOT NULL,
  `CapWklDte` char(8) NOT NULL,
  `CapAppDtl` text,
  `CapUpdUid` char(20) default NULL,
  `CapUpdDts` char(14) default NULL,
  PRIMARY KEY  (`CapSeqNum`),
  KEY `CapUsrCod_CapWklDte` (`CapUsrCod`,`CapWklDte`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.capinf: ~5 rows (approximately)
/*!40000 ALTER TABLE `capinf` DISABLE KEYS */;
INSERT INTO `capinf` (`CapSeqNum`, `CapUsrCod`, `CapWklDte`, `CapAppDtl`, `CapUpdUid`, `CapUpdDts`) VALUES
	(1, 'test', '20140306', '333', 'test', '2014030804909'),
	(2, 'test', '20140307', NULL, 'test', '20140307233643'),
	(3, 'test', '20140305', NULL, 'test', '20140307235905'),
	(4, 'test', '20140304', '123', 'test', '2014030804851'),
	(5, 'test1', '20140307', 'comment', 'test1', '20140319231908');
/*!40000 ALTER TABLE `capinf` ENABLE KEYS */;


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


-- Dumping structure for table fcms.cwlinf
CREATE TABLE IF NOT EXISTS `cwlinf` (
  `CwlCapSeq` bigint(20) unsigned NOT NULL,
  `CwlSeqNum` int(11) NOT NULL,
  `CwlStrDtm` char(12) NOT NULL,
  `CwlEndDtm` char(12) NOT NULL,
  `CwlSchDtl` varchar(500) NOT NULL,
  `CwlUpdUid` char(12) default NULL,
  `CwlUpdDts` char(14) default NULL,
  PRIMARY KEY  (`CwlCapSeq`,`CwlSeqNum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.cwlinf: ~2 rows (approximately)
/*!40000 ALTER TABLE `cwlinf` DISABLE KEYS */;
INSERT INTO `cwlinf` (`CwlCapSeq`, `CwlSeqNum`, `CwlStrDtm`, `CwlEndDtm`, `CwlSchDtl`, `CwlUpdUid`, `CwlUpdDts`) VALUES
	(2, 1, '0100', '0400', 'test', 'test', '2014030800101'),
	(5, 1, '0200', '0300', 'Go home', 'test1', '20140319231926');
/*!40000 ALTER TABLE `cwlinf` ENABLE KEYS */;


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


-- Dumping structure for procedure fcms.fn_addCoachWorklistItem
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_addCoachWorklistItem`(IN `p_date` VARCHAR(8), IN `p_startTime` VARCHAR(12), IN `p_endTime` VARCHAR(12), IN `p_detail` VARCHAR(500), IN `p_userCode` VARCHAR(20))
BEGIN
	DECLARE l_appSeq BIGINT;
	DECLARE l_itemSeq INT;
	DECLARE l_timestamp CHAR(14);
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		ROLLBACK;
	END;
	
	SET l_appSeq = -1;
	
	START TRANSACTION;
	
	SELECT CapSeqNum INTO l_appSeq
	FROM capinf
	WHERE CapWklDte = p_date AND CapUsrCod = p_userCode;
	
	SET l_timestamp = DATE_FORMAT(CURRENT_TIMESTAMP,'%Y%m%d%H%i%S');
	
	IF l_appSeq = -1 THEN
		INSERT INTO capinf(CapUsrCod, CapWklDte, CapUpdUid, CapUpdDts) VALUES (p_userCode, p_date, p_userCode, l_timestamp);
		
		SELECT LAST_INSERT_ID() INTO l_appSeq;
	END IF;
	
	SELECT IFNULL(MAX(ci.CwlSeqNum), 0) + 1 INTO l_itemSeq FROM cwlinf ci WHERE ci.CwlCapSeq = l_appSeq;
	
	INSERT INTO cwlinf VALUES (l_appSeq, l_itemSeq, p_startTime, p_endTime, p_detail, p_userCode, l_timestamp);
	
	COMMIT;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_addDeliverItem
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_addDeliverItem`(IN `p_deliverSeq` BIGINT, IN `p_code` VARCHAR(20), IN `p_amount` SMALLINT, IN `p_category` VARCHAR(20), IN `p_user` VARCHAR(20))
BEGIN
	DECLARE l_timestamp CHAR(14);
	
	SET l_timestamp = DATE_FORMAT(CURRENT_TIMESTAMP,'%Y%m%d%H%i%S');
	
	INSERT INTO invddt
	VALUES (p_deliverSeq, p_code, p_amount, p_category, p_user, l_timestamp);
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_addDeliverTransaction
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_addDeliverTransaction`(IN `p_deliverDate` CHAR(8), IN `p_category` CHAR(20), IN `p_deliverType` TINYINT, IN `p_deliverDepartment` CHAR(20), IN `p_remark` TEXT, IN `p_user` CHAR(20))
BEGIN
	DECLARE l_timestamp CHAR(14);
	
	SET l_timestamp = DATE_FORMAT(CURRENT_TIMESTAMP,'%Y%m%d%H%i%S');
	
	INSERT INTO invdlt(InvDltDte, InvCatTyp, InvDltTyp, InvTypDep, InvDltRmk, InvUpdUid, InvUpdDte)
	VALUES (p_deliverDate, p_category, p_deliverType, p_deliverDepartment, p_remark, p_user, l_timestamp);
	
	SELECT LAST_INSERT_ID() AS InvDltSeq;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_addPlayerComment
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_addPlayerComment`(IN `p_playerCode` VARCHAR(20), IN `p_category` VARCHAR(20), IN `p_comment` TEXT, IN `p_user` VARCHAR(12))
BEGIN
	DECLARE l_timestamp CHAR(14);
	
	SET l_timestamp = DATE_FORMAT(CURRENT_TIMESTAMP,'%Y%m%d%H%i%S');
	
	INSERT INTO plcinf(PlcCod, PlcCatTyp, PlcCmt, PlcUpdUid, PlcUpdDts)
	VALUES (p_playerCode, p_category,  p_comment, p_user, l_timestamp)
	ON DUPLICATE KEY UPDATE PlcCmt = p_comment, PlcUpdUid = p_user, PlcUpdDts = l_timestamp;
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


-- Dumping structure for procedure fcms.fn_addPlayerResult
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_addPlayerResult`(IN `p_playerCode` VARCHAR(20), IN `p_date` VARCHAR(8), IN `p_comment` TEXT, IN `p_category` VARCHAR(20), IN `p_subcategory` VARCHAR(20), IN `p_user` VARCHAR(12))
BEGIN
	DECLARE l_timestamp CHAR(14);
	
	SET l_timestamp = DATE_FORMAT(CURRENT_TIMESTAMP,'%Y%m%d%H%i%S');
	
	INSERT INTO plrinf(PlrPlyCod, PlrRstDte, PlrRstCmt, PlrCatTyp, PlrSubTyp, PlrUpdUid, PlrUpdDts)
	VALUES (p_playerCode, p_date, p_comment, p_category, p_subcategory, p_user, l_timestamp)
	ON DUPLICATE KEY UPDATE PlrRstCmt = p_comment, PlrUpdUid = p_user, PlrUpdDts = l_timestamp;

END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_addPlayerWorklist
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_addPlayerWorklist`(IN `p_worklistSeq` INT, IN `p_orderCode` VARCHAR(20), IN `p_start` VARCHAR(12), IN `p_end` VARCHAR(12), IN `p_duration` SMALLINT, IN `p_user` VARCHAR(20))
BEGIN
	DECLARE l_seq INTEGER;
	
	DECLARE l_exists INTEGER;
	SET l_exists = 0;
	
	SELECT 1 INTO l_exists FROM pwlinf pw WHERE pw.PwlSeqNum = p_worklistSeq;
	
	IF l_exists = 0 THEN
		CALL pRaiseError("this is a sample error message");
	END IF;
	
	SELECT IFNULL(MAX(wi.WklSeqNum), 0) + 1 INTO l_seq FROM wklInf wi WHERE wi.WklPwlSeq = p_worklistSeq;
	
	INSERT INTO wklinf(WklPwlSeq, WklSeqNum, WklOdrCod, WklStrDtm, WklEndDtm, WklActDur, WklCurStt, WklUpdUid, WklUpdDts)
	VALUES (p_worklistSeq, l_seq, p_orderCode, p_start, p_end, p_duration, 'N', p_user, DATE_FORMAT(CURRENT_TIMESTAMP,'%Y%m%d%H%i%S'));
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_addPlayerWorklistWithAutoAddPlayerWorklist
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_addPlayerWorklistWithAutoAddPlayerWorklist`(IN `p_playerCode` VARCHAR(20), IN `p_date` VARCHAR(8), IN `p_orderCode` VARCHAR(20), IN `p_start` VARCHAR(12), IN `p_end` VARCHAR(12), IN `p_duration` SMALLINT, IN `p_user` VARCHAR(20))
BEGIN
	DECLARE l_playerWorklist INT;
	DECLARE l_seq INTEGER;
	DECLARE l_timestamp CHAR(14);
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		ROLLBACK;
	END;
	
	START TRANSACTION;
	
	SET l_timestamp = DATE_FORMAT(CURRENT_TIMESTAMP,'%Y%m%d%H%i%S');
	
	SELECT PwlSeqNum INTO l_playerWorklist FROM pwlinf pw WHERE pw.PwlPlyCod = p_playerCode AND pw.PwlAppDte = p_date;

	IF l_playerWorklist IS NULL THEN
		INSERT INTO pwlinf(PwlPlyCod, PwlAppDte, PwlAppTim, PwlCurStt, PwlUpdUid, PwlUpdDts) 
		VALUES (p_playerCode, p_date, '0530', 'N', p_user, l_timestamp);
		
		SET l_playerWorklist = LAST_INSERT_ID();
	END IF;

	SELECT IFNULL(MAX(wi.WklSeqNum), 0) + 1 INTO l_seq FROM wklInf wi WHERE wi.WklPwlSeq = l_playerWorklist;
	
	INSERT INTO wklinf(WklPwlSeq, WklSeqNum, WklOdrCod, WklStrDtm, WklEndDtm, WklActDur, WklCurStt, WklUpdUid, WklUpdDts)
	VALUES (l_playerWorklist, l_seq, p_orderCode, p_start, p_end, p_duration, 'N', p_user, l_timestamp);
	
	COMMIT;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_addStoreInItem
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_addStoreInItem`(IN `p_storeInSeq` BIGINT, IN `p_code` VARCHAR(20), IN `p_amount` SMALLINT, IN `p_price` INT, IN `p_expire` TINYINT, IN `p_expireDate` VARCHAR(8), IN `p_category` VARCHAR(20), IN `p_user` VARCHAR(20))
BEGIN
	DECLARE l_timestamp CHAR(14);
	
	SET l_timestamp = DATE_FORMAT(CURRENT_TIMESTAMP,'%Y%m%d%H%i%S');
	
	INSERT INTO invsdt
	VALUES (p_storeInSeq, p_code, p_amount, p_amount, p_price, p_expire, p_expireDate, p_category, p_user, l_timestamp);
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_addStoreInTransaction
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_addStoreInTransaction`(IN `p_storeInDate` CHAR(8), IN `p_category` CHAR(20), IN `p_storeInType` TINYINT, IN `p_storeInDepartment` CHAR(20), IN `p_remark` TEXT, IN `p_user` CHAR(20))
BEGIN
	DECLARE l_timestamp CHAR(14);
	
	SET l_timestamp = DATE_FORMAT(CURRENT_TIMESTAMP,'%Y%m%d%H%i%S');
	
	INSERT INTO invsit(InvSitDte, InvCatTyp, InvSitTyp, InvTypDep, InvSitRmk, InvUpdUid, InvUpdDte)
	VALUES (p_storeInDate, p_category, p_storeInType, p_storeInDepartment, p_remark, p_user, l_timestamp);
	
	SELECT LAST_INSERT_ID() AS InvSitSeq;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_decrementInventoryItem
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_decrementInventoryItem`(IN `p_storeInItemSeq` BIGINT, IN `p_oldRemain` SMALLINT, IN `p_newRemain` SMALLINT)
BEGIN
	UPDATE invsdt SET InvOdrRem = p_newRemain WHERE InvSdtSeq = p_storeInItemSeq AND InvOdrRem = p_oldRemain;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_deleteCoachWorklistItem
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_deleteCoachWorklistItem`(IN `p_appointmentSeq` BIGINT, IN `p_itemSeq` INT)
BEGIN
	DELETE FROM cwlinf WHERE CwlCapSeq = p_appointmentSeq AND CwlSeqNum = p_itemSeq;
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


-- Dumping structure for procedure fcms.fn_deleteWorklistItem
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_deleteWorklistItem`(IN `p_worklistSeq` INT, IN `p_seqNum` INT, IN `p_itemCode` VARCHAR(20))
BEGIN
	DELETE FROM wklinf
	WHERE WklPwlSeq = p_worklistSeq AND WklSeqNum = p_seqNum AND WklOdrCod = p_itemCode;
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


-- Dumping structure for procedure fcms.fn_expireInventoryItem
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_expireInventoryItem`(IN `p_itemSeq` BIGINT, IN `p_amount` SMALLINT, IN `p_deliverSeq` BIGINT, IN `p_category` VARCHAR(20), IN `p_user` VARCHAR(20))
BEGIN
	DECLARE l_rowAffected INT;
	DECLARE l_orderCode CHAR(20);
	DECLARE l_timestamp CHAR(14);
	
	UPDATE invsdt SET InvOdrRem = 0 WHERE InvSdtSeq = p_itemSeq AND InvOdrRem = p_amount;
	
	SET l_rowAffected = ROW_COUNT();
	
	IF l_rowAffected = 1 THEN
		SELECT sd.InvOdrCod INTO l_orderCode
		FROM invsdt sd
		WHERE sd.InvSdtSeq = p_itemSeq;
		
		SET l_timestamp = DATE_FORMAT(CURRENT_TIMESTAMP,'%Y%m%d%H%i%S');
		
		INSERT INTO invddt VALUES (p_deliverSeq, l_orderCode, p_amount, p_category, p_user, l_timestamp);
	END IF;
	
	SELECT l_rowAffected AS result;
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


-- Dumping structure for procedure fcms.fn_findOrder
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_findOrder`(IN `p_name` VARCHAR(200), IN `p_category` VARCHAR(20))
BEGIN
	SELECT *
	FROM odrmst
	WHERE OdrCatTyp = p_category AND
		(OdrLocNam LIKE CONCAT('%', p_name, '%') OR OdrEngNam LIKE CONCAT('%', p_name, '%'));
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


-- Dumping structure for procedure fcms.fn_getAllInventoryItems
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getAllInventoryItems`()
BEGIN
	SELECT *
	FROM odrmst om
	WHERE om.OdrCatTyp = "INV"
	ORDER BY om.OdrLocNam;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getAllWorklist
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getAllWorklist`(IN `p_playerCode` VARCHAR(20), IN `p_date` VARCHAR(8))
BEGIN
	SELECT wi.*, om.*
	FROM pwlinf pw JOIN wklinf wi ON pw.PwlSeqNum=wi.WklPwlSeq LEFT JOIN odrmst om
	ON wi.WklOdrCod = om.OdrCod
	WHERE pw.PwlPlyCod = p_playerCode AND pw.PwlAppDte = p_date
	ORDER BY wi.WklStrDtm;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getCoachAppointmentDates
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getCoachAppointmentDates`(IN `p_yearMonth` VARCHAR(8))
BEGIN
	SELECT ca.CapWklDte
	FROM capinf ca
	WHERE ca.CapWklDte LIKE p_yearMonth
	ORDER BY ca.CapWklDte;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getCoachAppointmentInfo
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getCoachAppointmentInfo`(IN `p_user` CHAR(20), IN `p_date` CHAR(8))
BEGIN
	SELECT ci.CapSeqNum, ci.CapUsrCod, ci.CapWklDte, ci.CapAppDtl
	FROM capinf ci
	WHERE ci.CapUsrCod = p_user AND ci.CapWklDte = p_date;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getCoachViewSchedule
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getCoachViewSchedule`(IN `p_date` VARCHAR(8), IN `p_type` VARCHAR(20))
BEGIN
	SELECT pw.PwlSeqNum, pw.PwlPlyCod, pw.PwlAppDte, pi.PlyFstNam, pi.PlyFamNam, pi.PlyFstEng, pi.PlyFamEng,
	wi.WklOdrCod, wi.WklStrDtm, wi.WklEndDtm, om.OdrLocNam, om.OdrEngNam
	FROM pwlinf pw, plyinf pi, wklinf wi, odrmst om
	WHERE pw.PwlSeqNum = wi.WklPwlSeq AND pw.PwlPlyCod = pi.PlyCod AND wi.WklOdrCod = om.OdrCod AND
	pw.PwlAppDte = p_date AND om.OdrCatTyp = p_type
	ORDER BY wi.WklStrDtm, wi.WklEndDtm;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getCoachViewScheduleDates
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getCoachViewScheduleDates`(IN `p_yearMonth` VARCHAR(8), IN `p_category` VARCHAR(20))
BEGIN
	SELECT DISTINCT pw.PwlAppDte
	FROM pwlinf pw, wklinf wi, odrmst om
	WHERE pw.PwlSeqNum = wi.WklPwlSeq AND wi.WklOdrCod = om.OdrCod AND om.OdrCatTyp = p_category AND
		pw.PwlAppDte LIKE p_yearMonth
	ORDER BY pw.PwlAppDte;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getCoachWorklistInfo
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getCoachWorklistInfo`(IN `p_appSeq` BIGINT)
BEGIN
	SELECT cw.CwlCapSeq, cw.CwlSeqNum, cw.CwlStrDtm, cw.CwlEndDtm, cw.CwlSchDtl
	FROM cwlinf cw
	WHERE cw.CwlCapSeq = p_appSeq
	ORDER BY cw.CwlStrDtm;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getExpireInventoryItems
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getExpireInventoryItems`(IN `p_category` VARCHAR(20))
BEGIN
	DECLARE l_currentDate CHAR(8);
	
	SET l_currentDate = DATE_FORMAT(CURRENT_TIMESTAMP,'%Y%m%d');
	
	SELECT sd.InvSdtSeq, sd.InvOdrCod, om.OdrLocNam, om.OdrEngNam, om.OdrUnt, sd.InvOdrRem, sd.InvExpDte, SUBSTR(sd.InvUpdDte, 1, 8) AS InvStiDte
	FROM invsdt sd, odrmst om
	WHERE sd.InvOdrCod = om.OdrCod AND sd.InvExpTyp = 1 AND
		sd.InvExpDte <= l_currentDate AND sd.InvOdrRem > 0 AND 
		sd.InvCatTyp = p_category;
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


-- Dumping structure for procedure fcms.fn_getInvetoryStock
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getInvetoryStock`(IN `p_category` VARCHAR(20))
BEGIN
	SELECT sd.InvOdrCod, om.OdrLocNam, om.OdrEngNam, om.OdrUnt, SUM(sd.InvOdrRem) AS InvTtlRem
	FROM invsdt sd, odrmst om
	WHERE sd.InvOdrCod = om.OdrCod AND sd.InvCatTyp = p_category
	GROUP BY sd.InvOdrCod;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getPermissions
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getPermissions`(IN `p_user` VARCHAR(20))
BEGIN
	SELECT *
	FROM pmsmst pm
	WHERE pm.PmsUsrCod = p_user;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getPlayerComment
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getPlayerComment`(IN `p_playerCode` VARCHAR(20), IN `p_category` VARCHAR(20))
BEGIN
	SELECT *
	FROM plcinf
	WHERE PlcCod = p_playerCode AND PlcCatTyp = p_category;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getPlayerInfo
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getPlayerInfo`(IN `p_playerCode` VARCHAR(20))
BEGIN
	SELECT *
	FROM plyinf pi LEFT JOIN plpinf pp ON pi.PlyCod = pp.PlpPlyCod
	WHERE pi.PlyCod = p_playerCode;
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


-- Dumping structure for procedure fcms.fn_getPlayerResult
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getPlayerResult`(IN `p_playerCode` VARCHAR(20), IN `p_date` VARCHAR(8), IN `p_category` VARCHAR(20), IN `p_subcategory` VARCHAR(20))
BEGIN
	SELECT *
	FROM plrinf
	WHERE PlrPlyCod = p_playerCode AND PlrRstDte = p_date AND 
		PlrCatTyp = p_category AND PlrSubTyp = p_subcategory;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getPlayerScheduleDates
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getPlayerScheduleDates`(IN `p_playerCode` VARCHAR(20), IN `p_yearMonth` VARCHAR(8))
BEGIN
	SELECT pw.PwlAppDte
	FROM pwlinf pw
	WHERE pw.PwlPlyCod = p_playerCode AND pw.PwlAppDte LIKE p_yearMonth
	ORDER BY pw.PwlAppDte;
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


-- Dumping structure for procedure fcms.fn_getRemainInventoryItemList
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getRemainInventoryItemList`(IN `p_code` VARCHAR(20), IN `p_category` VARCHAR(20))
BEGIN
	SELECT *
	FROM invsdt sd
	WHERE sd.InvOdrCod = p_code AND sd.InvCatTyp = p_category AND sd.InvOdrRem > 0;
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


-- Dumping structure for procedure fcms.fn_getTotalInventoryItem
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getTotalInventoryItem`(IN `p_code` VARCHAR(20), IN `p_category` VARCHAR(20))
BEGIN
	SELECT InvOdrCod, SUM(InvOdrRem) AS InvTtlRem
	FROM invsdt sd
	WHERE sd.InvOdrCod = p_code AND sd.InvCatTyp = p_category
	GROUP BY InvOdrCod;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getWorklistByCategory
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getWorklistByCategory`(IN `p_playerCode` VARCHAR(20), IN `p_date` VARCHAR(8), IN `p_category` VARCHAR(20))
BEGIN
	SELECT wi.*, om.OdrLocNam, om.OdrEngNam
	FROM pwlinf pw, wklinf wi, odrmst om
	WHERE pw.PwlPlyCod = p_playerCode AND pw.PwlAppDte = p_date AND pw.PwlSeqNum = wi.WklPwlSeq AND
	wi.WklOdrCod = om.OdrCod AND om.OdrCatTyp = p_category
  ORDER BY wi.WklStrDtm;
END//
DELIMITER ;


-- Dumping structure for procedure fcms.fn_getWorklistRegistration
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_getWorklistRegistration`(IN `p_date` VARCHAR(8), IN `p_category` VARCHAR(20), IN `p_worklistState` VARCHAR(1))
BEGIN
	SELECT * FROM plyinf pi WHERE pi.PlyCod IN 
		(
			SELECT p.PwlPlyCod FROM pwlinf p, wklinf w, odrmst o WHERE 
			p.PwlSeqNum = w.WklPwlSeq AND w.WklOdrCod = o.OdrCod AND p.PwlAppDte = p_date AND
			o.OdrCatTyp = p_category AND w.WklCurStt = p_worklistState
		);
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


-- Dumping structure for procedure fcms.fn_updateCoachScheduleDetail
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `fn_updateCoachScheduleDetail`(IN `p_userCode` VARCHAR(20), IN `p_date` VARCHAR(8), IN `p_detail` VARCHAR(500))
BEGIN
	DECLARE l_appSeq BIGINT;
	DECLARE l_timestamp CHAR(14);
	
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		ROLLBACK;
	END;
	
	SET l_appSeq = -1;
	
	START TRANSACTION;
	
	SELECT CapSeqNum INTO l_appSeq
	FROM capinf
	WHERE CapWklDte = p_date AND CapUsrCod = p_userCode;
	
	SET l_timestamp = DATE_FORMAT(CURRENT_TIMESTAMP,'%Y%m%d%H%i%S');
	
	IF l_appSeq = -1 THEN
		INSERT INTO capinf(CapUsrCod, CapWklDte, CapAppDtl, CapUpdUid, CapUpdDts)
		VALUES (p_userCode, p_date, p_detail, p_userCode, l_timestamp);
	ELSE
		UPDATE capinf SET CapAppDtl = p_detail, CapUpdUid = p_userCode, CapUpdDts = l_timestamp WHERE CapSeqNum = l_appSeq;
	END IF;
	
	COMMIT;
END//
DELIMITER ;


-- Dumping structure for table fcms.invddt
CREATE TABLE IF NOT EXISTS `invddt` (
  `InvDltSeq` bigint(20) unsigned NOT NULL,
  `InvOdrCod` char(20) NOT NULL,
  `InvOdrAmt` smallint(5) unsigned NOT NULL,
  `InvCatTyp` char(20) NOT NULL,
  `InvUpdUid` char(20) default NULL,
  `InvUpdDte` char(20) default NULL,
  KEY `InvDltSeq` (`InvDltSeq`),
  KEY `InvOdrCod` (`InvOdrCod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='deliver detail';

-- Dumping data for table fcms.invddt: ~11 rows (approximately)
/*!40000 ALTER TABLE `invddt` DISABLE KEYS */;
INSERT INTO `invddt` (`InvDltSeq`, `InvOdrCod`, `InvOdrAmt`, `InvCatTyp`, `InvUpdUid`, `InvUpdDte`) VALUES
	(106, 'INV000002', 4, 'NUT', 'test', '20140315233422'),
	(107, 'INV000003', 4, 'NUT', 'test', '20140315233500'),
	(109, 'INV000001', 2, 'NUT', 'test', '20140316004801'),
	(110, 'INV000001', 2, 'NUT', 'test', '20140316004822'),
	(111, 'INV000001', 4, 'NUT', 'test', '20140316004837'),
	(114, 'INV000001', 2, 'NUT', 'test', '20140316005010'),
	(114, 'INV000003', 1, 'NUT', 'test', '20140316005010'),
	(116, 'INV000003', 3, 'NUT', 'test', '20140318000949'),
	(133, 'INV000003', 2, 'NUT', 'test', '20140319005256'),
	(135, 'INV000003', 3, 'NUT', 'test', '20140319005353'),
	(136, 'INV000003', 2, 'NUT', 'test', '20140319005614');
/*!40000 ALTER TABLE `invddt` ENABLE KEYS */;


-- Dumping structure for table fcms.invdlt
CREATE TABLE IF NOT EXISTS `invdlt` (
  `InvDltSeq` bigint(20) unsigned NOT NULL auto_increment,
  `InvDltDte` char(8) NOT NULL,
  `InvCatTyp` char(20) NOT NULL,
  `InvDltTyp` tinyint(3) unsigned NOT NULL,
  `InvTypDep` char(20) default NULL,
  `InvDltRmk` text,
  `InvUpdUid` char(20) default NULL,
  `InvUpdDte` char(14) default NULL,
  PRIMARY KEY  (`InvDltSeq`),
  KEY `InvDltDep` (`InvCatTyp`),
  KEY `InvDltDte` (`InvDltDte`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.invdlt: ~11 rows (approximately)
/*!40000 ALTER TABLE `invdlt` DISABLE KEYS */;
INSERT INTO `invdlt` (`InvDltSeq`, `InvDltDte`, `InvCatTyp`, `InvDltTyp`, `InvTypDep`, `InvDltRmk`, `InvUpdUid`, `InvUpdDte`) VALUES
	(106, '20140315', 'NUT', 0, NULL, 'test', 'test', '20140315233422'),
	(107, '20140315', 'NUT', 1, 'FIT', 'vv', 'test', '20140315233500'),
	(109, '20140316', 'NUT', 0, NULL, '', 'test', '20140316004801'),
	(110, '20140316', 'NUT', 0, NULL, '', 'test', '20140316004822'),
	(111, '20140316', 'NUT', 0, NULL, '', 'test', '20140316004837'),
	(114, '20140316', 'NUT', 0, NULL, '', 'test', '20140316005010'),
	(116, '20140318', 'NUT', 0, NULL, '', 'test', '20140318000949'),
	(130, '20140319', 'NUT', 2, NULL, '', 'test', '20140319004844'),
	(133, '20140319', 'NUT', 2, NULL, '', 'test', '20140319005256'),
	(135, '20140319', 'NUT', 2, NULL, '', 'test', '20140319005353'),
	(136, '20140319', 'NUT', 2, NULL, '', 'test', '20140319005614');
/*!40000 ALTER TABLE `invdlt` ENABLE KEYS */;


-- Dumping structure for table fcms.invsdt
CREATE TABLE IF NOT EXISTS `invsdt` (
  `InvSdtSeq` bigint(20) unsigned NOT NULL auto_increment,
  `InvSitSeq` bigint(20) unsigned NOT NULL,
  `InvOdrCod` char(20) NOT NULL,
  `InvOdrAmt` smallint(5) unsigned NOT NULL,
  `InvOdrRem` smallint(5) unsigned NOT NULL,
  `InvOdrPrc` int(10) unsigned default NULL,
  `InvExpTyp` tinyint(3) unsigned NOT NULL,
  `InvExpDte` char(8) default NULL,
  `InvCatTyp` char(20) NOT NULL,
  `InvUpdUid` char(20) default NULL,
  `InvUpdDte` char(20) default NULL,
  PRIMARY KEY  (`InvSdtSeq`),
  KEY `InvSitSeq` (`InvSitSeq`),
  KEY `InvOdrCod` (`InvOdrCod`),
  KEY `InvCatTyp` (`InvCatTyp`),
  KEY `InvOdrRem` (`InvOdrRem`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='store in detail';

-- Dumping data for table fcms.invsdt: ~4 rows (approximately)
/*!40000 ALTER TABLE `invsdt` DISABLE KEYS */;
INSERT INTO `invsdt` (`InvSdtSeq`, `InvSitSeq`, `InvOdrCod`, `InvOdrAmt`, `InvOdrRem`, `InvOdrPrc`, `InvExpTyp`, `InvExpDte`, `InvCatTyp`, `InvUpdUid`, `InvUpdDte`) VALUES
	(1, 99, 'INV000001', 1, 1, 25, 0, NULL, 'NUT', 'test', '20140315202256'),
	(2, 99, 'INV000003', 2, 2, 60, 1, '20140424', 'NUT', 'test', '20140315202256'),
	(3, 102, 'INV000003', 2, 2, 45, 1, '20140312', 'NUT', 'test', '20140315203742'),
	(4, 105, 'INV000001', 3, 3, 3, 0, NULL, 'NUT', 'test', '20140315233948');
/*!40000 ALTER TABLE `invsdt` ENABLE KEYS */;


-- Dumping structure for table fcms.invsit
CREATE TABLE IF NOT EXISTS `invsit` (
  `InvSitSeq` bigint(20) unsigned NOT NULL auto_increment,
  `InvSitDte` char(8) NOT NULL,
  `InvCatTyp` char(20) NOT NULL,
  `InvSitTyp` tinyint(3) unsigned NOT NULL,
  `InvTypDep` char(20) default NULL,
  `InvSitRmk` text,
  `InvUpdUid` char(20) default NULL,
  `InvUpdDte` char(14) default NULL,
  PRIMARY KEY  (`InvSitSeq`),
  KEY `InvSitDep` (`InvCatTyp`),
  KEY `InvSitDte` (`InvSitDte`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.invsit: ~5 rows (approximately)
/*!40000 ALTER TABLE `invsit` DISABLE KEYS */;
INSERT INTO `invsit` (`InvSitSeq`, `InvSitDte`, `InvCatTyp`, `InvSitTyp`, `InvTypDep`, `InvSitRmk`, `InvUpdUid`, `InvUpdDte`) VALUES
	(99, '20140315', 'NUT', 1, 'FIT', 'test', 'test', '20140315202256'),
	(100, '20140315', 'NUT', 1, 'FIT', 'test', 'test', '20140315202355'),
	(101, '20140315', 'NUT', 0, NULL, 'test', 'test', '20140315202407'),
	(102, '20140315', 'NUT', 0, NULL, '', 'test', '20140315203742'),
	(105, '20140324', 'NUT', 1, 'FIT', 'eeeee', 'test', '20140315233948');
/*!40000 ALTER TABLE `invsit` ENABLE KEYS */;


-- Dumping structure for table fcms.odrmst
CREATE TABLE IF NOT EXISTS `odrmst` (
  `OdrCod` char(20) NOT NULL,
  `OdrLocNam` varchar(200) default NULL,
  `OdrEngNam` varchar(200) default NULL,
  `OdrCatTyp` char(20) NOT NULL,
  `OdrSubTyp` char(20) default NULL,
  `OdrCurStt` char(1) default NULL,
  `OdrUnt` varchar(50) default NULL,
  `OdrCreDte` char(8) default NULL,
  `OdrExpDte` char(8) default NULL,
  `OdrUpdUid` char(20) default NULL,
  `OdrUpdDts` char(14) default NULL,
  PRIMARY KEY  (`OdrCod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.odrmst: ~24 rows (approximately)
/*!40000 ALTER TABLE `odrmst` DISABLE KEYS */;
INSERT INTO `odrmst` (`OdrCod`, `OdrLocNam`, `OdrEngNam`, `OdrCatTyp`, `OdrSubTyp`, `OdrCurStt`, `OdrUnt`, `OdrCreDte`, `OdrExpDte`, `OdrUpdUid`, `OdrUpdDts`) VALUES
	('FIT000001', 'วิ่งลู่', NULL, 'FIT', 'DTL', NULL, NULL, NULL, NULL, NULL, NULL),
	('FIT000002', 'ปั่นจักรยาน', NULL, 'FIT', 'DTL', NULL, NULL, NULL, NULL, NULL, NULL),
	('FIT000003', 'ยกเวท', NULL, 'FIT', 'DTL', NULL, NULL, NULL, NULL, NULL, NULL),
	('FIT000004', 'โยคะ', NULL, 'FIT', 'DTL', NULL, NULL, NULL, NULL, NULL, NULL),
	('INV000001', 'ผ้าพันแผล', NULL, 'INV', NULL, NULL, 'อัน', NULL, NULL, NULL, NULL),
	('INV000002', 'ดินสอ', NULL, 'INV', NULL, NULL, 'แท่ง', NULL, NULL, NULL, NULL),
	('INV000003', 'ยาแก้ปวด', NULL, 'INV', NULL, NULL, 'เม็ด', NULL, NULL, NULL, NULL),
	('NUT000001', 'ข้าวผัดหมู', NULL, 'NUT', 'DTL', NULL, NULL, NULL, NULL, NULL, NULL),
	('NUT000002', 'ข้าวผัดไก่', NULL, 'NUT', 'DTL', NULL, NULL, NULL, NULL, NULL, NULL),
	('NUT000003', 'ข้าวผัดปู', NULL, 'NUT', 'DTL', NULL, NULL, NULL, NULL, NULL, NULL),
	('NUT000004', 'ราดหน้าหมู', NULL, 'NUT', 'DTL', NULL, NULL, NULL, NULL, NULL, NULL),
	('NUT000005', 'ข้าวต้มหมู', NULL, 'NUT', 'DTL', NULL, NULL, NULL, NULL, NULL, NULL),
	('NUT000006', 'อาหารเสริม', NULL, 'NUT', 'DTL', NULL, NULL, NULL, NULL, NULL, NULL),
	('NUT000007', 'สลัดผัก', NULL, 'NUT', 'DTL', NULL, NULL, NULL, NULL, NULL, NULL),
	('NUT000008', 'ขนมปัง', NULL, 'NUT', 'DTL', NULL, NULL, NULL, NULL, NULL, NULL),
	('NUTBRK001', 'ชุดอาหารเช้า Set 1', NULL, 'NUT', 'BRK', NULL, NULL, NULL, NULL, NULL, NULL),
	('NUTBRK002', 'ชุดอาหารเช้า Set 2', NULL, 'NUT', 'BRK', NULL, NULL, NULL, NULL, NULL, NULL),
	('NUTDES001', 'ชุดอาหารว่าง Set 1', NULL, 'NUT', 'DES', NULL, NULL, NULL, NULL, NULL, NULL),
	('NUTDES002', 'ชุดอาหารว่าง Set 2', NULL, 'NUT', 'DES', NULL, NULL, NULL, NULL, NULL, NULL),
	('NUTDIN001', 'ชุดอาหารเย็น Set 1', NULL, 'NUT', 'DIN', NULL, NULL, NULL, NULL, NULL, NULL),
	('NUTDIN002', 'ชุดอาหารเย็น Set 2', NULL, 'NUT', 'DIN', NULL, NULL, NULL, NULL, NULL, NULL),
	('NUTLNH001', 'ชุดอาหารกลางวัน Set 1', NULL, 'NUT', 'LNH', NULL, NULL, NULL, NULL, NULL, NULL),
	('NUTLNH002', 'ชุดอาหารกลางวัน Set 2', NULL, 'NUT', 'LNH', NULL, NULL, NULL, NULL, NULL, NULL),
	('PHY000001', 'กายภาพบำบัด 1', NULL, 'PHY', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
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
	('P00001', 'D:\\AppServ\\www\\fcms\\images\\ChainatFC-logo2013.png', NULL, NULL, NULL, NULL, NULL, NULL);
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


-- Dumping structure for table fcms.plcinf
CREATE TABLE IF NOT EXISTS `plcinf` (
  `PlcCod` char(20) NOT NULL,
  `PlcCatTyp` char(20) NOT NULL,
  `PlcCmt` text NOT NULL,
  `PlcUpdUid` char(12) NOT NULL,
  `PlcUpdDts` char(14) NOT NULL,
  PRIMARY KEY  (`PlcCod`,`PlcCatTyp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Player additional comment infomation';

-- Dumping data for table fcms.plcinf: ~3 rows (approximately)
/*!40000 ALTER TABLE `plcinf` DISABLE KEYS */;
INSERT INTO `plcinf` (`PlcCod`, `PlcCatTyp`, `PlcCmt`, `PlcUpdUid`, `PlcUpdDts`) VALUES
	('P00001', 'COA', 'Hello test', 'test', '20140308175604'),
	('P00001', 'FIT', 'Normal', 'test', '20140308170515'),
	('P00001', 'PHY', 'test2', 'test1', '20140320161505');
/*!40000 ALTER TABLE `plcinf` ENABLE KEYS */;


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

-- Dumping data for table fcms.plpinf: ~1 rows (approximately)
/*!40000 ALTER TABLE `plpinf` DISABLE KEYS */;
INSERT INTO `plpinf` (`PlpPlyCod`, `PlpSeq`, `PlpStrDte`, `PlpEndDte`, `PlpAcc`, `PlpAgt`, `PlpBal`, `PlpJum`, `PlpNaf`, `PlpPac`, `PlpStm`, `PlpSta`, `PlpGkp`, `PlpUpdUid`, `PlpUpdDts`) VALUES
	('P00001', 1, NULL, NULL, 1, 2, 3, 4, 5, 6, 7, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `plpinf` ENABLE KEYS */;


-- Dumping structure for table fcms.plrinf
CREATE TABLE IF NOT EXISTS `plrinf` (
  `PlrPlyCod` char(20) NOT NULL,
  `PlrRstDte` char(8) NOT NULL,
  `PlrCatTyp` char(20) NOT NULL,
  `PlrSubTyp` char(20) NOT NULL,
  `PlrRstCmt` text,
  `PlrUpdUid` char(12) default NULL,
  `PlrUpdDts` char(14) default NULL,
  PRIMARY KEY  (`PlrPlyCod`,`PlrRstDte`,`PlrCatTyp`,`PlrSubTyp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.plrinf: ~4 rows (approximately)
/*!40000 ALTER TABLE `plrinf` DISABLE KEYS */;
INSERT INTO `plrinf` (`PlrPlyCod`, `PlrRstDte`, `PlrCatTyp`, `PlrSubTyp`, `PlrRstCmt`, `PlrUpdUid`, `PlrUpdDts`) VALUES
	('P00001', '20140302', 'FIT', 'RST', 'Normal test', 'user', '2014030205507'),
	('P00001', '20140302', 'FIT', 'SGT', 'hello', 'user', '20140302120122'),
	('P00001', '20140302', 'PHY', 'RST', 'sdvsvdtttt', 'user', '20140302120836'),
	('P00001', '20140302', 'PHY', 'SGT', 'test 2', 'user', '20140302120855');
/*!40000 ALTER TABLE `plrinf` ENABLE KEYS */;


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


-- Dumping structure for table fcms.pmsmst
CREATE TABLE IF NOT EXISTS `pmsmst` (
  `PmsUsrCod` char(20) NOT NULL,
  `PmsDepCod` char(20) NOT NULL,
  `PmsRea` tinyint(3) unsigned default '0',
  `PmsWrt` tinyint(3) unsigned default '0',
  `PmsEdt` tinyint(3) unsigned default '0',
  `PmsDel` tinyint(3) unsigned default '0',
  PRIMARY KEY  (`PmsUsrCod`,`PmsDepCod`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Permission master';

-- Dumping data for table fcms.pmsmst: 3 rows
/*!40000 ALTER TABLE `pmsmst` DISABLE KEYS */;
INSERT INTO `pmsmst` (`PmsUsrCod`, `PmsDepCod`, `PmsRea`, `PmsWrt`, `PmsEdt`, `PmsDel`) VALUES
	('test', 'COA', 1, 0, 0, 0),
	('test1', 'COA', 1, 1, 0, 0),
	('test', 'PHY', 1, 0, 0, 1),
	('test1', 'PHY', 1, 1, 0, 0);
/*!40000 ALTER TABLE `pmsmst` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table fcms.pwlinf: ~6 rows (approximately)
/*!40000 ALTER TABLE `pwlinf` DISABLE KEYS */;
INSERT INTO `pwlinf` (`PwlSeqNum`, `PwlPlyCod`, `PwlAppDte`, `PwlAppTim`, `PwlCurStt`, `PwlRegUid`, `PwlVstDtm`, `PwlUpdUid`, `PwlUpdDts`) VALUES
	(1, 'P00001', '20140308', '0530', 'A', NULL, NULL, NULL, NULL),
	(2, 'P00001', '20140302', '0530', 'A', NULL, NULL, NULL, NULL),
	(3, 'P00002', '20140308', '0530', 'A', NULL, NULL, NULL, NULL),
	(4, 'P00002', '20140125', '0530', 'A', NULL, NULL, NULL, NULL),
	(13, 'P00001', '20140316', '0530', 'N', NULL, NULL, 'test', '20140313010408'),
	(14, 'P00001', '20140317', '0530', 'N', NULL, NULL, 'test', '20140313010903');
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

-- Dumping data for table fcms.usrmst: ~2 rows (approximately)
/*!40000 ALTER TABLE `usrmst` DISABLE KEYS */;
INSERT INTO `usrmst` (`UsrCod`, `UsrFstNam`, `UsrMidNam`, `UsrFamNam`, `UsrFstEng`, `UsrMidEng`, `UsrFamEng`, `UsrLogPwd`, `UsrEmpCod`, `UsrDepCod`, `UsrCreDte`, `UsrExpDte`, `UsrUpdUid`, `UsrUpdDts`) VALUES
	('test', NULL, NULL, NULL, NULL, NULL, NULL, 'welcome', NULL, NULL, NULL, NULL, NULL, NULL),
	('test1', NULL, NULL, NULL, NULL, NULL, NULL, 'welcome', NULL, NULL, NULL, NULL, NULL, NULL);
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

-- Dumping data for table fcms.wklinf: ~21 rows (approximately)
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
	(1, 11, 'FIT000002', '0900', '0930', 30, 'N', NULL, NULL, 'test', '2014030125047'),
	(2, 1, 'FIT000001', '0530', '0600', 30, 'N', NULL, NULL, 'test', '2014030124809'),
	(2, 2, 'PHY000001', '0700', '0800', 30, 'Y', NULL, NULL, 'test', '2014030124809'),
	(2, 3, 'PHY000001', '0800', '0900', 60, 'N', NULL, NULL, 'test', '20140302113539'),
	(3, 1, 'NUTBRK001', '0700', '0800', 60, 'N', NULL, NULL, NULL, NULL),
	(3, 2, 'NUTLNH001', '1200', '1300', 60, 'Y', NULL, NULL, NULL, NULL),
	(3, 3, 'FIT000002', '0800', '1300', 60, 'Y', NULL, NULL, NULL, NULL),
	(3, 4, 'FIT000002', '0700', '0730', 30, 'N', NULL, NULL, NULL, NULL),
	(13, 1, 'FIT000001', '0500', '0600', 60, 'N', NULL, NULL, 'test', '20140313010441'),
	(13, 2, 'PHY000001', '0600', '0700', 60, 'N', NULL, NULL, 'test', '20140313010840'),
	(14, 1, 'PHY000001', '1200', '1300', 60, 'N', NULL, NULL, 'test', '20140313010903');
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
