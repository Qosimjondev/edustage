<?php

use backend\models\Courses;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Enroll */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="card card-primary card-outline">
    <div class="card-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'course_id')->dropDownList(ArrayHelper::map(Courses::find()->andWhere(['status'=>1])->all(), 'id', 'title_uz')) ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->andWhere(['status'=>10])->all(), 'title', 'username')) ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::class) ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
