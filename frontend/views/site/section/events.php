<?php 

use yii\helpers\StringHelper;
use yii\helpers\Url;

?>
<?php if($events): ?>
<div class="events_area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3 text-white"><?=Yii::t('app', 'upcoming')?></h2>
              <p>
              <?=Yii::t('app', 'upcomingtag')?>
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <?php foreach($events as $event): ?>
          <div class="col-lg-6 col-md-6">
            <div class="single_event position-relative">
              <div class="event_thumb">
                <img src="img/event/<?=$event['image']?>" alt="" />
              </div>
              <div class="event_details">
                <div class="d-flex mb-4">
                  <div class="date"><?=$event['event_date']?></div>

                  <div class="time-location">
                    <p>
                      <span class="ti-time mr-2"></span><?=$event['start_time']?> <?=$event['end_time']?>
                    </p>
                    <p>
                      <span class="ti-location-pin mr-2"></span> <?=$event['place']?>
                    </p>
                  </div>
                </div>
                <p>
                  <?=StringHelper::truncateWords($event['content_'.Yii::$app->language], 10)?>
                </p>
                <a href="<?=Url::to(['/events/view', 'id'=>$event['id']])?>" class="primary-btn rounded-0 mt-3"><?=Yii::t('app', 'seeevent')?></a>
              </div>
            </div>
          </div>

          <?php endforeach;?>


          <div class="col-lg-12">
            <div class="text-center pt-lg-5 pt-3">
              <a href="<?=Url::to(['/events/index'])?>" class="event-link">
              <?=Yii::t('app', 'seeevents')?> <img src="img/next.png" alt="" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php endif; ?>
