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
    public $content;
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
    public $copyStyle = true;
    //Should class be moved from img element to wrapper
    public $moveClass = true;
    //Strip inline style from image
    public $removeStyle = true;
    //Strip align attribute from image
    public $removeAlign = true;
    //Assign the value of the image's align attribute as a class to the wrapper
    public $copyAlignmentToClass = true;
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

    private $bundlePath;
    
    public function init(){
            parent::init();
            $this->registerAssets();
    }
    
    public function run() {
        $dom = new \DOMDocument;
        $cp = $this->contentProperty;
        
        

        if ( empty( $this->content))
            $this->content = $this->model->$cp;
        
        $dom->loadHTML($this->content);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $image) {
                $image->setAttribute('data-src', $image->getAttribute('src'));
                $image->setAttribute('src',$this->bundlePath. '/images/FFFFFF.png');
                $class = (empty( $image->getAttribute('class'))) ? 'lazy m20' : $image->getAttribute('class') . ' lazy m20';
                $image->setAttribute('class',  $class);
                $image->setAttribute('style','background: url('.$this->bundlePath.'/images/loading.gif) center center no-repeat;');
        }
        return $dom->saveHTML();
    }
    
    public function renderTrueFalse( $value )
    {
        return ($value)? 'true' : 'false';
    }
    /**
     * Registers the asset bundle and locale
     */
    public function registerAssetBundle()
    {
        $view = $this->getView();
        $bundle=LazyLoadAsset::register($view);
        LazyLoadAsset2::register($view);
        $this->bundlePath = $bundle->baseUrl;
    }
    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        $this->registerAssetBundle();
    
        $js = "";
        /**
         * 
         $js = ' 
                $("img.lazy2").lazyload({
                '.(($this->fade) ? ' 
                    effect : "fadeIn", ' : '') .
                   '
                       skip_invisible : true
                });
            ';
        **/
        $js .= " 
        $('img.{$this->jcaptionClass}').jcaption({
            wrapperElement	: '".	$this->wrapperElement	."',
            wrapperClass	: '".	$this->wrapperClass	."',
            captionElement	: '".	$this->captionElement	."',
            imageAttr           : '".	$this->imageAttr	."',
            requireText         : ".	$this->renderTrueFalse($this->requireText)	.",
            copyStyle           : ".	$this->renderTrueFalse($this->copyStyle)	.",
            removeStyle         : ".	$this->renderTrueFalse($this->removeStyle)	.",
            moveClass           : ".	$this->renderTrueFalse($this->moveClass)	.",
            removeAlign         : ".	$this->renderTrueFalse($this->removeAlign)	.",
            copyAlignmentToClass :".	$this->renderTrueFalse($this->copyAlignmentToClass)	.",
            copyFloatToClass	: ".	$this->renderTrueFalse($this->copyFloatToClass)	.",
            autoWidth           : ".	$this->renderTrueFalse($this->autoWidth)	.",
            animate             : ".	$this->renderTrueFalse($this->animate)	.",
            show                : ".	$this->renderTrueFalse($this->show)	.",
            showDuration	: " .	$this->showDuration	.",
            hide                :  ".	$this->renderTrueFalse($this->hide)	.",
            hideDuration	: " .	$this->hideDuration	." 
                });
        ";
        
        $this->getView()->registerJs($js);
        
    }
}
 
