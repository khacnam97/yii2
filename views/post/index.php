<?php

use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Employee;
use yii\widgets\LinkPager;
//use yii\jui\DatePicker;
use yii\jui\Accordion;
use yii\jui\AutoComplete;
use yii\jui\Dialog;
use yii\jui\Draggable;
use yii\jui\Droppable;
use dosamigos\datepicker\DatePicker;
use yii\bootstrap\Button;
use yii\bootstrap\ButtonDropdown;
use yii\bootstrap\ButtonGroup;
use yii\bootstrap\Carousel;
use yii\bootstrap\Collapse;
use yii\bootstrap\Dropdown;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Post */
$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile( '@web/css/post.css' );
//echo DatePicker::widget([
//    'name'  => 'from_date',
//    'value'  => '01-02-2020',
//    //'language' => 'ru',
//    'dateFormat' => 'yyyy-MM-dd',
//]);
//Dialog::begin([
//    'clientOptions' => [
//        'modal' => true,
//    ],
//]);
//
//echo 'Dialog contents here...';
//
//Dialog::end();
//Droppable::begin([
//    'clientOptions' => ['accept' => '.special'],
//]);
//
//echo 'Droppable body here...';
//
//Droppable::end();

echo Collapse::widget([
    'items' => [
        // equivalent to the above
        [
            'label' => 'Collapsible Group Item #1',
            'content' => 'Anim pariatur cliche...',
            // open its content by default
            'contentOptions' => ['class' => 'in']
        ],
        // another group item
        [
            'label' => 'Collapsible Group Item #1',
            'content' => 'Anim pariatur cliche...',
//            'contentOptions' => [...],
//            'options' => [...],
        ],
        // if you want to swap out .panel-body with .list-group, you may use the following
        [
            'label' => 'Collapsible Group Item #1',
            'content' => [
                'Anim pariatur cliche...',
                'Anim pariatur cliche...'
            ],
//            'contentOptions' => [...],
//            'options' => [...],
            'footer' => 'Footer' // the footer label in list-group
        ],
    ]
]);

echo Carousel::widget([
    'items' => [
        // the item contains only the image
        '<img width="100%" src="https://znews-photo.zadn.vn/w1024/Uploaded/qhj_yvobvhfwbv/2018_07_18/Nguyen_Huy_Binh1.jpg"/>',
        // equivalent to the above
        ['content' => '<img width="100%" src="https://halotravel.vn/wp-content/uploads/2020/07/thach_trangg_101029297_573874646879779_1794923475739360981_n.jpg"/>'],
        // the item contains both the image and the caption
        [
            'content' => '<img width="100%" src="https://znews-photo.zadn.vn/w1024/Uploaded/qhj_yvobvhfwbv/2018_07_18/Nguyen_Huy_Binh1.jpg"/>',
            'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
            'options' => ['class' => 'carousel'],
        ],
    ]
]);
echo ButtonDropdown::widget([
    'label' => 'Action',
    'dropdown' => [
        'items' => [
            ['label' => 'DropdownA', 'url' => '/'],
            ['label' => 'DropdownB', 'url' => '#'],
        ],
    ],
]);

echo Button::widget([
    'label' => 'Action',
    'options' => ['class' => 'btn-lg'],
]);
Draggable::begin([
    'clientOptions' => ['grid' => [50, 20]],
]);

echo 'Draggable contents here...';

Draggable::end();
echo AutoComplete::widget([
    'name' => 'country',
    'clientOptions' => [
        'source' => ['USA', 'RUS'],
    ],
    'options' =>[
            'class' => 'form-control'
    ]
]);
echo Accordion::widget([
    'items' => [
        [
            'header' => 'Section 1',
            'content' => 'Mauris mauris ante, blandit et, ultrices a, suscipit eget...',
        ],
        [
            'header' => 'Section 2',
            'headerOptions' => ['tag' => 'h3'],
            'content' => 'Sed non urna. Phasellus eu ligula. Vestibulum sit amet purus...',
            'options' => ['tag' => 'div'],
        ],
    ],
    'options' => ['tag' => 'div'],
    'itemOptions' => ['tag' => 'div'],
    'headerOptions' => ['tag' => 'h3'],
    'clientOptions' => ['collapsible' => false],
]);
?>
<?= DatePicker::widget([
    'name' => 'Test',
    'value' => '02-16-2012',
    'template' => '{addon}{input}',
    'clientOptions' => [
        'autoclose' => true,
        'format' => 'dd-M-yyyy'
    ]
]);?>
<div class="dropdown">
    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Label <b class="caret"></b></a>
    <?php
    echo Dropdown::widget([
        'items' => [
            ['label' => 'DropdownA', 'url' => '/'],
            ['label' => 'DropdownB', 'url' => '#'],
        ],
    ]);
    ?>
</div>
<div class="post-index">
    <?= yii\jui\DatePicker::widget(['name' => 'attributeName', 'dateFormat' => 'yyyy-MM-dd', 'value' => '02-03-2020','options' => ['class' => 'form-control']]) ?>


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
                        ArrayHelper::map(Employee::find()->all(), 'id', 'name'),

                            array('prompt'=>'---Select---','class'=>'form-control','id' => 'employee_id'));
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
            'title',
            'content',
            'employeeName',
            'imgPathName',
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
