<?php

use kartik\date\DatePicker;
use kartik\file\FileInput;
use kartik\switchinput\SwitchInput;
use kartik\time\TimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Events */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card card-primary card-outline">
    <div class="card-body">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


        <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'content_en')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'content_uz')->textarea(['rows' => 6]) ?>

        <div class="row">
            <div class="col-4">
                <?= $form->field($model, 'event_date')->widget(DatePicker::class, [
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]) ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'start_time')->widget(TimePicker::class, [
                    'pluginOptions' => [
                        'showSeconds' => false,
                        'showMeridian' => false,
                        'minuteStep' => 5,
                    ]
                ]) ?>
            </div>
            <div class="col-4">

                <?= $form->field($model, 'end_time')->widget(TimePicker::class, [
                    'pluginOptions' => [
                        'showSeconds' => false,
                        'showMeridian' => false,
                        'minuteStep' => 5,
                    ]
                ]) ?>
            </div>
        </div>
        <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'image')->widget(FileInput::class) ?>

        <?= $form->field($model, 'status')->widget(SwitchInput::class) ?>

        <div class="form-group">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success', 'id'=>'save']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>


