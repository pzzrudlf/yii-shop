<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%admin}}`.
 */
class m180606_140229_create_admin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT=\'管理员表\'';
        }

        $this->createTable('{{%admin}}', [
            'id' => $this->primaryKey()->comment('管理员id'),
            'username' => $this->string()->notNull()->unique()->comment('用户名'),

            'auth_key' => $this->string(32)->notNull()->comment('auth_key'),
            'password_hash' => $this->string()->notNull()->comment('密码哈希值'),
            'password_reset_token' => $this->string()->unique()->comment('密码重置口令'),

            'email' => $this->string()->notNull()->unique()->comment('邮件'),

            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%admin}}');
    }
}
