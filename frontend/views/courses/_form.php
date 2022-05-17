<?php

use common\models\Comment;
use kartik\rating\StarRating;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */
/* @var $form ActiveForm */

$comments = Comment::find()->andWhere(['status'=>1])->all();
?>
<div class="content">
<?php $form = ActiveForm::begin([
    'action'=>['/courses/form-save'],
    'options'=>[  
    'class'=>'comment-form',
    'fieldConfig'=>[
        'tag'=>false
        ]
    ]
]); ?>

                        <div class="review-top row pt-40">
                            <div class="col-lg-12">
                                <h6 class="mb-15"><?=Yii::t('app', 'commenth')?></h6>
                                <div class="d-flex flex-row justify-content-between">
                                    <span><?=Yii::t('app', 'rating')?></span>
                                    <?= $form->field($model, 'quality')->widget(StarRating::class, ['pluginOptions' => 
                                    [
                                    'size' => 'sm',
                                    'stars' => 5, 
                                    'min' => 0,
                                    'max' => 5,
                                    'step'=>1,
                                    'showCaption' => false, 
                                    'theme' => 'krajee-uni', 
                                    'showClear'=>false,
                                    // 'starCaptions' => [
                                    //     0 => 'Very Poor',
                                    //     1 => 'Poor',
                                    //     2 => 'Ok',
                                    //     3 => 'Good',
                                    //     4 => 'Very Good',
                                    //     5 => 'Extremely Good',
                                    // ],
                                    // 'starCaptionClasses' => [
                                    //     0 => 'text-danger',
                                    //     1 => 'text-warning',
                                    //     2 => 'text-info',
                                    //     3 => 'text-primary',
                                    //     4 => 'text-success',
                                    //     5 => 'text-success'
                                    // ],
                                    ]])->label(false); ?>
                                    <!-- <span>OutStanding</span> -->
                                </div>
                            </div>
                        </div>

                        <div class="feedeback">
                            <h6><?=Yii::t('app', 'comment')?></h6>
                            <?= $form->field($model, 'course_id')->hiddenInput(['value'=>$id])->label(false) ?>
                            <?= $form->field($model, 'text')->textarea(['rows'=>10, 'cols'=>10])->label(false) ?>
                            <div class="mt-10 text-right">
                                <?= Html::submitButton(Yii::t('app', 'submit'), ['class' => 'primary-btn2 text-right rounded-0 text-white']) ?>
                             </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                        <div class="comments-area mb-30">
                            <?php foreach($comments as $c): ?>
                            <div class="comment-list">
                                <div class="single-comment single-reviews justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="img/blog/c1.jpg" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#"><?=$c->user->username?></a>
                                                <div class="star">
                                                    <?php
                                                    echo StarRating::widget([
                                                        'name' => 'rating_2',
                                                        'value' => $c->quality,
                                                        'disabled' => true,
                                                        'pluginOptions'=>[
                                                            'size'=>'sm',
                                                            'theme' => 'krajee-uni', 
                                                            'showCaption' => false, 
                                                            'showClear'=>false,
                                                        ],
                                                    ]);
                                                      
                                                    ?>
                                                </div>
                                            </h5>
                                            <p class="comment">
                                                <?=$c->text?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

<?php 

$js = <<<JS
 jQuery(document).ready(function($) {
       $(".comment-form").submit(function(event) {
            event.preventDefault();
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: data
            })
            .done(function(response) {
                if (response.success == true) {
                    $(".comment-form").trigger('reset');
                }
            })
            .fail(function() {
                console.log("error");
            });
        
        });
    });

JS;

$this->registerJs($js, View::POS_END);


?>