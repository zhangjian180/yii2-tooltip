<?php

namespace zhangjian180\tooltip;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\StringHelper;

/**
 * tooltip提示显示小部件
 * 长文本截取显示，鼠标移入并以tooltip气泡显示所有内容，支持换行
 *
 * ```php
 * echo Tooltip::widget([
 *      'placement' => 'top',
 *      'length' => 10,
 *      'content' => '长文本截取显示，鼠标移入并以tooltip气泡显示所有内容，支持换行',
 *   ]);
 * ```
 *
 * @author Zhang Jian <435222656@qq.com>
 * @version 1.0
 */
class Tooltip extends Widget
{

    /**
     * @var string $content 文本内容
     */
    public $content;

    /**
     * @var int $length 截取长度
     */
    public $length = 10;

    /**
     * @var $suffix String to append to the end of truncated string.
     */
    public $suffix = '...';

    /**
     * @var string $placement 气泡方向
     */
    public $placement = 'top';

    /**
     * @var string $beautifyContent 美化后的文本内容
     */
    private $beautifyContent;

    /**
     * 初始化数据
     */
    public function init()
    {
        parent::init();
        $this->beautifyContent = implode('<br/>', static::mbStrSplit($this->content, 35));
    }

    public function run()
    {
        $this->registerJs();
        echo $this->setHtml();
    }

    /**
     * 设置视图
     */
    public function setHtml()
    {
        return Html::tag('span', StringHelper::truncate($this->content, $this->length, $this->suffix),
            ['data-toggle' => 'tooltip', 'data-placement' => $this->placement,
                'data-html' => 'true', 'title' => $this->beautifyContent]);
    }

    /**
     * 载入JS资源
     */
    public function registerJs()
    {
        $js = <<<JS
        $('[data-toggle="tooltip"]').tooltip(); 
JS;
        $view = $this->getView();
        TooltipAsset::register($view);
        $view->registerJs($js);
    }

    /**
     * 中文字符串截取成新的数组
     * @param $str
     * @param int $splitLength
     * @param string $charset
     * @return array|bool
     */
    public static function mbStrSplit($str, $splitLength = 1, $charset = "UTF-8")
    {
        if (func_num_args() == 1) {
            return preg_split('/(?<!^)(?!$)/u', $str);
        }
        if ($splitLength < 1) return false;
        $len = mb_strlen($str, $charset);
        $arr = array();
        for ($i = 0; $i < $len; $i += $splitLength) {
            $s = mb_substr($str, $i, $splitLength, $charset);
            $arr[] = $s;
        }
        return $arr;
    }
}