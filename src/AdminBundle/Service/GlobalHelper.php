<?php

namespace AdminBundle\Service;


use Symfony\Component\HttpKernel\Kernel;

class GlobalHelper
{
    private static $kernel;

    /**
     * @return mixed
     */
    public static function getContainer()
    {
        return self::$kernel->getContainer();
    }

    /**
     * @param mixed $kernel
     */
    public static function setKernel(Kernel $kernel)
    {
        self::$kernel = $kernel;
    }

    
}