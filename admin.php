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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>
        
        .teks{ 
            font-size: 3.5rem;
            color: white;
            font-family: Courier;
        }
        .table{
            margin-top: 2rem;
            margin-bottom: 10rem;
        }
        .atas {
            margin-top: 5rem;
        }
        .border {
            padding: 2rem;
        }
        .metode {
            max-width: 10%;
        }
        .isi {
            padding: .5rem;
        }
    </style> 
</head>
<body>
    <div class="">
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
                    <a class="nav-link active text-light" aria-current="page" href="home.php"><b>Home</b></a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link active text-light" aria-current="page" href="cart.php"><b>
                        <div class="">
                                <img src="img/cart_16.png" style="max-width:15rem;" alt="">
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
    </div>

    <!-- table produk -->
    <h1 class="atas text-center">ADMIN <?php $query = mysqli_query($db, "SELECT * FROM info"); $info = mysqli_fetch_array($query); echo strtoupper($info['teks']);?></h1>
    <div class="">
        <div class="form p-3 text-start w-75 container-fluid">
            <div class="border">
            <h4 class="text-center">STATUS PEMBELIAN <?php $query = mysqli_query($db, "SELECT * FROM info"); $info = mysqli_fetch_array($query); echo strtoupper($info['teks']);?> <hr> </h4>
            <?php include "config.php"; $query = mysqli_query($db, "SELECT * FROM ruser WHERE name='$_SESSION[name]'"); $akun = mysqli_fetch_assoc($query); ?>
            <input type="hidden" name="id" value="<?php echo $akun['id'];?>">
            <table class="container-fluid">
                <thead>
                    <tr>
                        <th class="isi">No</th>
                        <th class="isi">Atas Nama</th>
                        <th class="isi">Jumlah Pesanan</th>
                        <th class="isi">Total Harga</th>
                        <th class="isi">Status</th>
                        <th class="isi">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                        include "config.php";
                        $no = 1;
                        $query = mysqli_query($db, "SELECT * FROM adm");
                        while ($data = mysqli_fetch_assoc($query)){
                        ?>
                        <td class="isi"><?php echo $no++;?></td>
                        <td class="isi"><?php echo $data['nama'];?></td>
                        <td class="isi"><?php echo $data['total'];?></td>
                        <td class="isi">Rp. <?php echo number_format($data['jumlah']);?></td>
                        <td class="isi"> <b><?php echo $data['status'];?></b> </td>
                        <td class="isi"><a href="proses/hapusproses.php?id=<?php echo $data['id'];?>"><button class="btn btn-primary"><img src="img/selesai_16.png" alt="">Selesai</button></a></td>
                    </tr>
                    <?php } ?> 
                </tbody>
                </table>
                <hr>
            </div> 
        </div>
    </div>
    </div>
    <?php
    if(isset($_POST['beli'])){
        unset($_SESSION["keranjang"]);
        $sql = mysqli_query($db, "TRUNCATE TABLE pembayaran");
        echo "<script>alert('berhasil memesan tunggu sebentar nggeh')</script>";
        echo "<script> location='home.php#belanja'</script>";
    }
    ?>

    <?php 
    include "config.php";
    if(isset($_POST['beli'])){
        $id = $_POST['id'];

    }
    ?>
    <center>
        <hr class="bg-dark p-1 w-75">
    </center>
    <div class=""> 
        <div class="form p-3 text-start w-75 container-fluid">
            <div class="border">
            <h4 class="text-center mb-4">DAFTAR PRODUK <?php $query = mysqli_query($db, "SELECT * FROM info"); $info = mysqli_fetch_array($query); echo strtoupper($info['teks']);?></h4>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Buat Produk Baru +
                </button>
                <!-- Button trigger modal -->
                <a href="editbnner.php"><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Edit Banner
                </button></a>
            <hr>
            <?php include "config.php"; $query = mysqli_query($db, "SELECT * FROM ruser WHERE name='$_SESSION[name]'"); $akun = mysqli_fetch_assoc($query); ?>
            <input type="hidden" name="id" value="<?php echo $akun['id'];?>">
            <table class="container-fluid">
                <thead>
                    <tr>
                        <th class="isi">Nama Barang</th>
                        <th class="isi">Harga</th>
                        <th class="isi">Gambar</th>
                        <th class="isi">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'config.php';
                        $sql="SELECT * FROM produk order by id desc";
                        $hasil=mysqli_query($db,$sql);
                        while ($data = mysqli_fetch_array($hasil)):
                    ?>
                    <tr>
                        <th class="isi" ><?php echo $data['nm_brg']; ?></th>
                        <th class="isi">Rp. <?php echo number_format($data['harga']);?></th>
                        <th class="w-25 isi"><img src="produk/<?php echo $data['gambar'];?>" width="20%" alt=""></th>
                        <th class="isi"><a href="proses/hapusproduk.php?id=<?php echo $data['id'];?>"><button class="btn btn-danger"><img src="img/hapus_16.png" alt="">Hapus</button></a></th>
                    </tr>
                </tbody>
                    <?php endwhile?>
                </table>
                <hr>
            </div> 
        </div>
    </div>

    <!-- Modal Produk -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Produk Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="aksi.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" >Nama Barang</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="nm_brg" aria-describedby="emailHelp" require>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="harga" require>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Produk</label>
                        <input class="form-control" type="file" id="formFile"  name="gambar" require>
                        <span class="text-danger">*File Harus Berupa PNG / JPG</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Buat</button>
                </div>
            </div>
        </form>
    </div>
    </div>
</body>
</html>