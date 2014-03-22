<style type="text/css">
.worklist {
    border: 1px solid #ccc;
    padding: 10px;
    width: 1170px;
    border-color: black;
    background-color: white ;
    margin-left: 0px;
    height:60px;


}    

#department-section { 
    padding: 0px; 

    border-width: 0px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;
}

#department-section .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 1px 0px; 
    -moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px;
}

#department-section .ui-tabs-nav li {
    width: 24%;
    
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;

}

#department-section .ui-tabs-nav li a {
    width: 100%;
        
    outline: none;
}

#department-section .ui-tabs-panel {
    padding-top: 20px;
    border-width: 0px 1px 1px 1px; 
    
    font-size: 13px;
}

#department-section .line-space-nm {
    margin-bottom: 5px; 
}

#data_dep { 
    padding: 0px; 
    background: none; 
    border-width: 0px;

    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;
}

#data_dep .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 1px 0px;

-moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px;
}

#data_dep .ui-tabs-nav li {
    width: 24%;
    
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;

}

#data_dep .ui-tabs-nav li a {
    width: 100%;
        
    outline: none;
}

#data_dep .ui-tabs-panel {
    padding-top: 20px;
    border-width: 0px 1px 1px 1px;
    
    font-size: 13px;
}

#data_dep .line-space-nm {
    margin-bottom: 5px; 
}


#data_user .fix-content {
    padding-left: 10px;
    padding-right: 10px;
    
    width: 36px;
}

#data_user .fit-content {
    width: 1px;
    white-space: nowrap;
    
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}

#data_user .content {
    padding-left: 10px;
    padding-right: 10px;
}

#master_med .fix-content {
    /*padding-left: 10px;
    padding-right: 10px; */
    /*height:500px; */ 
  /*  width: 36px; */
}

#master_med .fit-content {
    /*width: 1px; */
    white-space: nowrap;
    
   /* padding-left: 10px;
    padding-right: 10px;
    */
    vertical-align: middle;
}

#master_med .content {
    padding-left: 10px;
    padding-right: 10px;
}


#user .fix-content {
    padding-left: 10px;
    padding-right: 10px;
/*    height:500px; */
/*    width: 36px; */
}

#user .fit-content {
    width: 1px;
    white-space: nowrap;
    
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}

#user .content {
    padding-left: 10px;
    padding-right: 10px;
}

#data_cate { 
    padding: 0px; 
    background: none; 
    border-width: 0px;

    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;
}

#data_cate .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 1px 0px; 
 
 -moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px;
}

#data_cate .ui-tabs-nav li {
    width: 24%;
    
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;

}

#data_cate .ui-tabs-nav li a {
    width: 100%;
        
    outline: none;
}

#data_cate .ui-tabs-panel {
    padding-top: 20px;
    border-width: 0px 1px 1px 1px;
    
    font-size: 13px;
}

#data_cate .line-space-nm {
    margin-bottom: 5px; 
}

.form-group{
    
    margin-bottom: 20px; 
    
}

</style>
<div id="department-section">
    <ul>
        <li><a href="#data_user">ฐานข้อมูลผู้ใช้งาน</a></li>
        <li><a href="#data_dep">ฐานข้อมูลรายการ</a></li>
        <li><a href="#data_log">ประวัติการเปลี่ยนแปลง</a></li>
        <li><a href="#data_cate">เพิ่มหมวดหมู่</a></li>
    </ul>
    <div id="data_user">
    <div class="form-group"> 
        <div class="form-group">
            <div class="col-md-2">
                <input id="user_fname" name="user_fname" placeholder="ชื่อ" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-2">
                <input id="user_lname" name="user_lname" placeholder="นามสกุล" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-2" id="user_id">
         <!--       <input id="user_id" name="user_id" placeholder="USR00001" class="form-control input-md" required="" type="text"> -->
            </div>
            <div class="col-md-2">
                <input id="user_pass" name="user_pass" placeholder="รหัสเข้าระบบ" class="form-control input-md" required="" type="text">
            </div>
        </div>
    </div>
    <br><br><br>    
    <div class="form-group"> 
        <div class="col-row row-lg-9"> 
                <div class="col-md-2">
                    <input id="user_tel" name="user_tel" placeholder="เบอร์โทรศัพท์" class="form-control input-md" required="" type="text">
                </div>
                <div class="col-md-2">
                    <input id="user_mail" name="user_mail" placeholder="อีเมลล์" class="form-control input-md" required="" type="text">
                </div> 
                <div class="col-md-2">
                    <div class="deps" >
                        <select id="deps" name="dep" class="form-control"> 
                            <option value="0">--- เลือกแผนก ---</option>
                        </select>
                    </div>    
                </div>
                <div class="col-md-2">
                    <div class="jobs">
                        <select id="jobs" name="job" class="form-control"> 
                            <option value="0">--- เลือกตำแหน่ง ---</option>
                        </select>  
                    </div>    
                </div><label id="user_result"></label>
           </div>
        </div>
        <br><br>
       
            <div class="form-group" id="image_user">
                <div class="col-md-12" align="left">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                        <span class="btn btn-primary btn-file"><span class="fileupload-new">เพิ่มรูป</span>
                        <span class="fileupload-exists">Change</span><input type="file" name="face"/></span>
                        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                    </div>
                </div>
            </div>
 
        <br><br><br><br>
        <div class="form-group">
            <div class="worklist">
                <div class="program col-md-3" >
                        <select  id="program" class="form-control">
                            <option value="0">เลือกโปรแกรม</option>
                        </select>
                </div>
                <div class="col-md-2">
                    <input id="pro_start" name="pro_start" placeholder="เวลาเริ่ม" class="form-control input-md" required="" type="text">
                </div>
                <div class="col-md-2">
                    <input id="pro_end" name="pro_end" placeholder="เวลาสิ้นสุด" class="form-control input-md" required="" type="text">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary btn-sm"  id="save_pro" >
                    เพิ่มสิทธิ์
                    </button>
                </div>
            </div>    
        </div>
        <div class="col-md-1">
                <button class="btn btn-primary btn-sm"  id="save_user">
                บันทึกข้อมูลพนักงาน
                </button>
                </div>
        <br><br><br>
        
       <div id="modify-date-selection"></div>
            <div class="user-category-section">
                
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th class="fix-content"></th>
<!--                            <th class="fix-content">รหัส</th>  -->
                            <th class="fit-content">ชื่อพนักงาน</th>
                            <th class="content">แผนก</th>
