<?php

use yii\helpers\Url;

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?=Url::base()?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=Url::base()?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=Yii::$app->user->identity->username?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?=Url::home()?>" class="nav-link <?=(Yii::$app->controller->route=='site/index')?'active':'';?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Bosh Sahifa
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=Url::to(['/user/index'])?>" class="nav-link <?=(Yii::$app->controller->route=='user/index')?'active':'';?>">
                        <i class="nav-icon fas fa-users nav-icon"></i>
                        <p>
                            Foydalanuvchilar
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=Url::to(['/mentors/index'])?>" class="nav-link <?=(Yii::$app->controller->route=='mentors/index')?'active':'';?>">
                        <i class="nav-icon fas fa-users nav-icon"></i>
                        <p>
                            O'qituvchilar
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=Url::to(['/category/index'])?>" class="nav-link <?=(Yii::$app->controller->route=='category/index')?'active':'';?>">
                        <i class="nav-icon fas fa-folder nav-icon"></i>
                        <p>
                            Kategoriyalar
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=Url::to(['/courses/index'])?>" class="nav-link <?=(Yii::$app->controller->route=='courses/index')?'active':'';?>">
                        <i class="nav-icon fas fa-file nav-icon"></i>
                        <p>
                            Kurslar bo'limi
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=Url::to(['/course-item/index'])?>" class="nav-link <?=(Yii::$app->controller->route=='course-item/index')?'active':'';?>">
                        <i class="nav-icon fas fa-file nav-icon"></i>
                        <p>
                            Kurslar
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=Url::to(['/comment/index'])?>" class="nav-link <?=(Yii::$app->controller->route=='comment/index')?'active':'';?>">
                        <i class="nav-icon fas fa-comments nav-icon"></i>
                        <p>
                            Izohlar
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=Url::to(['/contact/index'])?>" class="nav-link <?=(Yii::$app->controller->route=='contact/index')?'active':'';?>">
                        <i class="nav-icon fas fa-comment nav-icon"></i>
                        <p>
                            Xabarlar
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="<?=Url::to(['/events/index'])?>" class="nav-link <?=(Yii::$app->controller->route=='events/index')?'active':'';?>">
                        <i class="nav-icon fas fa-calendar nav-icon"></i>
                        <p>
                            Hodisalar
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a data-method="post" href="<?=Url::to(['/gii'])?>" class="nav-link">
                        <i class="nav-icon fas fa-comment nav-icon"></i>
                        <p>
                            Gii
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
