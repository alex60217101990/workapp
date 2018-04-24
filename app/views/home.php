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
    <?php if (isset($this->data['page']) && $this->data['page'] === 'new'): ?>
        <link href="../../assets/css/second_page.css" rel="stylesheet">
    <?php endif; ?>
</head>
<body>


<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="?page=main"><?php echo($this->data['page']?$this->data['page']:'start') ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <?php if (isset($this->data['page']) && $this->data['page'] === 'first'): ?>
                <li class="nav-item active">
                    <?php else: ?>
                <li class="nav-item">
                <?php endif; ?>
                    <a class="nav-link" href="<?php echo('/list/1/Id') ?>">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <?php if (isset($this->data['page']) && $this->data['page'] === 'new_task'): ?>
                <li class="nav-item active">
                    <?php else: ?>
                <li class="nav-item">
                <?php endif; ?>
                    <a class="nav-link" href="<?php echo('/new_task') ?>">Add new</a>
                </li>



                <li class="nav-item">
                    <a class="nav-link" href="<?php echo('/new_task') ?>">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <?php
                    //$_SESSION["Auth"]=["Auth"=>true/false,"UserName"=>"UserName","AccountType"=>"User/Admin"]
                    if (!isset($_SESSION["Auth"])) {
                        echo <<<AUTH
                        <a href="#" id="AuhtorizationBtn" class="nav-link"  data-toggle="modal" data-target="#AuthorizationModal" >
                          SignIn
                        </a>
AUTH;
                    } else {
                        echo <<<AUTH
                    <a href="#" class="nav-link"  >
                        {$_SESSION["Auth"]["UserName"]}
                    </a>
AUTH;
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Page Content -->
<div class="container">

    <?php if (isset($this->data['page']) && $this->data['page'] === 'new_task'): ?>
        <?php echo $this->load('add_page', [$this->data]); ?>
    <?php elseif (isset($this->data['page']) && $this->data['page'] === 'first'): ?>
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



<!-- Modal Authorization -->
<div class="modal fade mt-5" id="AuthorizationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="signInForm" method="POST"  action="/authorization" >
                    <div class="form-group">
                        <label for="inputLogin">Login</label>
                        <div class="search-product pos-relative bo4 ">
                            <input name="login" id="UserLogin" type="txt" class="form-control" id="inputLogin"
                                   aria-describedby="loginHelp" placeholder="Enter Login">
                        </div>
                        <small id="loginHelp" class="form-text text-muted">We'll never share your login with anyone
                            else.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <div class="search-product pos-relative bo4 ">
                            <input name="password" id="UserPassword" type="password" class="form-control" id="inputPassword"
                                   placeholder="Password">
                        </div>
                    </div>
                    <button type="button" id="Auth" class="btn bg-primary">Login In</button>
                </form>

            </div>
        </div>
    </div>
</div>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>

<?php if (isset($this->data['page']) && $this->data['page'] === 'first'): ?>
    <script src="../../assets/js/send_file.js"></script>
<?php endif; ?>
<?php if (isset($this->data['page']) && $this->data['page'] === 'new_task'): ?>
    <script src="../../assets/js/add_page.js"></script>
<?php endif; ?>

<?php if (!isset($_SESSION["Auth"])): ?>
    <script src="../../assets/js/authorization.js"></script>
<?php endif; ?>

</body>
</html>
