<?php
class Route
{

	public function handleRoute($url)
	{
		global $routes;
		unset($routes['default_ctrl']);

		$url = trim($url, "/");
		if (empty($url)) {
			$url = '/';
		}
		$handleUrl = $url;
		if (!empty($routes)) {
			foreach ($routes as $key => $value) {
				if (preg_match('~' . $key . '~is', $url)) { // Biểu thức so sánh url có bằng với route đã khai báo
					$handleUrl = preg_replace('~' . $key . '~is', $value, $url);
				}
			}
		}
		return $handleUrl;
	}
}