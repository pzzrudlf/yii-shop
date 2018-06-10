<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/8
 * Time: 20:31
 */

namespace console\controllers;

use yii\console\Controller;
use backend\models\Admin;

class InitController extends Controller
{
    /**
     * Create init admin
     */
    public function actionAdmin()
    {
        echo "Create init admin ...\n";                  // 提示当前操作
        $username = $this->prompt('Admin Name:');        // 接收用户名
        $email = $this->prompt('Email:');               // 接收Email
        $password = $this->prompt('Password:');         // 接收密码
        $model = new Admin();                            // 创建一个新用户
        $model->username = $username;                   // 完成赋值
        $model->email = $email;
        $model->password = $password;//注意这个地方，用了Admin模型中的setPassword方法（魔术方法__set）
        $model->generateAuthKey();
        $model->created_at = time();
        $model->updated_at = time();
        if (!$model->save())                            // 保存新的用户
        {
            foreach ($model->getErrors() as $error)     // 如果保存失败，说明有错误，那就输出错误信息。
            {
                foreach ($error as $e)
                {
                    echo "$e\n";
                }
            }
            return 1;                                   // 命令行返回1表示有异常
        }
        return 0;                                       // 返回0表示一切OK
    }
}