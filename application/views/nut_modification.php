<style type="text/css">
#modification-tab, #player-meal-modification-tab{ 
    padding: 0px; 
    background: none; 
    border-width: 0px;
}

#modification-tab .ui-tabs-nav, #player-meal-modification-tab .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 1px 0px; 
    -moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px;
}

#modification-tab .ui-tabs-nav li {
    width: 49%;
}

#player-meal-modification-tab .ui-tabs-nav li {
    width: auto;
}

#modification-tab .ui-tabs-nav li a {
    width: 100%
}

#modification-tab .ui-tabs-panel {
    padding-top: 20px;
    border-width: 0px 1px 1px 1px;
}

#player-search-box {
    padding-left: 22px;
    background: url("images/search-magnify.png") no-repeat;
    background-position: 3px center;
}

#modify-date-selection .ui-datepicker {
    /*font-size: 20px;*/
    margin-left:auto;
    margin-right:auto;
/*    height: 500px ;
    padding: 0.2em 0.2em 0;*/
    width: 100%;
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

.food-table-button-cell {
    min-width: 50px;
}

.food-table-cell input {
    width: 140px;
}

.food-item-button {
    margin: 0 5px 0 0;
}

.player-info-col {
    margin-top: 10px;
    
    width: 100%;
}

.player-picture {
    width: auto;
    height: 150px;
}

.player-detail {
    display: inline-block;

    vertical-align: top;
}

.nutritionist-comment {
    margin-top: 15px;
    margin-right: 15px;
    padding: 8px;
    
    min-height: 100px;
    height: 60%;
    
    border-width: 1px;
    border-color: black;
    border-style: solid;
}

.hidden-field {
    display: none;
}

.add-food-item {
    display: inline-block;
    cursor: pointer;
}
</style>
<div id="modification-tab">
    <ul>
        <li><a href="#tabs-1">เพิ่มรายการอาหารใหม่</a></li>
        <li><a href="#tabs-2">แก้ไขรายการอาหารเดิม</a></li>
    </ul>
    <div id="tabs-1">
        <input id="player-search-box" type="text" placeholder="ค้นหานักกีฬา" />
        <table id="player-add-meal-table" width="100%" height="98%">
            <tr height="100%">
                <td width="50%" valign="top">
                    <div class="player-info-col">
                        <img class="player-picture" src="images/Facebook_head.png" />
                        <div class="player-detail">
                        </div>
                    </div>
                    <div class="nutritionist-comment">
                        <div>ข้อมูลเพิ่มเติมของนักโภชนาการ</div>                        
                    </div>
                </td>
                <td width="50%" valign="top">
                    <div id="modify-date-selection" />
                    <div id="player-meal-modification-tab">
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
                                   <th class="food-table-cell-header food-table-button-cell"></th>
                               </tr>
                           </table>
                           <br/>
                           <div id="add-breakfast-item" class="add-food-item"><img src="images/add.png" /><span style="margin-left: 5px;">เพิ่มรายการใหม่</span></div>
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
                           <div id="add-lunch-item" class="add-food-item"><img src="images/add.png" /><span style="margin-left: 5px;">เพิ่มรายการใหม่</span></div>
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
                           <div id="add-dessert-item" class="add-food-item"><img src="images/add.png" /><span style="margin-left: 5px;">เพิ่มรายการใหม่</span></div>
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
                           <div id="add-dinner-item" class="add-food-item"><img src="images/add.png" /><span style="margin-left: 5px;">เพิ่มรายการใหม่</span></div>
                       </div>
                   </div>
               </td>
            </tr>
        </table>
    </div>
    <div id="tabs-2">        
        
    </div>