<!--                            <th class="content">รายการ</th>  -->
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
</div>
    <div id="data_dep">
       <div id="master-section">
            <ul>
                <li><a href="#master_med">ยาและเวชภัณฑ์</a></li>
                <li><a href="#master_fit">ฟิตเนส</a></li>
                <li><a href="#master_phy">กายภาพบำบัด</a></li>
                <li><a href="#master_nut">โภชนาการ</a></li>
            </ul>
      </div>
        <div id="master_med">
        <div class="form-group">
            <div class="col-md-3">
                <input id="med_thai" name="med_thai" placeholder="ชื่อรายการภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="med_eng" name="med_eng" placeholder="ชื่อรายการภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
        </div>    
        <br><br>
            
        <div class="form-group">
            <div class="col-md-3">
                <input id="med_thai_direct" name="med_thai_direct" placeholder="วิธีใช้ยามาตรฐานภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="med_eng_direct" name="med_eng_direct" placeholder="วิธีใช้ยามาตรฐานภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
            <label id="med_result"></label>
         </div>       
         <br><br>
            
         <div class="form-group">
            <div class="col-md-2">
                <input id="med_order" name="med_order" placeholder="จำนวนมาตรฐาน" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-2">
                <input id="med_unit" name="med_unit" placeholder="หน่วยมาตรฐาน" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-2">
                <div class="med">
                <select id="med_typ" class="form-control">
                <option value="0"> กรุณาเลือกประเภท </option>        
                </select>
                </div>    
            </div>
         </div> 
        <br><br>
        <div class="form-group">
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm"  id="save_med">
                บันทึก
                </button>
            </div>
        </div>
        <br><br>

         
         <div id="modify-date-selection"></div>
            <div class="medication-category-section">
                
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th class="fix-content"></th>
                            <th class="fit-content">ชื่อยาและเวชภัณฑ์</th>
                            <th class="content">วิธีใช้ยามาตรฐาน</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        
     </div>

        
        
       <div id="master_fit">
       <div class="form-group">
            <div class="col-md-3">
                <input id="fit_thai_direct" name="fit_thai_direct" placeholder="วิธีและขั้นตอนการปฏิบัติภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="fit_eng_direct" name="fit_eng_direct" placeholder="วิธีและขั้นตอนการปฏิบัติภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
           <div class="col-md-2">
                <div class="fit">
                    <select id="fit_part" class="form-control">
                        <option value="0"> ส่วนบริหาร </option>
                        <option value="HEAD"> ศีรษะ </option>
                        <option value="BODY"> ลำตัว </option>
                        <option value="ARM"> แขน </option>
                        <option value="LEG"> ขา </option>
                        <option value="FOOT"> เท้า </option>
                    </select>
                </div>    
            </div>
           <div class="col-md-2">
                <div class="fit">
                    <select id="fit_tool" class="form-control">
                        <option value="0"> กรุณาเลือกอุปกรณ์ </option>
                    </select>
                </div>    
            </div>
           
        </div>    
        <br><br>
            
        <div class="form-group">
            <div class="col-md-3">
                <input id="fit_thai_adapt" name="fit_thai_adapt" placeholder="ส่วนการพัฒนาภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="fit_eng_adapt" name="fit_eng_adapt" placeholder="ส่วนการพัฒนาภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
         </div>       
         <br><br>
            
         <div class="form-group">
            <div class="col-md-2">
                <input id="fit_order" name="fit_order" placeholder="จำนวนมาตรฐาน" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-2">
                <input id="fit_unit" name=" fit_unit" placeholder="หน่วยปฏิบัติมาตรฐาน" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-2">
                <div class="med">
                    <select id="fit_typ" class="form-control">
                        <option value="0"> กรุณาเลือกประเภท </option>
                        <option value="MAIN"> ท่าหลัก </option>
                        <option value="MINOR"> ท่าย่อย </option>
                    </select>
                </div>    
            </div>
             <label id="fit_result"></label>
          </div> 
        
        <br><br>
        <div class="form-group">
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm"  id="save_fit">
                บันทึก
                </button>
            </div>  
       </div>

        <br><br>
        
            <div id="modify-date-selection"></div>
            <div class="fitness-category-section">
                
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th class="fix-content"></th>
<!--                            <th class="fix-content">รหัส</th>  -->
                            <th class="fit-content">ชื่อท่าหลัก</th>
                            <th class="content">ส่วนพัฒนา</th>
