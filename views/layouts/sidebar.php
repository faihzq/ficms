<?php 

use yii\helpers\Url; 
use app\models\ReportDamage;
use app\models\ReportSurvey;
use app\models\ReportRepair;
$damageCounter = ReportDamage::getTaskCounter();
$surveyCounter = ReportSurvey::getTaskCounter();
$repairCounter = ReportRepair::getTaskCounter();
$total = $damageCounter + $surveyCounter + $repairCounter;
?>
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
                    <a class="nav-link menu-link" href="<?= Url::to(['site/index']) ?>">
                        <i class="bx bxs-dashboard"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <?php if (Yii::$app->user->identity->user_role_id != 5): ?>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarReport" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarReport">
                        <i class="bx bxs-report"></i> <span data-key="t-report">Laporan <?php if ($total > 0): ?><span class="badge rounded-pill text-bg-danger"><?= $total;?></span><?php endif; ?></span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarReport">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarLaporan" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLaporan" data-key="t-level-1.2"> Borang Pelaporan Kerosakan (Borang 15A)
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarLaporan">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?= Url::to(['report-damage/index']) ?>" class="nav-link" data-key="t-boatIndex"> Senarai Laporan </a>
                                            <a href="<?= Url::to(['report-damage/create']) ?>" class="nav-link" data-key="t-boatCreate"> Laporan Baru </a>
                                            <?php if (Yii::$app->user->identity->user_role_id == 1): ?>
                                            <a href="<?= Url::to(['report-damage/task']) ?>" class="nav-link" data-key="t-boatCreate"> Tindakan <?php if ($damageCounter > 0): ?><span class="badge rounded-pill text-bg-danger"><?= $damageCounter;?></span><?php endif; ?></a>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarSurvey" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSurvey" data-key="t-level-1.2"> Laporan Tinjauan Kerosakan (Borang 15B)
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSurvey">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?= Url::to(['report-survey/index']) ?>" class="nav-link" data-key="t-boatIndex"> Senarai Laporan </a>
                                            <?php if (Yii::$app->user->identity->user_role_id == 1): ?>
                                            <a href="<?= Url::to(['report-survey/task']) ?>" class="nav-link" data-key="t-boatCreate"> Tindakan <?php if ($surveyCounter > 0): ?><span class="badge rounded-pill text-bg-danger"><?= $surveyCounter;?></span><?php endif; ?></a>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarRepair" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarRepair" data-key="t-level-1.2"> Laporan Pembaikan Kerosakan (Borang 15C)
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarRepair">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?= Url::to(['report-repair/index']) ?>" class="nav-link" data-key="t-boatIndex"> Senarai Laporan </a>                                            
                                            <?php if (Yii::$app->user->identity->user_role_id == 1 || Yii::$app->user->identity->user_role_id == 4): ?>
                                            <a href="<?= Url::to(['report-repair/task']) ?>" class="nav-link" data-key="t-boatCreate"> Tindakan <?php if ($repairCounter > 0): ?><span class="badge rounded-pill text-bg-danger"><?= $repairCounter;?></span><?php endif; ?></a>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Report Menu -->
                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Pentadbiran</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= Url::to(['user/index']) ?>">
                        <i class="bx bx-user-circle"></i> <span data-key="t-users">Pengguna</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarBoats" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarBoats">
                        <i class="bx bxs-ship"></i> <span data-key="t-boat">Bot</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarBoats">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= Url::to(['boat/create']) ?>" class="nav-link"> Daftar Bot </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= Url::to(['boat/index', 'status'=>'']) ?>" class="nav-link" data-key="t-boatList"> Senarai Bot </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Boat Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= Url::to(['boat-location/index']) ?>">
                        <i class="bx bx-location-plus"></i> <span data-key="t-users">Lokasi FIC</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <?php endif; ?>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>