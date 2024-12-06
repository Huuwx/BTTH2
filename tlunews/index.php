<?php
require_once('../tlunews/config/config.php');




$controller = isset($_GET['controller']) ? $_GET['controller'] : 'user';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

if ($controller == 'home') {
    if($action == 'homePage'){
        require_once APP_ROOT . '/controllers/UserController.php';
        $userController = new UserController();
        $userController->homePage();
    }

} else if ($controller == 'user') {
    if ($action == 'manager') {
        require_once APP_ROOT . '/controllers/UserController.php';
        $userController = new UserController();
        $userController->index();
    } else if ($action == 'login') {
        require_once APP_ROOT . '/controllers/UserController.php';
        $userController = new UserController();
        $userController->login();
    } else if ($action == 'store') {
        require_once APP_ROOT . '/controllers/UserController.php';
        $userController = new UserController();
        $userController->store();
    } else {
        echo "NOT FOUND";
    }
} else if ($controller == "admin") {
    if ($action == 'dashboard') {
        require_once APP_ROOT . '/controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->index();
    }
} else if ($controller == "news") {
    if ($action == 'manager') {
        require_once APP_ROOT . '/controllers/NewsController.php';
        $newsController = new NewsController();
        $newsController->index();
    } else if ($action == 'store') {

        require_once APP_ROOT . '/controllers/NewsController.php';
        $newsController = new NewsController();
        $newsController->store();
    } else if ($action == "create") {
        require_once APP_ROOT . '/controllers/NewsController.php';
        $newsController = new NewsController();
        $newsController->create();
    } else if ($action == "edit") {
        require_once APP_ROOT . '/controllers/NewsController.php';
        $id = $_GET['id'] ?? null;
        $newsController = new NewsController();
        $newsController->edit($id);
    } else if ($action == "delete") {
        require_once APP_ROOT . '/controllers/NewsController.php';
        $id = $_GET['id'] ?? null;
        $newsController = new NewsController();
        $newsController->delete($id);
    }
}
 else {
    echo "NOT FOUND";
}
