<?php

use backend\models\Category;
use backend\models\Mentors;
use kartik\file\FileInput;
use kartik\select2\Select2;
use kartik\switchinput\SwitchInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Courses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card card-primary card-outline">
    <div class="card-body">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row">
            <div class="col-md-6">

                <?= $form->field($model, 'mentor_id')->widget(Select2::class, [
                    'data' => ArrayHelper::map(Mentors::find()->andWhere(['status' => 1])->all(), 'id', 'fullname'),
                    'options' => ['placeholder' => 'O\'qituvchini tanlang...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false) ?>


                <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

            </div>
            <div class="col-md-6">

                <?= $form->field($model, 'category_id')->widget(Select2::class, [
                    'data' => ArrayHelper::map(Category::find()->andWhere(['status' => 1])->all(), 'id', 'title_uz'),
                    'options' => ['placeholder' => 'Katgoriyani tanlang...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false) ?>

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
        <?= $form->field($model, 'poster')->widget(FileInput::class) ?>

        <?= $form->field($model, 'status')->widget(SwitchInput::class) ?>

        <div class="form-group">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>