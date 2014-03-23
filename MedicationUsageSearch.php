<?php
	header('content-type: text/html; charset: utf-8');//รองรับภาษาไทย
	
	include ("includes/WebConnDB.inc");
	include ("includes/WebQuery.inc");
	include ("includes/WebFunc.inc");
	
	$CurrentDate = date("Ymd");
	$CurrentDateTime = date("YmdHi");
	$DisplayCurrentDateTime = date("jS M Y H:i:s");
	$DisplayGenerateDate = date("jS M Y", strtotime($CurrentDate));	
	$sSearchString = $_GET['term'];
	//$sSearchString = iconv('UTF-8','TIS-620',$sSearchString); //แปลงจาก UTF8 เป็น TIS620

	$MySql_QuerySel_Usage = " select * from cnfmst where CnfGrpCod = 'USAGE'  ";
	$MySql_QuerySel_Usage .= " And CnfLocNam like '%$sSearchString%' ";

	$MySqlConn  = OpenConn($MySqlconnect, $MySqlusername, $MySqlpassword);
	mysql_select_db($MySqldatabase, $MySqlConn) or die ("Cannot select database");
	//mysql_query("SET NAMES TIS620");
	mysql_query("SET NAMES utf8");
	//mysql_query("set character set tis620");
	$MySql_Result = mysql_query($MySql_QuerySel_Usage, $MySqlConn);
	$MySql_number_rows = mysql_num_rows($MySql_Result);
	CloseConn($MySqlConn);
 
	// loop through each zipcode returned and format the response for jQuery
	$data = array();
	if($MySql_Result){
		while($aRs = mysql_fetch_array($MySql_Result, MYSQL_ASSOC)){
			$data[] = array(
				'value' => trim($aRs['CnfSubCod']),
				'label' => trim($aRs['CnfLocNam'])
			);
		}
	}
	 
	// jQuery wants JSON data
	echo json_encode($data);
	
?>
