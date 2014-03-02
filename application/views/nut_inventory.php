<style type="text/css">
#inventory-section { 
    padding: 0px; 
    background: none; 
    border-width: 0px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;
}

#inventory-section .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 1px 0px; 
    -moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px;
}

#inventory-section .ui-tabs-nav li {
    width: 24%;
    
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

#inventory-section .ui-tabs-nav li a {
    width: 100%;
        
    outline: none;
}

#inventory-section .ui-tabs-panel {
    padding-top: 20px;
    border-width: 0px 1px 1px 1px;
    
    font-size: 13px;
}

#inventory-section .line-space-nm {
    margin-bottom: 5px;
}

#store-in-panel .fix-content {
    padding-left: 10px;
    padding-right: 10px;
    
    width: 36px;
}

#store-in-panel .fit-content {
    width: 1px;
    white-space: nowrap;
    
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}

#store-in-panel .content {
    padding-left: 10px;
    padding-right: 10px;
}
</style>
<div id="inventory-section">
    <ul>
        <li><a href="#store-in-panel">รับเข้า</a></li>
        <li><a href="#deliver-panel">จ่ายออก</a></li>
        <li><a href="#stock-panel">คงคลัง</a></li>
        <li><a href="#expire-panel">หมดอายุ</a></li>
    </ul>
    <div id="store-in-panel">
        <div class="form-group">
            <label>วันที่รับเข้า</label>
            <div class="form-inline"><input type="text" class="form-control input-sm" /></div>
        </div>    
        <div class="form-group">
            <label>รับเข้ามาจาก</label>
            <div class="form-inline">
                <div class="radio">
                    <label>
                        <input type="radio" name="store-in-type" value="option1" checked> จัดซื้อปกติ
                    </label>
                </div>
                <div class="radio" style="margin-left:40px;">
                    <label>
                        <input type="radio" name="store-in-type" value="option1"> แผนก
                    </label>
                </div>
                <select class="form-control input-sm" style="margin-left:10px;">
                    <option>กายภาพบำบัด</option>
                    <option>ฟิตเนส</option>
                </select>
            </div>
        </div>
        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th class="fit-content">รายการ</th>
                    <th class="fit-content">จำนวน</th>
                    <th class="fit-content">หน่วย</th>
                    <th class="fit-content">ราคาต่อหน่วย</th>
                    <th class="fit-content">วันหมดอายุ</th>
                    <th class="fit-content"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div id="deliver-panel">
        
    </div>
    <div id="stock-panel">
        
    </div>
    <div id="expire-panel">
        
    </div>
</div>
<script>
    $("#inventory-section").tabs({heightStyle: "fill"});
</script>