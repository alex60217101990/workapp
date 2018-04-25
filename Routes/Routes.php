<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 24.04.2018
 * Time: 11:44
 */

use Windwalker\Renderer\PhpRenderer;
use modules\MyAutoload;
use app\models\Tasks;
use app\controllers\HomeController;
use app\controllers\ActionController;

$file = new MyAutoload();

MyAutoload::AutoLoad();


$router = GuahanWeb\Http\Router::instance();

$config = [];

$path = $_SERVER['DOCUMENT_ROOT'] = $_SERVER['DOCUMENT_ROOT'] ?: dirname(__FILE__);
$renderer = new PhpRenderer($path . DIRECTORY_SEPARATOR. 'app'.DIRECTORY_SEPARATOR.'views', $config);

/**
 * ----------------------------------------------------------------------------------
 * Application routes.
 * ----------------------------------------------------------------------------------
 */


$router->get('/list/{number}/{sort}', function ($req) use ($renderer) {
    $data = Tasks::getTasks($req->number-1,$req->sort);

    echo $renderer->render('home', [$data, Tasks::getTasksCount(), $req->number,
        $req->sort, 1, "page"=>'first', "isAuth" => ActionController::IsAuthGuard(),
        "User" => ActionController::GetUser()]);
});

$router->get('/new_task', function ($req) use ($renderer) {
    $add = 'yes';
    echo $renderer->render('home',
        ['new'=>$add, 'page'=>'new_task',
        "isAuth" => ActionController::IsAuthGuard(),
        "User" => ActionController::GetUser()]);
});


$router->get('/page', function () use ($renderer) {
    echo $renderer->render('download');
});

$router->post('/save_info', function ($req, $res) {
    try {
        //    $json_str = file_get_contents('php://input');
        $res->send(HomeController::addTask(json_decode($_POST['result'], true)));
    } catch (\Exception $e) {
        $res->send(['error' => $e->getMessage()]);
    }
});

$router->post('/save_image', function ($req, $res) {
    try {
        $res->send(HomeController::SaveImg());
    } catch (\Exception $e) {
        $res->send($e->getMessage());
    }
});

$router->post('/add_image', function ($req, $res) {
    try {
        $res->send(HomeController::AddImg());
    } catch (\Exception $e) {
        $res->send($e->getMessage());
    }
});


$router->post('/update_task_data', function ($req, $res) {
    try {
        $res->send(HomeController::updateTask($_POST['params']));
    }catch(\Exception $e){
        $res->send(['error' => $e->getMessage(), 'code' => $e->getCode()]);
    }
});


$router->post('/authorization', function ($req, $res) {
    try {
        $res->send(ActionController::Authorization());
    } catch (\Exception $e) {
        $res->send(['error'=>$e->getMessage(),'code'=>$e->getCode()]);
    }
});


$router->post('/logout', function ($req, $res) {
    try {
        $res->send(ActionController::clearSessionCookie());
    } catch (\Exception $e) {
        $res->send(['error'=>$e->getMessage(),'code'=>$e->getCode()]);
    }
});

/**
 * On this link you can authorization.
 */
$router->get('/registration', function ($req, $res) use($renderer) {
    echo $renderer->render('home', ["page"=>'registration',
        "isAuth" => ActionController::IsAuthGuard()]);
});


/**
 * ----------------------------------------------------------------------------------
 * Application routes.
 * ----------------------------------------------------------------------------------
 */

// Tell the router to start
$router->process();

