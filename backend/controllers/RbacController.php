<?php

namespace backend\controllers;

use Yii;

class RbacController extends AdminBaseController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $articleIndex = $auth->createPermission('/article/index');
        $articleIndex->description = '文章列表';
        $auth->add($articleIndex);

        $articleView = $auth->createPermission('/article/view');
        $articleView->description='查看文章';
        $auth->add($articleView);

        $articleCreate = $auth->createPermission('/article/create');
        $articleCreate->description = '创建文章';
        $auth->add($articleCreate);

        $articleUpdate = $auth->createPermission('/article/update');
        $articleUpdate->description='更新文章';
        $auth->add($articleUpdate);

        $articleDelete= $auth->createPermission('/article/delete');
        $articleDelete->description = '删除文章';
        $auth->add($articleDelete);

        $articleManage = $auth->createRole('管理文章角色');
        $auth->add($articleManage);
        $auth->addChild($articleManage, $articleIndex);
        $auth->addChild($articleManage, $articleView);
        $auth->addChild($articleManage, $articleCreate);
        $auth->addChild($articleManage, $articleUpdate);
        $auth->addChild($articleManage, $articleDelete);

        $auth->assign($articleManage, 1);

    }
}