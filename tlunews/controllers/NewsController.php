<?php
require_once APP_ROOT . '/services/NewsService.php';

class NewsController
{
    public function index()
    {
        $newsService = new NewsService();
        $newsList = $newsService->getAllNews();
        include APP_ROOT . '/views/admin/news/index.php';
    }

    public function create()
    {
        include APP_ROOT . '/views/admin/news/add.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $content = trim($_POST['content'] ?? '');
            $categoryId = intval($_POST['category_id'] ?? 0);
            $image = $_FILES['image']['name'] ?? '';

            // Upload hình ảnh
            if (!empty($image)) {
                $targetDir = APP_ROOT . '/uploads/';
                $targetFile = $targetDir . basename($image);
                move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
            }

            // Thêm tin tức
            try {
                $newsService = new NewsService();
                $newsService->store($title, $content, $image, $categoryId);
                header('Location: index.php?controller=news&action=index');
                exit();
            } catch (Exception $e) {
                $errorMessage = $e->getMessage();
            }
        }
        include APP_ROOT . '/views/admin/news/add.php';
    }

    public function edit($id)
    {
        $newsService = new NewsService();
        $news = $newsService->getById($id);
        if (!$news) {
            header('Location: index.php?controller=news&action=index');
            exit();
        }
        include APP_ROOT . '/views/admin/news/edit.php';
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $content = trim($_POST['content'] ?? '');
            $categoryId = intval($_POST['category_id'] ?? 0);
            $image = $_FILES['image']['name'] ?? '';

            // Upload hình ảnh
            if (!empty($image)) {
                $targetDir = APP_ROOT . '/uploads/';
                $targetFile = $targetDir . basename($image);
                move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
            } else {
                $image = $_POST['existing_image']; // Sử dụng hình ảnh cũ nếu không upload mới
            }

            // Cập nhật tin tức
            try {
                $newsService = new NewsService();
                $newsService->update($id, $title, $content, $image, $categoryId);
                header('Location: index.php?controller=news&action=index');
                exit();
            } catch (Exception $e) {
                $errorMessage = $e->getMessage();
            }
        }
        $this->edit($id); // Hiển thị lại form nếu có lỗi
    }

    public function delete($id)
    {
        try {
            $newsService = new NewsService();
            $newsService->delete($id);
            header('Location: index.php?controller=news&action=index');
            exit();
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
        }
    }
}
