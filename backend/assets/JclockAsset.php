<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * JclockAsset.
 */
class JclockAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/jquery.jclock.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
