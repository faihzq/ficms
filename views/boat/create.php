<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Boat $model */

$this->title = 'Register Boat';
$this->params['breadcrumbs'][] = ['label' => 'Boats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="boat-create">

    <?= $this->render('_form', [
        'model' => $model,
        'listBoatStatus' => $listBoatStatus,
    ]) ?>

</div>