<!--                            <th class="content">รายการ</th>  -->
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
    </div>
        
        <div id="master_phy">
       <div class="form-group">
            <div class="col-md-3">
                <input id="physic_thai" name="physic_thai" placeholder="ชื่อรายการภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="physic_eng" name="physic_eng" placeholder="ชื่อรายการภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
        </div>    
        <br><br>
            
        <div class="form-group">
            <div class="col-md-3">
                <input id="physic_thai_direct" name="physic_thai_direct" placeholder="วิธีปฏิบัติมาตรฐานภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="physic_eng_direct" name="physic_eng_direct" placeholder="วิธีปฏิบัติมาตรฐานภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
         </div>       
         <br><br>
            
         <div class="form-group">
            <div class="col-md-2">
                <input id="physic_order" name="physic_order" placeholder="จำนวนสั่งมาตรฐาน" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-2">
                <input id="physic_unit" name="physic_unit" placeholder="หน่วยมาตรฐาน" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-2">
                <div class="phy">
                    <select id="phy_typ" class="form-control">
                        <option value="0"> กรุณาเลือกประเภท </option>        
                    </select>
                </div>    
            </div>
             <label id="phy_result"></label>
        </div> 
        
        <br><br>
        <div class="form-group">
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm"  id="save_phy">
                บันทึก
                </button>
            </div>
        </div>    
        <br><br>
            <div id="modify-date-selection"></div>
            <div class="physical-category-section">
                
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th class="fix-content"></th>
<!--                            <th class="fix-content">รหัส</th>  -->
                            <th class="fit-content">ชื่อกายภาพ</th>
                            <th class="content">วิธีปฏิบัติ</th>
<!--                            <th class="content">รายการ</th>  -->
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            
            
      <div id="confirmDialogPhy" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    ยืนยันการลบข้อมูล
                </div>
                <div class="modal-body">
                    คุณต้องการที่จะลบรายการหรือไม่
                </div>
                <div class="modal-footer">
                    <button id="deleteConfirmButtonPhy" type="button" class="btn btn-danger">ตกลง</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
            
            
    </div>
        
        <div id="master_nut">

       <div class="form-group">
            <div class="col-md-3">
                <input id="nut_thai" name="nut_thai" placeholder="ชื่อรายการภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="nut_eng" name="nut_eng" placeholder="ชื่อรายการภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
        </div>    
        <br><br>
        <div class="form-group">
            <div class="col-md-2">
                <input id="nut_order" name="nut_order" placeholder="จำนวนสั่งมาตรฐาน" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-2">
                <input id="nut_unit" name="nut_unit" placeholder="หน่วยมาตรฐาน" class="form-control input-md" required="" type="text">
            </div>
             <div class="col-md-2">
                <input id="nut_cal" name="nut_cal" placeholder="จำนวนแคลโลรี่" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-2">
                <div class="nut">
                    <select id="nut_typ" class="form-control">
                        <option value="0"> กรุณาเลือกประเภท </option>        
                    </select>
                </div>    
            </div>
        </div>
        <br><br>
        <div class="col-md-1">
            <button class="btn btn-primary btn-sm"  id="save_nut">
            บันทึก
            </button>
        </div>
        <br><br><br>
        <div id="modify-date-selection"></div>
            <div class="">
                
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th class="fix-content"></th>
<!--                            <th class="fix-content">รหัส</th>  -->
                            <th class="fit-content">คุณค่าอาหาร</th>
                            <th class="content"></th>
