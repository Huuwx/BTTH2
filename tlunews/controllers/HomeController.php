<?php

require_once APP_ROOT . '/services/NewsService.php';

class HomeController
{
    public function index()
    {
        $newsService = new NewsService();

        // Kiểm tra nếu có từ khóa tìm kiếm
        if (isset($_GET['search'])) {
            $keyword = trim($_GET['search']);
            $newsList = $newsService->searchNews($keyword);
        } else {
            // Nếu không có tìm kiếm, lấy tất cả tin tức
            $newsList = $newsService->getAllNews();
        }

        // Hiển thị danh sách tin tức
        include APP_ROOT . '/views/home/index.php';
    }

    private function searchNews($newsList, $searchTerm)
    {
        // Lọc tin tức theo từ khóa tìm kiếm
        return array_filter($newsList, function ($news) use ($searchTerm) {
            return stripos($news->getTitle(), $searchTerm) !== false || stripos($news->getContent(), $searchTerm) !== false;
        });
    }
}
