<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReportSurvey $model */

$this->title = 'Laporan Tinjauan Pakar: ' . $model->report_no;
$this->params['breadcrumbs'][] = ['label' => 'Laporan Tinjauan Pakar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->report_no, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Kemaskini';
?>
<div class="report17-survey-update">

    <?= $this->render('_form', [
        'model' => $model,
        'listReport17Defect' => $listReport17Defect,
        'listBoatStatus' => $listBoatStatus,
        'listDamageSurvey' => $listDamageSurvey,
        'listDamageCategory' => $listDamageCategory,
    ]) ?>

</div>
