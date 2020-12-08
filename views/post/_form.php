<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Employee;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <div class="form-group dropdown">
        <?=  Html::activeDropDownList($model, 'employee_id',
            ArrayHelper::map(Employee::find()->all(), 'id', 'name'), array('class'=>'form-control'))
        ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
