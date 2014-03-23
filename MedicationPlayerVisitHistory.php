<?php
	session_start();
	
	include ("includes/WebConnDB.inc");
	include ("includes/WebQuery.inc");
	include ("includes/WebFunc.inc");	
	//$sDspNam = $_SESSION['ArrResult'][0]['PlyFstNam'] . " " . $_SESSION['ArrResult'][0]['PlyFamNam'];	
	//echo $sDspNam;
	$sPlyCod = $_SESSION['ArrResult'][0]['PwlPlyCod'];

	$MySql_QuerySel_PwlInf = " Select * From PwlInf, UsrMst ";
	$MySql_QuerySel_PwlInf .= " Where PwlPlyCod = '$sPlyCod' ";
	$MySql_QuerySel_PwlInf .= " And PwlDocCod = UsrCod And UsrGrpTyp = 3 ";
	$MySql_QuerySel_PwlInf .= " Order by PwlVstDtm DESC ";
	
	$MySqlConn  = OpenConn($MySqlconnect, $MySqlusername, $MySqlpassword);
	mysql_select_db($MySqldatabase, $MySqlConn) or die ("Cannot select database");
	mysql_query("SET NAMES TIS620");									
	$MySql_Result = mysql_query($MySql_QuerySel_PwlInf, $MySqlConn);
	$MySql_number_rows = mysql_num_rows($MySql_Result);
	CloseConn($MySqlConn);	
	
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title></title>
        
        <link href="css/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
        <link href="css/main-medication.css" rel="stylesheet" type="text/css" />
        
        <script type="text/javascript" src="js/jquery-2.0.3.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>   
        
		<script language="javascript">
        <!--
        
						   
        //-->
        </script>     

    </head>
    
    
    <body>
    
        <table id="RegisterListTable" class="content-table">
            <tr>
                <th>Visit Date/Time</th>
                <th>Doctor Name</th>
                <th>Diagnosis</th>
                <th>Medicine Y/N</th>
            </tr>
<?php
	if ($MySql_number_rows > 0){		//   If exist recordset - $MySql_number_rows
		while($aRsPwlInf = mysql_fetch_array($MySql_Result)){   //  While Loop $aRsPwlInf
?>
            <tr>
                <td width="100">
                    <?php 
                        $DisplayDate = date("jS M Y H:i", strtotime($aRsPwlInf['PwlVstDtm']));
                        echo $DisplayDate;
                    ?>
                </td>		
                <td width="200">
					<?php
						$sDocFullNam = trim($aRsPwlInf['UsrFstNam']) . " " . trim($aRsPwlInf['UsrFamNam']);
						echo $sDocFullNam;
                	?>
                </td>
                <td width="450">Diagnosis</td>
                <td width="50">Y</td>
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
        
