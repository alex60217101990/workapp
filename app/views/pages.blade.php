<body>
<!-- Project One -->
<div class="row">
    <div class="col-md-7">
        <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
        </a>
    </div>
    <div class="col-md-5">

        <?php foreach ($data as $element): ?>
            <h3><?php echo $this->escape($element['Id']); ?></h3>
            <p contenteditable="true" class="canChange"> <?php echo $this->escape($element['Name']); ?> </p>
            <p contenteditable="true" class="canChange">
                <?php echo $this->escape($element['Mail']); ?>
            </p>
            <p>
                <?php echo $this->escape($element['Tests']); ?>
            </p>
            <p contenteditable="true" class="canChange">Content</p>
            <label class="custom-control material-checkbox">
                <input type="checkbox" class="material-control-input">
                <span class="material-control-indicator"></span>
                <span class="material-control-description">Status</span>
            </label>
            <a class="btn btn-primary" href="#">View Project</a>
            <a data-task-id="" class="save_on_server" class="btn btn-warning" href="#">Save</a>
        <?php endforeach; ?>
    </div>
</div>
<!-- /.row -->

<hr>

<!-- Project Two -->
<div class="row">
    <div class="col-md-7">
        <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
        </a>
    </div>
    <div class="col-md-5">
        <h3>Project Two</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, odit velit cumque vero doloremque repellendus distinctio maiores rem expedita a nam vitae modi quidem similique ducimus! Velit, esse totam tempore.</p>
        <a class="btn btn-primary" href="#">View Project</a>
    </div>
</div>
<!-- /.row -->

<hr>

<!-- Project Three -->
<div class="row">
    <div class="col-md-7">
        <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
        </a>
    </div>
    <div class="col-md-5">
        <h3>Project Three</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, temporibus, dolores, at, praesentium ut unde repudiandae voluptatum sit ab debitis suscipit fugiat natus velit excepturi amet commodi deleniti alias possimus!</p>
        <a class="btn btn-primary" href="#">View Project</a>
    </div>
</div>
<!-- /.row -->

<hr>

<!-- Pagination -->
<ul class="pagination justify-content-center">
    <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
    </li>
    <li class="page-item">
        <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
</ul>

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
    <!-- /.container -->
</footer>
