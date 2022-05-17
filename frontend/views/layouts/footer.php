<?php

use yii\helpers\Url;
?>
<!--================ Start footer Area  =================-->
<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4><?=Yii::t('app', 'quicklinks')?></h4>
                <ul>
                    <li>
                            <a class="" href="<?= Url::home() ?>"><?= Yii::t('app', 'home'); ?></a>
                        </li>
                        <li>
                            <a class="" href="<?= Url::to(['/site/about']) ?>"><?= Yii::t('app', 'about'); ?></a>
                        </li>
                        <li>
                            <a class="" href="<?= Url::to(['/courses/index']) ?>"><?= Yii::t('app', 'courses'); ?></a>
                        </li>
                        <li>
                            <a class="" href="<?= Url::to(['/events/index']) ?>"><?= Yii::t('app', 'event'); ?></a>
                        </li>
                        <li>
                            <a class="" href="<?= Url::to(['/site/contact']) ?>"><?= Yii::t('app', 'contact'); ?></a>
                        </li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                
            </div>
            <div class="col-lg-4 col-md-6 single-footer-widget">
                
            </div>
        </div>
        <div class="row footer-bottom d-flex justify-content-between">
            <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                <?=Yii::t('app', 'copright')?>
            </p>
            <div class="col-lg-4 col-sm-12 footer-social">
                <a href="#"><i class="ti-facebook"></i></a>
                <a href="#"><i class="ti-twitter"></i></a>
                <a href="#"><i class="ti-dribbble"></i></a>
                <a href="#"><i class="ti-linkedin"></i></a>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->