<?php
    if(@$_COOKIE["userLogin"] == 1){
        // الانتقال الى الصفحة الاخرى
        echo'<meta http-equiv="refresh" content="0, url=index.php" />';
        exit();
    }
include "FCB.php"; 
global $connect; 
mysqli_set_charset($connect, 'utf8');
$error=null;
$message=null;


$var01 =@$_POST['input01'];
$var02 =@$_POST['input02'];

if (isset($_POST['input03'])) {

    if (empty($var01) || empty($var02)) {
        $error = "<p class ='error'>Please do not leave the fields blank</p>";
    }
    
    else{
        $GetUserInfo = "SELECT * FROM `login` WHERE user_email = '$var01'";
        $RunUserInfo = mysqli_query($connect, $GetUserInfo);
        if (mysqli_num_rows($RunUserInfo) >0){
            $RowUserInfo=mysqli_fetch_array($RunUserInfo);
            $email = $RowUserInfo['user_email'];
            $UserPas = $RowUserInfo['password'];
            $UserToken = $RowUserInfo['User_token'];
            if ($UserPas != $var02) {
                $error="<p class ='error'>Please write the password correctly</p>";
            }else{
                setcookie('emailUser',$email, time() + (86400 * 365), "/");
                setcookie('userToken',$UserToken, time() + (86400 * 365), "/");
                setcookie('userLogin',1, time() + (86400 * 365), "/");



                echo'<meta http-equiv="refresh" content="0", url=index.php" />';
                exit();
            }

        }else{
                $message="<p class ='error'>Sorry, there is no account with this name</p>";
            }






    }


}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_login.css">
    <title>login</title>
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Tabs Titles -->
          <?php echo $error; ?>
          <?php echo  $message; ?>
          <h2 class="active"> Sign In </h2>
          <a href="Regster.php"><h2 class="inactive underlineHover">Sign Up </h2></a>
      
          <!-- Icon -->
          <div class="fadeIn first">
            <img src="img_log/user.png" id="icon" alt="User Icon" />
          </div>
      
          <!-- Login Form -->
          <form action="" method="post">
            
            <input type="email" id="email" class="fadeIn second" name="input01" placeholder="email">
            <input type="password" id="password" class="fadeIn third" name="input02" placeholder="password">
            <input type="submit" class="fadeIn fourth"  name="input03" value="Log In">
          </form>
      
          <!-- Remind Passowrd -->
          <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
          </div>
      
        </div>
      </div>
</body>
</html>