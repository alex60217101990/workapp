<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 23.04.2018
 * Time: 13:01
 */

namespace modules;


class MyAutoload
{
    public static $dir;
    public function __construct()
    {
        MyAutoload::$dir = $_SERVER['DOCUMENT_ROOT'] = $_SERVER['DOCUMENT_ROOT'] ?: dirname(__FILE__);
    }

    public static function loadControllers($aClassName){
        $aClassFilePath = MyAutoload::$dir . DIRECTORY_SEPARATOR . 'app'
            . DIRECTORY_SEPARATOR . 'controllers' . strtolower($aClassName) . '.php';
        if (file_exists($aClassFilePath)) {
            require_once $aClassFilePath;
            return true;
        }
        return false;
    }

    public static function loadModules($aClassName){
        //функция автозагруки, загружающая классы из папки classes:
        $aClassFilePath = MyAutoload::$dir . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . strtolower($aClassName) . '.php';
        if (file_exists($aClassFilePath)) {
            require_once $aClassFilePath;
            return true;
        }
        return false;
    }
    public static function loadModels($aClassName){
        $aClassFilePath = MyAutoload::$dir . DIRECTORY_SEPARATOR . 'app'
            . DIRECTORY_SEPARATOR . 'models' . strtolower($aClassName) . '.php';
        if (file_exists($aClassFilePath)) {
            require_once $aClassFilePath;
            return true;
        }
        return false;
    }
    public static function loadViews($aClassName){
        $aClassFilePath = MyAutoload::$dir . DIRECTORY_SEPARATOR . 'app'
            . DIRECTORY_SEPARATOR . 'views' . strtolower($aClassName) . '.php';
        if (file_exists($aClassFilePath)) {
            require_once $aClassFilePath;
            return true;
        }
        return false;
    }

}