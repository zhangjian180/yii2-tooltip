<?php

namespace zhangjian180\tooltip;

use yii\web\AssetBundle;

/**
 * 提示前端资源包
 *
 * @author Zhang Jian <435222656@qq.com>
 * @since v1.0
 */
class TooltipAsset extends AssetBundle {

    public $js = [
        'js/tooltip.js'
    ];
    
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        parent::init();
    }
}
