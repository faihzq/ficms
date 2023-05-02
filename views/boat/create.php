<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Boat $model */

$this->title = 'Daftar Bot';
$this->params['breadcrumbs'][] = ['label' => 'Bot', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="boat-create">

    <?= $this->render('_form', [
        'model' => $model,
        'listBoatStatus' => $listBoatStatus,
    ]) ?>

</div>
