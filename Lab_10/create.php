<?php
require_once "config.php";

$name = $surname = $patronymic = $email = $phoneNumber = $city = $country = "";
$name_err = $surname_err = $patronymic_err = $email_err = $phoneNumber_err = $city_err = $country_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err =  "Please enter a name.";

    } else{
        $name = $input_name;
    }

    $input_surname = trim($_POST["surname"]);
    if(empty($input_surname)){
        $surname_err = "Please enter a surname.";
    } else{
        $surname = $input_surname;
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
        $country_err = "Please enter the country.";
    } else{
        $country = $input_county;
    }

    if(empty($name_err) && empty($address_err) && empty($salary_err) &&
       empty($patronymic_err) && empty($email_err) && empty($phoneNumber_err)&&
        empty($city_err) && empty($country_err)){
        $sql = "INSERT INTO user (name, surname, patronymic, email, phoneNumber, city, country) VALUES (?, ?, ?, ?, ?, ?, ?)";
        if($stmt = $mysqli->prepare($sql)){

            $stmt->bind_param("sssssss", $param_name, $param_surname, $param_patronymic, $param_email, $param_phoneNumber, $param_city, $param_county);

            $param_name = $name;
            $param_surname = $surname;
            $param_patronymic = $patronymic;
            $param_email = $email;
            $param_phoneNumber = $phoneNumber;
            $param_city = $city;
            $param_county = $country;

            if($stmt->execute()){
                echo 1;
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
</head>
<body>
    <p>Please fill this form and submit to add record to the database.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <br>

            <label>Surname</label>
            <textarea name="surname"><?php echo $surname; ?></textarea>
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

        <input type="submit"  value="Submit">
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>