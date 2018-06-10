<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m180606_130500_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT=\'文章表\'';
        }

        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey()->comment('文章id'),
            'title' => $this->string()->notNull()->comment('文章标题'),
            'content' => $this->text()->comment('文章内容'),
            'user_id' => $this->integer()->notNull()->comment('文章作者'),
            
            'status' => $this->smallInteger()->notNull()->defaultValue(10)->comment('文章状态'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article}}');
    }
}