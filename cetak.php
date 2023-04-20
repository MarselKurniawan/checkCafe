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
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>
        .nav-item{
            background-color: blue;
            margin: .3rem;
            border-radius: .5rem;
        }
        .nav-item:hover{
            background-color: blue;
            opacity: 50%;
            padding:.1rem;
        }
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
            margin-top: 1rem;
        }
        .border {
            max-width:75%;
            padding: 2rem;
            margin-left:4.2rem;
        }
        .metode {
            max-width: 10%;
        }
        .bayar{
            display: grid;
            grid-template-columns: auto auto auto;
            gap: 50px 100px;
            padding: 5rem;
            margin-left: 10rem;
        }
        .btn{
            margin-left:4rem;
        }
        .isi {
            padding: .5rem;
        }
        .form {
            margin-left: 5rem;
        }
    </style> 
</head>
<body>

    <!-- table produk -->
    <h1 class="atas text-center"> </h1>
    <div class="container ">
    <!-- <div class="container-fluid">
         <table border="1" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;?>
                <?php $totalbelanja = 0; ?>
                <?php $totalsemua = 0; ?>
                <?php foreach ($_SESSION["keranjang"] as $id => $jumlah): ?> 
                <?php
                $query = mysqli_query($db, "SELECT * FROM produk WHERE id='$id'");
                $data = mysqli_fetch_assoc($query);
                $total = $data["harga"]*$jumlah;
                $baris = mysqli_fetch_array($query);
                if($_SESSION["keranjang"] == 0){
                    echo "<script> alert ('Silahkan Belanja Terlebih Dahulu')</script>";
                    echo "<script> location='home.php#belanja'</script>";
                }
                ?>
                <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data['nm_brg'];?></td>
                    <td>Rp. <?php echo number_format($data['harga']);?></td>
                    <td><?php echo $jumlah;?></td>
                    <td>Rp. <?php echo number_format($total);?></td>    
                </tr>
                <?php $totalbelanja+=$total?>
                <?php $totalsemua+=$jumlah?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><th><th><th>Total Belanja : </th></th></th></th>
                    <th>Rp. <?php echo number_format($totalbelanja);?></th>
                </tr>
            </tfoot>
        </table>     -->
        <div class="form container-fluid p-3 text-start ">
        <form action="" method="POST">
            <div class="border">
            <h4 class="text-center">NOTA PEMBELIAN <?php $query = mysqli_query($db, "SELECT * FROM info"); $info = mysqli_fetch_array($query); echo strtoupper($info['teks']);?><hr> </h4>
        <?php include "config.php"; $query = mysqli_query($db, "SELECT * FROM ruser WHERE name='$_SESSION[name]'"); $akun = mysqli_fetch_assoc($query); ?>
            <input type="hidden" name="id" value="<?php echo $akun['id'];?>">

            <table>
                <thead>
                    <tr>
                        <th class="isi">Pesanan</th>
                        <th class="isi">Jumlah</th>
                        <th class="isi">Harga</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($_SESSION["keranjang"] as $id => $jumlah): ?>
                    <?php
                    
                    
                    $query = mysqli_query($db, "SELECT * FROM produk WHERE id='$id'");
                    $data = mysqli_fetch_assoc($query);
                    $total = $data["harga"]*$jumlah;
                    $_SESSION['total'] = $totalbelanja;
                    $_SESSION['semua'] = $totalsemua;
                    $baris = mysqli_fetch_array($query);
                        if($_SESSION["keranjang"] == 0){
                            echo "<script> alert ('Silahkan Belanja Terlebih Dahulu')</script>";
                            echo "<script> location='home.php#belanja'</script>";
                        }?>
                    <tr>
                    <td class="isi"><?php echo $data['nm_brg'];?> </td>
                    <td class="isi"><?php echo $jumlah;?></td>
                    <td class="isi">Rp. <?php echo number_format($data['harga']);?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th><th>Total : </th></th>
                        <th>Rp. <?php echo number_format($totalbelanja);?></th>
                    </tr>
                </tfoot>
            </table>
                <hr>    
                <h3 class="text-center">Pesanan Atas Nama : <?php $query = mysqli_query($db, "SELECT * FROM pembayaran"); $tampil = mysqli_fetch_assoc($query); echo $tampil['name'];?></h3>
            </div> <br>
        </form> 
        </div>
    </div>
    </div>
    <script>
        setTimeout(myFunction, 1000);
            function myFunction() {
                window.print();
                window.location.assign("co.php");
            }
    </script>
</body>
</html>