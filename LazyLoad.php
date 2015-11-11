<?php

namespace chrisb34\lazyload;

/**
 * Lazyload images and apply captions
 *
 */
class LazyLoad extends \yii\base\Widget
{

    public $model;
    public $contentProperty;
    public $fade = true;
    //
    // jcaption Options
    public $jcaptionClass = 'jcaption';
    //Element to wrap the image and caption in
    public $wrapperElement = 'div';
    //Class for wrapper element
    public $wrapperClass = 'caption';
    //Caption Element
    public $captionElement = 'p';
    //Attribute of image to use as caption source
    public $imageAttr = 'alt';
    //If true; it checks to make sure there is caption copy before running on each image
    public $requireText = true;
    //Should inline style be copied from img element to wrapper
    public $copyStyle = false;
    //Strip inline style from image
    public $removeStyle = true;
    //Strip align attribute from image
    public $removeAlign = true;
    //Assign the value of the image's align attribute as a class to the wrapper
    public $copyAlignmentToClass = false;
    //Assign the value of the image's float value as a class to the wrapper
    public $copyFloatToClass = true;
    //Assign a width to the wrapper that matches the image
    public $autoWidth = true;
    //Animate on hover over the image
    public $animate = false;
    //Show Animation
    public $show = "{opacity : 'show'}";
    public $showDuration = 200;
    //Hide Animation
    public $hide = "{opacity : 'hide'}";
    public $hideDuration = 200	;
    
    public function init(){
            parent::init();
            $this->registerAssets();
    }
    
    public function run() {
        $dom = new \DOMDocument;
        $cp = $this->contentProperty;
        $dom->loadHTML($this->model->$cp);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $image) {
                $image->setAttribute('data-src', $image->getAttribute('src'));
                $image->setAttribute('src', '/images/FFFFFF.png');
                $class = (empty( $image->getAttribute('class'))) ? 'lazy m20' : $image->getAttribute('class') . ' lazy m20';
                $image->setAttribute('class',  $class);
                $image->setAttribute('style','background: url(/images/loading.gif) center center no-repeat;');
        }
        Yii::info($dom->saveHTML());
        return $dom->saveHTML();
    }
    
    /**
     * Registers the asset bundle and locale
     */
    public function registerAssetBundle()
    {
        $view = $this->getView();
        LazyLoadAsset::register($view);
        LazyLoadAsset2::register($view);
    }
    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        $this->registerAssetBundle();

        $js = ' 
                $("img.lazy2").lazyload({
                '.(($this->fade) ? ' 
                    effect : "fadeIn", ' : '') .
                   '
                       skip_invisible : true
                });
            ';
        
        $js .= " 
        $('img.{$this->jcaptionClass}').jcaption({
            wrapperElement	: '".	$this->wrapperElement	."',
            wrapperClass	: '".	$this->wrapperClass	."',
            captionElement	: '".	$this->captionElement	."',
            imageAttr           : '".	$this->imageAttr	."',
            requireText         : '".	$this->requireText	."',
            copyStyle           : '".	$this->copyStyle	."',
            removeStyle         : '".	$this->removeStyle	."',
            removeAlign         : '".	$this->removeAlign	."',
            copyAlignmentToClass : '".	$this->copyAlignmentToClass	."',
            copyFloatToClass	: '".	$this->copyFloatToClass	."',
            autoWidth           : '".	$this->autoWidth	."',
            animate             : '".	$this->animate	."',
            show                :  ".	$this->show	.",
            showDuration	: " .	$this->showDuration	.",
            hide                :  ".	$this->hide	.",
            hideDuration	: " .	$this->hideDuration	." 
                });
        ";
        
        $this->getView()->registerJs($js);
        
    }
}
 
