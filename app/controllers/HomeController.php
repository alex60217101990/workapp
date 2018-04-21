<?php
namespace app\controllers;

use modules\View;
use modules\Controller;
//require_once('modules/View.php');



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


    public function cropImage($aInitialImageFilePath, $aNewImageFilePath, $aNewImageWidth, $aNewImageHeight){
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

    public function ResizeImage($image){

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

            if(file_exists('../assets/images')===TRUE){
                $imageFullName = '../assets/images/' . hash('crc32',time()) . '.' . $imageFormat;
            }else{
                mkdir("../assets/images");
            }

            // Сохраняем тип изображения в переменную
            $imageType = $image['type'];

            // Получаем размеры и тип изображения в виде числа
            list($lInitialImageWidth, $lInitialImageHeight, $lImageExtensionId) = getimagesize($image['tmp_name']);
            if($lInitialImageWidth>320)$lInitialImageWidth = 320;
            if($lInitialImageHeight>240)$lInitialImageHeight = 240;
            $this->cropImage($image['tmp_name'], $imageFullName, $lInitialImageWidth,$lInitialImageHeight);

        return 'success';
        }catch (\Exception $exception) {
            return 'error';
        }
    }

}
/*
<form>
  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
    <button type="submit" class="btn btn-primary mb-2">Submit</button>
</form>
*/