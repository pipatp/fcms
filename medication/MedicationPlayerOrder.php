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

		<script type="text/JavaScript"> 
            
		$(document).ready(function(){
			$("#OrderPrescription").click(function(){ 
                  // alert("OrderPrescription");
				$('#sub-display-body').html('Downloading...'); // Show "Downloading..."
				// Do an ajax request
				$.ajax({
				  url: "MedicationPlayerOrderByDoctor.php"
				}).done(function(data) { // data what is sent back by the php page
				  $('#sub-display-body').html(data); // display data
				});				
			});                
			$("#OrderHistory").click(function(){ 
                  //alert("OrderHistory");
				$('#sub-display-body').html('Downloading...'); // Show "Downloading..."
				// Do an ajax request
				$.ajax({
				  url: "MedicationPlayerOrderViewHistory.php"
				}).done(function(data) { // data what is sent back by the php page
				  $('#sub-display-body').html(data); // display data
				});		
			});     		
		});	
					
        </script>

    </head>
    
    
    <body>
    
    <div class="sub-menu" id="sub-menu">
        <ul>
            <li><a id="OrderPrescription" href="#">Prescription</a></li>
            <li><a id="OrderHistory" href="#">Order History</a></li>
        </ul>
    </div>

    <div class="sub-display-body" id="sub-display-body">
    </div>

    </body>
</html>
        
