<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\widgets\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\VarDumper;

$this->title = 'Login';
?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>Sahifasi</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
          
        <?php $form = ActiveForm::begin([
                    'id' => 'login-form', 
                    'method'=>'POST',
                    'fieldConfig' => [
                    'template'=>'{input}',
                    'options' => [
                        'tag' => false
                    ],
                ]
                ]); ?>


        <p class="<?=$model->hasErrors()?'btn btn-warning w-100':'';?> text-center"><?=$model->hasErrors()?'Login yoki parol xato!':'Kirish uchun tasdiqdan o\'ting!'?></p>
          
        <div class="input-group mb-3">
          <?= $form->field($model, 'username')->textInput(['placeholder'=>'Username', 'autocomplete'=>'off']) ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password']) ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
                <div class="col-8">
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>

                </div>
                <!-- /.col -->
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>