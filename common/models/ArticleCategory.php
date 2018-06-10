<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%article_category}}".
 *
 * @property int $id 自增主键id
 * @property string $name 文章类别名称
 * @property int $pid 文章父id
 * @property string $path 文章id路径
 * @property int $status 分类状态
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%article_category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'pid', 'path', 'created_at', 'updated_at'], 'required'],
            [['pid', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'pid' => 'Pid',
            'path' => 'Path',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
