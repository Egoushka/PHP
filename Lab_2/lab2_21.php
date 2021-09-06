<html>
<head>
    <title>My first PHP Website</title>
</head>
<body>
<?php
$firstProductName = "Something very interesting";
$secondProductName = "Something not such interesting";
$thirdProductName = "Something just something";

$firstProductPrice = 100;
$secondProductPrice = 200;
$thirdProductPrice = 300;
echo"<table border='2' >".
    "<tr><td>$firstProductName</td> <td> $firstProductPrice</td></tr>" .
    "<tr><td>$secondProductName</td> <td>$secondProductPrice</td></tr>" .
    "<tr><td>$thirdProductName</td> <td> $thirdProductPrice</td></tr>".
    "</table>"
?>
</body>
</html>