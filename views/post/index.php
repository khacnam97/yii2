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
/* @var $model app\models\Post */
$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile( '@web/css/post.css' );
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
        <?php
            Modal::begin([
                'header' => '<h2>Show Modal</h2>',
                'toggleButton' => false,
                'id' => 'modal-opened',
                'size' => 'modal-lg'
            ]);

                echo '<div class="row">';
                    echo '<div class="form-group col-md-6">';

                        echo Html::input(
                        'type: text',
                        'name',
                        '',
                        [
                        'placeholder' => 'Name',
                        'class' => 'form-control',
                         'id' => 'name'
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
                        'class' => 'form-control',
                        'id' => 'title'
                        ]
                        );
                        echo '</div>';
                    echo '<div class="form-group col-md-6">';
                        echo Html::activeDropDownList($model, 'employee_id',
                        ArrayHelper::map(Employee::find()->all(), 'id', 'name'), array('class'=>'form-control','id' => 'employee_id'));
                        echo '</div>';
                    echo '</div>';

                echo Html::submitButton(
                '<span class="glyphicon glyphicon-plus"></span>',
                [
                'class' => 'btn btn-success',
                'id' => 'btn_add_post'
                ]
                );


        Modal::end();
        ?>
        <?= Html::button('Open Modal', ['id' => 'modal-btn', 'class' => 'btn btn-success']) ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,

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
    $('#btn_add_post').on('click', function (event) {
        console.log($("#employee_id").val());
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/post/create' ?>',
            type: 'post',
            data: {
                name: $("#name").val() ,
                title:$("#title").val() ,
                employee_id:$("#employee_id").val() ,
                _csrf : '<?=Yii::$app->request->getCsrfToken()?>'
            },
            success: function (data) {
                console.log(data);
                $('#modal-opened').modal('hide');
            }
        });
    });

    // var checkboxall = $('#checkboxall').prop('checked');
    // $('#checkboxall').unload(function() {
    //
    // });
    // console.log(checkboxall);

</script>
