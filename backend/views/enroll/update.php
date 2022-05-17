<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Enroll */

$this->title = 'Update Enroll: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Enrolls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enroll-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
