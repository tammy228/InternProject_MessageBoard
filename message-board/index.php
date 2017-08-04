<?php
session_start();
require '../login-system/db.php';
date_default_timezone_set("Asia/Taipei");
/**
 * Created by PhpStorm.
 * User: 亭臻
 * Date: 2017/7/5
 * Time: 上午 10:13
 */
header("Content-Type:text/html; charset=utf-8");
$account = $_SESSION['account'];
$text = $_POST['text'];
$pictype = $_FILES["img"]["type"];
$time = date("Y-m-d H:i:s");

/*
$result = $mysqli->query("SELECT * FROM message ORDER BY id DESC LIMIT 10");
$resultSize = sizeof($result);
/*for($i = 0; $i < $resultSize; $i++) {
    $rs = mysqli_fetch_assoc($result);
    echo $rs['text'];
}*/
//開啟圖片檔
$file = fopen($_FILES["img"]["tmp_name"], "rb");
// 讀入圖片檔資料
$content = fread($file, filesize($_FILES["img"]["tmp_name"]));
//關閉圖片檔
fclose($file);
// 圖片檔案資料編碼
$content = base64_encode($content);
//組合查詢字串
$sql = "INSERT INTO message(text,account,ctime,pic,pictype)" . "VALUE('$text','$account','$time','$content','$pictype') ";
$mysqli->query($sql);
?>

<?php  header("location: ../mainpage/index.php");?>

  <?php /*foreach ($result as  $item) {//取最新10個
    ?>
    <table border='solid'>
        <tr>
            <td width="10%"><?php echo $item['account']; ?></td>
            <td rowspan='3' width="60%"><?php echo $item['text'];?></td>
            <td rowspan='3' width="30%"> <?php if(isset($item['pic'])){echo'<img src="data:image/'.$item['pictype'].';base64,'.$item['pic'].'"/>';}else echo "";?> </td>
            <?php $id = $item['id']; ?>
        </tr>
        <tr>
            <td><?php echo $item['ctime']?></td>
        </tr>
        <tr>
            <td>
                <?php
if(isset($_SESSION['account'])) {
    if (($item['account'] == $_SESSION['account'])  |  1 == $_SESSION['grade']) {
        echo '<a href="../message-board/delete.php?id='.$id.'"><button class="ghost-button">delete</button></a>';
    }
}


            </td>
        </tr>

    </table>*/
?>

