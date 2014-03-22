$(function() {
   function navigate(event) {
       clearAllIntervalTimer();
       
        var $selectedTab = $(this);

        if ($selectedTab.hasClass("selected")) {
            return;
        }

        window.location.href = event.data.page;
    }
    $(".top-menu ul li:eq(0)").click({ page: "../register/main" }, navigate);
    $(".top-menu ul li:eq(1)").click({ page: "../worklist/main" }, navigate);
    $(".top-menu ul li:eq(2)").click({ page: "../administrator/main" }, navigate);
    $(".top-menu ul li:eq(4)").click({ page: "../director/main" }, navigate);
    $(".top-menu ul li.menu-physical").click({ page: "../physical/main" }, navigate);
    $(".top-menu ul li.menu-nutrition").click({ page: "../nutrition/main" }, navigate);
    $(".top-menu ul li.menu-fitness").click({ page: "../fitness/main" }, navigate);
    $(".top-menu ul li.menu-coach").click({ page: "../coach/main" }, navigate); 
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