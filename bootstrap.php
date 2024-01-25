<?php
//=============== declare path project=================
define('_DIR_ROOT', __DIR__);
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
	$web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
	$web_root = 'http://' . $_SERVER['HTTP_HOST'];
}
$urlArr = array_filter(explode('\\', filter_var(_DIR_ROOT, FILTER_SANITIZE_URL)));

if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
$urlSite = $web_root ;
} else {
$urlSite = $web_root . '/' . $urlArr[3];
}

define('siteUrl', $urlSite);
//=============== end declare path project=================
///=================Auto load all config=================
$config_dir = scandir('configs');
if (!empty($config_dir)) {
	foreach ($config_dir as $item) {
		if ($item != "." && $item != '..' && file_exists('configs/' . $item)) {
			require('configs/' . $item);
		}
	}
}
///================= End Auto load all config=================

require_once('core/Route.php');
require_once('app/App.php');
//============ Check config and load File connect data base===========
$db_config = array_filter($config['database']);
if (!empty($db_config)) {
	if (file_exists('core/Connect.php')) {
		require_once('core/Connect.php'); // Load base contronller
		require_once('core/Database.php'); // Load base Database
		
	} else {
		echo "Not file Connect!";
	}
}
//============ End Check config and load File connect data base===========
require_once('core/Model.php'); // Load base contronller
require_once('core/Controller.php'); // Load base contronller