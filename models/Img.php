<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imgs".
 *
 * @property int $id
 * @property string $post_id
 * @property string|null $img_path
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Img extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imgs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_id'], 'required'],
            [['post_id', 'created_at', 'updated_at'], 'integer'],
            [['img_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'img_path' => 'Img Path',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
