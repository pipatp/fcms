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
                <li><a href="#schedule-table">ตารางการฝึกซ้อม</a></li>
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
                                <li><a href="#player-general-info" id="general">ข้อมูลทั่วไป</a></li>
                                <li><a href="#player-physical-info">ข้อมูลกายภาพและสมรรถนะ</a></li>
                                <li><a href="#player-medical-info" id="med">ข้อมูลทางกายแพทย์</a></li>
                                <li><a href="#player-nutrition-info" id="nut">ข้อมูลทางโภชนาการ</a></li>
                                <li><a href="#player-sport-sce-info" id="science">ข้อมูลวิทยาศาสตร์การกีฬา</a></li>
                                <li><a href="#player-secret-info" id='sec'>ข้อมูลลับ</a></li>
                            </ul>
                            <div id="player-general-info"></div>
                            <div id="player-physical-info"></div>
                            <div id="player-medical-info"></div>
                            <div id="player-nutrition-info"></div>
                            <div id="player-sport-sce-info"></div>
                            <div id="player-secret-info"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="schedule-table">
                <div class="form-group">
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm"  id="all-schedule">รวมทั้งหมด</button>
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm"  id="fitness-schedule">ฟิตเนส</button>
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm"  id="physical-schedule">กายภาพ</button>
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm"  id="nutrition-schedule">โภชนาการ</button>
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
           getPlayerSchedule(playerCode);
           
        
        $('#med').on('click',function(){
            var tagID = $('#player-medical-info');
            var catCom = 'cat=DOC';
            getPlayerComment(playerCode,catCom,tagID);
            
        });
        
        $('#nut').on('click',function(){
            var tagID = $('#player-nutrition-info');
            var catCom = 'cat=NUT';
            getPlayerComment(playerCode,catCom,tagID);
            
        });
           
         $('#sec').on('click',function(){
            var tagID = $('#player-secret-info');
            var catCom = 'cat=SEC';
            getPlayerSecret(playerCode,catCom,tagID);
            
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
        $.get("../player/getPlayerInfo/" + playerCode).done(function(details) {
            var info = jQuery.parseJSON(details);
            
            $(".player-picture").attr("src", "../player/thumbnail/" + playerCode + "?width=200&height=200");
            
            displayGeneralInfo(info.detail);
            displayStatInfo(info.detail);
            displayPhysicalInfo(info.detail);
        });
    }
    
    function displayGeneralInfo(item) {
        var $section = $("#player-general-info");
        $section.empty();
        
        var $table = $("<table>", { "class": "table table-condensed" });

        createRow("ชื่อ", item.PlyFstNam).appendTo($table);
        createRow("นามสกุล", item.PlyFamNam).appendTo($table);
        createRow("ชื่อ(อังกฤษ)", item.PlyFstEng).appendTo($table);
        createRow("นามสกุล(อังกฤษ)", item.PlyFamEng).appendTo($table);
        createRow("เพศ", item.PlySexTyp ? item.PlySexTyp === "M" ? "ชาย" : "หญิง" : "ไม่มีข้อมูล").appendTo($table);
        createRow("สัญชาติ", item.PlyNatCod).appendTo($table);
        createRow("อายุ", item.PlyBirDte).appendTo($table);
        createRow("เลขที่บัตรประชาชน", item.PlyPerNum).appendTo($table);
        createRow("เลขที่พาสปอร์ต", item.PlyPasNum).appendTo($table);
        createRow("ที่อยู่ปัจจุบัน", item.PlyAddDtl).appendTo($table);
        createRow("ที่อยู่ตามบัตรประชาชน", item.PlyAddNum).appendTo($table);
        createRow("เบอร์โทรศัพท์มือถือ", item.PlyPhnNum).appendTo($table);     
        createRow("อีเมลล์แอดเดรส", item.PlyEmlAdd).appendTo($table);
        createRow("ผู้ติดต่อฉุกเฉิน", item.PlyConPer).appendTo($table);
        createRow("เบอร์โทรศัพท์มือถือผู้ติดต่อฉุกเฉิน", item.PlyMblNum).appendTo($table);
        createRow("ศาสนา", item.PlyRegCod ? item.PlyRegCod === '1' ? "พุทธ" : item.PlyRegCod === '2' ? "คริส" : item.PlyRegCod === '3' ? "อิสลาม" : item.PlyRegCod === '4' : "ฮินดู"  ).appendTo($table);
        createRow("วุฒิการศึกษา", item.PlyAddCty).appendTo($table);
        createRow("สโมสรที่เคยเล่น", item.PlyAddPrv).appendTo($table);
        createRow("ตำแหน่ง", item.PlyAddZip).appendTo($table);
        
        $section.append($table);
    }
    
    function displayPhysicalInfo(phy) {
        var $section = $("#player-physical-info");
        $section.empty();
        
        var $table = $("<table>", { "class": "table table-condensed" });
        
        
        createRow("เปิดบอล", phy.PlpCrs,"น้ำหนัก",phy.PlyWgh).appendTo($table) ;
        createRow("จับบอลแรก", phy.PlpFst,"ส่วนสูง",phy.PlyHgh).appendTo($table);
        createRow("โหม่ง", phy.PlpHdd,"รอบอก",phy.PlyChs).appendTo($table);
        createRow("เทคนิค", phy.PlpTch,"ขนาดรองเท้า",phy.PlyFsz).appendTo($table);
        createRow("เลี้ยงบอล", phy.PlpDrb,"เท้าที่ถนัด", phy.PlyFtPrf ? phy.PlyFtPrf === "1" ? "ซ้าย" : phy.PlyFtPrf === "2" ? "ขวา" : phy.PlyFtPrf === "" : "สองเท้า" ).appendTo($table); 
        createRow("เกมรับ", phy.PlpDef).appendTo($table);
        createRow("เตะมุม", phy.PlpCrn).appendTo($table);
        createRow("ทุ่มไกล", phy.PlpThr).appendTo($table);
        createRow("ส่งบอล", phy.PlpPas).appendTo($table);
        createRow("จบสกอร์", phy.PlpFnh).appendTo($table);
        createRow("ยิงไกล", phy.PlpSht).appendTo($table);
        createRow("ป้องกันประตู", phy.PlpGkp).appendTo($table);
         createRow("ยิงไกล", phy.PlpSht).appendTo($table);
        createRow("ความแข็งแกร่ง", phy.PlpStr).appendTo($table);
        createRow("สภาพความฟิต", phy.PlpFtn).appendTo($table);
        createRow("การกระโดด", phy.PlpJum).appendTo($table);
        createRow("สมาธิ", phy.PlpFnh).appendTo($table);
        createRow("ความก้าวร้าว", phy.PlpSht).appendTo($table);
        createRow("การตัดสินใจ", phy.PlpGkp).appendTo($table);
        createRow("เซนส์บอล", phy.PlpFir).appendTo($table);
        createRow("หาตำแหน่ง", phy.PlpOtb).appendTo($table);
        createRow("การยืนตำแหน่งเกมรับ", phy.PlpOtb).appendTo($table);
        createRow("ทีมเวิร์ค", phy.PlpTwk).appendTo($table);
        createRow("ความขัยน", phy.PlpWrt).appendTo($table);
        
        
        
        
        $section.append($table);
    }
    
     function getPlayerComment(playerCode,catCom,tagID) {
        $.ajax("../player/comment/" + playerCode + "?" + catCom).done(function(content) {
            var comment = jQuery.parseJSON(content);
 //           var text = nl2br(comment.PlcCmt);
 //           alert(text);
//            tagID.html(<?php //  nl2br(comment);?>);

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
    
         function getPlayerSecret(playerCode,catCom,tagID) {
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
    
    function displayStatInfo(stat) {
        var $section = $("#player-efficiency-info");
        
        $section.empty();
        
        var $table = $("<table>", { "class": "table table-condensed" });
      
        
        createRow("เปิดบอล", stat.PlpCrs,"เกมรับ",stat.PlpDef).appendTo($table) ;
        createRow("จับบอลแรก", stat.PlpFrs,"ทุ่มไกล",stat.PlpThr).appendTo($table);
        createRow("โหม่ง", stat.PlpHead,"ส่งบอล",stat.PlpPas).appendTo($table);
        createRow("เทคนิค", stat.PlpTch,"จบสกอร์",stat.PlpFnh).appendTo($table);
        createRow("เลี้ยงบอล", stat.PlpDrb,"ยิงไกล",stat.PlpSht).appendTo($table);
        createRow("เตะมุม", stat.PlpCrn,"ป้องกันประตู",stat.PlpGkp).appendTo($table);
        createRow("ฟรีคิ๊ก", stat.PlpFrk).appendTo($table);
        
        
        $section.append($table) ;
    }
    
    function createRow(fieldName1, fieldValue1,fieldName2, fieldValue2) {
        var $row = $("<tr>");
        
        $("<td>", {"class": "fit-content", "style": "font-weight: bold; border-width: 0;"}).text(fieldName1).appendTo($row);
        $("<td>", {"class": "content", "style": "border-width: 0;"}).text(fieldValue1).appendTo($row);
        
        $("<img>", { "src": "../../images/point-up-icon.png" });
        $("<td>", {"class": "fit-content", "style": "font-weight: bold; border-width: 0;"}).text(fieldName2).appendTo($row);
        $("<td>", {"class": "content", "style": "border-width: 0;"}).text(fieldValue2).appendTo($row);
        $("<img>", { "src": "../../images/point-up-icon.png" });
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
<script>
    
    $('#physical-schedule').on('click',function(){
    
  //          alert('qqqq');
    
    });
    
</script>    