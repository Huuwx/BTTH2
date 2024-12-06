<h1>Thêm Tin Tức</h1>
<form action="index.php?controller=news&action=store" method="POST" enctype="multipart/form-data">
    <label>Tiêu đề:</label>
    <input type="text" name="title" required><br>
    <label>Nội dung:</label>
    <textarea name="content" required></textarea><br>
    <label>Danh mục:</label>
    <select name="category_id" required>
        <!-- Cần lấy danh mục từ DB để hiển thị -->
        <option value="1">Thể thao</option>
        <option value="2">Giải trí</option>
    </select><br>
    <label>Hình ảnh:</label>
    <input type="file" name="image" accept="image/*"><br>
    <button type="submit">Thêm</button>
</form>
