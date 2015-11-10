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
class LazyLoadAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery-lazyload';
    public $css = [
        //'css/site.css',
    ];
    public $js = [
    	'jquery.lazyload.js',
        //'js/googleapis.js'
    ];
    public $depends = [
        'frontend\assets\AppAsset',
        'frontend\assets\RobbyBlueAsset',
    ];
}

