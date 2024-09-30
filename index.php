<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>My Shop</title>
</head>
<body>
    <div class="container my-5">
        <h2>list of clients</h2>
        <a class="btn btn-primary" href="/create.php" role="button">new client</a>
        <br>
        <thead>
            <tr>
                <td>id</td>
                <td>name</td>
                <td>email</td>
                <td>phone</td>
                <td>address</td>
                <td>created at</td>
                <td>action</td>
            </tr>
            <tbody>
                <?php  
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "myshpp";
                ?>
                <tr>
                    <td>10</td>
                    <td>younes</td>
                    <td>y@y.y</td>
                    <td>+1241234</td>
                    <td>nyc</td>
                    <td>9/30/2024</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/edit.php">edit</a>
                        <a class="btn btn-primary btn-sm" href="/delete.php">delete</a>
                    </td>
                </tr>
            </tbody>
        </thead>
    </div>
</body>
</html>