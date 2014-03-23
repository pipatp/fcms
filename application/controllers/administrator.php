<?php

class Administrator extends CI_Controller {
    public $permission;
    
    function Administrator() {
        parent::__construct();
        
        $this->load->library('permission');
        
        if (!$this->session->userdata('user_login')) {
                redirect('main/login');
        }
        
        if (!$this->session->userdata('user_permission')) {
            redirect('main/menu');
        }
        
        $perms = $this->session->userdata('user_permission');
        
        if (!array_key_exists('ADM', $perms)) {
            redirect('main/menu');
        }
        
        $this->permission = $perms["ADM"];
   }
    
    protected function getQueryStringParams() {
        parse_str($_SERVER['QUERY_STRING'], $params);
        return $params;
    }
    
    function main() {
        $loginSession = $this->session->userdata('user_login');
        
        $data["loginSession"] = $loginSession;
        $data["showMenu"] = true;
        $data["showSubMenu"] = true;
        $data["subMenuView"] = "admin_navigation";
        
        $data["permissions"] = $this->session->userdata('user_permission');
        
        $this->load->view('admin_main', $data);
    }
    
    //----------------------------------------------
    // Food Registration
    //----------------------------------------------
    function viewRegistration() {
        $this->load->view('admin_playerlist');
    }
      function viewAddPlayer() {
        
        $data["permission"] = $this->permission;  
          
        $this->load->view('admin_addplayer',$data);
    }
    
        function viewPlayerInfo() {
        $this->load->view('coa_player_info');
    }
    
    function viewCoachSchedule() {
        $this->load->view('admin_schedule');
    }
    
    function viewTeamSchedule() {
        $this->load->view('tem_schedule');
    }
    //-------------------------------------------------
    // Add Player Positon-------------------------
    //--------------------------------------------------
    
    
    function addCategory(){
        
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        $this->load->model('administrator_model');
        
        
        $data["content"] = $this->administrator_model->addCategory($postData["department"],$postData["eDepartment"],
        $postData["job"], $postData["eJob"],$postData["medType"], $postData["eMedType"], $postData["fitTool"],$postData["eFitTool"],
        $postData["physicType"], $postData["ePhysicType"],$postData["nutType"],$postData["eNutType"]);
        

        $this->load->view('json_result', $data);    
    }
    
    
    
    function addPlayerProfile(){
        
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        $this->load->model('administrator_model');
        
        
                                              
      
        $data["content"] = $this->administrator_model->savePlayerProfile($postData["titCod"],
        $postData["firstName"], $postData["midName"], $postData["surName"],$postData["nickName"],$postData["enickName"],
        $postData["efirstName"],$postData["emidName"], $postData["esurName"],
        $postData["idNo"], $postData["passPort"], $postData["addNum"],$postData["addDetail"],
        $postData["tambonID"], $postData["amphurID"], $postData["provinceID"],$postData["countryID"],
        $postData["add_num_current"],$postData["add_detail_current"],$postData["tambonID2"], 
        $postData["amphurID2"], $postData["provinceID2"],$postData["countryID2"],
        $postData["add_num_foreign"], $postData["add_detail_foreign"],$postData["regionID"],
        $postData["sexID"], $postData["mobileNum"],$postData["contactName"],
        $postData["contactPhonNum"], $postData["Institution"],$postData["Educate"],$postData["Facebook"],
        $postData["Email"],$postData["Disease"],$postData["Injury"],$postData["Nation"],
        $postData["shirtName"],$postData["preferFoot"],$postData["Height"],$postData["Weight"],
        $postData["clubGoal"],$postData["natGoal"],$postData["Chest"],$postData["pantSize"],
        $postData["shirtSize"],$postData["shoeSize"],$postData["Language"],$postData["statusTeam"],
        $postData["Spirit"],$postData["statusPlay"],$postData["oldTeam"]);
        

        $this->load->view('json_result', $data);
    }
    
    function addPlayerPosition(){
        
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        $this->load->model('administrator_model');
        
        
        $data["content"] = $this->administrator_model->addPlayerPosition($postData["tPosition"],$postData["ePosition"]);
        
        

        $this->load->view('json_result', $data);
    }
        