<!--                            <th class="content">รายการ</th>  -->
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        <div class="form-group">
            <div class="worklist">
                <div class="col-md-3">
                    <input id="nut_benefit" name="nut_benefit" placeholder="รายการคุณค่าทางอาหาร" class="form-control input-md" required="" type="text">
                </div>
                <div class="col-md-1">
                    <input id="nut_amount" name="nut_amount" placeholder="จำนวน" class="form-control input-md" required="" type="text">
                </div>
                <div class="col-md-1">
                    <input id="unit" name="unit" placeholder="หน่วย" class="form-control input-md" required="" type="text">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary btn-sm"  id="save_nutrient" >
                    เพิ่ม
                    </button>
                </div>
            </div>    
        </div>
        <br><br>

            <div id="modify-date-selection"></div>
            <div class="nutrition-category-section">
                
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th class="fix-content"></th>
                            <th class="fit-content">ชื่อรายการอาหาร</th>
                            <th class="content"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
  <div id="confirmDialogNut" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    ยืนยันการลบข้อมูล
                </div>
                <div class="modal-body">
                    คุณต้องการที่จะลบรายการหรือไม่
                </div>
                <div class="modal-footer">
                    <button id="deleteConfirmButtonNut" type="button" class="btn btn-danger">ตกลง</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
        
        
    </div>
    </div>
    <div id="data_log">
    </div>
    <div id="data_cate">
    <ul>
        <li><a href="#user">เกี่ยวกับพนักงาน</a></li>
        <li><a href="#player">เกี่ยวกับนักเตะ</a></li>
    </ul>
    <div id="user">
        <div class="form-group">    
            <div class="col-md-3">
                <input id="thai_dep" name="thai_dep" placeholder="ชื่อแผนกภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="eng_department" name="eng_department" placeholder="ชื่อแผนกภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
            <label id="dep_result"></label>
        </div>
        <br><br>
        <div class="form-group">
            <div class="col-md-3">
                <input id="thai_job" name="thai_job" placeholder="ชื่อตำแหน่งภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="eng_job" name="eng_job" placeholder="ชื่อตำแหน่งภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
            <label id="job_result"></label>
         </div>       
         <br><br>
         <div class="form-group">
            <div class="col-md-3">
                <input id="thai_medtyp" name="thai_medtyp" placeholder="ชื่อประเภทยาและเวชภัณฑ์ภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="eng_medtyp" name="eng_medtyp" placeholder="ชื่อประเภทยาและเวชภัณฑ์ภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
             <label id="medtyp_result"></label>
         </div> 
        
        <br><br>
        <div class="form-group">
            <div class="col-md-3">
                <input id="thai_fit_tool" name="thai_fit_tool" placeholder="ชื่ออุปกรณ์ฟิตเนสภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="eng_fit_tool" name="eng_fit_tool" placeholder="ชื่ออุปกรณ์ฟิตเนสอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
            <label id="fit_tool_result"></label>
         </div>
        <br><br>
        
        <div class="form-group">
            <div class="col-md-3">
                <input id="thai_phytyp" name="thai_phytyp" placeholder="ชื่อประเภทกายภาพภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="eng_phytyp" name="eng_phytyp" placeholder="ชื่อประเภทกายภาพภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <label id="phytyp_result"></label>
         </div>
        <br><br>
        
        <div class="form-group">
            <div class="col-md-3">
                <input id="thai_program" name="thai_program" placeholder="ชื่อโปรแกรมภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="eng_program" name="eng_program" placeholder="ชื่อโปรแกรมภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
            <label id="program_result"></label>
         </div>
        <br><br>
        
        <div class="form-group">
            <div class="col-md-3">
                <input id="thai_nuttyp" name="thai_nuttyp" placeholder="ชื่อประเภทโภชนาการภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="eng_nuttyp" name="eng_nuttyp" placeholder="ชื่อประเภทโภชนาการภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
            <label id="nut_result"></label>
         </div>
        <br><br>
        
        <div class="form-group">
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm"  id="save_user_cate">
                บันทึก
                </button>
            </div>  
       </div>
        <div class="form-group">
        <table class="table table-striped table-condensed">
            <thead>
               <tr>
                    <th >รายการหมวดหมู่เกี่ยวกับผู้ใช้</th>
                </tr>    
           </thead>
            <tbody>
                <tr>
                    <th class="">xxxx</th>
                 </tr>
              </tbody>
        </table>
     </div>
    </div>
    <div id="player">
       <div class="form-group">
            <div class="col-md-3">
                <input id="thai_position" name="thai_position" placeholder="ชื่อตำแหน่งนักเตะภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="eng_position" name="eng_position" placeholder="ชื่อตำแหน่งนักเตะภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
           <label id="pos_result"></label>
         </div>   
       
        <br><br>
        <div class="form-group">
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm"  id="save_player_cate">
                บันทึก
                </button>
            </div>  
       </div>
        <br><br>
        
        <table class="table table-striped table-condensed">
            <thead>
               <tr id="pos">
                    <th >รายการหมวดหมู่เกี่ยวกับนักเตะ</th>
                </tr>    
           </thead>
            <tbody>
                <tr>
                    <th class="fit-content">xxxx</th>
                 </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>
<script src="../../js/file-upload.js"></script>
<script>
                                    $("#department-section").tabs();
                                    $("#data_dep").tabs();
                                    $("#data_cate").tabs();
                                    
</script>

