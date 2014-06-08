<style type="text/css">
#date-selection  {
    font-size: 13px;
    margin-left: 10px;
    margin-right: 10px;
}

#date-selection .ui-datepicker {
    margin-left: auto;
    margin-right: auto;
    
    width: 100%;
}

#monthly-preparation-tab { 
    padding: 0px; 
    background: none; 
    border-width: 0px;
    
    font-size: 14px;
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
    
    font-size: 14px;
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

.padding-h-sm {
    padding-left: 5px;
    padding-right: 5px;
}

.col-valign-center {
    vertical-align: middle !important;
}

#group-select {
    width: 100px;
}

.group-header {
    margin-top: 10px;
    
    font-size: 1.2em;
    font-weight: bold;
}

.group-divider {
    margin-top: 5px;
    margin-bottom: 10px;
}

.group-space {
    margin-top: 15px;
}

.copy-date-title {
    margin-left: 5px;
    margin-bottom: 10px;
}
</style>
<table width="100%" height="100%">
    <tr>
        <td width="400px" valign="top">
            <div id="date-selection" />
            <button id="copy-button" type="button" class="btn btn-info" style="margin-left: 10px; margin-top: 10px;">คัดลอกตารางอาหาร</button>
            <button id="apply-button" type="button" class="btn btn-success" style="margin-left: 10px; margin-top: 10px;">ปรับปรุงตารางอาหารนักเตะ</button>
        </td>
        <td valign="top">
            <div id="monthly-preparation-tab">
                <ul>
                    <li><a href="#tabs-breakfast">มื้อเช้า</a></li>
                    <li><a href="#tabs-lunch">มื้อกลางวัน</a></li>
                    <li><a href="#tabs-dessert">อาหารว่าง</a></li>
                    <li><a href="#tabs-dinner">มื้อเย็น</a></li>
                </ul>
                <div id="tabs-breakfast">
                    <div id="add-breakfast-button" class="btn btn-info add-food-item" style="margin-bottom: 10px;">เพิ่มรายการอาหาร</div>
                    <div class="group-a">
                        <div class="group-header">กรุ๊ป A</div>
                        <hr class="group-divider" />
                        <table id="table-breakfast-a" class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:40%;">อาหาร</th>
                                    <th>น้ำหนัก</th>
                                    <th>แคลอรี่</th>
                                    <th width="16px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="group-b group-space">
                        <div class="group-header">กรุ๊ป B</div>
                        <hr class="group-divider" />
                        <table id="table-breakfast-b" class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:40%;">อาหาร</th>
                                    <th>น้ำหนัก</th>
                                    <th>แคลอรี่</th>
                                    <th width="16px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="group-c group-space">
                        <div class="group-header">กรุ๊ป C</div>
                        <hr class="group-divider" />
                        <table id="table-breakfast-c" class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:40%;">อาหาร</th>
                                    <th>น้ำหนัก</th>
                                    <th>แคลอรี่</th>
                                    <th width="16px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div id="tabs-lunch">
                    <div id="add-lunch-button" class="btn btn-info add-food-item" style="margin-bottom: 10px;">เพิ่มรายการอาหาร</div>
                    <div class="group-a">
                        <div class="group-header">กรุ๊ป A</div>
                        <hr class="group-divider" />
                        <table id="table-lunch-a" class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:40%;">อาหาร</th>
                                    <th>น้ำหนัก</th>
                                    <th>แคลอรี่</th>
                                    <th width="16px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="group-b group-space">
                        <div class="group-header">กรุ๊ป B</div>
                        <hr class="group-divider" />
                        <table id="table-lunch-b" class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:40%;">อาหาร</th>
                                    <th>น้ำหนัก</th>
                                    <th>แคลอรี่</th>
                                    <th width="16px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="group-c group-space">
                        <div class="group-header">กรุ๊ป C</div>
                        <hr class="group-divider" />
                        <table id="table-lunch-c" class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:40%;">อาหาร</th>
                                    <th>น้ำหนัก</th>
                                    <th>แคลอรี่</th>
                                    <th width="16px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div id="tabs-dessert">
                    <div id="add-dessert-button" class="btn btn-info add-food-item" style="margin-bottom: 10px;">เพิ่มรายการอาหาร</div>
                    <div class="group-a">
                        <div class="group-header">กรุ๊ป A</div>
                        <hr class="group-divider" />
                        <table id="table-dessert-a" class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:40%;">อาหาร</th>
                                    <th>น้ำหนัก</th>
                                    <th>แคลอรี่</th>
                                    <th width="16px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="group-b group-space">
                        <div class="group-header">กรุ๊ป B</div>
                        <hr class="group-divider" />
                        <table id="table-dessert-b" class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:40%;">อาหาร</th>
                                    <th>น้ำหนัก</th>
                                    <th>แคลอรี่</th>
                                    <th width="16px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="group-c group-space">
                        <div class="group-header">กรุ๊ป C</div>
                        <hr class="group-divider" />
                        <table id="table-dessert-c" class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:40%;">อาหาร</th>
                                    <th>น้ำหนัก</th>
                                    <th>แคลอรี่</th>
                                    <th width="16px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div id="tabs-dinner">
                    <div id="add-dinner-button" class="btn btn-info add-food-item" style="margin-bottom: 10px;">เพิ่มรายการอาหาร</div>
                    <div class="group-a">
                        <div class="group-header">กรุ๊ป A</div>
                        <hr class="group-divider" />
                        <table id="table-dinner-a" class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:40%;">อาหาร</th>
                                    <th>น้ำหนัก</th>
                                    <th>แคลอรี่</th>
                                    <th width="16px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="group-b group-space">
                        <div class="group-header">กรุ๊ป B</div>
                        <hr class="group-divider" />
                        <table id="table-dinner-b" class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:40%;">อาหาร</th>
                                    <th>น้ำหนัก</th>
                                    <th>แคลอรี่</th>
                                    <th width="16px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="group-c group-space">
                        <div class="group-header">กรุ๊ป C</div>
                        <hr class="group-divider" />
                        <table id="table-dinner-c" class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:40%;">อาหาร</th>
                                    <th>น้ำหนัก</th>
                                    <th>แคลอรี่</th>
                                    <th width="16px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </td>
    </tr>
