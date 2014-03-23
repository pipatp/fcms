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
	$sDocCod = $_SESSION['ArrResult'][0]['PwlDocCod'];
	$MySql_QuerySel_PodInf = " select Max(PodSeq) as MaxSeq from podinf where podpwlnum = $iRegNum; ";
	//echo $MySql_QuerySel_PodInf . "<br>";
	$MySqlConn  = OpenConn($MySqlconnect, $MySqlusername, $MySqlpassword);
	mysql_select_db($MySqldatabase, $MySqlConn) or die ("Cannot select database");
	mysql_query("SET NAMES TIS620");									
	$MySql_Result_PodInf = mysql_query($MySql_QuerySel_PodInf, $MySqlConn);
	$MySql_number_rows_PodInf = mysql_num_rows($MySql_Result_PodInf);	
	if ($MySql_number_rows_PodInf > 0){		//   If exist recordset - $MySql_number_rows
		while($aRsPodInf = mysql_fetch_array($MySql_Result_PodInf)){   //  While Loop $aRsPlvInf
			$iMaxSeq = $aRsPodInf['MaxSeq'];
		}
	}
	unset($aRsPodInf);
	@mysql_free_result($MySql_Result_PodInf);

	$itemname = $_POST['itemname'];
	$itemqty = $_POST['itemqty'];
	$itemusage = $_POST['itemusage'];
	$itemcmt = $_POST['itemcmt'];
	$itemcode = $_POST['itemcode'];
	$usagecode = $_POST['usagecode'];
	$itemcat = $_POST['itemcat'];
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
	
	$MySql_QueryIns_PodInf = " insert into podinf values($iRegNum, $iMaxSeq, '$itemcode', '$itemcat', ";	
	$MySql_QueryIns_PodInf .= "'$itemname', $itemqty, '$itemusage', '$itemcmt', 'O', ";
	$MySql_QueryIns_PodInf .= "'$sDocCod', '$CurrentDateTime', '$sDocCod', '$CurrentDateTime');";
	//echo $MySql_QueryIns_PodInf . "<br>";
	
	if (mysql_query($MySql_QueryIns_PodInf,$MySqlConn)){
		//  Success Save;
	}
	else{
		//  Fail Save;
	}

	CloseConn($MySqlConn);		
?>
