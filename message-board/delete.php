<?php
require '../login-system/db.php';




//$deleteButton='<input type = button value = DELETE >';
//echo $deleteButton;
//$account=$_SESSION['account'];
//$delcommand = "DELETE * FROM message WHERE account= $account ";
//$mysqli->query($delcommand);
//$sql ="DELETE  FROM message WHERE id = 124";
$sql ="DELETE  FROM message WHERE id=".$_GET['id'];//刪除資料
//echo  $_GET['ctime'];
$mysqli->query($sql)or die("error"); //執行sql語法
header( "location:../mainpage/index.php");  //回index.php


?>