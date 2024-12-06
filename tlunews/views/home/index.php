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
        <h1 class="text-center mb-4">Danh sách tin tức</h1>

        <!-- Form tìm kiếm -->
        <form action="index.php?controller=home&action=index" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Tìm kiếm tin tức..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </form>

        <!-- Danh sách tin tức -->
        <div class="row">
            <?php if (empty($newsList)): ?>
                <div class="col-12">
                    <p class="text-center">Không tìm thấy tin tức nào.</p>
                </div>
            <?php else: ?>
                <?php foreach ($newsList as $news): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="uploads/<?php echo htmlspecialchars($news->getImage()); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($news->getTitle()); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($news->getTitle()); ?></h5>
                                <p class="card-text text-truncate"><?php echo htmlspecialchars(substr($news->getContent(), 0, 100)) . '...'; ?></p>
                                <a href="index.php?controller=news&action=detail&id=<?php echo $news->getId(); ?>" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Danh mục: <?php echo htmlspecialchars($news->getCategoryName()); ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
