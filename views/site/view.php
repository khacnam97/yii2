<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use rmrevin\yii\fontawesome\FA;

AppAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->registerCssFile( '@web/css/footer.css' );
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">


    ?>
    <h2><?= Html::encode($model->title)?></h2>
    <p><?= $model->content ?>
    </p>

</div>
<div class="container pb-cmnt-container">
    <div class="row">
        <div class="col-md-10 ">
            <div class="panel panel-info">
                <div class="panel-body">
                    <span class="mx-2"><a href="https://www.facebook.com/namnk97/"><i class="fab fa-facebook-square"></i></a></span>
                    <textarea placeholder="Write your comment here!" class="pb-cmnt-textarea"></textarea>
                    <form class="form-inline">
                     <?php
                             echo FA::icon('home');
                             echo FA::icon(
                            'arrow-left',
                            ['class' => 'big', 'data-role' => 'arrow']
                        );
                     ?>
                        <div class="btn-group">

                            <span><i class="far fa-star"></i></span>
                            <button class="btn" type="button"><i class="far fa-star"></i></button>
                            <button class="btn" type="button"><i class="far fa-star"></i></button>
                            <button class="btn" type="button"><i class="far fa-star"></i></button>
                        </div>
                        <button class="btn btn-primary pull-right" type="button">Share</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .pb-cmnt-container {
        font-family: Lato;
        margin-top: 100px;
    }

    .pb-cmnt-textarea {
        resize: none;
        padding: 20px;
        height: 130px;
        width: 100%;
        border: 1px solid #F2F2F2;
    }
</style>