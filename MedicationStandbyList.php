<?php
	include ("includes/WebConnDB.inc");
	include ("includes/WebQuery.inc");
	include ("includes/WebFunc.inc");
	
	$CurrentDate = date("Ymd");
	$CurrentDateTime = date("YmdHi");
	$DisplayCurrentDateTime = date("jS M Y H:i:s");
	$DisplayGenerateDate = date("jS M Y", strtotime($CurrentDate));	

	$MySql_QuerySel_PwlInf = $Gbl_MySql_query_PwlInfPlyInf;
	$MySql_QuerySel_PwlInf = str_replace("@CurrentDate", "$CurrentDate", $MySql_QuerySel_PwlInf);

	$MySqlConn  = OpenConn($MySqlconnect, $MySqlusername, $MySqlpassword);
	mysql_select_db($MySqldatabase, $MySqlConn) or die ("Cannot select database");
	mysql_query("SET NAMES TIS620");									
	$MySql_Result = mysql_query($MySql_QuerySel_PwlInf, $MySqlConn);
	$MySql_number_rows = mysql_num_rows($MySql_Result);
	CloseConn($MySqlConn);
	
?>
<html>
    <head>
        <title>Medication Standby List</title>
        <link href="css/main.css" rel="stylesheet" type="text/css" />

		<script language="javascript">
        <!--
        
            function ViewPlayer(iRegNum) {
                window.PlayerList.action = "MedicationPlayerView.php"; 
                window.PlayerList.method = "post";
                window.PlayerList.target = "_self";
                window.PlayerList.PrmRegNum.value = iRegNum;			
                window.PlayerList.submit();
            }
               
        //-->
        </script>     
        
    </head>
    
    <body>
    	<form name="PlayerList" class="PlayerList" action="" method="">
        <h1>Medication Standby List</h1>
        <table id="RegisterListTable" class="content-table">
            <tr>
                <th></th>
                <th>Register No.</th>
                <th>Player Code</th>
                <th>Player Name</th>
                <th>Register Date/Time</th>
                <th>Status</th>
                <th></th>
            </tr>
<?php
	if ($MySql_number_rows > 0){		//   If exist recordset - $MySql_number_rows
		while($aRsPwlInf = mysql_fetch_array($MySql_Result)){   //  While Loop $aRsPwlInf
?>
            <tr>
                <?php 
                    $sPlayerPicture = Trim($aRsPwlInf['PlyPicPth']);
                    $iRegNum = $aRsPwlInf['PwlSeqNum'];
                ?>
                <td width="70"><img src="<?php echo $sPlayerPicture; ?>" width="50" height="60" /></td>
                <td width="100"><? echo $iRegNum;?></td>
                <td width="100"><?=$aRsPwlInf['PwlPlyCod'];?></td>
                <td width="250"><?=Trim($aRsPwlInf['PlyFstNam']) . ' ' . Trim($aRsPwlInf['PlyFamNam']);?></td>
                <td width="200">
                    <?php 
                        $DisplayDate = date("jS M Y H:i", strtotime($aRsPwlInf['PwlVstDtm']));
                        echo $DisplayDate;
                    ?>
                </td>
                <td width="100"></td>
                <td width="100"><a href="javascript:ViewPlayer('<?php echo $iRegNum; ?>')">View</a></td>
            </tr>
<?php
		}
	}
	unset($aRsPwlInf);
	FreeResult($MySql_Result);	
?>
        </table>
        <input type="hidden" name="PrmRegNum" >
        </form>
    </body>
</html>