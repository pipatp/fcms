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

#cate-section { 
    padding: 0px; 
    background: none; 
    border-width: 0px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;
}

#cate-section .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 1px 0px; 
    -moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px;
}

#cate-section .ui-tabs-nav li {
    width: 24%;
    
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

#cate-section .ui-tabs-nav li a {
    width: 100%;
        
    outline: none;
}

#cate-section .ui-tabs-panel {
    padding-top: 20px;
    border-width: 0px 1px 1px 1px;
    
    font-size: 13px;
}

#cate-section .line-space-nm {
    margin-bottom: 5px;
}

#user .fix-content {
    padding-left: 10px;
    padding-right: 10px;
    
    width: 36px;
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
</style>
<div id="cate-section">
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
                <input id="thai_eng" name="thai_eng" placeholder="ชื่อแผนกภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="thai_end_date" name="dep_end_date" placeholder="สิ้นสุด" class="form-control input-md" required="" type="text">
            </div>
        </div>    
        <br><br>
            
        <div class="form-group">
            <div class="col-md-3">
                <input id="thai_job" name="thai_job" placeholder="ชื่อตำแหน่งภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="thai_eng" name="thai_eng" placeholder="ชื่อตำแหน่งภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="job_end_date" name="job_end_date" placeholder="สิ้นสุด" class="form-control input-md" required="" type="text">
            </div>
         </div>       
         <br><br>
            
         <div class="form-group">
            <div class="col-md-3">
                <input id="thai_medtyp" name="thai_medtyp" placeholder="ชื่อประเภทยาและเวชภัณฑ์ภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="eng_medtyp" name="eng_medtyp" placeholder="ชื่อประเภทยาและเวชภัณฑ์ภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="medtyp_end_date" name="medtyp_end_date" placeholder="สิ้นสุด" class="form-control input-md" required="" type="text">
            </div>
         </div> 
        
        <br><br>
        <div class="form-group">
            <div class="col-md-3">
                <input id="thai_fittyp" name="thai_fittyp" placeholder="ชื่อประเภทฟิตเนสภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="eng_fittyp" name="eng_fittyp" placeholder="ชื่อประเภทฟิตเนสภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="fittyp_end_date" name="fittyp_end_date" placeholder="สิ้นสุด" class="form-control input-md" required="" type="text">
            </div>
         </div>
        <br><br>
        
        
        <div class="form-group">
            <div class="col-md-3">
                <input id="thai_phytyp" name="thai_phytyp" placeholder="ชื่อประเภทกายภาพภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="eng_phytyp" name="eng_phytyp" placeholder="ชื่อประเภทกายภาพภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="fittyp_end_date" name="fittyp_end_date" placeholder="สิ้นสุด" class="form-control input-md" required="" type="text">
            </div>
         </div>
        <br><br>
        
        <div class="form-group">
            <div class="col-md-3">
                <input id="thai_program" name="thai_program" placeholder="ชื่อโปรแกมภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="eng_program" name="eng_program" placeholder="ชื่อโปรแกมภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="program_end_date" name="program_end_date" placeholder="สิ้นสุด" class="form-control input-md" required="" type="text">
            </div>
         </div>
        <br><br>
        
        <div class="form-group">
            <div class="col-md-3">
                <input id="thai_nuttyp" name="thai_nuttyp" placeholder="ชื่อประเภทโภชนาการภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="eng_nuttyp" name="eng_nuttyp" placeholder="ชื่อประเภทโภชนาการภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="nut_end_date" name="nut_end_date" placeholder="สิ้นสุด" class="form-control input-md" required="" type="text">
            </div>
         </div>
        <br><br>
        
        <div class="form-group">
            <div class="col-md-3">
                <input id="thai_worktyp" name="thai_worktyp" placeholder="ชื่องานภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="eng_worktyp" name="eng_worktyp" placeholder="ชื่องานภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="work_end_date" name="work_end_date" placeholder="สิ้นสุด" class="form-control input-md" required="" type="text">
            </div>
         </div>
        <br><br>
        
        <div class="form-group">
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm"  id="save_user_cate">
                บันทึก
                </button>
            </div>  
       </div>
        <br><br>
        
        <table class="table table-striped table-condensed">
            <thead>
               <tr>
                    <th >รายการหมวดหมู่เกี่ยวกับผู้ใช้</th>
                </tr>    
           </thead>
            <tbody>
                <tr>
                    <th class="fit-content">xxxx</th>
                 </tr>
            </tbody>
        </table>
     </div>
    
    <div id="player">
       <div class="form-group">
            <div class="col-md-3">
                <input id="thai_position" name="thai_position" placeholder="ชื่อตำแหน่งนักเตะภาษาไทย" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="eng_position" name="eng_position" placeholder="ชื่อตำแหน่งนักเตะภาษาอังกฤษ" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
                <input id="position_end_date" name="position_end_date" placeholder="สิ้นสุด" class="form-control input-md" required="" type="text">
            </div>
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
               <tr>
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
<script>
    $("#cate-section").tabs({heightStyle: "fill"});
</script>