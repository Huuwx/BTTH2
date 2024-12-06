<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết Tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4"><?= htmlspecialchars($news->getTitle()); ?></h1>
        <div class="mb-3">
            <strong>Danh mục:</strong> <?= htmlspecialchars($news->getCategoryName()); ?>
        </div>
        <div class="mb-3">
            <strong>Ngày tạo:</strong> <?= htmlspecialchars($news->getCreatedAt()); ?>
        </div>
        <img src="/uploads/<?= htmlspecialchars($news->getImage()); ?>" alt="Hình ảnh tin tức" class="img-fluid mb-4">
        <p class="fs-5"><?= nl2br(htmlspecialchars($news->getContent())); ?></p>
        <a href="index.php?controller=home&action=index" class="btn btn-secondary">Quay lại danh sách</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
