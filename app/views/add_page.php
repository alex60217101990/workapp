<h3>Add new task.</h3>
<hr class="colorgraph">
<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-12 col-md-6 col-sm-offset-1 col-md-offset-1">
        <form role="form" class="was-validated">
            <fieldset>
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control input-lg is-invalid"
                           pattern="(([А-ЯЁа-яёa-zA-Z]*)\s*){1,3}" placeholder="Name">
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg is-invalid"
                           pattern='^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$' placeholder="Email Address">
                </div>
                <div class="form-group">
                    <textarea type="text" name="description" id="description" class="form-control input-lg is-invalid"
                              placeholder="Description"></textarea>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-5 text-center" style="margin: 10px 0px;">
        <img class="enter-block"
                style="margin: auto; max-width: 100%; border-radius: 7px; max-height: 200px!important;"
                id="preview" src="../../assets/images/900x500.png">
    </div>
</div>
<hr class="colorgraph">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="btn-group" style="margin-bottom: 30px; height: 38px">
            <button class="btn btn-success" id="save" style="margin-right: 5px; border-radius: 5px">Add</button>
            <button class="btn btn-danger" style=" border-radius: 5px" id="ModStart"
                    data-toggle="modal" data-toggle="modal" data-target="#largeModal">Look</button>
            <div style="position:relative; width: 90%; text-overflow: ellipsis; margin-left: 5px">
                <form class="upload-image" id="upload-image" enctype="multipart/form-data">
                    <input style="position: relative; z-index: 700;" type="submit" class="btn btn-info">
                    <a class='btn btn-secondary' href='javascript:;'>
                        Choose File...
                        <input type="file" name="image" id="image" class="image"
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
<!-- large modal -->
<div class="modal fade" style="z-index: 1041;" id="largeModal" tabindex="-1"
     role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header cast-modal"
                 style="background-color:#444; color:#ddd;">
                <h4 class="modal-title" id="myModalLabel">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-7">
                        <a href="#">
                            <img class="img-fluid rounded mb-3 mb-md-0 preview"
                                 style="max-height: 200px!important" id="previewMod" src="http://placehold.it/700x300" alt="">
                            <!-- http://placehold.it/700x300 -->
                        </a>
                    </div>
                    <div class="col-md-5">
                        <p style="color:#A9A9A9;" id="nameModal">
                        </p>
                        <p style="color:#A9A9A9;" id="mailModal">
                        </p>
                        <label class="custom-control material-checkbox">
                            <input type="checkbox" class="material-control-input CheckboxVal">
                            <span class="material-control-indicator"></span>
                            <span class="material-control-description">Status</span>
                        </label>
                    </div>
                    <div class="col-md-10">
                        <div style="overflow-y: hidden">
                            <p style="overflow-y: scroll" id="descModal"></p>
                        </div>
                        <div class="btn-group">
                            <button class="save_on_server btn btn-warning Save"
                                    style="z-index: 10000000; border-radius: 5px!important; ">Save
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer cast-modal text-center"
                 style="background-color:#444; color:#ddd;">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>