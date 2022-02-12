<?php
require 'functions.php';

$id_task = $_GET["id_task"];
$detail_task = query("SELECT * FROM `tasks` WHERE id_task= $id_task");
$row = $detail_task["0"];

$usertask = query("SELECT * FROM users");
$alluser = $usertask;

$ambil_kontri = query("SELECT * FROM koneksi_tasl WHERE id_task=$id_task");
$user_konek = $ambil_kontri;

$ambil_email = query("SELECT DISTINCT users.email FROM koneksi_tasl JOIN users ON users.id_user=koneksi_tasl.id_user JOIN tasks ON koneksi_tasl.id_task=$id_task");
$email1 = $ambil_email;

if(isset($_POST["addcontributor"])){
    $email = $_POST["contri"];
    $datauser = query("SELECT * FROM `users` WHERE email = '$email'");
    $us = $datauser["0"];
    $id_user = $us["id_user"];

    var_dump($id_task);
    var_dump($id_user);
    

    mysqli_query($conn,"INSERT INTO koneksi_tasl VALUES ('','$id_user','$id_task')");
    header("Location: index.php?halaman=task");
}
?>

<div class="content-task">
    <div class="halaman">
        <h1>Detail Task</h1>
    </div>
</div>
<br>
<div class="detail">
    <form action="" method="POST">
        <label for="contri">Add Contributor</label>
        <div class="contributor">
            <input list="contributor" name="contri" id="contri" autofocus="autofocus">
            <datalist id="contributor">
                <?php foreach ($alluser as $u) : ?>
                    <option value="<?= $u["email"]; ?>">
                    <?php endforeach; ?>
            </datalist>
            <button type="submit" class="newtask" name="addcontributor" style="margin-right:20px;">Add Contributor</button>
        </div>

    </form>
</div><br>
<div class="detail">
    <label>Nama Task</label>
    <div class="desc">
        <p><?php echo $row["name_task"] ?></p>
    </div>
    <label>Deskripsi Task</label>
    <div class="desc">
        <p><?php echo htmlspecialchars_decode($row["desc_task"]); ?></p>
    </div>
    <label>Tanggal Dibuat</label>
    <div class="desc">
        <p><?php echo htmlspecialchars_decode($row["date_created"]); ?></p>
    </div>
    <label>Contributor</label>
    <div class="desc">
        <?php foreach ($email1 as $eml) : ?>
            <p><?php echo htmlspecialchars_decode($eml["email"]); ?></p>
        <?php endforeach; ?>
    </div>
</div>