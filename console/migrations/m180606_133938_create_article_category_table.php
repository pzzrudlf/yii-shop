<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_category}}`.
 */
class m180606_133938_create_article_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT=\'文章分类表\'';
        }

        $this->createTable('{{%article_category}}', [
            'id' => $this->primaryKey()->comment('文章分类id'),
            'name' => $this->string()->notNull()->comment('文章类别名称'),
            'pid' => $this->integer()->notNull()->comment('文章父id'),
            'path' => $this->string()->notNull()->comment('文章id路径'),

            'status' => $this->smallInteger()->notNull()->defaultValue(10)->comment('文章分类状态'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article_category}}');
    }
}
