<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CourseItem */

$this->title = 'Create Course Item';
$this->params['breadcrumbs'][] = ['label' => 'Course Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-item-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
