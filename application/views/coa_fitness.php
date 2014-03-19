<style>
#coach-fitness {
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;
}

#coach-fitness .date-select-section {
    height: 40px;
    width: auto;
    
    display: block;
    
    vertical-align: middle;
    
    margin-top: 5px;
    margin-left: 10px;
    margin-right: 10px;
}

#ui-datepicker-div {
    font-size: 14px;
}

#player-search {
    padding-left: 22px;
    background: url("../../images/search-magnify.png") no-repeat;
    background-position: 3px center;
    
    width: 250px;
    font-size: 13px;
}

#coach-fitness .schedule-section {
    height: auto;
    
    position: absolute;
    
    top: 40px;
    bottom: 0;
    left: 0;
    right: 0;
    
    padding: 5px;
    
    overflow: auto;
}

#coach-fitness .row-header {
    font-weight: bold;
    
    font-size: 16px;
    
    padding: 5px 0 5px 5px;
    
    background-color: #F0F0F0;
    
    border-width: 0 0 1px 0;
    border-style: solid;
    border-color: #AAA;
}

#coach-fitness .row-item {
    font-size: 14px;
    
    padding: 5px 0px 5px 20px;
    
    border-width: 0 0 1px 0;
    border-style: solid;
    border-color: #AAA;
}
</style>
<div id="coach-fitness">
    <div class="date-select-section">
        <div class="form-inline">
            <input id="date-selection" type="text" class="form-control input-sm pull-left"></input>
            <input id="player-search" type="text" class="form-control input-sm pull-right hidden"></input>
        </div>
    </div>
    <div class="schedule-section">
        
    </div>
</div>
<script>
    var scheduleDates = undefined;
    var permission = <?php echo json_encode($permission) ?>;
    
    $(function() {
        $("#date-selection").datepicker({ 
            dateFormat: "dd/mm/yy", 
            onSelect: function() {
                loadFitnessSchedule($(this));
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
                getCoachFitnessDates(year, paddingMonth);
            }
        });
        $("#date-selection").datepicker("setDate", new Date());
        
        loadFitnessSchedule($("#date-selection"));
    });
    
    function getCoachFitnessDates(year, month) {
        scheduleDates = undefined;
                
        $.get("getFitnessScheduleDates/" + year + "/" + month).done(function(result) {
            var appointmentDates = jQuery.parseJSON(result);

            scheduleDates = [];
            for (var index=0; index<appointmentDates.length; index++) {
                scheduleDates.push(appointmentDates[index].PwlAppDte);
            }
            $("#date-selection").datepicker("refresh");
        });
    }
    
    function loadFitnessSchedule($dateSelector) {
        var date = getDateFromDatePicker($dateSelector, "yymmdd");
        
        $.get("getFitnessSchedule/" + date).done(function(result) {
            var schedule = jQuery.parseJSON(result);
            
            var $scheduleTable = $(".schedule-section");
            $scheduleTable.empty();
            
            var startDate = "";
            var endDate = "";
            var workCode = "";
            
            if (schedule.length === 0) {
                $("<div>").text("*** ไม่มีรายการฟิตเนสของวันที่เลือก").appendTo($scheduleTable);
                
                return;
            }
            
            for (var index=0; index<schedule.length; index++) {
                var item = schedule[index];
                if (startDate !== item.WklStrDtm || endDate !== item.WklEndDtm ||
                        workCode !== item.WklOdrCod) {
                    startDate = item.WklStrDtm;
                    endDate = item.WklEndDtm;
                    workCode = item.WklOdrCod;
                    
                    addScheduleHeader($scheduleTable, item);
                }
                
                addScheduleRow($scheduleTable, item);
            }
        });
    }
    
    function addScheduleHeader($table, item) {
        var $row = $("<div>", { "class": "row-header" });
        
        $row.text(formatTime(item.WklStrDtm) + " - " + formatTime(item.WklEndDtm) + " " + item.OdrLocNam);
        
        $table.append($row);
    }
    
    function addScheduleRow($table, item) {
        var $row = $("<div>", { "class": "row-item" });
        
        $row.text(formatName(item.PlyFstNam, item.PlyFamNam, item.PlyFstEng, item.PlyFamEng));
        
        $table.append($row);
    }
    
    function formatTime(time) {
        return time.substr(0, 2) + ":" + time.substr(2, 2);
    }
    
    function formatName(firstName, lastName, nameEng, lastEng) {
        if (firstName) {
            return firstName + " " + lastName;
        }
        
        return nameEng + " " + lastEng;
    }
    
    function getDateFromDatePicker($datePicker, formatDate) {
        var selectedDate = $datePicker.datepicker("getDate");

        return $.datepicker.formatDate(formatDate, selectedDate);
    }
</script>