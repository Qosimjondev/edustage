<?php

use yii\helpers\StringHelper;
use yii\helpers\Url;

$event = $event->toArray();

$this->title = Yii::t('app', 'upcoming');

?>
<!--================Blog Area =================-->
<section class="blog_area single-post-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img class="img-fluid" src="img/event/<?= $event['image'] ?>" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3  col-md-3">
                        <div class="blog_info text-right">
                            <ul class="blog_meta list">
                                <li><a href="#"><?= $event['place'] ?> <i class="ti-location-pin"></i></a></li>
                                <li><a href="#"><?= $event['event_date'] ?> <i class="ti-calendar"></i></a></li>
                                <li><a href="#"><?= $event['start_time'] ?> | <?= $event['end_time'] ?> <i class="ti-time ml-1"></i></a>
                                <li><a href="#"><?= $event['views'] ?> <?=Yii::t('app', 'views')?><i class="ti-eye ml-1"></i></a>
                                </li>
                            </ul>
                            <ul class="social-links">
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-github"></i></a></li>
                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 blog_details">
                        <h2><?= $event['title_' . Yii::$app->language] ?></h2>
                        <p class="excert">
                            <?=$event['content_' . Yii::$app->language]?>
                        </p>
                </div>
            </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Posts">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="ti-search"></i></button>
                            </span>
                        </div><!-- /input-group -->
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Popular Posts</h3>
                        <?php foreach($events as $e): ?>
                        <div class="media post_item">
                            <img src="img/event/<?= $e['image'] ?>" alt="post" width="70">
                            <div class="media-body">
                                <a href="<?=Url::to(['/events/view', 'id'=>$e['id']])?>">
                                    <h3><?=StringHelper::truncateWords($e['title_' . Yii::$app->language], 3)?></h3>
                                </a>
                                <p><?=Yii::$app->formatter->asRelativeTime($e['created_at']);?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->