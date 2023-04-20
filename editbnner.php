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
include "config.php";


$sql = "SELECT * FROM info WHERE id='1'";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_assoc($query);
if(mysqli_num_rows($query) < 1){
    die("data tidak ditemukan");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/edit.css">
</head>

<body>
    <div class="newsletter-subscribe">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Masukan Untuk Edit Banner</h2>
                <p class="text-center">Banner Itu Apa? Banner digunakan untuk tampilan pada nota pembayaran</p>
            </div>
            <form class="form-inline" method="post" action="proses/proedit.php">
                <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                <div class="form-group"><input class="form-control" type="text" name="teks" placeholder="<?php echo $data['teks'];?>"></div>
                <div class="form-group"><button class="btn btn-primary" type="submit" name="save">Save</button></div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>