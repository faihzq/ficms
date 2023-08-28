<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReportRepair $model */

$this->title = 'Laporan Selesai Latern Defect';
$this->params['breadcrumbs'][] = ['label' => 'Laporan Selesai Latern Defect', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Baru';
?>
<div class="report17-repair-create">

    <?= $this->render('_form', [
        'model' => $model,
        'listReport17Survey' => $listReport17Survey,
    ]) ?>

</div>
