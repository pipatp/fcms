<style>
#coach-player-info {
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;
}

#coach-player-info .date-select-section {
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

#coach-player-info .player-info-section {
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

#coach-comment .comment {
    width: 100%;
    min-height: 220px;
    overflow-y: auto;
    
    padding: 2px;
    
    border: #AAA solid 1px;
}

#coach-comment .comment-edit {
    width: 100%;
    
    min-height: 220px;
}

#player-info {
    overflow: auto;
}

#coach-player-info .fit-content {
    width: 1px;
    white-space: nowrap;
    
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}

#coach-player-info .content {
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}

.list-auto-item {
    font-size: 13px;
}
</style>
<div id="coach-player-info">
    <div class="date-select-section">
        <div class="form-inline">
            <input id="date-selection" type="text" class="form-control input-sm pull-left"></input>
            <select id="player-search" type="text" class="form-control input-sm pull-right">
                <option value="0">เลือกนักเตะ</option>
            </select>
        </div>
    </div>
    <div class="player-info-section">
        <div id="player-info-tab">
            <ul>
                <li><a href="#player-info">ข้อมูลนักกีฬา</a></li>
            </ul>
            <div id="player-info">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12"><img class="player-picture" src="../../images/no-image.png" /></div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div id="player-detail-tab">
                            <ul>
                                <li><a href="#player-doctor-info" id="doc">รายงานแพทย์</a></li>
                                <li><a href="#player-coach-info" id="coa">รายงานโค้ช</a></li>
                                <li><a href="#player-fitness-info" id="fit">รายงานฟิตเนส</a></li>
                                <li><a href="#player-nutrition-info" id="nut">รายงานโภชนาการ</a></li>
                                <li><a href="#player-physical-report" id="phy">รายงานกายภาพ</a></li>
                            </ul>
                            
                            <div id="player-doctor-info"></div>
                            <div id="player-coach-info"></div>
                            <div id="player-fitness-info"></div>
                            <div id="player-nutrition-info"></div>
                            <div id="player-physical-report"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#player-info-tab").tabs({heightStyle: "fill"});
        $("#player-detail-tab").tabs({heightStyle: "fill"});
        
        
        $.ajax("../player/getPlayer").done(function(content) {

        var player = jQuery.parseJSON(content);

        $.each(player ,function(index,value)
        {
         $("#player-search").append("<option value="+value.PlyCod+">"+value.PlyFstNam+ ' ' +value.PlyFamNam+  "</option>");
        
         });
         
        });
        
        $('#player-search').change(function(){
           var playerCode = $('#player-search').val();
           getPlayerInfo(playerCode);
           
        
        $('#fit').on('click',function(){
//            var playerCode = $('#player-search').val();
            var tagID = $('#player-fitness-info');
            var catCom = 'cat=FIT';
            getPlayerComment(playerCode,catCom,tagID);
            
        });
        
        $('#phy').on('click',function(){
   //         var playerCode = $('#player-search').val();
            var tagID = $('#player-physical-report');
            var catCom = 'cat=PHY';
            getPlayerComment(playerCode,catCom,tagID);
            
        });
           
         $('#coa').on('click',function(){
  //          var playerCode = $('#player-search').val();
            var tagID = $('#player-coach-info');
            var catCom = 'cat=COA';
            getPlayerComment(playerCode,catCom,tagID);
            
        });   
           
           $('#nut').on('click',function(){
  //          var playerCode = $('#player-search').val();
            var tagID = $('#player-nutrition-info');
            var catCom = 'cat=NUT';
            getPlayerComment(playerCode,catCom,tagID);
            
        });   
           
           $('#doc').on('click',function(){
 //           var playerCode = $('#player-search').val();
            var tagID = $('#player-doctor-info');
            var catCom = 'cat=DOC';
            getPlayerComment(playerCode,catCom,tagID);
            
        });  
        });
        
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

                $("#coach-player-info").attr("data-player-code", ui.item.PlyCod);
                
                getPlayerInfo(ui.item.PlyCod);
                
                getPlayerSchedule();
                
                return false;
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            var displayName = getDisplayNameWithEng(item.PlyFstNam, item.PlyFamNam, item.PlyFstEng, item.PlyFamEng);
            return $("<li class='list-auto-item'>").append("<a>" + displayName + "</a>" ).appendTo(ul);
        };
        
        $("#coach-comment .stretch").tooltip();
    });
    
    function getPlayerInfo(playerCode) {
        $.get("../coach/getPlayerInfo/" + playerCode).done(function(result) {
            var info = jQuery.parseJSON(result);
            
            $(".player-picture").attr("src", "../player/thumbnail/" + playerCode + "?width=200&height=200");
            
            
            
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
    
        function getPlayerComment(playerCode,catCom,tagID) {
        $.ajax("../player/comment/" + playerCode + "?" + catCom).done(function(result) {
            var comment = jQuery.parseJSON(result);
 //           var text = nl2br(comment.PlcCmt);
 //           alert(text);
            if (comment.PlcCmt) {
               var comment = comment.PlcCmt;
               comment = comment.replace(/\r?\n/g,'<br/>');
                tagID.html(comment);
            }
            else {
                tagID.text("");
            }
        });
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
        var playerCode = $("#coach-player-info").attr("data-player-code");
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
    
  

    
    function convertToDiv($section) {
        var $commentBox = $section.children(".stretch");
        $commentBox.detach();
        
        var $commentDiv = $("<div class='stretch comment' title='ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข'></div>");
        $commentDiv.text($commentBox.val());
        
        $commentDiv.tooltip();
        
        $section.append($commentDiv);
        
        editMode = false;
    }
    
    $("#coach-comment").dblclick(function() {
        if (editMode) {
            return false;
        }
        
        if (!$("#coach-player-info").attr("data-player-code")) {
            return false;
        }
        
        convertToTextArea($(this));
    });
    $("#player-secret-info").focusout(function() {
        var $section = $(this);
        
        var $commentBox = $section.children(".stretch");
        
        if ($commentBox.val() === currentComment) {
            convertToDiv($section);
        } 
        else {
            var result = {};
            result.playerCode = $("#coach-player-info").attr("data-player-code");
            result.comment = $commentBox.val();
            result.category = "SEC";
            
            $.post("../player/updateComment", JSON.stringify(result)).done(function() {
                convertToDiv($section);
            }).fail(function() {
                alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
            });
        }
    });
</script>