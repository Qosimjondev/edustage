<?php

use yii\helpers\Url;
use yii\widgets\Pjax;

$course = $model->toArray();
$user_exist = $model->getEnrolls()->andWhere(['user_id'=>Yii::$app->user->identity->id, 'status'=>1])->one();
$this->title = Yii::t('app', 'coursedetails');

?>
    
    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="main_image">
                        <img class="img-fluid" src="img/courses/<?=$course['poster']?>" alt="">
                    </div>
                    <div class="content_wrapper">
                        <h4 class="title"><?=$course['title_'.Yii::$app->language]?></h4>
                        <div class="content">
                        <?=$course['description_'.Yii::$app->language]?>
                        </div>
                        <h4 class="title">Course Outline</h4>
                        <div class="content">
                            <ul class="course_list">
                              <?php foreach($model->getCourseItems()->asArray()->all() as $item): ?>
                                <li class="justify-content-between d-flex">
                                    <p><?=$item['title_'.Yii::$app->language]?></p>
                                    <?php if($user_exist): ?>
                                    <a class="primary-btn text-uppercase" href="<?= Url::to(['/course-item/index', 'courseId'=>$model->id, 'id'=>$item['id']])?>">View Details</a>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 right-contents">
                    <ul>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p><?=Yii::t('app', 'trainer')?></p>
                                <span class="or"><?=$model->mentor->fullname?></span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p><?=Yii::t('app', 'students')?> </p>
                                <span><?=$model->getEnrolls()->count()?></span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Course Tags </p>
                                <span><?=$course['tag_'.Yii::$app->language]?></span>
                            </a>
                        </li>
                    </ul>
                    <?php Pjax::begin() ?>
                               <?=$this->render('enroll', ['course'=>$model])?>
                    <?php Pjax::end() ?>
                    <h4 class="title"><?=Yii::t('app', 'reviews')?></h4>
                    <?=$this->render('_form', ['model'=>$comment, 'id'=>$model->id])?>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

