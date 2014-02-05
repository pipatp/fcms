<style type="text/css">
    .today-meal-table {
        display: table;
        width: 100%;
        margin-top: 15px;
    }
    
    .player-meal-row {
        display: table-row;
    }
    
    .player-meal-row .player-meal-col, .player-meal-row .player-info-col {
        display: table-cell;
        vertical-align: top;
    }
    
    .player-meal-row .player-info-col {
        width: 30%;
    }
    
    .player-meal-row .player-meal-col {
        vertical-align: middle;
    }
    
    .player-image-field {
        width: 64px;
        height: 64px;
        
        vertical-align: middle;
    }
    
    .player-name-field {
        display: inline;
        margin-left: 5px;
    }
</style>
<div>มื้ออาหาร</div>
<select id="today-meal-option">
    <option value=""></option>
    <option value="BRK">มื้อเช้า</option>
    <option value="LNH">มื้อกลางวัน</option>
    <option value="DES">อาหารว่าง</option>
    <option value="DIN">มื้อเย็น</option>
</select>
<div class="today-meal-table">
    <div class="player-meal-row">
        <div class="player-info-col">
            <img class="player-image-field" src="http://www.clker.com/cliparts/d/L/P/X/z/i/no-image-icon-md.png" />
            <div class="player-name-field">ete sgsdg</div>             
        </div>
        <div class="player-meal-col">
            <table width="100%">
                <tr>
                    <td>ข้าวต้มหมู</td>
                    <td>100</td>
                    <td>200 </td>
                </tr>
                <tr>
                    <td>สลัด</td>
                    <td>100</td>
                    <td>200 </td>
                </tr>
                <tr>
                    <td>ข้าวต้มหมู</td>
                    <td>100</td>
                    <td>200 </td>
                </tr>
                <tr>
                    <td>ข้าวต้มหมู</td>
                    <td>100</td>
                    <td>200 </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="player-meal-row">
        <div class="player-info-col">
            <img class="player-image-field" src="http://www.clker.com/cliparts/d/L/P/X/z/i/no-image-icon-md.png" />
            <div class="player-name-field">ete sgsdg</div>             
        </div>
        <div class="player-meal-col">
            <table width="100%">
                <tr>
                    <td>ข้าวต้มหมู</td>
                    <td>100</td>
                    <td>200 </td>
                </tr>
                <tr>
                    <td>สลัด</td>
                    <td>100</td>
                    <td>200 </td>
                </tr>
                <tr>
                    <td>ข้าวต้มหมู</td>
                    <td>100</td>
                    <td>200 </td>
                </tr>
                <tr>
                    <td>ข้าวต้มหมู</td>
                    <td>100</td>
                    <td>200 </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script>

    function getSelectedDate() {
        var selectedDate = $("#date-selection").datepicker("getDate");
        return "20140124";
//        return $.datepicker.formatDate("yymmdd", selectedDate);
    }

    var playerMealRowHtml = '<div class="player-meal-row">';
    playerMealRowHtml += '<div class="player-info-col">';
    playerMealRowHtml += '<img class="player-image-field" />';
    playerMealRowHtml += '<div class="player-name-field" /> ';
    playerMealRowHtml += '</div>';
    playerMealRowHtml += '<div class="player-meal-col">';
    playerMealRowHtml += '<table class="player-todaymeal-table" width="100%" />';
    playerMealRowHtml += '</div>';
    playerMealRowHtml += '</div>';
    
    var $playerMealRowTemplate = $(playerMealRowHtml);

    function addPlayerMealRow(playerMealItem) {
        var $row = $playerMealRowTemplate.clone(true, true);
        
        var $playerImage = $($row.find(".player-image-field"));
        var $playerName = $($row.find(".player-name-field"));
        
        $playerImage.attr("src", "data:image/jpg;base64," + playerMealItem.img);
//        $playerImage.attr("src", "http://www.clker.com/cliparts/d/L/P/X/z/i/no-image-icon-md.png");
        $playerName.text(playerMealItem.PlyFstNam + " " + playerMealItem.PlyFamNam);
        
        return $row;
    }
    
    function addMealItemRow(playerMealItem, $mealTable) {
        var $mealItemRow = $("<tr></tr>");
        $mealItemRow.append("<td>" + playerMealItem.OdrLocNam + "</td>");
        $mealItemRow.append("<td>" + playerMealItem.WkmMelWeg + "</td>");
        $mealItemRow.append("<td>" + playerMealItem.WkmMelCal + "</td>");
        
        $mealTable.append($mealItemRow);
    }

    $("#today-meal-option").change(function() {
        var mealVal = $(this).val();
        
        if (mealVal !== "") {
            $.ajax("index.php/nutrition/getTodayMealPreparation/" + getSelectedDate() + "/" + mealVal).done(function(result) {
                var playerMealItems = jQuery.parseJSON(result);
                
                var currentWorkListId = -1;
                
                var $todayMealTable = $(".today-meal-table");
                $todayMealTable.empty();
                
                var $row;
                var $mealTable;
                
                for (var index=0; index<playerMealItems.length; index++) {
                    var playerMealItem = playerMealItems[index];
                    var worklistId = playerMealItem.PwlSeqNum;
                    
                    if (currentWorkListId !== worklistId) {
                        currentWorkListId = worklistId;
                        
                        $row = addPlayerMealRow(playerMealItem);
                        $mealTable = $($row.find(".player-todaymeal-table"));
                        
                        $todayMealTable.append($row);
                    }
                    
                    addMealItemRow(playerMealItem, $mealTable);
                }
                
            }).fail(function(jqXHR, textStatus) {
                // Do nothing
            });
        }
    });
</script>