<?php

use yii\helpers\Url;
use yii\widgets\Pjax;

?>
<!--================ Start Header Menu Area =================-->
<header class="header_area <?= Yii::$app->controller->route != 'site/index' ? 'white-header' : ''; ?>">
    <div class="main_menu">
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between" method="" action="">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here" />
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <?php if (Yii::$app->controller->route == 'site/index') : ?>
                    <a class="navbar-brand logo_h" href="<?= Url::home() ?>"><img src="img/logo.png" alt="" />
                    </a>

                <?php else : ?>
                    <a class="navbar-brand" href="<?= Url::home() ?>">
                        <img class="logo-2" src="img/logo2.png" alt="" />
                    </a>
                <?php endif; ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item <?= (Yii::$app->controller->route == 'site/index' || Yii::$app->controller->route == '') ? 'active' : ''; ?>">
                            <a class="nav-link" href="<?= Url::home() ?>"><?= Yii::t('app', 'home'); ?></a>
                        </li>
                        <li class="nav-item <?= Yii::$app->controller->route == 'site/about' ? 'active' : ''; ?>">
                            <a class="nav-link" href="<?= Url::to(['/site/about']) ?>"><?= Yii::t('app', 'about'); ?></a>
                        </li>
                        <li class="nav-item <?= Yii::$app->controller->route == 'courses/index' ? 'active' : ''; ?>">
                            <a class="nav-link" href="<?= Url::to(['/courses/index']) ?>"><?= Yii::t('app', 'courses'); ?></a>
                        </li>
                        <li class="nav-item <?= Yii::$app->controller->route == 'news/index' ? 'active' : ''; ?>">
                            <a class="nav-link" href="<?= Url::to(['/events/index']) ?>"><?= Yii::t('app', 'event'); ?></a>
                        </li>
                        <li class="nav-item <?= Yii::$app->controller->route == 'site/contact' ? 'active' : ''; ?>">
                            <a class="nav-link" href="<?= Url::to(['/site/contact']) ?>"><?= Yii::t('app', 'contact'); ?></a>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="ti-world mr-1"> </i><?= Yii::t('app', 'languages'); ?></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= Url::to(['/site/chang', 'lang' => 'en']) ?>">English</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= Url::to(['/site/chang', 'lang' => 'uz']) ?>">O'zbek tili</a>
                                </li>
                            </ul>
                        </li>
                        <?php if(Yii::$app->user->isGuest): ?>
                        <li class="nav-item <?= Yii::$app->controller->route == 'site/login' ? 'active' : ''; ?>">
                            <a class="nav-link" href="<?= Url::to(['/site/login']) ?>"><i class="ti-user mr-1"></i> <?= Yii::t('app', 'login'); ?></a>
                        </li>
                        <? else: ?>
                            <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="ti-panel mr-1"></i> <?= Yii::t('app', 'cabinet'); ?></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= Url::to(['/dashboard/site/index', 'lang' => 'en']) ?>"><i class="ti-dashboard mr-1"></i> Dashboard</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" data-method="post" href="<?= Url::to(['/site/logout']) ?>"><i class="ti-arrow-right mr-1"></i> <?= Yii::t('app', 'logout'); ?></a>
                                </li>
                            </ul>
                        </li>

                        <?php endif;?>
                        <li class="nav-item">
                            <a href="#" class="nav-link search" id="search">
                                <i class="ti-search"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================ End Header Menu Area =================-->