<div class="modal fade" id="ajaxlogin-modal" tabindex="-1" role="dialog" aria-labelledby="ajaxlogin-modal-Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs">
                    <li class="ajaxlogin ajaxlogin-Login">
                        <a href="#ajaxLoginForm" class="ajaxlogin-btn" data-toggle="tab" data-ajaxlogin="Login">[[%ajaxlogin_auth]]</a>
                    </li>
                    <li class="ajaxlogin ajaxlogin-Register">
                        <a href="#ajaxLoginForm" class="ajaxlogin-btn" data-toggle="tab" data-ajaxlogin="Register">[[%ajaxlogin_register]]</a>
                    </li>
                    <li class="ajaxlogin ajaxlogin-ForgotPassword">
                        <a href="#ajaxLoginForm" class="ajaxlogin-btn" data-toggle="tab" data-ajaxlogin="ForgotPassword">[[%ajaxlogin_forgot]]</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="ajaxLoginForm"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">[[%ajaxlogin_close]]</button>
            </div>
        </div>
    </div>
</div>