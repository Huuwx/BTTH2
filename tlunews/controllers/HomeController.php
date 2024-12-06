<?php

require_once APP_ROOT . '/services/NewsService.php';

class HomeController
{
    public function index()
    {
        // Lấy danh sách tin tức
        $newsService = new NewsService();
        $newsList = $newsService->getAllNews();

        // Tìm kiếm nếu có
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $newsList = $this->searchNews($newsList, $searchTerm);
        }

        // Hiển thị view danh sách tin tức
        include APP_ROOT . '/views/home/index.php';
    }

    private function searchNews($newsList, $searchTerm)
    {
        // Lọc tin tức theo từ khóa tìm kiếm
        return array_filter($newsList, function($news) use ($searchTerm) {
            return stripos($news->getTitle(), $searchTerm) !== false || stripos($news->getContent(), $searchTerm) !== false;
        });
    }
}
