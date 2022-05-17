<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <?=$this->render('header')?>


<main>
    <?php if(Yii::$app->controller->route=='site/index'): ?>
       
        <?=$this->render('main-slide');?>
        
    <?php else:?>

        <?=$this->render('slide');?>

     <?php endif;?> 

     <?= Alert::widget() ?>
     <?= $content ?>
</main>

<?=$this->render('footer');?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
