<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%spec}}`.
 */
class m180608_161414_create_spec_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT = \'规格表\'';
        }

        $this->createTable('{{%spec}}', [
            'id' => $this->primaryKey(),
            'type_id' => $this->integer(11)->defaultValue(0)->comment('规格类型'),
            'name' => $this->string(55)->null()->comment('规格名称'),
            'order' => $this->integer(11)->defaultValue(50)->comment('排序'),
            'search_index' => $this->tinyInteger(1)->defaultValue(1)->comment('是否需要检索：1是，0否'),


            'status' => $this->smallInteger()->notNull()->defaultValue(10)->comment('规格状态'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%spec}}');
    }
}
