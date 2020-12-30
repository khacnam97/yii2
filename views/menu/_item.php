<?php
/* @var $this yii\web\View */
/* @var $item [] */

?>

<li class="dropdown-submenu"> <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $item['name'] ?></a>

    <?php
    
    if (isset($item['children'])){
        
        echo '<ul class ="dropdown-menu">';
        foreach ($item['children'] as $child) {
            echo $this->render('_item',['item' => $child]);
        }
        echo '</ul>';

    }?>
</li>