<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/8
 * Time: 20:02
 */

namespace backend\assets;

use yii\web\AssetBundle;

class Select2Asset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins/select2';//路径

    public $css = [
        'select2.min.css', //css file
    ];

    public $js = [
        'select2.min.js',  //js file
    ];

    public $depends = [
        'dmstr\web\AdminLteAsset', //依赖关系
    ];
}