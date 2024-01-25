<?php
//==========================User Ctrl====================
$routes['default_ctrl'] = 'homeCtrl';
$routes['trang-chu'] = 'client/homeCtrl';
$routes['chi-tiet'] = 'client/detailproCtrl';
$routes['dang-nhap'] = 'client/userCtrl';
$routes['dang-ky'] = 'client/userCtrl';
$routes['thong-tin-tai-khoan'] = 'client/userCtrl';
$routes['download-font'] = 'client/DownloadpageCtrl';
//==================Admin Ctrl============================
// =============== Check Role admin=============
if (!empty($_SESSION['userinfo'])) {

	$routes['tai-xuong'] = 'admin/DownloadFontCtrl';
	if (!empty($_SESSION['userinfo'] && $_SESSION['userinfo']['user_role'] == 1)) {
		//dowload-font
		$routes['wp-admin'] = 'admin/adminCtrl';
		$routes['wp-admin/(.+-)'] = 'admin/adminCtrl';
		$routes['upload-font'] = 'admin/uploadfontCtrl';
		$routes['get_data_cate_font'] = 'admin/uploadfontCtrl';
	} else {

	}
}
// ===============End Check Role admin=============

?>