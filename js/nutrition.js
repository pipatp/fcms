function viewStoreInTransactions() {
    $(".sub-menu ul li ").removeClass("selected");
    $(this).parent().addClass("selected");

    $.ajax("viewStoreInTransactions").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function getAddItemForm() {
    $(".sub-menu ul li ").removeClass("selected");
    $(this).parent().addClass("selected");

    $.ajax("getStoreInForm").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });        
}
    
function getDeliveryForm() {
    $(".sub-menu ul li ").removeClass("selected");
    $(this).parent().addClass("selected");

    $.ajax("getDeliveryForm").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewDeliveryTransactions() {
    $(".sub-menu ul li ").removeClass("selected");
    $(this).parent().addClass("selected");

    $.ajax("viewDeliveryTransactions").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });    
}

function viewCategory() {
    $(".sub-menu ul li ").removeClass("selected");
    $(this).parent().addClass("selected");
    
    $.ajax("viewCategories").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewRegistration() {
    selectTab(this);
    
    $.ajax("index.php/nutrition/viewRegistration").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewMealPreparation() {
    selectTab(this);
    
    $.ajax("index.php/nutrition/viewPreparation").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function viewMealModification() {
    selectTab(this);
    
    $.ajax("index.php/nutrition/viewMealModification").done(function(result) {
        var $content = $(".content-body");

        $content.html(result);
    });
}

function selectTab(selectedTab) {
    $(".sub-menu ul li ").removeClass("selected");
    $(selectedTab).parent().addClass("selected");
}

$(function() {
    $("#register-tab").click(viewRegistration);
    $("#food-modification-tab").click(viewMealModification);
    $("#food-preparation-tab").click(viewMealPreparation);
    $("#food-stock-tab").click(selectTab);
    
    var newHeight = $("body").height() - $(".top-menu").height() - $(".sub-menu").height() - 50 + "px";

    $(".content-body").css("height", newHeight);
});


