<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/27
 * Time: 12:35
 */

namespace backend\models\forms;

use yii\base\Model;
use backend\models\Admin;

class AdminSignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $created_at;
    public $updated_at;

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required', 'message' => '用户名不可以为空。'],
            ['username', 'unique', 'targetClass' => '\backend\models\Admin', 'message' => '用户名已存在。'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required', 'message' => '邮箱不可以为空。'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\backend\models\Admin', 'message' => '邮箱已存在。'],

            ['password', 'required', 'message' => '密码不可以为空。'],
            ['password', 'string', 'min' => 6, 'tooShort' => '密码至少填写6位。'],
            [['created_at', 'updated_at'], 'default', 'value' => time()],
        ];
    }


    public function create()
    {
        if (!$this->validate()) {
            return null;
        }

        $admin = new Admin();
        $admin->username = $this->username;
        $admin->email = $this->email;
        $admin->setPassword($this->password);
        $admin->created_at = $this->created_at;
        $admin->updated_at = $this->updated_at;
        $admin->generateAuthKey();

        return $admin->save(false);
    }
}