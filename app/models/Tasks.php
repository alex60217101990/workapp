<?php
/**
 * Created by PhpStorm.
 * User: Игорь
 * Date: 4/21/2018
 * Time: 10:43 AM
 */
namespace app\models;
//TODO: Change include in other file. Maybe index.php.

//use modules\{model,config};
use modules\Config\Config;
use modules\Model\Model;


class Tasks  extends Model
{
    public function __construct()
    {}

    /**
     * Метод получения записей из таблицы "Tasks" БД.
     * @param int $page
     * @param string $orderBy
     * @return mixed
     */
     public static function getTasks($page=0,$orderBy='Id')
  {
      //TODO: Validate here.
      $offset=   Config::COUNT_TASKS_ON_PAGE*$page;
      $sql="SELECT `Id`, `Name`, `Mail`, `Description`, `ImageLocation`, `Status` 
            FROM `Tasks` 
            ORDER BY `{$orderBy}` 
            LIMIT ".Config::COUNT_TASKS_ON_PAGE." Offset {$offset}";
      return  self::getDB()->query($sql)->fetchAll();
  }

    /**
     * Метод возврвщвет количество записей таблицы.
     * @return mixed
     */
     public static function getTasksCount()
     {
         $sql="SELECT COUNT(Id) FROM `Tasks`";
         return  self::getDB()->query($sql)->fetchAll();
     }

    /**
     * Метод дляя создания записи.
     * @param $taskInfo
     * @return int
     */
     public static function setTask($taskInfo)
     {
         //TODO: Validate here.
         if(isset($taskInfo)) {
             $sql = "INSERT INTO `Tasks` ( `Name`, `Mail`, `Description`, `ImageLocation`, `Status`) VALUES
                    ('{$taskInfo["Name"]}','{$taskInfo["Mail"]}',
                     '{$taskInfo["Description"]}','{$taskInfo["ImageLocation"]}',
                     '{$taskInfo["Status"]}')";
             self::getDB()->query($sql);
             return 1;
         }
         return 0;
     }

    /**
     * Метод для изменения записи в таблице.
     * @param $taskId
     * @param $columnName
     * @param $newValue
     */
     public static  function editColumn($taskId,$columnName,$newValue){
         //TODO: Validate here.
         if(!empty($taskId)){
             $sql = "UPDATE `Tasks` SET `{$columnName}`='{$newValue}' WHERE Id={$taskId}";
         }else{
             $sql = "UPDATE `Tasks` SET `{$columnName}`='{$newValue}' ORDER BY Id DESC LIMIT 1";
         }
         self::getDB()->query($sql);
     }

    /**
     * Метод для полученияя конкретной записи.
     * @param $taskId
     * @param $columnName
     * @return mixed
     */
     public static  function getColumn($taskId,$columnName){
         //TODO: Validate here.
         $sql = "SELECT `{$columnName}` FROM `Tasks` WHERE `Id`={$taskId}";
         return  self::getDB()->query($sql)->fetch();
     }

 }
