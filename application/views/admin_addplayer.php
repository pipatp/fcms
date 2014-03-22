<style type="text/css">
.worklist {
    border: 1px solid #ccc;
    padding: 10px;
    width: 1000px;
    border-color: black;
    background-color: white ;
    margin-left: 0px;
    height:60px;


}    

#department-section { 
    padding: 0px; 
/*    background: none; */ 
    border-width: 0px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;
}

#department-section .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 0px 0px; 
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
    border-width: 0px 0px 0px 0px; 
    
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
    border-width: 0px 0px 0px 0px;

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
    border-width: 0px 0px 0px 0px;
    
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

#data_user { 
    padding: 0px; 
    background: none; 
    border-width: 0px;

    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;
}

#data_user .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 0px 0px;

-moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px;
}

#data_user .ui-tabs-nav li {
    width: 24%;
    
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

#data_user .ui-tabs-nav li a {
    width: 100%;
        
    outline: none;
}

#data_user .ui-tabs-panel {
    padding-top: 20px;
    border-width: 0px 0px 0px 0px;
   
    font-size: 13px;
}

#data_user .line-space-nm {
    margin-bottom: 5px; 
}


#data_user .fix-content {
    padding-left: 10px;
    padding-right: 10px;
    
    width: 36px;
}

#basic_player .fix-content {
    padding-left: 10px;
    padding-right: 10px;
    height:500px; 
    width: 36px;
}

#basic_player .fit-content {
    width: 1px;
    white-space: nowrap;
    
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}

#basic_player .content {
    padding-left: 10px;
    padding-right: 10px;
}




#master_tech .fix-content {
    padding-left: 10px;
    padding-right: 10px;
    height:500px; 
    width: 36px;
}

#master_tech .fit-content {
    width: 1px;
    white-space: nowrap;
    
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}

#master_tech .content {
    padding-left: 10px;
    padding-right: 10px;
}


#user .fix-content {
    padding-left: 10px;
    padding-right: 10px;
/*    height:500px; */
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
    border-width: 0px 0px 0px 0px; 
 
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
    border-width: 0px 1px 0px 1px;
    
    font-size: 13px;
}

#data_cate .line-space-nm {
    margin-bottom: 5px; 
}


</style>
<div id="department-section">
    <ul>
        <li><a href="#data_user">ข้อมูลนักเตะ</a></li>
        <li><a href="#data_dep">ความสามารถนักเตะ</a></li>
        
    </ul>
    <div id="data_user">
    
        <div id="player-section">
            <ul>
                <li><a href="#basic_player">ข้อมูลนักเตะพื้นฐาน</a></li>
                <li><a href="#expand_player">ข้อมูลนักเตะเพิ่มเติม</a></li>
                <li><a href="#image_player">รูปนักเตะ</a></li>
            </ul>
      </div>
        
       
<div id="basic_player">
            <div class="form-group">
<div class="col-md-2">
<input id="titcode" name="titcode" placeholder="หมายเลขนักเตะ" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>  
<div class="col-md-2">
<input id="firstname" name="firstname" placeholder="ชื่อ" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="midname" name="midname" placeholder="ชื่อกลาง" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="surname" name="surname" placeholder="นามสกุล" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>  
</div>
<br><br>
        
<div class="form-group">  
<div class="col-md-2">
<input id="nickname" name="nickname" placeholder="ชื่อเล่น" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="efirstname" name="efirstname" placeholder="ชื่อ(ภาษาอังกฤษ)" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="emidname" name="emidname" placeholder="ชื่อกลาง(ภาษาอังกฤษ)" class="form-control input-md" type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="esurname" name="esurname" placeholder="นามสกุล(ภาษาอังกฤษ)" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
</div>
<br><br>

        
<div class="form-group">
<div class="col-md-2">
<input id="enickname" name="enickname" placeholder="ชื่อเล่น(ภาษาอังกฤษ)" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="idno" name="idno" placeholder="หมายเลขบัตรประชาชน" class="form-control input-md" type="text">
</div>
<label class="col-md-1"></label>  
<div class="col-md-2">
<input id="passport" name="passport" placeholder="หมายเลขพาสปอร์ต" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="add_num" name="add_num" placeholder="หมายเลขที่อยู่" class="form-control input-md" type="text">
</div>
<label class="col-md-1"></label>
</div>
<br><br>

<div class="form-group">
<div class="col-md-2">
<input id="add_detail" name="add_detail" placeholder="รายละเอียดที่อยู่" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>  
<div class="col-md-2">
<div class="tambon">
<select id="tambon_id" class="form-control" >
<option value="0"> ------- ตำบล -------</option>
<!-- Display Tambon  -->
               
