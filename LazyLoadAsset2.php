<?php
/**
 * -----------------------------------------------------------------------------
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * -----------------------------------------------------------------------------
 */

namespace chrisb34\lazyload;

use yii\web\AssetBundle;
use Yii;

/**
 * -----------------------------------------------------------------------------
 * @author Chris Backhouse  
 *
 * @since 2.0
 * -----------------------------------------------------------------------------
 */
class LazyLoadAsset2 extends AssetBundle
{
    public $sourcePath = '@frontend/components';
    public $css = [
        'css/caption.css',
    ];
    public $js = [
    	(YII_ENV == 'dev')? 'js/jcaption.js' : 'js/jcaption.min.js'
    ];
    public $depends = [
        'frontend\components\LazyLoadAsset'
    ];
}


