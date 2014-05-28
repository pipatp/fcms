<style type="text/css">
#modification-tab, #player-meal-modification-tab{ 
    padding: 0px; 
    background: none; 
    border-width: 0px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;
}

#player-meal-modification-tab {
    font-size: 13px;
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
    
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

#player-meal-modification-tab .ui-tabs-nav li {
    width: auto;
}

#modification-tab .ui-tabs-nav li a {
    width: 100%;
        
    outline: none;
}

#modification-tab .ui-tabs-panel {
    padding-top: 10px;
    border-width: 0px 1px 1px 1px;
    
    font-size: 13px;
}

#player-select-input {
    padding-left: 22px;
    background: url("../../images/search-magnify.png") no-repeat;
    background-position: 3px center;
    
    margin-bottom: 10px;
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
    margin: 0 0 0 5px;
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
    margin-top: 5px;
    margin-right: 15px;
    min-height: 100px;
    height: 60%;
}

.nutritionist-comment .stretch {
    width: 100%;
    height: 100%;

    min-height: 300px;
    font-family: Helvetica,tahoma, sans-serif;
}

.nutritionist-comment .comment {
    border: #AAA solid 1px;
    padding: 2px;
    
    white-space: pre;
}

.hidden-field {
    display: none;
}

.add-food-item {
    display: inline-block;
    cursor: pointer;
}

.list-auto-item {
    font-size: 13px;
}
</style>
<div id="modification-tab">
    <ul>
        <li><a href="#tabs-1">เพิ่มหรือแก้ไขรายการอาหาร</a></li>
    </ul>
    <div id="tabs-1">
        <label class="control-label">รายชื่อนักเตะ:</label>
        <select id="player-select-input" class="form-control input-sm" style="width:300px;">
            <option value=""></option>
            <?php 
            foreach ($players as $player) {
            ?>
            <option value="<?php echo $player->PlyCod ?>">
                <?php
                    $fullName = "";
                    if (strlen($player->PlyFstNam) > 0) {
                        $fullName = $player->PlyFstNam . " " . $player->PlyFamNam;
                    }
                    
                    if (strlen($player->PlyFstEng) > 0) {
                        if (strlen($fullName) > 0) {
                            $fullName = $fullName . " (" . $player->PlyFstEng . " " . $player->PlyFamEng . ")";
                        }
                        else {
                            $fullName = $player->PlyFstEng . " " . $player->PlyFamEng;
                        }
                    }
                    echo $fullName;
                ?>
            </option>
            <?php
            }
            ?>
        </select>
        <table id="player-add-meal-table" width="100%" height="98%">
            <tr height="100%">
                <td width="50%" valign="top">
                    <div class="player-info-col">
                        <img class="player-picture" src="" />
                        <div class="player-detail">
                        </div>
                    </div>
                    <div style="font-weight: bold; margin-top: 15px;">ข้อมูลเพิ่มเติมของนักโภชนาการ</div>
                    <div class="nutritionist-comment">
                        <div class="stretch comment" title="ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข"></div>
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
                                   <th class="food-table-cell-header">กลุ่ม</th>
                                   <th class="food-table-cell-header">อาหาร</th>
                                   <th class="food-table-cell-header">จำนวน</th>
                                   <th class="food-table-cell-header">หน่วย</th>
