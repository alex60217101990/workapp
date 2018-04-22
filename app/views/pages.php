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
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/1-col-portfolio.css" rel="stylesheet">
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

    <!-- Sidebar Widgets Column -->
    <div class="row">
        <div class="col-md-8">
            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Sorted by...">
                        <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php var_dump(intval($this->data[1][0][0])) ?>
<!-- Project One -->
        <?php foreach ($this->data[0] as $element): ?>
<div class="row">
    <div class="col-md-7">
        <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
        </a>
    </div>
    <div class="col-md-5">
            <h3 class="h3" contenteditable="true" data-task-id="<?php echo $this->escape($element['Id']); ?>"><?php echo $this->escape($element['Id']); ?></h3>
            <p contenteditable="true" class="pN" data-task-id="<?php echo $this->escape($element['Id']); ?>">
                <?php echo $this->escape($element['Name']); ?>
            </p>
            <p contenteditable="true" class="pE" data-task-id="<?php echo $this->escape($element['Id']); ?>">
                <?php echo $this->escape($element['Mail']); ?>
            </p>

            <label class="custom-control material-checkbox">
                <input type="checkbox" class="material-control-input CheckboxVal"
                      <?php echo ((bool)$this->escape($element['Status'])===TRUE)?'checked':''; ?>
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
        <a class="btn btn-primary" href="#">View Project</a>
        <span class="save_on_server btn btn-warning Save" href="#" data-task-id="<?php echo $this->escape($element['Id']); ?>">Save</span>
    </div>
</div>
            <hr>
        <?php endforeach; ?>

        <?php for($i=$this->data[0][2]['Id']/3; $i<intval($this->data[1][0][0])/3+1; $i++) //intval($this->data[1][0][0])/3+1
         //   var_dump(intval($this->data[2][0]));
        $count_entrys = intval($this->data[1][0][0]); // количество записей
        $entry_on_page = 3; // количество записей на странице
        $current_page = intval($this->data[2][0]); // текущая страница
        $max_pages_list = 3; // сколько номеров страниц показывать

        $count_pages = ceil($count_entrys / $entry_on_page);
        $from = $current_page + ceil(($max_pages_list-1) / 2);
        $to = $current_page + floor(($max_pages_list-1) / 2);

        ?>
    <!-- Pagination -->
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="<?php echo ($current_page-1) >= 0 ? '/list/'.($current_page-1):'' ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <?php for($i = $from; $i <= $to; $i++ ): //intval($this->data[1][0][0])/3+1 ?>
        <li class="page-item">
            <a class="page-link" href="<?php echo ($i*3<intval($this->data[1][0][0]))?'/list/'.$i:'' ?>"><?php echo $i ?></a>
        </li>
        <?php endfor; ?>
      <!--  <li class="page-item">
            <a class="page-link" href="<?php //echo '/list/'.$this->data[2]['Id']/3 ?>">2</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">3</a>
        </li> -->
        <li class="page-item">
            <a class="page-link" href="<?php echo ((($current_page+1)*3) <= intval($this->data[1][0][0]))?'/list/'.($current_page+1):'' ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
    <?php echo $this->data[0]['Id'] ?>


        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
            </div>
            <!-- /.container -->
        </footer>
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/send_file.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>

<!-- assets/js/jquery.js -->