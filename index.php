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
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['name'])) {
    header("Location: home.php");
}
 
if (isset($_POST['login'])) { 
    $name = $_POST['name'];
    $password = $_POST['pw'];
 
    $sql = "SELECT * FROM ruser WHERE name='$name' AND pw='$password'";
    $result = mysqli_query($db, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $row['name'];
        header("Location: home.php");
    } else {
        echo "<script>alert('name atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Session | <?php $query = mysqli_query($db, "SELECT * FROM info"); $info = mysqli_fetch_array($query); echo $info['teks'];?></title>
    <link rel="stylesheet" href="css/style.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>
        body{
            background-color: #282A3A; 
        }
        .form {
            background-color: #EEEEEE;
        }
    </style>
</head>
<body>
    <div class="">
        <div class="form container-fluid w-50 rounded p-4 mt-5">
            <!-- Pills content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form method="POST">

                    <h1 class="text-center mt-5 mb-5"> LOGIN <?php $query = mysqli_query($db, "SELECT * FROM info"); $info = mysqli_fetch_array($query); echo strtoupper($info['teks']);?></h1>

                    <!-- name input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="name" id="loginName" class="form-control" placeholder="Admin"/>
                        <label class="form-label" for="loginName">name</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="pw" id="loginPassword" class="form-control" placeholder="admin"/>
                        <label class="form-label" for="loginPassword">Password</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="login" class="btn btn-primary btn-block mb-4">Login</button>

                    </form>
                </div>
                </div>
            </div>
            <!-- Pills content -->
        </div> => 
    </div>


    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>