<!--                                   <th class="food-table-cell-header">น้ำหนัก</th>-->
                                   <th class="food-table-cell-header">แคลอรี่</th>
                                   <th class="food-table-cell-header food-table-button-cell"></th>
                               </tr>
                           </table>
                           <br/>
                           <div id="add-breakfast-item" class="add-food-item"><img src="../../images/add.png" /><span style="margin-left: 5px;">เพิ่มรายการใหม่</span></div>
                       </div>
                       <div id="tabs-lunch">
                           <table id="table-lunch">
                               <tr>
                                   <th width="16px">&nbsp;</th>
                                   <th class="food-table-cell-header">กลุ่ม</th>
                                   <th class="food-table-cell-header">อาหาร</th>
                                   <th class="food-table-cell-header">จำนวน</th>
                                   <th class="food-table-cell-header">หน่วย</th>
                                   <th class="food-table-cell-header">แคลอรี่</th>
                                   <th class="food-table-cell-header food-table-button-cell"></th>
                               </tr>
                           </table>
                           <br/>
                           <div id="add-lunch-item" class="add-food-item"><img src="../../images/add.png" /><span style="margin-left: 5px;">เพิ่มรายการใหม่</span></div>
                       </div>
                       <div id="tabs-dessert">
                           <table id="table-dessert">
                               <tr>
                                   <th width="16px">&nbsp;</th>
                                   <th class="food-table-cell-header">กลุ่ม</th>
                                   <th class="food-table-cell-header">อาหาร</th>
                                   <th class="food-table-cell-header">จำนวน</th>
                                   <th class="food-table-cell-header">หน่วย</th>
                                   <th class="food-table-cell-header">แคลอรี่</th>
                                   <th class="food-table-cell-header food-table-button-cell"></th>
                               </tr>
                           </table>
                           <br/>
                           <div id="add-dessert-item" class="add-food-item"><img src="../../images/add.png" /><span style="margin-left: 5px;">เพิ่มรายการใหม่</span></div>
                       </div>
                       <div id="tabs-dinner">
                           <table id="table-dinner">
                               <tr>
                                   <th width="16px">&nbsp;</th>
                                   <th class="food-table-cell-header">กลุ่ม</th>
                                   <th class="food-table-cell-header">อาหาร</th>
                                   <th class="food-table-cell-header">จำนวน</th>
                                   <th class="food-table-cell-header">หน่วย</th>
                                   <th class="food-table-cell-header">แคลอรี่</th>
                                   <th class="food-table-cell-header food-table-button-cell"></th>
                               </tr>
                           </table>
                           <br/>
                           <div id="add-dinner-item" class="add-food-item"><img src="../../images/add.png" /><span style="margin-left: 5px;">เพิ่มรายการใหม่</span></div>
                       </div>
                   </div>
               </td>
            </tr>
        </table>
    </div>
