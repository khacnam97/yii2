<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */
/* @var $form yii\widgets\ActiveForm */
/* @var $photos  */
?>

<div class="photo-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'photo_path[]')->fileInput(['multiple' => true, 'accept' => 'image/*', 'id' => 'gallery-photo-add']) ?>
    <div class="gallery" style="display: flex; width: 200px;height: 200px;margin-bottom: 20px;">
    </div>
    <div class="form-group">
        <input type="text" value="" style="display: none ;"  class="form-control" id="p1" name="p1">
    </div>
    <div class="wrapper row3">
        <main class="hoc container clear">
            <ul class="nospace group overview">
                    <li class="one_third">
                        <img style=" height: 200px;" src="<?= Yii::$app->request->baseUrl . '/uploads/' . $model['photo_path'] ?>" class="card-img-top">
                    </li>
            </ul>
        </main>

    </div>
    <button>Submit</button>

    <?php ActiveForm::end() ?>

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
                        $($.parseHTML('<img style="height: 200px; margin-left: 20px;" >')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
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