<?php
class DownloadFontCtrl extends Controller
{
	public function __construct()
	{
		$this->loadModel = $this->loadAdminModel('Downloadfont');  // Gọi File Models thên tên truyền vào
		if (!empty($_SESSION['userinfo']) && !empty($_SESSION['data_download'])) {
			$FontID = $_SESSION['data_download']["ID"];
			$this->download_font($FontID);
		}
	}
	public function download_font($FontID)
	{
		$FileUrl = $this->loadModel->getFileDownload($FontID);
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="' . basename($FileUrl) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($FileUrl));
		readfile($FileUrl);
	}
}