<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $menu yii\web\View */
/* @var $menuItem yii\web\View */
/* @var $list_cat [] */
/* @var $list_menu [] */
$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
?>


<ul>

    <nav class="navbar navbar-default ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">The site</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php
                    echo $list_cat;
                    ?>
                </ul>

            </div>

            <div id="navbar" class="collapse navbar-collapse">
<!--                <ul class="nav navbar-nav">-->
                    <?php
                    foreach ($list_menu as $child) {
                        echo $this->render('_item',['item' => $child]);
                    }
                    ?>
<!--                </ul>-->
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>



</ul>



<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'parent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
