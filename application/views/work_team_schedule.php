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

.hour-selection, .minute-selection {
    width: 80px !important;
}

.category-item {
    font-weight: bold;
}

.worklist-item {
    padding-left: 20px;
}

.table-row-valign {
    white-space: nowrap;
    
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}
</style>
<table width="100%">
    <tr>
        <td width="50%" valign="top">
            <div id="date-selection"></div>
        </td>
        <td width="50%" valign="top">
            <div id="add-worklist-form" class="form-group">
                <label class="control-label">รายการงาน:</label>
                <select class="form-control worklist-selection input-sm">
                    <option value=""></option>
                    <?php
                        $category = "";
                        $categoryName = "";
                        foreach ($orders as $order) {
                            if ($category != $order->OdrCatTyp) {
                                $category = $order->OdrCatTyp;
                                
                                if ($category == "FIT") {
                                    $categoryName = "ฟิตเนส";
                                } else if ($category == "NUT") {
                                    $categoryName = "โภชนาการ";
                                } else if ($category == "PHY") {
                                    $categoryName = "กายภาพบำบัด";
                                }
                    ?>
                    <option class="category-item" value="" disabled><? echo $categoryName ?></option>
                    <?php
                            }
                    ?>
                    <option class="worklist-item" value="<? echo $order->OdrCod ?>"><? echo $order->OdrLocNam ?></option>
                    <?php
                        }
                    ?>
                </select>
                <label class="control-label" style="margin-top: 10px;">เวลาเริ่มต้น:</label>
                <div class="form-inline">
                    <select class="form-control hour-selection input-sm">
                    </select>
                    <select class="form-control input-sm minute-selection">
                        <option value="00">00</option>
                        <option value="30">30</option>
                    </select>
                </div>
                <label class="control-label" style="margin-top: 10px;">เวลาสิ้นสุด:</label>
                <div class="form-inline">
                    <select class="form-control hour-selection input-sm">
                    </select>
                    <select class="form-control input-sm minute-selection">
                        <option value="00">00</option>
                        <option value="30">30</option>
                    </select>
                </div>
                <div id="add-worklist-button" class="btn btn-info" style="margin-top: 10px;">เพิ่มรายการ</div>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" valign="top">
            <div id="copy-worklist-button" class="btn btn-success" style="margin-top: 5px;">สร้างรายการงานให้นักเตะทุกคน</div>
            <table id="team-schedule-table" class="table table-striped table-condensed" style="margin-top: 5px;">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>รายการ</th>
                        <th>เริ่ม</th>
                        <th>สิ้นสุด</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </td>
    </tr>
