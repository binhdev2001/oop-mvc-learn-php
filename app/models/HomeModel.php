<?php
class HomeModel extends Model
{
    protected $table = 'pb_detail_font';


    public function getAllPro()
    {
        $sql = "SELECT * FROM `" . $this->table . "` ;";
        $datarr = $this->db->fetch_all($sql);
        return array_values($datarr);
    }

}