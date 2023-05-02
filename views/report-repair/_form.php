<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ReportRepair $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="report-repair-form">

    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>
                   <div class="row">
                        <div class="col-md-3">
                            <?= $form->field($model, 'report_survey_id')->dropDownList($listReportSurvey, ['data-choices' => '']) ?>
                        </div>
                        <div class="col-md-3">
                            <?= Html::label('No. Laporan Kerosakan', 'report_damage') ?>        
                            <?= Html::textInput('report_damage', null, ['id'=>'report-damage','class' => 'form-control', 'maxlength' => true, 'readonly'=>true]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= Html::label('Hull No/FIC No', 'boat_name') ?>        
                            <?= Html::textInput('boat_name', null, ['id'=>'boat-name','class' => 'form-control', 'maxlength' => true, 'readonly'=>true]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'report_date', [
                                'template' => '{label}<div class="input-group">
                                                <span class="input-group-text"><i class="ri-calendar-2-line"></i></span>
                                                    {input}{hint}{error}
                                                </div>',
                            ])->textInput(['data-provider' => 'flatpickr']) ?>
                        </div>      
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            
                            <?= $form->field($model, 'report_no')->textInput(['maxlength' => true]) ?>
                            
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                                
                            <?= $form->field($model, 'service_description')->textarea(['rows' => 6]) ?>
                            
                        </div>
                        <div class="col-md-6">
                                
                            <?= $form->field($model, 'tools_need')->textarea(['rows' => 6]) ?>
                            
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-6">
                             <?= $form->field($model, 'warranty_expiration_date', [
                                'template' => '{label}<div class="input-group">
                                                <span class="input-group-text"><i class="ri-calendar-2-line"></i></span>
                                                    {input}{hint}{error}
                                                </div>',
                            ])->textInput(['data-provider' => 'flatpickr', 'id'=>'warranty-date']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::label('Baki Tempoh Jaminan Bahagian/Item yang Diperbaiki', 'remaining_time') ?>        
                            <?= Html::textInput('remaining_time', null, ['id'=>'remaining-time','class' => 'form-control', 'maxlength' => true, 'readonly'=>true]) ?>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="card-footer">
                    <div class="form-group">                        
                        <a href="<?php echo Yii::$app->request->referrer ?: Yii::$app->homeUrl ?>" title="Cancel" class="btn btn-label btn-warning btn-animation bg-gradient waves-effect waves-light"><i class="mdi mdi-keyboard-return label-icon align-middle"></i>  Batal</a>
                        <?= Html::submitButton('<i class="mdi mdi-content-save-outline label-icon align-middle"></i> Hantar', ['class' => 'btn btn-label btn-success btn-animation bg-gradient waves-effect waves-light float-end']) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card" id="contact-view-detail">
                <div class="card-header">
                    <h5 class="card-title mb-0">Requestor</h5>
                </div>
                <div class="card-body text-center">
                    <div class="position-relative d-inline-block">
                        <img src="<?= \Yii::getAlias('@web');?>/images/users/user-dummy-img.jpg" alt="" class="avatar-lg rounded-circle img-thumbnail">
                        <span class="contact-active position-absolute rounded-circle bg-success"><span class="visually-hidden"></span>
                    </div>
                    <h5 class="mt-4 mb-1"><?php echo $model->isNewRecord?Yii::$app->user->identity->fullname:$model->requestor->fullname ?><?= $form->field($model, 'updated_user_id')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?></h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td class="fw-medium" scope="row">Jawatan</td>
                                    <td><?php echo $model->isNewRecord?Yii::$app->user->identity->designation:$model->requestor->designation ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium" scope="row">E-mel</td>
                                    <td><?php echo $model->isNewRecord?Yii::$app->user->identity->email:$model->requestor->email ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium" scope="row">No. Tel</td>
                                    <td><?php echo $model->isNewRecord?Yii::$app->user->identity->phone_no:$model->requestor->phone_no ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end card-->
            
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<script>
    

    $(function(){
        
        $(document).ready(function() {

            function calculateRemainingTime() {

                // Get input and output elements
                var input = document.getElementById("warranty-date");
                var output = document.getElementById("remaining-time");

                // Get current date and time
                var now = new Date();
                  
                // Get input date value
                var inputDateValue = input.value;
                  
                  
                // Create new date object from input date value
                var inputDate = new Date(inputDateValue);
                inputDate.setHours(0);
                console.log(inputDate);
                console.log(now);
                // Calculate time difference in milliseconds
                var timeDiff = inputDate.getTime() - now.getTime();
                  
                // Convert time difference to months and days
                var remainingMonths = Math.floor(timeDiff / (1000 * 60 * 60 * 24 * 30));
                var remainingDays = Math.floor((timeDiff % (1000 * 60 * 60 * 24 * 30)) / (1000 * 60 * 60 * 24));
                  
                // Set result to output element
                output.value = remainingMonths + " bulan dan " + remainingDays + " hari";
            
            }

            // Call function on page load
            calculateRemainingTime();

            // Get input element
            var input = $("#warranty-date");

            // Add event listener to input element
            input.change(calculateRemainingTime);




            // Get the default value of the dropdown list
          var selectedValue = $('#reportrepair-report_survey_id').val();
          
          // Function to fetch data and update target field
          function fetchDataAndUpdateTargetField(selectedValue) {
            $.ajax({
              url: '<?= Url::to(['report-repair/boat','id'=>'']) ?>',
              type: 'POST',
              dataType: 'json',
              data: { selectedValue: selectedValue },
              success: function(data) {
                $('#report-damage').val(data.report_damage_no);
                $('#boat-name').val(data.boat_name);
              }
            });
          }

          // Execute the function on page load
          fetchDataAndUpdateTargetField(selectedValue);

          // Bind the change event handler
          $('#reportrepair-report_survey_id').change(function() {
            var selectedValue = $(this).val();
            fetchDataAndUpdateTargetField(selectedValue);
          });
            
            
        });

    });

    


    

    
</script>
