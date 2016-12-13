<?php
namespace app\assets_b;

use yii\web\AssetBundle;

class MagnificPopupAsset extends AssetBundle 
{
    public $sourcePath = '@bower/magnific-popup';
    public $css = [ 
        'dist/magnific-popup.css',
    ];
    public $js = [
        'dist/jquery.magnific-popup.min.js',
    ];
    public $publishOptions = [
        'only' => [
            'dist/*',
        ]
    ];
}  