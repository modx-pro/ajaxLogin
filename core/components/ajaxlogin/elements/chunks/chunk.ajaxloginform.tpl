<div class="ajaxlogin-form">
    [[+errors]]
    <form action="/" method="post" class="form-horizontal" role="form">
        <fieldset>

            <legend>[[%ajaxlogin_auth]]</legend>

            <div class="form-group">
                <label for="ajaxlogin-username" class="col-sm-2 control-label">[[%ajaxlogin_login]]</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ajaxlogin-username" name="username" placeholder="[[%ajaxlogin_login]]">
                </div>
            </div>

            <div class="form-group">
                <label for="ajaxlogin-password" class="col-sm-2 control-label">[[%login.password]]</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="ajaxlogin-password" name="password" placeholder="[[%login.password]]">
                </div>
            </div>

            <input type="hidden" name="service" value="login" />

            <div class="form-group">
                <div class="col-sm-offset-8 col-sm-4">
                    <input type="submit" class="btn btn-primary ajaxlogin-action" name="Login" value="[[%ajaxlogin_auth]]" />
                </div>
            </div>

        </fieldset>
    </form>
</div>