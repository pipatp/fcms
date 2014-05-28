<style>

.label-check{
        
    width: 100px;
        
    }    
    
.lab-comment-section {
    margin-top: 10px;
    height: 30%;
    overflow: scroll;
}

.lab-comment-section .stretch {
    width: 50%;
    height: 30%;
    min-height: 100px;
    font-family: Helvetica,tahoma, sans-serif;
}

.lab-comment-section .comment {
    border: #AAA solid 1px;
    padding: 2px;
    white-space: pre;
}


.food-comment-section {
    margin-top: 10px;
    height: 30%;
    overflow: scroll;
}

.food-comment-section .stretch {
    width: 95%;
    height: 30%;
    min-height: 100px;
    font-family: Helvetica,tahoma, sans-serif;
}

.food-comment-section .comment {
    border: #AAA solid 1px;
    padding: 2px;
    white-space: pre;
}
    

.knowledge-comment-section {
    margin-top: 10px;
    height: 30%;
    overflow: scroll;
}

.knowledge-comment-section .stretch {
    width: 95%;
    height: 30%;
    min-height: 100px;
    font-family: Helvetica,tahoma, sans-serif;
}

.knowledge-comment-section .comment {
    border: #AAA solid 1px;
    padding: 2px;
    white-space: pre;
}

.supplements-comment-section {
    margin-top: 10px;
    height: 30%;
    overflow: scroll;
}

.supplements-comment-section .stretch {
    width: 95%;
    height: 30%;
    min-height: 100px;
    font-family: Helvetica,tahoma, sans-serif;
}

.supplements-comment-section .comment {
    border: #AAA solid 1px;
    padding: 2px;
    white-space: pre;
}


.comment-comment-section {
    margin-top: 10px;
    height: 30%;
    overflow: scroll;
}

.comment-comment-section .stretch {
    width: 95%;
    height: 30%;
    min-height: 100px;
    font-family: Helvetica,tahoma, sans-serif;
}

.comment-comment-section .comment {
    border: #AAA solid 1px;
    padding: 2px;
    white-space: pre;
}





.player-modification-comment{
        
    margin-top: 10px;
    height: 20%;
    width: 30%;
/*    display: inline-block;*/
    
    }
#nutrition-record-result { 
    padding: 0px; 
    background: none; 
    /*border-width: 0px;*/
    /*border: red solid 1px;*/
    
    margin-left: 2px;
    margin-right: 2px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;    
}

.search-box-section {
    margin-top: 5px;
}

#player-select-input {
    padding-left: 22px;
    background: url("../../images/search-magnify.png") no-repeat;
    background-position: 3px center;
    
    width: 250px;
    font-size: 13px;
}

.player-info-section {
    margin-top: 15px;
}

.player-info-section .player-picture {
    width: auto;
    height: 150px;
}

.player-info-section .player-detail {
    display: inline-block;

    vertical-align: top;
}

.list-auto-item {
    font-size: 13px;
}

#nutrition-addition-tab { 
    padding: 0px; 
    background: none; 
    border-width: 0px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 13px;
    
    margin-top: 10px;
    
    min-height: 300px;
}

#nutrition-addition-tab .ui-tabs-nav, #player-meal-modification-tab .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 1px 0px; 
    -moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px;
}

#nutrition-addition-tab .ui-tabs-nav li {
    width: 49%;
    
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

#nutrition-addition-tab .ui-tabs-nav li a {
    width: 100%;
        
    outline: none;
}

#nutrition-addition-tab .ui-tabs-panel {
    padding: 10px;
    border-width: 0px 1px 1px 1px;
    
    font-size: 13px;
}

#nutrition-addition-tab .stretch {
    width: 100%;
    height: 100%;
    
    font-family: Helvetica,tahoma, sans-serif;
}

#nutrition-addition-tab .comment {
    border: #AAA solid 1px;
    padding: 2px;
    
    white-space: pre;
}

/*

tab recommend

*/

#nutrition-addition-tabs { 
    padding: 0px; 
    background: none; 
    border-width: 0px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 13px;
    
    margin-top: 10px;
    
    min-height: 300px;
}

