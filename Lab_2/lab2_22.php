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
?>
<table border="1">
    <tr>
        <td> <?=$firstProductName?></td>
        <td> <?=$firstProductPrice?></td>
    </tr>
    <tr>
        <td><?=$secondProductName?></td>
        <td><?=$secondProductPrice?></td>
    </tr>
    <tr>
        <td><?=$thirdProductName?></td>
        <td><?=$thirdProductPrice?></td>
    </tr>
</table>
<h1>
    The most expensive is
    <?php
        function foo($productName, $productPrice, $secProductName, $secProductPrice)
        {
            $maxProduct = $productName;
            $maxPrice = $productPrice;
                if($maxPrice < $secProductPrice){
                    $maxProduct = $secProductName;
                    $maxPrice = $secProductPrice;
                }
            echo $maxProduct . "(it costs " . $maxPrice . ")";

        }

        if($firstProductPrice > $secondProductPrice)
            foo($firstProductName, $firstProductPrice, $thirdProductName, $thirdProductPrice);
        else
            foo($secondProductName, $secondProductPrice, $thirdProductName, $thirdProductPrice);
    ?>
</h1>
</body>
</html>