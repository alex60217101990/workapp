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
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../assets/css/1-col-portfolio.css" rel="stylesheet">
    <link href="../../assets/css/select.css" rel="stylesheet">
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="z-index: 100000000000;">
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

    <!-- Sidebar Widgets Column -->
    <div class="row">
        <div class="col-md-8">
            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Sorted</h5>
                <div class="card-body" style="background: #808080">
                    <div class="input-group">
                     <!--   <input type="text" id="sort_field" class="form-control" placeholder="Sorted by...">
                        <span class="input-group-btn">
                  <button class="btn btn-secondary" id="sort_but" type="button">Go!</button>
                </span>-->
                        <div class="select">
                            <div id="dd" class="wrapper-dropdown-3" tabindex="1">
                                <span>Sorted</span>
                                <ul class="dropdown">
                                    <li>
                                        <span id="IdLink" data-sort="<?php echo ('/list/'.$this->data[2].'/Id') ?>">
                                            <i class="icon-envelope icon-large"></i>Sort by Id
                                        </span>
                                    </li>
                                    <li>
                                        <span id="NameLink" data-sort="<?php echo ('/list/'.$this->data[2].'/Name') ?>">
                                            <i class="icon-truck icon-large"></i>Sort by name
                                        </span>
                                    </li>
                                    <li>
                                        <span id="DescriptionLink" data-sort="<?php echo ('/list/'.$this->data[2].'/Description') ?>">
                                            <i class="icon-truck icon-large"></i>Sort by description
                                        </span>
                                    </li>
                                    <li>
                                        <span id="StatusLink" data-sort="<?php echo ('/list/'.$this->data[2].'/Status') ?>">
                                            <i class="icon-truck icon-large"></i>Sort by status
                                        </span>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php var_dump($this->data[2][0]) ?>
<!-- Project One -->
        <?php foreach ($this->data[0] as $element): ?>
<div class="row">
    <div class="col-md-7">
        <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0 preview" data-task-id="<?php echo $this->escape($element['Id']); ?>"
                 style="max-height: 200px!important" id="preview" src="<?php echo '../../../assets/images/'.$this->escape($element['ImageLocation']); ?>" alt="">
            <!-- http://placehold.it/700x300 -->

        </a>
    </div>
    <div class="col-md-5">
            <h3 class="h3" contenteditable="false" data-task-id="<?php echo $this->escape($element['Id']); ?>">
                <?php echo $this->escape($element['Id']); ?></h3>
            <p contenteditable="true" class="pN" data-task-id="<?php echo $this->escape($element['Id']); ?>">
                <?php echo $this->escape($element['Name']); ?>
            </p>
            <p contenteditable="true" class="pE" data-task-id="<?php echo $this->escape($element['Id']); ?>">
                <?php echo $this->escape($element['Mail']); ?>
            </p>

            <label class="custom-control material-checkbox">
                <input type="checkbox" class="material-control-input CheckboxVal"
                      <?php echo ($this->escape($element['Status'])==='Ready')?'checked':''; ?>
                       data-task-id="<?php echo $this->escape($element['Id']); ?>">
                <span class="material-control-indicator"></span>
                <span class="material-control-description">Status</span>
            </label>
    </div>
    <div class="col-md-10">
        <div style="overflow-y: hidden">
            <p style="overflow-y: scroll" contenteditable="true" data-task-id="<?php echo $this->escape($element['Id']); ?>" class="pD">
                <?php echo $this->escape($element['Description']); ?>
            </p>
        </div>
        <div class="btn-group">
        <button class="save_on_server btn btn-warning Save" style="z-index: 10000000; border-radius: 5px!important; "
                data-task-id="<?php echo $this->escape($element['Id']); ?>">Save</button>

      <!--  <form class="upload-image upload-btn-wrapper" enctype="multipart/form-data"
              data-task-id="<?php echo $this->escape($element['Id']); ?>">
            <div class="form-group">
                <input type="file" name="image" class="image" data-task-id="<?php echo $this->escape($element['Id']); ?>">
            </div>
            <input style="position: relative; right: 20px" type="submit" class="btn btn-default">
        </form>-->
        <div style="position:relative; width: 90%; text-overflow: ellipsis; margin-left: 5px">
            <form class="upload-image" enctype="multipart/form-data" data-task-id="<?php echo $this->escape($element['Id']); ?>">
                <input style="position: relative; z-index: 10000000;" type="submit" class="btn btn-outline-info">
            <a class='btn btn-outline-secondary' href='javascript:;'>
                Choose File...
                <input type="file" name="image" class="image" data-task-id="<?php echo $this->escape($element['Id']); ?>"
                        style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
                        -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
                        opacity:0;background-color:transparent;color:transparent;' size="40"
                       onchange='$("#upload-file-info").html($(this).val());'>
            </a>
            &nbsp;
            <span class='label label-info' id="upload-file-info"></span>
            </form>
        </div>

                </div>


    </div>

</div>
            <hr>
        <?php endforeach; ?>

        <?php for($i=$this->data[0][2]['Id']/3; $i<intval($this->data[1][0][0])/3+1; $i++) //intval($this->data[1][0][0])/3+1
         //   var_dump(intval($this->data[2][0]));
        $count_entrys = intval($this->data[1][0][0]); // количество записей
        $entry_on_page = 3; // количество записей на странице
        $current_page = intval($this->data[2]); // текущая страница
        $max_pages_list = 3; // сколько номеров страниц показывать

        $count_pages = ceil($count_entrys / $entry_on_page);
        $from = $current_page + ceil(($max_pages_list-1) / 2);
        $to = $current_page + floor(($max_pages_list-1) / 2);

        ?>
    <!-- Pagination -->
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="<?php echo ($current_page-1) >= 0 ? '/list/'.($current_page-1).'/'.$this->data[3]:'' ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <?php for($i = $from; $i <= $to; $i++ ): ?>
        <li class="page-item">
            <a class="page-link" href="<?php echo ($i*3<intval($this->data[1][0][0]))?'/list/'.$i.'/'.$this->data[3]:'' ?>"><?php echo $i ?></a>
        </li>
        <?php endfor; ?>
      <!--  <li class="page-item">
            <a class="page-link" href="<?php //echo '/list/'.$this->data[2]['Id']/3 ?>">2</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">3</a>
             <span class="save_on_server btn btn-warning Save" href="#" data-task-id="<?php //echo $this->escape($element['Id']); ?>">Save</span>
        </li> -->
        <li class="page-item">
            <a class="page-link" href="<?php echo ((($current_page+1)*3) <= intval($this->data[1][0][0]))?'/list/'.($current_page+1).'/'.$this->data[3]:'' ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
    <?php echo $this->data[0]['Id'] ?>
<?php //$string = '/home/virtwww/w_testwebsite-cc-ua_6cf7ea8f/http/vendor/guahanweb/php-router/src/GuahanWeb/Http/Router.php';
//
//echo preg_replace_callback("/(\/.*\/)(([a-zA-Z]{1}))(.*)/im",
//    function ($matches) {
//        return $matches[1]. mb_strtolower($matches[2]).$matches[4];
//    }, $string);
//?>

        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
            </div>
            <!-- /.container -->
        </footer>
        <script src="../../assets/js/jquery.js"></script>
        <script src="../../assets/js/send_file.js"></script>
        <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>

<!-- assets/js/jquery.js -->