<?php

require_once APP_ROOT . '/services/UserService.php';

class UserController
{
    public function index()
    {
        // goi du lieu tu user service
        $userService = new UserService();
        $users = $userService->getAllUsers();
        // render du lieu lay duoc ra homepage
        include APP_ROOT . '/views/admin/user/index.php';
    }
    public function homePage(){
        require APP_ROOT . '/views/home/index.php';
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (!empty($username) && !empty($password)) {
                $userService = new UserService();
                $user = $userService->login($username, $password);
                if ($user !== null) {
                    // Đăng nhập thành công
                    session_start();
                    $_SESSION['user'] = [
                        'id' => $user->getId(),
                        'username' => $user->getUsername(),
                        'role' => $user->getRole()
                    ];

                    if ($user->getRole() == 1) {
                        header('Location: index.php?controller=admin&action=dashboard');
                    } else if ($user->getRole() == 0) {
                        header('Location: index.php?controller=home&action=homePage');
                    }
                    exit();
                } else {
                    $errorMessage = "Sai tên đăng nhập hoặc mật khẩu!";
                }
            } else {
                $errorMessage = "Vui lòng nhập đầy đủ thông tin!";
            }
        } else {
            $errorMessage = "";
        }

        require APP_ROOT . '/views/admin/login.php'; // Gọi file login.php để hiển thị form
    }

    public function create()
    {
        include APP_ROOT . '/views/admin/user/add.php';
    }
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');
            $confirmPassword = trim($_POST['confirmPassword'] ?? '');
            $role = intval($_POST['role'] ?? '');



            // Kiểm tra dữ liệu nhập vào
            if (empty($username) || empty($password) || empty($confirmPassword)) {
                $errorMessage = "Vui lòng nhập đầy đủ thông tin!";
            } elseif ($password !== $confirmPassword) {
                $errorMessage = "Mật khẩu và xác nhận mật khẩu không khớp!";
            } else {
                try {
                    // Sử dụng UserService để lưu thông tin
                    $userService = new UserService();
                    $isStored = $userService->store($username, $password, $role);

                    if ($isStored) {
                        $successMessage = "Thêm người dùng thành công!";
                    } else {
                        $errorMessage = "Đã xảy ra lỗi khi thêm người dùng!";
                    }
                } catch (Exception $e) {
                    $errorMessage = "Lỗi: " . $e->getMessage();
                }
            }
        } else {
            $errorMessage = "";
            $successMessage = "";
        }

        require APP_ROOT . '/views/admin/user/add.php';
    }
}