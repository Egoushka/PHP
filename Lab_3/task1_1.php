<?php
function isEmailValid($email){

    $result = true;
    if(!isEmailHasCommercialAt($email)){
        $result = false;
        echo "Email should contain @ symbol <br>";
    }
    if(isEmailHasMoreThanOneCommercialAt($email)){
        $result = false;
        echo  "Email should contain only one @ symbol <br>";
    }
    if(!isEmailHaveDot($email)){
        $result = false;
        echo  "Email should contain dot <br>";
    }
    if(isEmailHaveSpace($email)){
        $result = false;
        echo  "Email shouldn`t contain space <br>";
    }
    return $result;
}
function isEmailHasCommercialAt($email){
    return strpos($email, '@') == true;
}
function isEmailHasMoreThanOneCommercialAt($email){
    return substr_count($email, '@') > 1;
}
function isEmailHaveDot($email){
    return strpos($email, '.') == true;
}

function isEmailHaveSpace($email){
    return strpos($email, ' ') == true;
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $result = isEmailValid($email);
    if($result)
    {
        echo "Host is ". substr($email, strpos($email,'@'));
    }
}
?>
<form action="" method="post">
    <input type="text" name ="email">
    <input type="submit" name = "send" value="check email">
</form>
