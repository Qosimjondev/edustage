<?php

use yii\helpers\Url;

?>
<a href="<?=Url::to(['/courses/like', 'id'=>$c->id])?>" data-method="post" data-pjax="1"> <i class="ti-heart mr-2"></i><?=$c->getLikes()->count()?> </a>
