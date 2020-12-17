<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */
/* @var $photos  */

//$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Photos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
        <?php
            foreach ($photos as $photo){
//                var_dump($photo['photo_path']);
        ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="<?= Yii::$app->request->baseUrl . '/uploads/' . $photo['photo_path'] ?>" class="card-img-top">

                    </div>

                </div>
        <?php
            }
        ?>

</div>
