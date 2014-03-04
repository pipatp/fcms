$(function() {
   function navigate(event) {
        var $selectedTab = $(this);

        if ($selectedTab.hasClass("selected")) {
            return;
        }

        window.location.href = event.data.page;
    }

    $(".top-menu ul li:eq(4)").click({ page: "../physical/main" }, navigate);
    $(".top-menu ul li:eq(5)").click({ page: "../nutrition/main" }, navigate);
    $(".top-menu ul li:eq(6)").click({ page: "../fitness/main" }, navigate);
    $(".top-menu ul li:eq(7)").click({ page: "../coach/main" }, navigate); 
});