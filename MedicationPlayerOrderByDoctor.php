<?php
	session_start();
	
	include ("includes/WebConnDB.inc");
	include ("includes/WebQuery.inc");
	include ("includes/WebFunc.inc");	
	
	$iRegNum = $_SESSION['ArrResult'][0]['PwlSeqNum'];	
	
	$CurrentDate = date("Ymd");
	$CurrentDateTime = date("YmdHi");
	$DisplayCurrentDateTime = date("jS M Y H:i:s");
	$DisplayGenerateDate = date("jS M Y", strtotime($CurrentDate));	

	$MySql_QuerySel_PodInf_MED = " Select * From PodInf Where PodPwlNum = $iRegNum And PodCat = 'MED' Order By PodSeq";	
	//echo $MySql_QuerySel_PodInf_MED . "<br>";	    //min-width: 150px;
	
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
        <link href="css/main-medication-order.css" rel="stylesheet" type="text/css" />
        
        <script type="text/javascript" src="js/jquery-2.1.0.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.0.min.map"></script>

		<script type="text/javascript">
			function Popup(URL){
				var params = [
					'height='+screen.height,
					'width='+screen.width,
					'fullscreen=yes', // only works in IE, but here for completeness
					'directories=no',
					'titlebar=no',
					'toolbar=no',
					'location=no',
					'status=no',
					'menubar=no',
					'scrollbars=no',
					'resizable=no',
					'minimizable=no',
					'dialog=yes'
				].join(',');				
				var PopupNewWin = window.open(URL,"NewOrder", params);
				PopupNewWin.moveTo(0,0);
				PopupNewWin.focus();
			}		
		</script>

		<script>
            $("#player-order-tab").tabs({heightStyle: "fill"});
			$(".add-new-order").click(addNewOrder);			
		</script>	
    </head>
    
    
    <body>
    	<form name="OrderBydoctor" id="OrderBydoctor">
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
                            <table id="table-pha">
                                <tr>
                                    <th width="16px">&nbsp;</th>
                                    <th width="350" class="order-table-cell-header">Name</th>
                                    <th width="50" class="order-table-cell-header">Quantity</th>
                                    <th width="650" class="order-table-cell-header">Usage</th>
                                </tr>
<?php
	if ($MySql_number_rows > 0){		//   If exist recordset - $MySql_number_rows
		while($aRsPodInf = mysql_fetch_array($MySql_Result)){   //  While Loop $aRsPwlInf
?>
			<tr>
            	<td></td>
            	<td><?=$aRsPodInf['PodNam'];?></td>
                <td><?=$aRsPodInf['PodQty'];?></td>
                <td><?=$aRsPodInf['PodUsg'];?></td>
			</tr>
<?php
		}
	}
	unset($aRsPodInf);
	FreeResult($MySql_Result);	
	// TestPopup		MedicationPlayerNewOrder
?>
                            </table>
                            <br/>
                            <div id="add-pha-order" class="add-new-order">
                            	<a href="javascript:Popup('MedicationPlayerNewOrder.php?PrmOdrTyp=MED')" rel="0" class="PopupWindow" id="PopupWindow" ><img src="images/add.png" name="AddNew" id="AddNew"/><span style="margin-left: 5px;">Add New</a></span>
                            </div>
                        </div>
                        <div id="tabs-lab">
                            <table id="table-lab">
                                <tr>
                                    <th width="16px">&nbsp;</th>
                                    <th width="350" class="order-table-cell-header">Name</th>
                                    <th width="50" class="order-table-cell-header">Quantity</th>
                                    <th width="650" class="order-table-cell-header">Comment</th>
                                </tr>
<?php
	$MySql_QuerySel_PodInf_LAB = " Select * From PodInf Where PodPwlNum = $iRegNum And PodCat = 'LAB' Order By PodSeq";	
	// echo $MySql_QuerySel_PodInf_LAB . "<br>";	
	$MySql_Result = mysql_query($MySql_QuerySel_PodInf_LAB, $MySqlConn);
	$MySql_number_rows = mysql_num_rows($MySql_Result);
	if ($MySql_number_rows > 0){		//   If exist recordset - $MySql_number_rows
		while($aRsPodInf = mysql_fetch_array($MySql_Result)){   //  While Loop $aRsPwlInf
?>
			<tr>
            	<td></td>
            	<td><?=$aRsPodInf['PodNam'];?></td>
                <td><?=$aRsPodInf['PodQty'];?></td>
                <td><?=$aRsPodInf['PodUsg'];?></td>
			</tr>
<?php
		}
	}
	unset($aRsPodInf);
	FreeResult($MySql_Result);	
