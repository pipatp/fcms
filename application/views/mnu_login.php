<html>
    <head>
        <meta charset="UTF-8">
        <title>เข้าสู่ระบบ - ระบบบริหารจัดการสโมสรฟุตบอล จังหวัดชัยนาท</title>
        
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/global.css" rel="stylesheet">
        <link href="../../css/mnu_login.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-lg-offset-2 col-md-offset-3">
                    <div class="panel panel-default login-panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">ระบบบริหารจัดการสโมสรฟุตบอล จังหวัดชัยนาท</h3>
                        </div>
                        <div class="panel-body">
                            <img src="../../images/ChainatFC-logo2013.png" class="img-rounded center-block logo-image" />
                            <div class="login-data">
                                <div id="login-alert" class="alert alert-danger hide">
                                    ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง
                                </div>
                                <form id="login-form" role="form">
                                            <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                            <input name="username" type="text" class="form-control" placeholder="ชื่อผู้ใช้" autofocus />
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                            <input name="password" type="password" class="form-control" placeholder="รหัสผ่าน" />
                                        </div>
                                    <button id="login-button" class="btn btn-primary btn-block" type="button">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../js/jquery-2.0.3.js"></script>
        <script>
            $("#login-button").click(function() {
                if (!$("#login-alert").hasClass("hide")) {
                    $("#login-alert").addClass("hide");
                }
                
                $.post("authenticate", $("#login-form").serialize()).done(function(data) {
                    var auth = $.parseJSON(data);

                    if (auth.isAuth) {
                        window.location.href = "menu";
                    }
                }).fail(function() {
                    $("#login-alert").removeClass("hide");
                });
            });
        </script>
    </body>
</html>
