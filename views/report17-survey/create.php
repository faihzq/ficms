<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReportSurvey $model */

$this->title = 'Laporan Tinjauan Pakar';
$this->params['breadcrumbs'][] = ['label' => 'Laporan Tinjauan Pakar', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Baru';
?>
<div class="report17-survey-create">

    <?= $this->render('_form', [
        'model' => $model,
        'listReport17Defect' => $listReport17Defect,
        'listBoatStatus' => $listBoatStatus,
        'listDamageSurvey' => $listDamageSurvey,
        'listDamageCategory' => $listDamageCategory,
    ]) ?>

</div>
