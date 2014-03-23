<?php
	include ("includes/WebConnDB.inc");
	include ("includes/WebQuery.inc");
	include ("includes/WebFunc.inc");
	
	$CurrentDate = date("Ymd");
	$CurrentDateTime = date("YmdHi");
	$DisplayCurrentDateTime = date("jS M Y H:i:s");
	$DisplayGenerateDate = date("jS M Y", strtotime($CurrentDate));	
	$sSearchString = $_GET['term'];

	$MySql_QuerySel_PwlInf = "select * from odrmst where OdrCatTyp = 'MED' And  OdrCurStt = 'A' ";
	$MySql_QuerySel_PwlInf .= " And '$CurrentDate' between OdrCreDte And OdrExpDte ";
	$MySql_QuerySel_PwlInf .= " And OdrLocNam like '%$sSearchString%'";


	$MySqlConn  = OpenConn($MySqlconnect, $MySqlusername, $MySqlpassword);
	mysql_select_db($MySqldatabase, $MySqlConn) or die ("Cannot select database");
	mysql_query("SET NAMES TIS620");									
	$MySql_Result = mysql_query($MySql_QuerySel_PwlInf, $MySqlConn);
	$MySql_number_rows = mysql_num_rows($MySql_Result);
	CloseConn($MySqlConn);
 
	// loop through each zipcode returned and format the response for jQuery
	$data = array();
	if ($MySql_Result)
	{
		while( $aRs = mysql_fetch_array($MySql_Result, MYSQL_ASSOC) )
		{
			$data[] = array(
				'label' => $aRs['OdrLocNam'],
				'value' => $aRs['OdrCod']
			);
		}
	}
	 
	// jQuery wants JSON data
	echo json_encode($data);
	
?>
