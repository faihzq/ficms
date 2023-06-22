<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ReportSurvey $model */
/** @var yii\widgets\ActiveForm $form */

$warrantyOptions = [
   '1' => 'Ya',
   '0' => 'Tidak',
   // add more options as needed
];
?>

<div class="report-survey-form">

    <div class="row">
        <div class="col-lg-9">
            <?php $form = ActiveForm::begin(); ?>

            <div class="card">
                <div class="card-body">
                   <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'report_damage_id')->dropDownList($listReportDamage, ['data-choices' => '']) ?>
                        </div>
                        <div class="col-md-4">
                            <?= Html::label('Hull No/FIC No', 'boat_name') ?>        
                            <?= Html::textInput('boat_name', null, ['id'=>'boat-name','class' => 'form-control', 'maxlength' => true, 'readonly'=>true]) ?>
                        </div>
                        <div class="col-md-4">
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
                            
                            <?= $form->field($model, 'report_no')->textInput(['maxlength' => true, 'disabled'=>true]) ?>
                            
                        </div>
                        <div class="col-md-6">
                            
                            <?= $form->field($model, 'survey_date', [
                                'template' => '{label}<div class="input-group">
                                                <span class="input-group-text"><i class="ri-calendar-2-line"></i></span>
                                                    {input}{hint}{error}
                                                </div>',
                            ])->textInput([ 'data-provider' => 'flatpickr']) ?>
                            
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                                
                            <?= $form->field($model, 'damage_description')->textarea(['rows' => 6]) ?>
                            
                        </div>
                        <div class="col-md-6">
                                
                            <?= $form->field($model, 'probable_cause')->textarea(['rows' => 6]) ?>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <?= $form->field($model, 'boat_status_id')->dropDownList($listBoatStatus, ['data-choices' => '', 'data-choices-search-false'=>'', 'data-choices-sorting-false'=>'']) ?>
                        </div>
                        <div class="col-md-3" id="warranty-dropdown">
                            <?= $form->field($model, 'warranty_protection')->dropDownList($warrantyOptions, ['data-choices' => '', 'data-choices-search-false'=>'', 'data-choices-sorting-false'=>'']) ?>
                        </div>
                        <div class="col-md-6" id="warranty-reason">
                             <?= $form->field($model, 'nowarranty_protection_reason')->textarea(['rows' => 6]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                             <?= $form->field($model, 'suggested_correction')->textarea(['rows' => 6]) ?>
                        </div>
                        <div class="col-md-6">
                             <?= $form->field($model, 'tools_need')->textarea(['rows' => 6]) ?>
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
                    <h5 class="card-title mb-0">Disediakan Oleh</h5>
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
            // Get the default value of the dropdown list
          var selectedValue = $('#reportsurvey-report_damage_id').val();
          
          // Function to fetch data and update target field
          function fetchDataAndUpdateTargetField(selectedValue) {
            $.ajax({
              url: '<?= Url::to(['report-survey/boat','id'=>'']) ?>',
              type: 'POST',
              dataType: 'json',
              data: { selectedValue: selectedValue },
              success: function(data) {
                $('#boat-name').val(data.result);
              }
            });
          }

          // Execute the function on page load
          fetchDataAndUpdateTargetField(selectedValue);

          // Bind the change event handler
          $('#reportsurvey-report_damage_id').change(function() {
            var selectedValue = $(this).val();
            fetchDataAndUpdateTargetField(selectedValue);
          });
            // show or hide related field
            $("#warranty-reason").hide();

            $("#warranty-dropdown").find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                
                
                // Unit appear for certain claim type
                if (optionValue == 0) { // Susistance Allowance
                    // Show
                    $("#warranty-reason").show(500);
                    
                } else {
                    $("#warranty-reason").hide(500);
                }
                    
            });
            
        });

        

        $("#warranty-dropdown").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if (optionValue){

                    

                    // Unit appear for certain claim type
                    if (optionValue == 0) { // Susistance Allowance
                        // Show
                        $("#warranty-reason").show(500);
                        
                    } else {
                        $("#warranty-reason").val(null);
                        $("#warranty-reason").hide(500);
                    }
                } else {
                    $("#warranty-reason").hide(500);
                }

            });
        });

    });

    
</script>
