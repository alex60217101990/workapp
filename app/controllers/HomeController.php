<?php
namespace app\controllers;

use modules\Controller;
use modules\View;
use app\models\Tasks;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::renderTemplate('index.html');
    }

    public function sendPhoto($image){
        try {
            // Проверяем размер файла и если он превышает заданный размер
            // завершаем выполнение скрипта и выводим ошибку
            if ($image['size'] > 200000) {
                die('error');
            }

            // Достаем формат изображения
            $imageFormat = explode('.', $image['name']);
            $imageFormat = $imageFormat[1];

            // Генерируем новое имя для изображения. Можно сохранить и со старым
            // но это не рекомендуется делать

            if(file_exists('./images')===TRUE){
                $imageFullName = './images/' . hash('crc32',time()) . '.' . $imageFormat;
            }else{
                mkdir("./images");
            }

            // Сохраняем тип изображения в переменную
            $imageType = $image['type'];

            // Сверяем доступные форматы изображений, если изображение соответствует,
            // копируем изображение в папку images
            if ($imageType == 'image/jpeg' || $imageType == 'image/png') {
                if (move_uploaded_file($image['tmp_name'],$imageFullName)) {
                    return 'success';
                } else {
                    return 'error';
                }
            }
        }catch (\Exception $exception) {
            return 'error';
        }
    }



    /**
     * Метод для добавления новой задачи в БД.
     * @param $request
     * @return array
     */
    public static function addTask($request) {
        try{
            $data = ['Name'=>'','Mail'=>'','Description'=>'','ImageLocation' => '700x300.png','Status'=>'New'];
            if(isset($request)){
                $e = $request['name'];
                if(isset($request['name'])){
                    $data['Name']=$request['name'];
                }
                if(isset($request['email'])){
                    $data['Mail']=$request['email'];
                }
                if(isset($request['description'])){
                    $data['Description']=$request['description'];
                }
                Tasks::setTask($data);
                return  ['success' => 'true'];
            }else{
                return  ['fails' => 'false'];
            }
        }catch (\Exception $exception){
            return ['error'=>$exception->getMessage(), 'code' => $exception->getCode()];
        }
    }

    /**
     * Метод для обработки принятых сырых данных.
     * @param void
     * @return array
     */
    public static function SaveImg(){
        try {
            $path = $_SERVER['DOCUMENT_ROOT'] = $_SERVER['DOCUMENT_ROOT'] ?: dirname(__FILE__);
            if (isset($_FILES) && isset($_FILES['image']) && isset($_POST['id'])) {
                $id = $_POST['id'];
                $element = Tasks::getColumn(intval($id), 'ImageLocation')['ImageLocation'];
                $path_to_img = $path. DIRECTORY_SEPARATOR .'assets'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$element;

                if(file_exists($path_to_img))
                    unlink($path_to_img);
                //Переданный массив сохраняем в переменной
                $image = $_FILES['image'];
                return ([HomeController::ResizeImage($image, $_POST['id']), $_POST['id'], $element]);
            } else {
                return (['error' => 'Data absent.']);
            }
        } catch (\Exception $e) {
            return(['error' => $e->getMessage(), 'code' => $e->getCode()]);
        }
    }

    /**
     * Метод для определения необходимости ресайза изображения
     * и сохранения его в базе данных.
     * @param $image
     * @param $id
     * @return string
     */
    public static function ResizeImage($image, $id=null){

        try {

            // Проверяем размер файла и если он превышает заданный размер
            // завершаем выполнение скрипта и выводим ошибку
            if ($image['size'] > 200000) {
                die('error');
            }

            // Достаем формат изображения
            $imageFormat = explode('.', $image['name']);
            $imageFormat = $imageFormat[1];

            if(file_exists('assets/images')===TRUE){
                $only_name = hash('crc32',time()) . '.' . $imageFormat;
                $imageFullName = 'assets/images/' . $only_name;
            }else{
                mkdir('assets/images');
            }

            // Сохраняем тип изображения в переменную
            $imageType = $image['type'];

            // Получаем размеры и тип изображения в виде числа
            list($lInitialImageWidth, $lInitialImageHeight, $lImageExtensionId) = getimagesize($image['tmp_name']);
            if($lInitialImageWidth>320)$lInitialImageWidth = 320;
            if($lInitialImageHeight>240)$lInitialImageHeight = 240;
            HomeController::cropImage($image['tmp_name'], $imageFullName, $lInitialImageWidth,$lInitialImageHeight);

            if(isset($id) && !empty($id))
                Tasks::editColumn(intval($id), 'ImageLocation', $only_name);
            else
                Tasks::editColumn(null,'ImageLocation', $only_name);

            return 'success';
        }catch (\Exception $exception) {
            return 'error';
        }
    }


    /**
     * Метод для обработки полученного изображения.
     * @param $aInitialImageFilePath
     * @param $aNewImageFilePath
     * @param $aNewImageWidth
     * @param $aNewImageHeight
     * @return bool
     */
    public static function cropImage($aInitialImageFilePath, $aNewImageFilePath, $aNewImageWidth, $aNewImageHeight){
        if (($aNewImageWidth < 0) || ($aNewImageHeight < 0)) {
            return false;
        }

        // Массив с поддерживаемыми типами изображений
        $lAllowedExtensions = array(1 => "gif", 2 => "jpeg", 3 => "png");

        // Получаем размеры и тип изображения в виде числа
        list($lInitialImageWidth, $lInitialImageHeight, $lImageExtensionId) = getimagesize($aInitialImageFilePath);

        if (!array_key_exists($lImageExtensionId, $lAllowedExtensions)) {
            return false;
        }
        $lImageExtension = $lAllowedExtensions[$lImageExtensionId];

        // Получаем название функции, соответствующую типу, для создания изображения
        $func = 'imagecreatefrom' . $lImageExtension;
        // Создаём дескриптор исходного изображения
        $lInitialImageDescriptor = $func($aInitialImageFilePath);

        // Определяем отображаемую область
        $lCroppedImageWidth = 0;
        $lCroppedImageHeight = 0;
        $lInitialImageCroppingX = 0;
        $lInitialImageCroppingY = 0;
        if ($aNewImageWidth / $aNewImageHeight > $lInitialImageWidth / $lInitialImageHeight) {
            $lCroppedImageWidth = floor($lInitialImageWidth);
            $lCroppedImageHeight = floor($lInitialImageWidth * $aNewImageHeight / $aNewImageWidth);
            $lInitialImageCroppingY = floor(($lInitialImageHeight - $lCroppedImageHeight) / 2);
        } else {
            $lCroppedImageWidth = floor($lInitialImageHeight * $aNewImageWidth / $aNewImageHeight);
            $lCroppedImageHeight = floor($lInitialImageHeight);
            $lInitialImageCroppingX = floor(($lInitialImageWidth - $lCroppedImageWidth) / 2);
        }

        // Создаём дескриптор для выходного изображения
        $lNewImageDescriptor = imagecreatetruecolor($aNewImageWidth, $aNewImageHeight);

        $transparent = imagecolorallocatealpha($lNewImageDescriptor, 0, 0, 0, 127);
        imagefill($lNewImageDescriptor, 0, 0, $transparent);
        imagesavealpha($lNewImageDescriptor, true); // save alphablending setting (important);

        //обрезание изображения.
        // imagecopyresampled($lNewImageDescriptor, $lInitialImageDescriptor, 0, 0, $lInitialImageCroppingX, $lInitialImageCroppingY, $aNewImageWidth, $aNewImageHeight, $lCroppedImageWidth, $lCroppedImageHeight);
        //изменение масштаба изображения.
        imagecopyresized($lNewImageDescriptor, $lInitialImageDescriptor, 0, 0,
            $lInitialImageCroppingX, $lInitialImageCroppingY,
            $aNewImageWidth, $aNewImageHeight, $lCroppedImageWidth, $lCroppedImageHeight); // собственно само масштабирование
        $func = 'image' . $lImageExtension;

        // сохраняем полученное изображение в указанный файл
        return $func($lNewImageDescriptor, $aNewImageFilePath);
    }


    /**
     * Метод для редактирования заждачи админом.
     * @param $request
     * @return array
     */
    public static function updateTask($request){
        try {
            $list = $request;
            if (isset($request)) {
                $post = ['name' => '', 'email' => '', 'check' => 0, 'desc' => ''];

                if (!empty($list[1])) {
                    Tasks::editColumn($list[0], 'Name', $list[1]);
                    $post['name'] = $list[1];
                }

                if (!empty($list[2])) {
                    Tasks::editColumn($list[0], 'Mail', $list[2]);
                    $post['email'] = $list[2];
                }
                if (!empty($list[3])) {
                    $post['check'] = $list[3] ==='true' ? 'Ready' : 'New';
                    Tasks::editColumn($list[0], 'Status', $list[3] === 'true' ? 'Ready' : 'New');
                }
                if (!empty($list[4])) {
                    Tasks::editColumn($list[0], 'Description', $list[4]);
                    $post['desc'] = $list[4];
                }

                return ([$request, $post]);
            } else {
                return (['params' => 'false', 'r' => $request['0']]);
            }
        } catch (\Exception $e) {
            return (['error' => $e->getMessage(), 'code' => $e->getCode()]);
        }
    }

    /**
     * Метод для записи новой задачи
     * уже вместе с изображением.
     * @param {void}
     * @return array
     */
    public static function AddImg():array {
        try {
            if (isset($_FILES) && isset($_FILES['image'])) {
                //Переданный массив сохраняем в переменной
                $image = $_FILES['image'];
                return ([HomeController::addTask(['name'=>!empty($_POST['name'])?$_POST['name']:'',
                    'email'=>!empty($_POST['email'])?$_POST['email']:'',
                    'description'=>!empty($_POST['description'])?$_POST['description']:'']),
                    HomeController::ResizeImage($image)]);
            } else {
                return (['error' => 'Data absent.']);
            }
        } catch (\Exception $e) {
            return(['error' => $e->getMessage(), 'code' => $e->getCode()]);
        }
    }

}
