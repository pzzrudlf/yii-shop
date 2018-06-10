<?php

use yii\db\Migration;

class m180606_130400_create_user_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT=\'用户表\'';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey()->comment('自增主键id'),
            'username' => $this->string()->notNull()->unique()->comment('用户名'),
            'auth_key' => $this->string(32)->notNull()->comment('auth_key'),
            'password_hash' => $this->string()->notNull()->comment('密码哈希值'),
            'password_reset_token' => $this->string()->unique()->comment('密码重置口令'),
            'email' => $this->string()->notNull()->unique()->comment('邮件'),

            'status' => $this->smallInteger()->notNull()->defaultValue(10)->comment('用户状态'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
