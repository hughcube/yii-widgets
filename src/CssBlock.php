<?php

namespace HughCube\YiiWidgets;

class CssBlock extends \yii\widgets\Block
{
    public $key = null;

    public $options = [];

    /**
     * @inheritdoc
     */
    public function run()
    {
        $block = trim(ob_get_clean());
        $cssBlockPattern = '|^<style[^>]*>(?P<block_content>.+?)</style>$|is';
        if (preg_match($cssBlockPattern, $block, $matches)){
            $block = $matches['block_content'];
        }
        $this->view->registerCss($block, $this->options, $this->key);
    }
}
