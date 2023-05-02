<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
$baseUrl = Url::base();
/** @var yii\web\View $this */
/** @var app\models\ReportDamage $model */

$this->title = $model->report_no;
$this->params['breadcrumbs'][] = ['label' => 'Borang Pelaporan Kerosakan DJ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<link href="<?= \Yii::getAlias('@web');?>/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<div class="report-damage-view">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Borang Pelaporan Kerosakan Dalam Jaminan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row" width="50%">
                                        <?php echo $model->getAttributeLabel('contract_no'); ?></th>
                                    <td><?php echo $model->contract_no ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('boat_id'); ?></th>
                                    <td><?php echo $model->boat->boat_name ?></td>
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
                                    <th scope="row"><?php echo $model->getAttributeLabel('damage_date'); ?></th>
                                    <td><?php echo date('d F Y', strtotime($model->damage_date)) ?></td>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('boat_location'); ?></th>
                                    <td><?php echo $model->boat_location ?></td>
                                </tr>
                                <!-- <tr class="border-bottom mt-4"><th>Butir-butir Peralatan<th></tr> -->
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('sel_no'); ?></th>
                                    <td><?php echo $model->sel_no ?></td>
                                    
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('equipment_serial'); ?></th>
                                    <td><?php echo $model->equipment_serial ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('equipment_location'); ?></th>
                                    <td><?php echo $model->equipment_location ?></td>
                                    
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('running_hours'); ?></th>
                                    <td><?php echo $model->running_hours ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('damage_information'); ?></th>
                                    <td><?php echo $model->damage_information ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <h5 class="card-title">Pegawai/anggota yang boleh dihubungi</h5>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th scope="row" width="50%"><?php echo $model->getAttributeLabel('contact_officer_name'); ?></th>
                                        <td><?php echo $model->contact_officer_name ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php echo $model->getAttributeLabel('contact_officer_tel'); ?></th>
                                        <td><?php echo $model->contact_officer_tel ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header align-items-center d-flex border-bottom-dashed">
                    <h4 class="card-title mb-0 flex-grow-1">Lampiran/Gambar</h4>
                </div>
                <div class="card-body">
                    <div class="vstack gap-2">
                        <?php for ($i=1; $i < 4; $i++) { 
                            $file = 'support_doc_'.$i; ?>
                            <?php if ($model->$file): ?>
                            <div class="border rounded border-dashed p-2">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                <i class="ri-image-2-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="fs-13 mb-1"><a href="<?php echo $baseUrl.'/uploads/reportDamage/';echo $model->$file; ?>" target="_blank" class="text-body text-truncate d-block"><?php echo $model->$file ?></a></h5>
                                        
                                    </div>
                                    <div class="flex-shrink-0 ms-2">
                                        <div class="d-flex gap-1">
                                            <a href="<?= Url::to(['report-damage/download','filename'=>$model->$file]) ?>" class="btn btn-icon text-muted btn-sm fs-18"><i class="ri-download-2-line"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
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
                                    <?= Html::a('<i class="mdi mdi-file-sign label-icon align-middle rounded-pill"></i>Tandatangan', ['sign', 'id' => $model->id], ['class' => 'btn btn-sm btn-label rounded-pill btn-success btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2']) ?>
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


<script src="<?= \Yii::getAlias('@web');?>/libs/sweetalert2/sweetalert2.min.js"></script>
