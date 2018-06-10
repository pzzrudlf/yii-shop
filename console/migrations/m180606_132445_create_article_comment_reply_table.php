<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_comment_reply}}`.
 */
class m180606_132445_create_article_comment_reply_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT=\'回复表\'';
        }

        $this->createTable('{{%article_comment_reply}}', [
            'id' => $this->primaryKey()->comment('自增主键id'),
            'article_comment_id' => $this->string()->notNull()->comment('评论id'),
            'reply_id' => $this->string()->notNull()->comment('回复id'),
            'reply_type' => $this->string()->notNull()->comment('回复类型'),
            'content' => $this->string()->notNull()->comment('回复内容'),
            'from_uid' => $this->integer()->notNull()->comment('回复人'),
            'to_uid' => $this->integer()->notNull()->comment('被回复人'),

            'status' => $this->smallInteger()->notNull()->defaultValue(10)->comment('回复状态'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article_comment_reply}}');
    }
}
