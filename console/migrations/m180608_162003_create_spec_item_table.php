<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%spec_item}}`.
 */
class m180608_162003_create_spec_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT = \'规格项目表\'';
        }

        $this->createTable('{{%spec_item}}', [
            'id' => $this->primaryKey()->comment('规格项目id'),
            'spec_id' => $this->integer(11)->null()->comment('规格id'),
            'item' => $this->string(54)->null()->comment('规格项目'),

            'status' => $this->smallInteger()->notNull()->defaultValue(10)->comment('规格项目状态'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%spec_item}}');
    }
}
