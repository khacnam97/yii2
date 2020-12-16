<?php
use yii\helpers\Url;
use yii\helpers\Html;
/* @var $model app\models\Post */
?>


<li class="one_quarter">
    <article>
        <figure><a href="#"><img class="demo" src="images/demo/348x261.png" alt=""></a>
            <figcaption>
                <time datetime="2045-04-05T08:15+00:00"><strong>05</strong> <em>Apr</em></time>
            </figcaption>
        </figure>
        <div class="excerpt">
            <h6 class="heading"><?= Html::encode($model->title)?></h6>
            <ul class="nospace meta">
                <li><i class="fas fa-user"></i> <a href="#">Admin</a></li>
                <li><i class="fas fa-tags"></i> <a href="#">Tag 1</a>, <a href="#">Tag 2</a></li>
            </ul>
            <div class="dd"><?= $model->imgPath ?></div>
             <div class="cut"><?= $model->content?></div>
            <footer><a class="btn" href="<?= Url::to(['site/view', 'id' => $model->id])?>">Read More</a></footer>
        </div>
    </article>
</li>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $("img").hide();
    $(".demo").show();
</script>