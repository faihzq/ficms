<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BoatLocation $model */

$this->title = 'Lokasi baru';
$this->params['breadcrumbs'][] = ['label' => 'Lokasi FIC', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="boat-location-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
