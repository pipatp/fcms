function viewStoreInTransactions() {
    selectTab(this);

    $.ajax("viewStoreInTransactions").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function getAddItemForm() {
    selectTab(this);

    $.ajax("getStoreInForm").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });        
}
    
function getDeliveryForm() {
    selectTab(this);

    $.ajax("getDeliveryForm").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewDeliveryTransactions() {
    selectTab(this);

    $.ajax("viewDeliveryTransactions").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });    
}



function viewMealModification() {
    selectTab(this);
    
    $.ajax("viewMealModification").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}


function viewCategory() {
    selectTab(this);
    
    $.ajax("viewCategories").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewRegistration() {
    selectTab(this);
    
    $.ajax("viewRegistration").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewMealPreparation() {
    selectTab(this);
    
    $.ajax("viewPreparation").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewMasterData() {
    selectTab(this);
    
    $.ajax("viewMasterData").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewAddPlayer() {
    selectTab(this);
    
    $.ajax("viewAddPlayer").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewMealStore() {
    selectTab(this);
    
    $.ajax("viewInventory").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewPlayerInfo() {
    selectTab(this);

    $.ajax("viewPlayerInfo").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewSchedule() {
    selectTab(this);

    $.ajax("viewCoachSchedule").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewTeamSchedule() {
    selectTab(this);

    $.ajax("viewTeamSchedule").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function selectTab(selectedTab) {
    $(".sub-menu ul li ").removeClass("selected");
    $(selectedTab).parent().addClass("selected");
}

$(function() {
    $(".logout-link").click(function() {
        $.get("../main/logout", function(data) {
            window.location.href = "../main/login";
        });
    });
                
    // Set nutrition tab selected
    $(".top-menu ul li:eq(2)").addClass("selected");
//    $(".sub-menu ul li:eq(0)").addClass("selected");
    
    $("#player-list-tab").click(viewRegistration);
    $("#player-add-tab").click(viewAddPlayer);
    $("#player-profile-tab").click(viewPlayerInfo);
    $("#coach-schedule-tab").click(viewSchedule);
    $("#team-schedule-tab").click(viewTeamSchedule);
    $("#master-data-tab").click(viewMasterData);
    
//    var newHeight = $("body").height() - $(".top-menu").height() - $(".sub-menu").height() - 50 + "px";
//    $(".content-body").css("height", newHeight);
});


