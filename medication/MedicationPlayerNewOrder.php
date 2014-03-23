<?php
	session_start();
	
	include ("includes/WebConnDB.inc");
	include ("includes/WebQuery.inc");
	include ("includes/WebFunc.inc");	
	
	$iRegNum = $_SESSION['ArrResult'][0]['PwlSeqNum'];
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title></title>
    
    <!--link href="css/main-medication-order.css" rel="stylesheet" type="text/css" /-->
    <link href="css/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript" src="js/jquery-2.1.0.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
    <script type="text/javascript" src="js/jquery-2.1.0.min.map"></script>

	<script>
    	$(function() {
			var sSelURL;
			var sSelRadio = location.search.split('PrmOdrTyp=')[1] ? location.search.split('PrmOdrTyp=')[1] : 'MED';
			var value;
			document.getElementById(sSelRadio).checked = true;	

			switch(sSelRadio){
			case "MED":				
				sSelURL = "MedicationPlayerMedOrderHistory.php";
				break;
			case "LAB":				
				sSelURL = "MedicationPlayerLabOrderHistory.php";
				break;
			case "XRAY":				
				sSelURL = "MedicationPlayerXrayOrderHistory.php";
				break;
			case "PHY":				
				sSelURL = "MedicationPlayerPhyOrderHistory.php";
				break;
			}
			$('#OrderHistory').html('Downloading...'); // Show "Downloading..."
			// Do an ajax request
			$.ajax({
				url: sSelURL
			}).done(function(data) { // data what is sent back by the php page
				$('#OrderHistory').html(data); // display data
			});

			$('#itemname').val("");
			$('#itemusage').val("");
			$('#itemcat').val(sSelRadio);
			switch(sSelRadio){
			case "MED":
				$("#itemname").autocomplete({
					source: "MedicationOrderSearch.php",
					minLength: 2,
					select: function(event, ui) {
						$('#itemname').val(ui.item.label);
						$('#itemcode').val(ui.item.value);
						$('#itemusage').focus();
						return false;
					}
				});	
								
				$("#itemusage").autocomplete({
					source: "MedicationUsageSearch.php",
					minLength: 2,
					select: function(event, ui) {
						$('#itemusage').val(ui.item.label);
						$('#usagecode').val(ui.item.value);
						return false;
					}
				});				
				break;
			case "LAB":
				$("#itemname").autocomplete({
					source: "MedicationOrderLabSearch.php",
					minLength: 2,
					select: function(event, ui) {
						$('#itemname').val(ui.item.label);
						$('#itemcode').val(ui.item.value);
						$('#itemcmt').focus();
						return false;
					}
				});
				break;
			case "XRAY":
				$("#itemname").autocomplete({
					source: "MedicationOrderXraySearch.php",
					minLength: 2,
					select: function(event, ui) {
						$('#itemname').val(ui.item.label);
						$('#itemcode').val(ui.item.value);
						$('#itemcmt').focus();
						return false;
					}
				});			
				break;
			case "PHY":
				$("#itemname").autocomplete({
					source: "MedicationOrderPhySearch.php",
					minLength: 2,
					select: function(event, ui) {
						$('#itemname').val(ui.item.label);
						$('#itemcode').val(ui.item.value);
						$('#itemcmt').focus();
						return false;
					}
				});			
				break;								
			}			

			var width = $("#itemname").width();
			//value = $("#radio :radio:checked").attr('id');
			$(".orderdetail").hide();
			$("#DIV"+sSelRadio).show();
			//$("#select-result").empty();
			//$("#select-result").append(value);
			//class="classitemtetarea"
			$("#radio").buttonset();
			$(".classitemtetarea").css({"width":width * 2});
			$(".classitemtetarea").css({"height":40});	
			//alert("555");
						
			$("#radio").change(function(event) {
				//var result = $("#select-result").empty();
				value = $("#radio :radio:checked").attr('id');
				//$("#radio").val($(this).val());
				//alert(value);
				//result.append(value);
				
				$(".orderdetail").hide();
				$("#DIV"+value).show();
				var width = $("#itemname").width();
				$(".classitemtetarea").css({"width":width * 2});
				$(".classitemtetarea").css({"height":40});
					
				switch(value){
				case "MED":
					$('#itemcat').val(value);
					$("#itemname").autocomplete({
						source: "MedicationOrderSearch.php",
						minLength: 2,
						select: function(event, ui) {
							$('#itemname').val(ui.item.label);
							$('#itemcode').val(ui.item.value);
							$('#itemqty').focus();
							return false;
						}
					});	
									
					$("#itemusage").autocomplete({
						source: "MedicationUsageSearch.php",
						minLength: 2,
						select: function(event, ui) {
							$('#itemusage').val(ui.item.label);
							$('#usagecode').val(ui.item.value);
							$('#itemcmt').focus();
							return false;
						}
					});	
					break;
				case "LAB":
					$("#itemname").autocomplete({
						source: "MedicationOrderLabSearch.php",
						minLength: 2,
						select: function(event, ui) {
							$('#itemname').val(ui.item.label);
							$('#itemcode').val(ui.item.value);
							$('#itemcmt').focus();
							return false;
						}
					});
					break;
				case "XRAY":
					$("#itemname").autocomplete({
						source: "MedicationOrderXraySearch.php",
						minLength: 2,
						select: function(event, ui) {
							$('#itemname').val(ui.item.label);
							$('#itemcode').val(ui.item.value);
							$('#itemcmt').focus();
							return false;
						}
					});				
					break;
				case "PHY":
					$("#itemname").autocomplete({
						source: "MedicationOrderPhySearch.php",
						minLength: 2,
						select: function(event, ui) {
							$('#itemname').val(ui.item.label);
							$('#itemcode').val(ui.item.value);
							$('#itemcmt').focus();
							return false;
						}
					});				
					break;								
				}
				
				switch(value){
				case "MED":				
					sSelURL = "MedicationPlayerMedOrderHistory.php";
					break;
				case "LAB":				
					sSelURL = "MedicationPlayerLabOrderHistory.php";
					break;
				case "XRAY":				
					sSelURL = "MedicationPlayerXrayOrderHistory.php";
					break;
				case "PHY":				
					sSelURL = "MedicationPlayerPhyOrderHistory.php";
					break;
				}
				$('#OrderHistory').html('Downloading...'); // Show "Downloading..."
				// Do an ajax request
				$.ajax({
					url: sSelURL
				}).done(function(data) { // data what is sent back by the php page
					$('#OrderHistory').html(data); // display data
				});				
				
				
			});
			

			$("input").keydown(function(e){
				if (e.keyCode == 13) {
					var iname = $(this).val();
					if (iname !== 'Submit'){
						var fields = $(this).parents('form:eq(0),body').find('button, input, textarea, select');
						var index = fields.index( this );
						if ( index > -1 && ( index + 1 ) < fields.length ) {
							fields.eq( index + 1 ).focus();
						}
						return false;
					}	
				}
			});	

			$('#neworderform').on('submit',function(e) {
				e.preventDefault();
				$.ajax({
					url:'MedicationPlayerNewOrderSave.php',
					data:$(this).serialize(),
					type:'POST',
					dataType:'html',
					success:function(data){
						console.log(data);
						$("#success").show().fadeOut(5000); //=== Show Success Message==
						value = $("#radio :radio:checked").attr('id');
						switch(value){
						case "MED":				
							$('#OrderHistory').load("MedicationPlayerMedOrderHistory.php");
							break;
						case "LAB":				
							$('#OrderHistory').load("MedicationPlayerLabOrderHistory.php");
							break;
						case "XRAY":				
							$('#OrderHistory').load("MedicationPlayerXrayOrderHistory.php");
							break;
						case "PHY":				
							$('#OrderHistory').load("MedicationPlayerPhyOrderHistory.php");
							break;
						}
					},
					error:function(data){
						$("#error").show().fadeOut(5000); //===Show Error Message====
					}
				});	
				$("#neworderform")[0].reset();	
			});
			
			/*
			window.onunload = refreshParent;
			function refreshParent() {
				window.opener.location.reload();
			}
			*/				
    	});		
    </script>    
    
