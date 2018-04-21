<?php
use modules\View;
use app\controllers\HomeController as Controller;
use app\controllers\HomeController;
include('./modules/View.php');
//include('./modules/logic.php');
include('./vendor/autoload.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<p>Test page</p>

<?php
modules\View::renderTemplate('index.html');
?>
<script src="assets/jquery.js"></script>
<script src="assets/send_file.js"></script>
</body>
</html>