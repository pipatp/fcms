<?php
	session_start();
	include ("includes/WebConnDB.inc");
	$UserID = $_POST['userid'];
	$UserPwd = $_POST['password'];
	
        $cnMySQLConn  = OpenConn($MySqlconnect,$MySqlusername,$MySqlpassword);
        if(! $cnMySQLConn)
        	die("Cannot connect to MySQL");
        	
        $sDBName = "chainatfc";
        SelectDb($sDBName, $cnMySQLConn);
        $sQuerySEL = "   Select  * ";
        $sQuerySEL = $sQuerySEL."From	UsrMst ";
        $sQuerySEL = $sQuerySEL."Where	UsrCod = '$UserID' ";
        $sQuerySEL = $sQuerySEL."And	UsrLogPwd = '$UserPwd'	Limit 1";	 
	 
        $rsQuery_Result = MyQuery($sQuerySEL, $cnMySQLConn);		
        $iNumber_rows = mysql_num_rows($rsQuery_Result);
        $iNumber_fields = mysql_num_fields($rsQuery_Result);
        	
        if ($iNumber_rows > 0){    
        	while($aRsUsrMst = mysql_fetch_array($rsQuery_Result)){  
				$sRetRsVal = trim($aRsUsrMst[UsrFstNam])."  ".trim($aRsUsrMst[UsrFamNam]);
				//$_SESSION['UserName_Log'] = $sRetRsVal;
				session_register("UserId_Log");
				session_register("UserName_Log");
				$_SESSION['UserId_Log'] = $UserID;
				$_SESSION['UserName_Log'] = $sRetRsVal;
				//echo "Pass";
				//$data['success'] = true;
				echo "<meta http-equiv='refresh' content='1;url=AdminMain.php'>";
			}
        }
        Else{
			$_SESSION['UserName_Log'] = '';
			//Delete_Session();
				//echo "Fail";
                //$data['success'] = false;
                //$data['message'] = "You can't access";
				echo "<meta http-equiv='refresh' content='1;url=Login.php'>";			
        }
	 
        FreeResult($rsQuery_Result);
        CloseConn($cnMySQLConn);

?>
