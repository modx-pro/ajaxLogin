<?php

define('MODX_API_MODE', true);
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/index.php';
$modx->getService('error','error.modError');
$modx->setLogLevel(modX::LOG_LEVEL_ERROR);
$modx->setLogTarget('FILE');

if (!empty($_REQUEST['ctx'])) {
    $modx->switchContext($_REQUEST['ctx']);
}

$ajaxLogin = $modx->getService('ajaxlogin', 'ajaxLogin', $modx->getOption('ajaxlogin_core_path', null,
        $modx->getOption('core_path') . 'components/ajaxlogin/') . 'model/ajaxlogin/');

if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
    $modx->sendRedirect($modx->makeUrl($modx->getOption('site_start'),'','','full'));
} elseif (!empty($_REQUEST['action'])) {
    echo $ajaxLogin->initialize($_REQUEST);
} else {
    die();
}
