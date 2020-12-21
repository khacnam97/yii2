<?php
use yii\widgets\ListView;
use yii\bootstrap\Carousel;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $photos  */

$this->title = 'My Yii Application';
$this->registerCssFile( '@web/layout/styles/layout.css' );
$this->registerJsFile( '@web/layout/scripts/jquery.min.js' );
$this->registerJsFile( '@web/layout/scripts/jquery.backtotop.js' );
$this->registerJsFile( '@web/layout/scripts/jquery.mobilemenu.js' );
$url = Yii::getAlias("@web") . '/img/';
?>
<style>
    .cut{
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 20px;
        -webkit-line-clamp: 3;
        display: -webkit-box;
        -webkit-box-orient: vertical;
    }
</style>
<div class="site-index">
    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>
    <div class="wrapper row2">
        <section id="latest" class="hoc container clear">
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
                <h6 class="heading">Ligula mi fringilla vel hendrerit</h6>
                <p>Et malesuada vitae risus in a enim in metus ultrices tristique</p>
            </div>
            <ul class="nospace group">
                <?=
                ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_item',
                    'options' => ['class' => 'row']
                ]);
                ?>
            </ul>
            <!-- ################################################################################################ -->
        </section>
    </div>
<!--    <div class="wrapper row3">-->
        <?php
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
                    ],
                    ]
                ]);
        ?>
<!--    </div>-->

    <div class="wrapper gradient">
        <section class="hoc container clear">
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
                <h6 class="heading">Vitae congue at urna suspendisse</h6>
                <p>Vestibulum nisi ut lectus proin lectus ante fermentum sed</p>
            </div>
            <div class="group center">
                <article class="one_third first"><a class="ringcon btmspace-50" href="#"><i class="fas fa-eraser"></i></a>
                    <h6 class="heading">Bibendum rutrum congue</h6>
                    <p>Tortor proin sagittis mauris ac odio morbi ut massa donec suscipit eros ut justo etiam non orci nullam at tortor maecenas eu.</p>
                </article>
                <article class="one_third"><a class="ringcon btmspace-50" href="#"><i class="fas fa-dolly-flatbed"></i></a>
                    <h6 class="heading">Neque lacinia ullamcorper</h6>
                    <p>Posuere etiam in arcu nam sodales euismod tellus quisque nunc mauris vehicula in ultrices tempor imperdiet vitae sapien morbi.</p>
                </article>
                <article class="one_third"><a class="ringcon btmspace-50" href="#"><i class="fas fa-text-width"></i></a>
                    <h6 class="heading">Accumsan dignissim libero</h6>
                    <p>Suspendisse potenti vestibulum mattis suspendisse potenti praesent nec ligula ut non ante sit amet est luctus dictum duis magna.</p>
                </article>
            </div>
            <!-- ################################################################################################ -->
        </section>
    </div>

    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
                <h6 class="heading">IMG</h6>
                <p>Mauris tempor aenean pretium sem et luctus semper justo velit</p>
            </div>
            <ul class="nospace group overview">
                <?php
                foreach ($photos as $photo){
                //                                    var_dump($photo['photo_path']);
                ?>
                <li class="one_third">
                    <figure><a href="<?= Url::toRoute(['site/view-photo', 'id' =>$photo['group']])?>"><img style="height: 261px; width: 348px;" src="<?= Yii::$app->request->baseUrl . '/uploads/' . $photo['photo_path'] ?>" alt=""></a>
                        <figcaption>
                            <h6 class="heading"><?=$photo['title']?></h6>
                            <p>Congue quam erat et dui morbi at sapien non enim blandit.</p>
                        </figcaption>
                    </figure>
                </li>
                <?php }?>
            </ul>
            <!-- ################################################################################################ -->
            <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>

</div>
