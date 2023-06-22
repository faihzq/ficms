<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReportRepair $model */

$this->title = 'Laporan Pembaikan Kerosakan: ' . $model->report_no;
$this->params['breadcrumbs'][] = ['label' => 'Laporan Pembaikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->report_no, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Kemaskini';
?>
<div class="report-repair-update">

    <?= $this->render('_form', [
        'model' => $model,
        'listReportSurvey' => $listReportSurvey,
    ]) ?>

</div>
