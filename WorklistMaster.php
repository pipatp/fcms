<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/jquerystyle.css" />
	<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="js/FlexibleSlide/jquery.accordion.js"></script>
	<script type="text/javascript" src="js/FlexibleSlide/jquery.easing.1.3.js"></script>
<title></title>

<script type="text/javascript">

	$(function() {
			$('#st-accordion').accordion({
				oneOpenedItem	: true
			});	
	});

	function SaveWorklist(){
		window.CreateWorkList.action = "SelectedWorklist.php"; 
		window.CreateWorkList.method = "post";
		window.CreateWorkList.target = "ShowFrame";
		window.CreateWorkList.submit();
	}

</script>

</head>

<body>
<form name="CreateWorkList" class="CreateWorkList" action="" method="">
<H3>Player List</H3>
<select name="Player" id="Player" size="10">

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
			$sRetPlayerName = trim($aRsPlyInf[PlyFstNam]) . "  " . trim($aRsPlyInf[PlyFamNam]);
?>			
	<option value="<?php echo $sRetPlayerCode; ?>"><?php echo $sRetPlayerName; ?></option>
<?php
		}
	}
	Else{
?>			
	<option value="0">- No Player -</option>
<?php
	}
 
	FreeResult($rsQuery_Result);
	CloseConn($cnMySQLConn);

?>
</select>
	<br>
<H3>Fitness List</H3>
<select name="Fitness" id="Fitness" size="5">

<?php
	$cnMySQLConn  = OpenConn($MySqlconnect,$MySqlusername,$MySqlpassword);
	if(! $cnMySQLConn)
		die("Cannot connect to MySQL");
		
	$sDBName = "chainatfc";
	SelectDb($sDBName, $cnMySQLConn);
	$sQuerySEL = "   Select  * ";
	$sQuerySEL = $sQuerySEL."From	OdrMst ";
	$sQuerySEL = $sQuerySEL."where OdrCatTyp = 'FIT' ";
	$sQuerySEL = $sQuerySEL."And OdrCurStt = 'A' ";
	$sQuerySEL = $sQuerySEL."And '20131215' between OdrCreDte And OdrExpDte ";
 
	$rsQuery_Result = MyQuery($sQuerySEL, $cnMySQLConn);		
	$iNumber_rows = mysql_num_rows($rsQuery_Result);
	$iNumber_fields = mysql_num_fields($rsQuery_Result);
		
	if ($iNumber_rows > 0){    
		while($aRsOdrMst = mysql_fetch_array($rsQuery_Result)){  
			$sRetOrderCode = trim($aRsOdrMst[OdrCod]);
			$sRetOrderName = trim($aRsOdrMst[OdrLocNam]);
?>			
	<option value="<?php echo $sRetOrderCode; ?>"><?php echo $sRetOrderName; ?></option>
<?php
		}
	}
	Else{
?>			
	<option value="0">- No Fitness Data -</option>
<?php
	}
 
	FreeResult($rsQuery_Result);
	CloseConn($cnMySQLConn);

?>
</select>
	<br>
<H3>Nutrition List</H3>
<select name="Nutrition" id="Nutrition" size="5">

<?php
	$cnMySQLConn  = OpenConn($MySqlconnect,$MySqlusername,$MySqlpassword);
	if(! $cnMySQLConn)
		die("Cannot connect to MySQL");
		
	$sDBName = "chainatfc";
	SelectDb($sDBName, $cnMySQLConn);
	$sQuerySEL = "   Select  * ";
	$sQuerySEL = $sQuerySEL."From	OdrMst ";
	$sQuerySEL = $sQuerySEL."where OdrCatTyp = 'NUT' ";
	$sQuerySEL = $sQuerySEL."And OdrCurStt = 'A' ";
	$sQuerySEL = $sQuerySEL."And '20131215' between OdrCreDte And OdrExpDte ";
 
	$rsQuery_Result = MyQuery($sQuerySEL, $cnMySQLConn);		
	$iNumber_rows = mysql_num_rows($rsQuery_Result);
	$iNumber_fields = mysql_num_fields($rsQuery_Result);
		
	if ($iNumber_rows > 0){    
		while($aRsOdrMst = mysql_fetch_array($rsQuery_Result)){  
			$sRetOrderCode = trim($aRsOdrMst[OdrCod]);
			$sRetOrderName = trim($aRsOdrMst[OdrLocNam]);
?>			
	<option value="<?php echo $sRetOrderCode; ?>"><?php echo $sRetOrderName; ?></option>
<?php
		}
	}
	Else{
?>			
	<option value="0">- No Nutrition Data -</option>
<?php
	}
 
	FreeResult($rsQuery_Result);
	CloseConn($cnMySQLConn);

?>
</select>
	<br>
<H3>Physical Therapy List</H3>
<select name="PhysicalTherapy" id="PhysicalTherapy" size="5">

<?php
	$cnMySQLConn  = OpenConn($MySqlconnect,$MySqlusername,$MySqlpassword);
	if(! $cnMySQLConn)
		die("Cannot connect to MySQL");
		
	$sDBName = "chainatfc";
	SelectDb($sDBName, $cnMySQLConn);
	$sQuerySEL = "   Select  * ";
	$sQuerySEL = $sQuerySEL."From	OdrMst ";
	$sQuerySEL = $sQuerySEL."where OdrCatTyp = 'PHY' ";
	$sQuerySEL = $sQuerySEL."And OdrCurStt = 'A' ";
	$sQuerySEL = $sQuerySEL."And '20131215' between OdrCreDte And OdrExpDte ";
 
	$rsQuery_Result = MyQuery($sQuerySEL, $cnMySQLConn);		
	$iNumber_rows = mysql_num_rows($rsQuery_Result);
	$iNumber_fields = mysql_num_fields($rsQuery_Result);
		
	if ($iNumber_rows > 0){    
		while($aRsOdrMst = mysql_fetch_array($rsQuery_Result)){  
			$sRetOrderCode = trim($aRsOdrMst[OdrCod]);
			$sRetOrderName = trim($aRsOdrMst[OdrLocNam]);
?>			
	<option value="<?php echo $sRetOrderCode; ?>"><?php echo $sRetOrderName; ?></option>
<?php
		}
	}
	Else{
?>			
	<option value="0">- No Physical Therapy Data -</option>
<?php
	}
 
	FreeResult($rsQuery_Result);
	CloseConn($cnMySQLConn);

?>
</select>
	<br><br>
    
	<a href="javascript:SaveWorklist()"><img src="images/Save.png" align="middle" /></a>
</form>
</body>
</html>

