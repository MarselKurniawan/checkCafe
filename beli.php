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
session_start();
include "config.php";
$id = $_GET['id'];
if(isset($_SESSION['keranjang'][$id])){
    $_SESSION['keranjang'][$id] += 1;
} else{
    $_SESSION['keranjang'][$id] = 1;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/cart.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>

<div class="preloader">
    <svg class="cart" role="img" aria-label="Shopping cart line animation" viewBox="0 0 128 128" width="128px" height="128px" xmlns="http://www.w3.org/2000/svg">
		<g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="8">
			<g class="cart__track" stroke="hsla(0,10%,10%,0.1)">
				<polyline points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" />
				<circle cx="43" cy="111" r="13" />
				<circle cx="102" cy="111" r="13" />
			</g>
			<g class="cart__lines" stroke="currentColor">
				<polyline class="cart__top" points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" stroke-dasharray="338 338" stroke-dashoffset="-338" />
				<g class="cart__wheel1" transform="rotate(-90,43,111)">
					<circle class="cart__wheel-stroke" cx="43" cy="111" r="13" stroke-dasharray="81.68 81.68" stroke-dashoffset="81.68" />
				</g>
				<g class="cart__wheel2" transform="rotate(90,102,111)">
					<circle class="cart__wheel-stroke" cx="102" cy="111" r="13" stroke-dasharray="81.68 81.68" stroke-dashoffset="81.68" />
				</g>
			</g>
		</g>
	</svg>
    <div class="preloader__text">
        <p class="preloader__msg">Berhasil Memasukan Ke Keranjang</p>
        <p class="preloader__msg preloader__msg--last">
            Memakan Waktu lama cek koneksi anda !!></p>
    </div>
   </div>
<script>
        setTimeout(myFunction, 2000);
            function myFunction() {
                window.location.assign("home.php#belanja");
            }
    </script>
</body>
</html>



