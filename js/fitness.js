function viewRegistration() {
    selectTab(this);

    $.ajax("viewRegistration").done(function(result) {
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
    
    $("#fitness-register-tab").click(viewRegistration);
});


