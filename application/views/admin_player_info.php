<style>
#admin-player-info {
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;
}

#admin-player-info .date-select-section {
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

#admin-player-info .player-info-section {
    height: auto;
    
    position: absolute;
    
    top: 40px;
    bottom: 0;
    left: 0;
    right: 0;
    
    padding: 5px;
    
    overflow: auto;
}

/*CSS Tab*/
#player-info-tab, #player-detail-tab {
    padding: 0px; 
    background: none; 
    border-width: 0px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;
}

#player-info-tab .ui-tabs-nav, #player-detail-tab .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 1px 0px; 
    -moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px;
}

#player-info-tab .ui-tabs-nav li {
    width: 49%;
    
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

#player-detail-tab .ui-tabs-nav li {
    width: 30%;
    
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

#player-info-tab .ui-tabs-nav li a, #player-detail-tab .ui-tabs-nav li a {
    width: 100%;
    
    outline: none;
}

#player-info-tab .ui-tabs-panel, #player-detail-tab .ui-tabs-panel {
    padding-top: 5px;
    border-width: 0px 1px 1px 1px;
    
    font-size: 14px;
}

#player-detail-tab .ui-tabs-panel {
    min-height: 135px;
}

#player-info-tab .player-picture {
    width: auto;
    height: 200px;
}

#admin-comment .comment {
    width: 100%;
    min-height: 220px;
    overflow-y: auto;
    
    padding: 2px;
    
    border: #AAA solid 1px;
}

#admin-comment .comment-edit {
    width: 100%;
    
    min-height: 220px;
}

#player-info {
    overflow: auto;
}

#admin-player-info .fit-content {
    width: 1px;
    white-space: nowrap;
    
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}

#admin-player-info .content {
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}

