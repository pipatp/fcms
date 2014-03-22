<style type="text/css">
#date-selection  {
    font-size: 13px;
    margin-left: 10px;
    margin-right: 10px;
}

.ui-datepicker {
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
                    <div id="add-breakfast-button" class="btn btn-info add-food-item" style="margin-bottom: 10px;">เพิ่มรายการอาหาร</div>
                    <table id="table-breakfast" class="table table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>อาหาร</th>
                                <th width="16px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div id="tabs-lunch">
                    <div id="add-breakfast-button" class="btn btn-info add-food-item" style="margin-bottom: 10px;">เพิ่มรายการอาหาร</div>
                    <table id="table-lunch" class="table table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>อาหาร</th>
                                <th width="16px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div id="tabs-dessert">
                    <div id="add-breakfast-button" class="btn btn-info add-food-item" style="margin-bottom: 10px;">เพิ่มรายการอาหาร</div>
                    <table id="table-dessert" class="table table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>อาหาร</th>
                                <th width="16px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div id="tabs-dinner">
                    <div id="add-breakfast-button" class="btn btn-info add-food-item" style="margin-bottom: 10px;">เพิ่มรายการอาหาร</div>
                    <table id="table-dinner" class="table table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>อาหาร</th>
                                <th width="16px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
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
                </div>
            </div>
            <div class="modal-footer">
                <button id="addItemButton" type="button" class="btn btn-primary">ตกลง</button>
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
            var $breakfastTable = $("#table-breakfast tbody");
            var $lunchTable = $("#table-lunch tbody");
            var $dessertTable = $("#table-dessert tbody");
            var $dinnerTable = $("#table-dinner tbody");
            
            // Clear table except header row
            $breakfastTable.empty();
            $lunchTable.empty();
            $dessertTable.empty();
            $dinnerTable.empty();

            var foodItems = jQuery.parseJSON(result);

            // Add items to tables
            for (var index=0; index<foodItems.length; index++) {
                var foodItem = foodItems[index];
                
                var foodType = foodItem.OmmTyp;

                var $table = (foodType === "BRK") ? $breakfastTable :
                             (foodType === "LNH") ? $lunchTable :
                             (foodType === "DES") ? $dessertTable : $dinnerTable;
                
                createMealItemRow(foodItem).appendTo($table);
            }
         
        }).fail(function(jqXHR, textStatus) {
           // Do nothing
        });
    }
     
    $(".add-food-item").click(function() {
        showAddWarning(false);
        $("select#order-select").prop('selectedIndex', 0);
        
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
        
        if (!$orderSelect.val()) {
            showAddWarning(true, "โปรดเลือกรายการ");
            return;
        }
        
        showAddWarning(false);
        
        var selectedTabIndex = $("#monthly-preparation-tab").tabs('option', 'active');
        
        var $tableBody = (selectedTabIndex === 0) ? $("#table-breakfast tbody") :
                     (selectedTabIndex === 1) ? $("#table-lunch tbody") :
                     (selectedTabIndex === 2) ? $("#table-dessert tbody") : $("#table-dinner tbody");

        var type = (selectedTabIndex === 0) ? "BRK" :
                   (selectedTabIndex === 1) ? "LNH" :
                   (selectedTabIndex === 2) ? "DES" : "DIN";
        
        var selectionDate = getSelectionDate();
        
        var foodItem = new Object();
        foodItem.code = $orderSelect.val();
        foodItem.yearMonth = selectionDate.yearMonth;
        foodItem.day = selectionDate.day;
        foodItem.weekDay = selectionDate.weekDay;
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
        
        var $deleteButton = $("<div>", { "class":"btn btn-danger" });
        $deleteButton.text("ลบ");
        
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
    }
    
    initialize();
</script>