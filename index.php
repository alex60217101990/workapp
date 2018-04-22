<?php

use app\controllers\HomeController;
// Require composer autoloader
use Windwalker\Renderer\PhpRenderer;
// Include the namespace
use GuahanWeb\Http;

require __DIR__ . '/vendor/autoload.php';
require_once('modules/interfaces.php');
include "app/controllers/HomeController.php";
include_once 'modules/config.php';
require_once 'app/models/Tasks.php';

// Get a router instance
$router = Http\Router::instance();
// Register a route

$config = [];
$renderer = new PhpRenderer(__DIR__ . '/app/views', $config);

$router->get('/list/{number}', function ($req) use ($renderer) {
    $data = Tasks::getTasks($req->number);
    echo $renderer->render('pages', [$data, Tasks::getTasksCount(), $req->number]);
});

$router->get('/page', function () use ($renderer) {
    echo $renderer->render('download');
});

$router->post('/save_image', function ($req, $res) {
    $file = new HomeController();
    if (isset($_FILES) && isset($_FILES['image'])) {
        //Переданный массив сохраняем в переменной
        $image = $_FILES['image'];
        $res->send($file->ResizeImage($image));
    } else {
        $res->send('error');
    }
});

$router->post('/update_task_data', function ($req, $res) {
    try {
        $file = new HomeController();
        if (isset($req->query['data'])) {
            $res->send($req->query['data']);
        } else {
            $res->send(/*'false'*/json_encode($_POST['params']));
        }
    }catch(\Exception $e){
        $res->send($e->getMessage());
    }
});

// Tell the router to start
$router->process();

?>


<!--
//include "modules/interfaces.php";
//require "modules/config.php";
//require "app/models/Tasks.php";
//require "app/models/Users.php";


//TODO:Test.Debug.
//print_r(Tasks::getTasks());
//$taskInfo=["Name"=>"Tests","Mail"=>"Test","Description"=>"Test","ImageLocation"=>"Test","Status"=>1];
//var_dump(Tasks::setTask($taskInfo));
//Tasks::editColumn("8",'Name',"Edit Column Test");
//var_dump(Users::getUserByColumn("id",1));
//var_dump(Users::getUserByLogAndPass("Admin",1));
/**
 * Created by PhpStorm.
 * User: Игорь
 * Date: 4/21/2018
 * Time: 10:38 AM
 */
-->
