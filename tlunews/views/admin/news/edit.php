<h1>Sửa Tin Tức</h1>
<form action="index.php?controller=news&action=update&id=<?= $news->getId() ?>" method="POST" enctype="multipart/form-data">
    <label>Tiêu đề:</label>
    <input type="text" name="title" value="<?= $news->getTitle() ?>" required><br>
    <label>Nội dung:</label>
    <textarea name="content" required><?= $news->getContent() ?></textarea><br>
    <label>Danh mục:</label>
    <select name="category_id" required>
        <!-- Cần lấy danh mục từ DB để hiển thị -->
        <option value="1" <?= $news->getCategoryId() == 1 ? 'selected' : '' ?>>Thể thao</option>
        <option value="2" <?= $news->getCategoryId() == 2 ? 'selected' : '' ?>>Giải trí</option>
    </select><br>
    <label>Hình ảnh:</label>
    <input type="file" name="image" accept="image/*"><br>
    <input type="hidden" name="existing_image" value="<?= $news->getImage() ?>">
    <img src="/uploads/<?= $news->getImage() ?>" alt="Hình ảnh hiện tại" width="100"><br>
    <button type="submit">Lưu</button>
</form>
