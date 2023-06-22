<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReportDamage $model */

$this->title = 'Kemaskini Borang Pelaporan Kerosakan : ' . $model->report_no;
$this->params['breadcrumbs'][] = ['label' => 'Pelaporan Kerosakan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->report_no, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Kemaskini';
?>
<div class="report-damage-update">

    <?= $this->render('_form', [
        'model' => $model,
        'listBoat' => $listBoat,
        'listLocation' => $listLocation,
    ]) ?>

</div>
