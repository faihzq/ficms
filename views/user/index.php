<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = 'Index';
?>
<!-- Sweet Alert css-->
<link href="<?= \Yii::getAlias('@web');?>/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<div class="user-index">

    <div class="row">
        <div class="col-lg-12">

            <div class="card" id="tasksList">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">All Users</h5>
                        <div class="flex-shrink-0">
                           <div class="d-flex flex-wrap gap-2">
                                <?= Html::a('<i class="ri-add-line align-bottom me-1"></i> Create User', ['create'], ['class' => 'btn btn-danger add-btn']) ?>
                                <button class="btn btn-soft-secondary" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <form>
                        <div class="row g-3">
                            <div class="col-xxl-5 col-sm-12">
                                <div class="search-box">
                                    <input type="text" class="form-control search bg-light border-light" placeholder="Search for tasks or something...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-xxl-3 col-sm-4">
                                <input type="text" class="form-control bg-light border-light" id="demo-datepicker" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" placeholder="Select date range">
                            </div>
                            <!--end col-->

                            <div class="col-xxl-3 col-sm-4">
                                <div class="input-light">
                                    <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="idStatus">
                                        <option value="">Status</option>
                                        <option value="all" selected>All</option>
                                        <option value="New">New</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Inprogress">Inprogress</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-1 col-sm-4">
                                <button type="button" class="btn btn-primary w-100" onclick="SearchData();"> <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                    Filters
                                </button>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
                <!--end card-body-->
                <div class="card-body">
                    <div class="table-responsive table-card mb-4">
                        <table class="table align-middle table-nowrap mb-0" id="tasksTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th scope="col" style="width: 40px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>

                                    <th class="sort" data-sort="id">No</th>
                                    <th class="sort" data-sort="name">Name</th>
                                    <th class="sort" data-sort="designation">Designation</th>
                                    <th class="sort" data-sort="phone_no">Phone Number</th>
                                    <th class="sort" data-sort="email">Email</th>
                                    <th class="sort" data-sort="role">Role</th>
                                    <th class="sort" data-sort="status">Status</th>
                                    <th class="sort" data-sort="actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <?php $no=1;foreach($model as $user): ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="chk_child" value="option<?php echo $no?>">
                                            </div>
                                        </th>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $user->fullname; ?></td>
                                        <td><?php echo $user->designation; ?></td>
                                        <td><?php echo $user->phone_no; ?></td>
                                        <td><?php echo $user->email; ?></td>
                                        <td><?php echo $user->userRole->name; ?></td>
                                        <td><?php echo $user->statusName; ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="<?php echo Url::to(['user/view','id'=>$user->id]) ?>" title="" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                                        </li>
                                                    <li><a href="<?php echo Url::to(['user/update','id'=>$user->id]) ?>" title="" class="dropdown-item"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn" data-bs-toggle="modal" href="#deleteOrder">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $no++;endforeach; ?>
                            </tbody>
                        </table>
                        <!--end table-->
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 200k+ tasks We did not find any tasks for you search.</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
    </div>
</div>
<!-- list.js min js -->
<script src="<?= \Yii::getAlias('@web');?>/libs/list.js/list.min.js"></script>

<!--list pagination js-->
<script src="<?= \Yii::getAlias('@web');?>/libs/list.pagination.js/list.pagination.min.js"></script>

<!-- titcket init js -->
<script src="<?= \Yii::getAlias('@web');?>/js/pages/tasks-list.init.js"></script>
<!-- Sweet Alerts js -->
<script src="<?= \Yii::getAlias('@web');?>/libs/sweetalert2/sweetalert2.min.js"></script>
