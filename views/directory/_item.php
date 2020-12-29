<?php
/* @var $this yii\web\View */
/* @var $item [] */
?>

<div class="tong">
    <div class="rowx">
        <div class="columnx "><?= $item['name']?> </div>
        <div class="columnx pox"> <?= $item['countElment']?> </div>
        <div class="columnx pox1"> <?= $item['count']?></div>
    </div>

    <?php
    if (isset($item['children'])){
        foreach ($item['children'] as $child) {
            echo $this->render('_item',['item' => $child]);
        }

    }?>
</div>