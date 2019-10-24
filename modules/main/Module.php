<?php

namespace app\modules\main;

use Yii;
use yii\web\View;

/**
 * main module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\main\controllers';
    public $layout = 'main';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
    }
}