?>                                
                            </table>
                            <br/>
                            <div id="add-lab-order" class="add-new-order">
                            	<a href="javascript:Popup('MedicationPlayerNewOrder.php?PrmOdrTyp=LAB')" rel="0" class="PopupWindow" id="PopupWindow" ><img src="images/add.png" name="AddNew" id="AddNew"/><span style="margin-left: 5px;">Add New</a></span>
                            </div>
                        </div>
                        <div id="tabs-xray">
                            <table id="table-xray">
                                <tr>
                                    <th width="16px">&nbsp;</th>
                                    <th width="350" class="order-table-cell-header">Name</th>
                                    <th width="50" class="order-table-cell-header">Quantity</th>
                                    <th width="650" class="order-table-cell-header">Comment</th>
                                </tr>
<?php
	$MySql_QuerySel_PodInf_XRAY = " Select * From PodInf Where PodPwlNum = $iRegNum And PodCat = 'XRAY' Order By PodSeq";	
	// echo $MySql_QuerySel_PodInf_XRAY . "<br>";	
	$MySql_Result = mysql_query($MySql_QuerySel_PodInf_XRAY, $MySqlConn);
	$MySql_number_rows = mysql_num_rows($MySql_Result);
	if ($MySql_number_rows > 0){		//   If exist recordset - $MySql_number_rows
		while($aRsPodInf = mysql_fetch_array($MySql_Result)){   //  While Loop $aRsPwlInf
?>
			<tr>
            	<td></td>
            	<td><?=$aRsPodInf['PodNam'];?></td>
                <td><?=$aRsPodInf['PodQty'];?></td>
                <td><?=$aRsPodInf['PodUsg'];?></td>
			</tr>
<?php
		}
	}
	unset($aRsPodInf);
	FreeResult($MySql_Result);	
?>                                    
                            </table>
                            <br/>
                            <div id="add-xray-order" class="add-new-order">
                            	<a href="javascript:Popup('MedicationPlayerNewOrder.php?PrmOdrTyp=XRAY')" rel="0" class="PopupWindow" id="PopupWindow" ><img src="images/add.png" name="AddNew" id="AddNew"/><span style="margin-left: 5px;">Add New</a></span>
                            </div>
                        </div>
                        <div id="tabs-pt">
                            <table id="table-pt">
                                <tr>
                                    <th width="16px">&nbsp;</th>
                                    <th width="350" class="order-table-cell-header">Name</th>
                                    <th width="50" class="order-table-cell-header">Quantity</th>
                                    <th width="650" class="order-table-cell-header">Comment</th>
                                </tr>
<?php
	$MySql_QuerySel_PodInf_PHY = " Select * From PodInf Where PodPwlNum = $iRegNum And PodCat = 'PHY' Order By PodSeq";	
	// echo $MySql_QuerySel_PodInf_PHY . "<br>";	
	$MySql_Result = mysql_query($MySql_QuerySel_PodInf_PHY, $MySqlConn);
	$MySql_number_rows = mysql_num_rows($MySql_Result);
	if ($MySql_number_rows > 0){		//   If exist recordset - $MySql_number_rows
		while($aRsPodInf = mysql_fetch_array($MySql_Result)){   //  While Loop $aRsPwlInf
?>
			<tr>
            	<td></td>
            	<td><?=$aRsPodInf['PodNam'];?></td>
                <td><?=$aRsPodInf['PodQty'];?></td>
                <td><?=$aRsPodInf['PodUsg'];?></td>
			</tr>
<?php
		}
	}
	unset($aRsPodInf);
	FreeResult($MySql_Result);	
	CloseConn($MySqlConn);
?>                                
                            </table>
                            <br/>
                            <div id="add-pt-order" class="add-new-order">
                            	<a href="javascript:Popup('MedicationPlayerNewOrder.php?PrmOdrTyp=PHY')" rel="0" class="PopupWindow" id="PopupWindow" ><img src="images/add.png" name="AddNew" id="AddNew"/><span style="margin-left: 5px;">Add New</a></span>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
	</form>
    </body>
</html>
        
