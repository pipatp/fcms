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
    
    $(".sub-menu ul li").removeClass("selected");
    $(selectedTab).parent().addClass("selected");
}

$(function() {
    $(".logout-link").click(function() {
        $.get("../main/logout", function(data) {
            window.location.href = "../main/login";
        });
    });
                
    // Set fitness tab selected
    $(".top-menu ul li.menu-fitness").addClass("selected");
    
    $("#fitness-register-tab").click(viewRegistration);
    $("#fitness-modification-tab").click(viewModification);
    $("#fitness-result-tab").click(viewRecordResult);
    $("#fitness-info-tab").click(viewPlayerInfo);
    $("#fitness-stock-tab").click(viewInventory);
});

// Global function
function getAge(birthDate) 
{
    var today = new Date();

    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
    {
        age--;
    }
    return age;
}

function getDisplayNameWithEng(name, lastname, nameEng, lastnameEng) {
    var displayText;
    if (name) {
        displayText = name + " " + lastname;
    }

    if (nameEng) {
        if (displayText) {
            displayText += " (" + nameEng + " " + lastnameEng + ")";
        }
        else {
            displayText = nameEng + " " + lastnameEng;
        }
    }

    return displayText;
}
