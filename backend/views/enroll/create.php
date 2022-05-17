<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Enroll */

$this->title = 'Create Enroll';
$this->params['breadcrumbs'][] = ['label' => 'Enrolls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enroll-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
