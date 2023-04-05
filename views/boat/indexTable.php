<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = 'List';
$baseUrl = Url::base();
?>

<!--datatable css-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
<!--datatable responsive css-->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<!-- Sweet Alert css-->
<link href="<?= \Yii::getAlias('@web');?>/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<div class="user-index">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">All Boats</h5>
                        <div class="flex-shrink-0">
                           <div class="d-flex flex-wrap gap-2">
                                <?= Html::a('<i class="ri-add-line label-icon align-middle rounded-pill"></i> Create Boat', ['create'], ['class' => 'btn btn-label rounded-pill btn-danger btn-animation bg-gradient waves-effect waves-light']) ?>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="alternative-pagination" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th width="3%">No</th>
                                <th >Name</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;foreach($model as $boat): ?>
                            <tr>
                                <td><?php echo $no; ?></td>

                                <td><div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-2">
                                            <?php if ($boat->image_file){ ?>
                                                <img src="<?php echo $baseUrl.'/uploads/boatImages/'; echo $boat->image_file;?>" alt="" class="avatar-xs rounded-circle" />
                                            <?php } else { ?>
                                                <img src="<?= \Yii::getAlias('@web');?>/images/nft/img-01.jpg" alt="" class="avatar-xs rounded-circle" />
                                            <?php } ?>
                                        </div>
                                        <div class="flex-grow-1"><?php echo $boat->boat_name; ?></div>
                                    </div>
                                </td>
                                <td class="text-center"><span class="badge <?php echo $boat->statusTable?> text-uppercase"><?php echo $boat->status->name; ?></span></td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a href="<?php echo Url::to(['boat/view','id'=>$boat->id]) ?>" title="" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo Url::to(['boat/update','id'=>$boat->id]) ?>" title="" class="dropdown-item"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php $no++;endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<!-- Sweet Alerts js -->
<script src="<?= \Yii::getAlias('@web');?>/libs/sweetalert2/sweetalert2.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
      let table = new DataTable('#alternative-pagination', {
          "pagingType": "full_numbers"
        });
    });
</script>