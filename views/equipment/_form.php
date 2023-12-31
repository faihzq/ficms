<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;
/** @var yii\web\View $this */
/** @var app\models\Equipment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="equipment-form">
    <div class="row">
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'no_series')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <div class="form-group">
                        <a href="<?php echo Url::to(['equipment/index']) ?>" title="Cancel" class="btn btn-label btn-warning btn-animation bg-gradient waves-effect waves-light rounded-pill"><i class="mdi mdi-format-list-bulleted label-icon align-middle rounded-pill"></i>  Senarai</a>
                        <?= Html::submitButton('<i class="mdi mdi-content-save-outline label-icon align-middle rounded-pill"></i> Simpan', ['class' => 'float-end btn btn-label btn-success btn-animation bg-gradient waves-effect waves-light rounded-pill']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>

                
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card card-height-100" id="reportList">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Senarai Peralatan</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-borderless table-centered table-nowrap mb-0">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col" data-sort="no_series">No. Siri</th>
                                    <th scope="col" data-sort="nama" class="text-truncate">Nama</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php $no=1; foreach ($modelEquipment as $list) { ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $list->no_series ?></td>
                                        <td>
                                            <a href="<?php echo Url::to(['equipment/update','id'=>$list->id]) ?>"><?= $list->name ?></a>
                                        </td>
                                    </tr>
                                <?php $no++;} ?>
                                
                                
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Maaf! Tiada hasil dijumpai</h5>
                                <p class="text-muted mb-0">Kami telah mencari lebih daripada 150+ kenalan dan kami tidak menemui sebarang
                                    kenalan untuk carian anda.</p>
                            </div>
                        </div>
                    </div><!-- end -->
                    <div class="d-flex justify-content-end mt-3">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-prev disabled" href="#">
                                    ←
                                </a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-next" href="#">
                                   →
                                </a>
                            </div>
                        </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
        
    </div>
</div>

<!-- list.js min js -->
<script src="<?= \Yii::getAlias('@web');?>/libs/list.js/list.min.js"></script>

<!--list pagination js-->
<script src="<?= \Yii::getAlias('@web');?>/libs/list.pagination.js/list.pagination.min.js"></script>

<!-- Sweet Alerts js -->
<script src="<?= \Yii::getAlias('@web');?>/libs/sweetalert2/sweetalert2.min.js"></script>

<script type="text/javascript">
    var perPage = 5;

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
                left: 1,
                right: 1
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
