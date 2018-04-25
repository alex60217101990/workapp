<?php
/**
 * Created by PhpStorm.
 * User: Игорь
 * Date: 4/23/2018
 * Time: 11:02 PM
 */

namespace app\controllers;

use app\models\Auth;
use modules\Controller;
use Users;

class ActionController extends Controller
{
    /**
     * Метод, авторизации Админа.
     * @return array|string
     */
    public static function Authorization(){
        try {
            //TODO: tmp.authorization hare.
            $authInfo = json_decode($_POST['authData'], true);
           // $user = Users::getUserByLogAndPass($authInfo['login'],
            $user = Users::getUserByLogOnly($authInfo['login']);
            if ($user && password_verify($authInfo['password'], $user['Password'])) {
                $_SESSION['Auth']=["Auth"=>true,"UserName"=>$user['Name'],
                    "AccauntType"=>$user['AccountType']];
                return(json_encode(['status' => 1, $user['Password']]));
            } else {
//                return(json_encode(2));
                return([1,$user['Password']]);
            }
        } catch (\Exception $e) {
            return([$e->getMessage(),$e->getCode()]);
        }
    }

    public static function IsAuthGuard(){
        return isset($_SESSION['Auth'])?'true':'false';
    }

    public static function GetUser(){
        return $_SESSION["Auth"]["UserName"];
    }

    public static function AuthUser($request=['username' => 'test_user', 'password' => 'some_password', 'email' => 'user@mail.com']){
        $auth = new Auth();
        $auth->auth->createUser($request);
    }

    public static function clearSessionCookie(){
        try {
            // Удаляем все переменные сессии.
            $_SESSION = array();
            // Если требуется уничтожить сессию, также необходимо удалить сессионные cookie.
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
                return (['result'=>'success']);
            } else{
                return (['result' => 'failed']);
            }
        }catch (\Exception $exception){
            return (['error' => $exception->getMessage(), 'code' => $exception->getCode()]);
        }
    }

}

