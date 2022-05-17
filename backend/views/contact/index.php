<?php

use yii\bootstrap4\LinkPager;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Xabarlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-primary card-outline">


    <?php Pjax::begin(['id'=>'container']); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager'=>[
            'class'=>LinkPager::class
        ],
        'summary'=>'',
        'emptyText'=>'Ma\'lumot topilmadi',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'fullname',
                'label'=>'Jo\'natuvchi',
            ],
            'email:email',
            [
                'attribute'=>'title',
                'label'=>'Sarlavha',
            ],
            [
                'attribute'=>'content',
                'format'=>'ntext',
                'label'=>'Matn',
                'value'=>function($model){
                    return $model->shorttext;
                }
            ],
            [
                'attribute'=>'status',
                'format'=>'html',
                'filter'=>[
                    '1'=>"O'qilgan",
                    '0'=>"O'qilmagan"
                ],
                'label'=>'Holat',
                'value'=>function($model){
                    return $model->statuslabel;
                }
            ],
            [
                'attribute'=>'created_at',
                'label'=>'Xabar vaqti',
                'value'=>function($model){
                    return Yii::$app->formatter->asRelativeTime($model->created_at);
                }
                
            ],
            [
                'class' => ActionColumn::class,
                'header'=>'Amallar',
                'headerOptions'=>['style'=>'color:#3366aa'],
                'template'=>'{delete} {view}',
            ],
        ],
    ]); ?>
    </div>
    <?php Pjax::end(); ?>

</div>
