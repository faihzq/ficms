<?php use yii\helpers\Url; ?>
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="<?php echo Url::to(['site/index']) ?>" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?= \Yii::getAlias('@web');?>/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?= \Yii::getAlias('@web');?>/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="<?php echo Url::to(['site/index']) ?>" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?= \Yii::getAlias('@web');?>/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?= \Yii::getAlias('@web');?>/images/logo-light.png" alt="" height="17">
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
                        <i class="bx bxs-dashboard"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarBoats" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarBoats">
                        <i class="bx bxs-ship"></i> <span data-key="t-boat">Boats</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarBoats">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo Url::to(['boat/create']) ?>" class="nav-link" data-key="t-boatCreate"> New Boat </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo Url::to(['boat/index']) ?>" class="nav-link" data-key="t-boatList"> Boats List </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Administration</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo Url::to(['user/index']) ?>">
                        <i class="bx bx-user-circle"></i> <span data-key="t-users">Users</span>
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