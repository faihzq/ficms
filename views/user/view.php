<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-6">
                        <div class="card-title">Personal Details</div>
                        <hr>
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'id',
                                'username',
                                'firstname',
                                'lastname',
                                'designation',
                                'phone_no',
                                'user_role_id',
                                'auth_key',
                                'password_hash',
                                'password_reset_token',
                                'email:email',
                                'verification_token',
                                'status',
                                'created_at',
                                'updated_at',
                            ],
                        ]) ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="card-title">Access Detail</div>
                        <hr>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary float-end']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Recent Activity
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

</div>
