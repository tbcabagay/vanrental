<?php

namespace app\modules\administrator;

/**
 * administrator module definition class
 */
class Module extends \yii\base\Module
{
    public $layout = 'main';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\administrator\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
