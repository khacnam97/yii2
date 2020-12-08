<?php

namespace app\models;

use Yii;

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
            [['employee_id'], 'integer'],
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
            'name' => 'Name',
            'employee_id' => 'Employee ID',
            'employeeName' => 'Employee Name'
        ];
    }
    public function getEmployees()
    {
        return $this->hasOne(Employee::class, ['id' => 'employee_id']);

    }
    public function getEmployeeName() {
        return $this->employees->name;
    }
}
