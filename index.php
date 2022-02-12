<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: account.php");
    exit;
}
$data = $_SESSION["user"];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/logo.png">
        <link rel="stylesheet" href="assets/css/style.css?v=1.5">
        <script src="https://kit.fontawesome.com/40fc9b7b86.js" crossorigin="anonymous"></script>
        <script type=" text/javascript" src="assets/js/ckeditor/ckeditor.js">
        </script>
        <title>TESTAPP</title>
    </head>

    <body>
        <div class="navbar">
            <div class="nav">
                <div class="logo">
                    <b style="color: #009DAE;">TEST</b><b style="color:#71DFE7;">APP</b>
                    <a style="text-decoration:none;" href="logout.php" class="ldropdown" class="fa fa-sign-out-alt"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    <a style="text-decoration:none;" href="index.php" class="ldropdown"><i class="fas fa-user-circle"></i> <?php echo $data["name"]; ?></a>
                </div>
            </div>
        </div>
        </div>
        </div>

        <div class="main-content">
            <div class="sidebar">
                <div class="fitur">
                    <li class="kolom"><a href="index.php?halaman=task"><b>TASK</b></a></li>
                    <!--
                    <li class="kolom"><a class="fas fa-user-circle" href="index.php?halaman=profil"> Profil</a></li>
                    
                    <li class="kolom"><a class="fas fa-database" href="index.php?halaman=dataobat"> Data Obat</a></li>
                    <li class="kolom"><a class="fas fa-clipboard-list" href="index.php?halaman=kategori"> Kategori</a></li>
                    <li class="kolom"><a class="fas fa-shapes" href="index.php?halaman=satuan"> Satuan</a></li>
                    <li class="kolom"><a class="fas fa-address-book" href="index.php?halaman=supplier"> Supplier</a></li>
                    -->
                </div>
            </div>
            <div class="dashboard">
                <div class="content">
                    <?php
                    if (isset($_GET['halaman'])) {
                        if ($_GET['halaman'] == "task") {
                            include 'task.php';
                        }
                        if ($_GET['halaman'] == "detail_task") {
                            include 'detail_task.php';
                        }
                        if ($_GET['halaman'] == "detail_new") {
                            include 'detail_new.php';
                        }
                        if ($_GET['halaman'] == "detail_problem") {
                            include 'detail_problem.php';
                        }
                        if ($_GET['halaman'] == "detail_progress") {
                            include 'detail_progress.php';
                        }
                        if ($_GET['halaman'] == "detail_testing") {
                            include 'detail_testing.php';
                        }
                        if ($_GET['halaman'] == "detail_complete") {
                            include 'detail_complete.php';
                        }
                        if ($_GET['halaman'] == "new_task") {
                            include 'new_task.php';
                        }
                        if ($_GET['halaman'] == "hapusnew") {
                            include 'hapusnew.php';
                        }
                        if ($_GET['halaman'] == "hapusproblem") {
                            include 'hapusproblem.php';
                        }
                        if ($_GET['halaman'] == "hapusprogress") {
                            include 'hapusprogress.php';
                        }
                        if ($_GET['halaman'] == "hapustesting") {
                            include 'hapustesting.php';
                        }
                        if ($_GET['halaman'] == "hapuscomplete") {
                            include 'hapuscomplete.php';
                        }
                        if ($_GET['halaman'] == "editnew") {
                            include 'editnew.php';
                        }
                        if ($_GET['halaman'] == "edittesting") {
                            include 'edittesting.php';
                        }
                        if ($_GET['halaman'] == "editproblem") {
                            include 'editproblem.php';
                        }
                        if ($_GET['halaman'] == "editprogress") {
                            include 'editprogress.php';
                        }
                        if ($_GET['halaman'] == "editcomplete") {
                            include 'editcomplete.php';
                        }
                        if ($_GET['halaman'] == "addcontributor") {
                            include 'addcontributor.php';
                        }
                        if ($_GET['halaman'] == "edittask") {
                            include 'edittask.php';
                        }
                        if ($_GET['halaman'] == "hapustask") {
                            include 'hapustask.php';
                        }
                    } else {
                        include 'home.php';
                    }
                    ?>
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