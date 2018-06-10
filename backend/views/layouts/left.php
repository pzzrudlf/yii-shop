<?php

use backend\components\MenuHelper;
use dmstr\widgets\Menu;
?>
<?php
//var_dump(MenuHelper::getAssignedMenu(Yii::$app->user->id));die;
?>
<aside class="main-sidebar">

    <section class="sidebar">
    <?= Menu::widget([
            'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
//            'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id),
            'items' => [
                [
                    'label' => '管理员管理',
                    'icon' => 'circle-o',
                    'url' => '#',
                    'items' => [
                        ['label' => '路由管理', 'icon' => 'circle-o', 'url' => ['/rbac/route'],],
                        ['label' => '权限分配', 'icon' => 'circle-o', 'url' => ['/rbac/permissions'],],
                        [
                            'label' => 'Level One',
                            'icon' => 'circle-o',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                [
                                    'label' => 'Level Two',
                                    'icon' => 'circle-o',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'label' => '文章管理',
                    'icon' => 'circle-o',
                    'url' => '#',
                    'items' => [
                        ['label' => '文章分类', 'icon' => 'circle-o', 'url' => ['/article/article-cat'],],
                        ['label' => '文章列表', 'icon' => 'circle-o', 'url' => ['/article/index'],],
                        ['label' => '文章评论', 'icon' => 'circle-o', 'url' => ['/article/comment'],],
                        ['label' => '文章评论回复', 'icon' => 'circle-o', 'url' => ['/article/reply']],
                    ],
                ],
                [
                    'label' => '商品管理',
                    'icon' => 'circle-o',
                    'url' => '#',
                    'items' => [
                        ['label' => '商品分类', 'icon' => 'circle-o', 'url' => ['/goods/goods-cat'],],
                        ['label' => '商品列表', 'icon' => 'circle-o', 'url' => ['/goods/index'],],
                        ['label' => '商品评论', 'icon' => 'circle-o', 'url' => ['/goods/comment'],],
                        ['label' => '商品咨询', 'icon' => 'circle-o', 'url' => ['/goods/consult']],
                    ],
                ],
                [
                    'label' => '日志管理',
                    'icon' => 'circle-o',
                    'url' => '#',
                    'items' => [
                        ['label' => '用户登录日志', 'icon' => 'circle-o', 'url' => ['/log/user-login'],],
                        ['label' => '管理员登录日志', 'icon' => 'circle-o', 'url' => ['/log/admin-login'],],
                        ['label' => '管理员操作日志', 'icon' => 'circle-o', 'url' => ['/log/admin-operation']]
                    ],
                ],
                [
                    'label' => '系统管理',
                    'icon' => 'circle-o',
                    'url' => '#',
                    'items' => [
                        ['label' => '网站设置', 'icon' => 'circle-o', 'url' => ['/sys/setting'],],
                        ['label' => '模块设置', 'icon' => 'circle-o', 'url' => ['/sys/setting'],],
                        ['label' => '邮件设置', 'icon' => 'circle-o', 'url' => ['/sys/email'],],
                        ['label' => '支付方式', 'icon' => 'circle-o', 'url' => ['/sys/pay']],
                        ['label' => '快递商家', 'icon' => 'circle-o', 'url' => ['/sys/express']],
                    ],
                ],
                ['label' => 'gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
            ],
        ]);
    ?>
    </section>

</aside>
