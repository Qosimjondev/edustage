<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\EventsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div>



    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1,
        ],

    ]); ?>

        <? //= $form->field($model, 'id') 
        ?>

        
            <?= $form->field($model, 'title')->input('search')->label(false) ?>
     
        <? //= $form->field($model, 'content') 
        ?>

        <? //= $form->field($model, 'event_date') 
        ?>

        <? //= $form->field($model, 'start_time') 
        ?>

        <?php // echo $form->field($model, 'end_time') 
        ?>

        <?php // echo $form->field($model, 'place') 
        ?>

        <?php // echo $form->field($model, 'image') 
        ?>

        <?php // echo $form->field($model, 'status') 
        ?>

        <?php // echo $form->field($model, 'created_at') 
        ?>

        <!-- <div class="form-group"> -->
        <? //= Html::submitButton('Search', ['class' => 'btn btn-primary']) 
        ?>
        <? //= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) 
        ?>
        <!-- </div> -->

    <?php ActiveForm::end(); ?>

</div>