</div>
<script>
    
    var foodItemTemplateHtml = '<tr class="food-table-row">';
    foodItemTemplateHtml += '<td><div id="delete-food-item"><img src="../../images/delete.png" /></div></td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><div id="food-name"></div></td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><span id="food-weight"></span></td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><span id="food-calorie"></span> แคลอรี่</td>';
    foodItemTemplateHtml += '<td class="food-table-button-cell"><div id="edit-dinner-item" class="add-food-item food-item-button"><img src="../../images/pencil-icon.png" /></div></td>';
    foodItemTemplateHtml += '</tr>';
    
    var $foodItemTemplate = $(foodItemTemplateHtml);
    
    var foodItemTemplateHtml = '<tr class="food-table-row add-item-row">';
    foodItemTemplateHtml += '<td>&nbsp;</td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><input id="add-food-code" type="text" class="hidden-field" /><input id="add-food-name" type="text" /></div></td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><input id="add-food-weight" type="text" /></td>';
    foodItemTemplateHtml += '<td class="food-table-cell"><input id="add-food-calorie" type="text" /></td>';
    foodItemTemplateHtml += '<td class="food-table-button-cell"><a id="save-food-item" href="javascript:" class="food-item-button"><img src="../../images/save-icon.png" /></a><a id="cancel-food-item" href="javascript:" class="food-item-button"><img src="../../images/Close-icon.png" /></a></div></td>';
    foodItemTemplateHtml += '</tr>';
    
    var $addFoodItemTemplate = $(foodItemTemplateHtml);
    
    $("#modification-tab").tabs({heightStyle: "fill"});
    $("#player-meal-modification-tab").tabs({heightStyle: "content"});
    
    var playerCode;
    var worklistSeq;
    var availableOrderCode = {
        "BRK" : "NUTBRK001",
        "LNH" : "NUTLNH001",
        "DES" : "NUTDES001",
        "DIN" : "NUTDIN001"
    };
    
    var scheduleDates = undefined;
    var permission = <?php echo json_encode($permission) ?>;
    
    var currentComment = "";
    var editMode = false;
    
    $(function() {
        var currentDate = new Date();
        $("#modify-date-selection").datepicker("setDate", currentDate);
        var yearMonth = $.datepicker.formatDate("yymm", currentDate);
        var day = $.datepicker.formatDate("dd", currentDate);

        getPlayerMealSet(yearMonth, day);
        
        $(".nutritionist-comment").dblclick(function() {
            if (editMode) {
                return false;
            }
            convertToTextArea($(this));
        });
        $(".nutritionist-comment").focusout(function() {
            var $section = $(this);

            var $commentBox = $section.children(".stretch");

            if ($commentBox.val() === currentComment) {
                convertToDiv($section);
            } 
            else {
                addPlayerComment($commentBox.val(), function() {
                    convertToDiv($section);
                });
            }
        });

        $(".nutritionist-comment .stretch").tooltip();
    });
    
    function addPlayerComment(comment, success) {
        var result = {};
        result.playerCode = playerCode;
        result.comment = comment;
        result.category = "NUT";

        $.post("../player/updateComment", JSON.stringify(result)).done(function() {
            success();
        }).fail(function() {
           alert("ไม่สามารถแก้ไขข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
        });
    }
    
    function convertToTextArea($section) {       
        var $commentDiv = $section.children(".stretch");
        $commentDiv.tooltip('hide');
        $commentDiv.detach();
        
        currentComment = $commentDiv.text();
        
        var $commentBox = $("<textarea class='stretch'></textarea>");
        $commentBox.val($commentDiv.text());
        
        $commentBox.keydown(function(e) {
            if (e.keyCode === 27) {
                $commentBox.val(currentComment);
                
                convertToDiv($section);
            }
        });
        
        $section.append($commentBox);
        
        $commentBox.focus();
        
        editMode = true;
    }
    
    function convertToDiv($section) {
        var $commentBox = $section.children(".stretch");
        $commentBox.detach();
        
        var $commentDiv = $("<div class='stretch comment' title='ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข'></div>");
        $commentDiv.text($commentBox.val());
        
        $commentDiv.tooltip();
        
        $section.append($commentDiv);
        
        editMode = false;
    }
    
    function getPlayerComment(playerCode) {
        $.get("../player/comment/" + playerCode + "?cat=NUT").done(function(result) {
            var comment = jQuery.parseJSON(result);
            
            if (comment.PlcCmt) {
                $(".nutritionist-comment .stretch").text(comment.PlcCmt);
            }
            else {
                $(".nutritionist-comment .stretch").text("");
            }
        });
    }

    function getSelectionDate() {
        var selectedDate = $("#modify-date-selection").datepicker("getDate");
            
        var yearMonth = $.datepicker.formatDate("yymm", selectedDate);
        var day = $.datepicker.formatDate("dd", selectedDate);

        return {
            yearMonth: yearMonth,
            day: day
        };
    }
    
    function addDetail($detailDiv, key, val) {
//        $detailDiv.append("<div>" + key + ": " + val + "</div>");
        $detailDiv.append("<tr><td style='padding-left: 5px;font-weight: bold; text-align:right'>" + key + "</td><td style='padding-left: 10px;'>" + val + "</td></tr>");
    }
    
    function displayPlayerInfo(item) {
        $(".player-picture").attr("src", "../player/image/" + playerCode);
        
        var $playerDetail = $(".player-detail");
        $playerDetail.empty();
        
        $table = $("<table style='margin-top: 5px;'></table>");
        
        addDetail($table, "ชื่อ", getDisplayNameWithEng(item.PlyFstNam, item.PlyFamNam, item.PlyFstEng, item.PlyFamEng));
        
        if (item.PlyBirDte) {
            var birthDay = $.datepicker.parseDate("yymmdd", item.PlyBirDte);
            addDetail($table, "อายุ", getAge(birthDay));
        }
        var Religion = item.PlyRegCod === '1' ? "พุทธ" :(item.PlyRegCod === '2' ? "คริสต์" : 'อิสลาม');
        addDetail($table, "ตำแหน่ง", "");
        addDetail($table, "สัญชาติ",  item.PlyNatCod);
        addDetail($table, "ศาสนา", Religion);
        addDetail($table, "ภาษาพูด",  item.PlyLan);
        addDetail($table, "อาหารที่แพ้", item.PlyFodAlg);
        $playerDetail.append($table);
        
        $("#player-add-meal-table").show();
    }
    
    $("#player-select-input").change(function() {
        var $combo = $(this);
        playerCode = $combo.find(":selected").val();

        if (playerCode.length <= 0) {
            return;
        }
        
        getPlayerInfo(playerCode);
        getPlayerComment(playerCode);
        
        var selectedDate = $("#modify-date-selection").datepicker("getDate");
        var year = $.datepicker.formatDate("yy", selectedDate);
        var month = $.datepicker.formatDate("mm", selectedDate);
        getNutritionScheduleDates(year, month);
        
        var yearMonth = $.datepicker.formatDate("yymm", selectedDate);
        var day = $.datepicker.formatDate("dd", selectedDate);

        getPlayerMealSet(yearMonth, day);
    });
    
    function getPlayerInfo(playerCode) {
        $.get("../player/info/" + playerCode).done(function(result) {
            var info = jQuery.parseJSON(result);

            displayPlayerInfo(info);
        });
    }
    
    function addMealItemRow($table, foodItem, foodType) {
        var $row = $foodItemTemplate.clone(true, true);

        var $foodName = $($row.find("#food-name"));
        var $foodWeight = $($row.find("#food-weight"));
        var $foodCalorie = $($row.find("#food-calorie"));

        $row.attr("data-worklist-seq", foodItem.WkmPwlSeq);
        $row.attr("data-meal-seq", foodItem.WkmMelSeq);
        
        $foodName.text(foodItem.OdrLocNam);
        $foodName.attr("data-food-code", foodItem.WkmMelCod);
        
        $foodWeight.text(foodItem.WkmMelWeg);
        $foodCalorie.text(foodItem.WkmMelCal);

        var orderCode = availableOrderCode[foodType];

        var $deleteItemButton = $($row.find("#delete-food-item"));
        $deleteItemButton.click({mealSeq: foodItem.WkmMelSeq, orderCode: orderCode, worklistSeq: foodItem.WkmPwlSeq}, function(event) {
            if (!confirm("คุณแน่ใจที่จะลบข้อมูลนี้หรือไม่")) {
                return;
            }
            
            var $button = $(this);

            var foodItem = new Object();
            foodItem.mealSeq = event.data.mealSeq;
            foodItem.worklistSeq = event.data.worklistSeq;
            foodItem.orderCode = event.data.orderCode;               

            // Send save request to server
            $.post("deletePlayerMealItem", JSON.stringify(foodItem)).done(function(result) {
                $button.closest('tr').detach();
            }).fail(function() {
               alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
            });

        });
        
        var $editMealItemButton = $($row.find("#edit-dinner-item"));
        $editMealItemButton.click({mealSeq: foodItem.WkmMelSeq, orderCode: orderCode, 
        worklistSeq: foodItem.WkmPwlSeq, foodCode: foodItem.WkmMelCod,
        foodName: foodItem.OdrLocNam, foodWeight: foodItem.WkmMelWeg,
        foodCalorie: foodItem.WkmMelCal}, function(event) {
            if ($table.find("tr.add-item-row").length) {
                alert("ไม่สามารถเพิ่มข้อมูลได้เนื่องจากกำลังเพิ่มหรือแก้ไขข้อมูลอื่นอยู่ โปรดบันทึกหรือยกเลิกการเพิ่มหรือแก้ไขข้อมูลอื่นก่อน");
                return;
            }
            
            var $editRow = $addFoodItemTemplate.clone(true, true);
            
            var $editFoodCode = $($editRow.find("#add-food-code"));
            var $editFoodName = $($editRow.find("#add-food-name"));
            var $editFoodWgt = $($editRow.find("#add-food-weight"));
            var $editFoodCal = $($editRow.find("#add-food-calorie"));
            
            $editFoodCode.val(event.data.foodCode);
            $editFoodName.val(event.data.foodName);
            $editFoodWgt.val(event.data.foodWeight);
            $editFoodCal.val(event.data.foodCalorie);
            
            var $saveFoodItem = $($editRow.find("#save-food-item"));
            $saveFoodItem.click(function() {
                if (!$editFoodCode.val() || !$editFoodName.val() ||
                    !$editFoodWgt.val() || !$editFoodCal.val()) {
                    alert("ไม่สามารถบันทึกได้ โปรดกรอกข้อมูลให้ครบถ้วน");
                    return;
                }
                
                var foodItem = new Object();
                foodItem.worklistSeq = event.data.worklistSeq;
                foodItem.orderCode = event.data.orderCode;
                foodItem.mealSeq = event.data.mealSeq;
                foodItem.code = $editFoodCode.val();
                foodItem.weight = $editFoodWgt.val();
                foodItem.calorie = $editFoodCal.val();
               
                $.post("editPlayerMealItem", JSON.stringify(foodItem)).done(function() {
                    $foodName.text($editFoodName.val());
                    $foodName.attr("data-food-code", foodItem.code);

                    $foodWeight.text(foodItem.weight);
                    $foodCalorie.text(foodItem.calorie);
                    
                    $editRow.before($row);
                    $editRow.detach();
               }).fail(function() {
                   alert("ไม่สามารถเซฟข้อมูลได้ โปรดลองใหม่อีกครั้งหนึ่ง");
               });
           });
            
            var $cancelFoodItem = $($editRow.find("#cancel-food-item"));  
            $cancelFoodItem.click(function() {               
                $editRow.before($row);
                $editRow.detach();
            });
           
            $row.before($editRow);
            $row.detach();            
        });

        $table.append($row);
    }
    
    function getPlayerMealSet(yearMonth, day) {
        $.ajax("getPlayerMealSet/" + playerCode + "/" + yearMonth + "/" + day).done(function(result) {
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

            // Clear worklist sequence
            worklistSeq = -1;
//            availableOrderCode = {};
            
            // Add items to tables
            for (var index=0; index<foodItems.length; index++) {
                var foodItem = foodItems[index];
                
                var foodType = foodItem.OdrSubTyp;

                var $table = (foodType === "BRK") ? $breakfastTable :
                             (foodType === "LNH") ? $lunchTable :
                             (foodType === "DES") ? $dessertTable : $dinnerTable;
                
//                availableOrderCode[foodType] = foodItem.WkmOdrCod;
               
                addMealItemRow($table, foodItem, foodType);
                
                // Set worklist sequence once because it's the same for all items
                if (index === 0) {
                    worklistSeq = foodItem.WkmPwlSeq;
                }
            }
        });
    }
    
    $("#modify-date-selection").datepicker({
        onSelect: function(dateText, inst) {
            var selectedDate = $(this).datepicker("getDate");
            
            var yearMonth = $.datepicker.formatDate("yymm", selectedDate);
            var day = $.datepicker.formatDate("dd", selectedDate);

            getPlayerMealSet(yearMonth, day);
            
//            $.ajax("getPlayerWorklistMeal/" + playerCode + "/" + yearMonth + "/" + day).done(function(result) {
//                var availableMeals = jQuery.parseJSON(result);
//                
//                for (var index=0; index<availableMeals.length; index++) {
//                    availableOrderCode[availableMeals[index].OdrSubTyp] = availableMeals[index].WklOdrCod;
//                }
//                
//                getPlayerMealSet(yearMonth, day);
//            });
        },
        beforeShowDay: function(date) {
            if (scheduleDates) {
                var showDate = $.datepicker.formatDate("yymmdd", date);

                for (var index=0; index<scheduleDates.length; index++) {
                    if (showDate === scheduleDates[index]) {
                        return [true, "has-schedule", "Busy"];
                    } else if (showDate < scheduleDates[index]) {
                        break;
                    }
                }
            }

            return [true, ""];
        },
        onChangeMonthYear: function(year, month) {
            var paddingMonth = month;
            if (paddingMonth < 10) {
                paddingMonth = "0" + paddingMonth;
            }
            getNutritionScheduleDates(year, paddingMonth);
        }
     });
    
    function getNutritionScheduleDates(year, month) {
        scheduleDates = undefined;
        
        if (playerCode.length <= 0) {
            return;
        }
        
        $.get("getPlayerScheduleDates/" + playerCode + "/" + year + "/" + month).done(function(result) {
            var appointmentDates = jQuery.parseJSON(result);

            scheduleDates = [];
            for (var index=0; index<appointmentDates.length; index++) {
                scheduleDates.push(appointmentDates[index].PwlAppDte);
            }
            $("#modify-date-selection").datepicker("refresh");
        });
    }
    
    function addFoodItem() {
        var selectedTabIndex = $("#player-meal-modification-tab").tabs('option', 'active');
        
        var $table = (selectedTabIndex === 0) ? $("#player-meal-modification-tab #table-breakfast") :
                     (selectedTabIndex === 1) ? $("#player-meal-modification-tab #table-lunch") :
                     (selectedTabIndex === 2) ? $("#player-meal-modification-tab #table-dessert") : 
                    $("#player-meal-modification-tab #table-dinner");

        // Prevent adding multiple input row at the same time
        if ($table.find("tr.add-item-row").length) {
            alert("ไม่สามารถเพิ่มข้อมูลได้เนื่องจากกำลังเพิ่มหรือแก้ไขข้อมูลอื่นอยู่ โปรดบันทึกหรือยกเลิกการเพิ่มหรือแก้ไขข้อมูลอื่นก่อน");
            return;
        }
         
        var type = (selectedTabIndex === 0) ? "BRK" :
                   (selectedTabIndex === 1) ? "LNH" :
                   (selectedTabIndex === 2) ? "DES" : "DIN";

        var orderCode = availableOrderCode[type];
//        if (!orderCode) {
//            alert("ไม่สามารถเพิ่มข้อมูลได้ เนื่องจากไม่มีรายการงานสำหรับมื้อนี้");
//            return;
//        }
       
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
            return $("<li class='list-auto-item'>").append("<a>" + item.OdrLocNam + "</a>" ).appendTo(ul);
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
           foodItem.playerCode = playerCode;
           foodItem.orderCode = orderCode;
           foodItem.mealCode = $addFoodCode.val();
           foodItem.weight = $addFoodWeight.val();
           foodItem.calorie = $addFoodCalorie.val();        
           foodItem.yearMonth = selectionDate.yearMonth;
           foodItem.day = selectionDate.day;

           // Send save request to server
           $.post("addPlayerMealItem", JSON.stringify(foodItem)).done(function(result) {
                $addRow.detach();
                
                var item = jQuery.parseJSON(result);
                
                addMealItemRow($table, item, type);
           }).fail(function() {
               alert("ไม่สามารถบันทึกข้อมูลได้ โปรดลองใหม่อีกครั้งหนึ่ง");
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

    $("#player-add-meal-table").hide();
</script>


