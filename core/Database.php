<?php
class Database
{
	private $__connect;
	public function __construct()
	{
		global $db_config;
		$this->__connect = Connect::getInstance($db_config); // Recall funtion connect db
	}

	public function insert($sql)
	{
		if (!empty($sql)) {
			$status = $this->__connect->query($sql);
		}
		if ($status) {
			return true;
		}
		return false;

	}
	public function fetch_all($sql)
	{
		$query = $this->__connect->prepare("$sql");
		$query->execute();
		$data = $query->fetchAll(); //  dạng một mảng kết hợp.
		return $data;
	}
	// public function query($sql)
	// {
	// 	$statement = $this->__connect->prepare($sql);
	// 	// $statement->execute();
	// 	return $statement;

	// }
}