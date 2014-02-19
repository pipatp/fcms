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
                                            <input id="username" name="username" type="text" class="form-control" placeholder="ชื่อผู้ใช้" autofocus />
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                            <input id="password" name="password" type="password" class="form-control" placeholder="รหัสผ่าน" />
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
            function showError(msg) {
                $("#login-alert").text(msg);
                $("#login-alert").removeClass("hide");
            }
            
            function login() {
                if (!$("#username").val()) {
                    showError("โปรดกรอกชื่อผู้ใช้");
                    return;
                }
                
                if (!$("#password").val()) {
                    showError("โปรดกรอกรหัสผ่าน");
                    return;
                }
               
                if (!$("#login-alert").hasClass("hide")) {
                    $("#login-alert").addClass("hide");
                }
                
                $.post("authenticate", $("#login-form").serialize()).done(function(data) {
                    var auth = $.parseJSON(data);

                    if (auth.isAuth) {
                        window.location.href = "menu";
                    }
                }).fail(function() {
                    showError("ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");
                });
            }
            
            $("#login-button").click(login);
            
            $("#username").bind("enterKey",function(e){
                login();
            });
            
            $("#username").keyup(function(e){
                if(e.keyCode === 13)
                {
                    $(this).trigger("enterKey");
                }
            });
            
            $("#password").bind("enterKey",function(e){
                login();
            });
            
            $("#password").keyup(function(e){
                if(e.keyCode === 13)
                {
                    $(this).trigger("enterKey");
                }
            });
        </script>
    </body>
</html>
