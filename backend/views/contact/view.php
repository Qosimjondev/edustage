<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Contact */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Xabarlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card card-primary card-outline">
<div class="card-header">
    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>

<div class="card-body">

<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fullname',
            'email:email',
            'title',
            'content:ntext',
            'created_at:datetime',
        ],
    ]) ?>
</div>

</div>