    function addTeamSchedule() {
        
        $postData = json_decode(trim(file_get_contents('php://input')), true);

        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];

        $this->load->model('administrator_model');

        try {
            $this->administrator_model->addTeamSchedule($postData["date"], $postData["startTime"],
                 $postData["endTime"], $postData["detail"], $user);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Add item failed. ' . $e->getMessage());
        }
    }
        
        
    function addUserProfile(){
            
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        $this->load->model('administrator_model');

        $data["content"] = $this->administrator_model->saveUserProfile($postData["firstName"],
        $postData["lastName"], $postData["userPass"], $postData["userTel"],$postData["userMail"],$postData["userDep"],
        $postData["userJob"]);


        $this->load->view('json_result', $data);
            
        }
    
    function getMedCategory($orderCate) {
        
        $this->load->model('administrator_model');
        
 //       $obj["worklistSeq"] = $this->worklist_model->getPlayerWorklistSeq($playerCode, $date);
        $data["content"] = $this->administrator_model->getMedCategory($orderCate);
            
//        $data["content"] = $obj;

        $this->load->view('json_result', $data);
    }    
        
        
    function getFitCategory($orderCate,$orderGroup) {
        
        $this->load->model('administrator_model');
        
 //       $obj["worklistSeq"] = $this->worklist_model->getPlayerWorklistSeq($playerCode, $date);
        $data["content"] = $this->administrator_model->getFitCategory($orderCate,$orderGroup);
            
//        $data["content"] = $obj;

        $this->load->view('json_result', $data);
    }
    
    function getPhyCategory($orderCate) {
        
        $this->load->model('administrator_model');
        
        $data["content"] = $this->administrator_model->getPhyCategory($orderCate);
            

        $this->load->view('json_result', $data);
    }
    
    function getNutCategory($orderCate) {
        
        $this->load->model('administrator_model');
        
        $data["content"] = $this->administrator_model->getNutCategory($orderCate);
            

        $this->load->view('json_result', $data);
    }
    
        function getUser() {
        
        $this->load->model('administrator_model');
        
        $data["content"] = $this->administrator_model->getUser();
            

        $this->load->view('json_result', $data);
    }   
        
        
    function getUserID(){
        
        $this->load->model('administrator_model');   
        $query['res'] = $this->administrator_model->getID();

        echo json_encode($query);
        //$this->output->set_output(json_encode($query));
        //return $query ;
        }

        
        
    function getTeamSchedule($date) {
        
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];
        
        $this->load->model('administrator_model');
        
        $obj["appointment"] = $this->administrator_model->getTeamAppointmentInfo($user, $date);
        
        $obj["worklist"] = (count($obj["appointment"]) > 0) ? $this->administrator_model->getTeamWorklistInfo($obj["appointment"]->TapSeqNum) : array();
        
        $data["content"] = $obj;
        
        $this->load->view('json_result', $data);
    }   

