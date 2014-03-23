<?php
	session_start();
	
	include ("includes/WebConnDB.inc");
	include ("includes/WebQuery.inc");
	include ("includes/WebFunc.inc");	
	//$sDspNam = $_SESSION['ArrResult'][0]['PlyFstNam'] . " " . $_SESSION['ArrResult'][0]['PlyFamNam'];	
	//echo $sDspNam;
	$sPlyCod = $_SESSION['ArrResult'][0]['PwlPlyCod'];
	$iRegNum = $_SESSION['ArrResult'][0]['PwlSeqNum'];
	$sVstDtm = $_SESSION['ArrResult'][0]['PwlVstDtm'];
	$sVstDtmSht = substr($sVstDtm, 0, 8);
	$MySql_QuerySel_PlvInf = " Select * From PlvInf Where PlvPwlNum = $iRegNum ";	
	$MySql_QuerySel_PlvInf .= " And PlvInpDts like '$sVstDtmSht%' Order By PlvSeqNum DESC ";

	$MySqlConn  = OpenConn($MySqlconnect, $MySqlusername, $MySqlpassword);
	mysql_select_db($MySqldatabase, $MySqlConn) or die ("Cannot select database");
	mysql_query("SET NAMES TIS620");									
	$MySql_Result = mysql_query($MySql_QuerySel_PlvInf, $MySqlConn);
	$MySql_number_rows = mysql_num_rows($MySql_Result);
	CloseConn($MySqlConn);	
	
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title></title>
        
        <link href="css/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
        <!--link href="css/main-medication-vitalsign.css" rel="stylesheet" type="text/css" /-->
        
        <script type="text/javascript" src="js/jquery-2.0.3.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>   

		<script>
        <!--
			$(function() {
				var width = 350;
				$("#vscomment").css({"width":width * 2});
				$("#vscomment").css({"height":50});
							
				$("#vsheight").focusout(function(e) {
                    var weightValue = $("#vsweight").val();
					var heightValue = $("#vsheight").val();
					var hValue = heightValue/100;
					var bmiValue = weightValue / (hValue * hValue);
					var newnumber = new Number(bmiValue+'').toFixed(parseInt(2));
					var newBMIValue = parseFloat(newnumber);
					$('#vsbmi').val(newBMIValue);
                });

				$('#vitalsignform').on('submit',function(e) {
					$.ajax({
						url:'MedicationPlayerVitalSignSave.php',
						data:$(this).serialize(),
						type:'POST',
						dataType:'html',
						success:function(data){
							//console.log(data);
							//$("#success").show().fadeOut(5000); //=== Show Success Message==
							//$('#VitalSignHistory').load("MedicationPlayerVitalSignRecord.php");
						},
						error:function(data){
							//$("#error").show().fadeOut(5000); //===Show Error Message====
							//$('#VitalSignHistory').load("MedicationPlayerVitalSignRecord.php");
						}
					});
					//e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
					
					//$('#Display-Table').html('Downloading...'); // Show "Downloading..."
					// Do an ajax request
					//$.ajax({
					  //url: "MedicationPlayerVitalSignRecord.php"
					//}).done(function(data) { // data what is sent back by the php page
					  //$('#Display-Table').html(data); // display data
					//});					
					
				});
				
			});

						   
        //-->
        </script>     

    </head>
    
    <body>
    	<form name="vitalsignform" id="vitalsignform">
    	<div id="VitalSignRecord">
            <table id="VitalSignRecordTable" class="content-table" border="1" cellspacing="0" cellpadding="0" bgcolor="#FFCCFF">
              <tr height="35">
                <td colspan="11">Measure Date/Time</td>
              </tr>        
              <tr height="35">
                <td width="100" align="right">Weight</td>
                <td width="50"><input type="text" id="vsweight" name="vsweight" size="4"></td>
                <td width="50">kg.</td>
                <td width="50"></td>
                <td width="100" align="right">Height</td>
                <td width="50"><input type="text" id="vsheight" name="vsheight" size="4"></td>
                <td width="50">cm.</td>
                <td width="50"></td>
                <td width="100" align="right">BMI</td>
                <td width="50"><input type="text" id="vsbmi" name="vsbmi" size="4"></td>
                <td width="50"></td>
              </tr>
              <tr height="35">
                <td>Temperature</td>
                <td><input type="text" id="vstemp" name="vstemp" size="4"></td>
                <td>C</td>
                <td></td>
                <td>Blood Pressure</td>
                <td><input type="text" id="vssys" name="vssys" size="4">/<input type="text" id="vsdia" name="vsdia" size="4"></td>
                <td colspan="6">mmHg</td>
              </tr>
              <tr height="35">
                <td>Pulse</td>
                <td><input type="text" id="vspulse" name="vspulse" size="4"></td>
                <td>/min</td>
                <td></td>
                <td>SpO2</td>
                <td><input type="text" id="vsspo2" name="vsspo2" size="4"></td>
                <td>% Saturation</td>
                <td></td>
                <td>Respiratory Rate</td>
                <td><input type="text" id="vsrr" name="vsrr" size="4"></td>
                <td>breaths/min</td>
              </tr>
              <tr height="60">
                <td colspan="10"><textarea id="vscomment" name="vscomment"></textarea></td>
                <td><input class="vssave" type="submit" value="Save" onClick="SaveVS()" /></td>
              </tr>          
            </table>
		</div>
