<?php

use kartik\date\DatePicker;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-primary card-outline">
<div class="card-header">
    <div class="row">
        <div class="col-9">
        <?= Html::a('<span class="fa fa-plus"></span>', ['create'], ['class' => 'btn btn-success', 'id'=>'addcategory']) ?>
        </div>
        <div class="col-3">
        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>
        
</div>
    <div class="card-body">

    <?php Pjax::begin(['id'=>'data']); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title_uz',
            'title_en',
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
            ],
            [
                'attribute'=>'updated_at',
                'label'=>'Yangilandi',
                'format'=>'datetime',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute'=>'updated_at',
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'autoclose' => true,
                    ]
                ]),
                'contentOptions'=>['style'=>'width:22%;'],
            ],
            [
                'class' => ActionColumn::class,
                'header' => 'Amallar',
                'template' => '{view} {update} {delete}',
                'headerOptions' => ['class' => 'text-info'],
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="fa fa-edit"></span>', $url, ['class' => 'update-pl-category']);
                    },
                    'view' => function ($url, $model) {
                        return Html::a('<span class="fa fa-eye"></span>', $url, ['class' => 'view-pl-category']);
                    },
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


?>