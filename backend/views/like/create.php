<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Like */

$this->title = 'Create Like';
$this->params['breadcrumbs'][] = ['label' => 'Likes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="like-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
