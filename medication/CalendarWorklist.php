<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="css/jquery.datepick.css">
<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="js/jquery-2.0.3.js"></script>	
<script type="text/javascript" src="js/jquery.datepick.js"></script>
<link rel="stylesheet" type="text/css" href="css/StyleMain.css" />
<link rel="stylesheet" type="text/css" href="css/StyleMenu.css" />


<script type="text/javascript">

	$(function() {
		$('#CalenPicker').datepick({ 
			dateFormat: 'dd/mm/yyyy',
			onSelect: function (dateText, inst) {
			$('#CalendarWL').submit();
			}
		});	
	});

	function Worklistinfo() {
		window.CalendarWL.action = "PlayerWorklist.php"; 
		window.CalendarWL.method = "post";
		window.CalendarWL.target = "mainFrame";
		window.CalendarWL.submit();
	}

	function CreateWorklist() {
		window.CalendarWL.action = "CreateWorklist.html"; 
		window.CalendarWL.method = "post";
		window.CalendarWL.target = "mainFrame";
		window.CalendarWL.submit();
	}

</script>

</head>

<body>
<form name="CalendarWL" id="CalendarWL">
<?php 
	//$CurrentDate=getdate();
	$sCurrentDate = date("Ymd");
	$sSelectYear = substr($sCurrentDate, 0, 4);
	$sSelectMonth = substr($sCurrentDate, 4, 2);
	$sSelectDay = substr($sCurrentDate, 6, 2);
	$sSelectDate = $sSelectDay . "/" . $sSelectMonth . "/" . $sSelectYear;
?> 
    <table id="tblCalTop" align="center">
        <tr><td><img src="images/CNFCLogo.jpg" align="middle" /></td></tr>
        <tr><td height="20"></td></tr>
        <tr><td><input type="text" name="CalenPicker" id="CalenPicker" value="<?php echo $sSelectDate; ?>" /></td></tr>
    </table>

<ul class="nav">
<li><a href="javascript:Worklistinfo()">Worklist</a></li>
<li><a href="javascript:CreateWorklist()">Create</a></li>
<li><a href="AdminMain.php" target="_parent">Back</a></li>
<li><a href="Main.html" target="_parent">Logout</a></li>
</ul>
    
</form>
</body>
</html>