<?php
session_start();
$_SESSION["repass"] = [];
require 'functions.php';
if(isset($_POST["find"])){
    $email = $_POST["email"];
    $ambil_email = query("SELECT * FROM users WHERE email='$email'");
    if($ambil_email){
        $_SESSION["repass"]=$ambil_email;
        header("Location: resetpassword.php");
    }
    else{
        echo "
        <script>
            alert('Tidak ada pengguna ditemukan');
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="shortcut icon" href="assets/img/logo.png">
    <title>Daftar atau Masuk</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="" method="POST">
                <h1 style="color:#009DAE;">Find Your Account</h1>
                <br>
                <input type="email" placeholder="Email" name="email" required />
                <a href="account.php" style="color:#009DAE;">Don't have an account?</a>
                <br>
                <button name="find">Find</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Tester!</h1>
                    <p>Find your Account, and Change the password!</p>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <p>
        <a target="_blank" href="index.php"><b style="color: #71DFE7;">TEST</b><b style="color: #C2FFF9;">APP</b></a>
    </p>
</footer>

</html>