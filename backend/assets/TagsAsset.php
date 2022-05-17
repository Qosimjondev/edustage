<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class TagsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'tags/tagsinput.css',
    ];
    public $js = [
        'tags/tagsinput.js',
    ];
    public $depends = [
    ];
}