//    function addCategory() {
//    
//        $thai_dep = $this->input->post("thai_dep");
//        $thai_job = $this->input->post("thai_job");
//        $thai_medtyp = $this->input->post("thai_medtyp");
//        $thai_fittyp = $this->input->post("thai_fittyp");
//        $thai_phytyp = $this->input->post("thai_phytyp");
//        $thai_program = $this->input->post("thai_program");
//        $thai_nuttyp = $this->input->post("thai_nuttyp");
//        $eng_department = $this->input->post("eng_department");
//        $eng_job = $this->input->post("eng_job");
//        $eng_medtyp = $this->input->post("eng_medtyp");
//        $eng_fittyp = $this->input->post("eng_fittyp");
//        $eng_phytyp = $this->input->post("eng_phytyp");
//        $eng_program = $this->input->post("eng_program");
//        $eng_nuttyp = $this->input->post("eng_nuttyp");
//       
//        $this->load->model('administrator_model');
//
//        $query["result"] = $this->administrator_model->saveCategory($thai_dep,$thai_job,$thai_medtyp,$thai_fittyp,$thai_phytyp,$thai_program,$thai_nuttyp,$eng_department,$eng_job,$eng_medtyp,$eng_fittyp,$eng_phytyp,$eng_program,$eng_nuttyp);
//        
//        if($query){
//        $data['result'] =  $query;
//        }
//        else{
//
//                $data['result'] =  "Can not insert";
//        }
//        echo "ระบบได้ทำการเพิ่ม";
//
//        }
        
    
        function addMed(){
            
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        $this->load->model('administrator_model');

        $data["content"] = $this->administrator_model->addMed($postData["tMed"],
        $postData["eMed"], $postData["tDirection"], $postData["eDirection"],$postData["medOder"],$postData["medUnit"],
        $postData["medType"]);


        $this->load->view('json_result', $data);
            
        }
    
        
        function addFit(){
            
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        $this->load->model('administrator_model');

        $data["content"] = $this->administrator_model->addFit($postData["tDirect"],
        $postData["eDirect"], $postData["tAdapt"], $postData["eAdapt"],$postData["fitOder"],$postData["fitUnit"],
        $postData["fitType"],$postData["fitTool"],$postData["fitPart"]);


        $this->load->view('json_result', $data);
            
        }
        
        
        function addPhy(){
            
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        $this->load->model('administrator_model');

        $data["content"] = $this->administrator_model->addPhy($postData["tPhy"],
        $postData["ePhy"], $postData["tPhyDirecttion"], $postData["ePhyDirecttion"],$postData["phyOrder"],$postData["phyUnit"],
        $postData["phyType"]);


        $this->load->view('json_result', $data);
            
        }
                    
      
        function addNut(){
            
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        $this->load->model('administrator_model');

        $data["content"] = $this->administrator_model->addNut($postData["tNut"],
        $postData["eNut"], $postData["nutOrder"], $postData["nutUnit"],$postData["nutCalories"],$postData["nutType"]);


        $this->load->view('json_result', $data);
            
        }
        
        
