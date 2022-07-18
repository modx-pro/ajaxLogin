<div class="ajaxlogin-form ajaxlogin-register">
    [[+error.message]]
    <form action="/" method="post" class="form-horizontal" role="form">
        <fieldset>

            <input type="hidden" name="nospam:blank" value="" />

            <legend>[[%ajaxlogin_register]]</legend>

            <div class="form-group">
                <label for="ajaxlogin-username" class="col-sm-4 control-label">[[%ajaxlogin_login]] <span class="ajaxlogin-error">*</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="ajaxlogin-username" name="username:required:minLength=3" value="[[+username]]" placeholder="[[%ajaxlogin_login]]">
                    [[+error.username]]
                </div>
            </div>

            <div class="form-group">
                <label for="ajaxlogin-fullname" class="col-sm-4 control-label">[[%ajaxlogin_fullname]] <span class="ajaxlogin-error">*</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="ajaxlogin-fullname" name="fullname:required" value="[[+fullname]]" placeholder="[[%ajaxlogin_fullname]]" />
                    [[+error.fullname]]
                </div>
            </div>

            <div class="form-group">
                <label for="ajaxlogin-email" class="col-sm-4 control-label">[[%ajaxlogin_email]] <span class="ajaxlogin-error">*</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="ajaxlogin-email" name="email:email" value="[[+email]]" placeholder="[[%ajaxlogin_email]]" />
                    [[+error.email]]
                </div>
            </div>

            <div class="form-group">
                <label for="ajaxlogin-password" class="col-sm-4 control-label">[[%ajaxlogin_password]] <span class="ajaxlogin-error">*</span></label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="ajaxlogin-password" name="password:required:minLength=6" value="[[+password]]" placeholder="[[%ajaxlogin_password]]" />
                    [[+error.password]]
                </div>
            </div>

            <div class="form-group">
                <label for="ajaxlogin-password-confirm" class="col-sm-4 control-label">[[%ajaxlogin_password_confirm]] <span class="ajaxlogin-error">*</span></label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="ajaxlogin-password-confirm" name="password_confirm:password_confirm=`password`" value="[[+password_confirm]]" placeholder="[[%ajaxlogin_password_confirm]]" />
                    [[+error.password_confirm]]
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-8 col-sm-4">
                    <input type="submit" class="btn btn-primary ajaxlogin-action"  name="login-register-btn" value="[[%ajaxlogin_register]]" />
                </div>
            </div>

        </fieldset>
    </form>
</div>