</select>
</div>
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<div class="amphur">
<select id="amphur_id" class="form-control" >
<option value="0"> ------- อำเภอ -------</option>
    <!-- Display Amphur  -->
    
</select>
</div>
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<div class="province">
<select id="province_id" class="form-control" >
<option value="0"> ------- จังหวัด -------</option>    
<!-- Display Province  -->
    
</select>
</div>
</div>
<label class="col-md-1"></label>
</div>
            
<br><br>


<div class="form-group">

<div class="col-md-2">
<div class="country">
<select id="country_id" class="form-control" >
<option value="0"> ------- ประเทศ -------</option>   
<!-- Display Country  -->
    
</select>
</div>
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="add_num_current" name="add_num_current" placeholder="หมายเลขที่อยู่(ปัจจุบัน)" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="add_detail_current" name="add_detail_current" placeholder="รายละเอียดที่อยู่(ปัจจุบัน)" class="form-control input-md" type="text">
</div>
<label class="col-md-1"></label>     
<div class="col-md-2">
<div class="tambon2">
<select id="tambon_id2" class="form-control" >
<option value="0"> ------- ตำบล -------</option>
<!-- Display Tambon  -->
               
</select>
</div>
</div>
<label class="col-md-1"></label>
</div>
            
<br><br>


<div class="form-group">

<div class="col-md-2">
<div class="amphur2">
<select id="amphur_id2" class="form-control" >
<option value="0"> ------- อำเภอ -------</option>
    <!-- Display Amphur  -->
    
</select>
</div>
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<div class="province2">
<select id="province_id2" class="form-control" >
<option value="0"> ------- จังหวัด -------</option>    
<!-- Display Province  -->
    
</select>
</div>
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<div class="country2">
<select id="country_id2" class="form-control" >
<option value="0"> ------- ประเทศ -------</option>   
<!-- Display Country  -->
    
</select>
</div>
</div>
<label class="col-md-1"></label>    
<div class="col-md-2">
<input id="add_num_foreign" name="add_num_foreign" placeholder="หมายเลขที่อยู่(นักเตะต่างชาติ)" class="form-control input-md" type="text">
</div>
<label class="col-md-1"></label>  
</div>
<br><br>


<div class="form-group">

<div class="col-md-2">
<input id="add_detail_foreign" name="add_detail_foreign" placeholder="รายละเอียดที่อยู่(ต่างชาติ)" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<div class="region">
<select id="region_id" class="form-control" >
<option value="0">----- เลือกศาสนา -----</option>        
<option value="1">พุทธ</option>
<option value="2">คริส</option>
<option value="3">อิสลาม</option>
</select>
</div>
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<div class="sex">
<select id="sex_id" class="form-control" >
<option value="0">----- เลือกเพศ -----</option>        
<option value="1">ชาย</option>
<option value="2">หญิง</option>
    <!-- Display Region  -->
    
</select>
</div>
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="birthdate" name="birthdate" placeholder="วันเกิด" class="form-control input-md" type="text">
</div>
<label class="col-md-1"></label>  
</div>

<br><br>
<div class="form-group">
   
    
<div class="col-md-2">    
<input id="mobile_num" name="mobile_num" placeholder="หมายเลขโทรศัพท์มือถือ" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="contact_name" name="contact_name" placeholder="ชื่อผู้ติดต่อ" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="contact_phone_num" name="contact_phone_num" placeholder="หมายเลขโทรศัพท์ผู้ที่ติดต่อได้" class="form-control input-md" type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="institution" name="institution" placeholder="สถาบัน" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
</div>
          
<br><br>

<div class="form-group">
<div class="col-md-2">
<input id="education" name="education" placeholder="ระดับการศึกษา" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>    
<div class="col-md-2">
<input id="facebook" name="facebook" placeholder="เฟซบุ๊ค" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="email" name="email" placeholder="EMail" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="disease" name="disease" placeholder="โรคประจำตัว" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
</div>
            
<br><br>

<div class="form-group">
<div class="col-md-2">
<input id="injury" name="injury" placeholder="อาการบาดเจ็บ" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="national" name="national" placeholder="สัญชาติ" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
</div>

<br><br>


<div class="form-group">
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm"  id="save_player1">
                บันทึก
                </button>
            </div>  
</div>
<table class="table table-striped table-condensed">
            <thead>
               <tr>
                    <th></th>
                </tr>    
           </thead>
            <tbody>
                <tr>
                    <th></th>
                 </tr>
            </tbody>
        </table>

        </div>
        
        <div id="expand_player">
        
        <div class="form-group">
