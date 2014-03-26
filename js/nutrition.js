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

function viewNutritionRecordResult() {
    selectTab(this);
    
    $.ajax("viewNutritionRecordResult").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewNutritionPlan() {
    selectTab(this);
    
    $.ajax("viewNutritionPlan").done(function(result) {
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
                
    // Set nutrition tab selected
    $(".top-menu ul li.menu-nutrition").addClass("selected");
//    $(".sub-menu ul li:eq(0)").addClass("selected");
    
    $("#register-tab").click(viewRegistration);
    $("#food-modification-tab").click(viewMealModification);
    $("#food-preparation-tab").click(viewMealPreparation);
    $("#food-result-tab").click(viewNutritionRecordResult);
    $("#food-plan-tab").click(viewNutritionPlan);
    $("#food-stock-tab").click(viewMealStore);
    
//    var newHeight = $("body").height() - $(".top-menu").height() - $(".sub-menu").height() - 50 + "px";
//    $(".content-body").css("height", newHeight);
});


