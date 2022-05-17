<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;

?>

<div class="row">
    <div class="col-sm-8">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?=$courseItem->getVideolink()?>?rel=0" allowfullscreen></iframe>
        </div>
        <h6 class="mt-2"><?=$courseItem->toArray()['title_'.Yii::$app->language]?></h6>
        <div class="d-flex justify-content-between align-items-center">
            <div>
            <p><?=Yii::$app->formatter->asDate($courseItem->created_at)?></p>
            </div>
            
        </div>
        <div>
            <?php echo Html::encode($courseItem->toArray()['description_'.Yii::$app->language])?>
        </div>
    </div>
    <div class="col-sm-4">
        <?php foreach($courseItems as $key=>$similarVideo):?>

                <div class="media">

                        <div class="embed-responsive embed-responsive-16by9 mr-2" style="width: 180px;">
                        <iframe class="embed-responsive-item" src="<?=$courseItem->getVideolink()?>?rel=0" allowfullscreen></iframe>
                        </div>
                    <div class="media-body">
                    <a href="<?= Url::to(['/course-item/index', 'courseId'=>$similarVideo->course_id, 'id'=>$similarVideo->id])?>">                 
                        <h6 class="mt-0"><?=$similarVideo->toArray()['title_'.Yii::$app->language]?></h6>
                    </a>

                        <div class="d-flex ">

                        <div class="text-muted">
                            <p><?=Yii::$app->formatter->asRelativeTime($similarVideo->created_at)?></p>
                        </div>
                            
                        </div>
                    </div>
                </div>
                <?php if($key==0):?>
                    <hr>
                <?php endif;?>
        <?php endforeach;?>
    </div>
</div>