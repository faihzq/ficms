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
    <div class="auth-page-wrapper pt-5">

        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="<?= \Yii::getAlias('@web');?>/images/logo-ficms-light.png" alt="" height="100">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Fast Interceptor Craft Monitoring Systems (FICMS)</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Selamat Datang !</h5>
                                    <p class="text-muted">Log masuk untuk meneruskan ke FICMS.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <?php $form = ActiveForm::begin([
                                        'id' => 'login-form',
                                        // 'layout' => 'horizontal',
                                        // 'fieldConfig' => [
                                        //     'template' => "{label}\n<div>{input}</div>\n<div>{error}</div>",
                                        //     'labelOptions' => ['class' => 'control-label'],
                                        // ],
                                    ]); ?>
                                    

                                    <div class="mb-3">
                                        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>'Masukkan nama pengguna/e-mel']) ?>
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            <?= Html::a('Terlupa kata laluan?', ['site/request-password-reset'], ['class'=>'text-muted']) ?>
                                            <!-- <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a> -->
                                        </div>
                                        <label class="form-label" for="password-input">Kata Laluan</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Masukkan kata laluan anda...', 'class'=>'form-control pe-5 password-input'])->label(false) ?>
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <?= $form->field($model, 'rememberMe')->checkbox([
                                            'template' => "<div>{input} {label}</div>\n<div>{error}</div>",
                                        ]) ?>
                                    </div>

                                    <div class="mt-4">
                                        <?= Html::submitButton('Log Masuk', ['class' => 'btn btn-success w-100', 'name' => 'login-button']) ?>
                                    </div>

                                    <?php ActiveForm::end(); ?>
                                    
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <?= date('Y') ?> FICMS. Direka & bangun <i class="mdi mdi-wrench text-danger"></i> oleh Galtech (M) Sdn. Bhd.
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </footer>
        
    </div>

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

