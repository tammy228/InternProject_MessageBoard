<?php
session_start();
/**
 * Created by PhpStorm.
 * User: 亭臻
 * Date: 2017/7/5
 * Time: 上午 09:49
 */
unset($_SESSION['account']);
$_SESSION['logged_in'] = false;
echo 'logout';
header('refresh:3,url=../mainpage/index.php');
?>