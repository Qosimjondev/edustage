<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-user">

    <?php $form = ActiveForm::begin(['id'=>'my-form']); ?>

    <?= $form->field($model, 'status')->dropDownList([9=>'Nofaol', 10=>'Faol', 0=>'O\'chirilgan']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Saqlash'), ['class' => 'btn btn-success', 'id'=>'modal-save']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>