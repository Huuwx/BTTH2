<?php 

require_once APP_ROOT .'/services/UserService.php';

class AdminController
{
    public function __construct()
    {
        require APP_ROOT . '/views/admin/dashboard.php';
    }
}
