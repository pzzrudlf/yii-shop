<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%goods_brand}}`.
 */
class m180608_152537_create_goods_brand_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT=\'品牌表\'';
        }

        $this->createTable('{{%goods_brand}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(60)->notNull()->comment('品牌名称'),
            'logo' => $this->string(80)->notNull()->comment('品牌logo'),
            'desc' => $this->text()->notNull()->comment('品牌描述'),
            'url' => $this->string(255)->notNull()->comment('品牌地址'),
            'sort' => $this->integer(3)->unsigned()->notNull()->comment('排序'),
            'cat_name' => $this->string(128)->comment('品牌分类'),
            'parent_cat_id' => $this->integer(11)->comment('分类id'),
            'cat_id' => $this->integer(10)->comment('分类id'),
            'is_hot' => $this->tinyInteger(1)->comment('是否推荐'),

            'status' => $this->smallInteger()->notNull()->defaultValue(10)->comment('商品品牌状态'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%goods_brand}}');
    }
}
