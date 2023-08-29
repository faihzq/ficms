<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Equipment $model */

$this->title = 'Daftar Peralatan';
$this->params['breadcrumbs'][] = ['label' => 'Senarai Peralatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelEquipment' => $modelEquipment,
    ]) ?>

</div>
