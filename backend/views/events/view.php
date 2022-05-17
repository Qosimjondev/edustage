<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Events */

$this->title = $model->title_uz;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card card-primary card-outline">
<div class="card-header">

    <p>
        <?= Html::a('Yangilash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title_en',
            'content_en:ntext',
            'title_uz',
            'content_uz:ntext',
            'event_date',
            'start_time',
            'end_time',
            'place',
            [
                'attribute'=>'image',
                'label'=>'Rasm',
                'format'=>'html',
                'value'=>function($model){
                    return Html::img($model->getImageLink(), ['width'=>'120px']);
                }
            ],
            [
                'attribute'=>'status',
                'format'=>'html',
                'value'=>function($model){
                    return $model->statuslabel;
                }
            ],
            'created_at:datetime',
        ],
    ]) ?>
    </div>
</div>
