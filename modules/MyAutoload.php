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

    /**
     * Load on directory "modules".
     * @return bool
     */
    public static function loadPHP($aClassName){
        $result = MyAutoload::file_search(MyAutoload::$dir, $aClassName . '.php');
        //функция автозагруки, загружающая классы из папки classes:
        $aClassFilePath = MyAutoload::$dir . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . $aClassName . '.php';
        if (!empty($result) && file_exists($result)) {
            require_once $result;
            return true;
        }
        return false;
    }

    /**
     * Recursion search and include any project php file.
     * @param $path
     * @param $filename
     * @return string
     */
    public static function file_search($path, $filename){
        try {
            if (($dir = opendir($path)) == FALSE)
                return '';
            $link = '';
            $fp = scandir($path);  // данная функция основывается на стандартной функции PHP-scandir.
            for ($i = 0; $i <= count($fp) - 1; $i++) {
                $link = $path . DIRECTORY_SEPARATOR . $fp[$i];
                if (is_file($link)) {
                    if ($fp[$i] == $filename) {
                        closedir($dir);
                        return $link;
                    }
                } else if (!preg_match('/^[\.]{1,2}$/', $fp[$i]) && is_dir($link)) {
                    if (($link = MyAutoload::file_search($link, $filename)) != '') {
                        closedir($dir);
                        return $link;
                    }
                }
            }
            closedir($dir);
            return '';
        }catch (\Exception $exception){
            return '';
        }
    }

    /**
     * Method init load php class.
     */
    public static function AutoLoad(){
        spl_autoload_register(function ($file_name){
            $name = preg_replace('~(.*[\\\\]([A-Z]\w+))~im', '$2', $file_name);
            MyAutoload::loadPHP($name);
        });
    }

}