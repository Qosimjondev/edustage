<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CourseItem */

$this->title = 'Update Course Item: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Course Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="course-item-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
