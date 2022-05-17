<?php
use yii\helpers\StringHelper;

?>

<?php  if($mentors): ?>
<section class="trainer_area section_gap_top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3"><?=Yii::t('app', 'trainers')?> </h2>
              <p>
              <?=Yii::t('app', 'trainerstag')?> 
              </p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center d-flex align-items-center">
        <?php foreach($mentors as $mentor): ?>  
        <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
            <div class="thumb d-flex justify-content-sm-center">
              <img class="img-fluid" src="img/trainer/<?=$mentor['img']?>" alt="" />
            </div>
            <div class="meta-text text-sm-center">
              <h4><?=$mentor['fullname']?></h4>
              <p class="designation"><?=$mentor['job_'.Yii::$app->language]?></p>
              <div class="mb-4">
                <p>
                <?=StringHelper::truncateWords($mentor['experience_'.Yii::$app->language], 10)?>
                </p>
              </div>
              <div class="align-items-center justify-content-center d-flex">
                <a href="<?=$mentor['facebook']?>"><i class="ti-facebook"></i></a>
                <a href="<?=$mentor['twitter']?>"><i class="ti-twitter"></i></a>
                <a href="<?=$mentor['linkedin']?>"><i class="ti-linkedin"></i></a>
                <a href="<?=$mentor['pinterest']?>"><i class="ti-pinterest"></i></a>
              </div>
            </div>
          </div>
        <?php endforeach;?>
        
        <div class="col-lg-12">
            <div class="text-center pt-lg-5 pt-3">
              <a href="#" class="text-warning d-inline-block" style="background-color:#002347;padding:8px;padding-right:8px;padding-left:12px;">
                <?=Yii::t('app', 'trainersbtn')?> <img src="img/next.png" alt="" />
              </a>
            </div>
          </div>

        </div>
      </div>
    </section>

<?php  endif; ?>