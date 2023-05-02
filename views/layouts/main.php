<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

if (!Yii::$app->user->isGuest) {
    $user = Yii::$app->user->identity;
    // Access user properties or methods here
} else {
    // Redirect the user to the login page or show an error message
    Yii::$app->getResponse()->redirect(['site/login'])->send();
    exit();
}

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>" data-layout="vertical" data-topbar="dark" data-sidebar-size="lg" data-sidebar="dark" data-sidebar-image="ficms" data-preloader="disable" data-layout-style="default" data-layout-mode="light" data-layout-width="fluid" data-layout-position="fixed">

    <head>
        <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
        <!-- JAVASCRIPT -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

        <title><?= Html::encode(Yii::$app->name) ?></title>
        <?php $this->head() ?>
    </head>

    <body>
        <?php $this->beginBody() ?>

        <!-- Begin page -->
        <div id="layout-wrapper">
            
            <!-- Top Bar Start -->
            <?= $this->render('topbar.php')?>
            <!-- Top Bar End -->
            <!-- Top Bar Start -->
            <?= $this->render('sidebar.php')?>
            <!-- Top Bar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0"><?= ($this->title) ? $this->title : '' ?></h4>

                                    <div class="page-title-right">
                                        <?php if (!empty($this->params['breadcrumbs'])): ?>
                                            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
                                        <?php endif ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                        <?= $content ?>
                    </div>
                </div>
                <!-- start navbar-custom -->
                <?= $this->render('footer.php')?>
                <!-- end navbar-custom -->
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->

        <!-- start customizer -->
        <?= $this->render('customizer.php')?>
        <!-- end customizer -->

        <?php $this->endBody() ?>
    </body>

</html>

<?php $this->endPage() ?>