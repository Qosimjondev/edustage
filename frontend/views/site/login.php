<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::t('app', 'login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <div class="row mt-5 mb-5">
        <div class="col-lg-4"></div>
        <div class="col-lg-5">
            <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

            <p class="text-center"><?=Yii::t('app', 'registerq')?> <a href="<?=Url::to(['/site/signup'])?>"><?=Yii::t('app', 'register')?></a></p>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div style="color:#999;margin:1em 0">
                <?=Yii::t('app', 'forgot')?> <?= Html::a(Yii::t('app', 'reset'), ['site/request-password-reset']) ?>.
                <br>
                <?=Yii::t('app', 'verify')?> <?= Html::a(Yii::t('app', 'resend'), ['site/resend-verification-email']) ?>.
            </div>

            <div class="form-group">
                <?= Html::submitButton($this->title, ['class' => 'btn btn-primary w-100', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>