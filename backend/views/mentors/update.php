<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Mentors */

$this->title = 'Update Mentors: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mentors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mentors-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
