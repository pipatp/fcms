<table id="coach-schdule-table" class="table table-striped table-condensed">
    <thead>
        <tr>
            <th class="fit-content">กลุ่ม<br/>Nutrition</th>
            <th class="fit-content">รายชื่อ</th>
            <th class="fit-content">ตำแหน่ง</th>
            <th class="fit-content">อายุ<br/>(ปี)</th>
            <th class="fit-content">ส่วนสูง<br/>(cm)</th>
            <th class="fit-content">น้ำหนัก<br/>(kg)</th>
            <!--<th class="fit-content">BMI</th>-->
            <!--<th class="fit-content">%Fat</th>-->
            <!--<th class="fit-content">Fat Mass</th>-->
            <th class="fit-content">Calories/Day</th>
            <th class="fit-content">นม<br/>(Milk)</th>
            <th class="fit-content">เนื้อสัตว์<br/>(Meat)</th>
            <th class="fit-content">ผลไม้<br/>(Fruit)</th>
            <th class="fit-content">ผัก<br/>(Veggie)</th>
            <th class="fit-content">แป้ง<br/>(Rice/Noodles)</th>
            <th class="fit-content">ไขมัน<br/>(Lipid)</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($playerPlans as $player) {
        ?>
        <tr data-player-code="<?php echo $player->PlyCod ?>">
            <td>
                <select class="form-control input-sm meal-set">
                    <option value="A" <?php if ($player->NmpNutGrp == "A") echo 'selected="true"'; ?>>A</option>
                    <option value="B" <?php if ($player->NmpNutGrp == "B") echo 'selected="true"'; ?>>B</option>
                    <option value="C" <?php if ($player->NmpNutGrp == "C") echo 'selected="true"'; ?>>C</option>
                </select>
            </td>
            <td>
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
            </td>
            <td></td>
            <td>
                <?php
                    if (isset($player->PlyBirDte)) {
                        $year = substr($player->PlyBirDte, 0, 4);
                        $month = substr($player->PlyBirDte, 4, 2);
                        $day = substr($player->PlyBirDte, 6, 2);
                        $age = date("md", date("U", mktime(0, 0, 0, $month, $day, $year))) > date("md")
                        ? ((date("Y") - $year) - 1)
                        : (date("Y") - $year);

                        echo $age;
                    }
                ?>
            </td>
            <td></td>
<!--            <td><input type="text" class="form-control input-sm"></input></td>
            <td><input type="text" class="form-control input-sm"></input></td>
            <td><input type="text" class="form-control input-sm"></input></td>-->
            <td><input type="text" class="form-control input-sm weight-field" value="<?php echo $player->NmpPlyWgh ?>"></input></td>
            <td><input type="text" class="form-control input-sm calorie-field" value="<?php echo $player->NmpCalDay ?>"></input></td>
            <td><input type="text" class="form-control input-sm milk-field" value="<?php echo $player->NmpMlkUnt ?>"></input></td>
            <td><input type="text" class="form-control input-sm meat-field" value="<?php echo $player->NmpMeaUnt ?>"></input></td>
            <td><input type="text" class="form-control input-sm fruit-field" value="<?php echo $player->NmpFrtUnt ?>"></input></td>
            <td><input type="text" class="form-control input-sm veggie-field" value="<?php echo $player->NmpVegUnt ?>"></input></td>
            <td><input type="text" class="form-control input-sm rice-field" value="<?php echo $player->NmpRceNod ?>"></input></td>
            <td><input type="text" class="form-control input-sm lipid-field" value="<?php echo $player->NmpLipUnt ?>"></input></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<div id="save-plan-button" class="btn btn-info">บันทึก</div>
<script>
    function getPlayerData($row) {
        var playerData = {};
        
        playerData.playerCode = $row.attr("data-player-code");
        playerData.mealSet = $($row.find(".meal-set")).find(":selected").val() || null;
        playerData.weight = $($row.find(".weight-field")).val() || null;
        playerData.calorie = $($row.find(".calorie-field")).val() || null;
        playerData.milk = $($row.find(".milk-field")).val() || null;
        playerData.meat = $($row.find(".meat-field")).val() || null;
        playerData.fruit = $($row.find(".fruit-field")).val() || null;
        playerData.veggie = $($row.find(".veggie-field")).val() || null;
        playerData.rice = $($row.find(".rice-field")).val() || null;
        playerData.lipid = $($row.find(".lipid-field")).val() || null;
        
        return playerData;
    }
    
    $("#save-plan-button").click(function() {
        var planObj = {};
        
        planObj.yearMonth = $("#planMonthSelection").find(":selected").val();
        
        planObj.playerData = [];
        
        var $rows = $("#coach-schdule-table tbody tr");
        
        for (var index=0; index<$rows.length; index++) {
            planObj.playerData.push(getPlayerData($($rows[index])));
        }
        
        console.info(planObj);
        
        $.post("saveNutritionPlan", JSON.stringify(planObj)).done(function() {
            bootbox.alert("บันทึกสำเร็จ");
        }).fail(function() {
           alert("ไม่สามารถแก้ไขข้อมูลได้ โปรดลองอีกครั้งหนึ่ง");
        });
    });
</script>