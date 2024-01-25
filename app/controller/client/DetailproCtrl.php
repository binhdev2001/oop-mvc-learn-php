<?php
class DetailproCtrl extends Controller
{
    public $modelDetialpro;
    public $viewTheme;
    public function __construct()
    {
        $this->modelDetialpro = $this->loadModel('DetailproModel');  // Gọi File Models thên tên truyền vào
        $data = $this->modelDetialpro->getList();
        //Gọi view cùng với data truyền vào
        $this->ViewTheme('/theme/Detailpro', $data);
    }
}