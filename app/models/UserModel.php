<?php
class UserModel extends Model
{
	protected $table = 'pb_users';
	public function loginUserModel($username, $password)
	{
		$result = [
			"status" => 0,
			"user_role" => 0,
			"msg" => ""
		];
		if ($username && $password) {
			$sql = "SELECT * FROM " . $this->table . " WHERE `user_email` = '" . $username . "'";
			$datarr = $this->db->fetch_all($sql);
			if (!empty($datarr)) {
				$data = $datarr[0];
				if ($password == $data['user_pass']) {
					$userinfo = [
						'ID' => $data['ID'],
						'user_role' => $data['user_status'],
						'display_name' => $data['display_name'],
					];
					$_SESSION['userinfo'] = $userinfo;
					$result['status'] = 1;
					$result['msg'] = "Đăng nhập thành công ";
					$result['user_role'] = $data['user_status'];
				} else {
					$result['msg'] = "Sai mật khẩu ! Vui lòng nhập lại !";
				}
			} else {
				$result['msg'] = "Tài khoản không tồn tại trên hệ thống ! Vui lòng đăng kí ";
			}

		}
		return $result;

	}
	public function SignupUserModel($email_user, $password, $display_name)
	{

		$result = [
			"status" => 0,
			"msg" => ""
		];
		$check_user = "SELECT * FROM `pb_users` WHERE user_email = '$email_user';";
		$status = $this->db->fetch_all($check_user);
		if (!empty($status) && $status[0]['user_email'] == $email_user) {
			$result['msg'] = "Email đã đăng kí tài khoản";
		} else {
			echo "User dang ki thanh cong !";
			$time_register = date("Y-m-d h:i:sa");
			$sql = "INSERT INTO `pb_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
			(NULL, '', '$password', '$display_name', '$email_user', '', '$time_register', '', '0', '$display_name');";
			$status = $this->db->insert($sql);
			if ($status) {
				$result['msg'] = "Hi " . $display_name . " ! Bây giờ bạn có thể đăng nhập !  ";
				$result['status'] = 1;
			} else {
				$result['msg'] = "Có lỗi xảy ra ! Vui lòng thử lại  ";
			}

		}

		return $result;
	}
}