<?php
  $name = "";
    $email = "";
    $phone = "";
    $address = "";

    $errorMessage = "";
    $successMessage = "";

    if( $_SERVER['REQUEST_METHOD']  == 'GET' ){
        if(!isset($_GET["id"])){
            header("location: /php-learning/index.php");
            exit;
        }

        $id = $_GET["id"];

        $sql = "SELECT * FROM clients WHERE id=$id";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if(!$row){
            header("location: /php-learning/index.php");
            exit;
        }
        $name = $row["name"];
        $email = $row["email"];
        $phone = $row["phone"];
        $address = $row["address"];
}else {
       
            $id = $_POST["id"];
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
        
            do{
             if(empty($name) || empty($email) || empty($phone) || empty($address)){
                $errorMessage = "all the fields are required";
                break;
             }   

             $sql = "UPDATE clients SET name = '$name', email = '$email', phone = '$phone', address = '$address' WHERE id = $id";

             $result = $connection->query($sql);

             if(!$result){
                $errorMessage = "invalid query" . $connection->error;
                break;
             }

             $successMessage = "client updated correctly";
             header("location: /php-learning/index.php");
             exit;
            }while(false);
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
    <title>edit</title>
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
            <input type="hidden" value="<?php echo $id; ?>>
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