<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\ReportRepair $model */

$this->title = $model->report_no;
$this->params['breadcrumbs'][] = ['label' => 'Laporan Pembaikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<link href="<?= \Yii::getAlias('@web');?>/libs/signature/css/jquery.signature.css" rel="stylesheet">
<style>
    .kbw-signature { width: 400px; height: 150px; }
</style>
<div class="report-repair-view">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Laporan Pembaikan Kerosakan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row" width="50%">No. Laporan Kerosakan</th>
                                    <td><?php echo $model->reportSurvey->reportDamage->report_no ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <?php echo $model->getAttributeLabel('report_survey_id'); ?></th>
                                    <td><?php echo $model->reportSurvey->report_no ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Hull No./FIC No</th>
                                    <td><?php echo $model->reportSurvey->reportDamage->boat->boat_name ?></td>
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
                                    <th scope="row"><?php echo $model->getAttributeLabel('service_description'); ?></th>
                                    <td><?php echo nl2br($model->service_description) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('tools_need'); ?></th>
                                    <td><?php echo nl2br($model->tools_need) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $model->getAttributeLabel('warranty_expiration_date'); ?></th>
                                    <td><?php echo date('d F Y', strtotime($model->warranty_expiration_date)) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Baki Tempoh Jaminan Bahagian/Item Yang Dibaiki</th>
                                    <td><?php echo $remainingTime ?></td>
                                </tr>
                                
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <?php if ($model->engineer_sign): ?>
            <div class="card">
                <div class="card-header align-items-center d-flex border-bottom-dashed">
                    <h4 class="card-title mb-0 flex-grow-1">Tandatangan Jurutera</h4>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div id="sign-eng"></div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row" width="50%"><?php echo $model->getAttributeLabel('engineer_name'); ?></th>
                                    <td><?php echo nl2br($model->engineer_name) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%"><?php echo $model->getAttributeLabel('engineer_sign_time'); ?></th>
                                    <td><?php echo date('d F Y', strtotime($model->engineer_sign_time)) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%"><?php echo $model->getAttributeLabel('engineer_position'); ?></th>
                                    <td><?php echo nl2br($model->engineer_position) ?></td>
                                </tr>
                            </tbody>
                        </table>
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
                        <div id="sign-com"></div>
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
                                    <th scope="row" width="50%"><?php echo $model->getAttributeLabel('commander_sign_time'); ?></th>
                                    <td><?php echo date('d F Y', strtotime($model->commander_sign_time)) ?></td>
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
            <?php endif; ?>
            <!--end card-->
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <?php $model->engineer_sign?$signName='Tandatangan Komander':$signName='Tandatangan Jurutera'; ?>
                            <?php if ($model->status_id == 2){ ?>
                                <div class="col-sm-6">
                                    <?= Html::a('<i class="mdi mdi-content-save label-icon align-middle rounded-pill"></i>Kemaskini', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-label rounded-pill btn-primary btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2 disabled']) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= Html::a('<i class="mdi mdi-file-sign label-icon align-middle rounded-pill"></i>' . $signName, ['sign', 'id' => $model->id], ['class' => 'btn btn-sm btn-label rounded-pill btn-success btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2 disabled']) ?>
                                </div>
                            <?php } else { ?>
                                <div class="col-sm-6">
                                    <?= Html::a('<i class="mdi mdi-content-save label-icon align-middle rounded-pill"></i>Kemaskini', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-label rounded-pill btn-primary btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2']) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= Html::a('<i class="mdi mdi-file-sign label-icon align-middle rounded-pill"></i>' . $signName, ['sign', 'id' => $model->id, 'section' => $model->engineer_sign ? '2' : '1'], ['class' => 'btn btn-sm btn-label rounded-pill btn-success btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2']) ?>
                                </div>
                            <?php } ?>
                            
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?= Html::a('<i class="mdi mdi-format-list-bulleted label-icon align-middle rounded-pill"></i>Senarai Laporan', ['index', 'id' => $model->id], ['class' => 'btn btn-sm btn-label rounded-pill btn-warning btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2']) ?>
                                </div>
                                <div class="col-lg-6">
                                    <?= Html::a('<i class="mdi mdi-delete label-icon align-middle rounded-pill"></i>Padam', ['delete', 'id' => $model->id], [
                                        'class' => 'btn btn-sm btn-label rounded-pill btn-danger btn-animation bg-gradient waves-effect waves-light d-grid gap-2',
                                        'data' => [
                                            'confirm' => 'Adakah anda pasti mahu memadamkan item ini?',
                                            'method' => 'post',
                                            // 'bs-toggle' => 'modal'
                                        ],
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                        <?php if (Yii::$app->user->identity->user_role_id == 1){?>
                            <div class="col-sm-12">
                                <?= Html::a('<i class="mdi mdi-printer label-icon align-middle rounded-pill"></i>Cetak', ['pdf', 'id' => $model->id], ['class' => 'btn btn-sm btn-label rounded-pill btn-secondary btn-animation bg-gradient waves-effect waves-light d-grid gap-2 mb-2', 'target' => '_blank']) ?>
                                
                                
                                
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="<?= \Yii::getAlias('@web');?>/libs/signature/js/jquery.signature.js"></script>
<script>
    var sign = $('#sign-eng').signature({ 
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

<script>
    var sign = $('#sign-com').signature({ 
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
        
        $('#sign-com').signature('enable').signature('draw', signJson1).signature('disable'); 
        $('#sign-com').removeClass('kbw-signature-disabled');  
        


    </script>
<?php endif ?>

<?php if ($model->engineer_sign): ?>
    <script>
        var signJson2 = '<?php echo $model->engineer_sign; ?>';
        
        $('#sign-eng').signature('enable').signature('draw', signJson2).signature('disable'); 
        $('#sign-eng').removeClass('kbw-signature-disabled');  
        


    </script>
<?php endif ?>