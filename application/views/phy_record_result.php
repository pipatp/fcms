<style>
#physical-record-result { 
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

#player-select-input {
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

#physical-addition-tab { 
    padding: 0px; 
    background: none; 
    border-width: 0px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 13px;
    
    margin-top: 10px;
    
    min-height: 300px;
}

#physical-addition-tab .ui-tabs-nav, #player-meal-modification-tab .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 1px 0px; 
    -moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px;
}

#physical-addition-tab .ui-tabs-nav li {
    width: 49%;
    
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

#physical-addition-tab .ui-tabs-nav li a {
    width: 100%;
        
    outline: none;
}

#physical-addition-tab .ui-tabs-panel {
    padding: 10px;
    border-width: 0px 1px 1px 1px;
    
    font-size: 13px;
}

#physical-addition-tab .stretch {
    width: 100%;
    height: 100%;
    
    font-family: Helvetica,tahoma, sans-serif;
}

#physical-addition-tab .comment {
    border: #AAA solid 1px;
    padding: 2px;
    
    white-space: pre;
}

.fit-content {
    width: 1px;
    white-space: nowrap;
    
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}

.content {
    white-space: pre;
}
</style>
<div id="physical-record-result">
    <div class="search-box-section">
        <select id="player-select-input" class="form-control input-sm" style="width:300px;">
            <option value=""></option>
            <?php 
            foreach ($players as $player) {
            ?>
            <option value="<? echo $player->PlyCod ?>">
                <?php
                    $fullName = "";
                    if (strlen($player->PlyFstNam) > 0) {
                        $fullName = $player->PlyFstNam . " " . $player->PlyFamNam;
                    }
                    
                    if (strlen($player->PlyFstEng) > 0) {
                        if (strlen($fullName) > 0) {
                            $fullName = $fullName . " (" . $player->PlyFstEng . " " . $player->PlyFamEng . ")";
                        }
                        else {
                            $fullName = $player->PlyFstEng . " " . $player->PlyFamEng;
                        }
                    }
                    echo $fullName;
                ?>
            </option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="physical-record-detail">
        <div class="player-info-section">
            <img class="player-picture" src="" />
            <div class="player-detail"></div>
        </div>
        <div id="physical-addition-tab">
            <ul>
                <li><a href="#report-tab">รายงานผลจากนักกายภาพ</a></li>
                <li><a href="#suggestion-tab">คำแนะนำของนักกายภาพ</a></li>
            </ul>
            <div id="report-tab">
                <div id="result-history-button" class="btn btn-info" style="margin-bottom: 5px;">ประวัติรายงานผลของนักกายภาพ</div>
                <div class="stretch comment" title="ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข" readonly></div>
            </div>
            <div id="suggestion-tab">
                <div id="suggestion-history-button" class="btn btn-info" style="margin-bottom: 5px;">ประวัติคำแนะนำของนักกายภาพ</div>
                <div class="stretch comment" title="ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข" readonly></div>
            </div>
        </div>
    </div>
</div>
<div id="historyDialog" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"></div>
            <div class="modal-body" style='overflow-y: auto; min-height: 300px; max-height: 600px;'>
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th class="fit-content">วันที่</th>
                            <th>รายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>                  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<script>
    var playerCode = "";
    var currentDate = $.datepicker.formatDate("yymmdd", new Date());
    
    var history = {
        results: "",
        suggestions: ""
    }
    
    var permission = <?php echo json_encode($permission) ?>;
    
    $("#physical-addition-tab").tabs({heightStyle: "fill"});
    
    function addDetail($detailDiv, key, val) {
        $detailDiv.append("<tr><td style='padding-left: 5px;font-weight: bold; text-align:right'>" + key + "</td><td style='padding-left: 10px;'>" + val + "</td></tr>");
    }
    
    function displayPlayerInfo(item) {
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
    
    function getPlayerInfo(playerCode) {
        $.get("../player/info/" + playerCode).done(function(result) {
            var info = jQuery.parseJSON(result);

            displayPlayerInfo(info);
        });
    }
    
    $("#player-select-input").change(function() {
        var $combo = $(this);
        playerCode = $combo.find(":selected").val();
        
        if (playerCode.length <= 0) {
            return;
        }
        
        getPlayerInfo(playerCode);

        $("#report-tab .stretch").text("");
        $("#suggestion-tab .stretch").text("");

        getPlayerResult();
        
        getPhysicalHistoryResult();
            
        $(".physical-record-detail").show();
    });
    
    function getPlayerResult() {      
        $.get("getPhysicalResult/" + playerCode + "/" + currentDate).done(function(result) {
            var comment = jQuery.parseJSON(result);
            
            if (comment.result) {
                $("#report-tab .stretch").text(comment.result.PlrRstCmt);
            }
            else {
                $("#report-tab .stretch").text("");
            }
            
            if (comment.suggestion) {
                $("#suggestion-tab .stretch").text(comment.suggestion.PlrRstCmt);
            }
            else {
                $("#suggestion-tab .stretch").text("");
            }
        });
    }
    
    function getPhysicalHistoryResult() {
        $.get("getPhysicalHistoryResult/" + playerCode).done(function(result) {
            var comment = jQuery.parseJSON(result);
            
            history.results = populateHistoryTable(comment.results);
            
            console.info(history.results);
            
            history.suggestions = populateHistoryTable(comment.suggestions);
        });
    }
    
    function populateHistoryTable(items) {
        var $content = $("<tbody>");
        
        for (var index=0; index<items.length; index++) {
            var $row = $("<tr>");
            
            var date = $.datepicker.parseDate("yymmdd", items[index].PlrRstDte);
            
            $("<td>", { "class":"fit-content" }).text($.datepicker.formatDate("d MM yy", date)).appendTo($row);
            $("<td>", { "class":"content" }).text(items[index].PlrRstCmt).appendTo($row);
            
            $content.append($row);
        }
        
        return $content;
    }
    
    function addPlayerResult(comment, subcategory, success) {
        var result = {};
        result.playerCode = playerCode;
        result.date = currentDate;
        result.comment = comment;
        result.category = "PHY";
        result.subcategory = subcategory;

        $.post("../player/updateResult", JSON.stringify(result)).done(function() {
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
    
    function setHistoryDialog(header, $contents) {
        $("#historyDialog .modal-header").text(header);
        
        $("#historyDialog tbody").detach();
        $("#historyDialog thead").after($contents);
        
        $("#historyDialog").modal("show");
    }
    
    var currentComment = "";
    var editMode = false;
    
    $(function() {
        if (permission.write) {
            $("#report-tab").dblclick(function() {
                if (editMode) {
                    return false;
                }
                convertToTextArea($(this));
            });
            $("#report-tab").focusout(function() {
                var $section = $(this);
                var $comment = $section.children(".stretch");

                if ($comment.val() === currentComment) {
                    convertToDiv($section);
                } 
                else {
                    addPlayerResult($comment.val(), "RST", function() {
                        convertToDiv($section);
                    }); 
                }
            });

            $("#suggestion-tab").dblclick(function() {
                if (editMode) {
                    return false;
                }
                convertToTextArea($(this));
            });
            $("#suggestion-tab").focusout(function() {
                var $section = $(this);
                var $comment = $section.children(".stretch");

                if ($comment.val() === currentComment) {
                    convertToDiv($section);
                } 
                else {
                    addPlayerResult($comment.val(), "SGT", function() {
                        convertToDiv($section);
                    }); 
                }   
            });
            
            $("#report-tab .stretch").tooltip();
            $("#suggestion-tab .stretch").tooltip();
        }
        
        $(".physical-record-detail").hide();
        
        $("#historyDialog").modal({ show: false });
        $("#result-history-button").click(function() {
            setHistoryDialog("ประวัติรายงานผลของนักกายภาพ", history.results);
        });
        $("#suggestion-history-button").click(function() {
            setHistoryDialog("ประวัติคำแนะนำของนักกายภาพ", history.suggestions);
        });
    });
</script>