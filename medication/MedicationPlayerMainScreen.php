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
			$("#history").click(function(){ 
                  // alert("history");
				$('#main-body').html('Downloading...'); // Show "Downloading..."
				// Do an ajax request
				$.ajax({
				  url: "MedicationPlayerHistory.php"
				}).done(function(data) { // data what is sent back by the php page
				  $('#main-body').html(data); // display data
				});				
			});                
			$("#medical").click(function(){ 
                  //alert("medical");
				$('#main-body').html('Downloading...'); // Show "Downloading..."
				// Do an ajax request
				$.ajax({
				  url: "MedicationPlayerRecord.php"
				}).done(function(data) { // data what is sent back by the php page
				  $('#main-body').html(data); // display data
				});		
			});
			$("#order").click(function(){ 
                  //alert("order");
				$('#main-body').html('Downloading...'); // Show "Downloading..."
				// Do an ajax request
				$.ajax({
				  url: "MedicationPlayerOrder.php"
				}).done(function(data) { // data what is sent back by the php page
				  $('#main-body').html(data); // display data
				});		
			});
			$("#result").click(function(){ 
                  //alert("result");
				$('#main-body').html('Downloading...'); // Show "Downloading..."
				// Do an ajax request
				$.ajax({
				  url: "MedicationPlayerResult.php"
				}).done(function(data) { // data what is sent back by the php page
				  $('#main-body').html(data); // display data
				});		
			});
			$("#stock").click(function(){ 
                  //alert("result");
				$('#main-body').html('Downloading...'); // Show "Downloading..."
				// Do an ajax request
				$.ajax({
				  url: "MedicationPlayerStock.php"
				}).done(function(data) { // data what is sent back by the php page
				  $('#main-body').html(data); // display data
				});		
			});  			
		});	
					
        </script>


    </head>
    
    
    <body>
    
    <div class="top-menu" id="top-menu">
        <ul>
            <li><a id="history" href="#"><img src="images/History.png" />Treatment History</a></li>
            <li><a id="medical" href="#"><img src="images/order-3.png" />Medical Record</a></li>
            <li><a id="order" href="#"><img src="images/medicine.png" />Treatment Order</a></li>
            <li><a id="result" href="#"><img src="images/result.png" />Result Report</a></li>
            <li><a id="stock" href="#"><img src="images/Stock.gif" />Treatment Stock</a></li>
        </ul>
    </div>
        
    <div class="main-body" id="main-body">
    </div>

    </body>
</html>
