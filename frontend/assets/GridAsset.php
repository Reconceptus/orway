<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class GridAsset extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_END];
    public $publishOptions = [
        'forceCopy' => true
    ];
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $sourcePath = '@webroot';
    public $css = [

    ];
    public $js = [
        'js/grid.js',
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}