</head>
<body leftmargin="0" topmargin="0">
<form name="neworderform" id="neworderform">
  <div id="radio">
  	<!--table id="table-order-option" class="content-table" border="1" cellspacing="0" cellpadding="0" bgcolor="#FFCCFF"-->
        <input type="radio" id="MED" name="radio" value="MED"><label for="MED">Medicine</label>
        <input type="radio" id="LAB" name="radio" value="LAB"><label for="LAB">Laboratory</label>
        <input type="radio" id="XRAY" name="radio" value="XRAY"><label for="XRAY">Radiology</label>
        <input type="radio" id="PHY" name="radio" value="PHY"><label for="PHY">Physical Therapy</label>
    <!--/table-->
  </div>
<!--p id="feedback">
	<span>You've selected:</span> <span id="select-result">none</span>.
</p-->
<br>
<div id="DIVMED" class="orderdetail">
    <table id="table-pha" class="content-table" border="1" cellspacing="0" cellpadding="0" bgcolor="#FFCCFF">
        <tr height="30">
            <td width="10%">Order Name :</td>
            <td width="50%"><input type="text" id="itemname" name="itemname" size="50"></td>
            <td></td>
        </tr>
        <tr height="30">
            <td>Order Quantity :</td>
            <td><input type="text" id="itemqty" name="itemqty" size="5"></td>
            <td></td>
        </tr>        
        <tr>
            <td>Order Usage :</td>
            <td><textarea id="itemusage" name="itemusage" class="classitemtetarea"></textarea></td>
            <td></td>
        </tr>
        <tr>
            <td>Order Comment :</td>
            <td><textarea id="itemcmt" name="itemcmt" class="classitemtetarea"></textarea></td>
            <td></td>
        </tr>   
        <tr>
            <td colspan="3"><input class="OrderSave" type="submit" value="Save" onClick="SaveOrder()" /></td>
        </tr>               
    </table>
