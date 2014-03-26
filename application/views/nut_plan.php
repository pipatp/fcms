<style>
#nutrition-plan { 
    padding: 0px; 
    background: none; 
    
    margin-left: 2px;
    margin-right: 2px;
    
    font-family: Helvetica,tahoma, sans-serif;
    font-size: 14px;    
}

.fit-content {
    /*width: 1px;*/
    white-space: nowrap;
    
    padding-left: 10px;
    padding-right: 10px;
    
    vertical-align: top !important;
    text-align: center;
}

.content {
    white-space: pre;
}
</style>
<div id="nutrition-plan">
    <table id="coach-schdule-table" class="table table-striped table-condensed">
        <thead>
            <tr>
                <th class="fit-content">กลุ่ม<br/>Nutrition</th>
                <th class="fit-content">รายชื่อ</th>
                <th class="fit-content">ตำแหน่ง</th>
                <th class="fit-content">อายุ<br/>(ปี)</th>
                <th class="fit-content">ส่วนสูง<br/>(cm)</th>
                <th class="fit-content">น้ำหนัก<br/>(kg)</th>
                <th class="fit-content">BMI</th>
                <th class="fit-content">%Fat</th>
                <th class="fit-content">Fat Mass</th>
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
            foreach ($players as $player) {
            ?>
            <tr>
                <td>
                    <select class="form-control input-sm">
                        <option value="A" selected="true">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
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
                <td><input type="text" class="form-control input-sm"></input></td>
                <td><input type="text" class="form-control input-sm"></input></td>
                <td><input type="text" class="form-control input-sm"></input></td>
                <td><input type="text" class="form-control input-sm"></input></td>
                <td><input type="text" class="form-control input-sm"></input></td>
                <td><input type="text" class="form-control input-sm"></input></td>
                <td><input type="text" class="form-control input-sm"></input></td>
                <td><input type="text" class="form-control input-sm"></input></td>
                <td><input type="text" class="form-control input-sm"></input></td>
                <td><input type="text" class="form-control input-sm"></input></td>
                <td><input type="text" class="form-control input-sm"></input></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>