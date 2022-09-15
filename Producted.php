<?php

include "FCB.php"; 
global $connect; 
mysqli_set_charset($connect, 'utf8');
$error=null;
$message=null;


$GetProInfo = "SELECT *FROM products WHERE pro_Type = 'Chair' ";
$RunProInfo = mysqli_query($connect,$GetProInfo); // نفذ

// $GetProAll = "SELECT *FROM products WHERE pro_token ";
// $RunProAll = mysqli_query($connect,$GetProAll); // نفذ
// $RowProAll = mysqli_fetch_array($RunProAll)



?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6c84e23e68.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>PRODUCTED</title>
</head>
<body>

    <div class="Home_Product">

<div class="con_pros">


<div class="list_section">
    <div class="up">
    <h1>Producted</h1>
    <div class="list"> <i onclick="show_typy()" id="heed_list" class="fa-solid fa-bars-staggered"></i> <i onclick="hidn3()" id="clo" class="fa-solid fa-xmark sr"></i></div>
    <div class="sorce02"><a class="a-proCarticonn" href="cart.php"><i class="fa-solid icon00 fa-cart-shopping"></i></a></div>
    </div>
    <div class="down" id="down">
        <div class="shdo"></div>
        <ul>
            <!-- <li class="close"><i onclick="hidn2()"  class="fa-solid fa-xmark"></i></li> -->
            <li class="il_producted"><a class="a_proname" onclick="Chair()" > <div>Chair</div> <div><i class="fa-sharp fa-solid fa-chevron-right"></i></div></a></li>
            <li class="il_producted"><a class="a_proname" onclick="Table()"><div>Tables</div>  <div><i class="fa-sharp fa-solid fa-chevron-right"></i></div></a></li>
            <li class="il_producted"><a class="a_proname" onclick="bed()" ><div>Bed room</div>  <div><i class="fa-sharp fa-solid fa-chevron-right"></i></div></a></li>
            <li class="il_producted"><a class="a_proname" onclick="Antiques()"><div>Antiques</div>  <div><i class="fa-sharp fa-solid fa-chevron-right"></i></div></a></li>
            <li class="il_producted"><a class="a_proname" onclick="Chandelier()"><div>Chandelier</div>  <div><i class="fa-sharp fa-solid fa-chevron-right"></i></div></a></li>
            <li class="il_producted"><a class="a_proname" onclick="food()"><div>food tables</div>  <div><i class="fa-sharp fa-solid fa-chevron-right"></i></div></a></li>
        </ul>
    </div>
</div>


<div class="con2">
<!-- ---------- Chair---------- -->

<div class="Chair_card" id="Chair">
    <div class="titlepro">
        <h1>Chair</h1>
        <p class="sorce2"><a class="a-sorce0" href="index.php">Home</a><span class="sorce_span"></span><a class="a-sorce1" href="Producted.html">Producted</a></p>
    </div>

    <?php

while($RowProInfo = mysqli_fetch_array($RunProInfo)){
    echo'
    
    <div class="container_dis_pro">
        <div class="img_des_pro"><img src="ProductImg/';echo $RowProInfo['pro_img'] ;echo'"/></div>
    <div class="txt_dis_pro">
    <h1> ';echo $RowProInfo['pro_name'] ;echo' </h1>
    <div class="don_pro"><h3>';echo $RowProInfo['pro_newPrace'] ;echo'</h3> <h4>';echo $RowProInfo['pro_price'] ;echo' </h4></div>
    <div class="about_buy">
        <div class="color_best_pro">
            <div class="one1 color"></div>
            <div class="tow2 color"></div>
            <div class="three3 color"></div>
            <div class="for4 color"></div>
    </div>
        <div class="cart">
            <a  href="showProduct.php?D=D&T=';echo $RowProInfo['pro_token'];echo'" >details</a>
        </div>
    </div>
    </div>
    </div>
   




 
 ';
}
?>
</div>

 <!-- ------- Tables------ -->
