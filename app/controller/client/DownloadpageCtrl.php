<?php
class DownloadpageCtrl extends Controller
{
	public $dataDownload = []; //Khai báo mảng chứ nhiều data
	public function __construct()
	{
		if (!empty($_POST)) {

			if ($_POST['action'] == "download_font") {
				$_SESSION['data_download'] = [
					'ID' => $_POST['id_font'],
					'user' => $_POST['user_id']
				];
				echo 1;
				exit;
			}

		}
		$this->loadModel = $this->loadAdminModel('Downloadfont');
		$this->ViewTheme('/theme/Downloadpage', $this->dataDownload);
	}

}
