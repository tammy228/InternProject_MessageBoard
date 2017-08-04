<?php
session_start();

require '../login-system/db.php';
//require '../function/delete.php';
//require '../login-system/login.php';
$result = $mysqli->query("SELECT * FROM message ORDER BY id DESC LIMIT 10");
$resultsize = sizeof($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>TTC_Message_Board</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <link href="../css/style_mainPage.css" type="text/css" rel="stylesheet"/>


    <!--<script>
        function sendMessage(str,str2) {
            if(str.length == 0){
                var notext = true;
                if(notext){
                    alert('留言不得為空!!!');
                }
                //return;
            }else{
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if(this.readyState == 4 && this.status == 200){
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                    }

                };
                xmlhttp.open("GET", '../message-board/index.php?q=' + str, true);
                xmlhttp.send()
            }

        }
    </script> -->

</head>
<body>

<div class="navbar">
<?php

if($_SESSION['logged_in']==true){
    echo "Hi!" .$_SESSION['account']. '<a href="../login-system/logout.php">登出</a>';
}elseif($_SESSION['logged_in'] == null | $_SESSION['logged_in'] == false){
    echo '<a href="../login-system/index.php">登入</a>';
}
?>
</div>

<div >
    <h1>留言板</h1>
</div>
<div id = 'txtHint'>
    <?php
        foreach($result as $item){

    ?>
            <table border='solid' class="message-board">
                <tr >
                    <td width="10%"><?php echo $item['account']; ?></td>
                    <td rowspan='3' width="60%"><?php echo $item['text'];?></td>
                    <td rowspan='3' width="30%"> <?php if(isset($item['pic'])){echo'<img src="data:image/'.$item['pictype'].';base64,'.$item['pic'].'"/>';}else echo "";?> </td>
                    <?php $id = $item['id']; ?>
                </tr>
                <tr>
                    <td><?php echo $item['ctime']; //$ctime = $item['ctime'];?></td>
                </tr>
                <tr>
                    <td>
                        <?php
                        if(isset($_SESSION['account'])) {
                            if (($item['account'] == $_SESSION['account'])  |  1 == $_SESSION['grade']) {
                                echo '<a href="../message-board/delete.php?id='.$id.'"><button class="ghost-button">delete</button></a>';
                            }
                        }
                        ?>

                    </td>
                </tr>

            </table>
     <?php } ?>

</div>

<div>
    <form action="../message-board/index.php" method="POST" Enctype="multipart/form-data">
        <textarea  maxlength="1000" rows="5" cols="100" name="text"></textarea><br>
        <?php $text = 'text.value'; ?>
      <!--  <input class="ghost-button" onclick="sendMessage(text.value,img.value)" type="submit" value="SUBMIT"/><br>
<!--    <form method="post" enctype="multipart/form-data" action="../message-board/resize.php">
        <input   name="file" type="file"><input class="ghost-button" name="upload" type="submit" value="UPLOAD PICTURE"/>
    </form>-->

        <label class="fileContainer">upfile<input type="file" name="img" /></label> &nbsp;
        <input class="ghost-button"type="submit" value="SUBMIT" /><br>
    </form>
</div>


</body>
</html>