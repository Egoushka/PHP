<?php
if(isset($_POST["surname"]) && !empty($_POST["surname"])){
    require_once "config.php";

    $sql = "DELETE FROM user WHERE surname = ?";

    if($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("s", $param_surname);

        $param_surname = trim($_POST["surname"]);

        if($stmt->execute()){
            header("location: index.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        $stmt->close();
    }


    $mysqli->close();
} else{
    if(empty(trim($_GET["surname"]))){
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-5 mb-3">Delete Record</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="alert alert-danger">
                        <input type="hidden" name="surname" value="<?php echo trim($_GET["surname"]); ?>"/>
                        <p>Are you sure you want to delete this employee record?</p>
                        <p>
                            <input type="submit" value="Yes" class="btn btn-danger">
                            <a href="index.php" class="btn btn-secondary ml-2">No</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>