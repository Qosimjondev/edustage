<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use backend\assets\TagsAsset;
use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\helpers\Url;

AppAsset::register($this);
TagsAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
<?php $this->beginBody() ?>
    <?=(Yii::$app->controller->route=='site/index')?$this->render('preloader'):null;?>
    <?=$this->render('navbar');?>
    <?=$this->render('mainsidebar');?>

    <div class="content<?=(Yii::$app->controller->route=='site/index')?'':'-wrapper';?>">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">

                    <?= Breadcrumbs::widget([
                        'tag' => 'ol',
                        'options' => [
                            'class' => 'breadcrumb float-sm-right',
                        ],
                        'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
                        'homeLink' => [
                            'label' => 'Bosh sahifa',
                            'url' => Url::to(['/']),
                            'encode' => false,
                            'class' => 'breadcrumb-item'
                        ],
                        'links' => $this->params['breadcrumbs']??[],
                    ]) ?>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <div class="content">
            <div class="container-fluid">
                    <?= Alert::widget() ?>
                    <?= $content ?>
            </div>
        </div>

    </div>

<?=$this->render('footer')?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
