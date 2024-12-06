<h1>Danh sách Tin Tức</h1>
<a href="index.php?controller=news&action=create">Thêm Tin Tức</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tiêu đề</th>
        <th>Danh mục</th>
        <th>Hình ảnh</th>
        <th>Thao tác</th>
    </tr>
    <?php foreach ($newsList as $news): ?>
    <tr>
        <td><?= $news->getId() ?></td>
        <td><?= $news->getTitle() ?></td>
        <td><?= $news->getCategoryName() ?></td>
        <td><img src="/uploads/<?= $news->getImage() ?>" alt="Hình ảnh" width="100"></td>
        <td>
            <a href="index.php?controller=news&action=edit&id=<?= $news->getId() ?>">Sửa</a>
            <a href="index.php?controller=news&action=delete&id=<?= $news->getId() ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
