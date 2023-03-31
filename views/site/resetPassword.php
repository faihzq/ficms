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
                                        <img src="<?= \Yii::getAlias('@web');?>/images/logo-light.png" alt="" height="20">
                                    </a>
                                </div>
                                <p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card mt-4">

                                <div class="card-body p-4">
                                    <div class="text-center mt-2">
                                        <h5 class="text-primary">Create new password</h5>
                                        <p class="text-muted">Your new password must be different from previous used password.</p>
                                    </div>

                                    <div class="p-2">
                                        <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
                                            <div class="mb-3">
                                                <label class="form-label" for="password-input">Password</label>
                                                <div class="position-relative auth-pass-inputgroup">
                                                    <input type="hidden" id="password-min-length" value="<?= Yii::$app->params['user.passwordMinLength'] ?>">
                                                    <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control pe-5 password-input', 'id'=>'password-input', 'placeholder' => 'Enter password', 'pattern' => '(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}', 'required' => true])->label(false) ?>
                                                    <?= Html::button('<i class="ri-eye-fill align-middle"></i>', [
                                                        'class' => 'btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon',
                                                        'type' => 'button',
                                                        'id' => 'password-addon',
                                                    ]) ?>
                                                </div>
                                                <div id="passwordInput" class="form-text">Must be at least <?php echo Yii::$app->params['user.passwordMinLength']?> characters.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="confirm-password-input">Confirm Password</label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <?= $form->field($model, 'confirmPassword')->passwordInput(['class' => 'form-control pe-5 password-input', 'id'=>'confirm-password-input', 'onpaste' => 'return false', 'placeholder' => 'Confirm password', 'pattern' => '(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}', 'required' => true])->label(false) ?>
                                                    <?= Html::button('<i class="ri-eye-fill align-middle"></i>', [
                                                        'class' => 'btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon',
                                                        'type' => 'button',
                                                        'id' => 'confirm-password-addon',
                                                    ]) ?>
                                                </div>
                                            </div>

                                            <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                                <h5 class="fs-13">Password must contain:</h5>
                                                <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b><?php echo Yii::$app->params['user.passwordMinLength']?> characters</b></p>
                                                <p id="pass-lower" class="invalid fs-12 mb-2">At least<b>lowercase</b> letter (a-z)</p>
                                                <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                                <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                            </div>

                                            <div class="mt-4">
                                                <?= Html::submitButton('Reset Password', ['class' => 'btn btn-success w-100']) ?>
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
                                <p class="mb-0 text-muted">&copy;
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
        <!-- particles js -->
        <script src="<?= \Yii::getAlias('@web');?>/libs/particles.js/particles.js"></script>

        <!-- particles app js -->
        <script src="<?= \Yii::getAlias('@web');?>/js/pages/particles.app.js"></script>
        <!-- password-addon init -->
        <script src="<?= \Yii::getAlias('@web');?>/js/pages/passowrd-create.init.js"></script>
        <?php $this->endBody() ?>

    </body>

</html>

<?php $this->endPage() ?>

