<?php
	session_start();
	
	include ("includes/WebConnDB.inc");
	include ("includes/WebQuery.inc");
	include ("includes/WebFunc.inc");	
	
	$iRegNum = $_SESSION['ArrResult'][0]['PwlSeqNum'];	
	$sPlyCod = $_SESSION['ArrResult'][0]['PwlPlyCod'];
	
	$CurrentDate = date("Ymd");
	$CurrentDateTime = date("YmdHi");
	$DisplayCurrentDateTime = date("jS M Y H:i:s");
	$DisplayGenerateDate = date("jS M Y", strtotime($CurrentDate));	

	$MySql_QuerySel_PodInf_MED = " select * from Podinf, pwlinf where PodPwlNum = PwlSeqNum ";	
	$MySql_QuerySel_PodInf_MED .= " And PwlPlyCod = '$sPlyCod' And PodStt = 'O' ";
	$MySql_QuerySel_PodInf_MED .= " And PodCat = 'MED' Order by PwlVstDtm DESC, PodSeq; ";
	// echo $MySql_QuerySel_PodInf_MED . "<br>";	    min-width: 150px;
	
	$MySqlConn  = OpenConn($MySqlconnect, $MySqlusername, $MySqlpassword);
	mysql_select_db($MySqldatabase, $MySqlConn) or die ("Cannot select database");
	mysql_query("SET NAMES TIS620");									
	$MySql_Result = mysql_query($MySql_QuerySel_PodInf_MED, $MySqlConn);
	$MySql_number_rows = mysql_num_rows($MySql_Result);
	
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title></title>
        
        <link href="css/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
        <link href="css/main-medication-orderhistory.css" rel="stylesheet" type="text/css" />
        
        <script type="text/javascript" src="js/jquery-2.1.0.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.0.min.map"></script>

		<script>
            $("#player-order-tab").tabs({heightStyle: "fill"});
		</script>	
    </head>
    
    
    <body>
        <table width="100%" height="100%">
            <tr>
                <td valign="top">
                    <div id="player-order-tab">
                        <ul>
                            <li><a href="#tabs-pha">PHA</a></li>
                            <li><a href="#tabs-lab">LAB</a></li>
                            <li><a href="#tabs-xray">X-Ray</a></li>
                            <li><a href="#tabs-pt">PT</a></li>
                        </ul>
                        <div id="tabs-pha">
                            <table id="OrderMedHistory" class="content-table" border="1" cellspacing="0" cellpadding="0" bgcolor="#FFCCFF">
                                <tr>
                                    <th width="100" >Order Date</th>
                                    <th width="200" >Name</th>
                                    <th width="20" >Qty</th>
                                    <th width="400" >Usage</th>
                                    <th width="200" >Comment</th>
                                </tr>
<?php
	if ($MySql_number_rows > 0){		//   If exist recordset - $MySql_number_rows
		while($aRsPodInf = mysql_fetch_array($MySql_Result)){   //  While Loop $aRsPwlInf
			$DisplayDate = date("d/m/Y", strtotime($aRsPodInf['PodOdrDts']));
?>
			<tr>
            	<td><?=$DisplayDate;?></td>
            	<td><?=$aRsPodInf['PodNam'];?></td>
                <td><?=$aRsPodInf['PodQty'];?></td>
                <td><?=$aRsPodInf['PodUsg'];?></td>
                <td><?=$aRsPodInf['PodCmt'];?></td>
			</tr>
<?php
		}
	}
	unset($aRsPodInf);
	FreeResult($MySql_Result);	
	// TestPopup		MedicationPlayerNewOrder
?>
                            </table>
                        </div>
                        <div id="tabs-lab">
                            <table id="OrderLabHistory" class="content-table" border="1" cellspacing="0" cellpadding="0" bgcolor="#FFCCFF">
                                <tr>
                                    <th width="100" >Order Date</th>
                                    <th width="200" >Name</th>
                                    <th width="20" >Qty</th>
                                    <th width="400" >Comment</th>
                                </tr>
