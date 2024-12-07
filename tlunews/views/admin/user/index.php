<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>
    <main class="container">
        <h2>USER MANAGER</h2>
        <a href="<?= DOMAIN . 'views/admin/user/add.php'; ?>" class="btn btn-success">New user</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User name</th>
                    <th scope="col">Password</th>
                    <th scope="col">Role</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) { ?>
                    <tr>
                        <th scope="row"><?= $user->getId(); ?></th>
                        <td><?= $user->getUsername(); ?></td>
                        <td><?= $user->getPassword(); ?></td>
                        <td><?= $user->getRole(); ?></td>
                        <td><a href="<?= DOMAIN . 'views/admin/user/edit.php?id='.$user->getId(); ?>">Edit</a></td>
                        <td><a href="<?= DOMAIN . 'views/admin/user/remove.php?id='.$user->getId(); ?>">Remove</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>