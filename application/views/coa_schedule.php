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
</style>
<div class="coach-schedule-panel">
    <div class="content">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="schedule-calendar"></div>
            <label>รายละเอียดตารางนัด</label>
            <div class="appointment-detail"></div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="coach-worklist-add btn btn-default"><img src="../../images/add.png" />เพิ่มเติมรายการ</div>
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th class="fix-content"></th>
                        <th class="fit-content">เริ่ม</th>
                        <th class="fit-content">สิ้นสุด</th>
                        <th class="content">รายการ</th>
                        <th class="content"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fix-content"></td>
                        <td class="fit-content">เริ่ม</td>
                        <td class="fit-content">สิ้นสุด</td>
                        <td class="content">รายการ<td>
                        <td class="content"><div class="btn btn-danger btn-sm">ลบ</div></td>
                    </tr>
                </tbody>
            </table>
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
    });
    
    function loadCoachSchedule($datePicker) {
        var date = getDateFromDatePicker($datePicker, "yymmdd");
        
        $.get("getCoachSchedule/" + date).done(function(result) {
            var schedule = jQuery.parseJSON(result);
            
            $(".appointment-detail").text(schedule.appointment.CapAppDtl);
        });
    }
    
    // Utility Functions
    function getDateFromDatePicker($datePicker, formatDate) {
        var selectedDate = $datePicker.datepicker("getDate");

        return $.datepicker.formatDate(formatDate, selectedDate);
    }
</script>