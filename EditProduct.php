<?php

include "FCB.php"; 
global $connect; 
mysqli_set_charset($connect, 'utf8');
$error=null;
$message=null;

$Pro1=@$_POST['product1'];
$Pro2=@$_POST['product2'];
$Pro3=@$_POST['product3'];
$Pro4=@$_POST['product4'];
$Pro5=@$_POST['product5'];
$Pro6=@$_POST['product6'];

$GetToken = $_GET["T"];
$GetProInfo = "SELECT *FROM products WHERE pro_token ='$GetToken' ";
$RunProInfo = mysqli_query($connect,$GetProInfo); // نفذ
$RowProInfo = mysqli_fetch_array($RunProInfo); //جيب البيانات 

$u_img2 = @$_FILES['Proimg']['name'];
$u_img_tmp2 = @$_FILES['Proimg']['tmp_name'];
$target_dir = "ProductImg/";
$target_file2 = $target_dir . basename(@$_FILES["Proimg"]["name"]);
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
$uploadOk = 1;
$newimgproblem2 = uniqid('producted-', true) 
. '.' . strtolower(pathinfo(@$_FILES['Proimg']['name'], PATHINFO_EXTENSION));

if (isset($_POST['submit'])) {

    if(empty($Pro1) || empty($Pro2) || empty($Pro3)){
          
        $error = "<p class='style09'>يرجى عدم ترك الحقول فارغه</p>";
        $welcome = "";
    }else {

        if(empty($u_img2)){
            // رسالة الخطأ
            $error = "<p class='style09'>يرجى عدم ترك حقل الصورة فارغ</p>";
            # Set upload check to 0.
            $uploadOk = 0;
        }else{
            if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif" && $imageFileType2 != "pdf") {
                $error2 = "<p class='style09'>يرجى اختيار الامتداد المسموح به</p>";
                # Set upload check to 0.
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                // رسالة الخطأ
                $error = "<p class='style09'>عذراً لم يتم اضافة صور المنتج</p>";
            }
            if ($uploadOk == 1) {
                # هذا الامر الخاص بنقل الصورة الى المجلد
                move_uploaded_file($u_img_tmp2,"ProductImg/$newimgproblem2");
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
                        aborahaf("ProductImg/$newimgproblem2", 0.5);
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
                        aborahaf("ProductImg/$newimgproblem2", 0.5);
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
                        aborahaf("ProductImg/$newimgproblem2", 0.5);
                    }
                }
                if ($imageFileType2 =='') {
                    $newimgproblem2=$RowProInfo['pro_img'];
                }

                $updateInfo = " UPDATE products SET
                pro_name = '$Pro1',
                pro_price = '$Pro2',
                pro_img = '$newimgproblem2',
                pro_Type = '$Pro3',
                pro_colors= '$Pro4',
                pro_newPrace= '$Pro5',
                pro_num= '$Pro6'
                 
                WHERE pro_token = '$GetToken'
            ";
            if(mysqli_query($connect, $updateInfo)){
                $message= '<p class="style09">تم التحديث</p>';
                echo'<meta http-equiv="refresh" content="0"; url=EditProduct.php?T=';echo $GetToken; echo'" />';
                
                exit();
            }else{
                echo'لم يتم التحديث';
                echo'<meta http-equiv="refresh" content="0; url=editProject.php?T='; echo $GetToken; echo'" />';
                exit();
                }
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
    <link rel="stylesheet" href="css/Admin.css">
    <title>EditProduct</title>
</head>
<body>
            
        <div class="add_product" id="Add">
              <?php echo $error; ?>
              <?php echo $message; ?>
        <div class="img_producted_add">
      
            <img src="ProductImg/<?php echo $RowProInfo['pro_img']?>" id="blah" alt="">
        </div>
        <div class="form_add">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form1">
        <div class="name">
            <div class="tit_"><h3>Producer Name</h3></div>
            <div class="inp_name"><input type="text" name="product1" value="<?php echo $RowProInfo['pro_name']; ?>" ></div>
        </div>
        <div class="Product price">
            <div class="tit_"><h3>Product price</h3></div>
            <div class="inp_price"><input type="text" name="product2" value="<?php echo $RowProInfo['pro_price']; ?>"></div>
        </div>
        </div>
        <div class="form2">
        <div class="Product Type">
            <div class="tit_"><h3>Product Type</h3></div>
            <input class="tit_Type"   type="text"  autocomplete="off" list="country"  name="product3" value="<?php echo $RowProInfo['pro_Type']; ?>" >  
            <datalist id="country">
                <option >Chair</option>
                <option >Tables</option>
                <option >Bed room</option>
                <option >Antiques</option>
                <option >Chandelier</option>
                <option > food tables</option>

            </datalist>
        </div>
        <div class="Product colors">
            <div class="tit_"><h3>Available colors</h3></div>
            <div class="inp_colors"><input type="text"  name="product4" value="<?php echo $RowProInfo['pro_colors']; ?>" ></div>
        </div>
        </div>
        <div class="form2">
        <div class="Product Type">
            <div class="tit_"><h3> Last Prace</h3></div>
            <input class="tit_Type"   type="text"  autocomplete="off" name="product5" value="<?php echo $RowProInfo['pro_newPrace']; ?>">  
        </div>
        <div class="Product colors">
            <div class="tit_"><h3>NUM</h3></div>
            <div class="inp_colors"><input type="number" name="product6" value="<?php echo $RowProInfo['pro_num']; ?>"></div>
        </div>
        </div>

        <div class="Product colors">
            <input type="file" accept="image/*" id="show" hidden  name="Proimg" />
            <label for="show"class=""><div><h1 class="txt_upload">product image upload</h1></div> <div class="img_upload" ><img src="icon/00.png" alt=""></div></label>
        </div>
        <div class="btn_pro"><input type="submit" name="submit" id="" value="Edit Product"></div> 
            </form>
        </div>

                    </div>
</body>
</html>