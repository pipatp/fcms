<?php
	session_start();
	
	include ("includes/WebConnDB.inc");
	include ("includes/WebQuery.inc");
	include ("includes/WebFunc.inc");	
		
	$sDspNam = $_SESSION['ArrResult'][0]['PlyFstNam'] . " " . $_SESSION['ArrResult'][0]['PlyFamNam'];
	$VstDtm = $_SESSION['ArrResult'][0]['PwlVstDtm'];	
	
	//$CurrentDate = date("Ymd");
	//$CurrentDateTime = date("YmdHi");
	//$DisplayCurrentDateTime = date("jS M Y H:i:s");
	$DisplayVisitDateTime = date("jS M Y H:i", strtotime($VstDtm));		
	$sPlyCod = $_SESSION['ArrResult'][0]['PwlPlyCod'];
	$iRegNum = $_SESSION['ArrResult'][0]['PwlSeqNum'];
	$sVstDtmSht = substr($sVstDtm, 0, 8);
	
	$MySql_QuerySel_PlvInf = " Select * From PlvInf, PwlInf ";
	$MySql_QuerySel_PlvInf .= " Where PlvPwlNum = PwlSeqNum And PwlPlyCod = '$sPlyCod' ";
	$MySql_QuerySel_PlvInf .= " And PwlVstDtm like '$sVstDtmSht%'";	
	$MySql_QuerySel_PlvInf .= " Order By PlvInpDts DESC LIMIT 1; ";

	$MySqlConn  = OpenConn($MySqlconnect, $MySqlusername, $MySqlpassword);
	mysql_select_db($MySqldatabase, $MySqlConn) or die ("Cannot select database");
	mysql_query("SET NAMES TIS620");									
	$MySql_Result = mysql_query($MySql_QuerySel_PlvInf, $MySqlConn);
	$MySql_number_rows = mysql_num_rows($MySql_Result);
	CloseConn($MySqlConn);	

    if ($MySql_number_rows > 0){		//   If exist recordset - $MySql_number_rows
        while($aRsPlvInf = mysql_fetch_array($MySql_Result)){   //  While Loop $aRsPwlInf
			$LastMeasureDateTime = date("jS M Y H:i", strtotime($aRsPlvInf['PlvInpDts']));		
?>
<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFCCFF">
  <tr height="35">
    <td colspan="4">Visit : <?php echo $DisplayVisitDateTime; ?></td>
  </tr>
  <tr height="35">
    <td colspan="4"><?php echo $sDspNam; ?></td>
  </tr>
  <tr height="35">
    <td width="30%">Age</td>
    <td width="30%"></td>
    <td width="10%"></td>
    <td width="30%">Year</td>
  </tr>
  <tr height="35">
    <td>Weight</td>
    <td align="right"><?php echo $aRsPlvInf['PlvWeg']; ?></td>
    <td ></td>
    <td>kg.</td>
  </tr>
  <tr height="35">
    <td>Height</td>
    <td align="right"><?php echo $aRsPlvInf['PlvHeg']; ?></td>
    <td "></td>
    <td>cm.</td>
  </tr>
  <tr height="35">
    <td>BMI</td>
    <td align="right">
	<?php
        $hValue = $aRsPlvInf['PlvHeg']/100;
        $bmiValue = round($aRsPlvInf['PlvWeg'] / ($hValue * $hValue), 2);
		echo $bmiValue;
    ?>
    </td>
    <td></td>
    <td></td>
  </tr>
  <tr height="35">
    <td colspan="4">Last Measure <?php echo $LastMeasureDateTime; ?></td>
  </tr>
  <tr height="35">
    <td>Temperature</td>
    <td align="right"><?php echo $aRsPlvInf['PlvTem']; ?></td>
    <td></td>
    <td>C</td>
  </tr>
  <tr height="35">
    <td>Blood Pressure</td>
    <td align="right"><?php echo $aRsPlvInf['PlvLowPrs'] . "/" . $aRsPlvInf['PlvHigPrs']; ?></td>
    <td></td>
    <td>mmHg</td>
  </tr>
  <tr height="35">
    <td>Pulse</td>
    <td align="right"><?php echo $aRsPlvInf['PlvPul']; ?></td>
    <td></td>
    <td>/min</td>
  </tr>
  <tr height="35">
    <td>Respiratory Rate</td>
    <td align="right"><?php echo $aRsPlvInf['PlvRra']; ?></td>
    <td></td>
    <td>/min</td>
  </tr>  
  <tr height="35">
    <td>SpO2</td>
    <td align="right"><?php echo $aRsPlvInf['PlvO2Sat']; ?></td>
    <td></td>
    <td>% Sat.</td>
  </tr>
  <tr height="56">
    <td colspan="4"><?php echo $aRsPlvInf['PlvCmt']; ?></td>
  </tr>    
</table>
<?php
        }
    }
    unset($aRsPwlInf);
    FreeResult($MySql_Result);
?>            