<div class="col-md-2">
<input id="shirtname" name="shirtname" placeholder="ชื่อหลังเสื้อ" class="form-control input-md" type="text">
</div>
<label class="col-md-1"></label> 
<div class="col-md-2">
<select id="prefer_foot" class="form-control">
<option value="0">--- เลือกเท้าที่ถนัด ---</option>
<option value="left">เท้าซ้าย</option>
<option value="right">เท้าขวา</option>
<option value="both">ทั้งสองเท้า</option>
</select>
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="height" name="height" placeholder="ส่วนสูง" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>    
<div class="col-md-2">
<input id="weight" name="weight" placeholder="น้ำหนัก" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
</div>
<br><br>    

    
  
<div class="form-group">
<div class="col-md-2">
<input id="club_goal" name="club_goal" placeholder="จำนวนประตูที่ทำได้(สโมสร)" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="nat_goal" name="nat_goal" placeholder="จำนวนประตูที่ทำได้(ทีมชาติ)" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="language" name="language" placeholder="ภาษาพูด" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="shoe_size" name="shoe_size" placeholder="ขนาดรองเท้า" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
</div>
<br><br>    


    
<div class="form-group">
<div class="col-md-2">
<input id="shirt_size" name="shirt_size" placeholder="ขนาดเสื้อ" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="pant_size" name="pant_size" placeholder="ขนาดกางเกง" class="form-control input-md" type="text">
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<select id="status_team" class="form-control">
<option value="0">- สถานะภายในทีม -</option>
<option value="1">ทีมชุดใหญ่</option>
<option value="2">ทีมชุดเล็ก</option>
</select>
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<select id="spirit" class="form-control">
<option value="0">- ขวัญและกำลังใจ -</option>
<option value="1">ยอดเยี่ยม</option>
<option value="2">ดีมาก</option>
<option value="3">ดี</option>
<option value="4">แย่</option>
</select>
</div>
<label class="col-md-1"></label>
</div>        
<br><br>    

<div class="form-group">

<div class="col-md-2">
<select id="status_play" class="form-control">
<option value="0">- สถานะการลงเตะ -</option>
<option value="1">พร้อมลงเตะ</option>
<option value="2">ยังไม่พร้อม</option>
<option value="3">บาดเจ็บ</option>
</select>
</div>
<label class="col-md-1"></label>
<div class="col-md-2">
<input id="chest" name="chest" placeholder="รอบอก" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
</div>
<br><br>

    <div class="form-group">
            <div class="worklist">
                <div class="col-md-3">
                    <select id="position" class="form-control">
                        <option value="0">- ตำแหน่งที่ลงเตะ -</option>
                    </select>
                </div>
                <label class="col-md-1"></label>
                <div class="col-md-2">
                    <button id="ad_position" type="button" class="btn btn-primary navbar-right">เพิ่มตำแหน่ง</button>
                </div>
                <div class="col-md-2">    
                    <button id="rev_position" type="button" class="btn btn-primary navbar-left">ลบตำแหน่ง</button>
                </div>
             </div>
    </div>
    <br><br>

    <div class="form-group">
            <div class="worklist">
                <div class="col-md-3">
                    <input id="old_team" name="old_team" placeholder="ทีมเก่า" class="form-control input-md"  type="text">
                </div>
                <label class="col-md-1"></label>
                <div class="col-md-3">
                    <input id="old_year" name="old_year" placeholder="ปีที่ลงเตะ" class="form-control input-md"  type="text">
                </div>
                <div class="col-md-2">
                    <button id="rev_team" type="button" class="btn btn-primary navbar-right">ลบทีม</button>
                </div>
                <div class="col-md-2">
                    <button id="ad_team" type="button" class="btn btn-primary navbar-left">เพิ่มทีม</button>
               </div>
             </div>
    </div>
    <br>
    <div class="form-group">
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm"  id="save_player3">
                บันทึก
                </button>
            </div>  
</div>
    
    <table class="table table-striped table-condensed">
            <thead>
               <tr>
                    <th></th>
                </tr>    
           </thead>
            <tbody>
                <tr>
                    <th></th>
                 </tr>
            </tbody>
        </table>
    
</div>
<div id="image_player">
        