<?php
	$MySql_QuerySel_PodInf_LAB = " select * from Podinf, pwlinf where PodPwlNum = PwlSeqNum ";	
	$MySql_QuerySel_PodInf_LAB .= " And PwlPlyCod = '$sPlyCod' And PodStt = 'O' ";
	$MySql_QuerySel_PodInf_LAB .= " And PodCat = 'LAB' Order by PwlVstDtm DESC, PodSeq; ";
	// echo $MySql_QuerySel_PodInf_LAB . "<br>";	
	$MySql_Result = mysql_query($MySql_QuerySel_PodInf_LAB, $MySqlConn);
	$MySql_number_rows = mysql_num_rows($MySql_Result);
	if ($MySql_number_rows > 0){		//   If exist recordset - $MySql_number_rows
		while($aRsPodInf = mysql_fetch_array($MySql_Result)){   //  While Loop $aRsPwlInf
			$DisplayDate = date("d/m/Y", strtotime($aRsPodInf['PodOdrDts']));
?>
			<tr>
            	<td><?=$DisplayDate;?></td>
            	<td><?=$aRsPodInf['PodNam'];?></td>
                <td><?=$aRsPodInf['PodQty'];?></td>
                <td><?=$aRsPodInf['PodCmt'];?></td>
			</tr>
<?php
		}
	}
	unset($aRsPodInf);
	FreeResult($MySql_Result);	
?>                                
                            </table>
                        </div>
                        <div id="tabs-xray">
                            <table id="OrderXrayHistory" class="content-table" border="1" cellspacing="0" cellpadding="0" bgcolor="#FFCCFF">
                                <tr>
                                    <th width="100" >Order Date</th>
                                    <th width="200" >Name</th>
                                    <th width="20" >Qty</th>
                                    <th width="400" >Comment</th>
                                </tr>
<?php
	$MySql_QuerySel_PodInf_XRAY = " select * from Podinf, pwlinf where PodPwlNum = PwlSeqNum ";	
	$MySql_QuerySel_PodInf_XRAY .= " And PwlPlyCod = '$sPlyCod' And PodStt = 'O' ";
	$MySql_QuerySel_PodInf_XRAY .= " And PodCat = 'XRAY' Order by PwlVstDtm DESC, PodSeq; ";
	// echo $MySql_QuerySel_PodInf_XRAY . "<br>";	
	$MySql_Result = mysql_query($MySql_QuerySel_PodInf_XRAY, $MySqlConn);
	$MySql_number_rows = mysql_num_rows($MySql_Result);
	if ($MySql_number_rows > 0){		//   If exist recordset - $MySql_number_rows
		while($aRsPodInf = mysql_fetch_array($MySql_Result)){   //  While Loop $aRsPwlInf
			$DisplayDate = date("d/m/Y", strtotime($aRsPodInf['PodOdrDts']));
?>
			<tr>
            	<td><?=$DisplayDate;?></td>
            	<td><?=$aRsPodInf['PodNam'];?></td>
                <td><?=$aRsPodInf['PodQty'];?></td>
                <td><?=$aRsPodInf['PodCmt'];?></td>
			</tr>
<?php
		}
	}
	unset($aRsPodInf);
	FreeResult($MySql_Result);	
?>                                    
                            </table>
                        </div>
                        <div id="tabs-pt">
                            <table id="OrderPhyHistory" class="content-table" border="1" cellspacing="0" cellpadding="0" bgcolor="#FFCCFF">
                                <tr>
                                    <th width="100" >Order Date</th>
                                    <th width="200" >Name</th>
                                    <th width="20" >Qty</th>
                                    <th width="400" >Comment</th>
                                </tr>
<?php
	$MySql_QuerySel_PodInf_PHY = " select * from Podinf, pwlinf where PodPwlNum = PwlSeqNum ";	
	$MySql_QuerySel_PodInf_PHY .= " And PwlPlyCod = '$sPlyCod' And PodStt = 'O' ";
	$MySql_QuerySel_PodInf_PHY .= " And PodCat = 'PHY' Order by PwlVstDtm DESC, PodSeq; ";
	// echo $MySql_QuerySel_PodInf_PHY . "<br>";	
	$MySql_Result = mysql_query($MySql_QuerySel_PodInf_PHY, $MySqlConn);
	$MySql_number_rows = mysql_num_rows($MySql_Result);
	if ($MySql_number_rows > 0){		//   If exist recordset - $MySql_number_rows
		while($aRsPodInf = mysql_fetch_array($MySql_Result)){   //  While Loop $aRsPwlInf
			$DisplayDate = date("d/m/Y", strtotime($aRsPodInf['PodOdrDts']));
?>
			<tr>
            	<td><?=$DisplayDate;?></td>
            	<td><?=$aRsPodInf['PodNam'];?></td>
                <td><?=$aRsPodInf['PodQty'];?></td>
                <td><?=$aRsPodInf['PodCmt'];?></td>
			</tr>
<?php
		}
	}
	unset($aRsPodInf);
	FreeResult($MySql_Result);	
	CloseConn($MySqlConn);
?>                                
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

    </body>
</html>