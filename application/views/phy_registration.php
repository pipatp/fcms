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

.cell-normal {
    vertical-align: middle !important;
}

.thumbnail-image {
    width: auto;
    height: 50px;
}
</style>
<div id="registration-tab">
    <ul>
        <li><a href="#tabs-1">รอลงทะเบียนกายภาพบำบัด</a></li>
        <li><a href="#tabs-2">ลงทะเบียนกายภาพบำบัดแล้ว</a></li>
    </ul>
    <div id="tabs-1">
        <div id="waiting-list-player">
        </div>
    </div>
    <div id="tabs-2">
        <div id="receive-list-player">
        </div>
    </div>
</div>
<script>
    var phyRegistrationTimeout;
    var pollingTime = 30000;
    
    var tableHtml = "<table class='table table-striped table-condensed'>";
    tableHtml += "<thead>";
    tableHtml += "<th>#</th>";
    tableHtml += "<th>รูป</th>";
    tableHtml += "<th>ชื่อ</th>";
    tableHtml += "<th>นามสกุล</th>";
    tableHtml += "</tr>";
    tableHtml += "</thead>";
    tableHtml += "<tbody>";
    tableHtml += "</tbody>";
    tableHtml += "</table>";
    
    var $tableTemplate = $(tableHtml);
    
    function getCurrentDate() {
        var currentDate = $.datepicker.formatDate("yymmdd", new Date());
        return currentDate;
    }
    
    function getRegistrationWaitingList() {
        clearTimeout(phyRegistrationTimeout);
        
        $.ajax("getPhysicalWaitingList/" + getCurrentDate()).done(function(result) {
            var $waitingList = $("#waiting-list-player");
            $waitingList.empty();

            var players = jQuery.parseJSON(result);

            if (players.length > 0) {
                $table = $tableTemplate.clone();
                $tableBody = $($table.find("tbody"));
                for (var index=0; index<players.length; index++) {
                    $tableBody.append("<tr><td class='cell-normal'>" + (index+1) + 
                        "</td><td class='cell-normal'><img class=\"thumbnail-image\" src=\"../player/thumbnail/" + 
                        players[index].PlyCod + "\" /></td><td class='cell-normal'>" + players[index].PlyFstNam + 
                        "</td><td class='cell-normal'>" + players[index].PlyFamNam + "</td></tr>");
                }

                $waitingList.append($table);
            }
            else {
                $waitingList.append("<div>** ไม่มีข้อมูลการลงทะเบียนของวันปัจจุบัน</div>");
            }

            $waitingList.append("<div class='last-update-row'><b>ปรับปรุ่งล่าสุด:</b> " + new Date() + "</div>");
            phyRegistrationTimeout = setTimeout(function() { getRegistrationWaitingList(); }, pollingTime);
        }).fail(function(jqXHR, textStatus) {
            // Do nothing
        });
    }
    
    function getRegistrationReceiveList(mealVal) {
        clearTimeout(phyRegistrationTimeout);
        
        $.ajax("getPhysicalRegisteredList/" + getCurrentDate()).done(function(result) {
            var $receiveList = $("#receive-list-player");
            $receiveList.empty();

            var players = jQuery.parseJSON(result);

            if (players.length > 0) {
                $table = $tableTemplate.clone();
                $tableBody = $($table.find("tbody"));
                for (var index=0; index<players.length; index++) {
                    $tableBody.append("<tr><td class='cell-normal'>" + (index+1) + 
                        "</td><td class='cell-normal'><img class=\"thumbnail-image\" src=\"../player/thumbnail/" + 
                        players[index].PlyCod + "\" /></td><td class='cell-normal'>" + players[index].PlyFstNam + 
                        "</td><td class='cell-normal'>" + players[index].PlyFamNam + "</td></tr>");
                }

                $receiveList.append($table);
            }
            else {
                $receiveList.append("<div>** ไม่มีข้อมูลการลงทะเบียนของวันปัจจุบัน</div>");
            }

            $receiveList.append("<div class='last-update-row'><b>ปรับปรุ่งล่าสุด:</b> " + new Date() + "</div>");
            phyRegistrationTimeout = setTimeout(function() { getRegistrationReceiveList(); }, pollingTime);
        }).fail(function(jqXHR, textStatus) {
            // Do nothing
        });
    }
    
    $("#registration-tab").tabs({
        heightStyle: "fill",
        beforeActivate: function(event, ui) {
            if (ui.newPanel.attr('id') === "tabs-1") {
                getRegistrationWaitingList();
            } else {
                getRegistrationReceiveList();
           }
        }
    });
    
    $(function() {
        // Automatic get waiting list because it's first tab shown when page render
        getRegistrationWaitingList();
    });
</script>