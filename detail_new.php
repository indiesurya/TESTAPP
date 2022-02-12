<?php
require 'functions.php';
$id_new = $_GET["id_new"];
$detail_new = query("SELECT * FROM `new` WHERE id_new = $id_new");
$row = $detail_new["0"];
?>

<div class="content-task">
    <div class="halaman">
        <h1>Detail New</h1>
    </div>
</div>
<br>
<div class="detail">
    <label>Nama Task</label>
    <div class="desc">
        <p><?php echo $row["name_task"] ?></p>
    </div>
    <label>Deskripsi Task</label>
    <div class="desc">
        <p><?php echo htmlspecialchars_decode($row["desc_task"]); ?></p>
    </div>
</div>