长文本鼠标移入以tooltip气泡显示所有内容
=======================
长文本截取显示，鼠标移入并以tooltip气泡显示所有内容，支持换行

```composer require zhangjian180/yii2-tooltip:dev-master```

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist zhangjian180/yii2-tooltip "dev-master"
```

or add

```
"zhangjian180/yii2-tooltip": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \zhangjian180\tooltip\Tooltip::widget([
    'placement' => 'top',
    'length' => 10,
    'content' => '长文本截取显示，鼠标移入并以tooltip气泡显示所有内容，支持换行',
]); ?>```