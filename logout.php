<?php 
include "FCB.php"; 
global $connect; 
mysqli_set_charset($connect, 'utf8');

setcookie('nameUser', null, -1, '/');
setcookie('userToken', null, -1, '/');
setcookie('userLogin', null, -1, '/');


    // الانتقال الى الصفحة الاخرى
    echo'<meta http-equiv="refresh" content="0, url=index.php" />';
    // التوقف عن قراءة الاوامر البرمجية القادمة
    exit();
?>