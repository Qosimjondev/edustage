<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-primary card-outline">
<div class="card-header">
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
</div>
    <div class="card-body">

    <?php Pjax::begin(['id'=>'data']); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            'email:email',
            
            [
                'attribute' => 'status',
                'filter'=>array(0=>"O'chirilgan", 9=>"NoFaol", 10=>"Faol"),
                'label'=>'Status',
                'format'=>'html',
                'value'=>function ($model){
                    return $model->getStatus();
                },

            ],
            [
                'attribute'=>'created_at',
                'value'=>function($model){
                    return date("Y-m-d H:i",$model->created_at);
                }
            ],

            [
                'attribute'=>'updated_at',
                'value'=>function($model){
                    return date("Y-m-d H:i",$model->created_at);
                }
            ],
            [
                'class' => ActionColumn::class,
                'header' => 'Amallar',
                'template' => '{update} {delete}',
                'headerOptions' => ['class' => 'text-info'],
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="fa fa-edit"></span>', $url, ['class' => 'update-pl-user']);
                    },
                    // 'view' => function ($url, $model) {
                    //     return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['class' => 'view-pl-category']);
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


?>