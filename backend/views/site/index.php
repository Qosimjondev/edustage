<?php

/* @var $this yii\web\View */

use backend\models\Category;
use backend\models\CourseItem;
use backend\models\Courses;
use backend\models\Events;
use backend\models\Mentors;
use common\models\Comment;
use common\models\Contact;
use common\models\User;
use yii\helpers\Url;

$this->title = 'Boshqaruv Paneli';
?>


    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?=User::find()->count()?></h3>

                                <p>Foydalanuvchilar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-stalker"></i>
                            </div>
                            <a href="<?=Url::to(['/user/index'])?>" class="small-box-footer">Ko'rish <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?=Mentors::find()->count()?></h3>

                                <p>O'qituvchilar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-stalker"></i>
                            </div>
                            <a href="<?=Url::to(['/mentors/index'])?>" class="small-box-footer">Ko'rish <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?=Courses::find()->count()?></h3>

                                <p>Kurslar bo'limi</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-drag"></i>
                            </div>
                            <a href="<?=Url::to(['/courses/index'])?>" class="small-box-footer">Ko'rish <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?=Contact::find()->count()?></h3>

                                <p>Xabarlar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-chatbox-working"></i>
                            </div>
                            <a href="<?=Url::to(['/contact/index'])?>" class="small-box-footer">Ko'rish <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <div class="row">

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?=Events::find()->count()?></h3>

                                <p>Hodisalar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-calendar"></i>
                            </div>
                            <a href="<?=Url::to(['/events/index'])?>" class="small-box-footer">Ko'rish <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?=Comment::find()->count()?></h3>

                                <p>Izohlar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-chatbubble-working"></i>
                            </div>
                            <a href="<?=Url::to(['/comment/index'])?>" class="small-box-footer">Ko'rish <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?=CourseItem::find()->count()?></h3>

                                <p>Kurslar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-drag"></i>
                            </div>
                            <a href="<?=Url::to(['/course-item/index'])?>" class="small-box-footer">Ko'rish <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?=Category::find()->count()?></h3>

                                <p>Kategoriyalar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-grid"></i>
                            </div>
                            <a href="<?=Url::to(['/category/index'])?>" class="small-box-footer">Ko'rish <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


