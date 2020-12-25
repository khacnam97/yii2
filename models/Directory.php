<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "directory".
 *
 * @property int $id
 * @property int|null $parentId
 * @property string|null $name
 */
class Directory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $level;
    public static function tableName()
    {
        return 'directory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parentId'], 'integer'],
            [['name'], 'string', 'max' => 191],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parentId' => 'Parent ID',
            'name' => 'Name',
        ];
    }
}
