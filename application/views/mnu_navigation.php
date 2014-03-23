<div class="top-menu">
    <ul>
        <?php
        if (array_key_exists('REG', $permissions)) {
        ?>
        <li class="menu-registration"><a href="javascript:;"><img src="../../images/report-icon.png" />ลงทะเบียน</a></li>
        <?php
            }
        ?>
        <?php
        if (array_key_exists('WKL', $permissions)) {
        ?>
        <li class="menu-worklist"><a href="javascript:;"><img src="../../images/worklist-icon.png" />รายการฝึกซ้อม</a></li>
        <?php
            }
        
            if (array_key_exists('ADM', $permissions)) {
        ?>
        <li class="menu-admin"><a href="javascript:;"><img src="../../images/admin-icon.png" />งานทะเบียน</a></li>
        <?php
            }
        
            if (array_key_exists('MED', $permissions)) {
        ?>
        <li class="menu-medication"><a href="javascript:;"><img src="../../images/medication-icon.png" />งานแพทย์</a></li>
        <?php
            }
        
            if (array_key_exists('PHY', $permissions)) {
        ?>
        <li class="menu-physical"><a href="javascript:;"><img src="../../images/physical-icon.png" />กายภาพบำบัด</a></li>
        <?php
            }
        
            if (array_key_exists('NUT', $permissions)) {
        ?>
        <li class="menu-nutrition"><a href="javascript:;"><img src="../../images/nutrition-icon.png" />โภชนาการ</a></li>
        <?php
            }
        
            if (array_key_exists('FIT', $permissions)) {
        ?>
        <li class="menu-fitness"><a href="javascript:;"><img src="../../images/fitness-icon.png" />ฟิตเนส</a></li>
        <?php
            }
        
            if (array_key_exists('COA', $permissions)) {
        ?>
        <li class="menu-coach"><a href="javascript:;"><img src="../../images/coach-icon.png" />ผู้ฝึกสอน</a></li>
        <?php
            }
             if (array_key_exists('DIR', $permissions)) {
        ?>
        <li class="menu-director"><a href="javascript:;"><img src="../../images/director-icon.png" />ผู้บริหาร</a></li>
        <?php
            }
        ?>
    </ul>
</div>