<?php

class Administrator_model extends CI_Model {
    function Administrator_model() {
        parent::__construct();        
        $this->load->database();
    }
    
    
        function addCategory($department, $eDepartment,$job, $eJob,$medType, $eMedType,$fitTool, $eFitTool,$physicType, $ePhysicType,$nutType, $eNutType, $program,$eprogram) {
           
        $data = array($department, $eDepartment,$job, $eJob,$medType, $eMedType,$fitTool, $eFitTool,$physicType, $ePhysicType,$nutType, $eNutType, $program,$eprogram);
        
        $query = $this->db->query("CALL fn_addCategory(?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $data);
        
        $query->row();
    }
    
    
        function addFit($tDirect, $eDirect, $tAdapt, $eAdapt, $fitOder,$fitUnit, $fitType, $fitTool, $fitPart) {
        
        $data = array($tDirect, $eDirect, $tAdapt, $eAdapt, $fitOder,$fitUnit, $fitType, $fitTool, $fitPart);
        
        $query = $this->db->query("CALL fn_addOrderMaster(?, ?, ?, ?, ?, ?, ?, ?, ?)", $data);
        
        $query->row();
    }
    
    
        function getID(){
    
          $query =  $this->db->query("SELECT CONCAT('USR',LPAD(IFNULL(MAX(CONVERT(REPLACE(UsrCod,'USR',''),UNSIGNED))+1,1),5,'0')) as uid FROM usrmst");			
          return $query->result();
      
    }
    
    function savePlayerPosition($thai_position,$eng_position){
        
        $posid = "SELECT CONCAT('POS',LPAD(IFNULL(MAX(CONVERT(REPLACE(DepCod,'POS',''),UNSIGNED))+1,1),5,'0'))";
        $pos = 'POS';
        $data = array($thai_position,$eng_position);
        $query = $this->db->query("INSERT INTO depmst(DepCod,DepLocNam,DepEngNam,DepTyp) $posid,'".$thai_position."','".$eng_position."','POS' FROM depmst");
//        return $query->result();
        
    }
    
    
    function addTeamSchedule($date, $startTime, $endTime, $detail, $user ) {
        
        $data = array($date, $startTime, $endTime, $detail, $user);
        
        $query = $this->db->query("CALL fn_addTeamSchedule(?, ?, ?, ?, ?)", $data);
        
        $query->row();
    }
    
    function saveCategory($department,$eDepartment,$job,$eJob,$medType,$eMedType,$fitTool,$efitTool,$physicType,$ephysicType,$nutType,$enutType,$program,$eprogram){

        
        $depid = "SELECT CONCAT('DEP',LPAD(IFNULL(MAX(CONVERT(REPLACE(DepCod,'DEP',''),UNSIGNED))+1,1),5,'0'))";
        $jobid = "SELECT CONCAT('JOB',LPAD(IFNULL(MAX(CONVERT(REPLACE(DepCod,'JOB',''),UNSIGNED))+1,1),5,'0'))"; 
        $medtypid = "SELECT CONCAT('MTY',LPAD(IFNULL(MAX(CONVERT(REPLACE(CatCod,'MTY',''),UNSIGNED))+1,1),5,'0'))";
        $fitid = "SELECT CONCAT('FTY',LPAD(IFNULL(MAX(CONVERT(REPLACE(CatCod,'FTY',''),UNSIGNED))+1,1),5,'0'))";
        $ptid = "SELECT CONCAT('PTY',LPAD(IFNULL(MAX(CONVERT(REPLACE(CatCod,'PTY',''),UNSIGNED))+1,1),5,'0'))"; 
        $nutid = "SELECT CONCAT('NTY',LPAD(IFNULL(MAX(CONVERT(REPLACE(CatCod,'NTY',''),UNSIGNED))+1,1),5,'0'))";
        $proid = "SELECT CONCAT('PRO',LPAD(IFNULL(MAX(CONVERT(REPLACE(CatCod,'PRO',''),UNSIGNED))+1,1),5,'0'))";
        
        if(!empty($department)){
        $this->db->query("INSERT INTO depmst (DepCod,DepLocNam,DepEngNam,DepTyp) $depid,'".$department."','".$eDepartment."','DEP' FROM depmst ");
        }
        if(!empty($job)){
        $this->db->query("INSERT INTO depmst (DepCod,DepLocNam,DepEngNam,DepTyp) $jobid,'".$job."','".$eJob."','JOB' FROM depmst ");
        }
        if(!empty($medType)){
        $this->db->query("INSERT INTO catmst (CatCod,CatLocNam,CatEngNam,CatGrpTyp) $medtypid,'".$medType."','".$eMedType."','MTP' FROM catmst ");
        }
        if(!empty($fitTool)){
        $this->db->query("INSERT INTO catmst (CatCod,CatLocNam,CatEngNam,CatGrpTyp) $fitid,'".$fitTool."','".$efitTool."','FTP' FROM catmst ");
        }
        if(!empty($physicType)){
        $this->db->query("INSERT INTO catmst (CatCod,CatLocNam,CatEngNam,CatGrpTyp) $ptid,'".$physicType."','".$ephysicType."','PTP' FROM catmst ");
        }
        if(!empty($nutType)){
        $this->db->query("INSERT INTO catmst (CatCod,CatLocNam,CatEngNam,CatGrpTyp) $nutid,'".$nutType."','".$enutType."','NTP' FROM catmst ");
        }
        if(!empty($program)){
        $this->db->query("INSERT INTO catmst (CatCod,CatLocNam,CatEngNam,CatGrpTyp) $proid,'".$program."','".$eprogram."','PRO' FROM catmst ");
        }
  
        
    }
    
    function addPlayerPosition($tPosition, $ePosition) {
        
        $data = array($tPosition, $ePosition);
        
        $query = $this->db->query("CALL fn_addPlayerPosition(?, ?)", $data);
        
        $query->row();
    }
    
    
    function saveUserProfile($firstName, $lastName, $userPass,$userTel,$userMail,$userDep,$userJob){
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
        

//        $this->db->select("PlyTitCod");
//        $this->db->where("PlyTitCod",$titCod);
//        $this->db->from('plyinf');
//        $check = $this->db->get();
        
        
        
        $userCode =  "SELECT CONCAT('USR',LPAD(IFNULL(MAX(CONVERT(REPLACE(UsrCod,'USR',''),UNSIGNED))+1,1),5,'0'))";
        
//       $data = array($playerCode, $tiTle, $firstName, $midName,$surName);
        
//        $query = $this->db->query("CALL fn_savePlayerProfile(?, ?, ?, ?,?)", $data);
        
        $query = $this->db->query("INSERT INTO usrmst(UsrCod,UsrFstNam,UsrFamNam,UsrLogPwd,UsrTelNum,UsrEml,UsrDepCod,UsrJobCod) $userCode,'".$firstName."','".$lastName."','".$userPass."','".$userTel."','".$userMail."','".$userDep."','".$userJob."' FROM usrmst ");
        
        
        $row = $query->row();
        $query->free_result(); 
        return $row;
        

        
    }
    
    
    function insertPlayerProfile($titcod,$firstname,$midname,$surname){

        $playerid =  "SELECT CONCAT('P',LPAD(IFNULL(MAX(CONVERT(REPLACE(PlyCod,'P',''),UNSIGNED))+1,1),5,'0'))"; 
        //$playersid =  "SELECT CONCAT('PY',LPAD(IFNULL(MAX(CONVERT(REPLACE(PlpPlyCod,'PY',''),UNSIGNED))+1,1),5,'0'))";
  //      $this->db->trans_begin();

        $this->db->query("INSERT INTO plyinf(PlyCod,PlyTitCod,PlyFstNam,PlyMidNam,PlyFamNam) $playerid,'".$titcod."','".$firstname."','".$midname."','".$surname."' FROM plyinf");
        //$this->db->query("INSERT INTO plyinf(PlyCod,PlyTitCod,PlyFstNam,PlyMidNam,PlyFamNam,PlyRegCod,PlyScnCod,PlyFstEng,PlyMidEng,PlyFamEng,PlyNatCod,PlyPerNum,PlyPasNum,PlyAddNum,PlyAddDtl,PlyAddDst,PlyAddPrv,PlyAddCot,PlyAddCty,PlySexTyp,PlyNumEng,PlyDtlEng,PlyPhnNum,PlyMblNum,PlyConPer,PlyConPhn,PlyEmlAdd,PlyCreDte) $playerid,'".$titcod."','".$frsname."','".$midname."','".$famname."','".$reg."','".$pincode."','".$firstnameeng."','".$midnameeng."','".$famnameeng."','".$national."','".$pid."','".$passport."' ,'".$addressno."','".$addressdetail."','".$tb."','".$pr."','".$ct."','".$am."','".$sex."','".$addressnoeng."','".$addressdetaileng."','".$phone."','".$mobile."','".$contactname."','".$contactno."','".$email."',NOW() FROM plyinf ");
        //$this->db->query("INSERT INTO plpinf(PlpPlyCod,PlpStrDte,PlpCrn,PlpPss,PlpTck,PlpPnt,PlpTch,PlpDrb,PlpFnh,PlpFtc,PlpHdd,PlpSht,PlpThr,PlpMrk,PlpCrs,PlpFkc,PlpJmp,PlpBrv,PlpCps,PlpCct,PlpCrt,PlpAgg,PlpAtp,PlpDcd,PlpDmn,PlpFlr,PlpInf,PlpOtb,PlpPst,PlpTwk,PlpWrt,PlpAcc,PlpAcl,PlpAgt,PlpBal,PlpNaf,PlpPac,PlpStm,PlpStr,PlpGkp) SELECT CONCAT('PY',LPAD(IFNULL(MAX(CONVERT(REPLACE(PlpPlyCod,'PY',''),UNSIGNED))+1,1),5,'0')),NOW(),'".$corner."','".$pass."','".$tack."','".$penalty."','".$technic."','".$drib."','".$finish."','".$touch."','".$head."','".$shoot."','".$throw."','".$mark."','".$cross."','".$freekick."','".$jump."','".$bravery."','".$composure."','".$concentrate."','".$creativity."','".$aggression."','".$anticipation."','".$decide."','".$determinate."','".$flair."','".$influence."','".$off_the_ball."','".$positioning."','".$teamwork."','".$workrate."','".$accuracy."','".$accelerate."','".$agility."','".$balance."','".$fitness."','".$pace."','".$stamina."','".$strength."','".$goal."' FROM plpinf ");
        //$this->db->query("INSERT INTO plainf (PlaPlyCod,PlaPosCod,PlaStrDte) SELECT CONCAT('PY',LPAD(IFNULL(MAX(CONVERT(REPLACE(PlaPlyCod,'PY',''),UNSIGNED))+1,1),5,'0')),'".$position."',NOW() FROM plainf ");  ','".$positioning."','".$teamwork."','".$workrate."','".$accuracy."','".$accelerate."','".$agility."','".$balance."','".$fitness."','".$pace."','".$stamina."','".$strength."','".$goal      



//        if ($this->db->trans_status() === FALSE)
//        {
//            $this->db->trans_rollback();
//        }
//        else
//        {
//            $this->db->trans_commit();
//        }
}
    
    
//    function saveMed($med_thai,$med_eng,$med_thai_direct,$med_eng_direct,$med_order,$med_unit,$med_typ){
//
//        
//        $medid = "SELECT CONCAT('MED',LPAD(IFNULL(MAX(CONVERT(REPLACE(OdrCod,'MED',''),UNSIGNED))+1,1),6,'0'))";
//        
//        
//        if(!empty($med_thai)){
//        $this->db->query("INSERT INTO odrmst (OdrCod,OdrLocNam,OdrEngNam,OdrLocDir,OdrEngDir,OdrGrpTyp,OdrAmnStd,OdrUntStd,OdrCatTyp,OdrSubTyp) $medid,'".$med_thai."','".$med_eng."','".$med_thai_direct."','".$med_eng_direct."','".$med_typ."','".$med_order."','".$med_unit."','MED','DTL' FROM odrmst ");
//        }
//        
//  
//        
//    }
    
    function addPhy($tPhy, $ePhy,$tPhyDirecttion, $ePhyDirecttion,$phyOrder, $phyUnit,$phyType) {
        
        $data = array($tPhy, $ePhy,$tPhyDirecttion, $ePhyDirecttion,$phyOrder, $phyUnit,$phyType);
        
        $query = $this->db->query("CALL fn_addPhysicalMaster(?, ?, ?, ?, ?, ?, ?)", $data);
        
        $query->row();
    }
    
        function addNut($tNut, $eNut,$nutOrder, $nutUnit,$nutCalories, $nutType) {
        
        $data = array($tNut, $eNut,$nutOrder, $nutUnit,$nutCalories, $nutType);
        
        $query = $this->db->query("CALL fn_addNutritionMaster(?, ?, ?, ?, ?, ?)", $data);
        
        $query->row();
    }

    
        function addMed($tMed, $eMed,$tDirection, $eDirection,$medOder, $medUnit,$medType) {
        
        $data = array($tMed, $eMed,$tDirection, $eDirection,$medOder, $medUnit,$medType);
        
        $query = $this->db->query("CALL fn_addMedicationMaster(?, ?, ?, ?, ?, ?, ?)", $data);
        
        $query->row();
    }
    
    
//        function getCategory($orderCate,$orderGroup) {
//        
//        $data = array($orderCate,$orderGroup);
//        
//            $query = $this->db->query("CALL fn_getCategory(?, ?)", $data);
//        
//        $query->row();
//    }


    function saveMed($med_thai,$med_eng,$med_thai_direct,$med_eng_direct,$med_order,$med_unit,$med_typ){

        
        $medid = "SELECT CONCAT('MED',LPAD(IFNULL(MAX(CONVERT(REPLACE(OdrCod,'MED',''),UNSIGNED))+1,1),6,'0'))";
        
        
        if(!empty($med_thai)){
        $this->db->query("INSERT INTO odrmst (OdrCod,OdrLocNam,OdrEngNam,OdrLocDir,OdrEngDir,OdrGrpTyp,OdrAmnStd,OdrUntStd,OdrCatTyp,OdrSubTyp) $medid,'".$med_thai."','".$med_eng."','".$med_thai_direct."','".$med_eng_direct."','".$med_typ."','".$med_order."','".$med_unit."','MED','DTL' FROM odrmst ");
        }
        
  
        
    }
    
//    function saveNut($nut_thai,$nut_eng,$nut_typ,$nut_order,$nut_unit){
//
//        
//        $nutid = "SELECT CONCAT('NUT',LPAD(IFNULL(MAX(CONVERT(REPLACE(OdrCod,'NUT',''),UNSIGNED))+1,1),6,'0'))";
//        
//        
//        if(!empty($nut_thai)){
//        $this->db->query("INSERT INTO odrmst (OdrCod,OdrLocNam,OdrEngNam,OdrGrpTyp,OdrAmnStd,OdrUntStd,OdrCatTyp,OdrSubTyp) $nutid,'".$nut_thai."','".$nut_eng."','".$nut_typ."','".$nut_order."','".$nut_unit."','NUT','DTL' FROM odrmst ");
//        }
//        
//  
//        
//    }
    
    function saveUser($user_fname,$user_lname,$user_pass,$user_tel,$user_mail,$deps,$jobs){

        
        $userid = "SELECT CONCAT('USR',LPAD(IFNULL(MAX(CONVERT(REPLACE(UsrCod,'USR',''),UNSIGNED))+1,1),5,'0'))";
        
        
        if(!empty($user_fname)){
        $this->db->query("INSERT INTO usrmst (UsrCod,UsrFstNam,UsrFamNam,UsrLogPwd,UsrTel,UsrEml,UsrEmpCod,UsrDepCod) $userid,'".$user_fname."','".$user_lname."','".$user_pass."','".$user_tel."','".$user_mail."','".$jobs."','".$deps."' FROM usrmst ");
        }
        
  
        
    }
    
    
    function saveFit($fit_thai_adapt,$fit_eng_adapt,$fit_thai_direct,$fit_eng_direct,$fit_order,$fit_unit,$fit_typ,$fit_tool,$fit_part){

        
       $fitid = "SELECT CONCAT('FIT',LPAD(IFNULL(MAX(CONVERT(REPLACE(OdrCod,'FIT',''),UNSIGNED))+1,1),6,'0'))";
        
        
        if(!empty($fit_thai_direct)){
        $this->db->query("INSERT INTO odrmst (OdrCod,OdrLocNam,OdrEngNam,OdrLocDir,OdrEngDir,OdrGrpTyp,OdrAmnStd,OdrUntStd,OdrCatTyp,OdrSubTyp,OdrTolCod,OdrFitTyp) $fitid,'".$fit_thai_direct."','".$fit_eng_direct."','".$fit_thai_adapt."','".$fit_eng_adapt."','".$fit_typ."','".$fit_order."','".$fit_unit."','FIT','DTL','".$fit_tool."','".$fit_part."' FROM odrmst ");
        }

    }
    
    
    function getFitCategory($orderCate,$orderGroup) {
////       
////        
//////        $query = $this->db->query("SELECT OdrCod,OdrCatTyp,OdrLocNam,OdrLocDir,OdrGrpTyp FROM odrmst WHERE OdrCatTyp='FIT' AND OdrGrpTyp='MAIN' ");
        $this->db->select("OdrCod,OdrCatTyp,OdrLocNam,OdrLocAdp,OdrGrpTyp");
        $this->db->from('odrmst');
        $this->db->where('OdrCatTyp',$orderCate);
        $this->db->where('OdrGrpTyp',$orderGroup);
        $query = $this->db->get();		
        return $query->result();
        
        
        
//        $row = $query->row();
//        if ($row) {
//            return $row->OdrCod;
//        }
//        
//        return -1;
      }
      
      
    function getMedCategory($orderCate) {

        
        $this->db->select("OdrCod,OdrCatTyp,OdrLocNam,OdrLocAdp,OdrGrpTyp");
        $this->db->from('odrmst');
        $this->db->where('OdrCatTyp',$orderCate);
        $query = $this->db->get();		
        return $query->result();
        

      }
      
      
    
    function getPhyCategory($orderCate) {

        $this->db->select("OdrCod,OdrCatTyp,OdrLocNam,OdrLocAdp,OdrGrpTyp");
        $this->db->from('odrmst');
        $this->db->where('OdrCatTyp',$orderCate);
        $query = $this->db->get();		
        return $query->result();
    
    
    }
    
    
    function getNutCategory($orderCate) {
////       
////        
//////        $query = $this->db->query("SELECT OdrCod,OdrCatTyp,OdrLocNam,OdrLocDir,OdrGrpTyp FROM odrmst WHERE OdrCatTyp='FIT' AND OdrGrpTyp='MAIN' ");
        $this->db->select("OdrCod,OdrCatTyp,OdrLocNam,OdrLocAdp,OdrGrpTyp");
        $this->db->from('odrmst');
        $this->db->where('OdrCatTyp',$orderCate);
//        $this->db->where('OdrGrpTyp',$orderGroup);
        $query = $this->db->get();		
        return $query->result();
    }       
    
    function getAllMed(){
    
        $this->db->select("*");
        $this->db->from('catmst');
        $this->db->where('CatGrpTyp','MTP');
        $query = $this->db->get();		
        return $query->result();			
    }
    
    function getAllFit(){
    
        $this->db->select("*");
        $this->db->from('catmst');
        $this->db->where('CatGrpTyp','FTP');
        $query = $this->db->get();		
        return $query->result();			
    }
    
    function getAllPhy(){
    
        $this->db->select("*");
        $this->db->from('catmst');
        $this->db->where('CatGrpTyp','PTP');
        $query = $this->db->get();		
        return $query->result();			
    }
    
    function getAllNut(){
    
        $this->db->select("*");
        $this->db->from('catmst');
        $this->db->where('CatGrpTyp','NTP');
        $query = $this->db->get();		
        return $query->result();			
    }
    
    function getAllJob(){
    
        $this->db->select("*");
        $this->db->from('depmst');
        $this->db->where('DepGrpTyp','JOB');
        $query = $this->db->get();		
        return $query->result();			
    }
    
    function getAllDep(){
    
        $this->db->select("*");
        $this->db->from('depmst');
        $this->db->where('DepGrpTyp','DEP');
        $query = $this->db->get();		
        return $query->result();			
    }
    
    function getAllPos(){
    
        $this->db->select("*");
        $this->db->from('depmst');
        $this->db->where('DepTyp','POS');
        $query = $this->db->get();		
        return $query->result();			
    }
    
    function getAllProgram(){
    
        $this->db->select("*");
        $this->db->from('catmst');
        $this->db->where('CatGrpTyp','PRO');
        $query = $this->db->get();		
        return $query->result();			
    }
    
    function getAllCountries(){
    
        $this->db->select("*");
        $this->db->from('countries');
        $query = $this->db->get();		
        return $query->result();			
    }
    
    function getAllProvince(){
    
        $this->db->select("*");
        $this->db->from('province');
        $query = $this->db->get();		
        return $query->result();			
    }
    
    function getSelectAmphur($id){
    
        $this->db->select("*");
        $this->db->from('amphur');
        $this->db->where('PROVINCE_ID',$id);
        $query = $this->db->get();
//        $row = $query->row();
//        $query->free_result(); 
//        return $row;
        
        return $query->result();			
    }
    
    function getSelectTambon($id){
    
        $this->db->select("*");
        $this->db->from('district');
        $this->db->where('AMPHUR_ID',$id);
        $query = $this->db->get();		
        return $query->result();			
    }
    
    
    function getImage($playerCode) {
        $this->db->where('PimPlyCod', $playerCode);
        $this->db->from('piminf');
        
        $query = $this->db->get();
        
        return $query->row();
    }
    
    function getTeamAppointmentInfo($user, $date) {
        
        $data = array($user, $date);

        $query = $this->db->query("CALL fn_getTeamAppointmentInfo(?, ?)", $data);

        $row = $query->row();

        $query->free_result();

        return $row;
    }
    
    function getTeamWorklistInfo($appointmentSeq) {
        
        $data = array($appointmentSeq);

        $query = $this->db->query("CALL fn_getTeamWorklistInfo(?)", $data);

        return $query->result();
    }
    
    
    function searchPlayer($term) {
        $data = array($term);
        
        $query = $this->db->query("CALL fn_findPlayer(?)", $data);
        
        return $query->result();
    }
    
    function getComment($playerCode, $category) {
        $data = array($playerCode, $category);
        
        $query = $this->db->query("CALL fn_getPlayerComment(?, ?)", $data);
        
        return $query->row();
    }
    
    function addComment($playerCode, $category, $comment, $user) {
        $data = array($playerCode, $category, $comment, $user);
        
        $query = $this->db->query("CALL fn_addPlayerComment(?, ?, ?, ?)", $data);
        
        $query->row();
    }
    
    function getResult($playerCode, $date, $category, $subcategory) {
        $data = array($playerCode, $date, $category, $subcategory);
        
        $query = $this->db->query("CALL fn_getPlayerResult(?, ?, ?, ?)", $data);
        
        $row = $query->row();
               
        $query->free_result();
        
        return $row;
    }
    
    function updateResult($playerCode, $date, $comment, $category, $subcategory, $user) {
        $data = array($playerCode, $date, $comment, $category, $subcategory, $user);
        
        $query = $this->db->query("CALL fn_addPlayerResult(?, ?, ?, ?, ?, ?)", $data);
        
        $query->row();
    }
        function playerCate($playerCode, $date, $comment, $category, $subcategory, $user) {
        $data = array($playerCode, $date, $comment, $category, $subcategory, $user);
        
        $query = $this->db->query("CALL fn_addPlayerResult(?, ?, ?, ?, ?, ?)", $data);
        
        $query->row();
    }
    
        function updateTeamScheduleDetail($user, $date, $detail) {
        $data = array($user, $date, $detail);
        
        $query = $this->db->query("CALL fn_updateTeamScheduleDetail(?, ?, ?)", $data);
        
        $query->row();
    }
    
    
    
    
    
    
    //-----------------------------------------------
    // Delete Team Schedule
    //-----------------------------------------------
        function deleteTeamWorklistItem($appointmentSeq, $itemSeq) {
        $data = array($appointmentSeq, $itemSeq);
        
        $query = $this->db->query("CALL fn_deleteTeamWorklistItem(?, ?)", $data);
        
        $query->row();
    }
    
        function deleteOrderMaster($orderID) {
        $data = array($orderID);
        
        $query = $this->db->query("CALL fn_deleteNutrition(?)", $data);
        
        $query->row();
    }
    
    
}