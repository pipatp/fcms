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
-- Dumping data for table fcms.cnfmst: ~0 rows (approximately)
/*!40000 ALTER TABLE `cnfmst` DISABLE KEYS */;
/*!40000 ALTER TABLE `cnfmst` ENABLE KEYS */;

-- Dumping data for table fcms.depmst: ~0 rows (approximately)
/*!40000 ALTER TABLE `depmst` DISABLE KEYS */;
/*!40000 ALTER TABLE `depmst` ENABLE KEYS */;

-- Dumping data for table fcms.odrmst: ~19 rows (approximately)
/*!40000 ALTER TABLE `odrmst` DISABLE KEYS */;
INSERT IGNORE INTO `odrmst` (`OdrCod`, `OdrLocNam`, `OdrEngNam`, `OdrCatTyp`, `OdrSubTyp`, `OdrCurStt`, `OdrCreDte`, `OdrExpDte`, `OdrUpdUid`, `OdrUpdDts`) VALUES
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
	('NUTLNH002', 'ชุดอาหารกลางวัน Set 2', NULL, 'NUT', 'LNH', NULL, NULL, NULL, NULL, NULL),
	('PHY000001', 'กายภาพบำบัด 1', NULL, 'PHY', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `odrmst` ENABLE KEYS */;

-- Dumping data for table fcms.omdmst: ~21 rows (approximately)
/*!40000 ALTER TABLE `omdmst` DISABLE KEYS */;
INSERT IGNORE INTO `omdmst` (`OmdNum`, `OmdSeq`, `OmdOdrCod`, `OmdMelWeg`, `OmdMelCal`, `OmdUpdUid`, `OmdUpdDts`) VALUES
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

-- Dumping data for table fcms.ommmst: ~18 rows (approximately)
/*!40000 ALTER TABLE `ommmst` DISABLE KEYS */;
INSERT IGNORE INTO `ommmst` (`OmmNum`, `OmmYrm`, `OmmDay`, `OmmWkd`, `OmmTyp`, `OmmUpdUid`, `OmmUpdDts`) VALUES
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

-- Dumping data for table fcms.piminf: ~1 rows (approximately)
/*!40000 ALTER TABLE `piminf` DISABLE KEYS */;
INSERT IGNORE INTO `piminf` (`PimPlyCod`, `PimFac`, `PimFnt`, `PimBak`, `PimRit`, `PimLef`, `PimUpdUid`, `PimUpdDts`) VALUES
	('P00001', 'D:\\AppServ\\www\\fcms\\images\\ChainatFC-logo2013.png', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `piminf` ENABLE KEYS */;

-- Dumping data for table fcms.plainf: ~0 rows (approximately)
/*!40000 ALTER TABLE `plainf` DISABLE KEYS */;
/*!40000 ALTER TABLE `plainf` ENABLE KEYS */;

-- Dumping data for table fcms.plcinf: 2 rows
/*!40000 ALTER TABLE `plcinf` DISABLE KEYS */;
INSERT IGNORE INTO `plcinf` (`PlcCod`, `PlcCatTyp`, `PlcCmt`, `PlcUpdUid`, `PlcUpdDts`) VALUES
	('P00001', 'FIT', 'Normal status', 'test', '20140302110734'),
	('P00001', 'PHY', 'test', 'test', '20140302111930');
/*!40000 ALTER TABLE `plcinf` ENABLE KEYS */;

-- Dumping data for table fcms.plpinf: ~0 rows (approximately)
/*!40000 ALTER TABLE `plpinf` DISABLE KEYS */;
/*!40000 ALTER TABLE `plpinf` ENABLE KEYS */;

-- Dumping data for table fcms.plrinf: ~4 rows (approximately)
/*!40000 ALTER TABLE `plrinf` DISABLE KEYS */;
INSERT IGNORE INTO `plrinf` (`PlrPlyCod`, `PlrRstDte`, `PlrCatTyp`, `PlrSubTyp`, `PlrRstCmt`, `PlrUpdUid`, `PlrUpdDts`) VALUES
	('P00001', '20140302', 'FIT', 'RST', 'Normal test', 'user', '2014030205507'),
	('P00001', '20140302', 'FIT', 'SGT', 'hello', 'user', '20140302120122'),
	('P00001', '20140302', 'PHY', 'RST', 'sdvsvdtttt', 'user', '20140302120836'),
	('P00001', '20140302', 'PHY', 'SGT', 'test 2', 'user', '20140302120855');
/*!40000 ALTER TABLE `plrinf` ENABLE KEYS */;

-- Dumping data for table fcms.plvinf: ~0 rows (approximately)
/*!40000 ALTER TABLE `plvinf` DISABLE KEYS */;
/*!40000 ALTER TABLE `plvinf` ENABLE KEYS */;

-- Dumping data for table fcms.plyinf: ~2 rows (approximately)
/*!40000 ALTER TABLE `plyinf` DISABLE KEYS */;
INSERT IGNORE INTO `plyinf` (`PlyCod`, `PlyTitCod`, `PlyFstNam`, `PlyMidNam`, `PlyFamNam`, `PlyFstEng`, `PlyMidEng`, `PlyFamEng`, `PlyNatCod`, `PlyPerNum`, `PlyPasNum`, `PlyBirDte`, `PlyAddNum`, `PlyAddDtl`, `PlyAddCty`, `PlyAddPrv`, `PlyAddZip`, `PlyAddCot`, `PlyNumEng`, `PlyDtlEng`, `PlyRegCod`, `PlySexTyp`, `PlyPhnNum`, `PlyMblNum`, `PlyConPer`, `PlyConPhn`, `PlyEmlAdd`, `PlyCurStt`, `PlyCreDte`, `PlyExpDte`, `PlyUpdUid`, `PlyUpdDts`) VALUES
	('P00001', NULL, 'สมชาย', NULL, 'เข็มกลัด', 'Somchai', NULL, 'Khemglad', 'ไทย', NULL, NULL, '19800401', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	('P00002', NULL, 'จิรายุ', NULL, 'ไม่รู้', 'Jirayu', NULL, 'Mairu', 'ไทย', NULL, NULL, '19850125', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `plyinf` ENABLE KEYS */;

-- Dumping data for table fcms.podinf: ~0 rows (approximately)
/*!40000 ALTER TABLE `podinf` DISABLE KEYS */;
/*!40000 ALTER TABLE `podinf` ENABLE KEYS */;

-- Dumping data for table fcms.posmst: ~0 rows (approximately)
/*!40000 ALTER TABLE `posmst` DISABLE KEYS */;
/*!40000 ALTER TABLE `posmst` ENABLE KEYS */;

-- Dumping data for table fcms.pwlinf: ~4 rows (approximately)
/*!40000 ALTER TABLE `pwlinf` DISABLE KEYS */;
INSERT IGNORE INTO `pwlinf` (`PwlSeqNum`, `PwlPlyCod`, `PwlAppDte`, `PwlAppTim`, `PwlCurStt`, `PwlRegUid`, `PwlVstDtm`, `PwlUpdUid`, `PwlUpdDts`) VALUES
	(1, 'P00001', '20140221', '0530', 'A', NULL, NULL, NULL, NULL),
	(2, 'P00001', '20140302', '0530', 'A', NULL, NULL, NULL, NULL),
	(3, 'P00002', '20140302', '0530', 'A', NULL, NULL, NULL, NULL),
	(4, 'P00002', '20140125', '0530', 'A', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `pwlinf` ENABLE KEYS */;

-- Dumping data for table fcms.usrmst: ~1 rows (approximately)
/*!40000 ALTER TABLE `usrmst` DISABLE KEYS */;
INSERT IGNORE INTO `usrmst` (`UsrCod`, `UsrFstNam`, `UsrMidNam`, `UsrFamNam`, `UsrFstEng`, `UsrMidEng`, `UsrFamEng`, `UsrLogPwd`, `UsrEmpCod`, `UsrDepCod`, `UsrCreDte`, `UsrExpDte`, `UsrUpdUid`, `UsrUpdDts`) VALUES
	('test', NULL, NULL, NULL, NULL, NULL, NULL, 'welcome', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `usrmst` ENABLE KEYS */;

-- Dumping data for table fcms.wklinf: ~16 rows (approximately)
/*!40000 ALTER TABLE `wklinf` DISABLE KEYS */;
INSERT IGNORE INTO `wklinf` (`WklPwlSeq`, `WklSeqNum`, `WklOdrCod`, `WklStrDtm`, `WklEndDtm`, `WklActDur`, `WklCurStt`, `WklRelStr`, `WklRelEnd`, `WklUpdUid`, `WklUpdDts`) VALUES
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
	(3, 2, 'NUTLNH001', '1200', '1300', 60, 'Y', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `wklinf` ENABLE KEYS */;

-- Dumping data for table fcms.wklmst: ~10 rows (approximately)
/*!40000 ALTER TABLE `wklmst` DISABLE KEYS */;
INSERT IGNORE INTO `wklmst` (`WklPlyCod`, `WklSeqNum`, `WklOdrCod`, `WklStrDtm`, `WklEndDtm`, `WklActDur`, `WklUpdUid`, `WklUpdDts`) VALUES
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

-- Dumping data for table fcms.wkminf: ~9 rows (approximately)
/*!40000 ALTER TABLE `wkminf` DISABLE KEYS */;
INSERT IGNORE INTO `wkminf` (`WkmPwlSeq`, `WkmOdrCod`, `WkmMelSeq`, `WkmMelCod`, `WkmMelWeg`, `WkmMelCal`, `WkmEdtYon`, `WkmMelYrm`, `WkmMelDay`, `WkmOdrStt`, `WkmUpdUid`, `WkmUpdDts`) VALUES
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
