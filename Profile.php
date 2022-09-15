<?php

include "FCB.php"; 
global $connect; 
mysqli_set_charset($connect, 'utf8');
$error=null;
$welcome=null;

$GetToken =@$_COOKIE["userToken"];
$GetUserInfo01 = "SELECT * FROM `login` WHERE User_token = '$GetToken'";
$RunUserInfo01 = mysqli_query($connect, $GetUserInfo01);
$RowUserInfo01 = mysqli_fetch_array($RunUserInfo01);

$a_post01 = @$_POST['getname'];     
$a_post02 = @$_POST['lastname'];    
$a_post03 = @$_POST['getemail'];
$a_post04 = @$_POST['password'];

// الاوامر الخاصه برفع الصور
$u_img2 = @$_FILES['Userfilimg']['name'];
$u_img_tmp2 = @$_FILES['Userfilimg']['tmp_name'];
$target_dir = "UserPhoto/";
$target_file2 = $target_dir . basename(@$_FILES["Userfilimg"]["name"]);
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
$uploadOk = 1;
$newimgproblem2 = uniqid('User-', true) 
. '.' . strtolower(pathinfo(@$_FILES['Userfilimg']['name'], PATHINFO_EXTENSION));

if(isset($_POST['send'])){

    // التحقق من الحقول اذا كانت فارغه
    if(empty($a_post03) || empty($a_post02) || empty($a_post04) || empty($a_post01)){
        // رسالة الخطأ
        $error = "<p class='style09'>يرجى عدم ترك الحقول فارغه</p>";
        // رسالة الترحيب فارغه في حاله وجود خطأ ما
        $welcome = "";
    }else{
        // التحقق من اسم المستخدم مكرر او لا في قاعدة البيانات
        $GetUserInfo3 = "SELECT * FROM `login`  WHERE user_name = '$a_post01'";
        // هذا الامر للتفعيل واعطاء صلاحية لأمر التحقيق من البيانات
        $RunUserInfo3 = mysqli_query($connect, $GetUserInfo3);
        // الحصول على البيانات بشكل مصفوفة
        $RowUserInfo3 = mysqli_fetch_array($RunUserInfo3);
        // الحصول على اسم المستخدم
        $UserName = $RowUserInfo3['user_name'];

        // التحقق من رقم المستخدم مكرر او لا في قاعدة البيانات
        $GetUserInfo2 = "SELECT * FROM `login` WHERE user_email = '$a_post03'";
        // هذا الامر للتفعيل واعطاء صلاحية لأمر التحقيق من البيانات
        $RunUserInfo2 = mysqli_query($connect, $GetUserInfo2);
        // الحصول على البيانات بشكل مصفوفة
        $RowUserInfo2 = mysqli_fetch_array($RunUserInfo2);
        // الحصول على رقم المستخدم
        $UserNumber = $RowUserInfo2['user_email'];
        if(!empty($u_img2)){
            // الاوامر الخاصه برفع الصورة والتأكد من البيانات
            if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif" && $imageFileType2 != "pdf") {
                # Set upload check to 1.
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                // رسالة الخطأ
                $error = "<p class='style09'>عذراً لم يتم اضافة صور المنتج</p>";
                $newimgproblem2 = $RowUserInfo['user_img'];
            }
            if ($uploadOk == 1) {
                # هذا الامر الخاص بنقل الصورة الى المجلد
                move_uploaded_file($u_img_tmp2,"UserPhoto/$newimgproblem2");
                # Check size image, number in bit.
                if (@$_FILES["u_img"]["size"] > 500000) {
                    # IF Image png type.
                    if($imageFileType2 == "png"){
                        # Read images to Resize it.
                        function aborahaf($filename,$percent){
                            list($width, $height) = getimagesize($filename);
                            $newwidth = $width * $percent;
                            $newheight = $height * $percent;
                            $thumb = imagecreatetruecolor($newwidth, $newheight);
                            $source = imagecreatefrompng($filename);
                            // preserve transparency START
                            imagecolortransparent($thumb, imagecolorallocatealpha($thumb, 0, 0, 0, 127));
                            imagealphablending($thumb, false);
                            imagesavealpha($thumb, true);
                            // preserve transparency end
                            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                            imagepng($thumb, $filename);
                        }
                        # location images, Resize images to half 0.5.
                        aborahaf("UserPhoto/$newimgproblem2", 0.5);
                    }
                    # IF Image gif type.
                    if($imageFileType2 == "gif"){
                        # Read images to Resize it.
                        function aborahaf($filename,$percent){
                            list($width, $height) = getimagesize($filename);
                            $newwidth = $width * $percent;
                            $newheight = $height * $percent;
                            $thumb = imagecreatetruecolor($newwidth, $newheight);
                            $source = imagecreatefromgif($filename);
                            // preserve transparency START
                            imagecolortransparent($thumb, imagecolorallocatealpha($thumb, 0, 0, 0, 127));
                            imagealphablending($thumb, false);
                            imagesavealpha($thumb, true);
                            // preserve transparency end
                            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                            imagegif($thumb, $filename);
                        }
                        # location images, Resize images to half 0.5.
                        aborahaf("UserPhoto/$newimgproblem2", 0.5);
                    }
                    # IF Image jpg type or jpeg type.
                    if($imageFileType2 == "jpg" || $imageFileType2 == "jpeg"){
                        # Read images to Resize it.
                        function aborahaf($filename,$percent){
                            list($width, $height) = getimagesize($filename);
                            $newwidth = $width * $percent;
                            $newheight = $height * $percent;
                            $thumb = imagecreatetruecolor($newwidth, $newheight);
                            $source = imagecreatefromjpeg($filename);
                            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                            imagejpeg($thumb, $filename);
                        }
                        # location images, Resize images to half 0.5.
                        aborahaf("UserPhoto/$newimgproblem2", 0.5);
                    }
                }
            }
        }
        if($imageFileType2 ==''){
            $newimgproblem2 = $RowUserInfo01['user_img'];
        }
        $updateInfo = " UPDATE login SET
            user_name = '$a_post01',
            last_name = '$a_post02',
            user_email = '$a_post03',
            password = '$a_post04',
            user_img = '$newimgproblem2'
            
            WHERE User_token = '$GetToken'
        ";
        if(mysqli_query($connect, $updateInfo)){
            $welcome = "<p/>تم</p>";
            echo'<meta http-equiv="refresh" content="0"; url=profile.php" />';
            exit();
        }else{
            echo'لم يتم التحديث';
            echo'<meta http-equiv="refresh" content="3; url=profile.php" />';
            exit();
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
    <title>Profile</title>
    <script src="https://kit.fontawesome.com/6c84e23e68.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/Profile.css">
</head>
<body>
<div class="navbarTop">

<div class="sorce00">
    <div class="s01"><a href="index.php">Home</a></div>
    <div class="s01"><a href="Producted.php">Producted</a> </div>
    <div class="s01"><a href="cart.php">Your cart</a> </div>
    <div class="s01"><a href="logout.php">Log Out</a> </div>
</div>
                
    </div>
<div class="container">
<div class="MneContainer">

<div class="photo"> <img src="UserPhoto/<?php echo $RowUserInfo01['user_img'];?>" id="blah"  ></div>
<div class="int">
    <form action="" method="post" enctype="multipart/form-data">
<div class="flex">
<div class="Name">
    <div><h1>Ferst Name</h1></div>
    <div><input type="text"  value="<?php echo $RowUserInfo01['user_name']; ?>" name="getname"></div>
</div>
<div class="Name">
    <div><h1>Last Name</h1></div>
    <div><input type="text" value="<?php echo $RowUserInfo01['last_name']; ?>"  name="lastname"></div>
</div>
</div>
<div class="flex">
<div class="Name">
    <div><h1>Email</h1></div>
    <div><input type="text" value="<?php echo $RowUserInfo01['user_email']; ?>" name="getemail"></div>
</div>
<div class="Name">
    <div><h1>password</h1></div>
    <div><input type="text" value="<?php echo $RowUserInfo01['password']; ?>"  name="password"></div>
</div>
</div>
<div class="Up">
    <div class="Upimg">
    <input type="file" accept="image/*" id="show" hidden  name="Userfilimg" />
    <label for="show"class=""><div><h1 class="txt_upload">image upload</h1></div> <div class="img_upload" ><img src="icon/00.png" alt=""></div></label>
    </div>
    <div><input type="submit" value="Update" name="send"></div>
</div>
</div>
</div>

    </form>
</div>


</div>

</div>
<script>
       show.onchange = evt => {
            const [file] = show.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
</body>
</html>