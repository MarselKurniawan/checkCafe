<?php
session_start();
$id = $_GET['id'];
unset($_SESSION["keranjang"][$id]);

echo "<script> alert(' Lanjut Untuk Hapus Produk ' );</script>";
echo "<script> location='../cart.php'</script>";

?>