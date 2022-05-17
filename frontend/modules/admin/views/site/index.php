<?php

use frontend\models\Courses;
use yii\helpers\StringHelper;
use yii\helpers\Url;

$this->title = 'Dashboard';
?>

<div class="container p-2">
<div class='row'>
    <?php foreach ($courses as $course) : ?>
        <?php 
            $c = Courses::findOne($course['id']);    
        ?>
        <div class='col-md-3'>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?=Url::base()?>/img/courses/<?= $course['poster']?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $course['title_'.Yii::$app->language]?></h5>

                    <p class="card-text">
                    <h6 class="h6">Course count: <?= $c->getCourseItems()->count() ?></h6>
                    <?=StringHelper::truncateWords($course['description_'.Yii::$app->language], 12)?>
                    </p>
                    <a href="<?= Url::to(['/dashboard/site/view', 'id' => $c->id]) ?>" class="btn btn-success <?=$c->getEnrolls()->andWhere(['status' => 0])->one()?'disabled':'';?>">Enrolled</a>
                </div>
            </div>
        </div>
      
    <?php endforeach; ?>
</div>
</div>