<?php
/* @var $this yii\web\View */
/* @var $item [] */
?>

<ul class="nav navbar-nav">
    <li class="dropdown">
        <li class="columnx "><?= $item['name']?> </li>
    </li>


    <?php
    if (isset($item['children'])){
        foreach ($item['children'] as $child) {
            echo $this->render('_item',['item' => $child]);
        }

    }?>
</ul>