<?php

use kartik\file\FileInput;
use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Mentors */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="card card-primary card-outline">
    <div class="card-body">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'job_uz')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'job_en')->textInput(['maxlength' => true]) ?>
            </div>
        </div>


        <?= $form->field($model, 'experience_uz')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'experience_en')->textarea(['rows' => 6]) ?>
        <div class="row">
            <div class="col-md-6">

                <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?>

            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'linkedin')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'pinterest')->textInput(['maxlength' => true]) ?>

            </div>

        </div>

        <?= $form->field($model, 'img')->widget(FileInput::class) ?>

        <?= $form->field($model, 'status')->widget(SwitchInput::class) ?>


        <div class="form-group">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>