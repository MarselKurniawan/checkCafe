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

if(!isset($_SESSION["keranjang"])){
    echo "<script>location='loader/loadercart.php'</script>";
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>
        .ambil{
            margin-left: 12rem;
        }
        .teks{ 
            font-size: 3.5rem;
            color: white;
            font-family: Courier;
        }
        .table{
            margin-top: 5rem;
        }
        .atas {
            margin-top: 5rem;
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
    <h1 class="atas text-center"><img src="img/cart.gif" width="10%" alt=""><br>Pesanan</h1>
    <div class="container-fluid">
        <table class="container-fluid table border w-75 shadow">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php $totalbelanja = 0;?>
                <?php foreach ($_SESSION["keranjang"] as $id => $jumlah): ?> 
                <?php
                $query = mysqli_query($db, "SELECT * FROM produk WHERE id='$id'");
                $data = mysqli_fetch_assoc($query);
                $total = $data["harga"]*$jumlah;
                $baris = mysqli_fetch_array($query);
                ?>
                <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data['nm_brg'];?></td>
                    <td>Rp. <?php echo number_format($data['harga']);?></td>
                    <td><?php echo $jumlah;?></td>
                    <td>Rp. <?php echo number_format($total);?></td>
                    <td><a href="proses/hapus.php?id=<?php echo $data['id'];?>"><button class="btn btn-danger"><img src="img/hapus_16.png" alt="">Batal</button></a></td>
                </tr>
                <?php $totalbelanja+=$total;?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><th><th><th>Total : </th></th></th></th>
                    <th>Rp. <?php echo number_format($totalbelanja); ?></th>
                </tr>
            </tfoot>
        </table>
        <button class="btn-primary btn container-fluid" data-bs-toggle="modal" data-bs-target="#modalScroll">Check Out</button>
        <!-- Modal -->
        <!-- Modal -->
        <div class="modal fade" id="modalScroll" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukan Atas Nama Pemesan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <form method="POST">
                                <div class="form-action">
                                    <label for="" class="form-label">Name : </label>
                                    <input type="text" class="form-control" name="name" >
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="lanjut" class="btn btn-success">Lanjut CheckOut</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['lanjut'])){
        $name = $_POST['name'];
        $query = mysqli_query($db, "INSERT INTO pembayaran (name) VALUES ('$name')");

        echo "<script> location='co.php'</script>";
    }
    ?>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>