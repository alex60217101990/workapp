<?php

use app\controllers\HomeController;
// Require composer autoloader
use modules\MyAutoload;
use Windwalker\Renderer\PhpRenderer;
// Include the namespace
use GuahanWeb\Http;



require __DIR__ . '/vendor/autoload.php';
require_once('modules/MyAutoload.php');
require_once('modules/interfaces.php');
include "app/controllers/HomeController.php";
include_once 'modules/config.php';
require_once 'modules/model.php';
require_once 'app/models/Tasks.php';


// Get a router instance
$router = GuahanWeb\Http\Router::instance();
// Register a route

$config = [];
$renderer = new PhpRenderer(__DIR__ . '/app/views', $config);

$router->get('/list/{number}/{sort}', function ($req) use ($renderer) {
    //(Id|Name|Description|Status)
    $data = Tasks::getTasks($req->number-1,$req->sort);
    echo $renderer->render('home', [$data, Tasks::getTasksCount(), $req->number, $req->sort, 1, "page"=>'first']);
});


$router->get('/new_task', function ($req) use ($renderer) {
    $add = 'yes';
    echo $renderer->render('home', ['new'=>$add, 'page'=>'new_task']);
});

//var_dump(Tasks::getTasks(0,'Name'));

$router->get('/page', function () use ($renderer) {
    echo $renderer->render('download');
});

$router->post('/save_image', function ($req, $res) {
    try {
        $file = new HomeController();
        if (isset($_FILES) && isset($_FILES['image'])) {
            //Переданный массив сохраняем в переменной
            $image = $_FILES['image'];
            $res->send($file->ResizeImage($image));
        } else {
            $res->send('error');
        }
    } catch (\Exception $e) {
        $res->send($e->getMessage());
    }
});



$router->post('/save_image', function ($req, $res) {
    try {
        $file = new HomeController();
        if (isset($_FILES) && isset($_FILES['image']) && isset($_POST['id'])) {
            $id = $_POST['id'];
            $element = Tasks::getColumn(4, 'ImageLocation')['ImageLocation'];
            if(file_exists('./assets/images/'.$element))
                unlink('./assets/images/'.$element);
            //Переданный массив сохраняем в переменной
            $image = $_FILES['image'];
            $res->send([$file->ResizeImage($image, $_POST['id']), $_POST['id'], $element]);
        } else {
            $res->send('error');
        }
    } catch (\Exception $e) {
        $res->send($e->getMessage());
    }
});



$router->post('/update_task_data', function ($req, $res) {
    try {
        $file = new HomeController();
        $list = $_POST['params'];
        if (isset($_POST['params'])) {
            $post = ['name'=> '', 'email' => '', 'check' => 0, 'desc' => ''];
           /* if(!empty($list[1])) $post['name'] = $list[1];
            if(!empty($list[2])) $post['email'] = $list[2];
            if(!empty($list[3])) $post['check'] = $list[3]==='true'?1:0;
            if(!empty($list[4])) $post['desc'] = $list[4];*/

            if(!empty($list[1])){
                Tasks::editColumn($list[0], 'Name', $list[1]);
                $post['name'] = $list[1];
            }

            if(!empty($list[2])){
                Tasks::editColumn($list[0], 'Mail', $list[2]);
                $post['email'] = $list[2];
            }
            if(!empty($list[3])){
                $post['check'] = $list[3]==='true'?'New':'Ready';
                Tasks::editColumn($list[0], 'Status',$post['check']);
            }
            if(!empty($list[4])){
                Tasks::editColumn($list[0], 'Description', $list[4]);
                $post['desc'] = $list[4];
            }

            //Tasks::setTask()
            $res->send(json_encode([$_POST['params'],$post]));
        } else {
            $res->send(['params'=>'false', 'r' => $_POST['params']['0']]);
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
//require "modules/Config.php";
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
