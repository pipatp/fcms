<style>
#fitness-modification { 
    padding: 0px; 
    background: none; 
    
    margin-left: 2px;
    margin-right: 2px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;    
}

.search-box-section {
    margin-top: 5px;
}

.list-auto-item {
    font-size: 13px;
}

#player-search-box {
    padding-left: 22px;
    background: url("../../images/search-magnify.png") no-repeat;
    background-position: 3px center;
    
    width: 250px;
    font-size: 13px;
}

#player-modification-detail .left-col {
    float: left;
    width: 50%;
    padding-right: 1px;
}

#player-modification-detail .right-col {
    float: right;
    width: 50%;
    padding-left: 1px;
}

#player-modification-detail .player-info-section {
    margin-top: 10px;
}

#player-modification-detail .player-info-section .player-picture {
    width: auto;
    height: 150px;
}

#player-modification-detail .player-info-section .player-detail {
    display: inline-block;

    vertical-align: top;
}

#modify-date-selection {
    margin: 10px 20px 0 20px;
}

#modify-date-selection .ui-datepicker {
    font-size: 13px;
    margin-left:auto;
    margin-right:auto;

    width: 100%;
}

.player-comment-section {
    margin-top: 10px;
    height: 100%;
}

.player-comment-section .stretch {
    width: 100%;
    height: 100%;

    min-height: 300px;
    font-family: Helvetica,tahoma, sans-serif;
}

.player-comment-section .comment {
    border: #AAA solid 1px;
    padding: 2px;
    
    white-space: pre;
}

.fitness-worklist-section {
    margin: 10px 10px 0 10px;
}

.fitness-worklist-section .fitness-worklist-add {
    margin-bottom: 5px;
}

.fitness-worklist-section .fitness-worklist-add img {
    margin-right: 5px;
}

.fitness-worklist-section table {
    width: 100%;
}

.fitness-worklist-section .fix-content {
    padding-left: 10px;
    padding-right: 10px;
    
    width: 36px;
}

.fitness-worklist-section .fit-content {
    width: 1px;
    white-space: nowrap;
    
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}

.fitness-worklist-section .content {
    padding-left: 10px;
    padding-right: 10px;
}

.line-space-nm {
    margin-bottom: 10px;
}

.ui-autocomplete {
    z-index: 9999;   
}

/* Calendar */
.time-hour-row {
    height: 20px;
    border-bottom: thin dashed rgb(225,225,225);
}

.calendar-panel {
    padding-left: 60px;
}

.calendar-panel .day-event {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;

    width: 200px;
    height: 80px;

    padding-left: 8px;
    padding-right: 8px;

    float: left;
    position: absolute;
}

.calendar-panel .day-event .header {
    font-weight: bold;
}

.calendar-panel .time-hour {
    position: absolute;
    width: 100%;

    margin-left: -60px;
    z-index: 0;
}

.calendar-panel .time-hour .time-hour-row:nth-child(4n), .calendar-panel .time-hour .time-hour-row:nth-child(4n-1) {
    background-color: #EFEFEF;
}

