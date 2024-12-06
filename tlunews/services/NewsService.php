<?php
require_once APP_ROOT . '/models/News.php';

class NewsService
{
    public function getAllNews()
    {
        try {
            // B1: Kết nối DB
            $conn = new PDO('mysql:host=localhost;dbname=tlunews', 'root', '');

            // B2: Truy vấn dữ liệu
            $sql = "SELECT news.*, categories.name as category_name FROM news 
                    LEFT JOIN categories ON news.category_id = categories.id 
                    ORDER BY news.created_at DESC";
            $stmt = $conn->query($sql);

            // B3: Xử lý kết quả
            $newsList = [];
            while ($row = $stmt->fetch()) {
                $news = new News(
                    $row['id'],
                    $row['title'],
                    $row['content'],
                    $row['image'],
                    $row['category_id'],
                    $row['created_at'],
                    $row['category_name']
                );
                $newsList[] = $news;
            }
            return $newsList;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getById($id)
    {
        try {
            // B1: Kết nối DB
            $conn = new PDO('mysql:host=localhost;dbname=tlunews', 'root', '');

            // B2: Truy vấn dữ liệu
            $sql = "SELECT * FROM news WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // B3: Xử lý kết quả
            if ($row = $stmt->fetch()) {
                return new News(
                    $row['id'],
                    $row['title'],
                    $row['content'],
                    $row['image'],
                    $row['category_id'],
                    $row['created_at'],
                    $row['category_name']
                );
            }
            return null;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function store($title, $content, $image, $categoryId)
    {
        try {
            // B1: Kết nối DB
            $conn = new PDO('mysql:host=localhost;dbname=tlunews', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // B2: Truy vấn thêm mới
            $sql = "INSERT INTO news (title, content, image, category_id, created_at) 
                    VALUES (:title, :content, :image, :category_id, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':category_id', $categoryId);

            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Lỗi khi thêm tin tức: " . $e->getMessage());
        }
    }

    public function update($id, $title, $content, $image, $categoryId)
    {
        try {
            // B1: Kết nối DB
            $conn = new PDO('mysql:host=localhost;dbname=tlunews', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // B2: Truy vấn cập nhật
            $sql = "UPDATE news SET title = :title, content = :content, image = :image, 
                    category_id = :category_id WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':category_id', $categoryId);
            $stmt->bindParam(':id', $id);

            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Lỗi khi cập nhật tin tức: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            // B1: Kết nối DB
            $conn = new PDO('mysql:host=localhost;dbname=tlunews', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // B2: Truy vấn xóa
            $sql = "DELETE FROM news WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);

            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Lỗi khi xóa tin tức: " . $e->getMessage());
        }
    }

    public function searchNews($keyword)
    {
        try {
            // B1: Kết nối DB
            $conn = new PDO('mysql:host=localhost;dbname=tlunews', 'root', '');

            // B2: Truy vấn tìm kiếm
            $sql = "SELECT news.*, categories.name as category_name FROM news 
                LEFT JOIN categories ON news.category_id = categories.id 
                WHERE news.title LIKE :keyword OR news.content LIKE :keyword 
                ORDER BY news.created_at DESC";
            $stmt = $conn->prepare($sql);
            $searchTerm = '%' . $keyword . '%';
            $stmt->bindParam(':keyword', $searchTerm);
            $stmt->execute();

            // B3: Xử lý kết quả
            $newsList = [];
            while ($row = $stmt->fetch()) {
                $news = new News(
                    $row['id'],
                    $row['title'],
                    $row['content'],
                    $row['image'],
                    $row['created_at'],
                    $row['category_id'],
                    $row['category_name']
                );
                $newsList[] = $news;
            }
            return $newsList;
        } catch (PDOException $e) {
            return [];
        }
    }
}
