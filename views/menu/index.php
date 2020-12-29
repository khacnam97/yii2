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
<style>
.navbar-nav li:hover > ul.dropdown-menu {
    display: block;
   
}
.navbar-nav > li > .dropdown-menu {
    margin-top: 50px;
}
.dropdown-submenu {
    position:relative;
}
.children {
    display :none ;
}
.dropdown-submenu>.dropdown-menu {
    top:0;left:-100%;margin-top:-6px;
}
/* rotate caret on hover */
.dropdown-menu >li > a:hover:after {
    text-decoration: underline;
    transform: rotate(-90deg);
} 
</style>

<ul class ="navbar-nav nav-pills nav-fill">

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
<ul class ="navbar-nav nav-pills nav-fill">

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
                  
                        foreach ($list_menu as $child) {
                            echo $this->render('_item',['item' => $child ]);
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</ul>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

