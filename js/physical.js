function viewRegistration() {
    selectTab(this);

    $.ajax("viewRegistration").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewModification() {
    selectTab(this);

    $.ajax("viewModification").done(function(result) {
        var $content = $(".content-body");
        
        $content.html(result);
    });
}

function viewRecordResult() {
    selectTab(this);

    $.ajax("viewRecordResult").done(function(result) {
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

function viewInventory() {
    selectTab(this);

    $.ajax("viewInventory").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function selectTab(selectedTab) {
    clearAllIntervalTimer();
    
    $(".sub-menu ul li ").removeClass("selected");
    $(selectedTab).parent().addClass("selected");
}

$(function() {
    $(".logout-link").click(function() {
        $.get("../main/logout", function(data) {
            window.location.href = "../main/login";
        });
    });
                
    // Set fitness tab selected
    $(".top-menu ul li.menu-physical").addClass("selected");
    
    $("#physical-register-tab").click(viewRegistration);
    $("#physical-modification-tab").click(viewModification);
    $("#physical-result-tab").click(viewRecordResult);
    $("#physical-info-tab").click(viewPlayerInfo);
    $("#physical-stock-tab").click(viewInventory);
});

