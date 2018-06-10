<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_comment}}`.
 */
class m180606_131410_create_article_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT=\'文章评论表\'';
        }

        $this->createTable('{{%article_comment}}', [
            'id' => $this->primaryKey()->comment('文章评论表id'),
            'article_id' => $this->integer()->notNull()->comment('文章id'),
            'article_type' => $this->string()->comment('文章类型'),
            'content' => $this->string()->comment('评论内容'),
            'from_uid' => $this->integer()->notNull()->comment('评论人的id'),

            'status' => $this->smallInteger()->notNull()->defaultValue(10)->comment('文章评论状态'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article_comment}}');
    }
}
