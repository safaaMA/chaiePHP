<?php

include "FCB.php"; 
global $connect; 
mysqli_set_charset($connect, 'utf8');
$error=null;
$message=null;

$Token = @date("ymdhis");
$RandomNumber = rand(100,200);
$NewToken = $Token . $RandomNumber;

$Pro1=@$_POST['product1'];
$Pro2=@$_POST['product2'];
$Pro3=@$_POST['product3'];
$Pro4=@$_POST['product4'];
$Pro5=@$_POST['product5'];
$Pro6=@$_POST['product6'];

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
                $insertData = "INSERT INTO products
               
                (
                    pro_token,
                    pro_name,
                    pro_price,
                    pro_Type,
                    pro_colors,
                    pro_newPrace,
                    pro_num,
                    pro_img
                ) VALUES
                (
                    '$NewToken',
                    '$Pro1',
                    '$Pro2',
                    '$Pro3',
                    '$Pro4',
                    '$Pro5',
                    '$Pro6',
                    '$newimgproblem2'
                )";
                
                if(mysqli_query($connect, $insertData)){
                    echo'<link rel="stylesheet" href="Admin.css">';
                    echo'يتم اضافة المنتج بنجاح';
                    echo'<meta http-equiv="refresh" content="0, " />';
                    exit();
                }else{
                    echo'<link rel="stylesheet" href="Admin.css">';
                    echo'لم يتم اضافة المنتج بنجاح';
                    echo'<meta http-equiv="refresh" content="0,  />';
                    exit();
                }



            }

}
}
}
    $GetAllProInfo = "SELECT *FROM products ORDER BY `products`.`pro_id` DESC ";
    $RunAllProInfo = mysqli_query($connect,$GetAllProInfo); // نفذ

    $Token=@$_GET['T'];
    if (@$_GET['D']=='D') {
       if (isset($_POST['yas'])){

           $Delete = "DELETE FROM products WHERE pro_token ='$Token'";
           $RunDelete = mysqli_query($connect,$Delete);
           echo'secss';
           echo'<meta http-equiv="refresh" content="0, url=Admin.php" />';
           exit();
              }
       echo'
       <link rel="stylesheet" href="Admin.css">

       <div class="box">
       <form action="" class="formDelete" method="post" >
           <table class="TableDelete">
       
               <tr class="trDelet">
               <th class="TxtDelet"> هل انت متاكد من الحذف</th>
               </tr>
        </table> 
        <div class="conDelet"></div>
                  <div class="btnDiv"> <input  class="btnDelete" type="submit"  name="yas"  value="نعم "></th></div>
                  <div class="btnDiv"> <a class="btnNoDelete"  href="Admin.php">كلا</a></div>
        </div>

          
           </form>
       </div>
       ';

   //  exit();
        
    }


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://kit.fontawesome.com/6c84e23e68.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/Admin.css">
</head>
<body>
    <div class="Home_Product">

        <div class="con_pros">
        
        
        <div class="list_section">
            <div class="up">
            <div class="logpro"><a href=""><i class="fa-solid fa-user"></i></a></div>
            <h1>Admin name</h1>
            <div class="list"> <i onclick="show_typy()" id="heed_list" class="fa-solid fa-bars-staggered"></i> <i onclick="hidn3()" id="clo" class="fa-solid fa-xmark sr"></i></div>
           </div>
            <div class="down" id="down">
                <div class="shdo"></div>
                <ul>
                    <!-- <li class="close"><i onclick="hidn2()"  class="fa-solid fa-xmark"></i></li> -->
                    <li class="il_producted"><a class="a_proname" onclick="Add()" > <div>Add Product</div> <div><i class="fa-sharp fa-solid fa-plus"></i></div></a></li>
                    <li class="il_producted"><a class="a_proname" onclick="All()"><div>All Products</div>  <div><i class="fa-solid fa-list-ol"></i></div></a></li>
                    <li class="il_producted"><a class="a_proname" onclick="Best()" ><div>Bestsellers</div>  <div><i class="fa-solid fa-arrow-up-short-wide"></i></div></a></li>
                    <li class="il_producted"><a class="a_proname" onclick="Dis()"><div>Discounts</div>  <div><i class="fa-sharp fa-solid fa-tag"></i></div></a></li>
                    <li class="il_producted"><a class="a_proname" onclick="User()"><div>Users</div>  <div><i class="fa-solid fa-users"></i></div></a></li>
                    <li class="il_producted"><a class="a_proname" onclick="food()"><div> Settings</div>  <div><i class="fa-solid fa-gear"></i></div></a></li>
                </ul>
            </div>
        </div>
        
        <div class="con2">
            <!-- ---------- add_product---------- -->
            <div class="add_product" id="Add">
<div class="img_producted_add">
    <img src="main-img/00.png" id="blah" alt="">
</div>
<div class="form_add">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form1">
<div class="name">
    <div class="tit_"><h3>Producer Name</h3></div>
    <div class="inp_name"><input type="text" name="product1"></div>
</div>
<div class="Product price">
    <div class="tit_"><h3>Product price</h3></div>
    <div class="inp_price"><input type="text" name="product2"></div>
</div>
</div>
 <div class="form2">
<div class="Product Type">
    <div class="tit_"><h3>Product Type</h3></div>
    <input class="tit_Type"   type="text"  autocomplete="off" list="country"  name="product3">  
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
    <div class="inp_colors"><input type="text"  name="product4"></div>
