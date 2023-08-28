<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReportRepair $model */

$this->title = 'Laporan Selesai Latern Defect: ' . $model->report_no;
$this->params['breadcrumbs'][] = ['label' => 'Laporan Selesai Latern Defect', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->report_no, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Kemaskini';
?>
<div class="report17-repair-update">

    <?= $this->render('_form', [
        'model' => $model,
        'listReport17Survey' => $listReport17Survey,
    ]) ?>

</div>
