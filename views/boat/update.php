<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Boat $model */

$this->title = 'Kemaskini Bot: ' . $model->boat_name;
$this->params['breadcrumbs'][] = ['label' => 'Bot', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->boat_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Kemaskini';
?>
<div class="boat-update">    

    <?= $this->render('_form', [
        'model' => $model,
        'listBoatStatus' => $listBoatStatus,
    ]) ?>

</div>