#nutrition-addition-tabs .ui-tabs-navs, #player-meal-modification-tabs .ui-tabs-navs { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 1px 0px; 
    -moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px;
}

#nutrition-addition-tabs .ui-tabs-nav li {
    width: 49%;
    
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

#nutrition-addition-tabs .ui-tabs-nav li a {
    width: 100%;
        
    outline: none;
}

#nutrition-addition-tabs .ui-tabs-panels {
    padding: 10px;
    border-width: 0px 1px 1px 1px;
    
    font-size: 13px;
}

#nutrition-addition-tabs .stretchs {
    width: 100%;
    height: 100%;
    
    font-family: Helvetica,tahoma, sans-serif;
}

#nutrition-addition-tabs .comments {
    border: #AAA solid 1px;
    padding: 2px;
    
    white-space: pre;
}


#showHistory {
    width: 1px;
    white-space: nowrap;
    
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}


.fit-content {
    width: 1px;
    white-space: nowrap;
    
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: middle;
}

.content {
    white-space: pre;
}
</style>
<div id="nutrition-record-result">
    <label class="control-label">รายชื่อนักเตะ:</label>
    <div class="search-box-section">
        <select id="player-select-input" class="form-control input-sm" style="width:300px;">
            <option value=""></option>
            <?php 
            foreach ($players as $player) {
            ?>
            <option value="<? echo $player->PlyCod ?>">
                <?php
                    $fullName = "";
                    if (strlen($player->PlyFstNam) > 0) {
                        $fullName = $player->PlyFstNam . " " . $player->PlyFamNam;
                    }
                    
                    if (strlen($player->PlyFstEng) > 0) {
                        if (strlen($fullName) > 0) {
                            $fullName = $fullName . " (" . $player->PlyFstEng . " " . $player->PlyFamEng . ")";
                        }
                        else {
                            $fullName = $player->PlyFstEng . " " . $player->PlyFamEng;
                        }
                    }
                    echo $fullName;
                ?>
            </option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="nutrition-record-detail">
        <div class="player-info-section">
            <img class="player-picture" src="" />
            <div class="player-detail"></div>
        </div>
        <div id="nutrition-addition-tab">
            <ul>
                <li><a href="#report-tab">รายงานผลจากนักโภชนากร</a></li>
                <li><a href="#suggestion-tab">คำแนะนำของนักโภชนากร</a></li>
            </ul>
            <div id="report-tab">
                <div id="result-history-button" class="btn btn-info" style="margin-bottom: 5px;">ประวัติรายงานผลของนักโภชนากร</div>
                <div class="player-modification-comment"></div>
            </div>
            <div id="suggestion-tab">
                <div id="suggestion-history-button" class="btn btn-info" style="margin-bottom: 5px;">ประวัติคำแนะนำของนักโภชนากร</div>
                <div class="stretch comment" title="ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข" ></div>
            </div>
        </div>
    </div>
</div>
<div id="historyDialog" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"></div>
            <div class="modal-body" style='overflow-y: auto; min-height: 300px; max-height: 600px;'>
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th class="fit-content">ดูรายละเอียด</th>
                            <th class="fit-content">วันที่</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>                  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<div id="historyDialog2" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"></div>
            <div class="modal-body" style='overflow-y: auto; min-height: 300px; max-height: 600px;'>
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th class="fit-content">วันที่</th>
                            <th class="fit-content">รายละเอียด</th><!--
                            <th class="fit-content">Body Composition %Body fat</th>
                            <th class="fit-content">Weight Changes After Exercise</th>
                            <th class="fit-content">Lab Assessment</th>
                            <th class="fit-content">Diet Rx</th>
                            <th class="fit-content">Food Composition</th>
                            <th class="fit-content">Assessment of usual food intake at home</th>
                            <th class="fit-content">Knowledge and readiness to change</th>
                            <th class="fit-content">Supplements taken</th>
                            <th class="fit-content">Comment</th>-->
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>                  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>


<script>
    
    var assessmentFormHtml = '<div>BMI</div>';
    assessmentFormHtml += '<div class="form-group">';
    assessmentFormHtml += '<div class="radio"><input type="radio" id="bmi1" name="bmi" value="1">Normal</div>';
    assessmentFormHtml += '<div class="radio"><input type="radio" id="bmi2" name="bmi" value="2">Overweight</div>';
    assessmentFormHtml += '<div class="radio"><input type="radio" id="bmi3" name="bmi" value="3">Obese</div>';
    assessmentFormHtml += '</div>';
    
    assessmentFormHtml += '<div>Body Composition %Body fat</div>';
    assessmentFormHtml += '<div class="form-group">';
    assessmentFormHtml += '<div class="radio"><input type="radio" id="bod1" name="bod" value="1">Normal</div>';
    assessmentFormHtml += '<div class="radio"><input type="radio" id="bod2" name="bod" value="2">Height</div>';
    assessmentFormHtml += '<div class="radio"><input type="radio" id="bod3" name="bod" value="3">Low</div>';
    assessmentFormHtml += '</div>';
    assessmentFormHtml += '<div>Weight Changes After Exercise';
    assessmentFormHtml += '<div class="form-group" id="weight">';
    assessmentFormHtml += '<input id="weight-change" name="weight-change" class="input-sm" required="" type="text">';
    assessmentFormHtml += '</div></div>';
    
    assessmentFormHtml += '<div>Diet Rx</div>';
    assessmentFormHtml += '<div class="form-group">';
    assessmentFormHtml += '<div class="radio"><input type="radio" id="diet1" name="diet" value="1">2,000 kcal</div>';
    assessmentFormHtml += '<div class="radio"><input type="radio" id="diet2" name="diet" value="2">2,500 kcal</div>';
    assessmentFormHtml += '<div class="radio"><input type="radio" id="diet3" name="diet" value="3">3,000 kcal</div>';
    assessmentFormHtml += '<div class="radio"><input type="radio" id="diet4" name="diet" value="4">3,500 kcal</div>';
    assessmentFormHtml += '<div class="radio"><input type="radio" id="diet5" name="diet" value="5">4,000 kcal</div>';
    assessmentFormHtml += '</div>';
    
    assessmentFormHtml += '<div>Food Composition</div>';
    assessmentFormHtml += '<div class="control-group " id="food-compose">';
    assessmentFormHtml += '<div><label class="control-label" style="width:auto">Grain</label>';
    assessmentFormHtml += '<input id="grain" type="checkbox" ></div><input id="grain-input" name="grain-input" class="input-sm" required="" type="text" disabled=""></div>';
    assessmentFormHtml += '<div class="control-group " id="food-compose">';
    assessmentFormHtml += '<div><label class="control-label" style="width:auto">Protein</label>';
    assessmentFormHtml += '<input id="protein" type="checkbox" ></div><input id="protein-input" name="grain-input" class="input-sm" required="" type="text" disabled=""></div>';
    assessmentFormHtml += '<div class="control-group " id="food-compose">';
    assessmentFormHtml += '<div><label class="control-label" style="width:auto">Fat</label>';
    assessmentFormHtml += '<input id="fats" type="checkbox"></div><input id="fats-input" name="fats-input" class="input-sm" required="" type="text" disabled=""></div>';
    assessmentFormHtml += '<div class="control-group " id="food-compose">';
    assessmentFormHtml += '<div><label class="control-label" style="width:auto">Milk</label>';
    assessmentFormHtml += '<input id="milk" type="checkbox"></div><input id="milk-input" name="milk-input" class="input-sm" required="" type="text" disabled=""></div>';
    assessmentFormHtml += '<div class="control-group " id="food-compose">';
    assessmentFormHtml += '<div><label class="control-label" style="width:auto">Fruit</label>';
    assessmentFormHtml += '<input id="fruit" type="checkbox"></div><input id="fruit-input" name="fruit-input" class="input-sm" required="" type="text" disabled=""></div>';
    assessmentFormHtml += '<div class="control-group" id="food-compose">';
    assessmentFormHtml += '<div><label class="control-label" style="width:auto">Veg</label>';
    assessmentFormHtml += '<input id="veg" type="checkbox"></div><input id="veg-input" name="veg-input" class="input-sm" required="" type="text" disabled=""></div>';
    assessmentFormHtml += '<div class="control-group " id="food-compose">';
    assessmentFormHtml += '<div><label class="control-label" style="width:auto">Fluid</label>';
    assessmentFormHtml += '<input id="fluid" type="checkbox"></div><input id="fluid-input" name="fluid-input" class="input-sm" required="" type="text" disabled=""></div>';

 
    assessmentFormHtml += '<label class="control-label">Lab Assessment:</label>';
    assessmentFormHtml += '<div class="lab-comment-section">';
    assessmentFormHtml += '<div class="stretch comment" title="ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข"></div>';
    assessmentFormHtml += '</div>';
    assessmentFormHtml += '<label class="control-label">Assessment of usual food intake at home:</label>';
    assessmentFormHtml += '<div class="food-comment-section">';
    assessmentFormHtml += '<div class="stretch comment" title="ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข"></div>';
    assessmentFormHtml += '</div>';
    assessmentFormHtml += '<label class="control-label">Knowledge and readiness to change:</label>';
    assessmentFormHtml += '<div class="knowledge-comment-section">';
    assessmentFormHtml += '<div class="stretch comment" title="ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข"></div>';
    assessmentFormHtml += '</div>';
    assessmentFormHtml += '<label class="control-label">Supplements taken:</label>';
    assessmentFormHtml += '<div class="supplements-comment-section">';
    assessmentFormHtml += '<div class="stretch comment" title="ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข"></div>';
    assessmentFormHtml += '</div>';
    assessmentFormHtml += '<label class="control-label">Comment:</label>';
    assessmentFormHtml += '<div class="comment-comment-section">';
    assessmentFormHtml += '<div class="stretch comment" title="ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข"></div>';
    assessmentFormHtml += '</div>';
    assessmentFormHtml += '<div id="save-nutrition-button" class="btn btn-info" style="margin-bottom: 5px;">บันทึกการประเมินค่านักเตะ</div>';

    var $assessmentTemplate = $(assessmentFormHtml);
    
    
    var playerCode = "";
    var currentDate = $.datepicker.formatDate("yymmdd", new Date());
    
    var history = {
        results: "",
        suggestions: ""
    }
    
    var permission = <?php echo json_encode($permission) ?>;
    
    $("#nutrition-addition-tab").tabs({heightStyle: "fill"});
    
    function addDetail($detailDiv, key, val) {
        $detailDiv.append("<tr><td style='padding-left: 5px;font-weight: bold; text-align:right'>" + key + "</td><td style='padding-left: 10px;'>" + val + "</td></tr>");
    }
    
    function displayPlayerInfo(item) {
        $(".player-picture").attr("src", "../player/thumbnail/" + playerCode + "?width=150&height=150");
        
        var $playerDetail = $(".player-detail");
        $playerDetail.empty();
        
        $table = $("<table style='margin-top: 5px;'></table>");
        
        addDetail($table, "ชื่อ", getDisplayNameWithEng(item.PlyFstNam, item.PlyFamNam, item.PlyFstEng, item.PlyFamEng));
        
        if (item.PlyBirDte) {
            var birthDay = $.datepicker.parseDate("yymmdd", item.PlyBirDte);
            addDetail($table, "อายุ", getAge(birthDay));
        }
        var religion = item.PlyRegCod === '1' ? 'พุทธ' : (item.PlyRegCod === '2' ? 'คริสต์' : 'อิสลาม');
        
        addDetail($table, "ตำแหน่ง", item.PlaPosCod);
        addDetail($table, "สัญชาติ", item.PlyNatCod);
        addDetail($table, "ศาสนา", religion);
        addDetail($table, "ภาษาพูด", item.PlyLan);
        
        $playerDetail.append($table);
        
        $("#player-add-meal-table").show();
    }
    
    
    var labCurrentComment = "";
    var knowCurrentComment = "";
    var foodCurrentComment = "";
    var supCurrentComment = "";
    var currentComment = "";
    var editMode = false;
    
    
    $(".nutrition-record-detail").hide();
 
        $("#player-select-input").change(function() {
        var $combo = $(this);
        playerCode = $combo.find(":selected").val();
        
        if (playerCode.length <= 0) {
            return;
        }
        
        getPlayerInfo(playerCode);

        $("#report-tab .stretch").text("");
        $("#suggestion-tab .stretch").text("");

        getPlayerResult();
        
        getNutritionHistoryResult();

        getAssessmentForm();
            
        $(".nutrition-record-detail").show();
    });
    
    
    
//    var $form = '';
    
    function getAssessmentForm(){

        var selectedTabIndex = $("#nutrition-addition-tab").tabs('option', 'active');
         
        var $tab = (selectedTabIndex === 0) ? $("#nutrition-addition-tab #report-tab") : '';
        
        var $form = $assessmentTemplate.clone(true, true);
        
        $tab.append($form);

        $.get("getAssessment/" + playerCode + "/" +  currentDate).done(function(result) {

            var assess = jQuery.parseJSON(result);

//              assess.AsmBmi === '1' ? $('input:radio[name=bmi]')[0].checked = true : (assess.AsmBmi === '2' ? $('input:radio[name=bmi]')[1].checked = true : (assess.AsmBmi === '3' ? $('input:radio[name=bmi]')[3].checked = true : $('input:radio[name=bmi]').checked = false));
            
                assess.AsmBmi === '1' ? $('#bmi1').prop("checked", true) : (assess.AsmBmi === '2' ? $('#bmi2').prop("checked", true) : (assess.AsmBmi === '3' ? $('#bmi3').prop("checked", true) : $('input:radio[name=bmi]').prop("checked", false)));
                
                assess.AsmBodFat === '1' ? $('#bod1').prop("checked", true) : (assess.AsmBodFat === '2' ? $('#bod2').prop("checked", true) : (assess.AsmBodFat === '3' ? $('#bod3').prop("checked", true) : $('input:radio[name=bod]').prop("checked", false)));
//            
                assess.AsmDieRx === '1' ? $('#diet1').prop("checked", true) : (assess.AsmDieRx === '2' ? $('#diet2').prop("checked", true) : (assess.AsmDieRx === '3' ? $('#diet3').prop("checked", true) : (assess.AsmDieRx === '4' ? $('#diet4').prop("checked", true) : (assess.AsmDieRx === '5' ? $('#diet5').prop("checked", true) : $('input:radio[name=diet]').prop("checked", false)))));
   
//              assess.AsmDieRx === '1' ? $('input:radio[name=diet]:nth(1)').attr('checked',true) : (assess.AsmDieRx === '2' ? $('input:radio[name=diet]:nth(2)'.attr('checked',true)) : (assess.AsmDieRx === '3' ? $('input:radio[name=diet]:nth(3)'.attr('checked',true)) : (assess.AsmDieRx === '4' ? $('input:radio[name=diet]:nth(4)'.attr('checked',true)) : $('input:radio[name=diet]:nth(5)'.attr('checked',true)))));
            
            $("#weight-change").val(assess.AsmWghChn);
            
            $("#grain-input").val(assess.AsmFodGrn);
            
            $("#milk-input").val(assess.AsmFodMlk);
            
            $("#protein-input").val(assess.AsmFodPtn);
            
            $("#fats-input").val(assess.AsmFodFat);
            
            $("#fruit-input").val(assess.AsmFodFrt);
            
            $("#veg-input").val(assess.AsmFodVeg);
            
            $("#fluid-input").val(assess.AsmFodFld);

    });
        
        $('#save-nutrition-button').click(updateAssessment);
        
        $('#grain').change(function(){
           $("#grain-input").prop("disabled", !$(this).is(':checked'));
           if(!$(this).is(":checked")){
               
               $("#grain-input").val('');
           }
        });
        
        $('#protein').change(function(){
           $("#protein-input").prop("disabled", !$(this).is(':checked'));
           if(!$(this).is(":checked")){
               
               $("#protein-input").val('');
           }
        });
        
        $('#fats').change(function(){
           $("#fats-input").prop("disabled", !$(this).is(':checked'));
           if(!$(this).is(":checked")){
               
               $("#fats-input").val('');
           }
        });
        
        $('#milk').change(function(){
           $("#milk-input").prop("disabled", !$(this).is(':checked'));
           if(!$(this).is(":checked")){
               
               $("#milk-input").val('');
           }
        });
        
        $('#veg').change(function(){
           $("#veg-input").prop("disabled", !$(this).is(':checked'));
           if(!$(this).is(":checked")){
               
               $("#veg-input").val('');
           }
        });
        
        $('#fruit').change(function(){
           $("#fruit-input").prop("disabled", !$(this).is(':checked'));
           if(!$(this).is(":checked")){
               
               $("#fruit-input").val('');
           }
        });
        
        $('#fluid').change(function(){
           $("#fluid-input").prop("disabled", !$(this).is(':checked'));
           if(!$(this).is(":checked")){
               
               $("#fluid-input").val('');
           }
        });
        
        
        $(function() {
            
            
        if(!permission.write) {
            $(".knowledge-comment-section, .lab-comment-section, .food-comment-section, .supplements-comment-section, .comment-comment-section, #suggestion-tab").addClass("hidden");
        }     
            
        else{ // no permission write
            $(".knowledge-comment-section, .lab-comment-section, .food-comment-section, .supplements-comment-section, .comment-comment-section, #suggestion-tab").dblclick(function() {
                if (editMode) {
                    return false;
                }
                convertToTextArea($(this));
            });
            $(".knowledge-comment-section").focusout(function() {
                var $sectionKnow = $(this);
                var $sectionKnow = $(".knowledge-comment-section");
                var $commentKnow = $sectionKnow.children(".stretch");

                if ($commentKnow.val() === knowCurrentComment) {
                    convertToDiv($sectionKnow);
                } 
                else {
                    addPlayerResult($commentKnow.val(), "KNO", function() {
                        convertToDiv($sectionKnow);
                    }); 
                }
            });

            $(".food-comment-section").focusout(function() {
                var $sectionFood = $(this);
                var $sectionFood = $(".food-comment-section");
                var $commentFood = $sectionFood.children(".stretch");

                if ($commentFood.val() === foodCurrentComment) {
                    convertToDiv($sectionFood);
                } 
                else {
                    addPlayerResult($commentFood.val(), "FOD", function() {
                        convertToDiv($sectionFood);
                    }); 
                }
            });
            
            $(".lab-comment-section").focusout(function() {
                var $sectionLab = $(this);
                var $sectionLab = $(".lab-comment-section");
                var $commentLab = $sectionLab.children(".stretch");

                if ($commentLab.val() === labCurrentComment) {
                    convertToDiv($sectionLab);
                } 
                else {
                    addPlayerResult($commentLab.val(), "LAB", function() {
                        convertToDiv($sectionLab);
                    }); 
                }
            });
            
            $(".supplements-comment-section").focusout(function() {
                var $sectionSup = $(this);
                var $sectionSup  = $(".supplements-comment-section");
                var $commentSup = $sectionSup.children(".stretch");

                if ($commentSup.val() === supCurrentComment) {
                    convertToDiv($sectionSup);
                } 
                else {
                    addPlayerResult($commentSup.val(), "SUP", function() {
                        convertToDiv($sectionSup);
                    }); 
                }
            });
            
            $(".comment-comment-section").focusout(function() {
                var $section = $(this);
                var $comment = $section.children(".stretch");

                if ($comment.val() === currentComment) {
                    convertToDiv($section);
                } 
                else {
                    addPlayerResult($comment.val(), "RST", function() {
                        convertToDiv($section);
                    }); 
                }
            });
            
            $("#suggestion-tab").focusout(function() {
                var $section = $(this);
                var $comment = $section.children(".stretch");

                if ($comment.val() === currentComment) {
                    convertToDiv($section);
                } 
                else {
                    addPlayerResult($comment.val(), "SGT", function() {
                        convertToDiv($section);
                    }); 
                }   
            });
            
        $("#report-tab .stretch").tooltip();
        $("#suggestion-tab .stretch").tooltip();
        }
        
        
        
        $("#historyDialog").modal({ show: false });
        $("#result-history-button").click(function() {
            
            var modalHeader = $("#historyDialog .modal-header");
            var modalTbody =  $("#historyDialog tbody");
            var modalThead = $("#historyDialog thead");
            var dialog = $("#historyDialog");

            setHistoryDialog(modalHeader, modalTbody, modalThead, dialog, "ประวัติรายงานผลของนักโภชนากร", history.results);
        });
        $("#suggestion-history-button").click(function() {
            
            var modalHeader = $("#historyDialog2 .modal-header");
            var modalTbody =  $("#historyDialog2 tbody");
            var modalThead = $("#historyDialog2 thead");
            var dialog = $("#historyDialog2");
            
            setHistoryDialog(modalHeader, modalTbody, modalThead, dialog, "ประวัติคำแนะนำของนักโภชนากร", history.suggestions);
        });
    });
    
    }
    
        function setHistoryDialog(modalHeader, modalTbody, modalThead, dialog, header, $contents) {
//        $("#historyDialog .modal-header").text(header);
//        
//        $("#historyDialog tbody").detach();
//        $("#historyDialog thead").after($contents);
//        
//        $("#historyDialog").modal("show");

            modalHeader.text(header);
            
            modalTbody.detach();
            
            modalThead.after($contents);
            
            dialog.modal('show');
            
    }
    
    
    function getPlayerInfo(playerCode) {
        $.get("../player/info/" + playerCode).done(function(result) {
            var info = jQuery.parseJSON(result);

            displayPlayerInfo(info);
        });
    }
    

    
    function getPlayerResult() {      
        $.get("getNutritionResult/" + playerCode + "/" + currentDate).done(function(result) {
            var comment = jQuery.parseJSON(result);
            
            if (comment.result) {
                $(".comment-comment-section .stretch").text(comment.result.PlrRstCmt);
            }
            else {
                $(".comment-comment-section .stretch").text("");
            }
            
            if (comment.lab) {
                $(".lab-comment-section .stretch").text(comment.lab.PlrRstCmt);
            }
            else {
                $(".lab-comment-section .stretch").text("");
            }
            
            if (comment.food) {
                $(".food-comment-section .stretch").text(comment.food.PlrRstCmt);
            }
            else {
                $(".food-comment-section .stretch").text("");
            }
            
            if (comment.knowledge) {
                $(".knowledge-comment-section .stretch").text(comment.knowledge.PlrRstCmt);
            }
            else {
                $(".knowledge-comment-section .stretch").text("");
            }
            
            if(comment.supplement){
                $(".supplements-comment-section .stretch").text(comment.supplement.PlrRstCmt);
            }
            else {
                $(".supplements-comment-section .stretch").text("");
            }
            
            if (comment.suggestion) {
                $("#suggestion-tab .stretch").text(comment.suggestion.PlrRstCmt);
            }
            else {
                $("#suggestion-tab .stretch").text("");
            }
        });
    }
    
    
    
    function getNutritionHistoryResult() {
        $.get("getNutritionHistoryResult/" + playerCode).done(function(result) {
            var comment = jQuery.parseJSON(result);
            
            history.results = populateReportTable(comment.results);
            
            console.info(history.results);
            
            history.suggestions = populateHistoryTable(comment.suggestions);
        });
    }
    
    function populateHistoryTable(items) {
        var $content = $("<tbody>");
        
        for (var index=0; index<items.length; index++) {
            var $row = $("<tr>");
            
            var date = $.datepicker.parseDate("yymmdd", items[index].PlrRstDte);
            
            $("<td>", { "class":"fit-content" }).text($.datepicker.formatDate("d MM yy", date)).appendTo($row);
            $("<td>", { "class":"content" }).text(items[index].PlrRstCmt).appendTo($row);
            
            $content.append($row);
        }
        
        return $content;
    }
    
        function populateReportTable(items) {
        
        
        var $content = $("<tbody>");
        
        for (var index=0; index<items.length; index++) {
            
            var $showHisCol =  $("<td>", { "id":"showHistory"});
            var $showHis = $("<img>", { src: "../../images/magnify.png" });
            var $row = $("<tr>");
            var date = $.datepicker.parseDate("yymmdd", items[index].PlrRstDte);
//            var $deleteItem = $("<img>", { src: "../../images/delete.png" });
            
            
            $showHisCol.append($showHis);
            $showHisCol.appendTo($row);
            $("<td>", { "class":"fit-content" }).text($.datepicker.formatDate("d MM yy", date)).appendTo($row);
            
//            $("<td>", { "class":"content" }).text(items[index].PlrRstCmt).appendTo($row);
            $content.append($row);
        }
        
        return $content;
    }
    
    
    function addPlayerResult(comment, subcategory, success) {
        var result = {};
        
        result.playerCode = playerCode;
        result.date = currentDate;
        result.comment = comment;
        result.category = "NUT";
        result.subcategory = subcategory;

        $.post("../player/updateResult", JSON.stringify(result)).done(function() {
            success();
        }).fail(function() {
           alert("ไม่สามารถแก้ไขข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
        });
    }
    
//        function addCommentAssessment(comment, category, success) {
//        var result = {};
//        
//        result.playerCode = playerCode;
//        result.date = currentDate;
//        result.comment = comment;
//        result.category = category;
//
//        $.post("updateCommentAssessment", JSON.stringify(result)).done(function() {
//            success();
//        }).fail(function() {
//           alert("ไม่สามารถแก้ไขข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
//        });
//    }
    
    
    function convertToTextArea($section) {       
        var $commentDiv = $section.children(".stretch");
        $commentDiv.tooltip('hide');
        $commentDiv.detach();
        
        currentComment = $commentDiv.text();
        
        var $commentBox = $("<textarea class='stretch'></textarea>");
        $commentBox.val($commentDiv.text());
        
        $commentBox.keydown(function(e) {
            if (e.keyCode === 27) {
                $commentBox.val(currentComment);
                
                convertToDiv($section);
            }
        });
        
        $section.append($commentBox);
        
        $commentBox.focus();
        
        editMode = true;
    }
    
    function convertToDiv($section) {
        var $commentBox = $section.children(".stretch");
        $commentBox.detach();
        
        var $commentDiv = $("<div class='stretch comment' title='ดับเบิ้ลคลิ๊กเพื่อทำการแก้ไข'></div>");
        $commentDiv.text($commentBox.val());
        
        $commentDiv.tooltip();
        
        $section.append($commentDiv);
        
        editMode = false;
    }
    
    function updateAssessment(){
        
            var assess= {};

            assess.bmi = $('input:radio[name=bmi]:checked').val();
            assess.body = $('input:radio[name=bod]:checked').val();
            assess.diet = $('input:radio[name=diet]:checked').val();
            assess.playerCode = playerCode;
            assess.date = currentDate;
            assess.protein = $("#protein-input").val();
            assess.fat = $("#fats-input").val();
            assess.milk = $("#milk-input").val();
            assess.fruit = $("#fruit-input").val();
            assess.grain = $("#grain-input").val();
            assess.veg = $("#veg-input").val();
            assess.fluid = $("#fluid-input").val();
            assess.weight = $("#weight-change").val();
            

            $.post("updateAssessment", JSON.stringify(assess)).done(function() {
                
                
            $('input:radio[name=bmi]').attr('checked', false);
            $('input:radio[name=bod]').attr('checked', false);   
            $('input:radio[name=diet]').attr('checked', false);
            
            $('input:checkbox[id=grain]').attr('checked', false);
            $('input:checkbox[id=protein]').attr('checked', false);   
            $('input:checkbox[id=fats]').attr('checked', false);
            $('input:checkbox[id=milk]').attr('checked', false);
            $('input:checkbox[id=fruit]').attr('checked', false);   
            $('input:checkbox[id=veg]').attr('checked', false);
            $('input:checkbox[id=fluid]').attr('checked', false);
           
            $("#grain-input").val('').prop('disabled', true);
            $("#protein-input").val('').prop('disabled', true);
            $("#fats-input").val('').prop('disabled', true);
            $("#fruit-input").val('').prop('disabled', true);
            $("#milk-input").val('').prop('disabled', true);
            $("#veg-input").val('').prop('disabled', true);
            $("#fluid-input").val('').prop('disabled', true);
            $("#weight-change").val('');

            });
//            }
        }    

//    function getPlayerComment(playerCode,cat,tag) {
//        $.get("../player/comment/" + playerCode + "?cat=" + cat).done(function(result) {
//            var comment = jQuery.parseJSON(result);
//            
//            if (comment.PlcCmt) {
//                tag.text(comment.PlcCmt);
//            }
//            else {
//                tag.text("");
//            }
//        });
//    }
</script>