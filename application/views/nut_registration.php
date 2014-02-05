<style type="text/css">
#registration-tab { 
    padding: 0px; 
    background: none; 
    border-width: 0px;
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
    width: 49%
}

#registration-tab .ui-tabs-nav li a {
    width: 100%
}

#registration-tab .ui-tabs-panel {
    border-width: 0px 1px 1px 1px;
}
</style>

<div id="registration-tab">
    <ul style="">
        <li><a href="#tabs-1">รอลงทะเบียนรับอาหาร</a></li>
        <li><a href="#tabs-2">รับรายการอาหารแล้ว</a></li>
    </ul>
    <div id="tabs-1">
        <div>มื้ออาหาร</div>
        <select id="waiting-list-meal-option">
            <option value=""></option>
            <option value="BRK">มื้อเช้า</option>
            <option value="LNH">มื้อกลางวัน</option>
            <option value="DES">อาหารว่าง</option>
            <option value="DIN">มื้อเย็น</option>
        </select>
        <div id="waiting-list-player">
        </div>
    </div>
    <div id="tabs-2">
        <div>มื้ออาหาร</div>
        <select id="receive-list-meal-option">
            <option value=""></option>
            <option value="BRK">มื้อเช้า</option>
            <option value="LNH">มื้อกลางวัน</option>
            <option value="DES">อาหารว่าง</option>
            <option value="DIN">มื้อเย็น</option>
        </select>
        <br/>
        <div id="receive-list-player">
        </div>
    </div>
</div>

<script>
    var timeoutVar;
    var pollingTime = 5000;
    
    function getRegistrationWaitingList(mealVal) {
        clearTimeout(timeoutVar);
        
        if (mealVal !== "") {
            $.ajax("index.php/nutrition/getRegistrationWaitingList/" + mealVal).done(function(result) {
                var $waitingList = $("#waiting-list-player");
                $waitingList.empty();

                var players = jQuery.parseJSON(result);
                for (var index=0; index<players.length; index++) {
                    $waitingList.append("<div>" + (index+1) + ". " + players[index].PlyFstNam + " " +
                        players[index].PlyFamNam + "</div>");
                }
                $waitingList.append(new Date());
                timeoutVar = setTimeout(function() { getRegistrationWaitingList(mealVal); }, pollingTime);
            }).fail(function(jqXHR, textStatus) {
                // Do nothing
            });
        }
    }
    
    function getRegistrationReceiveList(mealVal) {
        clearTimeout(timeoutVar);
        
        if (mealVal !== "") {
            $.ajax("index.php/nutrition/getRegistrationReceiveList/" + mealVal).done(function(result) {
                var $receiveList = $("#receive-list-player");
                $receiveList.empty();

                var players = jQuery.parseJSON(result);
                for (var index=0; index<players.length; index++) {
                    $receiveList.append("<div>" + (index+1) + ". " + players[index].PlyFstNam + " " +
                        players[index].PlyFamNam + "</div>");
                }
                $receiveList.append(new Date());
                timeoutVar = setTimeout(function() { getRegistrationReceiveList(mealVal); }, pollingTime);
            }).fail(function(jqXHR, textStatus) {
                // Do nothing
            });
        }
    }
    
    $("#registration-tab").tabs({
        heightStyle: "fill",
        beforeActivate: function(event, ui) {
            if (ui.newPanel.attr('id') === "tabs-1") {
                var mealVal = $("#waiting-list-meal-option").val();
                getRegistrationWaitingList(mealVal);
            } else {
                 var mealVal = $("#receive-list-meal-option").val();
                getRegistrationReceiveList(mealVal);
           }
        }
    });
    
    $("#waiting-list-meal-option").change(function() {
        var mealVal = $(this).val();
        
        getRegistrationWaitingList(mealVal);
    });
    
    $("#receive-list-meal-option").change(function() {
        var mealVal = $(this).val();
        
        getRegistrationReceiveList(mealVal);
    });
</script>