<div class="form-group">
<div class="fileupload fileupload-new" data-provides="fileupload">
<div class="col-md-4">
<span class="btn btn-primary btn-file"><span class="fileupload-new">รูปหน้าตรง</span>
<span class="fileupload-exists">Change</span><input type="file" name="face"/></span>
<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
</div>
</div>




    
<div class="fileupload fileupload-new" data-provides="fileupload">
<div class="col-md-4">
<span class="btn btn-primary btn-file"><span class="fileupload-new">รูปด้านหน้าเต็มตัว</span>
<span class="fileupload-exists">Change</span><input type="file" name="front" /></span>
<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
</div>
</div>
</div>



<!--  Back Side Image  & Right Side Image-->
<br><br><br><br>
<div class="form-group">   
<div class="fileupload fileupload-new" data-provides="fileupload">
<div class="col-md-4" >
<span class="btn btn-primary btn-file"><span class="fileupload-new">รูปด้านหลัง</span>
<span class="fileupload-exists">Change</span><input type="file" name="back" /></span>
<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
</div>
</div>
    

    
    
    
<div class="fileupload fileupload-new" data-provides="fileupload">
<div class="col-sm-4" >
<span class="btn btn-primary btn-file"><span class="fileupload-new">รูปด้านข้าง(ขวา)</span>
<span class="fileupload-exists">Change</span><input type="file" name="right"/></span>
<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
</div>    
</div>    
</div>    

<!--  Left Side Image  -->
<br><br><br><br>
<div class="form-group">  
<div class="fileupload fileupload-new" data-provides="fileupload">
<div class="col-md-4" >
<span class="btn btn-primary btn-file"><span class="fileupload-new">รูปด้านข้าง(ซ้าย)</span>
<span class="fileupload-exists">Change</span><input type="file" name="left"/></span>
<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
</div>
</div>
    
</div>
<br><br><br><br>

<div class="form-group">
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm"  id="save_player4">
                บันทึก
                </button>
            </div>  
</div>

</div>
         
       
        
</div>

    
    <div id="data_dep">
       <div id="master-section">
            <ul>
                <li><a href="#master_tech">ด้านเทคนิค</a></li>
                <li><a href="#master_phy">ด้านร่างกาย</a></li>
                <li><a href="#master_moral">ด้านจิตใจ</a></li>
            </ul>
      </div>
        <div id="master_tech">


<!-- Corner & Passing -->
<div class="form-group">
<left><label class="col-md-3" for="corner">ความสามารถในการเตะมุม</label></left>  
<div class="col-md-1">
<input id="corner" name="corner" value="1" placeholder="เฉพาะตัวเลข ไม่เกิน 2 หลัก" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<left><label class="col-md-3" for="pass">ความสามารถในการส่งบอล</label></left>
<div class="col-md-1">
<input id="pass" name="pass" value="1" placeholder="เฉพาะตัวเลข ไม่เกิน 2 หลัก" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
</div>
<br><br>


<!-- Penalty & Tacking -->
<div class="form-group">
<left><label class="col-md-3" for="defense">ความสามารถในการเล่นเกมรับ</label></left>
<div class="col-md-1">
<input id="defense" name="defense" value="1" placeholder="เฉพาะตัวเลข ไม่เกิน 2 หลัก" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<left><label class="col-md-3" for="throw">ความสามารถในการทุ่มไกล</label></left>
<div class="col-md-1">
<input id="throw" name="throw" value="1" placeholder="ความสามารถในการทุ่มไกล" class="form-control input-md"  type="text">
</div>
</div>
<br><br>

<!-- Technique & Fitness -->
<div class="form-group">
<left><label class="col-md-3" for="technique">ความสามารถในการใช้เทคนิค</label></left>
<div class="col-md-1">
<input id="technic" name="technic" value="1" placeholder="เฉพาะตัวเลข ไม่เกิน 2 หลัก" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<left><label class="col-md-3" for="drib">ความสามารถในการเลี้ยงบอล</label></left>  
<div class="col-md-1">
<input id="drib" name="drib" value="1" placeholder="เฉพาะตัวเลข ไม่เกิน 2 หลัก" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>        
</div>
<br><br>
 



<!-- Finish & Touch -->
<div class="form-group">
<left><label class="col-md-3" for="finish">ความสามารถในการจบสกอร์</label></left>
<div class="col-md-1">
<input id="finish" name="finish" value="1" placeholder="เฉพาะตัวเลข ไม่เกิน 2 หลัก" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<left><label class="col-md-3" for="touch">ความสามารถในการสัมผัสบอลแล้วเล่นต่อ</label></left>  
<div class="col-md-1">
<input id="touch" name="touch" value="1" placeholder="เฉพาะตัวเลข ไม่เกิน 2 หลัก" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
</div>
<br><br>



