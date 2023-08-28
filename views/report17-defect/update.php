<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReportDamage $model */

$this->title = 'Kemaskini Borang Pendaftaran Latern Defect (LD) : ' . $model->report_no;
$this->params['breadcrumbs'][] = ['label' => 'Pelaporan Pendaftaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->report_no, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Kemaskini';
?>
<div class="report17-defect-update">

    <?= $this->render('_form', [
        'model' => $model,
        'listBoat' => $listBoat,
        'listLocation' => $listLocation,
        'listDamageType' => $listDamageType,
        'listBoatStatus' => $listBoatStatus,
        'listEqLocation' => $listEqLocation,
        'listEquipment' => $listEquipment
    ]) ?>

</div>
