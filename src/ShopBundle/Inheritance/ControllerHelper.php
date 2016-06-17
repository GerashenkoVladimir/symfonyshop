<?php

namespace ShopBundle\Inheritance;


trait ControllerHelper
{

    private static $shopConfig;

    public function getImagePath($key)
    {
        return $this->getPathMap()['uploads']['images'][$key];
    }

    private function getPathMap()
    {
        if (!isset(self::$shopConfig)) {
            self::$shopConfig = require_once __DIR__.'/../Resources/config/shopConfig.php';
        }
        return self::$shopConfig['pathMap'];
    }

}