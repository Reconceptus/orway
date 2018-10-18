<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_END];
    public $publishOptions = [
        'forceCopy' => true
    ];
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $sourcePath = '@webroot';
    public $css = [
        'css/styles.min.css',
        'css/common.css',
    ];
    public $js = [
        'js/imagesloaded.pkgd.min.js',
        'js/owl.carousel.min.js',
        'js/main.min.js',
        'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
