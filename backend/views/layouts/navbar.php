<?php

use common\models\Contact;
use common\models\User;
use yii\helpers\Url;

$count = Contact::find()->andWhere(['status' => 0])->count();
$lasMessages = Contact::find()->andWhere(['status' => 0])->limit(3)->orderBy(['id' => SORT_DESC])->all();
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-envelope"></i>
                <span class="badge badge-danger navbar-badge"><?= $count ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <?php if ($lasMessages) : ?>
                    <?php foreach ($lasMessages as $message) : ?>
                        <a href="<?=Url::to(['/contact/view', 'id'=>$message->id])?>" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        <?= $message->fullname ?>
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm"><?= $message->shorttext ?></p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?= Yii::$app->formatter->asRelativeTime($message->created_at) ?></p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                    <?php endforeach; ?>
                    <a href="<?= Url::to(['/contact/index']) ?>" class="dropdown-item dropdown-footer">Barcha habarlar</a>
                <?php else: ?>
                    <p class="dropdown-item dropdown-footer">Hozircha habar yo'q</p>
                <?php endif; ?>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge"><?=Contact::find()->andWhere(['<', 'created_at', 'NOW() - INTERVAL 1 DAY'])->count()+User::find()->andWhere(['<', 'created_at', 'NOW() - INTERVAL 1 DAY'])->count()?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <?php if(Contact::find()->andWhere(['<', 'created_at', 'NOW() - INTERVAL 1 DAY'])->count()): ?>
                <div class="dropdown-divider"></div>
                <a href="<?=Url::to(['/contact/index'])?>" class="dropdown-item">
                    <i class="fas fa-comments mr-2"></i><?=Contact::find()->andWhere(['<', 'created_at', 'NOW() - INTERVAL 1 DAY'])->count();?> ta yangi xabarlar
                    <span class="float-right text-muted text-sm">So'ngi 1 kunda</span>
                </a>
                <?php endif; ?>
                <?php if(User::find()->andWhere(['<', 'created_at', 'NOW() - INTERVAL 1 DAY'])->count()): ?>
                <div class="dropdown-divider"></div>
                <a href="<?=Url::to(['/user/index'])?>" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i><?=User::find()->andWhere(['<', 'created_at', 'NOW() - INTERVAL 1 DAY'])->count();?> ta yangi foydalanuvchilar
                    <span class="float-right text-muted text-sm">So'ngi 1 kunda</span>
                </a>
                <?php endif; ?>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">   
                <img class="rounded-circle" width="35px" src="<?=Url::base()?>/dist/img/user2-160x160.jpg" />
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Shaxsiy kabinet
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-cogs mr-2"></i> Sozlamlar
                </a>
                <div class="dropdown-divider"></div>
                <a data-method="post" href="<?=Url::to(['/site/logout'])?>" class="dropdown-item">
                    <i class="fas fa-power-off mr-2"></i> Chiqish
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->