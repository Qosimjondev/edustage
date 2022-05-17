<?php

use frontend\models\CourseItem;
use yii\bootstrap4\Html;
use yii\helpers\Url;
$link = CourseItem::findOne($courseItem['id']);
?>

<div class="card mt-2">
<div class="container">
<div class="row p-3">
    <div class="col-sm-8">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?=$link->videolink?>?rel=0" allowfullscreen></iframe>
        </div>
        <h6 class="mt-2"><?=$courseItem['title_'.Yii::$app->language]?></h6>
        <div class="d-flex justify-content-between align-items-center">
            <div>
            <p><?=Yii::$app->formatter->asDate($link->created_at)?></p>
            </div>
            
        </div>
        <div>
            <?php echo Html::encode($courseItem['description_'.Yii::$app->language])?>
        </div>
    </div>
    <div class="col-sm-4">
        <?php foreach($courseItems as $key=>$similarVideo):?>
            <?php 
                $s = CourseItem::findOne($similarVideo['id']);

            ?>
                <div class="media">

                        <div class="embed-responsive embed-responsive-16by9 mr-2" style="width: 180px;">
                        <iframe class="embed-responsive-item" src="<?=$s->videolink?>?rel=0" allowfullscreen></iframe>
                        </div>
                    <div class="media-body">
                    <a href="<?= Url::to(['/dashboard/site/view', 'id'=>$s->course_id, 'item'=>$s->id])?>">                 
                        <h6 class="mt-0"><?=$similarVideo['title_'.Yii::$app->language]?></h6>
                    </a>

                        <div class="d-flex ">

                        <div class="text-muted">
                            <p><?=Yii::$app->formatter->asRelativeTime($s->created_at)?></p>
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
</div>
</div>