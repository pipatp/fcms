<style type="text/css">
#date-selection .ui-datepicker {
    font-size: 20px;
    margin-left:auto;
    margin-right:auto;
}

#monthly-preparation-tab { 
    padding: 0px; 
    background: none; 
    border-width: 0px;
}

#monthly-preparation-tab .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 1px 0px; 
    -moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px;
}

#monthly-preparation-tab .ui-tabs-nav li {
    width: auto;
}

#monthly-preparation-tab .ui-tabs-nav li a {
    width: auto;
}

#monthly-preparation-tab .ui-tabs-panel {
    padding-top: 20px;
    border-width: 0px 1px 1px 1px;
}

.food-table-cell-header {
    padding: 2px 10px;
    min-width: 150px;
    background-color: #E3E3E3
}

.food-table-row {
    background-color: #FFFFFF;
}

.food-table-row:nth-child(odd) {
    background-color: #D9E0FA;
}

.food-table-cell {
    padding: 2px 10px;
    min-width: 150px;
    text-overflow: ellipsis;
}

.food-table-cell input {
    width: 140px;
}

.add-food-item {
    display: inline-block;
    cursor: pointer;
}

.food-item-code {
    display: none;
}

.food-item-button {
    margin: 0 5px 0 0;
}

#delete-food-item {
    cursor: pointer;
}
</style>
<table width="100%" height="100%">
    <tr>
        <td width="400px" valign="top"><div id="date-selection" /></td>
        <td valign="top">
            <div id="monthly-preparation-tab">
                <ul>
                    <li><a href="#tabs-breakfast">มื้อเช้า</a></li>
                    <li><a href="#tabs-lunch">มื้อกลางวัน</a></li>
                    <li><a href="#tabs-dessert">อาหารว่าง</a></li>
                    <li><a href="#tabs-dinner">มื้อเย็น</a></li>
                </ul>
                <div id="tabs-breakfast">
                    <table id="table-breakfast">
                        <tr>
                            <th width="16px">&nbsp;</th>
                            <th class="food-table-cell-header">อาหาร</th>
                            <th class="food-table-cell-header">น้ำหนัก</th>
                            <th class="food-table-cell-header">แคลอรี่</th>
                        </tr>
                    </table>
                    <br/>
                    <div id="add-breakfast-item" class="add-food-item"><img src="../../images/add.png" /><span style="margin-left: 5px;">เพิ่มรายการใหม่</span></div>
                </div>
                <div id="tabs-lunch">
                    <table id="table-lunch">
                        <tr>
                            <th width="16px">&nbsp;</th>
                            <th class="food-table-cell-header">อาหาร</th>
                            <th class="food-table-cell-header">น้ำหนัก</th>
                            <th class="food-table-cell-header">แคลอรี่</th>
                        </tr>
                    </table>
                    <br/>
                    <div id="add-lunch-item" class="add-food-item"><img src="../../images/add.png" /><span style="margin-left: 5px;">เพิ่มรายการใหม่</span></div>
                </div>
                <div id="tabs-dessert">
                    <table id="table-dessert">
                        <tr>
                            <th width="16px">&nbsp;</th>
                            <th class="food-table-cell-header">อาหาร</th>
                            <th class="food-table-cell-header">น้ำหนัก</th>
                            <th class="food-table-cell-header">แคลอรี่</th>
                        </tr>
                    </table>
                    <br/>
                    <div id="add-dessert-item" class="add-food-item"><img src="../../images/add.png" /><span style="margin-left: 5px;">เพิ่มรายการใหม่</span></div>
                </div>
                <div id="tabs-dinner">
                    <table id="table-dinner">
                        <tr>
                            <th width="16px">&nbsp;</th>
                            <th class="food-table-cell-header">อาหาร</th>
                            <th class="food-table-cell-header">น้ำหนัก</th>
                            <th class="food-table-cell-header">แคลอรี่</th>
                        </tr>
                    </table>
                    <br/>
                    <div id="add-dinner-item" class="add-food-item"><img src="../../images/add.png" /><span style="margin-left: 5px;">เพิ่มรายการใหม่</span></div>
                </div>
            </div>
        </td>
    </tr>
