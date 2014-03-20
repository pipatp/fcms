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

</style>
<div id="physical-record-result">
    <div class="search-box-section">
        <input id="player-search-box" class="form-control input-sm" type="text" placeholder="ค้นหานักกีฬา" />
    </div>
    <div class="physical-record-detail">
        <div class="player-info-section">
            <img class="player-picture" src="" />
            <div class="player-detail"></div>
        </div>
        <div id="physical-addition-tab">
            <ul>
                <li><a href="#report-tab">รายงานผลจากผู้ฝึกสอน</a></li>
                <li><a href="#suggestion-tab">คำแนะนำของผู้ฝึกสอน</a></li>
            </ul>
            <div id="report-tab">
                <div class="stretch comment" title="ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข" readonly></div>
            </div>
            <div id="suggestion-tab">
                <div class="stretch comment" title="ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข" readonly></div>
            </div>
        </div>
    </div>
</div>
<script>
    var playerCode = "";
    var currentDate = $.datepicker.formatDate("yymmdd", new Date());
    
    var permission = <?php echo json_encode($permission) ?>;
    
    $("#physical-addition-tab").tabs({heightStyle: "fill"});
    
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
            
            $("#report-tab .stretch").text("");
            $("#suggestion-tab .stretch").text("");
            
            getPlayerResult();
            
            $(".physical-record-detail").show();
            
            return false;
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item) {
        var displayName = getDisplayNameWithEng(item.PlyFstNam, item.PlyFamNam, item.PlyFstEng, item.PlyFamEng);
        return $("<li class='list-auto-item'>").append("<a>" + displayName + "</a>" ).appendTo(ul);
    };
    
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
    });
</script>