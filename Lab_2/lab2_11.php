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
echo "<p>$firstProductName => $firstProductPrice</p>" .
    "<br/>" .
    "<p>$secondProductName => $secondProductPrice</p>" .
    "<br/>" .
    "<p>$thirdProductName => $thirdProductPrice</p>"  .
    "<br/>" .
    "<p>Average price -> ". ($firstProductPrice + $secondProductPrice + $thirdProductPrice)/3 . "</p>"
?>
</body>
</html>