</table>
<script>
    var foodItemTemplateHtml = '<tr class="food-table-row">';
    foodItemTemplateHtml += '<td><div id="delete-food-item"><img src="../../images/delete.png" /></div></td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><div id="food-code" class="food-item-code"></div><div id="food-name"></div></td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><span id="food-weight"></span></td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><span id="food-calorie"></span> แคลอรี่</td>';
    foodItemTemplateHtml += '</tr>';
    
    var $foodItemTemplate = $(foodItemTemplateHtml);
    
    var foodItemTemplateHtml = '<tr class="food-table-row add-item-row">';
    foodItemTemplateHtml += '<td>&nbsp;</td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><input id="add-food-code" type="text" class="food-item-code" /><input id="add-food-name" type="text" /></div></td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><input id="add-food-weight" type="text" /></td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><input id="add-food-calorie" type="text" /></td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><a id="save-food-item" href="javascript:" class="food-item-button"><img src="../../images/save-icon.png" /></a><a id="cancel-food-item" href="javascript:" class="food-item-button"><img src="../../images/Close-icon.png" /></a></div></td>';
    foodItemTemplateHtml += '</tr>';
    
    var $addFoodItemTemplate = $(foodItemTemplateHtml);
    
    function getSelectionDate() {
        var selectedDate = $("#date-selection").datepicker("getDate");
            
        var yearMonth = $.datepicker.formatDate("yymm", selectedDate);
        var day = $.datepicker.formatDate("dd", selectedDate);

        var weekDay = selectedDate.getDay();
        if (weekDay === 0) {
            weekDay = 7;
        }

        return {
            yearMonth: yearMonth,
            day: day,
            weekDay: weekDay
        };
    }
    
    function getFoodMealSet(yearMonth, day) {
        $.ajax("getFoodMealSet/" + yearMonth + "/" + day).done(function(result) {
            var $breakfastTable = $("#table-breakfast");
            var $lunchTable = $("#table-lunch");
            var $dessertTable = $("#table-dessert");
            var $dinnerTable = $("#table-dinner");
            
            // Clear table except header row
            $breakfastTable.find("tr:gt(0)").remove();
            $lunchTable.find("tr:gt(0)").remove();
            $dessertTable.find("tr:gt(0)").remove();
            $dinnerTable.find("tr:gt(0)").remove();

            var foodItems = jQuery.parseJSON(result);

            // Add items to tables
            for (var index=0; index<foodItems.length; index++) {
                var foodItem = foodItems[index];
                
                var foodType = foodItem.OmmTyp;

                var $table = (foodType === "BRK") ? $breakfastTable :
                             (foodType === "LNH") ? $lunchTable :
                             (foodType === "DES") ? $dessertTable : $dinnerTable;
                
                var $row = $foodItemTemplate.clone(true, true);

                var $foodCode = $($row.find("#food-code"));
                var $foodName = $($row.find("#food-name"));
                var $foodWeight = $($row.find("#food-weight"));
                var $foodCalorie = $($row.find("#food-calorie"));

                $foodCode.text(foodItem.OdrCod);
                $foodName.text(foodItem.OdrLocNam);
                $foodWeight.text(foodItem.OmdMelWeg);
                $foodCalorie.text(foodItem.OmdMelCal);

                var $deleteItemButton = $($row.find("#delete-food-item"));
                $deleteItemButton.click({foodCode: $foodCode.text(), foodType: foodType}, function(event) {
                    var selectionDate = getSelectionDate();
                    
                    var $button = $(this);
                    
                    var foodItem = new Object();
                    foodItem.code = event.data.foodCode;
                    foodItem.yearMonth = selectionDate.yearMonth;
                    foodItem.day = selectionDate.day;
                    foodItem.weekDay = selectionDate.weekDay;
                    foodItem.type = event.data.foodType;                  
                    
                    // Send save request to server
                    $.post("deleteFoodMealItem", JSON.stringify(foodItem)).done(function(result) {
                        $button.closest('tr').detach();
                    }).fail(function() {
                       alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
                    });
                   
                });

                $table.append($row);
            }
         
        }).fail(function(jqXHR, textStatus) {
           // Do nothing
        });
    }
     
    function addFoodItem() {
        var selectedTabIndex = $("#monthly-preparation-tab").tabs('option', 'active');
        
        var $table = (selectedTabIndex === 0) ? $("#table-breakfast") :
                     (selectedTabIndex === 1) ? $("#table-lunch") :
                     (selectedTabIndex === 2) ? $("#table-dessert") : $("#table-dinner");

        // Prevent adding multiple input row at the same time
        if ($table.find("tr.add-item-row ").length) {
            return;
        }
        
        var type = (selectedTabIndex === 0) ? "BRK" :
                   (selectedTabIndex === 1) ? "LNH" :
                   (selectedTabIndex === 2) ? "DES" : "DIN";
        
        var $addRow = $addFoodItemTemplate.clone(true, true);

        $table.append($addRow);
        
        var $addFoodCode = $($addRow.find("#add-food-code"));
        
        var $addFoodName = $($addRow.find("#add-food-name"));
        $addFoodName.focus();
        
        var $addFoodWeight = $($addRow.find("#add-food-weight"));
        var $addFoodCalorie = $($addRow.find("#add-food-calorie"));
        
        $addFoodName.autocomplete({
            source: "findFoodMealItem",
            minLength: 2,
            focus: function(event, ui) {
                $addFoodName.val(ui.item.OdrLocNam);
                return false;
            },
            select: function(event, ui) {
                $addFoodCode.val(ui.item.OdrCod);
                
                $addFoodWeight.focus();
                
                return false;
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            return $("<li>").append("<a>" + item.OdrLocNam + "</a>" ).appendTo(ul);
        };;
        
        // Register click event for save food item
        var $saveFoodItem = $($addRow.find("#save-food-item"));       
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
           $.post("addFoodMealItem", JSON.stringify(foodItem)).done(function(result) {
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

                var $deleteItemButton = $($row.find("#delete-food-item"));
                $deleteItemButton.click(function() {
                    var foodItem = new Object();
                    foodItem.code = $foodCode.text();
                    foodItem.yearMonth = selectionDate.yearMonth;
                    foodItem.day = selectionDate.day;
                    foodItem.weekDay = selectionDate.weekDay;
                    foodItem.type = type;
                    
                    // Send save request to server
                    $.post("deleteFoodMealItem", JSON.stringify(foodItem)).done(function(result) {
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
        
        var $cancelFoodItem = $($addRow.find("#cancel-food-item"));  
        $cancelFoodItem.click(function() {
           if (!$addFoodCode.val() && !$addFoodWeight.val() && !$addFoodCalorie.val()) {
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
    
    $("#preparation-tab").tabs({heightStyle: "fill"});
    $("#monthly-preparation-tab").tabs({heightStyle: "fill"});
    
    $("#date-selection").datepicker({
        onSelect: function(dateText, inst) {
            var selectedDate = $(this).datepicker("getDate");
            
            var yearMonth = $.datepicker.formatDate("yymm", selectedDate);
            var day = $.datepicker.formatDate("dd", selectedDate);
            
            getFoodMealSet(yearMonth, day);
        }
    });
    
    $(".add-food-item").click(addFoodItem);    
</script>