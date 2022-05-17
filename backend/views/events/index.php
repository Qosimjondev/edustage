<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-primary card-outline">
<div class="card-header">
    <div class="row">
        <div class="col-9">
        <?= Html::a('<span class="fa fa-plus"></span>', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="col-3">
        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>
        
</div>
    <div class="card-body">

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title_uz',
            'event_date',
            'start_time',
            'end_time',
            'place',
            [
                'attribute'=>'image',
                'label'=>'Rasm',
                'format'=>'html',
                'value'=>function($model){
                    return Html::img($model->getImageLink(), ['width'=>'70px']);
                }
            ],
            [
                'attribute'=>'status',
                'format'=>'html',
                'filter'=>[
                    '0'=>'Nofaol',
                    '1'=>'Faol'
                ],
                'value'=>function($model){
                    return $model->statuslabel;
                }
            ],
            'created_at:datetime',
            [
                'class' => ActionColumn::class,   
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
    </div>
</div>
