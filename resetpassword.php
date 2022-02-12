<?php
session_start();
require 'functions.php';
$repass=$_SESSION["repass"]["0"];

if (isset($_POST["reset"])) {
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $copassword = mysqli_real_escape_string($conn, $_POST["copassword"]);
    $email = $repass['email'];
    if($password !== $copassword){
        echo "
        <script>
        alert('Password dengan Konfirmasi Password tidak sama');
        </script>
        ";
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $result=mysqli_query($conn, "UPDATE users SET
    password = '$password'
    ");
    if($result){
        header("Location: account.php");
    }
    else{
        echo 'maaf';
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
                <h1 style="color:#009DAE;">Reset Password</h1>
                <br>
                <input type="password" placeholder="New Password" name="password" required />
                <input type="password" placeholder="Confirm New Password" name="copassword" required />
                <a href="account.php" style="color:#009DAE;">Don't have an account?</a>
                <br>
                <button name="reset">Change</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Tester!</h1>
                    <p>Create a strong password and Easy to remember!!</p>
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