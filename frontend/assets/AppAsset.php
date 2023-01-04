<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.min.css',
        'css/style.css',
        'css/responsive.css',
        'css/custom.css',
        'css/animate.css',
        'css/baguetteBox.min.css',
        'css/classic.css',
        'css/classic.date.css',
        'css/classic.time.css',
        'css/font-awesome.min.css',
        'css/superslides.css',
        'css/bootstrap.min.css.map',
    ];
    public $js = [
        'js/jquery.superslides.min.js',
        'js/baguetteBox.min.js',
        'js/bootstrap.min.js',
        'js/contact-form-script.js',
        'js/custom.js',
        'js/form-validator.min.js',
        'js/images-loded.min.js',
        'js/isotope.min.js',
        'js/jquery.mapify.js',
        'js/jquery-3.2.1.min.js',
        'js/legacy.js',
        'js/picker.date.js',
        'js/picker.js',
        'js/picker.time.js',
        'js/popper.min.js',
        'js/bootstrap.min.js.map',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
