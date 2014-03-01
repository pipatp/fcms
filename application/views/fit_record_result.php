<style>
#fitness-record-result { 
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
    width: 49%;
    
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
    
    font-family: Helvetica,tahoma, sans-serif;
}

#fitness-addition-tab .comment {
    border: #AAA solid 1px;
    padding: 2px;
    
    white-space: pre;
}

</style>
<div id="fitness-record-result">
    <div class="search-box-section">
        <input id="player-search-box" class="form-control input-sm" type="text" placeholder="ค้นหานักกีฬา" />
    </div>
    <div class="fitness-record-detail">
        <div class="player-info-section">
            <img class="player-picture" src="" />
            <div class="player-detail"></div>
        </div>
        <div id="fitness-addition-tab">
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
            
            getPlayerResult();
            
            $(".fitness-record-detail").show();
            
            return false;
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item) {
        var displayName = getDisplayNameWithEng(item.PlyFstNam, item.PlyFamNam, item.PlyFstEng, item.PlyFamEng);
        return $("<li class='list-auto-item'>").append("<a>" + displayName + "</a>" ).appendTo(ul);
    };
    
    function getPlayerResult() {
        var date = $.datepicker.formatDate("yymmdd", new Date());
        
        $.get("getFitnessResult/" + playerCode + "/" + date).done(function(result) {
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
    
    function convertToTextArea($section) {       
        var $commentDiv = $section.children(".stretch");
        $commentDiv.tooltip('hide');
        $commentDiv.detach();
        
        var $commentBox = $("<textarea class='stretch'></textarea>");
        $commentBox.val($commentDiv.text());
        
        $section.append($commentBox);
        
        $commentBox.focus();
    }
    
    function convertToDiv($section) {
        var $commentBox = $section.children(".stretch");
        $commentBox.detach();
        
        var $commentDiv = $("<div class='stretch comment' title='ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข'></div>");
        $commentDiv.text($commentBox.val());
        
        $commentDiv.tooltip();
        
        $section.append($commentDiv);
    }
    
    $("#report-tab").dblclick(function() {
        convertToTextArea($(this));
    });
    $("#report-tab").focusout(function() {
        convertToDiv($(this));
    });
    
    $("#suggestion-tab").dblclick(function() {
        convertToTextArea($(this));
    });
    $("#suggestion-tab").focusout(function() {
        convertToDiv($(this));
    });
    
    $("#report-tab .stretch").tooltip();
    $("#suggestion-tab .stretch").tooltip();
    $(".fitness-record-detail").hide();

</script>