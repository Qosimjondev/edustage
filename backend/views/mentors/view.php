<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Mentors */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mentors', 'url' => ['index']];
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
            'id',
            'fullname',
            'job_uz',
            'job_en',
            'experience_uz:ntext',
            'experience_en:ntext',
            'facebook',
            'twitter',
            'linkedin',
            'pinterest',
            [
                'attribute'=>'img',
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
            'updated_at:datetime',
        ],
    ]) ?>

</div>
</div>