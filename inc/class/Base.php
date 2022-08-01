<?php

class Base
{
    // 存储当前对象
    protected static $instance  = [];

    private function __construct()
    {
    }

    private function __clone()
    {

    }

    /**
     * @return $this
     */
    public static function getInstance()
    {
        if(empty(static::$instance[static::class])){
            static::$instance[static::class] = new static();
        }
        return static::$instance[static::class];
    }
}
