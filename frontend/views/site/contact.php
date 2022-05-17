<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Contact';
?>
<!--================Contact Area =================-->
<section class="contact_area section_gap">
  <div class="container">
    <div id="mapBox" class="mapBox" data-lat="40.701083" data-lon="-74.1522848" data-zoom="13" data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia." data-mlat="40.701083" data-mlon="-74.1522848"></div>
    <div class="row">
      <div class="col-lg-3">
        <div class="contact_info">
          <div class="info_item">
            <i class="ti-home"></i>
            <h6>California, United States</h6>
            <p>Santa monica bullevard</p>
          </div>
          <div class="info_item">
            <i class="ti-headphone"></i>
            <h6><a href="#">00 (440) 9865 562</a></h6>
            <p>Mon to Fri 9am to 6 pm</p>
          </div>
          <div class="info_item">
            <i class="ti-email"></i>
            <h6><a href="#">support@colorlib.com</a></h6>
            <p>Send us your query anytime!</p>
          </div>
        </div>
      </div>

      <div class="col-lg-9">
        <?php $form = ActiveForm::begin([
          'id' => 'contactForm',
          'options' => [
            'class' => 'row contact_form',
          ],
          'fieldConfig' => [
            'template' => '{input}',
            'options' => [
              'tag' => false
            ]
          ]
        ]); ?>

        <div class="col-md-6">
          <div class="form-group">
            <?= $form->field($model, 'fullname')->textInput([
              'class' => "form-control",
              'id' => "name",
              'placeholder' => "Enter your name",
              'onfocus' => "this.placeholder = ''",
              'onblur' => "this.placeholder = 'Enter your name'"
            ]) ?>
          </div>

          <div class="form-group">
            <?= $form->field($model, 'email')->input('email', [
              'class' => "form-control",
              'id' => "email",
              'placeholder' => "Enter email address",
              'onfocus' => "this.placeholder = ''",
              'onblur' => "this.placeholder = 'Enter email address'"
            ]) ?>
          </div>

          <div class="form-group">
            <?= $form->field($model, 'title')->textInput([
              'class' => "form-control",
              'id' => "subject",
              'placeholder' => "Enter Subject",
              'onfocus' => "this.placeholder = ''",
              'onblur' => "this.placeholder = 'Enter Subject'",
            ]) ?>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <?= $form->field($model, 'content')->textarea([
              'class' => "form-control",
              'id' => "subject",
              'placeholder' => "Enter Subject",
              'onfocus' => "this.placeholder = ''",
              'onblur' => "this.placeholder = 'Enter Subject'"
            ]) ?>
          </div>
        </div>
        <div class="col-md-12 text-right">
          <?=Html::submitButton('Send Message', ['class'=>"btn primary-btn"])?>
        </div>

        <?php ActiveForm::end(); ?>
      </div>
    </div>
  </div>
</section>
<!--================Contact Area =================-->

<!--================Contact Success and Error message Area =================-->
<div id="success" class="modal modal-message fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="ti-close"></i>
        </button>
        <h2>Thank you</h2>
        <p>Your message is successfully sent...</p>
      </div>
    </div>
  </div>
</div>

<!-- Modals error -->

<div id="error" class="modal modal-message fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="ti-close"></i>
        </button>
        <h2>Sorry !</h2>
        <p>Something went wrong</p>
      </div>
    </div>
  </div>
</div>
<!--================End Contact Success and Error message Area =================-->