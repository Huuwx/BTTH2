<?php
require_once APP_ROOT . '/services/NewsService.php';

class HomeController
{
    public function index()
    {
        $newsService = new NewsService();
        $newsList = $newsService->getAllNews();
        include APP_ROOT . '/views/home/index.php';
    }

    public function detail($id)
    {
        $newsService = new NewsService();
        $news = $newsService->getById($id);
        if (!$news) {
            header('Location: index.php?controller=home&action=index');
            exit();
        }
        include APP_ROOT . '/views/news/detail.php';
    }

    public function search()
    {
        $keyword = trim($_GET['keyword'] ?? '');
        $newsService = new NewsService();
        $newsList = $newsService->searchNews($keyword);
        include APP_ROOT . '/views/home/index.php';
    }
}
