<?php

use backend\models\Courses;
use kartik\select2\Select2;
use kartik\switchinput\SwitchInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CourseItem */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="card card-primary card-outline">
    <div class="card-body">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'course_id')->widget(Select2::class, [
            'data' => ArrayHelper::map(Courses::find()->andWhere(['status' => 1])->all(), 'id', 'title_uz'),
            'options' => ['placeholder' => 'Kursni tanlang...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label(false); ?>
        <div class="row">
            <div class="col-md-6">

                <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
            <?= $form->field($model, 'description_uz')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'tag_uz', ['inputOptions' => ['data-role' => 'tagsinput']])->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'tag_en', ['inputOptions' => ['data-role' => 'tagsinput']])->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <?= $form->field($model, 'video_link')->textInput(['maxlength' => true]) ?>


            <?= $form->field($model, 'status')->widget(SwitchInput::class) ?>

            <div class="form-group">
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
            </div>


            <?php ActiveForm::end(); ?>

        </div>
    </div>