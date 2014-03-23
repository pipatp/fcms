$(function() {
   function navigate(event) {
       clearAllIntervalTimer();
       
        var $selectedTab = $(this);

        if ($selectedTab.hasClass("selected")) {
            return;
        }

        window.location.href = event.data.page;
    }
    $(".top-menu ul li.menu-register").click({ page: "../register/main" }, navigate);
    $(".top-menu ul li.menu-worklist").click({ page: "../worklist/main" }, navigate);
    $(".top-menu ul li.menu-admin").click({ page: "../administrator/main" }, navigate);
    $(".top-menu ul li.menu-physical").click({ page: "../physical/main" }, navigate);
    $(".top-menu ul li.menu-nutrition").click({ page: "../nutrition/main" }, navigate);
    $(".top-menu ul li.menu-fitness").click({ page: "../fitness/main" }, navigate);
    $(".top-menu ul li.menu-coach").click({ page: "../coach/main" }, navigate); 
    $(".top-menu ul li.menu-director").click({ page: "../director/main" }, navigate);
});

function clearAllIntervalTimer() {
    if (typeof timeoutVar !== 'undefined') {
        clearTimeout(timeoutVar);
    }
    if (typeof nutRegistrationTimeout !== 'undefined') {
        clearTimeout(nutRegistrationTimeout);
    }
    if (typeof phyRegistrationTimeout !== 'undefined') {
        clearTimeout(phyRegistrationTimeout);
    }
}