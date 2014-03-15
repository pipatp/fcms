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
    
    font-size: 14px;
    
    min-height: 400px;
    max-height: 600px;
    height: auto !important; 
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

.padding-h-sm {
    padding-left: 5px;
    padding-right: 5px;
}
</style>
<div class='row'>
    <div class="col-md-12 col-lg-12">
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
                    <div class="form-inline"><input id="store-date-text" type="text" class="form-control input-sm" /></div>
                </div>    
                <div class="form-group">
                    <label>ประเภทการรับเข้า</label>
                    <div class="form-inline">
                        <div class="radio">
                            <label>
                                <input type="radio" name="store-in-type" value="0" checked> จัดซื้อปกติ
                            </label>
                        </div>
                        <div class="radio" style="margin-left:40px;">
                            <label>
                                <input type="radio" name="store-in-type" value="1"> แผนก
                            </label>
                        </div>
                        <select id="store-in-department" class="form-control input-sm" style="margin-left:10px;">
                            <option value="MED">ยาและเวชภัณฑ์</option>
                            <option value="PHY">กายภาพบำบัด</option>
                            <option value="FIT">ฟิตเนส</option>
                        </select>
                        <div id="add-item-button" class="pull-right btn btn-info">เพิ่มรายการ</div>
                    </div>
                </div>
                <table id="store-in-table" class="table table-striped table-condensed">
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
                <div class="form-group">
                    <label>หมายเหตุ</label>
                    <div class="form-inline"><textarea id="store-in-remark" class="form-control" style="width: 400px; min-height: 200px"></textarea></div>
                </div>
                <div id="save-item-button" class="pull-right btn btn-success">บันทึก</div>
            </div>
            <div id="deliver-panel">
                <div class="form-group">
                    <label>วันที่จ่ายออก</label>
                    <div class="form-inline"><input id="deliver-date-text" type="text" class="form-control input-sm" /></div>
                </div>    
                <div class="form-group">
                    <label>ประเภทการจ่ายออก</label>
                    <div class="form-inline">
                        <div class="radio">
                            <label>
                                <input type="radio" name="deliver-type" value="0" checked> จ่ายออกปกติ
                            </label>
                        </div>
                        <div class="radio" style="margin-left:40px;">
                            <label>
                                <input type="radio" name="deliver-type" value="1"> แผนก
                            </label>
                        </div>
                        <select id="deliver-department" class="form-control input-sm" style="margin-left:10px;">
                            <option value="MED">ยาและเวชภัณฑ์</option>
                            <option value="PHY">กายภาพบำบัด</option>
                            <option value="FIT">ฟิตเนส</option>
                        </select>
                        <div id="add-deliver-item-button" class="pull-right btn btn-info">เพิ่มรายการ</div>
                    </div>
                </div>
                <table id="deliver-table" class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th class="fit-content">รายการ</th>
                            <th class="fit-content">จำนวน</th>
                            <th class="fit-content">หน่วย</th>
                            <th class="fit-content"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <div class="form-group">
                    <label>หมายเหตุ</label>
                    <div class="form-inline"><textarea id="deliver-remark" class="form-control" style="width: 400px; min-height: 200px"></textarea></div>
                </div>
                <div id="save-deliver-item-button" class="pull-right btn btn-success">บันทึก</div>
            </div>
            <div id="stock-panel">

            </div>
            <div id="expire-panel">

            </div>
        </div>
    </div>
