<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Danh sách Tin tức</h1>

        <form method="GET" action="index.php" class="mb-4">
            <input type="hidden" name="controller" value="home">
            <input type="hidden" name="action" value="search">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm tin tức" value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </form>

        <?php if (!empty($newsList)) : ?>
            <div class="row">
                <?php foreach ($newsList as $news) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="/uploads/<?= htmlspecialchars($news->getImage()); ?>" class="card-img-top" alt="Hình ảnh tin tức" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($news->getTitle()); ?></h5>
                                <p class="card-text"><?= htmlspecialchars(substr($news->getContent(), 0, 100)); ?>...</p>
                                <a href="index.php?controller=home&action=detail&id=<?= $news->getId(); ?>" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="alert alert-warning">Không tìm thấy tin tức nào.</div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
