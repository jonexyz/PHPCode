<?php

//定义类
class autoload
{
    // 设置系统错误级别
    private static function initErrorInfo()
    {
        @ini_set('error_reporting',E_ALL);	//错误级别控制
        @ini_set('display_errors',1);		//是否显示错误
    }

    // 定义目录常量
    private static function initDirConst()
    {
        define('DS',DIRECTORY_SEPARATOR); // 定义文件分隔符
        define('CORE', __DIR__ );
    }

    // 设定自动加载
    private static function initOutoLoad()
    {
        spl_autoload_register(array(__CLASS__,'loadCore')); // 加载控制器;
    }

    // 自动加载core文件夹的类文件
    private static function loadCore($clsname)
    {
        //解决basename在win与linux返回值不一致的问题
        $clsname = str_replace(['\\','/'],DS,$clsname);
        //组合文件
        $file = CORE.DS. $clsname . '.php';

        if(is_file($file)){
            include_once $file;
        }
    }

    // 加载所有func目录中的文件
    private static function loadFunc()
    {
        foreach(glob(__DIR__ . '/Func/*.php') as $func)
        {
            require_once $func;
        }
    }

    // 运行方法
    public static function run()
    {
        self::initErrorInfo();
        self::initDirConst();
        self::initOutoLoad();
        self::loadFunc();
    }
}

autoload::run();