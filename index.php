<?php

    ini_get("session.use_cookies");
    session_start();

    require_once('modules/MyAutoload.php');
    require __DIR__ . '/vendor/autoload.php';
    include_once 'Routes/Routes.php';

//    function f(){
//        echo'123';
//    }
//    function g($r){
//        $r[0]();
//    }
//var_dump(g('f'));
//
//    var_dump(password_verify('123', '$2y$10$CMBljG2qDULRtw9RHyIvouAYJ4UwJzmunWzjSoF2H6Pd/qAmgG0DS'));

// Наконец, уничтожаем сессию.
//session_destroy();

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

