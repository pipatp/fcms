$(function() {
    $(".logout-link").click(function() {
        $.get("../main/logout", function(data) {
            window.location.href = "../main/login";
        });
    });
                
    // Set coach tab selected
    $(".top-menu ul li:eq(7)").addClass("selected");
    
    $("#coach-schedule-tab").click(viewSchedule);
    $("#coach-fitness-tab").click(viewFitness);
    $("#coach-physical-tab").click(viewPhysicalTheraphy);
    $("#coach-info-tab").click(viewPlayerInfo);
});

function selectTab(selectedTab) {
    $(".sub-menu ul li ").removeClass("selected");
    $(selectedTab).parent().addClass("selected");
}

function viewSchedule() {
    selectTab(this);

    $.ajax("viewCoachSchedule").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewFitness() {
    selectTab(this);

    $.ajax("viewCoachFitness").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewPhysicalTheraphy() {
    selectTab(this);

    $.ajax("viewCoachPhysical").done(function(result) {
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