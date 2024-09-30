<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myshop";

    $connection = new mysqli($servername,$username,$password,$database);




    $name = "";
    $email = "";
    $phone = "";
    $address = "";

    $errorMessage = "";
    $successMessage = "";

    if( $_SERVER['REQUEST_METHOD']  == 'POST' ){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        do {
            if(empty($name) || empty($email) || empty($phone) || empty($address)){
                $errorMessage = "all fields are required";
                break;
            }

            $sql = "INSERT INTO clients (name,email,phone,adrress)" . "VALUES ('$name', '$email','$phone','$address')"; 

            $name = "";
        $email = "";
        $phone = "";
        $address = "";

        $successMessage = "client added successfuly";

        }while (false);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
"></script>
    <title>create</title>
</head>
<body>
    <div class="container my-5">
        <h2>new client</h2>

        <?php 
            if (!empty($errorMessage)){
                echo "
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='bn-close' data-bs-dismiss='alert' aria-label='close'></button>
                    </div>
                ";
            }
        ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>
            <?php 
            if (!empty($successMessage)){
                echo "
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                    </div>
                ";
            }
        ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/php-learning/index.php" role="button">cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>