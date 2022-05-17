<?php

namespace frontend\components;

use Exception;
use yii\base\Widget;


class Bread extends Widget{
    public $title;

    public function init()
    {
        parent::init();
        if($this->title == ''){
            throw new Exception("Sahifa sarlavhasi bo'sh bo'lmasin", 1);
        }
    }

    public function run()
    {
        return $this->render('bread', [
            'label'=>$this->title,
        ]);
    }
}
?>