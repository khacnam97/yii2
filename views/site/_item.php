<?php
use yii\helpers\Url;
use yii\helpers\Html;
/* @var $model app\models\Post */
?>

<div class="col-lg-6">
    <a style="text-decoration: none;" href="<?= Url::to(['site/view', 'id' => $model->id])?>">
        <h2><?= Html::encode($model->title)?></h2>
        <?= $model->content?>
    </a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    // $("img").css("display" ,"none");
</script>