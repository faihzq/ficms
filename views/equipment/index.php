<?php

use app\models\BoatLocation;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Senarai Peralatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-index">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="reportList">
                <div class="card-header border border-dashed border-start-0 border-end-0 border-top-0">
                    <div class="row align-items-center gy-3">
                        <div class="col-sm">
                            <h5 class="card-title mb-0">Senarai Peralatan</h5>
                        </div>
                        <div class="col-sm-auto">
                            <div class="d-flex gap-1 flex-wrap">
                                <?= Html::a('<i class="ri-add-line label-icon align-middle"></i> Peralatan Baru', ['create'], ['class' => 'btn btn-label btn-success rounded-pills btn-animation bg-gradient waves-effect waves-light']) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="row g-3">
                        <div class="col-xl-6">
                            <div class="col-lg-6 search-box">
                                <input type="text" class="form-control search" placeholder="Carian peralatan...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-card mb-3">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="sort" data-sort="no" scope="col">No</th>
                                        <th class="sort" data-sort="no_series" scope="col">No. Siri
                                        </th>
                                        <th class="sort" data-sort="nama" scope="col">Nama
                                        </th>
                                        <th scope="col">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <?php $no=1;foreach($model as $location): ?>
                                    <tr>
                                        <td class="no"><?php echo $no ?>
                                        </td>
                                        <td class="no_series"><?php echo $location->no_series ?>
                                        </td>
                                        <td class="boat_id"><?php echo $location->name ?>
                                        </td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item">
                                                    <div class="dropdown">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <?php if (Yii::$app->user->identity->user_role_id == 1 || $Yii::$app->user->identity->id == $location->requestor_id): ?>
                                                            <li><a class="dropdown-item edit-item-btn" href="<?php echo Url::to(['equipment/update','id'=>$location->id]) ?>"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    Edit</a></li>
                                                            <li><?= Html::a('Padam', ['delete', 'id' => $location->id], [
                                                                        'class' => 'dropdown-item edit-item-btn',
                                                                        'data' => [
                                                                            'confirm' => 'Adakah anda pasti mahu memadamkan peralatan ini?',
                                                                            'method' => 'post',
                                                                        ],
                                                                    ]) ?></li>        
                                                                    
                                                            <?php endif ?>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php $no++;endforeach; ?>
                                </tbody>
                            </table>
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                    </lord-icon>
                                    <h5 class="mt-2">Maaf! Tiada hasil dijumpai</h5>
                                    <p class="text-muted mb-0">Kami telah mencari lebih daripada 150+ kenalan dan kami tidak menemui sebarang
                                        kenalan untuk carian anda.</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-prev disabled" href="#">
                                    Sebelum
                                </a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-next" href="#">
                                    Seterusnya
                                </a>
                            </div>
                        </div>
                    </div>
                    

                    

                </div>
            </div>
            <!--end card-->
                
            
        </div>
    </div>
</div>

<!-- list.js min js -->
<script src="<?= \Yii::getAlias('@web');?>/libs/list.js/list.min.js"></script>

<!--list pagination js-->
<script src="<?= \Yii::getAlias('@web');?>/libs/list.pagination.js/list.pagination.min.js"></script>

<!-- Sweet Alerts js -->
<script src="<?= \Yii::getAlias('@web');?>/libs/sweetalert2/sweetalert2.min.js"></script>

<script type="text/javascript">
    var perPage = 10;

    //Table
    var options = {
        valueNames: [
            "no",
            "no_series",
            "nama",
        ],
        page: perPage,
        pagination: true,
        plugins: [
            ListPagination({
                left: 2,
                right: 2
            })
        ]
    };

    // Init list
    var contactList = new List("reportList", options).on("updated", function (list) {
        list.matchingItems.length == 0 ?
            (document.getElementsByClassName("noresult")[0].style.display = "block") :
            (document.getElementsByClassName("noresult")[0].style.display = "none");
        var isFirst = list.i == 1;
        var isLast = list.i > list.matchingItems.length - list.page;
        // make the Prev and Nex buttons disabled on first and last pages accordingly
        (document.querySelector(".pagination-prev.disabled")) ? document.querySelector(".pagination-prev.disabled").classList.remove("disabled"): '';
        (document.querySelector(".pagination-next.disabled")) ? document.querySelector(".pagination-next.disabled").classList.remove("disabled"): '';
        if (isFirst) {
            document.querySelector(".pagination-prev").classList.add("disabled");
        }
        if (isLast) {
            document.querySelector(".pagination-next").classList.add("disabled");
        }
        if (list.matchingItems.length <= perPage) {
            document.querySelector(".pagination-wrap").style.display = "none";
        } else {
            document.querySelector(".pagination-wrap").style.display = "flex";
        }

        if (list.matchingItems.length == perPage) {
            document.querySelector(".pagination.listjs-pagination").firstElementChild.children[0].click()
          }

        if (list.matchingItems.length > 0) {
            document.getElementsByClassName("noresult")[0].style.display = "none";
        } else {
            document.getElementsByClassName("noresult")[0].style.display = "block";
        }
    });

    document.querySelector(".pagination-next").addEventListener("click", function () {
        (document.querySelector(".pagination.listjs-pagination")) ? (document.querySelector(".pagination.listjs-pagination").querySelector(".active")) ?
        document.querySelector(".pagination.listjs-pagination").querySelector(".active").nextElementSibling.children[0].click(): '': '';
    });
    document.querySelector(".pagination-prev").addEventListener("click", function () {
        (document.querySelector(".pagination.listjs-pagination")) ? (document.querySelector(".pagination.listjs-pagination").querySelector(".active")) ?
        document.querySelector(".pagination.listjs-pagination").querySelector(".active").previousSibling.children[0].click(): '': '';
    });


</script>
