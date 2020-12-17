<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Post */


\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h2><?= Html::encode($model->title)?></h2>
    <p><?= $model->content?></p>


</div>
