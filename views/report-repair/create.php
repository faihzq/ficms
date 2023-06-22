<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReportRepair $model */

$this->title = 'Laporan Pembaikan Kerosakan';
$this->params['breadcrumbs'][] = ['label' => 'Laporan Pembaikan Kerosakan', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Baru';
?>
<div class="report-repair-create">

    <?= $this->render('_form', [
        'model' => $model,
        'listReportSurvey' => $listReportSurvey,
    ]) ?>

</div>
