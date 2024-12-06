<?php
require_once('../tlunews/config/config.php');

// Auto-load controller
$controller = $_GET['controller'] ?? 'news';
$action = $_GET['action'] ?? 'index';

// Chuyển hướng đến các controller và action tương ứng
$controllerFile = APP_ROOT . "/controllers/" . ucfirst($controller) . "Controller.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;

    $controllerClass = ucfirst($controller) . "Controller";
    $controllerInstance = new $controllerClass();

    if (method_exists($controllerInstance, $action)) {
        // Truyền tham số ID nếu có
        $id = $_GET['id'] ?? null;
        if ($id !== null) {
            $controllerInstance->$action($id);
        } else {
            $controllerInstance->$action();
        }
    } else {
        echo "Action không tồn tại!";
    }
} else {
    echo "Controller không tồn tại!";
}
