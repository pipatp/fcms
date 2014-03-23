<?php
	session_start();
	//$sDspNam = $_SESSION['ArrResult'][0]['PlyFstNam'] . " " . $_SESSION['ArrResult'][0]['PlyFamNam'];	
	//echo $sDspNam;
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

			$("#historydoctor").click(function(){ 
                //alert("history");
				$('#Display-Table').html('Downloading...'); // Show "Downloading..."
				// Do an ajax request
				$.ajax({
				  url: "MedicationPlayerVisitHistory.php"
				}).done(function(data) { // data what is sent back by the php page
				  $('#Display-Table').html(data); // display data
				});				
			});     
			$("#historyrecord").click(function(){ 
                //alert("history");
				$('#Display-Table').html('Downloading...'); // Show "Downloading..."
				// Do an ajax request
				$.ajax({
				  url: "MedicationPlayerTotalRecordHistory.php"
				}).done(function(data) { // data what is sent back by the php page
				  $('#Display-Table').html(data); // display data
				});				
			}); 
			$("#historyorder").click(function(){ 
                //alert("history");
				$('#Display-Table').html('Downloading...'); // Show "Downloading..."
				// Do an ajax request
				$.ajax({
				  url: "MedicationPlayerTotalOrderHistory.php"
				}).done(function(data) { // data what is sent back by the php page
				  $('#Display-Table').html(data); // display data
				});				
			}); 		   
        //-->
        </script>     

    </head>
    
    
    <body>
    
    <div class="sub-menu" id="sub-menu">
        <ul>
            <li><a id="historydoctor" href="#">History Doctor</a></li>
            <li><a id="historyrecord" href="#">History Record</a></li>
            <li><a id="historyorder" href="#">History Order</a></li>
        </ul>
    </div>

	<div class="Display-Table" id="Display-Table"></div>

    </body>
</html>
        
