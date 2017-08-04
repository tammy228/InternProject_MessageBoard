<?php

$email = $mysqli->escape_string($_POST['email']);
$account = $mysqli->escape_string($_POST['S_account']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$passwd = $_POST['password'];
$C_passwd = $_POST['C_password'];
$hash = $mysqli->escape_string(md5(rand(0,1000)));
//check if user email exists
$result = $mysqli->query("SELECT * FROM member WHERE email='$email'");
$checkAccount = $mysqli->query("SELECT * FROM member WHERE account='$account'");
if($passwd==$C_passwd){$confirm=1;}
else $confirm=0;

if($result->num_rows > 0 | $confirm ==0 ){
    echo 'email has already exists or wrong confirm password';
}else if ($checkAccount->num_rows > 0 | $confirm==0){
    echo 'account has already exists or wrong confirm password';
} 

else{
    $sql = "INSERT INTO member (account,password,hash,email)"."VALUES ('$account','$password','$hash','$email')";

     $mysqli -> query($sql);
        /*$_SESSION['active'] = 0;    //帳號是否有驗證
        $_SESSION['grade'] = 0;     //帳號分類
        */

        header("location: message.php");



}

?>