//        function addNut() {
//            
//        $nut_thai = $this->input->post("nut_thai");
//        $nut_eng = $this->input->post("nut_eng");
//        $nut_order = $this->input->post("nut_order");
//        $nut_unit = $this->input->post("nut_unit");
//        $nut_cal = $this->input->post("nut_cal");
//        $nut_typ = $this->input->post("nut_typ");
//       
//     
//      
//        
//        $this->load->model('administrator_model');
//
//        $query["nut"] = $this->administrator_model->saveNut($nut_thai,$nut_eng,$nut_typ,$nut_order,$nut_unit);
//        
//        if($query){
//        $data['nut'] =  $query;
//        }
//        else{
//
//                $data['nut'] =  "Can not insert";
//        }
//        echo "ระบบได้ทำการเพิ่ม";
//
//        }
                                    
    function addUser() {
            
        $user_fname = $this->input->post("user_fname");
        $user_lname = $this->input->post("user_lname");
        $user_pass = $this->input->post("user_pass");
        $user_tel = $this->input->post("user_tel");
        $user_mail = $this->input->post("user_mail");
        $deps = $this->input->post("deps");
        $jobs = $this->input->post("jobs");
       
     
      
        
        $this->load->model('administrator_model');

        $query["user"] = $this->administrator_model->saveUser($user_fname,$user_lname,$user_pass,$user_tel,$user_mail,$deps,$jobs);
        
        if($query){
        $data['user'] =  $query;
        }
        else{

                $data['user'] =  "Can not insert";
        }
        echo "ระบบได้ทำการเพิ่ม";

        }
        
        
        function addPlayerPofile(){

       
        $titcod = $this->input->post("titcod");
        $firstname = $this->input->post("firstname");
        $midname = $this->input->post("midname");
        $surname = $this->input->post("surname");
        $nickname = $this->input->post("nickname");
        //$pincode = $this->input->post("pincode");
        $efirstname = $this->input->post("efirstname");
        $emidname = $this->input->post("emidname");
        $esurname = $this->input->post("esurname");
        $enickname = $this->input->post("enickname");
        $idno = $this->input->post("idno");
        $passport = $this->input->post("passport");
        $add_num = $this->input->post("add_num");
        $add_detail = $this->input->post("add_detail");
        

        
        
        
        $height = $this->input->post("height");
        $weight = $this->input->post("weight");
        $province_id = $this->input->post("province_id");
        $amphur_id = $this->input->post("amphur_id");
        $region_id = $this->input->post("region_id");
        $sex_id = $this->input->post("sex_id");
        $phone = $this->input->post("phone");
        $mobile = $this->input->post("mobile");
        $contactname = $this->input->post("contactname");
        $contactno = $this->input->post("contactno");
        $email = $this->input->post("email");
        $national = $this->input->post("national");
        $country_id = $this->input->post("country_id");
        $position = $this->input->post("position");
        $tambon_id = $this->input->post("tambon_id");


//        $corner = $this->input->post("corner");
//        $pass = $this->input->post("pass");
//        $tack = $this->input->post("tack");
//        $penalty = $this->input->post("penalty");
//        $technic = $this->input->post("technic");
//        $drib = $this->input->post("drib");
//        $finish = $this->input->post("finish");
//        $touch = $this->input->post("touch");
//        $head = $this->input->post("head");
//        $shoot = $this->input->post("shoot");
//        $throw = $this->input->post("throw");
//        $mark = $this->input->post("mark");
//        $cross = $this->input->post("cross");
//        $freekick = $this->input->post("freekick");
//        $bravery = $this->input->post("bravery");
//        $composure = $this->input->post("composure");
//        $concentrate= $this->input->post("concentrate");
//        $creativity = $this->input->post("creativity");
//        $aggression = $this->input->post("aggression");
//        $anticipation = $this->input->post("anticipation");
//        $decide = $this->input->post("decide");
//        $determinate = $this->input->post("determinate");
//        $flair= $this->input->post("flair");
//        $influence = $this->input->post("influence");
//        $off_the_ball = $this->input->post("off_the_ball");
//        $positioning = $this->input->post("positioning");
//        $teamwork = $this->input->post("teamwork");
//        $workrate = $this->input->post("workrate");
//        $accuracy = $this->input->post("accuracy");
//        $agility = $this->input->post("agility");
//        $balance = $this->input->post("balance");
//        $jump = $this->input->post("jump");
//        $fitness = $this->input->post("fitness");
//        $pace = $this->input->post("pace");
//        $stamina = $this->input->post("stamina");
//        $strength = $this->input->post("strength");
//        $goal = $this->input->post("goal");
//        $accelerate = $this->input->post("accelerate");
        
        $this->load->model('administrator_model');
        $query['player'] = $this->administrator_model->insertPlayerProfile($titcod,$firstname,$midname,$surname,$nickname,$efirstname,$emidname,$esurname,$enickname,$idno,$passport,$add_num,$add_detail);
//        $query['player'] = $this->m_player->insertPlayerProfile($titcod,$frsname,$midname,$famname,$reg,$pincode,$firstnameeng,$midnameeng,$famnameeng,$national,$pid,$passport,$addressno,$addressdetail,$tb,$pr,$ct,$am,$sex,$addressdetail,$addressdetaileng,$phone,$mobile,$contactname,$contactno,$email,$corner,$pass,$tack,$penalty,$technic,$drib,$finish,$touch,$head,$shoot,$throw,$mark,$cross,$freekick,$bravery,$composure,$concentrate,$creativity,$aggression,$anticipation,$decide,$determinate,$flair,$influence,$off_the_ball,$positioning,$teamwork,$workrate,$accelerate,$accuracy,$agility,$balance,$jump,$fitness,$pace,$stamina,$strength,$goal,$position);
        //$query['player'] = $this->m_player->insertPlayer($titcod,$frsname,$midname,$famname,$pincode,$firstnameeng,$midnameeng,$famnameeng,$pid,$passport,$addressno,$addressdetail,$addressnoeng,$addressdetaileng,$height,$weight,$accuracy,$agility,$balance,$jump,$fitness,$pace,$stamina,$strength,$goal);
        if($query){
                $data['player'] =  $query;
        }
        else{

                $data['player'] =  "Can not insert";
        }


        echo "Add New Player Complete";


        }
        
            
    function getMedTyp() {
        $this->load->model('administrator_model');
        $query['medtyp'] = $this->administrator_model->getAllMed();

        echo json_encode($query);
        
    } 
    
    function getFitTyp() {
        $this->load->model('administrator_model');
        $query['fittyp'] = $this->administrator_model->getAllFit();

        echo json_encode($query);
        
    }
    
    function getCountries() {
        $this->load->model('administrator_model');
        $query['content'] = $this->administrator_model->getAllCountries();

//        echo json_encode($query);
        $this->load->view('json_result', $query);
    }
    
    function getProvince() {
        $this->load->model('administrator_model');
        $query['content'] = $this->administrator_model->getAllProvince();

//        echo json_encode($query);
        $this->load->view('json_result', $query);
    }
    
    function getAmphur($id) {
        
//        $id = $this->input->post("id");
        $this->load->model('administrator_model');
        $query['content'] = $this->administrator_model->getSelectAmphur($id);

//      echo json_encode($query);  // var contents = $.parseJSON(content); $.each(contents.content ,function(index,value)
        $this->load->view('json_result', $query);
    }
    
    function getTambon($id) {
        
//        $id = $this->input->post("id");
        $this->load->model('administrator_model');
        $query['content'] = $this->administrator_model->getSelectTambon($id);

//        echo json_encode($query);
        $this->load->view('json_result', $query);
    }
    
    function getPhyTyp() {
        $this->load->model('administrator_model');
        $query['phytyp'] = $this->administrator_model->getAllPhy();

        echo json_encode($query);
        
    }
    
    function getNutTyp() {
        $this->load->model('administrator_model');
        $query['nuttyp'] = $this->administrator_model->getAllNut();

        echo json_encode($query);
        
    }
    
    function getDep() {
        $this->load->model('administrator_model');
        $query['deps'] = $this->administrator_model->getAllDep();

        echo json_encode($query);
        
    }
    
    function getJob() {
        $this->load->model('administrator_model');
        $query['jobs'] = $this->administrator_model->getAllJob();

        echo json_encode($query);
        
    }
    
    function getPos() {
        $this->load->model('administrator_model');
        $query['pos'] = $this->administrator_model->getAllPos();

        echo json_encode($query);
        
    }
    
    function getProgram() {
        $this->load->model('administrator_model');
        $query['program'] = $this->administrator_model->getAllProgram();

        echo json_encode($query);
        
    }
    
