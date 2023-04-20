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
    if (isset($_POST['submit'])) {
        include 'config.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nm_brg    = $_POST['nm_brg'];
            $harga    = $_POST['harga'];
            $ekstensi_diperbolehkan	= array('png','jpg');
            $gambar = $_FILES['gambar']['name'];
            $x = explode('.', $gambar);
            $ekstensi = strtolower(end($x));
            $file_tmp = $_FILES['gambar']['tmp_name'];

            if (!empty($gambar)){
                if (in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                    move_uploaded_file($file_tmp, 'produk/'.$gambar);
                    $sql="INSERT INTO produk (nm_brg,harga,gambar) values ('$nm_brg','$harga','$gambar')";
                    $simpan_bank=mysqli_query($db,$sql);
                    if ($simpan_bank) {
                        echo "<script>alert('Sukses Menambah Produk')</script>";
                    } else {
                        echo "<script>alert('Gagal Menambah Produk')</script>";
                    }
                }
            }else {
                echo "<script>alert('Masukan Produk sesuai dengan ketentuan')</script>";
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
    <title>Document</title>
    <style>
        body {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
  position: relative;
}

.preloader {
  width: 50px;
  height: 2px;
  background-color: rgb(240,240,240);
  position: relative;
 }

.preloader::before {
  content: "";
  position: absolute;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background-color: #999;
  bottom: 20px;
  left: -10px;
  animation: bounce 2s linear infinite;
}
.preloader:after {
  content: "";
  position: absolute;
  top: 0;
  left: -2px;
  height: 2px;
  background-color: red;
  animation: color 2s linear infinite;
}

@keyframes bounce {
  0% {
    bottom: 20px;
    left: -15px;
    width: 10px;
    opacity: 0;
    background: red;
  }
  20% {
    bottom: 0px;
    left: 0;
    width: 10px;
    opacity:1;
    background: orange;
  }
  22% {
    bottom: 0px;
    left: 0;
    width: 12px;
    height: 8px;
  }
  27% {
    bottom: 0px;
    left: 2px;
    width: 10px;
    height: 10px;
  }
  50% {
    bottom: 20px;
    left: 17px;
    width: 10px;
    height: 10px;
    background: green;
  }
  55% {
    bottom: 20px;
    left: 22px;
    width: 10px;
    height: 10px;
  }
  75% {
    bottom: 0px;
    left: 35px;
    width: 10px;
    height: 10px;
    background: blue;
  }
  80% {
    bottom: 0px;
    left: 35px;
    width: 12px;
    height: 8px;
  }
  82% {
    bottom: 0px;
    left: 35px;
    width: 10px;
    height: 10px;
    opacity: 1;
  }
  100% {
    bottom: 20px;
    left: 50px;
    width: 10px;
    height: 8px;
    opacity: 0;
  }
}

@keyframes color {
  0% {
    width: 0;
    background: red;
  }
  20% {
    width: 10px;
    background: orange;
  }
  50% {
    width: 25px;
    background: green;
  }
  75% {
    width: 45px;
    background: blue;
  }
  100% {
    width: 52px;
    background: purple;
  }
}

p {
  color: #999;
  font-weight: 700;
}
    </style>
</head>
<body>
<div class="preloader"></div>
    <p>Loading . . .</p>
<script>
        setTimeout(myFunction, 2000);
            function myFunction() {
                window.location.assign("home.php#belanja");
            }
    </script>
</body>
</html>