<div class="Table_card" id="Table">
    <div class="titlepro">
        <h1>Table</h1>
        <p class="sorce2"><a class="a-sorce0" href="index.php">Home</a><span class="sorce_span"></span><a class="a-sorce1" href="Producted.html">Producted</a></p>
    </div>

    <?php
    
$GetProTables = "SELECT *FROM products WHERE pro_Type = 'Tables' ";
$RunProTables = mysqli_query($connect,$GetProTables ); // نفذ

while($RowProTables = mysqli_fetch_array($RunProTables)){
    echo'
    
    <div class="container_dis_pro">
        <div class="img_des_pro"><img src="ProductImg/';echo $RowProTables['pro_img'] ;echo'"/></div>
    <div class="txt_dis_pro">
    <h1>';echo $RowProTables['pro_name'] ;echo' </h1>
    <div class="don_pro"><h3>';echo $RowProTables['pro_newPrace'] ;echo'</h3> <h4>';echo $RowProTables['pro_price'] ;echo' </h4></div>
    <div class="about_buy">
        <div class="color_best_pro">
            <div class="one1 color"></div>
            <div class="tow2 color"></div>
            <div class="three3 color"></div>
            <div class="for4 color"></div>
    </div>
        <div class="cart">
            <a href="showProduct.php?D=D&T=';echo $RowProTables['pro_token'];echo'">details</a>
        </div>
    </div>
    </div>
    </div>
';
}
?>
</div>
<!-- -----bed room---- -->
<div class="bed_card" id="bed">
    <div class="titlepro">
        <h1>bed room</h1>
        <p class="sorce2"><a class="a-sorce0" href="index.php">Home</a><span class="sorce_span"></span><a class="a-sorce1" href="Producted.html">Producted</a></p>
    </div>

<?php
    
    $GetProbed = "SELECT *FROM products WHERE pro_Type = 'Bed room' ";
    $RunProbed = mysqli_query($connect,$GetProbed ); // نفذ
    
    while($RowProbed = mysqli_fetch_array($RunProbed)){
        echo'
    <div class="container_dis_pro">
        <div class="img_des_pro"><img src="ProductImg/';echo $RowProbed['pro_img'] ;echo'"/></div>
    <div class="txt_dis_pro">
    <h1>';echo $RowProbed['pro_name'] ;echo'</h1>
    <div class="don_pro"><h3>';echo $RowProbed['pro_newPrace'] ;echo'</h3> <h4>';echo $RowProbed['pro_price'] ;echo' </h4></div>
    <div class="about_buy">
        <div class="color_best_pro">
            <div class="one1 color"></div>
            <div class="tow2 color"></div>
            <div class="three3 color"></div>
            <div class="for4 color"></div>
    </div>
        <div class="cart">
            <a href="showProduct.php?D=D&T=';echo $RowProbed['pro_token'];echo'">details</a>
        </div>
    </div>
    </div>
</div>
';
}
?>
</div>
<!-- -----Antiques---- -->

