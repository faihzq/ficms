<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\assets\ResetPasswordAsset;
use app\widgets\Alert;

ResetPasswordAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <title><?= Html::encode(Yii::$app->name) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
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
                                    <a href="/" class="d-inline-block auth-logo">
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
                                        <h5 class="text-primary">Terlupa Kata Laluan?</h5>
                                        <p class="text-muted">Tetapkan semula kata laluan dengan sistem</p>

                                        <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#0ab39c" class="avatar-xl">
                                        </lord-icon>

                                    </div>

                                    <div class="alert alert-borderless alert-warning text-center mb-2 mx-2" role="alert">
                                        Masukkan e-mel anda dan arahan akan dihantar kepada anda!
                                    </div>
                                    <div class="p-2">
                                        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                                            <?= Alert::widget() ?>
                                            <div class="mb-4">
                                                <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class'=>'form-control', 'placeholder'=>'Isi e-mel anda', 'id'=>'email']) ?>
                                            </div>
                                            <div class="text-center mt-4">
                                                <?= Html::submitButton('Hantar Pautan Tetapan Semula', ['class' => 'btn btn-success w-100']) ?>
                                            </div>

                                        <?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->

                            <div class="mt-4 text-center">
                                <p class="mb-0">Wait, I remember my password... <a href="<?php echo Url::to(['site/login']) ?>" class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
                            </div>

                        </div>
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
                                <p class="mb-0 text-muted">
                                    <script>document.write(new Date().getFullYear())</script>&copy; BMIS. Design & Develop <i class="mdi mdi-wrench text-danger"></i> by Galtech (M) Sdn. Bhd.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div>
        <!-- end auth-page-wrapper -->
        <?php $this->endBody() ?>

    </body>

</html>

<?php $this->endPage() ?>

