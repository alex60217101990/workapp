<?php
/**
 * Created by PhpStorm.
 * User: Игорь
 * Date: 4/21/2018
 * Time: 10:43 AM
 */

//TODO: Change include in other file. Maybe index.php.
//use modules\{model,config};
use modules\config;
use modules\model\Model;
use modules\MyAutoload;


class Tasks  extends Model
{
    public function __construct()
    {}

     public static function getTasks($page=0,$orderBy='Id')
  {
      //TODO: Validate here.
      $offset=   config::COUNT_TASKS_ON_PAGE*$page;
      $sql="SELECT `Id`, `Name`, `Mail`, `Description`, `ImageLocation`, `Status` 
            FROM `Tasks` 
            ORDER BY `{$orderBy}` 
            LIMIT ".config::COUNT_TASKS_ON_PAGE." Offset {$offset}";
      return  self::getDB()->query($sql)->fetchAll();
  }


     public static function getTasksCount()
     {
         $sql="SELECT COUNT(Id) FROM `Tasks`";
         return  self::getDB()->query($sql)->fetchAll();
     }

     public static function setTask($taskInfo)
     {
         //TODO: Validate here.
         if(isset($taskInfo)) {
             $sql = "INSERT INTO `Tasks` ( `Name`, `Mail`, `Description`, `ImageLocation`, `Status`) VALUES
                    ('{$taskInfo["Name"]}','{$taskInfo["Mail"]}',
                     '{$taskInfo["Description"]}','{$taskInfo["ImageLocation"]}',
                     {$taskInfo["Status"]})";
             self::getDB()->query($sql);
             return 1;
         }
         return 0;
     }

     public static  function editColumn($taskId,$columnName,$newValue){
         //TODO: Validate here.
         $sql = "UPDATE `Tasks` SET `{$columnName}`='{$newValue}' WHERE Id={$taskId}";
         self::getDB()->query($sql);
     }

     public static  function getColumn($taskId,$columnName){
         //TODO: Validate here.
         $sql = "SELECT `{$columnName}` FROM `Tasks` WHERE `Id`={$taskId}";
         return  self::getDB()->query($sql)->fetch();
     }

 }
