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

#appointment-detail .comment {
    min-height: 200px;
    overflow-y: auto;
    
    padding: 2px;
    
    border: #AAA solid 1px;
}

.coach-schedule-panel .appointment-detail-edit {
    min-height: 200px;
    width: 100%;
    
    display: block;
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
            <div id="appointment-detail">
                <div class="stretch comment" title="ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข"></div>
            </div>
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
                        <div class="form">
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
        
        $("#appointment-detail .stretch").tooltip();
        
        initialHourSelection();
        
        $(".coach-worklist-add").click(showAddDialog);
        
        $("#saveWorklistButton").click(addWorklistItem);
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
        
        $.post("../coach/deleteCoachWorklistItem", JSON.stringify(deleteRequest)).done(function() {
            var $row = $deleteButton.closest("tr");           
            $row.detach();
        }).fail(function() {
           alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
        });
    }
    
    function loadCoachSchedule($datePicker) {
        var date = getDateFromDatePicker($datePicker, "yymmdd");
        
        $.get("../coach/getCoachSchedule/" + date).done(function(result) {
            var schedule = jQuery.parseJSON(result);
            
            $("#appointment-detail .stretch").text("");
            
            if (schedule.appointment.CapAppDtl) {
                $("#appointment-detail .stretch").text(schedule.appointment.CapAppDtl);
            }
            
            $("#addDialog").attr("data-appointment-seq", schedule.appointment.CapSeqNum);
 
            var $tableBody = $("#coach-schdule-table tbody");
            $tableBody.empty();
            
            for (var index=0; index<schedule.worklist.length; index++) {
                addWorklistRow($tableBody, schedule.worklist[index]);
            }
        });
    }
    
    function addWorklistItem() {
        var addRequest = {};
    
        addRequest.date = getDateFromDatePicker($(".schedule-calendar"), "yymmdd");
        addRequest.startTime = $(".hour-selection")[0].value + $(".minute-selection")[0].value;
        addRequest.endTime = $(".hour-selection")[1].value + $(".minute-selection")[1].value;
        addRequest.detail = $("#scheduleDetail").val();
        
        var $addError = $("#add-error");
        $addError.addClass("hidden");
        
        if (addRequest.detail.length <= 0) {
            $addError.text("ข้อมูลไม่ครบถ้วน โปรดกรอกรายการงาน");
            $addError.removeClass("hidden");
            return;
        }

        if (addRequest.startTime >= addRequest.endTime) {
            $addError.text("ข้อมูลผิดพลาด เวลาเริ่มต้นไม่สามารถมากกว่าหรือเท่ากับเวลาสิ้นสุด");
            $addError.removeClass("hidden");
            return;
        }
        
        $.post("../coach/addCoachWorklistItem", JSON.stringify(addRequest)).done(function() {
            $("#addDialog").modal("hide");
            
            loadCoachSchedule($(".schedule-calendar"));
        }).fail(function() {
            alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
        });
    }
    
    var currentComment = "";
    var editMode = false;
    
    function convertToTextArea($section) {       
        var $commentDiv = $section.children(".stretch");
        $commentDiv.tooltip('hide');
        $commentDiv.detach();
        
        currentComment = $commentDiv.text();
        
        var $commentBox = $("<textarea class='stretch appointment-detail-edit'></textarea>");
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
    
    $("#appointment-detail").dblclick(function() {
        if (editMode) {
            return false;
        }
        convertToTextArea($(this));
    });
    $("#appointment-detail").focusout(function() {
        var $section = $(this);
        
        var $commentBox = $section.children(".stretch");
        
        if ($commentBox.val() === currentComment) {
            convertToDiv($section);
        } 
        else {
            var updateRequest = {};
            updateRequest.date = getDateFromDatePicker($(".schedule-calendar"), "yymmdd");
            updateRequest.detail = $commentBox.val();
            
            $.post("../coach/updateCoachScheduleDetail", JSON.stringify(updateRequest)).done(function() {
                convertToDiv($section);
            }).fail(function() {
                alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
            });
        }
    });
    
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