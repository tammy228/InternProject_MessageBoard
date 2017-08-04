<?php
require '../login-system/db.php';

if ( $_FILES["upfile"]["size"] > 0 )
{
    //開啟圖片檔
    $file = fopen($_FILES["upfile"]["tmp_name"], "rb");
    // 讀入圖片檔資料
    $fileContents = fread($file, filesize($_FILES["upfile"]["tmp_name"]));
    //關閉圖片檔
    fclose($file);

    // 圖片檔案資料編碼
    $fileContents = base64_encode($fileContents);


    //組合查詢字串
    $SQLSTR="Insert into myimage (filename,filesize,filetype,filepic) values('"
        . $_FILES["upfile"]["name"] . "',"
        . $_FILES["upfile"]["size"] . ",'"
        . $_FILES["upfile"]["type"] . "','"
        . $fileContents . "')";
    //將圖片檔案資料寫入資料庫
    if(!$mysqli->query($SQLSTR)==0)
    {
        echo "您所上傳的檔案已儲存進入資料庫<a href=\"../mainpage/index.php?filename="
            . $_FILES["upfile"]["name"] . "\">"
            . $_FILES["upfile"]["name"] . "</a>";
    }
    else
    {
        echo "您所上傳的檔案無法儲存進入資料庫";
    }
}
else
{
    echo "圖片上傳失敗";
}
echo "</BLOCKQUOTE>";
?>