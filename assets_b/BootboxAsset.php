<?php
namespace app\assets_b;

use yii\web\AssetBundle;

class BootboxAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootbox';
    public $js = [
        'bootbox.js',
    ];
}  