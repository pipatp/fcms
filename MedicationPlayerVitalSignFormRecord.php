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
					e.preventDefault();
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
				});				
								
			});

						   
        //-->
        </script>     

    </head>
    
    <body>
    	<form name="vitalsignform" id="vitalsignform">
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
        </form>
    </body>
</html>
        
