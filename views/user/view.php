<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Kemaskini', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="user-view">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Maklumat peribadi</div>
                    <hr>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            [
                                  'attribute' => 'Nama',
                                  'format' => 'raw',
                                   'value' => function ($model) {
                                     return  $model->firstname.' '.$model->lastname.' ('.$model->username.')';
                                   },
                            ],
                            'designation',
                            'phone_no',
                            [
                                  'attribute' => 'Peranan',
                                  'format' => 'raw',
                                   'value' => function ($model) {
                                     return  $model->userRole->name;
                                   },
                            ],
                            'email:email',
                            [
                              'attribute' => 'status',
                              'format' => 'raw',
                               'value' => function ($model) {
                                //return '<span class="label label-default">'.$model->getStatus().'</span>';
                                 return  $model->getStatusName();
                               },
                            ],
                        ],
                    ]) ?>
                    
                </div>
                <div class="card-footer">
                    
                    <a href="<?php echo Yii::$app->request->referrer ?: Yii::$app->homeUrl ?>" title="Cancel" class="btn btn-label rounded-pill btn-warning btn-animation bg-gradient waves-effect waves-light"><i class="mdi mdi-keyboard-return label-icon align-middle rounded-pill"></i>  Batal</a>
                    <?= Html::a('<i class="mdi mdi-content-save label-icon align-middle rounded-pill"></i>Kemaskini', ['update', 'id' => $model->id], ['class' => 'btn btn-label rounded-pill btn-primary btn-animation bg-gradient waves-effect waves-light float-end']) ?>
                    <?= Html::a('<i class="mdi mdi-format-list-bulleted label-icon align-middle rounded-pill"></i>Senarai Pengguna', ['index', 'id' => $model->id], ['class' => 'btn btn-label rounded-pill btn-info btn-animation bg-gradient waves-effect waves-light']) ?>
                    <?php if (Yii::$app->user->identity->user_role_id==1 || ($model->id =! Yii::$app->user->identity->id)): ?>
                        <button type="button" class="btn btn-label rounded-pill btn-danger btn-animation bg-gradient waves-effect waves-light" id="sa-delete" data-id="<?= $model->id ?>"><i class="mdi mdi-delete label-icon align-middle rounded-pill"></i>Padam</button>
                    <?php endif ?>
                    
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Recent Activity
                    </div>
                    <hr>
                </div>
            </div>
        </div> -->
    </div>

</div>

<script type="text/javascript">
    //Warning Message
    if (document.getElementById("sa-delete"))
        document.getElementById("sa-delete").addEventListener("click", function () {
            var id = $(this).data('id'); // get the ID from the data-id attribute
            Swal.fire({
                title: "Adakah anda pasti?",
                text: "Anda tidak akan dapat mengembalikan akaun ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                cancelButtonClass: 'btn btn-danger w-xs mt-2',
                confirmButtonText: "Ya, padam!",
                buttonsStyling: false,
                showCloseButton: true
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: '<?= Url::to(['user/delete','id'=>'']) ?>'+id,
                        type: 'post',
                        success: function (data) {
                            //alert(data);
                            Swal.fire({
                                title: 'Dipadam!',
                                text: 'Pengguna ini telah dipadamkan.',
                                icon: 'success',
                                confirmButtonClass: 'btn btn-primary w-xs mt-2',
                                buttonsStyling: false
                              }).then((result) => {
                                if (result.isConfirmed) {
                                  // reload the page
                                  window.location.href = "<?php echo Url::to(['user/index']) ?>";
                                }
                              })
                        },
                        error: function() {
                          // show a SweetAlert dialog with an error message
                          Swal.fire({
                            title: 'Ralat!',
                            text: 'Ralat berlaku semasa memadamkan pengguna ini.',
                            icon: 'error',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                          })
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                    
                }
            });
        });
</script>