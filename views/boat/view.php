<?php
use yii\helpers\Url;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Boat $model */

$this->title = $model->boat_name;
$this->params['breadcrumbs'][] = ['label' => 'Boats', 'url' => ['index']];
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
                <div class="bg-soft-warning">
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
                                                    <img src="<?= \Yii::getAlias('@web');?>/images/companies/img-4.png" alt="" class="avatar-sm" />
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
                                            <div class="text-muted">Created Date : <span class="fw-medium " id="create-date"><?php echo date('d M, Y', strtotime($model->created_time))?></span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Updated Date : <span class="fw-medium" id="due-date"><?php echo date('d M, Y', strtotime($model->updated_time))?></span></div>
                                            <div class="vr"></div>
                                            <div class="badge rounded-pill <?php echo $model->statusLabel?> fs-12" id="ticket-status"><?php echo $model->status->name?></div>
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
                    <h5 class="card-title mb-3">Description</h5>
                    <p class="text-muted"><?php echo $model->boat_description?></p>
                </div>
                <!--end card-body-->
                <div class="card-footer p-4 border-top-dashed">
                    <h5 class="card-title mb-4">Gallery</h5>

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
                        
                            <a href="<?php echo Url::to(['boat/index']) ?>" title="Cancel" class="btn btn-label btn-warning btn-animation bg-gradient waves-effect waves-light rounded-pill"><i class="mdi mdi-keyboard-return label-icon align-middle rounded-pill"></i>  Cancel</a>
                            
                            <?= Html::a('<i class="mdi mdi-content-save label-icon align-middle rounded-pill"></i>Update', ['update', 'id' => $model->id], ['class' => 'btn btn-label btn-primary rounded-pill btn-animation bg-gradient waves-effect waves-light float-end']) ?>
                            <?= Html::a('<i class="mdi mdi-delete label-icon align-middle rounded-pill"></i>Delete', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-label btn-danger rounded-pill btn-animation bg-gradient waves-effect waves-light',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
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
                    <h5 class="card-title mb-0">General Info</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless align-middle mb-0">
                            <tbody>
                                <tr>
                                    <td class="fw-medium">Length Overall</td>
                                    <td><?php echo $model->length_overall?$model->length_overall.'m':'' ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Length Over Waterline</td>
                                    <td><?php echo $model->length_over_waterline?$model->length_over_waterline.'m':'' ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Beam Overall</td>
                                    <td><?php echo $model->beam_overall?$model->beam_overall.'m':'' ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Draft</td>
                                    <td><?php echo $model->draft?$model->draft.'m':'' ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Power</td>
                                    <td><?php echo $model->power ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Propulsion</td>
                                    <td><?php echo $model->propulsion ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Speed</td>
                                    <td><?php echo $model->speed ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Range</td>
                                    <td><?php echo $model->boat_range ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Status</td>
                                    <td>
                                        <span class="badge <?php echo $model->statusLabel?>"><?php echo $model->status->name?></span>
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
