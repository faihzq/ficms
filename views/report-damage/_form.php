<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
$baseUrl = Url::base();
/** @var yii\web\View $this */
/** @var app\models\ReportDamage $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="report-damage-form">
    <div class="row">
        <div class="col-lg-9">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'contract_no')->textInput(['maxlength' => true, 'disabled'=>true]) ?>
                        </div>
                        <div class="col-md-4">           
                            <?= $form->field($model, 'boat_id')->dropDownList($listBoat, ['data-choices' => '']) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'report_date', [
                                'template' => '{label}<div class="input-group">
                                                <span class="input-group-text"><i class="ri-calendar-2-line"></i></span>
                                                    {input}{hint}{error}
                                                </div>',
                            ])->textInput(['data-provider' => 'flatpickr', 'disabled'=>true]) ?>
                        </div>      
                    </div>
                    <hr>
                    <p class="text-muted">Pemberitahuan kerosakan bahagian atau barang Dalam Jaminan (DJ) sebagaimana ditentukan dalam Klausa 22.</p>
                    <div class="row">
                        <div class="col-md-4">
                            
                            <?= $form->field($model, 'report_no')->textInput(['maxlength' => true, 'disabled'=>true]) ?>
                            
                        </div>
                        <div class="col-md-4">
                            
                            <?= $form->field($model, 'damage_date', [
                                'template' => '{label}<div class="input-group">
                                                <span class="input-group-text"><i class="ri-calendar-2-line"></i></span>
                                                    {input}{hint}{error}
                                                </div>',
                            ])->textInput([ 'data-provider' => 'flatpickr']) ?>
                            
                        </div>
                        <div class="col-md-4">
                            
                            <?= $form->field($model, 'boat_location_id')->dropDownList($listLocation, ['data-choices' => '']) ?>
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLocationModal">Daftar Lokasi</button> -->
                            <?= Html::button('Daftar Lokasi FIC', ['value' => Url::to(['boat-location/register']), 'title' => 'Daftar Lokasi', 'class' => 'showModalButton btn btn-success']); ?>
                        </div>
                    </div>
                    <p class="text-muted fs-5 mt-3">Butir-butir peralatan:</p>
                    <hr>
                    <div class="row">
                        
                        <div class="col-md-3">
                            
                            <?= $form->field($model, 'sel_no')->textInput(['maxlength' => true]) ?>
                            
                        </div>
                        <div class="col-md-3">
                            
                            <?= $form->field($model, 'equipment_id')->dropDownList($listEquipment, ['data-choices' => '']) ?>
                            
                        </div>
                        <div class="col-md-2">
                            
                            <?= $form->field($model, 'equipment_serial')->textInput(['maxlength' => true, 'readonly'=> true]) ?>
                            
                        </div>
                        <div class="col-md-4">

                            <?= $form->field($model, 'equipment_location_id')->dropDownList($listEqLocation, ['data-choices' => '']) ?>
                            <?= Html::button('Daftar Lokasi Peralatan', ['value' => Url::to(['equipment-location/register']), 'title' => 'Daftar Lokasi Peralatan', 'class' => 'showModalButton btn btn-success']); ?>
                        
                        </div>
                        <div class="col-md-4">
                                                    
                            <?= $form->field($model, 'running_hours', [
                                'template' => '{label}<div class="input-group">
                                                        {input}
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">jam</span>
                                                        </div>{hint}{error}
                                                    </div>',
                            ])->textInput(['maxlength'=>true]) ?>
                            
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab">
                                Keterangan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#addproduct-metadata" role="tab">
                                Pegawai/Anggota
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?= $form->field($model, 'boat_status_id')->dropDownList($listBoatStatus, ['data-choices' => '', 'data-choices-search-false'=>'']) ?>
                                </div>

                                <div class="col-lg-6">
                                    <?= $form->field($model, 'damage_type_id')->dropDownList($listDamageType, ['data-choices' => '']) ?>
                                </div>
                                
                                <div class="col-lg-6">
                                    <?= $form->field($model, 'damage_information')->textarea(['rows' => 7]) ?>
                                </div>

                                <div class="col-lg-6" id="uploadFileId">
                                    <label>Lampiran/Gambar</label><br>
                                    <?php if ($model->support_doc_1): ?>
                                        <div class="mb-3">
                                            <a href="<?php echo $baseUrl.'/uploads/reportDamage/';echo $model->support_doc_1; ?>" title="Download" class="btn btn-outline-primary" target="_blank"><i class="mdi mdi-cloud-download-outline"></i> <?php echo $model->support_doc_1 ?></a>
                                            <a href="<?= Url::to(['report-damage/download','filename'=>$model->support_doc_1]) ?>" title="Download" class="btn btn-outline-success btn-icon waves-effect waves-light" target="_blank"><i class="mdi mdi-cloud-download-outline"></i> </a>
                                            <button type="button" class="btn btn-outline-danger btn-icon waves-effect waves-light" onclick="removeFile('<?php echo $model->id ?>',1)"><i class="ri-delete-bin-5-line"></i></button><br>
                                        </div>
                                        <?php else: ?>
                                            <?= $form->field($model, 'support_doc_1')->fileInput(['class'=>'form-control', 'options' => ['accept' => 'image/png']])->label(false) ?>
                                    <?php endif ?>
                                    <?php if ($model->support_doc_2): ?>
                                        <div class="mb-3">
                                            <a href="<?php echo $baseUrl.'/uploads/reportDamage/';echo $model->support_doc_2; ?>" title="Download" class="btn btn-outline-primary" target="_blank"><i class="mdi mdi-cloud-download-outline"></i> <?php echo $model->support_doc_2 ?></a>
                                            <a href="<?= Url::to(['report-damage/download','filename'=>$model->support_doc_2]) ?>" title="Download" class="btn btn-outline-success btn-icon waves-effect waves-light" target="_blank"><i class="mdi mdi-cloud-download-outline"></i> </a>
                                            <button type="button" class="btn btn-outline-danger btn-icon waves-effect waves-light " onclick="removeFile('<?php echo $model->id ?>',2)"><i class="ri-delete-bin-5-line"></i></button>
                                        </div>
                                        <?php else: ?>
                                            <?= $form->field($model, 'support_doc_2')->fileInput(['class'=>'form-control', 'options' => ['accept' => 'image/png']])->label(false) ?>
                                    <?php endif ?>
                                    <?= $form->field($model, 'support_doc_3')->fileInput(['class'=>'form-control', 'options' => ['accept' => 'image/png']])->label(false) ?>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end tab-pane -->

                        <div class="tab-pane" id="addproduct-metadata" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?= $form->field($model, 'contact_officer_name')->textArea(['rows' => 6]) ?>
                                </div>
                                <div class="col-lg-6">
                                    <?= $form->field($model, 'contact_officer_tel')->textInput(['maxlength' => true]) ?>
                                </div>
                                
                            </div>
                            
                        </div>
                        <!-- end tab pane -->
                    </div>
                    <!-- end tab content -->
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
                    <h5 class="card-title mb-0">Dilaporkan Oleh</h5>
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
                                    <td><?php echo Yii::$app->user->identity->designation ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium" scope="row">E-mel</td>
                                    <td><?php echo Yii::$app->user->identity->email ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium" scope="row">No. Tel</td>
                                    <td><?php echo Yii::$app->user->identity->phone_no ?></td>
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

<script src="<?= \Yii::getAlias('@web');?>/libs/cleave.js/cleave.min.js"></script>
<script src="<?= \Yii::getAlias('@web');?>/libs/cleave.js/addons/cleave-phone.ms.js"></script>

<script>
    function removeFile(id,filename){

        swal.fire({
          title: 'Adakah anda pasti?',
          text: "Fail yang dimuat naik akan dialih keluar daripada borang laporan ini",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Ya, padam!',
          cancelButtonText: 'Tidak, batal!',
          reverseButtons: true
        }).then(function(result) {
          if (result.value) {
            
            $.ajax({
                url: '<?= Url::to(['report-damage/remove-file']) ?>',
                method: 'GET',
                data: {id:id,filename:filename},
                success: function (data) {
                    // on success do some validation or refresh the content div to display the uploaded images 
                    $("#uploadFileId").load(location.href + " #uploadFileId>*");

                }
            });

          }
        })

        

        return false;
    }

    var cleaveBlocks = new Cleave('#reportdamage-contact_officer_tel', {
        phone: true,
    });

     $(document).ready(function() {

        var equipmentDropdown = $('#reportdamage-equipment_id');
        var equipmentSerialInput = $('#reportdamage-equipment_serial');
        var selectedOptionText = equipmentDropdown.find('option:selected').text();
        var numericPart = selectedOptionText.split(' - ')[0];
        equipmentSerialInput.val(numericPart);

        equipmentDropdown.on('change', function() {
            var selectedOptionText = equipmentDropdown.find('option:selected').text();
            var numericPart = selectedOptionText.split(' - ')[0];
            equipmentSerialInput.val(numericPart);
        });
    });
    
</script>

<?php
yii\bootstrap5\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => 'modal-lg',
    //keeps from closing modal with esc key or by clicking out of the modal.
    // user must click cancel or X to close
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div id='modalContent'><div style='text-align:center'><img src='".\Yii::getAlias('@web')."/images/ajax-loader.gif'></div></div>";
yii\bootstrap5\Modal::end();
?>


