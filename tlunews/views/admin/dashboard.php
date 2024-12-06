<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- Liên kết đến Font Awesome để sử dụng biểu tượng -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
        /* Đảm bảo chiều rộng và chiều cao của nút là bằng nhau */
        .btn-square {
            height: 250px;
            width: 380px;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
    </style>
</head>

<body>

    <body>
        <!-- Header -->
        <header class="bg-primary text-white text-center py-3">
            <h1>DASHBOARD</h1>
        </header>

        <!-- Main content -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <a href="category_page.php" class="btn btn-primary btn-lg btn-square">
                        <i class="fa-solid fa-list"></i> Category
                    </a>
                </div>
                <div class="col-md-4 text-center">
                    <a href="news_page.php" class="btn btn-success btn-lg btn-square">
                        <i class="fa-solid fa-newspaper"></i> News
                    </a>
                </div>
                <div class="col-md-4 text-center">
                    <!-- Sử dụng thẻ <a> cho nút User -->
                    <a href="<?= DOMAIN . '?controller=user&action=manager'; ?>" class="btn btn-warning btn-lg btn-square">
                        <i class="fa-solid fa-user"></i> User
                    </a>
                </div>
            </div>
        </div>
    </body>

</html>