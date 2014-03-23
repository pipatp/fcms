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

function viewMealModification() {
    selectTab(this);
    
    $.ajax("viewMealModification").done(function(result) {
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

function selectTab(selectedTab) {
    $(".sub-menu ul li ").removeClass("selected");
    $(selectedTab).parent().addClass("selected");
}

function viewPhysicalTheraphy() {
    selectTab(this);

    $.ajax("viewCoachPhysical").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewFitess() {
    selectTab(this);

    $.ajax("viewCoachFitness").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewNutrition() {
    selectTab(this);

    $.ajax("viewNutrition").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}


$(function() {
    $(".logout-link").click(function() {
        $.get("../main/logout", function(data) {
            window.location.href = "../main/login";
        });
    });
    
    function viewSchedule() {
    selectTab(this);

    $.ajax("viewCoachSchedule").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}
                
    // Set nutrition tab selected
     $(".top-menu ul li.menu-director").addClass("selected");
//    $(".top-menu ul li:eq(8)").addClass("selected");
//    $(".sub-menu ul li:eq(0)").addClass("selected");
    
    $("#director-player-info-tab").click(viewRegistration);
    $("#director-player-report-tab").click(viewMealStore);
    $("#director-player-team-schedule-tab").click(viewPhysicalTheraphy);
    $("#director-player-fitness-schedule-tab").click(viewFitess);
    $("#director-player-nutrition-schedule-tab").click(viewNutrition);
    $("#director-player-view-schedule-tab").click(viewSchedule);

});


