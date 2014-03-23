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
        <link href="css/main-medication-order.css" rel="stylesheet" type="text/css" />
        
        <script type="text/javascript" src="js/jquery-2.0.3.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>   

    </head>
    
    
    <body>
    
    <div class="doctororder" id="doctororder">
        <ul>
            <li><a id="OrderPhamacy" href="#">PHA History</a></li>
            <li><a id="OrderLaboratory" href="#">LAB History</a></li>
            <li><a id="OrderXray" href="#">X-Ray History</a></li>
            <li><a id="OrderPT" href="#">PR History</a></li>
        </ul>
    </div>

    <div class="sub-doctororder" id="sub-doctororder">
    </div>

    </body>
</html>
        
