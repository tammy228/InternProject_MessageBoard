<?php
/**
 * Created by PhpStorm.
 * User: 亭臻
 * Date: 2017/7/5
 * Time: 上午 08:46
 */
$account = $mysqli->escape_string($_POST['account']);
$result = $mysqli->query("SELECT * FROM  member WHERE  account='$account'");
if($result->num_rows == 0){
    echo "user doesnn't exist!";
}
else{
    $user = $result->fetch_assoc();

    if(password_verify($_POST['password'], $user['password'])){
        $_SESSION['logged_in'] = true;
        $_SESSION['account'] = $account;
        $_SESSION['grade'] = $user['grade'];
        header("location: ../mainpage/index.php");
    }
    else{
        echo "wrong password";
    }
}