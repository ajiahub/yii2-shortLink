基于yii2框架的短链接拓展
==============
基于yii2框架的短链接拓展

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require chinahub/yii2-shortlink "*"
```

or add

```
"chinahub/yii2-shortlink": "*"
```

to the require section of your `composer.json` file.


Configuration
-----

Once the extension is installed, simply config it in you main.php like this  :

```php
'controllerMap' => [
	'api' => [
		'class' => 'chinahub\shortlink\ApiController'
	],
]
```


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
http://i-web.com/api
```