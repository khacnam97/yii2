<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhotoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Photos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Photo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'photo_path',

            ['class' => 'yii\grid\ActionColumn',
                'buttons'=>[
                    'view'=>function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['photo/view', 'id' => $model->user_id], ['class' => 'profile-link']);
                    },

                ],
            ],
        ],
    ]); ?>


</div>
