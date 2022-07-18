<div class="ajaxlogin-form">
    [[+loginfp.errors]]
    <form action="/" method="post" class="form-horizontal" role="form">
        <fieldset>

            <legend>[[%login.forgot_password]]</legend>

            <p class="text-danger">[[%ajaxlogin_forgot_info]]</p>

            <div class="form-group">
                <label for="ajaxlogin-username" class="col-sm-2 control-label">[[%ajaxlogin_login]]</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ajaxlogin-username" name="username" value="[[+loginfp.post.username]]" placeholder="[[%ajaxlogin_login]]" />
                </div>
            </div>

            <div class="form-group">
                <label for="ajaxlogin-email" class="col-sm-2 control-label">[[%ajaxlogin_email]]</label>
                <div class="col-sm-10">
                    <input class="form-control" id="ajaxlogin-email" type="text" name="email" value="[[+loginfp.post.email]]" placeholder="[[%ajaxlogin_email]]" />
                </div>
            </div>

            <input type="hidden" name="returnUrl" value="[[+loginfp.request_uri]]" />
            <input type="hidden" name="login_fp_service" value="forgotpassword" />

            <div class="form-group">
                <div class="col-sm-offset-8 col-sm-4">
                    <input type="submit" class="btn btn-primary ajaxlogin-action" name="login_fp" value="[[%ajaxlogin_reset_pass]]" />
                </div>
            </div>

        </fieldset>
    </form>
</div>