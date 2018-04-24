
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
                <div class="card-body" style="background: #808080; max-height: 100px">
                    <div class="input-group">
                        <div class="select" style="position:relative;top: -40px">
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
            <p style="overflow-y: scroll" contenteditable="true"
               data-task-id="<?php echo $this->escape($element['Id']); ?>" class="pD">
                <?php echo $this->escape($element['Description']); ?>
            </p>
        </div>
        <div class="btn-group">
            <button class="save_on_server btn btn-warning Save"
                    style="z-index: 10000000; border-radius: 5px!important; "
                    data-task-id="<?php echo $this->escape($element['Id']); ?>">Save
            </button>

            <div style="position:relative; width: 90%; text-overflow: ellipsis; margin-left: 5px">
                <form class="upload-image" enctype="multipart/form-data"
                      data-task-id="<?php echo $this->escape($element['Id']); ?>">
                    <input style="position: relative; z-index: 10000000;" type="submit" class="btn btn-outline-info">
                    <a class='btn btn-outline-secondary' href='javascript:;'>
                        Choose File...
                        <input type="file" name="image" class="image"
                               data-task-id="<?php echo $this->escape($element['Id']); ?>"
                               style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
                        -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
                        opacity:0;background-color:transparent;color:transparent;' size="40"
                               onchange='$("#upload-file-info").html($(this).val());'>
                    </a>
                    <span class='label label-info' id="upload-file-info"></span>
                </form>
            </div>
        </div>
    </div>
</div>
            <hr>
        <?php endforeach; ?>

    <?php
    /*текущая страница*/
    $iCurr = intval($this->data[2]);
    /*всего страниц или конечная страница*/
    $iEnd = ceil(intval($this->data[1][0][0]) / 3);
    /*левый и правый лимиты*/
    $iLeft = 1;
    $iRight = 1;
    /*вызов функции*/
    $previous_page =  (intval($this->data[2])-1)<1 ? 1 : intval($this->data[2])-1;
    $next_page = (intval($this->data[2])+1)>$iEnd ? intval($this->data[2]) : intval($this->data[2])+1;
    ?>
    <!-- Pagination -->
    <ul class="pagination justify-content-center">
        <li class="page-item"> <!-- echo '/list/'.$counter_before.'/'.$this->data[3]  -->
            <a href="<?php echo '/list/'. $previous_page. '/' . $this->data[3] ?>"
                <?php if($previous_page-1==0 && intval($this->data[2])==1): ?>
                    class="disabled page-link"
                    <?php else: ?>
                    class="page-link"
                <?php endif; ?>
               aria-label="Previous">
                <span aria-hidden="true">&#9668;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <?php if ($iCurr > $iLeft && $iCurr < ($iEnd - $iRight)): ?>
            <?php for ($i = $iCurr - $iLeft; $i <= $iCurr + $iRight; $i++) : ?>
                <li class="page-item">
                    <a class="page-link"
                        <?php if($i==intval($this->data[2])): ?>
                            style="background: #E6E6FA"
                        <?php endif; ?>
                       href="<?php echo '/list/' . $i . '/' . $this->data[3]; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
        <?php elseif ($iCurr <= $iLeft): ?>
            <?php $iSlice = 1 + $iLeft - $iCurr; ?>
            <?php for ($i = 1; $i <= $iCurr + ($iRight + $iSlice); $i++) : ?>
                <li class="page-item">
                    <a class="page-link"
                        <?php if($i==intval($this->data[2])): ?>
                            style="background: #E6E6FA"
                        <?php endif; ?>
                       href="<?php echo '/list/' . $i . '/' . $this->data[3]; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
        <?php else: ?>
            <?php $iSlice = $iRight - ($iEnd - $iCurr); ?>
            <?php for ($i = $iCurr - ($iLeft + $iSlice); $i <= $iEnd; $i++): ?>
                <li class="page-item">
                    <a class="page-link"
                        <?php if($i==intval($this->data[2])): ?>
                            style="background: #E6E6FA;"
                        <?php endif; ?>
                       href="<?php echo '/list/' . $i . '/' . $this->data[3]; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
        <?php endif; ?>
        <li class="page-item">
            <a href="<?php echo '/list/' . $next_page . '/' . $this->data[3] ?>"
                <?php if((intval($this->data[2])+1)>$iEnd): ?>
                    class="disabled page-link"
                <?php else: ?>
                    class="page-link"
                <?php endif; ?>
               aria-label="Next">
                <span aria-hidden="true">&#9658;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>


