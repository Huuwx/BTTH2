<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
            color: #333;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .wrapper {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 40px 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .logo img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .form-control {
            border: none;
            border-radius: 25px;
            box-shadow: inset 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(3, 169, 244, 0.5);
            outline: none;
        }

        .btn-primary {
            background-color: #03A9F4;
            border: none;
            border-radius: 25px;
            padding: 10px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0288D1;
        }

        .text-small a {
            color: #03A9F4;
            text-decoration: none;
        }

        .text-small a:hover {
            color: #0288D1;
        }
    </style>
</head>

<body>
    <div class="wrapper text-center">
        <div class="logo">
            <img src="https://news.khangz.com/wp-content/uploads/2024/12/Chill-guy-la-gi-6.jpg" alt="Logo">
        </div>
        <h3 class="mb-4">TLU NEWS</h3>
        <form method="POST" action="?controller=user&action=login">
            <div class="mb-3">
                <!-- Thêm name="username" -->
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <!-- Thêm name="password" -->
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>

            <?php if (!empty($errorMessage)): ?>
                <div class="alert alert-danger">
                    <?php echo $errorMessage; ?>
                </div>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>

</html>