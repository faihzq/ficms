<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\ReportSurvey $model */

$this->title = $model->report_no;
$this->params['breadcrumbs'][] = ['label' => 'Laporan Tinjauan Kerosakan DJ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="report-survey-view">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Laporan Tinjauan Kerosakan DJ</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row" width="50%">
                                        <?php echo $model->getAttributeLabel('report_damage_id'); ?></th>
                                    <td><?php echo $model->reportDamage->report_no ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Hull No./FIC No</th>
                                    <td><?php echo $model->reportDamage->boat->boat_name ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('report_date'); ?></th>
                                    <td><?php echo date('d F Y', strtotime($model->report_date)) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row" width="50%">
                                        <?php echo $model->getAttributeLabel('report_no'); ?></th>
                                    <td><?php echo $model->report_no ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('survey_date'); ?></th>
                                    <td><?php echo date('d F Y', strtotime($model->survey_date)) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('damage_description'); ?></th>
                                    <td><?php echo $model->damage_description ?></td>
                                </tr>
                                <!-- <tr class="border-bottom mt-4"><th>Butir-butir Peralatan<th></tr> -->
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('probable_cause'); ?></th>
                                    <td><?php echo $model->probable_cause ?></td>
                                    
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('warranty_protection'); ?></th>
                                    <td><?php echo $model->warrantyProtection ?></td>
                                </tr>
                                <?php if ($model->warranty_protection == 0): ?>
                                    <tr>
                                        <th scope="row"><?php echo $model->getAttributeLabel('warranty_protection'); ?></th>
                                        <td><?php echo $model->nowarranty_protection_reason ?></td>
                                        
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('suggested_correction'); ?></th>
                                    <td><?php echo $model->suggested_correction ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('tools_need'); ?></th>
                                    <td><?php echo $model->tools_need ?></td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <!--end card-->
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <?php if ($model->status_id == 2){ ?>
                                <div class="col-sm-6">
                                    <?= Html::a('<i class="mdi mdi-content-save label-icon align-middle rounded-pill"></i>Kemaskini', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-label rounded-pill btn-primary btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2 disabled']) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= Html::a('<i class="mdi mdi-file-sign label-icon align-middle rounded-pill"></i>Tandatangan', ['sign', 'id' => $model->id], ['class' => 'btn btn-sm btn-label rounded-pill btn-success btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2 disabled']) ?>
                                </div>
                            <?php } else { ?>
                                <div class="col-sm-6">
                                    <?= Html::a('<i class="mdi mdi-content-save label-icon align-middle rounded-pill"></i>Kemaskini', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-label rounded-pill btn-primary btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2']) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= Html::a('<i class="mdi mdi-file-sign label-icon align-middle rounded-pill"></i>Tandatangan', ['sign', 'id' => $model->id, 'section' => $model->engineer_sign?'2':'1'], ['class' => 'btn btn-sm btn-label rounded-pill btn-success btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2']) ?>
                                </div>
                            <?php } ?>
                            
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?= Html::a('<i class="mdi mdi-format-list-bulleted label-icon align-middle rounded-pill"></i>Senarai Laporan', ['index', 'id' => $model->id], ['class' => 'btn btn-sm btn-label rounded-pill btn-warning btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2']) ?>
                                </div>
                                <div class="col-lg-6">
                                    <?= Html::a('<i class="mdi mdi-format-list-bulleted label-icon align-middle rounded-pill"></i>Cetak', ['pdf', 'id' => $model->id], ['class' => 'btn btn-sm btn-label rounded-pill btn-secondary btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2', 'target' => '_blank']) ?>
                                </div>
                            </div>
                        </div>
                        <?php if (Yii::$app->user->identity->user_role_id == 1){?>
                            <div class="col-sm-12">
                                <?= Html::a('<i class="mdi mdi-delete label-icon align-middle rounded-pill"></i>Padam', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-sm btn-label rounded-pill btn-danger btn-animation bg-gradient waves-effect waves-light d-grid gap-2',
                                    'data' => [
                                        'confirm' => 'Adakah anda pasti mahu memadamkan item ini?',
                                        'method' => 'post',
                                        // 'bs-toggle' => 'modal'
                                    ],
                                ]) ?>
                                
                                
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
