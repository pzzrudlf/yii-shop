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
                    'label' => '权限管理',
                    'icon' => 'circle-o',
                    'url' => '#',
                    'items' => [
                        ['label' => '路由管理', 'icon' => 'circle-o', 'url' => ['/rbac/route'],],
                        ['label' => '权限管理', 'icon' => 'circle-o', 'url' => ['/rbac/permission'],],
                        ['label' => '角色分配', 'icon' => 'circle-o', 'url' => ['/rbac/role'],],
                        ['label' => '管理员列表', 'icon' => 'circle-o', 'url' => ['/admin/index'],],
                    ],
                ],
                [
                    'label' => '会员管理',
                    'icon' => 'circle-o',
                    'url' => '#',
                    'items' => [
                        ['label' => '会员列表', 'icon' => 'circle-o', 'url' => ['/user/index'],],
                    ],
                ],
                [
                    'label' => '商品管理',
                    'icon' => 'circle-o',
                    'url' => '#',
                    'items' => [
                        ['label' => '商品分类', 'icon' => 'circle-o', 'url' => ['/goods/cate'],],
                        ['label' => '商品规格', 'icon' => 'circle-o', 'url' => ['/goods/spec']],
                        ['label' => '商品列表', 'icon' => 'circle-o', 'url' => ['/goods/index'],],
                        ['label' => '商品评论', 'icon' => 'circle-o', 'url' => ['/goods/comment'],],
                        ['label' => '商品咨询', 'icon' => 'circle-o', 'url' => ['/goods/consult']],
                    ],
                ],
                [
                    'label' => '订单管理',
                    'icon' => 'circle-o',
                    'url' => '#',
                    'items' => [
                        ['label' => '订单列表', 'icon' => 'circle-o', 'url' => ['/order/index'],],
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
