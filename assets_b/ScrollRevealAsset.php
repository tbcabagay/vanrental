<?php
namespace app\assets_b;

use yii\web\AssetBundle;

class ScrollRevealAsset extends AssetBundle
{
    public $sourcePath = '@bower/scrollreveal';
    public $js = [
        'dist/scrollreveal.min.js',
    ];
    public $publishOptions = [
        'only' => [
            'dist/*',
        ]
    ];
}  