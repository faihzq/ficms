<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\EquipmentLocation $model */

$this->title = 'Kemaskini Lokasi Peralatan: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Lokasi Peralatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Kemaskin';
?>
<div class="equipment-location-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