//    function addFoodMealItem() {
//        $postData = json_decode(trim(file_get_contents('php://input')), true);
//        
//        $this->load->model('nutrition_model');
//
//        $data["content"] = $this->nutrition_model->saveFoodMealItem($postData["yearMonth"],
//             $postData["day"], $postData["weekDay"], $postData["type"],
//             $postData["code"], $postData["weight"], $postData["calorie"]);
//        
//        $this->load->view('json_result', $data);
//    }
    
    
    
    
    function getRegistrationWaitingList($mealVal) {
        $this->load->model('nutrition_model');
        
        $currentDate = date("Ymd");
        
        $data["content"] = $this->nutrition_model->getRegistrationWaitingList($mealVal, $currentDate);
        
        $this->load->view('json_result', $data);
    }
    
    function getRegistrationReceiveList($mealVal) {
        $this->load->model('nutrition_model');
        
        $currentDate = date("Ymd");
        
        $data["content"] = $this->nutrition_model->getRegistrationReceiveList($mealVal, $currentDate);
        
        $this->load->view('json_result', $data);
    }
    
    //----------------------------------------------
    // Food Preparation
    //----------------------------------------------
    function viewPreparation() {
        $this->load->view('nut_preparation');
    }
    
    function getFoodMealSet($yearMonth, $day) {
        $this->load->model('nutrition_model');
        
        $data["content"] = $this->nutrition_model->getFoodMealSet($yearMonth, $day);
        
        $this->load->view('json_result', $data);        
    }
    
    function findFoodMealItem() {
        $queryParams = $this->getQueryStringParams();
        
        $term = $queryParams['term'];
        
        $this->load->model('nutrition_model');
        
        $data["content"] = $this->nutrition_model->findFoodMealItem($term);
        
        $this->load->view('json_result', $data);        
    }
    
    function addFoodMealItem() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('nutrition_model');

        $data["content"] = $this->nutrition_model->saveFoodMealItem($postData["yearMonth"],
             $postData["day"], $postData["weekDay"], $postData["type"],
             $postData["code"], $postData["weight"], $postData["calorie"]);
        
        $this->load->view('json_result', $data);
    }
    
    
    function deleteOrderMaster() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('administrator_model');

        try {
            
            $this->administrator_model->deleteOrderMaster($postData["worklistSeq"]);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Delete item failed.');
        }
    }
    
    
    function deleteUser() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('administrator_model');

        try {
            
            $this->administrator_model->deleteUser($postData["worklistSeq"]);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Delete item failed.');
        }
    }
    
    function deleteFoodMealItem() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('nutrition_model');

        try {
            $this->nutrition_model->deleteFoodMealItem($postData["yearMonth"],
                 $postData["day"], $postData["weekDay"], $postData["type"],
                 $postData["code"]);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Delete item failed.');
        }
    }
    
    function getTodayMealPreparation($date, $mealType) {
        $this->load->model('nutrition_model');
        
        $data["content"] = $this->nutrition_model->getTodayMealPreparation($date, $mealType);
        
        $this->load->view('json_result', $data);
    }
    
    //----------------------------------------------
    // Meal Modification
    //----------------------------------------------
    function viewMealModification() {
        $this->load->model('nutrition_model');
             
        $this->load->view('nut_modification');
    }
    function viewMasterData() {
//        $this->load->model('nutrition_model');
        $data["permission"] = $this->permission;     
        $this->load->view('mas_data',$data);
    }
    
    
    
    function findPlayer() {
        $queryParams = $this->getQueryStringParams();
        
        $term = $queryParams['term'];
        
        $this->load->model('nutrition_model');
        
        $data["content"] = $this->nutrition_model->findPlayer($term);
        
        $this->load->view('json_result', $data);        
    }
    
    function getPlayerMealSet($playerCode, $yearMonth, $day) {
        $this->load->model('nutrition_model');
        
        $date = $yearMonth . $day;
        
        $data["content"] = $this->nutrition_model->getPlayerMealSet($playerCode, $date);

        $this->load->view('json_result', $data);        
    }
    
    function getPlayerWorklistMeal($playerCode, $yearMonth, $day) {
        $this->load->model('nutrition_model');
        
        $date = $yearMonth . $day;
        
        $data["content"] = $this->nutrition_model->getPlayerWorklistMeal($playerCode, $date);

        $this->load->view('json_result', $data);        
   }
    
    function addPlayerMealItem() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);

        $this->load->model('nutrition_model');

        $data["content"] = $this->nutrition_model->addPlayerMealItem($postData["worklistSeq"],
             $postData["orderCode"], $postData["code"], $postData["weight"],
             $postData["calorie"], $postData["yearMonth"], $postData["day"]);

        $this->load->view('json_result', $data);
    }
    
    function deletePlayerMealItem() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('nutrition_model');
        
        $this->nutrition_model->deletePlayerMealItem($postData["worklistSeq"],
             $postData["orderCode"], $postData["mealSeq"]);
    }
    
    function editPlayerMealItem() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);

        $this->load->model('nutrition_model');

        $this->nutrition_model->editPlayerMealItem($postData["worklistSeq"],
             $postData["orderCode"], $postData["mealSeq"], $postData["code"], 
             $postData["weight"], $postData["calorie"]);
    }
    
    //----------------------------------------------
    // Meal Inventory
    //----------------------------------------------
    function viewInventory() {
        $this->load->view('nut_inventory');
    }
    
    //-----------------------------------------------
    // Update Team Schedule
    //-----------------------------------------------
    
    function updateTeamScheduleDetail() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('administrator_model');
        
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];
        
        try {
            $this->administrator_model->updateTeamScheduleDetail($user,
                 $postData["date"], $postData["detail"]);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Update Failed. ' . $e->getMessage());
        }
    }
    
    
    function approveTeamWorklistItem() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('administrator_model');

        try {
            $this->administrator_model->approveTeamWorklistItem($postData["appointmentSeq"],
                 $postData["itemSeq"]);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Delete failed. ' . $e->getMessage());
        }
    }
    
    
    
    
    
    //------------------------------------------------------
    // Delete Team Schedule
    //------------------------------------------------------
    
        function deleteTeamWorklistItem() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('administrator_model');

        try {
            $this->administrator_model->deleteTeamWorklistItem($postData["appointmentSeq"],
                 $postData["itemSeq"]);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Delete failed. ' . $e->getMessage());
        }
    }
    
    
}
