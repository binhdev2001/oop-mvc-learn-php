
<?php
class HomeCtrl extends Controller
{
    public $model_home;
    public $dataHome = []; //Khai báo mảng chứ nhiều data
    public $viewTheme;
    public function __construct()
    {
        $this->model_home = $this->loadModel('HomeModel');  // Gọi File Models thên tên truyền vào
        $dataList = $this->model_home->getAllPro();
        $this->dataHome['allProduct'] = $dataList;
        //Gọi view cùng với data truyền vào
        $this->ViewTheme('/theme/Homepage', $this->dataHome);
    }
}

