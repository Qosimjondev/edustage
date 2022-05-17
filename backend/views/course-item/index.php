<?php

use backend\models\Courses;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CourseItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Course Items';
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
  
            [
                'attribute'=>'course_id',
                'label'=>'Kurs bo\'limi',
                'contentOptions'=>['style'=>'width:15%;'],
                'filter'=>Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'course_id',
                    'data' => ArrayHelper::map(Courses::find()->andWhere(['status'=>1])->all(), 'id', 'title_uz'),
                    'options' => ['placeholder' => 'Kursni tanlash...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
                'value'=>function($model){
                    return $model->course->title_uz;
                }
            ],
            [
                'attribute'=>'title_uz',
                'label'=>'Sarlavha',
                'contentOptions'=>['style'=>'width:18%;'],
            ],
            [
                'attribute'=>'video_link',
                'format'=>'html',
                'filter'=>false,
                'label'=>'Video',
                'contentOptions'=>['style'=>'width:15%;'],
                'content'=>function($model){
                    return $this->render('video', compact('model'));
                }
            ],
            [
                'attribute'=>'status',
                'format'=>'html',
                'contentOptions'=>['style'=>'width:15%;'],
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
                'label'=>'Yaratildi',
                'format'=>'datetime',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute'=>'created_at',
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'autoclose' => true,
                    ]
                ]),
                'contentOptions'=>['style'=>'width:22%;'],
            ],
            // [
            //     'attribute'=>'updated_at',
            //     'label'=>'Yangilandi',
            //     'format'=>'datetime',
            //     'filter' => DatePicker::widget([
            //         'model' => $searchModel,
            //         'attribute'=>'updated_at',
            //         'pluginOptions' => [
            //             'format' => 'yyyy-mm-dd',
            //             'autoclose' => true,
            //         ]
            //     ]),
            //     'contentOptions'=>['style'=>'width:20%;'],
            // ],
            [
                'class' => ActionColumn::class,
                'header' => 'Amallar',
                'contentOptions'=>['style'=>'width:7%;'],
                'headerOptions' => ['class' => 'text-info'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
</div>