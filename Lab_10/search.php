<?php
$name  = $patronymic = $email = $phoneNumber = $city = $country = "";
if(isset($_POST["submit"])){
    require_once "config.php";
    $sql = "select * from user where ";
    $isAtLeastOneParameter = false;
    $name = $_POST['name'];
    $patronymic = $_POST['patronymic'];
    $_POSTemail = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $city = $_POST['city'];
    $country  = $_POST['country'];

    if(!empty($name)){
        $sql.= " name like '%{$name}%' ";
        $isAtLeastOneParameter = true;
    }
    if(!empty($patronymic)){
        if($isAtLeastOneParameter){
            $sql.=" and ";
        }
        $sql.= " patronymic like '%{$patronymic}%' ";
        $isAtLeastOneParameter = true;
    }
    if(!empty($email)){
        if($isAtLeastOneParameter){
            $sql.=" and ";
        }
        $sql.= " email like '%{$email}%' ";
        $isAtLeastOneParameter = true;
    }
    if(!empty($phoneNumber)){
        if($isAtLeastOneParameter){
            $sql.=" and ";
        }
        $sql.= " phoneNumber like '%{$phoneNumber}%'";
        $isAtLeastOneParameter = true;
    }
    if(!empty($city)){
        if($isAtLeastOneParameter){
            $sql.=" and ";
        }
        $sql.= " city like '%{$city}%' ";
        $isAtLeastOneParameter = true;
    }
    if(!empty($country)){
        if($isAtLeastOneParameter){
            $sql.=" and ";
        }
        $sql.= " country like '%{$country}%'";
        $isAtLeastOneParameter = true;
    }
    if(($result = $mysqli->query($sql)) && $isAtLeastOneParameter) {
        if ($result->num_rows > 0) {
            echo '<table>';
            echo "<thead>";
            echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Surname</th>";
            echo "<th>Patronymic</th>";
            echo "<th>Email</th>";
            echo "<th>Phone number</th>";
            echo "<th>City</th>";
            echo "<th>Country</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = $result->fetch_array()) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['surname'] . "</td>";
                echo "<td>" . $row['patronymic'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phoneNumber'] . "</td>";
                echo "<td>" . $row['city'] . "</td>";
                echo "<td>" . $row['country'] . "</td>";
                echo "<td>";
                echo '<a href="update.php?surname='. $row['surname'] .'"  title="Update Record" data-toggle="tooltip">Edit</span></a>';
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
            $result->free();
        }
        else {
            echo "No records matching your query were found.";
        }
    }
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Find Records</title>
</head>
<body>

<h2 class="mt-5">Find Records</h2>
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
    <input type="text" name="country" value="<?php echo $country; ?>">
    <br>

    <input type="submit" name="submit" value="Submit">
    <a href="index.php">Cancel</a>

</form>
</body>
</html>