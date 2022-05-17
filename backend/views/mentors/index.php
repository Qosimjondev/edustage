<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\MentorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mentors';
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

            'fullname',
            'job_uz',
            [
                'attribute'=>'img',
                'label'=>'Rasm',
                'format'=>'html',
                'filter'=>false,
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
            [
                'attribute'=>'created_at',
                'format'=>'datetime',
                'label'=>'Yaratildi',
                'filter'=>DatePicker::widget([
                    'model'=>$searchModel,
                    'attribute'=>'created_at',
                    'pluginOptions'=>[
                        'autoclose'=>true,
                        'format'=>'yyyy-mm-dd'
                    ]
                ])
            ],
            [
                'class' => ActionColumn::class,
                'headerOptions'=>['class'=>'text-info'],
                'header'=>'Amallar'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
</div>