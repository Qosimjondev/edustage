<?php
use yii\helpers\Url;
?>
<h2><?=$label?></h2>
<div class="page_link">
    <a href="<?=Url::home()?>"><?=Yii::t('app', 'home')?></a>
    <a href="#"><?=$label?></a>
</div>