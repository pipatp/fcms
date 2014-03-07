<style>
.coach-schedule-panel {
    margin: 10px 0;

    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;
}

.coach-schedule-panel .ui-datepicker {
    font-size: 14px;
    
    margin-left:auto;
    margin-right:auto;
    margin-bottom: 10px;

    width: 100%;
}

.coach-schedule-panel .appointment-detail {
    min-height: 200px;
    overflow-y: auto;
    
    padding: 2px;
    
    border: #AAA solid 1px;
}

.coach-schedule-panel .coach-worklist-add {
    margin-bottom: 10px;
}

.coach-schedule-panel .coach-worklist-add img {
    margin-right: 4px;
}

.coach-schedule-panel .fit-content {
    width: 1px;
    white-space: nowrap;
    
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}

.coach-schedule-panel .content {
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}

.line-space-nm {
    margin-bottom: 10px;
}
</style>
<div class="coach-schedule-panel">
    <div class="content">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="schedule-calendar"></div>
            <label>รายละเอียดตารางนัด</label>
            <div class="appointment-detail"></div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="coach-worklist-add btn btn-default"><img src="../../images/add.png" />เพิ่มรายการ</div>
            <table id="coach-schdule-table" class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th class="fit-content">เริ่ม</th>
                        <th class="fit-content">สิ้นสุด</th>
                        <th class="content">รายการ</th>
                        <th class="fit-content"></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<div id="addDialog" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                เพิ่มรายการ
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        <div id="add-error" class="alert alert-danger hidden">...</div>
                        <div class="form" style="margin-left: 10px;">
                            <div class="form-inline line-space-nm">
                                <label class="control-label" style="margin-right: 10px;">เวลาเริ่มต้น:</label>
                                <select class="form-control hour-selection input-sm">
                                </select>
                                <select class="form-control input-sm minute-selection">
                                    <option value="00">00</option>
                                    <option value="30">30</option>
                                </select>
                            </div>
                            <div class="form-inline line-space-nm">
                                <label class="control-label" style="margin-right: 10px;">เวลาสิ้นสุด:</label>
                                <select class="form-control hour-selection input-sm">
                                </select>
                                <select class="form-control input-sm minute-selection">
                                    <option value="00">00</option>
                                    <option value="30">30</option>
                                </select>
                            </div>
                            <div class="form-group line-space-nm">
                                <label class="control-label" style="margin-right: 10px;">รายการงาน:</label>
                                <input id="scheduleDetail" type="text" class="form-control input-sm" placeholder="รายการงาน" />
                            </div>
                        </div>
                    </div>
                </div>                  
            </div>
            <div class="modal-footer">
                <button id="saveWorklistButton" type="button" class="btn btn-info">ตกลง</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>    
</div>
<script>
    $(function() {
        $(".schedule-calendar").datepicker({
            onSelect: function() {
                loadCoachSchedule($(this));
            }
        });
        
        $(".schedule-calendar").datepicker("setDate", new Date());
        
        loadCoachSchedule($(".schedule-calendar"));
        
        $("#addDialog").modal({ show: false, keyboard: false });
        
        initialHourSelection();
        
        $(".coach-worklist-add").click(showAddDialog);
        
        $("#saveWorklistButton").click();
    });
    
    function resetAddDialogFields() {
        $("#add-error").addClass("hidden");
        
        $(".hour-selection").prop("selectedIndex", 0);
        $(".minute-selection").prop("selectedIndex", 0);
        
        $("#scheduleDetail").val("");
    }
    
    function showAddDialog() {
        resetAddDialogFields();
        
        $("#addDialog").modal("show");
    }
    
    function addWorklistRow($tableBody, item) {
        var $row = $("<tr>");
        
        $("<td>", { "class": "fit-content" }).text(item.CwlStrDtm).appendTo($row);
        $("<td>", { "class": "fit-content" }).text(item.CwlEndDtm).appendTo($row);
        $("<td>", { "class": "content" }).text(item.CwlSchDtl).appendTo($row);
        
        var $deleteButton = $('<div class="btn btn-danger btn-sm">ลบ</div>');
        $deleteButton.attr("data-appointment-seq", item.CwlCapSeq);
        $deleteButton.attr("data-item-seq", item.CwlSeqNum);
        
        $deleteButton.click(deleteWorklistRow);
        
        $("<td>", { "class": "fit-content" }).append($deleteButton).appendTo($row);
        
        $tableBody.append($row);
    }
    
    function deleteWorklistRow() {
        var $deleteButton = $(this);
        
        var deleteRequest = {};
        deleteRequest.appointmentSeq = $deleteButton.attr("data-appointment-seq");
        deleteRequest.itemSeq = $deleteButton.attr("data-item-seq");
        
        $.post("deleteCoachWorklistItem", JSON.stringify(deleteRequest)).done(function() {
            var $row = $deleteButton.closest("tr");           
            $row.detach();
        }).fail(function() {
           alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
        });
    }
    
    function loadCoachSchedule($datePicker) {
        var date = getDateFromDatePicker($datePicker, "yymmdd");
        
        $.get("getCoachSchedule/" + date).done(function(result) {
            var schedule = jQuery.parseJSON(result);
            
            $(".appointment-detail").text("");
            
            $(".appointment-detail").text(schedule.appointment.CapAppDtl);
 
            var $tableBody = $("#coach-schdule-table tbody");
            $tableBody.empty();
            
            for (var index=0; index<schedule.worklist.length; index++) {
                addWorklistRow($tableBody, schedule.worklist[index]);
            }
        });
    }
    
    function addWorklistRow() {
    }
    
    // Utility Functions
    function getDateFromDatePicker($datePicker, formatDate) {
        var selectedDate = $datePicker.datepicker("getDate");

        return $.datepicker.formatDate(formatDate, selectedDate);
    }
    
    function zeroPadding(num) {
        var numText = "" + num;
        if (num < 10) {
            numText = "0" + numText;
        }
        
        return numText;
    }
    
    function initialHourSelection() {
        var $option = $(".hour-selection");
        
        for (var time=0; time<=23; time++) {
            $("<option>", { value: zeroPadding(time) }).text(time).appendTo($option);
        }
    }
</script>