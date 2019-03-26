<?php

namespace HughCube\YiiWidgets;

use yii\web\View;

class JsBlock extends \yii\widgets\Block
{
    public $key = null;

    public $pos = View::POS_END;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $block = trim(ob_get_clean());
        $jsBlockPattern = '|^<script[^>]*>(?P<block_content>.+?)</script>$|is';
        if (preg_match($jsBlockPattern, $block, $matches)){
            $block = $matches['block_content'];
        }
        $this->view->registerJs($block, $this->pos, $this->key);
    }
}
