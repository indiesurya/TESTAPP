<?php
session_start();
require 'functions.php';
$_SESSION["repass"]=[];

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo
        "
        <script>
        alert('User baru berhasil ditambahkan');
        </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}

if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            //set session login
            $_SESSION["user"] = $row;
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
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
        <div class="form-container sign-up-container">
            <form action="" method="POST">
                <h1 style="color:#009DAE;">Create Account</h1>
                <br>
                <input type="text" placeholder="Name" name="name" required autocomplete="off"/>
                <input type="email" placeholder="Email" name="email" required autocomplete="off"/>
                <input type="password" placeholder="Password" name="password" required autocomplete="off"/>
                <input type="password" placeholder="Confirmation Password" name="copassword" required autocomplete="off"/>
                <br>
                <button name="register">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="" method="POST">
                <h1 style="color:#009DAE;">Sign in</h1>
                <br>
                <input type="email" placeholder="Email" name="email" required />
                <input type="password" placeholder="Password" name="password" required />
                <a href="forgotpassword.php" style="color:#009DAE;">Forgot your password?</a>
                <br>
                <button name="login">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>Register yourself and become a Professional Quality Assurance</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Tester!</h1>
                    <p>Let's build your app to perfection by testing it</p>
                    <button class="ghost" id="signUp">Sign Up</button>
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

<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
</script>