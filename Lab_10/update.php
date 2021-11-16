<?php
require_once "config.php";

$name = $surname = $patronymic = $email = $phoneNumber = $city = $country = "";
$name_err = $surname_err = $patronymic_err = $email_err = $phoneNumber_err = $city_err = $country_err = "";

if(isset($_POST["surname"]) && !empty($_POST["surname"])) {
    $surname = $_POST["surname"];

    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err =  "Please enter a name.";

    } else{
        $name = $input_name;
    }

    $input_patronymic = trim($_POST["patronymic"]);
    if(empty($input_patronymic)){
        $patronymic_err = "Please enter a patronymic.";
    } else{
        $patronymic = $input_patronymic;
    }

    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter the email.";
    } else{
        $email = $input_email;
    }

    $input_phoneNumber = trim($_POST["phoneNumber"]);
    if(empty($input_phoneNumber)){
        $phoneNumber_err = "Please enter the phone number.";
    } else{
        $phoneNumber = $input_phoneNumber;
    }
    $input_city = trim($_POST["city"]);
    if(empty($input_city)){
        $city_err = "Please enter the city.";
    } else{
        $city = $input_city;
    }
    $input_county = trim($_POST["county"]);
    if(empty($input_county)){
        $county_err = "Please enter the country.";
    } else{
        $county = $input_county;
    }

    if (empty($name_err) && empty($address_err) && empty($salary_err) &&
        empty($patronymic_err) && empty($email_err) && empty($phoneNumber_err) &&
        empty($city_err) && empty($county_err)) {
        $sql = "UPDATE user SET name=?,  patronymic=?, email =?, phoneNumber = ?, city = ?, country = ?  WHERE surname = ?";
        if ($stmt = $mysqli->prepare($sql)) {

            $stmt->bind_param("sssssss", $param_name, $param_patronymic, $param_email, $param_phoneNumber, $param_city, $param_county,$param_surname);

            $param_name = $name;
            $param_patronymic = $patronymic;
            $param_email = $email;
            $param_phoneNumber = $phoneNumber;
            $param_city = $city;
            $param_county = $country;
            $param_surname = $surname;
            if ($stmt->execute()) {
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
    $mysqli->close();
}else{
    if(isset($_GET["surname"]) && !empty(trim($_GET["surname"]))){
        $surname =  trim($_GET["surname"]);

        $sql = "SELECT * FROM user WHERE surname = ?";
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("s", $param_surname);

            $param_surname = $surname;

            if($stmt->execute()){
                $result = $stmt->get_result();

                if($result->num_rows == 1){
                    $row = $result->fetch_array(MYSQLI_ASSOC);

                    $name = $row["name"];
                    $patronymic = $row["patronymic"];
                    $email = $row["email"];
                    $phoneNumber = $row["phoneNumber"];
                    $city = $row["city"];
                    $country = $row["country"];
                    $surname = $row["surname"];
                } else{
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
        $mysqli->close();
    }  else{
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
</head>
<body>

<h2 class="mt-5">Update Record</h2>
<p>Please edit the input values and submit to update the records.</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label>Name</label>
    <input type="text" name="name" value="<?php echo $name; ?>">
    <br>

    <label>Patronymic</label>
    <input type="text" name="patronymic" value="<?php echo $patronymic; ?>">
    <br>

    <label>Email</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <br>

    <label>Phone number</label>
    <input type="text" name="phoneNumber" value="<?php echo $phoneNumber; ?>">
    <br>

    <label>City</label>
    <input type="text" name="city" value="<?php echo $city; ?>">
    <br>

    <label>County</label>
    <input type="text" name="county" value="<?php echo $country; ?>">
    <br>

    <input type="hidden" name="surname" value="<?php echo $surname; ?>"/>

    <input type="submit"  value="Submit">
    <a href="index.php">Cancel</a>
</form>
</body>
</html>