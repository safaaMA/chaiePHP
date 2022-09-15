
<?php
include "FCB.php"; 
global $connect; 
mysqli_set_charset($connect, 'utf8');

$GetToken =@$_COOKIE["userToken"];
$GetUserInfo01 = "SELECT * FROM `login` WHERE User_token = '$GetToken'";
$RunUserInfo01 = mysqli_query($connect, $GetUserInfo01);
$RowUserInfo01 = mysqli_fetch_array($RunUserInfo01);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="fontawesome/css/brands.css" rel="stylesheet">
  <link href="fontawesome/css/solid.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/6c84e23e68.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>furniture</title>
</head>
<body>
    <div class="container">
        <div class="navbar">
        
        <div class="icon-list">
            <i onclick="show_nav()" class="fa-solid fa-bars-staggered"></i>
        </div>
        <div class="log"><img src="icon/home.png" alt=""></div>
        <div class="nav-list" id="navbar">
            <div class="navhiden">
            <i onclick="hide()" class="fa-solid fa-xmark"></i>
        </div>
        <nav >
            <ul class="main-ul">
                <li class="main-li" ><a class="a-menu" href="#Home">Home</a></li>
                <li class="main-li" ><a class="a-menu" href="#why">why us</a> </li>
                <li class="main-li" ><a class="a-menu" href="#BESTSELLERS">Bestsellers</a> </li>
                <li class="main-li" ><a class="a-menu" href="#section_products"> Product</a> </li>
                <li class="main-li" ><a class="a-menu" href="#Discounts">Discounts</a> </li>
                
            </ul>
        </nav>
        </div>
        <div class="main-icon" >
            <a class="a-mainicon " href=""><i class="fa-solid fa-magnifying-glass"></i></a>
            <a class="a-mainicon " href="cart.php"><i class="fa-solid icon00 fa-cart-shopping"></i></a>
            <?php  
              if(@$_COOKIE["userLogin"] == 1){
                echo'<h4 class="loginName"> <a class="" href="Profile.php">';echo $RowUserInfo01['user_name'];echo'</a> </h4>';

              }else{
                echo'<a class="login" href="login.php"><i class="fa-solid fa-right-to-bracket"></i></a>' ;
              }
              
              
              ?>
            
        </div>
        </div>
         <div class="main_section" id="Home">
                <div class="section_left">
                    <img src="main-img/00.png" alt="">
                </div>
                <div class="section-right">
                    <div class="title"><h2>Fend Your Best Furniture</h2></div> 
                    <div class="video"><i class="fa-solid fa-play"></i></div>
                    <div class="main_p"> <p>Search for your home furnishing here,
                        you will find everything elegant and beautiful</p></div>
                        <div class="main_btn">
                            <div class="btn00"><a href="#section_products">Get started</a></div>
                            <div class="btn01"><a href="">Wath a video</a></div>
                        </div>
                </div>
        </div>
       <div class="section_why" id="why">
            <div class="why_img">
                <div class="main_why_img">
                    <img id="main_img" src="main-img/sec01.png" alt="">
                </div>
            </div>
<div class="text_why">
    <div class="title_why"><h1>Modern Designs</h1></div>
    <div class="p_why"><p>We are distinguished by providing modern designs with high durability</p></div>
   <div class="features">
    <div class="one">
        <ul>
            <li>High quality</li>
            <li>Details</li>
            <li> color harmony</li>
        </ul>
    </div>
    <div class="tow">
        <ul>
            <li>famous brands</li>
            <li>attraction</li>
            <li>strength</li>
          
        </ul>
    </div>
   
   </div>
 <div class="btn_why"><a href="#section_products">Go To Products</i></a></div>
 <div class="slict_img">
    <div class="img00"><img onclick="photo(this.src)" src="main-img/sec00.png" alt=""></div>
    <div class="img00"><img onclick="photo(this.src)" src="main-img/sec02.png" alt=""></div>
    <div class="img00"><img onclick="photo(this.src)" src="main-img/sec03.png" alt=""></div>
    <div class="img00"><img onclick="photo(this.src)" src="main-img/sec05.png" alt=""></div>
</div>
</div>

 </div>
