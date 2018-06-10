<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%goods_comment}}`.
 */
class m180608_162412_create_goods_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT = \'商品评论表\'';
        }


        $this->createTable('{{%goods_comment}}', [
            'id' => $this->primaryKey()->comment('商品评论id'),
            'goods_id' => $this->integer(8)->unsigned()->notNull()->defaultValue(0)->comment('商品id'),
            'email' => $this->string(60)->notNull()->comment('email邮箱'),
            'username' => $this->string(60)->notNull()->comment('用户名'),
            'content' => $this->text()->notNull()->comment('评论内容'),
            'ip_address' => $this->string(15)->notNull()->comment('ip地址'),
            'is_show' => $this->tinyInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('是否显示'),
            'parent_id' => $this->integer(10)->unsigned()->notNull()->defaultValue(0)->comment('父id'),
            'user_id' => $this->integer(10)->unsigned()->notNull()->defaultValue(0)->comment('评论用户'),
            'img' => $this->text()->null()->comment('晒单图片'),
            'order_id' => $this->integer(8)->comment('订单id'),
            'deliver_rank' => $this->tinyInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('物流评价等级'),
            'goods_rank' => $this->tinyInteger(1)->defaultValue(0)->comment('商品评价等级'),
            'service_rank' => $this->tinyInteger(1)->defaultValue(0)->comment('商家服务态度评价等级'),
            'zan_num' => $this->integer(10)->notNull()->defaultValue(0)->comment('被赞数'),
            'zan_user_id' => $this->integer(10)->notNull()->comment('点赞用户id'),
            'is_anonymous' => $this->tinyInteger(1)->notNull()->defaultValue(0)->comment('是否匿名评价:0不是，1是'),
            'order_item_id' => $this->integer(11)->null()->comment('订单详情表ID'),


            'status' => $this->smallInteger()->notNull()->defaultValue(10)->comment('商品评论状态'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);

        $this->createIndex('parent_id', '{{%goods_comment}}', 'parent_id');
        $this->createIndex('id_value', '{{%goods_comment}}', 'goods_id');
        $this->createIndex('order_id', '{{%goods_comment}}', 'order_id');
        $this->createIndex('user_id', '{{%goods_comment}}', 'user_id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%goods_comment}}');
    }
}
