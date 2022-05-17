<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\EnrollSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enrolls';
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
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'course_id',
            'user_id',
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
            'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
</div>