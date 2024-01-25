<?php
class AdminCtrl extends Controller
{
	public $dataAdmin = []; //Khai báo mảng chứ nhiều data
	public function __construct()
	{
		if (!empty($_SESSION['userinfo'])) {
			if (!empty($_SESSION['userinfo'] && $_SESSION['userinfo']['user_role'] == 1)) {

				$this->ViewAdmin('Dashboard');
			} else {
				$this->ViewTheme('/theme/Account-info');
			}
			if (!empty($_POST['login_user'])) {
				$this->logoutUser();
			}
		} else {
			echo 'Chua dang nhap';
			header('Location: dang-nhap');
		}

	}
	public function logoutUser()
	{
		unset($_SESSION['userinfo']); // Delete session user
		header('Location: trang-chu'); // Redirect go home page
	}
}