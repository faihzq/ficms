<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BoatLocation $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="equipment-location-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
        <?= Html::submitButton('Daftar', ['class' => 'btn btn-success float-end']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
