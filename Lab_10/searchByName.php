<?php
$surname ="";
if(isset($_POST["surname"]) && !empty($_POST["surname"])){
    require_once "config.php";
    $search = $_POST["surname"];
    $sql = "select * from user where surname like '%$search%'";

        if($result = $mysqli->query($sql)) {
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
        else{
            echo "Oops! Something went wrong. Please try again later.";
    }


    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search by name to view</title>
</head>
<body>

<h2 class="mt-5">Search by name</h2>
<p>Please edit the input values and submit to get the records.</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label>Surname</label>
    <input type="text" name="surname" value="<?php echo $surname; ?>">
    <br>
    <input type="submit"  value="Submit">
    <a href="index.php">Cancel</a>

</form>
</body>
</html>