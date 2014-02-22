<style>
#fitness-modification { 
    padding: 0px; 
    background: none; 
    
    margin-left: 2px;
    margin-right: 2px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;    
}

.search-box-section {
    margin-top: 5px;
}

.list-auto-item {
    font-size: 13px;
}

#player-search-box {
    padding-left: 22px;
    background: url("../../images/search-magnify.png") no-repeat;
    background-position: 3px center;
}

#player-modification-detail .left-col {
    float: left;
    width: 50%;
    padding-right: 1px;
}

#player-modification-detail .right-col {
    float: right;
    width: 50%;
    padding-left: 1px;
}

#player-modification-detail .player-info-section {
    margin-top: 10px;
}

#player-modification-detail .player-info-section .player-picture {
    width: auto;
    height: 150px;
}

#player-modification-detail .player-info-section .player-detail {
    display: inline-block;

    vertical-align: top;
}

#modify-date-selection {
    margin: 10px 20px 0 20px;
}

#modify-date-selection .ui-datepicker {
    font-size: 13px;
    margin-left:auto;
    margin-right:auto;

    width: 100%;
}

.player-comment-section {
    margin-top: 10px;
    height: 100%;
}

.player-comment-section .stretch {
    width: 100%;
    height: 100%;

    min-height: 300px;
}
</style>
<div id="fitness-modification">
    <div class="search-box-section">
        <input id="player-search-box" type="text" placeholder="ค้นหานักกีฬา" />
    </div>
    <div id="player-modification-detail">
        <div class="left-col">
            <div class="player-info-section">
                <img class="player-picture" src="" />
                <div class="player-detail"></div>
            </div>
            <div class="player-comment-section">
                <textarea class="stretch"></textarea>
            </div>
        </div>
        <div class="right-col">
            <div id="modify-date-selection" />
        </div>
    </div>
</div>
<script>
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
            
            return false;
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item) {
        var displayName = getDisplayNameWithEng(item.PlyFstNam, item.PlyFamNam, item.PlyFstEng, item.PlyFamEng);
        return $("<li class='list-auto-item'>").append("<a>" + displayName + "</a>" ).appendTo(ul);
    };
    
    $("#modify-date-selection").datepicker({
        onSelect: function(dateText, inst) {
        }
    });
    $("#modify-date-selection").datepicker("setDate", new Date());
</script>