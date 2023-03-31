<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Boat $model */
/** @var yii\widgets\ActiveForm $form */
?>
<!-- dropzone css -->


<div class="boat-form">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                
                <div class="card-body">

                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                    <div class="mb-3">
                        <?= $form->field($model, 'boat_name')->textInput(['maxlength' => true, 'class'=>'form-control', 'placeholder'=>'Enter boat name']) ?>
                    </div>
                    <div>
                        <?php echo $form->field($model, 'boat_description')->textarea([
                            'id' => 'ckeditor-classic',
                            'class' => 'form-control',
                            'placeholder' => 'Enter boat description',
                        ])->label('Description'); ?>
                    </div>
                    
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab">
                                General Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#addproduct-metadata" role="tab">
                                Boat Image/Gallery
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- end card header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="mb-3">
                                        <?= $form->field($model, 'length_overall', [
                                                'template' => '{label}<div class="input-group">
                                                                        {input}
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">meter</span>
                                                                        </div>{hint}{error}
                                                                    </div>',
                                            ])->textInput(['class'=>'form-control', 'placeholder'=>'Enter length over waterline']) ?>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="mb-3">
                                        <?= $form->field($model, 'length_over_waterline', [
                                                'template' => '{label}<div class="input-group">
                                                                        {input}
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">meter</span>
                                                                        </div>{hint}{error}
                                                                    </div>',
                                            ])->textInput(['class'=>'form-control', 'placeholder'=>'Enter length over waterline']) ?>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="mb-3">
                                        <?= $form->field($model, 'beam_overall', [
                                                'template' => '{label}<div class="input-group">
                                                                        {input}
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">meter</span>
                                                                        </div>{hint}{error}
                                                                    </div>',
                                            ])->textInput(['class'=>'form-control', 'placeholder'=>'Enter beam overall']) ?>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="mb-3">
                                        <?= $form->field($model, 'draft', [
                                                'template' => '{label}<div class="input-group">
                                                                        {input}
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">meter</span>
                                                                        </div>{hint}{error}
                                                                    </div>',
                                            ])->textInput(['class'=>'form-control', 'placeholder'=>'Enter draft']) ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <?= $form->field($model, 'power')->textInput(['maxlength' => true, 'class'=>'form-control', 'placeholder'=>'Enter power']) ?>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <?= $form->field($model, 'propulsion')->textInput(['maxlength' => true, 'class'=>'form-control', 'placeholder'=>'Enter propulsion']) ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <?= $form->field($model, 'speed')->textInput(['maxlength' => true, 'class'=>'form-control', 'placeholder'=>'Enter speed']) ?>
                                    </div>
                                    <div class="mb-3">
                                        <?= $form->field($model, 'status')->dropDownList($listBoatStatus, [
                                            'class' => 'form-select',
                                            'prompt'=>'Select Status',
                                            'id' => 'boat-dropdown'
                                        ]) ?>

                                        <?= $form->field($model, 'status_id')->hiddenInput(['id' => 'status-hidden'])->label(false) ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <?= $form->field($model, 'boat_range')->textarea(['rows' => 6, 'class'=>'form-control', 'placeholder'=>'Enter range']) ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end tab-pane -->

                        <div class="tab-pane" id="addproduct-metadata" role="tabpanel">
                            
                            <div class="mb-4">
                                <h5 class="fs-13 mb-1">Boat Image</h5>
                                <p class="text-muted">Add Boat Main Image.</p>
                                <div class="text-center">
                                    <div class="position-relative d-inline-block">
                                        <div class="position-absolute top-100 start-100 translate-middle">
                                            <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                                <div class="avatar-xs">
                                                    <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                        <i class="ri-image-fill"></i>
                                                    </div>
                                                </div>
                                            </label>
                                            <?= $form->field($model, 'imageFile')->fileInput(['class'=>'form-control d-none', 'id'=>'product-image-input', 'options' => ['accept' => 'image/png']])->label(false) ?>
                                            
                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light rounded">
                                                <?php if ($model->image_file){ ?>
                                                    <?= Html::img('@web/uploads/boatImages/' . $model->image_file, ['class' => 'h-auto img-thumbnail', 'id'=>'product-img']) ?>
                                                <?php }else { ?>
                                                    <img src="" id="product-img" class="img-thumbnail h-auto" />
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h5 class="fs-13 mb-1">Boat Gallery</h5>
                                <p class="text-muted">Add Boat Gallery Images.</p>

                                <div class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="multiple">
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                        </div>

                                        <h5>Drop files here or click to upload.</h5>
                                    </div>
                                </div>

                                <ul class="list-unstyled mb-0" id="dropzone-preview">
                                    <li class="mt-2" id="dropzone-preview-list">
                                        <!-- This is used as the file preview template -->
                                        <div class="border rounded">
                                            <div class="d-flex p-2">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm bg-light rounded">
                                                        <img data-dz-thumbnail class="img-fluid rounded d-block" src="#" alt="Product-Image" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="pt-1">
                                                        <h5 class="fs-13 mb-1" data-dz-name>&nbsp;</h5>
                                                        <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                                    </div>
                                                </div>
                                                <div class="flex-shrink-0 ms-3">
                                                    <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <!-- end dropzon-preview -->
                            </div>
                            
                        </div>
                        <!-- end tab pane -->
                    </div>
                    <!-- end tab content -->
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <a href="<?php echo Yii::$app->request->referrer ?: Yii::$app->homeUrl ?>" title="Cancel" class="btn btn-label btn-warning btn-animation bg-gradient waves-effect waves-light"><i class="mdi mdi-keyboard-return label-icon align-middle"></i>  Cancel</a>
                        <?= Html::submitButton('<i class="mdi mdi-content-save-outline label-icon align-middle"></i> Submit', ['class' => 'btn btn-label btn-success btn-animation bg-gradient waves-effect waves-light float-end']) ?>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            
        </div>
        <div class="col-lg-4">
            <div class="card" id="contact-view-detail">
                <div class="card-header">
                    <h5 class="card-title mb-0">Created By</h5>
                </div>
                <div class="card-body text-center">
                    <div class="position-relative d-inline-block">
                        <img src="<?= \Yii::getAlias('@web');?>/images/users/user-dummy-img.jpg" alt="" class="avatar-lg rounded-circle img-thumbnail">
                        <span class="contact-active position-absolute rounded-circle bg-success"><span class="visually-hidden"></span>
                    </div>
                    <h5 class="mt-4 mb-1"><?php echo Yii::$app->user->identity->fullname ?><?= $form->field($model, 'updated_user_id')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?></h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td class="fw-medium" scope="row">Designation</td>
                                    <td><?php echo Yii::$app->user->identity->designation ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium" scope="row">Email</td>
                                    <td><?php echo Yii::$app->user->identity->email ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium" scope="row">Phone No</td>
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
        <!--end col-->
    </div>
</div>

<!-- ckeditor -->
<script src="<?= \Yii::getAlias('@web');?>/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<!-- dropzone js -->
<script src="<?= \Yii::getAlias('@web');?>/libs/dropzone/dropzone-min.js"></script>

<script src="<?= \Yii::getAlias('@web');?>/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<!--  -->

<script>
    //boat dropdown choices.js
    var myDropdown = document.getElementById('boat-dropdown');    
    var statusHidden = document.getElementById('status-hidden');

    var choices = new Choices(myDropdown, {
        searchEnabled: false
    });

    myDropdown.addEventListener('change', function(event) {
        statusHidden.value = event.detail.value;
    });


    // ckeditor boat description
    ClassicEditor
        .create(document.querySelector('#ckeditor-classic'), {
        })
        .then(function (editor) {
            editor.ui.view.editable.element.style.height = '200px';
        })
        .catch(function (error) {
            console.error(error);
        });

    // Dropzone
    var dropzonePreviewNode = document.querySelector("#dropzone-preview-list");
    dropzonePreviewNode.itemid = "";
    if(dropzonePreviewNode){
        var previewTemplate = dropzonePreviewNode.parentNode.innerHTML;
        dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode);
        var dropzone = new Dropzone(".dropzone", {
            url: 'https://httpbin.org/post',
            method: "post",
            previewTemplate: previewTemplate,
            previewsContainer: "#dropzone-preview",
        });
    }
    

    // Form Event
    (function () {
        'use strict'

        // product image
        document.querySelector("#product-image-input").addEventListener("change", function () {
            var preview = document.querySelector("#product-img");
            var file = document.querySelector("#product-image-input").files[0];
            var reader = new FileReader();
            reader.addEventListener("load",function () {
                preview.src = reader.result;
            },false);
            if (file) {
                reader.readAsDataURL(file);
            }
        });

    })()
</script>

