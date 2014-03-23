<?php 

	$MySqlconnect = "5TH-ELEMENT";
	$MySqlusername = "cnadmin";
	$MySqlpassword = "admin#1234";
	$MySqldatabase = "chainatfc";
	$Gbl_MySql_Result;
	$aRsGbl_MySql_Result;

	Function OpenConn($MySqlconnect, $MySqlusername, $MySqlpassword){
		$idMySqlCon = mysql_connect($MySqlconnect, $MySqlusername, $MySqlpassword) or die ("Cannot connect to server");
		return($idMySqlCon);
    }
	
	Function CloseConn($idCloseConn){
		mysql_close($idCloseConn);
	}

	Function SelectDb($dbName, $dbConnection){
		mysql_select_db($dbName, $dbConnection);
	}
	
    Function MyQuery($MySqlquery, $dbConnection){
		$idMySqlQuery = mysql_query($MySqlquery, $dbConnection);
		return($idMySqlQuery);
	}
	
    Function Result($result, $RowNumber, $FieldName){
		$r = mysql_result($result, $RowNumber, $FieldName);
	}

        // free result memory
   	Function FreeResult($result){
		$r = mysql_free_result($result);
	}
	
        // get number of rows in result
    Function RowsNumber($result){
    		$r = mysql_num_rows($result);
    }	

	
?> 