<?php 

require_once APP_ROOT .'/services/UserService.php';

class AdminController
{
    public function index()
    {
        require APP_ROOT . '/views/admin/dashboard.php';
    }
}
