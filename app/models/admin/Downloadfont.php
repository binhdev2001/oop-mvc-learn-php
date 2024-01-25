<?php
class Downloadfont extends Model
{
	public function getFileDownload($idfont)
	{
		$table = 'pb_detail_font';
		$sql = ("SELECT * FROM `pb_detail_font` WHERE `id_font` = $idfont ;");
		$data = $this->db->fetch_all($sql);
		$filename = $data[0]['font_url'];
		$file_url = _DIR_ROOT . '/public/admin/upload/font-archive/' . $filename . '';

		// Process download

		return $file_url;
	}


}