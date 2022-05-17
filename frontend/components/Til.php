<?php 

namespace frontend\components;
use Yii;
use yii\base\Behavior;

class Til extends Behavior{
    public function events()
    {
        return [
           \yii\web\Application::EVENT_BEFORE_REQUEST => 'myfunc',
        ];
    }

    function myfunc(){
        if(Yii::$app->session->has('til')){
            $til = Yii::$app->session->get('til');
            Yii::$app->language = $til;
        }
    }
}




?>