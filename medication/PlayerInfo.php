<?php  
	include ("includes/WebConnDB.inc");
	// echo $PrmPlyCod;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Player Information</title>

<link rel="stylesheet" type="text/css" href="css/jquery.datepick.css">
<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="js/jquery-2.0.3.js"></script>	
<script type="text/javascript" src="js/jquery.datepick.js"></script>

<script type="text/javascript">

	$(function(){
		$('#PlyBirDte').datepick({ 
			dateFormat: 'dd/mm/yyyy'
		});
		$('#PlyCreDte').datepick({ 
			dateFormat: 'dd/mm/yyyy'
		});
		$('#PlyExpDte').datepick({ 
			dateFormat: 'dd/mm/yyyy'
		});				
	});

 	function GoBackToMainPage() {
  		window.PlayerInfo.action = "PlayerList.php"; 
  		window.PlayerInfo.method = "post";
  		window.PlayerInfo.target = "self";
  		window.PlayerInfo.submit();				
	}	
	
</script>	

</head>

<body>
<form action="PlayerSave.php" method="post" name="PlayerInfo" id="PlayerInfo">
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
			$sRetPlayerFirstName = trim($aRsPlyInf[PlyFstNam]);
			$sRetPlayerMiddleName = trim($aRsPlyInf[PlyMidNam]);
			$sRetPlayerFamilyName = trim($aRsPlyInf[PlyFamNam]);
			$sRetPlayerTitleName = trim($aRsPlyInf[PlyTitCod]);
			$sRetPlayerFirstEng = trim($aRsPlyInf[PlyFstEng]);
			$sRetPlayerMiddleEng = trim($aRsPlyInf[PlyMidEng]);
			$sRetPlayerFamilyEng = trim($aRsPlyInf[PlyFamEng]);
			$sRetPlayerNationlity = trim($aRsPlyInf[PlyNatCod]);
			$sRetPlayerPersonalID = trim($aRsPlyInf[PlyPerNum]);
			$sRetPlayerBirthDate = trim($aRsPlyInf[PlyBirDte]);
			$sSelectYear = substr($sRetPlayerBirthDate, 0, 4);
			$sSelectMonth = substr($sRetPlayerBirthDate, 4, 2);
			$sSelectDay = substr($sRetPlayerBirthDate, 6, 2);
			$sSelectDate = $sSelectDay . "/" . $sSelectMonth . "/" . $sSelectYear;
			$sRetPlayerPicture = trim($aRsPlyInf[PlyPicPth]);
			$sRetPlayerAddressNum = trim($aRsPlyInf[PlyAddNum]);
			$sRetPlayerAddressDtl = trim($aRsPlyInf[PlyAddDtl]);
			$sRetPlayerCity = trim($aRsPlyInf[PlyAddCty]);
			$sRetPlayerProvince = trim($aRsPlyInf[PlyAddPrv]);
			$sRetPlayerZipcode = trim($aRsPlyInf[PlyAddZip]);
			$sRetPlayerCountry = trim($aRsPlyInf[PlyAddCot]);
			$sRetPlayerAddressNumEng = trim($aRsPlyInf[PlyNumEng]);
			$sRetPlayerAddressDtlEng = trim($aRsPlyInf[PlyDtlEng]);
			$sRetPlayerRegCod = trim($aRsPlyInf[PlyRegCod]);
			$sRetPlayerSexTyp = trim($aRsPlyInf[PlySexTyp]);
			$sRetPlayerPhnNum = trim($aRsPlyInf[PlyPhnNum]);
			$sRetPlayerMblNum = trim($aRsPlyInf[PlyMblNum]);
			$sRetPlayerContactPerson = trim($aRsPlyInf[PlyConPer]);
			$sRetPlayerContactPhone = trim($aRsPlyInf[PlyConPhn]);
			$sRetPlayerEmail = trim($aRsPlyInf[PlyEmlAdd]);
			$sRetPlayerCreateDate = trim($aRsPlyInf[PlyCreDte]);
			$sSelectYear = substr($sRetPlayerCreateDate, 0, 4);
			$sSelectMonth = substr($sRetPlayerCreateDate, 4, 2);
			$sSelectDay = substr($sRetPlayerCreateDate, 6, 2);
			$sCreateDate = $sSelectDay . "/" . $sSelectMonth . "/" . $sSelectYear;			
			$sRetPlayerExpireDate = trim($aRsPlyInf[PlyExpDte]);
			$sSelectYear = substr($sRetPlayerExpireDate, 0, 4);
			$sSelectMonth = substr($sRetPlayerExpireDate, 4, 2);
			$sSelectDay = substr($sRetPlayerExpireDate, 6, 2);
			$sExpireDate = $sSelectDay . "/" . $sSelectMonth . "/" . $sSelectYear;			
?>
  </p>
  <table width="579" border="0" cellspacing="2" cellpadding="2">
    <tr>
      <td><img src="<?php echo $sRetPlayerPicture; ?>" width="150" height="200" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="173">&nbsp;</td>
      <td width="173"><label for="PlyCod">Player Code</label></td>
      <td width="213"><input type="text" name="PlyCod" id="PlyCod" value="<?php echo $sRetPlayerCode; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyTitCod">Title Name</label></td>
      <td><select name="PlyTitCod" id="PlyTitCod">   
