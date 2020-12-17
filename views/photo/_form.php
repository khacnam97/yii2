<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="photo-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'photo_path[]')->fileInput(['multiple' => true, 'accept' => 'image/*', 'id' => 'gallery-photo-add']) ?>
    <div class="gallery" style="display: flex; width: 200px;height: 200px;">
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
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
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
</script>