<?php

if ($_COOKIE["userLogin"] ==1) {

}else{
       echo'<meta http-equiv="refresh" content="0, url=login.php"/>';
    exit();  
}
    include "FCB.php"; 
    global $connect; 
    mysqli_set_charset($connect, 'utf8');
    $error=null;
    $message=null;

     $a_Post01= @$_POST['get01'];

    $Token = @date("ymdhis");
    $RandomNumber = rand(100,200);
    $NewToken = $Token . $RandomNumber;

$getTokenUser= @$_COOKIE["userToken"];

    $GetToken = @$_GET["T"];
    $GetProInfo = "SELECT *FROM products WHERE pro_token ='$GetToken' ";
    $RunProInfo = mysqli_query($connect,$GetProInfo); // نفذ
    $RowProInfo = mysqli_fetch_array($RunProInfo); //جيب البيانات 
//هاي البيانات جبتهه من داتا بيس راح ادزهه للسله المشتريات
    $nameproject=$RowProInfo['pro_name'];
    $priceproject=$RowProInfo['pro_price'];
    $imgproject= $RowProInfo['pro_img'];
    $token_pro= $RowProInfo['pro_token'];
   
    if (isset($_POST['get05'])) {

        if (empty($a_Post01)) {
            $message=" <p class='message' >Choose a quantity</p>";
        }else {
       
        
        $GetUserShop = "SELECT * FROM cart WHERE shopUser_cart='$getTokenUser' AND shopTokenP_cart='$GetToken'";
        $RunUserShop = mysqli_query($connect, $GetUserShop);
        if(mysqli_num_rows($RunUserShop) != '0'){
            $RowUserShop = mysqli_fetch_array($RunUserShop);

            $GetTokenDataBase = $RowUserShop['token_cart'];

            $updateInfo = " UPDATE cart SET num_cart = '$a_Post01' WHERE token_cart = '$GetTokenDataBase'";

            if(mysqli_query($connect, $updateInfo)){
                echo'<link rel="stylesheet" href="style.css">';
                echo'<meta http-equiv="refresh" content="0, url=cart.php"/>';
                  exit();
            }else{
                echo'<link rel="stylesheet" href="style.css">';
                echo'لم يتم اضافة المنتج الى سلة المشتريات بنجاح';
                echo'<meta http-equiv="refresh" content="0; url=showProduct.php?T='; echo $GetToken; echo'" />';
                exit();
            }

        }else{




        $insertData = "INSERT INTO cart
               
        (
            token_cart,
            name_cart,
            price_cart,
            num_cart,
            img_cart,
            shopUser_cart,
            shopTokenP_cart
        ) VALUES
        (
            '$NewToken',
            '$nameproject',
            '$priceproject',
             '$a_Post01',
            '$imgproject',
            '$getTokenUser',
            '$token_pro'
        )";
        
        if(mysqli_query($connect, $insertData)){
            echo'<link rel="stylesheet" href="style.css">';
            echo'<meta http-equiv="refresh" content="0, url=cart.php"/>';
            exit();
        }else{
            echo'<link rel="stylesheet" href="style.css">';
            echo'لم يتم اضافة المنتج بنجاح';
            echo'<meta http-equiv="refresh" content="0, url=showProduct.php?T=';echo $GetToken; echo '" />';
            exit();
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
    <link rel="stylesheet" href="css/style.css">
    <title>Details</title>
</head>
<body>
    
<div class="navbarTop">

<div class="sorce00">
    <div class="s01"><a href="index.php">Home</a></div>
    <div class="s01"><a href="Producted.php">Producted</a> </div>
    <div class="s01"><a href="cart.php">Your cart</a>  </div>
</div>

</div>
<div class="details_card" id="details">

<form action="" method="post"  enctype="multipart/form-data">
<div class="con_deta">
<div class="img_deta">
    <img src="ProductImg/<?php echo $RowProInfo['pro_img']?>" alt="">
</div>

<div class="data_deta">
<?php echo $message; ?>
<div class="name_deta"><h1> <?php echo $RowProInfo['pro_name']; ?></h1></div>
<div class="name_deta"><h1><?php echo $RowProInfo['pro_price'];?></h1></div>
<div class="name_deta"><h1><?php echo $RowProInfo['pro_colors'];?></h1></div>
<div class="name_deta"><input type="number" placeholder="the number of pieces" name="get01" autocomplete="off" min="1" max="<?php echo $RowProInfo['pro_num']; ?>"></div>
<div class="add_to"><input type="submit" name="get05" value="Add To Cart"></div>
</div>
</div>
</div>
</form>

</body>
</html>