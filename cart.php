<?php
if ($_COOKIE["userLogin"] ==1) {

}else{
       echo'<meta http-equiv="refresh" content="0, url=login.php"/>';
    exit();  
}
include "FCB.php"; 
global $connect; 
mysqli_set_charset($connect, 'utf8');

$GetToken = @$_GET["T"];
$GetTokenUser = @$_COOKIE["userToken"];
$GetShopInfo = "SELECT * FROM cart WHERE shopUser_cart = '$GetTokenUser'";
$RunShopInfo = mysqli_query($connect, $GetShopInfo);




if (@$_GET['D']=='D') {
    if (isset($_POST['yas'])){

        $Delete = "DELETE FROM cart WHERE token_cart ='$GetToken'";
        $RunDelete = mysqli_query($connect,$Delete);
           echo'<meta http-equiv="refresh" content="0, url=cart.php" />';
           exit();
    }
        echo'
        <link rel="stylesheet" href="cart.css">
        
        <div class="box">
        <form action="" class="formDelete" method="post" >
         <table class="TableDelete">
        
             <tr class="trDelet">
             <th class="TxtDelet">Are You Sure</th>
             </tr>
        </table> 
        <div class="conDelet">
                <div class="btnDiv"> <input  class="btnDelete" type="submit"  name="yas"  value="Yes "></th></div>
                <div class="btnDiv"> <a class="btnNoDelete"  href="cart.php">No</a></div>
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
    <link rel="stylesheet" href="css/cart.css">
    <script src="https://kit.fontawesome.com/6c84e23e68.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
<div class="navbarTop">

<div class="sorce00">
    <div class="s01"><a href="index.php">Home</a></div>
    <div class="s01"><a href="Producted.php">Producted</a> </div>
</div>

</div>
<div class="container">
    <div class="contpro">


    <?php
    
    while($RowShopInfo = mysqli_fetch_array($RunShopInfo)){
    @$totalPrice = $RowShopInfo['num_cart'] * $RowShopInfo['price_cart'];

    
        echo'

    <div class="container_dis">
    <div class="img_des"><img src="ProductImg/';echo $RowShopInfo['img_cart'];echo'" alt=""></div>
<div class="txt_dis">
<h1>'; echo $RowShopInfo['name_cart']; echo' </h1>
<div class="don"><h3>'; echo $RowShopInfo['price_cart']; echo' </h3> <h4>price</h4></div>
<div class="num"><h5>the number</h5> :<h4>'; echo $RowShopInfo['num_cart']; echo'</h4></div>
<div class="num"><h5>total Price </h5> :<h4>'; echo $totalPrice; echo' </h4></div>
<a href="">buy now</a>
<div class="d_e">
<div class="Delet"><a class="Delete" href="cart.php?D=D&T='; echo $RowShopInfo['token_cart'];  echo'">Delete</a></div>
</div>
</div>
</div>


';


@$TotlieAll +=$totalPrice;


    }


?>


</div>

</div>
<div class="navbar">

<div class="donnav">
    <div class="navdon">
        <div class="txtN"><h1>Price of all products in the cart</h1></div> 
        <div class="txtN2"><h1><?php echo @$TotlieAll ; ?>$</h1></div> 
</div>

</div>

</div>

</body>
</html>