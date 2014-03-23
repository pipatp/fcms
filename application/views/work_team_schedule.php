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
</style>
<table width="100%">
    <tr>
        <td width="50%" valign="top">
            <div id="date-selection"></div>
        </td>
        <td width="50%" valign="top">
            <div class="form-group">
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
            <div id="copy-worklist-button" class="btn btn-success" style="margin-top: 10px;">สร้างรายการงานให้นักเตะทุกคน</div>
            <table id="team-schedule-table" class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th class="fix-content">ลำดับ</th>
                        <th class="content">รายการ</th>
                        <th class="fit-content">เริ่ม</th>
                        <th class="fit-content">สิ้นสุด</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </td>
    </tr>
</table>
<script>
    $(function() {
        initializeTimeSelectOption(0, 23);
        
        $("#date-selection").datepicker({
            onSelect: function(dateText, inst) {
                var selectedDate = $(this).datepicker("getDate");
                
                getTeamWorklistSchedule(selectedDate);
            }
        });
        
        $("#add-worklist-button").click(addWorklistItem);
        
        $("#copy-worklist-button").click(generateTeamWorklistToPlayers);
    });
    
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
    
    function getTeamWorklistSchedule(selectedDate) {
        var date = $.datepicker.formatDate("yymmdd", selectedDate);
        
        $.get("getTeamWorklistSchedule/" + date).done(function(result) {
            populateWorklistTable(result);
        }).fail(function() {
           alert("ไม่สามารถดึงข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
        });
    }
    
    function populateWorklistTable(result) {
        var $tableBody = $("#team-schedule-table tbody");
            
        $tableBody.empty();

        var schedules = jQuery.parseJSON(result);

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

        $("<td>").text(num).appendTo($row);
        $("<td>").text(item.OdrLocNam).appendTo($row);
        $("<td>").text(formatDbTime(item.WmsStrDtm)).appendTo($row);
        $("<td>").text(formatDbTime(item.WmsEndDtm)).appendTo($row);
        
        return $row;
    }
    
    function initializeTimeSelectOption(startTimeDay, endTimeDay) {
        var $option = $(".hour-selection");

        for (var time=startTimeDay; time<=endTimeDay; time++) {
            $("<option>", { value: paddingTwoDigit(time) }).text(time).appendTo($option);
        }
    }
</script>