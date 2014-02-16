<div class="navbar header-bar">
    <div class="container container-full login-bar">
        <div class="pull-left">
            <b>ระบบบริหารจัดการสโมสรฟุตบอล จังหวัดชัยนาท</b>
        </div>
        <div class="pull-right login-group">
            <span>ยินดีต้อนรับ </span>
            <span class="login-user"><? echo $loginSession['username'] ?></span>
            <a href="javascript:" class="logout-link">ออกจากระบบ</a>
        </div>
        
    </div>
    <?
        if (isset($showMenu)) {
    ?>
    <div class='container container-full menu-bar'>
    <?
            $this->load->view('mnu_navigation');
            
            if (isset($showSubMenu)) {
                $this->load->view($subMenuView);
            }
    ?>
    </div>
    <?
        }
    ?>
</div>