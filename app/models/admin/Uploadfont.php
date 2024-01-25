<?php
class Uploadfont extends Model
{
	public function getAllcate()
	{
		$sql = "SELECT * FROM `pb_categories_font`";
		$datarr = $this->db->fetch_all($sql);
		if (!empty($datarr)) {
			return $datarr;
		}
	}
	function up_load_font_feature_img()
	{


		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (isset($_FILES['file'])) {
				$file = $_FILES['file'];
				$file_name = $file['name'];
				$file_size = $file['size'];
				$file_tmp = $file['tmp_name'];
				$file_type = $file['type'];
				$file_parts = explode('.', $file['name']);
				$file_ext = strtolower(end($file_parts));
				$name_update = md5(uniqid() . '.' . $file_ext);
				$expensions = array("jpeg", "jpg", "png");

				$response = array(
					'status' => 0,
					'message' => 'Lỗi ! Đã có lỗi xảy ra.'
				);
				if (in_array($file_ext, $expensions) === false) {
					$response['message'] = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
				}
				if ($file_size > 2097152) {
					$response['message'] = 'Kích thước file không được lớn hơn 2MB';
				}
				if (isset($_SERVER['HTTPS'])) {
					$target = $_SERVER['DOCUMENT_ROOT'] . "/public/admin/upload/font-feature-img/" . basename($file_name);
				} else {
					$target = _DIR_ROOT . "/public/admin/upload/font-feature-img/" . basename($file_name);

				}


				if (move_uploaded_file($file['tmp_name'], $target)) {
					$response['status'] = 1;
					$response['message'] = 'Upload ảnh đại diện thành công !';
					echo json_encode($response);
					die;
				} else {
					$response['status'] = 0;
					$response['message'] = 'Upload ảnh đại diện không thành công !';
					echo json_encode($response);
					die;
				}
			} else
				$response['message'] = "Lỗi.";
			echo json_encode($response);
			die;
		} else
			$response['message'] = "Unsupported request method.";
		$status = json_encode($response);
		return $status;
	}
	function up_load_font_archive()
	{


		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (isset($_FILES['file_archive'])) {
				$file = $_FILES['file_archive'];
				$file_name = $file['name'];
				$file_size = $file['size'];
				$file_tmp = $file['tmp_name'];
				$file_type = $file['type'];

				$file_parts = explode('.', $file['name']);
				$file_ext = strtolower(end($file_parts));
				$name_update = md5(uniqid() . '.' . $file_ext);
				$expensions = array("zip", "rar", "7zip", "ttf", "otf"); //".zip,.rar,.7zip,.ttf,.otf"

				$response = array(
					'status' => 0,
					'message' => 'Xảy ra lỗi vui lòng kiểm tra lại .',
					'name' => '',
					'size' => '',


				);
				if (in_array($file_ext, $expensions) === false) {
					$response['status'] = 0;
					$response['message'] = "Định dạng file không hợp lệ !.";
					echo json_encode($response);
				}
				if ($file_size > 20097152) {
					$response['status'] = 0;
					$response['message'] = 'Kích thước file không được lớn hơn 20MB';
					echo json_encode($response);
				}

				if (isset($_SERVER['HTTPS'])) {
					$target = $_SERVER['DOCUMENT_ROOT'] . "/public/admin/upload/font-archive/" . basename($file_name);
				} else {
					$target = _DIR_ROOT . "/public/admin/upload/font-archive/" . basename($file_name);

				}


				if (move_uploaded_file($file['tmp_name'], $target)) {
					$response['status'] = 1;
					$response['message'] = 'Upload file thành công !';
					$response['name'] = $file_name;
					$response['size'] = round($file_size / 1024 / 1024, 2);
					echo json_encode($response);
					die;
				} else {
					$response['status'] = 0;
					$response['message'] = 'Upload file không thành công !';
					echo json_encode($response);
					die;
				}
			} else
				$response['message'] = "File does not exist.";
			echo json_encode($response);
			die;
		} else
			$response['message'] = "Unsupported request method.";
		echo json_encode($response);
		die;
	}
	public function upLoadFontArchive()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (isset($_FILES['file_archive'])) {
				$file = $_FILES['file_archive'];
				$file_name = $file['name'];
				$file_size = $file['size'];
				$file_tmp = $file['tmp_name'];
				$file_type = $file['type'];

				$file_parts = explode('.', $file['name']);
				$file_ext = strtolower(end($file_parts));
				$name_update = md5(uniqid() . '.' . $file_ext);
				$expensions = array("zip", "rar", "7zip", "ttf", "otf"); //".zip,.rar,.7zip,.ttf,.otf"

				$response = array(
					'status' => 0,
					'message' => 'Xảy ra lỗi vui lòng kiểm tra lại .',
					'name' => '',
					'size' => '',


				);
				if (in_array($file_ext, $expensions) === false) {
					$response['status'] = 0;
					$response['message'] = "Định dạng file không hợp lệ !.";
					echo json_encode($response);
				}
				if ($file_size > 20097152) {
					$response['status'] = 0;
					$response['message'] = 'Kích thước file không được lớn hơn 20MB';
					echo json_encode($response);
				}

				if (isset($_SERVER['HTTPS'])) {
					$target = $_SERVER['DOCUMENT_ROOT'] . "/public/admin/upload/font-archive/" . basename($file_name);
				} else {
					$target = _DIR_ROOT . "/public/admin/upload/font-archive/" . basename($file_name);
				}


				if (move_uploaded_file($file['tmp_name'], $target)) {
					$response['status'] = 1;
					$response['message'] = 'Upload file thành công !';
					$response['name'] = $file_name;
					$response['size'] = round($file_size / 1024 / 1024, 2);
					echo json_encode($response);
					die;
				} else {
					$response['status'] = 0;
					$response['message'] = 'Upload file không thành công !';
					echo json_encode($response);
					die;
				}
			} else
				$response['message'] = "File does not exist.";
			echo json_encode($response);
			die;
		} else
			$response['message'] = "Unsupported request method.";
		echo json_encode($response);
		die;
	}
	function PostdataDetail($font_name, $font_price, $img_feature, $font_cate_id, $file_archive, $user_id, $tac_gia, $team_name)
	{

		$time_current = date("Y-m-d h:i:s");

		$table = 'pb_detail_font';
		$sql = ("INSERT INTO `" . $table . "`(`id_font`, `font_name`, `image_feature`, `font_url`, `mota`, `font_date`, `font_date_gmt`, `font_modified`, `font_modified_gmt`, `font_cate_id`, `user_id`, `tac_gia`, `team_viet_hoa`, `price`) VALUES ('','" . $font_name . "','" . $img_feature . "','" . $file_archive . "','','" . $time_current . "','" . $time_current . "','" . $time_current . "','" . $time_current . "','" . $font_cate_id . "','" . $user_id . "','" . $tac_gia . "','" . $team_name . "','" . $font_price . "')");
		$status = $this->db->insert($sql);
		echo $status;
		die;
	}
}