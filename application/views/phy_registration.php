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
    tableHtml += "<th>เวลาเริ่ม</th>";
    tableHtml += "<th>เวลาสิ้นสุด</th>";
    tableHtml += "<th>ชื่อรายการ</th>";
    tableHtml += "<th>รูป</th>";
    tableHtml += "<th>ชื่อ</th>";
    tableHtml += "<th>นามสกุล</th>";
    tableHtml += "<th></th>";
    tableHtml += "</tr>";
    tableHtml += "</thead>";
    tableHtml += "<tbody>";
    tableHtml += "</tbody>";
    tableHtml += "</table>";
    
    var $tableTemplate = $(tableHtml);
    
    var permission = <?php echo json_encode($permission) ?>;
    
    function getCurrentDate() {
        var currentDate = $.datepicker.formatDate("yymmdd", new Date());
        return currentDate;
    }
    
    function createRegistrationWaitingListRow(rowNum, player) {
        var $row = $("<tr>");
        
        $("<td>", { "class":"cell-normal" }).text(rowNum).appendTo($row);
        $("<td>", { "class":"cell-normal" }).text(formatDbTime(player.WklStrDtm)).appendTo($row);
        $("<td>", { "class":"cell-normal" }).text(formatDbTime(player.WklEndDtm)).appendTo($row);
        $("<td>", { "class":"cell-normal" }).text(player.OdrLocNam).appendTo($row);
        
        var $playerImage = $("<img>", { "class":"thumbnail-image", "src":"../player/thumbnail/" + player.PlyCod });
        $("<td>", { "class":"cell-normal" }).append($playerImage).appendTo($row);
        $("<td>", { "class":"cell-normal" }).text(player.PlyFstNam).appendTo($row);
        $("<td>", { "class":"cell-normal" }).text(player.PlyFamNam).appendTo($row);
        
        if (permission.write) {
            var $registerButton = $("<div>", { "class":"btn btn-info" });
            $registerButton.text("ลงทะเบียน");
            $registerButton.click(function() {
                var registerInfo = {
                    worklistSeq: player.WklPwlSeq,
                    itemSeq: player.WklSeqNum,
                    department: "PHY"
                }
                $.post("../worklist_item/registerWorklist", JSON.stringify(registerInfo)).done(function() {
                    $row.detach();
                }).fail(function() {
                   alert("ไม่สามารถลงทะเบียนได้ โปรดลองอีกครั้งหนึ่ง");
                });
            });
            $("<td>", { "class":"cell-normal" }).append($registerButton).appendTo($row);
        }
        else {
            $("<td>", { "class":"cell-normal" }).appendTo($row);
        }
        
        return $row;
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
                    createRegistrationWaitingListRow(index+1, players[index]).appendTo($tableBody);
                }

                $waitingList.append($table);
            }
            else {
                $waitingList.append("<div>** ไม่มีข้อมูลการลงทะเบียนของวันปัจจุบัน</div>");
            }

            $waitingList.append("<div class='last-update-row'><b>ปรับปรุงล่าสุด:</b> " + new Date() + "</div>");
            phyRegistrationTimeout = setTimeout(function() { getRegistrationWaitingList(); }, pollingTime);
        }).fail(function(jqXHR, textStatus) {
            // Do nothing
        });
    }
    
    function createRegistrationDoneListRow(rowNum, player) {
        var $row = $("<tr>");
        
        $("<td>", { "class":"cell-normal" }).text(rowNum).appendTo($row);
        $("<td>", { "class":"cell-normal" }).text(formatDbTime(player.WklStrDtm)).appendTo($row);
        $("<td>", { "class":"cell-normal" }).text(formatDbTime(player.WklEndDtm)).appendTo($row);
        $("<td>", { "class":"cell-normal" }).text(player.OdrLocNam).appendTo($row);
        
        var $playerImage = $("<img>", { "class":"thumbnail-image", "src":"../player/thumbnail/" + player.PlyCod });
        $("<td>", { "class":"cell-normal" }).append($playerImage).appendTo($row);
        $("<td>", { "class":"cell-normal" }).text(player.PlyFstNam).appendTo($row);
        $("<td>", { "class":"cell-normal" }).text(player.PlyFamNam).appendTo($row);
        $("<td>", { "class":"cell-normal" }).appendTo($row);
        
        return $row;
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
                    createRegistrationDoneListRow(index+1, players[index]).appendTo($tableBody);
                }

                $receiveList.append($table);
            }
            else {
                $receiveList.append("<div>** ไม่มีข้อมูลการลงทะเบียนของวันปัจจุบัน</div>");
            }

            $receiveList.append("<div class='last-update-row'><b>ปรับปรุงล่าสุด:</b> " + new Date() + "</div>");
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