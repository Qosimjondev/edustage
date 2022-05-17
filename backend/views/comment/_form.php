<?php

use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(['id'=>'my-form']); ?>


    <?= $form->field($model, 'status')->widget(SwitchInput::class) ?>


    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success', 'id'=>'modal-save']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