<!--        
      <div class="buttons"> 
      	<span id="error" style="display:none; color:#F00">Some Error!Please Fill form Properly </span> 
        <span id="success" style="display:none; color:#0C0">All the records are submitted!</span>
      </div>        
-->      
        </form>
        <div id="VitalSignHistory">
            <table id="VitalSignHistoryTable" class="content-table" border="1" cellspacing="0" cellpadding="0" bgcolor="#FFCCFF">
                <tr>
                    <th width="50">Input Date/Time</th>
                    <th width="50">Weight</th>
                    <th width="50">Height</th>
                    <th width="50">BMI</th>
                    <th width="50">Temperature</th>
                    <th width="50">Systolic</th>
                    <th width="50">Diastolic</th>
                    <th width="50">Pulse</th>
                    <th width="50">SpO2</th>
                    <th width="50">Respiratory Rate</th>
                    <th width="220">Comment</th>
                </tr>
    <?php
        if ($MySql_number_rows > 0){		//   If exist recordset - $MySql_number_rows
            while($aRsPlvInf = mysql_fetch_array($MySql_Result)){   //  While Loop $aRsPwlInf
    ?>
                <tr>
                    <td>
					<?php 
                        $DisplayDate = date("jS M Y H:i", strtotime($aRsPlvInf['PlvInpDts']));
                        echo $DisplayDate;
                    ?>
                    </td>
                    <td><?php echo $aRsPlvInf['PlvWeg']; ?></td>
                    <td><?php echo $aRsPlvInf['PlvHeg']; ?></td>
                    <?php
                    	$hValue = $aRsPlvInf['PlvHeg']/100;
						$bmiValue = round($aRsPlvInf['PlvWeg'] / ($hValue * $hValue), 2);
                    ?>
                    <td><?php echo $bmiValue; ?></td>
                    <td><?php echo $aRsPlvInf['PlvTem']; ?></td>
                    <td><?php echo $aRsPlvInf['PlvLowPrs']; ?></td>
                    <td><?php echo $aRsPlvInf['PlvHigPrs']; ?></td>
                    <td><?php echo $aRsPlvInf['PlvPul']; ?></td>
                    <td><?php echo $aRsPlvInf['PlvO2Sat']; ?></td>
                    <td><?php echo $aRsPlvInf['PlvRra']; ?></td>
                    <td><?php echo $aRsPlvInf['PlvCmt']; ?></td>
                </tr>
    <?php
            }
        }
        unset($aRsPwlInf);
        FreeResult($MySql_Result);
    ?>            
            </table>        
        </div>
    </body>
</html>
        
