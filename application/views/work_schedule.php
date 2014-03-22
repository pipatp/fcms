<style type="text/css">
#preparation-tab { 
    padding: 0px; 
    background: none; 
    border-width: 0px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;    
}

#preparation-tab .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 1px 0px; 
    -moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px;
}

#preparation-tab .ui-tabs-nav li {
    width: 49%;
}

#preparation-tab .ui-tabs-nav li a {
    width: 100%;
        
    outline: none;
}

#preparation-tab .ui-tabs-panel {
    padding-top: 20px;
    border-width: 0px 1px 1px 1px;
    
    font-size: 13px;
}
</style>
<div id="preparation-tab">
    <ul>
        <li><a href="#tabs-1">ตารางงานทั้งทีม</a></li>
        <li><a href="#tabs-2">ตารางงานรายบุคคุล</a></li>
    </ul>
    <div id="tabs-1">
        <?php echo $this->load->view('work_team_schedule'); ?>
    </div>
    <div id="tabs-2">
        <?php echo $this->load->view('work_player_schedule'); ?>
    </div>
</div>