<?php    
	$sQuerySELCnf = "   Select  * ";
	$sQuerySELCnf = $sQuerySELCnf."From	CnfMst ";
	$sQuerySELCnf = $sQuerySELCnf."Where CnfGrpCod = 'TITCOD' Order by CnfSeqNum";
	
 	$rsQuery_ResultCnf = MyQuery($sQuerySELCnf, $cnMySQLConn);		
	$iNumber_rowsCnf = mysql_num_rows($rsQuery_ResultCnf);
	$iNumber_fieldsCnf = mysql_num_fields($rsQuery_ResultCnf);
		
	if ($iNumber_rowsCnf > 0){    
		while($aRsCnfMst = mysql_fetch_array($rsQuery_ResultCnf)){  
			$sRetCnfCode = trim($aRsCnfMst[CnfSubCod]);
			$sRetCnfName = trim($aRsCnfMst[CnfLocNam]);			
?>
			<option value="<?php echo $sRetCnfCode; ?>" 
            <?php 
			if($sRetCnfCode == $sRetPlayerTitleName){
			?>
            	selected
            <?php
			}
			?>
			>
			<?php echo $sRetCnfName; ?>
            </option>
<?php
		}
	}
	Else{
?>		
			<option value="0">-</option>
<?php
	}
 
	FreeResult($rsQuery_ResultCnf);
?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyFstNam">First Name</label></td>
      <td><input type="text" name="PlyFstNam" id="PlyFstNam" value="<?php echo $sRetPlayerFirstName; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyMidNam">Middle Name</label></td>
      <td><input type="text" name="PlyMidNam" id="PlyMidNam" value="<?php echo $sRetPlayerMiddleName; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyFamNam">Family Name</label></td>
      <td><input type="text" name="PlyFamNam" id="PlyFamNam" value="<?php echo $sRetPlayerFamilyName; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyFstEng">First Name (Englist)</label></td>
      <td><input type="text" name="PlyFstEng" id="PlyFstEng" value="<?php echo $sRetPlayerFirstEng; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyMidEng">Middle Name (English)</label></td>
      <td><input type="text" name="PlyMidEng" id="PlyMidEng" value="<?php echo $sRetPlayerMiddleEng; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyFamEng">Family Name (English)</label></td>
      <td><input type="text" name="PlyFamEng" id="PlyFamEng" value="<?php echo $sRetPlayerFamilyEng; ?>"></td>
    </tr>  
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyNatCod">Nationality</label></td>
      <td><select name="PlyNatCod" id="PlyNatCod">
<?php    
	$sQuerySELCnf = "   Select  * ";
	$sQuerySELCnf = $sQuerySELCnf."From	Cnfmst ";
	$sQuerySELCnf = $sQuerySELCnf."Where CnfGrpCod = 'NATCOD' Order by CnfSeqNum";
 
	$rsQuery_ResultCnf = MyQuery($sQuerySELCnf, $cnMySQLConn);		
	$iNumber_rowsCnf = mysql_num_rows($rsQuery_ResultCnf);
	$iNumber_fieldsCnf = mysql_num_fields($rsQuery_ResultCnf);
		
	if ($iNumber_rowsCnf > 0){    
		while($aRsCnfMst = mysql_fetch_array($rsQuery_ResultCnf)){  
			$sRetCnfCode = trim($aRsCnfMst[CnfSubCod]);
			$sRetCnfName = trim($aRsCnfMst[CnfLocNam]);
			
?>
			<option value="<?php echo $sRetCnfCode; ?>"
            <?php 
			if($sRetCnfCode == $sRetPlayerNationlity){
			?>
            	selected
            <?php
			}
			?>
			>			
			<?php echo $sRetCnfName; ?></option>
<?php
		}
	}
	Else{
?>		
			<option value="0">-</option>
<?php
	}
 
	FreeResult($rsQuery_ResultCnf);
?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyPerNum">Personal ID Card</label></td>
      <td><input type="text" name="PlyPerNum" id="PlyPerNum" value="<?php echo $sRetPlayerPersonalID; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyPasNum">Passport ID</label></td>
      <td><input type="text" name="PlyPasNum" id="PlyPasNum" value=""></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyBirDte">Birth Date</label></td>
      <td><input type="text" name="PlyBirDte" id="PlyBirDte" value="<?php echo $sSelectDate; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyAddNum">Address 1</label></td>
      <td><input type="text" name="PlyAddNum" id="PlyAddNum" value="<?php echo $sRetPlayerAddressNum; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyAddDtl">Address 2</label></td>
      <td><input type="text" name="PlyAddDtl" id="PlyAddDtl" value="<?php echo $sRetPlayerAddressDtl; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyAddCty">City</label></td>
      <td><input type="text" name="PlyAddCty" id="PlyAddCty" value="<?php echo $sRetPlayerCity; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyAddPrv">Province</label></td>
      <td><input type="text" name="PlyAddPrv" id="PlyAddPrv" value="<?php echo $sRetPlayerProvince; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyAddZip">Zipcode</label></td>
      <td><input type="text" name="PlyAddZip" id="PlyAddZip" value="<?php echo $sRetPlayerZipcode; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyAddCot">Country</label></td>
      <td><input type="text" name="PlyAddCot" id="PlyAddCot" value="<?php echo $sRetPlayerCountry; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyNumEng">Address Eng 1</label></td>
      <td><input type="text" name="PlyNumEng" id="PlyNumEng" value="<?php echo $sRetPlayerAddressNumEng; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyDtlEng">Address Eng 2</label></td>
      <td><input type="text" name="PlyDtlEng" id="PlyDtlEng" value="<?php echo $sRetPlayerAddressDtlEng; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyRegCod">Religion</label></td>
      <td><select name="PlyRegCod" id="PlyRegCod">
