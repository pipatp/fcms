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
    <div class="form-inline">
        <select id="planMonthSelection" class="form-control input-sm" style="width: 200px;">
            <?php
            $found = false;
            $currentMonth = date('Ym');
            $count = count($planMonths);
            $index = 0;
            foreach ($planMonths as $month) {
            ?>
            <option value="<?php echo $month->NmpYeaMon ?>" <?php if (++$index == $count) echo 'selected="true"'; ?>>
                <?php
                $date = strtotime($month->NmpYeaMon . "01000000");
                echo date("F Y", $date);
                ?>
            </option>
            <?php
                if ($currentMonth == $month->NmpYeaMon) {
                    $found = true;
                }
            }
            ?>
        </select>
        <?php
        if (!$found) {
        ?>
        <div id="create-plan-button" class="btn btn-info">สร้างแผนการจัด Nutrition</div>
        <?php
        }
        ?>
    </div>
    <div id="plan-section">
        <?php
            if (count($planMonths) > 0) {
                $lastPlan = $planMonths[count($planMonths) - 1]->NmpYeaMon;
                
                if ($currentMonth == $lastPlan) {
                    $this->load->view('nut_plan_edit');
                }
                else {
                    $this->load->view('nut_plan_view');
                }
            }
        ?>
        
    </div>
</div>
<script>
    $("#create-plan-button").click(function() {
        var month = $.datepicker.formatDate("yymm", new Date());
        $.get("createNutritionPlan/" + month).done(function() {
            $.ajax("viewNutritionPlan").done(function(result) {
                var $content = $(".content-body");

                $content.html(result);
            });
        });
    });
    
    $("#planMonthSelection").change(function() {
        var $selection = $(this);

        var yearMonth = $selection.find(":selected").val();

        $.get("getNutritionPlan/" + yearMonth).done(function(result) {
            var $content = $("#plan-section");

            $content.html(result);
        });
    });
</script>