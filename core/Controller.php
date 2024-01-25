<?php
class Controller
{
    public $siteUrl = "";
    public function loadModel($model) // Hàm gọi model theo tên file models
    {
        if (file_exists(_DIR_ROOT . '/app/models/' . $model . '.php')) {
            require _DIR_ROOT . '/app/models/' . $model . '.php';
            if (class_exists($model)) {
                $model = new $model();
                return $model;
            }
        }
        return false;
    }
    public function loadAdminModel($model) // Hàm gọi model theo tên file models
    {
        if (file_exists(_DIR_ROOT . '/app/models/admin/' . $model . '.php')) {
            require _DIR_ROOT . '/app/models/admin/' . $model . '.php';
            if (class_exists($model)) {
                $model = new $model();
                return $model;
            }
        }
        return false;
    }
    public function ViewTheme($viewName, $data = []) // Render view with Name view for url
    {

        extract($data);

        if (file_exists(_DIR_ROOT . '/app/views/' . $viewName . '.php')) {
            include_once('app/views/section/Header.php');
            require_once _DIR_ROOT . '/app/views/' . $viewName . '.php';
            include_once('app/views/section/Footer.php');
        }
        return false;

    }
    public function ViewAdmin($viewName, $data = []) // Render view with Name view for url
    {
        // extract($data);
        if (file_exists(_DIR_ROOT . '/app/views/admin/' . $viewName . '.php')) {
            include_once('app/views/section/admin/Header.php');
            require_once _DIR_ROOT . '/app/views/admin/' . $viewName . '.php';
            include_once('app/views/section/admin/Footer.php');
        }
        return false;

    }

}