<!-- Head & Shoot -->
<div class="form-group">
<left><label class="col-md-3" for="head">ความสามารถในการใช้ศีรษะ</label></left>
<div class="col-md-1">
<input id="head" name="head" value="1" placeholder="ความสามารถในการใช้ศีรษะ" class="form-control input-md" type="text">
</div>
<label class="col-md-1"></label>
<left><label class="col-md-3" for="shoot">ความสามารถในการยิงไกล</label></left>
<div class="col-md-1">
<input id="shoot" name="shoot" value="1" placeholder="ความสามารถในการยิงไกล" class="form-control input-md" type="text">
</div>
<label class="col-md-1"></label>
</div>
<br><br>



<!-- Crossing & Free Kick -->
<div class="form-group">
<left><label class="col-md-3" for="cross">ความสามารถในการเปิดบอล</label></left>  
<div class="col-md-1">
<input id="cross" name="cross" value="1" placeholder="ความสามารถในการโยนบอลข้ามฝั่ง" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<left><label class="col-md-3" for="freekick">ความสามารถในการเล่นลูกตั้งเตะ</label></left>
<div class="col-md-1">
<input id="freekick" name="freekick" value="1" placeholder="ความสามารถในการเล่นลูกตั้งเตะ" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
</div>
<br><br>


<!-- Goal -->
<div class="form-group">
<left><label class="col-md-3" for="goal">ความสามารถในการป้องกันประตู</label></left>
<div class="col-md-1">
<input id="goal" name="goal" value="1" placeholder="ความสามารถในการป้องกันประตู" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>

</div>
<br><br>
<div class="form-group">
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm"  id="save_player6">
                บันทึก
                </button>
            </div>  
</div>

</div>
        
        
<div id="master_phy">
<div class="form-group">
<left><label class="col-md-3" for="strength">ความแข็งแกร่งของร่างกาย</label></left>  
<div class="col-md-1">
<input id="strength" name="strength" value="1" placeholder="ความแข็งแกร่งของร่างกาย" class="form-control input-md" type="text">
</div>
<label class="col-md-1"></label>        
<left><label class="col-md-3" for="fitness">สภาพความฟิต</label></left>
<div class="col-md-1">
<input id="fitness" name="fitness" value="1" placeholder="สภาพความฟิต" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>        
</div>
<br><br>



<!-- Pacing & Stamina -->
<div class="form-group">
<left><label class="col-md-3" for="pace">ความเร็วสูงสุดของนักเตะ</label></left>
<div class="col-md-1">
<input id="pace" name="pace" value="1" placeholder="ความเร็วสูงสุดของนักเตะ" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>        
<left><label class="col-md-3" for="jump">การกระโดด</label></left>
<div class="col-md-1">
<input id="jump" name="jump" value="1" placeholder="การกระโดด" class="form-control input-md" type="text">
</div>
<label class="col-md-1"></label>        
</div>
<br><br>

<div class="form-group">
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm"  id="save_player5">
                บันทึก
                </button>
            </div>  
</div>

    </div>
        
        <div id="master_moral">
       

<!-- Concentration & Creativity -->
<div class="form-group">
<left><label class="col-md-3" for="concentrate">ความมีสมาธิในการแข่งขัน</label></left>
<div class="col-md-1">
<input id="concentrate" name="concentrate" value="1" placeholder="เฉพาะตัวเลข ไม่เกิน 2 หลัก" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>
<left><label class="col-md-3" for="aggression">ความก้าวร้าว</label></left>
<div class="col-md-1">
<input id="aggression" name="aggression" value="1" placeholder="เฉพาะตัวเลข ไม่เกิน 2 หลัก" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>         
</div>
<br><br>





<!-- Decisions & Determination -->
<div class="form-group">
<left><label class="col-md-3" for="decide">ความสามารถในการตัดสินใจ</label></left>  
<div class="col-md-1">
<input id="decide" name="decide" value="1" placeholder="เฉพาะตัวเลข ไม่เกิน 2 หลัก" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>        
<left><label class="col-md-3" for="flair">เซนส์บอล</label></left> 
<div class="col-md-1">
<input id="flair" name="flair" value="1" placeholder="เฉพาะตัวเลข ไม่เกิน 2 หลัก" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>       
</div>
<br><br>



<!-- Off The Ball & Positioning -->
<div class="form-group">
<left><label class="col-md-3" for="off_the_ball">หาตำแหน่ง</label></left>
<div class="col-md-1">
<input id="off_the_ball" name="off_the_ball" value="1" placeholder="เฉพาะตัวเลข ไม่เกิน 2 หลัก" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>        
<left><label class="col-md-3" for=positioning">การยืนตำแหน่งเกมรับ</label></left> 
<div class="col-md-1">
<input id="positioning" name="positioning" value="1" placeholder="เฉพาะตัวเลข ไม่เกิน 2 หลัก" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>        
</div>
<br><br>



