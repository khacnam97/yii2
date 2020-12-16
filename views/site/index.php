<?php
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'My Yii Application';
$this->registerCssFile( '@web/layout/styles/layout.css' );
$this->registerJsFile( '@web/layout/scripts/jquery.min.js' );
$this->registerJsFile( '@web/layout/scripts/jquery.backtotop.js' );
$this->registerJsFile( '@web/layout/scripts/jquery.mobilemenu.js' );
$url = Yii::getAlias("@web") . '/img/';
?>
<style>
    .cut{
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 20px;
        -webkit-line-clamp: 3;
        display: -webkit-box;
        -webkit-box-orient: vertical;
    }
</style>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>
    <div class="wrapper row2">
        <section id="latest" class="hoc container clear">
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
                <h6 class="heading">Ligula mi fringilla vel hendrerit</h6>
                <p>Et malesuada vitae risus in a enim in metus ultrices tristique</p>
            </div>
            <ul class="nospace group">
                <?=
                ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_item',
                    'options' => ['class' => 'row']
                ]);
                ?>
            </ul>
            <!-- ################################################################################################ -->
        </section>
    </div>

</div>
