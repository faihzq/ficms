<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Boat $model */

$this->title = 'Update Boat: ' . $model->boat_name;
$this->params['breadcrumbs'][] = ['label' => 'Boats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->boat_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="boat-update">    

    <?= $this->render('_form', [
        'model' => $model,
        'listBoatStatus' => $listBoatStatus,
    ]) ?>

</div>
