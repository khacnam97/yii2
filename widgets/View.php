<?php
namespace app\widgets;

use Yii;

class View extends \yii\web\View
{

    public function registerCssFile($url, $options = [], $key = null)
    {

        $version = '?v=' .\Yii::$app->params['version'];
        if (strpos($url, $version) == false) {
            $url = $url . $version;
        }
        parent::registerCssFile($url, $options, $key);
    }

    public function registerJsFile($url, $options = [], $key = null)
    {
        $version = '?v=' . \Yii::$app->params['version'];
        if (strpos($url, $version) == false) {
            $url = $url . $version;
        }
        parent::registerJsFile($url, $options, $key);
    }
}
