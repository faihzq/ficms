<?php use yii\helpers\Url; ?>
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="<?=Yii::$app->homeUrl;?>" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?= \Yii::getAlias('@web');?>/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?= \Yii::getAlias('@web');?>/images/logo-ficms-black.png" alt="" height="60">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="<?=Yii::$app->homeUrl;?>" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?= \Yii::getAlias('@web');?>/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?= \Yii::getAlias('@web');?>/images/logo-ficms-light.png" alt="" height="60">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo Url::to(['site/index']) ?>">
                        <i class="bx bxs-dashboard"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarBoats" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarBoats">
                        <i class="bx bxs-ship"></i> <span data-key="t-boat">Bot</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarBoats">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo Url::to(['boat/create']) ?>" class="nav-link" data-key="t-boatCreate"> Daftar Bot </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo Url::to(['boat/index']) ?>" class="nav-link" data-key="t-boatList"> Senarai Bot </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Boat Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarReport" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarReport">
                        <i class="bx bxs-report"></i> <span data-key="t-report">Laporan</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarReport">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarLaporan" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLaporan" data-key="t-level-1.2"> Borang Pelaporan Kerosakan DJ
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarLaporan">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo Url::to(['report-damage/index']) ?>" class="nav-link" data-key="t-boatIndex"> Senarai Laporan </a>
                                            <a href="<?php echo Url::to(['report-damage/create']) ?>" class="nav-link" data-key="t-boatCreate"> Laporan Baru </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarSurvey" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSurvey" data-key="t-level-1.2"> Laporan Tinjauan Kerosakan DJ
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSurvey">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo Url::to(['report-survey/index']) ?>" class="nav-link" data-key="t-boatIndex"> Senarai Laporan </a>
                                            <a href="<?php echo Url::to(['report-survey/create']) ?>" class="nav-link" data-key="t-boatCreate"> Laporan Baru </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarRepair" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarRepair" data-key="t-level-1.2"> Laporan Pembaikan Kerosakan DJ
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarRepair">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo Url::to(['report-repair/index']) ?>" class="nav-link" data-key="t-boatIndex"> Senarai Laporan </a>
                                            <a href="<?php echo Url::to(['report-repair/create']) ?>" class="nav-link" data-key="t-boatCreate"> Laporan Baru </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Report Menu -->
                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Pentadbiran</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo Url::to(['user/index']) ?>">
                        <i class="bx bx-user-circle"></i> <span data-key="t-users">Pengguna</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>