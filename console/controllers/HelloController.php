<?php 

namespace console\controllers;

use yii\console\Controller;
use yii\helpers\FileHelper;

class HelloController extends Controller
{
    // public $message;

    // public function options($actionID)
    // {
    //     return ['message'];
    // }

    // public function optionAliases()
    // {
    //     return ['m' => 'message'];
    // }

    public function actionIndex()
    {
        FileHelper::createDirectory('frontend/'.time());
    }
}

?>