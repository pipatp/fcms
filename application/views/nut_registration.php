<style type="text/css">
#registration-tab { 
    padding: 0px; 
    background: none; 
    border-width: 0px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;
}

#registration-tab .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 1px 0px; 
    -moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px;
}

#registration-tab .ui-tabs-nav li {
    width: 49%;
    
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

#registration-tab .ui-tabs-nav li a {
    width: 100%;
    
    outline: none;
}

#registration-tab .ui-tabs-panel {
    border-width: 0px 1px 1px 1px;
    
    font-size: 13px;
}

.player-registration-row {
    margin-top: 5px;
}

.last-update-row {
    margin-top: 10px;
}
</style>
<div id="registration-tab">
    <ul>
        <li><a href="#tabs-1">รอลงทะเบียนรับอาหาร</a></li>
        <li><a href="#tabs-2">รับรายการอาหารแล้ว</a></li>
    </ul>
    <div id="tabs-1">
        <div>มื้ออาหาร</div>
        <select id="waiting-list-meal-option" style="margin-bottom: 15px;">
            <option value=""></option>
            <option value="BRK">มื้อเช้า</option>
            <option value="LNH">มื้อกลางวัน</option>
            <option value="DES">อาหารว่าง</option>
            <option value="DIN">มื้อเย็น</option>
        </select>
        <div id="waiting-list-player">
        </div>
    </div>
    <div id="tabs-2">
        <div>มื้ออาหาร</div>
        <select id="receive-list-meal-option" style="margin-bottom: 15px;">
            <option value=""></option>
            <option value="BRK">มื้อเช้า</option>
            <option value="LNH">มื้อกลางวัน</option>
            <option value="DES">อาหารว่าง</option>
            <option value="DIN">มื้อเย็น</option>
        </select>
        <br/>
        <div id="receive-list-player">
        </div>
    </div>
</div>
<script>
    var timeoutVar;
    var pollingTime = 5000;
    
    var tableHtml = "<table class='table table-striped table-condensed'>";
    tableHtml += "<thead>";
    tableHtml += "<th>#</th>";
    tableHtml += "<th>ชื่อ</th>";
    tableHtml += "<th>นามสกุล</th>";
    tableHtml += "</tr>";
    tableHtml += "</thead>";
    tableHtml += "<tbody>";
    tableHtml += "</tbody>";
    tableHtml += "</table>";
    
    var $tableTemplate = $(tableHtml);
    
    function getRegistrationWaitingList(mealVal) {
        clearTimeout(timeoutVar);
        
        if (mealVal !== "") {
            $.ajax("getRegistrationWaitingList/" + mealVal).done(function(result) {
                var $waitingList = $("#waiting-list-player");
                $waitingList.empty();

                var players = jQuery.parseJSON(result);
                    
                if (players.length > 0) {
                    $table = $tableTemplate.clone();
                    $tableBody = $($table.find("tbody"));
                    for (var index=0; index<players.length; index++) {
                        $tableBody.append("<tr><td>" + (index+1) + "</td><td>" + players[index].PlyFstNam + "</td><td>" +
                            players[index].PlyFamNam + "</td></tr>");
                    }

                    $waitingList.append($table);
                }
                else {
                    $waitingList.append("<div>** ไม่มีข้อมูลการลงทะเบียนของวันปัจจุบัน</div>");
                }
                
                $waitingList.append("<div class='last-update-row'><b>ปรับปรุ่งล่าสุด:</b> " + new Date() + "</div>");
                timeoutVar = setTimeout(function() { getRegistrationWaitingList(mealVal); }, pollingTime);
            }).fail(function(jqXHR, textStatus) {
                // Do nothing
            });
        }
    }
    
    function getRegistrationReceiveList(mealVal) {
        clearTimeout(timeoutVar);
        
        if (mealVal !== "") {
            $.ajax("getRegistrationReceiveList/" + mealVal).done(function(result) {
                var $receiveList = $("#receive-list-player");
                $receiveList.empty();

                var players = jQuery.parseJSON(result);
                
                if (players.length > 0) {
                    $table = $tableTemplate.clone();
                    $tableBody = $($table.find("tbody"));
                    for (var index=0; index<players.length; index++) {
                        $tableBody.append("<tr><td>" + (index+1) + "</td><td>" + players[index].PlyFstNam + "</td><td>" +
                            players[index].PlyFamNam + "</td></tr>");
                    }
                    
                    $receiveList.append($table);
                }
                else {
                    $receiveList.append("<div>** ไม่มีข้อมูลการลงทะเบียนของวันปัจจุบัน</div>");
                }
                
                $receiveList.append("<div class='last-update-row'><b>ปรับปรุ่งล่าสุด:</b> " + new Date() + "</div>");
                timeoutVar = setTimeout(function() { getRegistrationReceiveList(mealVal); }, pollingTime);
            }).fail(function(jqXHR, textStatus) {
                // Do nothing
            });
        }
    }
    
    $("#registration-tab").tabs({
        heightStyle: "fill",
        beforeActivate: function(event, ui) {
            if (ui.newPanel.attr('id') === "tabs-1") {
                var mealVal = $("#waiting-list-meal-option").val();
                getRegistrationWaitingList(mealVal);
            } else {
                 var mealVal = $("#receive-list-meal-option").val();
                getRegistrationReceiveList(mealVal);
           }
        }
    });
    
    $("#waiting-list-meal-option").change(function() {
        var mealVal = $(this).val();
        
        getRegistrationWaitingList(mealVal);
    });
    
    $("#receive-list-meal-option").change(function() {
        var mealVal = $(this).val();
        
        getRegistrationReceiveList(mealVal);
    });
</script>