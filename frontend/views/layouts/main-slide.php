<?php

use yii\helpers\Url;
?>
    <!--================ Start Home Banner Area =================-->
    <section class="home_banner_area">
      <div class="banner_inner">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="banner_content text-center">
                <p class="text-uppercase">
                <?= Yii::t('app', 'bestonline'); ?>
                </p>
                <h2 class="text-uppercase mt-4 mb-5">
                <?= Yii::t('app', 'onestep'); ?>
                </h2>
                <div>
                  <a href="<?=Url::to(['/courses/index'])?>" class="primary-btn ml-lg-3 ml-0"><?=Yii::t('app', 'seecourses')?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Home Banner Area =================-->
