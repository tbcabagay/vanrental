<?php

namespace app\assets_b;

use yii\web\AssetBundle;

class CreativeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/assets_b';
    public $css = [
        'css/creative.min.css',
        'css/site.css',
    ];
    public $js = [
        'js/creative.min.js',
    ];
    public $depends = [
        'app\assets_b\AppAsset',
    ];
}
