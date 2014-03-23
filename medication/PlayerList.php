<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Player List</title>
<link rel="stylesheet" type="text/css" href="css/StyleMain.css" />
<SCRIPT LANGUAGE="JavaScript">
<!--

	function ViewPlayer(PlayerCode) {
		window.PlayerList.action = "PlayerInfo.php"; 
		window.PlayerList.method = "post";
		window.PlayerList.target = "_self";
		window.PlayerList.PrmPlyCod.value = PlayerCode;			
		window.PlayerList.submit();
	}

 	function GoBackToMainPage() {
  		window.PlayerList.action = "AdminMain.php"; 
  		window.PlayerList.method = "post";
  		window.PlayerList.target = "self";
  		window.PlayerList.submit();				
	}	

//-->
</SCRIPT>


</head>

<body>
<form name="PlayerList" class="PlayerList" action="" method="">
<table width="600" border="0" align="center">
  <tr>
    <th width="50">Player ID</th>
    <th width="180">Player Name</th>
    <th width="100">Player Picture</th>
    <th width="20">Edit</th>
  </tr>


<?php
	include ("includes/WebConnDB.inc");

	$cnMySQLConn  = OpenConn($MySqlconnect,$MySqlusername,$MySqlpassword);
	if(! $cnMySQLConn)
		die("Cannot connect to MySQL");
		
	$sDBName = "chainatfc";
	SelectDb($sDBName, $cnMySQLConn);
	$sQuerySEL = "   Select  * ";
	$sQuerySEL = $sQuerySEL."From	PlyInf ";
 
	$rsQuery_Result = MyQuery($sQuerySEL, $cnMySQLConn);		
	$iNumber_rows = mysql_num_rows($rsQuery_Result);
	$iNumber_fields = mysql_num_fields($rsQuery_Result);
		
	if ($iNumber_rows > 0){    
		while($aRsPlyInf = mysql_fetch_array($rsQuery_Result)){  
			$sRetPlayerCode = trim($aRsPlyInf[PlyCod]);
			$sRetPlayerName = trim($aRsPlyInf[PlyFstNam])."  ".trim($aRsPlyInf[PlyFamNam]);
			$sRetPlayerPicture = trim($aRsPlyInf[PlyPicPth]);
?>			
			
  <tr>
    <td><?php echo $sRetPlayerCode; ?></td>
    <td><?php echo $sRetPlayerName; ?></td>
    <td><img src="<?php echo $sRetPlayerPicture; ?>" width="100" height="150" /> </td>
    <td><a href="javascript:ViewPlayer('<?php echo $sRetPlayerCode; ?>')"><img src="images/View.png" width="77" height="61" border="0" name="generate" align="middle"></a></td>
  </tr>

<?php			
		}
	}
	Else{
				
	}
 
	FreeResult($rsQuery_Result);
	CloseConn($cnMySQLConn);

?>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td><a href="javascript:GoBackToMainPage()"><img src="images/Back.png" width="76" height="61" border="0" name="generate" align="middle"></a></td>
  </tr>
</table>
<input type="hidden" name="PrmPlyCod" >
</form>
</body>
</html>