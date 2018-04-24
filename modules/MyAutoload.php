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
            . DIRECTORY_SEPARATOR . 'controllers' .DIRECTORY_SEPARATOR. $aClassName . '.php';
        //var_dump($aClassFilePath);
        if (file_exists($aClassFilePath)) {
            require_once $aClassFilePath;
            return true;
        }
        return false;
    }

    public static function loadModules($aClassName){
        //функция автозагруки, загружающая классы из папки classes:
        $aClassFilePath = MyAutoload::$dir . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . $aClassName . '.php';
        if (file_exists($aClassFilePath)) {
            require_once $aClassFilePath;
            return true;
        }
        return false;
    }
    public static function loadModels($aClassName){
        $aClassFilePath = MyAutoload::$dir . DIRECTORY_SEPARATOR . 'app'
            . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . $aClassName . '.php';
        if (file_exists($aClassFilePath)) {
            require_once $aClassFilePath;
            return true;
        }
        return false;
    }
    public static function loadViews($aClassName){
        $aClassFilePath = MyAutoload::$dir . DIRECTORY_SEPARATOR . 'app'
            . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $aClassName . '.php';
        if (file_exists($aClassFilePath)) {
            require_once $aClassFilePath;
            return true;
        }
        return false;
    }

    public static function loadRoutes(){
        $aClassFilePath = MyAutoload::$dir . DIRECTORY_SEPARATOR . 'Routes'
            . DIRECTORY_SEPARATOR . 'Routes.php';
        if (file_exists($aClassFilePath)) {
            require_once $aClassFilePath;
            return true;
        }
        return false;
    }

    public static function AutoLoad(){
        spl_autoload_register(function ($file_name){
            $name = preg_replace('~(.*[\\\\]([A-Z]\w+))~im', '$2', $file_name);
            MyAutoload::loadControllers($name);//'HomeController'
            MyAutoload::loadModules($name);//'Controller'
            MyAutoload::loadModules($name);//'Model'
            MyAutoload::loadModules($name);//'Config'
            MyAutoload::loadModels($name);//'Tasks'
            MyAutoload::loadRoutes();//'Tasks'
            // $name = preg_replace('~(.*[\\\\]([A-Z]\w+))~im', '$2', $file_name);
            //  var_dump($name);
        });
    }

}