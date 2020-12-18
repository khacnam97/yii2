<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photos".
 *
 * @property int $id
 * @property string $user_id
 * @property string|null $photo_path
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Photo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'photos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['user_id'], 'string', 'max' => 255],
            [['photo_path'], 'file',  'maxFiles' => 10],
            [['title'], 'string', 'max' => 255],
            [['group'], 'string', 'max' => 191],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'photo_path' => 'Photo Path',
            'title' => 'Title',
            'group' => 'Group',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
//    public function upload()
//    {
//        if ($this->validate()) {
//            foreach ($this->photo_path as $file) {
//                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
//            }
//            return true;
//        } else {
//            return false;
//        }
//    }
}
