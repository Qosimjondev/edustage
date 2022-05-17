<?php

use kartik\rating\StarRating;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card card-primary card-outline">
    <div class="card-header">

        <p>
            <?= Html::a('Yangilash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'id' => 'update-pl-comment']) ?>
            <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

    </div>
    <div class="card-body">
        <?php Pjax::begin(['id' => 'data']); ?>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'attribute' => 'user_id',
                    'value' => function ($model) {
                        return $model->user->username;
                    }
                ],
                [
                    'attribute' => 'course_id',
                    'value' => function ($model) {
                        return $model->course->title_uz;
                    }
                ],
                [
                    'attribute' => 'quality',
                    'format' => 'html',
                    'content' => function ($model) {
                        return StarRating::widget([
                            'name' => 'rating_2',
                            'value' => $model->quality,
                            'disabled' => true,
                            'pluginOptions' => [
                                'size' => 'sm',
                                'theme' => 'krajee-uni',
                                'showCaption' => false,
                                'showClear' => false,
                            ]
                        ]);
                    }
                ],
                'text:ntext',
                [
                    'attribute' => 'status',
                    'format' => 'html',
                    'value' => function ($model) {
                        return $model->statuslabel;
                    }
                ],
                'created_at:datetime',
            ],
        ]) ?>
        <?php Pjax::end(); ?>
    </div>
</div>

<?php

Modal::begin([
    'title' => '<h3>Ma\'lumot</h3>',
    'id' => 'my-modal',
    'size' => 'modal-sm',

]);

echo '<div id="modal-content"></div>';

Modal::end();

$js = <<< JS

$('body').on('click', '#update-pl-comment', function (e){
        e.preventDefault();
        var url =  $(this).attr('href');
        $("#my-modal").modal("show");
        sendData(url);
    
});

JS;

$this->registerJs($js);

?>