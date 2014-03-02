<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>เมนูหลัก - ระบบบริหารจัดการสโมสรฟุตบอล จังหวัดชัยนาท</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/global.css" rel="stylesheet">
        <link href="../../css/mnu_main.css" rel="stylesheet">
    </head>
    <body>
        <? $this->load->view('mnu_header'); ?>
        <div class="container">
            <div class="well" style="margin-top: 20px;">
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-2 col-md-offset-2">
                        <div class="thumbnail btn menu-button">
                            <div class="button-group">
                                <img src="../../images/registration_enable.jpg" />
                                <h4>ลงทะเบียน</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="thumbnail btn menu-button disabled">
                            <div class="button-group">
                                <img src="../../images/worklist_enable.jpg" />
                                <h4>รายการฝึกซ้อม</h4>
                            </div>
                        </div>                    
                    </div>
                    <div class="col-md-2">
                        <div class="thumbnail btn menu-button">
                            <div class="button-group">
                                <img src="../../images/admin_enable.jpg" />
                                <h4>ผู้ดูแลระบบ</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="thumbnail btn menu-button">
                            <div class="button-group">
                                <img src="../../images/medication_enable.jpg" />
                                <h4>ยาและเวชภัณฑ์</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-2 col-md-offset-2">
                        <div id="physical-button" class="thumbnail btn menu-button">
                            <div class="button-group">
                                <img src="../../images/physical_enable.jpg" />
                                <h4>กายภาพบำบัด</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div id="nutrition-button" class="thumbnail btn menu-button">
                            <div class="button-group">
                                <img src="../../images/nutrition_enable.jpg" />
                                <h4>โภชนาการ</h4>
                            </div>
                        </div>                    
                    </div>
                    <div class="col-md-2">
                        <div id="fitness-button" class="thumbnail btn menu-button">
                            <div class="button-group">
                                <img src="../../images/fitness_enable.jpg" />
                                <h4>ฟิตเนส</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="thumbnail btn menu-button">
                            <div class="button-group">
                                <img src="../../images/coach_enable.jpg" />
                                <h4>ผู้ฝึกสอน</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../js/jquery-2.0.3.js"></script>
        <script>
            $(function() {
                $(".logout-link").click(function() {
                    $.get("logout", function(data) {
                        window.location.href = "login";
                    });
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
            });
        </script>
    </body>
</html>