</table>
<script>
    var scheduleDates = undefined;
    var permission = <?php echo json_encode($permission) ?>;
    
    $(function() {
        if (!permission.write) {
            $("#add-worklist-form").hide();
            
            $("#copy-worklist-button").hide();
        } else {
            initializeTimeSelectOption(0, 23);
            
            $("#add-worklist-button").click(addWorklistItem);
        
            $("#copy-worklist-button").click(generateTeamWorklistToPlayers);
        }
        
        $("#date-selection").datepicker({
            onSelect: function(dateText, inst) {
                var selectedDate = $(this).datepicker("getDate");

                getTeamWorklistSchedule(selectedDate);
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
                getTeamWorklistScheduleDates(year, paddingMonth);
            }
        });
        
        var currentDate = new Date();
        $("#date-selection").datepicker("setDate", currentDate);
        getTeamWorklistSchedule(currentDate);
        
        var year = $.datepicker.formatDate("yy", currentDate);
        var month = $.datepicker.formatDate("mm", currentDate);
        getTeamWorklistScheduleDates(year, month);
    });
    
    function getTeamWorklistScheduleDates(year, month) {
        scheduleDates = undefined;
        
        $.get("getTeamWorklistScheduleDates/" + year + "/" + month).done(function(result) {
            var appointmentDates = jQuery.parseJSON(result);

            scheduleDates = [];
            for (var index=0; index<appointmentDates.length; index++) {
                scheduleDates.push(appointmentDates[index].WmsDte);
            }
            $("#date-selection").datepicker("refresh");
        });
    }
    
    function addWorklistItem() {
        if (!validateWorklistItem()) {
            return;
        }
        
        var selectedDate = $("#date-selection").datepicker("getDate");
        var date = $.datepicker.formatDate("yymmdd", selectedDate);
        
        var start = $(".hour-selection")[0].value + $(".minute-selection")[0].value;
        var end = $(".hour-selection")[1].value + $(".minute-selection")[1].value;
        
        var worklistItem = {};
        worklistItem.date = date;
        worklistItem.orderCode = $(".worklist-selection").val();
        worklistItem.start = start;
        worklistItem.end = end;
        worklistItem.duration = calculateDuration(start, end);
        
        $.post("addTeamWorklistItem", JSON.stringify(worklistItem)).done(function(result) {
            populateWorklistTable(result);
            
            resetWorklistItemForm();
            
            if (!hasScheduleDate(date)) {
                var year = $.datepicker.formatDate("yy", selectedDate);
                var month = $.datepicker.formatDate("mm", selectedDate);
                getTeamWorklistScheduleDates(year, month);
            }
        }).fail(function() {
           alert("ไม่สามารถเพิ่มข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
        });
    }
    
    function validateWorklistItem() {
        if (!$(".worklist-selection").val()) {
            bootbox.alert("รายการงานยังไม่ได้ถูกเลือก");
            return false
        }
        
        var start = $(".hour-selection")[0].value + $(".minute-selection")[0].value;
        var end = $(".hour-selection")[1].value + $(".minute-selection")[1].value;

        if (start >= end) {
            bootbox.alert("เวลาเริ่มต้นไม่สามารถมากกว่าหรือเท่ากับเวลาสิ้นสุด");
            return false;
        }
        
        return true;
    }
    
    function resetWorklistItemForm() {
        $(".hour-selection").prop("selectedIndex", 0);
        $(".minute-selection").prop("selectedIndex", 0);
        
        $(".worklist-selection").val("");
    }
    
    function getTeamWorklistSchedule(selectedDate) {
        var date = $.datepicker.formatDate("yymmdd", selectedDate);
        
        $.get("getTeamWorklistSchedule/" + date).done(function(result) {
            populateWorklistTable(result);
        }).fail(function() {
           alert("ไม่สามารถดึงข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
        });
    }
    
    function populateWorklistTable(result) {
        var schedules = jQuery.parseJSON(result);
        
        var $tableBody = $("#team-schedule-table tbody");
            
        $tableBody.empty();

        for (var index=0; index<schedules.length; index++) {
            createScheduleRow(index+1, schedules[index]).appendTo($tableBody);
        }
    }
    
    function generateTeamWorklistToPlayers() {
        var selectedDate = $("#date-selection").datepicker("getDate");
        var date = $.datepicker.formatDate("yymmdd", selectedDate);
        
        var generateWorklistInfo = {
            date: date
        };
        
        $.post("generateWorklistToPlayers", JSON.stringify(generateWorklistInfo)).done(function() {
            bootbox.alert("สร้างรายการงานให้กับนักเตะทุกคนสำเร็จ");
        }).fail(function() {
           alert("ไม่สามารถสร้างรายการงานให้กับนักเตะได้ โปรดลองอีกครั้งหนึ่ง");
        });
    }
    
    function createScheduleRow(num, item) {
        var $row = $("<tr>");

        $("<td>", { "class":"table-row-valign" }).text(num).appendTo($row);
        $("<td>", { "class":"table-row-valign" }).text(item.OdrLocNam).appendTo($row);
        $("<td>", { "class":"table-row-valign" }).text(formatDbTime(item.WmsStrDtm)).appendTo($row);
        $("<td>", { "class":"table-row-valign" }).text(formatDbTime(item.WmsEndDtm)).appendTo($row);
        
        if (permission.delete) {
            var $deleteButton = $("<div>", { "class":"btn btn-danger" });
            $deleteButton.text("ลบ");
            $deleteButton.click(function() {
                var deleteItem = {
                    itemId: item.WmsUnq
                };

                $.post("deleteTeamWorklistItem", JSON.stringify(deleteItem)).done(function() {
                    $row.detach();

                    var $tableBody = $("#team-schedule-table tbody");
                    if ($tableBody.children().length <= 0) {
                        var selectedDate = $("#date-selection").datepicker("getDate");
                        var year = $.datepicker.formatDate("yy", selectedDate);
                        var month = $.datepicker.formatDate("mm", selectedDate);
                        getTeamWorklistScheduleDates(year, month);
                    }
                }).fail(function() {
                   alert("ไม่สามารถลบรายการงานได้ โปรดลองอีกครั้งหนึ่ง");
                });
            });

            $("<td>").append($deleteButton).appendTo($row);
        }
        else {
            $("<td>").appendTo($row);
        }
        
        return $row;
    }
    
    function initializeTimeSelectOption(startTimeDay, endTimeDay) {
        var $option = $(".hour-selection");

        for (var time=startTimeDay; time<=endTimeDay; time++) {
            $("<option>", { value: paddingTwoDigit(time) }).text(time).appendTo($option);
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
</script>