.list-auto-item {
    font-size: 13px;
}
</style>
<div id="admin-player-info">
    <div class="date-select-section">
        <div class="form-inline">
            <input id="date-selection" type="text" class="form-control input-sm pull-left"></input>
            <input id="player-search" type="text" class="form-control input-sm pull-right"></input>
        </div>
    </div>
    <div class="player-info-section">
        <div id="player-info-tab">
            <ul>
                <li><a href="#player-info">ข้อมูลนักกีฬา</a></li>
                <li><a href="#schedule-table">ตารางการฝึกซ้อม</a></li>
            </ul>
            <div id="player-info">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12"><img class="player-picture" src="../../images/no-image.png" /></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div style="font-weight: bold; margin-top: 5px;">บันทึกของโค้ช</div>
                                <div id="admin-comment">
                                    <div class="stretch comment" title="ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div id="player-detail-tab">
                            <ul>
                                <li><a href="#player-general-info">ข้อมูลทั่วไป</a></li>
                                <li><a href="#player-physical-info">ข้อมูลกายภาพ</a></li>
                                <li><a href="#player-efficiency-info">สมรรถนะ</a></li>
                            </ul>
                            <div id="player-general-info"></div>
                            <div id="player-physical-info"></div>
                            <div id="player-efficiency-info"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="schedule-table"></div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#player-info-tab").tabs({heightStyle: "fill"});
        $("#player-detail-tab").tabs({heightStyle: "fill"});
        
        $("#date-selection").datepicker({ 
            dateFormat: "dd/mm/yy", 
            onSelect: function() {
                getPlayerSchedule();
            }
        });
        $("#date-selection").datepicker("setDate", new Date());
        
        $("#player-search").autocomplete({
            source: "../player/search",
            minLength: 2,
            focus: function(event, ui) {            
                return false;
            },
            select: function(event, ui) {
                $("#player-search").val("");

                $("#admin-player-info").attr("data-player-code", ui.item.PlyCod);
                
                getPlayerInfo(ui.item.PlyCod);
                
                getPlayerSchedule();
                
                return false;
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            var displayName = getDisplayNameWithEng(item.PlyFstNam, item.PlyFamNam, item.PlyFstEng, item.PlyFamEng);
            return $("<li class='list-auto-item'>").append("<a>" + displayName + "</a>" ).appendTo(ul);
        };
        
        $("#admin-comment .stretch").tooltip();
    });
    
    function getPlayerInfo(playerCode) {
        $.get("getPlayerInfo/" + playerCode).done(function(result) {
            var info = jQuery.parseJSON(result);
            
            $(".player-picture").attr("src", "../player/thumbnail/" + playerCode + "?width=200&height=200");
            
            $("#admin-comment .stretch").text("");
            
            if (info.comment.PlcCmt) {
                $("#admin-comment .stretch").text(info.comment.PlcCmt);
            }
            
            displayGeneralInfo(info.detail);
        });
    }
    
    function displayGeneralInfo(item) {
        var $section = $("#player-general-info");
        $section.empty();
        
        var $table = $("<table>", { "class": "table table-condensed" });

        createRow("ชื่อ", item.PlyFstNam).appendTo($table);
        createRow("นามสกุล", item.PlyFamNam).appendTo($table);
        createRow("FirstName", item.PlyFstEng).appendTo($table);
        createRow("LastName", item.PlyFamEng).appendTo($table);
        createRow("เพศ", item.PlySexTyp ? item.PlySexTyp === "M" ? "ชาย" : "หญิง" : "ไม่มีข้อมูล").appendTo($table);
        
        $section.append($table);
    }
    
    function createRow(fieldName, fieldValue) {
        var $row = $("<tr>");
        
        $("<td>", {"class": "fit-content", "style": "font-weight: bold; border-width: 0;"}).text(fieldName).appendTo($row);
        $("<td>", {"class": "content", "style": "border-width: 0;"}).text(fieldValue).appendTo($row);
        
        return $row;
    }
    
    function getDisplayNameWithEng(name, lastname, nameEng, lastnameEng) {
        var displayText;
        if (name) {
            displayText = name + " " + lastname;
        }

        if (nameEng) {
            if (displayText) {
                displayText += " (" + nameEng + " " + lastnameEng + ")";
            }
            else {
                displayText = nameEng + " " + lastnameEng;
            }
        }

        return displayText;
    }
    
    function getPlayerSchedule() {
        var playerCode = $("#admin-player-info").attr("data-player-code");
        if (!playerCode) {
            return;
        }
        
        var selectedDate = $("#date-selection").datepicker("getDate");           
        var date = $.datepicker.formatDate("yymmdd", selectedDate);
        
        $.get("getPlayerWorklist/" + playerCode + "/" + date).done(function(result) {
            var worklists = jQuery.parseJSON(result);
                    
            var $section = $("#schedule-table");
            $section.empty();

            var $table = $("<table>", {"class": "table table-condensed table-striped"});
            
            for (var index=0; index<worklists.length; index++) {
                createScheduleRow(worklists[index]).appendTo($table);
            }
            
            $section.append($table);
        });
    }
    
    function createScheduleRow(item) {
        var $row = $("<tr>");
        
        $("<td>", { class: "fit-content" }).text(formatTime(item.WklStrDtm) + " - " + formatTime(item.WklEndDtm)).appendTo($row);
        $("<td>", { class: "content" }).text(item.OdrLocNam).appendTo($row);
        
        return $row;
    }
    
    function formatTime(time) {
        return time.substr(0, 2) + ":" + time.substr(2, 2);
    }
    
    var currentComment = "";
    var editMode = false;
    
    function convertToTextArea($section) {       
        var $commentDiv = $section.children(".stretch");
        $commentDiv.tooltip('hide');
        $commentDiv.detach();
        
        currentComment = $commentDiv.text();
        
        var $commentBox = $("<textarea class='stretch comment-edit'></textarea>");
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
    
    $("#admin-comment").dblclick(function() {
        if (editMode) {
            return false;
        }
        
        if (!$("#admin-player-info").attr("data-player-code")) {
            return false;
        }
        
        convertToTextArea($(this));
    });
    $("#admin-comment").focusout(function() {
        var $section = $(this);
        
        var $commentBox = $section.children(".stretch");
        
        if ($commentBox.val() === currentComment) {
            convertToDiv($section);
        } 
        else {
            var result = {};
            result.playerCode = $("#admin-player-info").attr("data-player-code");
            result.comment = $commentBox.val();
            result.category = "COA";
            
            $.post("../player/updateComment", JSON.stringify(result)).done(function() {
                convertToDiv($section);
            }).fail(function() {
                alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
            });
        }
    });
</script>