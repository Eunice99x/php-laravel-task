<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
"></script>
    <title>My Shop</title>
</head>
<body>
    <div class="container my-5">
        <h2>list of clients</h2>
        <a class="btn btn-primary" href="/php-learning/create.php" role="button">new client</a>
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
                $database = "myshop";
                $connection = new mysqli($servername,$username,$password,$database);
                if($connection->connect_error){
                    die("connection failed" . $connection->connect_error);
                }
                $sql = "SELECT * FROM clients"; 
                $result = $connection->query($sql);
                if(!$result){
                    die("invalid query" . $connection->error);
                }
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/php-learning/edit.php?id=$row[id]'>edit</a>
                        <a class='btn btn-primary btn-sm' href='/php-learning/delete.php?id=$row[id]'>delete</a>
                    </td>
                </tr>
                    ";
                }
                ?>
                
            </tbody>
        </thead>
    </div>
</body>
</html>