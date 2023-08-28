<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BoatLocation $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="equipment-location-form">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                
                <div class="card-body">

                    <?php $form = ActiveForm::begin(); ?>

                    <div class="mb-3">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class'=>'form-control', 'placeholder'=>'Isi nama lokasi']) ?>
                    </div>
                    
                    
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <a href="<?php echo Yii::$app->request->referrer ?: Yii::$app->homeUrl ?>" title="Cancel" class="btn btn-label btn-warning btn-animation bg-gradient waves-effect waves-light"><i class="mdi mdi-keyboard-return label-icon align-middle"></i>  Batal</a>
                        <?= Html::submitButton('<i class="mdi mdi-content-save-outline label-icon align-middle"></i> Hantar', ['class' => 'btn btn-label btn-success btn-animation bg-gradient waves-effect waves-light float-end']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            
        </div>
    </div>
    

    

    

</div>
