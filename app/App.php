<?php
class App
{
    private $__controller, $__action, $__params, $__routes;
    static public $app;
    function __construct()
    {
        global $routes, $config;
        self::$app = $this;
        $this->__routes = new Route();
        if (!empty($routes['default_ctrl'])) {
            $this->__controller = $routes['default_ctrl'];
        }
        $this->__action = 'index';
        $this->__params = [];
        $this->handleUrl();

    }
    public function getUrl()
    {
        if (!empty($_GET['url'])) {
            $url = $_GET['url'];
        } else {
            $url = '/';
        }
        return $url;
    }
    public function handleUrl()
    {
       
        $url = $this->getUrl();
        
        $url = $this->__routes->handleRoute($url);

        $urlArr = array_filter(explode('/', $url)); // Biến chuỗi url thành mảng
        $urlArr = array_values($urlArr);

        $urlCheck = ''; // Đường dẫn thư mục
        foreach ($urlArr as $key => $item) { // Check phần tử nào trong mảng có file và có class
            $urlCheck .= $item . "/";
            $fileCheck = rtrim($urlCheck, "/");
            $fileArr = explode('/', $fileCheck);
            $fileArr[count($fileArr) - 1] = ucfirst($fileArr[count($fileArr) - 1]);
            $fileCheck = implode('/', $fileArr);
            if (!empty($urlArr[$key - 1])) {
                unset($urlArr[$key - 1]);
            }
            if (file_exists('app/controller/' . $fileCheck . '.php')) {
                $urlCheck = $fileCheck;
                break;
            }

        }

        //==============Xử lý Ctrl=====================

        $urlArr = array_values($urlArr);
        if (!empty($urlArr[0])) {
            $this->__controller = ucfirst($urlArr[0]);
        } else {
            $this->__controller = ucfirst($this->__controller);
        }

        if (empty($urlCheck)) {
            $urlCheck = 'client/' . $this->__controller;
        }
        if (file_exists('app/controller/' . $urlCheck . '.php')) {
            require_once('app/controller/' . $urlCheck . '.php');
         
            $className = $this->__controller;
            
            if (class_exists($className)) {
                
                $className = new $className();
                
                //==============Xử lý action==============
                if (!empty($urlArr[1])) {
                    $this->__action = $urlArr[1];
                    unset($urlArr[1]);
                } else {
                                 $this->__action = "";
                }
                //Xử lý parrams
                $this->__params = array_values($urlArr); // Xử lý các thông số còn lại trên Url - chuyển thành 1 mảng
                // Gọi action url tương ứng trong Class Ctrl
                if (method_exists($className, $this->__action)) {
                    call_user_func_array([$className, $this->__action], $this->__params);
                }
            }
        } else {
            $this->loadError('Error404', null);
        }



    }
    public function loadError($name, $data = [])
    {
        if ($name) {
            // extract($data);
            require_once 'errors/' . $name . '.php';
        } else {
            $name = 'Error404';
            require_once 'errors/' . $name . '.php';
        }

    }
}
