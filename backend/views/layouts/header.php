<?php
use yii\helpers\Html;
use backend\assets\JclockAsset;

/* @var $this \yii\web\View */
/* @var $content string */

JclockAsset::register($this);
?>


<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- time -->
                <li class="">
                    <div class="time" id="current-time"></div>
                </li>

                <!-- system version -->
                <li class="">
                    <a href="#">系统版本</a>
                </li>

                <!-- 前台首页 -->
                <li class="">
                    <a href="#">前台首页</a>
                </li>

                <!-- 后台首页 -->
                <li class="">
                  <a href="#">后台首页</a>
                </li>

                <!-- clear cache button -->
                <li class="">
                    <a href="#">清除缓存</a>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?php echo Yii::$app->getUser()->getIdentity()->username; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header" style="height: auto;">
                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                 alt="User Image"/>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    </nav>

</header>

<script>

    $(document).ready(function(){
        //顶部时间
        $('#current-time').jclock({
            withDate:true, withWeek:true
        })
    });

</script>