<div class="BESTSELLERS " id="BESTSELLERS">
<div class="hamesh">
<div class="text_best"><h1>BESTSELLERS </h1></div>
<div class="pro_left" id="left"><i class="fa-solid fa-caret-left"></i></div>
<div class="pro_right" id="right"><i class="fa-solid fa-caret-right"></i></div>
</div>
<div class="container_best" id="best_prodected">
    <div class="best_pro">
        <div class="img_best"><img src="best/00.png" alt=""></div>
        <div class="about_best"><h1>PRINCETON CHAIR</h1></div>
        <div class="color_best">
                <div class="one1 color"></div>
                <div class="tow2 color"></div>
                <div class="three3 color"></div>
                <div class="for4 color"></div>
        </div>
        <div class="details"><a href="">details</a> </div>
        <div class="prace"><h2>90$</h2></div>
    </div>
    <div class="best_pro">
        <div class="img_best"><img src="main-img/01.png" alt=""></div>
        <div class="about_best"><h1> a sofa</h1></div>
        <div class="color_best">
                <div class="one1 color"></div>
                <div class="tow2 color"></div>
                <div class="three3 color"></div>
                <div class="for4 color"></div>
        </div>
        <div class="details"><a href="">details</a> </div>
        <div class="prace"><h2>490$</h2></div>
    </div>
    <div class="best_pro">
        <div class="img_best"><img src="main-img/003.png" alt=""></div>
        <div class="about_best"><h1> Table</h1></div>
        <div class="color_best">
                <div class="one1 color"></div>
                <div class="tow2 color"></div>
                <div class="three3 color"></div>
                <div class="for4 color"></div>
        </div>
        <div class="details"><a href="">details</a> </div>
        <div class="prace"><h2>120$</h2></div>
    </div>
    <div class="best_pro">
        <div class="img_best"><img src="main-img/04.png" alt=""></div>
        <div class="about_best"><h1>EDEN FOOTSTOOL</h1></div>
        <div class="color_best">
                <div class="one1 color"></div>
                <div class="tow2 color"></div>
                <div class="three3 color"></div>
                <div class="for4 color"></div>
        </div>
        <div class="details"><a href="">details</a> </div>
        <div class="prace"><h2>30$</h2></div>
    </div>
    <div class="best_pro">
        <div class="img_best"><img src="main-img/05.png" alt=""></div>
        <div class="about_best"><h1>CHARLOTTE CHAIR</h1></div>
        <div class="color_best">
                <div class="one1 color"></div>
                <div class="tow2 color"></div>
                <div class="three3 color"></div>
                <div class="for4 color"></div>
        </div>
        <div class="details"><a href="">details</a> </div>
        <div class="prace"><h2>180$</h2></div>
    </div>
    
</div>


</div>
 <div class="section_products" id="section_products">
   <div class="title_pro"><h1>Product</h1></div>
   <div class="container_producted">

 <div class="product">
        <div class="img_product"><img src="main-img/pngegg (1).png" alt=""></div>
        <div class="abuot_product">
            <h1>Chair</h1>
            <p>Shop different types of chairs with excellent quality</p>
            <a href="Producted.php">See All</a>
        </div>
        
    </div> 
    <div class="tables">
     <div class="img_tables"><img src="main-img/003.png" alt=""></div>
        <div class="abuot_product">
            <h1>Table</h1>
            <p>Shop different types of Table with excellent quality</p>
            <a href="Producted.html">See All</a>
        </div>
    </div>
</div>


 <div class="product2">
    <div class="title_pro"><h1>More Product Categories</h1></div>
    <div class="container_slide">
    <div class="slider">
    <input type="radio" name="slider" title="slide1" checked="checked" class="slider__nav"/>
    <input type="radio" name="slider" title="slide2" class="slider__nav"/>
    <input type="radio" name="slider" title="slide3" class="slider__nav"/>
    <input type="radio" name="slider" title="slide4" class="slider__nav"/>
    <div class="slider__inner">
      <div class="slider__contents"><div class="icon_pro"><img src="icon/bedroom.png" alt=""></div>
        <h2 class="slider__caption">bed room</h2>
        <p class="slider__txt">Modern bedrooms from the best furniture companies with excellent quality</p>
        <a href="Producted.php" class="btn_pro">See All</a>
      </div>
      <div class="slider__contents"><div class="icon_pro"><img src="icon/telephone.png" alt=""></div></i>
        <h2 class="slider__caption">Antiques</h2>
        <p class="slider__txt">For lovers of antiques, buy the most beautiful antiques for your home decor</p>
        <a href="Producted.php" class="btn_pro">See All</a>
      </div>
      <div class="slider__contents"><div class="icon_pro"><img src="icon/chandelier.png" alt=""></div></i>
        <h2 class="slider__caption">chandelier</h2>
        <p class="slider__txt">Make the roof of your house more complete and more beautiful</p>
        <a href="Producted.php" class="btn_pro">See All</a>
      </div>
      <div class="slider__contents"><div class="icon_pro"><img src="icon/dining-table.png" alt=""></div></i>
        <h2 class="slider__caption">Food tables</h2>
        <p class="slider__txt">Distinguish more through dining tables that become part of your home décor</p>
        <a href="Producted.php" class="btn_pro">See All</a>
      </div>
    </div>
  </div>
   </div>
