<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */
/* @var $photos  */
$this->registerCssFile( '@web/layout/styles/layout.css' );
$this->registerJsFile( '@web/layout/scripts/jquery.min.js' );
$this->registerJsFile( '@web/layout/scripts/jquery.backtotop.js' );
$this->registerJsFile( '@web/layout/scripts/jquery.mobilemenu.js' );

//$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Photos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="wrapper row3">
     <main class="hoc container clear">
         <ul class="nospace group overview">
            <?php
                foreach ($photos as $photo){
            ?>
                <li class="one_third">
                        <img style=" height: 200px;" src="<?= Yii::$app->request->baseUrl . '/uploads/' . $photo['photo_path'] ?>" class="card-img-top">
                </li>
            <?php
                }
            ?>
         </ul>
     </main>

</div>
