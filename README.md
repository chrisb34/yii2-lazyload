Lazy Load images and apply captions
===================================
Yii2 helper to lazy load images and/or to convert image captions into div markups (like wordpress)

*Note: This project is still in DEV and is therefore not fully tested / stable

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist chrisb34/yii2-lazyload "*"
```

or add

```
"chrisb34/yii2-lazyload": "*"
```

to the require section of your `composer.json` file.


Usage
-----

In a view add the lazyload widget as follows;
```php
use chrisb34/lazyload;

echo LazyLoad::widget([
        // the data model
        'model' => $model
        // the model attribute that holds the html to convert
        'contentProperty' => 'attributeName',

        ... other config options - see source code 
    ]) 
```
see http://yii2.chris-backhouse.com for more details

* Thanks to

This uses the jquery plugins:

Lazy Load Plugin for jQuery - Mika Tuupola
http://www.appelsiini.net/projects/lazyload

jCaption: jQuery Image Captions with Customizable Markup, Style and Animation - Joel Sutherland
http://www.newmediacampaigns.com/blog/jcaption-a-jquery-plugin-for-simple-image-captions#download
