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
include "../config.php";
if(isset($_POST['save'])){
    $id = $_POST['id'];
    $teks = $_POST['teks'];
}
$sql = "UPDATE info SET 
        teks='$teks' WHERE id='1'";
$query = mysqli_query($db, $sql);
if($query){
    header('Location:../admin.php?SuksesMenambah');
}
?>