<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Employee;
use yii\helpers\ArrayHelper;
use yii\jui\InputWidget;
use yii\bootstrap\Button;
use dosamigos\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .delete-img {
        width: 25px; height: 25px; background-repeat: no-repeat;  padding: 0;
        margin-left: -8px;
        display: none;
    }
</style>

<div class="post-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'img_path')->fileInput([ 'accept' => 'image/*', 'id' => 'gallery-photo-add', 'value' => $model->imgPathName]) ?>
    <div class="form-group">
        <input type="text" value="" style="display: none ;"  class="form-control" id="p1" name="p1">
    </div>
    <div class="gallery" style="display: flex; width: 200px;height: 200px;">
        <img style="height: 200px" class="<?= $model->id; ?>" src="<?= Yii::$app->request->baseUrl . '/uploads/' . $model->imgPathName ?>" alt="">
        <?=  Html::button('X', ['class' => 'btn btn-danger delete-img '.$model->id,'id' =>$model->id,]) ?>
    </div>

    <div class="form-group dropdown">
        <?=  Html::activeDropDownList($model, 'employee_id',
            ArrayHelper::map(Employee::find()->all(), 'id', 'name'), array('class'=>'form-control','style' =>'display:none'))
        ?>
    </div>
    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $('#gallery-photo-add').on('click', function() {
        $('.gallery img').hide();
    });
    $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (var i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img style="height: 200px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#gallery-photo-add').on('change', function() {
            var a = $('div.gallery img');
            a.hide();
            imagesPreview(this, 'div.gallery');
        });
    });

    $(document).ready(function(){
        <?php if($model->id) {$idPhoto = $model->id;}
         else $idPhoto ="0";?>;
        var idImg  = <?=$idPhoto ?>;
        if(idImg){
            $('.delete-img').show();
            $('.'+idImg).click(function(){
                console.log(idImg);
                var x =$('.'+idImg);
                x.hide();
                var t = document.getElementById("p1").value;
                document.getElementById("p1").value = t + idImg +"/";
            });
        }
    })
</script>
