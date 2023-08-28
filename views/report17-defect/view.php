<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
$baseUrl = Url::base();
/** @var yii\web\View $this */
/** @var app\models\ReportDamage $model */

$this->title = $model->report_no;
$this->params['breadcrumbs'][] = ['label' => 'Borang Pendaftaran Latern Defect (LD)', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<link href="<?= \Yii::getAlias('@web');?>/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= \Yii::getAlias('@web');?>/libs/signature/css/jquery.signature.css" rel="stylesheet">
<style>
    .kbw-signature { width: 400px; height: 150px; }
</style>
<div class="report17-defect-view">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Borang Pendaftaran Latern Defect (LD)</h4>
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
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('status_id'); ?></th>
                                    <td><span class="badge bg-soft-<?php echo $model->status->statusLabel?> text-<?php echo $model->status->statusLabel?>"><?php echo $model->status->name?></span></td>
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
                                    <th scope="row"><?php echo $model->getAttributeLabel('boat_location_id'); ?></th>
                                    <td><?php echo $model->location->name ?></td>
                                </tr>
                                <!-- <tr class="border-bottom mt-4"><th>Butir-butir Peralatan<th></tr> -->
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('sel_no'); ?></th>
                                    <td><?php echo $model->sel_no ?></td>
                                    
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('equipment_id'); ?></th>
                                    <td><?php echo $model->equipment->fullname ?></td>
                                    
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('equipment_serial'); ?></th>
                                    <td><?php echo $model->equipment_serial ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('equipment_location_id'); ?></th>
                                    <td><?php echo $model->equipmentLocation->name ?></td>
                                    
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('running_hours'); ?></th>
                                    <td><?php echo $model->running_hours.' jam' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('boat_status_id'); ?></th>
                                    <td><span class="badge <?php echo $model->boatstatus->statusLabel?>"><?php echo $model->boatstatus->name?></span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('damage_type_id'); ?></th>
                                    <td><?php echo $model->damagetype->name ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('damage_information'); ?></th>
                                    <td><?php echo nl2br($model->damage_information) ?></td>
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
                                        <td><?php echo nl2br($model->contact_officer_name) ?></td>
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
                                        <h5 class="fs-13 mb-1"><a href="<?php echo $baseUrl.'/uploads/report17Defect/';echo $model->$file; ?>" target="_blank" class="text-body text-truncate d-block"><?php echo $model->$file ?></a></h5>
                                        
                                    </div>
                                    <div class="flex-shrink-0 ms-2">
                                        <div class="d-flex gap-1">
                                            <a href="<?= Url::to(['report17-defect/download','filename'=>$model->$file]) ?>" class="btn btn-icon text-muted fs-18"><i class="ri-download-2-line"></i></a>
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
            <?php if ($model->status_id == 2): ?>
            <div class="card">
                <div class="card-header align-items-center d-flex border-bottom-dashed">
                    <h4 class="card-title mb-0 flex-grow-1">Tandatangan Komander</h4>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div id="sign"></div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row" width="50%"><?php echo $model->getAttributeLabel('commander_name'); ?></th>
                                    <td><?php echo nl2br($model->commander_name) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%"><?php echo $model->getAttributeLabel('sign_time'); ?></th>
                                    <td><?php echo date('d F Y', strtotime($model->sign_time)) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%"><?php echo $model->getAttributeLabel('commander_rank'); ?></th>
                                    <td><?php echo nl2br($model->commander_rank) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%"><?php echo $model->getAttributeLabel('commander_position'); ?></th>
                                    <td><?php echo nl2br($model->commander_position) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            <!--end card-->
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Aktiviti Terkini</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="profile-timeline">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <?php foreach($modelReportStatusLog as $log): ?>
                            <div class="accordion-item border-0">
                                <div class="accordion-header" id="headingOne">
                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-<?= $log->status->statusLabel?> rounded-circle">
                                                    <i class="<?= $log->status->statusIcon?>"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-14 mb-0"><?= $log->status->name ?> - <span class="fw-normal"><?= date('d M Y, h:iA', strtotime($log->updated_time)) ?></span></h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body ms-2 ps-5 pt-0">
                                        <h6 class="mb-1"><?= $log->updatedUser->fullname ?></h6>
                                        <p class="text-muted"><?= $log->updatedUser->userRole->name ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                        <!--end accordion-->
                    </div>
                </div>
            </div>
            <!--end card-->

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <?php if ($model->status_id == 2 || $model->status_id == 6){ ?>
                                
                                <div class="col-sm-6">
                                    <?= Html::a('<i class="mdi mdi-content-save label-icon align-middle rounded-pill"></i>Kemaskini', ['update', 'id' => $model->id], ['class' => 'btn btn-label rounded-pill btn-primary btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2 disabled']) ?>
                                </div>
                                
                                <div class="col-sm-6">
                                    <?= Html::a('<i class="mdi mdi-file-sign label-icon align-middle rounded-pill"></i>Tandatangan Komander', ['sign', 'id' => $model->id], ['class' => 'btn btn-label rounded-pill btn-success btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2 disabled']) ?>
                                </div>
                            <?php } else { ?>
                                <?php if (Yii::$app->user->identity->user_role_id == 1 || Yii::$app->user->identity->id == $model->requestor_id): ?>
                                <div class="col-sm-6">
                                    <?= Html::a('<i class="mdi mdi-content-save label-icon align-middle rounded-pill"></i>Kemaskini', ['update', 'id' => $model->id], ['class' => 'btn btn-label rounded-pill btn-primary btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2']) ?>
                                </div>
                                <?php endif; ?>
                                <?php if (Yii::$app->user->identity->user_role_id == 1): ?>
                                <div class="col-sm-6">
                                    <?= Html::a('<i class="mdi mdi-file-sign label-icon align-middle rounded-pill"></i>Tandatangan Komander', ['sign', 'id' => $model->id], ['class' => 'btn btn-label rounded-pill btn-success btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2']) ?>
                                </div>
                                <?php endif; ?>
                            <?php } ?>
                            
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?= Html::a('<i class="mdi mdi-format-list-bulleted label-icon align-middle rounded-pill"></i>Senarai Laporan', ['index', 'id' => $model->id], ['class' => 'btn btn-label rounded-pill btn-warning btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2']) ?>
                                </div>
                                <?php if (Yii::$app->user->identity->user_role_id == 1){?>
                                <div class="col-lg-6">
                                    <?= Html::a('<i class="mdi mdi-delete label-icon align-middle rounded-pill"></i>Padam', ['delete', 'id' => $model->id], [
                                        'class' => 'btn btn-label rounded-pill btn-danger btn-animation bg-gradient waves-effect waves-light d-grid gap-2',
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
                        <div class="row">
                            <div class="col-sm-6">
                                <?= Html::a('<i class="mdi mdi-printer label-icon align-middle rounded-pill"></i>Cetak', ['pdf', 'id' => $model->id], ['class' => 'btn btn-label rounded-pill btn-secondary btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2', 'target' => '_blank']) ?>
                            </div>
                            <?php if ($model->status_id != 6):?>
                            <div class="col-sm-6">
                                <?= Html::a('<i class="mdi mdi-format-color-marker-cancel label-icon align-middle rounded-pill"></i>Batal ', ['cancel', 'id' => $model->id], [
                                    'class' => 'btn btn-label rounded-pill btn-dark btn-animation bg-gradient waves-effect waves-light d-grid gap-2',
                                    'data' => [
                                        'confirm' => 'Adakah anda pasti mahu batalkan laporan ini?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>


<script src="<?= \Yii::getAlias('@web');?>/libs/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= \Yii::getAlias('@web');?>/libs/signature/js/jquery.signature.js"></script>
<script>
    var sign = $('#sign').signature({ 
    change: function(event, ui) { 
        $('#signature_data').val(sign.signature('toDataURL'));
        },
    guideline:true,
    thickness: 2
    });

    $('#clear').click(function() {
        sign.signature('clear');
    });

    // $('#sign').draggable();
</script>

<?php if ($model->commander_sign): ?>
    <script>
        var signJson1 = '<?php echo $model->commander_sign; ?>';
        
        $('#sign').signature('enable').signature('draw', signJson1).signature('disable'); 
        $('#sign').removeClass('kbw-signature-disabled');  
        


    </script>
<?php endif ?>
