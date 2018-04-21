<?php
//var_dump('fvnfkjbngbkngkb');
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 21.04.2018
 * Time: 10:31
 */
use app\controllers\HomeController;
require_once('../modules/interfaces.php');
include ('../app/controllers/HomeController.php');
include('../modules/View.php');
include('../vendor/autoload.php');


$file = new HomeController();
// Проверяем установлен ли массив файлов и массив с переданными данными
if(isset($_FILES) && isset($_FILES['image'])) {
    //Переданный массив сохраняем в переменной
    $image = $_FILES['image'];
    //echo($file->sendPhoto($image));
    echo($file->ResizeImage($image));
  //  echo(json_encode(['result'=>'success']));
}
else{
    echo('failed');
}