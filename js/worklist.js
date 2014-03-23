function viewStoreInTransactions() {
    selectTab(this);

    $.ajax("viewStoreInTransactions").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function addWorklist() {
    selectTab(this);
    
    $.ajax("addWorklist").done(function(result) {
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
    $(".top-menu ul li.menu-worklist").addClass("selected");

    $("#worklist-team-tab").click(viewRegistration);

});