</div>

   </div>
  
<div class="discounts" id="Discounts">
    <div class="hamesh">
        <div class="title_dis">Discounts</div>
        <div class="pro_left" id="left2"><i class="fa-solid fa-caret-left"></i></div>
        <div class="pro_right" id="right2"><i class="fa-solid fa-caret-right"></i></div>
</div>
<div class="sled_dis" id="sled_dis">

<div class="container_dis">
    <div class="img_des"><img src="main-img/010.png" alt=""></div>
<div class="txt_dis">
<h1>Chair</h1>
<div class="don"><h3>90$</h3> <h4>60$</h4></div>
<a href="">details</a>
</div>
</div>
<div class="container_dis">
    <div class="img_des"><img src="best/01.png" alt=""></div>
<div class="txt_dis">
<h1>Rolling chair</h1>
<div class="don"><h3>110$</h3> <h4>95$</h4></div>
<a href="">details</a>
</div>
</div>
<div class="container_dis">
    <div class="img_des"><img src="best/02.png" alt=""></div>
<div class="txt_dis">
<h1>responsive table</h1>
<div class="don"><h3>50$</h3> <h4>70$</h4></div>
<a href="">details</a>
</div>
</div>
<div class="container_dis">
    <div class="img_des"><img src="best/03.png" alt=""></div>
<div class="txt_dis">
<h1>Rolling chair small</h1>
<div class="don"><h3>40$</h3> <h4>60$</h4></div>
<a href="">details</a>
</div>
</div>
<div class="container_dis">
    <div class="img_des"><img src="best/04.png" alt=""></div>
<div class="txt_dis">
<h1>table</h1>
<div class="don"><h3>70$</h3> <h4>90$</h4></div>
<a href="">details</a>
</div>
</div>
<div class="container_dis">
    <div class="img_des"><img src="best/05.png" alt=""></div>
<div class="txt_dis">
<h1>Chair</h1>
<div class="don"><h3>90$</h3> <h4>60$</h4></div>
<a href="">details</a>
</div>
</div>


</div>

</div>
<div class="footer">
    <div class="container_footer">
<div class="help">
<h1>FIND A STORE</h1>
<p>Store location on the map</p>
<a href="">Find</a>
</div>
<div class="sections">
    <div class="h1_section">MAIN CONTENT</div>
    <div class="ul_section">
<ui class="ui_footer">
    <li class="li_footer" ><a class="a-footer" href="#Home">Home</a></li>
    <li class="li_footer" ><a class="a-footer" href="#">why us</a> </li>
    <li class="li_footer" ><a class="a-footer" href="#">Bestsellers</a> </li>
    <li class="li_footer" ><a class="a-footer" href="#"> Product</a> </li>
    <li class="li_footer" ><a class="a-footer" href="#">Discounts</a> </li>
</ui>
</div>
</div>
<div class="type_prod">
<div class="container_type">
   <div class="h1_pro_type"><h1>PRODUCT</h1></div> 
   <div class="ul_pro_type">
    <ui class="type_pro">
        <li class="li_type"><a class="a_type" href="">Chair</a></li>
        <li class="li_type"><a class="a_type" href="">Bed room</a></li>
        <li class="li_type"><a class="a_type" href="">Tables</a></li>
        <li class="li_type"><a class="a_type" href="">Antiques</a></li>
        <li class="li_type"><a class="a_type" href="">Chandelier</a></li>
        <li class="li_type"><a class="a_type" href="">food tables</a></li>
    </ui>
   </div>
</div>
</div>
</div>
<div class="by">
    <h1 class="created" >Copyright © 2022 | *******. All Rights Reserved. create by <a class="myname" href="">Safaa MA  </a></h1>
  <a class="cookie" href="">Cookie information Legal</a>
  <a class="cookie" href=""> privacy Terms </a>
  <a class="cookie" href="">  conditions  </a>

</div>
</div>

    </div>
<script src="js/js.js"></script>
</body>
</html>