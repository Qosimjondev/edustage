<?php

use yii\helpers\Url;
?>
<?php if (!$course->getEnrolls()->andWhere(['user_id' => Yii::$app->user->id])->count()) : ?>
    <a href="<?= Url::to(['/courses/enroll', 'id' => $course->id]) ?>" data-method="post" data-pjax="1" class="primary-btn2 text-uppercase enroll rounded-0 text-white"><?=Yii::t('app', 'enrollbtn')?></a>
<?php else : ?>
    <a href="<?= Url::to(['/course-item/view', 'id' => $course->id]) ?>" class="btn btn-success text-uppercase enroll rounded-0 text-white <?=$course->getEnrolls()->andWhere(['status' => 0])->count()?'disabled':'';?>"><?=Yii::t('app', 'enrollbtn1')?></a>
<?php endif; ?>

                    