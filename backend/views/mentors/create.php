<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Mentors */

$this->title = 'Create Mentors';
$this->params['breadcrumbs'][] = ['label' => 'Mentors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mentors-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
