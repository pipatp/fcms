<?php
	session_start();
	
	include ("includes/WebConnDB.inc");
	include ("includes/WebQuery.inc");
	include ("includes/WebFunc.inc");	
	//$sDspNam = $_SESSION['ArrResult'][0]['PlyFstNam'] . " " . $_SESSION['ArrResult'][0]['PlyFamNam'];	
	//echo $sDspNam;
	$sPlyCod = $_SESSION['ArrResult'][0]['PwlPlyCod'];
	$iRegNum = $_SESSION['ArrResult'][0]['PwlSeqNum'];
	$sVstDtm = $_SESSION['ArrResult'][0]['PwlVstDtm'];
	$MySql_QuerySel_PlvInf = " select Max(PlvSeqNum) as MaxSeq from plvinf where plvpwlnum = $iRegNum; ";
	//echo $MySql_QuerySel_PlvInf . "<br>";
	$MySqlConn  = OpenConn($MySqlconnect, $MySqlusername, $MySqlpassword);
	mysql_select_db($MySqldatabase, $MySqlConn) or die ("Cannot select database");
	mysql_query("SET NAMES TIS620");									
	$MySql_Result_PlvInf = mysql_query($MySql_QuerySel_PlvInf, $MySqlConn);
	$MySql_number_rows_PlvInf = mysql_num_rows($MySql_Result_PlvInf);	
	if ($MySql_number_rows_PlvInf > 0){		//   If exist recordset - $MySql_number_rows
		while($aRsPlvInf = mysql_fetch_array($MySql_Result_PlvInf)){   //  While Loop $aRsPlvInf
			$iMaxSeq = $aRsPlvInf['MaxSeq'];
		}
	}
	unset($aRsPlvInf);
	@mysql_free_result($MySql_Result_PlvInf);

	$vsweight = $_POST['vsweight'];
	$vsheight = $_POST['vsheight'];
	$vsbmi = $_POST['vsbmi'];
	$vstemp = $_POST['vstemp'];
	$vssys = $_POST['vssys'];
	$vsdia = $_POST['vsdia'];
	$vspulse = $_POST['vspulse'];
	$vsspo2 = $_POST['vsspo2'];
	$vsrr = $_POST['vsrr'];
	$vscomment = $_POST['vscomment'];
	if (isset($iMaxSeq)){
		$iMaxSeq = $iMaxSeq + 1;
	}
	else{
		$iMaxSeq = 1;	
	}

	$CurrentDate = date("Ymd");
	$CurrentDateTime = date("YmdHis");
	$DisplayCurrentDateTime = date("jS M Y H:i:s");
	$DisplayGenerateDate = date("jS M Y", strtotime($CurrentDate));	
	
	$MySql_QueryIns_PlvInf = " insert into plvinf values($iRegNum, $iMaxSeq, '$CurrentDateTime', $vsweight, $vsheight, $vssys, ";	
	$MySql_QueryIns_PlvInf .= "$vsdia, $vstemp, $vspulse, $vsspo2, $vsrr, '$vscomment', 'admin', '$CurrentDateTime');";
	//echo $MySql_QueryIns_PlvInf . "<br>";
	
	if (mysql_query($MySql_QueryIns_PlvInf,$MySqlConn)){
		//  Success Save;
	}
	else{
		//  Fail Save;
	}

	CloseConn($MySqlConn);		
?>