<div class="Antiques_card" id="Antiques">
    <div class="titlepro">
        <h1>Antiques</h1>
        <p class="sorce2"><a class="a-sorce0" href="index.php">Home</a><span class="sorce_span"></span><a class="a-sorce1" href="Producted.html">Producted</a></p>
    </div>
    <?php
    
    $GetProAntiques = "SELECT *FROM products WHERE pro_Type = 'Antiques' ";
    $RunProAntiques = mysqli_query($connect,$GetProAntiques ); // نفذ
    
    while($RowProAntiques = mysqli_fetch_array($RunProAntiques)){
        echo'

    <div class="container_dis_pro">
        <div class="img_des_pro"><img src="ProductImg/';echo $RowProAntiques['pro_img'] ;echo'"/></div>
    <div class="txt_dis_pro">
    <h1>';echo $RowProAntiques['pro_name'] ;echo'</h1>
    <div class="don_pro"><h3>';echo $RowProAntiques['pro_newPrace'] ;echo'</h3> <h4>';echo $RowProAntiques['pro_price'] ;echo' </h4></div>
    <div class="about_buy">
        <div class="color_best_pro">
            <div class="one1 color"></div>
            <div class="tow2 color"></div>
            <div class="three3 color"></div>
            <div class="for4 color"></div>
    </div>
        <div class="cart">
            <a href="showProduct.php?D=D&T=';echo $RowProAntiques['pro_token'];echo'">details</a>
        </div>
    </div>
    </div>
</div>
';
}
?>
</div>
<!-- -----Chandelier---- -->
<div class="Chandelier_card" id="Chandelier">
    <div class="titlepro">
        <h1>Chandelier</h1>
        <p class="sorce2"><a class="a-sorce0" href="index.php">Home</a><span class="sorce_span"></span><a class="a-sorce1" href="Producted.html">Producted</a></p>
    </div>
    <?php
    
    $GetProChandelier = "SELECT *FROM products WHERE pro_Type = 'Chandelier' ";
    $RunProChandelier = mysqli_query($connect,$GetProChandelier ); // نفذ
    
    while($RowProChandelier = mysqli_fetch_array($RunProChandelier)){
        echo'

<div class="container_dis_pro">
    <div class="img_des_pro"><img src="ProductImg/';echo $RowProChandelier['pro_img'] ;echo'"/></div>
        <div class="txt_dis_pro">
            <h1>';echo $RowProChandelier['pro_name'] ;echo'</h1>
            <div class="don_pro"><h3>';echo $RowProChandelier['pro_newPrace'] ;echo'</h3> <h4>';echo $RowProChandelier['pro_price'] ;echo' </h4></div>
            <div class="about_buy">
                <div class="color_best_pro">
                    <div class="one1 color"></div>
                    <div class="tow2 color"></div>
                    <div class="three3 color"></div>
                    <div class="for4 color"></div>
                </div>
                <div class="cart">
                    <a href="showProduct.php?D=D&T=';echo $RowProChandelier['pro_token'];echo'">details</a>
                </div>
            </div>
        </div>
    </div>

';
}
?>
</div>

<!-- -----food---- -->
<div class="food_card" id="food">
    <div class="titlepro">
        <h1>food tables</h1>
        <p class="sorce2"><a class="a-sorce0" href="index.php">Home</a><span class="sorce_span"></span><a class="a-sorce1" href="Producted.html">Producted</a></p>
    </div>

    <?php
    
    $GetProfood = "SELECT *FROM products WHERE pro_Type = 'food tables' ";
    $RunProfood = mysqli_query($connect,$GetProfood ); // نفذ
    
    while($RowProfood = mysqli_fetch_array($RunProfood)){
        echo'

    <div class="container_dis_pro">
        <div class="img_des_pro"><img src="ProductImg/';echo $RowProfood['pro_img'] ;echo'"/></div>
        <div class="txt_dis_pro">
            <h1>';echo $RowProfood['pro_name'] ;echo'</h1>
            <div class="don_pro"><h3>';echo $RowProfood['pro_newPrace'] ;echo'</h3> <h4>';echo $RowProfood['pro_price'] ;echo' </h4></div>
            <div class="about_buy">
                <div class="color_best_pro">
                    <div class="one1 color"></div>
                    <div class="tow2 color"></div>
                    <div class="three3 color"></div>
                    <div class="for4 color"></div>
                </div>
                <div class="cart">
                    <a href="showProduct.php?D=D&T=';echo $RowProfood['pro_token'];echo'">details</a>
                </div>
            </div>
        </div>
    </div>
    ';
}
?>
</div>

</div>


</div>
</div>

    </div>
    <script src="js/js.js"></script>
</body>

</html>