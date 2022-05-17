<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CourseItem */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Course Items', 'url' => ['index']];
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
        <div class="container mb-2">
            <div class="row">
                <div class="col-12">
                    <?= $this->render('video', compact('model')); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [

                        [
                            'attribute' => 'course_id',
                            'label' => 'Kurs bo\'limi',
                            'value' => function ($model) {
                                return $model->course->title_uz;
                            }
                        ],
                        'title_uz',
                        'title_uz',
                        'title_en',
                        'description_uz:ntext',
                        'description_en:ntext',
                        'tag_uz',
                        'tag_en',
                        [
                            'attribute' => 'status',
                            'format' => 'html',
                            'value' => function ($model) {
                                return $model->statuslabel;
                            }
                        ],
                        'created_at:datetime',
                        'updated_at:datetime',
                    ],
                ]) ?>
            </div>

        </div>


    </div>
</div>