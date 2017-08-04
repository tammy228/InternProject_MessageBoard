<?php
require 'db.php';
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>TTC_Message_Board | LOGIN</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <?php// include "../css/css.html";?>
    <link href="../css/style.css" type="text/css" rel="stylesheet"/>
    <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" type="text/css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" type="text/css" rel="stylesheet"/>
</head>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['login'])){
        require 'login.php';
    }
    elseif (isset($_POST['signup'])){
        require 'signup.php';
    }
}
?>

<body>




<div class="form">

    <ul class="tab-group">
        <li class="tab"><a href="#register">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
    </ul>

    <div class="tab-content">

        <div id="login">
            <form action="index.php" method="post" autocomplete="off">
                <div class="field-wrap">
                     <label for = "account">
                         account<span class="req">*</span>
                     </label>  <!--使用for 按下label 就可以打字-->
                    <input id = "account" type="text" name="account" value=""autocomplete="off"/><br>
                </div>
                <div class="field-wrap">
                    <label for = "password">
                        password<span class="req">*</span>
                    </label>
                    <input  id = "password" type="password" name="password" value=""autocomplete="off"/><br>
                </div>
                <button class="button button-block" name="login" />Log In</button>  <!--不用submit 直接登入就好 -->
            </form>
        </div><!-- for login -->



        <div id="register">
            <form action = "index.php" method = "post" autocomplete="off">
                <div class="field-wrap">
                    <label for="email">
                        email<span class="req">*</span>
                    </label>
                <input id="email" type="email" name="email" value=""autocomplete="off"/><br>
                </div>
                <div class="field-wrap">
                    <label for="S_account">
                        account<span class="req">*</span>
                    </label>
                    <input id="S_account" type="text" name="S_account" value=""autocomplete="off"/><br>
                </div>
                <div class="field-wrap">
                    <label for="S_password">
                        password<span class="req">*</span>
                    </label>
                    <input id="S_password"type="password" name="password" value=""autocomplete="off"/><br>
                </div>
                <div class="field-wrap">
                    <label for="C_password">
                        Confirm password<span class="req">*</span>
                    </label>
                    <input id="C_password" type="password" name="C_password" value=""autocomplete="off"/><br>
                </div>
                <input name = "signup" type="submit" class="button button-block" value="SIGN UP"/>
            </form>
        </div><!-- for register -->

    </div><!-- tab-content -->

</div> <!-- /form -->

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="../js/index.js"></script>





</body>
</html>
