<?php
	session_start();
	//$sDspNam = $_SESSION['ArrResult'][0]['PlyFstNam'] . " " . $_SESSION['ArrResult'][0]['PlyFamNam'];	
	//echo $sDspNam;
	//http://www.pontikis.net/blog/jquery-ui-autocomplete-step-by-step
	//http://www.daveismyname.com/autocomplete-with-php-mysql-and-jquery-ui-bp#.UwjNHPl_tww
	//http://www.htmlblog.us/jquery-autocomplete
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title></title>
        
        <link href="css/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
        <link href="css/main-medication-order.css" rel="stylesheet" type="text/css" />
        
        <script type="text/javascript" src="js/jquery-2.0.3.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>   

		<script>
            $("#player-order-tab").tabs({heightStyle: "fill"});
			$(".add-new-order").click(addNewOrder);

			var OrderItemTemplateHtml = '<tr class="order-table-row">';
			OrderItemTemplateHtml += '<td><div id="delete-order-item"><img src="images/delete.png" /></div></td>';
			OrderItemTemplateHtml += '<td class="order-table-cell"><div id="order-code" class="order-item-code"></div><div id="order-name"></div></td>';
			OrderItemTemplateHtml += '<td class="order-table-cell"><span id="order-quantity"></span></td>';
			OrderItemTemplateHtml += '<td class="order-table-cell"><span id="order-usage"></span></td>';
			OrderItemTemplateHtml += '</tr>';
			
			var $orderItemTemplate = $(OrderItemTemplateHtml);
			
			var OrderItemTemplateHtml = '<tr class="order-table-row add-item-row">';
			OrderItemTemplateHtml += '<td>&nbsp;</td>';
			OrderItemTemplateHtml += '<td class="order-table-cell"><input id="add-order-code" type="text" class="order-item-code" /><input id="add-order-name" type="text" /></div></td>';
			OrderItemTemplateHtml += '<td class="order-table-cell"><input id="add-order-quantity" type="text" /></td>';
			OrderItemTemplateHtml += '<td class="order-table-cell"><input id="add-order-usage" type="text" /></td>';
			OrderItemTemplateHtml += '<td class="order-table-cell"><a id="save-order-item" href="javascript:" class="order-item-button"><img src="images/save-icon.png" /></a><a id="cancel-order-item" href="javascript:" class="order-item-button"><img src="images/Close-icon.png" /></a></div></td>';
			OrderItemTemplateHtml += '</tr>';
			
			var $addOrderItemTemplate = $(OrderItemTemplateHtml);
			
			function addNewOrder() {
				//alert("Add New Order");
				var selectedTabIndex = $("#player-order-tab").tabs('option', 'active');
				
				var $table = (selectedTabIndex === 0) ? $("#table-pha") :
							 (selectedTabIndex === 1) ? $("#table-lab") :
							 (selectedTabIndex === 2) ? $("#table-xray") : $("#table-pt");
		
				// Prevent adding multiple input row at the same time
				if ($table.find("tr.add-item-row ").length) {
					return;
				}
				
				var type = (selectedTabIndex === 0) ? "PHA" :
						   (selectedTabIndex === 1) ? "LAB" :
						   (selectedTabIndex === 2) ? "XRAY" : "PT";
				
				var $addRow = $addOrderItemTemplate.clone(true, true);
			
				$table.append($addRow);
				
				var $addOrderCode = $($addRow.find("#add-order-code"));
				var $addOrderName = $($addRow.find("#add-order-name"));
				var $addOrderQuantity = $($addRow.find("#add-order-quantity"));
				var $addOrderUsage = $($addRow.find("#add-order-usage"));				
				$addOrderName.focus();
				
				$addOrderName.autocomplete({
					source: "MedicationOrderSearch.php",
					minLength: 2,
					focus: function(event, ui) {
						$addOrderName.val(ui.item.OdrLocNam);
						return false;
					},
					select: function(event, ui) {
						//$addOrderCode.val(ui.item.OdrCod);
						$addOrderName.val(ui.item.OdrLocNam);
						$addOrderQuantity.focus();
						return true;
					}					
				}).data("autocomplete")._renderItem = function(ul, item) {
            		return $("<li>")
						.data("item.autocomplete", item)
						.append("<a>" + item.OdrLocNam + "</a>")
						.appendTo(ul);
        		};;

				
				// Register click event for save food item
				var $saveFoodItem = $($addRow.find("#save-order-item"));       
				$saveFoodItem.click(function() {
				   if (!$addFoodCode.val() || !$addFoodWeight.val() || !$addFoodCalorie.val()) {
					   alert("กรอกข้อมูลไม่ครบ โปรดเช็คข้อมูลที่กรอกให้ครบถ้วนทุกช่อง");
					   
					   return;
				   }
				   
				   var selectionDate = getSelectionDate();
				   
				   var foodItem = new Object();
				   foodItem.code = $addFoodCode.val();
				   foodItem.weight = $addFoodWeight.val();
				   foodItem.calorie = $addFoodCalorie.val();        
				   foodItem.yearMonth = selectionDate.yearMonth;
				   foodItem.day = selectionDate.day;
				   foodItem.weekDay = selectionDate.weekDay;
				   foodItem.type = type;
				   
				   // Send save request to server
				   $.post("index.php/nutrition/addFoodMealItem", JSON.stringify(foodItem)).done(function(result) {
						$addRow.detach();
					   
						var $row = $foodItemTemplate.clone(true, true);
		
						var $foodCode = $($row.find("#food-code"));
						var $foodName = $($row.find("#food-name"));
						var $foodWeight = $($row.find("#food-weight"));
						var $foodCalorie = $($row.find("#food-calorie"));
		
						var item = jQuery.parseJSON(result);
						
						$foodCode.text($addFoodCode.val());
						$foodName.text(item.OdrLocNam);
						$foodWeight.text($addFoodWeight.val());
						$foodCalorie.text($addFoodCalorie.val());
		
						var $deleteItemButton = $($row.find("#delete-order-item"));
						$deleteItemButton.click(function() {
							var foodItem = new Object();
							foodItem.code = $foodCode.text();
							foodItem.yearMonth = selectionDate.yearMonth;
							foodItem.day = selectionDate.day;
							foodItem.weekDay = selectionDate.weekDay;
							foodItem.type = type;
							
							// Send save request to server
							$.post("index.php/nutrition/deleteFoodMealItem", JSON.stringify(foodItem)).done(function(result) {
								$deleteItemButton.closest('tr').detach();
							}).fail(function() {
							   alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
							});
						   
						});
		
						$table.append($row);
				   }).fail(function() {
					   alert("ไม่สามารถเซฟข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
				   });
				});
				
				var $cancelOrder = $($addRow.find("#cancel-order-item"));  
				$cancelOrder.click(function() {
				   if (!$addOrderCode.val() && !$addOrderQuantity.val() && !$addOrderUsage.val()) {
					   $addRow.detach();
				   } 
				   else {
					   var selected = confirm("คุณต้องการยกเลิกข้อมูลที่กรอกใช่หรือไม่ (ข้อมูลที่กรอกจะถูกยกเลิกและไม่ถูกเซฟในระบบ)");
					   if (selected) {
						   $addRow.detach();
					   }
				   }
				});

			}			
			
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
                            <table id="table-pha">
                                <tr>
                                    <th width="16px">&nbsp;</th>
                                    <th class="order-table-cell-header">Name</th>
                                    <th class="order-table-cell-header">Quantity</th>
                                    <th class="order-table-cell-header">Usage</th>
                                </tr>
                            </table>
                            <br/>
                            <div id="add-pha-order" class="add-new-order">
                            	<img src="images/add.png" /><span style="margin-left: 5px;">Add New</span>
                            </div>
                        </div>
                        <div id="tabs-lab">
                            <table id="table-lab">
                                <tr>
                                    <th width="16px">&nbsp;</th>
                                    <th class="order-table-cell-header">Name</th>
                                    <th class="order-table-cell-header">Quantity</th>
                                    <th class="order-table-cell-header">Usage</th>
                                </tr>
                            </table>
                            <br/>
                            <div id="add-lab-order" class="add-new-order">
                            	<img src="images/add.png" /><span style="margin-left: 5px;">Add New</span>
                            </div>
                        </div>
                        <div id="tabs-xray">
                            <table id="table-xray">
                                <tr>
                                    <th width="16px">&nbsp;</th>
                                    <th class="order-table-cell-header">Name</th>
                                    <th class="order-table-cell-header">Quantity</th>
                                    <th class="order-table-cell-header">Usage</th>
                                </tr>
                            </table>
                            <br/>
                            <div id="add-xray-order" class="add-new-order">
                            	<img src="images/add.png" /><span style="margin-left: 5px;">Add New</span>
                            </div>
                        </div>
                        <div id="tabs-pt">
                            <table id="table-pt">
                                <tr>
                                    <th width="16px">&nbsp;</th>
                                    <th class="order-table-cell-header">Name</th>
                                    <th class="order-table-cell-header">Quantity</th>
                                    <th class="order-table-cell-header">Usage</th>
                                </tr>
                            </table>
                            <br/>
                            <div id="add-pt-order" class="add-new-order">
                            	<img src="images/add.png" /><span style="margin-left: 5px;">Add New</span>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

    </body>
</html>
        
