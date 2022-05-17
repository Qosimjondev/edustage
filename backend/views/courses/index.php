<?php

use backend\models\Category;
use backend\models\Mentors;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CoursesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
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
                'attribute'=>'mentor_id',
                'format'=>'text',
                'filter'=>Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'mentor_id',
                    'data' => ArrayHelper::map(Mentors::find()->andWhere(['status'=>1])->all(), 'id', 'fullname'),
                    'options' => ['placeholder' => 'Mentorni tanlash'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
                'value'=>function($model){
                    return $model->mentor->fullname;
                }
            ],
            [
                'attribute'=>'category_id',
                'format'=>'text',
                'filter'=>Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'category_id',
                    'data' => ArrayHelper::map(Category::find()->andWhere(['status'=>1])->all(), 'id', 'title_uz'),
                    'options' => ['placeholder' => 'Kategoriya...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
                'value'=>function($model){
                    return $model->category->title_uz;
                }
            ],
            'title_uz',
            [
                'attribute'=>'poster',
                'label'=>'Rasm',
                'format'=>'html',
                'filter'=>false,
                'value'=>function($model){
                    return Html::img($model->getImageLink(), ['width'=>'70px']);
                }
            ],
            [
                'label'=>'Kurslar',
                'format'=>'html',
                'headerOptions'=>['class'=>'text-info'],
                'contentOptions'=>['class'=>'text-center'],
                'value'=>function($model){
                    if($model->getCourseItems()->count()){
                        return Html::a($model->getCourseItems()->count(), ['/course-item/index', 'course_id'=>$model->id]);
                    }
                    return Html::a('<span class="fa fa-plus"></span>', ['/course-item/create'], ['title'=>'Kurs qo\'shish', 'class'=>'btn btn-info']);
                }
            ],
            [
                'label'=>'Yoqtirishlar',
                'format'=>'html',
                'headerOptions'=>['class'=>'text-info'],
                'contentOptions'=>['class'=>'text-center'],
                'value'=>function($model){
                    if($model->getLikes()->count()){
                        return Html::a($model->getLikes()->count(), ['/likes/index']);
                    }
                    return 'Mavjud emas';
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
                'contentOptions'=>['style'=>'width:20%;'],
            ],
            [
                'class' => ActionColumn::class,
                'header' => 'Amallar',
                'headerOptions' => ['class' => 'text-info'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
</div>