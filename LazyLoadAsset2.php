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
    public $depends = [
            'yii\web\YiiAsset',
    ];
    
    public function init()
    {
        $this->sourcePath=__DIR__ . '/assets';
        if (YII_ENV == 'dev')
            $this->js = ['js/jcaption.js'];
        else
            $this->js = ['js/jcaption.min.js' ];
        
        $this->css = ['css/caption.css'];
        
        parent::init();
    }
}
