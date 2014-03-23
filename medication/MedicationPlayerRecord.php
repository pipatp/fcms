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

			$("#RecordVitalsign").click(function(){ 
                //alert("history");
				$('#Display-Table').html('Downloading...'); // Show "Downloading..."
				// Do an ajax request
				$.ajax({
				  url: "MedicationPlayerVitalSignRecord.php"
				}).done(function(data) { // data what is sent back by the php page
				  $('#Display-Table').html(data); // display data
				});				
			});
			$("#RecordExamination").click(function(){ 
                //alert("history");
				$('#Display-Table').html('Downloading...'); // Show "Downloading..."
				// Do an ajax request
				$.ajax({
				  url: "MedicationPlayerExamRecord.php"
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
            <li><a id="RecordVitalsign" href="#">Vital sign record</a></li>
            <li><a id="RecordExamination" href="#">Physical Examination</a></li>
        </ul>
    </div>

	<div class="Display-Table" id="Display-Table"></div>

    </body>
</html>
        
