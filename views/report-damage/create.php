<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReportDamage $model */

$this->title = 'Borang Pelaporan Kerosakan Baru';
$this->params['breadcrumbs'][] = ['label' => 'Borang Pelaporan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-damage-create">

    <?= $this->render('_form', [
        'model' => $model,
        'listBoat' => $listBoat,
        'listLocation' => $listLocation,
        'listDamageType' => $listDamageType,
        'listBoatStatus' => $listBoatStatus,
        'listEqLocation' => $listEqLocation,
        'listEquipment' => $listEquipment,
        'encodedListEquipment' => $encodedListEquipment
    ]) ?>

</div>