</div>
<div id="DIVLAB" class="orderdetail">
    <table id="table-lab" class="content-table" border="1" cellspacing="0" cellpadding="0" bgcolor="#FFCCFF">
        <tr height="30">
            <td width="10%">Order Name :</td>
            <td width="50%"><input type="text" id="itemname" name="itemname" size="50"></td>
            <td></td>
        </tr>
        <tr height="30">
            <td>Order Quantity :</td>
            <td><input type="text" id="itemqty" name="itemqty" size="5"></td>
            <td></td>
        </tr>        
        <tr>
            <td>Order Comment :</td>
            <td><textarea id="itemcmt" name="itemcmt" class="classitemtetarea"></textarea></td>
            <td></td>
        </tr>   
        <tr>
            <td colspan="3"><input class="OrderSave" type="submit" value="Save" onClick="SaveOrder()" /></td>
        </tr>
    </table>
</div>
<div id="DIVXRAY" class="orderdetail">
    <table id="table-xray" class="content-table" border="1" cellspacing="0" cellpadding="0" bgcolor="#FFCCFF">
        <tr height="30">
            <td width="10%">Order Name :</td>
            <td width="50%"><input type="text" id="itemname" name="itemname" size="50"></td>
            <td></td>
        </tr>
        <tr height="30">
            <td>Order Quantity :</td>
            <td><input type="text" id="itemqty" name="itemqty" size="5"></td>
            <td></td>
        </tr>        
        <tr>
            <td>Order Comment :</td>
            <td><textarea id="itemcmt" name="itemcmt" class="classitemtetarea"></textarea></td>
            <td></td>
        </tr>   
        <tr>
            <td colspan="3"><input class="OrderSave" type="submit" value="Save" onClick="SaveOrder()" /></td>
        </tr>
    </table>
</div>
<div id="DIVPHY" class="orderdetail">
    <table id="table-phy" class="content-table" border="1" cellspacing="0" cellpadding="0" bgcolor="#FFCCFF">
        <tr height="30">
            <td width="10%">Order Name :</td>
            <td width="50%"><input type="text" id="itemname" name="itemname" size="50"></td>
            <td></td>
        </tr>
        <tr height="30">
            <td>Order Quantity :</td>
            <td><input type="text" id="itemqty" name="itemqty" size="5"></td>
            <td></td>
        </tr>        
        <tr>
            <td>Order Comment :</td>
            <td><textarea id="itemcmt" name="itemcmt" class="classitemtetarea"></textarea></td>
            <td></td>
        </tr>   
        <tr>
            <td colspan="3"><input class="OrderSave" type="submit" value="Save" onClick="SaveOrder()" /></td>
        </tr>
    </table>
</div>
<input type="hidden" id="itemcode" name="itemcode" />
<input type="hidden" id="usagecode" name="usagecode" />
<input type="hidden" id="itemcat" name="itemcat" />
</form>
<div id="NewOrderSaveStatus"> 
    <span id="error" style="display:none; color:#F00">Some Error!Please Fill form Properly </span> 
    <span id="success" style="display:none; color:#0C0">All the records are submitted!</span>
</div>        
<div id="OrderHistory">
</div>
</body>
</html>

