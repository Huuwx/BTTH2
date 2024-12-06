<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($news->getTitle()); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <img src="uploads/<?php echo htmlspecialchars($news->getImage()); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($news->getTitle()); ?>">
                    <div class="card-body">
                        <h1 class="card-title"><?php echo htmlspecialchars($news->getTitle()); ?></h1>
                        <p class="text-muted">Danh mục: <?php echo htmlspecialchars($news->getCategoryName()); ?> | Ngày đăng: <?php echo htmlspecialchars($news->getCreatedAt()); ?></p>
                        <p class="card-text"><?php echo nl2br(htmlspecialchars($news->getContent())); ?></p>
                        <a href="index.php" class="btn btn-secondary">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
