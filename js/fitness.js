function viewStoreInTransactions() {
    selectTab(this);

    $.ajax("viewStoreInTransactions").done(function(result) {
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
                
    // Set fitness tab selected
    $(".top-menu ul li:eq(6)").addClass("selected");
//    $(".sub-menu ul li:eq(0)").addClass("selected");
    
    
//    var newHeight = $("body").height() - $(".top-menu").height() - $(".sub-menu").height() - 50 + "px";
//    $(".content-body").css("height", newHeight);
});


