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
    background: none; 
    border-width: 0px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;
}

#department-section .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    /*border-width: 0px 0px 1px 0px; */
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
    padding-left: 10px;
    padding-right: 10px;
    height:500px; 
    width: 36px;
}

#master_med .fit-content {
    width: 1px;
    white-space: nowrap;
    
    padding-left: 10px;
    padding-right: 10px;
    
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


</style>
<div id="department-section">
    <ul>
        <li><a href="#player_checked">นักเตะที่มาแล้ว</a></li>
        <li><a href="#player_unchecked">นักเตะที่ยังไม่มา</a></li>
        <li><a href="#player_all">นักเตะทั้งหมด</a></li>
    </ul>
    <div id="player_checked">
    
        <table class="table table-striped table-condensed">
            <thead>
               <tr>
                    <th >รายชื่อนักเตะที่เข้าแคมป์แล้ว</th>
                </tr>    
            </thead>
            <tbody>
                <tr>
                        <th class="fit-content">xxx</th>
                 </tr>
                 
            </tbody>
        </table>
        
</div>

    
    <div id="player_unchecked">
     <table class="table table-striped table-condensed">
            <thead>
               <tr>
                    <th >รายชื่อนักเตะที่ยังไม่ได้เข้าแคมป์</th>
                </tr>    
            </thead>
            <tbody>
                <tr>
                        <th class="fit-content">xxx</th>
                 </tr>
            </tbody>
        </table>
    </div>
    <div id="player_all">
       <table class="table table-striped table-condensed">
            <thead>
               <tr>
                    <th >รายชื่อนักเตะทั้งหมด</th>
                </tr>    
            </thead>
            <tbody>
                <tr>
                        <th class="fit-content">xxx</th>
                 </tr>
            </tbody>
        </table>
    </div>
    
</div>
<script src="../../js/file-upload.js"></script>
<script>
    $("#department-section").tabs();
</script>