<!-- Teamwork& Work Rate -->
<div class="form-group">
<left><label class="col-md-3" for="teamwork">ทีมเวิร์ก</label></left>  
<div class="col-md-1">
<input id="teamwork" name="teamwork" value="1" placeholder="เฉพาะตัวเลข ไม่เกิน 2 หลัก" class="form-control input-md"  type="text">
</div>
<label class="col-md-1"></label>        
<left><label class="col-md-3" for="workrate">ความขยัน</label></left> 
<div class="col-md-1">
<input id="workrate" name="workrate" value="1" laceholder="เฉพาะตัวเลข ไม่เกิน 2 หลัก" class="form-control input-md" type="text">
</div>
<label id="add_player_result"></label>       
</div>
<br><br>
<div class="form-group">
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm"  id="save_player2">
                บันทึก
                </button>
            </div>  
</div>

</div>
</div>

       
       
        
    </div>

</div>
<script src="../../js/file-upload.js"></script>
<script>
                                    $("#department-section").tabs();
                                    $("#data_dep").tabs();
                                    $("#data_user").tabs();
</script>

<script>
    
    
    
                                    $(function(){   
//                                    $('#save_player1,#save_player2,#save_player3,#save_player4,#save_player5,#save_player6').on('click',function(){
//                                        
//                                   alert('sss');    
//                                   return false ;
//                                  
                                    
                             //     form_plofile = $("#player_profile,#form_attribute").serialize();    
                                    
//                                    player_info = {
//                                        
//                                        
//                                    title_code : $('#titcod').val(),
//                                    firstname : $('#firstname').val(),
//                                    midname : $('#midname').val(),
//                                    surname : $('#surname').val(),
//                                    efirstname : $('#efirstname').val(),
//                                    emidname : $('#emidname').val(),
//                                    esurname : $('#esurname').val(),
//                                    nickname : $('#nickname').val(),
//                                    enickname : $('#enickname').val(),
//                                    idno : $('#idno').val(),
//                                    passport : $('#passport').val(),
//                                    add_num : $('#add_num').val(),
//                                    add_detail_foreign : $('#add_detail_foreign').val(),
//                                    
//                                    tambon_id :  $( "#tambon_id option:selected" ).val(),
//                                    country_id :  $( "#country_id option:selected" ).val(),
//                                    province_id :  $( "#province_id option:selected" ).val(),
//                                    amphur_id :  $( "#amphur_id option:selected" ).val(),
//                                    region_id :  $( "#region_id option:selected" ).val(),
//                                    sex_id :  $( "#sex_id option:selected" ).val(),
//                                    face : $("input[name = 'face']").val(),
//                                    front : $("input[name = 'front']").val(),
//                                    back : $("input[name = 'back']").val(),
//                                    right : $("input[name = 'right']").val(),
//                                    left : $("input[name = 'left']").val(),
//                                    crn : $('#corner').val()
//                                        
//                                    };
//                                    
//                                    $.ajax({
//                                    type: "post",
//                                    url:'<?php //echo site_url("Administrator/addPlayerPofile");?>',
//                                    data: player_info , 
//                                    cache:false,
//                                    success: function(data){
//
//                                        $('#add_player_result').html("<span class=\"label label-warning\">" + data + "</span>");
//
//                                       },
//                                     error:function(){
//
//                                         $('#add_player_result').html("<span class=\"label label-warning\"> ERROR </span>"); 
//
//                                        }
//                                        });
//                                        });
                                        
                                    $('#save_player1,#save_player3').click(addPlayerProfile);       
//                                     $('#save_player1').on('click',function(){
                                         
//                                         var titCod =  $("#titcode").val();
//                                     //    alert(titCod);
//                                         
//                                          $.ajax("../player/checkTitleCode/" + titCod).done(function(content) {
//                                            var title = jQuery.parseJSON(content);
//                                
//                                            $.each(title ,function(index,value)
//                                            {
//                                            
//                                            alert('มีเบอร์นักเตะ' + title.PlyTitCod + 'แล้วครับ');
//
//                                             });
//                                               
//                                               
//                                          
//                                        });
//                                         
                                         
                                         
//                                         $.ajax({
//                                             
//                                        
//                                             url:'<?php //echo site_url("Player/checkTitleCode")?>',
//                                             data:'titCod=' + titCod,
//                                             type:'post',
//                                             success:function(content){
//                                             
//                                             
//                                            
//                                             
//                                             var tiTle = jQuery.parseJSON(content);
//                                             
//                                             
//                                             
//                                            $.each(tiTle.content ,function(index,value)
//                                             {
//                                                  
//                                                    
//                                                     
//                                                     alert('มีเบอร์นักเตะ' + value.PlyTitCod + 'แล้วครับ');
//                                                     
//                                               
//                                               
//                                            });
//                                            
//                                         
//                                             },error:function(){
//                                                 
//                                                 alert('sss');
//                                                 
//                                             }
//                                             
//                                             
//                                             
//                                             
//                                         });
//                                         
//                                         
//                                     }); 
//                                     }); 
                                  
                                        
                                   function addPlayerProfile() {
                                            
                                           
                                            var titcode =  $("#titcode").val();
                                            
                                            if(titcode === ""){
                                                
                                                alert('not null');
                                                return ;
                                                
                                            }

                                   
                                            var addprofile = {};
                                            
                                            
                                           
                                                
                                     

//                                            addprofile.birthdate = getDateFromDatePicker($("#birthdate"), "yymmdd");
                                        //    addprofile.startTime = $(".hour-selection")[0].value + $(".minute-selection")[0].value;
                                        //    addprofile.endTime = $(".hour-selection")[1].value + $(".minute-selection")[1].value;
                                            addprofile.titCod = $("#titcode").val();
                                            addprofile.firstName = $("#firstname").val();
                                            addprofile.midName = $("#midname").val();
                                            addprofile.surName = $("#surname").val();
                                            addprofile.efirstName = $("#efirstname").val();
                                            addprofile.emidName = $("#emidname").val();
                                            addprofile.esurName = $("#esurname").val();
                                            addprofile.nickName = $("#nickname").val();
                                            addprofile.enickName = $("#enickname").val(); 
                                            addprofile.idNo = $("#idno").val();
                                            addprofile.passPort = $("#passport").val();
                                            addprofile.addNum = $("#add_num").val();
                                            addprofile.addDetail = $("#add_detail").val();
                                            addprofile.tambonID = $("#tambon_id option:selected").val();
                                            addprofile.amphurID = $("#amphur_id option:selected").val();
                                            addprofile.provinceID = $("#province_id option:selected").val();
                                            addprofile.countryID = $("#country_id option:selected").val();
                                            addprofile.add_num_current = $("#add_num_current").val();
                                            addprofile.add_detail_current = $("#add_detail_current").val();
                                            addprofile.tambonID2 = $("#tambon_id2 option:selected").val();
                                            addprofile.amphurID2 = $("#amphur_id2 option:selected").val();
                                            addprofile.provinceID2 = $("#province_id2 option:selected").val();
                                            addprofile.countryID2 = $("#country_id2 option:selected").val();
                                            addprofile.add_num_foreign = $("#add_num_foreign").val();
                                            addprofile.add_detail_foreign = $("#add_detail_foreign").val();
                                            addprofile.regionID = $("#region_id option:selected").val();
                                            addprofile.sexID = $("#sex_id option:selected").val();
                                            addprofile.mobileNum = $("#mobile_num").val();
                                            addprofile.contactName = $("#contact_name").val();
                                            addprofile.contactPhonNum = $("#contact_phone_num").val();
                                            addprofile.Institution = $("#institution").val();
                                            addprofile.Educate = $("#education").val();
                                            addprofile.Disease = $("#disease").val();
                                            addprofile.Facebook = $("#facebook").val();
                                            addprofile.Email = $("#email").val();
                                            addprofile.Injury = $("#injury").val();
                                            addprofile.Nation = $("#national").val();
                                            
                                            addprofile.shirtName = $("#shirtname").val();
                                            addprofile.preferFoot = $("#prefer_foot option:selected").val();
                                            addprofile.statusTeam = $("#status_team option:selected").val();
                                            addprofile.Spirit = $("#spirit option:selected").val();
                                            addprofile.statusPlay = $("#status_play option:selected").val();
                                            addprofile.Height = $("#height").val();
                                            addprofile.Weight = $("#weight").val();
                                            addprofile.clubGoal = $("#club_goal").val();
                                            addprofile.natGoal = $("#nat_goal").val();
                                            addprofile.Language = $("#language").val();
                                            addprofile.shoeSize = $("#shoe_size").val();
                                            addprofile.shirtSize = $("#shirt_size").val();
                                            addprofile.pantSize = $("#pant_size").val();
                                            addprofile.Chest = $("#chest").val();
                                            addprofile.oldTeam = $("#old_team").val();
                                            addprofile.oldYear = $("#old_year").val();
                                            addprofile.Position = $("#position option:selected").val();
                                            
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

                                            $.post("addPlayerProfile", JSON.stringify(addprofile)).done(function() {
//                                                $("#addDialog").modal("hide");
//
////                                                loadCoachSchedule($(".schedule-calendar"));
//                                            }).fail(function() {
//                                                alert("ไม่สามารถลบข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
//                                            });
//                                        }     
//                                        
             });                       
            };         
      
            });
            
            

                                                        $.ajax("getCountries").done(function(country) {
                                                        var countries = $.parseJSON(country);
                                
                                                        $.each(countries ,function(index,value)
                                                        {

                                                        $("#country_id").append("<option value="+value.id+">"+value.country_name+"</option>");
                                                        $("#country_id2").append("<option value="+value.id+">"+value.country_name+"</option>");

                                                         });
                                                      });
                                                      
                                                      
                                                      $("#country_id").change(function() {
                                                        var id =  $( "#country_id option:selected" ).val();
                                                        if(id === '210'){ //if select thailand
                                                            
                                                            $.ajax("getProvince").done(function(province) {
                                                            var province = $.parseJSON(province);
                                
                                                        $.each(province ,function(index,value)
                                                        {

                                                        $("#province_id").append("<option value="+value.PROVINCE_ID+">"+value.PROVINCE_NAME+"</option>");
                                                        
                                                        });
                                                        });
                                                        }
                                                      });
                                                      $("#country_id2").change(function() {
                                                        var id =  $( "#country_id2 option:selected" ).val();
                                                        if(id === '210'){ //if select thailand
                                                            
                                                            $.ajax("getProvince").done(function(province) {
                                                            var province = $.parseJSON(province);
                                
                                                        $.each(province ,function(index,value)
                                                        {

                                                        $("#province_id2").append("<option value="+value.PROVINCE_ID+">"+value.PROVINCE_NAME+"</option>");
                                                        
                                                        });
                                                        });
                                                        }
                                                      });

                                                      $("#province_id").change(function() {
                                                        var id =  $( "#province_id option:selected" ).val();
                                                        if(id !== '0'){ //if select thailand
                                                            
                                                            $.ajax("getAmphur/" + id).done(function(content) {
                                                            var contents = $.parseJSON(content);
                                
                                                        $.each(contents ,function(index,value)
                                                        {

                                                        $("#amphur_id").append("<option value="+value.AMPHUR_ID+">"+value.AMPHUR_NAME+"</option>");
                                                        
                                                        });
                                                        });
                                                        }
                                                      });
                                                      $("#province_id2").change(function() {
                                                        var id =  $( "#province_id2" ).val();
                                                        if(id !== '0'){ //if select thailand
                                                            
                                                            $.ajax("getAmphur/" + id).done(function(content) {
                                                            var contents = $.parseJSON(content);
                                
                                                        $.each(contents ,function(index,value)
                                                        {

                                                        $("#amphur_id2").append("<option value="+value.AMPHUR_ID+">"+value.AMPHUR_NAME+"</option>");
                                                        
                                                        });
                                                        });
                                                        }
                                                      });
                                                       $("#amphur_id").change(function() {
                                                        var id =  $( "#amphur_id" ).val();
                                                        if(id !== '0'){ //if select thailand
                                                            
                                                            $.ajax("getTambon/" + id).done(function(content) {
                                                            var contents = $.parseJSON(content);
                                
                                                        $.each(contents ,function(index,value)
                                                        {

                                                        $("#tambon_id").append("<option value="+value.DISTRICT_ID+">"+value.DISTRICT_NAME+"</option>");
                                                        
                                                        });
                                                        });
                                                        }
                                                      });
                                                      $("#amphur_id2").change(function() {
                                                        var id =  $( "#amphur_id2" ).val();
                                                        if(id !== '0'){ //if select thailand
                                                            
                                                            $.ajax("getTambon/" + id).done(function(content) {
                                                            var contents = $.parseJSON(content);
                                
                                                        $.each(contents ,function(index,value)
                                                        {

                                                        $("#tambon_id2").append("<option value="+value.DISTRICT_ID+">"+value.DISTRICT_NAME+"</option>");
                                                        
                                                        });
                                                        });
                                                        }
                                                      });

                                        function getDateFromDatePicker($datePicker, formatDate) {
                                            var selectedDate = $datePicker.datepicker("getDate");

                                            return $.datepicker.formatDate(formatDate, selectedDate);
                                        }
                                        
                                        

    

</script>
