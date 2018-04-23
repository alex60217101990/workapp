
<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <form role="form" class="was-validated">
            <fieldset>
                <h2>Please Sign In</h2>
                <hr class="colorgraph">
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg is-invalid"
                           pattern='^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$' placeholder="Email Address">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg is-invalid"
                           pattern="\d{1}" placeholder="Password">
                </div>

                <div class="form-group">
                    <textarea type="text" name="description" id="description" class="form-control input-lg is-invalid"
                              placeholder="Description"></textarea>
                </div>

                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign In">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <a href="" class="btn btn-lg btn-primary btn-block">Register</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>