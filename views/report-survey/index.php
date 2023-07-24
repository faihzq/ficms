<?php

use app\models\ReportSurvey;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Laporan Tinjauan Kerosakan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-survey-index">

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="reportList">
                <div class="card-header border border-dashed border-start-0 border-end-0 border-top-0">
                    <div class="row align-items-center gy-3">
                        <div class="col-sm">
                            <h5 class="card-title mb-0">Senarai Laporan</h5>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="row g-3">
                        <div class="col-xl-6">
                            <div class="col-lg-6 search-box">
                                <input type="text" class="form-control search" placeholder="Carian laporan...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <div class="col-xl-2">
                        </div>
                        <div class="col-xl-4">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div>
                                        <?= Html::dropDownList('name', null, $listStatus, ['id'=>'idStatus', 'data-choices'=>'', 'data-choices-search-false'=>'', 'data-choices-sort-false'=>'']); ?>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-sm-6">
                                    <div>
                                        <button type="button" class="btn btn-primary w-100" onclick="SearchData();"> <i class="ri-equalizer-fill me-2 align-bottom"></i>Tapis</button>
                                    </div>
                                </div>
                                <!--end col-->
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
                                        <th class="sort" data-sort="report_no" scope="col">No Laporan</th>
                                        <th scope="col">Tarikh</th>
                                        <th class="sort" data-sort="report_damage_id" scope="col">Rujukan No. Laporan Kerosakan DJ
                                        </th>
                                        <th class="sort" data-sort="warranty" scope="col">Jaminan Perlindungan
                                        </th>
                                        <th class="sort" data-sort="requestor" scope="col">Disediakan Oleh
                                        </th>
                                        <th class="sort" data-sort="status" scope="col">Status
                                        </th>
                                        <th scope="col">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <?php $no=1;foreach($model as $report): ?>
                                    <tr>
                                        <td class="no"><?php echo $no ?>
                                        </td>
                                        <td class="report_no"><?php echo $report->report_no ?></td>
                                        <td class="tarikh"><?php echo date('d F Y', strtotime($report->report_date)) ?></td>
                                        <td class="report_damage_id"><?php echo $report->reportDamage->report_no ?>
                                        </td>
                                        <td class="warranty"><?php echo $report->warrantyProtection ?>
                                        </td>
                                        <td class="requestor"><?php echo $report->requestor->fullname ?></td>
                                        <td class="status"><span class="badge badge-soft-<?php echo $report->status->statusLabel?> text-uppercase"><?php echo $report->status->name ?></td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Lihat">
                                                    <a href="<?php echo Url::to(['report-survey/view','id'=>$report->id]) ?>" class="text-muted d-inline-block">
                                                        <i class="ri-eye-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Cetak">
                                                    <a href="<?php echo Url::to(['report-survey/pdf','id'=>$report->id]) ?>" class="text-muted d-inline-block" target="_blank">
                                                        <i class="mdi mdi-printer fs-16"></i>
                                                    </a>
                                                </li>
                                                <?php if (Yii::$app->user->identity->user_role_id == 1 || $Yii::$app->user->identity->id == $report->requestor_id): ?>
                                                <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                    <a href="<?php echo Url::to(['report-survey/update','id'=>$report->id]) ?>" class="text-muted d-inline-block">
                                                        <i class="ri-pencil-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <?php endif ?>
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
            "report_no",
            "tarikh",
            "report_damage_id",
            "warranty",
            "requestor",
            "status"
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

    function SearchData() {

      var isstatus = document.getElementById("idStatus").value;

      contactList.filter(function (data) {
        matchData = new DOMParser().parseFromString(data.values().status, 'text/html');
        var status = matchData.body.firstElementChild.innerHTML;
        var statusFilter = false;

        if (status == 'Semua' || isstatus == 'Semua') {
          statusFilter = true;
        } else {
          statusFilter = status == isstatus;
        }

        if (statusFilter) {
          return statusFilter
        } else if (statusFilter == "") {
          return statusFilter
        }
      });
      contactList.update();
    }

</script>