.event-info {
    border: 1px solid rgb(30,144,255);
    background-color: rgb(209,232,255);
}
</style>
<div id="fitness-modification">
    <div class="search-box-section">
        <input id="player-search-box" class="form-control input-sm" type="text" placeholder="ค้นหานักกีฬา" />
    </div>
    <div id="player-modification-detail">
        <div class="left-col">
            <div class="player-info-section">
                <img class="player-picture" src="" />
                <div class="player-detail"></div>
            </div>
            <div class="player-comment-section">
                <div class="stretch comment" title="ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข"></div>
            </div>
        </div>
        <div class="right-col">
            <div id="modify-date-selection"></div>
            <div class="fitness-worklist-section">
                <div class="fitness-worklist-add btn btn-default"><img src="../../images/add.png" />เพิ่มเติมรายการฟิตเนส</div>
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th class="fix-content"></th>
                            <th class="fit-content">เริ่ม</th>
                            <th class="fit-content">สิ้นสุด</th>
                            <th class="content">รายการ</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="errorDialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="error-content"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>
    <div id="confirmDialog" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    ยืนยันการลบข้อมูล
                </div>
                <div class="modal-body">
                    คุณต้องการที่จะลบรายการหรือไม่
                </div>
                <div class="modal-footer">
                    <button id="deleteConfirmButton" type="button" class="btn btn-danger">ตกลง</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
    <div id="addDialog" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    เพิ่มเติมรายการฟิตเนส
                </div>
                <div class="modal-body" style='overflow-y: auto;height: 500px;'>
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <div class="row">
                                <div class="col-md-12 col-xs-12">                   
                                    <div class="calendar-panel clearfix" style="position: relative">
                                        <div class="time-hour">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6">
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
                                    <label class="control-label" style="margin-right: 10px;">รายการฟิตเนส:</label>
                                    <input id="order-search-box" type="text" class="form-control input-sm" placeholder="ชื่อรายการฟิตเนส" />
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
</div>
<script>
    var playerCode = "";
    var selectedWorklist;
    var $selectedRow;
    
    function addDetail($detailDiv, key, val) {
        $detailDiv.append("<tr><td style='padding-left: 5px;font-weight: bold; text-align:right'>" + key + "</td><td style='padding-left: 10px;'>" + val + "</td></tr>");
    }
 
    function displayPlayerInfo(item) {
        playerCode = item.PlyCod;
        
        $(".player-picture").attr("src", "../player/thumbnail/" + playerCode + "?width=150&height=150");
        
        var $playerDetail = $(".player-detail");
        $playerDetail.empty();
        
        $table = $("<table style='margin-top: 5px;'></table>");
        
        addDetail($table, "ชื่อ", getDisplayNameWithEng(item.PlyFstNam, item.PlyFamNam, item.PlyFstEng, item.PlyFamEng));
        
        if (item.PlyBirDte) {
            var birthDay = $.datepicker.parseDate("yymmdd", item.PlyBirDte);
            addDetail($table, "อายุ", getAge(birthDay));
        }

        addDetail($table, "ตำแหน่ง", "");
        addDetail($table, "สัญชาติ", "");
        addDetail($table, "ศาสนา", "");
        addDetail($table, "ภาษาพูด", "");
        
        $playerDetail.append($table);
        
        $("#player-add-meal-table").show();
    }
    
    function getPlayerComment(playerCode) {
        $.get("../player/comment/" + playerCode + "?cat=FIT").done(function(result) {
            var comment = jQuery.parseJSON(result);
            
            if (comment.PlcCmt) {
                $(".player-comment-section .stretch").text(comment.PlcCmt);
            }
            else {
                $(".player-comment-section .stretch").text("");
            }
        });
    }
 
    $("#player-search-box").autocomplete({
        source: "../player/search",
        minLength: 2,
        focus: function(event, ui) {            
            return false;
        },
        select: function(event, ui) {
            $("#player-search-box").val("");

            displayPlayerInfo(ui.item);
            
            getPlayerComment(ui.item.PlyCod);
            
            loadFitnessWorklist();
            
            $("#player-modification-detail").show();
            
            return false;
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item) {
        var displayName = getDisplayNameWithEng(item.PlyFstNam, item.PlyFamNam, item.PlyFstEng, item.PlyFamEng);
        return $("<li class='list-auto-item'>").append("<a>" + displayName + "</a>" ).appendTo(ul);
    };

    $("#order-search-box").autocomplete({
        source: "searchFitnessOrder",
        minLength: 2,
        focus: function(event, ui) {            
            return false;
        },
        select: function(event, ui) {
            var $textBox =  $("#order-search-box");
            
            $textBox.val(ui.item.OdrLocNam);
            $textBox.attr("data-order-code", ui.item.OdrCod);
            
            return false;
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item) {
        return $("<li class='list-auto-item'>").append("<a>" + item.OdrLocNam + "</a>" ).appendTo(ul);
    };

    function formatTime(timeText) {
        return timeText.substr(0, 2) + ":" + timeText.substr(2, 2);
    }

    function createWorklistItemRow(item) {
        var $row = $("<tr>", { "data-worklist-seq": item.WklPwlSeq, "data-item-seq": item.WklSeqNum,
            "data-item-code": item.WklOdrCod });
        
        var $deleteItem = $("<img>", { src: "../../images/delete.png" });
        $deleteItem.click(function() {
            var dialog = $("#confirmDialog");
             
            $selectedRow = $row;
            
            dialog.modal("show");
        });
        
        $("<td>", { class: "fix-content" }).append($deleteItem).appendTo($row);
        $("<td>", { class: "fit-content" }).text(formatTime(item.WklStrDtm)).appendTo($row);
        $("<td>", { class: "fit-content" }).text(formatTime(item.WklEndDtm)).appendTo($row);
        $("<td>", { class: "content" }).text(item.OdrLocNam).appendTo($row);
        
        return $row;
    }

    function loadFitnessWorklist() {
        var selectedDate = $("#modify-date-selection").datepicker("getDate");

        var date = $.datepicker.formatDate("yymmdd", selectedDate);

        $.get("getFitnessWorklist/" + playerCode + "/" + date).done(function(result) {
            var ret = jQuery.parseJSON(result);
            var worklist = ret.result;

            var $tableBody = $(".fitness-worklist-section tbody");

            $tableBody.empty();

            if (worklist.length > 0) {
                for (var index=0; index<worklist.length; index++) {
                    var $row = createWorklistItemRow(worklist[index]);

                    $tableBody.append($row);
                }
            } else {
                $("<tr><td class='content' colspan='4'>*** ไม่มีรายการของวันที่เลือก</td></tr>").appendTo($tableBody);
            }
        });
    }

    $("#modify-date-selection").datepicker({
        onSelect: function(dateText, inst) {
            loadFitnessWorklist();
        }
    });
    $("#modify-date-selection").datepicker("setDate", new Date());
    
    function addPlayerComment(comment, success) {
        var result = {};
        result.playerCode = playerCode;
        result.comment = comment;
        result.category = "FIT";

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
    
    var currentComment = "";
    var editMode = false;
    
    $(".player-comment-section").dblclick(function() {
        if (editMode) {
            return false;
        }
        convertToTextArea($(this));
    });
    $(".player-comment-section").focusout(function() {
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
    
    $(".player-comment-section .stretch").tooltip();
    
    $("#confirmDialog").modal({ show: false });
    $("#addDialog").modal({ show: false });
    $("#errorDialog").modal({ show: false });
    
    $("#deleteConfirmButton").click(function() {
        var dialog = $("#confirmDialog");
        
        dialog.attr("data-item-seq");
        
        dialog.modal("hide");
        
        var deleteItem = {};
        deleteItem.worklistSeq = $selectedRow.attr("data-worklist-seq");
        deleteItem.seqNum = $selectedRow.attr("data-item-seq");
        deleteItem.itemCode = $selectedRow.attr("data-item-code");

        $.post("deleteFitnessWorklist", JSON.stringify(deleteItem)).done(function() {
            $selectedRow.detach();
        }).fail(function() {
           alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
        });
    });
    
    $("#saveWorklistButton").click(function() {
        var $addError = $("#add-error");
        $addError.addClass("hidden");
        
        var $orderBox = $("#order-search-box");
        
        var orderCode = $orderBox.attr("data-order-code");

        if (!orderCode) {
            $addError.text("ข้อมูลไม่ครบถ้วน โปรดเลือกรายการฟิตเนส");
            $addError.removeClass("hidden");
            return;
        }
        
        var start = $(".hour-selection")[0].value + $(".minute-selection")[0].value;
        var end = $(".hour-selection")[1].value + $(".minute-selection")[1].value;

        if (start >= end) {
            $addError.text("ข้อมูลผิดพลาด เวลาเริ่มต้นไม่สามารถมากกว่าหรือเท่ากับเวลาสิ้นสุด");
            $addError.removeClass("hidden");
            return;
        }

        if (selectedWorklist) {
            for (var index=0; index<selectedWorklist.length; index++) {
                var item = selectedWorklist[index];
                
                if ((start >= item.WklStrDtm && start < item.WklEndDtm) ||
                    (end > item.WklStrDtm && end <= item.WklEndDtm)) {
                    $addError.text("มีรายการอยู่แล้วในช่วงเวลาที่เลือก โปรดเลือกช่วงเวลาใหม่");
                    $addError.removeClass("hidden");
                    return;
                }
            }
        }

        var selectedDate = $("#modify-date-selection").datepicker("getDate");
        var date = $.datepicker.formatDate("yymmdd", selectedDate);
        
        var addItem = {};
        addItem.playerCode = playerCode;
        addItem.date = date;
        addItem.orderCode = $("#order-search-box").attr("data-order-code");
        addItem.start = start;
        addItem.end = end;
        addItem.duration = calculateDuration(start, end);

        $.post("addFitnessWorklist", JSON.stringify(addItem)).done(function() {
            $("#addDialog").modal("hide");
            
            loadFitnessWorklist();
        }).fail(function() {
           alert("ไม่สามารถเพิ่มข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
        });
    });
    
    function calculateDuration(start, end) {
        var h1 = parseInt(start.substr(0, 2));
        var m1 = parseInt(start.substr(2, 2));
        
        var h2 = parseInt(end.substr(0, 2));
        var m2 = parseInt(end.substr(2, 2));
        
        return ((h2-h1)*60) + (m2-m1);
    }
    
    function convertToTimeNumber(timeText) {
        var h = parseInt(timeText.substr(0, 2));
        var m = parseFloat(timeText.substr(2, 2));
        
        return h + (m/60);
    }
    
    function addWorklistSchedule(item) {
        var start = convertToTimeNumber(item.WklStrDtm);
        var end = convertToTimeNumber(item.WklEndDtm);
        
        var detail = item.OdrLocNam ? " - " + item.OdrLocNam : "";
        
        addSchedule(start, end, item.WklOdrCod + detail);
    }
    
    function resetAddDialogFields() {
        $("#add-error").addClass("hidden");
        
        $(".hour-selection").prop("selectedIndex", 0);
        $(".minute-selection").prop("selectedIndex", 0);
        
        $("#order-search-box").val("");
        $("#order-search-box").removeAttr("data-order-code");
    }
    
    $("#addDialog").on("shown.bs.modal",function () {
        $("#addDialog .modal-body").scrollTop(0);
    });

    
    $(".fitness-worklist-add").click(function() {
//        if (selectedWorklistSeq < 0) {
//            $("#errorDialog .error-content").text("ไม่สามารถเพิ่มเติมรายการได้เนื่องจากไม่มีรายการนัดหมายของวันที่เลือก");
//            $("#errorDialog").modal("show");
//            return;
//        }
        
        var selectedDate = $("#modify-date-selection").datepicker("getDate");           
        var date = $.datepicker.formatDate("yymmdd", selectedDate);
        
        $.get("getAllWorklist/" + playerCode + "/" + date).done(function(result) {
            
            var worklist = jQuery.parseJSON(result);
            
            selectedWorklist = worklist;
            
            $(".calendar-panel .day-event").detach();
            
            for (var index=0; index<worklist.length; index++) {
                addWorklistSchedule(worklist[index]);
            }
            
            resetAddDialogFields();
            
            $("#addDialog").modal("show");
        });      
    });
    
    $("#player-modification-detail").hide();
    
    var startTimeDay = 5;
    var endTimeDay = 21;

    function createHourRow(hour) {
        var $row = $("<div>", { class:"row time-hour-row" });

        var $timeCol = $("<div>", { class:"col-md-1 col-xs-1" });
        var $detailCol = $("<div>", { class:"col-md-11 col-xs-11" });

        if (hour) {
            $timeCol.text(hour);
        }

        $row.append($timeCol);
        $row.append($detailCol);

        return $row;
    }
    
    function zeroPadding(num) {
        var numText = "" + num;
        if (num < 10) {
            numText = "0" + numText;
        }
        
        return numText;
    }
    
    function timeFormat(hour) {
        var hourInt = Math.floor(hour);
        var hourText = zeroPadding(hourInt);
        
        var decimal = (hour - hourInt) * 60;

        var minuteText = zeroPadding(decimal);

        return hourText + ":" + minuteText;
    }

    function createSchedule(startTime, endTime, detail) {
        var startPos = (startTime - startTimeDay)  * 40;
        var height = (endTime-startTime) * 40 + 1;

        var $schedule = $("<div>", { class: "pull-left day-event event-info" } );

        var $header = $("<div>", { class: "header" } );
        $header.text(timeFormat(startTime) + " - " + timeFormat(endTime));

        $schedule.append($header);
        $schedule.append(detail);

        $schedule.css("top", startPos);
        $schedule.css("height", height);

        return $schedule;
    }

    function addSchedule(startTime, endTime, detail) {
        $(".calendar-panel").append(createSchedule(startTime, endTime, detail));
    }

    function initializeTimeSelectOption() {
        var $option = $(".hour-selection");
        
        for (var time=startTimeDay; time<=endTimeDay; time++) {
            $("<option>", { value: zeroPadding(time) }).text(time).appendTo($option);
        }
    }

    $(function() {          
        var $timeTable = $(".time-hour");

        for (var time=startTimeDay; time<=endTimeDay; time++) {
            var $row = createHourRow(timeFormat(time));
            $timeTable.append($row);

            $row = createHourRow();
            $timeTable.append($row);
        }
        
        initializeTimeSelectOption();
    });
</script>