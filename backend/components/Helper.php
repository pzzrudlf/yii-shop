<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/9
 * Time: 16:22
 */

namespace backend\components;

use Yii;
use yii\web\User;

class Helper
{
    public static function checkRoute($route, $params = [], $user = null)
    {
        $r = static::normalizeRoute($route, true);

        if ($user === null)
        {
            $user = Yii::$app->getUser();
        }

        $userId = $user instanceof User ? $user->getId() : $user;

        if ($user->can($r, $params)) {
            return true;
        }
        while(($pos = strrpos($r, '/')) > 0)
        {
            $r = substr($r, 0, $pos);
            if ($user->can($r .  '/*', $params))
            {
                return true;
            }
        }

        return $user->can('/*', $params);
    }

    protected static function normalizeRoute($route, $advanced = false)
    {
        if ($route === '')
        {
            $normalized = '/' . Yii::$app->controller->getRoute();
        }
        else if(strncmp($route, '/', 1) === 0)
        {
            $normalized = $route;
        }
        else if(strpos($route, '/') === false)
        {
            $normalized = '/' . Yii::$app->controller->getUniqueId() . '/' . $route;
        }
        else if(($mid = Yii::$app->controller->module->getUniqueId()) !== '')
        {
            $normalized = '/' . $mid . '/' . $route;
        }
        else
        {
            $normalized = '/' . $route;
        }

        if($advanced) {
            $normalized = '@'.Yii::$app->id.$normalized;
        }

        return $normalized;
    }
}