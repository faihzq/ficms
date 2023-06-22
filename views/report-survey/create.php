<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReportSurvey $model */

$this->title = 'Laporan Tinjauan Kerosakan';
$this->params['breadcrumbs'][] = ['label' => 'Laporan Tinjauan', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Baru';
?>
<div class="report-survey-create">

    <?= $this->render('_form', [
        'model' => $model,
        'listReportDamage' => $listReportDamage,
        'listBoatStatus' => $listBoatStatus,
    ]) ?>

</div>
