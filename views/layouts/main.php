<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
// $this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
// $this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
// $this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
// $this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
// $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>" data-layout="vertical" data-topbar="dark" data-sidebar-size="lg" data-sidebar="dark" data-sidebar-image="img-1" data-preloader="enable" data-layout-style="default" data-layout-mode="light" data-layout-width="fluid" data-layout-position="fixed">

    <head>
        <meta charset="utf-8" />
        <title><?= Html::encode($this->title) ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= \Yii::getAlias('@web/theme/velzon');?>/assets/images/favicon.ico">

        <!-- Head-css Start -->
        <?= $this->render('head-css.php')?>
        <!-- Head-css End -->

    </head>

    <body>
        <?php $this->beginBody() ?>
        <!-- Begin page -->
        
        <!-- Header Start -->
        <?= $this->render('header.php')?>
        <!-- Header End -->

        <!-- Navbar start -->
        <?= $this->render('nav.php')?>
        <!-- Navbar End -->
        
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?= $content ?>
                </div>
            </div>
        </div>

        <!-- Setting start -->
        <?= $this->render('setting.php')?>
        <!-- Setting End -->

        <!-- Footer start -->
        <?= $this->render('footer.php')?>
        <!-- Footer end -->

        <!-- Navbar start -->
        <?= $this->render('vendor-script.php')?>
        <!-- Navbar End -->

        <!-- apexcharts -->
        <script src="<?= \Yii::getAlias('@web/theme/velzon');?>/assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- projects js -->
        <script src="<?= \Yii::getAlias('@web/theme/velzon');?>/assets/js/pages/dashboard-projects.init.js"></script>

        <!-- App js -->
        <script src="<?= \Yii::getAlias('@web/theme/velzon');?>/assets/js/app.js"></script>
        <?php $this->endBody() ?>
        
    </body>
</html>
<?php $this->endPage() ?>