</table>
<div id="addItemDialog" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                เพิ่มรายการ
            </div>
            <div class="modal-body">
                <div class="form form-horizontal">
                    <div class="row">
                        <div id="add-warning" class="alert alert-danger hidden"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group padding-h-sm">
                                <label>กลุ่ม</label>
                                <select id="group-select" class="form-control">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <div class="form-group padding-h-sm">
                                <label>รายการ</label>
                                <select id="order-select" class="form-control input-sm">
                                    <option value=""></option>
                                    <?php 
                                    foreach ($food_items as $item) {
                                    ?>
                                    <option value="<? echo $item->OdrCod ?>"><? echo $item->OdrLocNam ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group padding-h-sm">
                                <label>น้ำหนัก</label>
                                <input id="amount-text" type="text" class="form-control input-sm" placeholder="น้ำหนัก" />
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group padding-h-sm">
                                <label>แคลอรี่</label>
                                <input id="calorie-text" type="text" class="form-control input-sm" placeholder="แคลอรี่" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="addItemButton" type="button" class="btn btn-primary">ตกลง</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>
<div id="copyItemDialog" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                คัดลอกรายการอาหาร
            </div>
            <div class="modal-body">
                <div class="form form-horizontal">
                    <div class="row">
                        <div id="copy-warning" class="alert alert-danger" style="display: none;"></div>
                    </div>
                    <div class="row">
                        <div class="copy-date-title"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group padding-h-sm">
                                <label>เริ่มต้น</label>
                                <input id="start-date" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group padding-h-sm">
                                <label>สิ้นสุด</label>
                                <input id="end-date" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="copyItemButton" type="button" class="btn btn-primary">ตกลง</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>
<script>
    var scheduleDates = undefined;
    var permission = <?php echo json_encode($permission) ?>;
    
    function getSelectionDate() {
        var selectedDate = $("#date-selection").datepicker("getDate");
            
        var yearMonth = $.datepicker.formatDate("yymm", selectedDate);
        var day = $.datepicker.formatDate("dd", selectedDate);
        var year = $.datepicker.formatDate("yy", selectedDate);
        var month = $.datepicker.formatDate("mm", selectedDate);

        var weekDay = selectedDate.getDay();
        if (weekDay === 0) {
            weekDay = 7;
        }

        return {
            yearMonth: yearMonth,
            day: day,
            weekDay: weekDay,
            year: year,
            month: month
        };
    }
    
    function getFoodMealSet(yearMonth, day) {
        $.ajax("getFoodMealSet/" + yearMonth + "/" + day).done(function(result) {
            // Clear table except header row
            $("#table-breakfast-a tbody").empty();
            $("#table-breakfast-b tbody").empty();
            $("#table-breakfast-c tbody").empty();
            $("#table-lunch-a tbody").empty();
            $("#table-lunch-b tbody").empty();
            $("#table-lunch-c tbody").empty();
            $("#table-dessert-a tbody").empty();
            $("#table-dessert-b tbody").empty();
            $("#table-dessert-c tbody").empty();
            $("#table-dinner-a tbody").empty();
            $("#table-dinner-b tbody").empty();
            $("#table-dinner-c tbody").empty();

            var foodItems = jQuery.parseJSON(result);

            // Add items to tables
            for (var index=0; index<foodItems.length; index++) {
                var foodItem = foodItems[index];
                
                var foodType = foodItem.OmmTyp;

                var $table = getFoodTableBody(foodType, foodItem.OmdOdrGrp);
                
                createMealItemRow(foodItem).appendTo($table);
            }
         
        }).fail(function(jqXHR, textStatus) {
           // Do nothing
        });
    }
    
    function getFoodTableBody(foodType, group) {
        var $typeTab = (foodType === "BRK") ? $("#tabs-breakfast") :
                       (foodType === "LNH") ? $("#tabs-lunch") :
                       (foodType === "DES") ? $("#tabs-dessert") : $("#tabs-dinner");
        var groupId = (group === "A") ? ".group-a table tbody" :
                      (group === "B") ? ".group-b table tbody" : ".group-c table tbody";
                      
        return  $($typeTab.find(groupId));
    }
     
    $(".add-food-item").click(function() {
        showAddWarning(false);
        $("select#order-select").prop('selectedIndex', 0);
        $("select#group-select").prop('selectedIndex', 0);
        $("#amount-text").val("");
        $("#calorie-text").val("");
        
        $("#addItemDialog").modal("show");
    });
    
    function showAddWarning(isShow, message) {
        var $addWarning = $("#add-warning");
        if (isShow) {
            $addWarning.removeClass("hidden");
            $addWarning.text(message);
        }
        else {
            $addWarning.addClass("hidden");
        }
    }
    
    function hasScheduleDate(findDate) {
        if (scheduleDates) {
            for (var index=0; index<scheduleDates.length; index++) {
                if (scheduleDates[index] === findDate) {
                    return true;
                }
            }
        }
        
        return false;
    }
    
    function addFoodItem() {
        var $orderSelect = $("#order-select :selected");
        
        var group = $("#group-select").val();
        var weight = $("#amount-text").val();
        var calorie = $("#calorie-text").val();
        
        if (!$orderSelect.val()) {
            showAddWarning(true, "โปรดเลือกรายการ");
            return;
        }
        
        if (!weight.match(/^[0-9]+$/)) {
            showAddWarning(true, "ค่าน้ำหนักไม่ถูกต้อง น้ำหนักต้องเป็นตัวเลขเท่านั้น");
            return;
        }
        
        if (!calorie.match(/^[0-9]+$/)) {
            showAddWarning(true, "ค่าแคลอรี่ไม่ถูกต้อง แคลอรี่ต้องเป็นตัวเลขเท่านั้น");
            return;
        }
        
        showAddWarning(false);
        
        var selectedTabIndex = $("#monthly-preparation-tab").tabs('option', 'active');
        
        var type = (selectedTabIndex === 0) ? "BRK" :
                   (selectedTabIndex === 1) ? "LNH" :
                   (selectedTabIndex === 2) ? "DES" : "DIN";
           
        var $tableBody = getFoodTableBody(type, group);
        
        var selectionDate = getSelectionDate();
        
        var foodItem = new Object();
        foodItem.group = group;
        foodItem.code = $orderSelect.val();
        foodItem.yearMonth = selectionDate.yearMonth;
        foodItem.day = selectionDate.day;
        foodItem.weekDay = selectionDate.weekDay;
        foodItem.weight = weight;
        foodItem.calorie = calorie;
        foodItem.type = type;
           
        // Send save request to server
        $.post("addFoodMealItem", JSON.stringify(foodItem)).done(function(result) {
            var item = jQuery.parseJSON(result);
            
            createMealItemRow(item, type).appendTo($tableBody);
            
            $("#addItemDialog").modal("hide");
            
            if (!hasScheduleDate(selectionDate.yearMonth + selectionDate.day)) {
                getNutritionPreparationScheduleDates(selectionDate.year, selectionDate.month);
            }
        }).fail(function() {
            alert("ไม่สามารถเซฟข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
        });
    }
    
    function createMealItemRow(mealItem) {
        var $row = $("<tr>");
        
        $("<td>", { "class":"col-valign-center" }).text(mealItem.OdrLocNam).appendTo($row);
        $("<td>", { "class":"col-valign-center" }).text(mealItem.OmdMelWeg).appendTo($row);
        $("<td>", { "class":"col-valign-center" }).text(mealItem.OmdMelCal).appendTo($row);
        
        var $deleteButton = $("<div>", { "class":"btn btn-danger" });
        $deleteButton.text("ลบ");
        console.info(mealItem);
        $deleteButton.click(function() {
            var foodItem = new Object();
            foodItem.mealSeq = mealItem.OmdNum;
            foodItem.itemSeq = mealItem.OmdSeq;

            // Send save request to server
            $.post("deleteFoodMealItem", JSON.stringify(foodItem)).done(function(result) {
                $row.detach();
            }).fail(function() {
               alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
            });
        });
        
        $("<td>").append($deleteButton).appendTo($row);
        
        return $row;
    }
    
    $("#addItemButton").click(addFoodItem);
    
    $("#preparation-tab").tabs({heightStyle: "fill"});
    $("#monthly-preparation-tab").tabs({heightStyle: "fill"});
    
    $("#date-selection").datepicker({
        onSelect: function(dateText, inst) {
            var selectedDate = $(this).datepicker("getDate");
            
            var yearMonth = $.datepicker.formatDate("yymm", selectedDate);
            var day = $.datepicker.formatDate("dd", selectedDate);
            
            getFoodMealSet(yearMonth, day);
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
            getNutritionPreparationScheduleDates(year, paddingMonth);
        }
    });
    
    function getNutritionPreparationScheduleDates(year, month) {
        scheduleDates = undefined;
        
        $.get("getPreparationScheduleDates/" + year + "/" + month).done(function(result) {
            var appointmentDates = jQuery.parseJSON(result);

            scheduleDates = [];
            for (var index=0; index<appointmentDates.length; index++) {
                scheduleDates.push(appointmentDates[index].OmmDte);
            }
            $("#date-selection").datepicker("refresh");
        });
    }
    
    function showCopyDialog() {
        var selectedDate = $("#date-selection").datepicker("getDate");
            
        var date = $.datepicker.formatDate("dd MM yy", selectedDate);
        
        $(".copy-date-title").text("คัดลอกตารางอาหารของวันที่ " + date);
        
        $( "#start-date" ).val("");
        $( "#end-date" ).val("");
        $("#copyItemDialog").modal("show"); 
    }
    
    function showApplyTemplateDialog() {
        bootbox.dialog({
            message: "การปรับปรุงรายการอาหาร ถ้านักเตะมีรายการอาหารอยู่แล้วจะถูกลบก่อนการปรับปรุง <br>\n\
                รายการที่ถูกลบไปจะไม่สามารถนำกลับคืนได้ <br><br> คุณต้องการปรับปรุงตารางอาหารของนักเตะหรือไม่",
            title: "ปรับปรุงตารางอาหารนักเตะ",
            buttons: {
                success: {
                    label: "ปรับปรุง",
                    className: "btn-success",
                    callback: function() {
                        var selectedDate = $("#date-selection").datepicker("getDate");
            
                        var data = {
                            yearMonth: $.datepicker.formatDate("yymm", selectedDate)
                        };
                        
                        $.post("applyMealItems", JSON.stringify(data)).done(function() {
                        }).fail(function() {
                            bootbox.alert("<div class='alert alert-danger'>ไม่สามารถปรับปรุงรายการอาหารไปยังนักเตะได้ โปรดลองใหม่อีกครั้งหนึ่ง</div>");
                        });
                    }
                },
                main: {
                    label: "ยกเลิก",
                    className: "btn-primary",
                    callback: function() {
                        
                    }
                }
            }
        });
    }
    
    function copyMealItem() {
        $("#copy-warning").hide();
        
        var dates = [];
        
        var selectedDate = $("#date-selection").datepicker("getDate");

        var selStartDate = $("#start-date").datepicker("getDate");
        var selEndDate = $("#end-date").datepicker("getDate");
        
        var selectedDateText = $.datepicker.formatDate("yymmdd", selectedDate);
        
        while (selStartDate <= selEndDate)
        {
            var dateText = $.datepicker.formatDate("yymmdd", selStartDate);
            if (dateText !== selectedDateText) {
                dates.push(dateText);
            }
            
            selStartDate.setDate(selStartDate.getDate() + 1);
        }
        
        data = {
            selectDate: selectedDateText,
            targetDates: dates
        }
        
        $.post("copyMealItems", JSON.stringify(data)).done(function(result) {
            $("#copyItemDialog").modal("hide");
            
            var year = $.datepicker.formatDate("yy", selectedDate);
            var month = $.datepicker.formatDate("mm", selectedDate);
            getNutritionPreparationScheduleDates(year, month);
            
        }).fail(function() {
           $("#copy-warning").text("ไม่สามารถคัดลอกตารางอาหารได้ โปรดลองใหม่อีกครั้ง");
           $("#copy-warning").show();
        });
    }
    
    $("#addItemDialog").modal({ show: false, keyboard: false });
    
    function initialize() {
        var currentDate = new Date();
        $("#date-selection").datepicker("setDate", currentDate);

        var year = $.datepicker.formatDate("yy", currentDate);
        var month = $.datepicker.formatDate("mm", currentDate);
        getNutritionPreparationScheduleDates(year, month);

        var yearMonth = $.datepicker.formatDate("yymm", currentDate);
        var day = $.datepicker.formatDate("dd", currentDate);

        getFoodMealSet(yearMonth, day);
        
        $("#apply-button").click(showApplyTemplateDialog);
        $("#copy-button").click(showCopyDialog);
        
        $("#copyItemDialog").modal({ show: false, keyboard: false });
        
        $( "#start-date" ).datepicker({
            dateFormat: "dd/mm/yy",
             onClose: function( selectedDate ) {
                $( "#end-date" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#end-date" ).datepicker({
            dateFormat: "dd/mm/yy"
        });
        
        $("#copyItemButton").click(copyMealItem);
    }
    
    initialize();
</script>