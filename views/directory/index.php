<?php

use app\models\File;
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

<style>
    .directory-index {
        border-right: 1px solid;
        border-bottom: 1px solid;
    }
    .tong{
        border-left: 1px solid;

        border-top: 1px solid;
        margin-left: 20px;
    }
    .directory-index >.tong {
        margin-left: 0px;
    }
    .rowx {
        /*margin-left: 15px;*/
        display: table;
        position: relative;
        width: 100%; /*Optional*/
        table-layout: fixed; /*Optional*/
        border-spacing: 10px; /*Optional*/
    }
    .columnx {
        display: table-cell;
        width: 200px;
    }
    .pox{
        border-left: 1px solid;
        /*border: 0.5px solid;*/
        right: 199px;
        position: absolute;
        height: 41px;
        margin-top: -10px;
    }
    .pox1{
        /*border: 0.5px solid;*/
        border-left: 1px solid;
        right: 0px;
        position: absolute;
        height: 41px;
        margin-top: -10px;
    }
    .columnx span{
        margin-left: 30px;
    }
    .header-table{
        border-top: 1px solid;
        border-left: 1px solid;
        /*margin-left: 20px;*/
    }
</style>
<div class="directory-index">

     <div class="header-table">
         <div class="rowx">
             <div class="columnx "> Tên</div>
             <div class="columnx pox">Số file </div>
             <div class="columnx pox1">Tổng Số file</div>
         </div>
     </div>
        <?php
        foreach ($foder as $child) {
            echo $this->render('_item',['item' => $child]);
        }
        ?>





</div>

<script type="text/javascript">

</script>
