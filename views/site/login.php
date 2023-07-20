<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="utf-8" />
        <title><?= Html::encode(Yii::$app->name) ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <?php $this->registerCsrfMetaTags() ?>
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= \Yii::getAlias('@web');?>/images/favicon.ico">

        <!-- Layout config Js -->
        <script src="<?= \Yii::getAlias('@web');?>/js/layout.js"></script>
        <!-- Bootstrap Css -->
        <link href="<?= \Yii::getAlias('@web');?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= \Yii::getAlias('@web');?>/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?= \Yii::getAlias('@web');?>/css/app.min.css" rel="stylesheet" type="text/css" />
        <!-- custom Css-->
        <link href="<?= \Yii::getAlias('@web');?>/css/custom.min.css" rel="stylesheet" type="text/css" />

    </head>
<body>
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div class="mb-4">
                                            <a href="#" class="d-block text-center">
                                                <img src="<?= \Yii::getAlias('@web');?>/images/logo-ficms-black.png" alt="" height="100">
                                            </a>
                                            <hr>
                                        </div>
                                        <div>
                                            <h5 class="text-primary">Selamat Datang !</h5>
                                            <p class="text-muted">Log masuk untuk meneruskan ke FICMS.</p>
                                        </div>

                                        <div class="mt-4">
                                        <?php $form = ActiveForm::begin(['id'=>'login-form']); ?>

                                            <div class="mb-3">
                                                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>'Masukkan nama pengguna/e-mel']) ?>
                                            </div>

                                            <div class="mb-3">
                                                <div class="float-end">
                                                    <?= Html::a('Terlupa kata laluan?', ['site/request-password-reset'], ['class'=>'text-muted']) ?>
                                                </div>

                                                <label class="form-label" for="password-input">Kata Laluan</label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Masukkan kata laluan anda...', 'class'=>'form-control pe-5 password-input'])->label(false) ?>
                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                </div>
                                                
                                            </div>


                                            <?= $form->field($model, 'rememberMe')->checkbox([
                                            'template' => "<div>{input} {label}</div>\n<div>{error}</div>",
                                        ]) ?>

                                            <div class="mt-4">
                                                <?= Html::submitButton('Log Masuk', ['class' => 'btn btn-primary w-100', 'name' => 'login-button']) ?>
                                            </div>

                                        <?php ActiveForm::end(); ?>

                                        
                                        </div>

                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>document.write(new Date().getFullYear())</script> Gading Marine Sdn. Bhd.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->
    

    <!-- JAVASCRIPT -->
    <script src="<?= \Yii::getAlias('@web');?>/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= \Yii::getAlias('@web');?>/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= \Yii::getAlias('@web');?>/libs/node-waves/waves.min.js"></script>
    <script src="<?= \Yii::getAlias('@web');?>/libs/feather-icons/feather.min.js"></script>
    <script src="<?= \Yii::getAlias('@web');?>/js/pages/plugins/lord-icon-2.1.0.js"></script>

    <!-- particles js -->
    <script src="<?= \Yii::getAlias('@web');?>/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="<?= \Yii::getAlias('@web');?>/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="<?= \Yii::getAlias('@web');?>/js/pages/password-addon.init.js"></script>

</body>


</html>

