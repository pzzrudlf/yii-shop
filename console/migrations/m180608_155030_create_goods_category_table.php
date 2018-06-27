<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%goods_category}}`.
 */
class m180608_155030_create_goods_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT=\'商品分类表\'';
        }

        $this->createTable('{{%goods_category}}', [
            'id' => $this->primaryKey()->comment('商品分类id'),
            'name' => $this->string(90)->notNull()->comment('商品分类名称'),
            'parent_id' => $this->smallInteger(5)->unsigned()->notNull()->comment('父id'),
            'parent_id_path' => $this->string(128)->comment('家族图谱'),
            'isShow' => $this->tinyInteger(4)->notNull()->defaultValue(1)->comment('是否显示'),
            'sort' => $this->integer(11)->notNull()->defaultValue(0)->comment('排序'),
            'level' => $this->tinyInteger(1)->defaultValue(0)->comment('等级'),
            'image' => $this->string(512)->comment('分类图片'),

            'status' => $this->smallInteger()->notNull()->defaultValue(10)->comment('商品分类状态'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%goods_category}}');
    }
}
