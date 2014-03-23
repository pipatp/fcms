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
	$sVstDtmSht = substr($sVstDtm, 0, 8);
	$MySql_QuerySel_PlvInf = " Select * From PlvInf, PwlInf Where PlvPwlNum = PwlSeqNum And PwlPlyCod = '$sPlyCod' ";	
	$MySql_QuerySel_PlvInf .= " Order By PlvInpDts DESC ";

	$MySqlConn  = OpenConn($MySqlconnect, $MySqlusername, $MySqlpassword);
	mysql_select_db($MySqldatabase, $MySqlConn) or die ("Cannot select database");
	mysql_query("SET NAMES TIS620");									
	$MySql_Result = mysql_query($MySql_QuerySel_PlvInf, $MySqlConn);
	$MySql_number_rows = mysql_num_rows($MySql_Result);
	CloseConn($MySqlConn);	
	
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title></title>
        
        <link href="css/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
        <!--link href="css/main-medication-vitalsign.css" rel="stylesheet" type="text/css" /-->
        
        <script type="text/javascript" src="js/jquery-2.0.3.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>   

    </head>
    
    <body>
        <table id="VitalSignHistoryTable" class="content-table" border="1" cellspacing="0" cellpadding="0" bgcolor="#FFCCFF">
            <tr>
                <th width="50">Input Date/Time</th>
                <th width="50">Weight</th>
                <th width="50">Height</th>
                <th width="50">BMI</th>
                <th width="50">Temp.</th>
                <th width="50">Systolic</th>
                <th width="50">Diastolic</th>
                <th width="50">Pulse</th>
                <th width="50">SpO2</th>
                <th width="50">Respiratory Rate</th>
                <th width="220">Comment</th>
            </tr>
<?php
    if ($MySql_number_rows > 0){		//   If exist recordset - $MySql_number_rows
        while($aRsPlvInf = mysql_fetch_array($MySql_Result)){   //  While Loop $aRsPwlInf
?>
            <tr>
                <td>
                <?php 
                    $DisplayDate = date("jS M Y H:i", strtotime($aRsPlvInf['PlvInpDts']));
                    echo $DisplayDate;
                ?>
                </td>
                <td><?php echo $aRsPlvInf['PlvWeg']; ?></td>
                <td><?php echo $aRsPlvInf['PlvHeg']; ?></td>
                <?php
                    $hValue = $aRsPlvInf['PlvHeg']/100;
                    $bmiValue = round($aRsPlvInf['PlvWeg'] / ($hValue * $hValue), 2);
                ?>
                <td><?php echo $bmiValue; ?></td>
                <td><?php echo $aRsPlvInf['PlvTem']; ?></td>
                <td><?php echo $aRsPlvInf['PlvLowPrs']; ?></td>
                <td><?php echo $aRsPlvInf['PlvHigPrs']; ?></td>
                <td><?php echo $aRsPlvInf['PlvPul']; ?></td>
                <td><?php echo $aRsPlvInf['PlvO2Sat']; ?></td>
                <td><?php echo $aRsPlvInf['PlvRra']; ?></td>
                <td><?php echo $aRsPlvInf['PlvCmt']; ?></td>
            </tr>
<?php
        }
    }
    unset($aRsPwlInf);
    FreeResult($MySql_Result);
?>            
        </table>        
    </body>
</html>
        
