<?php
    if(@$_COOKIE["userLogin"] == 1){
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
 $var03 =@$_POST['input03'];
 $var04 =@$_POST['input04'];

 $Token = @date("ymdhis");
 $RandomNumber = rand(100,200);
 $NewToken = $Token . $RandomNumber;

 if (isset($_POST['input05'])) {

 if (empty($var01) || empty($var02) || empty($var03) || empty($var04)) {
     $error = "<p class ='error'>Please do not leave the fields blank</p>";
 }else{
 
     $GetUserInfo = "SELECT * FROM `login` WHERE last_name = '$var02'";
     $RunUserInfo = mysqli_query($connect, $GetUserInfo);
     $RowUserInfo = mysqli_fetch_array($RunUserInfo);
     $UserName = $RowUserInfo['last_name'];

    $GetUseremail = "SELECT * FROM `login` WHERE emuser_email = '$var03'";
    $RunUseremail = mysqli_query($connect, $GetUseremail);
    $RowUseremail = mysqli_fetch_array($RunUseremail);
    $Useremail = $RowUseremail['user_email'];


    

      if($var02 == $UserName){
         $error = "<p class ='error' >Sorry, this name is already in use </p>";
     }
    
     elseif($var03 == $Useremail){
            $error = "<p class ='error'>Sorry, this email is already in use </p>";

        }else{
        $InsertData = "INSERT INTO login
       (
            User_token,
            user_name,
            last_name,
            user_email,
            password

         ) VALUES(
           '$NewToken',
           '$var01',
           '$var02',
           '$var03',
           '$var04'

        )";
           if(mysqli_query($connect, $InsertData)){

            setcookie('emailUser',$var03, time() + (86400 * 365), "/");
            setcookie('userToken',$NewToken, time() + (86400 * 365), "/");
            setcookie('userLogin',1, time() + (86400 * 365), "/");

            
                echo'<link rel="stylesheet" href="style_login.css">';
               $message="<p class ='error'>Account created successfully</p>";
                 echo'<meta http-equiv="refresh" content="0, url=index.php" />';
             }else{
                        echo'<p>error </p>';
             }




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
    <title>sing in</title>
</head>
<body>
    <div class="SN-wrapper fadeInDown">
        <div id="SN-formContent">
          <!-- Tabs Titles -->
          <?php echo $error; ?>
          <?php echo  $message; ?>
          <a href="login.php"><h2 class="inactive underlineHover"> Sign In </h2></a>
          <h2 class="active">Sign Up </h2>
      <div class="cont">
          <!-- Icon -->
          <div class="SN fadeIn first">
            <img src="img_log/register.png" id="SN-icon"  />
          </div>
      
          
          <form action="" method="post">
            <input type="text" id="input01" class="fadeIn second" name="input01" placeholder=" first name">
          <input type="text" id="login" class="fadeIn second" name="input02" placeholder="last name">
            <input type="email" id="login" class="fadeIn second" name="input03" placeholder="email">
            <input type="password" id="password" class="fadeIn third" name="input04" placeholder="password"> 
            <input type="submit" class="fadeIn fourth" value="Sing In" id="input05"  name="input05">
          </form>
        </div>
          <!-- Remind Passowrd -->
          <div id="formFooter">
            <a class="underlineHover" href="#">or by facebook</a>
          </div>
      
        </div>
      </div>
 
</body>
</html>