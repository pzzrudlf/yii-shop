<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%goods_consult}}`.
 */
class m180609_023429_create_goods_consult_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT = \'商品咨询表\'';
        }

        $this->createTable('{{%goods_consult}}', [
            'id' => $this->primaryKey()->comment('商品咨询id'),
            'goods_id' => $this->integer(11)->defaultValue(0)->comment('商品id'),
            'username' => $this->string(32)->comment('用户名'),
            'consult_type' => $this->tinyInteger(1)->defaultValue(1)->comment('1 商品咨询 2 支付咨询 3 配送 4 售后'),
            'content' => $this->string(1024)->comment('咨询内容'),
            'parent_id' => $this->integer(11)->defaultValue(0)->comment('父id 用于管理员回复'),
            'is_show' => $this->tinyInteger(1)->defaultValue(0)->comment('是否显示'),

            'status' => $this->tinyInteger(1)->defaultValue(0)->comment('管理员回复状态，0未回复，1已回复'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%goods_consult}}');
    }
}
