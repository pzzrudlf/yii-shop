<?php

namespace backend\components;

use Yii;
use yii\web\User;
use yii\di\Instance;
use yii\web\ForbiddenHttpException;


class AccessControl extends \yii\base\ActionFilter
{
    private $_user = 'user';

    public $allowActions = [];

    public function getUser()
    {
        if (!$this->_user instanceof User) {
            $this->_user = Instance::ensure($this->_user, User::class);
        }
        return $this->_user;
    }

    public function setUser($user)
    {
        $this->_user = $user;
    }

    public function beforeAction($action)
    {
        return true;
        $actionId = $action->getUniqueId();
        $user = $this->getUser();
        if(Helper::checkRoute('/'.$actionId, Yii::$app->getRequest()->get(), $user)) {
            return true;
        }
        $this->denyAccess($user);
    }

    protected function denyAccess($user)
    {
        if ($user->getIsGuest()) {
            $user->loginRequired();
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action'));
        }
    }
}