</div>
<div id="addItemDialog" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                เพิ่มรายการ
            </div>
            <div class="modal-body">
                <div class="form form-horizontal">
                    <div class="row">
                        <div id="add-warning" class="alert alert-danger hidden"></div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group padding-h-sm">
                                <label>รายการ</label>
                                <select id="order-select" class="form-control input-sm">
                                    <option value=""></option>
                                    <?php 
                                    foreach ($inventory_items as $item) {
                                    ?>
                                    <option value="<? echo $item->OdrCod ?>" data-item-unit="<? echo $item->OdrUnt ?>"><? echo $item->OdrLocNam ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group padding-h-sm">
                                <label>จำนวน</label>
                                <input id="order-amount-text" class="form-control input-sm" type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group padding-h-sm">
                                <label>หน่วย</label>
                                <input id="order-unit-text" class="form-control input-sm" type="text" readonly="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group padding-h-sm">
                                <label>ราคาต่อหน่วย</label>
                                <input id="order-price-text" class="form-control input-sm" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group padding-h-sm">
                                <label>วันหมดอายุ</label>
                                <div class="form-inline">
                                    <div class="radio" style="padding-top: 2px;">
                                        <label>
                                            <input type="radio" name="expireType" value="0" checked>
                                        </label>
                                    </div>
                                    <span>ไม่มี</span>
                                    <div class="radio" style="padding-top: 2px; margin-left: 40px;">
                                        <label>
                                            <input type="radio" name="expireType" value="1">
                                        </label>
                                    </div>
                                    <span>อีก</span>
                                    <input id="expire-day-text" class="form-control input-sm" type="text">
                                    <span>วัน</span>
                                    <div class="radio" style="padding-top: 2px; margin-left: 40px;">
                                        <label>
                                            <input type="radio" name="expireType" value="2">
                                        </label>
                                    </div>
                                    <span>วันที่</span>
                                    <input id="expire-date-text" class="form-control input-sm" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="addItemButton" type="button" class="btn btn-primary">ตกลง</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>
<div id="addDeliverItemDialog" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                เพิ่มรายการ
            </div>
            <div class="modal-body">
                <div class="form form-horizontal">
                    <div class="row">
                        <div id="add-deliver-warning" class="alert alert-danger hidden"></div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group padding-h-sm">
                                <label>รายการ</label>
                                <select id="deliver-order-select" class="form-control input-sm">
                                    <option value=""></option>
                                    <?php 
                                    foreach ($inventory_items as $item) {
                                    ?>
                                    <option value="<? echo $item->OdrCod ?>" data-item-unit="<? echo $item->OdrUnt ?>"><? echo $item->OdrLocNam ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group padding-h-sm">
                                <label>จำนวน</label>
                                <input id="deliver-order-amount-text" class="form-control input-sm" type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group padding-h-sm">
                                <label>หน่วย</label>
                                <input id="deliver-order-unit-text" class="form-control input-sm" type="text" readonly="true">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="addDeliverItemButton" type="button" class="btn btn-primary">ตกลง</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>
<div id="errorDialog" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="error-content"></div>
            </div>
            <div class="modal-footer">
                <button id="errorCloseButton" type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<script>
    var storeCategory = "NUT";
    
    $(function() {
        $("#inventory-section").tabs({heightStyle: "fill"});
        $("#addItemDialog").modal({ show: false, keyboard: false });
        $("#addDeliverItemDialog").modal({ show: false, keyboard: false });
        $("#errorDialog").modal({ show: false });
        
        $("#store-date-text").datepicker({ dateFormat: 'dd/mm/yy' });
        $("#store-date-text").datepicker("setDate", new Date());
        $("#deliver-date-text").datepicker({ dateFormat: 'dd/mm/yy' });
        $("#deliver-date-text").datepicker("setDate", new Date());
        
        $("#expire-date-text").datepicker({ dateFormat: 'dd/mm/yy' });
        
        // Handle add item button to show add dialog
        $("#add-item-button").click(function() {
            clearAddInventoryDialog();
            $("#addItemDialog").modal("show");
        });
        // Handle add item button to show add dialog
        $("#add-deliver-item-button").click(function() {
            clearAddDeliverInventoryDialog();
            $("#addDeliverItemDialog").modal("show");
        });
        
        // Handle combobox select event to set item unit
        $("#order-select").change(function() {
            var $combo = $(this);
            var itemUnit = $combo.find(":selected").attr("data-item-unit");
            
            $("#order-unit-text").val(itemUnit);
        });
        $("#deliver-order-select").change(function() {
            var $combo = $(this);
            var itemUnit = $combo.find(":selected").attr("data-item-unit");
            
            $("#deliver-order-unit-text").val(itemUnit);
        });
        
        $("#addItemButton").click(addInventoryItem);
        $("#addDeliverItemButton").click(addDeliverInventoryItem);
        $("#save-item-button").click(saveInventoryItem);
        $("#save-deliver-item-button").click(saveDeliverInventoryItem);
    });
    
    function addInventoryItem() {
        if (!validateInventoryItem()) {
            showAddWarning(true);
            return;
        }
        
        showAddWarning(false);
        
        var $tableBody = $("#store-in-table tbody");
        
        var $orderSelect = $("#order-select :selected");
        
        var $expireType = $('input[name=expireType]:checked').val();

        var expireDateText;
        if ($expireType === "1") {
            var expireDate = new Date();
            expireDate.setDate(expireDate.getDate() + parseInt($("#expire-day-text").val()));

            expireDateText = $.datepicker.formatDate("dd/mm/yy", expireDate);
        }
        else if ($expireType === "2") {
            var selectedDate = $("#expire-date-text").datepicker("getDate");
            expireDateText = $.datepicker.formatDate("dd/mm/yy", selectedDate);
        }

        createInventoryRow($orderSelect.val(), 
            $orderSelect.text(), 
            $("#order-unit-text").val(),
            $("#order-amount-text").val(),
            $("#order-price-text").val(),
            expireDateText).appendTo($tableBody);
            
        $("#addItemDialog").modal("hide");
    }
    
    function addDeliverInventoryItem() {
        if (!validateDeliverInventoryItem()) {
            showAddDeliverWarning(true);
            return;
        }
        
        showAddDeliverWarning(false);
        
        var $tableBody = $("#deliver-table tbody");
        
        var $orderSelect = $("#deliver-order-select :selected");
        
        createDeliverInventoryRow($orderSelect.val(), 
            $orderSelect.text(), 
            $("#deliver-order-unit-text").val(),
            $("#deliver-order-amount-text").val()).appendTo($tableBody);
            
        $("#addDeliverItemDialog").modal("hide");
    }
    
    function createInventoryRow(itemCode, itemName, itemUnit, itemAmount, itemPrice, itemExpireDate) {
        var $row = $("<tr>");
        $row.attr("data-item-code", itemCode);
        
        $("<td>").text(itemName).appendTo($row);
        $("<td>").text(itemAmount).appendTo($row);
        $("<td>").text(itemUnit).appendTo($row);
        $("<td>").text(itemPrice).appendTo($row);
        
        if (!itemExpireDate) {
            $("<td>").attr("data-expire", 0).text("ไม่มี").appendTo($row);
        } 
        else {
            $("<td>").text(itemExpireDate).appendTo($row);
        }
        
        var $deleteButton = $("<div>", {"class":"btn btn-danger"}).text("ลบ");
        $deleteButton.click(function() {
            $row.detach();
        });
        
        $("<td>").append($deleteButton).appendTo($row);
        
        return $row;
    }
    
    function createDeliverInventoryRow(itemCode, itemName, itemUnit, itemAmount) {
        var $row = $("<tr>");
        $row.attr("data-item-code", itemCode);
        
        $("<td>").text(itemName).appendTo($row);
        $("<td>").text(itemAmount).appendTo($row);
        $("<td>").text(itemUnit).appendTo($row);
        
        var $deleteButton = $("<div>", {"class":"btn btn-danger"}).text("ลบ");
        $deleteButton.click(function() {
            $row.detach();
        });
        
        $("<td>").append($deleteButton).appendTo($row);
        
        return $row;
    }
    
    function validateInventoryItem() {
        var $addWarning = $("#add-warning");
        
        var $orderSelect = $("#order-select :selected");
        if (!$orderSelect.val()) {
            $addWarning.text("โปรดเลือกรายการ");
            return false;
        }
        
        if (!$("#order-amount-text").val()) {
            $addWarning.text("โปรดกรอกจำนวน");
            return false;
        }
        else {
            var amountValue = parseInt($("#order-amount-text").val());
            if (!amountValue || amountValue === 0) {
                $addWarning.text("จำนวนไม่ถูกต้องหรือจำนวนเท่ากับ 0");
                return false;
            }
        }
        
        if ($("#order-price-text").val()) {
            var priceVal = parseInt($("#order-price-text").val());
            if (!priceVal || priceVal === 0) {
                $addWarning.text("ราคาไม่ถูกต้องหรือราคาเท่ากับ 0");
                return false;
            }
        }
        
        var $expireType = $('input[name=expireType]:checked').val();
        if ($expireType === "1") {
            if (!$("#expire-day-text").val()) {
                $addWarning.text("โปรดกรอกจำนวนวันที่จะหมดอายุ");
                return false;
            }
            else {
                var dayValue = parseInt($("#expire-day-text").val());
                if (!dayValue || dayValue === 0) {
                    $addWarning.text("จำนวนวันที่จะหมดอายุไม่ถูกต้องหรือจำนวนวันเท่ากับ 0");
                    return false;
                }
            }
        }
        else if ($expireType === "2") {
            if (!$("#expire-date-text").val()) {
                $addWarning.text("โปรดกรอกวันที่หมดอายุ");
                return false;
            }
        }
        
        return true;
    }
    
    function validateDeliverInventoryItem() {
        var $addWarning = $("#add-deliver-warning");
        
        var $orderSelect = $("#deliver-order-select :selected");
        if (!$orderSelect.val()) {
            $addWarning.text("โปรดเลือกรายการ");
            return false;
        }
        
        if (!$("#deliver-order-amount-text").val()) {
            $addWarning.text("โปรดกรอกจำนวน");
            return false;
        }
        else {
            var amountValue = parseInt($("#deliver-order-amount-text").val());
            if (!amountValue || amountValue === 0) {
                $addWarning.text("จำนวนไม่ถูกต้องหรือจำนวนเท่ากับ 0");
                return false;
            }
        }
        return true;
    }
    
    function showAddWarning($show) {
        var $addWarning = $("#add-warning");
        $show ? $addWarning.removeClass("hidden") : $addWarning.addClass("hidden");
    }
    
    function showAddDeliverWarning($show) {
        var $addWarning = $("#add-deliver-warning");
        $show ? $addWarning.removeClass("hidden") : $addWarning.addClass("hidden");
    }
    
    function clearAddInventoryDialog() {
        $("select#order-select").prop('selectedIndex', 0);
        $("#order-unit-text").val("");
        $("#order-amount-text").val("");
        $("#order-price-text").val("");
        $('input[name=expireType][value=0]').prop('checked', true);
        $("#expire-day-text").val("");
        $("#expire-date-text").val("");
    }
    
    function clearAddDeliverInventoryDialog() {
        $("select#deliver-order-select").prop('selectedIndex', 0);
        $("#deliver-order-unit-text").val("");
        $("#deliver-order-amount-text").val("");
    }
    
    function saveInventoryItem() {
        var storeInTrans = {};
        
        var selectedDate = $("#store-date-text").datepicker("getDate");
        storeInTrans.date = $.datepicker.formatDate("yymmdd", selectedDate);
        storeInTrans.category = storeCategory;
        storeInTrans.type = $('input[name=store-in-type]:checked').val();
        storeInTrans.department = storeInTrans.type === "0" ? null : $("#store-in-department :selected").val();
        storeInTrans.remark = $("#store-in-remark").val();
        
        storeInTrans.items = [];
        
        var $tableRows = $("#store-in-table tbody tr");
        
        if ($tableRows.length <= 0) {
            $(".error-content").text("ไม่สามารถบันทึกได้ เนื่องจากไม่มีรายการนำเข้า");
            $("#errorDialog").modal("show");
            $("#errorDialog").on('shown.bs.modal', function() {
                $("#errorCloseButton").focus();
            });
            return;
        }
        
        for (var index=0; index<$tableRows.length; index++) {
            var $row = $($tableRows[index]);
            
            var item = {};
            item.code = $row.attr("data-item-code");
            item.amount = $row.children().eq(1).text();
            item.price = $row.children().eq(3).text();
            if ($row.children().eq(4).attr("data-expire")) {
                item.expire = 0;
                item.expireDate = null;
            }
            else {
                item.expire = 1;
                
                var expireDate = $.datepicker.parseDate('dd/mm/yy', $row.children().eq(4).text());
                item.expireDate = $.datepicker.formatDate("yymmdd", expireDate);;
            }
            
            item.category = storeCategory;
            
            storeInTrans.items.push(item);
        }
        
        $.post("storeInInventory", JSON.stringify(storeInTrans)).done(function() {
            cleaStoreInTransaction();
        }).fail(function() {
           alert("ไม่สามารถเพิ่มข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
        });
    }
    
    function saveDeliverInventoryItem() {
        var deliverTrans = {};
        
        var selectedDate = $("#deliver-date-text").datepicker("getDate");
        deliverTrans.date = $.datepicker.formatDate("yymmdd", selectedDate);
        deliverTrans.category = storeCategory;
        deliverTrans.type = $('input[name=deliver-type]:checked').val();
        deliverTrans.department = deliverTrans.type === "0" ? null : $("#deliver-department :selected").val();
        deliverTrans.remark = $("#deliver-remark").val();
        
        deliverTrans.items = [];
        
        var $tableRows = $("#deliver-table tbody tr");
        
        if ($tableRows.length <= 0) {
            $(".error-content").text("ไม่สามารถบันทึกได้ เนื่องจากไม่มีรายการจ่ายออก");
            $("#errorDialog").modal("show");
            $("#errorDialog").on('shown.bs.modal', function() {
                $("#errorCloseButton").focus();
            });
            return;
        }
        
        for (var index=0; index<$tableRows.length; index++) {
            var $row = $($tableRows[index]);
            
            var item = {};
            item.code = $row.attr("data-item-code");
            item.amount = $row.children().eq(1).text();
            
            item.category = storeCategory;
            
            deliverTrans.items.push(item);
        }
        
        $.post("deliverInventory", JSON.stringify(deliverTrans)).done(function() {
            clearDeliverTransaction();
        }).fail(function(jqXHR) {
            if (jqXHR.status === 403) {
                alert("บางรายการมีจำนวนไม่พอที่จะจ่ายออก โปรดแก้ไขจำนวนใหม่");
            }
            else {
                alert("ไม่สามารถเพิ่มข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
            }
        });
    }
    
    function cleaStoreInTransaction() {
        $("#store-date-text").datepicker("setDate", new Date());
        $('input[name=store-in-type][value=0]').prop('checked', true);
        $("select#store-in-department").prop('selectedIndex', 0);
        $("#store-in-table tbody").empty();
        $("#store-in-remark").val("");
    }
    
    function clearDeliverTransaction() {
        $("#deliver-date-text").datepicker("setDate", new Date());
        $('input[name=deliver-type][value=0]').prop('checked', true);
        $("select#deliver-department").prop('selectedIndex', 0);
        $("#deliver-table tbody").empty();
        $("#deliver-remark").val("");
    }
</script>