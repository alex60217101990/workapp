<?php
use modules\View;
use app\controllers\HomeController as Controller;
use app\controllers\HomeController;
use Windwalker\Renderer\PhpRenderer;
use Windwalker\Renderer\BladeRenderer;

include('./modules/View.php');
//include('./modules/logic.php');
include('./vendor/autoload.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

    <title>Title</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/1-col-portfolio.css" rel="stylesheet">
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="?page=main"><?php echo($_GET['page']?$_GET['page']:'start') ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="my-4">Page Heading
        <small></small>
    </h1>

<?php
   // modules\View::renderTemplate('index.html');
    $taskInfo=[["Id"=>0, "Name"=>"Tests","Mail"=>"Test","Description"=>"Test","ImageLocation"=>"Test","Status"=>1]];
   // modules\View::renderTemplate('pages.php');


    $config = ['pages'];

    $renderer = new PhpRenderer(__DIR__ . '/app/views', $config);
    $data = [["Id"=>0, "Name"=>"Tests","Mail"=>"Test","Description"=>"Test","ImageLocation"=>"Test","Status"=>1],
        ["Id"=>0, "Name"=>"Tests","Mail"=>"Test","Description"=>"Test","ImageLocation"=>"Test","Status"=>1],
        ["Id"=>0, "Name"=>"Tests","Mail"=>"Test","Description"=>"Test","ImageLocation"=>"Test","Status"=>1]];
    echo $renderer->render('pages', $data);

?>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/send_file.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>