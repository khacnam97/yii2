<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'employeeName',
            'columns'=>[
                'attribute'=>'New Column',
                'value'=>'employees.name',
                'filter' => '<input type="text">',
            ],
            [
                'format' => 'raw',
//                'format' => 'html',
                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                'attribute'=>'New Column1',
                'value' => function ($data) {
                    return '<input type="checkbox" class="form-check-input" id="checkboxall">'; // $data['name'] for array data, e.g. using SqlDataProvider.
                },
                'filter' => '<input type="checkbox" class="form-check-input" id="checkboxall">',
            ],
            //OR This
//            new_column,
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    var checkboxall = $('#checkboxall').prop('checked');
    // $('#checkboxall').unload(function() {
    //
    // });
    // console.log(checkboxall);
</script>
