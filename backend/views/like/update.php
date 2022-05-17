<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Like */

$this->title = 'Update Like: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Likes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="like-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
