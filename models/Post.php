<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string|null $name
 * @property int $employee_id
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $img_path;
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id'], 'required'],
            [['title'], 'required' ,'message'=>'{attribute} không để rỗng .'],
            [['employee_id'], 'integer'],
            [['name'], 'string', 'max' => 191],
            [['content'], 'string'],

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
            'title' => 'Title',
            'employee_id' => 'Employee ID',
            'employeeName' => 'Employee Name',
            'content' => 'Content',
            'imgPathName' => 'Img Path'
        ];
    }
    public function getEmployees()
    {
        return $this->hasOne(Employee::class, ['id' => 'employee_id']);

    }
    public function getEmployeeName() {
        return $this->employees->name;
    }

    public function getImgs()
    {
        return $this->hasOne(Img::class, ['post_id' => 'id']);
    }
    public function getImgPathName() {
        return (empty($this->imgs)) ? '' : $this->imgs->img_path;
    }

}
