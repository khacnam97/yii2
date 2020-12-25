<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $menu yii\web\View */
/* @var $menuItem yii\web\View */
/* @var $list_cat yii\web\View */
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
            <!--/.nav-collapse -->
        </div>
    </nav>



</ul>

<nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Page 1-1</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Page 1-1</a></li>
                            <li><a href="#">Page 1-2</a></li>
                            <li><a href="#">Page 1-3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Page 1-2</a></li>
                    <li><a href="#">Page 1-3</a></li>
                </ul>
            </li>
            <?php foreach ($menu as $item) {?>
            <?php if ($item['parent'] ==0) { ?>
                <li class="dropdown"><a  data-toggle="dropdown" href="#"><?php echo $item['name']?> </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($menuItem as $menuitems) {?>
                            <?php  if($item['id'] == $menuitems['parent']) {?>
                                 <li><a href="#"><?php  echo $menuitems['name']?></a></li>
                            <?php }?>
                        <?php }?>
                    </ul>
                </li>
                <?php }?>
            <?php } ?>
        </ul>
</nav>


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
