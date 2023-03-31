<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">
    <div class="row justify-content-center">
        <div class="col-sm-9">
            <div class="card">
                
                <div class="card-body">

                    <?php $form = ActiveForm::begin(); ?>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card-title"><i class="las la-user-alt la-lg me-2"></i>Personal Detail</div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true, 'class'=>'form-control', 'placeholder'=>'Enter first name']) ?>
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true, 'class'=>'form-control', 'placeholder'=>'Enter last name']) ?>
                                </div>

                                <div class="col-sm-12 mb-3">
                                    <?= $form->field($model, 'designation')->textInput(['maxlength' => true, 'class'=>'form-control', 'placeholder'=>'Enter designation']) ?>
                                </div>

                                <div class="col-sm-12 mb-3">
                                    <?= $form->field($model, 'phone_no')->textInput(['maxlength' => true, 'class'=>'form-control', 'placeholder'=>'Enter phone no']) ?>
                                </div>
                            </div>

                        </div>

                    
                        <div class="col-sm-6">
                            <div class="card-title"><i class="las la-key la-lg me-2"></i>Access Detail</div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class'=>'form-control', 'placeholder'=>'Enter email']) ?>
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class'=>'form-control', 'placeholder'=>'Enter username', 'id'=>'usernameId']) ?>
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <?= $form->field($model, 'user_role_id')->dropDownList($listRole,['prompt'=>'Select role...']) ?>
                                </div>

                                <?php if ($model->isNewRecord): ?>
                                    <div class="col-sm-6 mb-3">
                                        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'class'=>'form-control', 'placeholder'=>'Enter password']) ?>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true, 'class'=>'form-control', 'placeholder'=>'Repeat password']) ?>
                                    </div>
                                <?php else: ?>
                                    <div class="col-sm-12 mb-3">
                                        <button type="button" class="btn btn-danger bg-gradient waves-effect waves-light float-end" value="<?php echo $model->id ?>" onclick="resetPassword(this.value)"><i class="mdi mdi-lock-reset"></i> Request Reset Password</button>
                                    </div>

                                <?php endif ?>
                            </div>
                            

                        </div>

                    </div>
                    
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <a href="<?php echo Yii::$app->request->referrer ?: Yii::$app->homeUrl ?>" title="Cancel" class="btn btn-label rounded-pill btn-warning btn-animation bg-gradient waves-effect waves-light"><i class="mdi mdi-keyboard-return label-icon align-middle rounded-pill"></i>  Cancel</a>
                        <?= Html::submitButton('<i class="mdi mdi-content-save-outline label-icon align-middle rounded-pill"></i> Submit', ['class' => 'btn btn-label rounded-pill btn-success btn-animation bg-gradient waves-effect waves-light float-end']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
