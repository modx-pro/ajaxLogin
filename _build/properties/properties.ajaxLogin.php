<?php

$properties = [];

$tmp = [
    'tplAjax' => [
        'type' => 'textfield',
        'value' => 'ajaxLoginTpl',
    ],
    'tplModal' => [
        'type' => 'textfield',
        'value' => 'ajaxLoginModalTpl',
    ],
    'loginTpl' => [
        'type' => 'textfield',
        'value' => 'ajaxLoginFormTpl',
    ],
    'errTpl' => [
        'type' => 'textfield',
        'value' => 'ajaxLoginErrTpl',
    ],
    'tpl' => [
        'type' => 'textfield',
        'value' => 'ajaxLoginForgotFormTpl',
    ],
    'sentTpl' => [
        'type' => 'textfield',
        'value' => 'ajaxLoginForgotPassSentTpl',
    ],
    'emailTpl' => [
        'type' => 'textfield',
        'value' => 'ajaxLoginForgotPassEmailTpl',
    ],
    'activationEmailTpl' => [
        'type' => 'textfield',
        'value' => 'ajaxLoginActivateEmailTpl',
    ],
    'registerTpl' => [
        'type' => 'textfield',
        'value' => 'ajaxLoginRegisterFormTpl',
    ],
    'frontendJs' => [
        'type' => 'textfield',
        'value' => 'components/ajaxlogin/js/web/ajaxlogin.js',
    ],
    'frontendCss' => [
        'type' => 'textfield',
        'value' => 'components/ajaxlogin/css/web/ajaxlogin.css',
    ],
    'logoutResourceId' => [
        'type' => 'numberfield',
        'value' => '',
    ],
    'tplType' => [
        'type' => 'textfield',
        'value' => 'embedded',
    ],
    'resetResourceId' => [
        'type' => 'numberfield',
        'value' => '',
    ],
    'activationResourceId' => [
        'type' => 'numberfield',
        'value' => '',
    ],
    'loginResourceId' => [
        'type' => 'numberfield',
        'value' => '',
    ],
    'submittedResourceId' => [
        'type' => 'numberfield',
        'value' => '',
    ],
];

foreach ($tmp as $k => $v) {
	$properties[] = array_merge(
		[
			'name' => $k,
			'desc' => PKG_NAME_LOWER . '_prop_' . $k,
			'lexicon' => PKG_NAME_LOWER . ':properties',
		], $v
	);
}

return $properties;