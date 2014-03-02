<style>
#fitness-player-info { 
    padding: 0px; 
    background: none; 
    /*border-width: 0px;*/
    /*border: red solid 1px;*/
    
    margin-left: 2px;
    margin-right: 2px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;    
}

.search-box-section {
    margin-top: 5px;
}

#player-search-box {
    padding-left: 22px;
    background: url("../../images/search-magnify.png") no-repeat;
    background-position: 3px center;
    
    width: 250px;
    font-size: 13px;
}

.player-info-section {
    margin-top: 15px;
}

.player-info-section .player-picture {
    width: auto;
    height: 150px;
}

.player-info-section .player-detail {
    display: inline-block;

    vertical-align: top;
}

.list-auto-item {
    font-size: 13px;
}

#fitness-addition-tab { 
    padding: 0px; 
    background: none; 
    border-width: 0px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 13px;
    
    margin-top: 10px;
    
    min-height: 300px;
}

#fitness-addition-tab .ui-tabs-nav, #player-meal-modification-tab .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 1px 0px; 
    -moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px;
}

#fitness-addition-tab .ui-tabs-nav li {
    width: 30%;
    
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

#fitness-addition-tab .ui-tabs-nav li a {
    width: 100%;
        
    outline: none;
}

#fitness-addition-tab .ui-tabs-panel {
    padding: 10px;
    border-width: 0px 1px 1px 1px;
    
    font-size: 13px;
}

#fitness-addition-tab .stretch {
    width: 100%;
    height: 100%;
}
#schedule-tab table {
    width: 100%;
}

#schedule-tab .fit-content {
    width: 1px;
    white-space: nowrap;
    
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}

#schedule-tab .content {
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}

#schedule-tab .control {
    outline: none;
}
</style>
<div id="fitness-player-info">
    <div class="search-box-section">
        <input id="player-search-box" class="form-control input-sm" type="text" placeholder="ค้นหานักกีฬา" />
    </div>
    <div class="fitness-player-info-detail">
        <div class="player-info-section">
            <img class="player-picture" src="" />
            <div class="player-detail"></div>
        </div>
        <div id="fitness-addition-tab">
            <ul>
                <li><a href="#normal-info-tab">ข้อมูลทั่วไป</a></li>
                <li><a href="#physical-info-tab">ข้อมูลทางกายภาพ</a></li>
                <li><a href="#schedule-tab">ตารางนักกีฬาประจำวัน</a></li>
            </ul>
            <div id="normal-info-tab">
                <textarea class="stretch"></textarea>
            </div>
            <div id="physical-info-tab">
                <textarea class="stretch"></textarea>
            </div>
            <div id="schedule-tab">
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th class="fit-content">เริ่ม</th>
                            <th class="fit-content">สิ้นสุด</th>
                            <th class="content">รายการ</th>
                            <th class="fit-content">ระยะเวลา</th>
                            <th class="fit-content">ลงทะเบียน</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var playerCode = "";
    
    $("#fitness-addition-tab").tabs({heightStyle: "fill"});
    
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
    
    $("#player-search-box").autocomplete({
        source: "../player/search",
        minLength: 2,
        focus: function(event, ui) {            
            return false;
        },
        select: function(event, ui) {
            $("#player-search-box").val("");

            displayPlayerInfo(ui.item);
            
            getPlayerInfo();
            
            $(".fitness-player-info-detail").show();
            
            return false;
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item) {
        var displayName = getDisplayNameWithEng(item.PlyFstNam, item.PlyFamNam, item.PlyFstEng, item.PlyFamEng);
        return $("<li class='list-auto-item'>").append("<a>" + displayName + "</a>" ).appendTo(ul);
    };

    function formatTime(timeText) {
        return timeText.substr(0, 2) + ":" + timeText.substr(2, 2);
    }

    function createWorklistItemRow(item) {
        var $row = $("<tr>", { "data-worklist-seq": item.WklPwlSeq, "data-item-seq": item.WklSeqNum,
            "data-item-code": item.WklOdrCod });
        
        $("<td>", { class: "fit-content" }).text(formatTime(item.WklStrDtm)).appendTo($row);
        $("<td>", { class: "fit-content" }).text(formatTime(item.WklEndDtm)).appendTo($row);
        $("<td>", { class: "content" }).text(item.OdrLocNam).appendTo($row);
        $("<td>", { class: "fit-content" }).text(item.WklActDur).appendTo($row);
        
        var checked = item.WklCurStt === "Y" ? true : false;
        var $checkBox = $("<input>", { class:"form-control", type:"checkbox", disabled:"disabled" } );
        
        $checkBox.prop('checked', checked);
        
        $("<td>", { class: "" }).append($checkBox).appendTo($row);
        
        return $row;
    }
    
    function getPlayerInfo() {      
        $.get("getPlayerInfo/" + playerCode + "/" + currentDate).done(function(result) {
            var info = jQuery.parseJSON(result);
            
            var $tableBody = $("#schedule-tab tbody");

            $tableBody.empty();
            
            var worklist = info.schedule;

            if (worklist.length > 0) {
                for (var index=0; index<worklist.length; index++) {
                    var $row = createWorklistItemRow(worklist[index]);

                    $tableBody.append($row);
                }
            } else {
                $("<tr><td class='content' colspan='5'>*** ไม่มีรายการของวันที่เลือก</td></tr>").appendTo($tableBody);
            }
        });
    }
    
    $(".fitness-player-info-detail").hide();
</script>