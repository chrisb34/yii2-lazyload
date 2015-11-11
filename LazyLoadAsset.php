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
     public function init()
    {
        $this->setSourcePath(__DIR__ );
        $this->setupAssets('js', ['js/jquery.lazyload.js']);
        parent::init();
    }
    
}
