<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReportSurvey $model */

$this->title = 'Laporan Tinjauan Kerosakan DJ: ' . $model->report_no;
$this->params['breadcrumbs'][] = ['label' => 'Laporan Tinjauan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->report_no, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Kemaskini';
?>
<div class="report-survey-update">

    <?= $this->render('_form', [
        'model' => $model,
        'listReportDamage' => $listReportDamage,
    ]) ?>

</div>
