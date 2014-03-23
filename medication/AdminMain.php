<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>CHAINAT Football Club</title>
        <link rel="stylesheet" type="text/css" href="css/StyleMain.css" />
        
		<SCRIPT LANGUAGE="JavaScript">
        <!--
        
            function PlayerList() {
                window.AdminMain.action = "PlayerList.php"; 
                window.AdminMain.method = "post";
                window.AdminMain.target = "_self";
                window.AdminMain.submit();
            }
        
            function WorkList() {
                window.AdminMain.action = "MainWorklist.html"; 
                window.AdminMain.method = "post";
                window.AdminMain.target = "_self";
                window.AdminMain.submit();				
            }

			function Logout() {
				window.AdminMain.action = "Main.html"; 
				window.AdminMain.method = "post";
				window.AdminMain.target = "_self";
				window.AdminMain.submit();				
			}
				
        //-->
        </SCRIPT>        
        
    </head>
    <body>
    	<form name="AdminMain" id="AdminMain">
        <br><br><br>
		<table id="tblTop">
			<tr><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td><img src="images/CNFCLogo.jpg" align="middle" /></td><td></td><td></td></tr>
			<tr><td></td><td></td><td></td><td></td><td></td></tr>
		</table>
        <br><br><br>
        <table id="tblMid">
        	<tr><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td width="300"></td><td width="150"><a href="javascript:PlayerList()"><img src="images/PlayerList.png" align="middle" /></a></td><td width="150"><a href="javascript:WorkList()"><img src="images/Worklist.png" align="middle" /></a></td><td width="150"><a href="javascript:Logout()"><img src="images/Logout.png" align="middle" /></a></td><td width="300"></td></tr>
        </table>
        </form>
    </body>
</html>