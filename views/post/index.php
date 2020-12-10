<?php

use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Employee;

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
        <?= Html::a('Create ', ['create'], ['class' => 'btn btn-success']) ?>
        <?php
            Modal::begin([
                'header' => '<h2>Show Modal</h2>',
                'toggleButton' => false,
                'id' => 'modal-opened',
                'size' => 'modal-lg'
            ]);
            ActiveForm::begin([
                'action' => 'vote/vote',
                'method' => 'post',
                'id' => 'form'
            ]);
                echo '<div class="row">';
                    echo '<div class="form-group col-md-6">';

                        echo Html::input(
                            'type: text',
                            'name',
                            '',
                            [
                                'placeholder' => 'Name',
                                'class' => 'form-control'
                            ]
                        );
                    echo '</div>';
                    echo '<div class="form-group col-md-6">';
                        echo Html::input(
                            'type: text',
                            'title',
                            '',
                            [
                                'placeholder' => 'Title',
                                'class' => 'form-control'
                            ]
                        );
                    echo '</div>';
                    echo '<div class="form-group col-md-6">';
                        echo Html::activeDropDownList($model, 'employee_id',
                            ArrayHelper::map(Employee::find()->all(), 'id', 'name'), array('class'=>'form-control'));
                    echo '</div>';
                echo '</div>';

                echo Html::submitButton(
                    '<span class="glyphicon glyphicon-plus"></span>',
                    [
                        'class' => 'btn btn-success',
                    ]
                );
            ActiveForm::End();



        Modal::end();
        ?>
        <?= Html::button('Open Modal', ['id' => 'modal-btn', 'class' => 'btn btn-success']) ?>

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
    $('#modal-btn').on('click', function (event) {
        $('#modal-opened').modal('show');
    });
    // var checkboxall = $('#checkboxall').prop('checked');
    // $('#checkboxall').unload(function() {
    //
    // });
    // console.log(checkboxall);

</script>
