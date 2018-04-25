<?php
/**
 * Created by PhpStorm.
 * User: Игорь
 * Date: 4/21/2018
 * Time: 4:21 PM
 */
use modules\model;

class Users extends model\Model
{
    public static  function getUserByColumn($column,$value){
        //TODO: Validate here.
        $sql = "SELECT `Id`, `Name`, `Mail`, `Login`, `Password`, `AccountType` FROM `Users` WHERE `$column`='{$value}'";
       return self::getDB()->query($sql)->fetchAll();
    }

    public static  function getUserByLogAndPass($login,$password){
        //TODO: Validate here.
        //TODO: Maybe hash password here.
        $sql = "SELECT `Id`, `Name`, `Mail`, `Login`, `Password`, `AccountType` FROM `Users` WHERE `Login`='{$login}' AND `Password`= '{$password}'";
        return self::getDB()->query($sql)->fetch();
    }

    public static  function getUserByLogOnly($login){
        //TODO: Validate here.
        //TODO: Maybe hash password here.
        $sql = "SELECT `Id`, `Name`, `Mail`, `Login`, `Password`, `AccountType` FROM `Users` WHERE `Login`='{$login}'";
        return self::getDB()->query($sql)->fetch();
    }
}