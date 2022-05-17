<?php

use frontend\models\Courses;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;

?>

<?php if($courses): ?>
<div class="popular_courses">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3"><?=Yii::t('app', 'popular')?></h2>
              <p>
              <?=Yii::t('app', 'populartag')?>
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single course -->
          <div class="col-lg-12">
            <div class="owl-carousel active_course">
            <?php foreach($courses as $course): ?>
                <?php 
                $c = Courses::findOne($course['id']); 
                $category = $c->getCategory()->asArray()->all()[0]['title_'.Yii::$app->language];
                $mentor = $c->getMentor()->asArray()->all()[0];
                $students = $c->getEnrolls()->count();
                $likes = $c->getLikes()->count();
                ?>
            <div class="single_course">
                <div class="course_head">
                  <img class="img-fluid" src="img/courses/<?=$course['poster']?>" alt="" />
                </div>
                <div class="course_content">
                  <!-- <span class="price">$25</span> -->
                  <span class="tag mb-4 d-inline-block"><?=$category?></span>
                  <h4 class="mb-3">
                    <a href="<?=Url::to(['/courses/view', 'id'=>$course['id']])?>"><?=$course['title_'.Yii::$app->language]?></a>
                  </h4>
                  <p>
                  <?=StringHelper::truncateWords($course['description_'.Yii::$app->language], 12)?>
                  </p>
                  <div
                    class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4"
                  >
                    <div class="authr_meta">
                    <img src="img/trainer/<?=$mentor['img']?>" alt="" style="border-radius: 50%;width:30px;height:40px;" />
                      <span class="d-inline-block ml-2"><?=$mentor['fullname']?></span>
                    </div>
                    <?php Pjax::begin()?>
                    <div class="mt-lg-0 mt-3">
                      <span class="meta_info mr-4">
                        <a href="#"> <i class="ti-user mr-2"></i><?=$students?></a>
                      </span>
                      <span class="meta_info">
                          <?=$this->render('like_button', compact('c'))?>
                    </span>
                    </div>
                    <?php Pjax::end()?>
                  </div>
                </div>
              </div>

            </div>
            <?php endforeach; ?>

            <div class="col-lg-12">
            <div class="text-center pt-lg-5 pt-3">
            <a href="<?=Url::to(['/courses/index'])?>" class="text-warning d-inline-block" style="background-color:#002347;padding:8px;padding-right:8px;padding-left:12px;">
               <?=Yii::t('app', 'coursebtn')?> <img src="img/next.png" alt="" />
              </a>
            </div>
          </div>

          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>