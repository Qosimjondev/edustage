<?php

use frontend\models\Courses;
use yii\bootstrap4\LinkPager;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = 'Barcha kurslar';
$courses = $dataProvider->getModels();
?>
<?php if($courses): ?>
 
<div class="popular_courses mt-5">
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
                $category = $course->getCategory()->asArray()->one()['title_'.Yii::$app->language];
                $mentor = $course->getMentor()->asArray()->one();
                $students = $course->getEnrolls()->count();
                $c = $course;
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
                <?=LinkPager::widget(['pagination'=>$dataProvider->pagination])?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>