<script>
                                    
                                     $('#save_fit').click(addFitness);
                                     $('#save_user_cate').click(addCategory);
                                     $('#save_player_cate').click(addPlayerPosition);
                                     $('#save_phy').click(addPhysical);
                                      $('#save_nut').click(addNutrition);
        
                                     function addPlayerPosition(){
                                         
                                     var thai_position =  $('#thai_position').val();
                                     var eng_position =  $('#eng_position').val();

                                    if (!thai_position && !eng_position) {
                                         alert("กรุณากรอกข้อมูลด้วยครัช");

                                         return;
                                     }
                                         
                                     else{

                                    $.ajax({
                                    url:'<?php echo site_url("Administrator/addPlayerPosition")?>',
                                    data:'thai_position=' + thai_position + '&eng_position=' + eng_position,
                                    type:'post',
                                    success: function(res){
                                    if(res){

                                    if(thai_position === "") {
                                    $('#pos_result').html('');
                                    }
                                    else{
                           //         $(".fit-content").append("<tr><th >" + thai_position + "</th></tr>");
                                    $('#pos_result').html("<span class=\"label label-success\">" + res + " " + thai_position + " เรียบร้อยแล้วครับ" + "</span>");    
                                    $("#thai_position").val('');
                                    $("#eng_position").val('');
                                    }
                                    }
                                    else{
                                    $('#pos_result').html("<span class=\"label label-warning\">" + 'บันทึกข้อมูลไม่ได้' + "</span>"); 
                                    }
                                    },
                                    error:function(){

                                    $('#pos_result').html("<span class=\"label label-warning\">" + 'Can not connect DB' + "</span>");

                                    }
                                    });
                                    }    
                                         
                                     }
                                     function addPlayerPosition(){
                                     
                                      var thai_position =  $('#thai_position').val();
                                     var eng_position =  $('#eng_position').val();

                                    if (!thai_position && !eng_position) {
                                         alert("กรุณากรอกข้อมูลด้วยครัช");

                                         return;
                                     }
                                    else{

                                    var addPosition= {};
                                            
                                                
                                          
                                            addPosition.tPosition = $("#thai_position").val();
                                            addPosition.ePosition = $("#eng_position").val();
                                            
                                            
                                            $.post("addPlayerPosition", JSON.stringify(addPosition)).done(function() {

                                            $("#thai_position").val('');
                                            $("#eng_position").val('');

                                            
////                                                loadCoachSchedule($(".schedule-calendar"));
                                            }).fail(function() {
                                                alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
                                            });
                                   
                                    }
                                     
                                     
                                     }
                                  
                                    
                                    function addCategory(){
                                    
                                    
                                    var thai_dep =  $('#thai_dep').val();
                                    var thai_job =  $('#thai_job').val();
                                    var thai_medtyp =  $('#thai_medtyp').val();
                                    var thai_fit_tool =  $('#thai_fit_tool').val();
                                    var thai_phytyp =  $('#thai_phytyp').val();
                                    var thai_program =  $('#thai_program').val();
                                    var thai_nuttyp =  $('#thai_nuttyp').val();
                                    var eng_department =  $('#eng_department').val();
                                    var eng_job =  $('#eng_job').val();
                                    var eng_medtyp =  $('#eng_medtyp').val();
                                    var eng_fit_tool =  $('#eng_fit_tool').val();
                                    var eng_phytyp =  $('#eng_phytyp').val();
                                    var eng_program =  $('#eng_program').val();
                                    var eng_nuttyp =  $('#eng_nuttyp').val();
                                    
                                   if (!thai_dep && !thai_job && !thai_medtyp && !thai_fit_tool && !thai_phytyp && !thai_program && !thai_nuttyp && !eng_department && !eng_job && !eng_medtyp && !eng_fit_tool && !eng_phytyp && !eng_program && !eng_nuttyp) {
                                         alert("กรุณากรอกข้อมูลด้วยคราบ");

                                         return;
                                     }
                                    
                                    else{
                                        
                                        
                                        var addCate= {};
                                            
                                            
                                          
                                            addCate.department = $("#thai_dep").val();
                                            addCate.job = $("#thai_job").val();
                                            addCate.medType = $("#thai_medtyp").val();
                                            addCate.fitTool = $("#thai_fit_tool").val();
                                            addCate.physicType = $("#thai_phytyp").val();
                                            addCate.program = $("#thai_program").val();
                                            addCate.nutType = $("#thai_nuttyp").val();
                                            addCate.eJob = $("#eng_job").val();
                                            addCate.eDepartment = $("#eng_department").val(); 
                                            addCate.eMedType = $("#eng_medtyp").val();
                                            addCate.eFitTool = $("#eng_fit_tool").val();
                                            addCate.ePhysicType = $("#eng_phytyp").val();
                                            addCate.eProgram = $("#eng_program").val();
                                            addCate.eNutType = $("#eng_nuttyp").val(); 
                                            
                                            $.post("addCategory", JSON.stringify(addCate)).done(function() {
//                                                $("#addDialog").modal("hide");
                                            
////                                                loadCoachSchedule($(".schedule-calendar"));
                                            }).fail(function() {
                                                alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
                                            });
//                                        }     
//                                        
//             });         
                                    }
                                    }
                                    
                 function loadCategory(getCate,oderCate,oderGroup,tagDisplay,tag) {


                $.get(getCate + "/" + oderCate + "/" + oderGroup).done(function(content) {
                    var ret = jQuery.parseJSON(content);
//                    var worklist = ret.result;

                    var $tableBody = tagDisplay;

                    $tableBody.empty();

                    if (ret.length > 0) {
                        for (var index=0; index<ret.length; index++) {
                            var $row = createWorklistItemRow(ret[index],tag);

                            $tableBody.append($row);
                        }
                    } else {
                        $("<tr><td class='content' colspan='4'>*** ไม่มีรายการ</td></tr>").appendTo($tableBody);
                    }
                });
            }
            
            
            
                function createWorklistItemRow(item,tag) {
                var $row = $("<tr>", { "data-worklist-seq": item.OdrCod });

        var $deleteItem = $("<img>", { src: "../../images/delete.png" });
        $deleteItem.click(function() {
            
            var dialog = tag;
       //     var dialog = $("#confirmDialog");
             
            $selectedRow = $row;
            
            dialog.modal("show");
        });
                $("<td>", { class: "fix-content" }).append($deleteItem).appendTo($row);
//                $("<td>", { class: "fit-content" }).text(item.OdrCod).appendTo($row);
                $("<td>", { class: "fit-content" }).text(item.OdrLocNam).appendTo($row);
//                $("<td>", { class: "fit-content" }).text(item.OdrCatTyp).appendTo($row);
                $("<td>", { "class": "content" }).html(item.OdrLocAdp === "NULL" ? '': item.OdrLocAdp).appendTo($row);
//                $("<td>", { "class": "content" }).html(item.OdrGrpTyp === "NULL" ? '': item.OdrGrpTyp).appendTo($row);
//                $("<td>", { class: "content" }).text(item.OdrLocAdp).appendTo($row);

                return $row;
    }
    
    
    $("#deleteConfirmButtonPhy").click(deleteMaster);
    
    
                function deleteMaster(){
        
                        var dialog = $("#confirmDialogPhy");

                        dialog.attr("data-item-seq");

                        dialog.modal("hide");

                        var deleteItem = {};
                        deleteItem.worklistSeq = $selectedRow.attr("data-worklist-seq");

                        $.post("deleteOrderMaster", JSON.stringify(deleteItem)).done(function() {
                            $selectedRow.detach();
                        }).fail(function() {
                           alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
                        });
                    }
    
    
        $("#deleteConfirmButtonNut").click(function() {
        var dialog = $("#confirmDialogNut");
        
        dialog.attr("data-item-seq");
        
        dialog.modal("hide");
        
        var deleteItem = {};
        deleteItem.worklistSeq = $selectedRow.attr("data-worklist-seq");

        $.post("deleteOrderMaster", JSON.stringify(deleteItem)).done(function() {
            $selectedRow.detach();
        }).fail(function() {
           alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
        });
    });
                                    
                                    

                                    
                                    $('#save_med').click(addMedication);
                                    
                                    
                                    function addMedication(){
                                        
                                        
                                        
                                    var med_thai = $('#med_thai').val();
                                    var med_eng = $('#med_eng').val();
                                    var med_thai_direct = $('#med_thai_direct').val();
                                    var med_eng_direct = $('#med_eng_direct').val();
                                    var med_order = $('#med_order').val();
                                    var med_unit = $('#med_unit').val();
                                    var med_typ =  $("#med_typ option:selected" ).val();
                                    
                                    
                                    if (!med_thai && !med_eng && !med_thai_direct && !med_eng_direct && !med_order && !med_unit && med_typ !== 0) {
                                         alert("กรุณากรอกข้อมูลด้วยครับ");

                                         return;
                                     }
                                     else{
                                            
                                            
                                            
                                    var addMed= {};




                                    addMed.tMed = $("#med_thai").val();
                                    addMed.eMed = $("#med_eng").val();
                                    addMed.tDirection = $("#med_thai_direct").val();
                                    addMed.eDirection = $("#med_eng_direct").val();
                                    addMed.medOder = $("#med_order").val();
                                    addMed.medUnit = $("#med_unit").val();
                                    addMed.medType = $("#med_typ").val();


                                    $.post("addMed", JSON.stringify(addMed)).done(function() {
//                                                $("#addDialog").modal("hide");
                                    $('#med_thai').val('');
                                    $('#med_eng').val('');
                                    $('#med_thai_direct').val('');
                                    $('#med_eng_direct').val('');
                                    $('#med_order').val('');
                                    $('#med_unit').val('');
                                    $("#med_typ" ).val('0');
                                    
                                    var medGet = 'getMedCategory';
                                    var oderCate = 'MED';
                                    var oderGroup = '' ;
                                    var tagDisplay = $(".medication-category-section tbody");
                                    loadCategory(medGet,oderCate,oderGroup,tagDisplay);
                                    }).fail(function() {
                                        alert("ไม่สามารถเพิ่มข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
                                    });
                                    }
                                    }
                                 
                                    
                                    
                                    function addFitness(){
                                        
                                        
                                        
                                    var fit_thai_adapt = $('#fit_thai_adapt').val();
                                    var fit_eng_adapt = $('#fit_eng_adapt').val();
                                    var fit_thai_direct = $('#fit_thai_direct').val();
                                    var fit_eng_direct = $('#fit_eng_direct').val();
                                    var fit_order = $('#fit_order').val();
                                    var fit_unit = $('#fit_unit').val();
                                    var fit_typ =  $("#fit_typ option:selected" ).val();
                                    var fit_tool =  $("#fit_tool option:selected" ).val();
                                    var fit_part =  $("#fit_part option:selected" ).val();
                                    
                                    if (!fit_thai_adapt && !fit_eng_adapt && !fit_thai_direct && !fit_eng_direct && !fit_order && !fit_unit && fit_typ !== 0 && fit_tool !== 0 && fit_part !== 0) {
                                         alert("กรุณากรอกข้อมูลด้วยครับ");

                                         return;
                                     }
                                     else{
                                            
                                            
                                            
                                    var addFitness= {};




                                    addFitness.tDirect = $("#fit_thai_direct").val();
                                    addFitness.eDirect = $("#fit_eng_direct").val();
                                    addFitness.tAdapt = $("#fit_thai_adapt").val();
                                    addFitness.eAdapt = $("#fit_eng_adapt").val();
                                    addFitness.fitOder = $("#fit_order").val();
                                    addFitness.fitUnit = $("#fit_unit").val();
                                    addFitness.fitType = $("#fit_typ").val();
                                    addFitness.fitTool = $("#fit_tool").val();
                                    addFitness.fitPart = $("#fit_part").val(); 


                                    $.post("addFit", JSON.stringify(addFitness)).done(function() {
//                                                $("#addDialog").modal("hide");
                                    $("#fit_thai_direct").val('');
                                    $("#fit_eng_direct").val('');
                                    $("#fit_thai_adapt").val('');
                                    $("#fit_eng_adapt").val('');
                                    $("#fit_order").val('');
                                    $("#fit_unit").val('');
                                    $("#fit_typ").val('0');
                                    $("#fit_tool").val('0');
                                    $("#fit_part").val('0');
                                    
                                    var fitGet = 'getFitCategory';
                                    var oderCate = 'FIT';
                                    var oderGroup = 'MAIN' ;
                                    var tagDisplay = $(".fitness-category-section tbody");
                                    loadCategory(fitGet,oderCate,oderGroup,tagDisplay);
                                    }).fail(function() {
                                        alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
                                    });
                                    }
                                    }
                                    
                                    function addPhysical(){
                                        
                                        
                                    var physic_thai = $('#physic_thai').val();
                                    var physic_eng = $('#physic_eng').val();
                                    var physic_thai_direct = $('#physic_thai_direct').val();
                                    var physic_eng_direct = $('#physic_eng_direct').val();
                                    var physic_order = $('#physic_order').val();
                                    var physic_unit = $('#physic_unit').val();
                                    var phy_typ =  $("#phy_typ option:selected" ).val();
                                    
                                    
                                    if (!physic_thai && !physic_eng && !physic_thai_direct && !physic_eng_direct && !physic_order && !physic_unit && phy_typ !== 0) {
                                         alert("กรุณากรอกข้อมูลด้วยครับ");

                                         return;
                                     }
                                     else{
                                            
                                            
                                           var addPhysical= {};
                                            
                                            addPhysical.tPhy = $("#physic_thai").val();
                                            addPhysical.ePhy = $("#physic_eng").val();
                                            addPhysical.tPhyDirecttion = $("#physic_thai_direct").val();
                                            addPhysical.ePhyDirecttion = $("#physic_eng_direct").val();
                                            addPhysical.phyOrder = $("#physic_order").val();
                                            addPhysical.phyUnit = $("#physic_unit").val();
                                            addPhysical.phyType = $("#phy_typ").val();
                                           
                                            
                                            $.post("addPhy", JSON.stringify(addPhysical)).done(function() {
                                                
                                            $("#physic_thai").val('');
                                            $("#physic_eng").val('');
                                            $("#physic_thai_direct").val('');
                                            $("#physic_eng_direct").val('');
                                            $("#physic_order").val('');
                                            $("#physic_unit").val('');
                                            $("#phy_typ").val('0');
                                            
                                            var phyGet = 'getPhyCategory';
                                            var oderCate = 'PHY';
                                            var oderGroup = '';
                                            var tagDisplay = $(".physical-category-section tbody");
                                            var phyTag = $("#confirmDialogPhy");
                                            loadCategory(phyGet,oderCate,oderGroup,tagDisplay,phyTag);
                                            }).fail(function() {
                                            alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
                                            });
                                            }  
                                            }
                                    
                                    
                                    function addNutrition(){
                                        
                                        
                                    var nut_thai = $('#nut_thai').val();
                                    var nut_eng = $('#nut_eng').val();
                                    var nut_order = $('#nut_order').val();
                                    var nut_unit = $('#nut_unit').val();
                                    var nut_cal = $('#nut_cal').val();
                                    var nut_typ =  $("#nut_typ option:selected" ).val();
                                    
                                    
                                    if (!nut_thai && !nut_eng && !nut_order && !nut_unit && !nut_cal && nut_typ !== 0) {
                                         alert("กรุณากรอกข้อมูลด้วยครับ");

                                         return;
                                     }
                                     else{
                                            
                                            
                                           var addNut= {};
                                            
                                            addNut.tNut = $("#nut_thai").val();
                                            addNut.eNut = $("#nut_eng").val();
                                            addNut.nutOrder = $("#nut_order").val();
                                            addNut.nutUnit = $("#nut_unit").val();
                                            addNut.nutCalories = $("#nut_cal").val();
                                            addNut.nutType = $("#nut_typ").val();
                                           
                                            
                                            $.post("addNut", JSON.stringify(addNut)).done(function() {
                                                
                                            $("#nut_thai").val('');
                                            $("#nut_eng").val('');
                                            $("#nut_order").val('');
                                            $("#nut_unit").val('');
                                            $("#nut_cal").val('');
                                            $("#nut_typ").val('0');
                                            
                                            var nutGet = 'getNutCategory';
                                            var oderCate = 'NUT';
                                            var oderGroup = '';
                                            var tagDisplay = $(".nutrition-category-section tbody");
                                            var nutTag = $("#confirmDialogNut");
                                            loadCategory(nutGet,oderCate,oderGroup,tagDisplay,nutTag);
                                                
                                            }).fail(function() {
                                             alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
                                            });
                                            }  
                                            }
                                    
                               
                                    $.ajax({
                                    url:'<?php echo site_url("Administrator/getFitTyp")?>',
                                    success: function(fittyp){
                                    var re = $.parseJSON(fittyp);
                                    $.each(re.fittyp ,function(index,value)
                                   {
                                    $("#fit_tool").append("<option value="+value.CatCod+">"+value.CatLocNam+"</option>");
                                    });
                                    }
                                    });
                                    $.ajax({
                                    url:'<?php echo site_url("Administrator/getUserID")?>',
                                    success: function(res){
                                    var re = $.parseJSON(res);
                                   {
                                    if(!re.error){
   //                               alert(re.res[0].uid);
                                    var id =  re.res[0].uid ;
                                   $('#user_id').html('<input id="user_id" name="user_id" placeholder=" ' + id + ' " class="form-control input-md" disabled="disabled" required="" type="text">'); 
                                    }
                                    
                                    }
                                    }
                                    });
                                    $.ajax({
                                    url:'<?php echo site_url("Administrator/getMedTyp")?>',
                                    success: function(medtyp){
                                    var re = $.parseJSON(medtyp);
                                    $.each(re.medtyp ,function(index,value)
                                   {
                                    $("#med_typ").append("<option value="+value.CatCod+">"+value.CatLocNam+"</option>");
                                    });
                                    }
                                    });
                                    $.ajax({
                                    url:'<?php echo site_url("Administrator/getPhyTyp")?>',
                                    success: function(phytyp){
                                    var re = $.parseJSON(phytyp);
                                    $.each(re.phytyp ,function(index,value)
                                   {
                                    $("#phy_typ").append("<option value="+value.CatCod+">"+value.CatLocNam+"</option>");
                                    });
                                    }
                                    });
                                    $.ajax({
                                    url:'<?php echo site_url("Administrator/getNutTyp")?>',
                                    success: function(nuttyp){
                                    var re = $.parseJSON(nuttyp);
                                    $.each(re.nuttyp ,function(index,value)
                                   {
                                    $("#nut_typ").append("<option value="+value.CatCod+">"+value.CatLocNam+"</option>");
                                    });
                                    }
                                    });
                                    $.ajax({
                                    url:'<?php echo site_url("Administrator/getDep")?>',
                                    success: function(deps){
                                    var re = $.parseJSON(deps);
                                    $.each(re.deps ,function(index,value)
                                   {
                                    $("#deps").append("<option value="+value.DepCod+">"+value.DepLocNam+"</option>");
                                    });
                                    }
                                    });
                                    $.ajax({
                                    url:'<?php echo site_url("Administrator/getJob")?>',    
                                    success: function(jobs){
                                    var re = $.parseJSON(jobs);
                                    $.each(re.jobs ,function(index,value)
                                   {
                                    $("#jobs").append("<option value="+value.DepCod+">"+value.DepLocNam+"</option>");
                                    });
                                    }
                                    });
                                    $.ajax({
                                    url:'<?php echo site_url("Administrator/getProgram")?>',
                                    success: function(program){
                                    var re = $.parseJSON(program);
                                    $.each(re.program ,function(index,value)
                                   {
                                    $("#program").append("<option value="+value.CatCod+">"+value.CatLocNam+"</option>");
                                    });
                                    }
                                    });
                                    
                               
                                    
</script> 
<script>

                                    $(function(){                                      
                                    $('#save_user').click(addUserProfile);
//                                    $('#show').click(loadCategory);
                                    var fitGet = 'getFitCategory';
                                    var fitCate = 'FIT';
                                    var fitGroup = 'MAIN';
                                    var fitDisplay = $(".fitness-category-section tbody");
                                    
                                    loadCategory(fitGet,fitCate,fitGroup,fitDisplay);
                                    var phyGet = 'getPhyCategory';
                                    var phyCate = 'PHY';
                                    var phyGroup = '';
                                    var phyDisplay = $(".physical-category-section tbody");
                                    var phyTag = $("#confirmDialogPhy");
                                    loadCategory(phyGet,phyCate,phyGroup,phyDisplay,phyTag);
                                    var nutGet = 'getNutCategory';
                                    var nutCate = 'NUT';
                                    var nutGroup = '';
                                    var nutDisplay = $(".nutrition-category-section tbody");
                                    var nutTag = $("#confirmDialogNut");
                                    loadCategory(nutGet,nutCate,nutGroup,nutDisplay,nutTag);
                                    var medGet = 'getMedCategory';
                                    var medCate = 'MED';
                                    var medGroup = '' ;
                                    var medDisplay = $(".medication-category-section tbody");
                                    loadCategory(medGet,medCate,medGroup,medDisplay);
                                    
                                    

                                  
                                    
                                    
                                function addUserProfile() {
                                            
                                            
                                            
                                    var user_fname = $('#user_fname').val();
                                    var user_lname = $('#user_lname').val();
                                    var user_pass = $('#user_pass').val();
                                    var user_tel = $('#user_tel').val();
                                    var user_mail = $('#user_mail').val();
                                    var deps =  $("#deps option:selected" ).val();
                                    var jobs =  $("#jobs option:selected" ).val();
                                    
                                    if (!user_fname && !user_lname && !user_pass && !user_tel && !user_mail && deps !== 0 && jobs !== 0) {
                                         alert("กรุณากรอกข้อมูลด้วยครับ");

                                         return;
                                     }
                                     else{
                                         
                                         
                                           var userprofile = {};
                                            

//                                            addprofile.birthdate = getDateFromDatePicker($("#birthdate"), "yymmdd");
                                        //    addprofile.startTime = $(".hour-selection")[0].value + $(".minute-selection")[0].value;
                                        //    addprofile.endTime = $(".hour-selection")[1].value + $(".minute-selection")[1].value;
                                            userprofile.firstName = $("#user_fname").val();
                                            userprofile.lastName = $("#user_lname").val();
                                            userprofile.userPass = $("#user_pass").val();
                                            userprofile.userTel = $("#user_tel").val();
                                            userprofile.userMail = $("#user_mail").val();
                                            userprofile.userDep = $("#deps").val();
                                            userprofile.userJob = $("#jobs").val();
                                            
                                            
//                                            var $addError = $("#add-error");
//                                            $addError.addClass("hidden");

//                                            if (addprofile.detail.length <= 0) {
//                                                $addError.text("ข้อมูลไม่ครบถ้วน โปรดกรอกรายการงาน");
//                                                $addError.removeClass("hidden");
//                                                return;
//                                            }

//                                            if (addRequest.startTime >= addRequest.endTime) {
//                                                $addError.text("ข้อมูลผิดพลาด เวลาเริ่มต้นไม่สามารถมากกว่าหรือเท่ากับเวลาสิ้นสุด");
//                                                $addError.removeClass("hidden");
//                                                return;
//                                            }

                                            $.post("addUserProfile", JSON.stringify(userprofile)).done(function() {
                                            
                                            loadCategory();
//                                                  $("#addDialog").modal("hide");
//
////                                                loadCoachSchedule($(".schedule-calendar"));
//                                            }).fail(function() {
//                                                alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
//                                            });
//                                        }     
//                                        
             });                 
            }
            };    
            
            

            
            
            
            
            }); 
                                    
</script>     

    
