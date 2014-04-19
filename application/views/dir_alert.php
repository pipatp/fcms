<style>
.map-container {
    position: absolute;
    
    top: 3px;
    bottom: 1px;
    left: 2px;
    right: 2px;
    
    overflow: auto;
}
    
.map-table {
    position: relative;

    height: 100%;
    
    margin: 0 auto;
}

.map-table .alert-image {
    position:absolute;
    
    width: 60px;
    height: 60px;
    
    cursor: pointer;
}

.alert-tab { 
    padding: 0px; 
    background: none; 
    border-width: 0px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;    
}

.alert-tab .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 1px 0px; 
    -moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px;
}

.alert-tab .ui-tabs-nav li {
    width: 49%;
}

.alert-tab .ui-tabs-nav li a {
    width: 100%;
        
    outline: none;
}

.alert-tab .ui-tabs-panel {
    padding-top: 5px;
    border-width: 0px 1px 1px 1px;
    
    font-size: 13px;
}
</style>
<div class="map-container">
    <table class="map-table">
        <tr>
            <td>
                <div class="map-section">
                    <img src="../../images/clubhouse_map.jpg" />
                    <img id="fitness-alert" src="../../images/alert.png" class="alert-image" style="top: 32px; left: 680px;"/>
                    <img id="physical-alert" src="../../images/alert.png" class="alert-image" style="top: 230px; left: 830px;"/>
                    <img id="admin-alert" src="../../images/alert.png" class="alert-image" style="top: 500px; left: 680px;"/>
                    <img id="nutrition-alert" src="../../images/alert.png" class="alert-image" style="top: 550px; left: 790px;"/>
                </div>
            </td>
        </tr>
    </table>
</div>
<div id="fitness-alert-dialog" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                แจ้งเตือนจากฟิตเนส
            </div>
            <div class="modal-body">
                <div id="fitness-alert-tab" class="alert-tab">
                    <ul>
                        <li><a href="#tabs-1">ไม่ได้มาลงทะเบียนแผนก</a></li>
                        <li><a href="#tabs-2">ไม่ได้ปฏิบัติงานแผนก</a></li>
                    </ul>
                    <div id="tabs-1">
                        <table class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>รายการ</th>
                                    <th>เวลา</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                    <div id="tabs-2">
                        <table class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>รายการ</th>
                                    <th>เวลา</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<div id="nutrition-alert-dialog" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                แจ้งเตือนจากโภชนาการ
            </div>
            <div class="modal-body">
                <div id="nutrition-alert-tab" class="alert-tab">
                    <ul>
                        <li><a href="#tabs-1">ไม่ได้มาลงทะเบียนแผนก</a></li>
                    </ul>
                    <div id="tabs-1">
                        <table class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>รายการ</th>
                                    <th>เวลา</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<div id="physical-alert-dialog" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                แจ้งเตือนจากกายภาพ
            </div>
            <div class="modal-body">
                <div id="physical-alert-tab" class="alert-tab">
                    <ul>
                        <li><a href="#tabs-1">ไม่ได้มาลงทะเบียนแผนก</a></li>
                        <li><a href="#tabs-2">ลงทะเบียนแต่ไม่ได้ทำกายภาพ</a></li>
                    </ul>
                    <div id="tabs-1">
                        <table class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>รายการ</th>
                                    <th>เวลา</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                    <div id="tabs-2">
                        <table class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>รายการ</th>
                                    <th>เวลา</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<div id="admin-alert-dialog" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                แจ้งเตือนจากแอดมิน
            </div>
            <div class="modal-body">
                <div id="admin-alert-tab" class="alert-tab">
                    <ul>
                        <li><a href="#tabs-1">ไม่ได้เข้าสโมสร</a></li>
                    </ul>
                    <div id="tabs-1">
                        <table class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>ชื่อ-นามสกุล</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
//        $("#fitness-alert").hide();
//        $("#physical-alert").hide();
//        $("#admin-alert").hide();
//        $("#nutrition-alert").hide();
        
        $("#fitness-alert-dialog").modal({ show: false, keyboard: false });
        $("#fitness-alert-tab").tabs();
        $("#fitness-alert").click(function() {
            $("#fitness-alert-dialog").modal("show");
        });
        
        $("#nutrition-alert-dialog").modal({ show: false, keyboard: false });
        $("#nutrition-alert-tab").tabs();
        $("#nutrition-alert").click(function() {
            $("#nutrition-alert-dialog").modal("show");
        });
        
        $("#physical-alert-dialog").modal({ show: false, keyboard: false });
        $("#physical-alert-tab").tabs();
        $("#physical-alert").click(function() {
            $("#physical-alert-dialog").modal("show");
        });
        
        $("#admin-alert-dialog").modal({ show: false, keyboard: false });
        $("#admin-alert-tab").tabs();
        $("#admin-alert").click(function() {
            $("#admin-alert-dialog").modal("show");
        });
    });
</script>