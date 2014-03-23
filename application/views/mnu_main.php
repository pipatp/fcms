<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>à¹€à¸¡à¸?à¸¹à¸«à¸¥à¸±à¸? - à¸£à¸°à¸?à¸?à¸?à¸£à¸´à¸«à¸²à¸£à¸?à¸±à¸”à¸?à¸²à¸£à¸ªà¹?à¸¡à¸ªà¸£à¸?à¸¸à¸•à¸?à¸­à¸¥ à¸?à¸±à¸?à¸«à¸§à¸±à¸”à¸?à¸±à¸¢à¸?à¸²à¸—</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/global.css" rel="stylesheet">
        <link href="../../css/mnu_main.css" rel="stylesheet">
    </head>
    <body>
        <? $this->load->view('mnu_header'); ?>
        <div class="container">
            <div id="mainmenu-panel" class="well" style="margin-top: 20px;">
            </div>
        </div>
        <script src="../../js/jquery-2.0.3.js"></script>
        <script>
            function createMenuButton(buttonNum, imagePath, buttonText, buttonId) {
                var $button = $("<div>", { "class":"col-md-2" });
                if (buttonNum % 4 === 0) {
                    $button.addClass("col-md-offset-2");
                }

                if (buttonId) {
                    $button.attr("id", buttonId);
                }

                var $menuButton = $("<div>", {"class": "thumbnail btn menu-button"});
                $button.append($menuButton);

                var $buttonGroup = $("<div>", {"class": "button-group"});
                $menuButton.append($buttonGroup);

                $("<img>", {"src": imagePath}).appendTo($buttonGroup);
                $("<h4>").text(buttonText).appendTo($buttonGroup);

                return $button;
            }

            $(function() {
                var permissions = <?php echo json_encode($permissions) ?>;

                var menuNum = 0;
                var $panel = $("#mainmenu-panel");

                var $currentRow = $("<div>", {"class": "row", "style": "margin-top: 15px;"});

                $panel.append($currentRow);

                if (permissions.REG) {
                    createMenuButton(menuNum, "../../images/registration_enable.jpg", "à¸¥à¸?à¸—à¸°à¹€à¸?à¸µà¸¢à¸?","register-button").appendTo($currentRow);

                    if (++menuNum % 4 === 0) {
                        $currentRow = $("<div>", {"class": "row", "style": "margin-top: 15px;"});
                        $panel.append($currentRow);
                    }
                }
                if (permissions.WKL) {
                    createMenuButton(menuNum, "../../images/worklist_enable.jpg", "à¸£à¸²à¸¢à¸?à¸²à¸£à¸?à¸¶à¸?à¸?à¹?à¸­à¸¡","worklist-button").appendTo($currentRow);

                    if (++menuNum % 4 === 0) {
                        $currentRow = $("<div>", {"class": "row", "style": "margin-top: 15px;"});
                        $panel.append($currentRow);
                    }
                }
                if (permissions.ADM) {
                    createMenuButton(menuNum, "../../images/admin_enable.jpg", "à¸?à¸²à¸?à¸—à¸°à¹€à¸?à¸µà¸¢à¸?","admin-button").appendTo($currentRow);

                    if (++menuNum % 4 === 0) {
                        $currentRow = $("<div>", {"class": "row", "style": "margin-top: 15px;"});
                        $panel.append($currentRow);
                    }
                }
                if (permissions.MED) {
                    createMenuButton(menuNum, "../../images/medication_enable.jpg", "à¸¢à¸²à¹?à¸¥à¸°à¹€à¸§à¸?à¸ à¸±à¸“à¸‘à¹?","medication-button").appendTo($currentRow);

                    if (++menuNum % 4 === 0) {
                        $currentRow = $("<div>", {"class": "row", "style": "margin-top: 15px;"});
                        $panel.append($currentRow);
                    }
                }
                if (permissions.PHY) {
                    createMenuButton(menuNum, "../../images/physical_enable.jpg", "à¸?à¸²à¸¢à¸ à¸²à¸?à¸?à¸³à¸?à¸±à¸”", "physical-button").appendTo($currentRow);

                    if (++menuNum % 4 === 0) {
                        $currentRow = $("<div>", {"class": "row", "style": "margin-top: 15px;"});
                        $panel.append($currentRow);
                    }
                }
                if (permissions.NUT) {
                    createMenuButton(menuNum, "../../images/nutrition_enable.jpg", "à¹?à¸ à¸?à¸?à¸²à¸?à¸²à¸£", "nutrition-button").appendTo($currentRow);

                    if (++menuNum % 4 === 0) {
                        $currentRow = $("<div>", {"class": "row", "style": "margin-top: 15px;"});
                        $panel.append($currentRow);
                    }
                }
                if (permissions.FIT) {
                    createMenuButton(menuNum, "../../images/fitness_enable.jpg", "à¸?à¸´à¸•à¹€à¸?à¸ª", "fitness-button").appendTo($currentRow);

                    if (++menuNum % 4 === 0) {
                        $currentRow = $("<div>", {"class": "row", "style": "margin-top: 15px;"});
                        $panel.append($currentRow);
                    }
                }
                if (permissions.COA) {
                    createMenuButton(menuNum, "../../images/coach_enable.jpg", "à¹?à¸?à¹?à¸?", "coach-button").appendTo($currentRow);

                    if (++menuNum % 4 === 0) {
                        $currentRow = $("<div>", {"class": "row", "style": "margin-top: 15px;"});
                        $panel.append($currentRow);
                    }
                }
                if (permissions.DIR) {
                    createMenuButton(menuNum, "../../images/director_enable.jpg", "à¸?à¸¹à¹?à¸?à¸£à¸´à¸«à¸²à¸£", "director-button").appendTo($currentRow);

                    if (++menuNum % 4 === 0) {
                        $currentRow = $("<div>", {"class": "row", "style": "margin-top: 15px;"});
                        $panel.append($currentRow);
                    }
                }

                $(".logout-link").click(function() {
                    $.get("logout", function(data) {
                        window.location.href = "login";
                    });
                });
                
                $("#register-button").click(function() {
                    window.location.href = "../register/main";
                });
                
                $("#worklist-button").click(function() {
                    window.location.href = "../worklist/main";
                });
                
                $("#admin-button").click(function() {
                    window.location.href = "../Administrator/main";
                });

                $("#medication-button").click(function() {
                    window.location.href = "../medication/main";
                });

                $("#physical-button").click(function() {
                    window.location.href = "../physical/main";
                });

                $("#nutrition-button").click(function() {
                    window.location.href = "../nutrition/main";
                });

                $("#fitness-button").click(function() {
                    window.location.href = "../fitness/main";
                });

                $("#coach-button").click(function() {
                    window.location.href = "../coach/main";
                });
                
                $("#director-button").click(function() {
                    window.location.href = "../Director/main";
                });
            });
        </script>
    </body>
</html>
