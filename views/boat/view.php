<?php
use yii\helpers\Url;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Boat $model */

$this->title = $model->boat_name;
$this->params['breadcrumbs'][] = ['label' => 'Bot', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$baseUrl = Url::base();
?>
<!--Swiper slider css-->
<link href="<?= \Yii::getAlias('@web');?>/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

<div class="boat-view">

    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-n4 mx-n4 mb-n5">
                <div class="bg-soft-info">
                    <div class="card-body pb-4 mb-5">
                        <div class="row">
                            <div class="col-md">
                                <div class="row align-items-center">
                                    <div class="col-md-auto">
                                        <div class="avatar-md mb-md-0 mb-4">
                                            <div class="avatar-title bg-white rounded-circle">
                                                <?php if ($model->image_file){?>
                                                    <img src="<?php echo $baseUrl.'/uploads/boatImages/'; echo $model->image_file;?>" alt="" class="avatar-sm" />
                                                <?php }else {?>
                                                    
                                                    <div class="avatar-title bg-soft-<?php echo $color= $model->imageColor;?> text-<?php echo $color?> rounded-circle">
                                                        <?php echo $model->image ?>
                                                    </div>
                                                <?php } ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-md">
                                        <h4 class="fw-semibold" id="ticket-title"><?php echo $model->boat_name ?></h4>
                                        <div class="hstack gap-3 flex-wrap">
                                            <div class="text-muted"><i class=" ri-map-pin-user-line align-bottom me-1"></i><span id="ticket-client"><?php echo $model->updatedUser->fullname?></span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Tarikh Dicipta : <span class="fw-medium " id="create-date"><?php echo date('d M, Y', strtotime($model->created_time))?></span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Tarikh Kemaskini : <span class="fw-medium" id="due-date"><?php echo date('d M, Y', strtotime($model->updated_time))?></span></div>
                                            <div class="vr"></div>
                                            <div class="badge badge-border rounded-pill <?php echo $model->getCheck($model->prop_check)?> fs-12">Propulsion</div>
                                            <div class="badge badge-border rounded-pill <?php echo $model->getCheck($model->gen_check)?> fs-12">Generation</div>
                                            <div class="badge badge-border rounded-pill <?php echo $model->getCheck($model->nav_check)?> fs-12">Navigation</div>
                                            <div class="badge badge-border rounded-pill <?php echo $model->getCheck($model->comm_check)?> fs-12">Communication</div>
                                            <div class="badge badge-border rounded-pill <?php echo $model->getCheck($model->warfare_check)?> fs-12">Warfare System</div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end col-->
                        
                        </div>
                        <!--end row-->
                    </div><!-- end card body -->
                </div>
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title mb-3">Penerangan Bot</h5>
                    <p class="text-muted"><?php echo $model->boat_description?></p>
                </div>
                <!--end card-body-->
                <div class="card-footer p-4 border-top-dashed">
                    <h5 class="card-title mb-4">Galeri</h5>

                    <div class="px-3 mx-n3">
                        <div class="col-lg-12">
                            <!-- Swiper -->
                            <div class="swiper effect-coverflow-swiper rounded pb-5">
                                <div class="swiper-wrapper">
                                    <?php foreach ($modelImages as $image) { ?>
                                        <div class="swiper-slide">
                                            <img src="<?= \Yii::getAlias('@web');?>/uploads/boatGallery/<?php echo $image->image_file?>" alt="" class="img-fluid" />
                                        </div>
                                    <?php } ?>
                                    
                                    
                                </div>
                                <div class="swiper-pagination swiper-pagination-dark"></div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    
                    <div class="card-footer mt-3">
                        
                            <a href="<?php echo Url::to(['boat/index', 'status'=>'']) ?>" title="Cancel" class="btn btn-label btn-warning btn-animation bg-gradient waves-effect waves-light rounded-pill"><i class="mdi mdi-format-list-bulleted label-icon align-middle rounded-pill"></i> Senarai</a>
                            
                            <?= Html::a('<i class="mdi mdi-square-edit-outline label-icon align-middle rounded-pill"></i>Kemaskini', ['update', 'id' => $model->id], ['class' => 'btn btn-label btn-primary rounded-pill btn-animation bg-gradient waves-effect waves-light float-end']) ?>
                            <?= Html::a('<i class="mdi mdi-delete label-icon align-middle rounded-pill"></i>Padam', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-label btn-danger rounded-pill btn-animation bg-gradient waves-effect waves-light',
                                'data' => [
                                    'confirm' => 'Adakah anda pasti mahu memadamkan item ini?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        
                    </div>
                    
                </div>
                <!-- end card body -->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Maklumat Umum</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless align-middle mb-0">
                            <tbody>
                                <tr>
                                    <td class="fw-medium"><?php echo $model->getAttributeLabel('length_overall'); ?></td>
                                    <td><?php echo $model->length_overall?$model->length_overall.'m':'' ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium"><?php echo $model->getAttributeLabel('length_over_waterline'); ?></td>
                                    <td><?php echo $model->length_over_waterline?$model->length_over_waterline.'m':'' ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium"><?php echo $model->getAttributeLabel('beam_overall'); ?></td>
                                    <td><?php echo $model->beam_overall?$model->beam_overall.'m':'' ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium"><?php echo $model->getAttributeLabel('draft'); ?></td>
                                    <td><?php echo $model->draft?$model->draft.'m':'' ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium"><?php echo $model->getAttributeLabel('power'); ?></td>
                                    <td><?php echo $model->power ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium"><?php echo $model->getAttributeLabel('propulsion'); ?></td>
                                    <td><?php echo $model->propulsion ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium"><?php echo $model->getAttributeLabel('speed'); ?></td>
                                    <td><?php echo $model->speed ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium"><?php echo $model->getAttributeLabel('boat_range'); ?></td>
                                    <td><?php echo nl2br($model->boat_range) ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium"><?php echo $model->getAttributeLabel('boat_status_id'); ?></td>
                                    <td>
                                        <span class="badge <?php echo $model->status->statusLabel?>"><?php echo $model->status->name?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end card-body-->
            </div>
        </div>
        <!--end col-->
        
        </div>
    </div>
    <!--end row-->
</div>

<!--Swiper slider js-->
<script src="<?= \Yii::getAlias('@web');?>/libs/swiper/swiper-bundle.min.js"></script>

<!-- swiper.init js -->
<script src="<?= \Yii::getAlias('@web');?>/js/pages/swiper.init.js"></script>
