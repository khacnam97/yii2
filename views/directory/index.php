<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $list_cat yii\web\View */
/* @var $foder yii\web\View */
/* @var $searchModel app\models\DirectorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Directories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="directory-index">
    <ul>
        <?php
        var_dump ($foder);
        foreach($foder as $item1){
            // if (){
            //     echo $item1['name'];
            // }
            echo $item1['name'];
        }
        foreach($list_cat as $item){
            ?>
            <li><a href=""><?php echo str_repeat('---', $item['level'] ).$item['name']; ?></a>.</li>
            <?php
        }
        ?>

    </ul>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Directory', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parentId',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
