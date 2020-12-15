<?php
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'My Yii Application';
$this->registerCssFile( '@web/layout/styles/layout.css' );
$this->registerJsFile( '@web/layout/scripts/jquery.min.js' );
$this->registerJsFile( '@web/layout/scripts/jquery.backtotop.js' );
$this->registerJsFile( '@web/layout/scripts/jquery.mobilemenu.js' );
$url = Yii::getAlias("@web") . '/img/';
?>
<style>
    p{
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 20px;
        -webkit-line-clamp: 4;
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
                <li class="one_third first">
                    <article>
                        <figure><a href="#"><img src="images/demo/348x261.png" alt=""></a>
                            <figcaption>
                                <time datetime="2045-04-06T08:15+00:00"><strong>06</strong> <em>Apr</em></time>
                            </figcaption>
                        </figure>
                        <div class="excerpt">
                            <h6 class="heading">Integer aliquet dignissim tellus</h6>
                            <ul class="nospace meta">
                                <li><i class="fas fa-user"></i> <a href="#">Admin</a></li>
                                <li><i class="fas fa-tags"></i> <a href="#">Tag 1</a>, <a href="#">Tag 2</a></li>
                            </ul>
                            <p>Vestibulum consequat praesent bibendum vehicula mi sed fermentum erat sit amet imperdiet dictum enim lectus [<a href="#">&hellip;</a>]</p>
                            <footer><a class="btn" href="#">Read More</a></footer>
                        </div>
                    </article>
                </li>
                <li class="one_third">
                    <article>
                        <figure><a href="#"><img style="display: block" src="images/demo/348x261.png" alt=""></a>
                            <figcaption>
                                <time datetime="2045-04-05T08:15+00:00"><strong>05</strong> <em>Apr</em></time>
                            </figcaption>
                        </figure>
                        <div class="excerpt">
                            <h6 class="heading">Tortor tempus metus neque</h6>
                            <ul class="nospace meta">
                                <li><i class="fas fa-user"></i> <a href="#">Admin</a></li>
                                <li><i class="fas fa-tags"></i> <a href="#">Tag 1</a>, <a href="#">Tag 2</a></li>
                            </ul>
                            <p>Vel elit integer in orci vitae lacus ultricies mattis suspendisse congue sapien vel massa posuere lacinia [<a href="#">&hellip;</a>]</p>
                            <footer><a class="btn" href="#">Read More</a></footer>
                        </div>
                    </article>
                </li>
                <li class="one_third">
                    <article>
                        <figure><a href="#"><img src="images/demo/348x261.png" alt=""></a>
                            <figcaption>
                                <time datetime="2045-04-04T08:15+00:00"><strong>04</strong> <em>Apr</em></time>
                            </figcaption>
                        </figure>
                        <div class="excerpt">
                            <h6 class="heading">Phasellus a ipsum eget odio</h6>
                            <ul class="nospace meta">
                                <li><i class="fas fa-user"></i> <a href="#">Admin</a></li>
                                <li><i class="fas fa-tags"></i> <a href="#">Tag 1</a>, <a href="#">Tag 2</a></li>
                            </ul>
                            <p>Fringilla tincidunt proin velit aliquam erat volutpat etiam elementum eros ut ante fusce a lacus ac neque [<a href="#">&hellip;</a>]</p>
                            <footer><a class="btn" href="#">Read More</a></footer>
                        </div>
                    </article>
                </li>
            </ul>
            <!-- ################################################################################################ -->
        </section>
    </div>
    <div class="body-content">
        <?=
        ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_item',
            'options' => ['class' => 'row']
        ]);
        ?>
    </div>
</div>
