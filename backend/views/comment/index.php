<?php

use backend\models\Courses;
use common\models\User;
use kartik\date\DatePicker;
use kartik\rating\StarRating;
use kartik\select2\Select2;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-primary card-outline">
    <div class="card-header">
        <div class="row">
            <div class="col-9">
            </div>
            <div class="col-3">
                <?php //echo $this->render('_search', ['model' => $searchModel]); 
                ?>
            </div>
        </div>

    </div>
    <div class="card-body">

        <?php Pjax::begin(['id'=>'data']); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'course_id',
                    'format' => 'text',
                    'filter' => Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'course_id',
                        'data' => ArrayHelper::map(Courses::find()->andWhere(['status' => 1])->all(), 'id', 'title_uz'),
                        'options' => ['placeholder' => 'Kurs...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]),
                    'value' => function ($model) {
                        return $model->course->title_uz;
                    }
                ],
                [
                    'attribute' => 'user_id',
                    'format' => 'text',
                    'filter' => Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'user_id',
                        'data' => ArrayHelper::map(User::find()->andWhere(['status' => 10])->all(), 'id', 'username'),
                        'options' => ['placeholder' => 'Foydalanuvchi...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]),
                    'value' => function ($model) {
                        return $model->user->username;
                    }
                ],

                [
                    'attribute' => 'quality',
                    'format' => 'html',
                    'filter' => ['0'=>0, '1'=>1, '2'=>2, '3'=>3, '4'=>4, '5'=>5],
                    'content'=>function($model){
                        return StarRating::widget([
                            'name' => 'rating_2',
                            'value' => $model->quality,
                            'disabled' => true,
                            'pluginOptions'=>[
                                'size'=>'sm',
                                'theme' => 'krajee-uni', 
                                'showCaption' => false, 
                                'showClear'=>false,
                            ]
                        ]);
                    }
                ],

                [
                    'attribute' => 'status',
                    'format' => 'html',
                    'filter' => [
                        '0' => 'Nofaol',
                        '1' => 'Faol'
                    ],
                    'value' => function ($model) {
                        return $model->statuslabel;
                    }
                ],

                [
                    'attribute' => 'created_at',
                    'label' => 'Yaratildi',
                    'format' => 'datetime',
                    'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'created_at',
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'autoclose' => true,
                        ]
                    ]),
                    'contentOptions' => ['style' => 'width:20%;'],
                ],
                [
                    'class' => ActionColumn::class,
                    'header' => 'Amallar',
                    'template' => '{view} {update} {delete}',
                    'headerOptions' => ['class' => 'text-info'],
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('<span class="fa fa-edit"></span>', $url, ['class' => 'update-pl-comment']);
                        },
                        // 'view' => function ($url, $model) {
                        //     return Html::a('<span class="fa fa-eye"></span>', $url, ['class' => 'view-pl-comment']);
                        // },
                    ],
                ],
            ],
        ]); ?>

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

$('body').delegate('.update-pl-comment', 'click', function (e){
        e.preventDefault();
        var url =  $(this).attr('href');
        $("#my-modal").modal("show");
        sendData(url);
    
});

JS;

$this->registerJs($js);

?>