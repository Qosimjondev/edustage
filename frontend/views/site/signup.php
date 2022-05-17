<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::t('app', 'register');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

<div class="row mt-5 mb-5">
    <div class="col-lg-4"></div>
    <div class="col-lg-5">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <p class="text-center"><?=Yii::t('app', 'loginq')?> <a href="<?=Url::to(['/site/login'])?>"><?=Yii::t('app', 'login')?></a></p>

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton($this->title, ['class' => 'btn btn-primary w-100', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
