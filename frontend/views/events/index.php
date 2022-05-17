<?php

use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

$events = $dataProvider->getModels();
$this->title = Yii::t('app', 'upcoming');
Pjax::begin();
?>
<!--================Blog Area =================-->
<section class="blog_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_left_sidebar">
                    <?php foreach ($events as $event) : ?>
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <!-- <div class="post_tag">
                                        <a href="#">Food,</a>
                                        <a class="active" href="#">Technology,</a>
                                        <a href="#">Politics,</a>
                                        <a href="#">Lifestyle</a>
                                    </div> -->
                                    <ul class="blog_meta list">
                                        <li><a href="#"><?= $event['place'] ?> <i class="ti-location-pin"></i></a></li>
                                        <li><a href="#"><?= $event['event_date'] ?> <i class="ti-calendar"></i></a></li>
                                        <li><a href="#"><?= $event['start_time'] ?> | <?= $event['end_time'] ?> <i class="ti-time ml-1"></i></a></li>
                                        <li><a href="#"><?= $event['views'] ?> <?=Yii::t('app', 'views')?><i class="ti-eye ml-1"></i></a>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="img/event/<?= $event['image'] ?>" alt="">
                                    <div class="blog_details">
                                        <a href="<?=Url::to(['/events/view', 'id'=>$event['id']])?>">
                                            <h2><?= $event['title_' . Yii::$app->language] ?></h2>
                                        </a>
                                        <p>
                                            <?= StringHelper::truncateWords($event['content_' . Yii::$app->language], 20) ?>
                                        </p>
                                        <a href="<?=Url::to(['/events/view', 'id'=>$event['id']])?>" class="blog_btn"><?= Yii::t('app', 'seeevent') ?></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>

                    <nav class="blog-pagination justify-content-center d-flex">
                        <?php

                        echo \yii\bootstrap4\LinkPager::widget([
                            'pagination' => $dataProvider->pagination,
                            'prevPageLabel' => '<span aria-hidden="true">
                                    <i class="ti-angle-left"></i>
                                </span>',
                            'nextPageLabel' => '<span aria-hidden="true">
                                    <i class="ti-angle-right"></i>
                                </span>',
                            'maxButtonCount' => 5,

                        ]);

                        ?>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchpost" placeholder="Search Posts">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="ti-search"></i></button>
                            </span>
                        </div><!-- /input-group -->
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget author_widget">
                        <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                        <h4>Charlie Barber</h4>
                        <p>Senior blog writer</p>
                        <div class="social_icon">
                            <a href="#"><i class="ti-facebook"></i></a>
                            <a href="#"><i class="ti-twitter"></i></a>
                            <a href="#"><i class="ti-github"></i></a>
                            <a href="#"><i class="ti-linkedin"></i></a>
                        </div>
                        <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you
                            should have to spend money on boot camp when you can get. Boot camps have itssuppor
                            ters andits detractors.</p>
                        <div class="br"></div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
<?php Pjax::end(); ?>


<?php
$url = Yii::$app->urlManager->createUrl('/events/index');
$js = <<< JS

    $('#searchpost').keyup(function(){  
        let a = this.value;
        // send(a);
        console.log(a)
    });

    // function send(val){
    // $.ajax({
    //         url: $url,
    //         type: "POST",
    //         data: { test: val },
    //         success: function(data) {
    //              console.log(data);
    //          }
    //      }); 
    // }


    
JS;

$this->registerJs($js, View::POS_END)

?>