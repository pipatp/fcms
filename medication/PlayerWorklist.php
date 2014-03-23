<?php
	include ("includes/WebConnDB.inc");
	$sSelectDate = $_POST["CalenPicker"];

	if (strlen($sSelectDate) == 0) {
		$sSelectDate = date("d/m/Y");
	}
	
	//echo "0. POST datepicker : " . $sSelectDate . "<br>";
	$vArrDate = explode("/", $sSelectDate);
	$SelDay = $vArrDate[0];
	$SelMon = $vArrDate[1];
	$SelYar = $vArrDate[2];
	$sSelectNewDate = $SelYar . $SelMon . $SelDay;
	//echo "1. Selected Date : " . $sSelectNewDate . "<br>";	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="css/StyleMain.css" />
</head>

<body>
<form name="WorkList" class="WorkList" action="" method="">
<table width="600" border="0" align="center">
  <tr>
    <th width="50">Player ID</th>
    <th width="180">Player Name</th>
    <th width="100">Appointment Date/Time</th>
    <th width="20">Status</th>
    <th width="100">Visit Date/Time</th>
  </tr>


<?php
	$cnMySQLConn  = OpenConn($MySqlconnect,$MySqlusername,$MySqlpassword);
	if(! $cnMySQLConn)
		die("Cannot connect to MySQL");
		
	$sDBName = "chainatfc";
	SelectDb($sDBName, $cnMySQLConn);
	$sQuerySEL = "   Select  * ";
	$sQuerySEL = $sQuerySEL."From	PwlInf, PlyInf ";
	$sQuerySEL = $sQuerySEL."where PlyCod = PwlPlyCod ";
	$sQuerySEL = $sQuerySEL."And	PwlAppDte = '$sSelectNewDate' ";
 
	$rsQuery_Result = MyQuery($sQuerySEL, $cnMySQLConn);		
	$iNumber_rows = mysql_num_rows($rsQuery_Result);
	$iNumber_fields = mysql_num_fields($rsQuery_Result);
		
	if ($iNumber_rows > 0){    
		while($aRsPwlInf = mysql_fetch_array($rsQuery_Result)){  
			$sRetPlayerCode = trim($aRsPwlInf[PlyCod]);
			$sRetPlayerName = trim($aRsPwlInf[PlyFstNam]) . "  " . trim($aRsPwlInf[PlyFamNam]);
			$sRetAppDateTime = trim($aRsPwlInf[PwlAppDte]) . " " . trim($aRsPwlInf[PwlAppTim]);
			$sRetAppStatus = trim($aRsPwlInf[PwlCurStt]);
			$sRetVisitDateTime = trim($aRsPwlInf[PwlVstDtm]);
?>			
			
  <tr>
    <td><?php echo $sRetPlayerCode; ?></td>
    <td><?php echo $sRetPlayerName; ?></td>
    <td><?php echo $sRetAppDateTime; ?></td>
    <td><?php echo $sRetAppStatus; ?></td>
    <td><?php echo $sRetVisitDateTime; ?></td>
  </tr>

<?php			
		}
	}
	Else{
				
	}
 
	FreeResult($rsQuery_Result);
	CloseConn($cnMySQLConn);

?>
</table>
</form>
</body>
</html>