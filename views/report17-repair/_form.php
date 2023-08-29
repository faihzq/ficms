<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ReportRepair $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="report17-repair-form">

    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>
                   <div class="row">
                        <div class="col-md-3">
                            <?= Html::label('No. Laporan Kajian LD', 'report_survey') ?>        
                            <?= Html::textInput('report_survey', null, ['id'=>'report-survey','class' => 'form-control', 'maxlength' => true, 'readonly'=>true]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= Html::label('No. Laporan Latern Defect (LD)', 'report_damage') ?>        
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
                            ])->textInput(['data-provider' => 'flatpickr', 'disabled'=>true]) ?>
                        </div>      
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            
                            <?= $form->field($model, 'report_no')->textInput(['maxlength' => true, 'disabled'=>true]) ?>
                            
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
            <?= Html::a('<i class="mdi mdi-printer-outline label-icon align-middle rounded-pill"></i>Rujukan Borang 17B ('.$model->reportSurvey->report_no.') ', ['report17-survey/pdf', 'id' => $model->report_survey_id], ['class' => 'btn btn-label rounded-pill btn-secondary btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2', 'target' => '_blank']) ?>
            
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<script>
    

    $(function(){
        
        $(document).ready(function() {

            // Get the default value of the dropdown list
          var selectedValue = <?php echo $model->id ?>;
          // console.log(selectedValue);
          // Function to fetch data and update target field
          function fetchDataAndUpdateTargetField(selectedValue) {
            $.ajax({
              url: '<?= Url::to(['report17-repair/boat','id'=>'']) ?>',
              type: 'POST',
              dataType: 'json',
              data: { selectedValue: selectedValue },
              success: function(data) {
                $('#report-damage').val(data.report_damage_no);
                $('#boat-name').val(data.boat_name);
                $('#report-survey').val(data.report_survey_no);
              }
            });
          }

          // Execute the function on page load
          fetchDataAndUpdateTargetField(selectedValue);

          // Bind the change event handler
          $('#report17repair-report_survey_id').change(function() {
            var selectedValue = $(this).val();
            fetchDataAndUpdateTargetField(selectedValue);
          });
            
            
        });

    });

    


    

    
</script>
