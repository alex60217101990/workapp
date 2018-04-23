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
    <?php if(isset($this->data['page']) && $this->data['page']==='new'): ?>
        <link href="../../assets/css/second_page.css" rel="stylesheet">
    <?php endif; ?>
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
                    <a class="nav-link" href="<?php echo('/list/1/Id') ?>">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo('/new_task') ?>">Add new</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo('/new_task') ?>">Services</a>
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

    <?php if(isset($this->data['page']) && $this->data['page']==='new_task'): ?>
        <?php echo $this->load('add_page', [$this->data]); ?>
    <?php elseif(isset($this->data['page']) && $this->data['page']==='first'): ?>
        <?php echo $this->load('pages', [$this->data]); ?>
    <?php endif; ?>

</div>
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
<?php if(isset($this->data['page']) && $this->data['page']==='new'): ?>
    <script src="../../assets/js/add_page.js"></script>
<?php endif; ?>
</body>
</html>
