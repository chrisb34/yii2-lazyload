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
    public function init()
    {
        $this->setSourcePath(__DIR__ );
        if (YII_ENV == 'dev')
            $this->setupAssets('js', ['js/jcaption.js' ]);
        else
            $this->setupAssets('js', ['js/jcaption.min.js' ]);
        
        $this->setupAssets('css', ['css/caption.css' ]);
        
        parent::init();
    }
}