</div>
</div>
 <div class="form2">
<div class="Product Type">
    <div class="tit_"><h3> Last Prace</h3></div>
    <input class="tit_Type"   type="text"  autocomplete="off" name="product5" >  
</div>
<div class="Product colors">
    <div class="tit_"><h3>NUM</h3></div>
    <div class="inp_colors"><input type="number" name="product6"></div>
</div>
</div>

<div class="Product colors">
    <input type="file" accept="image/*" id="show" hidden  name="Proimg" />
    <label for="show"class=""><div><h1 class="txt_upload">product image upload</h1></div> <div class="img_upload" ><img src="icon/00.png" alt=""></div></label>
</div>
<div class="btn_pro"><input type="submit" name="submit" id="" value="Add Product"></div> 
    </form>
</div>

            </div>
            
            <!-- -------All producted ------ -->

 <div class="container_all" id="All">

 <table class="table">

    <tr>
      <th class="dark_th" >id</th>
      <th class="dark_th" >Photo Product</th>
      <th class="dark_th" >Name Product</th>
      <th class="dark_th" >Price Product</th>
      <th class="dark_th" >Color Product</th>
      <th class="dark_th" >Type Product</th>
      <th class="dark_th" >Last Prace </th>
      <th class="dark_th" > NUM </th>
      <th class="dark_th" >Command </th>
      <th class="dark_th" >Add to </th>
    </tr>
<?php
$Number=1;
while($RowAllProInfo = mysqli_fetch_array($RunAllProInfo)){
    echo'
    <tr>
    <th class="No_th" >';echo  $Number;echo'</th>
    <th><img src="ProductImg/';echo $RowAllProInfo['pro_img'] ;echo'"/></th>
    <th class="No_th" >';echo $RowAllProInfo['pro_name'];echo' </th>
    <th class="No_th" >';echo $RowAllProInfo['pro_price'];echo'</th>
    <th class="No_th" >';echo $RowAllProInfo['pro_colors'];echo'</th>
    <th class="No_th" >';echo $RowAllProInfo['pro_Type'];echo'</th>
    <th class="No_th" >';echo $RowAllProInfo['pro_newPrace'];echo'</th>
    <th class="No_th">';echo $RowAllProInfo['pro_num'];echo'</th>
    <th class="No_th" ><div><a class="Edit" href="EditProduct.php?D=D&T=';echo $RowAllProInfo['pro_token'];echo'">Edit</a></div> <div> <a href="Admin.php?D=D&T=';echo $RowAllProInfo['pro_token'];echo'" class="Delet">Delete</a> </div> </th>
    <th class="No_th" ><div><a class="Add_to1" name="get05" href="">Bestsellers</a></div> <div> <a href="" class="Add_to2">Discounts</a> </div> </th>

    </tr>
    ';
       $Number++; 
}




?>


</table>



</div>







<!-- -----Bestsellers---- -->
            <div class="Bestsellers_card" id="Bestsellers">
                <table class="table">

                    <tr>
                      <th class="dark_th" >id</th>
                      <th class="dark_th" >Photo Product</th>
                      <th class="dark_th" >Namr Product</th>
                      <th class="dark_th" >Price Product</th>
                      <th class="dark_th" >Color Product</th>
                      <th class="dark_th" >Command </th>
                    </tr>
                    <tr>
                      <th class="No_th" >1</th>
                      <th class="No_th" ><img src="main-img/00.png" alt=""></th>
                      <th class="No_th" >Chair</th>
                      <th class="No_th" >190$</th>
                      <th class="No_th" >white</th>
                      <th class="No_th" ><div> <a href="" class="Delet">Delete</a> </div> </th>
                    </tr>
                    
                </table>
            </div>
            
            <!-- -----Dis---- -->
            <div class="Dis_card" id="Dis">
                <table class="table">

                    <tr>
                      <th class="dark_th" >id</th>
                      <th class="dark_th" >Photo Product</th>
                      <th class="dark_th" >Namr Product</th>
                      <th class="dark_th" >Price Product</th>
                      <th class="dark_th" >Color Product</th>
                      <th class="dark_th" >Command </th>
                    </tr>
                    <tr>
                      <th class="No_th" >1</th>
                      <th class="No_th" ><img src="main-img/00.png" alt=""></th>
                      <th class="No_th" >Chair</th>
                      <th class="No_th" >190$</th>
                      <th class="No_th" >white</th>
                      <th class="No_th" ><div><a class="Edit" href="">Edit</a></div> <div> <a href="" class="Delet">Delete</a> </div> </th>
                    </tr>
                    
                </table>

            </div>
          <!-- -----User---- -->
            <div class="User_card" id="User">
                <table class="table">

                    <tr>
                      <th class="dark_th" >id</th>
                      <th class="dark_th" >User Img</th>
                      <th class="dark_th" >User Name</th>
                      <th class="dark_th" >User Email</th>
                      <th class="dark_th" >Command </th>

                    </tr>
                    <tr>
                      <th class="No_th" >1</th>
                      <th class="No_th" ><img src="main-img/00.png" alt=""></th>
                      <th class="No_th" >Chair</th>
                      <th class="No_th" >190$</th>
                      <th class="No_th" ><div> <a href="" class="Delet">Delete</a> </div> </th>
                    </tr>
                    
                </table>

            </div>
            
            </div>
            </div>
            
                </div>
                <script src="js/Admin.js"></script>      
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