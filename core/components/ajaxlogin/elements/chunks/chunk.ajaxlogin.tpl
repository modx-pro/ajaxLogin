<div class="pull-right">
    <ul class="nav navbar-nav mb-links-block">
        <li>
            <a class="ajaxlogin-btn" data-toggle="modal" data-target="#ajaxlogin-modal" data-ajaxlogin="Login" href="#">
                <span>[[%ajaxlogin_enter]]</span>
            </a>
        </li>
    </ul>
</div>

<!--ajaxLogin-->

<div class="pull-right">
    <ul class="dropdown nav navbar-nav mb-links-block">
        <li>
        <a id="ajaxlogin-menu" role="button" data-toggle="dropdown" data-target="#" href="/">
            <span>[[!+modx.user.id:userinfo=`fullname`]]</span> <i class="caret"></i>
        </a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">

            <li role="presentation" class="divider"></li>
            <li><a href="[[~[[*id]]? &service=`logout`]]">[[%ajaxlogin_exit]]</a></li>
        </ul>
        </li>
    </ul>
</div>
