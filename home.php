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
error_reporting(0);
if(!isset($_SESSION['name'])){
    die("<b>Oops!</b> Access Failed.
        <p>Sistem Logout. Anda harus melakukan Login kembali.</p>
        <button type='button' onclick=location.href='index.php'>Back</button>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>
        .jumbotron{
            background: url("img/bg.gif");  
            background-size: cover;
            margin-top:3rem;
        }
        .logo{
            width: 50%;
        }
        .header{
            padding: 10rem;
        }
        .ambil{
            margin-left: 12rem;
        }
        .teks{ 
            font-size: 3.5rem;
            color: white;
            font-family: Courier;
        }
        .belanja {
            margin-top:5rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark text-light fixed-top mb-5">
        <div class="container-fluid">
            <a class="navbar-brand text-light " href="#"><b><?php include "config.php";
                                                               $sql = "SELECT * FROM ruser WHERE name='$_SESSION[name]'";
                                                               $query = mysqli_query($db, $sql);
                                                               $data = mysqli_fetch_array($query);
                                                               echo $data['name'];?></b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item text-light">
                    <a class="nav-link active text-light" aria-current="page" href="#belanja"><b>Home</b></a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link active text-light" aria-current="page" href="cart.php"><b>
                        <div class="">
                                <img src="img/cart_16.png" style="max-width:15rem;" alt="">
                            <span style="font-size:.7rem;margin-left:-.3rem;" id="cart">
                                <?php $totalbelanja = 0;?>
                                <?php foreach($_SESSION["keranjang"] as $id => $jumlah): ?>
                                <?php $totalbelanja+=$jumlah?>
                                <?php endforeach ?>
                                <?php echo $totalbelanja ?>
                            </span>
                        </div>
                    </b></a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link active text-light" aria-current="page" href="admin.php"><b>Admin</b></a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link active text-light" aria-current="page" href="logout.php"><b>Logout</b></a>
                </li>
            </ul>
            </div>
        </div>
    </nav>




    <h1 class="text-center mb-5 belanja" id="belanja">MENU</h1>
    <div class="shop d-flex mb-3 container-fluid justify-content-center ms-4">
        <div class="row">
            <?php
            include "config.php";
            $sql = "SELECT * FROM produk";
            $query = mysqli_query($db, $sql);
            while($data = mysqli_fetch_assoc($query)){
            ?>
            <div class="card p-2 m-3" style="width: 18rem;">
                <center><img src="produk/<?php echo $data['gambar'];?>" style="max-width: 40%" class="card-img-top gmbr mb-5 mt-3" alt="..."></center>
                <div class="card-body">
                    <h5 class="card-title"><b><?php echo $data['nm_brg'];?></b></h5>
                    <p class="card-text">Harga : Rp, <?php echo number_format($data['harga']);?></p>
                    <a href="beli.php?id=<?php echo $data['id'];?>"><button class="btn btn-primary">Add to Cart <img src="img/cart_16.png" alt=""></button></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <script>

    </script>
    <!-- javascript bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>