</div>
<script>
    var foodItemTemplateHtml = '<tr class="food-table-row">';
    foodItemTemplateHtml += '<td><div id="delete-food-item"><img src="images/delete.png" /></div></td>';
    foodItemTemplateHtml += '<td class="food-table-cell">';
    foodItemTemplateHtml += '<div id="player-work-seq" class="hidden-field" /><div id="player-meal-seq" class="hidden-field" />';
    foodItemTemplateHtml += '<div id="food-code" class="hidden-field"></div><div id="food-name"></div></td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><span id="food-weight"></span></td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><span id="food-calorie"></span> แคลอรี่</td>';
    foodItemTemplateHtml += '</tr>';
    
    var $foodItemTemplate = $(foodItemTemplateHtml);
    
    var foodItemTemplateHtml = '<tr class="food-table-row add-item-row">';
    foodItemTemplateHtml += '<td>&nbsp;</td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><input id="add-food-code" type="text" class="hidden-field" /><input id="add-food-name" type="text" /></div></td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><input id="add-food-weight" type="text" /></td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><input id="add-food-calorie" type="text" /></td>';
    foodItemTemplateHtml += '<td class="food-table-cell food-table-button-cell"><a id="save-food-item" href="javascript:" class="food-item-button"><img src="images/save-icon.png" /></a><a id="cancel-food-item" href="javascript:" class="food-item-button"><img src="images/Close-icon.png" /></a></div></td>';
    foodItemTemplateHtml += '</tr>';
    
    var $addFoodItemTemplate = $(foodItemTemplateHtml);

    $("#modification-tab").tabs({heightStyle: "fill"});
    $("#player-meal-modification-tab").tabs({heightStyle: "content"});
    
    var playerCode;
    var worklistSeq;

    function getSelectionDate() {
        var selectedDate = $("#modify-date-selection").datepicker("getDate");
            
        var yearMonth = $.datepicker.formatDate("yymm", selectedDate);
        var day = $.datepicker.formatDate("dd", selectedDate);

        return {
            yearMonth: yearMonth,
            day: day
        };
    }
    
    var mealTypes = jQuery.parseJSON('<?php echo json_encode($mealTypes); ?>');
    
    function initMealTypes(mealType) {
        var $selection = $("<select id='add-food-type'></select>");
        for (var index=0; index<mealTypes.length; index++) {
            var type = mealTypes[index];
            
            if (type.OdrSubTyp === mealType) {
                $selection.append('<option value="' + type.OdrCod + '">' + type.OdrLocNam + '</option>');
            }
        }
        
        return $selection;
    }
 
    function getDisplayNameWithEng(item) {
        var displayText;
        if (item.PlyFstNam) {
            displayText = item.PlyFstNam + " " + item.PlyFamNam;
        }
        
        if (item.PlyFstEng) {
            if (displayText) {
                displayText += " (" + item.PlyFstEng + " " + item.PlyFamEng + ")";
            }
            else {
                displayText = item.PlyFstEng + " " + item.PlyFamEng;
            }
        }

        return displayText;
    }
    
    function getAge(birthDate) 
    {
        var today = new Date();
 
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
        {
            age--;
        }
        return age;
    }
    
    function addDetail($detailDiv, key, val) {
        $detailDiv.append("<div>" + key + ": " + val + "</div>");
    }
    
    function displayPlayerInfo(item) {
        playerCode = item.PlyCod;
        
        var $playerDetail = $(".player-detail");
        $playerDetail.empty();
        
        addDetail($playerDetail, "ชื่อ", getDisplayNameWithEng(item));
        
        if (item.PlyBirDte) {
            var birthDay = $.datepicker.parseDate("yymmdd", item.PlyBirDte);
            addDetail($playerDetail, "อายุ", getAge(birthDay));
        }
        
        addDetail($playerDetail, "ตำแหน่ง", "");
        addDetail($playerDetail, "สัญชาติ", "");
        addDetail($playerDetail, "ศาสนา", "");
        addDetail($playerDetail, "ภาษาพูด", "");
        
        $("#player-add-meal-table").show();
    }
    
    $("#player-search-box").autocomplete({
        source: "index.php/nutrition/findPlayer",
        minLength: 2,
        focus: function(event, ui) {            
            return false;
        },
        select: function(event, ui) {
            $("#player-search-box").val("");

            displayPlayerInfo(ui.item);
            
            return false;
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item) {
        return $("<li>").append("<a>" + getDisplayNameWithEng(item) + "</a>" ).appendTo(ul);
    };
    
    function addMealItemRow($table, foodItem, foodType) {
        var $row = $foodItemTemplate.clone(true, true);

        var $playerWorklistSeq = $($row.find("#player-work-seq"));
        var $playerMealSeq = $($row.find("#player-meal-seq"));
        var $foodCode = $($row.find("#food-code"));
        var $foodName = $($row.find("#food-name"));
        var $foodWeight = $($row.find("#food-weight"));
        var $foodCalorie = $($row.find("#food-calorie"));

        $playerWorklistSeq.text(foodItem.WkmPwlSeq);
        $playerMealSeq.text(foodItem.WkmMelSeq);
        $foodCode.text(foodItem.WkmOdrCod);
        $foodName.text(foodItem.OdrLocNam);
        $foodWeight.text(foodItem.WkmMelWeg);
        $foodCalorie.text(foodItem.WkmMelCal);

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
            $.post("index.php/nutrition/deleteFoodMealItem", JSON.stringify(foodItem)).done(function(result) {
                $button.closest('tr').detach();
            }).fail(function() {
               alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
            });

        });

        $table.append($row);
    }
    
    function getPlayerMealSet(yearMonth, day) {
        $.ajax("index.php/nutrition/getPlayerMealSet/" + playerCode + "/" + yearMonth + "/" + day).done(function(result) {
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
                
                var foodType = foodItem.OdrSubTyp;

                var $table = (foodType === "BRK") ? $breakfastTable :
                             (foodType === "LNH") ? $lunchTable :
                             (foodType === "DES") ? $dessertTable : $dinnerTable;
               
                addMealItemRow($table, foodItem, foodType);
                
                worklistSeq = foodItem.WkmPwlSeq;
            }
        });
    }
    
    $("#modify-date-selection").datepicker({
        onSelect: function(dateText, inst) {
            var selectedDate = $(this).datepicker("getDate");
            
            var yearMonth = $.datepicker.formatDate("yymm", selectedDate);
            var day = $.datepicker.formatDate("dd", selectedDate);

            getPlayerMealSet(yearMonth, day);
        }
    });
    
    $("#modify-date-selection").datepicker("setDate", new Date());
    
    function addFoodItem() {
        var selectedTabIndex = $("#player-meal-modification-tab").tabs('option', 'active');
        
        var $table = (selectedTabIndex === 0) ? $("#player-meal-modification-tab #table-breakfast") :
                     (selectedTabIndex === 1) ? $("#player-meal-modification-tab #table-lunch") :
                     (selectedTabIndex === 2) ? $("#player-meal-modification-tab #table-dessert") : 
                                                $("#player-meal-modification-tab #table-dinner");

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
        
        var $selection = initMealTypes(type);
        $addFoodName.before($selection);
        
        var $addFoodWeight = $($addRow.find("#add-food-weight"));
        var $addFoodCalorie = $($addRow.find("#add-food-calorie"));
        
        $addFoodName.autocomplete({
            source: "index.php/nutrition/findFoodMealItem",
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
           foodItem.orderCode = $selection.val();
           foodItem.worklistSeq = worklistSeq;
           foodItem.code = $addFoodCode.val();
           foodItem.weight = $addFoodWeight.val();
           foodItem.calorie = $addFoodCalorie.val();        
           foodItem.yearMonth = selectionDate.yearMonth;
           foodItem.day = selectionDate.day;

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

                var $deleteItemButton = $($row.find("#delete-food-item"));
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
    
    $(".add-food-item").click(addFoodItem);

    //$("#player-add-meal-table").hide();
</script>
