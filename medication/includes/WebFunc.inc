<?php   
	
	function String_Left($str, $length) {
     		return substr($str, 0, $length);
	}

	function String_Right($str, $length) {
     		return substr($str, -$length);
	}


	function GetATCUsageArrayCode($sPrmUsgCod){
		global $Med_Iden_Server;

		$fnmysqlConn  = OpenConn($Med_Iden_Server, $GLOBALS['MySqlusername'], $GLOBALS['MySqlpassword']);	
		$fnDBName = "b_med_iden";
		mysql_select_db($fnDBName, $fnmysqlConn) or die ("Cannot select database");		
		
		$fnmysql_query = "   Select  * From	MdxInf   Where   BitUsgCod = Convert('$sPrmUsgCod', Binary) ";
		
		$fnmysql_result = mysql_query($fnmysql_query, $fnmysqlConn);		
		$fnnumber_rows = mysql_num_rows($fnmysql_result);
		if ($fnnumber_rows > 0){    
              		while($aRsMdxInf = mysql_fetch_array($fnmysql_result)){  
                        	$sRetAtcCod = trim($aRsMdxInf[BitAtcCod]);
              		}			
		}
		Else{
			$sRetAtcCod = '';
		}
		
		CloseConn($fnmysqlConn);
		return($sRetAtcCod);
	}		// End of  GetATCUsageArrayCode	

	
	function randNum($randomNum){ 
		srand(date("s"));
		$ranNum = rand() % $randomNum;
		return $ranNum;		
	}
	
	function randInt($NumLow,$NumHigh){ 
		srand(date("s"));
		$NumRange = $NumHigh - $NumLow;
		$num = (rand() % $NumRange) + $NumLow;
		return $num;
	}
	
	function randStr($StringLong){  
		srand(date("s"));
		for ($i = 0;$i < $StringLong;$i++){
			$ret_str .= chr((rand() % 26) + 97);
		}
		return $ret_str;
	}
	
	// seed with microseconds  
	//  (double)microtime()*1000000   
 	// (double)microtime()*1234567   

	function make_seed() {
	    list($usec, $sec) = explode(' ', (double)microtime());  
	    return (double) $sec + ((double) $usec * 1234567);  
	}
	
	function Delete_Session(){ 
		session_unset();
		session_destroy();
	}
	
	function ChkExtension(&$Lname,&$LType){
		switch($LType){
			case "H" : 
				if (strtoupper($Lname) != "HTML"){
					if(strtoupper($Lname) != "HTM"){
						Return $ChkPassed = False;
					}
					else{
						Return $ChkPassed = True;
					}
				}
				else{
					Return $ChkPassed = True;
				}
				break;
				
			case "V" :  
				if(strtoupper($Lname) != "ZIP"){
					Return $ChkPassed = False;
				}
				else{
					Return $ChkPassed = True;
				}
				break;
		}				
	}	
	
	function ChkFileType($ChkType){
		$ChkType = strtoupper($ChkType);
		switch($ChkType){
			case "EXE" :
				return $ChkPass = True;
				break;
			case "MPEG" :
				return $ChkPass = True;
				break;
			case "MPG" :
				return $ChkPass = True;
				break;
			case "MPA" :
				return $ChkPass = True;
				break;
			case "MPE" :
				return $ChkPass = True;
				break;
			case "AVI" :
				return $ChkPass = True;
				break;
			default :
				return $ChkPass = False;																																								
		}
	}	
	
	function ChkDBType($ChkType){
		$ChkType = strtoupper($ChkType);
		if($ChkType == "MDB"){
			return $ChkPass = True;
		}
		else{
			return $ChkPass = False;
		}
	}		
	
        #  STEP 1  ===>  Initialize variables
        function caiErrorHandler($errno, $errstr, $errfile, $errline) { 
        	global $error_msg;
        #  STEP 2  ===>   Error-dependent processing
        	switch($errno) { 
                
               		case E_USER_NOTICE: 
               		case E_NOTICE: 
                   		$type = "Notice"; 
                   		break; 
               		case E_USER_WARNING: 
               		case E_COMPILE_WARNING: 
               		case E_CORE_WARNING: 
               		case E_WARNING: 
                   		$type = "Warning"; 
                   		break; 
               		case E_USER_ERROR: 
               		case E_COMPILE_ERROR: 
               		case E_CORE_ERROR: 
               		case E_ERROR: 
                   		$type = "Fatal Error"; 
                   		break; 
               		case E_PARSE: 
                   		$type = "Parse Error"; 
                   		break; 
               		default: 
                    		$type = "Unknown Error"; 
                   		break; 
          	}
        
        #  STEP 3 ===> Notification and termination
        	#global $error_msg;
        	if($errno != 0){
        		if($error_msg == ""){
        		 	$error_msg = $errstr;
        		}
        		else{
        			$error_msg = $error_msg."#".$errstr; 
        		}
        	}
        } 	
?>
