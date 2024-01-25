<?php
class UploadfontCtrl extends Controller
{
	public function __construct()
	{
		$this->loadModel = $this->loadAdminModel('Uploadfont');  // Gọi File Models thên tên truyền vào
		if (!empty($_POST)) {
			$name_func = $_POST['action'];
			$this->$name_func();
		}
		$data["cate_font"] = $this->get_cate_font();
		$this->ViewAdmin('UploadFont', $data);
	}
	public function get_cate_font()
	{
		$result = $this->loadModel->getAllcate();

		return array_values($result);
	}
	public function up_load_avt_font()
	{

		$status = $this->loadModel->up_load_font_feature_img();

		return $status;
	}
	public function up_load_font_archive()
	{
		$status = $this->loadModel->upLoadFontArchive();

		echo $status;
	}
	function post_data_font_detail()
	{

		$font_name = $_POST['acf_post_title'];

		$font_price = $_POST['acf_post_price'];
		$img_feature = $_FILES['file_feature_uploader']['name'];
		$font_cate_id = $_POST['cate_id'];
		$file_archive = $_FILES['file_archive']['name'];
		$user_id = $_POST['user_id'];
		$tac_gia = $_POST['font_author'];
		$team_name = $_POST['team_viet_hoa'];
		$status = $this->loadModel->PostdataDetail($font_name, $font_price, $img_feature, $font_cate_id, $file_archive, $user_id, $tac_gia, $team_name);

		echo $status;


	}
}