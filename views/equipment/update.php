<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Equipment $model */

$this->title = 'Kemaskini Peralatan: '.$model->no_series.' - '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Peralatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Kemaskini';
?>
<div class="equipment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelEquipment' => $modelEquipment,
    ]) ?>

</div>
