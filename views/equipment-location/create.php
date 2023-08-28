<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\EquipmentLocation $model */

$this->title = 'Lokasi baru';
$this->params['breadcrumbs'][] = ['label' => 'Lokasi Peralatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-location-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
