<!-- 
    INSTAGRAM : @maarkwaa / @kwaaart
    FACEBOOK : Marsel Kurniawan
    WHATSAPP : +62 83 - 842 - 177 - 418

    APLIKASI KASIR VERSION 1.0
    -------------------------
    TOOLS :
    - PHPMYADMIN        - ICON
    - BOOTSTRAP         - GOOGLE FONTS
    - PHP               - STACKOVERFLOW :)

    -- BISA ORDER APLIKASI SESUAI REQUEST TERIMA KASIH 
 -->
<?php
$server = "localhost";
$user = "root";
$pw = "";
$database = "cafedb";

$db = mysqli_connect($server, $user, $pw, $database);

if(!$db){
    die("<script> alert (\"Tidak Dapat Menyambung Ke Server\") </script>");
}
?>