<?php    
	$sQuerySELCnf = "   Select  * ";
	$sQuerySELCnf = $sQuerySELCnf."From	Cnfmst ";
	$sQuerySELCnf = $sQuerySELCnf."Where CnfGrpCod = 'REGCOD' Order by CnfSeqNum";
 
	$rsQuery_ResultCnf = MyQuery($sQuerySELCnf, $cnMySQLConn);		
	$iNumber_rowsCnf = mysql_num_rows($rsQuery_ResultCnf);
	$iNumber_fieldsCnf = mysql_num_fields($rsQuery_ResultCnf);
		
	if ($iNumber_rowsCnf > 0){    
		while($aRsCnfMst = mysql_fetch_array($rsQuery_ResultCnf)){  
			$sRetCnfCode = trim($aRsCnfMst[CnfSubCod]);
			$sRetCnfName = trim($aRsCnfMst[CnfLocNam]);
			
?>
			<option value="<?php echo $sRetCnfCode; ?>"
            <?php 
			if($sRetCnfCode == $sRetPlayerRegCod){
			?>
            	selected
            <?php
			}
			?>
			>			
			<?php echo $sRetCnfName; ?></option>
<?php
		}
	}
	Else{
?>		
			<option value="0">-</option>
<?php
	}
 
	FreeResult($rsQuery_ResultCnf);
?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlySexTyp">Sex</label></td>
      <td><select name="PlySexTyp" id="PlySexTyp">
<?php    
	$sQuerySELCnf = "   Select  * ";
	$sQuerySELCnf = $sQuerySELCnf."From	Cnfmst ";
	$sQuerySELCnf = $sQuerySELCnf."Where CnfGrpCod = 'SEXTYP' Order by CnfSeqNum";
 
	$rsQuery_ResultCnf = MyQuery($sQuerySELCnf, $cnMySQLConn);		
	$iNumber_rowsCnf = mysql_num_rows($rsQuery_ResultCnf);
	$iNumber_fieldsCnf = mysql_num_fields($rsQuery_ResultCnf);
		
	if ($iNumber_rowsCnf > 0){    
		while($aRsCnfMst = mysql_fetch_array($rsQuery_ResultCnf)){  
			$sRetCnfCode = trim($aRsCnfMst[CnfSubCod]);
			$sRetCnfName = trim($aRsCnfMst[CnfLocNam]);
			
?>
			<option value="<?php echo $sRetCnfCode; ?>"
            <?php 
			if($sRetCnfCode == $sRetPlayerSexTyp){
			?>
            	selected
            <?php
			}
			?>
			>			
			<?php echo $sRetCnfName; ?></option>
<?php
		}
	}
	Else{
?>		
			<option value="0">-</option>
<?php
	}
 
	FreeResult($rsQuery_ResultCnf);
?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyPhnNum">Phone No.</label></td>
      <td><input type="text" name="PlyPhnNum" id="PlyPhnNum" value="<?php echo $sRetPlayerPhnNum; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyMblNum">Mobile No.</label></td>
      <td><input type="text" name="PlyMblNum" id="PlyMblNum" value="<?php echo $sRetPlayerMblNum; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyConPer">Contact Person</label></td>
      <td><input type="text" name="PlyConPer" id="PlyConPer" value="<?php echo $sRetPlayerContactPerson; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyConPhn">Contact Phone</label></td>
      <td><input type="text" name="PlyConPhn" id="PlyConPhn" value="<?php echo $sRetPlayerContactPhone; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyEmlAdd">Email</label></td>
      <td><input type="text" name="PlyEmlAdd" id="PlyEmlAdd" value="<?php echo $sRetPlayerEmail; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyCreDte">Create Date</label></td>
      <td><input type="text" name="PlyCreDte" id="PlyCreDte" value="<?php echo $sCreateDate; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="PlyExpDte">Expire Date</label></td>
      <td><input type="text" name="PlyExpDte" id="PlyExpDte" value="<?php echo $sExpireDate; ?>"></td>
    </tr>        
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td><a href="javascript:GoBackToMainPage()"><img src="images/Back.png" width="76" height="61" border="0" name="generate" align="middle"></a></td>
    </tr>            
  </table>
  <p>&nbsp;</p>
  <p>
    <?php			
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