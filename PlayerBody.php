<?php  
	include ("includes/WebConnDB.inc");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Player Information</title>

</head>

<body>
<form name="PlayerPicture" id="PlayerPicture">
  <p>
    <?php
	$cnMySQLConn  = OpenConn($MySqlconnect, $MySqlusername, $MySqlpassword);
	if(! $cnMySQLConn)
		die("Cannot connect to MySQL");
		
	$sDBName = "chainatfc";
	SelectDb($sDBName, $cnMySQLConn);
	$sQuerySEL = "   Select  * ";
	$sQuerySEL = $sQuerySEL."From	PlyInf ";
	$sQuerySEL = $sQuerySEL."Where	PlyCod = '$PrmPlyCod' ";
 
	$rsQuery_Result = MyQuery($sQuerySEL, $cnMySQLConn);		
	$iNumber_rows = mysql_num_rows($rsQuery_Result);
	$iNumber_fields = mysql_num_fields($rsQuery_Result);
		
	if ($iNumber_rows > 0){    
		while($aRsPlyInf = mysql_fetch_array($rsQuery_Result)){  
			$sRetPlayerCode = trim($aRsPlyInf[PlyCod]);

		}
	}
	Else{
				
	}
 
	FreeResult($rsQuery_Result);
	CloseConn($cnMySQLConn);
?>
  </p>
</form>
</body>
</html>