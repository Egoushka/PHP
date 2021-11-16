<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
        .button-class{
            margin: 10px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
<a>gdgdss</a>

<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                </div>  <div class="mt-5 mb-3 clearfix">
                    <h2 class="pull-left">Create user</h2>
                    <a href="create.php" class="button-class btn btn-success pull-right" ><i class="fa fa-plus"></i> Create user</a>
                    <a href="searchByName.php" class="button-class btn btn-success pull-right"><i ></i> Search users by name</a>
                    <a href="searchByNameToDelete.php" class="button-class btn btn-success pull-right"><i ></i> Search users by name to delete</a>
                    <a href="search.php" class="button-class btn btn-success pull-right"><i ></i> Search</a>
                </div>

                <?php
                require_once "config.php";

                $sql = "SELECT * FROM user";

                if($result = $mysqli->query($sql)){
                    if($result->num_rows > 0){
                        echo '<table class="table table-bordered table-striped">';
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
                        while($row = $result->fetch_array()){
                            echo "<tr>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['surname'] . "</td>";
                            echo "<td>" . $row['patronymic'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['phoneNumber'] . "</td>";
                            echo "<td>" . $row['city'] . "</td>";
                            echo "<td>" . $row['country'] . "</td>";
                            echo "<td>";
                            echo '<a href="read.php?surname='.  $row['surname'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                            echo '<a href="update.php?surname='. $row['surname'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                            echo '<a href="delete.php?surname='. $row['surname'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        // Free result set
                        $result->free();
                    } else{
                        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                $mysqli->close();
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>