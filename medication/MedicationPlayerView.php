<?php
	session_start();
	
	include ("includes/WebConnDB.inc");
	include ("includes/WebQuery.inc");
	include ("includes/WebFunc.inc");
	// $PrmRegNum
	$CurrentDate = date("Ymd");
	$CurrentDateTime = date("YmdHi");
	$DisplayCurrentDateTime = date("jS M Y H:i:s");
	$DisplayGenerateDate = date("jS M Y", strtotime($CurrentDate));	

	$MySql_QuerySel_PwlInf = $Gbl_MySql_query_PwlInfPlyInf_OnePlayer;
	$MySql_QuerySel_PwlInf = str_replace("@SeqNum", "$PrmRegNum", $MySql_QuerySel_PwlInf);
	
	//echo $MySql_QuerySel_PwlInf . "<br>";

	$MySqlConn  = OpenConn($MySqlconnect, $MySqlusername, $MySqlpassword);
	mysql_select_db($MySqldatabase, $MySqlConn) or die ("Cannot select database");
	mysql_query("SET NAMES TIS620");									
	$MySql_Result = mysql_query($MySql_QuerySel_PwlInf, $MySqlConn);
	$MySql_number_rows = mysql_num_rows($MySql_Result);
	
	$arr_resultset = array(); 
	if ($MySql_number_rows > 0){
		while ($arr_resultset[] = mysql_fetch_array($MySql_Result)){} 
	}
	$_SESSION['ArrResult'] = $arr_resultset;

	CloseConn($MySqlConn);	
	
?>
<html>
    <head>
        <title>Medication Player Information</title>
		
        <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="js/jquery-2.1.0.min.map"></script>
        
		<script language="javascript">
        <!--
        
			$('#left_view_Photo').html('Downloading...'); // Show "Downloading..."
			// Do an ajax request
			$.ajax({
			  url: "MedicationPlayerPhoto.php"
			}).done(function(data) { // data what is sent back by the php page
			  $('#left_view_Photo').html(data); // display data
			});
			
			$('#left_view_Deatil').html('Downloading...'); // Show "Downloading..."
			// Do an ajax request
			$.ajax({
			  url: "MedicationPlayerDeatilVS.php"
			}).done(function(data) { // data what is sent back by the php page
			  $('#left_view_Deatil').html(data); // display data
			});			
			
			$('#main_view').html('Downloading...'); // Show "Downloading..."
			// Do an ajax request
			$.ajax({
			  url: "MedicationPlayerMainScreen.php"
			}).done(function(data) { // data what is sent back by the php page
			  $('#main_view').html(data); // display data
			});					
			   
        //-->
        </script>     

		<style type="text/css">
			.left_view {
				float: left;
				width: 20%;
			}
			.main_view {
				float: right;
				width: 80%;
			}
			.left_view_Photo {
				float: none;
				height: 20%;
				clear: none;
			}
			.left_view_Deatil {
				float: none;
				height: 80%;
				clear: none;
			}
        </style>
        
    </head>
    
    <body>

    <div class="left_view" id="left_view">
        <div class="left_view_Photo" id="left_view_Photo">
            <?php 
                // MedicationPlayerPhoto
            ?>
        </div>
        <div class="left_view_Deatil" id="left_view_Deatil">
            <?php
                // MedicationPlayerDeatilVS
            ?>
        </div>
    </div>
    <div class="main_view" id="main_view">
       <?php 
            // MedicationPlayerMainScreen
        ?>
    </div>
    </body>
</html>
